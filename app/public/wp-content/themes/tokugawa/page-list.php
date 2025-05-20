<?php
  /*
    Template Name: 法人賛助会員一覧
  */
  get_header();
?>

<div class="list">
  <div class="inner">
    <?php if (have_rows('member_repeat')) : ?>
    <ul>
      <?php while (have_rows('member_repeat')) : the_row(); ?>
      <li>
        <a href="<?php the_sub_field('member_url'); ?>" target="_blank">
          <figure><img src="<?php the_sub_field('member_logo'); ?>" alt="<?php the_sub_field('member_name'); ?>"></figure>
          <p><?php the_sub_field('member_name'); ?></p>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
    <?php
      endif;
      wp_reset_query();
    ?>
  </div>
</div>

<?php get_footer(); ?>