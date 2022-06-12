<?php
/**
 * Register taxonomies
 */
function add_new_taxonomies()
{
	$taxonomies = [
		[
			'name'      =>  'Categories',
			'slug'      =>  'resource_cat',
			'post-type' =>  'resource'
		]
	];

	foreach ( $taxonomies as $taxonomy )
	{
        $name      = $taxonomy['name'];
        $slug      = $taxonomy['slug'];
        $post_type = $taxonomy['post-type'];

        $labels = [
	        'name'                       => $name,
	        'singular_name'              => $name,
	        'search_items'               => 'Search '.$name,
	        'popular_items'              => 'Popular '.$name,
	        'all_items'                  => 'All '.$name,
	        'parent_item'                => null,
	        'parent_item_colon'          => null,
	        'edit_item'                  => 'Edit '.$name,
	        'update_item'                => 'Update '.$name,
	        'add_new_item'               => 'Add new '.$name,
	        'new_item_name'              => "New {$name} name",
	        'separate_items_with_commas' => "Separate {$name} with commas",
	        'add_or_remove_items'        => 'Add or remove '.$name,
	        'choose_from_most_used'      => 'Choose from most used '.$name,
	        'menu_name'                  => $name
        ];

        $args = [
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_in_nav_menus'     => true,
            'show_ui'               => true,
            'show_in_rest'          => true,
            'show_tagcloud'         => true,
            'show_in_quick_edit'    => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array(
                'slug'              => $slug,
                'hierarchical'      => true
            )
        ];

        register_taxonomy( $slug, $post_type, $args );
    }
}
//add_action( 'init', 'add_new_taxonomies', 0 );


/**
 * Register post types.
 *
 * To create new post type add in the array
 */
function add_new_post_types()
{
	$post_types = [
		[
			'name'          => 'Request',
			'menu_name'     => 'Requests',
			'slug'          => 'request',
			'icon'          => 'dashicons-megaphone',
			'hierarchical'  => true,
			'position'      => 21
		],
        [
            'name'          => 'Result',
            'menu_name'     => 'Results',
            'slug'          => 'result',
            'icon'          => 'dashicons-clipboard',
            'hierarchical'  => true,
            'position'      => 22
        ],
        [
            'name'          => 'Team',
            'menu_name'     => 'Team',
            'slug'          => 'team',
            'icon'          => 'dashicons-businessman',
            'hierarchical'  => true,
            'position'      => 23
        ],
        [
            'name'          => 'FAQ',
            'menu_name'     => 'FAQs',
            'slug'          => 'faq',
            'icon'          => 'dashicons-format-chat',
            'hierarchical'  => true,
            'position'      => 24
        ],
        [
            'name'          => 'Partner',
            'menu_name'     => 'Partners',
            'slug'          => 'partner',
            'icon'          => 'dashicons-groups',
            'hierarchical'  => true,
            'position'      => 25
        ]
	];

    foreach( $post_types as $post )
    {
	    $name = $post['name'];
    	
	    $labels = [
		    'name'               => $name,
		    'singular_name'      => $name,
		    'add_new'            => "Add ".$name,
		    'add_new_item'       => 'Add new '.$name,
		    'edit_item'          => 'Edit '.$name,
		    'new_item'           => 'New '.$name,
		    'all_items'          => 'All '.$name,
		    'view_item'          => 'View '.$name,
		    'search_items'       => 'Search '.$name,
		    'not_found'          => $name.' are not found.',
		    'not_found_in_trash' => $name.' are not found in trash.',
		    'menu_name'          => $post['menu_name']
	    ];

        $args = [
            'labels'        => $labels,
            'public'        => true,
            'show_ui'       => true,
            'show_in_rest'  => true,
            //'has_archive'   => true,
            'hierarchical'  => true,
            'menu_icon'     => $post['icon'],
            'menu_position' => $post['position'],
            'supports'      => [ "title", "editor", "thumbnail", "custom-fields", "revisions", "author", "page-attributes" ],
        ];

        register_post_type( $post['slug'], $args );
    }
}
add_action( 'init', 'add_new_post_types', 0 );