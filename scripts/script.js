var offset;

$(document).ready(function() {
	$('#navbar').css('position', 'relative');
	$(active).attr('class','active');
	$(active+' a').attr('href','#')
	
});

$(window).scroll(function() {
	
	offset = $('#navbar').offset();
	var top = $(document).scrollTop();
	var bannerHeight = $('#wordmark-container').height();

	if (top >= bannerHeight) {
		$('#navbar').css('position', 'fixed');	
	} else {
		$('#navbar').css('position', 'relative');	
	}
});