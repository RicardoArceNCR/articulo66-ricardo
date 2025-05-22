{{-- Sección de Artículos Destacados --}}
<section class="container mx-auto px-4 py-8">
  <div class="grid grid-cols-1 gap-6 lg:grid-cols-12 lg:gap-0">
    {{-- Artículo Principal --}}
    @php
      $principal = get_field('articulo_principal', 'option');
      $secundario1 = get_field('articulo_secundario_1', 'option');
      $secundario2 = get_field('articulo_secundario_2', 'option');
    @endphp

    @if($principal)
      <div class="lg:col-span-8">
        <article class="relative h-[240px] lg:h-[500px] group overflow-hidden">
          <a href="{{ get_permalink($principal->ID) }}" class="block h-full">
            <div class="absolute inset-0">
              <img src="{{ get_the_post_thumbnail_url($principal->ID, 'large') }}" 
                   alt="{{ $principal->post_title }}" 
                   class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent">
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
                <p class="text-white text-xs font-semibold leading-[30.201px] font-['Roboto Flex']">
                  Por {{ get_the_author_meta('display_name', $principal->post_author) }}
                </p>
              </div>
            </div>
          </a>
        </article>
      </div>
    @endif

    {{-- Artículos Secundarios --}}
    <div class="lg:col-span-4 space-y-6 lg:space-y-0">
      @if($secundario1)
        <article class="relative h-[240px] lg:h-[250px] group overflow-hidden">
          <a href="{{ get_permalink($secundario1->ID) }}" class="block h-full">
            <div class="absolute inset-0">
              <img src="{{ get_the_post_thumbnail_url($secundario1->ID, 'medium') }}" 
                   alt="{{ $secundario1->post_title }}" 
                   class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent">
              <div class="absolute bottom-0 p-4">
                @php
                  $categoria = get_the_category($secundario1->ID);
                  $categoria_nombre = !empty($categoria) ? $categoria[0]->name : '';
                @endphp
                <span class="inline-block px-3 py-1 mb-2 text-white text-center text-xs font-extrabold leading-[30.201px] tracking-[0.12px] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway']">
                  {{ $categoria_nombre }}
                </span>
                <h3 class="text-white text-[18px] font-medium leading-[25.3px] tracking-[-0.18px] font-['Raleway'] mb-2 no-underline hover:underline">
                  {{ $secundario1->post_title }}
                </h3>
                <p class="text-white text-xs font-semibold leading-[30.201px] font-['Roboto Flex']">
                  Por {{ get_the_author_meta('display_name', $secundario1->post_author) }}
                </p>
              </div>
            </div>
          </a>
        </article>
      @endif

      @if($secundario2)
        <article class="relative h-[240px] lg:h-[250px] group overflow-hidden">
          <a href="{{ get_permalink($secundario2->ID) }}" class="block h-full">
            <div class="absolute inset-0">
              <img src="{{ get_the_post_thumbnail_url($secundario2->ID, 'medium') }}" 
                   alt="{{ $secundario2->post_title }}" 
                   class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent">
              <div class="absolute bottom-0 p-4">
                @php
                  $categoria = get_the_category($secundario2->ID);
                  $categoria_nombre = !empty($categoria) ? $categoria[0]->name : '';
                @endphp
                <span class="inline-block px-3 py-1 mb-2 text-white text-center text-xs font-extrabold leading-[30.201px] tracking-[0.12px] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway']">
                  {{ $categoria_nombre }}
                </span>
                <h3 class="text-white text-[18px] font-medium leading-[25.3px] tracking-[-0.18px] font-['Raleway'] mb-2 no-underline hover:underline">
                  {{ $secundario2->post_title }}
                </h3>
                <p class="text-white text-xs font-semibold leading-[30.201px] font-['Roboto Flex']">
                  Por {{ get_the_author_meta('display_name', $secundario2->post_author) }}
                </p>
              </div>
            </div>
          </a>
        </article>
      @endif
    </div>
  </div>
</section> 