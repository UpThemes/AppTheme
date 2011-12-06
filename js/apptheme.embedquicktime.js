$j = jQuery.noConflict();

$j(document).ready(function() {
	$j.embedquicktime({
		jquery: '<?php echo includes_url( '/js/jquery/jquery.js' ); ?>', 
		plugin: '<?php echo get_template_directory_uri(); ?>/js/jquery.embedquicktime.js'
	});
	
	$j("a.link").fancybox({
		'zoomOpacity'  : true,
		'zoomSpeedIn'  : 300,
		'zoomSpeedOut' : 300
		});
});