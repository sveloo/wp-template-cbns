<?php // Template Name: News Archive ?>

<?php get_header(); ?>

	<!-- PAGE HEADER & h1 -->
	<div class="section-header text-center">
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12">
	                <h1>News Archive</h1>
	            </div>
	        </div>
	    </div>
	</div>


	<!-- PAGE CONTENT -->
	<div class="section section-white-gradient-reverse news-archive">
        <div class="container">
            <div class="row">

                <?php
                    $args = array(
                        'posts_per_page' => -1,
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );
                    $the_query = new WP_Query($args);
                ?>
                <?php $i = 0; ?>
                <?php if (have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                <?php if($i % 3 == 0) { echo '<div class="clearfix"></div>'; } ?>

                <!-- SINGLE NEWS POST -->
                 <div class="col-xs-12 col-md-4">
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

                <?php $i++; endwhile; endif;  ?>

            </div>
        </div>
    </div>

<?php get_footer(); ?>