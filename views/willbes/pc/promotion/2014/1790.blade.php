@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:50px 0 !important;
            background:#ebebeb;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:1120px; margin:0 auto; padding:50px 0; background:#fff}

        /************************************************************/

        .evtMenu {background:#fff; width:100%;}

        .tabs {width:860px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:20%}
        .tabs li a {display:block; font-size:16px; height:50px; line-height:50px; color:#fff; background:#dcdcdc; 
            font-weight:bold; border-radius:30px; margin-right:5px; text-align:center}
        .tabs li a:hover,
        .tabs li a.active {background:#3c5cd9}
        .tabs li a img {margin-right:5px}
        .tabs li:last-child a {margin:0}
        .tabs:after {content:""; display:block; clear:both}

        .tabcts {}

        .fixed {position:fixed; width:1120px; margin:0 auto; background:rgba(255,255,255,0.8);
            box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10; padding:20px 0;
        }

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox">  
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_top.jpg" alt="" >
            </div> 

            <div class="evtMenu">
                <ul class="tabs">
                    <li><a href="#tab01" data-tab="tab01" class="top-tab"><img src="https://static.willbes.net/public/images/promotion/2020/09/1790_icon01.png">PC수강</a></li>
                    <li><a href="#tab02" data-tab="tab02" class="top-tab"><img src="https://static.willbes.net/public/images/promotion/2020/09/1790_icon02.png">모바일수강</a></li>
                    <li><a href="#tab03" data-tab="tab03" class="top-tab"><img src="https://static.willbes.net/public/images/promotion/2020/09/1790_icon03.png">교재구매</a></li>
                    <li><a href="#tab04" data-tab="tab04" class="top-tab"><img src="https://static.willbes.net/public/images/promotion/2020/09/1790_icon04.png">수강후기</a></li>
                    <li><a href="#tab05" data-tab="tab05" class="top-tab"><img src="https://static.willbes.net/public/images/promotion/2020/09/1790_icon05.png">인기강의</a></li>
                </ul>
            </div>  

            <div id="tab01" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_01.jpg" alt="" >           
            </div>

            <div id="tab02" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_02.jpg" alt="" >
            </div>

            <div id="tab03" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_03.jpg" alt="" >
            </div>

            <div id="tab04" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_04.jpg" alt="" >
            </div>

            <div id="tab05" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_05.jpg" alt="" usemap="#Map1790" border="0" >
                <map name="Map1790">
                  <area shape="rect" coords="161,245,414,583" href="https://njob.willbes.net/promotion/index/cate/3114/code/1564" target="_blank" alt="김정환">
                  <area shape="rect" coords="431,242,687,578" href="https://njob.willbes.net/promotion/index/cate/3114/code/1712" target="_blank" alt="안혜빈">
                  <area shape="rect" coords="705,244,959,581" href="https://njob.willbes.net/promotion/index/cate/3114/code/1566" target="_blank" alt="김경은">
                  <area shape="rect" coords="161,601,413,934" href="https://njob.willbes.net/promotion/index/cate/3114/code/1567" target="_blank" alt="정문진">
                  <area shape="rect" coords="433,599,687,930" href="https://njob.willbes.net/promotion/index/cate/3114/code/1755" target="_blank" alt="양원근">
                  <area shape="rect" coords="705,597,960,935" href="https://njob.willbes.net/promotion/index/cate/3114/code/1711" target="_blank" alt="이승기">
                  <area shape="rect" coords="160,1000,956,1489" href="https://njob.willbes.net/promotion/index/cate/3114/code/1626" target="_blank" alt="웰컴팩">
                </map>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">  
        /*스크롤고정*/
        $(function() {
            var nav = $('.evtMenu');
            var navTop = nav.offset().top+100;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 100);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });     


        $(window).on('scroll', function() {
            $('.top-tab').each(function() {
                if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                    $('.top-tab').removeClass('active')
                    $(this).addClass('active');
                }
            });
        });
    </script>
@stop