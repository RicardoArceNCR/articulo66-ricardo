{{-- Sección de SHOW --}}
<section class="container mx-auto px-4 py-8">
  <div class="grid lg:grid-cols-4 gap-6">
    <div class="lg:col-span-3">
      <h2 class="text-[#1D447A] font-['Raleway'] text-[23px] md:text-[31.021px] font-[800] leading-[43.66px] tracking-[-0.23px] md:tracking-[-0.31px] uppercase mb-2">SHOW</h2>
      <div class="flex w-full mb-6">
        <div class="w-[50px] h-[5px] bg-[#1BC6EB] flex-shrink-0"></div>
        <div class="flex-grow h-[5px] bg-[#EBEBEB]"></div>
      </div>
      
      <div class="grid lg:grid-cols-2 gap-6">
        @php
          $destacado1 = get_field('show_destacado_1', 'option');
          $destacado2 = get_field('show_destacado_2', 'option');
          $categoria_show = get_category_by_slug('show');
          
          if ($categoria_show && (!$destacado1 || !$destacado2)) {
            $args = [
              'post_type' => 'post',
              'posts_per_page' => 2,
              'cat' => $categoria_show->term_id,
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
                  <h3 class="text-white font-['Raleway'] text-[19px] font-semibold leading-[20px] tracking-[-0.38px] mb-2">
                    {{ $destacado1->post_title }}
                  </h3>
                  <span class="text-white font-['Roboto_Flex'] text-[12px] font-semibold leading-[26px]">
                    Por {{ get_the_author_meta('display_name', $destacado1->post_author) }}
                  </span>
                </div>
              </div>
            </a>
          </article>
        @elseif(isset($recientes) && $recientes->have_posts())
          @while($recientes->have_posts()) @php($recientes->the_post())
            <article class="relative group">
              <a href="{{ get_permalink() }}" class="block">
                <div class="relative aspect-[348/245] w-full">
                  <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'large') }}" 
                       alt="{{ get_the_title() }}" 
                       class="w-full h-full object-cover">
                  <div class="absolute bottom-0 left-0 right-0 h-[195px] bg-gradient-to-b from-transparent to-black"></div>
                  <div class="absolute bottom-0 left-0 p-4 z-10">
                    <h3 class="text-white font-['Raleway'] text-[19px] font-semibold leading-[20px] tracking-[-0.38px] mb-2">
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
                  <h3 class="text-white font-['Raleway'] text-[19px] font-semibold leading-[20px] tracking-[-0.38px] mb-2">
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
        @if($categoria_show)
          @include('sections.partials.show-secundarias')
        @endif
      </div>
    </div>

    {{-- Sidebar --}}
    <div class="lg:col-span-1">
      <div class="space-y-6">
        {{-- Sección de Caricaturas --}}
        @include('sections.partials.caricaturas')
        
        {{-- Espacio publicitario --}}
        <div class="bg-[#f8f9fa] p-4 rounded-lg text-center">
          <span class="text-[#6c757d] text-sm">Espacio publicitario</span>
        </div>
      </div>
    </div>
  </div>
</section> 