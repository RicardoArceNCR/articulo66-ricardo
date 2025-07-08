@php
  $categoria_politica = get_category_by_slug('politica');
  if ($categoria_politica) {
    $args_politica = [
      'post_type' => 'post',
      'posts_per_page' => 8,
      'cat' => $categoria_politica->term_id,
      'orderby' => 'date',
      'order' => 'DESC'
    ];
    $posts_politica = new WP_Query($args_politica);
  }
@endphp

@if($categoria_politica && isset($posts_politica) && $posts_politica->have_posts())
  <div class="swiper-wrapper">
    @while($posts_politica->have_posts()) @php($posts_politica->the_post())
      <article class="swiper-slide group">
        <a href="{{ get_permalink() }}" class="block no-underline">
          <div class="relative overflow-hidden">
            <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'medium') }}" 
                 alt="{{ get_the_title() }}" 
                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
          </div>
          <div class="mt-3">
            <div class="mb-3">
              <span class="inline-block px-2 py-1 mb-2 text-white text-center text-[0.90rem] font-semibold rounded-xs leading-[1rem] tracking-[0.01rem] bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway']">
                Por {{ get_the_author_meta('display_name', get_the_author_meta('ID')) }}
              </span>
            </div>
            <h3 class="text-black text-[1.1rem] md:text-[1rem] font-medium leading-[1.55rem] md:leading-[1.4rem] font-['Raleway'] no-underline hover:underline active:underline">
              {{ get_the_title() }}
            </h3>
            <p class="text-[#7F7F7F] text-[13px] font-light leading-[19px] tracking-[-0.13px] font-['acumin-variable'] line-clamp-3">
              {{ get_the_excerpt() }}
            </p>
          </div>
        </a>
      </article>
    @endwhile
    @php(wp_reset_postdata())
  </div>
@endif 