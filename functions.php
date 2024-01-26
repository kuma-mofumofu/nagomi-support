<?php

 /* ===============================================
 # Cache Busting(キャッシュバスティング)
 =============================================== */
 function theme_enqueue_styles() {
  wp_enqueue_style(
   'mytheme-style',
   get_stylesheet_uri(),
   array(),
   wp_get_theme()->get( 'Version' )
  );
 }

 /* ===============================================
 # カスタムメニュー
 =============================================== */
 function register_my_menu() {
  register_nav_menu( 'main-menu','グローバル');
  register_nav_menu( 'footer-menu','フッターナビ');
 }
 add_action( 'after_setup_theme', 'register_my_menu' );

 /* ===============================================
 # 管理画面の「投稿」をお知らせに変更
 =============================================== */
 function Change_menulabel() {
  global $menu;
  global $submenu;
  $name = 'お知らせ';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name.'一覧';
  $submenu['edit.php'][10][0] = '新しい'.$name;
 }

 function Change_objectlabel() {
  global $wp_post_types;
  $name = 'お知らせ';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name.'の新規追加';
  $labels->edit_item = $name.'の編集';
  $labels->new_item = '新規'.$name;
  $labels->view_item = $name.'を表示';
  $labels->search_items = $name.'を検索';
  $labels->not_found = $name.'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
 }
 add_action( 'init', 'Change_objectlabel' );
 add_action( 'admin_menu', 'Change_menulabel' );

 /* ===============================================
 # archive.phpを作成
 =============================================== */
 function post_has_archive($args,$post_type){
  if('post' == $post_type){
   $args['rewrite'] = true;
   $args['has_archive'] = 'news';//スラッグ名
  }
  return $args;
 }
 add_filter('register_post_type_args','post_has_archive',10,2);

 /* ===============================================
 # ページごとの投稿表示数変更
 =============================================== */
 ////*  topページのお知らせ表示  ////
 function get_top_posts(){
  $args = array(
   'post_type' => 'post',
   'posts_per_page' => 4,
   'no_found_rows' => true,
  );
  $my_posts = get_posts($args);
  return $my_posts;
 }

 /* ================================================
 # 抜粋機能を固定ページに使えるように設定
 ================================================ */
 add_post_type_support( 'page','excerpt' );

 /* ===============================================
 # 抜粋文の文字数調整
 =============================================== */
 function cms_excerpt_more(){
  return '...';
 }
 add_filter( 'excerpt_more','cms_excerpt_more' );

 function cms_excerpt_length(){
  return 80;
 }
 add_filter( 'excerpt_mblength','cms_excerpt_length' );

 /* ===============================================
 # 特定の箇所の文字数調整をできるようにする為の関数
 =============================================== */
 function get_flexible_excerpt( $number ){
  $value = get_the_excerpt();
  $value = wp_trim_words( $value,$number,'...' );
  return $value;
 }

 /* ===============================================
 # ページタイトル
 =============================================== */
 function get_page_title(){
  if(is_page()):
   return get_the_title();
  endif;
 }
