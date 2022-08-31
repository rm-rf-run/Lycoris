<?php
get_header();
?>
    <div class="wrapper blog-post">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <?php the_content();?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-blog-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blog-tags">
                                    <?php the_tags('<i class="fa fa-tags" style="color: #999" aria-hidden="true"></i><span class="label label-primary">','</span><span class="label label-primary">','</span>');?>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="card card-profile card-plain">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img img-raised" src="https://image.prettywordpress.com/jasmine/image/dog.png">
                                        </a>
                                        <div class="ripple-container"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="card-title"><?php echo custom_option("author_name");?></h4>
                                    <p class="description"><?php echo custom_option("admin_des");?></p>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-default pull-right btn-round">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // 如果评论是开放的或者我们至少有一个评论，加载评论模板。
        if ( comments_open() || get_comments_number() ) :
            ?>
            <div class="section section-comments">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="media-area">
                            <h3 class="title text-center"><?php echo get_comment_count(get_the_ID())['approved'];?> 条评论</h3>
                        </div>
                        <?php
                        // 加载评论模板
                        comments_template();
                        // 判断文章评论功能是否开启
                        if(!comments_open()):
                            ?>
                            <h4 class="text-center description">
                                这篇文章已经发布很长时间，不能评论啦
                            </h4>

                        <?php
                        endif;?>
                    </div>
                </div>
            </div>
            </div>
            <?php
        endif;

        // 相同标签的文章,没有则不显示
        $cat = get_the_category();
        $categoryList = array();
        foreach($cat as $key=>$category){
            array_push($categoryList, $category->term_id);
        }
        // 排查当前文章
        $exclude_ids = array();
        array_push($exclude_ids,get_the_ID());
        $args = array('orderby' => 'rand','showposts' => 2,'cat' => $categoryList ,'post__not_in' => $exclude_ids);
        query_posts($args);
        if ( have_posts() ) :
            ?>
            <div class="section">
                <div class="container">
                    <div class="col-md-12">
                        <h2 class="title text-center">猜你喜欢</h2>
                        <br/>
                        <div class="blogs-1" id="blogs-1">
                            <div class="row">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <?php
                                    $i = 1;
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
                                                            <a href="<?php esc_url(the_permalink()); ?>"><?php the_title();?></a>
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
                                                            <a href="<?php esc_url(the_permalink()); ?>"><?php the_title();?></a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php
            $articleColumn = get_post_meta(get_the_ID(), '_sites_article_column', true);
            $args = array(
                'meta_query' => array(
                    array(
                        'key'   => '_sites_article_column',
                        'value' => $articleColumn
                    )
                ),

            );
            $postId = get_the_ID();
            $postsList = get_posts( $args );

            if ( $postsList ) {
            ?>
            <div class="share-slide-button-box" style="top: 100px; width: 0px; z-index: 99999; right: 0px;">
                <a href="#" onclick="return false;" class="share-slide-button" style="left: -24px;" tabindex="1">目录</a>
                <div class="share-slide-list-box" style="width: 0px; display: none;">
                    <div class="share-slide-top">wordpress文章专栏</div>
                    <div class="share-slide-list">
                        <ul class="share-slide-list-ul" style="width: 226px;">
                            <?php
                                foreach ( $postsList as $post ) :
                                     ?>
                                    <li> <a href="<?php echo $post->guid; ?>" onclick="return false;" class="slide-mshare" data-cmd="mshare"><i class="<?php echo $postId==$post->ID?"fa fa-eercast":"fa fa-circle-thin"?>" aria-hidden="true"></i> <?php echo $post->post_title; ?></a></li>
                                <?php
                                endforeach;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif;
get_footer();
?>