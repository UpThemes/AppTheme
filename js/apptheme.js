(function($) {

	$(document).ready(function() {
		
		$.embedquicktime();
		
		$view = new View( $('a[href~=jpg],a[href~=png],a[href~=gif]') );
		
	});

})(jQuery);