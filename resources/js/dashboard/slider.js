const sliderImage = document.querySelectorAll('.slider-image img');
const sliderBtn = document.querySelectorAll('.slider-btn');
var reclickedImageCount = [];
var imageNames = [];

if (sliderImage.length < 1) {
	sliderBtn.forEach(function(e){
 		e.setAttribute('hidden', '');
 	});
} else {
	sliderBtn.forEach(function(e){
 		e.removeAttribute('hidden');
 	});
}

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
		var SliderBtnType = imageActionType(e.innerHTML);

	    var myJsonData = { 'imgs_type' : SliderBtnType, 'slides' : imageNames};

	    url = url(SliderBtnType);
	    type = type(SliderBtnType);

	    if (SliderBtnType == 'remove' || SliderBtnType == 'activate') {
	    	sendData(myJsonData, url, type, 'slides-inactive');
	    } else  {
			sendData(myJsonData, url, type, 'slides-active');
	  	}
	});
});

function sendData(data, url, type, redirect) {
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		}
	});

     $.ajax({
	    type: type,
	    url: url,
	    data: data,
	    success: function(data) {
	        window.location = redirect;
	        console.log(data); 
	    },
	    error: function(data) {
	        console.log('Error:', data);
	    },
	});
}

function imageActionType(type)
{
	switch(type) {
	  case 'Deactivate slide':
	    	SliderBtnType = 'deactivate';
	    break;
	  case 'Activate slide':
	   		SliderBtnType = 'activate';
	    break;
	  case 'Remove slide':
	  		SliderBtnType = 'remove';
	  	break;
	  case 'Arrange slide':
	  		SliderBtnType = 'arrange';
	  	break;
	}

	return SliderBtnType;
}

function url(SliderBtnType)
{
  switch(SliderBtnType) {
	  case 'remove':
	    	url = '/dashboard/slides-inactive/remove';
	    break;
	  case 'activate':
	   		url = '/dashboard/slides-inactive/activate';
	    break;
	  case 'deactivate':
	  		url = '/dashboard/slides-active/deactivate';
	  	break;
	  case 'arrange':
	  		url = '/dashboard/slides-active/arrange';
	  	break;
  }

  return url;
}

function type(SliderBtnType)
{
  switch(SliderBtnType) {
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