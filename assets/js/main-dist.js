"use strict";function _define_property(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}function _object_spread(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{},o=Object.keys(a);"function"==typeof Object.getOwnPropertySymbols&&(o=o.concat(Object.getOwnPropertySymbols(a).filter((function(e){return Object.getOwnPropertyDescriptor(a,e).enumerable})))),o.forEach((function(t){_define_property(e,t,a[t])}))}return e}function ownKeys(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,o)}return a}function _object_spread_props(e,t){return t=null!=t?t:{},Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):ownKeys(Object(t)).forEach((function(a){Object.defineProperty(e,a,Object.getOwnPropertyDescriptor(t,a))})),e}$((function(){sbjs.init(),$('[data-toggle="tooltip"]').tooltip();const e=()=>{try{var e=project_data.data[0].nombreProyecto,t=project_data.data[0].correosVentas,a=project_data.data[0].logoProyecto,o=project_data.data[0].imagenPlanta,n=project_data.data[0].dormitorios,i=project_data.data[0].imgPlanta,r=project_data.data[0].esquicio,l=project_data.data[0].corresponde,s=project_data.data[0].unidades,d=project_data.data[0].whatsapp,c=project_data.data[0].superficieUtil,u=project_data.data[0].superficieTerraza,p=project_data.data[0].superficieTotal;$(".nombreProyecto").val(e),$(".correosVentas").val(t),$(".logoProyecto").val(a),$(".imagenPlanta").val(o),$(".dormitorios").val(n),$(".imgPlanta").val(i),$(".esquicio").val(r),$(".corresponde").val(l),$(".unidades").val(s),$(".whatsappProject").val(d),$(".superficieUtil").val(c),$(".superficieTerraza").val(u),$(".superficieTotal").val(p)}catch(e){console.log(e)}};$(".colapse-hamburger").on("click",(function(){$(this).toggleClass("is-active")})),$(".slide-nav-button").on("click",(function(){$(".bk-primary-nav").toggleClass("loaded"),$(this).toggleClass("is-active")})),$("#projectMenuBig a").on("click",(function(){$(".bk-primary-nav").toggleClass("loaded"),$(".slide-nav-button").toggleClass("is-active")})),$("#projectMenu a").on("click",(function(e){e.preventDefault(),$("#navbarNav2").is(".show")&&($("#navbarNav2").toggleClass("show"),$("#proyectosMenu .colapse-hamburger").toggleClass("is-active"));let t=$(this).attr("href"),a=$(t).offset().top-120;$("html,body").animate({scrollTop:a},"fast")})),$(".contactFloatingForm").on("click",(function(e){e.preventDefault(),$(".form-modal").addClass("form-modal-open")})),$("#formModalClose").on("click",(function(e){e.preventDefault(),$(".form-modal").removeClass("form-modal-open")})),$(".whatsappButton").on("click",(function(e){e.preventDefault(),$(".whatsapp-modal").addClass("whatsapp-modal-open")})),window.innerWidth>=768&&setTimeout((function(){$(".whatsapp-modal").addClass("whatsapp-modal-open")}),500),$(".whatsappModalClose").on("click",(function(e){e.preventDefault();$(".ws-project")&&($(".ws-project").show(),$(".ws-form").addClass("d-none")),$(".whatsapp-modal").removeClass("whatsapp-modal-open")})),$(".whatsappProjectSelector").on("click",(function(t){if(t.preventDefault(),project_data?.data){const t={nombreProyecto:$(this).data("name"),whatsapp:$(this).data("whatsapp"),correosVentas:$(this).data("correo")};project_data.data.push(t),e()}$(".formulario_whatsapp").find(".nombreProyecto").val($(this).data("name")),$(".formulario_whatsapp").find(".whatsappProject").val($(this).data("whatsapp")),$(".formulario_whatsapp").find(".correosVentas").val($(this).data("correo")),$(".ws-project").hide(),$(".ws-form").removeClass("d-none")})),$(".menu-nav-fixed").fadeOut(),$(".follow-button-pay").fadeOut(),$(window).scroll((function(){$(this).scrollTop()>=730?($(".menu-nav-fixed").fadeIn(),$(".follow-button-pay").fadeIn(),1!=window.location.pathname.indexOf("proyectos")&&$(".main-menu").addClass("fixed-menu-primary")):($(".menu-nav-fixed").fadeOut(),$(".follow-button-pay").fadeOut(),1!=window.location.pathname.indexOf("proyectos")&&$(".main-menu").removeClass("fixed-menu-primary"))})),function(e){const t=e.split("/"),a=t[t.length-2];$(".main-menu").find(`.link-${a}`).addClass("link-active")}(window.location.pathname),setTimeout((function(){$("#galleryTabContent").find(".active").find(".gallery-overlay").fadeOut()}),1e3),$("#galeria .tab-item .btn").click((function(){let e=$(this).attr("aria-controls");$(".gallery-overlay").fadeIn(),setTimeout((function(){$(`#${e}`).find(".gallery-overlay").fadeOut("slow")}),500)})),$("#verMasModelos").click((function(){setTimeout((function(){$(".gallery-overlay").fadeOut("slow")}),500)})),$(".buttons-next-prev-plantas .next a").text("›"),$(".buttons-next-prev-plantas .prev a").text("‹"),$(".formulario-general .input-group-text").fadeOut(),$(".formulario-general input").on("focus",(function(){$(this).parents(".form-group").find(".label").addClass("activelabel"),$(this).parents(".form-group").find(".input-group-text").fadeIn()})),$(".formulario-general textarea").on("focus",(function(){$(this).parent(".form-group").find(".label").addClass("activelabel")})),$(".formulario-general textarea").on("blur",(function(){$(this).val().length>0?$(this).parent(".form-group").find(".label").addClass("activelabel"):$(this).parent(".form-group").find(".label").removeClass("activelabel")})),$(".formulario-general input").on("blur",(function(){$(this).val().length>0?$(this).parents(".form-group").find(".label").addClass("activelabel"):($(this).parents(".form-group").find(".label").removeClass("activelabel"),$(this).parents(".form-group").find(".input-group-text").fadeOut("fast"))}));var t="";$(".playvideo").click((function(){t=$(this).data("src")})),$("#homeVideo").on("shown.bs.modal",(function(e){$("#video").attr("src",t)})),$("#homeVideo").on("hide.bs.modal",(function(e){$("#video").attr("src","")})),$("#edificio-1-tab").addClass("active"),$("#edificio-1").addClass("active show"),$("#plan-1-tab").addClass("active"),$("#plan-1").addClass("active show"),$("#planB-1-tab").addClass("active"),$(".project-carousel").owlCarousel({loop:!0,autoplay:!0,items:2,dots:!1,autoplayTimeout:4e3}),$(".pm3-carousel").owlCarousel({items:1,autoplayTimeout:7e3}),$(".arquitectura-carousel").owlCarousel({items:1,loop:!0,autoplay:!0,singleItem:!0,animateIn:"fadeIn",animateOut:"fadeOut"}),$(".master-carousel").owlCarousel({items:1}),$(".gallery-caarousel").owlCarousel({responsive:{0:{items:1},768:{items:3}},center:!0,loop:!0,nav:!0,autoplay:!0,autoplayTimeout:7e3});var a=$(".beneficios-carousel");a.find(".item").hide(),a.on({"initialized.owl.carousel":function(){a.find(".item").show(),a.find(".loading-placeholder").hide()}}).owlCarousel({dots:!0,margin:10,loop:!0,items:4,nav:!0,navText:['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],responsive:{0:{items:2},768:{items:3},991:{items:4}}}),setTimeout((function(){$(".ppp-carousel .owl-item.active").length>3?$(".ppp-carousel").owlCarousel({loop:!1}):$(".ppp-carousel").owlCarousel({loop:!0})}),0),$(".generalowl").owlCarousel({loop:!0,autoplay:!0,dots:!0,autoplayTimeout:7e3,autoplaySpeed:1e3,responsive:{0:{items:1}}}),$(".flip").hover((function(){$(this).find(".fcard").toggleClass("flipped")})),window.innerWidth>=768?($(".link-residencial").mouseenter((function(){$(this).find(".drop-menu").show()})),$(".link-residencial").mouseleave((function(){$(this).find(".drop-menu").hide()}))):$(".drop-menu").show(),$("#whatsappButtonAd").hide(),setTimeout((function(){$("#whatsappButtonAd").fadeIn()}),6e3);var o=$("#plantas").find(".planta.active.estudio").length,n=$("#plantas").find(".planta.active.1dorm").length,i=$("#plantas").find(".planta.active.2dorm").length,r=$("#plantas").find(".planta.active.3dorm").length,l=$("#plantas").find(".planta.active.4dorm").length;o||$("#estudio").parent().remove(),n||$("#1dorm").parent().remove(),i||$("#2dorm").parent().remove(),r||$("#3dorm").parent().remove(),l||$("#4dorm").parent().remove();var s=$(".filter_list").find("li").length,d=$(".filter_list").width()/s;$(".filter_list_item").each((function(){$(".filter_list_item").css("width",d)})),$(".filter_list_item").on("click",(function(){var e=$(this).attr("id");$("#plantas").find(".planta").fadeOut("fast"),$(".planta."+e).fadeIn("slow"),$(".filter_list_item").removeClass("active"),$(this).addClass("active")})),$("#todo").on("click",(function(){$("#plantas").find(".planta").fadeIn()})),$(".changeMapButton").click((function(e){e.preventDefault();let t=$(".changeMapButtonSpan").text(),a=$(".mapImg").height();$(".projectMap iframe").height(a),"maps"===t?$(".changeMapButtonSpan").text("volver"):$(".changeMapButtonSpan").text("maps"),$(".mapImg").toggleClass("mapActive"),$(".projectMap").toggleClass("mapActive")}));var c,u=$(".img-absolute").height();$(".bg-img").height(u),$(".contactoModalBtn").on("click",(function(){$("#contacto-form-modal").modal("show")})),$("body").is(".page-bodegas")&&$(".contactoModalBtn").on("click",(function(){project=$(this).data("project"),$(".nombreProyecto").val("Bodegas - "+project)})),project_data.data.length>0&&e(),sbjMedio=sbjs.get.current.mdm,sbjFuente=sbjs.get.current.src,$(".fuenteSbj").val(sbjFuente),$(".medioSbj").val(sbjMedio),$("#agendarConCalenly").on("click",(function(){return Calendly.initPopupWidget({url:"https://calendly.com/ibrick/30min"}),!1})),$(".whatsappButton").on("click",(function(){})),$(".boton_enviar_whatsapp").on("click",(function(){})),$(".cotizacionHit").on("click",(function(){})),$(".wpcf7Whatsapp").on("wpcf7mailsent",(function(e){const t=e.detail.inputs[7].value,a=e.detail.inputs[10].value;dataLayer.push({event:"wspLeadConversion",leadEmail:t,leadPhone:a,wspProjectTitle:e.detail.inputs[0].value});const o=e.detail.inputs[3].value,n=e.detail.inputs[0].value,i=e.detail.inputs[7].value;url=`https://api.whatsapp.com/send/?phone=${o}&text=Mi%20nombre%20es%20${i}%20Me%20interesa%20el%20%20proyecto%20${n}`,$(".whatsapp-modal").removeClass("whatsapp-modal-open"),window.open(url,"_blank");$(".ws-project")&&($(".ws-project").show(),$(".ws-form").addClass("d-none"),$(".whatsapp-modal").removeClass("whatsapp-modal-open"))})),$(".wpcf7Floatante").on("wpcf7mailsent",(function(e){let t=e.target.inputNameFloatante?.value||"";Swal.fire({title:`¡Gracias ${t} por contactarnos!`,iconHtml:'<img src="https://ibrick.cl/wp-content/uploads/2022/08/happy.png" width="90">',customClass:{icon:"no-border"},html:`<div class="d-flex flex-column align-items-center justify-content-center w-100">\n      <p>Pronto un ejecutivo te contactará.</p>\n      <p>Cuéntale a un amigo sobre Brick Inmobiliaria</p>\n      <div>\n        <a href="https://www.addtoany.com/add_to/facebook?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/facebook.svg" width="32" height="32" style="background-color:royalblue"></a>\n        <a href="https://www.addtoany.com/add_to/twitter?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/twitter.svg" width="32" height="32" style="background-color:rgb(29, 155, 240)"></a>\n        <a href="https://www.addtoany.com/add_to/email?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/email.svg" width="32" height="32" style="background-color:royalblue"></a>\n        <a href="https://www.addtoany.com/add_to/whatsapp?linkurl=${window.location.href};linkname=${document.title}" target="_blank"><img src="https://static.addtoany.com/buttons/whatsapp.svg" width="32" height="32" style="background-color:rgb(18, 175, 10)"></a>\n      </div>\n    </div>`,icon:"success",confirmButtonText:"Cerrar"}),$(".form-modal").removeClass("form-modal-open")})),$(".wpcf7Floatante").on("wpcf7mailfailed",(function(e){console.log("failed"),Swal.fire({title:"¡Error!",text:"¡Ha ocurrido un error, por favor intentalo de nuevo más tarde!",icon:"error",confirmButtonText:"Cerrar"}),$(".form-modal").removeClass("form-modal-open")})),$(".brickcf7").on("wpcf7mailfailed",(function(e){console.log("failed"),Swal.fire({title:"¡Error!",text:"¡Ha ocurrido un error, por favor intentalo de nuevo más tarde!",icon:"error",confirmButtonText:"Cerrar"}),$(".form-modal").removeClass("form-modal-open")})),$("#formulario_floatante").validate({rules:{inputNameFloatante:{required:!0,lettersonly:!0},inputEmailFloatante:{required:!0,email:!0},inputRutFloatante:{required:!0,Rut:!0},inputTelefonoFloatante:{required:!0,digits:!0,minlength:9,maxlength:9}},messages:{inputNameFloatante:"Ingresa solo letras.",inputEmailFloatante:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputRutCotizar:"Ingresa un RUT valido.",inputTelefonoFloatante:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(e){},errorPlacement:function(e,t){$(t).parents(".form-group").append(e)}}),$("#formulario_whatsapp").validate({rules:{inputNameWhatsapp:{required:!0,lettersonly:!0},inputEmailWhatsapp:{required:!0,email:!0},inputRutWhatsapp:{required:!0,Rut:!0},inputTelefonoWhatsapp:{required:!0,digits:!0,minlength:9,maxlength:9}},messages:{inputNameWhatsapp:"Ingresa solo letras.",inputEmailWhatsapp:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputRutWhatsapp:"Ingresa un RUT valido.",inputTelefonoWhatsapp:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(e){},errorPlacement:function(e,t){$(t).parents(".form-group").append(e)}}),$("#formulario_inicial").validate({rules:{inputNameContact:{required:!0},inputRutContact:{required:!1,Rut:!0},inputEmailContact:{required:!0,email:!0},inputTelefonoContact:{required:!0,digits:!0,minlength:9,maxlength:9},texAreaMensajeContact:{required:!1}},messages:{inputNameContact:"Ingresa solo letras.",inputRutContact:"Ingresa un RUT valido.",inputEmailContact:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputTelefonoContact:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(e){},errorPlacement:function(e,t){$(t).parents(".form-group").append(e)}}),$("#formulario_cotizar_proyecto").validate({rules:{inputNameCotizar:{required:!0},inputRutCotizar:{required:!1,Rut:!0},inputEmailCotizar:{required:!0,email:!0},inputTelefonoCotizar:{required:!0,digits:!0,minlength:9,maxlength:9},texAreaMensajeCotizar:{required:!1}},messages:{inputNameCotizar:"Ingresa solo letras.",inputRutCotizar:"Ingresa un RUT valido.",inputEmailCotizar:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputTelefonoCotizar:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(e){},errorPlacement:function(e,t){$(t).parents(".form-group").append(e)}}),$("#formulario_cotizar_planta").validate({rules:{inputNameCotizar:{required:!0},inputLastNameCotizar:{required:!0},inputRutCotizar:{required:!1,Rut:!0},inputEmailCotizar:{required:!0,email:!0},inputTelefonoCotizar:{required:!0,digits:!0,minlength:9,maxlength:9},texAreaMensajeCotizar:{required:!1}},messages:{inputNameCotizar:"Ingresa solo letras.",inputLastNameCotizar:"Ingresa solo letras.",inputRutCotizar:"Ingresa un RUT valido.",inputEmailCotizar:{required:"Es necesario tu dirección de correo",email:"El formato de tu email debe ser similar a: name@domain.com"},inputTelefonoCotizar:{required:"Ingresa tu numero de telefono",minlength:jQuery.validator.format("Introduce al menos {0} carácteres.")}},submitHandler:function(e){},errorPlacement:function(e,t){$(t).parents(".form-group").append(e)}}),jQuery.extend(jQuery.validator.messages,{digits:"Por favor ingresa sólo números."}),$(".Rut").Rut({on_error:function(){console.log("Rut invalido")},on_success:function(){console.log("RUT válido")},format_on:"keyup"}),$(".formulario-general").on("keyup keypress",(function(e){$(this).valid()?$(this).find(".boton_enviar").prop("disabled",!1):$(this).find(".boton_enviar").prop("disabled",!0)})),$(".btn-spinner").hide(),$(".botonEnviarCotizarPlanta").on("click",(function(e){$(".btn-spinner").show()})),$.validator.addMethod("Rut",(function(e,t){return!!$.Rut.validar(e)}),"Debe ser un rut valido."),$.validator.addMethod("lettersonly",(function(e,t){return this.optional(t)||/^[a-z\s]+$/i.test(e)}),"Por favor ingresa sólo letras."),$(window).scroll((function(){$("#projectMenu a").each((function(e,t){if(function(e){if(!(e=$(e))||0===e.length)return!1;var t=$(window).scrollTop(),a=t+$(window).height(),o=e.offset().top;return o+e.height()>=t&&o<=a}((t=$(t)).attr("href")))return c&&c.removeClass("active"),t.addClass("active"),c=t,!1}))})),$(window).scroll(),$(".brickcf7").on("wpcf7mailsent",(function(e){sendFormEventToGTM(e);const t=e.detail.apiResponse.pdf_api_response_url,a=e.detail.apiResponse.pdf_api_client_token,o=e.detail.apiResponse.pdf_api_cot_id;e.detail.inputs[7].value,e.detail.inputs[9].value;let n=e.target.inputNameContact?.value||"";if(Swal.fire({title:`¡ Gracias ${n} !`,iconHtml:'<img src="https://ibrick.cl/wp-content/uploads/2022/08/happy.png" width="90">',customClass:{icon:"no-border"},html:`<div class="d-flex flex-column align-items-center justify-content-center w-100">\n      <p class="d-none">Recibirás la cotización en tu email</p>\n      <div class="d-flex flex-column align-items-center justify-content-center w-100 btn-pok-spinner">\n        <div class="spinner-border" role="status">\n          <span class="sr-only">Loading... </span>\n        </div>\n        <p>Generando cotización...</p>\n      </div>\n      <p>Muchas gracias por cotizar con Brick.</p>\n      <a class="btn btn-primary d-none btn-pok-cot mb-5" target="_blank">Descargar cotización</a>\n      <div>\n        <a href="https://www.addtoany.com/add_to/facebook?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/facebook.svg" width="32" height="32" style="background-color:royalblue"></a>\n        <a href="https://www.addtoany.com/add_to/twitter?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/twitter.svg" width="32" height="32" style="background-color:rgb(29, 155, 240)"></a>\n        <a href="https://www.addtoany.com/add_to/email?linkurl=${window.location.href}" target="_blank"><img src="https://static.addtoany.com/buttons/email.svg" width="32" height="32" style="background-color:royalblue"></a>\n        <a href="https://www.addtoany.com/add_to/whatsapp?linkurl=${window.location.href};linkname=${document.title}" target="_blank"><img src="https://static.addtoany.com/buttons/whatsapp.svg" width="32" height="32" style="background-color:rgb(18, 175, 10)"></a>\n      </div>\n    </div>`,icon:"success",confirmButtonText:"Cerrar",onClose:()=>{$("#formulario_cotizar_ok").submit(),console.log("executable")}}),$(".swal2-confirm").removeClass("swal2-styled"),$(".swal2-confirm").addClass("btn btn-secondary cotizar-btn d-none"),!t?.error_data&&a&&o){console.log({pdfUrl:t,token:a,cotId:o});const n=o[0]?.hasError;if(!n&&!o?.message){$(".btn-pok-spinner").show();const t=new Headers;t.append("accept","application/json"),t.append("Authorization",a);const n={method:"GET",headers:t,redirect:"follow"};fetch("https://api-gci-rest.integracionplanok.io/api/cotizaciones/"+o[0].id_cotizacion+"/pdf?tipoDescarga=0",n).then((e=>e.json())).then((t=>{t?.url&&($(".btn-pok-cot").attr("href",t.url),$(".btn-pok-spinner").removeClass("d-flex").addClass("d-none"),$(".btn-pok-cot").removeClass("d-none"),$("#inputNamePok").val(e.target.inputNameCotizar.value),$("#inputLastNamePok").val(e.target.inputLastNameCotizar.value),$("#inputEmailPok").val(e.target.inputEmailCotizar.value),$("#inputUrlPok").val(t.url))})).catch((e=>{console.error(e),$(".btn-pok-spinner").hide(),$(".swal2-confirm").removeClass("cotizar-btn")})).finally((()=>{$(".swal2-confirm.cotizar-btn").removeClass("d-none")}))}$(".btn-spinner").hide()}$(".swal2-confirm.cotizar-btn").on("click",(function(){$("#formulario_cotizar_ok").submit()})),$(".form-modal").removeClass("form-modal-open")}))})),addEventListener("message",(function(e){try{if(e.data&&"string"==typeof e.data&&e.data.includes("planOkLead")){const t=JSON.parse(e.data);dataLayer.push(t)}if(e.data&&"string"==typeof e.data&&e.data.includes("chatbotLead")){const t=JSON.parse(e.data);dataLayer.push({...t,event:t.event,leadEmail:t.clientEmail,leadPhone:t.clientPhone,projectTitle:t.project})}}catch(e){console.log(e)}}));var BASE_EVENT_NAME="newFormSubmissionEvent";function sendDataToGTM(e){dataLayer.push(e)}function cleanText(e){var t,a=new DOMParser,o=e?a.parseFromString(e,"text/html"):"";return(null==o||null===(t=o.body)||void 0===t?void 0:t.textContent)||e}function sendModelEventToGTM(e){var t,a,o,n,i,r,l,s,d=cleanText(null===(a=e.detail)||void 0===a||null===(t=a.inputs[0])||void 0===t?void 0:t.value),c=cleanText(null===(n=e.detail)||void 0===n||null===(o=n.inputs[2])||void 0===o?void 0:o.value),u=null===(r=e.detail)||void 0===r||null===(i=r.inputs[19])||void 0===i?void 0:i.value,p=null===(s=e.detail)||void 0===s||null===(l=s.inputs[21])||void 0===l?void 0:l.value;dataLayer.push({event:BASE_EVENT_NAME,leadType:"planOk",leadEmail:u,leadPhone:p,projectTitle:d,modelTitle:c})}function sendGralEventToGTM(e){var t,a,o,n,i,r,l=null===(a=e.detail)||void 0===a||null===(t=a.inputs[5])||void 0===t?void 0:t.value,s=null===(n=e.detail)||void 0===n||null===(o=n.inputs[6])||void 0===o?void 0:o.value,d=cleanText(null===(r=e.detail)||void 0===r||null===(i=r.inputs[2])||void 0===i?void 0:i.value);dataLayer.push(_object_spread({event:BASE_EVENT_NAME,leadType:"general",leadEmail:l,leadPhone:s},!!d&&{projectTitle:d}))}function sendProjectEventToGTM(e){var t,a,o,n,i,r,l=null===(a=e.detail)||void 0===a||null===(t=a.inputs[7])||void 0===t?void 0:t.value,s=null===(n=e.detail)||void 0===n||null===(o=n.inputs[9])||void 0===o?void 0:o.value,d=cleanText(null===(r=e.detail)||void 0===r||null===(i=r.inputs[0])||void 0===i?void 0:i.value);dataLayer.push({event:BASE_EVENT_NAME,leadType:"proyecto",leadEmail:l,leadPhone:s,projectTitle:d})}function sendWSPEventToGTM(e){var t,a,o,n,i,r,l=null===(a=e.detail)||void 0===a||null===(t=a.inputs[8])||void 0===t?void 0:t.value,s=null===(n=e.detail)||void 0===n||null===(o=n.inputs[10])||void 0===o?void 0:o.value,d=cleanText(null===(r=e.detail)||void 0===r||null===(i=r.inputs[0])||void 0===i?void 0:i.value);dataLayer.push(_object_spread({event:BASE_EVENT_NAME,leadType:"whatsapp",leadEmail:l,leadPhone:s},!!d&&{projectTitle:d}))}var formsIdFnMap={560:sendModelEventToGTM,523:sendGralEventToGTM,988:sendProjectEventToGTM,1022:sendWSPEventToGTM};function sendFormEventToGTM(e){var t,a=null===(t=e.detail)||void 0===t?void 0:t.contactFormId;(0,formsIdFnMap[a])(e)}addEventListener("message",(function(e){try{if(e.data&&"string"==typeof e.data&&e.data.includes("chatbotLead")){var t=JSON.parse(e.data);dataLayer.push(_object_spread_props(_object_spread({},t),{event:"newChatbotLead",leadEmail:t.clientEmail,leadPhone:t.clientPhone,projectTitle:t.project,leadType:"chatbot"}))}}catch(e){console.log(e)}}));
//# sourceMappingURL=main-dist.js.map