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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position: fixed; top:250px; right:10px; width:200px; z-index:10;}
        .sky a {margin-bottom:5px; display:block}

        .evt00 {background:#4007b6}

		.evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/02/2180_top_bg.jpg) no-repeat center top; height:1124px; position:relative}
        .evtTop span { position:absolute; top:880px; left:50%; width:1120px; margin-left:-560px; z-index: 10;}

        .evt01 {padding-bottom:150px}

        /* 롤링*/
        .section_pro {
        background:url(https://static.willbes.net/public/images/promotion/2022/02/2180_02_bg.jpg) no-repeat center top; 
                   position:relative;height:895px;clear:both;}      
        .section_pro .box_pro {position:absolute; top:380px; left:0; width:100%; z-index:1}
        .section_pro .box_pro .bx-wrapper{max-width:100% !important;}
        .section_pro .box_pro li {display:inline; float:left; height: 380px;}    

		.evt03 {background:#e8e8e8; padding-bottom:150px}   
        .evt03 .p_re {width:1120px; margin:0 auto}
        .evt03 .check {font-size:16px; text-align:center; line-height:1.5;margin-top:40px;font-weight:bold;}
        .evt03 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .evt03 .check a {display:inline-block; padding:5px 20px; color:#fff; background:#000; margin-left:20px; border-radius:20px}
        .evt03 .check a:hover {color:#333; background:#f26522;}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:10px; padding-top:5px; width:28%; line-height:60px}
        .newTopDday ul li:last-child {text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:60px}
        .newTopDday ul:after {content:""; display:block; clear:both}
		
		/* tab */
        .tabContaier{width:100%;}
        .tabContaier ul {margin:0 auto; width:980px}		
        .tabContaier li {display:inline; float:left}	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:""; display:block; clear:both}

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:30px; margin-bottom:50px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px; font-weight:normal !important}
		.evtInfoBox ul {margin-bottom:50px}
        .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
        .evtInfoBox span {color:#ff6d6d; vertical-align:bottom}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#evt-first">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2180_sky1.png" title="구매하기 바로가기" />    
            </a>
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1067" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2180_sky2.png" title="구매하기 바로가기" />    
            </a>  
            <a href="#event">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2180_sky3.png" title="구매하기 바로가기" />    
            </a>        
        </div>

        <div class="evtCtnsBox evt00" data-aos="fade-down" id="evt-first">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2180_00.jpg" title="6월 이벤트" />		
		</div>	

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
			<span data-aos="fade-right" data-aos-duration="500">
                <a href="#event">
                    <img src="https://static.willbes.net/public/images/promotion/2022/02/2180_apply.gif" title="합격하기 이벤트" />
                </a>
            </span>			
		</div>		

		<div class="evtCtnsBox evt01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_01.jpg" title="합격전략 공개" />
            <div class="tabContaier">
				<ul>
					<li>
						<a class="active" href="#tab1">
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab01.jpg" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab01_on.jpg" class="on"  />
                        </a>
                    </li>
					<li>
						<a href="#tab2">
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab02.jpg"  class="off"  />
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab02_on.jpg"  class="on" />
                        </a>
					</li>
					<li>
						<a href="#tab3">
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab03.jpg"  class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab03_on.jpg"  class="on" />
                        </a>
					</li>
				</ul>
				<div class="tabContents" id="tab1">
					<img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab01_cts.jpg" alt="윌비스 영어 40~60점대 강력 추천! " />
				</div>
				<div class="tabContents" id="tab2">
					<img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab02_cts.jpg" alt="윌비스 영어 60~80점대 강력 추천! " />
				</div>
				<div class="tabContents" id="tab3">
					<img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab03_cts.jpg" alt="윌비스 영어 70점 이상 강력 추천! " />
				</div>
			</div>
		</div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <div class="section_pro">                
                <div class="box_pro">
                    <ul class="slide_pro">
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/02/2180_cmt1.png" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/02/2180_cmt2.png" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/02/2180_cmt3.png" alt=""/></li>  
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/02/2180_cmt4.png" alt=""/></li>  
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/02/2180_cmt5.png" alt=""/></li>  
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/02/2180_cmt6.png" alt=""/></li>                            
                    </ul>
                </div>  
            </div>
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        마감까지
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>   

        <div class="evtCtnsBox evt03" id="event" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2180_03.jpg" />
                <a href="javascript:go_PassLecture('190916');" title="22~23 전과정 티패스" style="position: absolute; left: 52.95%; top: 82.02%; width: 29.38%; height: 8.56%; z-index: 2;"></a>
                {{--
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2180_03.jpg" />
                <a href="javascript:go_PassLecture('190916');" title="22~23 전과정 티패스" style="position: absolute; left: 52.14%; top: 74.39%; width: 30.27%; height: 11.89%; z-index: 2;"></a>      
                --}} 
            </div>
            
            <div class="check">
                <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#notice">이용안내확인하기 ↓</a>               
            </div>    
        </div>
        
        <div class="evtCtnsBox evtInfo" id="notice" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">이용안내 및 유의사항</h4>
                <div class="infoTit"><strong>6월 한정 EVENT</strong></div>
                <ul>
                    <li>본 이벤트는 2022년 6월 30일 (목)까지 2023 영어 한덕현 T-PASS를 결제완료하신 분에 한하여 적용됩니다.</li>
                    <li>제공 혜택<br>
                    <span>📢 무료 제공 교재는 한덕현 교수 직접 구매 후 증정되는 상품입니다.</span><br>
                    - 2023 제니스 영어 Grammar 교재 제공 (신간 출시 후 문자를 통해 신청방법 안내 예정)<br>
                    - 2023 제니스 영어 스나이퍼 32 교재 제공 (신간 출시 후 문자를 통해 신청방법 안내 예정)<br>
                    - 1:1 온라인독해첨삭 지도반 1개월 무료 (수강기간 내 원하는 시기에 한덕현 교수 Q&A 게시판을 통해 신청 및 교수님 개별 상담 후 기수에 맞추어 진행 예정) <br>
                    - 기존 판매가 79만원 (10만원 기간 한정 할인) → 이벤트 판매가 69만원<br>                    
                </li>
                </ul>

                <div class="infoTit"><strong>상품구성</strong></div>
                <ul>
                    <li>제공과정<br>
                        - 2023년 6월까지 진행되는 한덕현 영어 신규강좌 전 과정 (반반똑똑영어 다시보기, 새벽모의고사 포함)
                    </li>
                    <li>본 상품의 수강기간은 상품 수강신청 상세안내 화면에 표기된 기간만큼 제공됩니다.</li>
                    <li>개강일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                    <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                </ul>
                <div class="infoTit"><strong>기기제한</strong></div>
                <ul>
                    <li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                    - <span>PC 2대 or 모바일 2대 of  PC 1대 + 모바일 1대(총 2대)</span></li>
                    <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최조 1회에 한해 [내강의실] > [등록기기정보]에서 직접 초기화 가능하며, <br>
                    그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006 or 1:1 상단게시판으로 문의바랍니다.</li>
                </ul>
                <div class="infoTit"><strong>수강안내</strong></div>
                <ul>
                    <li>먼저 [내강의실] 메뉴에 무한 PASS존으로 접속합니다.</li>
                    <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
                    <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li>
                    <li>본 T-PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 구입 가능합니다.</li>
                    <li>윌비스 LIVE모드는 학원실강에서 진행되는 콘텐츠로, 본 상품에는 LIVE모드 별도 제공되지 않습니다.</li>
                </ul>

                <div class="infoTit"><strong>결제/환불</strong></div>
                <ul>
                    <li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                    - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)</li>
                    <li>6월 한정 EVENT 상품으로 구매하신 경우, 이용한 내역에 따라 환불 시 차감 금액이 달라집니다.<br>
                    - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)<br>
                    - 1:1 온라인 첨삭 관리반 : 판매가 150,000원 공제<br>
                    - 교재 : 고객센터로 반송(환불) 의사를 먼저 밝혀주시고, 낙서 및 훼손 등 이상이 없어야합니다. (환불 시 배송료 회원 부담)<br>
                    (이미 사용한 교재의 경우, 판매가 공제 후 환불 예정)</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
                </ul>

                <div class="infoTit"><strong>이용 문의 : 윌비스 고객만족센터 1544-5006</strong></div>
            </div>
        </div>
	</div>

	<!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

	<script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

		/*tab*/
		$(document).ready(function(){
			$(".tabContents").hide(); 
			$(".tabContents:first").show();

			$(".tabContaier ul li a").click(function(){ 

			var activeTab = $(this).attr("href"); 
			$(".tabContaier ul li a").removeClass("active"); 
			$(this).addClass("active"); 
			$(".tabContents").hide(); 
			$(activeTab).fadeIn(); 

			return false; 
			});
		});	        

        function go_PassLecture(code) {
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ front_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*롤링*/
        $(document).ready(function() {
            var BxBook = $('.slide_pro').bxSlider({
                slideWidth: 310,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });

	</script>

	{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
