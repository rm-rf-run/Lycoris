<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>
    <div class="cd-section" id="blogs">

        <div class="blogs-1" id="blogs-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <h2 class="title">Latest Blogposts</h2>
                        <br>
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                        $args = array(

                            'caller_get_posts' => 1,

                            'paged' => $paged

                        );

                        query_posts($args);
                        $i = 3;
                        ?>
                        <div class="jubenlists">
                        <?php
                        while ( have_posts() ) : the_post();
                        if($i % 2 == 1){
                            ?>
                            <div class="card card-plain card-blog">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card-image">
                                            <img class="img img-raised rounded" data-cfsrc="https://demos.creative-tim.com/marketplace/now-ui-kit-pro/assets/img/examples/card-blog4.jpg" src="https://demos.creative-tim.com/marketplace/now-ui-kit-pro/assets/img/examples/card-blog4.jpg">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h6 class="category text-info"><?php the_tags();?></h6>
                                        <h3 class="card-title">
                                            <a href="#pablo"><?php the_title();?></a>
                                        </h3>
                                        <p class="card-description">
                                            <?php echo wp_trim_words(get_the_excerpt(), 100);?><a href="<?php esc_url(the_permalink()); ?>"> Read More </a>
                                        </p>
                                        <p class="author">
                                            by <a href="#pablo"><b><?php the_author();?></b></a>, 发布于<?php echo human_time_diff(get_the_time('U'), current_time('timestamp'));
                                            _e('前','jasmine'); ?>

                                        </p></div>
                                </div>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="card card-plain card-blog">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h6 class="category text-danger">
                                            <?php the_tags();?>
                                        </h6>
                                        <h3 class="card-title">
                                            <a href="#pablo"><?php the_title();?></a>
                                        </h3>
                                        <p class="card-description">
                                            <?php echo wp_trim_words(get_the_excerpt(), 100);?><a href="<?php esc_url(the_permalink()); ?>"> Read More </a>
                                        </p>
                                        <p class="author">
                                            by <a href="#pablo"><b><?php the_author();?></b></a>, 发布于<?php echo human_time_diff(get_the_time('U'), current_time('timestamp'));
                                            _e('前','jasmine'); ?>

                                        </p></div>
                                    <div class="col-md-5">
                                        <div class="card-image">
                                            <img class="img img-raised rounded" data-cfsrc="https://demos.creative-tim.com/marketplace/now-ui-kit-pro/assets/img/examples/card-blog6.jpg" src="https://demos.creative-tim.com/marketplace/now-ui-kit-pro/assets/img/examples/card-blog6.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        $i++;

                        endwhile; wp_reset_query();
                            ?>
                            </div>
                        <?php

                        $next_page = custom_get_next_posts_link('加载更多');

                        if($next_page) echo ''.$next_page.'';
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();