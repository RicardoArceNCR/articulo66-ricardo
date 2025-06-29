@extends('layouts.app')

@section('content')
  @php
    // Destacados personalizados
    $current_category = get_queried_object();
    $args_destacados = [
      'post_type' => 'post',
      'posts_per_page' => 3,
      'cat' => $current_category->term_id,
      'orderby' => 'date',
      'order' => 'DESC'
    ];
    $query_destacados = new WP_Query($args_destacados);
    $destacados_ids = [];
    if ($query_destacados->have_posts()) {
      while ($query_destacados->have_posts()) {
        $query_destacados->the_post();
        $destacados_ids[] = get_the_ID();
      }
      wp_reset_postdata();
    }
  @endphp

  <div class="container mx-auto px-4 py-8">
    {{-- Encabezado de la categoría --}}
    <div class="mb-8">
      <h1 class="text-[#1D447A] font-['Raleway'] text-[32px] font-bold leading-[1.2] tracking-[-0.32px] uppercase text-center mb-4">
        {{ $current_category->name }}
      </h1>
      <div class="relative w-full h-2 flex items-center justify-center">
        <div class="absolute left-0 right-0 h-[5px] bg-[#E5E5E5] w-full rounded"></div>
        <div class="relative z-10 h-[5px] w-24 bg-[#1D9BF0] mx-auto rounded"></div>
      </div>
    </div>

    {{-- Destacados de la categoría --}}
    @include('sections.partials.category-destacados', ['destacados_ids' => $destacados_ids])

    {{-- Grid de posts --}}
    @if(have_posts())
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @while(have_posts())
          @php(the_post())
          @if(!in_array(get_the_ID(), $destacados_ids))
            <article class="bg-white rounded-lg overflow-hidden hover:shadow-md transition-shadow duration-300 flex flex-col h-full">
              <a href="{{ get_permalink() }}" class="block h-full">
                <div class="relative overflow-hidden">
                  <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'large') }}"
                       alt="{{ get_the_title() }}"
                       class="w-full h-[180px] object-cover transition-transform duration-300 hover:scale-105">
                </div>
                <div class="p-4">
                  <span class="inline-block w-fit px-4 py-2 text-white text-[0.78rem] font-bold leading-none tracking-[0.12px] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] font-['Raleway'] rounded-sm whitespace-nowrap mb-2 ">Por {{ get_the_author() }}</span>
                  <h2 class="text-black text-[15px] md:text-[17px] font-medium leading-[21px] font-['Raleway'] no-underline hover:underline active:underline">
                    {{ get_the_title() }}
                  </h2>
                </div>
              </a>
            </article>
          @endif
        @endwhile
      </div>
      <div class="mt-8 flex justify-center">
        @include('partials.pagination')
      </div>
      @php(wp_reset_postdata())
    @else
      <div class="text-center py-12">
        <p class="text-[#929292] font-['Raleway'] text-[16px]">
          No hay artículos disponibles en esta categoría.
        </p>
      </div>
    @endif
  </div>
@endsection 