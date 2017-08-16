<?php get_header(); ?>

<!-- PAGE HEADER -->
<div class="section-header text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<!-- PAGE SECTION -->
<div class="section">
    <div class="container">
        <div class="row">
            <!-- CONTENT -->
            <div class="col-xs-12">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php the_field('content'); ?>
                <?php endwhile; else: ?>
                    <h2>Nah! I got nothin' mate.</h2>
                    <h3>Look's like there isn't any content in this site yet. If you need any assistance give Sanny a holler!</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>