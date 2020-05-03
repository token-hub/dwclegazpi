const sliderImage = document.querySelectorAll('.slider-image img');
const sliderBtn = document.querySelectorAll('.slider-btn');
var reclickedImageCount = [];
var imageNames = [];

// active slider image when clicked
sliderImage.forEach(function(e){
	e.addEventListener('click', function(){
		e.parentNode.classList.toggle('slider-image-active');
		var activeImageCnt = document.querySelectorAll('.slider-image-active').length;
		var imageName = e.src.split("/").pop();

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
});

// slider button clicked (Activate btn | Remove btn)
sliderBtn.forEach(function(e){
	e.addEventListener('click', function(){
		var SliderBtnType = '';

			switch(e.innerHTML) {
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

	    var myJsonData = { 'imgs_type' : SliderBtnType, 'images' : imageNames};
	    var myJsonData2 = { 'imgs_type' : SliderBtnType, 'images' : imageNames, 'image_number' : reclickedImageCount};
	    
	    console.log(myJsonData);

	    if (SliderBtnType == 'remove' || SliderBtnType == 'activate') {
	    	sendData(myJsonData);
	    } else  {
	    	sendData2(myJsonData2);
	  	}

	});
});


function sendData(data) {
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		}
	});

     $.ajax({
	    type: 'POST',
	    url: '/dashboard/images-inactive/image-remove-or-activate',
	    data: data,
	    success: function(data) {
	        window.location = 'images-inactive';
	    },
	    error: function(data) {
	        console.log('Error:', data);
	    }
	});
}

function sendData2(data) {
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		}
	});

     $.ajax({
	    type: 'POST',
	    url: '/dashboard/images-active/image-arrange-or-deactivate',
	    data: data,
	    success: function(data) {
	        window.location = 'images-active';
	        console.log(data); 
	    },
	    error: function(data) {
	        console.log('Error:', data);
	    },
	});
}