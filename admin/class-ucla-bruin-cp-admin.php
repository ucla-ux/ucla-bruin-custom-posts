<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/scottgruber
 * @since      1.0.0
 *
 * @package    Ucla_Bruin_Cp
 * @subpackage Ucla_Bruin_Cp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ucla_Bruin_Cp
 * @subpackage Ucla_Bruin_Cp/admin
 * @author     Scott Gruber <scott.gruber@ucla.edu>
 */
class Ucla_Bruin_Cp_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ucla_Bruin_Cp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ucla_Bruin_Cp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ucla-bruin-cp-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ucla_Bruin_Cp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ucla_Bruin_Cp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ucla-bruin-cp-admin.js', array( 'jquery' ), $this->version, false );

	}

}

// REGISTER CUSTOM POST TYPES
if ( ! function_exists('create_custom_post_types') ) {

	// Register Custom Post Type for People
	function custom_post_type_people() {
	
		$labels = array(
			'name'                  => _x( 'People', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Person', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'People', 'text_domain' ),
			'name_admin_bar'        => __( 'Person', 'text_domain' ),
			'archives'              => __( 'People Archives', 'text_domain' ),
			'attributes'            => __( 'Item Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All People', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New Person', 'text_domain' ),
			'new_item'              => __( 'New Person', 'text_domain' ),
			'edit_item'             => __( 'Edit Person', 'text_domain' ),
			'update_item'           => __( 'Update Person', 'text_domain' ),
			'view_item'             => __( 'View Person', 'text_domain' ),
			'view_items'            => __( 'View People', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$rewrite = array(
			'slug'                  => 'person',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Person', 'text_domain' ),
			'description'           => __( 'Department Directory', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
			//'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-businesswoman',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'people',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'person', $args );
	
	}
	add_action( 'init', 'custom_post_type_people', 0 );

	// Register Custom Post Type for Projects
	function custom_post_type_project() {
	
		$labels = array(
			'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Projects', 'text_domain' ),
			'name_admin_bar'        => __( 'Project', 'text_domain' ),
			'archives'              => __( 'Project Archives', 'text_domain' ),
			'attributes'            => __( 'Project Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Projects', 'text_domain' ),
			'add_new_item'          => __( 'Add New Project', 'text_domain' ),
			'add_new'               => __( 'Add New Project', 'text_domain' ),
			'new_item'              => __( 'New Project', 'text_domain' ),
			'edit_item'             => __( 'Edit Project', 'text_domain' ),
			'update_item'           => __( 'Update Project', 'text_domain' ),
			'view_item'             => __( 'View Project', 'text_domain' ),
			'view_items'            => __( 'View Projects', 'text_domain' ),
			'search_items'          => __( 'Search Projects', 'text_domain' ),
			'not_found'             => __( 'Project not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Project not found in trash', 'text_domain' ),
			'featured_image'        => __( 'Project Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set Featured Image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$rewrite = array(
			'slug'                  => 'project',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Projects', 'text_domain' ),
			'description'           => __( 'Academic, Research and Service Projects', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
			//'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-art',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'projects',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'project', $args );
	
	}
	add_action( 'init', 'custom_post_type_project', 0 );

	
// Register Custom Post Type for Publications
function custom_post_type_publication() {
	
	$labels = array(
		'name'                  => _x( 'Publications', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Publication', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Publications', 'text_domain' ),
		'name_admin_bar'        => __( 'Publication', 'text_domain' ),
		'archives'              => __( 'Publication Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Publications', 'text_domain' ),
		'add_new_item'          => __( 'Add New Publication', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Publication', 'text_domain' ),
		'edit_item'             => __( 'Edit Publication', 'text_domain' ),
		'update_item'           => __( 'Update Publication', 'text_domain' ),
		'view_item'             => __( 'View Publication', 'text_domain' ),
		'view_items'            => __( 'View Publications', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'publication',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Publication', 'text_domain' ),
		//'description'           => __( 'Department Publications Archive', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'publications',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'publication', $args );

}
add_action( 'init', 'custom_post_type_publication', 0 );

	// Register Custom Post Type for Events
	function custom_post_type_event() {
	
		$labels = array(
			'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Events', 'text_domain' ),
			'name_admin_bar'        => __( 'Event', 'text_domain' ),
			'archives'              => __( 'Event Archives', 'text_domain' ),
			'attributes'            => __( 'Item Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Events', 'text_domain' ),
			'add_new_item'          => __( 'Add New Event', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Event', 'text_domain' ),
			'edit_item'             => __( 'Edit Event', 'text_domain' ),
			'update_item'           => __( 'Update Event', 'text_domain' ),
			'view_item'             => __( 'View Event', 'text_domain' ),
			'view_items'            => __( 'View Events', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$rewrite = array(
			'slug'                  => 'event',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Event', 'text_domain' ),
			//'description'           => __( 'Event Listings', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
			//'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-clock',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'events',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'event', $args );
	
	}
	add_action( 'init', 'custom_post_type_event', 0 );


	// Register Custom Post Type for Resources
	function custom_post_type_resource() {
	
		$labels = array(
			'name'                  => _x( 'Resources', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Resources', 'text_domain' ),
			'name_admin_bar'        => __( 'Resource', 'text_domain' ),
			'archives'              => __( 'Resource Archives', 'text_domain' ),
			'attributes'            => __( 'Item Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Resources', 'text_domain' ),
			'add_new_item'          => __( 'Add New Resource', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Resource', 'text_domain' ),
			'edit_item'             => __( 'Edit Resource', 'text_domain' ),
			'update_item'           => __( 'Update Resource', 'text_domain' ),
			'view_item'             => __( 'View Resource', 'text_domain' ),
			'view_items'            => __( 'View Resources', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$rewrite = array(
			'slug'                  => 'resource',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Resource', 'text_domain' ),
			'description'           => __( 'Resources for Learning and Research', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
			//'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-vault',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'resources',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'resource', $args );
	
	}
	add_action( 'init', 'custom_post_type_resource', 0 );



}