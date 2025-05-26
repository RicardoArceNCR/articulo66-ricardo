<?php


function get_the_podcast($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    return get_field('podcast_embed', $post_id) ?: null;
}

function get_the_podcast_iframe($post_id = null, $args = []) {
    $post_id = $post_id ?: get_the_ID();
    $value = get_field('podcast_embed', $post_id);

    if (!$value) {
        return null;
    }

    // ✅ Si contiene un iframe embebido directamente, lo devolvemos tal cual
    if (stripos($value, '<iframe') !== false) {
        return $value;
    }

    // ✅ Si es una URL, tratamos de embeberla
    if (!filter_var($value, FILTER_VALIDATE_URL)) {
        return null;
    }

    $parsed = parse_url($value);
    $host = strtolower($parsed['host'] ?? '');

    $defaults = [
        'width' => '100%',
        'height' => '100%',
        'class' => '',
        'style' => 'border-radius:12px',
        'frameborder' => 0,
        'loading' => 'lazy',
        'allowfullscreen' => true,
        'allow' => 'autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture',
    ];

    $attrs = array_merge($defaults, $args);

    $attr_string = sprintf(
        'width="%s" height="%s" class="%s" style="%s" frameborder="%s" allow="%s" loading="%s"%s',
        esc_attr($attrs['width']),
        esc_attr($attrs['height']),
        esc_attr($attrs['class']),
        esc_attr($attrs['style']),
        esc_attr($attrs['frameborder']),
        esc_attr($attrs['allow']),
        esc_attr($attrs['loading']),
        $attrs['allowfullscreen'] ? ' allowfullscreen' : ''
    );

    // --- Spotify ---
    if (strpos($host, 'spotify.com') !== false) {
        if (preg_match('/episode\/([a-zA-Z0-9]+)/', $value, $matches)) {
            $episode_id = $matches[1];
            $embed_url = "https://open.spotify.com/embed/episode/{$episode_id}?utm_source=generator";
            return "<iframe src=\"{$embed_url}\" {$attr_string}></iframe>";
        }
    }

    // --- Apple Podcasts ---
    if (strpos($host, 'podcasts.apple.com') !== false) {
        $embed_url = "https://embed.podcasts.apple.com" . $parsed['path'];
        if (!empty($parsed['query'])) {
            $embed_url .= '?' . $parsed['query'];
        }
        return "<iframe src=\"{$embed_url}\" {$attr_string}></iframe>";
    }

    // --- iVoox ---
    if (strpos($host, 'ivoox.com') !== false) {
        if (preg_match('/\/([0-9]+)_([a-zA-Z0-9_-]+)\.html/', $value, $matches)) {
            $id = $matches[1];
            $embed_url = "https://www.ivoox.com/player_ej_{$id}_1.html";
            return "<iframe src=\"{$embed_url}\" {$attr_string}></iframe>";
        }
    }

    // --- YouTube (por si lo usan como podcast) ---
    if (strpos($host, 'youtube.com') !== false || strpos($host, 'youtu.be') !== false) {
        preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $value, $matches);
        $video_id = $matches[1] ?? null;
        if ($video_id) {
            $embed_url = "https://www.youtube.com/embed/{$video_id}";
            return "<iframe src=\"{$embed_url}\" {$attr_string}></iframe>";
        }
    }

    // ❌ Fallback para enlaces no compatibles
    return '<p>Este podcast no se puede mostrar automáticamente. <a href="' . esc_url($value) . '" target="_blank">Escúchalo aquí</a>.</p>';
}


add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_6830c7131e760',
	'title' => 'CAMPO PODCAST',
	'fields' => array(
		array(
			'key' => 'field_6830c71321794',
			'label' => 'Podcas',
			'name' => 'podcast_embed',
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
				'value' => 'category:podcast',
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






