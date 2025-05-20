    </main>

    <aside>
      <!-- div class="bnr-area">
        <a href="<?php echo esc_url(home_url()); ?>/tour"><img src="<?php echo get_template_directory_uri(); ?>/shared/img/common/bnr-tour.jpg" alt=""></a>
      </div -->

      <?php get_template_part('inc/regist');?>
      <?php if(!is_page('22')) { ?>
      <?php get_template_part('inc/member');?>
      <?php } ?>
    </aside>

    <footer>
      <div class="cnt">
        <div class="info">
          <p class="f-logo"><img src="<?php echo get_template_directory_uri(); ?>/shared/img/common/logo.svg" alt="徳川みらい学会"></p>
          <p>＜事務局＞<br>
            徳川みらい学会<br>
            〒420-0851 静岡県静岡市葵区黒金町20-8（静岡商工会議所内）<br>
            <!-- tel.054-284-9660（受付時間／平日 9:00〜17:00） --></p>
        </div>
        <nav>
          <div class="btn">
            <!-- a href="<?php echo esc_url(home_url()); ?>/event" class="white">この他イベント参加申込</a -->
            <a href="<?php echo esc_url(home_url()); ?>/info" class="white">お問い合わせ</a>
          </div>
          <ul>
            <li><a href="<?php echo esc_url(home_url()); ?>/">ホーム</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/about">徳川みらい学会とは</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/adviser">アドバイザー紹介</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/report">事業活動報告</a></li>
            <!-- li><a href="<?php echo esc_url(home_url()); ?>/tour">徳川みらい学会歴史探訪</a></li -->
            <li><a href="<?php echo esc_url(home_url()); ?>/list">法人賛助会員一覧</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/policy">プライバシーポリシー</a></li>
          </ul>
        </nav>
      </div>
      <div class="bnr">
        <ul>
          <li><a href="https://www.npo-homepage.go.jp/npoportal/detail/109000392" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/shared/img/common/foot-bnr01.png" alt="特定非営利活動法人歴史と文化のまち静岡"></a></li>
          <li><a href="https://scmh.jp/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/shared/img/common/foot-bnr02.png" alt="静岡市歴史博物館"></a></li>
          <li><a href="https://tokugawa-mirai.net/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/shared/img/common/foot-bnr03.png" alt="二峠六宿ユニークベニュー"></a></li>
        </ul>
      </div>
      <p class="copy">&copy; 2025 徳川みらい学会 All Rights Reserved.</p>
    </footer>

    <?php wp_reset_query(); ?>

    <!-- js -->
    <script src="<?php echo get_template_directory_uri(); ?>/shared/js/lib/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/shared/js/plugin/slick/slick.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/0.6.1/progressbar.min.js'></script>
    <script src="<?php echo get_template_directory_uri(); ?>/shared/js/common.js"></script>
    <script>
      $(".sp-menu").click(function () {
          $(this).toggleClass('active');
          $(this).next('.menu').toggleClass('open');
      });
      $(window).on('load resize', function(){
        var registrationW = $('.registration').innerWidth();
        if (window.matchMedia( "(max-width: 768px)" ).matches) {
          $('body').css('padding-right', '0px');
        } else {
          $('body').css('padding-right', registrationW);
        }
      });
    </script>
    <script>
      $(function(){
        $('.members-slide').slick({
          autoplay: true,
          autoplaySpeed: 0,
          speed: 8000,
          cssEase: "linear",
          slidesToShow: 5,
          swipe: false,
          arrows: false,
          pauseOnFocus: false,
          pauseOnHover: false,
          responsive: [
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
              }
            }
          ]
        });
      });
    </script>
    <?php if (is_front_page() || is_home()) { ?>
    <script id="rendered-js">
      function handleProgressbar() {
        const dotActiveItem = document.querySelector('.slider-dots .slick-active button');
        const progressCircleBar = new ProgressBar.Circle(dotActiveItem, {
          strokeWidth: 3,
          duration: 5000,
          color: '#fff',
          trailColor: '#888',
          trailWidth: 3,
          svgStyle: null
        });
        progressCircleBar.animate(1);
      }
      $('.main-slider .slides')
      .on("init", function () {
        $('.slick-slide[data-slick-index="0"]').children('picture').addClass("add-animation");
      })
      .slick({
        autoplay: true,
        dots: true,
        arrows: false,
        fade: true,
        speed: 1600,
        autoplaySpeed: 5000,
        pauseOnHover: false,
        appendDots: $('.slider-dots'),
        dotsClass: 'slider-dot',
      })
      .on({
        beforeChange: function (event, slick, currentSlide, nextSlide) {
        $(".slick-slide", this).eq(nextSlide).children('picture').addClass("add-animation");
        $(".slick-slide", this).eq(currentSlide).children('picture').addClass("remove-animation");
        },
        afterChange: function () {
          $('.remove-animation', this).removeClass('remove-animation add-animation');
        },
      });
      const dotEl = `<span class="slider-inner-dot"></span>`;
      $('.slider-dots button').html(dotEl);
      handleProgressbar();
      $('.main-slider .slides').on('beforeChange', (_event, _slick, _currentSlide, _nextSlide) => {
          $('.slider-dots .slick-active button').html(dotEl);
      });
      $('.main-slider .slides').on('afterChange', (_event, _slick, _currentSlide, _nextSlide) => {
          handleProgressbar();
      });
    </script>
    <?php } ?>
    <?php wp_footer(); ?>
  </body>
</html>