<div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
  {{-- Contenido principal --}}
  <main class="w-full lg:w-2/3">
    <article <?php post_class('h-entry'); ?>>
      {{-- Categoría principal --}}
      <?php
      $categories = get_the_category();
      if (!empty($categories)) {
          echo '<div class="mb-4 inline-block">';
          echo '<div class="text-[#7F7F7F] text-[25px] font-medium leading-[30px] font-[\'Raleway\']">' . esc_html($categories[0]->name) . '</div>';
          echo '<div class="bg-[#EBEBEB] h-[5px] w-[calc(100%+10px)] -ml-[5px]"></div>';
          echo '</div>';
      }
      ?>

      {{-- Título --}}
      <header>
        <h1 class="text-[#1D447A] font-['Raleway'] text-[43px] font-extrabold leading-[53px]"><?php echo $title; ?></h1>
      </header>

      {{-- Extracto/Bajada --}}
      <?php
      $excerpt = get_the_excerpt();
      if (!empty($excerpt)) {
          echo '<div class="text-[#7F7F7F] text-[22px] italic font-normal leading-[34px] tracking-[0.22px] font-[\'Raleway\'] mb-4">' . esc_html(wp_strip_all_tags($excerpt)) . '</div>';
      }
      ?>

      {{-- Autor, fecha e íconos de compartir --}}
      <?php /* Autor, fecha e íconos de compartir */ ?>
      <div class="mb-4 flex flex-row justify-between items-start gap-2">
        <div class="flex flex-col">
          <span class="inline-block text-[#1BC6EB] text-[17px] italic font-bold leading-[26px] underline font-['Raleway']">Por <?php echo esc_html(get_the_author()); ?></span>
          <span class="inline-block text-[#7F7F7F] text-[17px] italic font-medium leading-[26px] font-['Raleway']"><?php echo esc_html(get_the_date()); ?></span>
        </div>
        <div class="flex flex-row gap-6 mt-1">
          <!-- Facebook -->
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" aria-label="Compartir en Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="22" viewBox="0 0 12 22" fill="none">
              <path d="M11.1094 9.75834L10.8428 11.8993C10.7977 12.257 10.4948 12.526 10.1355 12.526H6.66789V21.4775C6.30219 21.5105 5.93166 21.5274 5.55711 21.5274C4.7194 21.5274 3.90182 21.4437 3.11163 21.2842V12.526H0.444633C0.199763 12.526 0 12.3255 0 12.0798V9.4007C0 9.15503 0.199763 8.95446 0.444633 8.95446H3.11163V4.93665C3.11163 2.47103 5.10201 0.472595 7.55796 0.472595H10.6696C10.9145 0.472595 11.1142 0.673164 11.1142 0.91884V3.59792C11.1142 3.84359 10.9145 4.04416 10.6696 4.04416H8.44642C7.46452 4.04416 6.66869 4.84321 6.66869 5.82994V8.95526H10.403C10.8315 8.95526 11.1625 9.33224 11.1102 9.75915L11.1094 9.75834Z" fill="#1BC6EB"/>
            </svg>
          </a>
          <!-- X -->
          <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" aria-label="Compartir en X">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
              <path d="M11.7965 7.52957L18.2703 0.60553H15.8119L10.7309 6.04101L6.83951 0.60553H0.115234L6.92167 10.1136L0.115234 17.3945H2.57361L7.98814 11.603L12.134 17.3945H18.8583L11.7965 7.53037V7.52957ZM3.57967 2.38648H5.92366L15.3931 15.6135H13.0491L3.57967 2.38648Z" fill="#1BC6EB"/>
            </svg>
          </a>
          <!-- WhatsApp -->
          <a href="https://wa.me/?text=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" aria-label="Compartir en WhatsApp">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
              <path d="M10.1502 0.393752C5.20367 0.554851 1.11901 4.56058 0.870915 9.5031C0.781505 11.2849 1.17459 12.9691 1.939 14.4311L0.865276 19.2399C0.820168 19.4574 1.01268 19.6499 1.23017 19.6048L6.03897 18.5311H6.04219C7.4945 19.2899 9.16107 19.6829 10.9299 19.6008C15.8644 19.372 19.883 15.318 20.0739 10.3819C20.2898 4.79095 15.7331 0.212515 10.1502 0.393752ZM10.47 17.6225C9.07166 17.6225 7.76192 17.2447 6.63584 16.585C6.52952 16.5254 6.42722 16.4626 6.32734 16.3957L3.25518 17.2141L4.07356 14.1419C3.29787 12.949 2.8476 11.5273 2.8476 9.99928C2.8476 5.79701 6.26773 2.37688 10.47 2.37688C14.6723 2.37688 18.0924 5.79701 18.0924 9.99928C18.0924 14.2015 14.6723 17.6217 10.47 17.6217V17.6225Z" fill="#1BC6EB"/>
              <path d="M14.9898 13.3555C14.8569 13.5553 14.7176 13.7414 14.4944 13.9637C14.0063 14.4518 13.3281 14.6983 12.6402 14.6282C11.4078 14.5017 9.65664 13.8211 8.15117 12.3189C6.6457 10.8134 5.96506 9.06224 5.84182 7.82983C5.77174 7.14194 6.01822 6.46452 6.50635 5.97558C6.72867 5.75327 6.91474 5.61311 7.1145 5.47698C7.48342 5.22808 7.98524 5.39401 8.12459 5.81287L8.62964 7.32801C8.76899 7.74364 8.70616 8.00623 8.52653 8.18183L8.12459 8.5878C7.92483 8.78756 7.8918 9.09607 8.04485 9.3353C8.26716 9.68408 8.68602 10.2423 9.45688 11.0131C10.2277 11.784 10.7859 12.2029 11.1347 12.4252C11.374 12.5782 11.6833 12.5452 11.8822 12.3454L12.2882 11.9435C12.4646 11.7639 12.7272 11.701 13.142 11.8404L14.6572 12.3454C15.076 12.4848 15.2419 12.9866 14.9898 13.3555Z" fill="#1BC6EB"/>
            </svg>
          </a>
        </div>
      </div>

      <div class="mb-6 w-full h-auto rounded-lg">
      @if(get_the_youtube_iframe())
        {!! get_the_youtube_iframe() !!}
      @elseif(get_the_podcast_iframe())
        {!! get_the_podcast_iframe() !!}
      @else
        {{-- Imagen destacada --}}
        @if(has_post_thumbnail())
          
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-auto rounded-lg" />
            <?php
            $thumb_id = get_post_thumbnail_id();
            $thumb_post = $thumb_id ? get_post($thumb_id) : null;
            if ($thumb_post && $thumb_post->post_excerpt) {
                echo '<div class="text-[#7F7F7F] text-[16px] italic font-normal leading-[30px] font-[\'Raleway\'] mt-2">' . esc_html($thumb_post->post_excerpt) . '</div>';
            }
            ?>
        @endif
      @endif
      </div>

      {{-- Contenido principal --}}
      <div class="e-content prose max-w-none" style="color:#424242; text-align:justify; font-family:'Inter', sans-serif; font-size:20px; font-style:normal; font-weight:300; line-height:35px; letter-spacing:-0.4px;">
        <style>
          .e-content a {
            color: #09B2F5 !important;
            font-family: 'Inter', sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 500;
            line-height: 35px;
            letter-spacing: -0.4px;
            text-decoration: underline;
          }
        </style>
        <?php the_content(); ?>
      </div>

      {{-- Paginación interna del post (si aplica) --}}
      <?php if ($pagination()): ?>
        <footer>
          <nav class="page-nav" aria-label="Page">
            <?php echo $pagination; ?>
          </nav>
        </footer>
      <?php endif; ?>

      <?php comments_template(); ?>
    </article>
  </main>

  {{-- Sidebar --}}
  <aside class="w-full lg:w-1/3 flex flex-col gap-8">
    <?php if (is_active_sidebar('sidebar-singles')) : ?>
     

       {{-- Widget de Más Leídas --}}
       <div class="mas-leidas">
        <div class="flex items-center justify-center gap-2 mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="48" viewBox="0 0 25 48" fill="none">
            <path d="M15.8573 16.8444C17.5419 14.7909 20.5868 12.7216 25 10.6523L19.5982 0.400757C12.4328 3.54836 7.37108 7.1796 4.42897 11.2866C1.47896 15.3935 0 20.9989 0 28.1029V47.4008H25V24.1307H13.0497C13.2395 21.3319 14.1806 18.8979 15.8652 16.8444H15.8573Z" fill="#1BC6EB"/>
          </svg>
          <h3 class="text-[#1D447A] font-['Raleway'] text-[31.021px] font-extrabold leading-[43.66px] tracking-[-0.31px] uppercase">MÁS LEÍDAS</h3>
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="48" viewBox="0 0 25 48" fill="none">
            <path d="M9.14269 30.9571C7.45809 33.0106 4.41316 35.0799 -2.91848e-06 37.1492L5.40177 47.4008C12.5672 44.2532 17.6289 40.6219 20.571 36.515C23.521 32.408 25 26.8026 25 19.6987L25 0.400761L2.94173e-07 0.400758L-1.74016e-06 23.6708L11.9503 23.6708C11.7605 26.4696 10.8194 28.9036 9.13477 30.9571L9.14269 30.9571Z" fill="#1BC6EB"/>
          </svg>
        </div>
        <div class="mb-6">
          <div class="flex w-full">
            <div class="flex-grow h-[5px] bg-[#EBEBEB]"></div>
            <div class="w-[50px] h-[5px] bg-[#1BC6EB]"></div>
            <div class="flex-grow h-[5px] bg-[#EBEBEB]"></div>
          </div>
        </div>

        {{-- Aquí irá el widget de más singles --}}
        <?php dynamic_sidebar('sidebar-singles'); ?>
      </div>
    <?php endif; ?>
  </aside>
</div>
