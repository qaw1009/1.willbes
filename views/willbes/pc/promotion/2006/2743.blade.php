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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2743_top_bg.jpg) no-repeat center top;}	

        .evt_01 {background:#3f1a26}

        .evtCtnsBox .evt_03_before {color:#000;}
        .evtCtnsBox .evt_03_before div {font-size:30px}

        .evtCtnsBox .evt_03_before span {color:#ffda39; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;}
        @@keyframes upDown{
            from{color:#2a069c}
            50%{color:#f44631}
            to{color:#2a069c}
        }
        @@-webkit-keyframes upDown{
            from{color:#2a069c}
            50%{color:#f44631}
            to{color:#2a069c}
        }

        .evtCtnsBox .check{width: 800px; margin:0 auto; font-size:16px; text-align:center;line-height:1.5;
					  letter-spacing:-1px;font-weight:bold;padding:50px 0;}
		.evtCtnsBox .check label{color:#000}
		.evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
		.evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin-left:20px}
        .evtCtnsBox .check a:hover {background-color:#3f1a26; color:#fff}

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
    
		<div class="evtCtnsBox evt_top" data-aos="fade-down">
			<img src="https://static.willbes.net/public/images/promotion/2022/08/2743_top.jpg" alt="선접수 이벤트" />
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/08/2743_01.jpg" alt="이벤트 특별혜택" />			  
		</div>     

		<div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/08/2743_02.jpg" alt="gs0순환이란" />			  
		</div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="evt_03_before" id="transfer">                
                <div class="NSK-Black"><span>강사진 이름 클릭하시면 샘플 동영상 보여집니다.(PC버전만 가능)</span></div>
            </div>
        </div>        

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <div class="warp">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2743_03.jpg" alt="강사진" />
                <a href="javascript:fnPlayerSample('191518', '1310632', 'HD');"  title="노동법 이수진" style="position: absolute;left: 13.15%;top: 25.93%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('178986', '1310264', 'HD');"  title="행정 소송법 문일" style="position: absolute;left: 29.85%;top: 25.93%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('178976', '1310266', 'HD');"  title="행정 소송법 이승민" style="position: absolute;left: 44.55%;top: 25.93%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('179002', '1310284', 'HD');"  title="인사노무관리 오은지" style="position: absolute;left: 13.15%;top: 48.28%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('178992', '1310308', 'HD');"  title="인사노무관리 정준모" style="position: absolute;left: 27.85%;top: 48.28%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('179012', '1310282', 'HD');"  title="인사노무관리 박건민" style="position: absolute;left: 42.55%;top: 48.28%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('192394', '1350655', 'HD');"  title="인사노무관리 신현표" style="position: absolute;left: 57.25%;top: 48.28%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('185108', '1310288', 'HD');"  title="경영조직론 오은지" style="position: absolute;left: 13.15%;top: 70.63%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('178998', '1323544', 'HD');"  title="경영조직론 정준모" style="position: absolute;left: 27.85%;top: 70.63%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('179016', '1310286', 'HD');"  title="경영조직론 박건민" style="position: absolute;left: 42.55%;top: 70.63%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('192395', '1350658', 'HD');"  title="경영조직론 신현표" style="position: absolute;left: 57.25%;top: 70.63%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('185109', '1310290', 'HD');"  title="민사소송법 김춘환" style="position: absolute;left: 13.15%;top: 92.99%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('187937', '1343829', 'HD');"  title="노동경제학 이강희" style="position: absolute;left: 29.85%;top: 92.99%;width: 14.69%;height: 3.31%;z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <div class="wrap">
			    <img src="https://static.willbes.net/public/images/promotion/2022/08/2743_04.jpg" alt="강의 신청하기" />
                <a href="javascript:go_PassLecture('200477');" title="" style="position: absolute;left: 0%;top: 84.43%;width: 100%;height: 15.71%;z-index: 2;"></a>
            </div>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 노무 2차 GS0순환 선택형 종합반 이용안내를 모두 확인하였고, 이에 동의합니다.                    
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div> 
		</div>    

		<div class="evtCtnsBox evtInfo NGR" id="careful">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
                    <li>본 상품은 2022년 9월~12월에 진행되는 [공인노무사 2차 GS0순환 강의] 과정입니다.<br>
                        동영상 강의는 실강 진행 후 다음날 동영상 업로드(주말/공휴일/일요일 제외) 됩니다.
                    <li>
                    <li>강사배정 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경하실 수 있습니다.<br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.
                    </li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
                    <li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>                   
					<li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
					<li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>
						① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br/>
                        ② 고객 변심으로 인한 환불은 해당 상품의 정가 기준으로 계산하여 수강하신 회차만큼 차감 후 환불됩니다.<br/>
                        ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.
                    </li>
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
					<li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
					<li>[MAC ADDRESS 안내]<br>
						본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
						윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
						MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.</li>
				</ul>
				<div class="infoTit NG"><strong>상담 및 문의</strong></div>
				<ul>
					<li>[상담시간] 평일 오전 9시 ~ 오후 6시</li>
					<li>[상담전화] 1566-4770</li>
                    <li>[상담내용] 강의 및 패키지 상품 안내</li>
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

	<script type="text/javascript">

        /*수강신청 동의*/ 
            function go_PassLecture(code){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }

                var url = '{{ site_url('/userPackage/show/cate/309002/prod-code/') }}' + code;
                location.href = url;
            }    
    </script>


@stop