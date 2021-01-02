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
  let header = document.getElementsByClassName('main-header')[0];
  header.classList.contains('open') ? header.classList.remove('open') : header.classList.add('open');
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

inView('[data-src]').once('enter', setSrcAttribute);
    
