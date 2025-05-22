<?php

namespace App;

/**
 * Register ACF Options Page
 */
add_action('acf/init', function() {
    acf_add_options_page([
        'page_title' => 'Configuración de Portada',
        'menu_title' => 'Portada',
        'menu_slug' => 'portada-config',
        'capability' => 'edit_posts',
        'position' => 20,
        'icon_url' => 'dashicons-admin-home',
        'redirect' => false
    ]);
});

/**
 * Register ACF Fields for Portada
 */
add_action('acf/init', function() {
    // Grupo de campos para Destacados
    acf_add_local_field_group([
        'key' => 'group_portada_destacados',
        'title' => 'Sección Destacados',
        'fields' => [
            [
                'key' => 'field_articulo_principal',
                'label' => 'Artículo Principal',
                'name' => 'articulo_principal',
                'type' => 'post_object',
                'post_type' => ['post'],
                'return_format' => 'object',
                'required' => 1,
            ],
            [
                'key' => 'field_articulo_secundario_1',
                'label' => 'Artículo Secundario 1',
                'name' => 'articulo_secundario_1',
                'type' => 'post_object',
                'post_type' => ['post'],
                'return_format' => 'object',
                'required' => 1,
            ],
            [
                'key' => 'field_articulo_secundario_2',
                'label' => 'Artículo Secundario 2',
                'name' => 'articulo_secundario_2',
                'type' => 'post_object',
                'post_type' => ['post'],
                'return_format' => 'object',
                'required' => 1,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'portada-config',
                ],
            ],
        ],
    ]);

    // Grupo de campos para Principales
    acf_add_local_field_group([
        'key' => 'group_portada_principales',
        'title' => 'Sección Principales',
        'fields' => [
            [
                'key' => 'field_principal_1',
                'label' => 'Artículo Principal 1',
                'name' => 'principal_1',
                'type' => 'post_object',
                'post_type' => ['post'],
                'return_format' => 'object',
                'required' => 1,
            ],
            [
                'key' => 'field_principal_2',
                'label' => 'Artículo Principal 2',
                'name' => 'principal_2',
                'type' => 'post_object',
                'post_type' => ['post'],
                'return_format' => 'object',
                'required' => 1,
            ],
            [
                'key' => 'field_principal_3',
                'label' => 'Artículo Principal 3',
                'name' => 'principal_3',
                'type' => 'post_object',
                'post_type' => ['post'],
                'return_format' => 'object',
                'required' => 1,
            ],
            [
                'key' => 'field_principal_4',
                'label' => 'Artículo Principal 4',
                'name' => 'principal_4',
                'type' => 'post_object',
                'post_type' => ['post'],
                'return_format' => 'object',
                'required' => 1,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'portada-config',
                ],
            ],
        ],
    ]);

    // Grupo de campos para Nacionales
    acf_add_local_field_group([
        'key' => 'group_portada_nacionales',
        'title' => 'Sección Nacionales',
        'fields' => [
            [
                'key' => 'field_nacionales_destacado_1',
                'label' => 'Nota Destacada 1 (opcional)',
                'name' => 'nacionales_destacado_1',
                'type' => 'post_object',
                'post_type' => ['post'],
                'return_format' => 'object',
                'required' => 0,
                'instructions' => 'Dejar en blanco para mostrar las notas más recientes',
            ],
            [
                'key' => 'field_nacionales_destacado_2',
                'label' => 'Nota Destacada 2 (opcional)',
                'name' => 'nacionales_destacado_2',
                'type' => 'post_object',
                'post_type' => ['post'],
                'return_format' => 'object',
                'required' => 0,
                'instructions' => 'Dejar en blanco para mostrar las notas más recientes',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'portada-config',
                ],
            ],
        ],
    ]);

    // Sección SHOW
    acf_add_local_field_group([
        'key' => 'group_show',
        'title' => 'Sección SHOW',
        'fields' => [
            [
                'key' => 'field_show_destacado_1',
                'label' => 'Noticia Destacada 1',
                'name' => 'show_destacado_1',
                'type' => 'post_object',
                'instructions' => 'Selecciona la primera noticia destacada de SHOW. Si se deja vacío, se mostrará la más reciente.',
                'required' => 0,
                'post_type' => ['post'],
                'taxonomy' => ['category:show'],
                'return_format' => 'object',
                'multiple' => 0,
                'allow_null' => 1,
                'ui' => 1,
            ],
            [
                'key' => 'field_show_destacado_2',
                'label' => 'Noticia Destacada 2',
                'name' => 'show_destacado_2',
                'type' => 'post_object',
                'instructions' => 'Selecciona la segunda noticia destacada de SHOW. Si se deja vacío, se mostrará la más reciente.',
                'required' => 0,
                'post_type' => ['post'],
                'taxonomy' => ['category:show'],
                'return_format' => 'object',
                'multiple' => 0,
                'allow_null' => 1,
                'ui' => 1,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'portada-config',
                ],
            ],
        ],
        'menu_order' => 3,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ]);

    // Sección Especiales
    acf_add_local_field_group([
        'key' => 'group_especiales',
        'title' => 'Sección Especiales',
        'fields' => [
            [
                'key' => 'field_especiales_1',
                'label' => 'Noticia Especial 1',
                'name' => 'especiales_1',
                'type' => 'post_object',
                'instructions' => 'Selecciona la primera noticia especial.',
                'required' => 1,
                'post_type' => ['post'],
                'return_format' => 'object',
                'multiple' => 0,
                'allow_null' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'field_especiales_2',
                'label' => 'Noticia Especial 2',
                'name' => 'especiales_2',
                'type' => 'post_object',
                'instructions' => 'Selecciona la segunda noticia especial.',
                'required' => 1,
                'post_type' => ['post'],
                'return_format' => 'object',
                'multiple' => 0,
                'allow_null' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'field_especiales_3',
                'label' => 'Noticia Especial 3',
                'name' => 'especiales_3',
                'type' => 'post_object',
                'instructions' => 'Selecciona la tercera noticia especial.',
                'required' => 1,
                'post_type' => ['post'],
                'return_format' => 'object',
                'multiple' => 0,
                'allow_null' => 0,
                'ui' => 1,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'portada-config',
                ],
            ],
        ],
        'menu_order' => 4,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ]);
});

/**
 * Agregar botones de borrar para los campos de nacionales
 */
add_action('acf/render_field_settings/type=post_object', function($field) {
    if (in_array($field['name'], ['nacionales_destacado_1', 'nacionales_destacado_2'])) {
        acf_render_field_setting($field, [
            'label' => 'Mostrar botón de reset',
            'instructions' => 'Mostrar un botón para borrar la selección',
            'name' => 'show_reset_button',
            'type' => 'true_false',
            'ui' => 1,
        ]);
    }
});

add_filter('acf/load_field/name=nacionales_destacado_1', function($field) {
    $field['show_reset_button'] = 1;
    $categoria_nacionales = get_category_by_slug('nacionales');
    if ($categoria_nacionales) {
        $field['taxonomy'] = ['category:' . $categoria_nacionales->term_id];
    }
    return $field;
});

add_filter('acf/load_field/name=nacionales_destacado_2', function($field) {
    $field['show_reset_button'] = 1;
    $categoria_nacionales = get_category_by_slug('nacionales');
    if ($categoria_nacionales) {
        $field['taxonomy'] = ['category:' . $categoria_nacionales->term_id];
    }
    return $field;
});

add_action('acf/render_field/type=post_object', function($field) {
    if (isset($field['show_reset_button']) && $field['show_reset_button'] && !empty($field['value'])) {
        echo '<div class="acf-field acf-field-post-object acf-field-post-object-' . $field['key'] . '">';
        echo '<div class="acf-input">';
        echo '<div class="acf-input-wrap">';
        echo '<button type="button" class="button button-secondary reset-post-object" data-field-key="' . $field['key'] . '">Borrar selección</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
});

add_action('acf/input/admin_footer', function() {
    ?>
    <script type="text/javascript">
    (function($) {
        $('.reset-post-object').on('click', function() {
            var fieldKey = $(this).data('field-key');
            var field = $('[data-key="' + fieldKey + '"]');
            
            // Limpiar el select
            field.find('select').val('').trigger('change');
            
            // Limpiar el input hidden
            field.find('input[type="hidden"]').val('');
            
            // Limpiar la lista de selección
            field.find('.acf-rel-list').html('');
            
            // Remover elementos seleccionados
            field.find('.acf-rel-item').remove();
            
            // Remover clase active
            field.find('.acf-input-wrap').removeClass('active');
            
            // Actualizar el valor en ACF
            acf.doAction('remove', field);
        });
    })(jQuery);
    </script>
    <?php
}); 