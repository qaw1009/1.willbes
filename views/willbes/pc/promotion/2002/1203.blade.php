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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; top:200px;right:10px;z-index:10;}
        
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/08/1203_top_bg.jpg) no-repeat center top;}              

        .evt02 {background:#4e4e4e}
        .evt02 > div {position:relative; width:1120px; margin:0 auto}
        .evt02 div div span {position:absolute; top:256px; left:720px; width:103px; z-index:1}
        .evt02 div div span:last-child {left:822px}

    
        .evt03 {background:#363636 url(https://static.willbes.net/public/images/promotion/2019/08/1203_03_bg.jpg) no-repeat center top;}        

        .slide_con1 {position:relative; width:900px; margin:0 auto; padding-top:450px;padding-bottom:50px;}
        .slide_con1 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con1 img {width:100%;}
        .evtCtnsBox p a {cursor:pointer}
        .evtCtnsBox p.leftBtn1 {left:-31px; top:70%; width:62px; height:62px; margin-top:-31px;opacity:0.9; filter:alpha(opacity=90);}
        .evtCtnsBox p.rightBtn1 {right:-31px;top:67%; width:62px; height:62px;  margin-top:-31Dpx;opacity:0.9; filter:alpha(opacity=90);}
        
        .evt04 {background:#212121}
        .evt05 {background:#fff; position:relative;}
        .evt05 a {position:absolute; display:block; top:685px; left:50%; width:200px; margin-left:-100px; height:50px; line-height:50px; background:#000; color:#fff; border-radius:26px; font-size:20px; z-index:1} 
        .evt05 a:hover {background:#20bdb2;}
        .evt06 {background:#ececec;}
        .evt07 {width:1000px; margin:0 auto; background:#fff;padding:100px; font-size:14px; text-align:left}
        .evt07 h3 {border: 5px solid #b59775;color: #b59775;font-size: 40px;padding: 10px 0;text-align: center;width: 380px;margin: 0 auto;}
        .evt07 p {margin-top: 30px;font-size: 18px;color: #b59775;font-weight: bold;height:50px; line-height:50px; border-bottom:1px solid #e4e4e4;}
        .evt07 ul {background:#fff; padding:20px}
        .evt07 ul li {height:50px; line-height:50px; border-bottom:1px solid #e4e4e4;font-weight:bold;}
        .evt07 ul li a {display:inline-block; width:100px; color:#fff; background:#000; text-align:center; float:right; height:30px; line-height:30px; margin-top:10px;border-radius:15px;font-weight:bold;}
        .evt07 ul li a:hover {background:#b59775}
    </style>

<div class="p_re evtContent NGR" id="evtContainer">
    <div class="evtCtnsBox evtTop">
        <div class="evtInmg">    
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1203_top.jpg" title="3단계 파이널 실전모의고사">    
        </div>
	</div>	

    <div class="evtCtnsBox evt02">
        <div> 
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1203_02.jpg" title="1차 필기시험 남은 시간">
            <div id="ddaytime">
                <span><img src="https://static.willbes.net/public/images/promotion/2019/04/1203_num0.png" title="숫자" id="dd1"></span>
                <span><img src="https://static.willbes.net/public/images/promotion/2019/04/1203_num0.png" title="숫자" id="dd2"></span>
            </div>           
        </div>
    </div>

	<div class="evtCtnsBox evt03">
        <div class="slide_con1">
            <ul id="slidesImg1">
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1203_03_s01.jpg" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1203_03_s02.jpg" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1203_03_s03.jpg" alt=""/></li>              
            </ul>
            <p class="leftBtn1"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/2019/08/1203_left_btn.png"></a></p>
            <p class="rightBtn1"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/2019/08/1203_right_btn.png"></a></p>
        </div>
    </div>
    
    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2019/08/1203_04.jpg" title="선택이 아닌 필수">
    </div>    
    
    <div class="evtCtnsBox evt07">
        <h3 class="NSK-Black">동영상 수강신청</h3>
        <p>[단과 수강신청]</p>
        <ul>
            <li>
                2019년 2차대비 신광은 형사소송법 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156397" target="_blank">수강신청</a>
            </li>
            <li>
                2019년 2차대비 장정훈 경찰학개론 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156401" target="_blank">수강신청</a>
            </li>
            <li>
                2019년 2차대비 김원욱 형법 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156403" target="_blank">수강신청</a>
            </li>
            <li>
                2019년 2차대비 하승민 영어 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156407" target="_blank">수강신청</a>
            </li>
            <li>
                2019년 2차대비 원유철 한국사 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156409" target="_blank">수강신청</a>
            </li>
            <li>
                2019년 2차대비 오태진 한국사 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156412" target="_blank">수강신청</a>
            </li>
            <li>
                2019년 2차대비 신광은 수사 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/156414" target="_blank">수강신청</a>
            </li>
            <li>
                2019년 2차대비 장정훈 행정법 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/156416" target="_blank">수강신청</a>
            </li>
        </ul>      
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
            var event_day = new Date(2019,3,27,23,59,59);
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