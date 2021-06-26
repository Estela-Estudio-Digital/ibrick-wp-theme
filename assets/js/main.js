$(function () {
    /* 
	------------------------------------------------------------------
		SBJS
	------------------------------------------------------------------
	*/
    function logSource(sbData) {
        console.log('Cookies are set! Your source is: ${sbData.current.src}');z
    }
    sbjs.init();
    /* 
	------------------------------------------------------------------
		PRELOAD
	------------------------------------------------------------------
	

    $(window).on('load', function () {
        $('.cd-loader').fadeOut('slow', function () {
            $(this).remove();
        });
    });*/
    /* 
	------------------------------------------------------------------
		Menú Hamburguer
	------------------------------------------------------------------
	*/
    $('.colapse-hamburger').on('click', function () {
        $(this).toggleClass('is-active');
    });

    $('.slide-nav-button').on('click', function () {
        $('.bk-primary-nav').toggleClass('loaded');
        $(this).toggleClass('is-active');
    });

    $('#projectMenuBig a').on('click', function() {
        $('.bk-primary-nav').toggleClass('loaded');
        $('.slide-nav-button').toggleClass('is-active');
    })
    $('#projectMenu a').on('click', function(e) {
        e.preventDefault();

        let navBarOpen = $('#navbarNav2').is('.show');
        if(navBarOpen){
            $('#navbarNav2').toggleClass('show');
            $('#proyectosMenu .colapse-hamburger').toggleClass('is-active');
        }

        let navbarAnchor = $(this).attr('href'),
        anchorElemente = ($(navbarAnchor).offset().top - 120)

        console.log(navbarAnchor)
        $('html,body').animate({scrollTop: anchorElemente},'fast');
    })
    /* 
	------------------------------------------------------------------
		Menú Hamburguer
	------------------------------------------------------------------
	*/
    $('#contactFloatingForm').on('click', function (e) {
        e.preventDefault();
        $('.form-modal').addClass('form-modal-open');

    });
    $('#formModalClose').on('click', function (e) {
        e.preventDefault();
        $('.form-modal').removeClass('form-modal-open');

    });
    /* 
	------------------------------------------------------------------
		Menú fixed
	------------------------------------------------------------------
    */
   $('.menu-nav-fixed').fadeOut();
   $('.follow-button-pay').fadeOut();

    $(window).scroll(function () {

        if ($(this).scrollTop() >= 731) {
            $('.follow-button-pay').removeClass('d-none').addClass('d-flex');
        }else{
            $('.follow-button-pay').removeClass('d-flex').addClass('d-none');

        }

        if ($(this).scrollTop() >= 730) {
            $('.menu-nav-fixed').fadeIn();
            $('.follow-button-pay').fadeIn();
            if(window.location.pathname.indexOf('proyectos') != 1) {
                $('.main-menu').addClass('fixed-menu-primary')
            }
        } else {
            $('.menu-nav-fixed').fadeOut();
            $('.follow-button-pay').fadeOut();
            if(window.location.pathname.indexOf('proyectos') != 1) {
                $('.main-menu').removeClass('fixed-menu-primary')
            }
        }

    });

    let locationPatName = window.location.pathname;
    setPrimaryLink(locationPatName);

    function setPrimaryLink(locationPatName ) {
       let linkActive = locationPatName.replaceAll("/", "");
       $('.main-menu').find(`.link-${linkActive}`).addClass('link-active')
    }
    /* 
	------------------------------------------------------------------
		Galería
	------------------------------------------------------------------
    */
   setTimeout(function () {
        $('#galleryTabContent').find('.active').find('.gallery-overlay').fadeOut();
   }, 1000 );

   $('#galeria .tab-item .btn').click(function(){
        let control = $(this).attr('aria-controls');
        console.log(control);
        $('.gallery-overlay').fadeIn();
        setTimeout(function () {
            $(`#${control}`).find('.gallery-overlay').fadeOut('slow');
        }, 500 );
   });

   $('#verMasModelos').click(function(){
        setTimeout(function () {
            $('.gallery-overlay').fadeOut('slow');
        }, 500 );
   });
   $('.buttons-next-prev-plantas .next a').text('›');
   $('.buttons-next-prev-plantas .prev a').text('‹');

   $('.formulario-general .input-group-text').fadeOut();

   $('.formulario-general input').on('focus',function(){
        $(this).parents('.form-group').find('.label').addClass('activelabel');
        $(this).parents('.form-group').find('.input-group-text').fadeIn();
    });
    $('.formulario-general textarea').on('focus',function(){
        $(this).parent('.form-group').find('.label').addClass('activelabel')
    });
    $('.formulario-general textarea').on('blur',function(){
        let length = $(this).val();
        console.log(length.length)
        if(length.length > 0){
            $(this).parent('.form-group').find('.label').addClass('activelabel')
        } else {
            $(this).parent('.form-group').find('.label').removeClass('activelabel')
        }
    });
    $('.formulario-general input').on('blur',function(){
        let length = $(this).val();
        console.log(length.length)
        if(length.length > 0){
            $(this).parents('.form-group').find('.label').addClass('activelabel')
        } else {
            $(this).parents('.form-group').find('.label').removeClass('activelabel');
            $(this).parents('.form-group').find('.input-group-text').fadeOut('fast')
        }
    });
    
  /* 
	------------------------------------------------------------------
		Video Background
	------------------------------------------------------------------
    */

   var videoSrc = "";
   $(".playvideo").click(function () {
     videoSrc = $(this).data("src");
   });
 
   // when the modal is opened autoplay it
   $("#homeVideo").on("shown.bs.modal", function (e) {
     $("#video").attr("src", videoSrc);
   });
 
   $("#homeVideo").on("hide.bs.modal", function (e) {
     $("#video").attr("src", videoSrc);
   });
    /* 
	------------------------------------------------------------------
		Carousel de proyectos 
	------------------------------------------------------------------
    */

    $('#edificio-1-tab').addClass('active');
    $('#edificio-1').addClass('active show');
    $('#plan-1-tab').addClass('active');
    $('#plan-1').addClass('active show');
    $('#planB-1-tab').addClass('active')
    //$('#planB-2-tab').addClass('general-slide-nav')

   $('.project-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        items:2,
        dots:false,
        autoplayTimeout: 4000,
    });

    $('.pm3-carousel').owlCarousel({
        //loop: true,
        //nav:true,
        items: 1,
        //autoplay: true,
        autoplayTimeout: 7000
    });

    $('.arquitectura-carousel').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        singleItem : true,
        animateIn: 'fadeIn', // add this
        animateOut: 'fadeOut' // and this
    });

    $('.master-carousel').owlCarousel({
        items: 1,
    });

    $('.gallery-caarousel').owlCarousel({
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 3
            }
        },
        center: true,
        loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: 7000,
        //smartSpeed: 500

    });

    setTimeout(function () {

        var totalItems = $('.ppp-carousel .owl-item.active').length;
        if (totalItems > 3) {

            $('.ppp-carousel').owlCarousel({
                loop: false,
            });
        } else {

            $('.ppp-carousel').owlCarousel({
                loop: true,
            });
        }

    }, 0);


    $('.generalowl').owlCarousel({
        loop: true,
        autoplay: true,
        dots: true,
        autoplayTimeout: 7000,
        autoplaySpeed: 1000,
        //nav:true,
        responsive: {
            0: {
                items: 1
            }
        }
    });

    /* 
	------------------------------------------------------------------
		Filtro de proyectos
	------------------------------------------------------------------
    */
    var d1 = $('#plantas').find('.planta.active.1dorm').length;
    var d2 = $('#plantas').find('.planta.active.2dorm').length;
    var d3 = $('#plantas').find('.planta.active.3dorm').length;
    var d4 = $('#plantas').find('.planta.active.4dorm').length;
    if (!d1) {
        $('#1dorm').parent().remove();
    }
    if (!d2) {
        $('#2dorm').parent().remove();
    }
    if (!d3) {
        $('#3dorm').parent().remove();
    }
    if (!d4) {
        $('#4dorm').parent().remove();
    }

    var num_opt = $(".filter_list").find("li").length;
    var ancho_total = $(".filter_list").width();
    var ancho_elemento = ancho_total / num_opt;

    $('.filter_list_item').each(function () {
        $('.filter_list_item').css("width", ancho_elemento);
    });

    $('.filter_list_item').on('click', function () {
        var product_id = $(this).attr('id');
        $('#plantas').find('.planta').fadeOut('fast');
        $('.planta.' + product_id).fadeIn('slow');
        $('.filter_list_item').removeClass('active');
        $(this).addClass('active');
    });

    $('#todo').on('click', function () {
        $('#plantas').find('.planta').fadeIn();
    });
    /* 
	------------------------------------------------------------------
		Mapa
	------------------------------------------------------------------
    */
   
   $('.changeMapButton').click(function(e){
       e.preventDefault();
       let x = $('.changeMapButtonSpan').text(),
       y = $('.mapImg').height();
       
       $('.projectMap iframe').height(y);
       
       if (x === 'maps') {
           $('.changeMapButtonSpan').text('volver')
       } else {
           $('.changeMapButtonSpan').text('maps');
       } 

       
        $('.mapImg').toggleClass('mapActive');
        $('.projectMap').toggleClass('mapActive');
   });

    var igAbsoluteHeight = $('.img-absolute').height();

    $('.bg-img').height(igAbsoluteHeight);
    $('.contactoModalBtn').on('click', function () {
        $('#contacto-form-modal').modal('show')
    });

    /* 
	------------------------------------------------------------------
		Formularios
	------------------------------------------------------------------
    */
   if (project_data.data !== ""){
       var nombreProyecto = project_data.data[0].nombreProyecto,
        correosVentas= project_data.data[0].correosVentas,
        logoProyecto = project_data.data[0].logoProyecto,
        imagenPlanta = project_data.data[0].imagenPlanta,
        dormitorios = project_data.data[0].dormitorios
        imgPlanta = project_data.data[0].imgPlanta
        esquicio = project_data.data[0].esquicio
        corresponde = project_data.data[0].corresponde
        unidades = project_data.data[0].unidades

        superficieUtil = project_data.data[0].superficieUtil,
        superficieTerraza = project_data.data[0].superficieTerraza,
        superficieTotal = project_data.data[0].superficieTotal,
        sbjMedio = sbjs.get.current.mdm,
        sbjFuente = sbjs.get.current.src;
   
       //console.log(nombreProyecto, textoProyecto, imagenDestacadaUno, imagenDestacadaDos,imagenDestacadaTres, direccionSv, comuna, telefonoSv, emailSv, sbjMedio, sbjFuente)
   
       $('#nombreProyecto').val(nombreProyecto);
       $('#correosVentas').val(correosVentas);
       $('#logoProyecto').val(logoProyecto);
       $('#imagenPlanta').val(imagenPlanta);
       $('#dormitorios').val(dormitorios);
       $('#imgPlanta').val(imgPlanta);
       $('#esquicio').val(esquicio);
       $('#corresponde').val(corresponde);
       $('#unidades').val(unidades);

       $('#superficieUtil').val(superficieUtil);
       $('#superficieTerraza').val(superficieTerraza);
       $('#superficieTotal').val(superficieTotal);
       $('#fuenteSbj').val(sbjFuente);
       $('#medioSbj').val(sbjMedio);
   }

   $('#agendarConCalenly').on('click', function(){
       console.log('ga event Agendar')
       dataLayer.push({
        'event': 'calendlyOpen',
        });
       Calendly.initPopupWidget({url: 'https://calendly.com/ibrick/30min'});return false;
   })

   $('#whatsappButton').on('click', function(){
        console.log('ga event Whatsapp')
        dataLayer.push({
            'event': 'whatsappOpen',
        });
    })

    $('.cotizacionHit').on('click', function(){
        console.log('ga event Intención de cotización');
        fbq('track', 'Lead');
        dataLayer.push({
            'event': 'formClick',
        });
        console.log(dataLayer);
    })

   
    /* 
	------------------------------------------------------------------
		Validacion de Formularios
	------------------------------------------------------------------
    */
    $(".wpcf7").on('wpcf7mailsent', function (event) {
        console.log("ga event Formulario")

        dataLayer.push({
            'event': 'formSubmit',
        });


        Swal.fire({
            title: 'Mensaje enviado',
            text: '¡Gracias por cotizar en brick Inmobiliaria, pronto un ejecutivo te contactará!',
            icon: 'success',
            confirmButtonText: 'cerrar'
        })
        $('.form-modal').removeClass('form-modal-open');
    });

    $(".wpcf7").on('wpcf7mailfailed', function (event) {
        console.log("failed")
        Swal.fire({
            title: '¡Error!',
            text: '¡Ha ocurrido un error, por favor intentalo de nuevo más tarde!',
            icon: 'error',
            confirmButtonText: 'cerrar'
        })
        $('.form-modal').removeClass('form-modal-open');
    });

    $(".wpcf7").on('wpcf7invalid', function () {
        console.log("invalid")
    });

    $(".wpcf7").on('wpcf7submit', function () {
        console.log("wpcf7submit");
    });

    /* 
	------------------------------------------------------------------
		Validacion de Formularios
	------------------------------------------------------------------
    */

    // Validador de Formulario de contacto
    $('.formulario_cotizar').validate({
        rules: {
            inputName: {
                required: true,
                lettersonly: true,
            },
            inputEmail: {
                required: true,
                email: true,
            },
            inputRut: {
                required: false,
                Rut: true,
            },
            inputTelefono: {
                required: true,
                digits: true,
                minlength: 9,
                maxlength: 9,
            },
            texAreaMensaje: {
                required: false,
            }
        },
        messages: {
            inputName: "Ingresa solo letras.",
            inputEmail: {
                required: "Es necesario tu dirección de correo",
                email: "El formato de tu email debe ser similar a: name@domain.com"
            },
            inputRut: "Ingresa un RUT valido.",
            inputTelefono: {
                required: "Ingresa tu numero de telefono",
                minlength: jQuery.validator.format("Introduce al menos {0} carácteres."),
            }
        },
        submitHandler: function (form) {},
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error)
        },
    });
    //Mensajes Personalizados
    jQuery.extend(jQuery.validator.messages, {
        digits: "Por favor ingresa sólo números."
    });
    //Verificación de rut desde plugin, solo muestra datos en consola
    $('.Rut').Rut({
        on_error: function () {
            console.log('Rut invalido');
        },
        on_success: function () {
            console.log('RUT válido')
        },
        format_on: 'keyup',
        //digito_verificador: "#digito-verificador",
        //format: false,
    });

    $('.formulario_cotizar').on('keyup keypress', function (e) {
        if ($(this).valid()) {
            $(this).find('.boton_enviar').prop('disabled', false);
        } else {
            $(this).find('.boton_enviar').prop('disabled', true);
        }
    });
    //Añade metodo RUT al validador
    $.validator.addMethod("Rut", function (value, element) {
        if ($.Rut.validar(value)) {
            return true;
        } else {
            return false;
        }
    }, "Debe ser un rut valido.");

    // Validación de sólo letras y espacio
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Por favor ingresa sólo letras.");

    /* 
	------------------------------------------------------------------
		Active Menu items
	------------------------------------------------------------------
    */

    (function highlightNav() {
        var prev; //keep track of previous selected link
        var isVisible= function(el){
            el = $(el);
            
            if(!el || el.length === 0){
                return false
            };
    
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();
            
            var elemTop = el.offset().top;
            var elemBottom = elemTop + el.height();
            return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom));
        }
            
        $(window).scroll(function(){
            $('#projectMenu a').each(function(index, el){
                el = $(el);
                if(isVisible(el.attr('href'))){
                    if(prev){
                        prev.removeClass('active');
                    }
                    el.addClass('active');
                    prev = el;
                    
                    //break early to keep highlight on the first/highest visible element
                    //remove this you want the link for the lowest/last visible element to be set instead
                    return false; 
                }
            });
        });
        
        //trigger the scroll handler to highlight on page load
        $(window).scroll();
    })();

});