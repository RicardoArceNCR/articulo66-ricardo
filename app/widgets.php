<?php

namespace App;

/**
 * Widget de Más Leídas
 */
class MasLeidasWidget extends \WP_Widget {
    public function __construct() {
        parent::__construct(
            'mas_leidas_widget',
            'Más Leídas',
            ['description' => 'Muestra las noticias más leídas']
        );
    }

    public function widget($args, $instance) {
        global $wpdb;
        $tabla_visitas = $wpdb->prefix . 'articulo66_visitas';
        
        // Obtener las 3 noticias más leídas de los últimos 30 días
        $posts = $wpdb->get_results($wpdb->prepare(
            "SELECT p.ID, p.post_title, p.post_author, SUM(v.visitas) as total_visitas
            FROM {$wpdb->prefix}articulo66_visitas v
            JOIN {$wpdb->posts} p ON v.post_id = p.ID
            WHERE v.fecha >= DATE_SUB(CURDATE(), INTERVAL %d DAY)
            AND p.post_status = %s
            GROUP BY p.ID
            ORDER BY total_visitas DESC
            LIMIT %d",
            30,
            'publish',
            3
        ));

        if (!empty($posts)) {
            echo '<div class="space-y-4">';
            foreach ($posts as $post) {
                ?>
                <article class="group">
                    <a href="<?php echo get_permalink($post->ID); ?>" class="flex gap-3 no-underline">
                        <div class="w-[80px] h-[80px] flex-shrink-0 overflow-hidden rounded-full">
                            <?php if (has_post_thumbnail($post->ID)): ?>
                                <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>" 
                                     alt="<?php echo esc_attr($post->post_title); ?>" 
                                     class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                            <?php endif; ?>
                        </div>
                        <div class="flex-grow">
                            <span class="inline-block px-2 py-1 text-white text-[11px] font-bold leading-none tracking-[0.11px] uppercase bg-gradient-to-r from-[#1D447A] to-[#1F63C1] rounded-sm mb-2">ESPECIAL</span>
                            <h4 class="text-black text-[15px] font-[600] leading-[21px] tracking-[-0.45px] font-['Raleway'] group-hover:underline">
                                <?php echo esc_html($post->post_title); ?>
                            </h4>
                        </div>
                    </a>
                </article>
                <?php
            }
            echo '</div>';
        }
    }
}

/**
 * Registrar el widget
 */
function registrar_widget_mas_leidas() {
    register_widget('App\\MasLeidasWidget');
}
add_action('widgets_init', 'App\\registrar_widget_mas_leidas');

/**
 * Registrar el área de widgets
 */
function registrar_sidebar_mas_leidas() {
    register_sidebar([
        'name'          => 'Nacionales Portada',
        'id'            => 'nacionales-portada',
        'description'   => 'Widget para mostrar las noticias más leídas en la sección de nacionales',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'App\\registrar_sidebar_mas_leidas'); 