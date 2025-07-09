@php
  $categoria_caricaturas = get_category_by_slug('caricaturas');
  if ($categoria_caricaturas) {
    $args_caricaturas = [
      'post_type' => 'post',
      'posts_per_page' => 4,
      'cat' => $categoria_caricaturas->term_id,
      'orderby' => 'date',
      'order' => 'DESC'
    ];
    $caricaturas = new WP_Query($args_caricaturas);
  }
@endphp

@if($categoria_caricaturas)
  <div class="bg-white rounded-lg">
    <div class="flex items-center justify-between">
      <h3 class="text-[#1D447A] font-['Raleway'] text-[2rem] md:text-[2.6rem] lg:text-[2.23rem] font-[800] leading-[43.66px] tracking-[-0.23px] md:tracking-[-0.31px] uppercase mb-2">CARICATURAS</h3>
      <a href="{{ get_category_link($categoria_caricaturas->term_id) }}" class="ml-auto text-right text-[#1D447A] font-['Raleway'] text-[1.1rem] font-[800] leading-[25px] tracking-[-0.12px] uppercase hover:underline
          bg-[#f8f9fa] px-2 py-1 rounded-full flex items-center justify-center w-[32px] h-[32px]">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="19" viewBox="0 0 12 19" fill="none" class="inline-block">
          <path d="M2.61204 19H2.57522L0 16.3519L6.77076 9.51336L0 2.64812L2.57522 0H2.61204L12 9.48664L2.61204 19Z" fill="#1D447A"/>
        </svg>
      </a>
    </div>
    <div class="flex w-full mb-6">
        <div class="w-[50px] h-[5px] bg-[#1BC6EB] flex-shrink-0"></div>
        <div class="flex-grow h-[5px] bg-[#EBEBEB]"></div>
      </div>
    
    @if(isset($caricaturas) && $caricaturas->have_posts())
      <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-1 gap-4">
        @while($caricaturas->have_posts()) @php($caricaturas->the_post())
          <article class="group">
            <a href="{{ get_permalink() }}" class="block">
              <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'medium') }}" 
                   alt="{{ get_the_title() }}" 
                   class="w-full h-auto object-cover transition-transform duration-300 group-hover:scale-105">
            </a>
          </article>
        @endwhile
        @php(wp_reset_postdata())
      </div>
    @endif
  </div>
@endif 