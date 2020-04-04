const log = console.log;
var storagePath = "{!! storage_path() !!}"; // updated and tested
$(window).scroll(function() {
    if ($(this).scrollTop() > 50 ) {
        $('.scrolltop:hidden').stop(true, true).fadeIn();
    } else {
        $('.scrolltop').stop(true, true).fadeOut();
    }
});
$(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".dwcl-container").offset().top},"1000");return false})});
$(function(){$(".menu").click(function(){$("html,body").animate({scrollTop:$(".dwcl-container").offset().top},"1000");return false})});

// ------------------------------------- SIDEBAR DROPDOWN BTN FUNCTION -------------------------------------

var span = document.querySelector(".dpBtn2 span");
const btn = document.querySelector(".dpBtn2");
const DPcontents = document.querySelector(".li-dropdown-contents");

if (btn !== null) {
	btn.addEventListener('click', function() {
	if (DPcontents.classList.contains('li-dropdown-clicked')) {
		DPcontents.classList.remove('li-dropdown-clicked');
		span.classList.remove('fa-minus') ;
		span.classList += ' fa-plus';
		return true;
	}
		DPcontents.classList += ' li-dropdown-clicked';
		span.classList.remove('fa-plus') ;
		span.classList += ' fa-minus';
	});
}