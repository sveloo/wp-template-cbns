<?php // Template Name: People Archive ?>

<?php get_header(); ?>

	<!-- PAGE HEADER & h1 -->
	<div class="section-header text-center">
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12">
	                <h1>People</h1>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- FILTERS -->
	<div class="section people-select">
	    <div class="container">
	        <div class="row">
	        	<div class="col-xs-12">
					<p>To understand the bio-nano interface and develop the next generation of bio-responsive materials we need a team of experts working together. Our Chief and Partner Investigators from across Australia and international organisations lead teams of research staff and students operating on projects across our research areas. Profiles and contact details for CBNS staff and students are below. Please select a staff category and organisation (if required).</p>
					<p>&nbsp;</p>
	        	</div>
	            <div class="col-xs-10 col-xs-offset-1 text-center">

		            <!-- PEOPLE FILTER -->

	                <select id="the_people_selecter" class="selectpicker show-tick form-control">

		                <option value="null">Please Select</option>
		                <option value="all" >All Departments</option>

		                <?php

							$terms = get_terms('staff_cat');
							 if ( !empty( $terms ) && !is_wp_error( $terms ) ){

							     foreach ( $terms as $term ) {

								 	// SETS CHIEFS TO DEFAULT
								 	$the_selected_option = '';
								 	$the_term_slug = $term->slug;

								 	if( $the_term_slug == 'chief-investigators'){
									 	$the_selected_option = 'selected="selected"';
								 	}

								    ?>

									 <option <?php echo $the_selected_option; ?> value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>

								   <?php
							     }

							 }
		    			?>

	                </select>

	                <!-- PEOPLE FILTER -->

	                 <select id="the_organisation_selecter" class="selectpicker show-tick form-control">

		                <option value="null">Please Select</option>
		                <option value="all" selected="selected">All Organisations</option>

		              	  <?php

							// GET ALL ORGANISATION ENTRIES FORM THE PROFILE CPT

						    $args = array(
						      'post_type'     => 'profiles',
						      'order'         => 'ASC',
						      'orderby'       => 'title'
						    );
						    $the_query = new WP_Query( $args );

						    // ORGANISATION ARRAY
						    $unique_organisations= array();

						    if( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

						        $organisation = get_field('staff_organisation');

						        if( ! in_array( $organisation, $unique_organisations ) ) :
						            $unique_organisations[] = $organisation;
						    ?>

						    	<option value="<?php echo $organisation; ?>"><?php echo $organisation; ?></option>

						<?php
						   	endif;
						   	endwhile;
						   	endif;
						?>

	                </select>
	            </div>
	        </div>

	        <div class="col-xs-6 col-xs-offset-3">
				<a id="go" class="btn btn-blue btn-filter">Filter</a>
			</div>
	    </div>
	</div>

	<!-- PAGE CONTENT -->
	<div class="section section-white-gradient-reverse">
    <div class="container">
        <div class="row">

            <div id="results" class="col-xs-12 col-md-12">

            </div>

        </div>
    </div>
</div>

<!-- JS FOR PEOPLE FILTERS (all done by AJAX) -->
<script>

	$(document).ready(function(){

		$('#go').click(function(){
			doTheRightThing();
		});

		// ON LOAD (run a query)

		$('#go').trigger('click');
	});

	// AJAX FUNCTION

	function doTheRightThing(){

		var the_people_filter = $('#the_people_selecter option:selected').val();
		var the_organisation_filter = $('#the_organisation_selecter option:selected').val();

		$('#results').html('');
		$('#results').addClass('thinking');

		// AJAX CALL
		var data = {
			action: 'people_filter',
			send_the_people_filter : the_people_filter,
			send_the_organisation_filter : the_organisation_filter,
		};

		jQuery.post(ajaxurl, data, function(response) {
			$('#results').removeClass('thinking');
			$('#results').html(response);

		});
	}

</script>


<?php get_footer(); ?>