<?php get_header(); ?>

<!-- PAGE HEADER & h1 -->
<div class="section-header">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center"><?php the_title(); ?></h1>

            </div>
        </div>
    </div>

</div>

<!-- IMAGE -->

<div class="section section-white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
	             <!-- GET ACF IMAGE -->
				 <?php $attachment_id = get_field('featured_image'); ?>
				 <img src="<?php echo $attachment_id['sizes']['large']; ?>" class="img-responsive" />
            </div>
        </div>
    </div>
</div>

<!-- CONTENT -->

<div class="section section-white-gradient">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3>Project Summary</h3>

                <?php the_field('content'); ?>

            </div>

        </div>
    </div>
</div>

<!-- PEOPLE -->

<div class="section section-white-gradient-reverse staff">
    <div class="container">
        <div class="row">

            <h2 class="section-title">People</h2>

            <!-- SINGLE PROFILE -->

			<?php

			$post_objects = get_field('people');
			if( $post_objects ): ?>

		    <?php foreach( $post_objects as $post):  ?>
		    <?php setup_postdata($post); ?>

				<div class="col-md-3">
	                <div class="card card-people">
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
	                            <a href="mailto:<?php the_field('staff_email'); ?>"></a><?php the_field('staff_email'); ?></a> <br>
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

		    <?php endforeach; ?>

		    <?php wp_reset_postdata(); ?>
			<?php endif;  ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>