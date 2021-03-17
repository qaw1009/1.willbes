@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2124_top_bg.jpg) no-repeat center top;}	

        .evt_01 {margin-bottom:100px}
        
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
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2124_top.jpg" alt="온라인 첨삭반" />
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2124_01.jpg" alt="강의일정" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2124_02.jpg" alt="강의일정" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2124_03.jpg" alt="강의일정" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2124_04.jpg" alt="강의일정" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2124_05.jpg" alt="강의일정" />               
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif        
        </div>
        
        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">윌비스 한림법학원 5급행정/국립외교원 대비 3순환 온라인 첨삭반 안내</h4>
                <div class="infoTit"><strong>수강관련</strong></div>
                <ul>
                    <li>강의 일정에 따라 홈페이지 “내강의실”에서 강의 진행됩니다.</li>
                    <li>개강 전 원격 채점 진행방법에 관해 안내드립니다.</li>
                    <li>강의 일정은 실강 진행 상황에 따라 변경될 수 있습니다.</li>
                    <li>이용 중에는 휴강 기능을 이용할 수 없습니다.</li>
                    <li>복습동영상은 과목별 1회에 한해 30일간 제공되며, 2021년 7월 14일까지 신청 가능합니다.(이후 신청 불가)</li>
                </ul>
                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>무료제공되는 교재 외의 교재 및 자료는 별도로 구매하셔야 합니다.</li>
                </ul>
                <div class="infoTit"><strong>무이자 할부 안내</strong></div>
                <ul>
                    <li>무이자 할부 개월수는 각 카드사 및 결제대행사(PG사) 할부 프로모션에 따라 상이합니다.(※ 결제대행사 무이자 가능한 할부 개월수 미확인 후 발생하는 불이익은 당사가 책임지지 않습니다.)</li>
                    <li>결제 완료 후 [카드변경 결제],[무이자 할부 변경] 목적으로 재결제가 진행될 경우 기수별 혜택이 변경되었을 시 최초 결제 혜택으로 적용되지 않습니다.</li>
                    <li>법인/ 기업/ 체크 /기프트/ 선불 은행계열 카드 등 일부 카드의 경우 할부가 적용되지 않을 수 있으며, 자세한 사항은 각 카드사 홈페이지를 참고 바랍니다.</li>
                </ul>
                <div class="infoTit"><strong>기기제한</strong></div>
                <ul>
                    <li>수강 기기는 PC 1대, 핸드폰 1대로 제한됩니다.</li>
                </ul>
                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>아이디 공유 적발 시 회원 자격이 박탈되며 환불 불가함을 원칙으로 합니다.</li>
                    <li>추가적인 불법 공유 행위 적발 시 형사 고발 조치가 진행될 수 있는 점, 양지해주시기 바랍니다.</li>
                </ul>
                <div class="infoTit"><strong>환불정책</strong></div>
                <ul>
                    <li>환불시 할인율 적용이 해지되며, 신청일 기준 정가 정산됩니다.</li>
                    <li>환불시 무료제공된 교재 비용 차감됩니다.</li>
                    <li>기타 환불 정책은 결제시 공지된 [환불정책 안내]에 따라 진행됩니다.</li>
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