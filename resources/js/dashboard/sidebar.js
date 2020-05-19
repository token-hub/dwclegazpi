var action = document.querySelector(".action").getAttribute('value').trim();
const sidebarDropdown = document.querySelectorAll('.left-content-link span');
const userDropdown = document.querySelector('.main-content .right i');
const sidebarLinks = document.querySelectorAll('.left-content-link a'); 
const sideNavLinks = document.querySelectorAll('.sidenav-item-link');

// ========== [ SIDEBAR DROPDOWN FUNCTION ] ==========
// check if side dropdown is available in the current page
if (sidebarDropdown !== null) {
	sidebarDropdown.forEach(function(e){
		e.addEventListener('click', function(){
			var sliderContent = e.parentNode.nextElementSibling;
			sliderContent.classList.toggle('content-dropdown-clicked');
			e.parentNode.classList.toggle('link-active');
			changeSpanClasslist(e);
		});
	});
}

/*
	dropdown remains open when the dropdown content is the the current active page
 */


// ========== [ SIDEBAR LINKS CLICKED FUNCTION ] ==========
Array.from(sideNavLinks).forEach( function(e) {
	var sidenavLink = e.childNodes[2].innerHTML.toLowerCase();

	if (sidenavLink.indexOf(action) !== -1) {
		 e.classList += " sidenav-active";
	} 
});


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
			parentNode.parentNode.classList.toggle('content-dropdown-clicked');

			// check if there is active dropdown active
			if (parentNode.parentNode.previousSibling.previousSibling) {
				parentNode.parentNode.previousSibling.previousSibling.classList.add('link-active');
				var span = parentNode.parentNode.previousSibling.previousSibling.lastElementChild;

				changeSpanClasslist(span);
			}
			
		}
	}
});

// ========== [ USER DROPDOWN FUNCTION ] ==========
// check if user dropdown is available in the current page
if (userDropdown !== null) {

	// click event on the dropdown trigger
	userDropdown.addEventListener('click', function(){ 
		const userDropdownContent = document.querySelector('.user-dropdown');
		userDropdownContent.classList.toggle('user-dropdown-clicked');
	});
}

// change span classlist when clicked
function changeSpanClasslist(element)
{
	if (element.classList.contains('fa-sort-desc')) {
			element.classList.remove('fa-sort-desc');
			element.classList.add('fa-sort-asc') ;
	} else {
			element.classList.remove('fa-sort-asc');
			element.classList.add('fa-sort-desc');
	}
}