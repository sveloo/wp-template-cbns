<!-- WP EVENTS PAGE (events CPT) -->

<?php get_header(); ?>
	
	<!-- PAGE HEADER & h1 -->
	<div class="section section-header section-white-gradient-reverse">
		
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12">
	                <h1 class="section-title text-center">Events Archive</h1>
	                <h3 class="title_under_h1">Currently browsing <?php single_cat_title(' '); ?><?php single_month_title(' '); ?></h3>
	            </div>
	        </div>
	    </div>    
	    
	</div>
	
	<!-- PAGE CONTENT -->
	<div class="section section-white-gradient news-archive">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-md-9">

                <!-- SINGLE NEWS POST -->
               
				<?php
					if ( have_posts() ) :
					while ( have_posts() ) : the_post();					
				?>
					
				<div class="col-md-12">
	                <div class="card card-horizontal card-events">
	                    <div class="row">
	                        <div class="col-md-2">
	                            <div class="date">
	                                <ul>
		                                <!-- GET ACF DATES -->
		                                <?php $the_date = get_field('event_start_date', false, false); 
			                                $the_date = new DateTime($the_date);
		                                ?>
		                                
	                                    <li class="day"><?php echo $the_date->format('j'); ?></li>
	                                    <li class="month"><?php echo $the_date->format('M'); ?></li>
	                                </ul>
	                            </div>
	                        </div>
	                        <div class="col-md-10">
	                            <div class="content">
	                               <p class="category">
		                               
		                               	<!-- GET ACF TAXONOMY -->
	                      	
										<?php 
										
											$terms = get_field('event_category');
										
											if( $terms ): 
											foreach( $terms as $term ):
										
												 echo $term->name; echo ' '; 
												
											 endforeach; 						
											
										endif; ?>	
											                               
	                               </p>
	                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	                                <p class="subtitle">
	                                    <i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_field('venue'); ?><br />
	                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $the_date->format('g:i a'); ?>
	                                </p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	                				
				<?php endwhile; ?>						
				<?php endif; ?>

            </div>

            <!-- SIDE BAR -->
            <div class="col-xs-12 col-md-3">
                <div class="widget">
                    <h3>Archives</h3>
                    <ul>
						<?php $args = array(
							'type'            => 'monthly',
							'limit'           => '',
							'format'          => 'html', 
							'before'          => '<span title="Click here to see all posts within this date">',
							'after'           => '</span>',
							'show_post_count' => false,
							'echo'            => 1,
							'order'           => 'DESC',
							'post_type'     => 'events'
						);
					
						wp_get_archives( $args ); ?>			
						
					</ul>

				</div>
                <div class="widget">
                    <h3>Categories</h3>
                    <ul>
						<?php
							
							$terms = get_terms('events_cat');
							 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
							     
							     foreach ( $terms as $term ) {
								     ?>
									 <li>
									 	<a href="/events_cat/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
									 </li>
								  
								   
								   <?php
							     }
							  
							 }		
		    			?>
		
					</ul>

                </div>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>