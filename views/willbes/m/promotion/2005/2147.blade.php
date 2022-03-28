@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.wrap a {border:1px solid #000} */

    /************************************************************/

    .dday {font-size:24px !important; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}    
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:14px !important;}
    
    .evtInfo {padding:50px 20px; background:#333; color:#fff; font-size:14px; margin-top:100px}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:30px; margin-bottom:40px}
    .evtInfoBox .infoTit {font-size:18px; margin-bottom:20px}
    .evtInfoBox .infoTit strong {padding:8px 20px; background:#000; border-radius:20px; font-weight:normal !important}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
    .evtInfoBox span {vertical-align:bottom}  
    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox dday NSK-Thin">
            <strong>이벤트 마감 <span id="ddayCountText" class="NSK-Black"></span> </strong>
            <a href="#lecbuy">신청하기 ></a>
        </div>

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2147m_top.jpg" alt="psat 합격을 예측하다">
        </div>

        <div id="lecbuy">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>0))
            @endif 
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">윌비스 한림법학원 동영상 새봄맞이 이벤트 이용안내</h4>
                <div class="infoTit"><strong>이용안내</strong></div>
                <ul>
                    <li>이벤트기간 해당 이벤트 페이지에서 등록된 강의 자유 선택 결제<br>
                        - 등록된 강의 모두 15%할인<br>
                        - 2과목  결제 모두 약 20%할인<br>
                        - 3과목이상 결제 모두 약 30%할인<br>
                        <br> 
                        [수강시작일관련]<br> 
                        - 2과목 이상 선택하시고 수강시작일 변경을 원하실 경우 동영상 게시판에 글을 남겨주시면 90일 범위내에서 수강시작일 변경하여 드리겠습니다.
                    </li>
                    <li>강의배수 제한 : 동영상 강의는 강의배수 제한 규정이 적용됩니다.</li>
                    <li>기기대수 제한 : 해당 이벤트 기기는 2대로 제한됩니다.(PC 1, 또는 모바일기기 1대 또는 각 기기별 2대)</li>
                    <li>해당 이벤트는 3월 31일 (목) 24:00 까지 적용됩니다.</li>
                    <li>본 이벤트는 학원 사정에 의해 사전공지없이 종료 또는 변경될 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>
                <div class="infoTit"><strong>환불</strong></div>
                <ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.(일부강의만의 환불은 불가합니다.)</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 정가 기준으로 계산하여 사용일수 만큼 차감 후 환불됩니다.</li>
                    <li>기타 약관의 규정에 따릅니다.</li>
                </ul>                
                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 강의는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                </ul>               
            </div>
        </div> 
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
        });       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop