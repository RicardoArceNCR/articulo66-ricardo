@php
/**
 * Variables requeridas:
 * - $section_title: Título de la sección
 * - $category_slug: Slug de la categoría
 * - $posts_per_page: Número de posts a mostrar
 * - $layout: Layout específico de la sección (grid, slider, etc)
 */

// Obtener la categoría
$category = get_category_by_slug($category_slug);

// Configurar la consulta base
$args = [
  'post_type' => 'post',
  'posts_per_page' => $posts_per_page,
  'orderby' => 'date',
  'order' => 'DESC'
];

// Agregar categoría si existe
if ($category) {
  $args['cat'] = $category->term_id;
}

// Ejecutar la consulta
$query = new WP_Query($args);
@endphp

@if($category)
  <section class="bg-white p-4 rounded-lg mb-6">
    {{-- Encabezado de la sección --}}
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-[#1D447A] font-['Raleway'] text-[18px] font-bold leading-[25px] tracking-[-0.18px] uppercase">
        {{ $section_title }}
      </h2>
      <a href="{{ get_category_link($category->term_id) }}" 
         class="text-[#1D447A] font-['Raleway'] text-[12px] font-bold leading-[25px] tracking-[-0.12px] uppercase hover:underline">
        VER TODAS
      </a>
    </div>

    {{-- Contenido de la sección --}}
    @if($query->have_posts())
      <div class="{{ $layout === 'grid' ? 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4' : 'space-y-4' }}">
        @while($query->have_posts()) @php($query->the_post())
          <article class="group">
            <a href="{{ get_permalink() }}" class="block">
              {{-- Imagen destacada --}}
              <div class="relative overflow-hidden rounded-lg mb-3">
                <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'medium') }}" 
                     alt="{{ get_the_title() }}" 
                     class="w-full h-auto object-cover transition-transform duration-300 group-hover:scale-105">
              </div>

              {{-- Título --}}
              <h3 class="text-[#1D447A] font-['Raleway'] text-[15px] font-bold leading-[20px] tracking-[-0.15px] mb-2 group-hover:text-[#F5A623]">
                {{ get_the_title() }}
              </h3>

              {{-- Autor --}}
              <div class="text-[#929292] font-['Raleway'] text-[12px] font-medium leading-[20px]">
                Por {{ get_the_author() }}
              </div>
            </a>
          </article>
        @endwhile
      </div>
      @php(wp_reset_postdata())
    @else
      <p class="text-center text-gray-500">No hay artículos disponibles.</p>
    @endif
  </section>
@endif 