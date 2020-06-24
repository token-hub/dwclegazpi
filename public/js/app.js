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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./web/jump-to-top.js */ "./resources/js/web/jump-to-top.js");

__webpack_require__(/*! ./web/navbar-and-overview.js */ "./resources/js/web/navbar-and-overview.js"); // require('./web/title-and-content.js');
// require('./web/display-post-events.js');
// require('./web/updates.js');


__webpack_require__(/*! ./dashboard/notification.js */ "./resources/js/dashboard/notification.js");

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

/***/ "./resources/js/web/jump-to-top.js":
/*!*****************************************!*\
  !*** ./resources/js/web/jump-to-top.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var log = console.log;
var storagePath = "{!! storage_path() !!}"; // updated and tested

$(window).scroll(function () {
  if ($(this).scrollTop() > 50) {
    $('.scrolltop:hidden').stop(true, true).fadeIn();
  } else {
    $('.scrolltop').stop(true, true).fadeOut();
  }
});
$(function () {
  $(".scroll").click(function () {
    $("html,body").animate({
      scrollTop: $(".dwcl-container").offset().top
    }, "1000");
    return false;
  });
});
$(function () {
  $(".menu").click(function () {
    $("html,body").animate({
      scrollTop: $(".dwcl-container").offset().top
    }, "1000");
    return false;
  });
}); // ------------------------------------- SIDEBAR DROPDOWN BTN FUNCTION -------------------------------------

var span = document.querySelector(".dpBtn2 span");
var btn = document.querySelector(".dpBtn2");
var DPcontents = document.querySelector(".li-dropdown-contents");

if (btn !== null) {
  btn.addEventListener('click', function () {
    if (DPcontents.classList.contains('li-dropdown-clicked')) {
      DPcontents.classList.remove('li-dropdown-clicked');
      span.classList.remove('fa-minus');
      span.classList += ' fa-plus';
      return true;
    }

    DPcontents.classList += ' li-dropdown-clicked';
    span.classList.remove('fa-plus');
    span.classList += ' fa-minus';
  });
}

/***/ }),

/***/ "./resources/js/web/navbar-and-overview.js":
/*!*************************************************!*\
  !*** ./resources/js/web/navbar-and-overview.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var menu = document.querySelector(".menu");
var navLinks = document.querySelectorAll('.nav-list');
var navCollapse = document.querySelector('.nav-collapse');
var navCollapseContent = document.querySelector('.nav-collapse-content');
var dwclContainer = document.querySelector(".dwcl-container");
var btns = document.querySelectorAll('.dpBtn');
var page = document.querySelector(".page").getAttribute('value').trim();
var action = document.querySelector(".action").getAttribute('value').trim();
var overviewList = document.querySelectorAll('.overview ul li');
var liDropdown = document.querySelector('.li-dropdown-contents');
var liDropdownContents = document.querySelectorAll('.li-dropdown-contents li'); // ------------------[ NAVBAR TRIGGER BUTTON CLICKED FUNCTION ] --------------------------

menu.addEventListener('click', function () {
  if (navCollapseContent.classList.contains('nav-collapse-clicked')) {
    navCollapseContent.classList.remove('nav-collapse-clicked');
    dwclContainer.classList.remove('nav-collapse-clicked2');
  } else {
    navCollapseContent.className += ' nav-collapse-clicked';
    dwclContainer.className += ' nav-collapse-clicked2';
    window.addEventListener('mouseup', function (event) {
      // if sidebar is active and the user clicks outside the sidebar
      if (event.target != navCollapseContent && !isDescendant(navCollapseContent, event.target) || event.target.className == 'menu') {
        navCollapseContent.classList.remove('nav-collapse-clicked');
        dwclContainer.classList.remove('nav-collapse-clicked2'); // check if there's dp-content-collapse-clicked class

        if (document.querySelector(".dp-content-collapse-clicked")) {
          // remove if found
          var dpElement = document.querySelector(".dp-content-collapse-clicked");
          dpElement.classList.remove('dp-content-collapse-clicked');
        }
      }
    });
  }
}); // ------------------[ NAVBAR COLLAPSE DROPDOWN BUTTON CLICKED FUNCTION ] --------------------------

Array.from(btns).forEach(function (btn) {
  btn.addEventListener('click', function () {
    // check if there's dp-content-collapse-clicked class
    if (document.querySelector(".dp-content-collapse-clicked")) {
      // remove if found
      var dpElement = document.querySelector(".dp-content-collapse-clicked");
      dpElement.classList.remove('dp-content-collapse-clicked');
    } else {
      var str = this.className;
      var btnClassName = str.split(" ")[1];
      var dpContent = btnClassName + '-content';
      var dpElement = document.querySelector("." + dpContent);
      dpElement.classList.toggle('dp-content-collapse-clicked');
    }
  });
}); // ------------------[ NAVBAR LINKS BUTTON CLICKED FUNCTION ] --------------------------

Array.from(navLinks).forEach(function (navList) {
  var clickedNavList = navList.className; // check if the current page is not the home page

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
}); // ------------------[ SET ACTIVE TO OVERVIEW LIST ] --------------------------

Array.from(overviewList).forEach(function (list) {
  var clickedlist = list.className; // check if list is not yet active

  if (clickedlist.indexOf(action) !== -1) {
    list.classList += " list-active";
  }
}); // ------------------[ SET ACTIVE TO OVERVIEW DROPDOWN LIST ] --------------------------

Array.from(liDropdownContents).forEach(function (dpList) {
  var dpListClass = dpList.className; // check if some of the list is a match for the current subpage.

  if (dpListClass.indexOf(action) != -1) {
    liDropdown.classList += ' li-dropdown-clicked';
  }
}); // ------------------[ CHECK IF CHILD IS DESCENDANT OF THE PARENT NODE ] --------------------------

function isDescendant(parent, child) {
  var node = child.parentNode;

  while (node != null) {
    if (node == parent) {
      return true;
    }

    node = node.parentNode;
  }

  return false;
}

;

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/dashboard.scss":
/*!***************************************!*\
  !*** ./resources/sass/dashboard.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ./resources/sass/dashboard.scss ***!
  \*********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\xampp\htdocs\dwclegazpi\resources\js\app.js */"./resources/js/app.js");
__webpack_require__(/*! D:\xampp\htdocs\dwclegazpi\resources\sass\app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! D:\xampp\htdocs\dwclegazpi\resources\sass\dashboard.scss */"./resources/sass/dashboard.scss");


/***/ })

/******/ });