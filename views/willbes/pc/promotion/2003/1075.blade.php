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

        .time {width:100%; text-align:center; background:#e9e7e8}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px; font-weight:bold}
        .time .time_txt span {color:#ea263e}

        .wb_top {background:#2e5848 url(http://file3.willbes.net/new_gosi/2018/08/EV180802_c1_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 {background:#f1efef url(http://file3.willbes.net/new_gosi/2018/08/EV180802_c2_bg.jpg) repeat-x}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#31b38d}
        .wb_cts05 {background:#fff}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:261px;
            z-index:10;
        }

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        {{--
        <div class="skybanner">
            <div><a href="#event"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c12.png" alt="윌비스 박민주 한국사" ></a></div>
        </div>
        --}}

        <div class="evtCtnsBox time" id="newTopDday">
            <div id="ddaytime">
                <table>
                    <tr>
                    <td class="time_txt NGEB"><span>4/30(화) 마감!</span></td>
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
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c1.png" alt="윌비스 한국사의 맥을 꿰뚫는 명품 강의 박민주 한국사 " usemap="#Map180802_c1" border="0"  />
            <map name="Map180802_c1" >
                <area shape="rect" coords="824,1077,1048,1180" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150653') }}" target="_blank" onfocus="this.blur();" />
            </map>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c2.jpg" alt="많은 수험생들이 한국사를 버거워하는 이유는 무엇일까요? 체계 없이 단순 암기만을 추구하기 때문입니다." /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c3.jpg" alt="윌비스 공무원 한국사의 대명사, 바로 민주국사입니다." />
        </div><!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c4.jpg" alt="윌비스 수강생들이 인정한 名品 한국사 강의!" />
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c5.jpg" alt="방대한 양의 한국사, 구조화 이론으로 제대로 흐름 잡자!" usemap="#Map180802_c2" border="0" />
            <map name="Map180802_c2" >
                <area shape="rect" coords="726,786,974,926" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150653') }}" onfocus="this.blur();" target="_blank" />
            </map>
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts05" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180802_c6.jpg" alt="박민주 한국사 이용안내 및 유의사항 " />>
        </div><!--wb_cts05//-->

    </div>
    <!-- End Container -->

    <script>
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
                $("#dd1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Dateleft/10) + ".png");
                $("#dd2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Dateleft%10) + ".png");

                $("#hh1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Hourleft/10) + ".png");
                $("#hh2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Hourleft%10) + ".png");

                $("#mm1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Minuteleft/10) + ".png");
                $("#mm2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Minuteleft%10) + ".png");

                $("#ss1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Secondleft/10) + ".png");
                $("#ss2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Secondleft%10) + ".png");
                setTimeout(daycountDown, 1000);
            }
            else{
                $("#newTopDday").hide();
            }

        }
        daycountDown();
    </script>
@stop