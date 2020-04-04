const menu = document.querySelector(".menu");
const navLinks = document.querySelectorAll('.nav-list');
// const navLinksDP = document.querySelectorAll('.dp-content a');
const navCollapse = document.querySelector('.nav-collapse');
const navCollapseContent = document.querySelector('.nav-collapse-content');
const dwclContainer = document.querySelector(".dwcl-container");
const line = document.querySelector(".line");
const btns = document.querySelectorAll('.dpBtn');
var page = document.querySelector(".page").getAttribute('value').trim();
var action = document.querySelector(".action").getAttribute('value').trim();
// var activePage = document.querySelector(".nav-active");
// var parallax = document.querySelector(".parallax");
var overviewList = document.querySelectorAll('.overview ul li');

var liDropdown = document.querySelector('.li-dropdown-contents');
var liDropdownContents = document.querySelectorAll('.li-dropdown-contents li');

// ------------------[ second navbar button click function ] --------------------------

menu.addEventListener('click', function() {
	if (navCollapseContent.classList.contains('nav-collapse-clicked')) {
		navCollapseContent.classList.remove('nav-collapse-clicked');
		dwclContainer.classList.remove('nav-collapse-clicked2');
	} else {
			navCollapseContent.className += ' nav-collapse-clicked';
			dwclContainer.className += ' nav-collapse-clicked2';

			window.addEventListener('mouseup', function(event) {

				// if sidebar is active and the user clicks outside the sidebar
				if ((event.target != navCollapseContent && !isDescendant(navCollapseContent, event.target )) || event.target.className == 'menu' )    {
					navCollapseContent.classList.remove('nav-collapse-clicked');
					dwclContainer.classList.remove('nav-collapse-clicked2');

					// check if there's dp-content-collapse-clicked class
					if (document.querySelector(".dp-content-collapse-clicked")) {

						// remove if found
						var dpElement = document.querySelector(".dp-content-collapse-clicked");
						dpElement.classList.remove('dp-content-collapse-clicked');
					}
				}
			});
	}
});

// ------------------[ second navbar dropdown button click function ] --------------------------

Array.from(btns).forEach(function(btn) {
  btn.addEventListener('click', function() {

  	// check if there's dp-content-collapse-clicked class
  	if (document.querySelector(".dp-content-collapse-clicked")) { 

  		// remove if found
  		var dpElement = document.querySelector(".dp-content-collapse-clicked");
		dpElement.classList.remove('dp-content-collapse-clicked');
  	} else {
  		var str = this.className;
	    var btnClassName = str.split(" ")[1];
	    var dpContent = btnClassName+'-content';
	    var dpElement = document.querySelector("."+dpContent);
	    dpElement.classList.toggle('dp-content-collapse-clicked');
  	}
  });
});

// if (page == null) {
// 	page = 'home';
// }

// // banner images
// var pagesArray = ['about-us', 'admission', 'academics', 'student-services', 'career', 'alumni', 'gallery', 'updates', 'contact-us', 'news', 'announcement'];
// var img = document.createElement('IMG');
// pagesArray.forEach(function(e){
// 	if (e == page) {
// 		img.src = "/storage/img/banner/"+e+'.jpg';
// 		if (parallax != null) {
// 			parallax.insertBefore(img, parallax.firstChild);
// 		} else {
// 			img.src = "/storage/img/banner/banner2.jpg";
// 			parallax.insertBefore(img, parallax.firstChild);
// 		}
// 	}
// });

// ------------------[ navbar button click function ] --------------------------
Array.from(navLinks).forEach( function(navList) {
	var clickedNavList = navList.className;

	// check if the current page is not the home page
	if (page != "") {

		// check if nav collapse is clicked and active
		if (getComputedStyle(navCollapse, null).display === 'flex') {

			// check if navlist is already active
			if (clickedNavList.indexOf('nav-active')) {
				navList.parentNode.classList.remove('nav-active');
			
				if (clickedNavList.indexOf(page) !== -1) {
				  navList.parentNode.classList += " nav-active";
				}
			}
		} else {
			// check if navlist is already active
			if (clickedNavList.indexOf('nav-active')) {
				navList.classList.remove('nav-active');
			
				if (clickedNavList.indexOf(page) !== -1) {
				  navList.classList += " nav-active";
				}
			}
		}
	}

	// navList.addEventListener('click', function(){
	// 	localStorage.removeItem('linkClicked');
	// });
});



// active li list 
Array.from(overviewList).forEach( function(list) {
	var clickedlist = list.className;
	
	// check if list is not yet active
	if (clickedlist.indexOf(action) !== -1) {
		 list.classList += " list-active";
	}
});

// overview dropdown list
Array.from(liDropdownContents).forEach(function(dpList){
	var dpListClass = dpList.className;

	// check if some of the list is a match for the current subpage.
	if (dpListClass.indexOf(action) != -1) {
		liDropdown.classList += ' li-dropdown-clicked';
	}
}); 


function isDescendant(parent, child) {
	var node = child.parentNode;
	while (node != null) {
		if (node == parent) {
			return true;
		}
		node = node.parentNode;
	}
	return false;
};










