<?php
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?>-<?php bloginfo('description'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body class="sections-page">
<?php
if ( is_home() ) {
    // 首页
    ?>
    <nav class="navbar navbar-expand-lg bg-white fixed-top ">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="http://localhost:8080/prettywordpress/friend-link/" rel="tooltip" title="" data-placement="bottom" data-original-title="<?php bloginfo('description'); ?>">
                    <?php bloginfo('name'); ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse has-image" data-nav-image="https://image.prettywordpress.com/jasmine/image/mobile_bg.jpg">
                <?php
                wp_nav_menu( array(
                    'menu_class'     => 'navbar-nav ml-auto',
                    'menu_id'        => 'custom-head',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'theme_location' => 'header-menu',
                    'walker' => new WPDocs_Walker_Nav_Menu()
                ) );
                ?>
            </div>
        </div>
    </nav>
    <div class="page-header header-filter">
        <div class="page-header-image" style="background-image: url('https://demos.creative-tim.com/marketplace/now-ui-kit-pro/assets/img/bg16.jpg');"></div>
        <div class="content-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 ml-auto text-right">
                        <h1 class="title">History of surfing</h1>
                        <h4 class="description">
                            <?php printf( __( 'The email address for user id 25 is %s', 'textdomain' ), get_the_author_meta( 'user_email',1 ) ); ?>
                        </h4>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

} else {
    // 其他通用头部
    ?>

    <nav class="navbar navbar-expand-lg  navbar-absolute navbar-transparent">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="http://localhost:8080/prettywordpress/friend-link/" rel="tooltip" title="" data-placement="bottom" data-original-title="<?php bloginfo('description'); ?>">
                    <?php bloginfo('name'); ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" data-nav-image="../assets/img/blurred-image-1.jpg" data-color="orange">
                <?php
                wp_nav_menu( array(
                    'menu_class'     => 'navbar-nav ml-auto',
                    'menu_id'        => 'custom-head',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'theme_location' => 'header-menu',
                    'walker' => new WPDocs_Walker_Nav_Menu()
                ) );
                ?>
            </div>
        </div>
    </nav>
    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('https://demos.creative-tim.com/marketplace/now-ui-kit-pro/assets/img/bg16.jpg');">
        </div>
        <div class="content-center">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h1 class="title"><?php the_title()?></h1>
                    <h4>Meet the amazing team behind this project and find out more about how we work.</h4>
                </div>
            </div>
        </div>
    </div>


    <?php
}
?>
