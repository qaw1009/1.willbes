<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>모바일 윌비스 통합 사이트</title>

    <!-- CSS -->
    <!-- Slider jQuery -->
    <link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
    <!-- bootstrap-datepicker -->
    <link rel="stylesheet" href="/public/vendor/bootstrap/datepicker/css/bootstrap-datepicker.standalone.min.css">
    <!-- Custom Theme Style -->
    <link href="/public/css/willbes/basic.css" rel="stylesheet">
    <link href="/public/css/willbes/m/style.css" rel="stylesheet">
    <!--// CSS -->
    <!-- JAVASCRIPT -->
    <!-- jQuery -->
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
    <script src="/public/vendor/jquery/form/jquery.form.js"></script>
    <!--// JAVASCRIPT -->

    <!-- Custom Script -->
    <script>
        // Menu Script
        $(function() {
            $('.Menu_open').click(function() {
                $('.dim').show().css('display','block');
                $('#aside').addClass('on');
            });
        });
        $(function() {
            $('.Menu_close').click(function() {
                $('.dim').hide().css('display','none');
                $('#aside').removeClass('on');
            });
        });

        // Aside 아코디언 메뉴 Script
        $(function() {
            $('.ListBox .List').click(function() {

                $('.ListBox .List').removeClass('on')

                if ($(this).next().is(':visible')) {
                    $(this).next().slideUp('normal');
                    $(this).removeClass('on');

                } else {
                    $('.ListBox .List-Depth').slideUp('normal');
                    $(this).next().slideDown('normal');
                    $(this).addClass('on');

                }   
            });
        });

        // 열기, 닫기 버튼 Script
        $(function() {
            $('.willbes-Txt .MoreBtn a').click(function() {
                var $txt_info = $(this).parents('.willbes-Txt');

                if ($txt_info.hasClass('on')) {
                    $txt_info.removeClass('on');
                    $(this).text('닫기 ▲');

                } else {
                    $txt_info.addClass('on');
                    $(this).text('열기 ▼');
                }
            });
        });
        
        // 내강의실 온라인강좌 버튼 Script
        $(function() {
            $('.willbes-Open-Table .MoreBtn a').click(function() {
                var $lec_info_table = $(this).parents('.willbes-Open-Table').find('.openTable');

                if ($lec_info_table.is(':hidden')) {
                    $lec_info_table.show().css('visibility','visible');
                    $('.willbes-Open-Table .MoreBtn a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off.png');
                } else {
                    $lec_info_table.hide().css('visibility','hidden');
                    $('.willbes-Open-Table .MoreBtn a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on.png');
                }
            });
        });

        // Top fixed Script
        $(function() {
            $('*[id*=Fixbtn]:visible').each(function() {
                $(".goTopbtn").addClass('on');
            });
        });

        // Top Script
        function link_go() {
            $('html, body').animate({
                scrollTop: $("#goTop").offset().top
            }, 200);
        }
    </script>
</head>