<?php 

/**
 * Summary of get_the_youtube
 * @param mixed $post_id
 */
function get_the_youtube($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    return get_field('youtube_embed', $post_id) ?: null;
}

/**
 * Summary of get_the_youtube_id
 * @param mixed $post_id
 */
function get_the_youtube_id($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $url = get_field('youtube_embed', $post_id);

    if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
        return null;
    }

    // Compatible con watch?v=, youtu.be, shorts
    preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches);

    return $matches[1] ?? null;
}

/**
 * Summary of get_the_youtube_iframe
 * @param mixed $post_id
 * @param array $args
 */
function get_the_youtube_iframe($post_id = null, $args = []) {
    $post_id = $post_id ?: get_the_ID();
    $video_id = get_the_youtube_id($post_id);

    if (!$video_id) {
        return null;
    }

    // Atributos por defecto
    $defaults = [
        'width' => '100%',
        'height' => '100%',
        'class' => 'absolute top-0 left-0 w-full h-full',
        'allowfullscreen' => true,
        'frameborder' => '0',
        'allow' => 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share',
    ];

    $attrs = array_merge($defaults, $args);

    $attr_string = sprintf(
        'width="%s" height="%s" frameborder="%s" allow="%s"%s class="%s"',
        esc_attr($attrs['width']),
        esc_attr($attrs['height']),
        esc_attr($attrs['frameborder']),
        esc_attr($attrs['allow']),
        $attrs['allowfullscreen'] ? ' allowfullscreen' : '',
        esc_attr($attrs['class'])
    );

    return sprintf('<iframe src="https://www.youtube.com/embed/%s" %s></iframe>', $video_id, $attr_string);
}


add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_6830c51780e79',
	'title' => 'CAMPO MULTIMEDIA',
	'fields' => array(
		array(
			'key' => 'field_6830c5175ecfc',
			'label' => 'YouTube',
			'name' => 'youtube_embed',
			'aria-label' => '',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'allow_in_bindings' => 1,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_taxonomy',
				'operator' => '==',
				'value' => 'category:multimedia',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );
} );

