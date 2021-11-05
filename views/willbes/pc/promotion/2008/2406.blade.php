@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,1);}

        /************************************************************/
        
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/11/2406_top_bg.jpg) no-repeat center top;}
        
        .evt_01 {background:#4e37a6;}
        .evt_01 .d_day {position:absolute; left:50%; margin-left:225px; top:225px; font-size:78px; color:#fff}
        .evt_01 .d_day span {color:#fdeb00; vertical-align:top}

        .evt_03 {background:#f1f0f3; padding-bottom:150px}
        .evt_03 .tabs {border-bottom:2px solid #000; width:1084px; margin:0 auto; display:flex; justify-content: space-around;}
        .evt_03 .tabs li {flex-basis: calc(100% / 7);}
        .evt_03 .tabs a {display:block; padding:20px 0; text-align:center; font-size:20px; color:#fff; background:#959595; margin-right:1px}
        .evt_03 .tabs a:hover,
        .evt_03 .tabs a.active {background:#000;}
        .evt_03 .tabs li:last-child a {margin-right:0}
        .evt_03 .tabs:after {content:''; display:block; clear:both}
        .evt_03 .tabCts span img {border-bottom:1px solid #f1f0f3}

        .evt_04 {padding-bottom:100px}
        .evt_04 ul {width:976px; margin:0 auto; display:flex; justify-content: space-around; flex-wrap: wrap;}
        .evt_04 ul li {flex-basis: calc(100% / 5); text-align:center; display:block; margin-bottom:40px}
        .evt_04 li a {display:block; margin:15px 15px 0; padding:10px; color:#fff; background:#000; border-radius:20px; font-size:140%}
        .evt_04 li a:hover {background:#4e37a6;}

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.7;}
		.evtInfoBox h4 {font-size:25px; margin-bottom:25px;padding-left:10px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; margin-left:20px; list-style:disc}
        /************************************************************/      
    </style> 

	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_top.jpg" alt="72기 경찰간부시험 대비 티패스"/>
        </div>
        
        <div class="evtCtnsBox evt_01" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_01.jpg" alt="한달 간 이벤트"/>
            <div class="d_day NSK">
                D-<span class="NSK-Black">18</span>
            </div>
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_02.jpg" alt="특별혜택"/>
                <a href="#lecbuy" title="신청하기 바로가기" style="position: absolute; left: 70.45%; top: 14.05%; width: 16.88%; height: 27.32%; z-index: 2;"></a>
            </div>
        </div>
        
        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03.jpg" alt="특별혜택"/>
            <ul class="tabs">
                <li><a href="#tab01">형법</a></li>
                <li><a href="#tab02">형사소송법</a></li>
                <li><a href="#tab03">범죄학</a></li>
                <li><a href="#tab04">경찰학개론</a></li>
                <li><a href="#tab05">헌법</a></li>
                <li><a href="#tab06">민법총칙</a></li>
                <li><a href="#tab07">행정학</a></li>
            </ul>
            <div class="tabCts">
                <span id="tab01"><img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03_01.jpg" alt="형법" /></span>
                <span id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03_02.jpg" alt="유안석 형사소송법" /></br>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03_03.jpg" alt="형사소송법" />
                </span>
                <span id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03_04.jpg" alt="범죄학" />
                </span>
                <span id="tab04"><img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03_05.jpg" alt="경찰학개론" /></span>
                <span id="tab05">
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03_06.jpg" alt="헌법" /></br>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03_07.jpg" alt="헌법" />
                </span>
                <span id="tab06">
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03_08.jpg" alt="민법총칙" /></br>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03_09.jpg" alt="민법총칙" />
                </span>
                <span id="tab07"><img src="https://static.willbes.net/public/images/promotion/2021/11/2406_03_10.jpg" alt="행정학" /></span>
            </div>            
        </div>        

        <div class="evtCtnsBox evt_04" id="lecbuy" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04.jpg" alt="강의신청"/>
            <ul>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04_01.jpg" alt="문형석"/>
                    <a href="https://spo.willbes.net/package/show/cate/3100/pack/648001/prod-code/187199" target="_blank">신청하기</a>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04_02.jpg" alt="유안석"/>
                    <a href="https://spo.willbes.net/package/show/cate/3100/pack/648001/prod-code/187200" target="_blank">신청하기</a>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04_03.jpg" alt="서영교"/>
                    <a href="https://spo.willbes.net/package/show/cate/3100/pack/648001/prod-code/187201" target="_blank">신청하기</a>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04_04.jpg" alt="김한기"/>
                    <a href="https://spo.willbes.net/package/show/cate/3100/pack/648001/prod-code/187204" target="_blank">신청하기</a>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04_05.jpg" alt="정진천"/>
                    <a href="https://spo.willbes.net/package/show/cate/3100/pack/648001/prod-code/187205" target="_blank">신청하기</a>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04_06.jpg" alt="이국령"/>
                    <a href="https://spo.willbes.net/package/show/cate/3100/pack/648001/prod-code/187203" target="_blank">신청하기</a>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04_07.jpg" alt="선동주"/>
                    <a href="https://spo.willbes.net/package/show/cate/3100/pack/648001/prod-code/187202" target="_blank">신청하기</a>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04_08.jpg" alt="김동진"/>
                    <a href="https://spo.willbes.net/package/show/cate/3100/pack/648001/prod-code/187197" target="_blank">신청하기</a>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04_09.jpg" alt="고태환"/>
                    <a href="https://spo.willbes.net/package/show/cate/3100/pack/648001/prod-code/187198" target="_blank">신청하기</a>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2406_04_10.jpg" alt="이동호"/>
                    <a href="https://spo.willbes.net/package/show/cate/3100/pack/648001/prod-code/187206" target="_blank">신청하기</a>
                </li>
            </ul>
        </div>    

		<div class="evtCtnsBox evtInfo">
			<div class="evtInfoBox" id="careful">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
                    <li>상품구성은 2021년 11월부터 2022년 10월까지 진행될 까지 진행될 과목 교수님별 GS1순환, GS2순환, GS3순환, GS4순환 강좌로 구성됩니다.</li>
                    <li>본 상품은 수강신청 시 수강료(교재 제외) 최대 60% 할인 혜택이 적용됩니다.</li>
                    <li>강사배정 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다.<br>
                    강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.
                    (패스상품의 대폭할인으로 인하여 강의 회차 변동에 따른 환불은 진행되지 않습니다.)</li>
				</ul>
                <div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 배수 제한 없이 무제한 수강이 가능합니다.</li>
                    <li>본 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
                </ul>
                <div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 구매하셔야 합니다.</li>
                    <li>본 상품 교재는 동영상 강의 신청 시 교재를 확인하시고 선택하신 후 구매하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li> 
                    <li>본 패키지 강좌의 환불 시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li> 
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                    ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                    ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 단과강의의 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.<br>
                    ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.<br>
                    ④ 무료로 제공되는 선행학습 수강 후 환불 시, 단과강의의 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.</li>            
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
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function(){
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                });
            });
        }); 
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop