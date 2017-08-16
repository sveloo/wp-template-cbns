<?php // Template Name: Signature Projects ?>

<?php get_header(); ?>

	<!-- PAGE HEADER & h1 -->
	<div class="section-header text-center">
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12">
	                <h1><?php the_title(); ?><br>
	                <small>Signature Project</small></h1>

	            </div>
	        </div>
	    </div>
	</div>

	<!-- PAGE CONTENT -->
	<div class="section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php $image = get_field('featured_image'); ?>
                    <img src="<?php echo $image['sizes']['large']; ?>" class="img-responsive" />
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
    				<?php the_field('content'); ?>
                </div>
            </div>
        </div>
	</div>

	<!-- PROJECTS -->
	<div class="section section-white-gradient-reverse projects">
        <div class="container">
            <div class="row">
                <h2 class="section-title text-center">Projects</h2>

                <!-- GET THE CATEGORY OF THE PROJECT PAGE -->
                <?php

    				$terms = get_field('category');

    				foreach( $terms as $term ):

    					 $sig_project_cat = $term->slug;

    				 endforeach;

    			 ?>

                <?php
    				global $post;
    				$args = array(
    					'posts_per_page' => -1,
    					'post_type' => array( 'projects'),
    					'orderby' => 'date',
    					'order' => 'DESC',

    					'tax_query' => array(
    					array(
    						'taxonomy' => 'projects_cat',
    						'field'    => 'slug',
    						'terms'    => array( $sig_project_cat )
    					),
    				),



    				);
    				$myposts = get_posts( $args );

    				foreach ($myposts as $post) : start_wp();
    			?>



    			<!-- SINGLE PROJECT -->
                <div class="col-xs-12 col-md-4">
                    <div class="card card-project">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="image">
                                     <!-- GET ACF IMAGE -->
    								 <?php $attachment_id = get_field('featured_image'); ?>
    								 <img src="<?php echo $attachment_id['sizes']['large']; ?>" class="img-responsive" />
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="content">
                                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    			<?php endforeach;
    			rewind_posts(); ?>

            </div>

        </div>
	</div>



<?php get_footer(); ?>