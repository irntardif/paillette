// Lightbox
Array.from(document.querySelectorAll("[data-lightbox]")).forEach(element => {
  element.onclick = (e) => {
    e.preventDefault();
    basicLightbox.create(`<img src="${element.href}">`).show();
  };
});

Array.from(document.querySelectorAll("[data-dropdown='true']")).forEach(element => {
  element.onclick = (e) => {
    e.preventDefault();
    element.classList.contains('open') ? element.classList.remove('open') : element.classList.add('open')
  };
});

document.getElementById('burger').onclick = (e) => {
  e.preventDefault();
  let header = document.getElementsByClassName('main-header')[0],
      logo = document.getElementsByClassName('paillette-logo')[0];
  header.classList.contains('open') ? header.classList.remove('open') : header.classList.add('open');
  logo.classList.contains('hide') ? logo.classList.remove('hide') : logo.classList.add('hide');
}

const setSrcAttribute = (el) => {
	if(!el.getAttribute('data-src')){
		return
	}
	el.setAttribute('src', el.getAttribute('data-src'));
	el.setAttribute('srcset', el.getAttribute('data-srcset'));
	el.removeAttribute('data-src');
	el.classList.add('loaded');
};

function scrollEventThrottle(fn) {
  let last_known_scroll_position = 0;
  let ticking = false;
  window.addEventListener("scroll", function () {
    let previous_known_scroll_position = last_known_scroll_position;
    last_known_scroll_position = window.scrollY;
    if (!ticking) {
      window.requestAnimationFrame(function () {
        fn(last_known_scroll_position, previous_known_scroll_position);
        ticking = false;
      });
      ticking = true;
    }
  });
}

const body = document.getElementsByTagName('body')[0];

document.addEventListener('DOMContentLoaded', function(){

inView('[data-src]').once('enter', setSrcAttribute);
    
if (window.innerWidth >= 768 ){
    scrollEventThrottle((scrollPos, previousScrollPos) => {
      if(scrollPos >= 150){
        body.classList.add('fixed-header');
      }
      if(scrollPos < 150){
        body.classList.remove('fixed-header');
      }
    });
  }else{
    body.classList.remove('fixed-header');
    return
  }

});
