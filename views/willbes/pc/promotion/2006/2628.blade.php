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
        
		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/04/2628_top_bg.jpg) no-repeat center top}	
      
        .evt_02 {background:#ffe5cf}

        .evt_03 {background:#cfe1ff;position:relative;}
        .youtube {position:absolute; bottom:149px; left:50%;z-index:1;margin-left:-472px}
        .youtube iframe {width:944px; height:575px}
      
        .evtCtnsBox .check{width:850px; margin:0 auto; font-size:17px; text-align:center;line-height:1.5;letter-spacing:-1px;font-weight:bold;padding-bottom:100px;}
		.evtCtnsBox .check label{color:#000}
		.evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
		.evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin-left:20px}
        .evtCtnsBox .check a:hover {background-color:#613EE3; color:#fff}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:22px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:none; margin-left:20px}
        .evtInfoBox li span {color:#fff100;}

        /************************************************************/

    </style>

	<div class="evtContent NSK">

		<div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2628_top.jpg" alt="박준희 티패스" />
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/04/2628_01.jpg" alt="박준희 지구과학" />            
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/04/2628_02.jpg" alt="only.1" />            
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/04/2628_03.jpg" alt="유트브" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/OnpA_E1ysIg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>           
        </div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2628_04.jpg" alt="신청하기" />
                <a href="javascript:go_PassLecture('194323');" title="신청하기" style="position: absolute;left: 71.05%;top: 76.63%;width: 22.87%;height: 13.32%;z-index: 2;"></strong></a>
            </div> 
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 박준희 지구과학 온라인 T-PASS 반 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#notice">이용안내확인하기 ↓</a>
            </div>            
        </div>    

		<div class="evtCtnsBox evtInfo" id="notice">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">윌비스 한림법학원 박준희 지구과학 T-PASS반 이용안내</h4>
				<div class="infoTit"><strong>이용안내</strong></div>
				<ul>
                    <li>1. 본 상품은 2022년 진행되는 2023년대비 변리사 지구과학 1차시험 대비 박준희 교수님 지구과학 강의입니다.</li>
                    <li>2. 강의배수 제한 : 강의는 2배수 제한 규정이 적용됩니다.</li>
                    <li>3. 강의진행 월 또는 회차는 학원 사정 등에 따라 변동될 수 있습니다.</li>
                    <li>4. 박준희 교수님 온라인 지구과학 T-PASS 상품은 사전 공지 없이 종료 또는 변경될 수 있습니다.</li>
				</ul>
				<div class="infoTit"><strong>이벤트 내용안내</strong></div>
				<ul>
                    <li>1. <span>수강료 20%할인</span> (360,000원 -> <span>288,000원</span>)</li>
                    <li>2. 수강기간 : 본 상품에 등록된 강의(순차적으로 등록예정)는 <span>2023년 변리사 1차시험일까지 수강</span>하실 수 있습니다.</li>
				</ul>

                <div class="infoTit"><strong>교재</strong></div>
				<ul>
                    <li>1. 각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                    <li>2. High End 지구과학(구 합격 지구과학) + High End 지구과학 필기노트는 5월 27일(금) 출간 등록예정이며, High End 지구과학 모의고사는 추후 출간등록예정입니다.</li>
				</ul>

                <div class="infoTit"><strong>환불</strong></div>
				<ul>
                    <li>1. 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.(일부강의만의 환불은 불가합니다.)</li>
                    <li>2. 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>3. 강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>4. 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 박준희 온라인 T-PASS반 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
				</ul>

                <div class="infoTit"><strong>PASS 수강</strong></div>
				<ul>
                    <li>1. 로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                    <li>2. 구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>3. 박준희 지구과학 온라인 T-PASS반은 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>4. 박준희 지구과학 온라인 T-PASS반 수강 시 이용 가능한 <span>기기 대수는 다음과 같이 제한</span>됩니다.<br>
                        [ <span>총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</span> ]
                    </li>    
                    <li>5. PC, 모바일 기기에 대한 초기화가 필요할 경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능)</li>
                    <li>6. 일부 강좌의 경우 자료 출력 횟수 제한이 적용될 수 있습니다.</li>
				</ul>

				<div class="infoTit"><strong>유의사항</strong></div>
				<ul>
                    <li>1. 본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>2. 박준희 지구과학 온라인 T-PASS반 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                    <li>3. 아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 박준희 지구과학 온라인 T-PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
				</ul>                
                <div class="infoTit">※ 이용 문의 : 윌비스 고객만족센터 1566-4770</div>
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

                var url = '{{ front_url('/periodPackage/show/cate/309004/pack/648001/prod-code/') }}' + code;
              
                location.href = url;
            }    
    </script>


@stop