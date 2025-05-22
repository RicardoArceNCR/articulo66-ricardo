@php
  global $wp_query;
  $query = $query ?? $wp_query;
  $big = 999999999;
  $paginate_links = paginate_links([
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $query->max_num_pages,
    'type' => 'array',
    'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>',
    'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>',
    'end_size' => 2,
    'mid_size' => 2,
  ]);
@endphp
@if($paginate_links && is_array($paginate_links))
  <nav class="flex space-x-2" aria-label="Paginación">
    @foreach ($paginate_links as $link)
      @php
        $is_active = strpos($link, 'current') !== false;
        $is_disabled = strpos($link, 'dots') !== false;
        $is_prev = strpos($link, 'svg') !== false && strpos($link, 'M15.75') !== false;
        $is_next = strpos($link, 'svg') !== false && strpos($link, 'M8.25') !== false;
        $content = $link;
        if ($is_prev || $is_next) {
          // SVG ya está en $link
        } else {
          $content = preg_replace('/<span.*?class=\".*?screen-reader-text.*?\".*?>.*?<\/span>/', '', $link);
        }
        $base_classes = 'rounded-[8px] w-12 h-12 flex items-center justify-center text-[20px] font-semibold select-none transition-colors duration-200';
        $inactive_styles = 'border-2 border-[#EBEBEB] bg-white text-[#1C1C1C] text-center font-[\'Acumin Variable Concept\'] leading-[17.5px] tracking-[1.6px]';
        $active_styles = 'bg-[#1D447A] text-white text-center font-[\'Acumin Variable Concept\'] leading-[17.5px] tracking-[1.6px]';
      @endphp
      <span class="{{ $base_classes }} {{ $is_active ? $active_styles : $inactive_styles }} {{ $is_disabled ? 'pointer-events-none' : '' }}"
        style="font-family: 'Acumin Variable Concept', 'Raleway', sans-serif;">
        {!! $content !!}
      </span>
    @endforeach
  </nav>
@endif 