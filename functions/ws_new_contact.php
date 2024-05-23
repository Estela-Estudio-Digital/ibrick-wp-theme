<?php
function action_wpcf7_mail_sent($contact_form){

    $contact_form = WPCF7_ContactForm::get_current();
    $contact_form_id = $contact_form -> id;

    if ($contact_form_id === 560) {
        $BASE_URL = 'https://api-gci-rest.integracionplanok.io/api';
        $access_token = login_api();
        $submission = WPCF7_Submission::get_instance();
        $posted_data = $submission->get_posted_data();
    
        // 1-. Consultar si el cliente existe.
        $regularClient = wp_remote_get( $BASE_URL . '/clientes/naturales?identificador-personal='. strstr(str_replace('.', '', $posted_data['inputRutCotizar']), '-', true) , array(
            'headers' => array(
                'accept' => 'application/json',
                'Content-Type' => 'application/json',
                "Authorization" => $access_token
            )
        ));
    
        $regularClientData = wp_remote_retrieve_body($regularClient);
        $decoded_regular_client_data = json_decode($regularClientData, true);
        $submission->add_result_props( array( 'pdf_api_client_token' => $access_token ) );
    
        $clientId = $decoded_regular_client_data['id'];
    
        // 2-. Crear el cliente si no existe.
        if (!$clientId) {
    
            $newClient = wp_remote_post( $BASE_URL . '/clientes/naturales', array(
                'headers' => array(
                    'accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    "Authorization" => $access_token
                ),
                'body' => json_encode(array(
                    'identificadorPersonal' => intval(strstr(str_replace('.', '', $posted_data['inputRutCotizar']), '-', true)),
                    'digitoVerificador' => strval(substr(strstr($posted_data['inputRutCotizar'], '-'), 1)),
                    'nombre' => strval($posted_data['inputNameCotizar']),
                    'apellidoPaterno' => strval($posted_data['inputLastNameCotizar']),
                    'apellidoMaterno' => strval($posted_data['inputLastNameCotizar']),
                    'celular' => strval($posted_data['inputTelefonoCotizar']),
                    'email' => strval($posted_data['inputEmailCotizar']),
                ))
            ));
    
            $newClientData = wp_remote_retrieve_body($newClient);
            $decoded_new_client_data = json_decode($newClientData, true);
    
            $clientId = $decoded_new_client_data['id'];
        }
        $submission->add_result_props( array( 'pdf_api_client_id' => $clientId ) );
        // 3-. Agregar cotización

        $dt = new DateTime();
    
        $cotBody = json_encode(array(array(
            'productoPrincipal' => array(
                'id' => intval($posted_data['idProducto']),
                'descuento' => array(
                    'valor' => 0,
                    'unidad' => '%'
                )
            ),
            'productosSecundarios' => array(),
            'productosAdicionales' => array(),
            'idCliente' => $clientId,
            'idTipoIVA' => intval('1'),
            'fecha' => date('Y-m-d\TH:i:s.u\Z'),
            'idMedioLlegada' => intval('205'),
            'telefonoValidado' => true,
            'evaluacion' => array(
                'idExpectativa' => intval('1'),
                'idRazonDeCompra' => intval('1'),
                'fechaRecontacto' => "2025-05-25",
                'comentario' => $posted_data['fuenteSbj'],
                'idCanalADistancia' => intval('1'),
            ),
            'gclid' => '',
        )));
    
        $cotizacion = wp_remote_post( $BASE_URL . '/cotizaciones?secuencial=false&descuento_producto=false', array(
            'headers' => array(
                'accept' => 'application/json',
                'Content-Type' => 'application/json',
                "Authorization" => $access_token
            ),
            'body' => $cotBody
        ));
    
        $cotizacionData = wp_remote_retrieve_body($cotizacion);
        $decoded_cotizacion_data = json_decode($cotizacionData, true);
    
        $idCotizacion = $decoded_cotizacion_data[0]['id_cotizacion'];
        $submission->add_result_props( array( 'pdf_api_cot_id' => $decoded_cotizacion_data ) );

    
        // 4-. Solicitar PDF
        // if ($idCotizacion) {
        //     $pdf = wp_remote_get( $BASE_URL . '/cotizaciones/' . $idCotizacion . '/pdf?tipoDescarga=0', array(
        //         'headers' => array(
        //             'accept' => 'application/json',
        //             'Content-Type' => 'application/json',
        //             "Authorization" => $access_token
        //         )
        //     ));
        //     $pdfData = wp_remote_retrieve_body($pdf);
        //     $decoded_pdf_data = json_decode($pdfData, true);

        //     $submission->add_result_props( array( 'pdf_api_response' => $pdf ) );
    
        //     if ($decoded_pdf_data['url']) {
        //         $submission->add_result_props( array( 'pdf_api_response_url' => $decoded_pdf_data['url'] ) );
        //     }
        // } else {
        //     $submission->add_result_props( array( 'pdf_api_status' => 'fail' ) );
        // }
    }

}
add_action('wpcf7_mail_sent', 'action_wpcf7_mail_sent', 10, 3);