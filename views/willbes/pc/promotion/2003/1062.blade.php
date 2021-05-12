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

        .wb_top {font-size:15px; color:#ebebeb; background:#171717 url(http://file3.willbes.net/new_gosi/2019/01/EV190130_01_bg.png) no-repeat center top;  position:relative;}

        .wb_cts01 {background:#e1ded9;}

        .wb_cts02 {background:#171717; font-family:'Noto Sans KR', Arial, Sans-serif; font-size:15px; color:#232228;}

        .wb_cts03 {background:#e1ded9;}

        .check {width:980px; margin:0 auto; background:#171717; padding:20px 0px 50px 10px; letter-spacing:3; color:#fff;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px;color:#27262c; background:#e3c0a2; margin-left:50px; border-radius:20px}

        /*타이머*/
        .time {width:100%; text-align:center; background:#e1e1e1}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:80%}
        .time .time_txt {font-size:28px; color:#000; letter-spacing: -1px; font-weight:600}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time p {text-alig:center}
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

        /*하단퀵*/
        #nav {display:block; position:fixed;  bottom:0%;  width:100%; min-width:1210px;  text-align:center; background: url(http://file3.willbes.net/new_gosi/2019/02/EV190211_sky_bg.png) repeat-x; z-index:10;}


    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        <div id="nav">
            <img src="http://file3.willbes.net/new_gosi/2019/02/EV190211_sky1.png" alt="2019 윌비스 7급PASS 구매하기" usemap="#Map_180702_lecsky" border="0" />
            <map name="Map_180702_lecsky">
                <area shape="rect" coords="629,10,860,80" href="javascript:go_PassLecture(1);" alt="6개월수강신청" onfocus="this.blur();">
                <area shape="rect" coords="912,7,1149,79" href="javascript:go_PassLecture(2);" alt="12개월수강신청">
            </map>
        </div>

        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB"  id="newTopDday">
            <div>
                <table>
                    <tr>
                        <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!</td>
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

        <div class="evtCtnsBox wb_top" id="main">
            <img src="http://file3.willbes.net/new_gosi/2019/02/EV190211_01.png" alt="윌비스 7급 PASS" usemap="#Map_180702_lec" border="0" />
            <map name="Map_180702_lec">
                <area shape="rect" coords="530,1090,695,1152" href="javascript:go_PassLecture(3);" alt="6개월수강신청"  onfocus="this.blur();">
                <area shape="rect" coords="854,1088,1046,1152" href="javascript:go_PassLecture(4);" alt="12개월수강신청">
            </map>
            <div class="check" id="chkInfo">
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 윌비스 7급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tab1">이용안내확인하기 ↓</a></div>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180914_02.png"  alt="윌비스의 7급 커리큘럼"  />
        </div>
        <!--wb_cts01//-->


        <div class="evtCtnsBox wb_cts02" id="event">
            <img src="http://file3.willbes.net/new_gosi/2019/02/EV190211_03.png"  alt="윌비스 2019 윌비스 7급 PASS" usemap="#Map_190211_lecgo" border="0"/>
            <map name="Map_190211_lecgo">
                <area shape="rect" coords="534,596,696,658" href="javascript:go_PassLecture(5);" alt="6개월수강신청" onfocus="this.blur();">
                <area shape="rect" coords="882,596,1060,660" href="javascript:go_PassLecture(6);" alt="12개월수강신청">
            </map>
            <div class="check">
                <label>
                    <input name="ischk2"  type="checkbox" value="Y" />
                    페이지 하단 윌비스 7급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tab1">이용안내확인하기 ↓</a>
            </div>
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" id="tab1">
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180914_04.png"  alt="윌비스 2019 7급 PASS 이용안내" />
        </div>
        <!--wb_cts03//-->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function go_PassLecture(no){
            if(parseInt(no)==1 || parseInt(no)==2){
                if($("input[name='ischk']:checked").size() < 1 && $("input[name='ischk2']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    $("#chkInfo").focus();
                    return;
                }
            }else if(parseInt(no)==3 || parseInt(no)==4){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }
            }else if(parseInt(no)==5 || parseInt(no)==6){
                if($("input[name='ischk2']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }
            }

            var lUrl = "";

            if(parseInt(no)==1 || parseInt(no)==3 || parseInt(no)== 5){
                lUrl = "{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/149332') }}"
            }else{
                lUrl = "{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/149307') }}"
            }
            location.href = lUrl;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop