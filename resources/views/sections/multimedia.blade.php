{{-- Sección de Multimedia --}}
<div class="w-full bg-[#1B2431] bg-[url('{{ get_theme_file_uri('public/images/bg-multimedia-home.jpg') }}')] bg-center bg-top bg-no-repeat bg-cover">
  <div class="container mx-auto px-4 py-8">
    <div class="mb-6">
      <h2 class="text-white font-['Raleway'] text-[23px] md:text-[31.021px] font-[800] leading-[43.66px] tracking-[-0.23px] md:tracking-[-0.31px] uppercase mb-2">MULTIMEDIA</h2>
      <div class="w-[50px] h-[5px] bg-[#1BC6EB]"></div>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
      {{-- Video Principal --}}
      <div class="lg:col-span-2">
        <article class="relative">
          <div class="relative aspect-[16/9] w-full">
            <iframe 
              class="absolute top-0 left-0 w-full h-full"
              src="https://www.youtube.com/embed/cAvNb_ZnmFk?si=cTcVfPyyKnTmAXyC" 
              title="YouTube video player" 
              frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
              referrerpolicy="strict-origin-when-cross-origin" 
              allowfullscreen>
            </iframe>
          </div>
          <h3 class="text-white font-['Raleway'] text-[22px] font-[500] leading-[31.263px] tracking-[-0.88px]">GOBIERNO TEME A OENEGÉS</h3>
        </article>
      </div>

      {{-- Lista de Videos Secundarios --}}
      <div class="space-y-4">
        {{-- Video Secundario 1 --}}
        <article class="flex gap-4">
          <div class="relative w-[160px] h-[90px] flex-shrink-0">
            <img src="https://placehold.co/160x90" alt="Karla González" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
              <svg class="w-8 h-8" viewBox="0 0 24 24" fill="white">
                <path d="M8 5v14l11-7z"/>
              </svg>
            </div>
          </div>
          <div>
            <h4 class="text-white font-['Raleway'] text-[14px] font-semibold leading-[18px] mb-1">Karla González, representante de Nicaragua, se alza con el título a «Mejor Rostro» en el Reinado Internacional del...</h4>
          </div>
        </article>

        {{-- Video Secundario 2 --}}
        <article class="flex gap-4">
          <div class="relative w-[160px] h-[90px] flex-shrink-0">
            <img src="https://placehold.co/160x90" alt="Karla González" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
              <svg class="w-8 h-8" viewBox="0 0 24 24" fill="white">
                <path d="M8 5v14l11-7z"/>
              </svg>
            </div>
          </div>
          <div>
            <h4 class="text-white font-['Raleway'] text-[14px] font-semibold leading-[18px] mb-1">Karla González, representante de Nicaragua, se alza con el título a «Mejor Rostro» en el Reinado Internacional del...</h4>
          </div>
        </article>

        {{-- Video Secundario 3 --}}
        <article class="flex gap-4">
          <div class="relative w-[160px] h-[90px] flex-shrink-0">
            <img src="https://placehold.co/160x90" alt="Karla González" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
              <svg class="w-8 h-8" viewBox="0 0 24 24" fill="white">
                <path d="M8 5v14l11-7z"/>
              </svg>
            </div>
          </div>
          <div>
            <h4 class="text-white font-['Raleway'] text-[14px] font-semibold leading-[18px] mb-1">Karla González, representante de Nicaragua, se alza con el título a «Mejor Rostro» en el Reinado Internacional del...</h4>
          </div>
        </article>

        {{-- Botón Ver Todos --}}
        <div class="text-right">
          <a href="#" class="inline-flex items-center gap-2 text-white hover:text-[#1BC6EB] transition-colors duration-300">
            <span class="font-['Raleway'] text-[14px] font-[800] leading-[43.66px] tracking-[-0.14px] uppercase">VER TODOS</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="19" viewBox="0 0 12 19" fill="none">
              <path d="M2.61204 19H2.57522L0 16.3519L6.77076 9.51336L0 2.64812L2.57522 0H2.61204L12 9.48664L2.61204 19Z" fill="currentColor"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div> 