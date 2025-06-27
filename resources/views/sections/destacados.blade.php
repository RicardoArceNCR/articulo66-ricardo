{{-- Sección de Artículos Destacados --}}
<section class="
    mx-auto px-2 py-8
    max-w-[99%]
    sm:max-w-[98%]
    md:max-w-[96%]
    lg:max-w-[94%]
    xl:max-w-[84%]
  ">
  <div class="grid grid-cols-1 gap-2 lg:grid-cols-12 lg:gap-0">
    {{-- Artículo Principal --}}
    @php
      $principal = get_field('articulo_principal', 'option');
      $secundario1 = get_field('articulo_secundario_1', 'option');
      $secundario2 = get_field('articulo_secundario_2', 'option');
    @endphp

    @if($principal)
      <div class="lg:col-span-8 border-r-4 border-white">
        <article class="relative h-[240px] lg:h-[500px] group overflow-hidden">
          <a href="{{ get_permalink($principal->ID) }}" class="block h-full">
            <div class="absolute inset-0">
              <img src="{{ get_the_post_thumbnail_url($principal->ID, 'large') }}" 
                   alt="{{ $principal->post_title }}" 
                   class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="
              absolute bottom-0 left-0 right-0 h-1/2
              bg-gradient-to-t
              from-[rgba(0,0,0,0.98)]
              via-[rgba(0,0,0,0.8)]
              to-[rgba(0,0,0,0)]
            ">
              <div class="absolute bottom-0 px-[0.7rem] lg:px-[0.1rem] sm:px-[1rem] md:px-[1.5rem] lg:px-[1.4rem] py-[0.9rem] lg:py-[0.2rem]">
                @php
                  $categoria = get_the_category($principal->ID);
                  $categoria_nombre = !empty($categoria) ? $categoria[0]->name : '';
                @endphp
                <span class="inline-block px-2 py-1 mb-2 text-white text-center text-[0.78rem] font-extrabold rounded-xs leading-[1rem] tracking-[0.12rem] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway']">
                  {{ $categoria_nombre }}
                </span>
                <h2 class="text-[1.25rem] sm:text-[1.875rem] md:text-[1.35rem] lg:text-[2.5rem] text-white font-medium leading-[1.5rem] sm:leading-[2rem] md:leading-[2.8rem] lg:leading-[2.6rem] font-['Raleway'] mb-[0.29rem] lg:mb-[0.5rem] no-underline hover:underline">
                  {{ $principal->post_title }}
                </h2>
                <p class="text-white text-base font-medium leading-[1.4rem] mb-[0.1rem] lg:mb-[1rem] font-['Roboto Flex']">
                  Por {{ get_the_author_meta('display_name', $principal->post_author) }}
                </p>
              </div>
            </div>
          </a>
        </article>
      </div>
    @endif

    {{-- Artículos Secundarios --}}
    <div class="lg:col-span-4 space-y-1 lg:space-y-0">
      @if($secundario1)
        <article class="relative h-[240px] lg:h-[250px] group overflow-hidden border-b-4 border-white">
          <a href="{{ get_permalink($secundario1->ID) }}" class="block h-full">
            <div class="absolute inset-0">
              <img src="{{ get_the_post_thumbnail_url($secundario1->ID, 'medium') }}" 
                   alt="{{ $secundario1->post_title }}" 
                   class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1/2
              bg-gradient-to-t
              from-[rgba(0,0,0,0.98)]
              via-[rgba(0,0,0,0.8)]
              to-[rgba(0,0,0,0)]
            ">
              <div class="absolute bottom-0 px-[0.67rem] lg:px-[0.1rem] sm:px-[1rem] md:px-[1.5rem] lg:px-[1rem] py-[0.6rem] lg:py-[0.58rem]">
                @php
                  $categoria = get_the_category($secundario1->ID);
                  $categoria_nombre = !empty($categoria) ? $categoria[0]->name : '';
                @endphp
                <span class="inline-block px-2 py-1 mb-2 text-white text-center text-[0.78rem] font-extrabold rounded-xs leading-[1rem] tracking-[0.12rem] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway']">
                  {{ $categoria_nombre }}
                </span>
                <h3 class="text-white text-[1.35rem] lg:text-[1.25rem] font-medium md:font-semibold leading-[1.4rem] tracking-[-0.18px] font-['Raleway'] mb-2 no-underline hover:underline">
                  {{ $secundario1->post_title }}
                </h3>
                <p class="text-white text-[0.9rem] font-normal leading-[1.3rem] font-['Roboto Flex']">
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
            <div class="absolute bottom-0 left-0 right-0 h-1/2
              bg-gradient-to-t
              from-[rgba(0,0,0,0.98)]
              via-[rgba(0,0,0,0.8)]
              to-[rgba(0,0,0,0)]">
              <div class="absolute bottom-0 absolute bottom-0 px-[0.67rem] lg:px-[0.1rem] sm:px-[1rem] md:px-[1.5rem] lg:px-[1rem] py-[0.6rem] lg:py-[0.58rem]">
                @php
                  $categoria = get_the_category($secundario2->ID);
                  $categoria_nombre = !empty($categoria) ? $categoria[0]->name : '';
                @endphp
                <span class="inline-block px-2 py-1 mb-2 text-white text-center text-[0.78rem] font-extrabold rounded-xs leading-[1rem] tracking-[0.12rem] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway']">
                  {{ $categoria_nombre }}
                </span>
                <h3 class="text-white text-[1.35rem] lg:text-[1.25rem] font-medium md:font-semibold leading-[1.4rem] tracking-[-0.18px] font-['Raleway'] mb-2 no-underline hover:underline">
                  {{ $secundario2->post_title }}
                </h3>
                <p class="text-white text-[0.9rem] font-normal leading-[1.3rem] font-['Roboto Flex']">
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