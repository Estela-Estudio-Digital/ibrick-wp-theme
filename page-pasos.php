<?php /*
Template Name: pasos a seguir
*/
get_template_part('includes/header'); 
bk_main_before();
?>
   <section class="home-content my-md-5">
      <div class="container py-5">

        <div class="row">
          <div class="col-12 mb-lg-5">
            <h1>Pasos a seguir</h1>
            <h4>Te guiamos para que la compra de tu depto sea sencilla e informada</h4>
          </div>
        </div>

        <div id="video-<?php echo get_row_index(); ?>" class="video-wrapper">
            <figure
                class="wp-block-embed-youtube wp-block-embed is-type-video is-provider-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio m-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe
                        id="iframe-<?php echo get_row_index(); ?>"
                        class="embed-responsive-item"
                        title="Embed video"
                        width="500"
                        src="https://www.youtube.com/embed/OG8VLK8chRc?feature=oembed&enablejsapi=1&enablejsapi=1"
                        frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen="">
                    </iframe>
                </div>
            </figure>
        </div>
      </div>
    </section>

<?php 
bk_main_after();
get_template_part('includes/footer'); 
?>
