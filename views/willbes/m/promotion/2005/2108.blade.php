@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; position:relative; font-size:14px; line-height:1.3; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;} 

    /************************************************************/
    .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#cf1425; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

    /* 이용안내 */
    .evtInfo {padding:40px 20px; background:#666; color:#fff; font-size:14px; margin-top:100px}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:26px; margin-bottom:30px}
    .evtInfoBox .infoTit {font-size:16px; margin-bottom:15px}
    .evtInfoBox .infoTit strong {padding:5px 15px; background:#000; border-radius:20px; font-weight:normal !important}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
    .evtInfoBox li span {color:#c4ebfd}
    .evtInfoBox span {vertical-align:bottom}  

    
    @@media only screen and (max-width: 374px)  {
        .dday {font-size:18px !important;}
        .dday a {padding:5px 10px;}  
        .event04 .tabs a {font-size:12px; padding:10px 0}
    }

    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox dday NSK-Thin">
            <strong class="NSK-Black">이벤트 마감 <span id="ddayCountText"></span> </strong>
            <a href="#lecbuy">수강신청 ></a>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2108m_top.jpg" alt="5급/국립외교원 예비순환 이벤트">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2108m_01.jpg" alt="혜택">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2108m_02.jpg" alt="자유선택">
        </div>

		<div class="evtCtnsBox">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>       

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">2022 예비순환 상품 이용안내</h4>
                <div class="infoTit"><strong>상품구성</strong></div>
                <ul>
                    <li>2022년도 5급 행정/국립외교원 예비순환 강의 중 이벤트기간 2과목이상 강의신청시 특별혜택이 적용됩니다.(교재별도)<br>
                    - 2과목 동시 수강신청시 : 수강료 15% 할인+수강기간 20일 연장<br>
                    - 3과목이상 동시 수강신청시 : 수강료 25% 할인+수강기간 20일 연장</li>
                    <li>본 이벤트는 ~3/22(화)까지 이벤트페이지에서 수강신청 및 결제완료시 적용됩니다.</li>
                    <li>수강시작일 설정관련(필독)<br>
                    - 개강예정인 과목들의 수강시작일은 해당 과목의 동영상 개강일에 자동시작이 됩니다.<br>
                    수강시작일을 변경 원하시는 분은 동영상게시판에 원하시는 시작일을 적어주시면 변경해드리겠습니다.(신청한 강의 동영상업로드일 이후 30일 범위내)</li>
                </ul>
                <div class="infoTit"><strong>수강관련</strong></div>
                <ul>
                    <li>신청하신 강의는 컴퓨터, 스마트기기(willbes.net/m)를 이용하여 수강할 수 있습니다.</li>
                    <li>동영상 강의는 배수 수강제한 규정이 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>교재관련</strong></div>
                <ul>
                    <li>강의교재는 별도로 주문하셔야 합니다.</li>
                    <li>각 강의별 교재는 동영상 강의개강 후 『내 강의실 바로가기』 → 강의보기를 클릭하셔도 주문하실 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>환불관련</strong></div>
                <ul>
                    <li>강의환불 시 원수강료와 수강일수 기준으로 환불이 됩니다.</li>
                    <li>기타 환불규정은 약관의 규정에 따릅니다.</li>
                </ul>
                <div class="infoTit"><strong>기타</strong></div>
                <ul>
                    <li>본 이벤트는 복지할인 등 다른 쿠폰과 중복 적용되지 않습니다.</li>
                    <li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop