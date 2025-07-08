{{-- Sección de Especiales --}}
<section class="container mx-auto px-4 py-8">
  <div class="mb-8">
    <h2 class="text-[#1D447A] font-['Raleway'] text-[1.8rem] md:text-[2.20rem] font-[800] leading-[43.66px] tracking-[-0.23px] md:tracking-[-0.31px] uppercase">ESPECIALES</h2>
    <div class="flex w-full mb-6">
      <div class="w-[50px] h-[5px] bg-[#1BC6EB] flex-shrink-0"></div>
      <div class="flex-grow h-[5px] bg-[#EBEBEB]"></div>
    </div>
  </div>

  <div class="flex flex-wrap justify-between">
    @php
      $especial1 = get_field('especiales_1', 'option');
      $especial2 = get_field('especiales_2', 'option');
      $especial3 = get_field('especiales_3', 'option');
    @endphp

    @if($especial1)
      <article class="relative w-[316px] h-[428px] mb-6 overflow-hidden">
        <img src="{{ get_the_post_thumbnail_url($especial1->ID, 'large') }}" 
             alt="{{ $especial1->post_title }}" 
             class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 w-full bg-gradient-to-b from-transparent to-black p-4">
          <h3 class="inline text-white font-['Raleway'] text-[1.16rem] font-[600] leading-[1rem] tracking-[0.001rem] uppercase [box-decoration-break:clone] [-webkit-box-decoration-break:clone] bg-gradient-to-r from-[#1D447A] to-[#1F63C1] px-2 py-1">
            {{ $especial1->post_title }}
          </h3>
          <p class="text-white font-['Roboto_Flex'] text-[0.9rem] font-[600] leading-[26px] mt-2">
            Por {{ get_the_author_meta('display_name', $especial1->post_author) }}
          </p>
        </div>
      </article>
    @endif

    @if($especial2)
      <article class="relative w-[316px] h-[428px] mb-6 overflow-hidden">
        <img src="{{ get_the_post_thumbnail_url($especial2->ID, 'large') }}" 
             alt="{{ $especial2->post_title }}" 
             class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 w-full bg-gradient-to-b from-transparent to-black p-4">
          <h3 class="inline text-white font-['Raleway'] text-[1.16rem] font-[600] leading-[1rem] tracking-[0.001rem] uppercase [box-decoration-break:clone] [-webkit-box-decoration-break:clone] bg-gradient-to-r from-[#1D447A] to-[#1F63C1] px-2 py-1">
            {{ $especial2->post_title }}
          </h3>
          <p class="text-white font-['Roboto_Flex'] text-[0.9rem] font-[600] leading-[26px] mt-2">
            Por {{ get_the_author_meta('display_name', $especial2->post_author) }}
          </p>
        </div>
      </article>
    @endif

    @if($especial3)
      <article class="relative w-[316px] h-[428px] mb-6 overflow-hidden">
        <img src="{{ get_the_post_thumbnail_url($especial3->ID, 'large') }}" 
             alt="{{ $especial3->post_title }}" 
             class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 right-0 w-full bg-gradient-to-b from-transparent to-black p-4">
          <h3 class="inline text-white font-['Raleway'] text-[1.16rem] font-[600] leading-[1rem] tracking-[0.001rem] uppercase [box-decoration-break:clone] [-webkit-box-decoration-break:clone] bg-gradient-to-r from-[#1D447A] to-[#1F63C1] px-2 py-1">
            {{ $especial3->post_title }}
          </h3>
          <p class="text-white font-['Roboto_Flex'] text-[0.9rem] font-[600] leading-[26px] mt-2">
            Por {{ get_the_author_meta('display_name', $especial3->post_author) }}
          </p>
        </div>
      </article>
    @endif
  </div>
</section>
