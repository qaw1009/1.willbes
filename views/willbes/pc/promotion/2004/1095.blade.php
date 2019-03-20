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

        .wb_top {background:#a12932 url(http://file3.willbes.net/new_gosi/2019/02/190208_final_01bg.png) no-repeat center top}
        .wb_cts01 {background:#a12932 url(http://file3.willbes.net/new_gosi/2019/02/190208_final_02bg.png) no-repeat center top; position:relative}
        .wb_cts02 {background:#eaeaea no-repeat center top}
        .wb_cts02 .mv_bg {width:1210px; height:553px; margin:0 auto}
        .wb_cts02 .mv_bg ul {width:953px; padding-top:19px;}
        .wb_cts02 .mv_bg li {float:left}
        .wb_cts02 .mv_bg ul:after {content:''; display:block; clear:both;}
        .wb_cts03 {background:#fff}
        .wb_cts04 {background:#fff}
        .wb_cts05 { background:#fff}

        /*타이머*/
        .time{background:#e1e1e1;}
        .time_date {max-width:1120px; text-align:center;  margin: 0 auto;}
        .time_date .t_img {width:80%;}
        .time_txt {font-family: 'NanumGothic', '나눔고딕','NanumGothicWeb', '맑은 고딕', 'Malgun Gothic', Dotum; font-size:22px; color:#171717; letter-spacing: -1px; font-weight:bold;}
        .time_txt span {color:#b61216;}
        .time p {text-align:center; padding-top:20px}

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            width:100px;
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
        }
        .skybanner div {margin-bottom:10px}

        @@keyframes upDown{
             from{margin-top:0}
             60%{margin-top:-30px}
             to{margin-top:0}
         }
        @@-webkit-keyframes upDown{
             from{margin-top:0}
             60%{margin-top:-30px}
             to{margin-top:0}
         }

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <!--div><a href="{{ site_url('#none') }}" target="_blank"><img src="http://file3.willbes.net/new_gosi/2019/02/EV190121Y_sky01.jpg" alt="9급 설명회"></a></div-->
            <div><a href="{{ site_url('/pass/consultManagement/index') }}" target="_blank"><img  src="http://file3.willbes.net/new_gosi/2019/02/EV181115_sky2.png" alt="1:1"></a></div>
            <div><a href="https://pf.kakao.com/_kcZIu/chat" target="_blank"><img src="http://file3.willbes.net/new_gosi/2019/02/EV190121Y_sky02.jpg" alt="카카오"></a></div>
        </div>

        <!-- 타이머 -->
        <div class="evtCtnsBox time">
            <div class="time_date" id="newTopDday">
                <table width="1100px;" height="90px" border="0" cellpadding=0 cellspacing=0>
                    <tr>
                        <td style="text-align:center;"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c0_1.jpg" alt=""  /></td>
                        <td width="150" align="center" class="time_txt">마감까지 <br /><span>남은 시간은</span></td>
                        <td width="62" height="101" align="center"><img id="dd1" src="http://file.willbes.net/new_image/0.png" class="t_img" /></td>
                        <td width="62" height="101" align="center"><img id="dd2" src="http://file.willbes.net/new_image/0.png" class="t_img" /></td>
                        <td width="60" height="101" align="center" class="time_txt">day</td>
                        <td width="62" height="101" align="center"><img id="hh1" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                        <td width="62" height="101" align="center"><img id="hh2" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                        <td width="20" height="101" align="center" class="time_txt">:</td>
                        <td width="62" height="101" align="center"><img id="mm1" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                        <td width="62" height="101" align="center"><img id="mm2" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                        <td width="20" height="101" align="center">:</td>
                        <td width="62" height="101" align="center"><img id="ss1" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                        <td width="62" height="101" align="center"><img id="ss2" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2019/02/190208_final_01.png" alt="윌비스 파이널 모의고사"  />
        </div><!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2019/02/190208_final_02.png" alt="윌비스 파이널 모의고사" />
        </div><!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2019/02/190208_final_03.png" alt="윌비스 파이널 모의고사" />
            <img src="http://file3.willbes.net/new_gosi/2019/02/190208_final_04.png" alt="윌비스 파이널 모의고사" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_gosi/2019/02/190208_final_05.png" alt="윌비스 파이널 모의고사" />
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" >
            <a href="{{ site_url('/pass/offLecture/index?cate_code=3043&course_idx=1062) }}"><img src="http://file3.willbes.net/new_gosi/2019/02/190208_final_06.png" border="0" /></a>
        </div><!--wb_cts04//-->

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
        }

        function daycountDown() {
            // 한달 전 날짜로 셋팅
            event_day = new Date(2019,2,4,23,59,59);
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