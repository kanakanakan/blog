<?php
#初期設定
function my_theme_support()
{
    add_theme_support('post-thumbnails'); #アイキャッチ画像の設定
    add_theme_support('title-tag'); #タイトルタグの出力
    add_theme_support('automatic-feed-links'); #RSSフィードの出力
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script')); #HTML5に変換
};

add_action('after_setup_theme', 'my_theme_support');

// キャッチフレーズをtitleタグ内から除去
function remove_title_tagline($title)
{
    if (isset($title['tagline'])) {
        unset($title['tagline']);
    }
    return $title;
}
add_filter('document_title_parts', 'remove_title_tagline');

#抜粋の文字数を指定
function custom_excerpt_length($length)
{
    return 60;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

#抜粋の文末文字を指定
function custom_excerpt_more($more)
{
    return ' ... ';
}
add_filter('excerpt_more', 'custom_excerpt_more');

#cssを追加
function my_style_output()
{
    wp_enqueue_style('reset', 'https://unpkg.com/modern-css-reset/dist/reset.min.css');
    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300;400;500&family=Noto+Sans+JP:wght@100..900&display=swap', array(), null);
    wp_enqueue_style('my-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_style_output');

#jsを追加
function my_script_output()
{
    wp_enqueue_script('my-script', get_theme_file_uri('/script.js'), array('jquery'), '1.0.0', true);
    //最後の値を「true」にするためには、他の値を省略できない
}
add_action('wp_enqueue_scripts', 'my_script_output');

// 固定ページを検索結果から除外
function search_pre_get_posts($query)
{
    if ($query->is_search() && $query->is_main_query() && ! $query->is_admin()) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts', 'search_pre_get_posts');
