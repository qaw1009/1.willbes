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
        .timeBox {background:#222}
        .time {width:980px; margin:0 auto; text-align:center;}
        .time {text-align:center; padding:20px 0}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; float:left; line-height:61px; font-size:30px; margin-right:10px;}
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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/09/2770_top_bg.jpg) no-repeat center top;}

        .evt_apply {padding-bottom:150px; display:flex; justify-content: space-between; width:1120px; margin:0 auto}
        .evt_apply a {display:block; padding:20px 0; text-align:center; width:48%; background:#333; color:#fff; font-size:36px}
        .evt_apply a:last-child {background:#663300}
        .evt_apply a:hover {background:#F8B400;}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/

    </style>

	<div class="evtContent NSK">

        <div class="evtCtnsBox timeBox" data-aos="fade-down">
            <div class="time NSK-Black" id="newTopDday">
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

		<div class="evtCtnsBox evt_top" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2770_top.jpg" alt="한가위 이벤트" />
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2770_01.jpg" alt="이벤트1" />			  
		</div>

        <div class="evtCtnsBox evt_apply NSK-Black">        
            @if($__cfg['CateCode'] == '3094')   
                <a href="https://gosi.willbes.net/userPackage/show/cate/3094/prod-code/200851" target="_blank" title="5급행정 pc">PC로 수강신청하기 ></a>
                <a href="https://gosi.willbes.net/m/userPackage/show/cate/3094/prod-code/200851" target="_blank" title="5급행정 모바일">모바일기기로 수강신청하기 ></a>
            @endif            
            @if($__cfg['CateCode'] == '3095') 
                <a href="https://gosi.willbes.net/userPackage/show/cate/3095/prod-code/200852" target="_blank" title="국립외교원 pc">PC로 수강신청하기 ></a>
                <a href="https://gosi.willbes.net/m/userPackage/show/cate/3095/prod-code/200852" target="_blank" title="국립외교원 모바일">모바일기기로 수강신청하기 ></a>
            @endif
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2770_02.jpg" alt="이벤트2" />			  
		</div>

        <div class="evtCtnsBox evt_apply NSK-Black">        
            @if($__cfg['CateCode'] == '3094')   
                <a href="https://gosi.willbes.net/lecture/index/cate/3094/pattern/only?search_order=regist&course_idx=1458" target="_blank" title="5급행정 pc">PC로 수강신청하기 ></a>
                <a href="https://gosi.willbes.net/m/lecture/index/cate/3094/pattern/only?search_order=regist&course_idx=1458" target="_blank" title="5급행정 모바일">모바일기기로 수강신청하기 ></a>
            @endif            
            @if($__cfg['CateCode'] == '3095') 
                <a href="https://gosi.willbes.net/lecture/index/cate/3095/pattern/only?search_order=regist&course_idx=1458" target="_blank" title="국립외교원 pc">PC로 수강신청하기 ></a>
                <a href="https://gosi.willbes.net/m/lecture/index/cate/3095/pattern/only?search_order=regist&course_idx=1458" target="_blank" title="국립외교원 모바일">모바일기기로 수강신청하기 ></a>
            @endif
		</div>

		<div class="evtCtnsBox evtInfo " id="careful">
			<div class="evtInfoBox">
				<h4 class="NGEB">이용안내</h4>
				<div class="infoTit NG"><strong>환불관련</strong></div>
				<ul>
                    <li>본상품은 이벤트 진행강의로 강의 환불시 동영상 단가 정가금액과 원수강일수기준으로 수강한 횟차를 제외한 수강하지 않은 강의 횟차에 대해 환불이 진행됩니다.<br>
                        다만, 원수강일수가 지난 강의는 환불이 되지 않습니다.</li>
                    <li>기타 환불규정은 약관의 규정에 따릅니다.</li>                  
				</ul>
				<div class="infoTit NG"><strong>수강시작일</strong></div>
				<ul>
                    <li>2과목 이상신청하시고 수강시작일 변경을 원하시는 분은 동영상 게시판에 원하시는 수강시작일을 남겨 주시면 90일 범위내에서 변경하여 드립니다.</li>
				</ul>
				<div class="infoTit NG"><strong>기타</strong></div>
				<ul>
                    <li>본 이벤트는 복지할인쿠폰 등 다른 쿠폰과 중복적용 되지 않습니다.</li>
                    <li>본 이벤트는 내부사정에 의해 사전공지없이 종료 또는 변경될 수 있습니다.</li>
				</ul>				
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

    <script>  
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });   
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop