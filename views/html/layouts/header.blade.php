<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>윌비스 통합 사이트</title>


    <!-- CSS -->
    <!-- Bootstrap -->
    <link href="/public/vendor/bootstrap/v.3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>

    
    <!-- Custom Theme Style -->
    <link href="/public/css/front/basic.css" rel="stylesheet">
    <link href="/public/css/front/style.css" rel="stylesheet">
    <!--/ CSS -->


    <!-- Script -->
    <script type='text/javascript'>
        //GNB 버튼 Script
        $(function() {
            $('.toggle-Btn a').click(function() {
                if( $("#Gnb").hasClass("Gnb-md") ) {
                    $(".NSK.Gnb-md").attr('class','NSK Gnb-sm');
                    $(".toggle-Btn").attr('class','toggle-Btn gnb-Open');
                    $(".toggle-Btn .Txt").text('열기');
                    $("#Gnb .logo img").attr('src','/public/img/front/gnb/logo_sm.gif')
                    $("#Gnb .setting img").attr('src','/public/img/front/gnb/icon_setting_sm.gif');
                    $("#Gnb .intro img").attr('src','/public/img/front/gnb/icon_intro_sm.gif');
                }
                else
                {
                    $(".NSK.Gnb-sm").attr('class','NSK Gnb-md');
                    $(".toggle-Btn").attr('class','toggle-Btn gnb-Close');
                    $(".toggle-Btn .Txt").text('숨김');
                    $("#Gnb .logo img").attr('src','/public/img/front/gnb/logo.gif');
                    $("#Gnb .setting img").attr('src','/public/img/front/gnb/icon_setting.gif');
                    $("#Gnb .intro img").attr('src','/public/img/front/gnb/icon_intro.gif');
                }
            });
        });

        // 로그인폼 Depth Script
        $(function() {
            $('.loginDepth .myLog .joinUs').hover(function() {
                if( $(".joinUs-Box").is(":hidden") ) {
                    $(".joinUs-Box").fadeIn(200);
                }
                else
                {
                    $(".joinUs-Box").fadeOut(200);
                }
            });
        });
        $(function() {
            $('.loginDepth .myLog .myPage').hover(function() {
                if( $(".myPage-Box").is(":hidden") ) {
                    $(".myPage-Box").fadeIn(200);
                }
                else
                {
                    $(".myPage-Box").fadeOut(200);
                }
            });
        });

        // GNB 아코디언 메뉴 Script
        $(function() {
            $('div.gnb-List-Tit').click(function() {
                
                $(this).siblings('.active')
                    .removeClass('active')

                if($(this).next().is(':visible')) {
                    $('div.gnb-List-Depth').slideUp('normal');
                    $(this).removeClass("active");

                } else {
                    $('div.gnb-List-Depth').slideUp('normal');    
                    $(this).next().slideDown('normal');
                    $(this).addClass("active"); 

                }
            });
        });

        // 교재정보 전체보기 버튼 Script
        $(function() {
            $('.willbes-Lec-Subject .MoreBtn a').click(function() {
                if( $(".willbes-Lec-Table").is(":hidden") ) {
                    $(".willbes-Lec-Table").css("display","block");
                    $(".willbes-Lec-Subject .MoreBtn a").text("교재정보 전체닫기 ▲");
                }
                else
                {
                    $(".willbes-Lec-Table").css("display","none");
                    $(".willbes-Lec-Subject .MoreBtn a").text("교재정보 전체보기 ▼");
                }
            });
        });
        
        // 교재정보 보기 버튼 Script
        $(function() {
            $('.willbes-Lec-Table .w-notice .MoreBtn a').click(function() {
                if( $("table.lecInfoTable").is(":hidden") ) {
                    $("table.lecInfoTable").css("display","block");
                    $(".willbes-Lec-Table .w-notice .MoreBtn a").text("교재정보 닫기 ▲");
                }
                else
                {
                    $("table.lecInfoTable").css("display","none");
                    $(".willbes-Lec-Table .w-notice .MoreBtn a").text("교재정보 보기 ▼");
                }
            });
        });

        // checkbox 결제 버튼 Script
        $(function() {
            $('.chk.buybtn input:checkbox').change(function(){
                if($(this).is(":checked")) {
                    $('.willbes-Lec-buyBtn-sm').addClass("active");
                } else {
                    $('.willbes-Lec-buyBtn-sm').removeClass("active");
                }
            });
        });

        // Tab Script : 단강좌 상세보기 텝
        function send(a){
            for (i=1; i<=2; i++){
                if (i == a){
                    document.getElementById("ch"+a).style.display='block';
                    document.getElementById("m"+a).className = "on";
                } else {
                    document.getElementById("ch"+i).style.display='none';
                    document.getElementById("m"+i).className = "";
                }
            }
        }

        // Tab Script : 교재상세정보 교재소개 텝
        function sendbook(a){
            for (i=1; i<=2; i++){
                if (i == a){
                    document.getElementById("book"+a).style.display='block';
                    document.getElementById("n"+a).className = "on";
                } else {
                    document.getElementById("book"+i).style.display='none';
                    document.getElementById("n"+i).className = "";
                }
            }
        }

        // 닫기 Script
        function closeWin(divID) {
            document.getElementById(divID).style.display = "none";
        }
        // 열기 Script
        function openWin(divID) {
            document.getElementById(divID).style.display = "block";  
        }
        // Top Script
        function goTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</head>