<?php get_header(); ?>

      <section class="about">
        <h2 class="ttl-jp">
          <span class="jp">徳川みらい学会とは</span>
          <span class="en">About Us</span>
        </h2>
        <p>世界史上例をみない265年にも及ぶ平和の礎を築いた徳川家康公が薨去されてから、400有余年がたちました。<br>
          「徳川時代」の我が国は、「軍縮革命を実現した平和国家」で「究極の循環型社会」、そして「高度で洗練された文化の成熟期」でもありました。<br>
          この「徳川時代」を改めて研究し、その知恵や歴史的意義を未来の日本、そして世界へと発信するため、「徳川みらい学会」を設立いたしました。</p>
        <div class="btn">
          <a href="<?php echo esc_url(home_url()); ?>/about/" class="grey">詳しくはこちら</a>
        </div>
      </section>
      <section class="news">
        <h2 class="ttl-jp">
          <span class="jp">お知らせ</span>
          <span class="en">News & Topics</span>
        </h2>
        <?php
          $i = 1;
          wp_reset_query();
          $args = array(
            'post_type' => 'news',
            'showposts' => 5,
            'order' => 'DESC',
            'orderby' => 'date',
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
        <div class="btn">
          <a href="<?php echo esc_url(home_url()); ?>/news/">その他のお知らせはこちら</a>
        </div>
      </section>
      <section class="report">
        <h2 class="ttl-jp">
          <span class="jp">事業活動報告</span>
          <span class="en">Report</span>
        </h2>
        <?php
          $i = 1;
          wp_reset_query();
          $args = array(
            'post_type' => 'report',
            'showposts' => 4,
          );
          $week = array( "sun", "mon", "tue", "wed", "thu", "fri", "sat" );
          query_posts($args);
          if (have_posts()) :
        ?>
        <ul class="latest">
          <?php while (have_posts()) : the_post(); ?>
          <li>
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
              <p><?php the_title(); ?></p>
              <time datetime="<?php echo get_the_time('Y-m-d'); ?>"><?=get_field('report_date')?> <?=$week[(new DateTime(get_field('report_date', false, false)))->format("w")]?></time>
            </a>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php
          endif;
          wp_reset_query();
        ?>
        <?php
          $i = 1;
          wp_reset_query();
          $args = array(
            'post_type' => 'report',
            'showposts' => 3,
            'order' => 'DESC',
            'orderby' => 'date',
            'offset' => 4,
          );
          query_posts($args);
          if (have_posts()) :
        ?>
        <ul class="archive">
          <?php while (have_posts()) : the_post(); ?>
          <li>
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
              <div class="txt">
                <p><?php the_title(); ?></p>
                <time datetime="<?php echo get_the_time('Y-m-d'); ?>"><?=get_field('report_date')?> <?=$week[(new DateTime(get_field('report_date', false, false)))->format("w")]?></time>
              </div>
            </a>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php
          endif;
          wp_reset_query();
        ?>
        <div class="btn">
          <a href="<?php echo esc_url(home_url()); ?>/report/">その他の活動報告はこちら</a>
        </div>
      </section>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>