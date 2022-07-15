@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;} 

    /************************************************************/

    .evt_apply > a {display:block; font-size:2vh; width:85%; font-weight:bold; margin:auto; background:#191919; padding:10px 0; color:#fff; border-radius:50px; margin:0 auto 50px} 
    .evt_apply > a:hover {background-color:#451789; }

    .evtCtnsBox .check{width:100%; margin:30px auto 50px; font-size:14px; text-align:center;line-height:1.5;
					  letter-spacing:-1px;font-weight:bold;}
    .evtCtnsBox .check label{color:#000}
    .evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
    .evtCtnsBox .check a {display: block; width:30%; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin:20px auto}
    .evtCtnsBox .check a:hover {background-color:#451789; color:#fff}

    .evtInfo {padding:50px 20px; background:#535353; color:#fff; font-size:14px}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:22px; margin-bottom:20px}
    .evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
    .evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style:demical; margin-left:20px}
    .evtInfoBox li span {color:#fff100; vertical-align:top}

    /* 폰 가로, 태블릿 세로*/     
    @@media only screen and (max-width: 374px)  {
    .evtCtnsBox .check a {width:50%;}
    .evt_apply > a {width:80%;}
}
/* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
    .evtCtnsBox .check a {width:50%;}
    }
/* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
    .evtCtnsBox .check a {width:50%;} 
    }

    </style>

    <div id="Container" class="Container NSK c_both">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2712m_top.jpg" alt="김영식 경영학" />
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2712m_01.jpg" alt="김영식 교수" />
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2712m_02.jpg" alt="경영학원론 대비 포인트" />
		</div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2712m_03.jpg" alt="선택해야 하는 이유" />
		</div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2712m_04.jpg" alt="커리큘럼" />
		</div>

        <div class="evtCtnsBox evt_05" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/07/2712m_05.jpg" alt="특별 서비스" />
		</div>

        <div class="evtCtnsBox evt_apply" data-aos="fade-up">
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>
            <a href="javascript:go_PassLecture('199388');" >
            경영학 MASTER PASS 수강신청  ▶
            </a>
        </div>

        <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">상품 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>				
                    <li>2022년 8월에 진행되는 2023 경영학 여름방학 선행학습 기본이론 강의와<br>
                        2023년 2월 ~ 5월까지 진행되는 2023 경영학 기본이론, 문제풀이, 최종정리 강의가 제공됩니다.
                    </li>                   
				</ul>
				<div class="infoTit"><strong>수강관련</strong></div>
				<ul>
                    <li>본 패키지 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 패키지 상품은 3배수 수강제한이 되어있습니다.</li>
                    <li>본 패키지 상품은 구매일로부터 바로 수강이 진행되며, 수강시작일 지정이 되지 않습니다.</li>
                    <li>본 패키지 상품은 일시정지 및 연장 신청이 안 됨을 유의해주십시오.</li>
                    <li>본 패키지 상품의 수강기간은 2023년 1차 시험일(2023년 5월 13일_예정)까지입니다.</li>
				</ul>
				<div class="infoTit"><strong>교재관련</strong></div>
				<ul>
                    <li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
                    <li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
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
					<li>[상담시간] 평일 오전 9시 ~ 오후 5시</li>
					<li>[상담전화] 1566-4770</li>
                    <li>[상담내용] 강의 및 패키지 상품 안내</li>
				</ul>
			</div>
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

    <script type="text/javascript">
        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ front_url('/package/show/cate/309002/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>
@stop