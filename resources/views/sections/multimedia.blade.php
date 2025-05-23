@php
    $multimedia_posts = new WP_Query([
        'posts_per_page' => 4,
        'post_type' => 'post',
        'category_name' => 'multimedia', // asegúrate de que este sea el slug correcto
    ]);
    $posts = $multimedia_posts->posts;
@endphp

{{-- Sección de Multimedia --}}
@if($posts && count($posts) > 0)
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
          <div class="relative aspect-[16/9] w-full" id="main-video-container">
            {!! get_the_youtube_iframe($posts[0]->ID) !!}
            <div id="video-loading" class="absolute inset-0 flex items-center justify-center bg-black/70 z-10 hidden">
              <div class="dot-loader flex space-x-2">
                  <div class="dot bg-red-500 w-3 h-3 rounded-full animate-bounce delay-[0ms]"></div>
                  <div class="dot bg-yellow-500 w-3 h-3 rounded-full animate-bounce delay-[150ms]"></div>
                  <div class="dot bg-green-500 w-3 h-3 rounded-full animate-bounce delay-[300ms]"></div>
              </div>
            </div>
          </div>
          <h3 class="text-white font-['Raleway'] text-[22px] font-[500] leading-[31.263px] tracking-[-0.88px]">    
            <a id="main-video-link" href="{{ get_permalink($posts[0]->ID) }}">
                <span id="main-video-title">{{ get_the_title($posts[0]->ID) }}</span>
            </a>
          </h3>
        </article>
      </div>

      {{-- Lista de Videos Secundarios --}}
      <div class="space-y-4">
        {{-- Video Secundario 1 --}}
         @foreach($posts as $post)
          @php
              setup_postdata($post);
              $video_id = get_the_youtube_id($post->ID);
              $iframe = get_the_youtube_iframe($post->ID);
          @endphp
          <article class="flex gap-4 cursor-pointer video-trigger {{ $loop->first ? 'active' : '' }}"
                  data-iframe="{{ htmlspecialchars($iframe, ENT_QUOTES, 'UTF-8') }}"
                  data-video-title="{{ get_the_title($post->ID) }}"
                  data-video-url="{{ get_permalink($post->ID) }}">
            <div class="relative w-[160px] h-[90px] flex-shrink-0">
                @if(has_post_thumbnail())
                    {!! get_the_post_thumbnail($post->ID, 'medium', ['class' => 'w-full h-full object-cover']) !!}
                @else
                    <img src="https://placehold.co/160x90" alt="{{ get_the_title() }}" class="w-full h-full object-cover">
                @endif
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="white">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </div>
            </div>
            <div>
                <h4 class="text-white font-['Raleway'] text-[14px] font-semibold leading-[18px] mb-1">
                    {{ wp_trim_words(get_the_title($post->ID), 18, '...') }}
                </h4>
            </div>
        </article>
        @endforeach
        @php wp_reset_postdata(); @endphp


        {{-- Botón Ver Todos --}}
        <div class="text-right">
          <a href="{{ get_category_link(get_category_by_slug('multimedia')) }}" class="inline-flex items-center gap-2 text-white hover:text-[#1BC6EB] transition-colors duration-300">
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
@endif