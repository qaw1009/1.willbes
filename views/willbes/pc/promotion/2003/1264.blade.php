@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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

        .time {width:100%; text-align:center; background:#e9e7e8}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px}
        .time .time_txt span {color:#6c1827; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#6c1827}
        50%{color:#ff6600}
        to{color:#6c1827}
        }
        @@-webkit-keyframes upDown{
        from{color:#6c1827}
        50%{color:#ff6600}
        to{color:#6c1827}
        } 
        .wb_top00 {background:#e9e7e8}
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/05/1061_top_bg.jpg) no-repeat center top; position:relative}
        .wb_top span {width:256px; position:absolute; left:50%; top:82px; margin-left:-450px}
        .wb_cts01 {background:#fff;}

        .wb_cts02 {background:#fff url(https://static.willbes.net/public/images/promotion/2019/05/1061_04_bg.jpg) no-repeat center top;}
        .wb_cts02 .mv_bg {position:relative; width:1210px; height:553px; margin:0 auto; background:#fff url(https://static.willbes.net/public/images/promotion/2019/05/1061_05_bg.jpg) no-repeat center top;}
        .wb_cts02 .mv_bg ul {position:absolute; width:954px; top:19px; left:50%; margin-left:-477px}
        .wb_cts02 .mv_bg li {display:inline; float:left;}
        .wb_cts02 .mv_bg ul:after {content:""; display:block; clear:both}

        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2019/05/1061_07_bg.jpg) no-repeat center top;}
        .wb_cts03 .check {width:980px; margin:0 auto; padding:15px 0px 120px 20px; letter-spacing:3; font-weight:bold; color:#f8eff0; cursor:pointer}
        .wb_cts03 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px}
        .wb_cts03 .check a {display:inline-block; padding:12px 20px 10px 20px; color:#4680a5; background:#fff; margin-left:50px; border-radius:20px}

        .wb_cts04 {background:#eeeced;}
        .wb_cts05 {background:#fff;}

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            width:163px;
            z-index:10;
        }
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner">            
            <a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/05/1264_skybanner.png" alt="환승이벤트"></a>
        </div>

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

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1061_top01.jpg" alt="윌비스9급PASS X 세무PASS와 만나다!"  />
            <span><img src="https://static.willbes.net/public/images/promotion/2019/05/1061_top02.gif" alt="5~6월 지방직/서울직"  /></span>
        </div><!--WB_top//-->


        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1061_01.jpg" alt="무작정 시작한 공무원 시험 준비" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1061_02.gif" alt="고민?" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1061_03.jpg" alt="어떤 고민일지라도 윌비스9급PASS가 진리!" />
        </div><!--wb_cts01//-->


        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1061_04.jpg" alt="전문 교수진과 함께라면 흔들림 없는 실력 완성!" />
            <div class="mv_bg">
                <ul>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1061_05_mv1.gif" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1061_05_mv2.gif" alt="" /></li>
                    <li style="padding-left:60px;"><img src="https://static.willbes.net/public/images/promotion/2019/05/1061_05_mv5.gif" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1061_05_mv6.gif" alt="" /></li>
                    <!--다음줄-->
                    <li style="clear:left;"><img src="https://static.willbes.net/public/images/promotion/2019/05/1061_05_mv3.gif" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1061_05_mv4.gif" alt="" /></li>
                    <li style="padding-left:60px;"><img src="https://static.willbes.net/public/images/promotion/2019/05/1061_05_mv7.gif" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1061_05_mv8.gif" alt="" /></li>
                </ul>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1061_06.jpg" alt="" />
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1061_07.jpg" alt=" " usemap="#Map1061A" border="0" />
            <map name="Map1061A" id="Map1061A" >
                <area shape="rect" coords="803,610,937,696" href="javascript:go_PassLecture(1);" alt="6개월 수강신청"   onfocus="this.blur();" />
                <area shape="rect" coords="803,718,937,805" href="javascript:go_PassLecture(2);" alt="12개월 수강신청"   onfocus="this.blur();" />
            </map>
            <div class="check" id="chkInfo"><label><input name="ischk" type="checkbox" value="Y" /> 페이지 하단 윌비스 9급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label><a href="#tab1">이용안내확인하기 ↓</a></div>
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1061_08.jpg" alt=" " usemap="#Map1061B" border="0" />
            <map name="Map1061B" id="Map1061B" >
                <area shape="rect" coords="325,842,782,914" href="javascript:certOpen();" alt="타 사이트 수강 인증하기" />
                <area shape="rect" coords="457,922,633,966" href="#info" alt="유의사항 확인하기"/>
            </map>
        </div><!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05" id="info">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1264_09.jpg" alt=" 윌비스 9급 PASS 이용안내" />
        </div><!--wb_cts05//-->

    </div>
    <!-- End Container -->
    <script>
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

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
                lUrl = "{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/149329') }}"
            }else{
                lUrl = "{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/149328') }}"
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