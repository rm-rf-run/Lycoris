<?php
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?>-<?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>
</head>
<body class="sections-page <?php echo is_page_template("about-me.php")?"profile-page":"";?>">
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
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title"><?php echo custom_option("home_title");?></h1>
                    <h4 class="description "><?php echo custom_option("home_synopsis");?></h4>
                    <br>
                    <h5>Connect with me on:</h5>
                    <div class="buttons">
                        <a href="#pablo" class="btn btn-icon btn-neutral btn-danger btn-round mt-2">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#pablo" class="btn btn-icon btn-neutral btn-danger btn-round mt-2">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="#pablo" class="btn btn-icon btn-neutral btn-danger btn-round mt-2">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#pablo" class="btn btn-icon btn-neutral btn-danger btn-round  mt-2">
                            <i class="fa fa-instagram"></i>
                        </a>
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
        <?php
        if(is_page_template("about-me.php")){
            ?>
            <div class="content-center">
                <div class="photo-container">
                    <img src="<?php echo custom_option('focus_logo');?>" alt="">
                </div>
                <h3 class="title"><?php echo custom_option('author_name');?></h3>
                <p class="category">Photographer</p>
                <div class="content">
                    <div class="social-description">
                        <h2><?php echo wp_count_posts()->publish;?></h2>
                        <p>article</p>
                    </div>
                    <div class="social-description">
                        <h2><?php echo wp_count_comments()->approved;?></h2>
                        <p>Comments</p>
                    </div>
                    <div class="social-description">
                        <h2>48</h2>
                        <p>likes</p>
                    </div>
                </div>
            </div>
            <?php
        }else{
            ?>
            <div class="content-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h1 class="title"><?php the_title()?></h1>
                        <h4><?php echo wp_trim_words(get_the_excerpt(), 50);?></h4>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

    </div>


    <?php
}
?>
