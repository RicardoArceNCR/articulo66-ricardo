{{-- Sección de Noticias Nacionales --}}
<section class="container mx-auto px-4 py-8">
  <div class="grid lg:grid-cols-4 gap-6">
    <div class="lg:col-span-3">
      <h2 class="text-[#1D447A] font-['Raleway'] text-[23px] md:text-[2.6rem] font-[800] leading-[43.66px] tracking-[-0.23px] md:tracking-[-0.31px] uppercase mb-2">NACIONALES</h2>
      <div class="flex w-full mb-6">
        <div class="w-[50px] h-[5px] bg-[#1BC6EB] flex-shrink-0"></div>
        <div class="flex-grow h-[5px] bg-[#EBEBEB]"></div>
      </div>
      
      <div class="grid lg:grid-cols-2 gap-6">
        @php
          $destacado1 = get_field('nacionales_destacado_1', 'option');
          $destacado2 = get_field('nacionales_destacado_2', 'option');
          $categoria_nacionales = get_category_by_slug('nacionales');
          
          if (!$destacado1 || !$destacado2) {
            $args = [
              'post_type' => 'post',
              'posts_per_page' => 2,
              'cat' => $categoria_nacionales->term_id,
              'orderby' => 'date',
              'order' => 'DESC'
            ];
            $recientes = new WP_Query($args);
          }
        @endphp

        {{-- Noticias Principales --}}
        @if($destacado1)
          <article class="relative group">
            <a href="{{ get_permalink($destacado1->ID) }}" class="block">
              <div class="relative aspect-[348/245] w-full">
                <img src="{{ get_the_post_thumbnail_url($destacado1->ID, 'large') }}" 
                     alt="{{ $destacado1->post_title }}" 
                     class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 h-[195px] bg-gradient-to-b from-transparent to-black"></div>
                <div class="absolute bottom-0 left-0 p-4 z-10">
                  <h3 class="text-white font-['Raleway'] text-[19px] font-semibold leading-[1.4rem] tracking-[0.004rem] mb-2">
                    {{ $destacado1->post_title }}
                  </h3>
                  <span class="text-white font-['Roboto_Flex'] text-[12px] font-semibold leading-[26px]">
                    Por {{ get_the_author_meta('display_name', $destacado1->post_author) }}
                  </span>
                </div>
              </div>
            </a>
          </article>
        @elseif($recientes->have_posts())
          @while($recientes->have_posts()) @php($recientes->the_post())
            <article class="relative group">
              <a href="{{ get_permalink() }}" class="block">
                <div class="relative aspect-[348/245] w-full">
                  <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'large') }}" 
                       alt="{{ get_the_title() }}" 
                       class="w-full h-full object-cover">
                  <div class="absolute bottom-0 left-0 right-0 h-[195px] bg-gradient-to-b from-transparent to-black"></div>
                  <div class="absolute bottom-0 left-0 p-4 z-10">
                    <h3 class="text-white font-['Raleway'] text-[19px] font-semibold leading-[1.4rem] tracking-[0.004rem] mb-2">
                      {{ get_the_title() }}
                    </h3>
                    <span class="text-white font-['Roboto_Flex'] text-[12px] font-semibold leading-[26px]">
                      Por {{ get_the_author_meta('display_name', get_the_author_meta('ID')) }}
                    </span>
                  </div>
                </div>
              </a>
            </article>
          @endwhile
          @php(wp_reset_postdata())
        @endif

        @if($destacado2)
          <article class="relative group">
            <a href="{{ get_permalink($destacado2->ID) }}" class="block">
              <div class="relative aspect-[348/245] w-full">
                <img src="{{ get_the_post_thumbnail_url($destacado2->ID, 'large') }}" 
                     alt="{{ $destacado2->post_title }}" 
                     class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 h-[195px] bg-gradient-to-b from-transparent to-black"></div>
                <div class="absolute bottom-0 left-0 p-4 z-10">
                  <h3 class="text-white font-['Raleway'] text-[19px] font-semibold leading-[1.4rem] tracking-[0.004rem] mb-2">
                    {{ $destacado2->post_title }}
                  </h3>
                  <span class="text-white font-['Roboto_Flex'] text-[12px] font-semibold leading-[26px]">
                    Por {{ get_the_author_meta('display_name', $destacado2->post_author) }}
                  </span>
                </div>
              </div>
            </a>
          </article>
        @endif

        {{-- Noticias Secundarias --}}
        @include('sections.partials.nacionales-secundarias')
      </div>
    </div>

    {{-- Sidebar --}}
    <div class="lg:col-span-1">
      <div class="space-y-6">
        {{-- Widget de Más Leídas --}}
        <div class="mas-leidas">
          <div class="flex items-center justify-center gap-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="48" viewBox="0 0 25 48" fill="none">
              <path d="M15.8573 16.8444C17.5419 14.7909 20.5868 12.7216 25 10.6523L19.5982 0.400757C12.4328 3.54836 7.37108 7.1796 4.42897 11.2866C1.47896 15.3935 0 20.9989 0 28.1029V47.4008H25V24.1307H13.0497C13.2395 21.3319 14.1806 18.8979 15.8652 16.8444H15.8573Z" fill="#1BC6EB"/>
            </svg>
            <h3 class="text-[#767676] font-['Raleway'] text-[0.91rem] font-extrabold leading-[1.2rem] tracking-[0.009rem] uppercase">MÁS LEÍDAS</h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="48" viewBox="0 0 25 48" fill="none">
              <path d="M9.14269 30.9571C7.45809 33.0106 4.41316 35.0799 -2.91848e-06 37.1492L5.40177 47.4008C12.5672 44.2532 17.6289 40.6219 20.571 36.515C23.521 32.408 25 26.8026 25 19.6987L25 0.400761L2.94173e-07 0.400758L-1.74016e-06 23.6708L11.9503 23.6708C11.7605 26.4696 10.8194 28.9036 9.13477 30.9571L9.14269 30.9571Z" fill="#1BC6EB"/>
            </svg>
          </div>
          <div class="mb-6">
            <div class="flex w-full">
              <div class="flex-grow h-[5px] bg-[#EBEBEB]"></div>
              <div class="w-[50px] h-[5px] bg-[#1BC6EB]"></div>
              <div class="flex-grow h-[5px] bg-[#EBEBEB]"></div>
            </div>
          </div>

          {{-- Aquí irá el widget de más leídas --}}
          <?php dynamic_sidebar('nacionales-portada'); ?>
        </div>

        {{-- Espacio publicitario --}}
        <div class="bg-[#f8f9fa] p-4 rounded-lg text-center">
          <span class="text-[#6c757d] text-sm">Espacio publicitario</span>
        </div>
      </div>
    </div>
  </div>
</section> 