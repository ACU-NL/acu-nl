<?php

/* REGISTER NAVIGATION MENUS */

function custom_menus() {
    register_nav_menus(
        array(
            'main' => 'Main Navigation',
            'aboutnav' => 'About Page Navigation',
            'contactnav' => 'Contact Page Navigation',
            'footersocial' => 'Footer Social Buttons'
        )
    );
}

add_action( 'init', 'custom_menus' );

/* FOOTER SOCIAL BUTTONS */

function insert_icons($items, $menu, $args){
    if($menu->name=='Footer Social Links'){
        foreach($items as $key => $item){
            if(isset($item->object_id) && !empty($item->object_id)){
                $menu_icon = get_field('to_which_site_is_this_a_link',$item->object_id);
                if(isset($menu_icon) && !empty($menu_icon)){
                    $m_icon = $menu_icon;
                    $item->image = $m_icon.$item->image;
                }
            }
        }
    }
    return $items;
}

add_filter('wp_get_nav_menu_items','insert_icons',NULL,3);

/* REGISTERING CUSTOM POST TYPES */

function themes_taxonomy() {
    register_taxonomy(
        'event-categories',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'event',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Event categories', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'event-categories',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}

add_action( 'init', 'themes_taxonomy');

function create_posttype() {
    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Events' ),
        'all_items'           => __( 'All Events' ),
        'view_item'           => __( 'View Event' ),
        'add_new_item'        => __( 'Add New Event' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Event' ),
        'update_item'         => __( 'Update Event' ),
        'search_items'        => __( 'Search Event' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
    register_post_type( 'event',
        array(
            'label'                 => __( 'events' ),
            'description'           => __( 'Events' ),
            'labels'                => $labels,
            'public'                => true,
            'has_archive'           => true,
            'rewrite'               => array('slug' => 'events', 'category'),
            'show_in_rest'          => true,
            'taxonomies'            => array( 'event-categories' ),
            'menu_icon'             => 'dashicons-calendar-alt',
        )
    );

    $labels = array(
        'name'                => _x( 'Story Entries', 'Post Type General Name' ),
        'singular_name'       => _x( 'Story Entry', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Story Entries' ),
        'all_items'           => __( 'All Story Entries' ),
        'view_item'           => __( 'View Story Entry' ),
        'add_new_item'        => __( 'Add New Story Entry' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Story Entry' ),
        'update_item'         => __( 'Update Story Entry' ),
        'search_items'        => __( 'Search Story Entries' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
    register_post_type( 'storyentry',
        array(
            'labels' => array(
                'name' => __( 'Story Entries' ),
                'singular_name' => __( 'Story Entry' ),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'storyentries'),
            'show_in_rest' => false,
            'menu_icon'             => 'dashicons-format-aside',
            'supports' => array('title', 'editor', 'page-attributes'),
            'hierarchical' => false
        )
    );

    $labels = array(
        'name'                => _x( 'Notices', 'Post Type General Name' ),
        'singular_name'       => _x( 'Notice', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Notices' ),
        'all_items'           => __( 'All Notices' ),
        'view_item'           => __( 'View Notice' ),
        'add_new_item'        => __( 'Add New Notice' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Notice' ),
        'update_item'         => __( 'Update Notice' ),
        'search_items'        => __( 'Search Notices' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
    register_post_type( 'notice',
        array(
            'labels' => array(
                'name' => __( 'Notices' ),
                'singular_name' => __( 'Notice' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'notices'),
            'show_in_rest' => false,
            'menu_icon'             => 'dashicons-warning',
            'supports' => array('title', 'editor', 'page-attributes'),
            'hierarchical' => false
        )
    );

    $labels = array(
        'name'                => _x( 'Opening Times', 'Post Type General Name' ),
        'singular_name'       => _x( 'Opening Time', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Opening Times' ),
        'all_items'           => __( 'All Opening Times' ),
        'view_item'           => __( 'View Opening Time' ),
        'add_new_item'        => __( 'Add New Opening Time' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Opening Time' ),
        'update_item'         => __( 'Update Opening Time' ),
        'search_items'        => __( 'Search Opening Times' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
    register_post_type( 'openingtime',
        array(
            'labels' => array(
                'name' => __( 'Opening Times' ),
                'singular_name' => __( 'Opening Time' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'openingtimes'),
            'show_in_rest' => false,
            'menu_icon'             => 'dashicons-clock',
            'supports' => array('title', 'editor', 'page-attributes'),
            'hierarchical' => false
        )
    );
}

add_action( 'init', 'create_posttype' );

/* EXPIRE EVENTS */

if ($expireTransient = get_transient($post->ID) === false) {
    set_transient($post->ID, 'set for 1 minutes', 1 * MINUTE_IN_SECONDS );
    $today = date('Y-m-d H:i:s', current_time('timestamp', 0));
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 200,
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => 'end_date_time',
                'value' => $today,
                'compare' => '<='
            )
        )
    );
    $posts = get_posts($args);
    foreach( $posts as $post ) {
        if(get_field('end_date_time', $post->ID)) {
            $postdata = array(
                'ID' => $post->ID,
                'post_status' => 'trash'
            );
            wp_update_post($postdata);
        }
    }
}

/* add_action( 'init', 'auto_delete_events' ); *//*HIJ LOOPT HIER OP VAST, MAAR JOOST MAG WETEN WAAROM */

/* WISHING CONTACT FORM 7 WASN’T SUCH A TOTAL BITCH 

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});*/

/* LOAD JAVASCRIPT LIBARIES */

    function acu_scripts() {
        wp_enqueue_script('jquery');
    }
    add_action( 'wp_enqueue_scripts', 'acu_scripts' );

    function enqueue_isotope_callback() {
        wp_register_script( 'isotope-min', get_template_directory_uri().'/js/isotope.pkgd.min.js', array('jquery'),  true );
        wp_register_script( 'isotope', get_template_directory_uri().'/js/isotope.pkgd.js', array('jquery', 'isotope-min'),  true );
        wp_enqueue_script('isotope');
    }
 
    add_action( 'wp_enqueue_scripts', 'enqueue_isotope_callback' );


/* Validate event dates */
add_action('acf/validate_save_post', 'my_acf_validate_save_post', 80);
function my_acf_validate_save_post($post_id) {
	// Check if it is post with dates, didn't find a good way to get post_type there
	if ($_POST['acf']['field_5f502d6ac5d15'] != "" && $_POST['acf']['field_5f502e40c5d1a'] != "") {
		$start_date = $_POST['acf']['field_5f502d6ac5d15'];
		$start_time = $_POST['acf']['field_5f502e07c5d18'];
		$end_datetime = $_POST['acf']['field_5f502e40c5d1a'];
		$start_datetime = strtotime($start_date."T".$start_time);
		$end_datetime = strtotime($end_datetime);
		if ($start_datetime > $end_datetime){
			acf_add_validation_error( 'acf[field_5f502e40c5d1a]', 'End time should be after start time') ;
		}
	}
}
?>