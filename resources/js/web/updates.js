import { contentHide } from './title-and-content.js';

var updates = document.querySelectorAll('.date-content-right span.clickable');
var postsEvents = document.querySelectorAll('.posts-and-events .items .bottom .value span.clickable');
var UpdatesNewsAndEvents = document.querySelectorAll('.date-content-right span.newsAndEvent.clickable');
var UpdatesAnnouncements = document.querySelectorAll('.date-content-right span.announcement.clickable');
var HomapageNewsAndEvents = document.querySelectorAll('.news-and-events .content .items .values button');
var HomapageAnnouncements = document.querySelectorAll('.annoucement .content .items .values .inner .most .right a');

jumpToUpdatesPage(UpdatesNewsAndEvents, 'updates/news-and-events-articles', 'news-and-events');
jumpToUpdatesPage(HomapageNewsAndEvents, 'updates/news-and-events-articles', 'homepage-news-and-events');
jumpToUpdatesPage(UpdatesAnnouncements, 'updates/announcement-articles', 'announcement');
jumpToUpdatesPage(HomapageAnnouncements, 'updates/announcement-articles', 'homepage-announcement');
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
					location += e.parentNode.parentNode.classList[1]+'-articles';
					clickedTitle = e.innerHTML;
				} else if (category == 'posts-events') {
					location += e.nextElementSibling.innerHTML+'-articles';
					clickedTitle = e.innerHTML;
				} else if (category == 'homepage-news-and-events') { 
					clickedTitle = e.previousElementSibling.previousElementSibling.innerHTML;
				} else {
					clickedTitle = e.innerHTML;
				}

				// Save data to sessionStorage
				sessionStorage.setItem('clicked-title', clickedTitle);
				
				// jump page to location
				window.location.href = window.location.protocol+'\/\/'+window.location.hostname+'/'+location;
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

