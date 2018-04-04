<?php
/**
 * Created by PhpStorm.
 * User: QQBook.inc
 * Date: 15/03/2018
 * Time: 11.36
 */
$js = <<< JS

    $('.animate').scrolla({
      mobile: true, // disable animation on mobiles
      once: true // only once animation play on scroll
    });
  
    /* vertical center */
    $('.vcenter').flexVerticalCenter({
      cssAttribute: 'padding-top'
    });

    /* foundation main */
    $(document).foundation();
    $('.off-canvas a').on('click', function () {
      $('.off-canvas').foundation('close');
    });

    // career page collapse
    $('.career-item_header-button').click(function () {
      $(this).parent().parent().find('.career-item_content').slideToggle('active');
    });

    // owl carousel
    $(document).ready(function () {
      $('.main-slide').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      });

      $('.team-slide').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        },
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
          '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ]
      });
    });

    $('.owl-slider-01').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 1,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-02').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 1,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-03').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 1,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-04').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 1,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-05').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 1,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-logo').owlCarousel({
      nav: true,
      autoplaySpeed: 300,
      items: 5,
      navSpeed: 400,
      navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>'],
      responsiveClass: true,
      responsive: {
        0: {
          items: 2,
          nav: true
        },
        600: {
          items: 2,
          nav: false
        },
        1000: {
          items: 5,
          nav: true,
          loop: false
        }
      }
    });
    
JS;
$this->registerJs($js);
?>