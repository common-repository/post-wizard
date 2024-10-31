<?php
/*
Plugin Name: Post Wizard
Description: Schnell und einfach Blogbeiträge erstellen - mit künstlicher Intelligenz
Author: LightsOn
Version: 1.2.0
Author URI: https://lights-on.io
*/

function post_wizard() {
    $screen = get_current_screen();
    if ( $screen->base == 'edit' && $screen->post_type == 'post' ) { ?>

        <div id="post-wizard-overlay"></div>

        <?php

        postwizard_popup_function();

        require_once plugin_dir_path( __FILE__ ) . 'inc/popup-template.php';
    }
}

function post_wizard_script_and_style() {
    $screen = get_current_screen();
    if ( $screen->base == 'edit' && $screen->post_type == 'post' ) {
        wp_enqueue_script('post-wizard-button', plugin_dir_url(__FILE__) . '/inc/button.js', array(), '1.0', true);
        wp_enqueue_style('post-wizard-style', plugin_dir_url(__FILE__) . '/style/style.css');
    }
}


// If API KEY
if (get_option( 'post_wizard_settings' ) !== false) {
    $options = get_option( 'post_wizard_settings' );
    if (isset($options['post_wizard_api_key']) && $options['post_wizard_api_key'] !== '') {
        add_action('admin_footer', 'post_wizard');
        add_action('admin_enqueue_scripts', 'post_wizard_scripts');
        add_action( 'admin_enqueue_scripts', 'post_wizard_script_and_style' );
    }
}

// Enqueue the necessary scripts and styles
function post_wizard_scripts()
{
    global $pagenow, $typenow;
    if ( $pagenow == 'edit.php' && $typenow == 'post' ) {
        // Add the main JavaScript file
        wp_enqueue_script('post-wizard', plugin_dir_url(__FILE__) . '/inc/api-call.js', array(), '1.0', true);

        // API KEY
        $options = get_option( 'post_wizard_settings' );
        $api_key = $options['post_wizard_api_key'];

        wp_enqueue_script( 'post-wizard', plugin_dir_url(__FILE__) . '/inc/api-call.js', array(), '1.0', true );
        wp_add_inline_script( 'post-wizard', 'var apiKey = "' . $api_key . '"; var pluginUrl = "' . plugin_dir_url(__FILE__) . '"', 'before' );

    }
}

// Admin Menu
add_action( 'admin_menu', 'post_wizard_add_admin_menu' );
add_action( 'admin_init', 'post_wizard_settings_init' );

function post_wizard_add_admin_menu() {
    add_menu_page(
        'Post Wizard',
        'Post Wizard',
        'manage_options',
        'post_wizard',
        'post_wizard_options_page',
        'data:image/svg+xml;base64,' . base64_encode('<svg id="Ebene_1" data-name="Ebene 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 67 63">
                                                                  <g id="Group-Copy">
                                                                    <path id="Path-212" d="M240.59,214.78c1.25-1,2.35-2.18,4.07-2.76,4.07-1.37,4.36-3.21,5.61-2.73s7.87,20,7.87,21.46.75,9.09,1.21,10.26,3.92,8.28,5.33,10.94c.08.16-1.91,1.27-4.48,1.72a63.45,63.45,0,0,1-6.93.51,26.46,26.46,0,0,0,9,1.57c3-.17,4.93-.7,5.05-.55.87,1.15,12.15,10,15.78,10.49,2.26.3-14.44,6-33.28,6.47-11.45.28-23-.35-33.51-8.24q14.17-4.29,18.23-10.25a91.48,91.48,0,0,0,4.62-10.95c.45-1.59,4.94-11.45,4.25-10.3-1.23,2.09-4.22,4.53-5,5.23s2.16-4,2.37-5.23c.64-3.76,2-4.84,1.19-8.47-.16-.71-.36-1.69-.58-2.93a41.48,41.48,0,0,0,3.92-2.56c-.5.2-1.49.24-2.35.47a12.56,12.56,0,0,0-4.41,1.95,8,8,0,0,1-4,1.53Q238.88,216.11,240.59,214.78Z" transform="translate(-216.28 -209.21)" style="fill: #fff;fill-rule: evenodd"/>
                                                                  </g>
                                                                </svg>
                                                        ')
    );

    // Menu page styling
    wp_enqueue_style('post-wizard-menu-page-style', plugin_dir_url(__FILE__) . '/style/menu-page.css');
}

function post_wizard_options_page() {
    ?>
    <form action="options.php" method="post" class="post-wizard-menu-page">
        <h1>Post Wizard</h1>
        <br>
        <?php
        settings_fields( 'post_wizard_settings' );
        do_settings_sections( 'post_wizard' );
        submit_button();
        ?>
        <div class="info"><strong>Noch keinen OPEN AI API Key?</strong><br> <a href="https://lights-on.io/blog/openai-api-key" target="_blank">Hier</a> haben wir für dich eine Anleitung erstellt.</div>
        <div class="extra-info">Solltest Du keinen eigenen Firmen-Account bei OPEN AI haben,<br> oder willst das Plugin erstmal nur für ein paar Tage testen, dann melde dich gerne bei uns.<br>Wir stellen einen API-Key zur Verfügung.<br>
            <a href="mailto:wordpress@lights-on.io?subject=Anfrage für einem API Key für Open AI" target="_blank">wordpress@lights-on.io</a>
        </div>
        <a href="https://lights-on.io" target="_blank" class="made-by-lightson">made with <span><svg id="Ebene_1" data-name="Ebene 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 67 63">
                                                                  <g id="Group-Copy">
                                                                    <path id="Path-212" d="M240.59,214.78c1.25-1,2.35-2.18,4.07-2.76,4.07-1.37,4.36-3.21,5.61-2.73s7.87,20,7.87,21.46.75,9.09,1.21,10.26,3.92,8.28,5.33,10.94c.08.16-1.91,1.27-4.48,1.72a63.45,63.45,0,0,1-6.93.51,26.46,26.46,0,0,0,9,1.57c3-.17,4.93-.7,5.05-.55.87,1.15,12.15,10,15.78,10.49,2.26.3-14.44,6-33.28,6.47-11.45.28-23-.35-33.51-8.24q14.17-4.29,18.23-10.25a91.48,91.48,0,0,0,4.62-10.95c.45-1.59,4.94-11.45,4.25-10.3-1.23,2.09-4.22,4.53-5,5.23s2.16-4,2.37-5.23c.64-3.76,2-4.84,1.19-8.47-.16-.71-.36-1.69-.58-2.93a41.48,41.48,0,0,0,3.92-2.56c-.5.2-1.49.24-2.35.47a12.56,12.56,0,0,0-4.41,1.95,8,8,0,0,1-4,1.53Q238.88,216.11,240.59,214.78Z" transform="translate(-216.28 -209.21)" style="fill: #5839b6;fill-rule: evenodd"/>
                                                                  </g>
                                                                </svg></span> by <strong>LightsOn</strong></a>
    </form>
    <?php
}

function post_wizard_settings_init() {
    register_setting( 'post_wizard_settings', 'post_wizard_settings' );

    add_settings_section(
        'post_wizard_settings_section',
        'API Einstellungen',
        'post_wizard_settings_section_callback',
        'post_wizard'
    );

    add_settings_field(
        'post_wizard_api_key',
        'Dein Open AI API Key',
        'post_wizard_api_key_render',
        'post_wizard',
        'post_wizard_settings_section'
    );
}

function post_wizard_settings_section_callback() {
    echo esc_html('Gib hier deinen OPEN AI API Key ein, um fortzufahren.');
}


function post_wizard_api_key_render() {
    if (get_option( 'post_wizard_settings' ) !== false) {
        $options = get_option('post_wizard_settings');
        ?>
        <input type='text' name='post_wizard_settings[post_wizard_api_key]' value='<?php echo esc_html($options['post_wizard_api_key']); ?>'>
        <?php
    } else {
        ?>
           <input type='text' name='post_wizard_settings[post_wizard_api_key]' value=''>
        <?php
    }
}
function upload_image_to_wordpress() {
    if (!empty($_POST['image_url'])) {
        $image_url = $_POST['image_url'];
        // Benötigt das "allow_url_fopen" PHP-Setting aktiviert
        $image_id = media_sideload_image($image_url, 0, '', 'id');

        if (is_wp_error($image_id)) {
            echo 'Fehler beim Hochladen: ' . $image_id->get_error_message();
        } else {
            echo 'Erfolg! Bild-ID: ' . $image_id;
        }
    }

    die(); 
}

add_action('wp_ajax_upload_image_to_wordpress', 'upload_image_to_wordpress');
add_action('wp_ajax_nopriv_upload_image_to_wordpress', 'upload_image_to_wordpress');

function postwizard_popup_function() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['api-answer'])) {

        $title = sanitize_text_field($_POST['final-title']);
        $text = wp_kses_post($_POST['api-answer']);
    
        $blocks = str_replace('<p>', '<!-- wp:paragraph --><p>', $text);
        $blocks = str_replace('</p>', '</p><!-- /wp:paragraph -->', $blocks);
    
        $postData = array(
            'post_title'   => wp_strip_all_tags($title),
            'post_content' => $blocks,
            'post_status'  => 'draft',
            'post_author'  => 1,
            'post_type'    => 'post'
        );

        $post_id = wp_insert_post($postData);

        // Get the newest image
        $args = array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'post_status'    => 'inherit',
            'posts_per_page' => 1,
            'order'          => 'DESC',
            'orderby'        => 'date'
        );

        $latest_images = get_posts($args);

        if (!empty($latest_images)) {
            $latest_image = reset($latest_images);
            set_post_thumbnail($post_id, $latest_image->ID);
        }

        echo '<script>location.reload();</script>';
    }
}
