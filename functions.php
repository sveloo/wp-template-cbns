<?php

    // ENQUEUE STYLES
    function cbns_theme_styles() {

        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
        wp_enqueue_style( 'slick', get_template_directory_uri() . '/slick/slick.css');
        wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab');
        wp_enqueue_style( 'cbns', get_template_directory_uri() . '/css/cbns.css');
        wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
    }
    add_action('wp_enqueue_scripts', 'cbns_theme_styles');


    // REPLACE DEFAULT JQUERY WITH GOOGLE AJAX JQUERY
    function cbns_jquery() {
       wp_deregister_script('jquery');
       wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', '', false);
       wp_enqueue_script('jquery');
    }
    add_action('wp_enqueue_scripts', 'cbns_jquery');


    // ENQUEUE SCRIPTS
    function cbns_theme_scripts() {
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );
        wp_enqueue_script('slick', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), '', true );
        wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/09420409d1.js', array('jquery'), '', true );
        wp_enqueue_script('cbns', get_template_directory_uri() . '/js/cbns.js', array('slick'), '', true );
    }
    add_action('wp_enqueue_scripts', 'cbns_theme_scripts');


    // FEATURED IMAGES
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'news', 400, 400, array( 'center' ));


	// FROM EMAIL
	function res_fromemail($email) {
	    $wpfrom = get_option('admin_email');
	    return $wpfrom;
	}
	function res_fromname($email){
	    $wpfrom = get_option('blogname');
	    return $wpfrom;
	}
	add_filter('wp_mail_from', 'res_fromemail');
	add_filter('wp_mail_from_name', 'res_fromname');

    // REGISTER MENUS
	function register_the_menu() {
		register_nav_menu('primary-nav',__( 'Primary Nav' ));
	}
	add_action( 'init', 'register_the_menu' );

    // CUSTOM POST TYPES

	// SLIDES

	add_action( 'init', 'my_custom_post_slides' );
	function my_custom_post_slides() {
		$labels = array(
			'name'               => _x( 'Slide', 'post type general name' ),
			'singular_name'      => _x( 'Slide', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'Slide' ),
			'add_new_item'       => __( 'Add New Slide' ),
			'edit_item'          => __( 'Edit Slide' ),
			'new_item'           => __( 'New Slide' ),
			'all_items'          => __( 'All Slides' ),
			'view_item'          => __( 'View Slide' ),
			'search_items'       => __( 'Search Slides' ),
			'not_found'          => __( 'No Slides found' ),
			'not_found_in_trash' => __( 'No Slides found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Slides'
		);
		$args = array(
			'labels'        => $labels,
			'public'        => true,
			'hierarchical'	=> true,
			'show_in_nav_menus' => false,
			'supports'      => array( 'title', 'author'),
			'has_archive'   => true
		);
		register_post_type( 'slides', $args );
	}
	add_action( 'init', 'my_custom_post_slides' );

	// EVENTS

	add_action( 'init', 'my_custom_post_events' );
	function my_custom_post_events() {
		$labels = array(
			'name'               => _x( 'Events', 'post type general name' ),
			'singular_name'      => _x( 'Event', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'Event' ),
			'add_new_item'       => __( 'Add New Event' ),
			'edit_item'          => __( 'Edit Event' ),
			'new_item'           => __( 'New Event' ),
			'all_items'          => __( 'All Events' ),
			'view_item'          => __( 'View Event' ),
			'search_items'       => __( 'Search Events' ),
			'not_found'          => __( 'No Events found' ),
			'not_found_in_trash' => __( 'No Events found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Events'
		);
		$args = array(
			'labels'        => $labels,
			'public'        => true,
			'hierarchical'	=> true,
			'show_in_nav_menus' => false,
			'supports'      => array( 'title', 'author'),
			'has_archive'   => true
		);
		register_post_type( 'events', $args );
	}
	add_action( 'init', 'my_custom_post_events' );

	// PUBLICATIONS

	add_action( 'init', 'my_custom_post_publications' );
	function my_custom_post_publications() {
		$labels = array(
			'name'               => _x( 'Publications', 'post type general name' ),
			'singular_name'      => _x( 'Publication', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'Publication' ),
			'add_new_item'       => __( 'Add New Publication' ),
			'edit_item'          => __( 'Edit Publication' ),
			'new_item'           => __( 'New Publication' ),
			'all_items'          => __( 'All Publications' ),
			'view_item'          => __( 'View Publication' ),
			'search_items'       => __( 'Search Publications' ),
			'not_found'          => __( 'No Publications found' ),
			'not_found_in_trash' => __( 'No Publications found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Publications'
		);
		$args = array(
			'labels'        => $labels,
			'public'        => true,
			'hierarchical'	=> true,
			'show_in_nav_menus' => false,
			'supports'      => array( 'title', 'author'),
			'has_archive'   => true
		);
		register_post_type( 'publications', $args );
	}
	add_action( 'init', 'my_custom_post_publications' );

	// PROJECTS

	add_action( 'init', 'my_custom_post_projects' );
	function my_custom_post_projects() {
		$labels = array(
			'name'               => _x( 'Projects', 'post type general name' ),
			'singular_name'      => _x( 'Project', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'Project' ),
			'add_new_item'       => __( 'Add New Project' ),
			'edit_item'          => __( 'Edit Project' ),
			'new_item'           => __( 'New Project' ),
			'all_items'          => __( 'All Projects' ),
			'view_item'          => __( 'View Project' ),
			'search_items'       => __( 'Search Projects' ),
			'not_found'          => __( 'No Projects found' ),
			'not_found_in_trash' => __( 'No Projects found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Projects'
		);
		$args = array(
			'labels'        => $labels,
			'public'        => true,
			'hierarchical'	=> true,
			'show_in_nav_menus' => false,
			'supports'      => array( 'title', 'author'),
			'has_archive'   => true
		);
		register_post_type( 'projects', $args );
	}
	add_action( 'init', 'my_custom_post_projects' );

	// STAFF PROFILES

	add_action( 'init', 'my_custom_post_profiles' );
	function my_custom_post_profiles() {
		$labels = array(
			'name'               => _x( 'Profiles', 'post type general name' ),
			'singular_name'      => _x( 'Profile', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'Profile' ),
			'add_new_item'       => __( 'Add New Profile' ),
			'edit_item'          => __( 'Edit Profile' ),
			'new_item'           => __( 'New Profile' ),
			'all_items'          => __( 'All Profiles' ),
			'view_item'          => __( 'View Profile' ),
			'search_items'       => __( 'Search Profiles' ),
			'not_found'          => __( 'No Profiles found' ),
			'not_found_in_trash' => __( 'No Profiles found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Staff Profiles'
		);
		$args = array(
			'labels'        => $labels,
			'public'        => true,
			'hierarchical'	=> true,
			'show_in_nav_menus' => false,
			'supports'      => array( 'title', 'author'),
			'has_archive'   => true
		);
		register_post_type( 'profiles', $args );
	}
	add_action( 'init', 'my_custom_post_profiles' );

	// COLLABORATIONS

	add_action( 'init', 'my_custom_post_collaborations' );
	function my_custom_post_collaborations() {
		$labels = array(
			'name'               => _x( 'Collaborations', 'post type general name' ),
			'singular_name'      => _x( 'Collaboration', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'Collaboration' ),
			'add_new_item'       => __( 'Add New Collaboration' ),
			'edit_item'          => __( 'Edit Collaboration' ),
			'new_item'           => __( 'New Collaboration' ),
			'all_items'          => __( 'All Collaborations' ),
			'view_item'          => __( 'View Collaboration' ),
			'search_items'       => __( 'Search Collaborations' ),
			'not_found'          => __( 'No Collaborations found' ),
			'not_found_in_trash' => __( 'No Collaborations found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Collaborations'
		);
		$args = array(
			'labels'        => $labels,
			'public'        => true,
			'hierarchical'	=> true,
			'show_in_nav_menus' => false,
			'supports'      => array( 'title', 'author'),
			'has_archive'   => true
		);
		register_post_type( 'collaborations', $args );
	}
	add_action( 'init', 'my_custom_post_collaborations' );

	// CUSTOM TAXONOMY

	// CUSTOM TAXONOMY FOR EVENTS

	function add_custom_taxonomies_events_cat() {
		register_taxonomy('events_cat', array( 'events'), array(
			'hierarchical' => true,
			'labels' => array(
			  'name' => _x( 'Events Category', 'taxonomy general name' ),
			  'singular_name' => _x( 'Events Category', 'taxonomy singular name' ),
			  'search_items' =>  __( 'Search Events Categories' ),
			  'all_items' => __( 'All Events Categories' ),
			  'parent_item' => __( 'Parent Location' ),
			  'parent_item_colon' => __( 'Parent Location:' ),
			  'edit_item' => __( 'Edit Events Category' ),
			  'update_item' => __( 'Update Events Category' ),
			  'add_new_item' => __( 'Add New Category' ),
			  'new_item_name' => __( 'New Category Name' ),
			  'menu_name' => __( 'Events Category' ),
		),
			// Control the slugs used for this taxonomy
			'rewrite' => array(
			'slug' => 'events_cat',
			'with_front' => false,
			'show_in_nav_menus' => false,
			'show_ui' => false,
			'hierarchical' => true
		),
		));
	}
	add_action( 'init', 'add_custom_taxonomies_events_cat', 0 );

	// CUSTOM TAXONOMY FOR PROJECTS

	function add_custom_taxonomies_projects_cat() {
		register_taxonomy('projects_cat', array( 'projects', 'publications'), array(
			'hierarchical' => true,
			'labels' => array(
			  'name' => _x( 'Projects Category', 'taxonomy general name' ),
			  'singular_name' => _x( 'Projects Category', 'taxonomy singular name' ),
			  'search_items' =>  __( 'Search Projects Categories' ),
			  'all_items' => __( 'All Projects Categories' ),
			  'parent_item' => __( 'Parent Location' ),
			  'parent_item_colon' => __( 'Parent Location:' ),
			  'edit_item' => __( 'Edit Projects Category' ),
			  'update_item' => __( 'Update Projects Category' ),
			  'add_new_item' => __( 'Add New Category' ),
			  'new_item_name' => __( 'New Category Name' ),
			  'menu_name' => __( 'Projects Category' ),
		),
			// Control the slugs used for this taxonomy
			'rewrite' => array(
			'slug' => 'projects_cat',
			'with_front' => false,
			'show_in_nav_menus' => false,
			'show_ui' => false,
			'hierarchical' => true
		),
		));
	}
	add_action( 'init', 'add_custom_taxonomies_projects_cat', 0 );

	// CUSTOM TAXONOMY FOR PUBLICATIONS

	function add_custom_taxonomies_research_theme() {
		register_taxonomy('research_theme', array('publications'), array(
			'hierarchical' => true,
			'labels' => array(
			  'name' => _x( 'Research Theme', 'taxonomy general name' ),
			  'singular_name' => _x( 'Research Theme', 'taxonomy singular name' ),
			  'search_items' =>  __( 'Search Themes' ),
			  'all_items' => __( 'All Research Themes' ),
			  'parent_item' => __( 'Parent Location' ),
			  'parent_item_colon' => __( 'Parent Location:' ),
			  'edit_item' => __( 'Edit Research Theme' ),
			  'update_item' => __( 'Update Research Theme' ),
			  'add_new_item' => __( 'Add New Theme' ),
			  'new_item_name' => __( 'New Theme Name' ),
			  'menu_name' => __( 'Research Theme' ),
		),
			// Control the slugs used for this taxonomy
			'rewrite' => array(
			'slug' => 'research_theme',
			'with_front' => false,
			'show_in_nav_menus' => false,
			'show_ui' => false,
			'hierarchical' => true
		),
		));
	}
	add_action( 'init', 'add_custom_taxonomies_research_theme', 0 );

	// CUSTOM TAXONOMY FOR STAFF

	function add_custom_taxonomies_staff_cat() {
		register_taxonomy('staff_cat', array( 'profiles'), array(
			'hierarchical' => true,
			'labels' => array(
			  'name' => _x( 'Staff Category', 'taxonomy general name' ),
			  'singular_name' => _x( 'Staff Category', 'taxonomy singular name' ),
			  'search_items' =>  __( 'Search Staff Categories' ),
			  'all_items' => __( 'All Staff Categories' ),
			  'parent_item' => __( 'Parent Location' ),
			  'parent_item_colon' => __( 'Parent Location:' ),
			  'edit_item' => __( 'Edit Staff Category' ),
			  'update_item' => __( 'Update Staff Category' ),
			  'add_new_item' => __( 'Add New Category' ),
			  'new_item_name' => __( 'New Category Name' ),
			  'menu_name' => __( 'Staff Category' ),
		),
			// Control the slugs used for this taxonomy
			'rewrite' => array(
			'slug' => 'staff_cat',
			'with_front' => false,
			'show_in_nav_menus' => false,
			'show_ui' => false,
			'hierarchical' => true,
			'meta_box_cb' => false,
		),
		));
	}
	add_action( 'init', 'add_custom_taxonomies_staff_cat', 0 );

	// ADD AJAX TO WORDPRESS HEADER

	add_action( 'wp_head', 'my_ajaxurl' );
	function my_ajaxurl() {
		$html = '<script type="text/javascript">';
		$html .= 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '"';
		$html .= '</script>';
		echo $html;
	}

	// PEOPLE FILTER

	add_action( 'wp_ajax_people_filter', 'people_filter' );
	add_action( 'wp_ajax_nopriv_people_filter', 'people_filter' );

	function people_filter() {

		// GET VARS
		$the_people_filter = $_POST['send_the_people_filter'];
		$the_organisation_filter = $_POST['send_the_organisation_filter'];

		// LOOP ALL PEOPLE IN THAT CATEGORY (filter)
		global $post;

		// HANDLES THE WILD CARD(s)

		if($the_people_filter =='all' && $the_organisation_filter =='all'){

			$args = array(
				'posts_per_page' => -1,
				'post_type' => array( 'profiles'),
				'orderby' => 'menu_order',
				'order' => 'ASC',

			);
		}

		if($the_organisation_filter=='all' && $the_people_filter !='all'){

			$args = array(
				'posts_per_page' => -1,
				'post_type' => array( 'profiles'),
				'orderby' => 'menu_order',
				'order' => 'ASC',

				'tax_query' => array(
					array(
						'taxonomy' => 'staff_cat',
						'field'    => 'slug',
						'terms'    => array( $the_people_filter )
					),
				),
			);
		}

		if($the_organisation_filter!='all' && $the_people_filter=='all'){

			$args = array(
				'posts_per_page' => -1,
				'post_type' => array( 'profiles'),
				'orderby' => 'menu_order',
				'order' => 'ASC',

				'meta_key'		=> 'staff_organisation',
				'meta_value'	=> $the_organisation_filter,
			);
		}

		if($the_organisation_filter!='all' && $the_people_filter !='all'){

			$args = array(
				'posts_per_page' => -1,
				'post_type' => array( 'profiles'),
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'meta_key'		=> 'staff_organisation',
				'meta_value'	=> $the_organisation_filter,


				'tax_query' => array(
					array(
						'taxonomy' => 'staff_cat',
						'field'    => 'slug',
						'terms'    => array( $the_people_filter )
					),
				),
			);
		}

		$myposts = get_posts( $args );

		foreach ($myposts as $post) : start_wp(); ?>

			<div class="col-md-3">
                <div class="card card-people" rel="<?php the_field('staff_position'); ?>">
                    <div class="image"></div>
                    <div class="content text-center">
                        <div class="staff">
	                        <!-- GET ACF IMAGE -->
							<?php $attachment_id = get_field('staff_photo'); ?>

                            <img class="avatar" src="<?php echo $attachment_id['sizes']['medium']; ?>" alt="...">
                            <a href="<?php the_permalink(); ?>">
                                <h4 class="title"><?php the_field('staff_name'); ?><br><small><?php the_field('staff_position'); ?></small><br><br><small><?php the_field('staff_organisation'); ?></small></h4>
                            </a>
                        </div>
                        <p class="description">
                            <a href="mailto:<?php the_field('staff_email'); ?>"><?php the_field('staff_email'); ?></a> <br>
                            <a href="tel:<?php the_field('contact_number'); ?>"><?php the_field('contact_number'); ?></a>
                        </p>
                    </div>
                    <hr>
                    <div class="links text-center">

	                    <!-- LINKED IN -->
	                    <?php
		                    $need_li = get_field('need_linkedin_link');
		                    if ($need_li=='yes'){
			                    ?><a href="https://<?php the_field('linkedin_page'); ?>" target="_blank" class="btn btn-social"><i class="fa fa-linkedin"></i></a><?php
		                    }

		                    $need_twitter = get_field('need_linkedin_link');
		                    if ($need_twitter=='yes'){
			                    ?><a href="https://<?php the_field('twitter_page'); ?>" target="_blank" class="btn btn-social"><i class="fa fa-twitter"></i></a><?php
		                    }

		                ?>

                        <a href="<?php the_field('website'); ?>" target="_blank" class="btn btn-social"><i class="fa fa-university"></i></a>
                    </div>
                </div>
			</div>

		<?php

		endforeach;

		rewind_posts();

		wp_die();

	}

	// PUBLICATIONS FILTER

	add_action( 'wp_ajax_publications_filter', 'publications_filter' );
	add_action( 'wp_ajax_nopriv_publications_filter', 'publications_filter' );

	function publications_filter() {

		// GET VARS

		$the_theme_filter = $_POST['send_the_theme_filter'];
		$the_signature_filter = $_POST['send_the_signature_filter'];
		$the_input_text = $_POST['send_the_input_text'];

		// HANDLES FOR NO INPUT TEXT (cant evaluate nothing so lets use a space - or an 'a')
		if($the_input_text==''){
			$the_input_text = ' ';
		}

		// LOOP ALL PEOPLE IN THAT CATEGORY (filter)
		global $post;

		// HANDLES THE WILD CARD

		if( $the_theme_filter=='all' && $the_signature_filter=='all'){

			$args = array(
				'posts_per_page' => -1,
				'post_type' => array( 'publications'),
				'orderby' => 'date',
				'order' => 'DESC',
			);

		} else {

			$args = array(
				'posts_per_page' => -1,
				'post_type' => array( 'publications'),
				'orderby' => 'date',
				'order' => 'DESC',

				'tax_query' => array(

					'relation' => 'OR',
					array(
							'taxonomy' => 'research_theme',
							'field'    => 'slug',
							'terms'    => array( $the_theme_filter )

					),
					array(
							'taxonomy' => 'projects_cat',
							'field'    => 'slug',
							'terms'    => array( '' )

					),

				),
			);
		}

		$myposts = get_posts( $args );

		foreach ($myposts as $post) : start_wp(); ?>

			<?php
				// COMPARE TILE WITH INPUT

				// RESET
				$resulted = '';

				// GET TITLE INTO NICER VAR
				$the_title = get_the_title();
				$the_year = get_field('publication_year');
				$the_authors = get_field('authors');

				// MAKE STRINGS LOWERCASE (easier to evaluate)
				$the_title = strtolower($the_title);
				$the_authors = strtolower($the_authors);
				$the_year = strtolower($the_year);
				$the_input_text = strtolower($the_input_text);

				// MAKE A BIG STRING
				$evaluate_this = $the_title.' '.$the_year.' '.$the_authors;

				// CHECK THEM (if $the_input_text is in $the_title)
				if( strpos( $evaluate_this, $the_input_text ) !== false ) {

					// SUCCESS DOES THE OUTPUT

					?>
						<tr>

							<td><a href="<?php the_field('link'); ?>" target="_blank"><?php the_title(); ?> </a></td>

				            <td class="hidden-xs hidden-sm hidden-md hidden-lg">

				                <!-- GET ACF TAXONOMY -->

								<?php

									$terms = get_field('the_research_theme');

									if( $terms ):
									foreach( $terms as $term ):

										 echo $term->name; echo ' ';

									 endforeach;

								endif; ?>

				            </td>

				            <td class="hidden-xs hidden-sm hidden-md hidden-lg">

				                <!-- GET ACF TAXONOMY -->

								<?php

									$terms = get_field('signature_project_category');

									if( $terms ):
									foreach( $terms as $term ):

										 echo $term->name; echo ' ';

									 endforeach;

								endif; ?>

				            </td>

				            <td><?php the_field('publication_year'); ?></td>

				             <td class="hidden-xs">

				                <?php

									the_field('authors');
								?>

				   			</td>

				        </tr>

					<?php

				}



	    endforeach;

		rewind_posts();

		wp_die();

	}

?>
