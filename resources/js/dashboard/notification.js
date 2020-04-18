var notification = document.querySelector('.notification');
var notificationMessage = document.querySelector('.notification-content ul li');
var notificationIcon  = document.querySelector('.notification-icon i');
	
if (notificationMessage.innerHTML !== '') {
	notification.classList.toggle('notif-visible');
	var type = notification.classList[1];

	addNotificationIcon(type)
	setTimeout(function(){ return hideNotification(type); }, 2000);
}

function hideNotification(type) {
	notification.classList.toggle('notif-visible');
	addNotificationIcon(type);
}

function addNotificationIcon(type) {
	if (type == 'notif-success') {
		notificationIcon.classList.toggle('fa-check');
	} else if (type == 'notif-info') {
		notificationIcon.classList.toggle('fa-info');
	} else if (type == 'notif-warning') {
		notificationIcon.classList.toggle('fa-exclamation');
	} else {
		notificationIcon.classList.toggle('fa-exclamation');
	}
}