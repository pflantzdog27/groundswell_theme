<?php

//----------------------------//
// ACF Options Page
//----------------------------//
    add_filter('acf/options_page/settings', 'my_options_page_settings');
    function my_options_page_settings($options) {
        $options['title'] = _('Global');
        $options['pages'] = array(
            _('Header'),
            _('Footer')
        );
        return $options;
    }


//----------------------------//
// Enqueue Scripts
//----------------------------//
	add_action( 'wp_enqueue_scripts', 'load_javascript_files' ); 
	function load_javascript_files() {
        wp_deregister_script( 'jquery' );
		// first register
        wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.1.min.js',false, '2.1.1', null);
        wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js',false, '2.6.2', null);
		wp_register_script( 'custom-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.0', true);
		wp_register_script( 'custom', get_template_directory_uri() . '/js/gs_all.js', array('jquery'), '1.0', true);
        wp_register_script( 'videojs', get_template_directory_uri() . '/js/videojs.min.4.11.2.js', array('jquery'), '4.11.2', true);
        wp_register_script( 'tweenMax', get_template_directory_uri().'/js/TweenMax.min.js', array('jquery'), '1.9.7', true );
        wp_register_script( 'momentjs', get_template_directory_uri().'/js/moment.min.js', array('jquery'), '2.8.3', true );
        wp_register_script( 'scrollbars', get_template_directory_uri().'/js/jquery.mCustumScrollbar.3.0.5.min.js', false, '3.0.5', null );
        wp_register_script( 'mustache', get_template_directory_uri().'/js/mustache.js', false, '1.0', null );
        wp_register_script( 'fancybox', get_template_directory_uri().'/js/jquery.fancybox.pack.js',array('jquery'), '2.1.5',null );
        wp_register_script( 'counter', get_template_directory_uri().'/js/jquery.counter.js',array('jquery'), '1.0',null );
        wp_register_script( 'scrollorama', get_template_directory_uri().'/js/jquery.superscrollorama.js',array('jquery'), '1.0',null );
        wp_register_script( 'cookies', get_template_directory_uri().'/js/jquery.cookie.js',array('jquery'), '1.4.1',null );
        wp_register_script( 'youtubeVideo', get_template_directory_uri().'/js/youtube.js',array('videojs'), '1',null );
			// then enqueue
            wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'modernizr' );
            wp_enqueue_script( 'custom-bootstrap' );
            wp_enqueue_script( 'videojs' );
            wp_enqueue_script( 'youtubeVideo' );
            wp_enqueue_script( 'scrollorama' );
            wp_enqueue_script( 'tweenMax' );
            wp_enqueue_script( 'momentjs' );
            wp_enqueue_script( 'scrollbars' );
            wp_enqueue_script( 'mustache' );
            wp_enqueue_script( 'counter' );
            wp_enqueue_script( 'fancybox' );
            wp_enqueue_script( 'cookies' );
            wp_enqueue_script( 'custom' );
    }

//----------------------------//
// Menus
//----------------------------//
    if ( function_exists( 'register_nav_menus' ) ) {
        register_nav_menus( array(
            'primary_nav' => 'Main navigation displayed at the top of any page'
        ));
    }


//----------------------------//
// Register Sidebar and Widgetize
//----------------------------//
function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Blog Sidebar',
        'id'            => 'sidebar_blog_single',
        'before_widget' => '<div class="sidebar-widget hidden-xs">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => 'Inspiration Sidebar',
        'id'            => 'sidebar_inspiration_single',
        'before_widget' => '<div class="sidebar-widget hidden-xs">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


///----------------------------//
// Thumbnail Support
//----------------------------//
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'blog', 400, 400, true );
}

//----------------------------//
    // Customizing Profile Input Fields
//----------------------------//
    function modify_contact_methods($profile_fields) {

        // Add new fields
        $profile_fields['twitter'] = 'Twitter Username';
        $profile_fields['facebook'] = 'Facebook URL';
        $profile_fields['linkedin'] = 'Linkedin URL';
        $profile_fields['job_title'] = 'Job Title';

        // Remove old fields
        unset($profile_fields['nickname']);
        unset($profile_fields['url']);

        return $profile_fields;
    }
    add_filter('user_contactmethods', 'modify_contact_methods');

    // return just the src of the avatar
    function get_avatar_url($get_avatar){
        preg_match("/src='(.*?)'/i", $get_avatar, $matches);
        return $matches[1];
    }



//----------------------------//
    // Support for SVG uploads to media library
//----------------------------//
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');

//----------------------------//
    // Custom Edit Option for TinyMCE
//----------------------------//
    function wpb_mce_buttons_2($buttons) {
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }
    add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

    function my_mce_before_init_insert_formats( $init_array ) {

        $style_formats = array(
            array(
                'title' => 'Blue Background',
                'block' => 'span',
                'classes' => 'blue-background',
                'wrapper' => false,
            ),
            array(
                'title' => 'Black Underlay',
                'block' => 'div',
                'classes' => 'overlay-text',
                'wrapper' => false,
            )
        );
        $init_array['style_formats'] = json_encode( $style_formats );
        return $init_array;
    }
    add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

    // Custom font colors
    function my_mce4_options( $init ) {
        $default_colours = '
        "333333", "Black",
        "ffffff", "White",
        "555555", "Dark Gray",
        "eaeaea", "Lighter Gray"
        ';
        $custom_colours = '
        "44aeea", "Groundswell Blue",
        "ea5a3a", "Groundswell Orange"
        ';
        $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';
        $init['textcolor_rows'] = 2;
        return $init;
    }
    add_filter('tiny_mce_before_init', 'my_mce4_options');


//----------------------------//
    // PAGINATION
//----------------------------//
function wpbeginner_numeric_posts_nav() {
    if( is_singular() )
        return;
        global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /**	Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /**	Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<ul class="pagination">' . "\n";

    /**	Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /**	Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /**	Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /**	Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /**	Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul>' . "\n";

}

//----------------------------//
// ACF EXCERPTS
//----------------------------//
function custom_field_excerpt($title) {
    global $post;
    $text = get_field($title);
    if ( '' != $text ) {
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $excerpt_length = 35; // 20 words
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }
    return apply_filters('the_excerpt', $text);
}



//----------------------------//
// bit.ly URL SHORTENER
//----------------------------//
function bitly()
{
    //login information
    $url = get_permalink();  //for wordpress permalink
    $login = 'mreyf';   //your bit.ly login
    $apikey = 'R_4353512fc164bcd1828c0e60fa3e94cb'; //add your bit.ly API
    $format = 'json';   //choose between json or xml
    $version = '2.0.1';
    //generate the URL
    $bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$apikey.'&format='.$format;

    //fetch url
    $response = file_get_contents($bitly);
//for json formating
    if(strtolower($format) == 'json')
    {
        $json = @json_decode($response,true);
        echo $json['results'][$url]['shortUrl'];
    }
    else //for xml formatting
    {
        $xml = simplexml_load_string($response);
        echo 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
    }
}





