@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .evt_03 > a {display:block; width:98%; margin:2vh auto; font-size:3vh; background:#27025f; color:#fff; padding:2vh}
    .evt_03 > a:hover {background:#fe0192}

    .evtCtnsBox .check{margin:30px 20px 50px; font-size:1.6vh; text-align:center; line-height:1.5; letter-spacing:-1px;}
    .evtCtnsBox .check label{color:#000; font-weight:bold;}
    .evtCtnsBox .check input {border: 2px solid #000; margin-right: 8px; height: 20px; width: 20px; } 
    .evtCtnsBox .check a {display: block; width:50%; padding:0.5vh 1.5vh; color: #fff; background: #000; border-radius:20px; margin:2vh auto}
    .evtCtnsBox .check a:hover {background-color:#5380f5;}

    /* 이용안내 */
    .evtInfo {padding:5vh 2vh; background:#535353; color:#fff; font-size:1.6vh}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:2.8vh; margin-bottom:5vh}
    .evtInfoBox .infoTit {font-size:1.8vh; margin-bottom:2vh}
    .evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
    .evtInfoBox ul {margin-bottom:5vh}
    .evtInfoBox li {margin-bottom:8px; list-style-type:demical; margin-left:20px}
    .evtInfoBox li span {color:#fff100;}

    </style>

    <div id="Container" class="Container NSK c_both">  

        @if(time() < strtotime('202301010000'))
            {{--선접수 이벤트--}}
            <div class="evtCtnsBox evt_top" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2850m_top01.jpg" alt="gs1순환 선택형 종합반"/>
            </div>
            <div class="evtCtnsBox evt_01" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2850m_01_01.jpg" alt="특별혜택"/>	  
            </div>
            <div class="evtCtnsBox evt_02" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2850m_02_01.jpg" alt="gs1순환 강의란"/>	  
            </div>
            <div class="evtCtnsBox evt_03" data-aos="fade-up"> 
                <a href="javascript:go_PassLecture('203670');" class="NSK-Black">2023 GS1순환 선택형종합반 강의 신청하기</a>  
                <div class="check">
                    <label>
                        <input type="checkbox" name="ischk" value="Y">
                        페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#notice">이용안내확인하기 ↓</a>
                </div>
            </div>
        @else
            <div class="evtCtnsBox evt_top" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2850m_top02.jpg" alt="gs1순환 선택형 종합반"/>
            </div>
            <div class="evtCtnsBox evt_01" data-aos="fade-up">
                <a href="#lecbuy"><img src="https://static.willbes.net/public/images/promotion/2022/12/2850m_01_02.jpg" alt="특별혜택"/></a>
            </div>
            <div class="evtCtnsBox evt_02" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2850m_02_02.jpg" alt="gs1순환 강의란"/>	  
            </div>
            <div class="evtCtnsBox evt_03" id="lecbuy"> 
                <a href="javascript:go_PassLecture('203678');" class="NSK-Black">2023 GS1순환 선택형종합반 강의 신청하기</a>  
                <div class="check">
                    <label>
                        <input type="checkbox" name="ischk" value="Y">
                        페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#notice">이용안내확인하기 ↓</a>
                </div>
            </div>
        @endif

		<div class="evtCtnsBox evtInfo" id="notice">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">상품 이용안내</h4>
				<div class="infoTit"><strong>상품구성 </strong></div>
				<ul>
                    <li>본 상품은 2023년 1월부터 진행되는 공인노무 2차 GS1순환 강의가 제공됩니다.</li>
                    <li>이벤트 기간 내 본 상품 결제 시, 최대 수강료 30% 할인 수강혜택이 적용됩니다.<br>
                    (2과목 수강 - 10% 할인 / 3과목 수강 - 20% 할인 / 4과목 수강 - 20% 할인)</li>
                    <li>이벤트 기간 종료 후 본 상품 결제 시, 최대 수강료 20% 할인 수강혜택이 적용됩니다.<br>
                    (2과목 수강 - 5% 할인 / 3과목 수강 - 10% 할인 / 4과목 수강 - 20% 할인)</li>
				</ul>

                <div class="infoTit"><strong>수강관련 </strong></div>
				<ul>
                    <li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강 제한이 되어 있습니다.</li>
                    <li>본 상품의 수강시작일은 30일 범위 내에서 지정하실 수 있습니다.</li>
				</ul>

                <div class="infoTit"><strong>교재관련 </strong></div>
				<ul>
                    <li>본 상품 강의 별 교재는 별도로 주문하셔야 합니다.</li>
                    <li>본 상품 강의 별 교재는 동영상 강의 신청 후 내 강의실 바로 가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>

                <div class="infoTit"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>본 패키지 강좌의 환불 시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                    ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                    ② 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br>
                    ③ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌수를 기준으로 환불 금액을 산출합니다.</li>
				</ul>

				<div class="infoTit"><strong>유의사항</strong></div>
				<ul>
                    <li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
                    <li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
                    <li>[MAC ADDRESS 안내]<br>
                    - 본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
                    - 윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
                    - MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.</li>
				</ul>                
                <div class="infoTit"><strong>상담 및 문의</strong></div>
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

            var url = '{{ site_url('/m/periodPackage/show/cate/309004/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>
@stop