@php
  // Obtener la categoría actual
  $current_category = get_queried_object();
  $args = [
    'post_type' => 'post',
    'posts_per_page' => 3,
    'cat' => $current_category->term_id,
    'orderby' => 'date',
    'order' => 'DESC'
  ];
  $destacados = new WP_Query($args);
  $posts = [];
  if($destacados->have_posts()) {
    while($destacados->have_posts()) {
      $destacados->the_post();
      $posts[] = get_post();
    }
    wp_reset_postdata();
  }
@endphp

@if(count($posts) > 0)
<section class="container mx-auto px-4 py-8">
  <div class="grid grid-cols-1 gap-6 lg:grid-cols-12 lg:gap-0">
    {{-- Artículo Principal --}}
    <div class="lg:col-span-8">
      @php $principal = $posts[0]; @endphp
      <article class="relative h-[240px] lg:h-[500px] group overflow-hidden">
        <a href="{{ get_permalink($principal->ID) }}" class="block h-full">
          <div class="absolute inset-0">
            <img src="{{ get_the_post_thumbnail_url($principal->ID, 'large') }}"
                 alt="{{ $principal->post_title }}"
                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
          </div>
          <div class="absolute bottom-0 left-0 right-0 h-1/2
              bg-gradient-to-t
              from-[rgba(0,0,0,0.98)]
              via-[rgba(0,0,0,0.8)]
              to-[rgba(0,0,0,0)]
            ">
            <div class="absolute bottom-0 p-6">
              @php
                $categoria = get_the_category($principal->ID);
                $categoria_nombre = !empty($categoria) ? $categoria[0]->name : '';
              @endphp
              <span class="inline-block px-3 py-1 mb-4 text-white text-center text-xs font-extrabold leading-[30.201px] tracking-[0.12px] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway']">
                {{ $categoria_nombre }}
              </span>
              <h2 class="text-white text-2xl md:text-[55.591px] font-medium leading-[53.297px] font-['Raleway'] mb-2 no-underline hover:underline">
                {{ $principal->post_title }}
              </h2>
              <p class="text-white text-[0.9rem] font-normal leading-[1.3rem] font-['Roboto Flex']">
                Por {{ get_the_author_meta('display_name', $principal->post_author) }}
              </p>
            </div>
          </div>
        </a>
      </article>
    </div>

    {{-- Artículos Secundarios --}}
    <div class="lg:col-span-4 space-y-6 lg:space-y-0">
      @foreach(array_slice($posts, 1, 2) as $secundario)
        <article class="relative h-[240px] lg:h-[250px] group overflow-hidden">
          <a href="{{ get_permalink($secundario->ID) }}" class="block h-full">
            <div class="absolute inset-0">
              <img src="{{ get_the_post_thumbnail_url($secundario->ID, 'medium') }}"
                   alt="{{ $secundario->post_title }}"
                   class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent">
              <div class="absolute bottom-0 p-4">
                @php
                  $categoria = get_the_category($secundario->ID);
                  $categoria_nombre = !empty($categoria) ? $categoria[0]->name : '';
                @endphp
                <span class="inline-block px-3 py-1 mb-2 text-white text-center text-xs font-extrabold leading-[30.201px] tracking-[0.12px] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway']">
                  {{ $categoria_nombre }}
                </span>
                <h3 class="text-white text-[18px] font-medium leading-[25.3px] tracking-[-0.18px] font-['Raleway'] mb-2 no-underline hover:underline">
                  {{ $secundario->post_title }}
                </h3>
                <p class="text-white text-[0.9rem] font-normal leading-[1.3rem] font-['Roboto Flex']">
                  Por {{ get_the_author_meta('display_name', $secundario->post_author) }}
                </p>
              </div>
            </div>
          </a>
        </article>
      @endforeach
    </div>
  </div>
</section>
@endif 