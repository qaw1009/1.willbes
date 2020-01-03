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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/10/1432_top_bg.jpg) no-repeat center top; }

        .wb_cts01 {background:#f6f6f6;}

        .wb_cts02 {background:#f6f6f6; font-family:'Noto Sans KR', Arial, Sans-serif; font-size:15px; color:#232228;}
        .wb_cts02 ul {position:absolute; top:916px; width:470px; left:50%; z-index:1}
        .wb_cts02 li {display:inline; float:left}
            .leftGif {margin-left:-495px}
            .rightGif {margin-left:25px}
        .wb_cts02 ul:after {content:""; display:block; clear:both}
        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2019/10/1432_03_bg.jpg) no-repeat center top;}

        .check {width:980px; margin:0 auto; padding:20px 0px 20px 10px; letter-spacing:3;}
        .check label {cursor:pointer; font-size:14px}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#3a0642; margin-left:50px; border-radius:20px}
        .check a:hover {background:#54ed24;}

        .wb_cts04 {background:#f8e9fa; padding-bottom:120px}
        .wb_cts05 {background:#fff; padding-top:120px}
        /*타이머*/
        .time {width:100%; text-align:center; background:#000}
        .time {text-align:center; padding:20px 0}
        .time table {width:1100px; margin:0 auto}
        .time table td:first-child {font-size:36px}
        .time table td img {width:70%}
        .time .time_txt {font-size:26px; color:#fff; letter-spacing:-1px; font-weight:bold;}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time p {text-alig:center}
        @@keyframes upDown{
        from{color:#54ed24}
        50%{color:#b2ed24}
        to{color:#54ed24}
        }
        @@-webkit-keyframes upDown{
        from{color:#54ed24}
        50%{color:#b2ed24}
        to{color:#54ed24}
        }       

    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB"  id="newTopDday">
            <div>
                <table>
                    <tr>
                        <td class="time_txt">
                        {{$arr_promotion_params['turn']}}기 - 
                        <span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!
                        </td>                        
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
                        <td class="time_txt">초 남았습니다.</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1432_top.gif" alt="윌비스 7급 PASS" usemap="#Map1432A" border="0" />
            <map name="Map1432A" id="Map1432A">
                <area shape="rect" coords="222,728,910,803" href="#goLec" alt="12개월수강신청">              
            </map>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1432_01.gif"  alt="윌비스의 7급 커리큘럼"  />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1432_02.jpg"  alt="윌비스의 7급 커리큘럼"  />
            <ul class="leftGif">
                <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1432_02_t1.gif"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1432_02_t2.gif"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1432_02_t3.gif"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1432_02_t4.gif"/></li>
            </ul>
            <ul class="rightGif">
                <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1432_02_t5.gif"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1432_02_t6.gif"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1432_02_t7.gif"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1432_02_t8.gif"/></li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1432_03.jpg"  alt="윌비스의 7급 커리큘럼"  />
        </div>

        <div class="evtCtnsBox wb_cts04" id="goLec">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1432_04.jpg"  alt="윌비스의 7급 커리큘럼" usemap="#Map1432B" border="0"  />
            <map name="Map1432B" id="Map1432B">
                <area shape="rect" coords="598,703,926,784" href="javascript:go_PassLecture(1);" />
            </map>
            <div class="check">
                <label>
                    <input name="ischk2"  type="checkbox" value="Y" />
                    페이지 하단 윌비스 7급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tab1">이용안내확인하기 ↓</a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05" id="passInfo">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1432_05.jpg"  alt="윌비스의 7급 커리큘럼"  />            
        </div>

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
                lUrl = "{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/157472') }}"
            }else{
                lUrl = "{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/149307') }}"
            }
            location.href = lUrl;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop