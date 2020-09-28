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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/  
        
        .skyBanner {position:fixed; width:180px; top:200px; right:10px; z-index:5;}
        .skyBanner a {display:block; margin-bottom:5px}

        .wb_top {background:#202334 url(https://static.willbes.net/public/images/promotion/2020/09/1850_top_bg.jpg) no-repeat center top;}
        .wb_top span.img1 {position:absolute; left:50%; z-index:1; top:300px; margin-left:-80px; width:560px; height:655px; overflow:hidden; 
            animation:iptimg1 2s ease-out; -webkit-animation:iptimg1 2s ease-out;}
        @@keyframes iptimg1{
            0%{margin-left:0px; opacity: 0;}
            100%{margin-left:-80px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
            0%{margin-left:0px; opacity: 0;}
            100%{margin-left:-80px; opacity: 1;}
        }

        .wb_cts01 {background:#fff;}
		.wb_cts02 {background:#7104ff;}
        .wb_cts03 {background:#fff;}
        .wb_cts04 {background:#eb4295}
        .check { position:absolute; bottom:50px; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:14px;color:#FFF;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#202334; margin-left:50px; border-radius:20px;
            font-size:14px;font-weight:bold;}
            .check a:hover {background:#000;}


        /*TAB*/
        .tabWrapEvt{width:920px; margin:0 auto}
        .tabWrapEvt li {display:inline; float:left; width:450px; margin-left:10px;}
        .tabWrapEvt li a {display:block; text-align:center}
        .tabWrapEvt li a img.off {display:block}
        .tabWrapEvt li a img.on {display:none}
        .tabWrapEvt li a:hover img.off {display:none}
        .tabWrapEvt li a:hover img.on {display:block}
        .tabWrapEvt li a.active img.off {display:none}
        .tabWrapEvt li a.active img.on {display:block}
        .tabWrapEvt li a:hover,
        .tabWrapEvt li a.active {}
        .tabWrapEvt li:last-child a {margin-right:0}
        .tabWrapEvt:after {content:""; display:block; clear:both}
        .tabcts {background:none; width:920px; margin:30px auto 0; text-align:center;}
        .tabcts iframe {width:940px; margin:30px auto 0; height:520px; border:#f4f4f4 solid 14px;}

        .evtInfo {padding:80px 0; background:#fff; color:#000; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="https://pf.kakao.com/_Pxixdlxb" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_sky.png">
            </a>
        </div>
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_top.jpg" alt="서민지 티패스" usemap="#Map1850A" border="0" />
            <map name="Map1850A">
                <area shape="rect" coords="673,1765,911,1864" href="#wb_cts04" alt="티패스 수강신청">
            </map>
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2020/09/1850_top_img.png" alt="서민지" /></span>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_01.jpg" alt="수험생의 영어 고민"/>
            <!--tab-->
            <ul class="tabWrapEvt">
                <li><a href="#tab1" class="active"><img src="https://static.willbes.net/public/images/promotion/2020/09/1850_tab_1off.jpg" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2020/09/1850_tab_1on.jpg" alt="" class="on"/></a></li>
                <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2020/09/1850_tab_2off.jpg" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2020/09/1850_tab_2on.jpg" alt="" class="on"/></a></li>
            </ul>
            <div id="tab1" class="tabcts">
                <iframe src="https://www.youtube.com/embed/uKyEIDr_uKQ?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div id="tab2" class="tabcts">		
                <iframe src="https://www.youtube.com/embed/yICiyJncmtA?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>            
            <!--tab//--> 
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_01_01.jpg" alt="한번에 날려드려요"/>
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_02.jpg" alt="꿀팁"/>
            
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_03.jpg" alt="생생후기"/>
		</div>	

		<div class="evtCtnsBox wb_cts04" id="wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_04.jpg" alt="티패스 신청하기" usemap="#Map1850B" border="0"/>
            <map name="Map1850B">
              <area shape="rect" coords="103,396,990,557" href="javascript:go_PassLecture('173018');" alt="수강신청">
            </map>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>
        </div>	
        
        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">어학 서민지 T-PASS 이용안내</h4>
				<div class="infoTit"><strong>상품설명</strong></div>
				<ul>
					<li>서민지 지텔프 강의와 교재 및 추가 혜택 구성됩니다.</li>
                    <li>해당상품의 유료기간은 2개월(60일)입니다.<br>
                        수강생 혜택으로 제공되는 추가 강의는 서비스로 제공해드리는 무료제공기간입니다.(아래 추가 혜택사항 참조)</li>
                    <li>추가혜택 사항 하단 참조 해주세요.</li>                  
				</ul>
				<div class="infoTit"><strong>수강안내</strong></div>
				<ul>
					<li>결제 완료시 바로 수강 진행됩니다.</li>
                    <li>서민지 T-PASS는 일시 정지 및 재수강, 유료연장을 제공하지 않습니다.</li>
                    <li>횟수제한 없이 무제한 수강 가능합니다.</li>
                    <li>수강 방법 및 수강기기<br>
                        • 먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.<br>
                        • 구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.<br>
                        • PASS 이용 중에는 일시중지가 불가능합니다.<br>
                        • 수강 가능 기기 대수는 PC 2대 또는 모바일 2대 또는 PC 1대 + 모바일 1대입니다.<br>
                        내강의실> 무한PASS> 등록기기 정보 확인 (직접 초기화(삭제) 횟수는 1회로 제한됩니다)</li>    
				</ul>
				<div class="infoTit"><strong>상품상세 및 환불</strong></div>
				<ul>
					<li>수강 가능강의<br>
                        ① 서민지의 유패스 지텔프 최신 기출유형 공식 VOCA 강의 <br>
                        ② 서민지의 유패스 지텔프 최신 기출유형 공식 모의고사 문제풀이 <br>
                        ③ 서민지의 유패스 지텔프 최신 기출유형 공식 기본서 문법 <br>
                        ④ 서민지의 유패스 지텔프 최신 기출유형 공식 기본서 문법,독해<br> 
                        ⑤ 서민지의 유패스 지텔프 최신 기출유형 공식 기본서 문법,독해,듣기 <br>
                        ※ 제공되는 강의 구성은 상황에 따라 변동될 수 있습니다. </li>                    
                    <li>사은품 교재<br>
                        ① 유패스 지텔프 최신유형 공식 보카 단어장 <br>
                        ② 유패스 지텔프 최신 기출유형 공식 실전 모의고사 문제집 <br>
                        ③ 유패스 지텔프 최신 기출유형 공식 기본서 / 문법 <br>
                        ④ 유패스 지텔프 최신 기출유형 공식 기본서 문법/독해<br>
                        ⑤ 유패스 지텔프 최신 기출유형 공식 기본서 문법/독해/듣기</li>
                    <li>교재 발송<br>
                        ① 강의 결제 완료 후 순차 발송 진행됩니다. <br>
                            결제완료일 기준 3~4일 정도 소요될 수 있습니다. (주말/공휴일 제외한 평일 기준)<br>
                        ② 배송비(3,000원) 무료<br>
                        ③ 사은품 교재 변경 발송 불가<br>
                        ④ 교재 발송 후 교재 배송지 수정, 변경은 불가합니다.<br>
                        ⑤ 배송지 오기재로 인한 재발송은 불가합니다. </li>                                    				
				</ul>
                <div class="infoTit"><strong>추가 혜택 사항 및 안내</strong></div>
				<ul>
					<li>추가혜택 <br>
                        ① 수강기간 무료연장 (최대 9개월) <br>
                        ② 생애 첫 지텔프 응시료 50%지원 <br>
                        ③ 공식기출 유형 특강 및 보카 암기 영상 제공 <br>
                        ④ 공식주관사 출제 실전모의고사(1회분) 증정<br>
                        ⑤ 서민지쌤의 특별 비밀 학습 자료 제공<br>
                        ⑥ 지텔프 공식 유패스 교재 5권 무료, 배송비무료(2-2참조)<br>
                        ⑦ 서민지쌤 오프라인 주말 마라톤 특강 50% 할인</li>
                    <li>추가혜택 안내<br>
                        ① 수강기간 무료연장 (최대 7개월) <br>
                        -무료자동연장 3개월, 추가 연장 신청시 추가 2개월씩 2회(유료수강기간 2개월포함 최대 9개월 수강가능)<br>
                        -추가연장 신청은 수강기간 종료 이전에 신청하셔야합니다.<br>
                        -수강종료 후 신청 불가<br>
                        ② 생애 첫 지텔프 응시료 50%지원 <br>
                        - 1:1 게시판에 지텔프 쿠폰 요청 문의 남겨주시면, 쿠폰번호 문자 발송 해드립니다. <br>
                        - 본 할인쿠폰은 지텔프 시험을 처음 응시하는 분에게만 적용됩니다. <br>
                        - 응시료 할인쿠폰은 예고없이 조기 종료될 수 있습니다.<br>
                        - 2년 내 응시 내역이 확인되지 않더라도 이전에 응시한 이력이 있다면 본 쿠폰 사용은 불가합니다. (*탈퇴 후 재가입하여도 사용 불가)<br>
                        - 결제 완료 이후에 접수취소 및 환불시, 재사용 불가합니다.<br>
                        - 본 할인쿠폰은 다른 이벤트나 할인쿠폰과 중복하여 사용할 수 없습니다.<br>
                        - 할인쿠폰 사용법 : www.g-telp.co.kr → 로그인 → 정기시험접수 → 할인쿠폰 확인란에 쿠폰번호 기재 → 접수<br>
                        - 본 혜택은 조기 소진시에 공지 없이 종료 될 수 있습니다.<br>
                        ② 공식기출 유형 특강: 결제 완료시 내강의실에서 수강가능<br>
                            보카 암기 영상 제공 : 카카오톡 TV 에서 수강가능(프로모션 페이지내에서 링크로 확인가능)<br>
                        ④ 공식주관사 출제 실전모의고사(1회분) 증정<br>
                            -결제 완료시 내강의실에서 다운로드 가능<br>
                        ⑤ 서민지쌤의 특별 비밀 학습 자료 제공 <br>
                            (서민지 쌤만의 특별한 자료와 1:1 학습상담은 서민지 선생님의 카카오톡 채널 ‘서민지 지텔프’를 통해 제공됩니다.)<br>
                        ⑥ 지텔프 공식 유패스 교재 5권 무료, 배송비무료(2-2참조)<br>
                        ⑦ 서민지쌤 오프라인 주말 마라톤 특강 50% 할인<br>
                            -추후 강의 진행시 제공가능.</li>                    				
				</ul>
				<div class="infoTit"><strong>T-PASS 강좌 환불시 아래와 같이 환불처리 진행됨</strong></div>
				<ul>
					<li>환불시 공통사항<br>
                        - 이용안내 및 환불 특약으로 안내된 별도 환불 기준이 있는 경우 우선 적용합니다.<br>
                        - 강의를 전체 수강하셨을 경우에는 환불이 불가합니다.<br>
                        - 강의 환불시 유료기간 2개월을 기준으로 환불 진행됩니다.<br>
                        - 강의와 별도로 교재만 환불은 불가합니다.<br>
                        - 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.<br>
                        - 강의재생시간에 관계없이 강의를 재생한 경우, 학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.<br>
                        - 고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, T-PASS 정가기준으로 계산하여 수강한 금액을 차감하고 환불됩니다.<br>
                        - 할인상품의 경우 할인 전 정가 기준으로 차감됩니다.<br>
                        - 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.</li> 
                    <li>환불기준<br>
                        ① 결제 및 상품(교재) 수령일로부터 7일 이내 2강 이하 수강: [결제금액 100% ]<br>
                        ② 결제 및 상품(교재) 수령일로부터 7일 이내 3강 이상 수강: [결제금액-수강금액] 환불<br>
                        ④ 결제 및 상품(교재) 수령일로부터 7일 경과 후: 결제금액-수강금액-위약금 ([결제금액-교재비]의 10%) = 환불금액<br>
                        <br>
                        ※ 수강금액은 실제 수강한 강의의 단과강의 판매 가격을 기준으로 계산합니다.<br>
                            수강금액: 단과 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수<br>
                            <br>
                        ※ 사은품 교재 환불 처리기준 :강의와 별도로 교재만 환불은 불가합니다.<br>
                            <br>
                        ① 결제일로부터 10일 이내 환불 할경우<br>
                            - 교재 미사용일 경우만 전액환불, 교재회수 후 환불 진행(제반 수수료및 부대 비용차감)<br>
                            - 교재 사용일 경우 교재비 정가 차감 후 환불 진행 (랩핑제거/사용시 반품 불가)<br>
                            - 교재 반환시 왕복배송비는 회원부담(왕복 6,000원)<br>
                            - 미사용교재 반송시 환불은 교재 상태를 확인 후 환불 진행 됩니다.<br>
                        ② 결제일로부터 10일 이후 패스는 수강한내역 확인 차감 후 환불진행, 교재는 반품(환불)불가 (위 공통사항 참고)</li> 
                    <li>교재비 차감시 가격, 총75,500원<br>
                        ① 유패스 지텔프 최신유형 공식 보카 단어장 : 13,000원<br>
                        ② 유패스 지텔프 최신 기출유형 공식 실전 모의고사 문제집 : 19,000원<br>
                        ③ 유패스 지텔프 최신 기출유형 공식 기본서 / 문법 : 19,000원<br>
                        ④ 유패스 지텔프 최신 기출유형 공식 기본서 문법/독해 : 11,500원<br>
                        ⑤ 유패스 지텔프 최신 기출유형 공식 기본서 문법/독해/듣기 : 13,000원</li>                    				
				</ul>
                <div class="infoTit"><strong>※ 이용 문의 : 1544-5006</strong></div>
			</div>
		</div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
		var tab1_url = "https://www.youtube.com/embed/uKyEIDr_uKQ?rel=0";
		var tab2_url = "https://www.youtube.com/embed/yICiyJncmtA?rel=0";

		$(document).ready(function(){
		$(".tabcts").hide(); 
		$(".tabcts:first").show();
		$(".tabWrapEvt li a").click(function(){ 
			var activeTab = $(this).attr("href"); 
			var html_str = "";
			if(activeTab == "#tab1"){
				html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
			}else if(activeTab == "#tab2"){
				html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
			}
			$(".tabWrapEvt li a").removeClass("active"); 
			$(this).addClass("active"); 
			$(".tabcts").hide(); 
			$(".tabcts").html(''); 
			$(activeTab).html(html_str);
			$(activeTab).fadeIn(); 
			return false; 
			});
        });
        
         /*수강신청 동의*/ 
         function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3093/pack/648001/prod-code/') }}' + code;
            location.href = url;
        } 
	</script>

@stop