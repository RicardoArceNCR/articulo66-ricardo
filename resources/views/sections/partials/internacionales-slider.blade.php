@php
  $categoria_internacionales = get_category_by_slug('internacionales');
  if ($categoria_internacionales) {
    $args_internacionales = [
      'post_type' => 'post',
      'posts_per_page' => 8,
      'cat' => $categoria_internacionales->term_id,
      'orderby' => 'date',
      'order' => 'DESC'
    ];
    $posts_internacionales = new WP_Query($args_internacionales);
  }
@endphp

@if($categoria_internacionales && isset($posts_internacionales) && $posts_internacionales->have_posts())
  <div class="swiper-wrapper">
    @while($posts_internacionales->have_posts()) @php($posts_internacionales->the_post())
      <article class="swiper-slide group">
        <a href="{{ get_permalink() }}" class="block no-underline">
          <div class="relative overflow-hidden">
            <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'medium') }}" 
                 alt="{{ get_the_title() }}" 
                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
          </div>
          <div class="mt-3">
            <div class="mb-3">
              <span class="inline-block w-fit px-4 py-2 text-white text-[13px] font-bold leading-none tracking-[0.12px] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway'] rounded-sm whitespace-nowrap">
                Por {{ get_the_author_meta('display_name', get_the_author_meta('ID')) }}
              </span>
            </div>
            <h3 class="text-[#666666] font-['Raleway'] text-[1.14rem] font-semibold leading-[1.3rem] tracking-[0.001rem] hover:underline mb-2">
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