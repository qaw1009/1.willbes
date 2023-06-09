@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    /************************************************************/

    .evt_01 a {display:block; padding:10px 0; text-align:center; font-size:3vh; color:#fff; background:#ff4617; border-radius:50px; margin:0 20px}
    .evt_01 a.btn02 {background:#0053e1}
    .evt_01 a:hover {background:#000}
    

    .evtInfo {padding:50px 20px; background:#535353; color:#fff; font-size:1.8vh;}
    .evtInfoBox {text-align:left; line-height:1.5;}
    .evtInfoBox h4 {font-size:2.6vh; margin-bottom:25px; padding-left:10px;}
    .evtInfoBox .infoTit {font-size:2vh; margin-bottom:20px}
    .evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; margin-left:20px; list-style:disc}


     /* 폰 가로, 태블릿 세로*/     
     @@media only screen and (max-width: 374px)  {

    }
    /* 태블릿 세로 */
        @@media only screen and (min-width: 375px) and (max-width: 640px) {       

        }
    /* 태블릿 가로, PC */
        @@media only screen and (min-width: 641px) {

        }

    </style>

    <div id="Container" class="Container NSK c_both">
    <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2610_top.jpg" alt="초시합격 프로젝트"/>
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <div class="wrap NSK-Black">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2610_01.jpg" alt="커리큘럼"/>
                <a href="https://spo.willbes.net/m/package/show/cate/3100/pack/648002/prod-code/193263" target="_blank">수강신청 바로가기 ></a>
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2610_02.jpg" alt="전략학습반"/>
                <a href="https://spo.willbes.net/m/userPackage/show/cate/3100/prod-code/193329" target="_blank" class="btn02">수강신청 바로가기 ></a>
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2610_03.jpg" alt="경찰간부 동행팀"/>
            </div>
        </div>    

		<div class="evtCtnsBox evtInfo" data-aos="fade-up">
			<div class="evtInfoBox" id="careful">
				<h4 class="NSK-Black">상품이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
                    <li>본 상품은 제73기 대비 경찰간부후보생 시험대비 선행학습반 및 집중 전략학습반 강의가 제공됩니다.</li>
                    <li>이벤트 기간 내 본 상품 결제 시, 집중전략학습반은 2과목 이상 신청 시  T-PASS 대비 수강료 10% 할인혜택이 적용됩니다.</li>
				</ul>
                <div class="infoTit"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품 강의의 경우 배수 제한 없이 무제한 수강이 가능합니다.</li>
                    <li>본 상품 수강기간은 2022.7.31일까지 입니다.</li>
                    <li>본 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
                </ul>
                <div class="infoTit"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 구매하셔야 합니다.</li>
                    <li>본 상품 교재는 동영상 강의 신청 시 교재를 확인하시고 선택하신 후 구매하실 수 있습니다.</li>
				</ul>
				<div class="infoTit"><strong>결제/환불관련</strong></div>
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
					<li>[상담전화] 1566-4770</li>
				</ul> 
			</div>
		</div> 
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>
@stop