"use strict";$((function(){sbjs.init(),$(".colapse-hamburger").on("click",(function(){$(this).toggleClass("is-active")})),$(".slide-nav-button").on("click",(function(){$(".bk-primary-nav").toggleClass("loaded"),$(this).toggleClass("is-active")})),$("#projectMenuBig a").on("click",(function(){$(".bk-primary-nav").toggleClass("loaded"),$(".slide-nav-button").toggleClass("is-active")})),$("#projectMenu a").on("click",(function(a){a.preventDefault(),$("#navbarNav2").is(".show")&&($("#navbarNav2").toggleClass("show"),$("#proyectosMenu .colapse-hamburger").toggleClass("is-active"));let e=$(this).attr("href"),t=$(e).offset().top-120;console.log(e),$("html,body").animate({scrollTop:t},"fast")})),$("#contactFloatingForm").on("click",(function(a){a.preventDefault(),$(".form-modal").addClass("form-modal-open")})),$("#formModalClose").on("click",(function(a){a.preventDefault(),$(".form-modal").removeClass("form-modal-open")})),$("#whatsappButton").on("click",(function(a){a.preventDefault(),$(".whatsapp-modal").addClass("whatsapp-modal-open")})),$("#whatsappModalClose").on("click",(function(a){a.preventDefault(),$(".whatsapp-modal").removeClass("whatsapp-modal-open")})),$(".menu-nav-fixed").fadeOut(),$(".follow-button-pay").fadeOut(),$(window).scroll((function(){$(this).scrollTop()>=730?($(".menu-nav-fixed").fadeIn(),$(".follow-button-pay").fadeIn(),1!=window.location.pathname.indexOf("proyectos")&&$(".main-menu").addClass("fixed-menu-primary")):($(".menu-nav-fixed").fadeOut(),$(".follow-button-pay").fadeOut(),1!=window.location.pathname.indexOf("proyectos")&&$(".main-menu").removeClass("fixed-menu-primary"))})),function(a){let e=a.replaceAll("/","");$(".main-menu").find(`.link-${e}`).addClass("link-active")}(window.location.pathname),setTimeout((function(){$("#galleryTabContent").find(".active").find(".gallery-overlay").fadeOut()}),1e3),$("#galeria .tab-item .btn").click((function(){let a=$(this).attr("aria-controls");console.log(a),$(".gallery-overlay").fadeIn(),setTimeout((function(){$(`#${a}`).find(".gallery-overlay").fadeOut("slow")}),500)})),$("#verMasModelos").click((function(){setTimeout((function(){$(".gallery-overlay").fadeOut("slow")}),500)})),$(".buttons-next-prev-plantas .next a").text("›"),$(".buttons-next-prev-plantas .prev a").text("‹"),$(".formulario-general .input-group-text").fadeOut(),$(".formulario-general input").on("focus",(function(){$(this).parents(".form-group").find(".label").addClass("activelabel"),$(this).parents(".form-group").find(".input-group-text").fadeIn()})),$(".formulario-general textarea").on("focus",(function(){$(this).parent(".form-group").find(".label").addClass("activelabel")})),$(".formulario-general textarea").on("blur",(function(){let a=$(this).val();console.log(a.length),a.length>0?$(this).parent(".form-group").find(".label").addClass("activelabel"):$(this).parent(".form-group").find(".label").removeClass("activelabel")})),$(".formulario-general input").on("blur",(function(){let a=$(this).val();console.log(a.length),a.length>0?$(this).parents(".form-group").find(".label").addClass("activelabel"):($(this).parents(".form-group").find(".label").removeClass("activelabel"),$(this).parents(".form-group").find(".input-group-text").fadeOut("fast"))}));var a="";$(".playvideo").click((function(){a=$(this).data("src")})),$("#homeVideo").on("shown.bs.modal",(function(e){$("#video").attr("src",a)})),$("#homeVideo").on("hide.bs.modal",(function(e){$("#video").attr("src",a)})),$("#edificio-1-tab").addClass("active"),$("#edificio-1").addClass("active show"),$("#plan-1-tab").addClass("active"),$("#plan-1").addClass("active show"),$("#planB-1-tab").addClass("active"),$(".project-carousel").owlCarousel({loop:!0,autoplay:!0,items:2,dots:!1,autoplayTimeout:4e3}),$(".pm3-carousel").owlCarousel({items:1,autoplayTimeout:7e3}),$(".arquitectura-carousel").owlCarousel({items:1,loop:!0,autoplay:!0,singleItem:!0,animateIn:"fadeIn",animateOut:"fadeOut"}),$(".master-carousel").owlCarousel({items:1}),$(".gallery-caarousel").owlCarousel({responsive:{0:{items:1},768:{items:3}},center:!0,loop:!0,nav:!0,autoplay:!0,autoplayTimeout:7e3});var e=$(".beneficios-carousel");e.find(".item").hide(),e.on({"initialized.owl.carousel":function(){e.find(".item").show(),e.find(".loading-placeholder").hide()}}).owlCarousel({dots:!0,margin:10,loop:!0,items:4,nav:!0,navText:['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],responsive:{0:{items:2},768:{items:3},991:{items:4}}}),setTimeout((function(){$(".ppp-carousel .owl-item.active").length>3?$(".ppp-carousel").owlCarousel({loop:!1}):$(".ppp-carousel").owlCarousel({loop:!0})}),0),$(".generalowl").owlCarousel({loop:!0,autoplay:!0,dots:!0,autoplayTimeout:7e3,autoplaySpeed:1e3,responsive:{0:{items:1}}}),$(".flip").hover((function(){$(this).find(".fcard").toggleClass("flipped")})),window.innerWidth>=768&&($(".link-residencial").mouseenter((function(){$(this).find(".drop-menu").show()})),$(".link-residencial").mouseleave((function(){$(this).find(".drop-menu").hide()})));var t=$("#plantas").find(".planta.active.1dorm").length,o=$("#plantas").find(".planta.active.2dorm").length,n=$("#plantas").find(".planta.active.3dorm").length,i=$("#plantas").find(".planta.active.4dorm").length;t||$("#1dorm").parent().remove(),o||$("#2dorm").parent().remove(),n||$("#3dorm").parent().remove(),i||$("#4dorm").parent().remove();var r=$(".filter_list").find("li").length,l=$(".filter_list").width()/r;$(".filter_list_item").each((function(){$(".filter_list_item").css("width",l)})),$(".filter_list_item").on("click",(function(){var a=$(this).attr("id");$("#plantas").find(".planta").fadeOut("fast"),$(".planta."+a).fadeIn("slow"),$(".filter_list_item").removeClass("active"),$(this).addClass("active")})),$("#todo").on("click",(function(){$("#plantas").find(".planta").fadeIn()})),$(".changeMapButton").click((function(a){a.preventDefault();let e=$(".changeMapButtonSpan").text(),t=$(".mapImg").height();$(".projectMap iframe").height(t),"maps"===e?$(".changeMapButtonSpan").text("volver"):$(".changeMapButtonSpan").text("maps"),$(".mapImg").toggleClass("mapActive"),$(".projectMap").toggleClass("mapActive")}));var s,c=$(".img-absolute").height();if($(".bg-img").height(c),$(".contactoModalBtn").on("click",(function(){$("#contacto-form-modal").modal("show")})),$("body").is(".page-bodegas")&&$(".contactoModalBtn").on("click",(function(){project=$(this).data("project"),$(".nombreProyecto").val("Bodegas - "+project)})),""!==project_data.data){var u=project_data.data[0].nombreProyecto,d=project_data.data[0].correosVentas,p=project_data.data[0].logoProyecto,m=project_data.data[0].imagenPlanta,f=project_data.data[0].dormitorios,v=project_data.data[0].imgPlanta,g=project_data.data[0].esquicio,h=project_data.data[0].corresponde,w=project_data.data[0].unidades,b=project_data.data[0].whatsapp;superficieUtil=project_data.data[0].superficieUtil,superficieTerraza=project_data.data[0].superficieTerraza,superficieTotal=project_data.data[0].superficieTotal,$(".nombreProyecto").val(u),$(".correosVentas").val(d),$(".logoProyecto").val(p),$(".imagenPlanta").val(m),$(".dormitorios").val(f),$(".imgPlanta").val(v),$(".esquicio").val(g),$(".corresponde").val(h),$(".unidades").val(w),$(".whatsappProject").val(b),$(".superficieUtil").val(superficieUtil),$(".superficieTerraza").val(superficieTerraza),$(".superficieTotal").val(superficieTotal)}sbjMedio=sbjs.get.current.mdm,sbjFuente=sbjs.get.current.src,$(".fuenteSbj").val(sbjFuente),$(".medioSbj").val(sbjMedio),$("#agendarConCalenly").on("click",(function(){return console.log("ga event Agendar"),dataLayer.push({event:"calendlyOpen"}),Calendly.initPopupWidget({url:"https://calendly.com/ibrick/30min"}),!1})),$("#whatsappButton").on("click",(function(){console.log("ga event Whatsapp form"),dataLayer.push({event:"whatsappOpen"})})),$(".boton_enviar_whatsapp").on("click",(function(){console.log("ga event Whatsapp chat"),dataLayer.push({event:"whatsappChatOpen"})})),$(".cotizacionHit").on("click",(function(){console.log("ga event Intención de cotización"),fbq("track","Lead"),dataLayer.push({event:"formClick"}),console.log(dataLayer)})),$(".wpcf7Whatsapp").on("wpcf7mailsent",(function(a){const e=a.detail.inputs[3].value,t=a.detail.inputs[0].value,o=a.detail.inputs[7].value;url=`https://api.whatsapp.com/send/?phone=${e}&text=Mi%20nombre%20es%20${o}%20Me%20interesa%20el%20%20proyecto%20${t}`,$(".whatsapp-modal").removeClass("whatsapp-modal-open"),window.open(url,"_blank")})),$(".wpcf7Whatsapp").on("wpcf7mailfailed",(function(a){console.log("failed",a)})),$(".wpcf7Floatante").on("wpcf7mailsent",(function(a){console.log("ga event Formulario"),dataLayer.push({event:"formSubmit"}),Swal.fire({title:"Mensaje enviado",text:"¡Gracias por cotizar en brick Inmobiliaria, pronto un ejecutivo te contactará!",icon:"success",confirmButtonText:"cerrar"}),$(".form-modal").removeClass("form-modal-open")})),$(".wpcf7Floatante").on("wpcf7mailfailed",(function(a){console.log("failed"),Swal.fire({title:"¡Error!",text:"¡Ha ocurrido un error, por favor intentalo de nuevo más tarde!",icon:"error",confirmButtonText:"cerrar"}),$(".form-modal").removeClass("form-modal-open")})),$(".brickcf7").on("wpcf7mailfailed",(function(a){console.log("failed"),Swal.fire({title:"¡Error!",html:'\n      <div class="d-flex flex-column align-items-center justify-content-center w-100">\n        <p>Pronto un ejecutivo se contactará.</p>\n        <p>Cuentale a un amigo sobre Brick Inmobiliaria</p>\n        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">\n          <a class="a2a_dd" href="https://www.addtoany.com/share"></a>\n          <a class="a2a_button_facebook"></a>\n          <a class="a2a_button_twitter"></a>\n          <a class="a2a_button_email"></a>\n          <a class="a2a_button_whatsapp"></a>\n        </div>\n      </div>\n      ',icon:"error",confirmButtonText:"cerrar"}),$(".form-modal").removeClass("form-modal-open")})),$(".wpcf7").on("wpcf7invalid",(function(){console.log("invalid")})),$(".wpcf7").on("wpcf7submit",(function(){console.log("wpcf7submit")})),$("#formulario_floatante").validate({rules:{inputNameFloatante:{required:!0,lettersonly:!0},inputEmailFloatante:{required:!0,email:!0},inputRutFloatante:{required:!0,Rut:!0},inputTelefonoFloatante:{required:!0,digits:!0,minlength:9,maxlength:9}},messages:{inputNameFloatante:"Ingresa solo letras.",inputEmailFloatante:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputRutCotizar:"Ingresa un RUT valido.",inputTelefonoFloatante:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(a){},errorPlacement:function(a,e){$(e).parents(".form-group").append(a)}}),$("#formulario_whatsapp").validate({rules:{inputNameWhatsapp:{required:!0,lettersonly:!0},inputEmailWhatsapp:{required:!0,email:!0},inputRutWhatsapp:{required:!0,Rut:!0},inputTelefonoWhatsapp:{required:!0,digits:!0,minlength:9,maxlength:9}},messages:{inputNameWhatsapp:"Ingresa solo letras.",inputEmailWhatsapp:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputRutWhatsapp:"Ingresa un RUT valido.",inputTelefonoWhatsapp:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(a){},errorPlacement:function(a,e){$(e).parents(".form-group").append(a)}}),$("#formulario_inicial").validate({rules:{inputNameContact:{required:!0},inputRutContact:{required:!1,Rut:!0},inputEmailContact:{required:!0,email:!0},inputTelefonoContact:{required:!0,digits:!0,minlength:9,maxlength:9},texAreaMensajeContact:{required:!1}},messages:{inputNameContact:"Ingresa solo letras.",inputRutContact:"Ingresa un RUT valido.",inputEmailContact:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputTelefonoContact:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(a){},errorPlacement:function(a,e){$(e).parents(".form-group").append(a)}}),$("#formulario_cotizar_proyecto").validate({rules:{inputNameCotizar:{required:!0},inputRutCotizar:{required:!1,Rut:!0},inputEmailCotizar:{required:!0,email:!0},inputTelefonoCotizar:{required:!0,digits:!0,minlength:9,maxlength:9},texAreaMensajeCotizar:{required:!1}},messages:{inputNameCotizar:"Ingresa solo letras.",inputRutCotizar:"Ingresa un RUT valido.",inputEmailCotizar:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputTelefonoCotizar:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(a){},errorPlacement:function(a,e){$(e).parents(".form-group").append(a)}}),jQuery.extend(jQuery.validator.messages,{digits:"Por favor ingresa sólo números."}),$(".Rut").Rut({on_error:function(){console.log("Rut invalido")},on_success:function(){console.log("RUT válido")},format_on:"keyup"}),$(".formulario-general").on("keyup keypress",(function(a){$(this).valid()?$(this).find(".boton_enviar").prop("disabled",!1):$(this).find(".boton_enviar").prop("disabled",!0)})),$.validator.addMethod("Rut",(function(a,e){return!!$.Rut.validar(a)}),"Debe ser un rut valido."),$.validator.addMethod("lettersonly",(function(a,e){return this.optional(e)||/^[a-z\s]+$/i.test(a)}),"Por favor ingresa sólo letras."),$(window).scroll((function(){$("#projectMenu a").each((function(a,e){if(function(a){if(!(a=$(a))||0===a.length)return!1;var e=$(window).scrollTop(),t=e+$(window).height(),o=a.offset().top;return o+a.height()>=e&&o<=t}((e=$(e)).attr("href")))return s&&s.removeClass("active"),e.addClass("active"),s=e,!1}))})),$(window).scroll();$(".brickcf7").on("wpcf7mailsent",(function(a){console.log("ga event Formulario"),dataLayer.push({event:"formSubmit"});let e=a.detail.inputs[3].value;Swal.fire({title:`¡ Gracias ${e} !`,html:'<div class="d-flex flex-column align-items-center justify-content-center w-100">\n  <p>Pronto un ejecutivo se contactará.</p>\n  <p>Cuentale a un amigo sobre Brick Inmobiliaria</p>\n  <div class="a2a_kit a2a_kit_size_32 a2a_default_style">\n    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>\n    <a class="a2a_button_facebook"></a>\n    <a class="a2a_button_twitter"></a>\n    <a class="a2a_button_email"></a>\n    <a class="a2a_button_whatsapp"></a>\n  </div>\n</div>',icon:"success",confirmButtonText:"cerrar"}),$(".form-modal").removeClass("form-modal-open")}))}));
//# sourceMappingURL=main-dist.js.map