<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('', true, 'right'); ?></title>

    <!-- FAVICON -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- HEADER -->
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-left">
                <a href="/"><img class="site-logo" src="<?php echo get_template_directory_uri(); ?>/images/cbns-logo.png" /></a>
            </div>
        </div>
    </nav>
</header>