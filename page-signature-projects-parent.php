<?php // Template Name: Signature Projects Parent ?>

<?php get_header(); ?>

	<!-- PAGE HEADER & h1 -->
	<div class="section-header text-center">
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12">
	                <h1 class="text-center"><?php the_title(); ?></h1>

	            </div>
	        </div>
	    </div>
	</div>

	<!-- PAGE CONTENT -->
	<div class="section">
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12">
					<p>Our current CBNS projects have been grouped into Signature Projects. These draw on cross-centre activities and expertise to solve the big questions in bio-nano research. To view our current projects, select from the Signature Projects listed below.</p>
				</div>
			</div>
			<div class="row">
	            <div class="col-xs-12">

					<?php $args = array(
							'depth'        => 1,
							'echo'         => 0,
							'title_li'     => '',
							'exclude'		=> '606'
						); ?>

						<ul>
							<?php $output = wp_list_pages($args);
								if (is_page( )) {
				  					$page = $post->ID;
				  				if ($post->post_parent) {
				    					$page = $post->post_parent;
				  				}
				  				$children=wp_list_pages( 'echo=0&child_of=' . $page . '&title_li=' );
				  					if ($children) {
				    				$output = wp_list_pages ('depth=1&echo=0&child_of=' . $page . '&title_li=');
				  				}
							}
							echo $output;
							?>
						</ul>

	            </div>
	        </div>
	    </div>
	</div>

<?php get_footer(); ?>