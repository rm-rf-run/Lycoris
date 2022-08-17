<?php
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                <a class="navbar-brand" href="http://localhost:8080/prettywordpress/friend-link/" rel="tooltip" title="" data-placement="bottom" data-original-title="Designed by Invision. Coded by Creative Tim">
                    Now Ui Kit Pro
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse has-image" data-nav-image="https://image.prettywordpress.com/jasmine/image/mobile_bg.jpg">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenu" data-toggle="dropdown">
                            <i class="now-ui-icons design_app"></i>
                            <p>Components</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./index.html">
                                <i class="now-ui-icons business_chart-pie-36"></i>
                                All Components
                            </a>
                            <a class="dropdown-item" href="https://creativetimofficial.github.io/now-ui-kit-pro/#/components?ref=nuk-pro-doc">
                                <i class="now-ui-icons files_single-copy-04"></i>
                                Documentation
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            <i class="now-ui-icons files_paper" aria-hidden="true"></i>
                            <p>Sections</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./sections.html#headers">
                                <i class="now-ui-icons shopping_box"></i>
                                Headers
                            </a>
                            <a class="dropdown-item" href="./sections.html#features">
                                <i class="now-ui-icons ui-2_settings-90"></i>
                                Features
                            </a>
                            <a class="dropdown-item" href="./sections.html#blogs">
                                <i class="now-ui-icons text_align-left"></i>
                                Blogs
                            </a>
                            <a class="dropdown-item" href="./sections.html#teams">
                                <i class="now-ui-icons sport_user-run"></i>
                                Teams
                            </a>
                            <a class="dropdown-item" href="./sections.html#projects">
                                <i class="now-ui-icons education_paper"></i>
                                Projects
                            </a>
                            <a class="dropdown-item" href="./sections.html#pricing">
                                <i class="now-ui-icons business_money-coins"></i>
                                Pricing
                            </a>
                            <a class="dropdown-item" href="./sections.html#testimonials">
                                <i class="now-ui-icons ui-2_chat-round"></i>
                                Testimonials
                            </a>
                            <a class="dropdown-item" href="./sections.html#contactus">
                                <i class="now-ui-icons tech_mobile"></i>
                                Contact Us
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            <i class="now-ui-icons design_image" aria-hidden="true"></i>
                            <p>Examples</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./examples/about-us.html">
                                <i class="now-ui-icons business_bulb-63"></i>
                                About-us
                            </a>
                            <a class="dropdown-item" href="./examples/blog-post.html">
                                <i class="now-ui-icons text_align-left"></i>
                                Blog Post
                            </a>
                            <a class="dropdown-item" href="./examples/blog-posts.html">
                                <i class="now-ui-icons design_bullet-list-67"></i>
                                Blog Posts
                            </a>
                            <a class="dropdown-item" href="./examples/contact-us.html">
                                <i class="now-ui-icons location_pin"></i>
                                Contact Us
                            </a>
                            <a class="dropdown-item" href="./examples/landing-page.html">
                                <i class="now-ui-icons education_paper"></i>
                                Landing Page
                            </a>
                            <a class="dropdown-item" href="./examples/login-page.html">
                                <i class="now-ui-icons users_circle-08"></i>
                                Login Page
                            </a>
                            <a class="dropdown-item" href="./examples/pricing.html">
                                <i class="now-ui-icons business_money-coins"></i>
                                Pricing
                            </a>
                            <a class="dropdown-item" href="./examples/ecommerce.html">
                                <i class="now-ui-icons shopping_shop"></i>
                                Ecommerce Page
                            </a>
                            <a class="dropdown-item" href="./examples/product-page.html">
                                <i class="now-ui-icons shopping_bag-16"></i>
                                Product Page
                            </a>
                            <a class="dropdown-item" href="./examples/profile-page.html">
                                <i class="now-ui-icons users_single-02"></i>
                                Profile Page
                            </a>
                            <a class="dropdown-item" href="./examples/signup-page.html">
                                <i class="now-ui-icons tech_mobile"></i>
                                Signup Page
                            </a>
                        </div>
                    </li>
                </ul>
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
                        <h4 class="description">The riding of waves has likely existed since humans began swimming in the ocean. In this sense, bodysurfing is the oldest type of wave-catching. Standing up on what is now called a surfboard is a relatively recent innovation developed by the Polynesians.</h4>
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
            <div class="dropdown button-dropdown">
                <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-header">Dropdown header</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">One more separated link</a>
                </div>
            </div>
            <div class="navbar-translate">
                <a class="navbar-brand" href="https://demos.creative-tim.com/marketplace/now-ui-kit-pro/presentation.html" rel="tooltip" title="" data-placement="bottom" data-original-title="Designed by Invision. Coded by Creative Tim">
                    Now Ui Kit Pro
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" data-nav-image="../assets/img/blurred-image-1.jpg" data-color="orange">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenu" href="" data-toggle="dropdown">
                            <i class="now-ui-icons design_app"></i>
                            <p>Components</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./index.html">
                                <i class="now-ui-icons business_chart-pie-36"></i>
                                All Components
                            </a>
                            <a class="dropdown-item" href="https://creativetimofficial.github.io/now-ui-kit-pro/#/components?ref=nuk-pro-doc">
                                <i class="now-ui-icons files_single-copy-04"></i>
                                Documentation
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            <i class="now-ui-icons files_paper" aria-hidden="true"></i>
                            <p>Sections</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../sections.html#headers">
                                <i class="now-ui-icons shopping_box"></i>
                                Headers
                            </a>
                            <a class="dropdown-item" href="../sections.html#features">
                                <i class="now-ui-icons ui-2_settings-90"></i>
                                Features
                            </a>
                            <a class="dropdown-item" href="../sections.html#blogs">
                                <i class="now-ui-icons text_align-left"></i>
                                Blogs
                            </a>
                            <a class="dropdown-item" href="../sections.html#teams">
                                <i class="now-ui-icons sport_user-run"></i>
                                Teams
                            </a>
                            <a class="dropdown-item" href="../sections.html#projects">
                                <i class="now-ui-icons education_paper"></i>
                                Projects
                            </a>
                            <a class="dropdown-item" href="../sections.html#pricing">
                                <i class="now-ui-icons business_money-coins"></i>
                                Pricing
                            </a>
                            <a class="dropdown-item" href="../sections.html#testimonials">
                                <i class="now-ui-icons ui-2_chat-round"></i>
                                Testimonials
                            </a>
                            <a class="dropdown-item" href="../sections.html#contactus">
                                <i class="now-ui-icons tech_mobile"></i>
                                Contact Us
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            <i class="now-ui-icons design_image" aria-hidden="true"></i>
                            <p>Examples</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../examples/about-us.html">
                                <i class="now-ui-icons business_bulb-63"></i>
                                About-us
                            </a>
                            <a class="dropdown-item" href="../examples/blog-post.html">
                                <i class="now-ui-icons text_align-left"></i>
                                Blog Post
                            </a>
                            <a class="dropdown-item" href="../examples/blog-posts.html">
                                <i class="now-ui-icons design_bullet-list-67"></i>
                                Blog Posts
                            </a>
                            <a class="dropdown-item" href="../examples/contact-us.html">
                                <i class="now-ui-icons location_pin"></i>
                                Contact Us
                            </a>
                            <a class="dropdown-item" href="../examples/landing-page.html">
                                <i class="now-ui-icons education_paper"></i>
                                Landing Page
                            </a>
                            <a class="dropdown-item" href="../examples/login-page.html">
                                <i class="now-ui-icons users_circle-08"></i>
                                Login Page
                            </a>
                            <a class="dropdown-item" href="../examples/pricing.html">
                                <i class="now-ui-icons business_money-coins"></i>
                                Pricing
                            </a>
                            <a class="dropdown-item" href="../examples/ecommerce.html">
                                <i class="now-ui-icons shopping_shop"></i>
                                Ecommerce Page
                            </a>
                            <a class="dropdown-item" href="../examples/product-page.html">
                                <i class="now-ui-icons shopping_bag-16"></i>
                                Product Page
                            </a>
                            <a class="dropdown-item" href="../examples/profile-page.html">
                                <i class="now-ui-icons users_single-02"></i>
                                Profile Page
                            </a>
                            <a class="dropdown-item" href="../examples/signup-page.html">
                                <i class="now-ui-icons tech_mobile"></i>
                                Signup Page
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('https://demos.creative-tim.com/marketplace/now-ui-kit-pro/assets/img/bg16.jpg');">
        </div>
        <div class="content-center">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h1 class="title">About Us</h1>
                    <h4>Meet the amazing team behind this project and find out more about how we work.</h4>
                </div>
            </div>
        </div>
    </div>


    <?php
}
?>
