<?php // Template Name: Publications?>

<?php get_header(); ?>

<style>

	#more_options_wrapper{
		margin-top: 20px;
		text-align: center;
	}

	#results td.thinking{
		padding-top: 20px;
		padding-bottom: 20px;
		text-align: center;
	}

</style>

	<!-- PAGE HEADER -->
	<div class="section-header text-center">
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12">
	                <h1>Publications Database</h1>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- PUBLICATIONS -->
	<div class="section publications">
	    <div class="container">
	        <div class="row">

	             <div class="col-xs-12">
	                <div class="input-group">
	                    <input id="input_text" type="text" placeholder="Search by title or author and filters ..." class="form-control" />
						<button id="the_search" type="submit" class="btn btn-round btn-blue hidden-xs hidden-sm" value="Search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
	                </div>

	                <!-- FILTERS -->
	                <div id="more_options_wrapper">

						<!-- RESEARCH THEME -->
 						<div class="col-xs-12 col-md-5">
							<select id="the_theme" class="selectpicker show-tick form-control publications-filter">

								<option value="all">Select Research Theme</option>
								<option value="all">All Research Themes</option>

								<?php

									$terms = get_terms('research_theme');
									 if ( !empty( $terms ) && !is_wp_error( $terms ) ){

									     foreach ( $terms as $term ) {

										    ?>

											 <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>

										   <?php
									     }

									 }
				    			?>

							</select>
						</div>


						<!-- SIGNATURE PROJECT -->
						<div class="col-xs-10 col-offset-1">
							<select id="the_project" class="selectpicker show-tick form-control publications-filter">

								<option value="all">Select Signature Project</option>
								<option value="all">All Signature Projects</option>

								<?php

									$terms = get_terms('projects_cat');
									 if ( !empty( $terms ) && !is_wp_error( $terms ) ){

									     foreach ( $terms as $term ) {

										    ?>

											 <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>

										   <?php
									     }

									 }
				    			?>

							</select>

						</div>

						<!-- RESET BUTTON -->
		                <div class="col-md-2">
		               		<a id="reset" class="btn btn-blue btn-reset">Reset</a>
		               	</div>


	                </div>
	             </div>
	        </div>
	     </div>
 	</div>


	<!-- PUBLICATIONS -->

	<div class="section section-white-gradient-reverse publications">
	    <div class="container">
	        <div class="row">

	            <div class="col-md-12">
	                <div class="table-responsive">
	                    <table class="table table-striped">
	                        <thead>
	                            <tr>
	                                <th>Publication</th>
	                                <th class="hidden-xs hidden-sm hidden-md hidden-lg">Research Theme</th>
	                                <th class="hidden-xs hidden-sm hidden-md hidden-lg">Signature Project</th>
	                                <th>Year</th>
	                                <th class="hidden-xs">Authors</th>
	                            </tr>
	                        </thead>

	                        <tbody id="results">

	                           <!-- AJAX! -->

	                           <!-- INITIAL STATE -->
	                           <?php

		                           	global $post;

									$args = array(
										'posts_per_page' => 25,
										'post_type' => array( 'publications'),
										'meta_key' => 'publication_year',
										'orderby' => 'meta_value',
										'order' => 'DESC',
									);

									$myposts = get_posts( $args );

									foreach ($myposts as $post) : start_wp();

								?>

								<tr>

									<td><a href="<?php the_field('link'); ?>" target="_blank"><?php the_title(); ?> </a></td>

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

						             <td class="hidden-xs">

						                <?php

											the_field('authors');
										?>

						   			</td>

						        </tr>

							<?php

								endforeach;

								rewind_posts();

							?>

	                        </tbody>
	                    </table>
	                 </div>
	            </div>
	        </div>
	    </div>
	</div>


<script>

	$(document).ready(function(){

		// RESET
		$('#reset').click(function(){
			$('#input_text').val('');
			$('#the_theme').val('all');
			$('#the_project').val('all');

		});

		// PUBLICATION FILTERS (all done by AJAX)

		function publicationFilters(){
			var the_theme_filter = $('#the_theme option:selected').val();
			var the_signature_filter = $('#the_project option:selected').val();
			var the_input_text = $('#input_text').val();
			var ready_to = '"'+the_input_text+'"';

			$('#results').html('');
			$('#results').html('<tr><td colspan="5" class="thinking"><img src="/wp-content/themes/cbns/images/ajax-spinner.gif" /></td></tr>');

			// AJAX CALL
			var data = {
				action: 'publications_filter',
				send_the_input_text : the_input_text,
				send_the_theme_filter : the_theme_filter,
				send_the_signature_filter : the_signature_filter,
			};

			jQuery.post(ajaxurl, data, function(response) {
				$('#results').html('');
				$('#results').html(response);

				if(!$.trim(response)){
					$('#results').html('<tr><td colspan="5" class="thinking">No Results to show, please try again.</td></tr>');
				}

			});

		}

		$('#the_search').click(function(){
			publicationFilters();
		});

		$(document).keypress(function(event){

		var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				publicationFilters();
			}

		});

	});



</script>

<?php get_footer(); ?>