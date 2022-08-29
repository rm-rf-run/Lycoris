<?php
/**
 *  ::::::'##::::'###:::::'######::'##::::'##:'####:'##::: ##:'########:
 *  :::::: ##:::'## ##:::'##... ##: ###::'###:. ##:: ###:: ##: ##.....::
 *  :::::: ##::'##:. ##:: ##:::..:: ####'####:: ##:: ####: ##: ##:::::::
 *  :::::: ##:'##:::. ##:. ######:: ## ### ##:: ##:: ## ## ##: ######:::
 *  '##::: ##: #########::..... ##: ##. #: ##:: ##:: ##. ####: ##...::::
 *   ##::: ##: ##.... ##:'##::: ##: ##:.:: ##:: ##:: ##:. ###: ##:::::::
 *  . ######:: ##:::: ##:. ######:: ##:::: ##:'####: ##::. ##: ########:
 *  :......:::..:::::..:::......:::..:::::..::....::..::::..::........::
 *
 * @package WordPress
 * @Theme jasmine
 *
 * @author admin@prettywordpress.com
 * @link https://www.prettywordpress.com
 * Template Name: 关于我
 * Template Post Type: page
 */
get_header();?>
<div class="section">
    <div class="container">
        <h3 class="title">About me</h3>
        <h5 class="description text-center">An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</h5>
        <div class="row">
            <div class="col-md-12">
                <h4 class="title text-center">My Portfolio</h4>
                <div class="nav-align-center">
                    <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile" role="tablist">
                                <i class="now-ui-icons design_image"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#home" role="tablist">
                                <i class="now-ui-icons location_world"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#messages" role="tablist">
                                <i class="now-ui-icons design-2_ruler-pencil"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content gallery">
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="row">
                            <div class="col-md-5 ml-auto mr-auto">
                                <div class="card card-background card-background-product card-raised" style="background-image: url('../assets/img/bg23.jpg')">
                                    <div class="card-body">
                                        <h2 class="card-title">Chair remake.</h2>
                                        <p class="card-description text-white">
                                            Trello’s boards, lists, and cards enable you to organize and prioritize your projects in a fun, flexible and rewarding way. It was a great project and I would be more than happy to do it again.
                                        </p>
                                        <label class="badge badge-neutral">Trello</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="info info-horizontal">
                                    <div class="icon icon-warning">
                                        <i class="now-ui-icons users_single-02"></i>
                                    </div>
                                    <div class="description">
                                        <h5 class="info-title">Work With Any Team</h5>
                                        <p class="description">
                                            Whether it’s for work or even the next family vacation, Trello helps your team.
                                        </p>
                                    </div>
                                </div>
                                <div class="info info-horizontal">
                                    <div class="icon icon-warning">
                                        <i class="now-ui-icons business_chart-bar-32"></i>
                                    </div>
                                    <div class="description">
                                        <h5 class="info-title">A Productivity Platform</h5>
                                        <p class="description">
                                            Integrate the apps your team already uses directly into your workflow.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="home" role="tabpanel">
                        <div class="row">
                            <div class="col-md-5 ml-auto mr-auto">
                                <div class="card card-background card-background-product card-raised" style="background-image: url('../assets/img/project8.jpg')">
                                    <div class="card-body">
                                        <h2 class="card-title">Social Analytics</h2>
                                        <p class="card-description">
                                            Insight to help you create, connect, and convert. Understand Your Audience's Interests, Influence, Interactions, and Intent. Discover emerging topics and influencers to reach new audiences.
                                        </p>
                                        <label class="badge badge-neutral">Analytics</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="info info-horizontal">
                                    <div class="icon icon-danger">
                                        <i class="now-ui-icons ui-2_chat-round"></i>
                                    </div>
                                    <div class="description">
                                        <h5 class="info-title">Listen to Social Conversations</h5>
                                        <p class="description">
                                            Gain access to the demographics, psychographics, and location of unique people who talk about your brand.
                                        </p>
                                    </div>
                                </div>
                                <div class="info info-horizontal">
                                    <div class="icon icon-danger">
                                        <i class="now-ui-icons design-2_ruler-pencil"></i>
                                    </div>
                                    <div class="description">
                                        <h5 class="info-title">Social Conversions</h5>
                                        <p class="description">
                                            Track actions taken on your website that originated from social, and understand the impact on your bottom line.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane active show" id="messages" role="tabpanel">
                        <div class="row">
                            <div class="col-md-5 ml-auto mr-auto">
                                <div class="card card-background card-background-product card-raised" style="background-image: url('../assets/img/bg25.jpg')">
                                    <div class="card-body">
                                        <h2 class="card-title">Interior Redesign</h2>
                                        <p class="card-description">
                                            Insight to help you create, connect, and convert. Understand Your Audience's Interests, Influence, Interactions, and Intent. Discover emerging topics and influencers to reach new audiences.
                                        </p>
                                        <label class="badge badge-neutral">Interior</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="info info-horizontal">
                                    <div class="icon icon-info">
                                        <i class="now-ui-icons design_palette"></i>
                                    </div>
                                    <div class="description">
                                        <h5 class="info-title">Colors adjustments</h5>
                                        <p class="description">
                                            Gain access to the demographics, psychographics, and location of unique people who talk about your brand.
                                        </p>
                                    </div>
                                </div>
                                <div class="info info-horizontal">
                                    <div class="icon icon-info">
                                        <i class="now-ui-icons design_scissors"></i>
                                    </div>
                                    <div class="description">
                                        <h5 class="info-title">Performance Clothing</h5>
                                        <p class="description">
                                            Unify data from Facebook, Instagram, Twitter, LinkedIn, and Youtube to gain rich insights from easy-to-use reports.
                                        </p>
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
<?php get_footer();?>
