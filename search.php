<?php get_header(); ?>

<!-- PAGE HEADER -->
<div class="section-header ntext-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Search Results</h1>
            </div>
        </div>
    </div>
</div>

<!-- PAGE SECTION -->
<div class="section">
    <div class="container">
        <div class="row">

            <!-- CONTENT -->
            <div class="col-xs-12">

            	<?php $result_count = 1; ?>

				<?php if ( have_posts() ) : ?>

					<h2><?php printf( __( 'Search Results for: %s', 'odsc' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?> </h2>
					<p class="search_count" >(<strong><?=$wp_query->found_posts;?></strong> results found)</p>


					<?php

						while ( have_posts() ) : the_post();

					?>


					<article id="post_ID_<?php the_ID(); ?>" class="search_result">

						<!-- PAGE TITLE -->
					 	<h3><span aria-hidden="true"><?php echo $result_count ?></span> <a href="<?php the_permalink(); ?>" title="click here to read more on <?php the_title(); ?>"><?php the_title(); ?></a></h3>

						<!-- EXCERPT (news / page - it will be one or the other) -->
						<p><?php the_excerpt('content');  ?><?php the_field('short_description');  ?></p>
                        <p><?php

	                        $the_post_type = get_post_type( get_the_ID() );
							if ($the_post_type == 'post'){
								$the_post_type = 'news';
							}
	                        echo 'This result is from : '.$the_post_type;


	                     ?></p>

					 	<!-- READ MORE
						 	<a class="read_more" href="<?php the_permalink(); ?>" title="click here to read more on <?php the_title(); ?>">read more</a>
					 	-->

					</article>

					<?php $result_count = $result_count + 1; ?>

					<?php

						// END THE LOOP
						endwhile;

							// Previous/next page navigation.

							the_posts_pagination( array(
								'prev_text'          => __( 'Previous page', 'odsc' ),
								'next_text'          => __( 'Next page', 'odsc' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'odsc' ) . ' </span>',
							) );

						// IF NO CONTENT INCLUDE NO POSTS FOUND
						else :

					?>

					<h2><?php printf( __( 'Nothing Found for: %s', 'odsc' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>


					<?php if ( is_search() ) : ?>

						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'odsc' ); ?></p>


					<?php endif; ?>




				<?php endif; ?>

            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
