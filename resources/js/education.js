//Education Page Standard Monty Examples Slides
var slideIndex = 1;
window.showSlides(slideIndex);

// Next/previous controls
window.plusSlides = function(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
window.currentSlide = function(n) {
  showSlides(slideIndex = n);
}

window.showSlides = function(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}