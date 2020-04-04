var notifValue = document.querySelector('#notifValue');
var notifType = document.querySelector('#notifType');
var notifTitle = document.querySelector('.notif-right-div h6');
var dashboardImgs = document.querySelectorAll('.dashboard-img-container-img');
var action = document.querySelector(".action").getAttribute('value').trim();
const dropdown = document.querySelector('#dashboard-dropdown');
const dropdownDiv = document.querySelector('.dashboard-dropdown');
const notification = document.querySelector('.notification');
const notifLeft = document.querySelector('.notif-left');
const icon = document.querySelector('.notif-left i');
const selectTag = document.querySelectorAll('.dashboard-right-input select');
const inputs = document.querySelectorAll('.dashboard-form-control');
const labels = document.querySelectorAll('.dashboard-right-input label');
const showHidePassword = document.querySelectorAll('.password');
const eye  = document.querySelectorAll('.dashboard-right-input-password i');
const notifRightDiv = document.querySelector('.notif-right-div');
const dashboardImgContainer = document.querySelectorAll('.dashboard-img-container-img');
const imgBtnUpload = document.querySelector('#btn-upload-image');
const sideNavLinks = document.querySelectorAll('.sidenav-item-link');

if (dropdown) {
	dropdown.addEventListener('click', function(){
		showHideDropdown(dropdownDiv, 'dropdownShow');
	});
}

function showHideDropdown(param1, val1) {
	if (param1.classList.contains(val1)) {
		param1.classList.remove(val1);
	} else {
		param1.classList.add(val1);
	}
}

function showNotification(param1, param2, param3) {
	if (param1) {
		param2.classList.add('showNotification');
		param3.classList.add('showNotification');
		setTimeout(function(){ return hideNotification(param2, param3); }, 2000);
	}
}

function hideNotification(param1, param2) {
	param1.classList.remove('showNotification');
	param2.classList.remove('showNotification');
}

showNotification(notifValue.value, notification, notifRightDiv);

if (notifType.value != "") {
	notificationType(notifType.value);
	notifTitle.innerHTML = notifType.value.charAt(0).toUpperCase()+notifType.value.slice(1);
}

function notificationType(type) {
	var iconType = "";
	if (type == 'success') {
		iconType = 'fa-check-circle';
		notificationToggle('success', notification, notifLeft, icon, iconType);
	} else if (type == 'failed') {
		iconType = 'fa-times-circle';
		notificationToggle('danger', notification, notifLeft, icon, iconType);
	} else if (type == 'information') {
		iconType = 'fa-info-circle';
		notificationToggle('info', notification, notifLeft, icon, iconType);
	} else if (type == 'warning') {
		iconType = 'fa-exclamation-circle';
		notificationToggle('warning', notification, notifLeft, icon, iconType);
	}
}

function notificationToggle(type, parentDiv, childDiv, icon, iconType) {
	parentDiv.classList.toggle('notif-'+type);
	childDiv.classList.toggle(type);
	icon.classList.toggle(iconType);
}

function getImageName($image) {
	return $image.replace(/^.*[\\\/]/, '');
}

function buttonClickJavascriptToPhp($targetButton, $location) {
	if ($targetButton) {
		// if target button was clicked
		$targetButton.addEventListener('click', function(){
			var activeImg = document.querySelectorAll('.dashboard-img-container-img-active'); // get all the active images
			var imgArray = [];
			var imgNumber = [];

			activeImg.forEach(function(f){
				 imgNumber.push(f.childNodes[1].innerHTML);
			});

			imgNumber.sort(); // sort all active image according to image number
			imgNumber.forEach(function(e){ 
				activeImg.forEach(function(i){
				 	if (e == i.childNodes[1].innerHTML) { // compare active image number by the sorted number
				 		imgArray.push(getImageName(i.firstChild.getAttribute("src"))); // get image name and insert to a new array
				 	}
				});
			});	

			// pass imgArray to a php page and change the slider of the webpage.
			var data = {imgs:imgArray};
			window.location.href = $location+'?'+$.param(data);  // move to location with data
		})
	}
}

selectTag.forEach(function(e){
	e.addEventListener('click', function(){
		const selectOptionClass = document.querySelector('.'+e.id);
		selectOptionClass.classList.add('showOptions');
	});
});


inputs.forEach(function(e){
	// get the label of the form
	const label = document.querySelector('label[for="'+e.id+'"]');
	
	// check if input box has a value
	if (e.value !== "") {
		label.classList.add('dashboard-right-focus');
	} else {
			e.addEventListener('focus', function(){
				// activate label transition	
				label.classList.add('dashboard-right-focus');

				e.addEventListener("blur", function(){
					// check if input box has a value	
					if (e.value === "") {
						label.classList.remove('dashboard-right-focus');
					} 
				});
		}); 
	}
}); 

if (showHidePassword) {
	showHidePassword.forEach(function(e){
		// Show password hide/show button
		e.addEventListener('focus', function(){
			e.nextElementSibling.classList.add('dropdownShow');
		});
	})
}

if (eye) {
	// Show hide password function
	eye.forEach(function(e){
		e.addEventListener('click', function(){
			if (e.classList.contains('slash') != -1 ) {
				e.classList.toggle('fa-eye-slash');
				
				showHidePassword.forEach(function(f){
					if (e.previousElementSibling.id == f.id) {
						if (f.type === "password") {
						    f.type = "text";
						  } else {
						    f.type = "password";
						  }
					} 
				 });
			} 
		});
	});
}

$(document).ready(function() {
	// DataTable
	if( $('#example').length ) { 
		 $('#example').DataTable({
		    "sScrollY": "400",
		    "bScrollCollapse": true,
	        columnDefs: [
		       { type: 'de_datetime', targets: 0 },
		       { type: 'de_date', targets: 1 }
	     	]
	    });
	}
});

if (dashboardImgContainer.length > 0 ) {
	dashboardImgContainer.forEach(function(e){
		e.addEventListener('click', function(){ // if an dashboardImage was clicked
			// check if image clicked is already active
			if (e.classList.contains('dashboard-img-container-img-active')) {
					// check if unclickedItems is not empty
					if (localStorage.getItem("unclickedItems") === null) {
						localStorage.setItem("unclickedItems", JSON.stringify(e.childNodes[1].innerHTML)); // set first unclicked value
					} else {					
						var unclickedItemsValue = JSON.parse(localStorage.getItem("unclickedItems"));

						// check if localStorage value is the same as the clicked image count
						if (unclickedItemsValue !== e.childNodes[1].innerHTML) {
							localStorage.setItem("unclickedItems", JSON.stringify(unclickedItemsValue+','+e.childNodes[1].innerHTML)); // update unclickedItems value
						}
					}
				}
			e.classList.toggle('dashboard-img-container-img-active');
		});
	});
}

// check if an image is choosen
if (document.getElementById('image')){
	const imgInput = document.querySelector('#image');
   	imgInput.addEventListener('change', function(){
		 if (imgInput.value !== '') {
	 		if (imgBtnUpload.hasAttribute('disabled')) {
	 			imgBtnUpload.removeAttribute('disabled'); // remove the disable attribte of the upload image
	 		}
		 } else {
		 	imgBtn.setAttribute('disabled', ""); //  add disable attribte for the upload image
		 }
	}); 
 }

if (document.querySelectorAll('.btn-image')) {
	const imgBtnActivate = document.querySelector('#btn-activate-image');
	const imgBtnDelete = document.querySelector('#btn-delete-image');
	const imgBtnRemove = document.querySelector('#btn-remove-image');
	const imgBtnArrange = document.querySelector('#btn-arrange-image');

	buttonClickJavascriptToPhp(imgBtnActivate, 'activateImages'); // if activate button was clicked
	buttonClickJavascriptToPhp(imgBtnDelete, 'deleteImages'); // if delete button was clicked
	buttonClickJavascriptToPhp(imgBtnRemove, 'removeImages'); // if remove button was clicked
	buttonClickJavascriptToPhp(imgBtnArrange, 'arrangeImages'); // if arrange button was clicked

	// get all the dashboard imgs
	dashboardImgs.forEach(function(e){
		e.addEventListener('click', function(){
			var arrayCount = [0];
			var activeImg = document.querySelectorAll('.dashboard-img-container-img-active'); // get all the active images
			
			// check image clicked count
			if (activeImg.length < 1) {
				localStorage.removeItem("unclickedItems");
			}

			// // check if image clicked is from slider active-page
			// if (e.classList.contains('active-page')) {
			// 	log(e);
			// }	

			// check if localStorage is not empty
			if (localStorage.getItem("unclickedItems") === null) {
				// set image number via image count
				e.childNodes[1].innerHTML = activeImg.length;
			} else {
				// set image number via localStorage value if image clicked was already active
				var unclickedItemsValue = JSON.parse(localStorage.getItem("unclickedItems"));

				//string to array convertion, then sort
				var arrayValue = unclickedItemsValue.split(',').sort();
					
				// check if image is not active when clicked
				if (!e.childNodes[1].classList.contains('show2')) {
					var imageNumber = arrayValue.shift(); 
					e.childNodes[1].innerHTML = imageNumber;

					// check if arrayValue (localStorage) is empty
					if (arrayValue.length < 1) {
						localStorage.removeItem("unclickedItems"); // remove localStorage if empty
					} else {
						localStorage.setItem("unclickedItems", JSON.stringify(arrayValue.toString())); // update localStorage value
					}
				}
			}

			e.childNodes[1].classList.toggle('show2'); // show image number per image

			if (activeImg.length < 1) {
				if (imgBtnDelete) imgBtnDelete.setAttribute('disabled', ""); // disable button if no image is active
				if (imgBtnActivate) imgBtnActivate.setAttribute('disabled', ""); // disable button if no image is active
				if (imgBtnRemove) imgBtnRemove.setAttribute('disabled', ""); // disable button if no image is active
				if (imgBtnArrange) imgBtnArrange.setAttribute('disabled', ""); // disable button if no image is active
			} else {
				if (imgBtnDelete) imgBtnDelete.removeAttribute('disabled'); // remove disbled of the button if there's an active image
				if (imgBtnActivate) imgBtnActivate.removeAttribute('disabled'); // remove disbled of the button if there's an active image
				if (imgBtnRemove) imgBtnRemove.removeAttribute('disabled'); // remove disbled of the button if there's an active image
				if (imgBtnArrange) imgBtnArrange.removeAttribute('disabled'); // remove disbled of the button if there's an active image
			}
		});
	})
}



// sidenav links clicked function
Array.from(sideNavLinks).forEach( function(e) {
	var sidenavLink = e.childNodes[2].innerHTML.toLowerCase();

	if (sidenavLink.indexOf(action) !== -1) {
		 e.classList += " sidenav-active";
	} 
});

