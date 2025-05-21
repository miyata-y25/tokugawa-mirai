<?php get_header(); ?>

<div class="news">
	<?php
		$i = 1;
		wp_reset_query();
		$args = array(
			'post_type' => 'news',
			'showposts' => 10,
			'order' => 'DESC',
			'orderby' => 'date',
			'paged' => $paged,
		);
		query_posts($args);
		if (have_posts()) :
	?>
	<div class="archive">
		<?php while (have_posts()) : the_post(); ?>
		<dl>
			<dt class="date"><time datetime="<?php echo get_the_time('Y-m-d'); ?>"><?php echo get_post_time('Y.n.j D'); ?></time></dt>
			<dt class="cate">
			<?php
				$terms = get_the_terms($post->ID, 'news_category');
				if ( $terms ) {
					foreach ( $terms as $term ) {
						echo $term->name;
					}
				}
			?>
			</dt>
			<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
		</dl>
		<?php endwhile; ?>
	</div>
	<?php
		endif;
		wp_reset_query();
	?>
	<?php
		if (function_exists('wp_pagenavi')) wp_pagenavi();
		wp_reset_postdata();
	?>
</div>

<?php get_footer(); ?>