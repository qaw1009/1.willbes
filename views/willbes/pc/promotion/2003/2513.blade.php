@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /*****************************************************************/ 


    .sky {position:fixed; top:200px; right:10px; width:157px; z-index:1; text-align:right}
    .sky a {display:block; margin-bottom:5px;}


    .evt_top {background:url('https://static.willbes.net/public/images/promotion/2022/01/2513_top_bg.jpg') no-repeat center top; position:relative;}   

    .evt_top .tabs {width:1120px; position:absolute; top:920px; left:50%; margin-left:-560px; z-index:1}
    .evt_top .tabs li {display:inline; float:left; width:20%}
    .evt_top .tabs li a {display:block; background:url('https://static.willbes.net/public/images/promotion/2022/01/2513_tab_off.png') no-repeat right top; color:#fff; font-size:20px; height:206px; line-height:1.2; text-align:center;}
    .evt_top .tabs li a:hover,
    .evt_top .tabs li a.active {background:url('https://static.willbes.net/public/images/promotion/2022/01/2513_tab_on.png') no-repeat right top; }
    .evt_top .tabs li a span {height:58px; line-height:58px; font-size:20px; display:block; margin-bottom:20px}
    
    .evt02 {margin-top:100px}   
    .evt03 {background:#f4f4f4}

    .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:14px}
    .evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:40px; margin-bottom:30px}
    .evtInfoBox .infoTit {font-size:20px;margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox ul li {list-style:disc; margin-left:20px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK">   
        <div class="sky" id="QuickMenu">
            <a href="#evt01"><img src="https://static.willbes.net/public/images/promotion/2022/01/2513_sky01.png"  title="새해 덕담" /></a>
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2022/01/2513_sky02.png"  title="모의고사" /></a>
            <a href="#evt03"><img src="https://static.willbes.net/public/images/promotion/2022/01/2513_sky03.png"  title="혜택" /></a>
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2022/01/2513_sky04.png"  title="할인" /></a>
        </div>

        <div class="evtCtnsBox evt_top" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2513_top.jpg" alt="설맞이 이벤트" >
        </div>


        <div class="evtCtnsBox evt01" data-aos="fade-up" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2513_01.jpg" alt="복 내려온다!" >
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>
        

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap" id="evt02">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2513_02.jpg" alt="혜택">
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="모의고사" style="position: absolute; left: 26.16%; top: 40%; width: 46.7%; height: 5.22%; z-index: 2;"></a>
                <a href="#none" id="evt03" title="혜택" style="position: absolute; left: 15.8%; top: 57.91%; width: 67.77%; height: 5.22%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up" id="evt04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2513_03.jpg" alt="할인" >
                <a href="#none" onclick="giveCheck('{{$arr_promotion_params['give_idx1'] or ''}}');" title="단과쿠폰" style="position: absolute; left: 19.73%; top: 20.38%; width: 12.86%; height: 1.5%; z-index: 2;"></a>
                <a href="#none" onclick="giveCheck('{{$arr_promotion_params['give_idx2'] or ''}}');" title="패키지쿠폰" style="position: absolute; left: 43.39%; top: 20.38%; width: 12.86%; height: 1.5%; z-index: 2;"></a>
                <a href="#none" onclick="giveCheck('{{$arr_promotion_params['give_idx3'] or ''}}');" title="패스쿠폰" style="position: absolute; left: 67.86%; top: 20.38%; width: 12.86%; height: 1.5%; z-index: 2;"></a>

                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2502" target="_blank" title="9급" style="position: absolute; left: 19.73%; top: 34.62%; width: 60.98%; height: 1.5%; z-index: 2;"></a>

                <a href="https://pass.willbes.net/promotion/index/cate/3022/code/1983" target="_blank" title="세무직" style="position: absolute; left: 19.38%; top: 49.62%; width: 10.27%; height: 1.5%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2503" target="_blank" title="소방직" style="position: absolute; left: 45.18%; top: 49.62%; width: 10.27%; height: 1.5%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3024/code/2099" target="_blank" title="군무원" style="position: absolute; left: 70.18%; top: 49.62%; width: 10.27%; height: 1.5%; z-index: 2;"></a>

                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2502" target="_blank" title="기술직" style="position: absolute; left: 13.3%; top: 56.47%; width: 73.39%; height: 37.37%; z-index: 2;"></a>
            </div>
        </div> 
        
        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NGEB">이벤트 유의사항</h4>
                <div class="mb30">이벤트 참여 전 유의사항을 반드시 숙지해주시기 바랍니다.</div>
                <div class="infoTit"><strong>[이벤트 공통 유의사항]</strong></div>
                <ul>
                    <li>본 이벤트는 윌비스 회원만 참여 가능합니다.</li>
                    <li>이벤트 진행 기간은 2022.1.24.(금) ~ 2022.2.2.(수), 총 10일간입니다.</li>
                    <li>진행된 이벤트에 대한 당첨자 발표 및 안내는 2022.2.3.(목) 윌비스 공무원 온라인 공지사항에서 확인하실 수 있습니다.</li>
                    <li>당첨자 발표 공지사항을 통해 이벤트 경품 지급일이 안내될 예정이며, 제공되는 이벤트 경품은 파트너사의 사정에 의해 동일 금액의 유사 상품으로 변경될 수 있습니다.</li>
                    <li>이미 지급된 경품에 대한 재지급은 불가하오니, 이벤트 종료일 이전까지 회원정보에 등록된 전화번호를 올바르게 수정해주시기 바랍니다.</li>
                    <li>각 이벤트 내 중복 당첨은 불가하나, 이벤트 간 중복 당첨은 가능합니다.</li>
                </ul>
                <div class="infoTit"><strong>[새해 덕담 나누면, 복 내려온다!]</strong></div>
                <ul>
                    <li>제시된 키워드를 많이 이용하여 기발한 댓글을 작성해주신 분을 대상으로 우선 추첨 진행합니다.</li>
                    <li>지나친 도배/욕설, 주제와 상관없는 댓글은 예고없이 관리자에 의해 삭제될 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>[모의고사로 실력 점검하면, 합격 내려온다!]</strong></div>
                <ul>
                    <li>해당 모의고사는 2021년 10월 16일 시행한 2022 대비 윌비스 전국모의고사 1회와 동일 문항입니다.</li>
                </ul>
                <div class="infoTit"><strong>[단 1개만 구매해도, 혜택 내려온다!]</strong></div>
                <ul>
                    <li>이벤트 기간 내 강의 구매 시 본 이벤트에 자동 응모되며, 이벤트 종료 후 무작위 추첨을 통해 당첨자를 선정합니다.</li>
                </ul>
                <div class="infoTit"><strong>[오직 설 연휴에만, 할인 내려온다!]</strong></div>
                <ul>
                    <li>안내된 쿠폰은 이벤트 기간 내 계정당 각각 최초 1회만 다운로드 가능합니다.</li>
                    <li>발급받으신 쿠폰은 이벤트 기간 내에만 사용 가능하며 추후 재발급 불가합니다.</li>
                </ul>

                <div class="strong"><strong>※ 이용문의 : 고객만족센터 1544-5006</div>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

    <script type="text/javascript">
        $regi_form = $('#regi_form');

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