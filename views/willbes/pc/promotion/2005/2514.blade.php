@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/01/2514_top_bg.jpg) repeat-x center top;}	
        .evt_top div {position:absolute; top:50px; width:100%; text-align:center;}

        .evt_01 {background:#cf1425}

        .evt_02 {background:#670c14; color:#fff; padding:80px 0; color:#fff; text-align:left; line-height:1.3; font-size:16px}
        .evt_02 li {margin-bottom:15px; list-style:disc; margin-left:20px}
        .evt_02 li:last-child {margin-bottom:0}
        .evt_02 strong {color:#ffff00}

        .evt_03 {text-align:left; padding-bottom:100px; width:1120px; margin:auto}
        .evt_03 .title {font-size:50px; color:#000; margin:100px auto 30px}
        .evt_03 .title strong {color:#cf1425}
        
        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:14px; margin-top:100px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:30px; margin-bottom:40px}
        .evtInfoBox h4 strong {color:#94f2fa}
		.evtInfoBox .infoTit {font-size:18px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#000; border-radius:20px; font-weight:normal !important}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
        .evtInfoBox span {vertical-align:bottom}  


 
        /************************************************************/      
    </style> 

	<div class="evtContent NSK">         


		<div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2514_top.jpg" alt="혜택" />
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2514_01.jpg" alt="5급공채(행정) GS2순환 과정" />
        </div>  
        
        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <ul class="wrap">                    
            <li><strong>이벤트 페이지</strong>에서 등록된 강의를 이벤트 기간 동안 결제시 자동할인 적용됩니다.<strong>(1차, 2차과목 및 각 순환 구분없이 자유선택)</strong></li>
            <li>본상품은 이벤트 진행강의로 강의환불시 동영상 단가 정가금액과 원수강일수기준으로 수강한 횟차를 제외한 수강하지 않은 강의 횟차에 대해 환불이 진행됩니다.<br>
                다만, 원수강일수가 지난 강의는 환불이 되지 않습니다.   기타 환불규정은 약관의 규정에 따릅니다.<br>
            * 본 이벤트는 복지할인쿠폰 등 다른 쿠폰과 중복적용되지 않습니다.<br>
            * [수강시작일관련] 수강시작일은 30일 범위내에서 설정 가능하시며, 수강시작일 변경을 원하실 경우 동영상 게시판에 글을 남겨주시면 90일 범위내에서 변경하여 드리겠습니다.</li>
            <li>본 이벤트는 내부사정에 의해 사전공지없이 종료 또는 변경될 수 있습니다.</li>
            </ul> 
        </div> 

        <div class="evtCtnsBox evt_03" id="lecwrap">
            <div class="title NSK-Black">5급/외교원 <strong>예비순환</strong></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 

            <div class="title NSK-Black">5급/외교원 <strong>GS1순환</strong></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif 

            <div class="title NSK-Black">5급/외교원 <strong>GS2순환</strong></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
            @endif 

            <div class="title NSK-Black">5급/외교원 <strong>GS3순환</strong></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
            @endif

            <div class="title NSK-Black">5급헌법+PSAT</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>5))
            @endif
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