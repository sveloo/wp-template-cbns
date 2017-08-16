<?php get_header(); ?>

<!-- PAGE HEADER  -->
<div class="section-header">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="section-title text-center"><?php the_title(); ?><br>
	                <small>
	                <?php

						$terms = get_field('category');

						if( $terms ):
							foreach( $terms as $term ):

								echo $term->name; echo ' ';

							endforeach;

						endif;

					?>, <?php echo get_the_date(); ?></small>
				</h1>

            </div>
        </div>
    </div>

</div>

<!-- IMAGE -->

<div class="section">
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


                <?php the_field('content'); ?>

            </div>

        </div>
    </div>
</div>


<?php get_footer(); ?>