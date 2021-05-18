const preloader = document.querySelector('.preloader');
const fadeEffect = setInterval(() => {
  if (!preloader.style.opacity) {
    preloader.style.opacity = 2;
  }
  if (preloader.style.opacity > 0) {
    preloader.style.opacity -= 0.1;
    $('#preloader').fadeOut(500, function(){ $('#preloader').remove(); } );
  } else {
    clearInterval(fadeEffect);
  }
}, 200);
window.addEventListener('load', fadeEffect);
/*
$(document).ready(function() {
    window.preloader = function () {
    $('#preloader').fadeOut(500, function(){ $('#preloader').remove(); } );
    }
    });
    window.preloader('load', fadeEffect).remove();
    */