<?php get_header(); ?>

<!-- PAGE HEADER & h1 -->
<div class="section-header text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1><?php the_title(); ?><br>
	                <small>
	                <?php

						$terms = get_field('event_category');

						if( $terms ):
							foreach( $terms as $term ):

								echo $term->name; echo ' ';

							endforeach;

						endif;

					?>
					<br />

					<!-- GET ACF DATES -->
	                <?php
		                $the_date = get_field('event_start_date', false, false);
	                    $the_date = new DateTime($the_date);

						echo $the_date->format('j').' '. $the_date->format('F').' '.  $the_date->format('g:i a');
					?>

					</small>
				</h1>

				<!-- ADD THIS CSS TO MAIN CSS -->
				<h5><?php the_field('venue'); ?></h5>

            </div>
        </div>
    </div>

</div>

<!-- CONTENT -->

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php the_field('content'); ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>