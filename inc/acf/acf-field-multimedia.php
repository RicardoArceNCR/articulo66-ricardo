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
    $input = get_field('youtube_embed', $post_id);

    if (!$input) {
        return null;
    }

    // Si es un iframe, extraer el src
    if (stripos($input, '<iframe') !== false) {
        if (preg_match('/src="([^"]+)"/', $input, $srcMatch)) {
            $input = $srcMatch[1];
        }
    }

    // Buscar el ID en la URL o src
    if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $input, $matches)) {
        return $matches[1];
    }

    // Si el input es solo el ID (11 caracteres)
    if (preg_match('/^[a-zA-Z0-9_-]{11}$/', trim($input))) {
        return trim($input);
    }

    return null;
}

/**
 * Summary of get_the_youtube_thumbnail
 * @param mixed $post_id
 * @param string|null $resolution
 * @return string|null
 */
function get_the_youtube_thumbnail($post_id = null, $resolution = 'hqdefault') {
	$post_id = $post_id ?: get_the_ID();
	$video_id = get_the_youtube_id($post_id);

	if (!$video_id) {
		return null;
	}

	// URL del thumbnail de YouTube
	return sprintf('https://img.youtube.com/vi/%s/%s.jpg', $video_id, $resolution);

}

/**
 * Summary of get_the_youtube_iframe
 * @param mixed $post_id
 * @param array $args
 */
function get_the_youtube_iframe($post_id = null, $args = []) {
    $post_id = $post_id ?: get_the_ID();
    $video_id = get_the_youtube_id($post_id);
	$field_youtube = get_field('youtube_embed', $post_id) ?: null;

	// ✅ Si contiene un iframe embebido directamente, lo devolvemos tal cual
    if (stripos($field_youtube, '<iframe') !== false) {
        return $field_youtube;
    }

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
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 1,
			'rows' => 3,
			'placeholder' => '',
			'new_lines' => '',
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

