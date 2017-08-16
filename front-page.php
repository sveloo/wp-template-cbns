<?php // Template Name: Home page ?>

<?php get_header(); ?>

<!-- HOMEPAGE CAROUSEL -->
<div class="home-carousel">
    <div class="home-slide">

       <!-- Single slide & caption -->
		<?php
			global $post;
			$args = array(
				'posts_per_page' => 12,
				'post_type' => array( 'slides'),
				'orderby' => 'menu_order',
				'order' => 'ASC',
			);
			$myposts = get_posts( $args );
			foreach ($myposts as $post) : start_wp();
		?>

        <!-- GET ACF LINK -->
		<?php
			$link_is = get_field('internal_or_external_link');

			if($link_is=="internal"){
				?><a href="<?php the_field('internal_link');?>"><?php
			}

			if($link_is=="external"){
				?><a href="<?php the_field('external_link');?>" target="_blank"><?php
			}
		?>

        <!-- GET ACF IMAGE -->
        <?php $attachment_id = get_field('featured_image'); ?>
        <img src="<?php echo $attachment_id['sizes']['large']; ?>" class="img-responsive" />
        <div class="row">
            <div class="col-xs-12 home-slide-text">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>

		</a>

       	<?php endforeach; ?>
		<?php rewind_posts(); ?>

    </div>
</div>

<!-- MISSION STATEMENT -->
<div class="section section-white-gradient-reverse">
    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <h2 class="section-title text-center"><?php the_field('mission_title','options'); ?><br />
                <small><?php the_field('mission_statement','options'); ?></small></h2>
            </div>
        </div>

<!-- STATS -->
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                 <div class="card card-plain card-research">
                    <div class="content text-center">
                        <h3 class="category">People</h3>
                        <h4 class="stats">
	                        <!-- TOTAL PEOPLE -->
	                        <?php
		                        $count_posts = wp_count_posts('profiles');
								$published_posts = $count_posts->publish;
								echo $published_posts;
							?>
                        </h4>
                        <a href="https://www.cbns.org.au/people" class="btn btn-blue">View Profiles</></a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card card-plain card-research">
                    <div class="content text-center">
                        <h3 class="category">Publications</h3>
                        <h4 class="stats">
	                        <!-- TOTAL PUBLICATIONS -->
	                        <?php
		                        $count_posts = wp_count_posts('publications');
								$published_posts = $count_posts->publish;
								echo $published_posts;
							?>
                        </h4>
                        <a href="https://www.cbns.org.au/publications-database/" class="btn btn-blue">Explore</></a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card card-plain card-research">
                    <div class="content text-center">
                        <h3 class="category">Projects</h3>
                        <h4 class="stats">
	                     	<!-- TOTAL PROJECTS -->
	                        <?php
		                        $count_posts = wp_count_posts('projects');
								$published_posts = $count_posts->publish;
								echo $published_posts;
							?>
                        </h4>
                        <a href="https://www.cbns.org.au/signature-projects/" class="btn btn-blue">Discover</></a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card card-plain card-research">
                    <div class="content text-center">
                        <h3 class="category">Collaborations</h3>
                        <h4 class="stats">
	                        <!-- TOTAL COLLABORATIONS -->
	                        <?php
		                        $count_posts = wp_count_posts('collaborations');
								$published_posts = $count_posts->publish;
								echo $published_posts;
							?>+</h4>
                        <a href="https://www.cbns.org.au/collaborations-list/" class="btn btn-blue">Collaborate</></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row text-center">
            <div class="col-xs-12 col-md-12">
                <div class="single-tweet">
                    <h3><i class="fa fa-twitter fa-3x" aria-hidden="true"></i></h3>
                    <?php echo do_shortcode('[fts_twitter twitter_name=ARCCoEBionano tweets_count=1 cover_photo=no stats_bar=no show_retweets=no show_replies=no]'); ?>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- ONE SEARCH -->
<div class="section one-search">
    <div class="container">
        <div class="row">
            <h2 class="section-title text-center">Search our site & publications</h2>
             <div class="col-md-12">
                <div class="input-group">

                    <form method="get" id="mobile_search_form" action="<?php bloginfo('url'); ?>">

						<input type="text" class="form-control"  name="s" id="sw"  placeholder="Type your search terms here ... " class="form-control" />
						<button type="submit" class="btn btn-round btn-blue hidden-xs hidden-sm" value="Search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

					</form>

                </div>
             </div>
        </div>
     </div>
 </div>

<!-- LATEST NEWS -->
<div class="section section-white-gradient latest-news">
    <div class="container">
        <h2 class="section-title text-center">Latest News</h2>
        <div class="row">

        <?php
			global $post;
			$args = array(
				'posts_per_page' => 3,
				'post_type' => array( 'post'),
				'orderby' => 'date',
				'order' => 'DESC',
			);
			$myposts = get_posts( $args );
			foreach ($myposts as $post) : start_wp();
		?>

			<!-- SINGLE NEWS POST -->
             <div class="col-md-4">
                <div class="card card-news">
                    <div class="image">

	                     <!-- GET ACF IMAGE -->
						 <?php $attachment_id = get_field('featured_image'); ?>
						 <img src="<?php echo $attachment_id['sizes']['large']; ?>" class="img-responsive" />

                    </div>
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

       	<?php endforeach; ?>
		<?php rewind_posts(); ?>

        </div>
    </div>
</div>

<?php get_template_part('includes/content', 'events_upcoming'); ?>

<?php get_footer(); ?>