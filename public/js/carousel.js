var slideIndex = 0;
var slides = document.getElementsByClassName("mySlides");
// var welcomeImgLength = document.selectorAll('.welcome-img').length;
if(slides.length !== 0) {
  showSlides();
}

function showSlides() {    
    var i;    
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    setTimeout(showSlides, 10000); // Change image every 5 seconds
}

function currentSlide(no) {
    var i;    
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex = no;
    slides[no-1].style.display = "block";
}

function plusSlides(n) {
  var newslideIndex = slideIndex + n;
  if (newslideIndex == slides.length+1) {
    newslideIndex = 1;
  }

  if (newslideIndex == 0) {
    newslideIndex = slides.length;
  }

  if(newslideIndex < slides.length+1 && newslideIndex > 0) {
     currentSlide(newslideIndex);
  }
}


var welcomeSlideIndex = 0;
var welcomeSlides = document.getElementsByClassName("welcome-mySlides");


if (welcomeSlides.length !== 0) {
  showWelcomeSlides();
} 

function showWelcomeSlides() {    
    var i;    

    for (i = 0; i < welcomeSlides.length; i++) {
        welcomeSlides[i].style.display = "none"; 
    }
    welcomeSlideIndex++;
    if (welcomeSlideIndex> welcomeSlides.length) {welcomeSlideIndex = 1} 
    welcomeSlides[welcomeSlideIndex-1].style.display = "inline-block"; 
    setTimeout(showWelcomeSlides, 10000); // Change image every 5 seconds
}

function welcomeCurrentSlide(no) {
    var i;    
    for (i = 0; i < welcomeSlides.length; i++) {
        welcomeSlides[i].style.display = "none"; 
    }
    welcomeSlideIndex = no;
    welcomeSlides[no-1].style.display = "block";
}

function plusSlides2(n) {
  var newslideIndex = welcomeSlideIndex + n;

  if (newslideIndex == welcomeSlides.length + 1) {
    newslideIndex = 1;
  }

  if (newslideIndex == 0) {
    newslideIndex = welcomeSlides.length;
  }

  if(newslideIndex < welcomeSlides.length+1 && newslideIndex > 0){
     welcomeCurrentSlide(newslideIndex);
  }
}

