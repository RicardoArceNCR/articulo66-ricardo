{{-- Banner móvil --}}
<div class="block lg:hidden w-full">
  <a href="https://cdnicaraguense.org" target="_blank" class="block">
    <img src="{{ get_theme_file_uri('public/images/banner-mobile.jpg') }}" 
         alt="Conocer tus derechos es el primer paso hacia la libertad" 
         class="w-full h-auto">
  </a>
</div>

{{-- Barra superior con fecha y redes sociales --}}
<div class="bg-[#E7E7E7] h-[38.847px] flex items-center">
  <div class="px-2 w-full">
    <div class="flex justify-between items-center">
      <div class="flex items-center space-x-4">
        {{-- Botón de menú hamburguesa --}}
        <button type="button" 
                class="text-gray-600 hover:text-gray-900 focus:outline-none" 
                @click="sidebarOpen = !sidebarOpen">
          <span class="sr-only">Menú principal</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="17" viewBox="0 0 26 17" fill="none">
            <rect width="26" height="3" fill="#5D5D5D"/>
            <rect y="7" width="26" height="3" fill="#5D5D5D"/>
            <rect y="14" width="26" height="3" fill="#5D5D5D"/>
          </svg>
        </button>

        {{-- Fecha --}}
        <div class="text-[#777] text-xs font-medium leading-[23.247px] font-['Raleway']">
          <span class="hidden md:inline">
            {{ \Carbon\Carbon::now()->locale('es')->isoFormat('dddd D [de] MMMM [del] YYYY') }}
          </span>
          <span class="md:hidden text-[12px]">
            {{ \Carbon\Carbon::now()->locale('es')->isoFormat('ddd DD [de] MMM') }}
          </span>
        </div>
      </div>
      
      {{-- Redes Sociales --}}
      <div class="flex items-center space-x-3">
        {{-- Link a Contáctenos --}}
        <a href="/contactenos" class="hidden md:block text-[#262626] text-right text-sm font-bold leading-[26px]">Contáctenos</a>
        
        {{-- Separador vertical --}}
        <div class="hidden md:block w-[1px] h-[27px] bg-[#AFB2B8]"></div>

        {{-- Redes Sociales --}}
        <div class="flex items-center gap-4">
          {{-- Facebook --}}
          <a href="https://www.facebook.com/Articulo66/" class="block">
            <span class="sr-only">Facebook</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="21" viewBox="0 0 11 21" fill="none">
              <path d="M10.6572 9.63541L10.4014 11.6893C10.3582 12.0323 10.0676 12.2904 9.72298 12.2904H6.39648V20.8775C6.04567 20.9092 5.69022 20.9254 5.33091 20.9254C4.5273 20.9254 3.743 20.8451 2.98497 20.6921V12.2904H0.426535C0.191632 12.2904 0 12.098 0 11.8624V9.29232C0 9.05665 0.191632 8.86424 0.426535 8.86424H2.98497V5.00997C2.98497 2.64471 4.89433 0.727626 7.25032 0.727626H10.2353C10.4702 0.727626 10.6618 0.92003 10.6618 1.15571V3.72573C10.6618 3.96141 10.4702 4.15381 10.2353 4.15381H8.10262C7.16069 4.15381 6.39725 4.92034 6.39725 5.86691V8.86502H9.97952C10.3906 8.86502 10.7082 9.22664 10.658 9.63618L10.6572 9.63541Z" fill="#AFB2B8"/>
            </svg>
          </a>

          {{-- Twitter --}}
          <a href="https://x.com/articulo66nica" class="block">
            <span class="sr-only">Twitter</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" viewBox="0 0 19 17" fill="none">
  <path d="M11.8298 7.41598L18.0401 0.773778H15.6818L10.8075 5.98801L7.07459 0.773778H0.624023L7.15341 9.89482L0.624023 16.8793H2.98233L8.17647 11.3236L12.1536 16.8793H18.6042L11.8298 7.41675V7.41598ZM3.94744 2.48224H6.19602L15.28 15.1709H13.0314L3.94744 2.48224Z" fill="#AFB2B8"/>
</svg>
          </a>

          {{-- Instagram --}}
          <a href="https://www.instagram.com/articulo66/" class="block">
            <span class="sr-only">Instagram</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
  <path d="M12.7835 0.773778H4.45292C2.30634 0.773778 0.56543 2.51469 0.56543 4.66127V12.9918C0.56543 15.1384 2.30634 16.8793 4.45292 16.8793H12.7835C14.9301 16.8793 16.671 15.1384 16.671 12.9918V4.66127C16.671 2.51469 14.9301 0.773778 12.7835 0.773778ZM15.2824 12.7137C15.2824 14.2467 14.0384 15.4908 12.5053 15.4908H4.73033C3.19727 15.4908 1.95321 14.2467 1.95321 12.7137V4.93867C1.95321 3.40562 3.19727 2.16156 4.73033 2.16156H12.5053C14.0384 2.16156 15.2824 3.40562 15.2824 4.93867V12.7137Z" fill="#AFB2B8"/>
  <path d="M8.62681 4.66113C6.328 4.66113 4.46191 6.52722 4.46191 8.82602C4.46191 11.1248 6.328 12.9909 8.62681 12.9909C10.9256 12.9909 12.7917 11.1248 12.7917 8.82602C12.7917 6.52722 10.9256 4.66113 8.62681 4.66113ZM8.62681 11.6031C7.09685 11.6031 5.8497 10.356 5.8497 8.82602C5.8497 7.29606 7.09685 6.04891 8.62681 6.04891C10.1568 6.04891 11.4039 7.29606 11.4039 8.82602C11.4039 10.356 10.1568 11.6031 8.62681 11.6031Z" fill="#AFB2B8"/>
  <path d="M13.0693 5.21677C12.6103 5.21677 12.2363 4.84278 12.2363 4.38379C12.2363 3.9248 12.6103 3.55081 13.0693 3.55081C13.5283 3.55081 13.9023 3.9248 13.9023 4.38379C13.9023 4.84278 13.5283 5.21677 13.0693 5.21677Z" fill="#AFB2B8"/>
</svg>
          </a>

          {{-- YouTube --}}
          <a href="https://www.youtube.com/channel/UCYtZARRuGWK9wV49RBmmFfw" class="block">
            <span class="sr-only">YouTube</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
  <path d="M12.7835 0.773778H4.45292C2.30634 0.773778 0.56543 2.51469 0.56543 4.66127V12.9918C0.56543 15.1384 2.30634 16.8793 4.45292 16.8793H12.7835C14.9301 16.8793 16.671 15.1384 16.671 12.9918V4.66127C16.671 2.51469 14.9301 0.773778 12.7835 0.773778ZM15.2824 12.7137C15.2824 14.2467 14.0384 15.4908 12.5053 15.4908H4.73033C3.19727 15.4908 1.95321 14.2467 1.95321 12.7137V4.93867C1.95321 3.40562 3.19727 2.16156 4.73033 2.16156H12.5053C14.0384 2.16156 15.2824 3.40562 15.2824 4.93867V12.7137Z" fill="#AFB2B8"/>
  <path d="M8.62681 4.66113C6.328 4.66113 4.46191 6.52722 4.46191 8.82602C4.46191 11.1248 6.328 12.9909 8.62681 12.9909C10.9256 12.9909 12.7917 11.1248 12.7917 8.82602C12.7917 6.52722 10.9256 4.66113 8.62681 4.66113ZM8.62681 11.6031C7.09685 11.6031 5.8497 10.356 5.8497 8.82602C5.8497 7.29606 7.09685 6.04891 8.62681 6.04891C10.1568 6.04891 11.4039 7.29606 11.4039 8.82602C11.4039 10.356 10.1568 11.6031 8.62681 11.6031Z" fill="#AFB2B8"/>
  <path d="M13.0693 5.21677C12.6103 5.21677 12.2363 4.84278 12.2363 4.38379C12.2363 3.9248 12.6103 3.55081 13.0693 3.55081C13.5283 3.55081 13.9023 3.9248 13.9023 4.38379C13.9023 4.84278 13.5283 5.21677 13.0693 5.21677Z" fill="#AFB2B8"/>
</svg>
          </a>

          {{-- WhatsApp --}}
          <a href="#" class="block">
            <span class="sr-only">WhatsApp</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
  <path d="M9.47318 0.611317C4.72797 0.765859 0.809571 4.60854 0.571577 9.34987C0.485806 11.0591 0.862888 12.6748 1.59619 14.0773L0.566168 18.6904C0.522896 18.899 0.707574 19.0837 0.916205 19.0404L5.52927 18.0104H5.53236C6.92556 18.7383 8.52429 19.1154 10.2212 19.0365C14.9548 18.8171 18.8098 14.9281 18.9929 10.1929C19.2 4.82953 14.8288 0.437458 9.47318 0.611317ZM9.77994 17.1388C8.43852 17.1388 7.1821 16.7764 6.10185 16.1435C5.99985 16.0863 5.90172 16.0261 5.8059 15.9619L2.85879 16.747L3.64386 13.7999C2.89975 12.6555 2.4678 11.2917 2.4678 9.82586C2.4678 5.79464 5.74872 2.51372 9.77994 2.51372C13.8112 2.51372 17.0921 5.79464 17.0921 9.82586C17.0921 13.8571 13.8112 17.138 9.77994 17.138V17.1388Z" fill="#AFB2B8"/>
  <path d="M14.116 13.0457C13.9885 13.2373 13.8548 13.4158 13.6408 13.6291C13.1725 14.0973 12.5219 14.3338 11.862 14.2666C10.6798 14.1452 8.99991 13.4923 7.55572 12.0512C6.11153 10.607 5.45859 8.92714 5.34036 7.7449C5.27314 7.085 5.50959 6.43516 5.97785 5.96612C6.19111 5.75286 6.36961 5.6184 6.56124 5.48782C6.91514 5.24905 7.39654 5.40823 7.53022 5.81004L8.01471 7.2635C8.14838 7.66222 8.08811 7.91412 7.9158 8.08257L7.53022 8.47202C7.33859 8.66365 7.3069 8.95959 7.45372 9.18909C7.66699 9.52367 8.06879 10.0592 8.80828 10.7986C9.54776 11.5381 10.0832 11.9399 10.4178 12.1532C10.6473 12.3 10.944 12.2683 11.1349 12.0767L11.5243 11.6911C11.6936 11.5188 11.9455 11.4585 12.3434 11.5922L13.7969 12.0767C14.1987 12.2104 14.3579 12.6918 14.116 13.0457Z" fill="#AFB2B8"/>
</svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Logo y Menú Principal --}}
<div class="bg-white">
  {{-- Banner publicitario --}}
  <div class="hidden lg:block bg-[#F5F5F5]">
    <div class="container mx-auto">
      <a href="https://cdnicaraguense.org" target="_blank" class="block flex justify-center">
        <img src="https://placehold.co/1200x120" alt="Publicidad" class="h-auto object-cover">
      </a>
    </div>
  </div>

  {{-- Logo --}}
  <div class="flex justify-center py-[25px] border-b border-[#C3C3C3] w-full">
    <a href="{{ home_url('/') }}" class="inline-block">
      <img src="{{ get_theme_file_uri('public/images/logo.png') }}" 
           alt="{{ get_bloginfo('name', 'display') }}" 
           class="w-[228px] h-[46.661px] lg:w-[351.96px] lg:h-[72.03px]">
    </a>
  </div>

  {{-- Menú Principal --}}
  <div class="main-menu container mx-auto px-4">
    {{-- Menú móvil --}}
    <nav class="hidden lg:block py-4">
      @if (has_nav_menu('primary_navigation'))
        <ul class="flex items-center justify-center space-x-6">
          @foreach(wp_get_nav_menu_items(get_nav_menu_locations()['primary_navigation']) as $item)
            <li>
              <a href="{{ $item->url }}" 
                 class="text-[#1D447A] text-right font-['Raleway'] text-[15.31px] font-extrabold leading-[6.635px] tracking-[0.054rem] uppercase">
                {{ $item->title }}
              </a>
            </li>
          @endforeach

          {{-- Botones especiales --}}
          <li>
            <a href="/especiales" class="btn-especiales">
              <span class="btn-especiales-text">ESPECIALES</span>
            </a>
          </li>
          <li>
            <a href="/multimedia" class="btn-especiales">
              <span class="btn-multimedia-text">MULTIMEDIA</span>
            </a>
          </li>

          {{-- Botón de búsqueda --}}
          <li>
            <button type="button" class="text-gray-600 hover:text-gray-900" @click="$dispatch('toggle-search')">
              <span class="sr-only">Buscar</span>
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
              </svg>
            </button>
          </li>
        </ul>
      @endif
    </nav>
  </div>
</div>

{{-- News Ticker --}}
<div class="w-full bg-[#E7E7E7] overflow-hidden relative">
  <div class="flex items-center">
    {{-- Etiqueta ÚLTIMAS NOTICIAS --}}
    <div class="bg-[#F5A623] px-2 md:px-4 py-2  flex items-center font-['Raleway'] leading-[26px] text-white uppercase z-10">
      {{-- Versión Desktop --}}
      <div class="hidden md:flex items-center">
        <span class="font-extrabold">ÚLTIMAS</span>
        <span class="font-semibold ml-1">NOTICIAS</span>
      </div>
      {{-- Versión Móvil --}}
      <div class="md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
          <path d="M17.6769 10.5C17.6769 14.4593 14.4639 17.6693 10.5 17.6693C6.53608 17.6693 3.32308 14.4597 3.32308 10.5C3.32308 6.54032 6.53608 3.33075 10.5 3.33075C14.4639 3.33075 17.6769 6.54032 17.6769 10.5ZM10.8907 4.97387C10.6173 5.00064 10.3729 5.20824 10.3548 5.49072L10.3494 10.5488L6.84601 12.5829C6.48612 13.0784 6.99844 13.9309 7.60419 13.5211L11.5323 11.2603L11.5482 5.38474C11.4743 5.09938 11.1749 4.94675 10.891 4.9746L10.8907 4.97387Z" fill="white"/>
          <path d="M2.13621 11.1149C2.34259 13.7761 3.82852 16.2352 6.10014 17.6259C8.70305 19.2194 11.9964 19.2896 14.6518 17.776C17.0611 16.4027 18.6484 13.8879 18.8638 11.1149H21C20.9403 11.5257 20.916 11.9424 20.8447 12.3522C20.0108 17.1492 15.8221 20.7837 10.9544 20.9906C5.63705 21.2163 0.899741 17.3607 0.11369 12.1044C0.0648104 11.7767 0.0590172 11.4407 0 11.1149H2.13621Z" fill="white"/>
          <path d="M21 9.88513H18.8638C18.7512 8.55848 18.3424 7.25896 17.648 6.12654C15.2319 2.18819 10.0662 0.945809 6.10014 3.37414C3.82634 4.76625 2.34005 7.22171 2.13621 9.88513H0C0.0590172 9.55926 0.0648104 9.22325 0.11369 8.89557C0.847966 3.98683 5.0849 0.220276 10.0456 0.00941519C15.2695 -0.212296 19.9507 3.50543 20.8447 8.64782C20.916 9.0576 20.9403 9.47426 21 9.88513Z" fill="white"/>
        </svg>
      </div>
    </div>
    {{-- Contenedor de noticias --}}
    <div class="overflow-hidden whitespace-nowrap flex-1 relative">
      {{-- Degradado izquierdo --}}
      <div class="absolute left-0 top-0 w-20 h-full bg-gradient-to-r from-[#E7E7E7] to-transparent z-10"></div>
      {{-- Degradado derecho --}}
      <div class="absolute right-0 top-0 w-20 h-full bg-gradient-to-l from-[#E7E7E7] to-transparent z-10"></div>
      {{-- Contenido del ticker --}}
      @php
        $args = [
          'post_type' => 'post',
          'posts_per_page' => 8,
          'orderby' => 'date',
          'order' => 'DESC'
        ];
        $ultimas_noticias = new WP_Query($args);
      @endphp
      <div class="ticker-content inline-block relative">
        @while($ultimas_noticias->have_posts()) @php($ultimas_noticias->the_post())
          <a href="{{ get_permalink() }}" class="mx-4 text-[#929292] font-['Raleway'] text-[12px] md:text-xs font-semibold leading-[26px] tracking-[0.060em] uppercase hover:text-[#1D447A]">
            {{ get_the_title() }}
          </a>
          @if(!$ultimas_noticias->current_post == $ultimas_noticias->post_count - 1)
            <div class="inline-block mx-4 w-[3px] h-[29px] bg-[#929292] align-middle"></div>
          @endif
        @endwhile
        @php(wp_reset_postdata())
      </div>
    </div>
  </div>
</div>

<style>
.ticker-content {
  white-space: nowrap;
  display: inline-block;
  animation: marquee 20s linear infinite;
}

@keyframes marquee {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-100%);
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const tickerContent = document.querySelector('.ticker-content');
  const containerWidth = tickerContent.parentElement.offsetWidth;
  const contentWidth = tickerContent.offsetWidth;
  
  // Velocidad base en píxeles por segundo (más lenta)
  const baseSpeed = 30;
  
  // Calcular la duración basada en el ancho del contenido
  //const duration = (contentWidth / baseSpeed) * 1000;
  const duration = 212600;
  
  // Aplicar la animación
  tickerContent.style.animation = `marquee ${duration}ms linear infinite`;
});
</script>
