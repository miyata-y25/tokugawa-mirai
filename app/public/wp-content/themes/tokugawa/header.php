<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no,address=no,email=no" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/shared/img/common/favicon.ico" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/shared/js/plugin/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/shared/js/plugin/slick/slick-theme.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/shared/css/base.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/shared/css/page.css" />

    <?php wp_head(); ?>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M4LG35GYXY"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-M4LG35GYXY');
    </script>

    <!-- Google Tag Manager 250228 -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PKB3FKDK');</script>
    <!-- End Google Tag Manager -->

  </head>

  <body>
    <!-- Google Tag Manager (noscript) 250228 -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PKB3FKDK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="registration">
      <a href="<?php echo esc_url(home_url()); ?>/about/#infomation">
        <h3>入会のご案内はこちら</h3>
        <div class="line"></div>
        <span>Member Registration</span>
      </a>
    </div>

    <header>
      <?php if (is_front_page() || is_home()) { ?>
      <nav class="home">
        <h1 class="h-logo"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/shared/img/common/logo.svg" alt="徳川みらい学会"></a></h1>
        <?php } else { ?>
          <nav>
        <p class="h-logo"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/shared/img/common/logo.svg" alt="徳川みらい学会"></a></p>
      <?php }?>
        <button class="sp-menu">
          <span class="bars"></span>
          MENU
        </button>
        <div class="menu">
          <ul>
            <li><a href="<?php echo esc_url(home_url()); ?>">ホーム</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/about">徳川みらい学会とは</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/report">事業活動報告</a></li>
            <!-- li class="spShow"><a href="<?php echo esc_url(home_url()); ?>/tour">徳川みらい学会歴史探訪</a></li -->
            <li><a href="<?php echo esc_url(home_url()); ?>/adviser">アドバイザー紹介</a></li>
            <li class="spShow"><a href="<?php echo esc_url(home_url()); ?>/list">法人賛助会員一覧</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/info">お問い合わせ</a></li>
          </ul>
        </div>
      </nav>
      <?php if (is_front_page() || is_home()) { ?>
      <div class="main-slider">
        <div class="slides">
        <?php if (have_rows('slide_repeat',39)) : while (have_rows('slide_repeat',39)) : the_row(); ?>
          <div class="slide-item">
            <div class="slide-txt">
              <p class="jp"><?php echo get_sub_field('slide_copy_jp'); ?></p>
              <p class="en"><?php echo get_sub_field('slide_copy_en'); ?></p>
            </div>
            <picture>
              <source media="(max-width:767px)" srcset="<?php echo get_sub_field('slide_img_sp'); ?>" type="image/jpg">
              <img src="<?php echo get_sub_field('slide_img'); ?>" alt="">
            </picture>
          </div>
        <?php
          endwhile;
          endif;
          wp_reset_query();
        ?>
        </div>
        <div class="slider-dots"></div>
      </div>
      <?php } else { ?>
      <h1 class="ttl">
        <?php if (is_page()) { ?>
        <span class="jp"><?php the_title(); ?></span>
        <span class="en"><?php echo get_field('ttl_en'); ?></span>
        <?php } elseif (is_post_type_archive('report') || is_singular('report')) { ?>
        <span class="jp">事業活動報告</span>
        <span class="en">Report</span>
        <?php } elseif (is_post_type_archive('tour') || is_tax('tour_tag')) { ?>
        <span class="jp">徳川みらい学会歴史探訪</span>
        <span class="en">Tokugawa Mirai Society History Tour</span>
        <?php } elseif (is_singular('tour')) { ?>
        <time data-time="y-m-d"><?php echo get_post_time('Y.n.j D'); ?></time>
        <span class="jp"><?php the_title(); ?></span>
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
        <?php }  ?>
      </h1>
      <?php } ?>
    </header>

    <?php if (is_front_page() || is_home()) { ?>
    <main class="home">
    <?php } else { ?>
    <main class="sub">
    <?php } ?>