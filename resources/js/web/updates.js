import { contentHide } from './title-and-content.js';

var updates = document.querySelectorAll('.date-content-right h3');
var postsEvents = document.querySelectorAll('.posts-and-events .items .bottom .value h4');
var newsAndEvents = document.querySelectorAll('.news-and-events .content .items .values button');
var announcements = document.querySelectorAll('.annoucement .content .items .values .inner .most .right a');

jumpToUpdatesPage(newsAndEvents, 'updates/news-and-events', 'news-and-events');
jumpToUpdatesPage(announcements, 'updates/announcement', 'announcement');
jumpToUpdatesPage(updates, 'updates/', 'updates');
jumpToUpdatesPage(postsEvents, 'updates/', 'posts-events');

// ============= [ HOME PAGE NEWS-AND-EVENTS/ANNOUNCEMENT TO UPDATES/NEWS-AND-EVENTS || UPDATES/ANNOUNCEMENT ] =============
function jumpToUpdatesPage(array, location, category) {
	// check array is not empty
	if (array) {
		array.forEach(function(e){
			e.addEventListener('click', function(){
				var clickedTitle;

				// check category
				if (category == 'updates') {
					location += e.parentNode.parentNode.classList[1];
					clickedTitle = e.nextElementSibling.innerHTML;
				} else if (category == 'posts-events') {
					location += e.nextElementSibling.nextElementSibling.innerHTML;
					clickedTitle = e.nextElementSibling.innerHTML;
				} else if (category == 'news-and-events') { 
					clickedTitle = e.previousElementSibling.previousElementSibling.innerHTML;
				} else {
					clickedTitle = e.nextElementSibling.innerHTML;
				}

				// Save data to sessionStorage
				sessionStorage.setItem('clicked-title', clickedTitle);

				// jump page to announcement
				window.location.href = 'http://dwclegazpi.edu/'+location;
			});
		});
	}
}

// ============= [ CHECK IF THERE'S A SESSION ] =============
if (sessionStorage.getItem('clicked-title')) {
	contentHide(sessionStorage.getItem('clicked-title'));

	// Remove saved data from sessionStorage
	sessionStorage.removeItem('clicked-title');
}

