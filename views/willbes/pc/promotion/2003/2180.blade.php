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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner{position: fixed; top:250px; right:10px; width:190px; z-index:10;}

		.evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2180_top_bg.jpg) no-repeat center top; height:1124px; position:relative}
        .evtTop span { position:absolute; top:458px; left:50%; margin-left:-483px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-483px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-483px; opacity: 1;}
        }

        .evt01 {padding-bottom:150px}

		.evt02 {background:#ebebeb;}

		.evt03 {background:#00ced1 url(https://static.willbes.net/public/images/promotion/2021/04/2180_03_bg.jpg) no-repeat center top; ; padding-bottom:150px}   
        .evt03 .p_re {width:1120px; margin:0 auto}
        .evt03 .check {font-size:16px; text-align:center; line-height:1.5;margin-top:40px;font-weight:bold;}
        .evt03 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .evt03 .check a {display:inline-block; padding:5px 20px; color:#fff; background:#000; margin-left:20px; border-radius:20px}
        .evt03 .check a:hover {color:#333; background:#35fffa;}

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
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px; font-weight:normal !important}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
        .evtInfoBox span {color:#ff6d6d;vertical-align:bottom}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        {{--
        <div class="skybanner">
            <a href="#lecbuy">
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1614_sky.png" title="" />    
            </a>        
        </div>
        --}}

        <div class="evtCtnsBox evtTop">
			<span><img src="https://static.willbes.net/public/images/promotion/2021/04/2180_top_txt.png" title="한덕현T-PASS" /></span>			
		</div>		

		<div class="evtCtnsBox evt01">
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

		<div class="evtCtnsBox evt02">
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2180_02.jpg"  title="갓덕현이 모두 해결해드립니다." />			
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

        <div class="evtCtnsBox evt03" id="event">
            <div class="p_re">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_03.jpg" title="수험생들이 선택하고 인정한 영어정복 노하우!" />
                <a href="javascript:go_PassLecture('180928');" title="" style="position: absolute; left: 67.77%; top: 88.45%; width: 14.73%; height: 7.43%; z-index: 2;"></a>
            </div>
            <div class="check">
                <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내확인하기 ↓</a>               
            </div>    
        </div>
        
        <div class="evtCtnsBox evtInfo" id="careful">
            <div class="evtInfoBox">
                <h4 class="NGEB">이용안내 및 유의사항</h4>
                <div class="infoTit"><strong>상품구성</strong></div>
                <ul>
                    <li>제공과정<br>
                        - 전 과정 T-PASS : 2021~2022 한덕현 영어 9급 지방직 대비 전 과정 (반반/똑똑영어 다시보기 + 새벽모의고사 포함)
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
                <div class="infoTit"><strong>이벤트 경품 관련</strong></div>
                <ul>
                    <li>본 이벤트의 경품 수량은 [한미양행 황제황진환 침향 30정x3.75g] 총 30set이며, 선착순 수량 소진 시 별도의 마감 안내 없이 이벤트가 종료됩니다.</li>
                    <li>제품 결제 시 사은품 관련 배송정보에 입력해주신 주소/전화번호로 배송처리 되며, 정확하지 않은 정보를 기입하여 오배송/누락된 경우에는 별도의 추가 발송 처리는 불가합니다.</li>
                    <li>본 경품은 매주 목요일 24:00까지 구매 후 배송정보를 입력한 회원에 대하여 금요일 오후 발송처리될 예정입니다.
                    (택배 발송 후 수령까지 영업일 기준 2~3일 소요 예정)</li>
                    <li>T-PASS 환불 진행 시 본 경품도 회수 처리 되며, 제품의 가치가 손상된 경우에는 [결제금액]에서 소비자가 298,000원 별도 차감 후 환불 진행됩니다.  (환불 시 정산방법은 하단 [결제/환불] 내용 참조)</li>
                </ul>
                <div class="infoTit"><strong>결제/환불</strong></div>
                <ul>
                    <li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                    - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
                </ul>

                <div class="infoTit"><strong>이용 문의 : 윌비스 고객만족센터 1544-5006</strong></div>
            </div>
        </div>
	</div>
	<!-- End Container -->


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
	</script>

	{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
