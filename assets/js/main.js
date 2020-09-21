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
	*/

    $(window).on('load', function () {
        $('.cd-loader').fadeOut('slow', function () {
            $(this).remove();
        });
    });
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
        } else {
            $('.menu-nav-fixed').fadeOut();
            $('.follow-button-pay').fadeOut();
        }

    });
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

   $('.formulario-general input').on('focus',function(){
        $(this).parent('.form-group').find('.label').addClass('activelabel')
    });
    $('.formulario-general input').on('blur',function(){
        let length = $(this).val();
        console.log(length.length)
        if(length.length > 0){
            $(this).parent('.form-group').find('.label').addClass('activelabel')
        } else {
            $(this).parent('.form-group').find('.label').removeClass('activelabel')
        }
    });
    
    /* 
	------------------------------------------------------------------
		MasterPlan
	------------------------------------------------------------------
    
   $('#masterPlanContent1').addClass('active');
   $('#masterPlanContent .item').not('.active').fadeOut();
   $('#masterPlanSlideNav a').click(function(e){
       e.preventDefault();
       $('#masterPlanContent .item.active').fadeOut();
        $('#masterPlanContent .item').not('.active').fadeIn('fast');
        $('#masterPlanContent .item').toggleClass('active')
   })*/

    /* 
	------------------------------------------------------------------
		Proyectos loop
	------------------------------------------------------------------
    
    $.each(project_data.data, function (k, v) {

        if (v.estado != 'proximo') {
            $('.bk--proyectos__venta-menu').append(
                '<li class="my-3">\n\
                    <a class="bk-projectcart--link " href="' + v.url + '">\n\
                        <h4 class="bk-projectcart--text__title">' + v.region + '</h4>\n\
                        <p class="bk-projectcart--text__p">' + v.title + '</p>\n\
                        <span class="bk-projectcart--text__span"></span>\n\
                    </a>\n\
                </li>');
            var elements = '<article class="col-sm-4 col-md-6 col-lg-4 p-0">\n\
            <a href="' + v.url + '">\n\
            <div class="card" style="min-height:100%">\n\
                <img src="' + v.detalles_img + '">\n\
                <div class="card-header">\n\
                    <h4 class="card-text card--title text-white text-uppercase">' + v.title + '<br><small><small>' + v.region + '</small></small></h4>\n\
                </div>\n\
                <div class="card-body">\n\
                </div>'
            if (v.tag_del_ptroyecto == undefined || v.tag_del_ptroyecto == null || v.tag_del_ptroyecto == "Normal") {
                elements += '</div>\n\
                </a>\n\
            </article>';
            } else {
                var x = v.tag_color;
                elements += '<div class="card-footer text-white text-center text-uppercase" style="background:' + ((!v.tag_color.indexOf("#") || v.tag_color == "transparent") ? v.tag_color : '#12233F') + '">' + v.tag_del_ptroyecto + '</div>\n\
                </div>\n\
                </a>\n\
            </article>';
            }
            //Selector de proyecto
            $('.bk--proyectos').append(elements);

        }
    });
    //carousel
    $.each(project_data.data, function (k, v) {
        $('.bk--proyectos__carousel').append(
            '<div class="item">\n\
                <a class="bk-projectcart--link" href="' + v.url + '">\n\
                    <picture>\n\
                        <source media="(min-width: 768px)" srcset="' + v.thumbnail + '">\n\
                        <img src="' + v.thumbnail + '" class="w-100">\n\
                    </picture>\n\
                </a>\n\
            </div>');
        return k < 3;
    });
    */
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

    /* $('.miniPlantasowl').owlCarousel({
        dots: true,
        items: 1
    }); */

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
		Plantas
	------------------------------------------------------------------
    
    var existenPlantas = $('.bk-planta-item').data();
    if (existenPlantas) {
        $(window).on('load', function () {
            
            //console.log((existenPlantas));
            var plantaData = Object.entries(existenPlantas).reverse();
            $.each(plantaData, function (k, v) {
                //console.log(v[0]);

                $('.bk-planta-data-wrap').append( //px-1 px-lg-2 py-lg-2
                    '<li class="">\n\
                        <a class="bk-planta-type text-white bk--btn bk--btn__primary text-uppercase" href="#" data-img="' + v[1] + '">' + ((v[0].charAt(0) == "1" || v[0].charAt(0) == "2") ? v[0].slice(0).charAt(0, ' ') + ' piso' : v[0]) + '\n\
                        </a>\n\
                    </li>'
                )
            });

            $('.bk-planta-data-wrap li:first-child a').removeClass('bk--btn__primary').addClass('bk--btn__secondary');
            var plantaActiva = $('.bk-planta-data-wrap li:first-child a').data('img');
            $('.bk-planta-img--link').attr('href', plantaActiva);
            $('.bk-planta-img--content').attr('src', plantaActiva)


            $("#plantas").delegate('.bk-planta-item', 'click', function (e) {
                e.preventDefault();
                $('.bk-planta-data-wrap').empty();
                var plantaData = $(this).data();
                $.each(plantaData, function (k, v) {
                    $('.bk-planta-data-wrap').append(
                        '<li class="pl-1">\n\
                            <a class="bk-planta-type text-white bk--btn bk--btn__primary text-uppercase" href="#" data-img="' + v + '">' + k + '\n\
                            </a>\n\
                        </li>'
                    )
                });
                $('.bk-planta-data-wrap li:first-child a').removeClass('bk--btn__primary').addClass('bk--btn__secondary');
                var plantaActiva = $('.bk-planta-data-wrap li:first-child a').data('img');
                $('.bk-planta-img--link').attr('href', plantaActiva);
                $('.bk-planta-img--content').attr('src', plantaActiva);
            });

            $("#plantas").delegate(".bk-planta-type", "click", function (e) {
                e.preventDefault();
                var plantaActiva = $(this).data('img');
                $('.bk-planta-data-wrap').find('.bk--btn__secondary').addClass('bk--btn__primary').removeClass('bk--btn__secondary');
                $(this).addClass('bk--btn__secondary');
                $('.bk-planta-img--link').attr('href', plantaActiva);
                $('.bk-planta-img--content').attr('src', plantaActiva);
            });

            var num_opt = $(".bk-planta-data-wrap").find("li").length;
            var ancho_total = $(".bk-planta-data-wrap").width();
            var ancho_elemento = ancho_total / num_opt;
            $('.bk-planta-data-wrap li').each(function () {
                $('.bk-planta-data-wrap li').css("width", ancho_elemento);
            });

        });
    }
    */

    /* 
	------------------------------------------------------------------
		Formularios
	------------------------------------------------------------------
    */
    var nombreProyecto = project_data.data[0].nombreProyecto,
        logoProyecto = project_data.data[0].logoProyecto,
        imagenPlanta = project_data.data[0].imagenPlanta,
        comuna = project_data.data[0].comuna
        superficieUtil = project_data.data[0].superficieUtil,
        superficieTerraza = project_data.data[0].superficieTerraza,
        superficieTotal = project_data.data[0].superficieTotal,
        sbjMedio = sbjs.get.current.mdm,
        sbjFuente = sbjs.get.current.src;

    //console.log(nombreProyecto, textoProyecto, imagenDestacadaUno, imagenDestacadaDos,imagenDestacadaTres, direccionSv, comuna, telefonoSv, emailSv, sbjMedio, sbjFuente)

    $('#nombreProyecto').val(nombreProyecto);
    $('#logoProyecto').val(logoProyecto);
    $('#imagenPlanta').val(imagenPlanta);
    $('#comuna').val(comuna);
    $('#superficieUtil').val(superficieUtil);
    $('#superficieTerraza').val(superficieTerraza);
    $('#superficieTotal').val(superficieTotal);
    $('#fuenteSbj').val(sbjFuente);
    $('#medioSbj').val(sbjMedio);

    /* 
	------------------------------------------------------------------
		Validacion de Formularios
	------------------------------------------------------------------
    */
    $(".wpcf7").on('wpcf7mailsent', function (event) {
        console.log("send")
        Swal.fire({
            title: 'Mensaje enviado',
            text: '¡Gracias por cotizar en brick Inmobiliaria, pronto un ejecutivo te contactará!',
            icon: 'success',
            confirmButtonText: 'cerrar'
        })
    });

    $(".wpcf7").on('wpcf7mailfailed', function (event) {
        console.log("failed")
        Swal.fire({
            title: '¡Error!',
            text: '¡Ha ocurrido un error, por favor intentalo de nuevo más tarde!',
            icon: 'error',
            confirmButtonText: 'cerrar'
        })
    });

    $(".wpcf7").on('wpcf7invalid', function () {
        console.log("invalid")
    });

    $(".wpcf7").on('wpcf7submit', function () {
        console.log("wpcf7submit")
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
    $('#inputRut').Rut({
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
            $('#boton_enviar').prop('disabled', false);
        } else {
            $('#boton_enviar').prop('disabled', true);
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
 /*   $('#projectMenu a').click(function(event){
        
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          var target = $(this.hash);

          $('html, body').animate({
            scrollTop: target.offset().top
          }, 200, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
   }); */

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