const btn = document.querySelector(".dpBtn2");
const DPcontents = document.querySelector(".li-dropdown-contents");
var span = document.querySelector(".dpBtn2 span");

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

const btn2 = document.querySelectorAll('.dpBtn');
var span2 = document.querySelector(".dpBtn span");

if (btn2 !== null) {
	btn2.forEach(function(e){
		e.addEventListener('click', function(){
			var sliderContent = e.parentNode.nextElementSibling;
			sliderContent.classList.toggle('content-clicked');
			if (span2.classList.contains('fa-sort-desc')) {
					span2.classList.remove('fa-sort-desc') ;
					span2.classList += ' fa-sort-asc';
			} else {
					span2.classList.remove('fa-sort-asc') ;
					span2.classList += ' fa-sort-desc';
			}
		});
	});
}


