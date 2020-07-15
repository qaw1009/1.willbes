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

         /*타이머*/
         .time {width:100%; text-align:center; background:#e1e1e1}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:80%}
        .time .time_txt {font-size:28px; color:#000; letter-spacing: -1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
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

        .sky {position:fixed; top:250px; right:10px; z-index:1;}
        .sky ul li {padding-bottom:10px;}
 
        .wb_top {background:#584883 url(https://static.willbes.net/public/images/promotion/2020/07/1717_top_bg.jpg) no-repeat center top;}

        .wb_cts01, .wb_cts02, .wb_cts03 {background:#EBEBEB;}

        .wb_cts04 {background:#7D3EA6 url(https://static.willbes.net/public/images/promotion/2020/07/1717_04_bg.jpg) no-repeat center top;position:relative;}
        .check { position:absolute; bottom:50px; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:14px;color:#FFF;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

        .wb_cts05 {background:#F2F0F1;}

        .wb_cts06 {background:#E1E1E1;}

    </style>


    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>
                    <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</td>
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

        <div class="sky">
            <ul>          
                <li><a href="#event01"><img src="https://static.willbes.net/public/images/promotion/2020/07/1717_sky01.png"  title="소문내면" /></a></li>
                <li><a href="#event02"><img src="https://static.willbes.net/public/images/promotion/2020/07/1717_sky02.png"  title="환승시" /></a></li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1717_top.jpg" alt="9급 패스"  />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1717_01.jpg" alt="전문 교수진" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1717_02.jpg" alt="효율적인 학습" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1717_03.jpg" alt="알차게 이용" usemap="#Map1717a" border="0" />
            <map name="Map1717a" id="Map1717a">
                <area shape="rect" coords="137,682,484,771" href="#event01" />
                <area shape="rect" coords="640,683,976,771" href="#event02" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1717_04.jpg" alt="수강신청" usemap="#Map1717apply" border="0" />
            <map name="Map1717apply" id="Map1717apply">
                <area shape="rect" coords="513,757,922,844" href="javascript:go_PassLecture('168184');">
            </map>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 윌비스 9급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05" id="event01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1717_05.jpg" alt="환승 이벤트" usemap="#Map1717sns" border="0" />
            <map name="Map1717sns" id="Map1717sns">
                <area shape="rect" coords="113,461,288,534" href="https://cafe.naver.com" target="_blank" />
                <area shape="rect" coords="310,460,398,535" href="http://cafe.daum.net" target="_blank" />
                <area shape="rect" coords="413,459,645,535" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" />
            </map>
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial', array('bottom_cafe_type'=>'N'))
            @endif
        </div>

        <div class="evtCtnsBox wb_cts06" id="event02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1717_06.jpg" alt="인증하기" usemap="#Map1717b" border="0" />
            <map name="Map1717b" id="Map1717b">
                <area shape="rect" coords="339,847,775,902" href="javascript:certOpen();"/>
                <area shape="rect" coords="469,927,619,958" href="#careful" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts07" id="careful">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1717_07.jpg" alt="이용안내" />
        </div>

    </div>
    <!-- End Container -->

    <script>    

        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    

        /* 팝업창 */ 
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

         /*디데이카운트다운*/
         $(document).ready(function() {
                dDayCountDown('{{$arr_promotion_params['edate']}}');
            });
        });


    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop