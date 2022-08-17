<?php
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'other', get_theme_file_uri( '/assets/css/other.css' ) );
    wp_enqueue_style( 'font-awesome', 'https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css' );
    wp_enqueue_script( 'customize',  get_theme_file_uri( '/assets/js/customize.js' ), array(), '1.0.0', true );
    wp_enqueue_script( 'other',  get_theme_file_uri( '/assets/js/other.js' ), array(), '1.0.0', true );
}
// 添加CSS与JS
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