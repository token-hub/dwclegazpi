const sidebarDropdown = document.querySelectorAll('.left-content-link span');
const userDropdown = document.querySelector('.main-content .right i');
const sidebarLinks = document.querySelectorAll('.left-content-link a'); 
var action = document.querySelector(".action").getAttribute('value').trim();

// ========== [ SIDEBAR DROPDOWN FUNCTION ] ==========
// check if side dropdown is available in the current page
if (sidebarDropdown !== null) {
	sidebarDropdown.forEach(function(e){
		e.addEventListener('click', function(){
			var sliderContent = e.parentNode.nextElementSibling;
			sliderContent.classList.toggle('content-dropdown-clicked');
			if (e.classList.contains('fa-sort-desc')) {
					e.classList.remove('fa-sort-desc') ;
					e.classList += ' fa-sort-asc';
			} else {
					e.classList.remove('fa-sort-asc') ;
					e.classList += ' fa-sort-desc'; 
			}
		});
	});
}

// ========== [ USER DROPDOWN FUNCTION ] ==========
// check if user dropdown is available in the current page
if (userDropdown !== null) {

	// click event on the dropdown trigger
	userDropdown.addEventListener('click', function(){ 
		const userDropdownContent = document.querySelector('.user-dropdown');
		userDropdownContent.classList.toggle('user-dropdown-clicked');
	});
}

// ========== [ SIDEBAR LINK ACTIVE FUNCTION ] ==========
sidebarLinks.forEach(function(e) {
	var parentNode = e.parentNode;

	// check if link is equal to the current page
	if (e.innerHTML.toLowerCase() == action) {

		// check if the link is not already active
		if (parentNode.className.indexOf('link-active') == -1) {

			// check and remove current link-active class to pass it to the next active link
			if (document.querySelector('.link-active')) {
				document.querySelector('.link-active').classList.remove('link-active');
			}
			
			parentNode.classList += ' link-active';
		}
	}
});


