@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/ 

        /*타이머*/
        .timeBox {background:#333}
        .time {width:920px; margin:0 auto; text-align:center;}
        .time {text-align:center; padding:20px 0}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; float:left; line-height:61px; font-size:24px; margin-right:10px;}
        .time li:first-child {margin-left:80px}
        .time li img {width:44px}
        .time .time_txt {color:#fff; letter-spacing:-1px}
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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2108_top_bg.jpg) no-repeat center top;}	

        .evt_01 {background:#dbdbdb;}
        
        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:14px; margin-top:100px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:30px; margin-bottom:40px}
		.evtInfoBox .infoTit {font-size:18px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#000; border-radius:20px; font-weight:normal !important}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
        .evtInfoBox span {vertical-align:bottom}  
 
        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
        <div class="evtCtnsBox timeBox">
            <div class="time NGEB" id="newTopDday">
                <ul>
                    <li class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</li>
                    <li class="time_txt"><span>남은 시간은</span></li>
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

		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2108_top.jpg" alt="변호사 시험 대비" />
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2108_01.jpg" alt="수강특전" />
		</div>

		<div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2108_02.jpg" alt="선택형 기출정리 특강" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
		</div>  
        
        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">2021 예비순환 상품 이용안내</h4>
                <div class="infoTit"><strong>상품구성</strong></div>
                <ul>
                    <li>2021년도 5급 행정/국립외교원 예비순환 강의 중 이벤트기간 2과목이상 강의신청시 특별혜택이 적용됩니다.(교재별도)<br>
                    - 2과목 동시 수강신청시 : 수강료 15% 할인+수강기간 20일 연장<br>
                    - 3과목이상 동시 수강신청시 : 수강료 25% 할인+수강기간 20일 연장</li>
                    <li>본 이벤트는 ~3/21(일)까지 이벤트페이지에서 수강신청 및 결제완료시 적용됩니다.</li>
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

     <script>  
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });   
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop