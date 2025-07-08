@php
  if ($categoria_nacionales) {
    $args_secundarias = [
      'post_type' => 'post',
      'posts_per_page' => 4,
      'cat' => $categoria_nacionales->term_id,
      'orderby' => 'date',
      'order' => 'DESC',
      'offset' => 2
    ];
    $secundarias = new WP_Query($args_secundarias);
  }
@endphp

@if($categoria_nacionales && isset($secundarias) && $secundarias->have_posts())
  <div class="md:col-span-2 grid md:grid-cols-2 gap-6">
    @while($secundarias->have_posts()) @php($secundarias->the_post())
      <article class="flex gap-4 items-start">
        <div class="w-[105px] h-[80px] flex-shrink-0">
          <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') }}" 
               alt="{{ get_the_title() }}" 
               class="w-full h-full object-cover">
        </div>
        <div class="flex-grow">  
          <h3 class="text-black text-[0.97rem] md:text-[0.97rem] font-medium leading-[1.33rem] font-['Raleway'] no-underline hover:underline active:underline">
            {{ get_the_title() }}
          </h3>
          <span class="text-[#1D447A] font-['Roboto_Flex'] text-[0.9rem] font-semibold leading-[26px] block mb-1">
            Por {{ get_the_author_meta('display_name', get_the_author_meta('ID')) }}
          </span>
        </div>
      </article>
    @endwhile
    @php(wp_reset_postdata())
  </div>
@endif 