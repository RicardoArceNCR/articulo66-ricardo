{{-- Sección de Noticias Internacionales --}}
<section class="container mx-auto px-4 py-8">
  <div class="flex items-center justify-between mb-2 relative">
    <div class="flex-1">
      <h2 class="text-[#1D447A] font-['Raleway'] text-[2rem] md:text-[2.6rem] lg:text-[2.23rem] font-[800] leading-[43.66px] tracking-[-0.23px] md:tracking-[-0.31px] uppercase">INTERNACIONALES</h2>
    </div>
    
    {{-- Controles del Slider (Desktop) --}}
    <div class="navigation-buttons hidden md:flex items-center gap-2 ml-4">
      <button type="button" class="swiper-button-prev-custom w-[39px] h-[39px] flex items-center justify-center focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 39 39" fill="none">
          <rect x="0.5" y="0.5" width="38" height="38" fill="white" stroke="#EBEBEB"/>
          <path d="M23.388 10L23.4248 10L26 12.6481L19.2292 19.4866L26 26.3519L23.4248 29L23.388 29L14 19.5134L23.388 10Z" fill="#1D447A"/>
        </svg>
      </button>
      <button type="button" class="swiper-button-next-custom w-[39px] h-[39px] flex items-center justify-center focus:outline-none">
        <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="0.5" y="0.5" width="38" height="38" fill="white" stroke="#EBEBEB"/>
          <path d="M16.612 29H16.5752L14 26.3519L20.7708 19.5134L14 12.6481L16.5752 10H16.612L26 19.4866L16.612 29Z" fill="#1D447A"/>
        </svg>
      </button>
    </div>
  </div>

  <div class="flex w-full mb-6">
    <div class="w-[50px] h-[5px] bg-[#1BC6EB] flex-shrink-0"></div>
    <div class="flex-grow h-[5px] bg-[#EBEBEB]"></div>
  </div>

  <div class="relative">
    <div class="swiper-internacionales">
      @include('sections.partials.internacionales-slider')
      
      {{-- Paginación del Slider --}}
      <div class="swiper-pagination mt-4 md:hidden"></div>
    </div>
  </div>
</section>

<style>
/* Estilos para el slider de internacionales */
.swiper-internacionales {
  width: 100%;
  position: relative;
  overflow: hidden;
}

.swiper-internacionales .swiper-wrapper {
  display: flex;
}

.swiper-internacionales .swiper-slide {
  width: 100%;
}

.swiper-internacionales .swiper-slide img {
  width: 100%;
  height: 150px;
  object-fit: cover;
}

@media (min-width: 768px) {
  .swiper-internacionales {
    width: 100%;
    overflow: hidden !important;
  }

  .swiper-internacionales .swiper-slide {
    width: calc((100% - 72px) / 4) !important;
    margin-right: 24px !important;
  }

  .swiper-internacionales .swiper-slide:last-child {
    margin-right: 0 !important;
  }
}

/* Estilos para los botones de navegación */
.navigation-buttons {
  z-index: 10;
  display: none;
}

.swiper-button-prev-custom,
.swiper-button-next-custom {
  transition: all 0.3s ease;
  background: white;
  border: 1px solid #EBEBEB;
  cursor: pointer;
  display: none;
  align-items: center;
  justify-content: center;
  width: 39px;
  height: 39px;
  padding: 0;
  margin: 0;
}

.swiper-button-prev-custom:hover,
.swiper-button-next-custom:hover {
  opacity: 0.8;
}

.swiper-button-prev-custom.swiper-button-disabled,
.swiper-button-next-custom.swiper-button-disabled {
  opacity: 0.35;
  cursor: not-allowed;
}

@media (min-width: 768px) {
  .navigation-buttons {
    display: flex !important;
  }
  
  .swiper-button-prev-custom,
  .swiper-button-next-custom {
    display: flex !important;
  }
}

/* Estilos para la paginación */
.swiper-pagination {
  position: relative !important;
  bottom: 0 !important;
  display: flex;
  justify-content: center;
  gap: 8px;
  margin-top: 1rem;
}

@media (min-width: 768px) {
  .swiper-pagination {
    display: none !important;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const initInternacionalesSlider = () => {
    let slider = null;

    const initSlider = () => {
      const isMobile = window.innerWidth < 768;
      
      try {
        if (isMobile) {
          slider = new Swiper('.swiper-internacionales', {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 16,
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
          });
        } else {
          slider = new Swiper('.swiper-internacionales', {
            slidesPerView: 4,
            slidesPerGroup: 4,
            spaceBetween: 24,
            loop: true,
            navigation: {
              nextEl: '.swiper-button-next-custom',
              prevEl: '.swiper-button-prev-custom',
            },
            watchOverflow: true,
          });
        }
      } catch (error) {
        console.error('❌ Error al inicializar el slider de internacionales:', error);
      }
    };

    const cleanupSlider = () => {
      if (slider) {
        slider.destroy(true, true);
        slider = null;
      }
    };

    initSlider();

    let resizeTimeout;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(() => {
        cleanupSlider();
        initSlider();
      }, 250);
    });
  };

  initInternacionalesSlider();
});</script> 