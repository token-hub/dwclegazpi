const sliderImage = document.querySelectorAll('.slider-image img');
const sliderBtn = document.querySelectorAll('.slider-btn');
var reclickedImageCount = [];

// active slider image when clicked
sliderImage.forEach(function(e){
	e.addEventListener('click', function(){
		e.parentNode.classList.toggle('slider-image-active');
		var activeImageCnt = document.querySelectorAll('.slider-image-active').length;

		// enabled / disabled slider btn
		 sliderBtn.forEach(function(e){
		 	activeImageCnt > 0 ? e.removeAttribute('disabled') : e.setAttribute('disabled', '');
		 });

		if (e.parentNode.className.indexOf('slider-image-active') !== -1) {
			// create a p tag and append it to the slide-image div
			imageCount = document.createElement("p");
			
			// check if there's no reclicked image
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

