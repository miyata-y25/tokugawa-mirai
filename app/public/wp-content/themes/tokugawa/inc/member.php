<div class="members">
    <h2 class="ttl-jp">
    <span class="jp">法人賛助会員様</span>
    <span class="en">Corporate Members</span>
    </h2>
    <div class="members-slide">
    <?php if (have_rows('member_repeat',22)) : while (have_rows('member_repeat',22)) : the_row(); ?>
        <div><img src="<?php the_sub_field('member_logo'); ?>" alt="<?php the_sub_field('member_name'); ?>"></div>
    <?php
        endwhile;
        endif;
        wp_reset_query();
    ?>
    </div>
</div>
