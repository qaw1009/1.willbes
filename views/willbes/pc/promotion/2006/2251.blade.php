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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 5px 20px rgba(0,0,0,.5); background:rgba(255,255,255,.1); border-radius:6px}

		.check {padding-bottom:50px;letter-spacing:3; color:#fff; margin-top:30px}
        .check label {cursor:pointer; font-size:17px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#0005b7; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

        .evt_01 ,.evt_02, .evt_03 {background:#f0f0f0}

        .evt_01 {position:relative;}
        .evt_01 .sample {position:absolute;left:50%;top:4.5%;margin-left:200px}
        .sample a {display:block;width:290px;height:70px;line-height:70px;color:#000; background:#d8d8d8; margin-left:50px;font-size:25px;font-weight:bold;margin-top:5px;}

        .evt_02 {position:relative;}
        .evt_02 .sample {position:absolute;left:50%;top:0.75%;margin-left:200px}
        .sample a {display:block;width:290px;height:70px;line-height:70px;color:#000; background:#d8d8d8; margin-left:50px;font-size:25px;font-weight:bold;margin-top:5px;}

        .evt_03 {position:relative;}
        .evt_03 .sample {position:absolute;left:50%;top:1.85%;margin-left:200px}
        .sample a {display:block;width:290px;height:70px;line-height:70px;color:#000; background:#d8d8d8; margin-left:50px;font-size:25px;font-weight:bold;margin-top:5px;}

        .sample a:hover {background:#0005b7;color:#fff;}

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

        <div class="evtCtnsBox evt_top">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2251_top.jpg" alt="스터대패스 안내" />
                <a href="javascript:go_PassLecture('183265');" title="신청하기" style="position: absolute;left: 77%;top: 80.9%;width: 23%;height: 15.69%;z-index: 2;"></a>
            </div>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 스터디패스 프로모션 내용 및 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div> 
		</div>	

        <div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2251_01.jpg" alt="합격의 기준" />
            <div class="sample">
                <a href="javascript:fnPlayerSample('161455', '1252757', 'HD');" title="">▶ 1기 샘플강의 보기</a> 
                <a href="javascript:fnPlayerSample('161456', '1271550', 'HD');" title="">▶ 2기 샘플강의 보기</a> 
                <a href="javascript:fnPlayerSample('161458', '1281746', 'HD');" title="">▶ 3기 샘플강의 보기</a> 
                <a href="javascript:fnPlayerSample('161459', '1290737', 'HD');" title="">▶ 4기 샘플강의 보기</a>   
            </div>
		</div>

        <div class="evtCtnsBox evt_02">
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2251_02.jpg" alt="합격의 기준" />
            <div class="sample">
                <a href="javascript:fnPlayerSample('172509', '1252759', 'HD');" title="">▶ 1기 샘플강의 보기</a> 
                <a href="javascript:fnPlayerSample('172510', '1271554', 'HD');" title="">▶ 2기 샘플강의 보기</a> 
                <a href="javascript:fnPlayerSample('172511', '1281751', 'HD');" title="">▶ 3기 샘플강의 보기</a> 
                <a href="javascript:fnPlayerSample('172513', '1290739', 'HD');" title="">▶ 4기 샘플강의 보기</a>   
            </div>
		</div>

        <div class="evtCtnsBox evt_03">
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2251_03.jpg" alt="합격의 기준" />
            <div class="sample">
                <a href="javascript:fnPlayerSample('161493', '1252755', 'HD');" title="">▶ 1기 샘플강의 보기</a> 
                <a href="javascript:fnPlayerSample('161494', '1271556', 'HD');" title="">▶ 2기 샘플강의 보기</a> 
                <a href="javascript:fnPlayerSample('161495', '1281731', 'HD');" title="">▶ 3기 샘플강의 보기</a> 
                <a href="javascript:fnPlayerSample('161496', '1290713', 'HD');" title="">▶ 4기 샘플강의 보기</a>   
            </div>
		</div>      

		<div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">상품 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>              
                    <li>1차 상품구성은 2020년 10월부터 2021년 7월까지 진행될 2021년 대비 감정평가사 2차 대비 스터디강좌로 구성됩니다.<br>
                        ∙ 동영상 강의는 실강 진행 후 다음날 동영상 업로드(공휴일/주말 제외) 됩니다.<br>
                    </li>      
                    <li>강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다. </li>      
				</ul>
				<div class="infoTit"><strong>수강관련</strong></div>
				<ul>
					<li>본 패스 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 패스 상품 강의의 경우 3배수 제한이 되어 있습니다.</li>
                    <li>본 패스 상품 수강기간은 2차 시험일(2021년 8월 7일)까지 입니다.</li>
                    <li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
				</ul>
				<div class="infoTit"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
					<li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
					<li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>
						① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br/>
                        ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.<br/>
                        ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.
                    </li>
				</ul>
				<div class="infoTit"><strong>유의사항</strong></div>
				<ul>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
					<li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
					<li>[MAC ADDRESS 안내]<br>
						본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
						윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
						MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.</li>
				</ul>
				<div class="infoTit"><strong>상담 및 문의</strong></div>
				<ul>
					<li>[상담시간] 평일 오전 10시 ~ 오후 5시</li>
					<li>[상담전화] 1566-4770</li>
                    <li>[상담내용] 강의 및 패키지 상품 안내</li>
				</ul>
			</div>
		</div>
	</div>
    <!-- End Container -->

	<script type="text/javascript">

        /*수강신청 동의*/ 
            function go_PassLecture(code){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }

                var url = '{{ site_url('/package/show/cate/309003/pack/648001/prod-code/') }}' + code;
                location.href = url;
            }    
    </script>


@stop