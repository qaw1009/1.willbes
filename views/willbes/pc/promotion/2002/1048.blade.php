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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:absolute;
            top:20px;
            right:10px;
            z-index:1;
        }
        .skybanner li {
            margin-bottom:5px;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

        .wb_top {background:#242424 url(http://file3.willbes.net/new_cop/2019/01/EV190115_p1_bg.jpg) no-repeat center; }
        .wb_01 {background:#dfdfdf}
        .wb_02 {background:#ececec}
        .wb_03 {background:#7d7d7d}
        .wb_03 div {width:1210px; margin:0 auto; position:relative}
        .wb_03 div ul {position:absolute; width:88px; top:378px; left:567px; z-index:10}
        .wb_03 div li {margin-bottom:18px}
        .wb_03 div li:nth-child(3) {margin-bottom:20px}
        .wb_03 div li:nth-child(4) {margin-bottom:20px}
        .wb_03 div li:nth-child(5) {margin-bottom:20px}
        .wb_03 div li:nth-child(6) {margin-bottom:20px}
        .wb_03 div li a {display:block; height:21px; line-height:21px; font-size:13px; font-weight:600; letter-spacing:-1px; background:#231f20; color:#fff; border:1px solid #231f20; font-family:'Noto Sans KR', Arial, Sans-serif}
        .wb_03 div li a:hover {background:#ffda38; color:#231f20}
        .wb_03 div li a.end {background:#666; color:#000}
        .wb_03 div span {position:absolute; display:block; height:31px; line-height:31px; padding:0 10px; background:#231f20; color:#fff; font-size:14px; font-weight:600; border-radius:22px; border:1px solid #231f20; z-index:11; letter-spacing:-1px}
        .wb_03 div span em {font-size:11px}
        .wb_03 div span.on {background:#ffda38; color:#231f20}
        .wb_03 div span.area01 {top:438px; left:809px} /*본원*/
        .wb_03 div span.area02 {top:490px; left:725px} /*신림*/
        .wb_03 div span.area03 {top:522px; left:764px} /*인천*/
        .wb_03 div span.area04 {top:737px; left:764px} /*광주*/
        .wb_03 div span.area05 {top:667px; left:795px} /*전주,익산*/
        .wb_03 div span.area06 {top:678px; left:915px} /*대구*/
        .wb_03 div span.area07 {top:737px; left:964px} /*부산*/
        .wb_03 div span.area08 {top:750px; left:856px} /*진주*/
        .wb_03 div span.area09 {top:859px; left:774px} /*제주*/

        .wb_04 {background:#282828}

        .content_guide_wrap{background:#fff; margin:0}
        .content_guide_box{ position:relative; width:900px; margin:0 auto; padding:50px 0}
        .content_guide_box .guide_tit{margin-bottom:20px}
        .content_guide_box dl{ margin:0 20px; word-break:keep-all;border:2px solid #202020;padding:30px}
        .content_guide_box dt{ margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:13px; font-weight:bold; margin-right:10px}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{ color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong{ color:#555}
        .content_guide_box dd p{ margin-bottom:3px}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px}

        /*타이머*/
        #newTopDday * {font-family:'Noto Sans KR', Arial, Sans-serif; font-size:24px;}
        #newTopDday { clear:both;background:#f5f5f5; width:100%; padding:20px 0}
        #newTopDday ul {width:1210px; margin:0 auto}
        #newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        #newTopDday ul li strong {line-height:70px}
        #newTopDday ul li img {width:50px}
        #newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:20px; width:28%}
        #newTopDday ul li:first-child span {font-size:12px; color:#999;margin-top:4px;}
        #newTopDday ul li:last-child {line-height:none;  text-align:left; padding-left:20px; width:24%}
        #newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        #newTopDday ul li:last-child a:hover {background:#666}
        #newTopDday ul:after {content:""; display:block; clear:both}


    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#evt"><img src="http://file3.willbes.net/new_cop/2019/01/EV190115_p_sky.png" alt="스카이스크래퍼" ></a>
        </div>

        <div class="evtCtnsBox wb_top" id="main">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190211_p1_soldout.png"  alt="메인" usemap="#link"/>
            <map name="link" >
                <area shape="rect" coords="962,752,1115,905" href="/boardCustomerOn/board_view.html?topMenuType=O&topMenuGnb=OM_008&topMenu=MAIN&menuID=OM_008_001&topMenuName=AI¹Y°æAu&BOARDTYPE=1&INCTYPE=view&BOARD_MNG_SEQ=NOTICE_013&currentPage=&BOARD_SEQ=12149&PARENT_BOARD_SEQ=0&SEARCHKIND=&SEARCHTEXT=" onfocus='this.blur()' target="_blank" alt="온라인모의고사안내" />
            </map>
        </div>

        <div class="evtCtnsBox wb_01" >
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190211_p2.png"  alt="설명" />
        </div>

        <div class="evtCtnsBox wb_02" id="table">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190211_p3_1.png"  alt="시간표 및 장소" /><br />
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190211_p3_2_soldout.png"  alt="접수하기" />
        </div>

        <div class="evtCtnsBox wb_03" >
            <div>
                <img src="http://file3.willbes.net/new_cop/2019/01/EV190115_p4_re.png"  alt="전국학원"/>
                <ul>
                    <li><a href="http://www.willbescop.net/mouigosa/request/list.html?topMenuType=F&topMenuGnb=FM_004&topMenu=MAIN&menuID=FM_004_002_002&topMenuName=수험연구소&BOARDTYPE=4&INCTYPE=list" alt="노량진" onmouseover="$('span.area01').addClass('on');" onmouseleave="$('span.area01').removeClass('on');">신청하기</a></li>
                    <li><a href="http://www.willbescop.net/mouigosa/request/list.html?topMenuType=F&topMenuGnb=FM_004&topMenu=MAIN&menuID=FM_004_002_002&topMenuName=수험연구소&BOARDTYPE=4&INCTYPE=list" alt="신림" onmouseover="$('span.area02').addClass('on');" onmouseleave="$('span.area02').removeClass('on');">신청하기</a></li>
                    <li><a href="http://www.willbescop.net/mouigosa/request/list.html?topMenuType=F&topMenuGnb=FM_004&topMenu=MAIN&menuID=FM_004_002_002&topMenuName=수험연구소&BOARDTYPE=4&INCTYPE=list" alt="인천" onmouseover="$('span.area03').addClass('on');" onmouseleave="$('span.area03').removeClass('on');">신청하기</a></li>
                    <li><a href="http://www.willbescop.net/mouigosa/request/list.html?topMenuType=F&topMenuGnb=FM_004&topMenu=MAIN&menuID=FM_004_002_002&topMenuName=수험연구소&BOARDTYPE=4&INCTYPE=list" alt="광주" onmouseover="$('span.area04').addClass('on');" onmouseleave="$('span.area04').removeClass('on');">신청하기</a></li>
                    <li><a href="http://www.willbescop.net/mouigosa/request/list.html?topMenuType=F&topMenuGnb=FM_004&topMenu=MAIN&menuID=FM_004_002_002&topMenuName=수험연구소&BOARDTYPE=4&INCTYPE=list" alt="전주" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');">신청하기</a></li>
                    <li><a href="#none" alt="익산" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');" class="end">마감</a></li>
                    <li><a href="http://www.willbescop.net/mouigosa/request/list.html?topMenuType=F&topMenuGnb=FM_004&topMenu=MAIN&menuID=FM_004_002_002&topMenuName=수험연구소&BOARDTYPE=4&INCTYPE=list" alt="대구" onmouseover="$('span.area06').addClass('on');" onmouseleave="$('span.area06').removeClass('on');">신청하기</a></li>
                    <li><a href="http://www.willbescop.net/mouigosa/request/list.html?topMenuType=F&topMenuGnb=FM_004&topMenu=MAIN&menuID=FM_004_002_002&topMenuName=수험연구소&BOARDTYPE=4&INCTYPE=list" alt="부산" onmouseover="$('span.area07').addClass('on');" onmouseleave="$('span.area07').removeClass('on');">신청하기</a></li>
                    <li><a href="http://www.willbescop.net/mouigosa/request/list.html?topMenuType=F&topMenuGnb=FM_004&topMenu=MAIN&menuID=FM_004_002_002&topMenuName=수험연구소&BOARDTYPE=4&INCTYPE=list" alt="진주" onmouseover="$('span.area08').addClass('on');" onmouseleave="$('span.area08').removeClass('on');">신청하기</a></li>
                    <li><a href="http://www.willbescop.net/mouigosa/request/list.html?topMenuType=F&topMenuGnb=FM_004&topMenu=MAIN&menuID=FM_004_002_002&topMenuName=수험연구소&BOARDTYPE=4&INCTYPE=list" alt="제주" onmouseover="$('span.area09').addClass('on');" onmouseleave="$('span.area09').removeClass('on');">신청하기</a></li>
                </ul>
                <span class="area01">노량진</span>
                <span class="area02">신림</span>
                <span class="area03">인천</span>
                <span class="area04">광주</span>
                <span class="area05">전북<em>(전주,익산)</em></span>
                <span class="area06">대구</span>
                <span class="area07">부산</span>
                <span class="area08">진주</span>
                <span class="area09">제주</span>
            </div>
        </div>

        <div class="evtCtnsBox wb_04" >
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190211_p5.png"  alt="경품" />
        </div>

        <div class="content_guide_wrap">
            <div class="content_guide_box" id="ask">
                <p class="guide_tit"><img src="http://file3.willbes.net/new_cop/2018/01/EV180104_p7.png"  alt="유의사항" /> </p>
                <dl>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <p>학원 실강패스 수강생은 응시 지역별 학원 상담실 문의해 주시기 바랍니다. 모든 고사장 주차 불가합니다. 시험 응시생이 많아 혼잡이 예상되오니 대중교통을 이용해 주시기 바랍니다. 반드시 본인이 응시할 캠퍼스로 신청 바랍니다.</p>
                    </dd>

                    <dt>
                        <h3>고사장 입실</h3>
                    </dt>
                    <dd>
                        <p>1. 시험당일 09:40까지 해당 고사장으로 반드시 입실해야합니다.</p>
                        <p>2. 시험 종료 후 시험감독관의 지시가 있을때까지 퇴실할 수 없으며, 모든 답안지는 반드시 제출하여 주십시오.</p>
                        <p>3. 본인이 신청한 캠퍼스에서만 응시할 수 있습니다.</p>
                    </dd>
                    <dt>
                        <h3>신분증 지참</h3>
                    </dt>
                    <dd>
                        <p>본인 확인을 위해 응시표(응시 전 발송 된 문자 메시지 확인 가능)와 공공기관이 발행한 신분(주민등록증, 여권, 운전면허증, 주민등록번호가 포함된 장애인등록증(복지카드 중 하나)을 반드시 소지하여야 합니다.</p>
                    </dd>
                    <dd>
                        <p>※ 모의고사문의 : 각 캠퍼스에 문의</p>
                        <p>※ 성적공지일 추후공지.</p>
                        <p>※ 통합 사이트 오픈으로  온/오프 성적 공지가 지연될수 있는점 양해말씀드립니다. </p>
                    </dd>

                </dl>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script>
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
            //event_day = new Date(2016,4,6,23,59,59);
            // 한달 전 날짜로 셋팅
            event_day = new Date(2019,1,22,17,59,59);
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

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */
        });
    </script>
@stop