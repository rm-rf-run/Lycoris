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
                        <?php comments_template();?>
                    </div>
                </div>
            </div>
            </div>
            <?php
        endif;
        ?>
        <div class="section">
            <div class="container">
                <div class="col-md-12">
                    <h2 class="title text-center">猜你喜欢</h2>
                    <br/>
                    <div class="blogs-1" id="blogs-1">
                        <div class="row">
                            <div class="col-md-10 ml-auto mr-auto">
                                <div class="card card-plain card-blog">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="card-image">
                                                <img class="img img-raised rounded"
                                                     src="https://image.prettywordpress.com/jasmine/image/dog.png">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <h6 class="category text-info">Enterprise</h6>
                                            <h3 class="card-title">
                                                <a href="#pablo">Warner Music Group buys concert discovery service
                                                    Songkick</a>
                                            </h3>
                                            <p class="card-description">
                                                Warner Music Group announced today it’s acquiring the selected assets of
                                                the music platform Songkick, including its app for finding concerts and
                                                the company’s trademark.
                                            </p>
                                            <p class="author">
                                                by <a href="#pablo"><b>Sarah Perez</b></a>, 2 days ago
                                            </p></div>
                                    </div>
                                </div>
                                <div class="card card-plain card-blog">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h6 class="category text-danger">
                                                <i class="now-ui-icons now-ui-icons media-2_sound-wave"></i> Startup
                                            </h6>
                                            <h3 class="card-title">
                                                <a href="#pablo">Insticator raises $5.2M to help publishers</a>
                                            </h3>
                                            <p class="card-description">
                                                Insticator is announcing that it has raised $5.2 million in Series A
                                                funding. The startup allows online publishers to add quizzes, polls and
                                                other interactive elements...
                                            </p>
                                            <p class="author">
                                                by <a href="#pablo"><b>Anthony Ha</b></a>, 5 days ago
                                            </p></div>
                                        <div class="col-md-5">
                                            <div class="card-image">
                                                <img class="img img-raised rounded
                                            " src="https://image.prettywordpress.com/jasmine/image/dog.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
get_footer();
?>