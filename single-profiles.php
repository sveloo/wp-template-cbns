<?php get_header(); ?>

<!-- SET UP FOR PUBLICATIONS POST OBJECT -->

<?php

	$profile_id = get_the_ID();

?>

<!-- PAGE HEADER -->
<div class="section-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="section-title text-center"><?php the_field('staff_name'); ?><br>
                <small><?php the_field('staff_position'); ?></small><br><small><?php the_field('staff_organisation'); ?></small></h1>
            </div>
        </div>
    </div>
</div>

<!-- PROFILE -->

<div class="section profile">
    <div class="container">

        <div class="row">

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


            <div class="col-md-9">

                <h3>Biography</h3>
				<?php the_field('content'); ?>

            </div>
        </div>
    </div>
</div>

<!-- PUBLICATIONS -->

<div class="section publications">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3>Featured Publications</h3>
                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Publication</th>
                                <th class="hidden-xs hidden-sm hidden-md hidden-lg">Research Theme</th>
                                <th class="hidden-xs hidden-sm hidden-md hidden-lg">Signature Project</th>
                                <th>Year</th>
                                <th>Authors</th>
                            </tr>
                        </thead>
                        <tbody>

	                        <!-- GETS ALL PUBLICATIONS ASSOCIATED WITH PROFILE -->
	                        <?php  $staff_publications = get_field('publications');  ?>


							<?php
		                     	global $post;
								$args = array(
									'posts_per_page' => -1,
									'post_type' => array( 'publications'),
									'orderby' => 'menu_order',
									'order' => 'DESC',
								);
								$myposts = get_posts( $args );
								foreach ($myposts as $post) : start_wp();
							?>

							<!-- GETS ID OF PUBLICATION -->

				            <?php

					            $the_id = $post->ID;

								if (in_array($the_id, $staff_publications)) { ?>

									<tr>

		                                <td><a href="<?php the_field('link'); ?>" target="_blank"><?php the_title();?></a></td>

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

                                        <td><?php the_field('authors'); ?></td>

		                            </tr>


								<?php

								} else {

									// DO NOTHING

	                     		}

		                        endforeach;
								rewind_posts(); ?>

                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>

<!-- COLLABORATIONS -->

<div class="section section-white-gradient collaborations">
    <div class="container">

        <h3>Collaborations</h3>

        <div class="row logos text-center">

	        <!-- GETS ALL PUBLICATIONS ASSOCIATED WITH PROFILE -->
	        <?php

		        the_post();
		        $staff_collaborations = get_field('collaborations');
		    ?>

			<?php
	         	global $post;
				$args = array(
					'posts_per_page' => -1,
					'post_type' => array('collaborations'),
					'orderby' => 'date',
					'order' => 'ASC',
				);
				$myposts = get_posts( $args );
				foreach ($myposts as $post) : start_wp();
			?>

			<!-- GETS ID OF PUBLICATION -->

	        <?php

	            $the_id = $post->ID;

				if (in_array($the_id, $staff_collaborations)) { ?>

					<div class="col-md-3">

						<!-- GET ACF IMAGE -->
						<?php $attachment_id = get_field('featured_image'); ?>
						<img class="logo" src="<?php echo $attachment_id['sizes']['medium']; ?>" />
					</div>

				<?php

				} else {

					// DO NOTHING



	     		}

	            endforeach;
				rewind_posts(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>