@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:200px; width:171px; text-align:center; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .wb_top {background:#01c73c url(https://static.willbes.net/public/images/promotion/2022/09/2777_top.jpg) no-repeat center top; height: 1352px;}
        .wb_top a {display:block; width:720px; font-size:30px; background:#f2f2f2; color:#00611d; border-radius:50px; text-align:center; padding:28px 0; position: absolute; top:1100px; left:50%; margin-left:-360px}
        .wb_top span {color:#ff0000}
        .wb_top a:hover {background:#000; color:#fff}

        .wb_01 {padding-bottom:100px}
        .wb_01 a {display:inline-block}
        .wb_02 {background:#01c73c}

        /* 이용안내 */
        .wb_info {padding:100px 0; color:#3a3a3a; line-height:1.4; background:#fff;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px; }
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:18px;}        
        .guide_box dd{color:#3a3a3a; margin:0 0 20px 5px;}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:15px}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt01"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2777_sky01.jpg" alt="네이버페이" >
            </a>   
            <a href="#evt02"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2777_sky02.jpg" alt="윌비스 드림팩" >
            </a>                   
        </div>
        
        <div class="evtCtnsBox wb_top">
            {{--<a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" target="_blank" data-aos="fade-right" class="NSK-Black">지금 바로 윌비스 공무원으로 <span>합격의 꿈</span> 시작하기  →</a>--}}
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2777_01_01.jpg" alt="" data-aos="fade-up"/>
            <div>
                <a href="javascript:alert('마감 되었습니다.')" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/09/2777_01_02.jpg" alt="네이버페이"/></a>
                <a href="#evt02" data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/09/2777_01_03.jpg" alt="윌비스 드림팩"/></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2777_02_01.jpg" alt="혜택 1" id="evt01"/><br>
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2777_02_02.jpg" alt="혜택 2" id="evt02"/>
        </div>

        <div class="evtCtnsBox wb_info" id="info" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내 및 유의사항</h2>
                <dl>
                    <dt>기간</dt>
                    <dd>
                        <ol>
                            <li>2022.09.19.(월)~2022.09.30.(금) (선착순 마감 시, 이벤트 종료)</li>
                        </ol>
                    </dd>

                    <dt>대상</dt>
                    <dd>
                        <ol>
                            <li>이벤트 기간 내 윌비스 통합사이트 회원가입 및 관심직렬 [공무원]을 체크한 회원</li>
                            <li>마케팅 수신 동의</li>
                        </ol>
                    </dd>

                    <dt>참여 안내</dt>
                    <dd>
                        <ol>
                            <li>ID/전화번호당 1회만 참여 가능합니다. (중복 참여 불가)</li>
                            <li>이벤트 기간 내 신규회원 가입</li>
                            <li>탈퇴 후 재가입, 중복 가입, 불법 매크로 이용 등의 부적절한 방법으로 이벤트 참여 시 별도 안내 없이 당첨자 선정에서 제외되며, 사이트 이용에 불이익을 받을 수 있습니다.</li>
                            <li>본 이벤트는 선착순 마감 방식으로 진행되므로, 사전에 고지없이 종료될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>네이버페이 지급 안내</dt>
                    <dd>
                        <ol>
                            <li>이벤트 종료 후 2022.10.05.(수) 윌비스 공무원 공지사항에서 당첨 공지를 확인해주시기 바랍니다.</li>
                            <li>당첨 공지일 기준 탈퇴회원 및 마케팅 수신동의 해제하신 경우 혜택 지급 대상에서 제외됩니다.</li>
                            <li>이벤트 경품은 MMS 문자로 발송되며, 지급 공지를 통해 경품 발송 일정 안내 후 일괄적으로 발송됩니다.</li>
                            <li>네이버페이 등록 경로 : 네이버 Pay 메뉴 접속 → 혜택·쿠폰 → 쿠폰 등록</li>
                        </ol>
                    </dd>          
                </dl> 
            </div>
        </div>

    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop