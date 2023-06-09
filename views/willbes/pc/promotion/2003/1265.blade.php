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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {
            font-size:15px; color:#ebebeb;
            background:#f36a5d url(https://static.willbes.net/public/images/promotion/2019/03/1063_01_bg.jpg) no-repeat center top;
            position:relative
        }
        /*플립 애니메이션*/
        .wb_top .main_img {
            position:absolute;
            width:784px;
            top:180px;
            left:50%;
            margin-left:-392px;
            z-index:10;
            opacity:0;
            filter:alpha(opacity=0);-webkit-animation-duration: 1s;
            animation-duration: 1s;-webkit-animation-fill-mode: both;
            animation-fill-mode: both
        }
        @@keyframes flipInX {
             from {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
                 opacity: 0;
             }
             40% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
             }
             60% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                 opacity: 1;
             }
             80% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
             }
             to {
                 -webkit-transform: perspective(400px);
                 transform: perspective(400px);
             }
         }

        .flipInX {
            -webkit-backface-visibility: visible !important;
            backface-visibility: visible !important;
            -webkit-animation-name: flipInX;
            animation-name: flipInX;
        }

        .wb_cts01 {background:#fff}

        .wb_cts02 { background:#232228; font-family:'Noto Sans KR', Arial, Sans-serif; color:#232228}

        /*타이머*/
        .time {width:100%; text-align:center; background:#e9e7e8}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px}
        .time .time_txt span {color:#ef6759; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#ef6759}
        50%{color:#ff6600}
        to{color:#ef6759}
        }
        @@-webkit-keyframes upDown{
        from{color:#ef6759}
        50%{color:#ff6600}
        to{color:#ef6759}
        } 

        .check {width:100%; margin:0 auto; padding:20px 0 100px; letter-spacing:3 !important; color:#fff; font-size:14px}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px;color:#27262c; background:#e3c0a2; margin-left:50px; border-radius:20px}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
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

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1063_01.jpg" alt="윌비스 7급 외무영사직 PASS" usemap="#Map190124A" border="0" />
            <map name="Map190124A" id="Map190124A">
                <area shape="rect" coords="884,901,1095,991" onclick="go_PassLecture(1);" target="_blank" alt="외무영사직 PASS 수강신청" />
            </map>
            <div class="main_img flipInX animated" style="opacity:1;">
                <img src="https://static.willbes.net/public/images/promotion/2019/03/1063_01_txt.png" alt="윌비스 7급 외무영사직 PASS" />
            </div>

            <div class="check" id="chkInfo">
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 윌비스 7급 외무영사직 PASS를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tab1">이용안내확인하기 ↓</a>
            </div>
        </div>
        <!--WB_top//-->


        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1063_02.jpg"  alt="윌비스 7급 외무영사직 PASS"  />
        </div><!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1063_03.jpg"  alt="윌비스 7급 외무영사직 PASS" usemap="#Map190124B" border="0"/>
            <map name="Map190124B" id="Map190124B">
                <area shape="rect" coords="884,872,1095,962" onclick="go_PassLecture(2);" alt="외무영사직 PASS 수강신청" />
            </map>
            <div class="check">
                <label>
                    <input name="ischk2"  type="checkbox" value="Y" />
                    페이지 하단 윌비스 7급 외무영사직 PASS를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tab1">이용안내확인하기 ↓</a>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1063_04.jpg"  alt="윌비스 7급 외무영사직 PASS" id="tab1"/>
        </div><!--wb_cts02//-->

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
                lUrl = "{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/149331') }}";
            }else{
                lUrl = "{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/149331') }}";
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