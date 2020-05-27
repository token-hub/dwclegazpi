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
var checkboxes = document.querySelector('.checkboxes-placeholder');
var checkboxesContainer = document.querySelector('.checkbox-container');
var checkboxInputs = document.querySelectorAll('.checkbox-container .checkbox-item input[type=checkbox]');
var labels = document.querySelectorAll('.dashboard-input label');
var showHidePassword = document.querySelectorAll('.password');
var eye = document.querySelectorAll('.password-content i');
var permissions = document.querySelectorAll('.checkboxes-placeholder span'); // ========== [ FORMS INPUT HOVER EFFECT FUNCTION ] ==========

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
});

if (checkboxes) {
  var label = document.querySelector('label[for="' + checkboxes.nextElementSibling.getAttribute('for') + '"]');
  checkboxesContainer.classList.toggle('checkbox-visible'); // check if checkbox div has a child

  if (checkboxes.childNodes) {
    label.classList.add('dashboard-input-focus');
  }

  if (permissions.lenght > 4) {
    removeElementsAndchangeCheckboxPlaceholder(permissions.length);
  }

  checkboxes.addEventListener('click', function () {
    checkboxesContainer.classList.toggle('checkbox-visible');
  });
} // ========== [ CHECKBOX INPUT CLICK FUNCTION ] ==========


checkboxInputs.forEach(function (e) {
  e.addEventListener('click', function () {
    e.parentNode.classList.toggle('highlighted');
    var selectedPermissions = document.querySelectorAll('.highlighted');
    var itemFound = 0; // check label already focused

    if (!label.classList.contains('dashboard-input-focus')) {
      label.classList.add('dashboard-input-focus');
    }

    selectedPermissions.forEach(function (f) {
      if (f.firstElementChild.nextElementSibling.innerHTML == e.nextElementSibling.innerHTML + ',') {
        itemFound++;
      }
    }); // check if there's no matching records

    if (itemFound < 1) {
      // check user permissions on checkbox placeholder
      if (selectedPermissions.length > 4) {
        removeElementsAndchangeCheckboxPlaceholder(selectedPermissions.length);
      } else {
        // check if the checkbox clicked is highlighted - means not deselected
        if (e.parentNode.classList.contains('highlighted')) {
          var span = document.createElement('span');
          span.innerHTML = e.nextElementSibling.innerHTML + ', ';
          checkboxes.append(span);
        } else {
          // remove all child elements of checkbox placeholder
          while (checkboxes.firstChild) {
            checkboxes.firstChild.remove();
          } // add the remaining selected permissions


          selectedPermissions.forEach(function (f) {
            var selectedCheckboxText = f.firstElementChild.nextElementSibling.innerHTML;
            var span = document.createElement('span');
            span.innerHTML = selectedCheckboxText + ', ';
            checkboxes.append(span);
          });
        } // check if nothing is selected, then remove label focus


        if (selectedPermissions.length == 0) {
          label.classList.remove('dashboard-input-focus');
        }
      }
    }
  });
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
}

function removeElementsAndchangeCheckboxPlaceholder(length) {
  // replace N permission is selected.
  while (checkboxes.firstChild) {
    checkboxes.firstChild.remove();
  }

  var span = document.createElement('span');
  span.innerHTML = length + ' permissions selected';
  checkboxes.append(span);
}

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

if (notificationMessage) {
  if (notificationMessage.innerHTML !== '') {
    notification.classList.toggle('notif-visible');
    var type = notification.classList[1];
    addNotificationIcon(type);
    setTimeout(function () {
      return hideNotification(type);
    }, 3000);
  }
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
      e.parentNode.classList.toggle('link-active');
      changeSpanClasslist(e);
    });
  });
}
/*
	dropdown remains open when the dropdown content is the the current active page
 */
// ========== [ SIDEBAR LINKS CLICKED FUNCTION ] ==========


Array.from(sideNavLinks).forEach(function (e) {
  var sidenavLink = e.childNodes[2].innerHTML.toLowerCase();

  if (sidenavLink.indexOf(action) !== -1) {
    e.classList += " sidenav-active";
  }
}); // ========== [ SIDEBAR LINK ACTIVE FUNCTION ] ==========

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
      parentNode.parentNode.classList.toggle('content-dropdown-clicked'); // check if there is active dropdown active

      if (parentNode.parentNode.previousSibling.previousSibling) {
        parentNode.parentNode.previousSibling.previousSibling.classList.add('link-active');
        var span = parentNode.parentNode.previousSibling.previousSibling.lastElementChild;
        changeSpanClasslist(span);
      }
    }
  }
}); // ========== [ USER DROPDOWN FUNCTION ] ==========
// check if user dropdown is available in the current page

if (userDropdown !== null) {
  // click event on the dropdown trigger
  userDropdown.addEventListener('click', function () {
    var userDropdownContent = document.querySelector('.user-dropdown');
    userDropdownContent.classList.toggle('user-dropdown-clicked');
  });
} // change span classlist when clicked


function changeSpanClasslist(element) {
  if (element.classList.contains('fa-sort-desc')) {
    element.classList.remove('fa-sort-desc');
    element.classList.add('fa-sort-asc');
  } else {
    element.classList.remove('fa-sort-asc');
    element.classList.add('fa-sort-desc');
  }
}

/***/ }),

/***/ "./resources/js/dashboard/slider.js":
/*!******************************************!*\
  !*** ./resources/js/dashboard/slider.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var sliderImage = document.querySelectorAll('.slider-image img');
var sliderBtn = document.querySelectorAll('.slider-btn');
var reclickedImageCount = [];
var imageNames = [];

if (sliderImage.length < 1) {
  sliderBtn.forEach(function (e) {
    e.setAttribute('hidden', '');
  });
} else {
  sliderBtn.forEach(function (e) {
    e.removeAttribute('hidden');
  });
} // active slider image when clicked


sliderImage.forEach(function (e) {
  e.addEventListener('click', function () {
    e.parentNode.classList.toggle('slider-image-active');
    var activeImageCnt = document.querySelectorAll('.slider-image-active').length;
    var imageName = e.src.split("/").pop(); // enabled / disabled slider btn

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
      imageNames.push(imageName);
    } else {
      // check if there's a image count append next to img, if true remove it
      if (e.nextElementSibling) {
        // get the image count before removing it
        reclickedImageCount.push(e.nextElementSibling.innerHTML);
        e.parentNode.removeChild(e.nextElementSibling);
      }
    }
  });
}); // slider button clicked (Activate btn | Remove btn)

sliderBtn.forEach(function (e) {
  e.addEventListener('click', function () {
    var SliderBtnType = imageActionType(e.innerHTML);
    var myJsonData = {
      'imgs_type': SliderBtnType,
      'images': imageNames
    };
    url = url(SliderBtnType);
    type = type(SliderBtnType);

    if (SliderBtnType == 'remove' || SliderBtnType == 'activate') {
      sendData(myJsonData, url, type, 'images-inactive');
    } else {
      sendData(myJsonData, url, type, 'images-active');
    }
  });
});

function sendData(data, url, type, redirect) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: type,
    url: url,
    data: data,
    success: function success(data) {
      window.location = redirect;
      console.log(data);
    },
    error: function error(data) {
      console.log('Error:', data);
    }
  });
}

function imageActionType(type) {
  switch (type) {
    case 'Deactivate image':
      SliderBtnType = 'deactivate';
      break;

    case 'Activate image':
      SliderBtnType = 'activate';
      break;

    case 'Remove image':
      SliderBtnType = 'remove';
      break;

    case 'Arrange image':
      SliderBtnType = 'arrange';
      break;
  }

  return SliderBtnType;
}

function url(SliderBtnType) {
  switch (SliderBtnType) {
    case 'remove':
      url = '/dashboard/images-inactive/remove';
      break;

    case 'activate':
      url = '/dashboard/images-inactive/activate';
      break;

    case 'deactivate':
      url = '/dashboard/images-active/deactivate';
      break;

    case 'arrange':
      url = '/dashboard/images-active/arrange';
      break;
  }

  return url;
}

function type(SliderBtnType) {
  switch (SliderBtnType) {
    case 'remove':
      type = 'DELETE';
      break;

    case 'activate':
      type = 'PATCH';
      break;

    case 'deactivate':
      type = 'PATCH';
      break;

    case 'arrange':
      type = 'PATCH';
      break;
  }

  return type;
}

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/dashboard.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\xampp\htdocs\dwclegazpi\resources\js\dashboard.js */"./resources/js/dashboard.js");


/***/ })

/******/ });