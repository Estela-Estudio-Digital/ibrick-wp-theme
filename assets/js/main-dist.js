"use strict";$((function(){sbjs.init(),$(".colapse-hamburger").on("click",(function(){$(this).toggleClass("is-active")})),$(".slide-nav-button").on("click",(function(){$(".bk-primary-nav").toggleClass("loaded"),$(this).toggleClass("is-active")})),$("#projectMenuBig a").on("click",(function(){$(".bk-primary-nav").toggleClass("loaded"),$(".slide-nav-button").toggleClass("is-active")})),$("#projectMenu a").on("click",(function(e){e.preventDefault(),$("#navbarNav2").is(".show")&&($("#navbarNav2").toggleClass("show"),$("#proyectosMenu .colapse-hamburger").toggleClass("is-active"));let a=$(this).attr("href"),t=$(a).offset().top-120;console.log(a),$("html,body").animate({scrollTop:t},"fast")})),$("#contactFloatingForm").on("click",(function(e){e.preventDefault(),$(".form-modal").addClass("form-modal-open")})),$("#formModalClose").on("click",(function(e){e.preventDefault(),$(".form-modal").removeClass("form-modal-open")})),$("#whatsappButton").on("click",(function(e){e.preventDefault(),$(".whatsapp-modal").addClass("whatsapp-modal-open")})),$("#whatsappModalClose").on("click",(function(e){e.preventDefault(),$(".whatsapp-modal").removeClass("whatsapp-modal-open")})),$(".menu-nav-fixed").fadeOut(),$(".follow-button-pay").fadeOut(),$(window).scroll((function(){$(this).scrollTop()>=730?($(".menu-nav-fixed").fadeIn(),$(".follow-button-pay").fadeIn(),1!=window.location.pathname.indexOf("proyectos")&&$(".main-menu").addClass("fixed-menu-primary")):($(".menu-nav-fixed").fadeOut(),$(".follow-button-pay").fadeOut(),1!=window.location.pathname.indexOf("proyectos")&&$(".main-menu").removeClass("fixed-menu-primary"))})),function(e){let a=e.replaceAll("/","");$(".main-menu").find(`.link-${a}`).addClass("link-active")}(window.location.pathname),setTimeout((function(){$("#galleryTabContent").find(".active").find(".gallery-overlay").fadeOut()}),1e3),$("#galeria .tab-item .btn").click((function(){let e=$(this).attr("aria-controls");console.log(e),$(".gallery-overlay").fadeIn(),setTimeout((function(){$(`#${e}`).find(".gallery-overlay").fadeOut("slow")}),500)})),$("#verMasModelos").click((function(){setTimeout((function(){$(".gallery-overlay").fadeOut("slow")}),500)})),$(".buttons-next-prev-plantas .next a").text("›"),$(".buttons-next-prev-plantas .prev a").text("‹"),$(".formulario-general .input-group-text").fadeOut(),$(".formulario-general input").on("focus",(function(){$(this).parents(".form-group").find(".label").addClass("activelabel"),$(this).parents(".form-group").find(".input-group-text").fadeIn()})),$(".formulario-general textarea").on("focus",(function(){$(this).parent(".form-group").find(".label").addClass("activelabel")})),$(".formulario-general textarea").on("blur",(function(){let e=$(this).val();console.log(e.length),e.length>0?$(this).parent(".form-group").find(".label").addClass("activelabel"):$(this).parent(".form-group").find(".label").removeClass("activelabel")})),$(".formulario-general input").on("blur",(function(){let e=$(this).val();console.log(e.length),e.length>0?$(this).parents(".form-group").find(".label").addClass("activelabel"):($(this).parents(".form-group").find(".label").removeClass("activelabel"),$(this).parents(".form-group").find(".input-group-text").fadeOut("fast"))}));var e="";$(".playvideo").click((function(){e=$(this).data("src")})),$("#homeVideo").on("shown.bs.modal",(function(a){$("#video").attr("src",e)})),$("#homeVideo").on("hide.bs.modal",(function(a){$("#video").attr("src",e)})),$("#edificio-1-tab").addClass("active"),$("#edificio-1").addClass("active show"),$("#plan-1-tab").addClass("active"),$("#plan-1").addClass("active show"),$("#planB-1-tab").addClass("active"),$(".project-carousel").owlCarousel({loop:!0,autoplay:!0,items:2,dots:!1,autoplayTimeout:4e3}),$(".pm3-carousel").owlCarousel({items:1,autoplayTimeout:7e3}),$(".arquitectura-carousel").owlCarousel({items:1,loop:!0,autoplay:!0,singleItem:!0,animateIn:"fadeIn",animateOut:"fadeOut"}),$(".master-carousel").owlCarousel({items:1}),$(".gallery-caarousel").owlCarousel({responsive:{0:{items:1},768:{items:3}},center:!0,loop:!0,nav:!0,autoplay:!0,autoplayTimeout:7e3}),setTimeout((function(){$(".ppp-carousel .owl-item.active").length>3?$(".ppp-carousel").owlCarousel({loop:!1}):$(".ppp-carousel").owlCarousel({loop:!0})}),0),$(".generalowl").owlCarousel({loop:!0,autoplay:!0,dots:!0,autoplayTimeout:7e3,autoplaySpeed:1e3,responsive:{0:{items:1}}});var a=$("#plantas").find(".planta.active.1dorm").length,t=$("#plantas").find(".planta.active.2dorm").length,o=$("#plantas").find(".planta.active.3dorm").length,n=$("#plantas").find(".planta.active.4dorm").length;a||$("#1dorm").parent().remove(),t||$("#2dorm").parent().remove(),o||$("#3dorm").parent().remove(),n||$("#4dorm").parent().remove();var i=$(".filter_list").find("li").length,r=$(".filter_list").width()/i;$(".filter_list_item").each((function(){$(".filter_list_item").css("width",r)})),$(".filter_list_item").on("click",(function(){var e=$(this).attr("id");$("#plantas").find(".planta").fadeOut("fast"),$(".planta."+e).fadeIn("slow"),$(".filter_list_item").removeClass("active"),$(this).addClass("active")})),$("#todo").on("click",(function(){$("#plantas").find(".planta").fadeIn()})),$(".changeMapButton").click((function(e){e.preventDefault();let a=$(".changeMapButtonSpan").text(),t=$(".mapImg").height();$(".projectMap iframe").height(t),"maps"===a?$(".changeMapButtonSpan").text("volver"):$(".changeMapButtonSpan").text("maps"),$(".mapImg").toggleClass("mapActive"),$(".projectMap").toggleClass("mapActive")}));var l,s=$(".img-absolute").height();if($(".bg-img").height(s),$(".contactoModalBtn").on("click",(function(){$("#contacto-form-modal").modal("show")})),$("body").is(".page-bodegas")&&$(".contactoModalBtn").on("click",(function(){project=$(this).data("project"),$(".nombreProyecto").val("Bodegas - "+project)})),""!==project_data.data){var c=project_data.data[0].nombreProyecto,u=project_data.data[0].correosVentas,p=project_data.data[0].logoProyecto,d=project_data.data[0].imagenPlanta,m=project_data.data[0].dormitorios,f=project_data.data[0].imgPlanta,g=project_data.data[0].esquicio,v=project_data.data[0].corresponde,h=project_data.data[0].unidades,b=project_data.data[0].whatsapp;superficieUtil=project_data.data[0].superficieUtil,superficieTerraza=project_data.data[0].superficieTerraza,superficieTotal=project_data.data[0].superficieTotal,$(".nombreProyecto").val(c),$(".correosVentas").val(u),$(".logoProyecto").val(p),$(".imagenPlanta").val(d),$(".dormitorios").val(m),$(".imgPlanta").val(f),$(".esquicio").val(g),$(".corresponde").val(v),$(".unidades").val(h),$(".whatsappProject").val(b),$(".superficieUtil").val(superficieUtil),$(".superficieTerraza").val(superficieTerraza),$(".superficieTotal").val(superficieTotal)}sbjMedio=sbjs.get.current.mdm,sbjFuente=sbjs.get.current.src,$(".fuenteSbj").val(sbjFuente),$(".medioSbj").val(sbjMedio),$("#agendarConCalenly").on("click",(function(){return console.log("ga event Agendar"),dataLayer.push({event:"calendlyOpen"}),Calendly.initPopupWidget({url:"https://calendly.com/ibrick/30min"}),!1})),$("#whatsappButton").on("click",(function(){console.log("ga event Whatsapp form"),dataLayer.push({event:"whatsappOpen"})})),$(".boton_enviar_whatsapp").on("click",(function(){console.log("ga event Whatsapp chat"),dataLayer.push({event:"whatsappChatOpen"})})),$(".cotizacionHit").on("click",(function(){console.log("ga event Intención de cotización"),fbq("track","Lead"),dataLayer.push({event:"formClick"}),console.log(dataLayer)})),$(".wpcf7Whatsapp").on("wpcf7mailsent",(function(e){const a=e.detail.inputs[3].value,t=e.detail.inputs[0].value,o=e.detail.inputs[7].value;url=`https://api.whatsapp.com/send/?phone=${a}&text=Mi%20nombre%20es%20${o}%20Me%20interesa%20el%20%20proyecto%20${t}`,$(".whatsapp-modal").removeClass("whatsapp-modal-open"),window.open(url,"_blank")})),$(".wpcf7Whatsapp").on("wpcf7mailfailed",(function(e){console.log("failed",e)})),$(".wpcf7Floatante").on("wpcf7mailsent",(function(e){console.log("ga event Formulario"),dataLayer.push({event:"formSubmit"}),Swal.fire({title:"Mensaje enviado",text:"¡Gracias por cotizar en brick Inmobiliaria, pronto un ejecutivo te contactará!",icon:"success",confirmButtonText:"cerrar"}),$(".form-modal").removeClass("form-modal-open")})),$(".wpcf7Floatante").on("wpcf7mailfailed",(function(e){console.log("failed"),Swal.fire({title:"¡Error!",text:"¡Ha ocurrido un error, por favor intentalo de nuevo más tarde!",icon:"error",confirmButtonText:"cerrar"}),$(".form-modal").removeClass("form-modal-open")})),$(".brickcf7").on("wpcf7mailsent",(function(e){console.log("ga event Formulario"),dataLayer.push({event:"formSubmit"}),Swal.fire({title:"Mensaje enviado",text:"¡Gracias por cotizar en brick Inmobiliaria, pronto un ejecutivo te contactará!",icon:"success",confirmButtonText:"cerrar"}),$(".form-modal").removeClass("form-modal-open")})),$(".brickcf7").on("wpcf7mailfailed",(function(e){console.log("failed"),Swal.fire({title:"¡Error!",text:"¡Ha ocurrido un error, por favor intentalo de nuevo más tarde!",icon:"error",confirmButtonText:"cerrar"}),$(".form-modal").removeClass("form-modal-open")})),$(".wpcf7").on("wpcf7invalid",(function(){console.log("invalid")})),$(".wpcf7").on("wpcf7submit",(function(){console.log("wpcf7submit")})),$("#formulario_floatante").validate({rules:{inputNameFloatante:{required:!0,lettersonly:!0},inputEmailFloatante:{required:!0,email:!0},inputRutFloatante:{required:!0,Rut:!0},inputTelefonoFloatante:{required:!0,digits:!0,minlength:9,maxlength:9}},messages:{inputNameFloatante:"Ingresa solo letras.",inputEmailFloatante:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputRutCotizar:"Ingresa un RUT valido.",inputTelefonoFloatante:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(e){},errorPlacement:function(e,a){$(a).parents(".form-group").append(e)}}),$("#formulario_whatsapp").validate({rules:{inputNameWhatsapp:{required:!0,lettersonly:!0},inputEmailWhatsapp:{required:!0,email:!0},inputRutWhatsapp:{required:!0,Rut:!0},inputTelefonoWhatsapp:{required:!0,digits:!0,minlength:9,maxlength:9}},messages:{inputNameWhatsapp:"Ingresa solo letras.",inputEmailWhatsapp:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputRutWhatsapp:"Ingresa un RUT valido.",inputTelefonoWhatsapp:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(e){},errorPlacement:function(e,a){$(a).parents(".form-group").append(e)}}),$("#formulario_inicial").validate({rules:{inputNameContact:{required:!0,lettersonly:!0},inputRutContact:{required:!1,Rut:!0},inputEmailContact:{required:!0,email:!0},inputTelefonoContact:{required:!0,digits:!0,minlength:9,maxlength:9},texAreaMensajeContact:{required:!1}},messages:{inputNameContact:"Ingresa solo letras.",inputRutContact:"Ingresa un RUT valido.",inputEmailContact:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputTelefonoContact:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(e){},errorPlacement:function(e,a){$(a).parents(".form-group").append(e)}}),$("#formulario_cotizar_proyecto").validate({rules:{inputNameCotizar:{required:!0,lettersonly:!0},inputRutCotizar:{required:!1,Rut:!0},inputEmailCotizar:{required:!0,email:!0},inputTelefonoCotizar:{required:!0,digits:!0,minlength:9,maxlength:9},texAreaMensajeCotizar:{required:!1}},messages:{inputNameCotizar:"Ingresa solo letras.",inputRutCotizar:"Ingresa un RUT valido.",inputEmailCotizar:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputTelefonoCotizar:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(e){},errorPlacement:function(e,a){$(a).parents(".form-group").append(e)}}),jQuery.extend(jQuery.validator.messages,{digits:"Por favor ingresa sólo números."}),$(".Rut").Rut({on_error:function(){console.log("Rut invalido")},on_success:function(){console.log("RUT válido")},format_on:"keyup"}),$(".formulario-general").on("keyup keypress",(function(e){$(this).valid()?$(this).find(".boton_enviar").prop("disabled",!1):$(this).find(".boton_enviar").prop("disabled",!0)})),$.validator.addMethod("Rut",(function(e,a){return!!$.Rut.validar(e)}),"Debe ser un rut valido."),$.validator.addMethod("lettersonly",(function(e,a){return this.optional(a)||/^[a-z\s]+$/i.test(e)}),"Por favor ingresa sólo letras."),$(window).scroll((function(){$("#projectMenu a").each((function(e,a){if(function(e){if(!(e=$(e))||0===e.length)return!1;var a=$(window).scrollTop(),t=a+$(window).height(),o=e.offset().top;return o+e.height()>=a&&o<=t}((a=$(a)).attr("href")))return l&&l.removeClass("active"),a.addClass("active"),l=a,!1}))})),$(window).scroll()}));
//# sourceMappingURL=main-dist.js.map