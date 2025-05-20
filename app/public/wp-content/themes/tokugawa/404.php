<?php get_header(); ?>

  <div class="page404">
    <div class="wpText" style="text-align: center">
      <h2>Page Not Found.</h2>
      <p>当ウェブサイトをご利用いただき、ありがとうございます。<br>
      あなたがアクセスしようとしたページは削除されたかURLが変更されているため、見つけることができません。<br>
      <a href="<?php echo home_url(); ?>">HOME</a> から再度アクセスしてください。</p>
      <p class="en">Thank you for visiting our website.<br>
      The page you tried to access cannot be found because it has been deleted or its URL has been changed.<br>
      Please access again from <a href="<?php echo home_url(); ?>">HOME</a>.</p>
      <div class="btn">
        <a href="#" onclick="history.back(-1);return false;">前のページへ戻る</a>
      </div>
    </div>
  </div>

<?php get_footer(); ?>