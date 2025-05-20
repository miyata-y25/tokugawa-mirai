//印刷時の見た目をPCに揃える
window.addEventListener('beforeprint', (event) => {});

//sp menu
$(document).ready(function () {
  $('.spBtn').on('click', function () {
    $(this).toggleClass('active');
    $('#drawer').toggleClass('active');
    $('body').toggleClass('noScrolled');
  });

  $('#drawer a').on('click', function () {
    $('#drawer').toggleClass('active');
    $('.spBtn').toggleClass('active');
    $('body').toggleClass('noScrolled');
  });
});

//ページ内リンクの調整
$(function () {
  var headerHeight = 100; //固定ヘッダーの高さを入れる
  $('[href^="#"]').click(function () {
    var href = $(this).attr('href');
    var target = $(href == '#' || href == '' ? 'html' : href);
    var position = target.offset().top - headerHeight;
    $('html, body').animate({ scrollTop: position }, 500, 'swing');
    return false;
  });
});

// スクロールでヘッダー内容変更
$(function () {
  $(window).on('scroll', function () {
    const sliderHeight = $('.content').height();
    if (sliderHeight < $(this).scrollTop()) {
      $('.js-header').addClass('scroll');
    } else {
      $('.js-header').removeClass('scroll');
    }
  });
});
