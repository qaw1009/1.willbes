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
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; top:280px;right:0;z-index:10;}

        .evt00 {background:#404040}        
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/04/1624_top_bg.jpg) no-repeat center top;}             

        .evt01 {background:#4e4e4e}   
        .evt01 > div {position:relative; width:1120px; margin:0 auto}
        .evt01 div div span {position:absolute; top:256px; left:720px; width:103px; z-index:1}
        .evt01 div div span:last-child {left:822px}    
        
        .evt02 {background:#363636 url(https://static.willbes.net/public/images/promotion/2020/04/1624_02.jpg) no-repeat center top;}   

        .slide_con1 {position:relative; width:900px; margin:0 auto; padding-top:450px;padding-bottom:50px;}
        .slide_con1 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con1 img {width:100%;}
        .evtCtnsBox p a {cursor:pointer}
        .evtCtnsBox p.leftBtn1 {left:-31px; top:70%; width:62px; height:62px; margin-top:-31px;opacity:0.9; filter:alpha(opacity=90);}
        .evtCtnsBox p.rightBtn1 {right:-31px;top:67%; width:62px; height:62px;  margin-top:-31Dpx;opacity:0.9; filter:alpha(opacity=90);}
        
        .evt03 {background:#212121}
        .evt04 {width:1120px; margin:0 auto; background:#fff; font-size:16px; text-align:left; padding-bottom:100px}
        .evt04 p {margin-top: 30px;font-size: 18px;color: #b59775;font-weight: bold;height:50px; line-height:50px; border-bottom:1px solid #e4e4e4;}
        .evt04 ul {background:#fff;}
        .evt04 ul li {height:50px; line-height:50px; border-bottom:1px solid #e4e4e4;font-weight:bold; padding:0 20px}
        .evt04 ul li a {display:inline-block; width:100px; color:#fff; background:#000; text-align:center; float:right; height:30px; line-height:30px; margin-top:10px;border-radius:15px;font-weight:bold;}
        .evt04 ul li a:hover {background:#b59775}
        .evt04 ul li:first-child {background:#fda209; text-align:center; color:#fff}
        .evt04 ul li:first-child a {background:none}
    </style>

<div class="p_re evtContent NGR" id="evtContainer">
    <div class="skyBanner">
        <a href="#lecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/04/1624_sky.jpg"></a>
    </div>

    <div class="evtCtnsBox evt00">
        <img src="https://static.willbes.net/public/images/promotion/2020/04/1624_00.jpg"> 
    </div>
    
    <div class="evtCtnsBox evtTop">
        <div class="evtInmg">    
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1624_top.jpg" title="3단계 파이널 실전모의고사">    
        </div>
	</div>	

    <div class="evtCtnsBox evt01">
        <div> 
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1624_01.jpg">
            <div id="ddaytime">
                <span><img src="https://static.willbes.net/public/images/promotion/2019/04/1203_num0.png" title="숫자" id="dd1"></span>
                <span><img src="https://static.willbes.net/public/images/promotion/2019/04/1203_num0.png" title="숫자" id="dd2"></span>
            </div>           
        </div>
    </div>

	<div class="evtCtnsBox evt02">
        <div class="slide_con1">
            <ul id="slidesImg1">
                <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1624_03_s01.jpg" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1624_03_s02.jpg" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1624_03_s03.jpg" alt=""/></li>              
            </ul>
            <p class="leftBtn1"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/2020/04/1624_left_btn.png"></a></p>
            <p class="rightBtn1"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/2020/04/1624_right_btn.png"></a></p>
        </div>
    </div>
    
    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/04/1624_04.jpg">
    </div>    
    
    <div class="evtCtnsBox evt04" id="lecbuy">
    <img src="https://static.willbes.net/public/images/promotion/2020/04/1624_05.jpg">
        <ul>
            <li>
                강의명
                <a>온라인</a>
            </li>
            <li>
                2020년 1차대비 신광은 형사소송법 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164467" target="_blank">수강신청</a>
            </li>
            <li>
                2020년 1차대비 김원욱 형법 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164473" target="_blank">수강신청</a>
            </li>
            <li>
                2020년 1차대비 장정훈 경찰학개론 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164471" target="_blank">수강신청</a>
            </li>
            <li>
                2020년 1차대비 하승민 영어 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164481" target="_blank">수강신청</a>
            </li>
            <li>
                2020년 1차대비 오태진 한국사 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164479" target="_blank">수강신청</a>
            </li>
            <li>
                2020년 1차대비 원유철 한국사 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164477" target="_blank">수강신청</a>
            </li>
            <li>
                2020년 1차대비 3단계 파이널 종합반
                <a href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1009" target="_blank">수강신청</a>
            </li>
        </ul> 
        <div class="mt20 tx-right"> *종합반 구매시 한국사 원/오 택1</div>     
    </div>
</div>
<!-- End Container -->
<script type="text/javascript">
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
        };

        function daycountDown() {
            // 한달 전 날짜로 셋팅
            var event_day = new Date(2020,4,30,23,59,59);
            var now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));

            var Monthleft = event_day.getMonth() - now.getMonth();
            var Dateleft = DdayDiff.inDays(now, event_day);
            var Hourleft = timeGap.getHours();
            var Minuteleft = timeGap.getMinutes();
            var Secondleft = timeGap.getSeconds();

            if((event_day.getTime() - now.getTime()) > 0) {
                $("#dd1").attr("src", "https://static.willbes.net/public/images/promotion/2019/04/" + "1203_num" + parseInt(Dateleft/10) + ".png");
                $("#dd2").attr("src", "https://static.willbes.net/public/images/promotion/2019/04/" + "1203_num" + parseInt(Dateleft%10) + ".png");

                $("#hh1").attr("src", "https://static.willbes.net/public/images/promotion/2019/04/" + "1203_num" + parseInt(Hourleft/10) + ".png");
                $("#hh2").attr("src", "https://static.willbes.net/public/images/promotion/2019/04/" + "1203_num" + parseInt(Hourleft%10) + ".png");

                $("#mm1").attr("src", "https://static.willbes.net/public/images/promotion/2019/04/" + "1203_num" + parseInt(Minuteleft/10) + ".png");
                $("#mm2").attr("src", "https://static.willbes.net/public/images/promotion/2019/04/" + "1203_num" + parseInt(Minuteleft%10) + ".png");

                $("#ss1").attr("src", "https://static.willbes.net/public/images/promotion/2019/04/" + "1203_num" + parseInt(Secondleft/10) + ".png");
                $("#ss2").attr("src", "https://static.willbes.net/public/images/promotion/2019/04/" + "1203_num" + parseInt(Secondleft%10) + ".png");
                setTimeout(daycountDown, 1000);
            }
            else{
                $("#newTopDday").hide();
            }

        }
        daycountDown();

        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:8000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:900,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft1").click(function (){
                slidesImg2.goToPrevSlide();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg2.goToNextSlide();
            });
        });
    </script>
@stop