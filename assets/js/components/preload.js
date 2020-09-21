export function preloadModule() {
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
}