<!DOCTYPE html>
<html <?php language_attributes(); ?>>

 <head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <title>
   <?php
    if ( !is_front_page() ) {
     wp_title( '::', true, 'right' );
    }
    bloginfo( 'name' );
   ?>
  </title>

  <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
  <!-- 管理画面の「設定 > 一般」で設定された「キャッチフレーズ」を表示する -->

  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <link rel="shortcut icon" href="<?php echo get_theme_file_uri('/images/favicon.png'); ?>" /> -->
  <link rel='stylesheet' href='<?php bloginfo('stylesheet_url');?>?ver=<?php echo date("His") ?>'/><!-- Cache Busting(キャッシュバスティング -->
  <link rel="stylesheet" href="<?php echo get_theme_file_uri('/css/reset.css'); ?>" />
  <link rel="stylesheet" href="<?php echo get_theme_file_uri('/css/style.css?'); ?>" />
  <title><?php echo esc_html( wp_get_document_title() ); ?></title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?php echo get_theme_file_uri('/js/script.js'); ?>"></script>
   

   <?php wp_head(); ?>
 </head>
 <body>