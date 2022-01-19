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

        /*타이머*/
        .time {width:1120px; margin:0 auto; text-align:center; padding:20px 0}
        .time ul {width:100%; display:flex; justify-content: center;}
        .time li {line-height:61px; font-size:24px; margin-right:10px; position: relative;}
        .time li:first-child,
        .time li:last-child {line-height:1.3; color:#363635}
        .time li:first-child {margin-right:20px}
        .time li:last-child {margin-left:20px}
        .time li:first-child span {color:#C82F25}        
        .time li:last-child span {line-height:2.5; color:#363635;font-weight:bold;} 
        .time li:last-child a {display:block; color:#fff; background:#242424; padding:10px 20px; margin-top:20px}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time .d_day {color:#fff;font-size:30px;}
        
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/01/2514_top_bg.jpg) repeat-x center top;}	
        .evt_top div {position:absolute; top:50px; width:100%; text-align:center;}

        .evt_01 {background:#cf1425}

        .evt_02 {background:#670c14; color:#fff; padding:80px 0; color:#fff; text-align:left; line-height:1.3; font-size:16px}
        .evt_02 li {margin-bottom:15px; list-style:disc; margin-left:20px}
        .evt_02 li:last-child {margin-bottom:0}
        .evt_02 strong {color:#ffff00}

        .evt_03 {padding:100px 0; width:1120px; margin:auto}
        .evt_03 .tabs {display:flex; margin-bottom:20px}
        .evt_03 .tabs a {font-size:20px; text-align:center; display:block; width:20%; background:#670c14; color:#fff; padding:20px 0 }
        .evt_03 .tabs a.active {background:#fff; color:#000; border:3px solid #670c14; border-bottom:0}
        .evt_03 .tabs a strong {color:#cf1425}        
 
        /************************************************************/      
    </style> 

	<div class="evtContent NSK">     
            
        <div class="evtCtnsBox">       
            <div class="time NSK-Black" id="newTopDday">
                <ul>
                    <li>
                        <span>[이벤트 마감]</span><br>
                              1.25(화)까지
                    </li>
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
                    <li>
                        <span class="NSK">남았습니다.</span>                        
                    </li>          
                </ul>
            </div> 
        </div>  

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
            <div class="tabs NSK-Black">
                <a href="#tab01" class="active">5급/외교원<br><strong>예비순환</strong></a>
                <a href="#tab01">5급/외교원<br><strong>GS1순환</strong></a>
                <a href="#tab01">5급/외교원<br><strong>GS2순환</strong></a>
                <a href="#tab01">5급/외교원<br><strong>GS3순환</strong></a>
                <a href="#tab01">5급헌법 <br>+ PSAT</a>
            </div>

            <div id="tab01" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif
            </div> 

            <div id="tab02" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif 
            </div> 

            <div id="tab03" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                @endif
            </div> 

            <div id="tab04" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
                @endif
            </div> 

            <div id="tab05" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>5))
                @endif
            </div>
        </div>       
        

	</div>
     <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();

            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabs a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabs a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });

            /*디데이*/
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

    </script>
    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop