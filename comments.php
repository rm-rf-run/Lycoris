<?php
/**
 * Template Name: 评论模块
 */
if (post_password_required()) { // 如果文章设置密码则不展示
    return;
}
?>
    <?php
    //声明变量
    $comment_send = '发表评论';
    $comment_reply = '发表一下你的评论呗';
    $comment_reply_to = '回复 %s';
    $comment_author = '昵称';
    $comment_email = 'E-Mail';
    $comment_body = '期待大佬的精彩发言~';
    $comment_url = 'Website';
    $comment_cookies_1 = ' 回复评论代表你同意网站的';
    $comment_cookies_2 = ' 隐私政策';
    $comment_before = '';
    $comment_cancel = '取消回复';
    $comment_bird = '<div class="pull-left author">
<div class="avatar">
<img class="media-object img-raised" id="author_img" alt="64x64" src="https://image.prettywordpress.com/jasmine/image/dog.png">
</div>
</div>';
    //Array
    $comments_args = array(
        //Define Fields
        'fields' => array(
            //Author field
            'qq' => '<div class="input-group col-md-6">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-qq" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="你的QQ号" aria-label="你的QQ号" name="author_qq" id="author_qq">
                </div>',
            'author' => '<div class="input-group col-md-6">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="' . $comment_author . '" aria-label="' . $comment_author . '" name="author" id="author">
                </div>',
            'email' => '<div class="input-group col-md-6">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="' . $comment_email . '" aria-label="' . $comment_email . '" name="email" id="email">
                </div>',
            'url' => '<div class="input-group col-md-6">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-globe " aria-hidden="true"></i></i></span>
                </div>
                <input type="text" class="form-control" placeholder="' . $comment_url . '" aria-label="' . $comment_url . '" name="url" id="url">
                </div>',
            //Cookies
            'cookies' => '<div style="padding-left: 10px;"><input type="checkbox" required>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a></div>',
        ),
        // Change the title of send button
        'label_submit' => __($comment_send),
        // Change the title of the reply section
        'title_reply' => __($comment_reply),
        // Change the title of the reply section
        'title_reply_to' => __($comment_reply_to),
        //Cancel Reply Text
        'cancel_reply_link' => __($comment_cancel),
        // Redefine your own textarea (the comment body).
        'comment_field' => '<div class="form-group col-md-12" style="padding-left: 10px;"><textarea class="form-control" id="comment" name="comment" aria-required="true" placeholder="' . $comment_body . '" maxlength="1000"></textarea></div>',
        //Message Before Comment
        'comment_notes_before' => __($comment_before),
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        //Submit Button ID
        'id_submit' => __('comment-submit'),
        'class_submit' => __('btn btn-primary'),
        //表单的id属性
        'id_form' => __('comment-form'),
        'class_form' => __('form-row'),
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title title text-center">',
        'title_reply_after' => '</h3><div class="media media-post">' . $comment_bird .'<div class="media-body">',
        'submit_button' => '<div class="media-footer form-group col-md-12"><button name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-primary pull-right" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i> %4$s</button></div>');
    ?>
    <?php if (have_comments()): ?>
        <ol class="comment-list">
            <?php
            wp_list_comments('type=comment&callback=custom_comment');
            ?>
        </ol><!-- .comment-list -->
        <?php
        comment_form($comments_args);
        ?></div></div><?php
// Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')):
            ?>
            <nav class="navigation comment-navigation" role="navigation" style="height: 20px;">
                <?php if (!comments_open() && get_comments_number()): ?>
                    <p class="no-comments"><?php _e('抱歉，评论已关闭。', 'jasmine'); ?></p>
                <?php endif; ?>
                <div class="nav-previous"
                     style="float: right;"><?php previous_comments_link(__('下一页', 'jasmine')); ?></div>
                <div class="nav-next"
                     style="float: right;margin-right: 20px;"><?php next_comments_link(__('上一页', 'jasmine')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

    <?php endif; // have_comments() ?>

<!-- #comments -->