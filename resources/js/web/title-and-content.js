var titleAndContents = document.querySelectorAll('.title-and-content');
var links = document.querySelectorAll('.title-and-content h1 a');
var newer = document.querySelector('.content-newer');
var older = document.querySelector('.content-older');
var contentBtn = document.querySelectorAll('.content-btn');
var linksTitle = [];

links.forEach(function(e) {
	linksTitle.push(e.innerHTML);
});

titleAndContents.forEach(function(e){
	var contentTitle = e.childNodes[1].childNodes[0];

	contentTitle.addEventListener("click", function(){
		//display none for all the title that are not clicked
		contentHide(contentTitle.innerHTML);
	});
});

contentBtn.forEach(function(e) {
	// if newer or older btn was clicked
	e.addEventListener('click', function(f) {
		var activeTitle = getActiveContent();
		var index = linksTitle.indexOf(activeTitle);
		var nextActiveTitle;

		// check if the btn click was the newer btn
		if (e.className.indexOf('newer') !== -1) {
			nextActiveTitle = linksTitle[index-1]; // get the title of the newer title
		} else {
			nextActiveTitle = linksTitle[index+1]; // get the title of the older title
		}

		contentHide(nextActiveTitle);
	});
});

function contentHide(clickedTitle) {
	titleAndContents.forEach(function(e){ 
		// check if the classlist is not equal to the clicked title
		if (e.childNodes[1].childNodes[0].innerHTML != clickedTitle) {
			// check if the classlist has display none property
			if (e.className.indexOf('hidden') == -1) {
				e.classList += ' hidden';
				e.classList.remove('content-active');
			}
		} else {
			e.classList.remove('hidden');
			e.classList += ' content-active';
			contentBtbShowHide(clickedTitle);
		}
	});
}

//Show the prev and next button
function contentBtbShowHide(clickedTitle) {
	var index = linksTitle.indexOf(clickedTitle);
	var lastItem = linksTitle.length-1;

	// check if the content is the first content in the array
	if (index == 0) {
		contentBtnClassListChecker(older, newer);
	} else if (index == lastItem) {
		contentBtnClassListChecker(newer, older);
	} else {
		contentBtnClassListChecker(newer, older, true);
	}
}

function contentBtnClassListChecker(visibleBtn, hiddenBtn, bothVisible = false) {
	if (bothVisible) {
		visibleBtn.classList += ' visible';
		hiddenBtn.classList += ' visible';
	} else {
		if (visibleBtn.className.indexOf('visible') == -1) {
			visibleBtn.classList += ' visible';
		}
		hiddenBtn.classList.remove('visible');
	}
}

function getActiveContent() {
	return document.querySelector('.content-active') ? document.querySelector('.content-active h1 a').innerHTML : '12312312312312312312312312';
}

export { contentHide };