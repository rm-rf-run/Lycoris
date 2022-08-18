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
        $attributes .= ' class=" menu-link ' . ( $depth > 0 ? 'dropdown-item sub-menu-link' : 'nav-link dropdown-toggle main-menu-link' ) . '" ' . ( $depth > 0 ? '':'id="navbarDropdownMenuLink" data-toggle="dropdown" aria-expanded="true"' ) . '';

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
