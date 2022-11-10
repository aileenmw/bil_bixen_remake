var carousel = document.getElementById("carousel");
var slides = carousel.getElementsByTagName('li');
var  counter = 0;
 var liList = Array.prototype.slice.call(slides);

function hide(element, index, array) {
  if (index > 0) {
    slides[index].setAttribute('style', 'opacity:0;');
  }
}


setInterval(function() {
  slides[counter].setAttribute('style', 'opacity:1;');
  counter++;

  if (counter == slides.length) {
    counter = 0;
    setTimeout(function() {
      liList.forEach(hide);
    }, 3000); // setTimeout
  }
}, 3000); // setInterval
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


