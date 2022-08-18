<?php
get_header();
?>
    <div class="wrapper">
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
                                    <h4 class="card-title">Alec Thompson</h4>
                                    <p class="description">I've been trying to figure out the bed design for the master
                                        bedroom at our Hidden Hills compound...I like good music from Youtube.</p>
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
        <div class="section section-comments">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="media-area">
                            <h3 class="title text-center">3 Comments</h3>
                            <div class="media">
                                <a class="pull-left" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object img-raised" src="https://image.prettywordpress.com/jasmine/image/dog.png" alt="..."/>
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading">Tina Andrew <small class="text-muted">&middot; 7 minutes
                                            ago</small></h5>
                                    <p>Chance too good. God level bars. I'm so proud of @LifeOfDesiigner #1 song in the
                                        country. Panda! Don't be scared of the truth because we need to restart the
                                        human foundation in truth I stand with the most humility. We are so blessed!</p>
                                    <p>All praises and blessings to the families of people who never gave up on dreams.
                                        Don't forget, You're Awesome!</p>
                                    <div class="media-footer">
                                        <a href="#pablo" class="btn btn-primary btn-neutral pull-right" rel="tooltip"
                                           title="Reply to Comment">
                                            <i class="now-ui-icons ui-1_send"></i> Reply
                                        </a>
                                        <a href="#pablo" class="btn btn-danger btn-neutral pull-right">
                                            <i class="now-ui-icons ui-2_favourite-28"></i> 243
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <a class="pull-left" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object img-raised" alt="Tim Picture"
                                             src="https://image.prettywordpress.com/jasmine/image/dog.png">
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading">John Camber <small class="text-muted">&middot;
                                            Yesterday</small></h5>
                                    <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff
                                        coming soon. We will keep you posted for the latest news.</p>
                                    <p> Don't forget, You're Awesome!</p>
                                    <div class="media-footer">
                                        <a href="#pablo" class="btn btn-primary btn-neutral pull-right" rel="tooltip"
                                           title="Reply to Comment">
                                            <i class="now-ui-icons ui-1_send"></i> Reply
                                        </a>
                                        <a href="#pablo" class="btn btn-danger btn-neutral pull-right">
                                            <i class="now-ui-icons ui-2_favourite-28"></i> 25
                                        </a>
                                    </div>
                                    <div class="media">
                                        <a class="pull-left" href="#pablo">
                                            <div class="avatar">
                                                <img class="media-object img-raised" alt="64x64"
                                                     src="https://image.prettywordpress.com/jasmine/image/dog.png">
                                            </div>
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">Tina Andrew <small class="text-muted">· 2 Days
                                                    Ago</small></h5>
                                            <p>Hello guys, nice to have you on the platform! There will be a lot of
                                                great stuff coming soon. We will keep you posted for the latest
                                                news.</p>
                                            <p> Don't forget, You're Awesome!</p>
                                            <div class="media-footer">
                                                <a href="#pablo" class="btn btn-primary btn-neutral pull-right"
                                                   rel="tooltip" title="" data-original-title="Reply to Comment">
                                                    <i class="now-ui-icons ui-1_send"></i> Reply
                                                </a>
                                                <a href="#pablo" class="btn btn-danger btn-neutral pull-right">
                                                    <i class="now-ui-icons ui-2_favourite-28"></i> 2
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="title text-center">Post your comment</h3>
                        <div class="media media-post">
                            <a class="pull-left author" href="#pablo">
                                <div class="avatar">
                                    <img class="media-object img-raised" alt="64x64" src="https://image.prettywordpress.com/jasmine/image/dog.png">
                                </div>
                            </a>
                            <div class="media-body">
                                <textarea class="form-control" placeholder="Write a nice reply or go home..."
                                          rows="4"></textarea>
                                <div class="media-footer">
                                    <a href="#pablo" class="btn btn-primary pull-right">
                                        <i class="now-ui-icons ui-1_send"></i> Reply
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <!--    <footer class="footer " data-background-color="black">-->
        <!--        <div class="container">-->
        <!--            <nav>-->
        <!--                <ul>-->
        <!--                    <li>-->
        <!--                        <a href="#creative">-->
        <!--                            Creative Tim-->
        <!--                        </a>-->
        <!--                    </li>-->
        <!--                    <li>-->
        <!--                        <a href="#creative">-->
        <!--                            About Us-->
        <!--                        </a>-->
        <!--                    </li>-->
        <!--                    <li>-->
        <!--                        <a href="#creative">-->
        <!--                            Blog-->
        <!--                        </a>-->
        <!--                    </li>-->
        <!--                    <li>-->
        <!--                        <a href="#creative">-->
        <!--                            License-->
        <!--                        </a>-->
        <!--                    </li>-->
        <!--                </ul>-->
        <!--            </nav>-->
        <!--            <div class="copyright">-->
        <!--                &copy; <script>document.write(new Date().getFullYear())</script>, Designed by <a href="https://www.invisionapp.com">Invision</a>. Coded by <a href="https://www.creative-tim.com">Creative Tim</a>.-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </footer>-->
        <!--</div>-->
        <!--</body>-->
<?php
get_footer();
?>