<?php

/**
 *
 *
 *
 *
 **/


/**
 *
 *  ADD CUSTOM HEADER SUPPORT
 *
 *
 **/

$defaults = array(
    'default-image'          => get_stylesheet_directory_uri().'/img/synergy-massage-cedar-rapids-iowa-reiki-continuing-education-280x176.png',
    'width'                  => 280,
    'height'                 => 176,
    'flex-height'            => true,
    'flex-width'             => true,
    'header-text'            => false,
);
add_theme_support( 'custom-header', $defaults );

/**
 *
 *  REGISTER JS AND CSS
 *
 *
 **/

    function lowermedia_scripts() {

        //if (is_front_page()) {
            wp_enqueue_script(
                'custom-js',
                get_stylesheet_directory_uri() . '/custom.js',
                array( 'jquery' )
            );
        //}

    }
    add_action( 'wp_enqueue_scripts', 'lowermedia_scripts' );

    // function lowermedia_enqueue_parent_style() {
    //     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    // }
    // add_action( 'wp_enqueue_scripts', 'lowermedia_enqueue_parent_style' );



/*
#
#   ADD CUSTOM CONTENT TYPES 
#
*/

    /**
     * Custom Post Types, on the fly creation
     *
     **/

    function lm_custom_post_type_creator($post_type_name, $description, $public, $menu_position, $supports, $has_archive, $irreg_plural, $custom_slug) {
      if ($irreg_plural) {$plural = 's';} else {$plural = '';}
      $labels = array(
        'name'               => _x( $post_type_name, 'post type general name' ),
        'singular_name'      => _x( strtolower($post_type_name), 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'book' ),
        'add_new_item'       => __( 'Add New '.$post_type_name),
        'edit_item'          => __( 'Edit '.$post_type_name ),
        'new_item'           => __( 'New '.$post_type_name ),
        'all_items'          => __( 'All '.$post_type_name.$plural ),
        'view_item'          => __( 'View '.$post_type_name ),
        'search_items'       => __( 'Search'.$post_type_name.$plural ),
        'not_found'          => __( 'No '.$post_type_name.$plural.' found' ),
        'not_found_in_trash' => __( 'No '.$post_type_name.$plural.' found in the Trash' ), 
        'parent_item_colon'  => '',
        'menu_name'          => $post_type_name
      );
      $args = array(
        'labels'        => $labels,
        'description'   => $description,
        'public'        => $public,
        'menu_position' => $menu_position,
        'supports'      => $supports,
        'has_archive'   => $has_archive,
        'rewrite'       => array( 'slug' => $custom_slug )
      );
      register_post_type( $post_type_name, $args ); 
    }
    // add_action( 'init', lm_custom_post_type_creator('Testimonials', 'Holds our testimonials', true, 4, array( 'title', 'editor', 'thumbnail' ), true, false));
    add_action( 'init', lm_custom_post_type_creator('Therapists', 'Holds our therapists specific data', true, 5, array( 'title', 'editor', 'thumbnail' ), true, false, 'massage-therapists'));
    // add_action( 'init', lm_custom_post_type_creator('Car Care Tips', 'Holds our car care tips.', true, 6, array( 'title', 'editor', 'thumbnail', 'excerpt' ), true, false));
    // add_action( 'init', lm_custom_post_type_creator('Car Care Videos', 'Holds our car care videos.', true, 7, array( 'title', 'editor', 'thumbnail' ), true, false));

    /**
     * Adds a box to the main column on the Post and Page edit screens.
     */
    // function lm_add_meta_box() {
    //     add_meta_box(
    //         'lm_staff_position',
    //         __( 'Staff Position', 'lm_textdomain' ),
    //         'lm_meta_box_callback',
    //         'staff',//$screen
    //         'side',
    //         'high'
    //     );

    //     add_meta_box(
    //         'lm_testimonials_source',
    //         __( 'Testimonial Source', 'lm_textdomain' ),
    //         'lm_meta_box_callback',
    //         'testimonials',//$screen
    //         'side',
    //         'high'
    //     );
    // }
    // add_action( 'add_meta_boxes', 'lm_add_meta_box' );

    /**
     * Prints the box content.
     * 
     * @param WP_Post $post The object for the current post/page.
     */
    // function lm_meta_box_callback( $post ) {

    //     // Add an nonce field so we can check for it later.
    //     wp_nonce_field( 'lm_meta_box', 'lm_meta_box_nonce' );

        
    //      * Use get_post_meta() to retrieve an existing value
    //      * from the database and use the value for the form.
         
    //     $value = get_post_meta( $post->ID, '_lm_meta_value_key', true );

    //     echo '<label for="lm_new_field">';
    //     _e( '', 'lm_textdomain' );
    //     echo '</label> ';
    //     echo '<input type="text" id="lm_new_field" name="lm_new_field" value="' . esc_attr( $value ) . '" size="25" />';
    // }

    /**
     * When the post is saved, saves our custom data.
     *
     * @param int $post_id The ID of the post being saved.
     */
    // function lm_save_meta_box_data( $post_id ) {

    //     /*
    //      * We need to verify this came from our screen and with proper authorization,
    //      * because the save_post action can be triggered at other times.
    //      */

    //     // Check if our nonce is set.
    //     if ( ! isset( $_POST['lm_meta_box_nonce'] ) ) { return; }
    //     // Verify that the nonce is valid.
    //     if ( ! wp_verify_nonce( $_POST['lm_meta_box_nonce'], 'lm_meta_box' ) ) { return; }
    //     // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    //     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
    //     // Check the user's permissions.
    //     if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) { if ( ! current_user_can( 'edit_page', $post_id ) ) { return; }
    //     } else { if ( ! current_user_can( 'edit_post', $post_id ) ) { return; } }

    //     /* OK, it's safe for us to save the data now. */
    //     // Make sure that it is set.
    //     if ( ! isset( $_POST['lm_new_field'] ) ) { return;  }
    //     // Sanitize user input.
    //     $my_data = sanitize_text_field( $_POST['lm_new_field'] );
    //     // Update the meta field in the database.
    //     update_post_meta( $post_id, '_lm_meta_value_key', $my_data );
    // }
    // add_action( 'save_post', 'lm_save_meta_box_data' );



/*
#
#   Make Archives.php Include Custom Post Types
#   http://css-tricks.com/snippets/wordpress/make-archives-php-include-custom-post-types/
#
*/
/*

    --    ADD CUSTOM POST TYPES HERE   --

*/
    function namespace_add_custom_types( $query ) {
      if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
            $query->set( 'post_type', array( 'post', 'post-type-name' ));
            return $query;
        }
    }
    add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

/*
#
#   Define what post types to search
#   The hook needed to search ALL content
#
*/
/*

    --    ADD CUSTOM POST TYPES HERE   --

*/
    function searchAll( $query ) {
        if ( $query->is_search ) {
            $query->set( 'post_type', array( 'post', 'page', 'feed', 'products', 'people'));
        }
        return $query;
    }
    add_filter( 'the_search_query', 'searchAll' );

/*
#
#   PHONENUMBER
#   
#
*/
    function format_phonenumber( $arg ) {
        $data = '+'.$arg;
        if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $data,  $matches ) )
        {
            $result = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
            return $result;
        }

    }

    // Add [phonenumber] shortcode
    function phonenumber_shortcode( $atts ){
        //retrieve phone number from database
        $lm_array = get_option('lowermedia_phone_number');

        //check if user is on mobile if so make the number a link
        if (wp_is_mobile())
        {
            return '<a href="tel:+'.$lm_array["id_number"].'">'.format_phonenumber($lm_array["id_number"]).'</a>';
        } else {
            return format_phonenumber($lm_array["id_number"]);
        }
    }
    add_shortcode( 'phonenumber', 'phonenumber_shortcode' );


    class lowermedia_phonenumber_settings
    {
        /**
         * Holds the values to be used in the fields callbacks
         */
        private $options;

        /**
         * Start up
         */
        public function __construct()
        {
            add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
            add_action( 'admin_init', array( $this, 'page_init' ) );
        }

        /**
         * Add options page
         */
        public function add_plugin_page()
        {
            // This page will be under "Settings"
            add_options_page(
                'Settings Admin', 
                'Phone Number', 
                'manage_options', 
                'lowermedia-setting-admin', 
                array( $this, 'create_admin_page' )
            );
        }

        /**
         * Options page callback
         */
        public function create_admin_page()
        {
            // Set class property
            $this->options = get_option( 'lowermedia_phone_number' );
            ?>
            <div class="wrap">
                <?php screen_icon(); ?>
                <h2>Phone Number</h2>           
                <form method="post" action="options.php">
                <?php
                    // This prints out all hidden setting fields
                    settings_fields( 'lowermedia_phone_options' );   
                    do_settings_sections( 'lowermedia-setting-admin' );
                    submit_button(); 
                ?>
                </form>
            </div>
            <?php
        }

        /**
         * Register and add settings
         */
        public function page_init()
        {        
            register_setting(
                'lowermedia_phone_options', // Option group
                'lowermedia_phone_number', // Option name
                array( $this, 'sanitize' ) // Sanitize
            );

            add_settings_section(
                'setting_section_id', // ID
                'My Custom Settings', // Title
                array( $this, 'print_section_info' ), // Callback
                'lowermedia-setting-admin' // Page
            );  

            add_settings_field(
                'id_number', // ID
                'ID Number', // Title 
                array( $this, 'id_number_callback' ), // Callback
                'lowermedia-setting-admin', // Page
                'setting_section_id' // Section           
            );      
       
        }

        /**
         * Sanitize each setting field as needed
         *
         * @param array $input Contains all settings fields as array keys
         */
        public function sanitize( $input )
        {
            $new_input = array();
            if( isset( $input['id_number'] ) )
                $new_input['id_number'] = absint( $input['id_number'] );

            return $new_input;
        }

        /** 
         * Print the Section text
         */
        public function print_section_info()
        {
            print 'Enter your settings below:';
        }

        /** 
         * Get the settings option array and print one of its values
         */
        public function id_number_callback()
        {
            printf(
                '<input type="text" id="id_number" name="lowermedia_phone_number[id_number]" value="%s" />',
                isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
            );
        }

    }

    if( is_admin() ) { $lowermedia_phonenumber_settings = new lowermedia_phonenumber_settings(); }

/*
#
#   WHITE LABEL
#
*/

    function lm_custom_admin_styles() {
       echo '<style type="text/css">
           /* Styles here! */
            body {font-family: Futura, "Trebuchet MS", Arial, sans-serif;}

           /*change sidebar icon for testimonials, staff, tips, videos */
            #toplevel_page_wpcr_view_reviews .dashicons-before img { display:none; }
            #toplevel_page_wpcr_view_reviews .dashicons-before:before,
            #toplevel_page_wpcr_view_reviews .dashicons-before:before { content:"\f155"; }

            #menu-posts-therapists .dashicons-admin-post:before,
            #menu-posts-therapists .dashicons-format-standard:before { content:"\f307"; }
           
           /*change admin menu coloring*/ 
            #adminmenu, #adminmenu .wp-submenu, 
            #adminmenuback, #adminmenuwrap { /*background-color: #043789;*/ background-color: #166936; }

            #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head,
            #adminmenu .wp-menu-arrow, 
            #adminmenu .wp-menu-arrow div,
            #adminmenu li.current a.menu-top,
            #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,
            .folded #adminmenu li.current.menu-top,
            .folded #adminmenu li.wp-has-current-submenu { background-color: #6FCCDD; }

            #adminmenu .wp-submenu a {color: rgba(249,190,25,0.6);}

            #adminmenu .opensub .wp-submenu li.current a,
            #adminmenu .wp-submenu li.current, 
            #adminmenu .wp-submenu li.current a, 
            #adminmenu .wp-submenu li.current a:focus, 
            #adminmenu .wp-submenu li.current a:hover, 
            #adminmenu a.wp-has-current-submenu:focus+.wp-submenu li.current a { color: rgba(249,190,25,1); }

            #adminmenu li.menu-top:hover,
            #adminmenu li.opensub>a.menu-top, 
            #adminmenu li>a.menu-top:focus { background: linear-gradient(to bottom,#f9f9f9 37%,#c9c9c9 100%); }
         </style>';
    }
    add_action('admin_head', 'lm_custom_admin_styles');

    //* Replace WordPress login logo with your own
    function lm_custom_login_logo() {
        echo '<style type="text/css">
        body { font-family: Futura, "Trebuchet MS", Arial, sans-serif; }
        h1 a 
        { 
            background-image:url('.get_stylesheet_directory_uri().'/img/logo.png) !important; 
            background-size: 211px auto !important;
            height: 200px !important;
            width: 311px !important; 
            margin-bottom: 0 !important; 
            padding-bottom: 0 !important; 
        }
        .login form { margin-top: 10px !important; border: 1px solid #f9be19; }
        .login {background:#333;}
        </style>';
    }
    add_action('login_head', 'lm_custom_login_logo');

    //* Change the URL of the WordPress login logo
    function lm_url_login_logo(){ return get_bloginfo( 'wpurl' ); }
    add_filter('login_headerurl', 'lm_url_login_logo');

    //* Login Screen: Change login logo hover text
    function lm_login_logo_url_title() { return 'A LowerMedia Site'; }
    add_filter( 'login_headertitle', 'lm_login_logo_url_title' );

    //* Login Screen: Don't inform user which piece of credential was incorrect
    function lm_failed_login () { return 'The login information you have entered is incorrect. Please try again.'; }
    add_filter ( 'login_errors', 'lm_failed_login' );

    //* Modify the admin footer text
    function lm_modify_footer_admin () { echo '<span id="footer-meta"><a href="http://lowermedia.net" target="_blank">A LowerMedia Site</a></span>'; }
    add_filter('admin_footer_text', 'lm_modify_footer_admin');

    //* Add theme info box into WordPress Dashboard
    function lm_add_dashboard_widgets() { wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Details', 'lm_theme_info'); }
    add_action('wp_dashboard_setup', 'lm_add_dashboard_widgets' );

/*
#
#   REGISTER SIDEBARS/WIDGET AREAS
#   
#
*/

    function lowermedia_widgets_destroy() {

        // Unregister some of the TwentyTwelve sidebars
        unregister_sidebar( 'sidebar-1' );
        unregister_sidebar( 'sidebar-2' );
        unregister_sidebar( 'sidebar-3' );
    }
    add_action( 'widgets_init', 'lowermedia_widgets_destroy', 11);

    function lowermedia_widgets_init() {

        register_sidebar( array(
            'name' => 'Bottom Sidebar Widget Area',
            'id' => 'bottom-header-widget',
            'before_widget' => '<div id="bottom-header-widget" class="bottom-header-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ) );

        register_sidebar( array(
            'name' => 'Bottom Content Widget Area',
            'id' => 'bottom-content-widget',
            'before_widget' => '<div id="bottom-content-widget" class="bottom-content-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ) );

    }
    add_action( 'widgets_init', 'lowermedia_widgets_init' );

/*
#
#   REGISTER MENUS
#   
#
*/

    function lowermedia_menus_init() {
      // register_nav_menus(
      //   array(
      //     'new-menu-name' => __( 'New Menu Name' ),
      //     'other-menu-name' => __( 'Other Menu Name' )
      //   )
      // );
    }
    add_action( 'init', 'lowermedia_menus_init' );


/*
#   Create widget info for above function: lm_add_dashboard_widgets
*/
    function lm_theme_info() {
      echo "
          <ul>
          <li><strong>Developed By:</strong> LowerMedia.Net</li>
          <li><strong>Website:</strong> <a href='http://lowermedia.net'>www.lowermedia.net</a></li>
          <li><strong>Contact:</strong> <a href='mailto:pete.lower@gmail.com'>pete.lower@gmail.com</a></li>
          </ul>"
      ;
    }

/*
#
#   ADD CUSTOM ADMIN LOGIN LOGO
#
*/

    function custom_admin_logo() {
        echo '
            <style type="text/css">
                #wp-admin-bar-wp-logo { display:none !important; }
            </style>
        ';
    }
    add_action('admin_head', 'custom_admin_logo');

/*
#
#   MOVE ADMIN BAR TO BOTTOM ON FRONT END
#
*/
    function lm_admin_bar_bottom() {
        echo '
            <style type="text/css">

                html {
                    margin-top: 0px !important;
                }

                .admin-bar {
                    margin-top: -28px;
                    padding-bottom: 28px;
                }

                #wpadminbar {
                    top: auto !important;
                    bottom: 0;
                }

                #wpadminbar .quicklinks>ul>li { position: relative; }

                #wpadminbar .ab-top-menu>.menupop>.ab-sub-wrapper { bottom: 28px; }

                #wp-admin-bar-wp-logo { display: none; }

                #menu-posts-therapists .dashicons-admin-post:before,
                #menu-posts-therapists .dashicons-format-standard:before { content:"\f307"; }
            </style>'
        ;
    }

    function my_filter_head() {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }

    if(current_user_can( 'edit_posts' )) {
        if(!is_admin()) {
            if(!wp_is_mobile()) {
                add_action('wp_head', 'lm_admin_bar_bottom');
                add_action('get_header', 'my_filter_head');
            }
        }
    }

/*
#
#   ENABLE SHORTCODE IN WIDGETS
#
*/

    add_filter('widget_text', 'do_shortcode');

/*
#
#   EXCERPT LENGTH
#
*/

function custom_excerpt_length( $length ) {
    return 10000;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $length ) {
    return '';
}
add_filter( 'excerpt_more', 'custom_excerpt_more', 999 );

function wpse_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>'; 
    }

if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) : 

    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
    $raw_excerpt = $wpse_excerpt;
        if ( '' == $wpse_excerpt ) {

            $wpse_excerpt = get_the_content('');
            $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
            $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
            $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
            $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
                $excerpt_word_count = 75;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);

                foreach ($tokens[0] as $token) { 

                    if ($count >= $excerpt_length && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) { 
                    // Limit reached, continue until , ; ? . or ! occur at the end
                        $excerptOutput .= trim($token);
                        break;
                    }

                    // Add words to complete sentence
                    $count++;

                    // Append what's left of the token
                    $excerptOutput .= $token;
                }

            $wpse_excerpt = trim(force_balance_tags($excerptOutput));

                $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'wpse' ), get_the_title()) . '</a>'; 
                $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 

                //$pos = strrpos($wpse_excerpt, '</');
                //if ($pos !== false)
                // Inside last HTML tag
                //$wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
                //else
                // After the content
                $wpse_excerpt .= $excerpt_more; /*Add read more in new paragraph */

            return $wpse_excerpt;   

        }
        return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
    }

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt'); 


/*
# SPEED OPTIMIZATIONS
# 
*/

// Remove jquery migrate as is not needed
if(!is_admin()) add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );
function dequeue_jquery_migrate( &$scripts){
    $scripts->remove( 'jquery');
    $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
}

//load jquery from google
if (!is_admin()) add_action("wp_enqueue_scripts", "lowermedia_jquery_enqueue", 11);
function lowermedia_jquery_enqueue() {
    wp_deregister_script('jquery');
    // wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null, true);
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js", false, null, true);
    wp_enqueue_script('jquery');
}

//added lazy load styles to style.css so deregister
// add_action( 'wp_print_styles', 'lowermedia_deregister_styles', 100 );
// function lowermedia_deregister_styles() {
//   wp_deregister_style( 'image-lazy-load-frontend' );
// }

/*
#
#   SPEED OPTIMIZATIONS
#   -Load all fonts from google
#
#
*/

    function load_fonts() {
        wp_dequeue_style( 'twentytwelve-fonts' );
        wp_deregister_style( 'twentytwelve-fonts' );
        wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Signika:400,700|Slabo+27px|Open+Sans:400italic,700italic,400,700&amp;subset=latin,latin-ext');
        wp_enqueue_style( 'googleFonts');
    }
    add_action('wp_print_styles', 'load_fonts');


/*
#
#   END
#
*/