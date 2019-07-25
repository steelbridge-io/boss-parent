(function($){
	$(document).ready(function(){
		//$('.dropdown-toggle').hover(function(){
		//	$(this).parent().addClass('open');
		//},function(){
		//	$(this).parent().removeClass('open');
		//});

		$('.dropdown').hoverIntent({
			over: openIt,
			out: closeIt,
			timeout: 500
		});

		function openIt(it) {
			$(this).addClass('open');
		}
		function closeIt(it) {
			$(this).removeClass('open');
		}

	});
})(jQuery)
