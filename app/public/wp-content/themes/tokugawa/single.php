<?php get_header(); ?>

<div class="lContainer -subPage -noTitle -topic">
    <div class="mContainer -first">
        <div class="innerS">
            <section class="topLabel">
                <span class="en">News & Event</span>
                <h1 class="jp"><?php the_title(); ?></h1>
                <div class="detail">
                    <ul class="categoryList">
                        <?php if($post->post_type == 'important') { ?>
                            <li class="important">重要なお知らせ</li>
                        <?php } else { ?>
                            <?php
                                $terms = get_the_terms($post->ID, 'topics_cate');
                                foreach ($terms as $term) {
                                    if ($term) {
                                        echo '<li class="' . $term->slug . '">';
                                        echo $term->name;
                                        echo '</li> ';
                                    }
                                }
                            ?>
                        <?php } ?>
                    </ul>
                    <!-- time datetime="<?php echo get_the_time('Y-m-d'); ?>"><?php echo get_the_time('Y.m.d'); ?></time -->
                </div>
            </section>
            <section class="wpText">
              <?php the_content(); ?>
            </section>
            <div class="btnArea">
                <a href="<?php echo esc_url(home_url()); ?>/topics/" class="basicBtn -back -navy"><span>お知らせ一覧へ戻る</span></a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>