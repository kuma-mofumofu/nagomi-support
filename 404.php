<?php get_header(); ?>

 <div id="error">
  <?php get_template_part('parts/header'); ?>

  <main>
   <div class="container">
    <h2>ページが見つかりませんでした</h2>
    <p>
      アクセスしようとしたページは存在しないかURLが変更されています。<br>
      お手数をおかけしますが、トップページから再度アクセスをお願いいたします。
    </p>
    <p>
     <a href="<?php echo esc_url( home_url() ); ?>">トップページへ</a>
    </p>
   <div><!-- /.container -->
  </main>

 </div><!-- /#error -->
<?php get_footer(); ?>
