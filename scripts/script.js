var offset;

$(document).ready(function() {
	$('#navbar').css('position', 'relative');
	$(active).attr('class','active');
	$(active+' a').attr('href','#')
	
	/*Contact Modal Code Below*/
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	var modalHeight = $('#contact-modal').outerHeight();
	var modalWidth = $('#contact-modal').outerWidth();

	var top = (windowHeight-modalHeight)/2;
	var left = (windowWidth-modalWidth)/2;

	$('#contact-modal').css("top",top);
	$('#contact-modal').css("left",left);

	$('#activate-contact-modal').click(function () {
		showModal($(this).attr('name'));
		return false;
	});

	$('#mask').click(function () {
		closeModal();
	});
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


function showModal(modalID) {
	$('#mask').css({ 'display':'block','opacity':0});
	$('#mask').fadeTo(500,0.8);
	$('#'+modalID).fadeIn(500);
}

function closeModal() {
	$('#mask').fadeOut(500);
	$('#contact-modal').fadeOut(500);
}