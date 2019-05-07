@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_top {background:#3d3f3d url(https://static.willbes.net/public/images/promotion/2019/05/1076_top_01_bg.jpg) no-repeat center top; position:relative}

        .wb_cts00 {background:#fff; padding-bottom:100px}
        .wb_cts00 iframe {width:870px; height:480px;}
        .wb_cts00 li:last-child {
            margin-top:10px;
        }

        .wb_cts01 {background:#2a2a2a}


        /* 탭 */
        .tabContaier01{padding-top:20px; padding-bottom:170px}
        .tabContaier01 ul {width:100%; text-align:center; margin:0 auto}
        .tabContaier01 li {display:inline; float:left; margin-bottom:20px}
        .tabContaier01 a img.off {display:block}
        .tabContaier01 a img.on {display:none}
        .tabContaier01 a.active img.off {display:none}
        .tabContaier01 a.active img.on {display:block}

        .wb_cts02 {background:#fff}
        .tabContaier{width:100%; text-align:center}
        .tabContaier ul {margin:0 auto; background:#404e5b; width:1210px}
        .tabContaier li {display:inline; float:left}
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#34372e url(https://static.willbes.net/public/images/promotion/2019/05/1076_06_bg.jpg) repeat;}

        .wb_cts04 {background:#ebeb36 url(https://static.willbes.net/public/images/promotion/2019/05/EV180718_c2_bg.jpg) repeat-x center top}
        .bannerImg3 {position:relative; width:980px; margin:0 auto; background:#ebeb36; padding-bottom:100px}
        .bannerImg3 p {position:absolute; top:45%; width:30px; z-index:90;}
        .bannerImg3 img {width:100%}
        .bannerImg3 p a {cursor:pointer}
        .bannerImg3 p.leftBtn3 {left:5%}
        .bannerImg3 p.rightBtn3 {right:5%}
        .wb_cts04 ul:after {content:""; display:block; clear:both}

        .wb_cts05 {background:#fff}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:261px;
            z-index:10;
        }

        /*타이머*/
        .time {width:100%; text-align:center; background:#e1e1e1}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:80%}
        .time .time_txt {font-size:28px; color:#000; letter-spacing: -1px; font-weight:bold}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        } 
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        {{--
        <div class="skybanner">
            <div>
                <!-- a href="javascript:alert('마감되었습니다.');" /-->
                <a href="#event">
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/EV180718_c12.png" alt="윌비스 문병일 사회" >
                </a>
            </div>
        </div>
        --}}

        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>
                    <td class="time_txt"><span>5/15(수) </span>마감!</td>
                    <td class="time_txt">마감까지<br><span>남은 시간은</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1076_top_01.png" alt="사회, 만점으로 가는 매직로드 문병일 사회 "/><br>
            <a href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/153338" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1076_top_02.gif" alt="신청하기"  /></a>
        </div><!--WB_top//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1076_01.jpg" alt="윌비스 문병일 사회 더 강하고 새로워진 압축 커리큘럼으로 진화했습니다."/>
        </div>

        <div class="evtCtnsBox wb_cts04" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1076_02.jpg" alt="윌비스 문병일 사회 더 강하고 새로워진 압축 커리큘럼으로 진화했습니다."/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1076_03_1.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1076_03_2.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1076_03_3.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1076_03_4.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1076_03_5.jpg" alt=""/></li>
                </ul>
                <p class="leftBtn3"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_gosi/com_img/arrow01_1.png"></a></p>
                <p class="rightBtn3"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_gosi/com_img/arrow01_2.png"></a></p>
            </div>
        </div><!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts00" >
            <ul>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1076_04.jpg" alt="윌비스 문병일 효율적 경제 학습, 고득점 사회 완성!"  ></li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1076_05_1.gif" alt="" style="padding-right:10px;">
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1076_05_2.gif" alt=""></li>
                <li>
                    <iframe src="https://www.youtube.com/embed/iku-4RrvuDE?rel=0" frameborder="0" allowfullscreen></iframe>
                </li>
            </ul>
        </div><!--WB_cts00//-->

        <div class="evtCtnsBox wb_cts03" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1076_06.jpg" alt="윌비스 문병일 사회, 만점으로 가는 매직로드" usemap="#Map180719_c2" border="0" />
            <map name="Map180719_c2" >
                <area shape="rect" coords="723,773,971,913" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/153338" onfocus="this.blur();" target="_blank" />
            </map>
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts05">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1076_07.jpg" alt="영어 김영교수 선행반 수강신청 바로가기 " />
        </div><!--wb_cts05//-->

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:5000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:980,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

        /*타이머*/
        var DdayDiff = { //타이머를 설정합니다.
            inDays: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
            },

            inWeeks: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return parseInt((tt2-tt1)/(24*3600*1000*7));
            },

            inMonths: function(dd1, dd2) {
                var dd1Y = dd1.getFullYear();
                var dd2Y = dd2.getFullYear();
                var dd1M = dd1.getMonth();
                var dd2M = dd2.getMonth();

                return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
            },

            inYears: function(dd1, dd2) {
                return dd2.getFullYear()-dd1.getFullYear();
            }
        }

        function daycountDown() {
            // 한달 전 날짜로 셋팅
            event_day = new Date(2019,4,9,23,59,59);
            now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));

            var Monthleft = event_day.getMonth() - now.getMonth();
            var Dateleft = DdayDiff.inDays(now, event_day);
            var Hourleft = timeGap.getHours();
            var Minuteleft = timeGap.getMinutes();
            var Secondleft = timeGap.getSeconds();

            //alert(Monthleft+"-"+Dateleft+"-"+Hourleft+"-"+Minuteleft+"-"+Secondleft)

            if((event_day.getTime() - now.getTime()) > 0) {
                $("#dd1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Dateleft/10) + ".png");
                $("#dd2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Dateleft%10) + ".png");

                $("#hh1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Hourleft/10) + ".png");
                $("#hh2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Hourleft%10) + ".png");

                $("#mm1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Minuteleft/10) + ".png");
                $("#mm2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Minuteleft%10) + ".png");

                $("#ss1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Secondleft/10) + ".png");
                $("#ss2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Secondleft%10) + ".png");
                setTimeout(daycountDown, 1000);
            }
            else{
                $("#newTopDday").hide();
            }

        }
        daycountDown();
    </script>
@stop