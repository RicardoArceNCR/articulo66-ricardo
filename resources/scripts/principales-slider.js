document.addEventListener('DOMContentLoaded', function() {
  console.log('🟢 DOMContentLoaded event fired');

  const initPrincipalesSlider = () => {
    console.log('🟡 initPrincipalesSlider function called');
    let slider = null;

    const initSlider = () => {
      console.log('🔵 initSlider function called');
      console.log('Window width:', window.innerWidth);
      console.log('Swiper available:', typeof Swiper !== 'undefined');
      
      if (window.innerWidth < 768 && !slider && typeof Swiper !== 'undefined') {
        console.log('📱 Creating mobile slider...');
        try {
          const swiperElement = document.querySelector('.swiper-principales');
          console.log('Swiper element found:', swiperElement);
          console.log('Swiper wrapper found:', document.querySelector('.swiper-wrapper'));
          console.log('Swiper slides found:', document.querySelectorAll('.swiper-slide').length);

          slider = new Swiper('.swiper-principales', {
            slidesPerView: 'auto',
            spaceBetween: 16,
            centeredSlides: true,
            loop: true,
            autoplay: {
              delay: 5000,
              disableOnInteraction: false,
            },
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
          });
          console.log('✅ Slider created successfully:', slider);
        } catch (error) {
          console.error('❌ Error creating slider:', error);
        }
      } else if (window.innerWidth >= 768 && slider) {
        console.log('🖥️ Destroying slider for desktop view');
        slider.destroy();
        slider = null;
      }
    };

    // Inicializar
    initSlider();

    // Reinicializar en cambio de tamaño de ventana
    window.addEventListener('resize', initSlider);
  };

  // Esperar a que Swiper esté disponible
  if (typeof Swiper !== 'undefined') {
    console.log('🚀 Swiper is already available, initializing...');
    initPrincipalesSlider();
  } else {
    console.log('⏳ Waiting for Swiper to load...');
    document.addEventListener('swiper:loaded', () => {
      console.log('📦 Swiper loaded event received');
      initPrincipalesSlider();
    });
  }
});

export default initPrincipalesSlider; 