<?php

/**
 * @package KasuistikQuiz
 */
/*
  Plugin Name: Kasuistik Quiz
  Plugin URI:
  Description: Custom Post Type für das Kasuistik Quiz
  Version: 1.0
  Author: Medizin Medien Austria
  Author URI: https://medizin-medien.at/
  License: GPLv2 or later
  Text Domain: kasuistikquiz
 */

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_588f9e5590e80',
        'title' => 'Kasuistik Quiz',
        'fields' => array(
            array(
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'default_value' => '',
                'delay' => 0,
                'key' => 'field_588f9e9da30f3',
                'label' => 'Beschreibung',
                'name' => 'mma_kq_beschreibung',
                'type' => 'wysiwyg',
                'instructions' => 'Feld für die Beschreibung des Quiz',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
            ),
            array(
                'return_format' => 'ID',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'key' => 'field_588f9ef3a30f4',
                'label' => 'Logo Sponsor',
                'name' => 'mma_kq_logo_sponsor',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
            ),
            array(
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'key' => 'field_588f9f87a30f6',
                'label' => 'Bright ID',
                'name' => 'mma_kq_bright_id',
                'type' => 'text',
                'instructions' => 'Bitte die Bright ID einfügen',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
            ),
            array(
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'key' => 'field_588fa1caa30f7',
                'label' => 'Kursbeschreibung',
                'name' => 'mma_kq_kursbeschreibung',
                'type' => 'text',
                'instructions' => 'Bitte die Beschreibung einfügen',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'kasuistik_quiz',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

endif;

class kasuistikquiz {

    public function __construct() {

        add_action('init', array(&$this, 'register_kasuistik_quiz'));
        add_filter('single_template', array(&$this, 'add_single_template'));
    }

    public function register_kasuistik_quiz() {

        /**
         * Post Type: Kasuistik Quiz.
         */
        $labels = array(
            "name" => __('Kasuistik Quiz', 'kasuistikquiz'),
            "singular_name" => __('Kasuistik Quiz', 'kasuistikquiz'),
            "menu_name" => __('Kasuistik Quiz', 'kasuistikquiz'),
            "all_items" => __('Alle Quiz', 'kasuistikquiz'),
            "add_new" => __('Neues Quiz', 'kasuistikquiz'),
            "add_new_item" => __('neues Quiz erstellen', 'kasuistikquiz'),
            "edit_item" => __('Quiz bearbeiten', 'kasuistikquiz'),
            "new_item" => __('Neues Quiz', 'kasuistikquiz'),
            "view_item" => __('Quiz ansehen', 'kasuistikquiz'),
            "view_items" => __('Quiz ansehen', 'kasuistikquiz'),
            "search_items" => __('Quiz suchen', 'kasuistikquiz'),
            "not_found" => __('kein Quiz gefunden', 'kasuistikquiz'),
            "not_found_in_trash" => __('kein Quiz im Papierkorb gefunden', 'kasuistikquiz'),
            "parent_item_colon" => __('Übergeordnetes Quiz', 'kasuistikquiz'),
            "featured_image" => __('Titelbild', 'kasuistikquiz'),
            "set_featured_image" => __('Titelbild festlegen', 'kasuistikquiz'),
            "remove_featured_image" => __('Titelbild entfernen', 'kasuistikquiz'),
            "use_featured_image" => __('Als Titelbild verwenden', 'kasuistikquiz'),
            "archives" => __('Quiz Archiv', 'kasuistikquiz'),
            "insert_into_item" => __('Einfügen', 'kasuistikquiz'),
            "uploaded_to_this_item" => __('Hochladen', 'kasuistikquiz'),
            "filter_items_list" => __('Quiz filtern', 'kasuistikquiz'),
            "items_list_navigation" => __('Liste Navigation', 'kasuistikquiz'),
            "items_list" => __('Liste', 'kasuistikquiz'),
            "attributes" => __('Quiz Attribute', 'kasuistikquiz'),
            "parent_item_colon" => __('Übergeordnetes Quiz', 'kasuistikquiz'),
        );

        $args = array(
            "label" => __('Kasuistik Quiz', 'kasuistikquiz'),
            "labels" => $labels,
            "description" => "Seite für das Kasuistik Quiz",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "kasuistik-quiz",
            "has_archive" => false,
            "show_in_menu" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array("slug" => "kasuistik_quiz", "with_front" => true),
            "query_var" => true,
            "menu_position" => 10,
            "menu_icon" => "dashicons-awards",
            "supports" => array("title", "thumbnail", "revisions", "author"),
            "taxonomies" => array("category"),
        );

        register_post_type("kasuistik_quiz", $args);
    }

    public function add_single_template($single_template) {
        global $post;

        if ($post->post_type == 'kasuistik_quiz') {
            $single_template = dirname(__FILE__) . '/templates/single-kasuistik_quiz.php';
        }
        return $single_template;
    }

}

$kasuistikQuiz = new kasuistikquiz();
