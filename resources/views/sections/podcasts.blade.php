@php
    $podcast_posts = new WP_Query([
        'posts_per_page' => 3,
        'post_type' => 'post',
        'category_name' => 'podcast', // asegúrate de que este sea el slug correcto
    ]);
    $posts_podcast = $podcast_posts->posts;
@endphp

{{-- Sección de Podcasts --}}
@if($posts_podcast && count($posts_podcast) > 0)
<div class="w-full bg-[#1B2431] bg-[url('{{ get_theme_file_uri('public/images/bg-multimedia-home.jpg') }}')] bg-center bg-bottom bg-no-repeat bg-cover">
  <div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
      <div>
        <h2 class="text-white font-['Raleway'] text-[23px] md:text-[31.021px] font-[800] leading-[43.66px] tracking-[-0.23px] md:tracking-[-0.31px] uppercase mb-2">PODCASTS</h2>
        <div class="w-[50px] h-[5px] bg-[#1BC6EB]"></div>
      </div>
      <a href="{{ get_category_link(get_category_by_slug('podcast')) }}" class="inline-flex items-center gap-2 text-white hover:text-[#1BC6EB] transition-colors duration-300">
        <span class="font-['Raleway'] text-[14px] font-[800] leading-[43.66px] tracking-[-0.14px] uppercase">VER TODOS</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="19" viewBox="0 0 12 19" fill="none">
          <path d="M2.61204 19H2.57522L0 16.3519L6.77076 9.51336L0 2.64812L2.57522 0H2.61204L12 9.48664L2.61204 19Z" fill="currentColor"/>
        </svg>
      </a>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        {{-- Podcast Principal --}}
        <div class="lg:col-span-2">
            <article class="relative">
                <div id="main-podcast-container" class="relative aspect-[16/9] w-full">
                    {!! get_the_podcast_iframe($posts_podcast[0]->ID) !!}
                    <div id="podcast-loading" class="absolute inset-0 flex items-center justify-center bg-black/70 z-10 hidden">
                        <div class="dot-loader flex space-x-2">
                            <div class="dot bg-red-500 w-3 h-3 rounded-full"></div>
                            <div class="dot bg-yellow-500 w-3 h-3 rounded-full"></div>
                            <div class="dot bg-green-500 w-3 h-3 rounded-full"></div>
                        </div>
                    </div>
                </div>
                <a id="main-podcast-link" href="{{ get_permalink($posts_podcast[0]->ID) }}">
                <h3 id="main-podcast-title" class="text-white font-['Raleway'] text-[20px] font-semibold mt-4 mb-2">
                    {{ get_the_title($posts_podcast[0]->ID) }}
                </h3>
                <p id="main-podcast-excerpt" class="text-white/80 font-['Roboto_Flex'] text-[14px] leading-[21px]">
                    {{ get_the_excerpt($posts_podcast[0]->ID) }}
                </p>
                </a>
            </article>
        </div>

        {{-- Lista de Podcasts (incluye el principal) --}}
        <div class="space-y-4">
            @foreach($posts_podcast as $post)
                @php
                    $title = get_the_title($post->ID);
                    $url = get_permalink($post->ID);
                    $iframe = get_the_podcast_iframe($post->ID);
                @endphp
                <article class="flex gap-4 cursor-pointer podcast-trigger  {{ $loop->first ? 'active' : '' }}"
                    data-iframe="{{ htmlspecialchars($iframe, ENT_QUOTES, 'UTF-8') }}"
                    data-excerpt="{{ get_the_excerpt($post->ID) }}"
                    data-title="{{ $title }}"
                    data-url="{{ $url }}">
                    <div class="relative w-[160px] h-[90px] flex-shrink-0">
                        @if(has_post_thumbnail($post->ID))
                            {!! get_the_post_thumbnail($post->ID, 'medium', ['class' => 'w-full h-full object-cover']) !!}
                        @else
                            <img src="https://placehold.co/160x90" alt="{{ $title }}" class="w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="white">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-white font-['Raleway'] text-[14px] font-semibold leading-[18px] mb-1">
                            {{ wp_trim_words($title, 18, '...') }}
                        </h4>
                    </div>
                </article>
            @endforeach
        </div>
    </div>

  </div>
</div>
@endif