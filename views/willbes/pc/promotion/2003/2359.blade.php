@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2359_top_bg.jpg) no-repeat center top;}

        /* 이용안내 */
        .wb_info {padding:100px 0;background:#ececec;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:15px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px;margin-bottom:20px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2359_top.jpg" alt="덕후력퀴즈"  data-aos="fade-left" />                 
        </div>

        <div class="evtCtnsBox wb_cts01"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2359_01.jpg" alt="퀴즈 어떻게 풀면 되나요" data-aos="fade-right" />           
                <a href="javascript:void(0)" title="실전덕후단 464 덕후력 QUIZ 풀기" style="position: absolute;left: 30.3%;top: 89.3%;width: 38.57%;height: 6.9%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img  src="https://static.willbes.net/public/images/promotion/2021/09/2359_02.jpg" alt="라이브 토크쇼" data-aos="fade-left"/>        
        </div>       

        <div class="evtCtnsBox wb_info" id="careful">
            <div class="guide_box">
                <h2 class="NSK-Black">이벤트 유의사항</h2>
                <dl>
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 2021년 9월 14일 (화) ~ 9월 30일 (목) 까지 진행되며, 이벤트 기간 내에 총 4일간 참여 가능합니다.</li>
                            <li>당첨자 발표일은 10월 1일 (금)으로 모든 이벤트 종료 후 경품은 일괄 지급 예정이며, 윌비스 공무원 공지사항을 통해 당첨자 확인 후 경품 수령 및 쿠폰/포인트 사용 일정에 대해 안내드릴 예정입니다.</li>
                            <li>1개의 ID당 1회만 참여할 수 있으며, 유사하거나 동일한 ID 및 휴대폰 번호로 참여한 경우, 이벤트에 참여했을지라도 경품 수령 기회를 박탈 당할 수 있습니다.</li>
                            <li>본인 명의의 계정이 아닌 경우, 당첨 및 경품 지급이 취소될 수 있습니다.</li>
                            <li>반드시 모든 문제를 푼 후 “완료”버튼을 눌러주셔야 하며, QUIZ 리스트에 “참여완료”로 표시된 경우에만 각 회차별 정상 참여로 인정됩니다.</li>
                            <li>본 이벤트 참여 경품은 이벤트 기간동안 퀴즈풀기에 참여한 누적 횟수에 따라 제공됩니다.<br>
                                (각 회차 달성 시 이전 회차별 경품 중복 지급 예정)
                            </li>
                        </ol>
                    </dd>          
                </dl>
            </div>
        </div>
    </div>
    <!-- End Container -->
 
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>



    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop