const iconMenu = document.querySelector('.header-menu-icon');
const headerNavigation = document.querySelector('.header__nav');
if(iconMenu) {
  iconMenu.addEventListener("click", function(e) {
    document.body.classList.toggle('_lock');
    iconMenu.classList.toggle('_active');
    headerNavigation.classList.toggle('_active');
  })
}

const mainSlider = new Swiper('.main-slider', {

    loop: true,
    slidesPerView: 1,
  
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: true,
    },
    autoplay: {
        delay: 3000,
        stopOnLastSlide: true,
        disableOnIteraction: false,
      },
      effect: 'fade',
      fadeEffect: {
        crossFade: true,
      }
  });

  const openPopup = document.querySelector('.footer__btn');
  const popup = document.querySelector('.popup');


  const showPopup = () => {
    popup.classList.remove('hidden');
    document.body.classList.add('_lock');
    popup.addEventListener('click', clickOutside);
    document.addEventListener('keydown', onClickEsc);
  }
  openPopup.addEventListener('click', () => {
    showPopup();
  });

  const closePopup = () => {
    popup.classList.add('hidden');
    document.body.classList.remove('_lock');
    popup.removeEventListener('click', clickOutside);
    document.removeEventListener('keydown', onClickEsc);
  }

const openModal = popup.querySelector('.popup-btn');
const modal = document.querySelector('.modal');

const showModal = () => {
  modal.classList.remove('hidden');
  document.body.classList.add('_lock');
  modal.addEventListener('click', onClickOutside);
  document.addEventListener('keydown', onClickEsc);
}
openModal.addEventListener('click', () => {
  closePopup();
  showModal();
});

const closeModal = () => {
  modal.classList.add('hidden');
  document.body.classList.remove('_lock');
  modal.removeEventListener('click', onClickOutside);
  document.removeEventListener('keydown', onClickEsc);
};

function onClickEsc(evt) {
  if (evt.key === 'Escape') {
    closePopup();
    closeModal();
  }
};

function clickOutside(evt) {
  if (evt.target.classList.contains('popup')) {
    closePopup();
  }
};

function onClickOutside(evt) {
  if (evt.target.classList.contains('modal')) {
    closeModal();
  }
};


const aboutSlider = new Swiper('.about-slider', {

  loop: true,
  slidesPerView: 2.5,
  spaceBetween: 10,

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    dynamicBullets: true,
  },
  autoplay: {
      delay: 3000,
      stopOnLastSlide: true,
      disableOnIteraction: false,
    },

  breakpoints: {
    320: {
      slidesPerView: 1.3,
    },
    480: {
      slidesPerView: 1.3,
    },
    640: {
      slidesPerView: 1.3,
    },
    768: {
      slidesPerView: 2.2,
    },

    992: {
      slidesPerView: 2.5,
    },
    1024: {
      slidesPerView: 2.9,
    }
  },
});

const $triggers = document.querySelectorAll('[data-accordeon-trigger]');

const handleAccordionClick = evt => {
  const $trigger = evt.currentTarget;
  $content = $trigger.parentElement.querySelector('[data-accordeon-content]');
  $content.classList.toggle('opened');
  $trigger.classList.toggle('_active');
};

$triggers.forEach($trigger =>
  $trigger.addEventListener('click', handleAccordionClick),
);