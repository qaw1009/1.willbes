@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .evt_01 .wrap a {position: absolute; bottom:1.5vh; padding:1vh 4vh; width:50%; text-align:center; font-size:2vh; background:#63b8c4; color:#fff; left:50%; margin-left:-25%; z-index: 2; border-radius:50px; border:0}

    .evtCtnsBox .check{margin:30px 20px 50px; font-size:1.6vh; text-align:center; line-height:1.5; letter-spacing:-1px;}
    .evtCtnsBox .check label{color:#000; font-weight:bold;}
    .evtCtnsBox .check input {border: 2px solid #000; margin-right: 8px; height: 20px; width: 20px; } 
    .evtCtnsBox .check a {display: block; width:60%; padding:5px 20px; color: #fff; background: #000; border-radius:20px; margin:2vh auto}
    .evtCtnsBox .check a:hover {background-color:#5380f5;}
    .evtCtnsBox .check ul {margin-top:3vh; font-size:1.6vh; text-align:left; padding-left:2vh}

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

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2836m_top.jpg" alt="김동진 민법 티패스">
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2836m_01.jpg" alt="">
                <a href="javascript:go_PassLecture('202811');" class="NSK-Black">신청하기 ></a>
            </div>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 김동진 민법 온라인 T-PASS반 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#notice">이용안내확인하기 ↓</a>
                <ul>
                    <li>- 본 상품은 2023년 진행되는 2024년 변리사 민법 1차 시험 대비 김동진 교수님 민법 T-PASS 과정입니다.</li>
                    <li>- 강의배수 제한: 강의는 2배수 제한 규정이 적용됩니다.</li>
                    <li>- 강의진행 월 또는 회차는 학원 사정 등에 따라 변동될 수 있습니다.</li>
                    <li>- 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.(일부강의만의 환불은 불가합니다.)</li>
                    <li>- 고객 변심으로 인한 중도 환불시 할인 전 단과강의 정상가격 기준으로 공제 후 차액 환불됩니다.</li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2836m_02.jpg" alt="" />
                <a href="javascript:go_PassLecture('200478');" title="" style="position: absolute;left: 0%;top: 83.33%;width: 100%;height: 17.71%;z-index: 2;"></a>               
            </div>
        </div>

		<div class="evtCtnsBox evtInfo" id="notice">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">2024년대비 김동진 민법 T-PASS 이용안내</h4>
				<div class="infoTit"><strong>이용안내</strong></div>
				<ul>
                    <li>본 상품은 2023년 진행되는 2024년 변리사 민법 1차 시험 대비 김동진 교수님 민법강의입니다.</li>
                    <li>강의배수 제한: 강의는 2배수 제한 규정이 적용됩니다.</li>
                    <li>강의진행 월 또는 회차는 학원 사정 등에 따라 변동될 수 있습니다.</li>
                    <li>김동진 온라인 민법 T-PASS 상품은 사전 공지 없이 종료 또는 변경될 수 있습니다.</li>
                    <li>수강기간: 본 상품에 등록된 강의(순차적으로 등록예정)는 <span>2024년 변리사 1차 시험일</span>까지 수강하실 수 있습니다. </li>
				</ul>

                <div class="infoTit"><strong>교재</strong></div>
				<ul>
                    <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                    <li>민법공방필기노트는 강의신청 후 민법기본강의-교재구매를 클릭하시면 무료로 주문할 수 있습니다.</li>
				</ul>

                <div class="infoTit"><strong>환불</strong></div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.(일부강의만의 환불은 불가합니다.)</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 김동진 온라인 T-PASS반 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
				</ul>

                <div class="infoTit"><strong>PASS 수강</strong></div>
				<ul>
                    <li>로그인 후 [내강의실]에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>김동진 온라인 T-PASS반은 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>김동진 온라인 T-PASS반 수강 시 이용 가능한 <span>기기 대수는 다음과 같이 제한</span>됩니다.<br>
                    [총 수강 기기 대수 2대: PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대]<br>
                    - PC, 모바일 기기에 대한 초기화가 필요한 경우 내용 확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능)</li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될 수 있습니다.</li>
				</ul>

				<div class="infoTit"><strong>유의사항</strong></div>
				<ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>박준희 지구과학 온라인 T-PASS반 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 박준희 지구과학 온라인 T-PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
				</ul>                
                <div class="infoTit">※ 이용 문의 : 윌비스 고객만족센터 1566-4770</div>
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