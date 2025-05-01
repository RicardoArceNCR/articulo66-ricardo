@php
  $args = [
    'post_type' => 'post',
    'posts_per_page' => 5,
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
  ];
  $mas_leidas = new WP_Query($args);
@endphp

<aside class="sidebar">
  <div class="mas-leidas mb-4">
    <div class="sidebar-header">
      <h3 class="sidebar-title text-uppercase position-relative">
        <span class="bg-primary text-white px-3 py-2">MÁS LEÍDAS</span>
      </h3>
    </div>

    @if($mas_leidas->have_posts())
      <div class="mas-leidas-list mt-4">
        @while($mas_leidas->have_posts()) @php($mas_leidas->the_post())
          <article class="mas-leidas-item mb-3">
            <div class="row g-0">
              @if(has_post_thumbnail())
                <div class="col-3">
                  <img src="{{ get_the_post_thumbnail_url(null, 'thumbnail') }}" class="img-fluid rounded" alt="{{ get_the_title() }}">
                </div>
              @endif
              <div class="col">
                <div class="card-body ps-3 py-0">
                  <span class="badge bg-primary mb-1">ESPECIAL</span>
                  <h4 class="card-title fs-6">
                    <a href="{{ get_permalink() }}" class="text-dark text-decoration-none">
                      {{ get_the_title() }}
                    </a>
                  </h4>
                </div>
              </div>
            </div>
          </article>
        @endwhile
        @php(wp_reset_postdata())
      </div>
    @endif
  </div>

  <div class="publicidad-sidebar">
    @php(dynamic_sidebar('sidebar-publicidad'))
  </div>
</aside>
