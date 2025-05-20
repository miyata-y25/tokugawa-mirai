<?php get_header(); ?>

<div class="tour">
	<div class="inner">
		<div class="layouts">
		<?php if( have_rows('cnt') ): ?>
			<?php while ( have_rows('cnt') ) : the_row(); ?>
			
				<?php if( get_row_layout() == 'head2' ): //見出し大 ?>
				<h2>
					<?php echo get_sub_field('acf_h2'); ?>
				</h2>

				<?php elseif( get_row_layout() == 'head3' ): //見出し小 ?>
				<h3>
					<?php echo get_sub_field('acf_h3'); ?>
				</h3>

				<?php elseif( get_row_layout() == 'image' ): //画像(単体) ?>
				<div class="img_only">
					<figure>
						<img src="<?php echo get_sub_field('acf_img'); ?>" alt="">
					</figure>
				</div>
				
				<?php elseif( get_row_layout() == 'images' ): //画像(複数) ?>
				<div class="img_col">
					<?php
						$images = get_sub_field('acf_img_col');
						if( $images ):
					?>
					<?php foreach( $images as $image ): // ループ処理の開始 ?>
					<figure>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					</figure>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>
				
				<?php elseif( get_row_layout() == 'paragraph' ): //文章 ?>
				<div class="txt_only">
					<p class="txt"><?php echo get_sub_field('acf_p'); ?></p>
				</div>

				<?php elseif( get_row_layout() == 'img-txt' ): //画像＋文章 ?>
				<div class="img_txt">
					<figure>
						<img src="<?php echo get_sub_field('acf_img'); ?>" alt="">
					</figure>
					<p class="txt">
						<?php echo get_sub_field('acf_p'); ?>
					</p>
				</div>

				<?php elseif( get_row_layout() == 'txt-img' ): //文章＋画像 ?>
				<div class="txt_img">
					<p class="txt">
						<?php echo get_sub_field('acf_p'); ?>
					</p>
					<figure>
						<img src="<?php echo get_sub_field('acf_img'); ?>" alt="">
					</figure>
				</div>

				<?php elseif( get_row_layout() == 'txt-txt' ): //文章＋画像 ?>
				<div class="txt_txt">
					<p class="txt">
						<?php echo get_sub_field('acf_clmn'); ?>
					</p>
				</div>

				<?php elseif( get_row_layout() == 'btn' ): //ボタン ?>
				<div class="btn">
					<a href="<?php echo get_sub_field('btn_url'); ?>" style="background-color: <?php echo get_sub_field('btn_color'); ?>; max-width: <?php echo get_sub_field('btn_size'); ?>%;">
						<?php echo get_sub_field('btn_label'); ?>
					</a>
				</div>

				<?php elseif( get_row_layout() == 'line' ): //区切り線 ?>
				<hr size="1" style="width: <?php echo get_sub_field('line_length'); ?>%; background-color: <?php echo get_sub_field('line_color'); ?>;" noshade>
				
				<?php endif; ?>
			
			<?php endwhile; ?>
			<?php endif; ?>
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

<?php get_footer(); ?>