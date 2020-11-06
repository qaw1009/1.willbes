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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        
        .evt_top {background: url(https://static.willbes.net/public/images/promotion/2020/11/1908_top_bg.jpg) no-repeat center top;}
        
        .evt_01 {background:#fff; padding-bottom:100px}
        .evt_01 .tabs {border-bottom:2px solid #00235b; width:1120px; margin:0 auto}
        .evt_01 .tabs li {display:inline; float:left; width:20%}
        .evt_01 .tabs a {display:block; padding:20px 0; text-align:center; font-size:20px; color:#fff; background:#737373; margin-right:1px}
        .evt_01 .tabs a:hover,
        .evt_01 .tabs a.active {background:#00235b;}
        .evt_01 .tabs li:last-child a {margin:0}
        .evt_01 .tabs:after {content:''; display:block; clear:both}

        .check {width:980px; margin:0 auto;letter-spacing:3; padding-top:30px;}
        .check label {cursor:pointer; font-size:15px;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#28f0f0; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#00235b;}

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.7;}
		.evtInfoBox h4 {font-size:25px; margin-bottom:25px;padding-left:10px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; margin-left:20px; list-style:disc}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1908_top.jpg" alt=""/>
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1908_01_01.jpg" alt="" />
            <ul class="tabs">
                <li><a href="#tab01">회계학</a></li>
                <li><a href="#tab02">경제학개론</a></li>
                <li><a href="#tab03">민법</a></li>
                <li><a href="#tab04">부동산학개론</a></li>
                <li><a href="#tab05">감정평가관계법규</a></li>
            </ul>
            <div>
                <span id="tab01"><img src="https://static.willbes.net/public/images/promotion/2020/11/1908_01_t01.jpg" alt="" /></span>
                <span id="tab02"><img src="https://static.willbes.net/public/images/promotion/2020/11/1908_01_t02.jpg" alt="" /></span>
                <span id="tab03"><img src="https://static.willbes.net/public/images/promotion/2020/11/1908_01_t03.jpg" alt="" /></span>
                <span id="tab04"><img src="https://static.willbes.net/public/images/promotion/2020/11/1908_01_t04.jpg" alt="" /></span>
                <span id="tab05"><img src="https://static.willbes.net/public/images/promotion/2020/11/1908_01_t05.jpg" alt="" /></span>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1908_01_02.jpg" alt="" /><br>
            <a href="javascript:go_PassLecture('174454');"><img src="https://static.willbes.net/public/images/promotion/2020/11/1908_01_03.jpg" alt="" /></a>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>  
        </div>    


		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox" id="careful">
				<h4 class="NGEB">수강안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
                    <li>본 상품은 2020년 11월 4일(수)부터 진행되는 감정평가 1차 문제풀이 강의가 제공됩니다.</li>
                    <li>이벤트 기간 내 본 상품 결제 시, 최대 수강료 30% 할인 수강혜택이 적용됩니다.<br>
                    (2과목 수강 -  5% 할인+수강기간  5일 연장 / 3과목 수강 - 10% 할인+수강기간 10일 연장<br>
                    4과목 수강 - 15% 할인+수강기간 10일 연장 / 5과목 수강 - 20% 할인+수강기간 20일 연장<br>
                    6과목 수강 - 30% 할인+수강기간 20일 연장)</li>
				</ul>
                <div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강 제한이 되어 있습니다.</li>
                </ul>
                <div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 구매하셔야 합니다.</li>
                    <li>본 상품 교재는 동영상 강의 신청 시 교재를 확인하시고 선택하신 후 구매하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>  
                    ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br /> 
                    ② 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br /> 
                    ③ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌수를 기준으로 환불 금액을 산출합니다.
                    </li>            
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
                    <li>해당 패키지 강의는 일시정지 및 연장 신청이 안 됨을 유의해주십시오.</li>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
                    <li>본 이벤트 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>     
                    <li>
                        [MAC ADDRESS 안내]<br>
                        본 이벤트 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
                        윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
                        MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.
                    </li>      
				</ul>
				<div class="infoTit NG"><strong>상담 및 문의</strong></div>
				<ul>
					<li>[상담시간] 평일 오전 10시 ~ 오후 5시</li>
					<li>[상담전화] 1544-5006</li>
                    <li>[상담내용] 강의 및 패키지 상품 안내</li>
				</ul> 
			</div>
		</div> 
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        );
        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/userPackage/show/cate/309003/prod-code/') }}' + code;
            location.href = url;
        }    

    </script>
@stop