// Lightbox
Array.from(document.querySelectorAll("[data-lightbox]")).forEach(element => {
  element.onclick = (e) => {
    e.preventDefault();
    basicLightbox.create(`<img src="${element.href}">`).show();
  };
});

Array.from(document.querySelectorAll("[data-dropdown='true'] header")).forEach(element => {
  element.onclick = (e) => {
    e.preventDefault();
    element.parentNode.classList.contains('open') ? element.parentNode.classList.remove('open') : element.parentNode.classList.add('open')
  };
});

Array.from(document.querySelectorAll(".read-more")).forEach(element => {
  element.onclick = (e) => {
    e.preventDefault();
    element.innerHTML = element.innerHTML == '↓' ? '↑' : '↓';
    let innerText = element.previousElementSibling.getAttribute('data-text');
    element.previousElementSibling.setAttribute('data-text', element.previousElementSibling.innerHTML);
    element.previousElementSibling.innerHTML = innerText;
  };
});

const openMenu = (e) =>{
   e.preventDefault();
  let header = document.getElementsByClassName('main-header')[0],
      logo = document.getElementsByClassName('paillette-logo')[0];
  header.classList.contains('open') ? header.classList.remove('open') : header.classList.add('open');
  logo.classList.contains('hide') ? logo.classList.remove('hide') : logo.classList.add('hide');
}

document.getElementById('burger').onclick = (e) => openMenu(e);
document.getElementById('burger2').onclick = (e) => openMenu(e);

function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

const archives = document.getElementById('archives');
if(archives){
  archives.onchange = (e) => {
    e.preventDefault();
    var win = window.location = e.target.options[e.target.selectedIndex].getAttribute('value');
    win.focus();
  }
}


document.getElementById('open-newsletter').onclick = (e) => {
  e.preventDefault();
  let inputMail = document.getElementById('mail-newsletter').value,
      alert = document.getElementById('alert');

  if(inputMail && validateEmail(inputMail)){
    document.getElementsByClassName('newsletter')[0].click();
    document.getElementById('EMAIL').value = inputMail;
  }else{
    alert.innerHTML = "L'adresse mail n'est pas valide";
    setTimeout(function(){
      alert.innerHTML = "";
    },5000)
  }
}

const setSrcAttribute = (el) => {
	if(!el.getAttribute('data-src')){
		return
	}
	el.setAttribute('src', el.getAttribute('data-src'));
  if(el.getAttribute('data-srcset')){
    el.setAttribute('srcset', el.getAttribute('data-srcset'));
  }
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

inView('[data-src]').on('enter', setSrcAttribute);
    
  if (window.innerWidth >= 768 ){
    scrollEventThrottle((scrollPos, previousScrollPos) => {
      let $toptrigger = body.classList.contains('home') ? 550 : 150;
      if(scrollPos >= $toptrigger){
        body.classList.add('fixed-header');
      }
      if(scrollPos < $toptrigger){
        body.classList.remove('fixed-header');
      }
    });
  }else{
    body.classList.remove('fixed-header');
    return
  }

  const carousels = document.querySelectorAll(".carousel-img");
  for(const carousel of carousels) {
    const carouselInst = new Siema({
      selector: carousel
    })

    const prev = carousel.nextElementSibling.querySelector('.prev');
    const next = carousel.nextElementSibling.querySelector('.next');
    
    prev.classList.add('inactive');

    prev.addEventListener('click', () => {
        carouselInst.prev();
        carouselInst.currentSlide == 0 ? prev.classList.add('inactive') : prev.classList.remove('inactive');
        carouselInst.currentSlide == carouselInst.innerElements.length - 1 ? next.classList.add('inactive') : next.classList.remove('inactive');
      }
    );
    next.addEventListener('click',  () => {
      carouselInst.next()
      carouselInst.currentSlide == 0 ? prev.classList.add('inactive') : prev.classList.remove('inactive');
      carouselInst.currentSlide == carouselInst.innerElements.length - 1 ? next.classList.add('inactive') : next.classList.remove('inactive');
    });
  }
});
