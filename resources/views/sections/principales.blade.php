{{-- Sección de Noticias Principales --}}
<section class="container mx-auto px-4 py-8 overflow-hidden">
  <div class="swiper-principales md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-4">
    <div class="swiper-wrapper md:!contents">
      @php
        $principal1 = get_field('principal_1', 'option');
        $principal2 = get_field('principal_2', 'option');
        $principal3 = get_field('principal_3', 'option');
        $principal4 = get_field('principal_4', 'option');
      @endphp

      @if($principal1)
        <article class="swiper-slide !w-[85%] md:!w-full md:px-0 group">
          <a href="{{ get_permalink($principal1->ID) }}" class="block no-underline">
            <div class="relative h-[200px] md:h-[207px] overflow-hidden mb-4">
              <img src="{{ get_the_post_thumbnail_url($principal1->ID, 'medium') }}" 
                   alt="{{ $principal1->post_title }}" 
                   class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="space-y-3">
              <div class="flex">
                <span class="inline-block w-fit px-4 py-2 text-white text-[0.8rem] font-bold leading-none tracking-[0.060rem] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway'] rounded-sm whitespace-nowrap">
                  Por {{ get_the_author_meta('display_name', $principal1->post_author) }}
                </span>
              </div>
              <h3 class="text-black text-[15px] md:text-[17px] font-medium leading-[1.44rem] font-['Raleway'] no-underline hover:underline active:underline">
                {{ $principal1->post_title }}
              </h3>
              <p class="text-[#7F7F7F] text-[13px] md:text-[14px] font-light leading-[19px] tracking-[-0.13px] font-['acumin-variable'] line-clamp-3" style="font-variation-settings: 'slnt' 0, 'wdth' 100, 'wght' 194.2857;">
                {{ get_the_excerpt($principal1->ID) }}
              </p>
            </div>
          </a>
        </article>
      @endif

      @if($principal2)
        <article class="swiper-slide !w-[85%] md:!w-full md:px-0 group">
          <a href="{{ get_permalink($principal2->ID) }}" class="block no-underline">
            <div class="relative h-[200px] md:h-[207px] overflow-hidden mb-4">
              <img src="{{ get_the_post_thumbnail_url($principal2->ID, 'medium') }}" 
                   alt="{{ $principal2->post_title }}" 
                   class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="space-y-3">
              <div class="flex">
                <span class="inline-block w-fit px-4 py-2 text-white text-[0.8rem] font-bold leading-none tracking-[0.060rem] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway'] rounded-sm whitespace-nowrap">
                  Por {{ get_the_author_meta('display_name', $principal2->post_author) }}
                </span>
              </div>
              <h3 class="text-black text-[15px] md:text-[17px] font-medium leading-[1.44rem] font-['Raleway'] no-underline hover:underline active:underline">
                {{ $principal2->post_title }}
              </h3>
              <p class="text-[#7F7F7F] text-[13px] md:text-[14px] font-light leading-[19px] tracking-[-0.13px] font-['acumin-variable'] line-clamp-3" style="font-variation-settings: 'slnt' 0, 'wdth' 100, 'wght' 194.2857;">
                {{ get_the_excerpt($principal2->ID) }}
              </p>
            </div>
          </a>
        </article>
      @endif

      @if($principal3)
        <article class="swiper-slide !w-[85%] md:!w-full md:px-0 group">
          <a href="{{ get_permalink($principal3->ID) }}" class="block no-underline">
            <div class="relative h-[200px] md:h-[207px] overflow-hidden mb-4">
              <img src="{{ get_the_post_thumbnail_url($principal3->ID, 'medium') }}" 
                   alt="{{ $principal3->post_title }}" 
                   class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="space-y-3">
              <div class="flex">
                <span class="inline-block w-fit px-4 py-2 text-white text-[0.8rem] font-bold leading-none tracking-[0.060rem] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway'] rounded-sm whitespace-nowrap">
                  Por {{ get_the_author_meta('display_name', $principal3->post_author) }}
                </span>
              </div>
              <h3 class="text-black text-[15px] md:text-[17px] font-medium leading-[1.44rem] font-['Raleway'] no-underline hover:underline active:underline">
                {{ $principal3->post_title }}
              </h3>
              <p class="text-[#7F7F7F] text-[13px] md:text-[14px] font-light leading-[19px] tracking-[-0.13px] font-['acumin-variable'] line-clamp-3" style="font-variation-settings: 'slnt' 0, 'wdth' 100, 'wght' 194.2857;">
                {{ get_the_excerpt($principal3->ID) }}
              </p>
            </div>
          </a>
        </article>
      @endif

      @if($principal4)
        <article class="swiper-slide !w-[85%] md:!w-full md:px-0 group">
          <a href="{{ get_permalink($principal4->ID) }}" class="block no-underline">
            <div class="relative h-[200px] md:h-[207px] overflow-hidden mb-4">
              <img src="{{ get_the_post_thumbnail_url($principal4->ID, 'medium') }}" 
                   alt="{{ $principal4->post_title }}" 
                   class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="space-y-3">
              <div class="flex">
                <span class="inline-block w-fit px-4 py-2 text-white text-[0.8rem] font-bold leading-none tracking-[0.060rem] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway'] rounded-sm whitespace-nowrap">
                  Por {{ get_the_author_meta('display_name', $principal4->post_author) }}
                </span>
              </div>
              <h3 class="text-black text-[15px] md:text-[17px] font-medium leading-[1.44rem] font-['Raleway'] no-underline hover:underline active:underline">
                {{ $principal4->post_title }}
              </h3>
              <p class="text-[#7F7F7F] text-[13px] md:text-[14px] font-light leading-[19px] tracking-[-0.13px] font-['acumin-variable'] line-clamp-3" style="font-variation-settings: 'slnt' 0, 'wdth' 100, 'wght' 194.2857;">
                {{ get_the_excerpt($principal4->ID) }}
              </p>
            </div>
          </a>
        </article>
      @endif
    </div>
    
    {{-- Paginación del Slider --}}
    <div class="swiper-pagination mt-4 md:hidden"></div>
  </div>
</section>

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  
  const initPrincipalesSlider = () => {
    let slider = null;

    const initSlider = () => {
      
      if (window.innerWidth < 768) {
        console.log('📱 Creating mobile slider...');
        try {
          slider = new Swiper('.swiper-principales', {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 16,
            initialSlide: 0,
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
              bulletClass: 'swiper-pagination-bullet',
              bulletActiveClass: 'swiper-pagination-bullet-active',
            },
          });
        } catch (error) {
          console.error('❌ Error creating slider:', error);
        }
      } else {
        console.log('🖥️ Setting up desktop grid');
        const container = document.querySelector('.swiper-principales');
        if (container) {
          container.classList.add('md:grid', 'md:grid-cols-2', 'lg:grid-cols-4', 'md:gap-6');
          const slides = container.querySelectorAll('.swiper-slide');
          slides.forEach(slide => {
            slide.classList.add('md:!w-full');
          });
        }
      }
    };

    // Limpiar clases y reinicializar
    const cleanupSlider = () => {
      if (slider) {
        slider.destroy(true, true);
        slider = null;
      }
      const container = document.querySelector('.swiper-principales');
      if (container) {
        container.classList.remove('md:grid', 'md:grid-cols-2', 'lg:grid-cols-4', 'md:gap-6');
      }
    };

    // Inicializar
    initSlider();

    // Reinicializar en cambio de tamaño de ventana
    window.addEventListener('resize', () => {
      cleanupSlider();
      initSlider();
    });
  };

  initPrincipalesSlider();
});
</script>

<style>
.swiper-principales .swiper-slide {
  width: 85%;
}

@media (min-width: 768px) {
  .swiper-principales {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
  }
  
  .swiper-principales .swiper-slide {
    width: 100% !important;
    margin-right: 0 !important;
  }
  
  .swiper-principales article {
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  
  .swiper-principales article a {
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  
  .swiper-principales article .space-y-3 {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: 0rem;
  }
}

@media (min-width: 1024px) {
  .swiper-principales {
    grid-template-columns: repeat(4, 1fr);
  }
}

/* Estilos para los bullets de paginación */
.swiper-pagination {
  position: relative !important;
  bottom: 0 !important;
  display: flex;
  justify-content: center;
  gap: 8px;
}

@media (min-width: 768px) {
  .swiper-pagination {
    display: none !important;
  }
}

.swiper-pagination-bullet {
  width: 10px !important;
  height: 10px !important;
  background: #D9D9D9 !important;
  opacity: 1 !important;
  margin: 0 !important;
}

.swiper-pagination-bullet-active {
  background: #1D447A !important;
}
</style>
@endpush