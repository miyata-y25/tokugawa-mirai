<?php get_header();
$week = array( "sun", "mon", "tue", "wed", "thu", "fri", "sat" );
?>

<div class="report">
	<div class="inner">
		<div class="report-single">
			<div class="ttl">
				<h2><?php the_title(); ?></h2>
				<time datetime="<?php echo get_the_time('Y-m-d'); ?>"><?=get_field('report_date')?> <?=$week[(new DateTime(get_field('report_date', false, false)))->format("w")]?></time>
			</div>
			<figure>
				<?php if (has_post_thumbnail()) {
					$thumbnail_id = get_post_thumbnail_id($post->ID);
					$thumb_url = wp_get_attachment_image_src($thumbnail_id, 'large');
					echo '<img src="' . $thumb_url[0] . '" alt="">';
				} ?>
			</figure>
			<?php if (get_field('report_outline')): ?>
			<div class="overview">
				<?php echo get_field('report_outline'); ?>
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
		<aside>
			<h3>過去の活動</h3>
			<ul>
				<?php // 年別アーカイブリストを表示
					$year=NULL; // 年の初期化
					$args = array( // クエリの作成
						'post_type' => 'report', // 投稿タイプの指定
						'orderby' => 'date', // 日付順で表示
						'posts_per_page' => -1 // すべての投稿を表示
					);
					$the_query = new WP_Query($args); if($the_query->have_posts()){ // 投稿があれば表示
						while ($the_query->have_posts()): $the_query->the_post(); // ループの開始
							if ($year != get_the_date('Y')){ // 同じ年でなければ表示
								$year = get_the_date('Y'); // 年の取得
								echo '<li><a href="'.home_url( '/', 'http' ).'report/'.$year.'">'.$year.'年</a></li>'; // 年別アーカイブリストの表示
							}
						endwhile; // ループの終了
						wp_reset_postdata(); // クエリのリセット
					}
				?>
			</ul>
		</aside>
	</div>
</div>

<?php get_footer(); ?>