@props(['links'])
@if($links && is_array($links))
  <nav class="flex space-x-2" aria-label="Paginación">
    @foreach ($links as $link)
      @php
        $is_active = strpos($link, 'current') !== false;
        $is_disabled = strpos($link, 'dots') !== false;
        // Detectar si es prev o next
        $is_prev = strpos($link, 'chevron_left') !== false;
        $is_next = strpos($link, 'chevron_right') !== false;
        // SVGs
        $svg_left = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>';
        $svg_right = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>';
        $content = $link;
        if ($is_prev) {
          $content = $svg_left;
        } elseif ($is_next) {
          $content = $svg_right;
        } else {
          // Limpiar screen-reader-text
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