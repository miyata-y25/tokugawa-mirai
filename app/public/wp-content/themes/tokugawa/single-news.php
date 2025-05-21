<?php get_header();
$week = array( "sun", "mon", "tue", "wed", "thu", "fri", "sat" );
?>

<div class="news">
	<div class="inner">
		<div class="news-single">
			<div class="ttl">
				<h2><?php the_title(); ?></h2>
				<time datetime="<?php echo get_the_time('Y-m-d'); ?>"><?php echo get_post_time('Y.n.j D'); ?></time>
			</div>
			<?php if (get_field('news_outline')): ?>
			<div class="overview">
				<?php echo get_field('news_outline'); ?>
			</div>
			<?php endif; ?>
			<div class="comment">
				<?php the_content(); ?>
			</div>
			<?php
				the_post_navigation( array(
					'prev_text' => '%title', // 次の記事のリンクテキスト変更
					'next_text' => '%title', // 前の記事のリンクテキスト変更
					'class' => 'post-nav' // お好きなクラス名をココに
				));
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>