<?php // Template Name: Collaborations ?>

<?php get_header(); ?>

	<!-- PAGE HEADER & h1 -->
	<div class="section section-header">
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12">
	                <h1 class="section-title text-center">Collaborations<br>
	                <small>We are proud to be collaborating with the following partners.</small></h1>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- COLLABORATION LOGOS -->
	<div class="section section collaborations">
    <div class="container">
        <div class="row logos text-center">

	    <?php
			global $post;
			$args = array(
				'posts_per_page' => -1,
				'post_type' => array( 'collaborations'),
				'orderby' => 'date',
				'order' => 'DESC',
			);
			$myposts = get_posts( $args );
			$the_count = 1;
			foreach ($myposts as $post) : start_wp();
		?>

			<div class="col-xs-12 col-md-3">
				<!-- GET ACF IMAGE -->
				<?php $attachment_id = get_field('featured_image'); ?>
				<img class="logo" src="<?php echo $attachment_id['sizes']['medium']; ?>" />
            </div>

			<?php
				if($the_count==4){
		       		?><div class="clearfix"></div><?php
	       		}
			?>

       	<?php
	       	endforeach;
	       	$the_count ++;

	       	if($the_count==5){
		       	$the_count = 1;
	       	}
	    ?>
		<?php rewind_posts(); ?>



        </div>
    </div>
</div></div>

<?php get_footer(); ?>