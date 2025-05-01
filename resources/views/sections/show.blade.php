{{-- Sección de SHOW --}}
<section class="container mx-auto px-4 py-8">
  <div class="grid lg:grid-cols-4 gap-6">
    <div class="lg:col-span-3">
      <h2 class="text-[#1D447A] font-['Raleway'] text-[23px] md:text-[31.021px] font-[800] leading-[43.66px] tracking-[-0.23px] md:tracking-[-0.31px] uppercase mb-2">SHOW</h2>
      <div class="flex w-full mb-6">
        <div class="w-[50px] h-[5px] bg-[#1BC6EB] flex-shrink-0"></div>
        <div class="flex-grow h-[5px] bg-[#EBEBEB]"></div>
      </div>
      
      <div class="grid lg:grid-cols-2 gap-6">
        {{-- Noticias Principales --}}
        <article class="relative group">
          <a href="#" class="block">
            <div class="relative aspect-[348/245] w-full">
              <img src="https://placehold.co/348x243" alt="Título de la noticia principal" 
                   class="w-full h-full object-cover">
              <div class="absolute bottom-0 left-0 right-0 h-[195px] bg-gradient-to-b from-transparent to-black"></div>
              <div class="absolute bottom-0 left-0 p-4 z-10">
                <h3 class="text-white font-['Raleway'] text-[19px] font-semibold leading-[20px] tracking-[-0.38px] mb-2">Título de la noticia principal de SHOW</h3>
                <span class="text-white font-['Roboto_Flex'] text-[12px] font-semibold leading-[26px]">Por Artículo 66</span>
              </div>
            </div>
          </a>
        </article>

        <article class="relative group">
          <a href="#" class="block">
            <div class="relative aspect-[348/245] w-full">
              <img src="https://placehold.co/348x243" alt="Título de la noticia secundaria" 
                   class="w-full h-full object-cover">
              <div class="absolute bottom-0 left-0 right-0 h-[195px] bg-gradient-to-b from-transparent to-black"></div>
              <div class="absolute bottom-0 left-0 p-4 z-10">
                <h3 class="text-white font-['Raleway'] text-[19px] font-semibold leading-[20px] tracking-[-0.38px] mb-2">Título de la noticia secundaria de SHOW</h3>
                <span class="text-white font-['Roboto_Flex'] text-[12px] font-semibold leading-[26px]">Por Artículo 66</span>
              </div>
            </div>
          </a>
        </article>

        {{-- Noticias Secundarias --}}
        <div class="lg:col-span-2 grid md:grid-cols-2 gap-6">
          {{-- Noticia Secundaria 1 --}}
          <article class="flex gap-4 items-start">
            <div class="w-[105px] h-[80px] flex-shrink-0">
              <img src="https://placehold.co/105x80" alt="Título de la noticia secundaria 1" 
                   class="w-full h-full object-cover">
            </div>
            <div class="flex-grow">  
              <h3 class="text-black font-['Raleway'] text-[14px] font-semibold leading-[21px] tracking-[-0.42px]">Título de la noticia secundaria 1 de SHOW</h3>
              <span class="text-[#1D447A] font-['Roboto_Flex'] text-[12px] font-semibold leading-[26px] block mb-1">Por Artículo 66</span>
            </div>
          </article>

          {{-- Noticia Secundaria 2 --}}
          <article class="flex gap-4 items-start">
            <div class="w-[105px] h-[80px] flex-shrink-0">
              <img src="https://placehold.co/105x80" alt="Título de la noticia secundaria 2" 
                   class="w-full h-full object-cover">
            </div>
            <div class="flex-grow">
              <h3 class="text-black font-['Raleway'] text-[14px] font-semibold leading-[21px] tracking-[-0.42px]">Título de la noticia secundaria 2 de SHOW</h3>
              <span class="text-[#1D447A] font-['Roboto_Flex'] text-[12px] font-semibold leading-[26px] block mb-1">Por Artículo 66</span>
            </div>
          </article>

          {{-- Noticia Secundaria 3 --}}
          <article class="flex gap-4 items-start">
            <div class="w-[105px] h-[80px] flex-shrink-0">
              <img src="https://placehold.co/105x80" alt="Título de la noticia secundaria 3" 
                   class="w-full h-full object-cover">
            </div>
            <div class="flex-grow">
              <h3 class="text-black font-['Raleway'] text-[14px] font-semibold leading-[21px] tracking-[-0.42px]">Título de la noticia secundaria 3 de SHOW</h3>
              <span class="text-[#1D447A] font-['Roboto_Flex'] text-[12px] font-semibold leading-[26px] block mb-1">Por Artículo 66</span>
            </div>
          </article>

          {{-- Noticia Secundaria 4 --}}
          <article class="flex gap-4 items-start">
            <div class="w-[105px] h-[80px] flex-shrink-0">
              <img src="https://placehold.co/105x80" alt="Título de la noticia secundaria 4" 
                   class="w-full h-full object-cover">
            </div>
            <div class="flex-grow">
              <h3 class="text-black font-['Raleway'] text-[14px] font-semibold leading-[21px] tracking-[-0.42px]">Título de la noticia secundaria 4 de SHOW</h3>
              <span class="text-[#1D447A] font-['Roboto_Flex'] text-[12px] font-semibold leading-[26px] block mb-1">Por Artículo 66</span>
            </div>
          </article>
        </div>
      </div>
    </div>

    {{-- Sidebar --}}
    <div class="lg:col-span-1">
      <div class="space-y-6">
        {{-- Sección de Caricaturas --}}
        @include('sections.caricatura')
        
        {{-- Espacio publicitario --}}
        <div class="bg-[#f8f9fa] p-4 rounded-lg text-center">
          <span class="text-[#6c757d] text-sm">Espacio publicitario</span>
        </div>
      </div>
    </div>
  </div>
</section> 