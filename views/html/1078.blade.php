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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .time {width:100%; text-align:center; background:#e9e7e8}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px; font-weight:bold}
        .time .time_txt span {color:#d6332c}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1078_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#fff}
        .evt02 {background:#9cffbc}
        .evt03 {background:#fff}
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1078_04_bg.jpg)}
        .evt05 {background:#fff}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:261px;
            z-index:10;
        }

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <div>
                <!-- a href="javascript:alert('마감되었습니다.');" /-->
                <a href="#event">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1078_sky.png" alt="성기건 영어 T-PASS" >
                </a>
            </div>
        </div>

        <div class="evtCtnsBox time" id="newTopDday">
            <div>
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

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1078_top_01.png" alt="윌비스 빛처럼 빠른 공무원 영어 정복 성기건 영어 " /><br>
            <a href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/153149" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/04/1078_top_02.gif" alt="수강신청 " /></a>
        </div>

        <div class="evtCtnsBox evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1078_01.jpg" alt="쉬워도 문제, 어려우면 더 문제! 영어, 확실하게 준비하고 계신가요?" />           
        </div>

        <div class="evtCtnsBox evt02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1078_02.jpg" alt="윌비스 성기건 교수님과 함께면 독해도 문법도 문제 없습니다." />            
        </div>

        <div class="evtCtnsBox evt03" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1078_03.jpg" alt="윌비스 성기건 교수님과 함께면 독해도 문법도 문제 없습니다." />
        </div>

        <div class="evtCtnsBox evt04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1078_04.jpg" alt="성기건영어 이용안내 및 유의사항 " />
        </div>

        <div class="evtCtnsBox evt05" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1078_05.jpg" alt="성기건영어 이용안내 및 유의사항 " />
        </div>

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