$(function () {
  // SBJS
  sbjs.init();
  // Menú Hamburguer
  const setDataToSend = () => {
    try {
      var nombreProyecto = project_data.data[0].nombreProyecto,
        correosVentas = project_data.data[0].correosVentas,
        logoProyecto = project_data.data[0].logoProyecto,
        imagenPlanta = project_data.data[0].imagenPlanta,
        dormitorios = project_data.data[0].dormitorios,
        imgPlanta = project_data.data[0].imgPlanta,
        esquicio = project_data.data[0].esquicio,
        corresponde = project_data.data[0].corresponde,
        unidades = project_data.data[0].unidades,
        whatsapp = project_data.data[0].whatsapp;
      (superficieUtil = project_data.data[0].superficieUtil),
        (superficieTerraza = project_data.data[0].superficieTerraza),
        (superficieTotal = project_data.data[0].superficieTotal),
        $('.nombreProyecto').val(nombreProyecto);
      $('.correosVentas').val(correosVentas);
      $('.logoProyecto').val(logoProyecto);
      $('.imagenPlanta').val(imagenPlanta);
      $('.dormitorios').val(dormitorios);
      $('.imgPlanta').val(imgPlanta);
      $('.esquicio').val(esquicio);
      $('.corresponde').val(corresponde);
      $('.unidades').val(unidades);
      $('.whatsappProject').val(whatsapp);

      $('.superficieUtil').val(superficieUtil);
      $('.superficieTerraza').val(superficieTerraza);
      $('.superficieTotal').val(superficieTotal);
    } catch (error) {
      console.log(error);
    }
  };

  $('.colapse-hamburger').on('click', function () {
    $(this).toggleClass('is-active');
  });

  $('.slide-nav-button').on('click', function () {
    $('.bk-primary-nav').toggleClass('loaded');
    $(this).toggleClass('is-active');
  });

  $('#projectMenuBig a').on('click', function () {
    $('.bk-primary-nav').toggleClass('loaded');
    $('.slide-nav-button').toggleClass('is-active');
  });
  $('#projectMenu a').on('click', function (e) {
    e.preventDefault();

    let navBarOpen = $('#navbarNav2').is('.show');
    if (navBarOpen) {
      $('#navbarNav2').toggleClass('show');
      $('#proyectosMenu .colapse-hamburger').toggleClass('is-active');
    }

    let navbarAnchor = $(this).attr('href'),
      anchorElemente = $(navbarAnchor).offset().top - 120;
    $('html,body').animate({ scrollTop: anchorElemente }, 'fast');
  });

  // Contextuales
  $('#contactFloatingForm').on('click', function (e) {
    e.preventDefault();
    $('.form-modal').addClass('form-modal-open');
  });
  $('#formModalClose').on('click', function (e) {
    e.preventDefault();
    $('.form-modal').removeClass('form-modal-open');
  });
  $('#whatsappButton').on('click', function (e) {
    e.preventDefault();
    $('.whatsapp-modal').addClass('whatsapp-modal-open');
  });
  $('.whatsappModalClose').on('click', function (e) {
    e.preventDefault();
    const isHome = $('.ws-project');
    if (isHome) {
      $('.ws-project').show();
      $('.ws-form').addClass('d-none');
    }
    $('.whatsapp-modal').removeClass('whatsapp-modal-open');
  });
  $('.whatsappProjectSelector').on('click', function (e) {
    e.preventDefault();
    if (project_data?.data) {
      const newData = {
        nombreProyecto: $(this).data('name'),
        whatsapp: $(this).data('whatsapp'),
        correosVentas: $(this).data('correo'),
      };
      project_data.data.push(newData);
      setDataToSend();
    }

    $('.ws-project').hide();
    $('.ws-form').removeClass('d-none');
  });

  // Menú fixed
  $('.menu-nav-fixed').fadeOut();
  $('.follow-button-pay').fadeOut();

  $(window).scroll(function () {
    // if ($(this).scrollTop() >= 731) {
    //   $(".follow-button-pay").removeClass("d-none").addClass("d-flex");
    // } else {
    //   $(".follow-button-pay").removeClass("d-flex").addClass("d-none");
    // }

    if ($(this).scrollTop() >= 730) {
      $('.menu-nav-fixed').fadeIn();
      $('.follow-button-pay').fadeIn();
      if (window.location.pathname.indexOf('proyectos') != 1) {
        $('.main-menu').addClass('fixed-menu-primary');
      }
    } else {
      $('.menu-nav-fixed').fadeOut();
      $('.follow-button-pay').fadeOut();
      if (window.location.pathname.indexOf('proyectos') != 1) {
        $('.main-menu').removeClass('fixed-menu-primary');
      }
    }
  });

  let locationPatName = window.location.pathname;
  setPrimaryLink(locationPatName);

  function setPrimaryLink(locationPatName) {
    const parts = locationPatName.split('/');
    const lastPart = parts[parts.length - 2];
    $('.main-menu').find(`.link-${lastPart}`).addClass('link-active');
  }

  // Galería
  setTimeout(function () {
    $('#galleryTabContent').find('.active').find('.gallery-overlay').fadeOut();
  }, 1000);

  $('#galeria .tab-item .btn').click(function () {
    let control = $(this).attr('aria-controls');
    $('.gallery-overlay').fadeIn();
    setTimeout(function () {
      $(`#${control}`).find('.gallery-overlay').fadeOut('slow');
    }, 500);
  });

  $('#verMasModelos').click(function () {
    setTimeout(function () {
      $('.gallery-overlay').fadeOut('slow');
    }, 500);
  });
  $('.buttons-next-prev-plantas .next a').text('›');
  $('.buttons-next-prev-plantas .prev a').text('‹');

  $('.formulario-general .input-group-text').fadeOut();

  $('.formulario-general input').on('focus', function () {
    $(this).parents('.form-group').find('.label').addClass('activelabel');
    $(this).parents('.form-group').find('.input-group-text').fadeIn();
  });
  $('.formulario-general textarea').on('focus', function () {
    $(this).parent('.form-group').find('.label').addClass('activelabel');
  });
  $('.formulario-general textarea').on('blur', function () {
    let length = $(this).val();
    if (length.length > 0) {
      $(this).parent('.form-group').find('.label').addClass('activelabel');
    } else {
      $(this).parent('.form-group').find('.label').removeClass('activelabel');
    }
  });
  $('.formulario-general input').on('blur', function () {
    let length = $(this).val();
    if (length.length > 0) {
      $(this).parents('.form-group').find('.label').addClass('activelabel');
    } else {
      $(this).parents('.form-group').find('.label').removeClass('activelabel');
      $(this).parents('.form-group').find('.input-group-text').fadeOut('fast');
    }
  });

  // Video Background
  var videoSrc = '';
  $('.playvideo').click(function () {
    videoSrc = $(this).data('src');
  });

  // when the modal is opened autoplay it
  $('#homeVideo').on('shown.bs.modal', function (e) {
    $('#video').attr('src', videoSrc);
  });

  $('#homeVideo').on('hide.bs.modal', function (e) {
    $('#video').attr('src', '');
  });

  // Carousel de proyectos
  $('#edificio-1-tab').addClass('active');
  $('#edificio-1').addClass('active show');
  $('#plan-1-tab').addClass('active');
  $('#plan-1').addClass('active show');
  $('#planB-1-tab').addClass('active');
  //$('#planB-2-tab').addClass('general-slide-nav')

  $('.project-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    items: 2,
    dots: false,
    autoplayTimeout: 4000,
  });

  $('.pm3-carousel').owlCarousel({
    //loop: true,
    //nav:true,
    items: 1,
    //autoplay: true,
    autoplayTimeout: 7000,
  });

  $('.arquitectura-carousel').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    singleItem: true,
    animateIn: 'fadeIn', // add this
    animateOut: 'fadeOut', // and this
  });

  $('.master-carousel').owlCarousel({
    items: 1,
  });

  $('.gallery-caarousel').owlCarousel({
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 3,
      },
    },
    center: true,
    loop: true,
    nav: true,
    autoplay: true,
    autoplayTimeout: 7000,
    //smartSpeed: 500
  });

  var carousel = $('.beneficios-carousel');
  carousel.find('.item').hide();
  carousel
    .on({
      'initialized.owl.carousel': function () {
        carousel.find('.item').show();
        carousel.find('.loading-placeholder').hide();
      },
    })
    .owlCarousel({
      dots: true,
      margin: 10,
      loop: true,
      items: 4,
      // stagePadding: 100,
      nav: true,
      navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>',
      ],
      responsive: {
        0: {
          items: 2,
        },
        768: {
          items: 3,
        },
        991: {
          items: 4,
        },
      },
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
        items: 1,
      },
    },
  });

  $('.flip').hover(function () {
    $(this).find('.fcard').toggleClass('flipped');
  });

  if (window.innerWidth >= 768) {
    $('.link-residencial').mouseenter(function () {
      $(this).find('.drop-menu').show();
    });
    $('.link-residencial').mouseleave(function () {
      $(this).find('.drop-menu').hide();
    });
  } else {
    $('.drop-menu').show();
  }

  $('#whatsappButtonAd').hide();

  setTimeout(function () {
    $('#whatsappButtonAd').fadeIn();
  }, 6000);

  // Filtro de proyectos
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

  var num_opt = $('.filter_list').find('li').length;
  var ancho_total = $('.filter_list').width();
  var ancho_elemento = ancho_total / num_opt;

  $('.filter_list_item').each(function () {
    $('.filter_list_item').css('width', ancho_elemento);
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

  // Mapa
  $('.changeMapButton').click(function (e) {
    e.preventDefault();
    let x = $('.changeMapButtonSpan').text(),
      y = $('.mapImg').height();

    $('.projectMap iframe').height(y);

    if (x === 'maps') {
      $('.changeMapButtonSpan').text('volver');
    } else {
      $('.changeMapButtonSpan').text('maps');
    }

    $('.mapImg').toggleClass('mapActive');
    $('.projectMap').toggleClass('mapActive');
  });

  var igAbsoluteHeight = $('.img-absolute').height();

  $('.bg-img').height(igAbsoluteHeight);
  $('.contactoModalBtn').on('click', function () {
    $('#contacto-form-modal').modal('show');
  });

  // Formularios
  if ($('body').is('.page-bodegas')) {
    $('.contactoModalBtn').on('click', function () {
      project = $(this).data('project');
      $('.nombreProyecto').val('Bodegas - ' + project);
    });
  }

  if (project_data.data.length > 0) {
    setDataToSend();
  }

  (sbjMedio = sbjs.get.current.mdm), (sbjFuente = sbjs.get.current.src);

  $('.fuenteSbj').val(sbjFuente);
  $('.medioSbj').val(sbjMedio);

  $('#agendarConCalenly').on('click', function () {
    Calendly.initPopupWidget({ url: 'https://calendly.com/ibrick/30min' });
    return false;
  });

  $('#whatsappButton').on('click', function () {});

  $('.boton_enviar_whatsapp').on('click', function () {});

  $('.cotizacionHit').on('click', function () {});

  // Validacion de Formularios
  $('.wpcf7Whatsapp').on('wpcf7mailsent', function (event) {
    const leadEmail = event.detail.inputs[7].value;
    const leadPhone = event.detail.inputs[10].value;
    dataLayer.push({
      event: 'wspLeadConversion',
      leadEmail,
      leadPhone,
      wspProjectTitle: event.detail.inputs[0].value,
    });
    const telefonoProyectoWhatsapp = event.detail.inputs[3].value,
      nombreProyectoWhatsapp = event.detail.inputs[0].value,
      nombreClienteWhatsapp = event.detail.inputs[7].value;
    url = `https://api.whatsapp.com/send/?phone=${telefonoProyectoWhatsapp}&text=Mi%20nombre%20es%20${nombreClienteWhatsapp}%20Me%20interesa%20el%20%20proyecto%20${nombreProyectoWhatsapp}`;
    $('.whatsapp-modal').removeClass('whatsapp-modal-open');
    window.open(url, '_blank');
    const isHome = $('.ws-project');
    if (isHome) {
      $('.ws-project').show();
      $('.ws-form').addClass('d-none');
      $('.whatsapp-modal').removeClass('whatsapp-modal-open');
    }
  });
  $('.wpcf7Floatante').on('wpcf7mailsent', function (event) {
    let contactName = event.target['inputNameFloatante']?.value || '';

    Swal.fire({
      title: `¡Gracias ${contactName} por contactarnos!`,
      iconHtml:
        '<img src="https://ibrick.cl/wp-content/uploads/2022/08/happy.png" width="90">',
      customClass: {
        icon: 'no-border',
      },
      html: `<div class="d-flex flex-column align-items-center justify-content-center w-100">
      <p>Pronto un ejecutivo te contactará.</p>
      <p>Cuéntale a un amigo sobre Brick Inmobiliaria</p>
      <div>
        <a href="https://www.addtoany.com/add_to/facebook?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/facebook.svg" width="32" height="32" style="background-color:royalblue"></a>
        <a href="https://www.addtoany.com/add_to/twitter?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/twitter.svg" width="32" height="32" style="background-color:rgb(29, 155, 240)"></a>
        <a href="https://www.addtoany.com/add_to/email?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/email.svg" width="32" height="32" style="background-color:royalblue"></a>
        <a href="https://www.addtoany.com/add_to/whatsapp?linkurl=${window.location.href};linkname=${document.title}" target="_blank"><img src="https://static.addtoany.com/buttons/whatsapp.svg" width="32" height="32" style="background-color:rgb(18, 175, 10)"></a>
      </div>
    </div>`,
      icon: 'success',
      confirmButtonText: 'Cerrar',
    });
    $('.form-modal').removeClass('form-modal-open');
  });

  $('.wpcf7Floatante').on('wpcf7mailfailed', function (event) {
    console.log('failed');
    Swal.fire({
      title: '¡Error!',
      text: '¡Ha ocurrido un error, por favor intentalo de nuevo más tarde!',
      icon: 'error',
      confirmButtonText: 'Cerrar',
    });
    $('.form-modal').removeClass('form-modal-open');
  });

  $('.brickcf7').on('wpcf7mailfailed', function (event) {
    console.log('failed');
    Swal.fire({
      title: '¡Error!',
      text: '¡Ha ocurrido un error, por favor intentalo de nuevo más tarde!',
      icon: 'error',
      confirmButtonText: 'Cerrar',
    });
    $('.form-modal').removeClass('form-modal-open');
  });

  // Validacion de Formularios
  // Validador de Formulario de whatsapp
  $('#formulario_floatante').validate({
    rules: {
      inputNameFloatante: {
        required: true,
        lettersonly: true,
      },
      inputEmailFloatante: {
        required: true,
        email: true,
      },
      inputRutFloatante: {
        required: true,
        Rut: true,
      },
      inputTelefonoFloatante: {
        required: true,
        digits: true,
        minlength: 9,
        maxlength: 9,
      },
    },
    messages: {
      inputNameFloatante: 'Ingresa solo letras.',
      inputEmailFloatante: {
        required: 'Es necesario tu dirección de correo',
        email: 'El formato de tu email debe ser similar a: name@domain.com',
      },
      inputRutCotizar: 'Ingresa un RUT valido.',
      inputTelefonoFloatante: {
        required: 'Ingresa tu numero de telefono',
        minlength: jQuery.validator.format(
          'Introduce al menos {0} carácteres.'
        ),
      },
    },
    submitHandler: function (form) {},
    errorPlacement: function (error, element) {
      $(element).parents('.form-group').append(error);
    },
  });
  // Validador de Formulario de whatsapp
  $('#formulario_whatsapp').validate({
    rules: {
      inputNameWhatsapp: {
        required: true,
        lettersonly: true,
      },
      inputEmailWhatsapp: {
        required: true,
        email: true,
      },
      inputRutWhatsapp: {
        required: true,
        Rut: true,
      },
      inputTelefonoWhatsapp: {
        required: true,
        digits: true,
        minlength: 9,
        maxlength: 9,
      },
    },
    messages: {
      inputNameWhatsapp: 'Ingresa solo letras.',
      inputEmailWhatsapp: {
        required: 'Es necesario tu dirección de correo',
        email: 'El formato de tu email debe ser similar a: name@domain.com',
      },
      inputRutWhatsapp: 'Ingresa un RUT valido.',
      inputTelefonoWhatsapp: {
        required: 'Ingresa tu numero de telefono',
        minlength: jQuery.validator.format(
          'Introduce al menos {0} carácteres.'
        ),
      },
    },
    submitHandler: function (form) {},
    errorPlacement: function (error, element) {
      $(element).parents('.form-group').append(error);
    },
  });
  // Validador de Formulario de contacto
  $('#formulario_inicial').validate({
    rules: {
      inputNameContact: {
        required: true,
      },
      inputRutContact: {
        required: false,
        Rut: true,
      },
      inputEmailContact: {
        required: true,
        email: true,
      },
      inputTelefonoContact: {
        required: true,
        digits: true,
        minlength: 9,
        maxlength: 9,
      },
      texAreaMensajeContact: {
        required: false,
      },
    },
    messages: {
      inputNameContact: 'Ingresa solo letras.',
      inputRutContact: 'Ingresa un RUT valido.',
      inputEmailContact: {
        required: 'Es necesario tu dirección de correo',
        email: 'El formato de tu email debe ser similar a: name@domain.com',
      },
      inputTelefonoContact: {
        required: 'Ingresa tu numero de telefono',
        minlength: jQuery.validator.format(
          'Introduce al menos {0} carácteres.'
        ),
      },
    },
    submitHandler: function (form) {},
    errorPlacement: function (error, element) {
      $(element).parents('.form-group').append(error);
    },
  });
  // Validador de Formulario de cotización
  $('#formulario_cotizar_proyecto').validate({
    rules: {
      inputNameCotizar: {
        required: true,
      },
      inputRutCotizar: {
        required: false,
        Rut: true,
      },
      inputEmailCotizar: {
        required: true,
        email: true,
      },
      inputTelefonoCotizar: {
        required: true,
        digits: true,
        minlength: 9,
        maxlength: 9,
      },
      texAreaMensajeCotizar: {
        required: false,
      },
    },
    messages: {
      inputNameCotizar: 'Ingresa solo letras.',
      inputRutCotizar: 'Ingresa un RUT valido.',
      inputEmailCotizar: {
        required: 'Es necesario tu dirección de correo',
        email: 'El formato de tu email debe ser similar a: name@domain.com',
      },
      inputTelefonoCotizar: {
        required: 'Ingresa tu numero de telefono',
        minlength: jQuery.validator.format(
          'Introduce al menos {0} carácteres.'
        ),
      },
    },
    submitHandler: function (form) {},
    errorPlacement: function (error, element) {
      $(element).parents('.form-group').append(error);
    },
  });
  //Mensajes Personalizados
  jQuery.extend(jQuery.validator.messages, {
    digits: 'Por favor ingresa sólo números.',
  });
  //Verificación de rut desde plugin, solo muestra datos en consola
  $('.Rut').Rut({
    on_error: function () {
      console.log('Rut invalido');
    },
    on_success: function () {
      console.log('RUT válido');
    },
    format_on: 'keyup',
    //digito_verificador: "#digito-verificador",
    //format: false,
  });
  $('.formulario-general').on('keyup keypress', function (e) {
    if ($(this).valid()) {
      $(this).find('.boton_enviar').prop('disabled', false);
    } else {
      $(this).find('.boton_enviar').prop('disabled', true);
    }
  });
  //Añade metodo RUT al validador
  $.validator.addMethod(
    'Rut',
    function (value, element) {
      if ($.Rut.validar(value)) {
        return true;
      } else {
        return false;
      }
    },
    'Debe ser un rut valido.'
  );

  // Validación de sólo letras y espacio
  $.validator.addMethod(
    'lettersonly',
    function (value, element) {
      return this.optional(element) || /^[a-z\s]+$/i.test(value);
    },
    'Por favor ingresa sólo letras.'
  );

  // Active Menu items
  (function highlightNav() {
    var prev; //keep track of previous selected link
    var isVisible = function (el) {
      el = $(el);

      if (!el || el.length === 0) {
        return false;
      }

      var docViewTop = $(window).scrollTop();
      var docViewBottom = docViewTop + $(window).height();

      var elemTop = el.offset().top;
      var elemBottom = elemTop + el.height();
      return elemBottom >= docViewTop && elemTop <= docViewBottom;
    };

    $(window).scroll(function () {
      $('#projectMenu a').each(function (index, el) {
        el = $(el);
        if (isVisible(el.attr('href'))) {
          if (prev) {
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

  $('.brickcf7').on('wpcf7mailsent', function (event) {
    const leadEmail = event.detail.inputs[7].value;
    const leadPhone = event.detail.inputs[9].value;
    dataLayer.push({
      event: 'leadConversion',
      leadEmail,
      leadPhone,
    });

    let contactName =
      event.target['inputNameContact']?.value ||
      event.target['inputNameCotizar']?.value ||
      '';

    Swal.fire({
      title: `¡ Gracias ${contactName} !`,
      iconHtml:
        '<img src="https://ibrick.cl/wp-content/uploads/2022/08/happy.png" width="90">',
      customClass: {
        icon: 'no-border',
      },
      html: `<div class="d-flex flex-column align-items-center justify-content-center w-100">
      <p>Pronto un ejecutivo te contactará.</p>
      <p>Cuéntale a un amigo sobre Brick Inmobiliaria</p>
      <div>
        <a href="https://www.addtoany.com/add_to/facebook?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/facebook.svg" width="32" height="32" style="background-color:royalblue"></a>
        <a href="https://www.addtoany.com/add_to/twitter?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/twitter.svg" width="32" height="32" style="background-color:rgb(29, 155, 240)"></a>
        <a href="https://www.addtoany.com/add_to/email?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/email.svg" width="32" height="32" style="background-color:royalblue"></a>
        <a href="https://www.addtoany.com/add_to/whatsapp?linkurl=${window.location.href};linkname=${document.title}" target="_blank"><img src="https://static.addtoany.com/buttons/whatsapp.svg" width="32" height="32" style="background-color:rgb(18, 175, 10)"></a>
      </div>
    </div>`,
      icon: 'success',
      confirmButtonText: 'Cerrar',
    });

    $('.form-modal').removeClass('form-modal-open');
  });
});

addEventListener('message', function (message) {
  try {
    if (
      message.data &&
      typeof message.data === 'string' &&
      message.data.includes('planOkLead')
    ) {
      const dataObj = JSON.parse(message.data);
      dataLayer.push(dataObj);
    }

    if (
      message.data &&
      typeof message.data === 'string' &&
      message.data.includes('chatbotLead')
    ) {
      const dataObj = JSON.parse(message.data);
      dataLayer.push({
        ...dataObj,
        event: dataObj.event,
        leadEmail: dataObj.clientEmail,
        leadPhone: dataObj.clientPhone,
        projectTitle: dataObj.project,
      });
    }
  } catch (e) {
    console.log(e);
  }
});
