<?php
function wpdocs_theme_name_scripts() {
    //加载顺序从上到下
    //css
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome', 'https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css' );
    wp_enqueue_style( 'nprogress', 'https://cdn.jsdelivr.net/npm/nprogress@0.2.0/nprogress.css' );
    wp_enqueue_style( 'other', get_theme_file_uri( '/assets/css/other.css' ) );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    //js
    wp_enqueue_script( 'jquery-min',  'https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap',  'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'customize',  get_theme_file_uri( '/assets/js/customize.js' ), array(), '1.0.0', true );
    wp_enqueue_script( 'nprogress',  'https://cdn.jsdelivr.net/npm/nprogress@0.2.0/nprogress.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'other',  get_theme_file_uri( '/assets/js/other.js' ), array(), '1.0.0', true );
}
// 所有CSS与JS使用该方法添加
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

// 去除顶部工具栏
show_admin_bar(false);


// 新增友情链接界面
function add_pages()
{
    global $pagenow;
    //判断是否为激活主题页面
    if ('themes.php' == $pagenow && isset($_GET['activated'])) {
//        jasmine_add_page('归档', 'post-archives', 'post-archives.php'); //页面标题、别名、页面模板
        add_page('友情链接', 'friend-link', 'friend-link.php');
        add_page('关于我', 'about-me', 'about-me.php');
    }
}

add_action('after_switch_theme ', 'add_pages');


/**
 * 激活主题创建页面
 *
 * @param $title
 * @param $slug
 * @param string $page_template
 */
function add_page($title, $slug, $page_template = '')
{
    $allPages = get_pages(); //获取所有页面
    $exists = false;
    foreach ($allPages as $page) {
        //通过页面别名来判断页面是否已经存在
        if (strtolower($page->post_name) == strtolower($slug)) {
            $exists = true;
        }
    }
    if ($exists == false) {
        $new_page_id = wp_insert_post(
            array(
                'post_title' => $title,
                'post_type' => 'page',
                'post_name' => $slug,
                'comment_status' => 'open',
                'ping_status' => 'closed',
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1,
                'menu_order' => 0,
            )
        );
        //如果插入成功 且设置了模板
        if ($new_page_id && $page_template != '') {
            //保存页面模板信息
            update_post_meta($new_page_id, '_wp_page_template', $page_template);
        }
    }
}


//添加友情链接
add_filter('pre_option_link_manager_enabled', '__return_true');

//注册菜单的名称
function register_my_menus()
{
    register_nav_menus(
        array('header-menu' => __('首页'))
    );
}

add_action('init', 'register_my_menus'); //初始化的时候启用


//自定义菜单

/**
 * Custom walker class.
 */
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {

    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Depth-dependent classes.
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'dropdown-menu dropdown-menu-right menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . '" '.( $display_depth % 2  ? 'aria-labelledby="navbarDropdownMenuLink"' : '' ).'>' . "\n";
    }

    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // Depth-dependent classes.
        $depth_classes = array(
            'nav-item dropdown', //新增属性
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $nums=substr_count($class_names,'menu-item-has-children');
        if($nums > 0){ // 判断是否有子集ul
            $attributes .= ' class=" menu-link ' . ( $depth > 0 ? 'dropdown-item sub-menu-link' : 'nav-link dropdown-toggle main-menu-link' ) . '" ' . ( $depth > 0 ? '':'id="navbarDropdownMenuLink" data-toggle="dropdown" aria-expanded="false"' ) . '';
        }else{
            $attributes .= ' class=" menu-link ' . ( $depth > 0 ? 'dropdown-item sub-menu-link' : 'nav-link main-menu-link' ) . '" ' . ( $depth > 0 ? '':'id="navbarDropdownMenu"' ) . '';
        }

        // Build HTML output and pass through the proper filter.
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
//自定义菜单结束

//点击加载文章
function custom_get_next_posts_link( $label = null, $max_page = 0 ) {
    global $paged, $wp_query;

    if ( ! $max_page ) {
        $max_page = $wp_query->max_num_pages;
    }

    if ( ! $paged ) {
        $paged = 1;
    }

    $nextpage = (int) $paged + 1;

    if ( null === $label ) {
        $label = __( 'Next Page &raquo;' );
    }

    if ( ! is_single() && ( $nextpage <= $max_page ) ) {
        /**
         * Filters the anchor tag attributes for the next posts page link.
         *
         * @since 2.7.0
         *
         * @param string $attributes Attributes for the anchor tag.
         */
        $attr = apply_filters( 'next_posts_link_attributes', '' );
        return '<div class="row" id="aaa"><div class="col-md-4 ml-auto mr-auto text-center"><button class="btn btn-primary btn-round mt-4 btn-lg" id="show-more" href="'.next_posts( $max_page, false ).'">加载更多</button></div></div>';
    }
}
//点击加载文章结束

// 修改摘要长度
function wpdocs_excerpt_more( $more ) {
    return '.....';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

// 自定义标签
function wpdocs_show_tags() {
    $post_tags = get_the_tags();
    $output = '';

    if ( ! empty( $post_tags ) ) {
        foreach ( $post_tags as $tag ) {
            $output .= '<span class="label label-primary"><a href="' . esc_attr( get_tag_link( $tag->term_id ) ) . '">' . __( $tag->name ) . '</a></span>';
        }
    }

    return trim( $output );
}

//引入自定义字段
require_once dirname(__FILE__) . '/inc/options-framework.php';
$optionsFile = locate_template('options.php');
load_template($optionsFile);
function prefix_options_menu_filter($menu)
{
    $menu['mode'] = 'submenu';
    $menu['page_title'] = __('Lycoris主题设置', 'textdomain');
    $menu['menu_title'] = __('Lycoris主题设置', 'textdomain');
    $menu['menu_slug'] = 'Lycoris主题设置';
    return $menu;
}

add_filter('optionsframework_menu', 'prefix_options_menu_filter');

//用户自定义头像功能，前提在设置-讨论开启头像显示
include (TEMPLATEPATH . '/inc/author-avatars.php');

// 设置站点图标
function custom_icon_url($url, $size, $blog_id)
{
    $site_icon_url = custom_option('site_icon');
    if ($site_icon_url) {
        $url = custom_option('site_icon');
    }
    return $url;
}
add_filter('get_site_icon_url', 'custom_icon_url', 10, 3);

// 替换评论class
function wpdocs_comment_reply_link_class( $class ) {
    if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) {
        $class = str_replace( 'class="comment-reply-login"', "class='comment-reply-login btn btn-primary btn-neutral pull-right'", $class );
    }else{
        $class = str_replace( "class='comment-reply-link'", "class='comment-reply-link btn btn-primary btn-neutral pull-right'", $class );
    }
    return $class;
}

add_filter( 'comment_reply_link', 'wpdocs_comment_reply_link_class' );

// 替换评论模板
function custom_comment($comment, $args, $depth) {
   ?>
    <div class="media" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
        <a class="pull-left" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
            <div class="avatar">
                <img class="media-object img-raised" src="<?php echo get_avatar_url($comment, $args);?>" alt="..."/>
            </div>
        </a>
        <div class="media-body">
            <h5 class="media-heading"><?php echo get_comment_author();?>
                <small class="text-muted">&middot;
                    <?php echo sprintf( __( '%s前' ), human_time_diff(get_comment_date( 'U', $comment ), current_time( 'timestamp' ) ) );?>
                </small>
            </h5>
            <?php if ($comment->comment_approved == '0') : ?><p>你的评论正在审核，稍后会显示出来！</p><?php endif; ?>
            <?php comment_text(); ?>
            <div class="media-footer" <?php echo $comment->comment_approved;?>>
                <?php
                if ($comment->comment_approved == '1') {
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'reply_text' => __('<i class="fa fa-paper-plane-o" aria-hidden="true"></i>  回复', 'textdomain'),
                            'login_text' => __('<i class="fa fa-paper-plane-o" aria-hidden="true"></i>  登录发言', 'textdomain'),
                            'add_below' => 'comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth']
                        )
                    )
                );} ?>
                <a href="#pablo" class="btn btn-danger btn-neutral pull-right">
                    <i class="fa fa-heart-o" aria-hidden="true"></i> 243
                </a>
            </div>
        </div>
    </div>
    <?php
}

// 评论字段排序
//Comment Field Order
add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );
function mo_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['url'] = $url_field;
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}

//数据库插入评论表单的qq字段
add_action('wp_insert_comment', 'custom_sql_insert_qq_field', 10, 2);
/**
 * 数据库插入评论表单的qq字段
 *
 * @param $comment_ID
 * @param $commmentdata
 */
function custom_sql_insert_qq_field($comment_ID, $commmentdata)
{
    $qq = isset($_POST['author_qq']) ? $_POST['author_qq'] : false;
    update_comment_meta($comment_ID, 'author_qq', $qq); // author_qq 是表单name值，也是存储在数据库里的字段名字
}

// 后台评论中显示qq字段
add_filter('manage_edit-comments_columns', 'add_comments_columns');
add_action('manage_comments_custom_column', 'output_comments_qq_columns', 10, 2);
function add_comments_columns($columns)
{
    $columns['author_qq'] = __('QQ号'); // 新增列名称
    return $columns;
}

function output_comments_qq_columns($column_name, $comment_id)
{
    switch ($column_name) {
        case "author_qq":
            // 这是输出值，可以拿来在前端输出，这里已经在钩子manage_comments_custom_column上输出了
            echo get_comment_meta($comment_id, 'author_qq', true);
            break;
    }
}
// 参考评论模板
function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
    <div class="comment-author vcard"><?php
    if ( $args['avatar_size'] != 0 ) {
        echo get_avatar( $comment, $args['avatar_size'] );
    }
    printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
    </div><?php
    if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php
    } ?>
    <div class="comment-meta commentmetadata">
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
            /* translators: 1: date, 2: time */
            printf(
                __('%1$s at %2$s'),
                get_comment_date(),
                get_comment_time()
            ); ?>
        </a><?php
        edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
    </div>

    <?php comment_text(); ?>

    <div class="reply"><?php
    comment_reply_link(
        array_merge(
            $args,
            array(
                'add_below' => $add_below,
                'depth'     => $depth,
                'max_depth' => $args['max_depth']
            )
        )
    ); ?>
    </div><?php
    if ( 'div' != $args['style'] ) : ?>
        </div><?php
    endif;
}

// 新增文章专栏
add_filter('manage_posts_columns' , 'add_article_column');
add_action('manage_posts_custom_column', 'output_article_column', 10, 2);
function add_article_column($columns) {
    $columns['article_column'] = __('文章专栏'); // 新增列名称
    return $columns;
}
function output_article_column($column, $post_id)
{
    switch ($column) {
        case "article_column":
            echo get_post_meta($post_id, '_sites_article_column', true);
            break;
    }
}

add_action('quick_edit_custom_box', 'io_add_quick_edit', 10, 2);

function io_add_quick_edit($column_name, $post_type)
{

    if ($column_name == 'article_column') {//值与前方代码对应

//请注意：<fieldset>类可以是：

//inline-edit-col-left，inline-edit-col-center，inline-edit-col-right

//所有列均为float：left，

//因此，如果要在左列，请使用clear：both元素

        echo '

<fieldset class="inline-edit-col-left" style="clear: both;">

<div class="inline-edit-col">

<label class="alignleft">

<span class="title">文章专栏</span>

<span class="input-text-wrap"><input type="text" name="article_column" class="ptitle" value=""></span>

</label>

<em class="alignleft inline-edit-or">&nbsp;&nbsp;&nbsp;&nbsp;分步骤的教程文章建议新增一个文章专栏</em>

</div>

</fieldset>';

    }
}

/**

 * 文章列表添加自定义字段

 */

add_action('save_post', 'io_save_quick_edit_data');

function io_save_quick_edit_data($post_id)
{

    // 如果是自动保存日志，并非我们所提交数据，那就不处理

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)

        return $post_id;

    // 验证权限，默认为 'post'

    if (!current_user_can('edit_post', $post_id))
        return $post_id;

    $post = get_post($post_id);

    // 'article_column' 与前方代码对应

    if (isset($_POST['article_column']) && ($post->post_type != 'revision')) {

        $left_menu_id = esc_attr($_POST['article_column']);

        if ($left_menu_id)

            update_post_meta($post_id, '_sites_article_column', $left_menu_id);// ‘_sites_article_column’为自定义字段

    }

}

/**

 * 文章列表添加自定义字段

 */

add_action('admin_footer', 'quick_edit_javascript');

function quick_edit_javascript()
{

    $current_screen = get_current_screen();


    if ($current_screen->id == 'edit-post') {

//修改下方 js 代码中的 article_column 为前方代码对应的值

        echo "

<script type='text/javascript'>

jQuery(function($){

var wp_inline_edit_function = inlineEditPost.edit;

inlineEditPost.edit = function( post_id ) {

wp_inline_edit_function.apply( this, arguments );

var id = 0;

if ( typeof( post_id ) == 'object' ) {

id = parseInt( this.getId( post_id ) );

}

if ( id > 0 ) {

var specific_post_edit_row = $( '#edit-' + id ),

specific_post_row = $( '#post-' + id ),

product_price = $( '.article_column', specific_post_row ).text();

$('input[name=\"article_column\"]', specific_post_edit_row ).val( product_price );

}

}

});

</script>";

    }

}