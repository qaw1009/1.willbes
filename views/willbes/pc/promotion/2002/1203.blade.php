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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1203_top_bg.jpg) no-repeat center top;}   
        .evtTop .evtInmg {position:relative; width:1120px; height:753px; margin:0 auto}
        .evtTop .evtInmg img {position:absolute; top:0; left:0; width:1120px; z-index:5}
        .evtTop .evtInmg .evtInmgBg {position:absolute; left:124px; top:193px; width:474px; height:327px; z-index:1; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{background:#fbfaa1}
        50%{background:#4fe1d7}
        to{background:#fbfaa1}
        }
        @@-webkit-keyframes upDown{
        from{background:#fbfaa1}
        50%{background:#4fe1d7}
        to{background:#fbfaa1}
        } 
        .evt01 {background:#0c4a6f}
        .evt02 {background:#4e4e4e}
        .evt02 > div {position:relative; width:1120px; margin:0 auto}
        .evt02 div div span {position:absolute; top:256px; left:720px; width:103px; z-index:1}
        .evt02 div div span:last-child {left:822px}
        .evt03 {background:#363636 url(https://static.willbes.net/public/images/promotion/2019/04/1203_03_bg.jpg) no-repeat center top;}        
        .evt04 {background:#231f20}
        .evt05 {background:#fff; position:relative;}
        .evt05 a {position:absolute; display:block; top:685px; left:50%; width:200px; margin-left:-100px; height:50px; line-height:50px; background:#000; color:#fff; border-radius:26px; font-size:20px; z-index:1} 
        .evt05 a:hover {background:#20bdb2;}
        .evt06 {background:#ececec;}
        .evt07 {width:1000px; margin:0 auto; background:#20bdb2; margin-bottom:100px; padding:100px; font-size:14px; text-align:left}
        .evt07 h3 {border:1px solid #fff; color:#fff; font-size:40px; padding:20px 0; text-align:center}
        .evt07 p {margin-top:30px; font-size:18px; color:#fff}
        .evt07 ul {margin-top:20px; background:#fff; padding:20px}
        .evt07 ul li {height:50px; line-height:50px; border-bottom:1px solid #e4e4e4;}
        .evt07 ul li:last-child {border:0}
        .evt07 ul li a {display:inline-block; width:140px; color:#fff; background:#20bdb2; text-align:center; float:right; height:30px; line-height:30px; margin-top:10px }
        .evt07 ul li a:hover {background:#000}
    </style>

<div class="p_re evtContent NGR" id="evtContainer">
    <div class="evtCtnsBox evtTop">
        <div class="evtInmg">    
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1203_top.png" title="3단계 파이널 실전모의고사">
            <div class="evtInmgBg"></div>
        </div>
	</div>

	<div class="evtCtnsBox evt01">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1203_01.jpg" title="시험 직후 전 과목 해설 강의">
	</div>

	<div class="evtCtnsBox evt02">
        <div> 
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1203_02.jpg" title="1차 필기시험 남은 시간">
            <div id="ddaytime">
                <span><img src="https://static.willbes.net/public/images/promotion/2019/04/1203_num0.png" title="숫자" id="dd1"></span>
                <span><img src="https://static.willbes.net/public/images/promotion/2019/04/1203_num0.png" title="숫자" id="dd2"></span>
            </div>
        </div>
	</div>

	<div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1203_03.jpg" title="최종점검"> 
    </div>
    
    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1203_04.jpg" title="3단계 파이널 실전모의고사 수강신청">
    </div>
    
    <div class="evtCtnsBox evt05">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1203_05.jpg" title="3단계 파이널 실전모의고사 수강신청">
        <a href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1045">신청하기 ></a>        
    </div>

    <div class="evtCtnsBox evt07">
        <h3 class="NSK-Black">동영상 수강신청</h3>
        <p>[단과]</p>
        <ul>
            <li>
                2019년 1차대비 신광은 형사소송법 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/152914" target="_blank">신청하기 ></a>
            </li>
            <li>
                2019년 1차대비 장정훈 경찰학개론 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/152913" target="_blank">신청하기 ></a>
            </li>
            <li>
                2019년 1차대비 김원욱 형법 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/152912" target="_blank">신청하기 ></a>
            </li>
            <li>
                2019년 1차대비 하승민 영어 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/152911" target="_blank">신청하기 ></a>
            </li>
            <li>
                2019년 1차대비 원유철 한국사 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/152887" target="_blank">신청하기 ></a>
            </li>
            <li>
                2019년 1차대비 오태진 한국사 파이널 실전모의고사
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/152886" target="_blank">신청하기 ></a>
            </li>
        </ul>
        <p>[종합반]</p>
        <ul>
            <li>
                2019년 1차대비 일반경찰 파이널 실전모의고사 패키지(원유철史) 
                <a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/152929" target="_blank">신청하기 ></a>
            </li>
            <li>
                2019년 1차대비 일반경찰 파이널 실전모의고사 패키지(오태진史) 
                <a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/152928" target="_blank">신청하기 ></a>
            </li>
        </ul>
    </div>
    
    <div class="evtCtnsBox evt06">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1203_06.jpg" title="코퀄리티강의로 수험생 여러분의 합격을 책임지겠습니다.">        
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
    </script>
@stop