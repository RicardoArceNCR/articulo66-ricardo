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
  <div class="bg-white p-4 rounded-lg">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-[#1D447A] font-['Raleway'] text-[18px] font-bold leading-[25px] tracking-[-0.18px] uppercase">CARICATURAS</h3>
      <a href="{{ get_category_link($categoria_caricaturas->term_id) }}" class="text-[#1D447A] font-['Raleway'] text-[12px] font-bold leading-[25px] tracking-[-0.12px] uppercase hover:underline">
        VER TODAS LAS CARICATURAS
      </a>
    </div>
    
    @if(isset($caricaturas) && $caricaturas->have_posts())
      <div class="space-y-4">
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