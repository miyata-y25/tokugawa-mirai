<?php get_header(); ?>

<div class="report">
	<div class="inner">
		<div class="report-list">
			<?php
				$i = 1;
				wp_reset_query();
				$year = get_the_date( 'Y' );
				$week = array( "sun", "mon", "tue", "wed", "thu", "fri", "sat" );
				$args = array(
					'post_type' => 'report',
					'meta_key' => 'report_date',
					'orderby' => 'meta_value',
					'order' => 'DESC',
					'showposts' => 10,
					'paged' => $paged,
				);
				if (is_year()):
					$args = array_merge(
						 $args,
						 array(
							'order' => 'ASC',
							'date_query' => array(
									array(
										'year' => $year,
									), 
							),
						 )
					);
				endif; 
				query_posts($args);
				if (have_posts()) :
			?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="report-item">
				<a href="<?php the_permalink(); ?>">
					<figure>
					<?php if (has_post_thumbnail()) {
						$thumbnail_id = get_post_thumbnail_id($post->ID);
						$thumb_url = wp_get_attachment_image_src($thumbnail_id, 'large');
						echo '<img src="' . $thumb_url[0] . '" alt="">';
					} else {
						echo '<img src="' . get_template_directory_uri() . '/shared/img/common/report-thumb.png" alt="">';
					} ?>
					</figure>
					<div>
						<p class="ttl"><?php the_title(); ?></p>
						<time datetime="<?php echo get_the_time('Y-m-d'); ?>"><?=get_field('report_date')?> <?=$week[(new DateTime(get_field('report_date', false, false)))->format("w")]?></time>
						<?php if(!empty($post->post_content)) { ?>
						<p class="detail"><?php echo mb_substr(get_the_excerpt(),0,100) . '…'; ?></p>
						<?php } ?>
					</div>
				</a>
			</div>
			<?php endwhile; ?>
			<?php
				endif;
				wp_reset_query();
			?>
			<?php
				if (function_exists('wp_pagenavi')) wp_pagenavi();
				wp_reset_postdata();
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