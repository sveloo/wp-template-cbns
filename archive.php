<!-- WP ARCHIVE PAGE -->

<?php get_header(); ?>

	<!-- PAGE HEADER & h1 -->
	<div class="section section-header section-white-gradient-reverse">

	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12">
	                <h1 class="section-title text-center">Archive</h1>
	                <h3 class="title_under_h1">Currently browsing <?php single_cat_title(' '); ?><?php single_month_title(' '); ?></h3>
	            </div>
	        </div>
	    </div>

	</div>

	<!-- PAGE CONTENT -->
	<div class="section section-white-gradient news-archive">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-md-9">

                <!-- SINGLE POST -->

				<?php
					if ( have_posts() ) :
					while ( have_posts() ) : the_post();
				?>

					<div class="card card-horizontal card-news">
	                    <div class="row">
	                        <div class="col-xs-12 col-md-3">
	                            <div class="image">

	                                 <!-- GET ACF IMAGE -->
									 <?php $attachment_id = get_field('featured_image'); ?>
									 <img src="<?php echo $attachment_id['sizes']['large']; ?>" class="img-responsive" />

	                            </div>
	                        </div>
	                        <div class="col-xs-12 col-md-9">
	                            <div class="content">
	                                <!-- GET ACF TAXONOMY -->
			                      	<p class="category">
			                      	<?php

										$terms = get_field('category');

										if( $terms ):
											foreach( $terms as $term ):

												echo $term->name; echo ' ';

											endforeach;

										endif;

									?>
				                    </p>
	                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	                                <p class="subtitle"><?php echo get_the_date(); ?></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>

				<?php endwhile; ?>
				<?php endif; ?>

            </div>

            <!-- SIDE BAR -->
            <div class="col-xs-12 col-md-3">
                <div class="widget">
                    <h3>Archives</h3>
                    <ul>
						<?php $args = array(
							'type'            => 'monthly',
							'limit'           => '',
							'format'          => 'html',
							'before'          => '<span title="Click here to see all posts within this date">',
							'after'           => '</span>',
							'show_post_count' => false,
							'echo'            => 1,
							'order'           => 'DESC',
							'post_type'     => 'post'
						);

						wp_get_archives( $args ); ?>

					</ul>

				</div>
                <div class="widget">
                    <h3>Categories</h3>
                    <ul>
						<?php

							$news_cat_ID = get_cat_ID( 'Category' );
							$news_cats   = get_categories( "parent=$news_cat_ID" );
							$news_query  = new WP_Query;

							foreach ( $news_cats as $news_cat ) :

						    $news_query->query( array(
						        'cat'                 => $news_cat->term_id,
						        'posts_per_page'      => 1,
						        'no_found_rows'       => true,
						        'ignore_sticky_posts' => true,
						    ));

		    			?>

						<li>
							<a href="/category/<?php echo esc_html( $news_cat->slug ) ?>" title="Click here to see all the posts in <?php echo esc_html( $news_cat->name ) ?> Category"><?php echo esc_html( $news_cat->name ) ?></a>
						</li>

						<?php endforeach ?>

					</ul>

                </div>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>