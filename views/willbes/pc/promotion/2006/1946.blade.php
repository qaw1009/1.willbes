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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1946_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#f5f5f6}

        .evt02 {background:#5c5c5c; padding:150px 0;}
        .evt02 .slide_con {width:790px; margin:0 auto; position:relative;}
        .evt02 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px !important; height:45px !important; z-index:10}
        .evt02 .slide_con p.leftBtn {left:-22px}
        .evt02 .slide_con p.rightBtn {right:-22px}
        .evt02 .slide_con li {display:inline; float:left}
        .evt02 .slide_con li img {width:100%}
        .evt02 .slide_con ul:after {content::""; display:block; clear:both}    

        .evt04 {background:#F8F1D7;}

        .evt05 {background:#fff;padding-bottom:50px;}
        .check {width:980px; margin:0 auto;letter-spacing:3; padding-top:30px;}
        .check label {cursor:pointer; font-size:17px;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#5c5c5c; 
            margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#9e8945;}
        
        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.7;}
		.evtInfoBox h4 {font-size:25px; margin-bottom:25px;padding-left:10px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; margin-left:20px; list-style:disc}
     
    </style>


    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt_top">            
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1946_top.jpg" alt="" />        
        </div>

        <div class="evtCtnsBox evt01">            
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1946_01.jpg" alt="" />        
        </div>

        <div class="evtCtnsBox evt02"> 
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1946_02_01.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1946_02_02.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1946_02_03.png" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/11/1946_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/11/1946_right.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt03">            
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1946_03.jpg" alt="" usemap="#Map1946a" border="0" />
            <map name="Map1946a" id="Map1946a">
                <area shape="rect" coords="810,258,958,304" href="http://cafe.daum.net/patentbar-no1/GApR" target="_blank" />
            </map>       
        </div>

        <div class="evtCtnsBox evt04">            
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1946_04.jpg" alt="" />        
        </div>

        <div class="evtCtnsBox evt05">            
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1946_05.jpg" alt="" usemap="#Map1946b" border="0" />
            <map name="Map1946b" id="Map1946b">
                <area shape="rect" coords="608,1297,1056,1433" href="javascript:go_PassLecture('175055');">
            </map> 
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>         
        </div>

        <div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox" id="careful">
				<h4 class="NGEB">윌비스 한림법학원 김동진 온라인 T-PASS반 이용안내</h4>
				<div class="infoTit NG"><strong>이용안내</strong></div>
				<ul>
                    <li>본 상품은 2021년 진행되는 2022년 변리사 민법 대비 김동진 교수님 민법 강의입니다.</li>
                    <li>수강기간 : 본 상품에 등록된 강의(순차적으로 등록예정)는 2022년 변리사 1차시험일까지 수강하실 수 있습니다.</li>
                    <li>강의배수 제한 : 강의는 2배수 제한 규정이 적용됩니다.</li>
                    <li>강의진행 월 또는 회차는 학원 사정 등에 따라 변동될 수 있습니다.</li>
                    <li>김동진 온라인 T-PASS반은 3월 31일까지 신청하실 수 있으며, 사정에 의해서 신청기간이 변경될 수 있습니다.</li>
				</ul>
                <div class="infoTit NG"><strong>교재</strong></div>
				<ul>
					<li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                    <li>3월 31일까지 수강신청시 무료(강사직접 구입 무료제공)제공되는 기본서는 기본서 출간시 공지 후 무료로 주문할 수 있게 등록이 될 예정입니다.</li>
                </ul>
                <div class="infoTit NG"><strong>환불</strong></div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.(일부강의만의 환불은 불가합니다.)</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 김동진 온라인 T-PASS반 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.(환불시 무료로 제공된 기본서는 반환하셔야 합니다.)</li>
				</ul>
				<div class="infoTit NG"><strong>PASS 수강</strong></div>
				<ul>
                    <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>김동진 온라인 T-PASS반은 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>김동진 온라인 T-PASS반 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                        [ 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 ]
                    </li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능) </li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>김동진 온라인 T-PASS반 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 김동진 온라인 T-PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
				</ul>
				<div class="NGEB"><strong>※ 이용 문의 : 윌비스 고객만족센터 1544-4770</strong></div>
			</div>
		</div> 

    </div>
    <!-- End evtContainer -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">    

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

          /*수강신청 동의*/ 
          function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/package/show/cate/309003/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    

    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69505110-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-69505110-4');
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop