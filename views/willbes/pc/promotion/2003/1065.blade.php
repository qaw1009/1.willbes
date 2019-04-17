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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/03/1065_01_bg.jpg) no-repeat center top}
        .wb_cts02 {background:#cdb594}

        .time {width:100%; text-align:center; background:#000}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:80%}
        .time .time_txt {font-size:28px; color:#f2f2f2; letter-spacing: -1px; font-weight:bold}
        .time .time_txt span {color:#ead4b5}

        .tabWrapArmy {width:887px; margin:0 auto; box-shadow:0 5px 5px rgba(0,0,0,.2); margin-bottom:10px}
        .tabmenuT {width:200px; float:left}
        .tabmenuT li a {display:block; height:48px; line-height:48px; text-align:center; background:#27262c; border-bottom:1px solid #ebebeb; color:#fff}
        .tabmenuT li:last-child a {border-bottom:0; height:50px; line-height:50px;}
        .tabmenuT li a:hover,
        .tabmenuT li a.active {background:#ebebeb; color:#27262c}
        .tabmenuT .tabCts {float:left}
        .tabmenuT:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#232228; position:relative}

        /* 수강테이블*/
        .tbl_lec {width:980px; margin:0 auto 100px}
        .event_table {width:100%; margin:0 auto; border-left:1px solid #999; background-color:#fafafa; border-top:1px solid #8; text-align:center}
        .event_table th {padding:12px;font-size:14px; font-weight:bold; color:#fff; text-align:center; letter-spacing:-0.8px; background-color:#222; border-right:1px solid #999;border-bottom:1px solid #999; border-top:1px solid #999}
        .event_table td {padding:12px;  text-align:center; border-bottom:1px solid #999; border-right:1px solid #999; letter-spacing:0px; color:#666}
        .event_table .sell {font-size:14px; color:#ff3513; font-weight:bold; letter-spacing:-1px}
        .event_table .sell span {color:#333; font-size:12px; font-weight:normal}
        .event_table .sell2 {font-size:14px; color:#a1550b; font-weight:bold; letter-spacing:-1px}
        .event_table .tit_lec{font-size:14px; color:#f7d677}

        /*버튼*/
        a.button01{display:inline-block;padding:8px 20px; border:1px solid #fff; background:#e83e3e; color:#fff !important; font-size:12px; text-transform:uppercase;margin:0px; -webkit-transition: background-color 0.5s, border-color 0.5s;transition: background-color 0.35s, border-color 0.5s;font-weight:bold; text-decoration:none;border-radius:6px}
        a.button01:hover{border:1px solid #000;background:#fff; color:#000 !important; font-size:12px;  border-radius:6px}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox time">
            <div id="ddaytime">
                <table>
                    <tr>
                    <td class="time_txt"><span>4/17(수) 마감!</span></td>
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
        
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1065_01.jpg" alt="윌비스 군무원 PASS 시즌5" usemap="#Map180831" border="0">
            <map name="Map180831" id="Map180831">
                <area shape="rect" coords="571,1699,731,1738" href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149253') }}" alt="59만원" />
                <area shape="rect" coords="918,1698,1080,1737" href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149317') }}" alt="43만원" />
            </map>
        </div><!--wb_cts01//-->        

        <div class="evtCtnsBox wb_cts02" id="wb01">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_1.jpg" alt="수강생 전용해톅, 전문교수진">
            <div class="tabWrapArmy">
                <ul class="tabmenuT">
                    <li>
                        <a href="#tab1">국어 임재진</a>
                    </li>
                    <li>
                        <a href="#tab2">행정학 김헌</a>
                    </li>
                    <li>
                        <a href="#tab3">행정법 이석준</a>
                    </li>
                    <li>
                        <a href="#tab4">한국사능력검정시험 김상범</a>
                    </li>
                    <li>
                        <a href="#tab5">국어 권기태</a>
                    </li>
                    <li>
                        <a href="#tab6">국어 기미진</a>
                    </li>
                    <li>
                        <a href="#tab7">행정학 김덕관</a>
                    </li>
                    <li>
                        <a href="#tab8">행정법 변원갑</a>
                    </li>
                    <li>
                        <a href="#tab9">한국사능력검정시험 한경준</a>
                    </li>
                </ul>
                <div id="tab1" class="tabCts"><img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_t1.jpg" alt="국어 임재진" class="off"></div>
                <div id="tab2" class="tabCts"><img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_t2.jpg" alt="행정학 김헌" class="off"></div>
                <div id="tab3" class="tabCts"><img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_t3.jpg" alt="행정법 이석준" class="off"></div>
                <div id="tab4" class="tabCts"><img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_t4.jpg" alt="한국사능력검정시험 김상범" class="off"></div>
                <div id="tab5" class="tabCts"><img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_t8.jpg" alt="국어 권기태" class="off"></div>
                <div id="tab6" class="tabCts"><img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_t5.jpg" alt="국어 기미진" class="off"></div>
                <div id="tab7" class="tabCts"><img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_t6.jpg" alt="행정학 김덕관" class="off"></div>
                <div id="tab8" class="tabCts"><img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_t7.jpg" alt="행정법 변원갑" class="off"></div>
                <div id="tab9" class="tabCts"><img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_t9.jpg" alt="한국사능력검정시험 한경준" class="off"></div>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1065_02_2.jpg" alt="군무원 커피큘럼">
        </div><!--wb_cts02//-->


        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1065_03.jpg" alt="" usemap="#Map180831B" border="0"  />
            <map name="Map180831B" id="Map180831B">
                <area shape="rect" coords="571,651,730,691" href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149253') }}" alt="59만원" />
                <area shape="rect" coords="919,650,1082,691" href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149317') }}" alt="43만원" />
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1065_03_1.jpg" alt="군무원 수강생 이벤트"  />
            <div class="tbl_lec" id="tbl_lec">
                <table width="0" border="0" cellpadding="0" cellspacing="0" class="event_table">
                    <tr>
                        <th>&nbsp;</th>
                        <th>기간</th>
                        <th>정가</th>
                        <th>판매가</th>
                        <th>할인 이벤트</th>
                        <th>신청</th>
                    </tr>
                    <tr>
                        <th rowspan="2">3과목 패키지<br>
                            <span class="tit_lec">국어 + 행정학 + 행정법 </span></th>
                        <td>1년</td>
                        <td>140만원</td>
                        <td>90만원</td>
                        <td class="sell">59만원</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149253') }}" target="_blank"class="button01" alt="수강신청">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>6개월</td>
                        <td>140만원</td>
                        <td>69만원</td>
                        <td class="sell">43만원</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149317') }}" target="_blank"class="button01" alt="수강신청">수강신청</a></td>
                    </tr>
                    <tr>
                        <th rowspan="2">2과목 패키지<br>
                            <span class="tit_lec">국어 + 행정법 </span></th>
                        <td>1년</td>
                        <td>90만원</td>
                        <td>65만원</td>
                        <td class="sell">42만원</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149319') }}" target="_blank"class="button01" alt="수강신청">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>6개월</td>
                        <td>90만원</td>
                        <td>50만원</td>
                        <td class="sell">35만원</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149318') }}" target="_blank"class="button01" alt="수강신청">수강신청</a></td>
                    </tr>
                    <tr>
                        <th rowspan="2">2과목 패키지<br>
                            <span class="tit_lec"> 국어 + 행정학  </span></th>
                        <td>1년</td>
                        <td>90만원</td>
                        <td>65만원</td>
                        <td class="sell">42만원</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149320') }}" target="_blank"class="button01" alt="수강신청">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>6개월</td>
                        <td>90만원</td>
                        <td>50만원</td>
                        <td class="sell">35만원</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149321') }}" target="_blank"class="button01" alt="수강신청">수강신청</a></td>
                    </tr>
                    <tr>
                        <th rowspan="2">2과목 패키지<br>
                            <span class="tit_lec"> 행정학 + 행정법  </span></th>
                        <td>1년</td>
                        <td>90만원</td>
                        <td>65만원</td>
                        <td class="sell">42만원</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149322') }}" target="_blank"class="button01" alt="수강신청">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>6개월</td>
                        <td>90만원</td>
                        <td>50만원</td>
                        <td class="sell">35만원</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/149323') }}" target="_blank"class="button01" alt="수강신청">수강신청</a></td>
                    </tr>
                </table>
            </div><!--tbl_lec//-->
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1065_03_2.jpg" alt=""  />
        </div><!--wb_cts03//-->

    </div>
    <!-- End Container -->

    <script>
        /*tab*/
        $(document).ready(function(){
            $('.tabWrapArmy').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        )        

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
            var event_day = new Date(2019,3,30,23,59,59);
            var now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));

            var Monthleft = event_day.getMonth() - now.getMonth();
            var Dateleft = DdayDiff.inDays(now, event_day);
            var Hourleft = timeGap.getHours();
            var Minuteleft = timeGap.getMinutes();
            var Secondleft = timeGap.getSeconds();

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