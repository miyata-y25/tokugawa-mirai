<?php get_header(); ?>

<div class="tour">
	<h2>
		<?php
			$term = get_queried_object();
			echo '<span>#' . $term->name . '</span>にまつわる記事';
		?>
	</h2>
	<div class="inner">
		<div class="tour-list">
			<?php
				$i = 1;
				wp_reset_query();
				$args = array(
					'post_type' => 'tour',
					'order' => 'DESC',
					'showposts' => 9,
					'paged' => $paged,
					'tax_query' => array(
							array(
									'taxonomy' => 'tour_tag',
									'field' => 'slug',
									'terms' => $term,
							)
					)
				);
				$week = array( "sun", "mon", "tue", "wed", "thu", "fri", "sat" );
				query_posts($args);
				if (have_posts()) :
			?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="tour-item">
				<time data-time="y-m-d"><?php echo get_post_time('Y.n.j D'); ?></time>
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
				</a>
				<p class="ttl"><?php the_title(); ?></p>
				<?php
					$terms = get_the_terms($post->ID, 'tour_tag');
					if ( $terms ) {
						echo '<ul class="tag">';
						foreach ( $terms as $term ) {
							echo '<li><a href="'.get_term_link($term).'">#';
							echo $term->name;
							echo '</a></li>';
						}
						echo '</ul>';
					}
				?>
			</div>
			<?php endwhile; ?>
			<?php
				endif;
				wp_reset_query();
			?>
		</div>
		<?php
			if (function_exists('wp_pagenavi')) wp_pagenavi();
			wp_reset_postdata();
		?>
	</div>
</div>

<?php get_footer(); ?>