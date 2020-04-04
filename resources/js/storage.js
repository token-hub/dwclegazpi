const content = document.querySelectorAll('.title-and-content');
const links = document.querySelectorAll('.title-and-content h1 a');
const storageNextPrevBtn = document.querySelector('.storageNextPrevBtn');

const contentOlder = document.querySelector('.content-older');
const contentNewer = document.querySelector('.content-newer');
const contentBtns =  document.querySelectorAll('.content-btn a');
const categoryBtn = document.querySelectorAll('.categoryBtn');
var contentLength = links.length;
var session = document.querySelector('#session').getAttribute('value');



if (session != null) {
	var anchor = getAnchorDiv(session);
	contentLinksClicked(anchor);
}

function contentLinksClicked(params) {
	if (params === undefined) {
		links.forEach(function(e){
			e.addEventListener('click', contentShowHideStorageBtn);
			e.myParams = e;
		});
	} else {
		contentShowHideStorageBtn(params, true);
	}
}

function contentPageBtnHide() {
	var storageActive =  document.querySelector('.content-active');
	contentBtns.forEach(function(e){
		e.addEventListener('click', pageBtnHide);
		e.myParams = e;
	});
}

contentLinksClicked();
contentPageBtnHide();

function contentShowHideStorageBtn(e, isTrue) {
	if (isTrue === undefined) {
		e = e.target.myParams;
	}
	var parentNode = e.parentNode.parentNode;
	content.forEach(function(f) { 
		// display none for the content that is not clicked
		if (parentNode != f) {
		
			f.classList += ' noShow2';
			storageNextPrevBtn.classList += ' contentClicked';
		} else {
			f.classList += ' content-active';
		}
	});
	showHideStorageBtn(e, links[contentLength-1], links[0], contentOlder, contentNewer);
}

function pageBtnHide(e) {
 	e = e.target.myParams;
	var parentNode = e.parentNode;
	// show newer post
	for (var i = 0; i < content.length; i++ ) {
		var f = content[i];
			if (parentNode.className.indexOf('newer') !== -1) {
				if (f.className.indexOf('content-active') !== -1) {
					i -= 1;
					showHideStorageDiv(f, content[i]);

					// this is a the anchor link (title of the content)
					var title = content[i].firstElementChild.firstElementChild;
					showHideStorageBtn(title, links[contentLength-1], links[0], storageOlder, contentNewer);
				}
		// show older post
		} else {
			if (f.className.indexOf('content-active') !== -1) {
				i += 1;

				showHideStorageDiv(f, content[i]);
				// this is a the anchor link (title of the content)
				var title = content[i].firstElementChild.firstElementChild;
				showHideStorageBtn(title, links[contentLength-1], links[0], storageOlder, contentNewer);
			}
		}
	}
}

function showHideStorageBtn(arg1, argVal1, argVal2, div1, div2) {
	//disable newer button if current page is the first page
	ableDisablePage(arg1, argVal1, div1);

	// disable older button if current page is the last page
	ableDisablePage(arg1, argVal2, div2);
}

function ableDisablePage(param1, param2, div) {
	if (param1 == param2) {
		div.classList += ' noShow2';
	} else {
		div.classList.remove('noShow2');
	}
}

function showHideStorageDiv(arg1, arg2) {
	arg1.classList += ' noShow2';
	arg1.classList.remove('content-active');
	arg2.classList.remove('noShow2');
	arg2.classList += ' content-active';
}

function getAnchorDiv(param) {
	var returnValue;
	links.forEach(function(e){
		var anchor = e.innerHTML;
		if (anchor == param) {
			returnValue = e;
		}
	});
	return returnValue;
}