/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dashboard.js":
/*!***********************************!*\
  !*** ./resources/js/dashboard.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./dashboard/inputs.js */ "./resources/js/dashboard/inputs.js");

__webpack_require__(/*! ./dashboard/sidebar.js */ "./resources/js/dashboard/sidebar.js");

__webpack_require__(/*! ./dashboard/slider.js */ "./resources/js/dashboard/slider.js");

__webpack_require__(/*! ./dashboard/notification.js */ "./resources/js/dashboard/notification.js");

/***/ }),

/***/ "./resources/js/dashboard/inputs.js":
/*!******************************************!*\
  !*** ./resources/js/dashboard/inputs.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var inputs = document.querySelectorAll('.input-control');
var labels = document.querySelectorAll('.dashboard-input label');
var showHidePassword = document.querySelectorAll('.password');
var eye = document.querySelectorAll('.password-content i'); // ========== [ FORMS INPUT HOVER EFFECT FUNCTION ] ==========

inputs.forEach(function (e) {
  // get the label of the form
  var label = document.querySelector('label[for="' + e.id + '"]'); // check if input box has a value

  if (e.value !== "") {
    label.classList.add('dashboard-input-focus');
  } else {
    e.addEventListener('focus', function () {
      // activate label transition	
      label.classList.add('dashboard-input-focus');
      e.addEventListener("blur", function () {
        // check if input box has a value	
        if (e.value === "") {
          label.classList.remove('dashboard-input-focus');
        }
      });
    });
  }
}); // ========== [ SHOW/HIDE PASSWORD EYE FUNCTION ] ==========

if (showHidePassword) {
  showHidePassword.forEach(function (e) {
    // Show password hide/show button
    e.addEventListener('focus', function () {
      e.nextElementSibling.classList.add('dropdownShow');
      e.nextElementSibling.classList.add('visible');
      e.addEventListener('blur', function () {
        if (e.value == "") {
          e.nextElementSibling.classList.remove('visible');
        }
      });
    });
  });
} // ========== [ PASSWORD EYE CHANGE INPUT TYPE FUNCTION ] ==========


if (eye) {
  eye.forEach(function (e) {
    e.addEventListener('click', function () {
      if (e.classList.contains('slash') != -1) {
        e.classList.toggle('fa-eye-slash');
        showHidePassword.forEach(function (f) {
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
} // var notifValue = document.querySelector('#notifValue');
// var notifType = document.querySelector('#notifType');
// var notifTitle = document.querySelector('.notif-right-div h6');
// var dashboardImgs = document.querySelectorAll('.dashboard-img-container-img');
// const dropdown = document.querySelector('#dashboard-dropdown');
// const dropdownDiv = document.querySelector('.dashboard-dropdown');
// const notification = document.querySelector('.notification');
// const notifLeft = document.querySelector('.notif-left');
// const icon = document.querySelector('.notif-left i');
// const selectTag = document.querySelectorAll('.dashboard-right-input select');
// const notifRightDiv = document.querySelector('.notif-right-div');
// const dashboardImgContainer = document.querySelectorAll('.dashboard-img-container-img');
// const imgBtnUpload = document.querySelector('#btn-upload-image');
// if (dropdown) {
// 	dropdown.addEventListener('click', function(){
// 		showHideDropdown(dropdownDiv, 'dropdownShow');
// 	});
// }
// function showHideDropdown(param1, val1) {
// 	if (param1.classList.contains(val1)) {
// 		param1.classList.remove(val1);
// 	} else {
// 		param1.classList.add(val1);
// 	}
// }
// function showNotification(param1, param2, param3) {
// 	if (param1) {
// 		param2.classList.add('showNotification');
// 		param3.classList.add('showNotification');
// 		setTimeout(function(){ return hideNotification(param2, param3); }, 2000);
// 	}
// }
// const btn2 = document.querySelectorAll('.dpBtn');
// var span2 = document.querySelector(".dpBtn span");
// function hideNotification(param1, param2) {
// 	param1.classList.remove('showNotification');
// 	param2.classList.remove('showNotification');
// }
// showNotification(notifValue.value, notification, notifRightDiv);
// if (notifType.value != "") {
// 	notificationType(notifType.value);
// 	notifTitle.innerHTML = notifType.value.charAt(0).toUpperCase()+notifType.value.slice(1);
// }
// function notificationType(type) {
// 	var iconType = "";
// 	if (type == 'success') {
// 		iconType = 'fa-check-circle';
// 		notificationToggle('success', notification, notifLeft, icon, iconType);
// 	} else if (type == 'failed') {
// 		iconType = 'fa-times-circle';
// 		notificationToggle('danger', notification, notifLeft, icon, iconType);
// 	} else if (type == 'information') {
// 		iconType = 'fa-info-circle';
// 		notificationToggle('info', notification, notifLeft, icon, iconType);
// 	} else if (type == 'warning') {
// 		iconType = 'fa-exclamation-circle';
// 		notificationToggle('warning', notification, notifLeft, icon, iconType);
// 	}
// }
// function notificationToggle(type, parentDiv, childDiv, icon, iconType) {
// 	parentDiv.classList.toggle('notif-'+type);
// 	childDiv.classList.toggle(type);
// 	icon.classList.toggle(iconType);
// }
// function getImageName($image) {
// 	return $image.replace(/^.*[\\\/]/, '');
// }
// function buttonClickJavascriptToPhp($targetButton, $location) {
// 	if ($targetButton) {
// 		// if target button was clicked
// 		$targetButton.addEventListener('click', function(){
// 			var activeImg = document.querySelectorAll('.dashboard-img-container-img-active'); // get all the active images
// 			var imgArray = [];
// 			var imgNumber = [];
// 			activeImg.forEach(function(f){
// 				 imgNumber.push(f.childNodes[1].innerHTML);
// 			});
// 			imgNumber.sort(); // sort all active image according to image number
// 			imgNumber.forEach(function(e){ 
// 				activeImg.forEach(function(i){
// 				 	if (e == i.childNodes[1].innerHTML) { // compare active image number by the sorted number
// 				 		imgArray.push(getImageName(i.firstChild.getAttribute("src"))); // get image name and insert to a new array
// 				 	}
// 				});
// 			});	
// 			// pass imgArray to a php page and change the slider of the webpage.
// 			var data = {imgs:imgArray};
// 			window.location.href = $location+'?'+$.param(data);  // move to location with data
// 		})
// 	}
// }
// selectTag.forEach(function(e){
// 	e.addEventListener('click', function(){
// 		const selectOptionClass = document.querySelector('.'+e.id);
// 		selectOptionClass.classList.add('showOptions');
// 	});
// });
// $(document).ready(function() {
// 	// DataTable
// 	if( $('#example').length ) { 
// 		 $('#example').DataTable({
// 		    "sScrollY": "400",
// 		    "bScrollCollapse": true,
// 	        columnDefs: [
// 		       { type: 'de_datetime', targets: 0 },
// 		       { type: 'de_date', targets: 1 }
// 	     	]
// 	    });
// 	}
// });
// if (dashboardImgContainer.length > 0 ) {
// 	dashboardImgContainer.forEach(function(e){
// 		e.addEventListener('click', function(){ // if an dashboardImage was clicked
// 			// check if image clicked is already active
// 			if (e.classList.contains('dashboard-img-container-img-active')) {
// 					// check if unclickedItems is not empty
// 					if (localStorage.getItem("unclickedItems") === null) {
// 						localStorage.setItem("unclickedItems", JSON.stringify(e.childNodes[1].innerHTML)); // set first unclicked value
// 					} else {					
// 						var unclickedItemsValue = JSON.parse(localStorage.getItem("unclickedItems"));
// 						// check if localStorage value is the same as the clicked image count
// 						if (unclickedItemsValue !== e.childNodes[1].innerHTML) {
// 							localStorage.setItem("unclickedItems", JSON.stringify(unclickedItemsValue+','+e.childNodes[1].innerHTML)); // update unclickedItems value
// 						}
// 					}
// 				}
// 			e.classList.toggle('dashboard-img-container-img-active');
// 		});
// 	});
// }
// check if an image is choosen
// if (document.getElementById('image')){
// 	const imgInput = document.querySelector('#image');
//    	imgInput.addEventListener('change', function(){
// 		 if (imgInput.value !== '') {
// 	 		if (imgBtnUpload.hasAttribute('disabled')) {
// 	 			imgBtnUpload.removeAttribute('disabled'); // remove the disable attribte of the upload image
// 	 		}
// 		 } else {
// 		 	imgBtn.setAttribute('disabled', ""); //  add disable attribte for the upload image
// 		 }
// 	}); 
//  }
// if (document.querySelectorAll('.btn-image')) {
// 	const imgBtnActivate = document.querySelector('#btn-activate-image');
// 	const imgBtnDelete = document.querySelector('#btn-delete-image');
// 	const imgBtnRemove = document.querySelector('#btn-remove-image');
// 	const imgBtnArrange = document.querySelector('#btn-arrange-image');
// 	buttonClickJavascriptToPhp(imgBtnActivate, 'activateImages'); // if activate button was clicked
// 	buttonClickJavascriptToPhp(imgBtnDelete, 'deleteImages'); // if delete button was clicked
// 	buttonClickJavascriptToPhp(imgBtnRemove, 'removeImages'); // if remove button was clicked
// 	buttonClickJavascriptToPhp(imgBtnArrange, 'arrangeImages'); // if arrange button was clicked
// 	// get all the dashboard imgs
// 	dashboardImgs.forEach(function(e){
// 		e.addEventListener('click', function(){
// 			var arrayCount = [0];
// 			var activeImg = document.querySelectorAll('.dashboard-img-container-img-active'); // get all the active images
// 			// check image clicked count
// 			if (activeImg.length < 1) {
// 				localStorage.removeItem("unclickedItems");
// 			}
// 			// // check if image clicked is from slider active-page
// 			// if (e.classList.contains('active-page')) {
// 			// 	log(e);
// 			// }	
// 			// check if localStorage is not empty
// 			if (localStorage.getItem("unclickedItems") === null) {
// 				// set image number via image count
// 				e.childNodes[1].innerHTML = activeImg.length;
// 			} else {
// 				// set image number via localStorage value if image clicked was already active
// 				var unclickedItemsValue = JSON.parse(localStorage.getItem("unclickedItems"));
// 				//string to array convertion, then sort
// 				var arrayValue = unclickedItemsValue.split(',').sort();
// 				// check if image is not active when clicked
// 				if (!e.childNodes[1].classList.contains('show2')) {
// 					var imageNumber = arrayValue.shift(); 
// 					e.childNodes[1].innerHTML = imageNumber;
// 					// check if arrayValue (localStorage) is empty
// 					if (arrayValue.length < 1) {
// 						localStorage.removeItem("unclickedItems"); // remove localStorage if empty
// 					} else {
// 						localStorage.setItem("unclickedItems", JSON.stringify(arrayValue.toString())); // update localStorage value
// 					}
// 				}
// 			}
// 			e.childNodes[1].classList.toggle('show2'); // show image number per image
// 			if (activeImg.length < 1) {
// 				if (imgBtnDelete) imgBtnDelete.setAttribute('disabled', ""); // disable button if no image is active
// 				if (imgBtnActivate) imgBtnActivate.setAttribute('disabled', ""); // disable button if no image is active
// 				if (imgBtnRemove) imgBtnRemove.setAttribute('disabled', ""); // disable button if no image is active
// 				if (imgBtnArrange) imgBtnArrange.setAttribute('disabled', ""); // disable button if no image is active
// 			} else {
// 				if (imgBtnDelete) imgBtnDelete.removeAttribute('disabled'); // remove disbled of the button if there's an active image
// 				if (imgBtnActivate) imgBtnActivate.removeAttribute('disabled'); // remove disbled of the button if there's an active image
// 				if (imgBtnRemove) imgBtnRemove.removeAttribute('disabled'); // remove disbled of the button if there's an active image
// 				if (imgBtnArrange) imgBtnArrange.removeAttribute('disabled'); // remove disbled of the button if there's an active image
// 			}
// 		});
// 	})
// }

/***/ }),

/***/ "./resources/js/dashboard/notification.js":
/*!************************************************!*\
  !*** ./resources/js/dashboard/notification.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var notification = document.querySelector('.notification');
var notificationMessage = document.querySelector('.notification-content ul li');
var notificationIcon = document.querySelector('.notification-icon i');

if (notificationMessage.innerHTML !== '') {
  notification.classList.toggle('notif-visible');
  var type = notification.classList[1];
  addNotificationIcon(type);
  setTimeout(function () {
    return hideNotification(type);
  }, 2000);
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

/***/ }),

/***/ "./resources/js/dashboard/sidebar.js":
/*!*******************************************!*\
  !*** ./resources/js/dashboard/sidebar.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var action = document.querySelector(".action").getAttribute('value').trim();
var sidebarDropdown = document.querySelectorAll('.left-content-link span');
var userDropdown = document.querySelector('.main-content .right i');
var sidebarLinks = document.querySelectorAll('.left-content-link a');
var sideNavLinks = document.querySelectorAll('.sidenav-item-link'); // ========== [ SIDEBAR DROPDOWN FUNCTION ] ==========
// check if side dropdown is available in the current page

if (sidebarDropdown !== null) {
  sidebarDropdown.forEach(function (e) {
    e.addEventListener('click', function () {
      var sliderContent = e.parentNode.nextElementSibling;
      sliderContent.classList.toggle('content-dropdown-clicked');

      if (e.classList.contains('fa-sort-desc')) {
        e.classList.remove('fa-sort-desc');
        e.classList += ' fa-sort-asc';
      } else {
        e.classList.remove('fa-sort-asc');
        e.classList += ' fa-sort-desc';
      }
    });
  });
} // ========== [ SIDEBAR LINKS CLICKED FUNCTION ] ==========


Array.from(sideNavLinks).forEach(function (e) {
  var sidenavLink = e.childNodes[2].innerHTML.toLowerCase();

  if (sidenavLink.indexOf(action) !== -1) {
    e.classList += " sidenav-active";
  }
}); // ========== [ USER DROPDOWN FUNCTION ] ==========
// check if user dropdown is available in the current page

if (userDropdown !== null) {
  // click event on the dropdown trigger
  userDropdown.addEventListener('click', function () {
    var userDropdownContent = document.querySelector('.user-dropdown');
    userDropdownContent.classList.toggle('user-dropdown-clicked');
  });
} // ========== [ SIDEBAR LINK ACTIVE FUNCTION ] ==========


sidebarLinks.forEach(function (e) {
  var parentNode = e.parentNode; // check if link is equal to the current page

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

/***/ }),

/***/ "./resources/js/dashboard/slider.js":
/*!******************************************!*\
  !*** ./resources/js/dashboard/slider.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var sliderImage = document.querySelectorAll('.slider-image img');
var sliderBtn = document.querySelectorAll('.slider-btn');
var reclickedImageCount = []; // active slider image when clicked

sliderImage.forEach(function (e) {
  e.addEventListener('click', function () {
    e.parentNode.classList.toggle('slider-image-active');
    var activeImageCnt = document.querySelectorAll('.slider-image-active').length; // enabled / disabled slider btn

    sliderBtn.forEach(function (e) {
      activeImageCnt > 0 ? e.removeAttribute('disabled') : e.setAttribute('disabled', '');
    });

    if (e.parentNode.className.indexOf('slider-image-active') !== -1) {
      // create a p tag and append it to the slide-image div
      imageCount = document.createElement("p"); // check if there's no reclicked image

      if (reclickedImageCount.length == 0) {
        imageCount.innerHTML = activeImageCnt;
      } else {
        imageCount.innerHTML = reclickedImageCount.sort().shift();
      }

      e.parentNode.append(imageCount);
    } else {
      // check if there's a image count append next to img, if true remove it
      if (e.nextElementSibling) {
        // get the image count before removing it
        reclickedImageCount.push(e.nextElementSibling.innerHTML);
        e.parentNode.removeChild(e.nextElementSibling);
      }
    }
  });
});

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/dashboard.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\dwclegazpi\resources\js\dashboard.js */"./resources/js/dashboard.js");


/***/ })

/******/ });