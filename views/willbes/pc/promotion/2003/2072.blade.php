@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        /*타이머*/
        .time {position:absolute; top:1110px; left:50%; width:920px; margin-left:-285px; text-align:center;}
        .time {text-align:center; padding:20px 0}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; float:left; line-height:61px; font-size:24px; margin-right:10px}
        .time li:first-child {margin-left:80px}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2072_top_bg.jpg) no-repeat center top;} 
        
        .wb_01 {background:#eaeaea}     

        .wb_02 {background:#fff}    

        .wb_03 {background:#f8ebc8} 
        .wb_04 {background:#f8ebc8} 

        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:17px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}               
        
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    
    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2072_top.jpg" alt="이종오 소방 동형 모의고사 무료배포" />
            <div class="time NGEB" id="newTopDday">
                <ul>
                    <li class="time_txt"><span>{{$arr_promotion_params['turn']}}주차 배포</span> 마감까지</li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">일</li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>             
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2072_01.jpg" alt="근거있는 자신감"/>
        </div> 

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2072_02.jpg" alt="동형모의고사 자료 무료배포" usemap="#Map2072a" border="0"/>
            <map name="Map2072a" id="Map2072a">
                <area shape="rect" coords="354,562,516,604" href="javascript:void(0);" onclick="fnFileDownload(0);"/>
                <area shape="rect" coords="849,563,1010,603" href="javascript:void(0);" onclick="fnFileDownload(1);"/>
                <area shape="rect" coords="355,642,516,684" href="javascript:void(0);" onclick="fnFileDownload(2);"/>
                <area shape="rect" coords="849,643,1010,684"href="javascript:void(0);" onclick="fnFileDownload(3);"/>
                <area shape="rect" coords="356,721,517,763" href="javascript:void(0);" onclick="fnFileDownload(4);"/>
                <area shape="rect" coords="850,722,1010,762" href="javascript:void(0);" onclick="fnFileDownload(5);"/>
                <area shape="rect" coords="355,803,516,844" href="javascript:void(0);" onclick="fnFileDownload(6);"/>
                <area shape="rect" coords="850,803,1010,843" href="javascript:void(0);" onclick="fnFileDownload(7);"/>
            </map>
        </div> 

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2072_03.jpg" alt="쿠폰 다운로드" usemap="#Map2072b" border="0"/>
            <map name="Map2072b" id="Map2072b">
                <area shape="rect" coords="149,692,311,734" href="javascript:void(0);" alt="쿠폰" onclick="giveCheck('{{$arr_promotion_params['give_idx1'] or ''}}');" />
                <area shape="rect" coords="479,692,640,733" href="javascript:void(0);" alt="쿠폰" onclick="giveCheck('{{$arr_promotion_params['give_idx2'] or ''}}');" />
                <area shape="rect" coords="809,692,970,734" href="javascript:void(0);" alt="쿠폰" onclick="giveCheck('{{$arr_promotion_params['give_idx3'] or ''}}');" />
            </map>
        </div> 

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2072_04.jpg" alt="바로 신청하기" usemap="#Map2072c" border="0"/>
            <map name="Map2072c" id="Map2072c">
                <area shape="rect" coords="120,406,321,466" href="https://pass.willbes.net/lecture/show/cate/3023/pattern/only/prod-code/178278" target="_blank" />
                <area shape="rect" coords="462,406,659,466" href="https://pass.willbes.net/lecture/show/cate/3023/pattern/only/prod-code/178277" target="_blank" />
                <area shape="rect" coords="800,406,999,465" href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/179762" target="_blank" />
            </map>
        </div> 

        <div class="evtCtnsBox wb_info" id="guide">
            <div class="guide_box">
                <h2 class="NSK-Black">이벤트 유의사항</h2>
                <dl>                                
                    <dd>
                        <ol>
                            <li>본 이벤트는 2021.3.4.(목)~4.1.(목) 진행됩니다.</li>
                            <li>이벤트에 무료배포 진행되는 문제/정답 파일은 [이종오 소방학개론/소방관계법규 실전동형모의고사] 학원실강 및 동영상강의에서 유료 제공되고 있는 파일이므로, 이벤트 기간 외 타인과의 공유나 유상 가치를 가진 판매 및 추가 자료 요청은 불가합니다.</li>
                            <li>파일은 PDF 형태로 다운로드 받으실 수 있으며, 각 회차의 배포시작일 오후 2시부터 다음 회차 배포 시작일 0시 이전까지 다운로드하실 수 있습니다.</li>
                            <li>제공된 문제/정답 자료 이외에 추가 해설이 필요하신 경우, [이종오 소방학개론 실전동형모의고사]/[이종오 소방관계법규 실전동형모의고사] 동영상 강좌를 유료 결제하시어 수강해주시면 됩니다.</li>
                            <li>이벤트 페이지 내 제공되는 [2021 이종오 소방학개론 실전동형모의고사 단과 30% 할인쿠폰], [2021 이종오 소방관계법규 실전동형모의고사 단과 30% 할인쿠폰], [2021 이종오 소방학/관계법규 실전동형모의고사 패키지 30% 할인쿠폰]의 경우 ID당 각 쿠폰 1회씩만 다운로드 후 이벤트 기간 내에만 사용 가능하며, 지정된 단강좌 이외에는 사용하실 수 없습니다.</li>
                        </ol>
                    </dd>
                </dl>         
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script>
        $regi_form = $('#regi_form');

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });

        function fnFileDownload(idx){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_base['promotion_live_file_list']) === false)
                var json_data = {!! json_encode($arr_base['promotion_live_file_list']) !!};
                    json_data = json_data[idx];

                if (typeof json_data.file_link !== 'undefined') {
                    var _url = json_data.file_link;
                    location.href = _url;
                }else{
                    alert('다운로드 가능한 기간이 아닙니다.');
                    return;
                }
            @endif
        }

        {{--쿠폰발급--}}
        function giveCheck(give_idx) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params) === false)

            @if(strtotime(date('YmdHi')) >= strtotime($arr_promotion_params['edate']))
            alert('쿠폰발급 기간이 아닙니다.');
            return;
            @endif

            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&give_idx=' + give_idx;
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                }
            }, showValidateError, null, false, 'alert');
            @endif
        }

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop