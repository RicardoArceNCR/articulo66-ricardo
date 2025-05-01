import Swiper from 'swiper';
import { Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';

// Inicializar el slider solo en móvil
const initDestacadosSlider = () => {
  let slider = null;

  const initSlider = () => {
    if (window.innerWidth < 1024 && !slider) {
      slider = new Swiper('.swiper-destacados', {
        modules: [Pagination, Autoplay],
        slidesPerView: 1,
        spaceBetween: 16,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });
    } else if (window.innerWidth >= 1024 && slider) {
      slider.destroy();
      slider = null;
    }
  };

  // Inicializar
  initSlider();

  // Reinicializar en cambio de tamaño de ventana
  window.addEventListener('resize', initSlider);
};

export default initDestacadosSlider; 