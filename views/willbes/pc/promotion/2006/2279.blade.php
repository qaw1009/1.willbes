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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,1);}

		/************************************************************/ 
		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/07/2279_top_bg.jpg) no-repeat center top;}	

        .evt_01 {padding-bottom:100px}
        .evt_01 .linkBox {width:1120px; margin:0 auto; display:flex; justify-content: space-around;}
        .linkBox div a {display:block; padding:15px 0; text-align:center; font-size:18px;
            font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important; margin:10px 0;}
        .linkBox div a:nth-of-type(1) {background-color:#003472; color:#fff;}
        .linkBox div a:nth-of-type(2) {background-color:#f7c600; color:#000;}
        .linkBox div a:hover {background-color:#000; color:#fff}
        
        .evtCtnsBox .p_re {width:1120px; margin:0 auto;}
        .evtCtnsBox .p_re a {position:absolute; bottom:30px; right:30px; padding:15px 30px; border-radius:30px; color:#000; background-color:#f7c600; font-size:14px}
        .evtCtnsBox .p_re a:hover {background-color:#003472; color:#fff}
		.tabs {border-bottom:2px solid #003472; width:1120px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:20%;}
		.tabs.tabs3ea li {display:inline; float:left; width:33.3333%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:18px;font-weight:bold;}
		.tabs li a:hover,
		.tabs li a.active {background:#003472;}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}       
        
        .evt_04 {padding-bottom:100px}
        .evtCtnsBox .check{width: 800px; margin:0 auto; font-size:16px; text-align:center;line-height:1.5;
					  letter-spacing:-1px;font-weight:bold;}
		.evtCtnsBox .check label{color:#000}
		.evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
		.evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin-left:20px}
        .evtCtnsBox .check a:hover {background-color:#003472; color:#fff}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top" data-aos="fade-right">
			<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_top.jpg" alt="21/22 얼리버드 감평패스" />
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-right">
			<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_01.jpg" alt="" usemap="#Map2049_apply" border="0" />
            <div class="linkBox">
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2279_01_01.jpg" alt="합격수기" >
                    <a href="https://job.willbes.net/support/examNews/show/cate/309003?board_idx=344538&s_cate_code=309003&s_cate_code_disabled=Y" target="_blank">합격수기 전체보기</a>
                    <a href="https://www.youtube.com/watch?v=Af4XrDxOJ9c" target="_blank">공부방법 동영상</a>
                </div>
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2279_01_02.jpg" alt="합격수기" >
                    <a href="https://job.willbes.net/support/examNews/show/cate/309003?board_idx=344544&s_cate_code=309003&s_cate_code_disabled=Y" target="_blank">합격수기 전체보기</a>
                    <a href="https://www.youtube.com/watch?v=Q-a2P2NW3ks" target="_blank">공부방법 동영상</a>
                </div>
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2279_01_03.jpg" alt="합격수기" >
                    <a href="https://job.willbes.net/support/examNews/show/cate/309003?board_idx=344548&s_cate_code=309003&s_cate_code_disabled=Y" target="_blank">합격수기 전체보기</a>
                    <a href="https://www.youtube.com/watch?v=05j4bwoz9PQ" target="_blank">공부방법 동영상</a>
                </div>
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2279_01_04.jpg" alt="합격수기" >
                    <a href="https://job.willbes.net/support/examNews/show/cate/309003?board_idx=344551&s_cate_code=309003&s_cate_code_disabled=Y" target="_blank">합격수기 전체보기</a>
                </div>
            </div>
			<map name="Map2049_apply" id="Map2049_apply">
				<area shape="rect" coords="-1,855,264,943"  href="javascript:go_PassLecture('178529');" />
				<area shape="rect" coords="285,856,548,942" href="javascript:go_PassLecture('178530');" />
				<area shape="rect" coords="571,856,835,943" href="javascript:go_PassLecture('178531');" />
				<area shape="rect" coords="856,856,1138,942" href="javascript:go_PassLecture('178532');" />
			</map>
			  
		</div>
        
        <div class="evtCtnsBox evt_02" data-aos="fade-right">
			<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_02.jpg" alt="수험전략 수립 1차" />
            <ul class="tabs">
				<li><a href="#tab01">민법</a></li>
				<li><a href="#tab02">감정평가관계법규</a></li>
				<li><a href="#tab03">부동산학원론</a></li>
				<li><a href="#tab04">경제학원론</a></li>
				<li><a href="#tab05">회계학</a></li>
			</ul>
			<div id="tab01" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_03_01.jpg" alt="민법" />
                <a href="javascript:fnPlayerSample('161390', '1239343', 'HD');">샘플강의 보기</a>
			</div>
			<div id="tab02" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_03_02.jpg" alt="감정평가관계법규"/>
                <a href="javascript:fnPlayerSample('181219', '1300565', 'HD');">샘플강의 보기</a>
			</div>
			<div id="tab03" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_03_03.jpg" alt="부동산학원론"/>
                <a href="javascript:fnPlayerSample('181227', '1300075', 'HD');">샘플강의 보기</a>
			</div>
			<div id="tab04" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_03_04.jpg" alt="경제학원론"/>
                <a href="javascript:fnPlayerSample('182621', '1300992', 'HD');">샘플강의 보기</a>
			</div>
			<div id="tab05" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_03_05.jpg" alt="회계학"/>
                <a href="javascript:fnPlayerSample('181206', '1299687', 'HD');">샘플강의 보기</a>
			</div>
		</div>

        <div class="evtCtnsBox evt_03" data-aos="fade-right">
			<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_04.jpg" alt="1차 커리큘럼 및 2차" />     
            <ul class="tabs tabs3ea">
				<li><a href="#tab06">감정평가실무</a></li>
				<li><a href="#tab07">감정평가이론</a></li>
				<li><a href="#tab08">감평행정법 및 보상법규</a></li>
			</ul>
			<div id="tab06" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_05_01.jpg" alt="감정평가실무"/>
                <a href="javascript:fnPlayerSample('180861', '1293287', 'HD');">샘플강의 보기</a>
			</div>
			<div id="tab07">
                <div class="p_re">
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2279_05_02.jpg" alt="감정평가이론" />
                    <a href="javascript:fnPlayerSample('180869', '1290860', 'HD');">샘플강의 보기</a>
                </div>
                <div class="p_re">
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2279_05_03.jpg" alt="감정평가이론"/>
                    <a href="javascript:fnPlayerSample('182402', '1293229', 'HD');">샘플강의 보기</a>
                </div>
			</div>	
            <div id="tab08" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_05_04.jpg" alt="감평행정법 및 보상법규"/>
                <a href="javascript:fnPlayerSample('180866', '1291272', 'HD');">샘플강의 보기</a>
			</div> 
		</div>

        <div class="evtCtnsBox evt_04" data-aos="fade-right">
			<img src="https://static.willbes.net/public/images/promotion/2021/07/2279_06.jpg" alt="2차 커리큘럼" />
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2279_07.jpg" alt="" />
                <a href="javascript:go_PassLecture('183759');" title="" style="position: absolute; left: 0%; top: 86.86%; width: 32.5%; height: 9.64%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183757');" title="" style="position: absolute; left: 33.66%; top: 86.86%; width: 32.5%; height: 9.64%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183749');" title="" style="position: absolute; left: 67.32%; top: 86.86%; width: 32.5%; height: 9.64%; z-index: 2;"></a>
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2279_08.jpg" alt="" />
                <a href="javascript:go_PassLecture('183756');" title="" style="position: absolute; left: 0%; top: 85.47%; width: 15.63%; height: 10.41%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183769');" title="" style="position: absolute; left: 16.79%; top: 85.47%; width: 15.63%; height: 10.41%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183764');" title="" style="position: absolute; left: 33.57%; top: 85.47%; width: 15.63%; height: 10.41%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183761');" title="" style="position: absolute; left: 50.45%; top: 85.47%; width: 15.63%; height: 10.41%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183768');" title="" style="position: absolute; left: 67.14%; top: 85.47%; width: 15.63%; height: 10.41%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183751');" title="" style="position: absolute; left: 83.93%; top: 85.47%; width: 15.63%; height: 10.41%; z-index: 2;"></a>
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2279_09.jpg" alt="" />
                <a href="javascript:go_PassLecture('183765');" title="" style="position: absolute; left: 0%; top: 86.83%; width: 23.39%; height: 10.61%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183752');" title="" style="position: absolute; left: 25.45%; top: 86.83%; width: 23.39%; height: 10.61%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183766');" title="" style="position: absolute; left: 50.98%; top: 86.83%; width: 23.39%; height: 10.61%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('183753');" title="" style="position: absolute; left: 76.34%; top: 86.83%; width: 23.39%; height: 10.61%; z-index: 2;"></a>
            </div>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div> 
		</div>   

		<div class="evtCtnsBox evtInfo NGR" id="careful">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>1차 상품구성은 2021년 6월부터 2022년 3월까지 진행될 2022년 대비 감정평가사 1차 대비 강좌로 구성됩니다.</li>
                    <li>2차 상품구성은 2021년 5월부터 2022년 6월까지 진행될 2022년 대비 감정평가사 2차 대비 강좌로 구성됩니다.<br/>
                        ∙ 이론강의 – 2021년 5월 ~ 2021년 9월<br/>
                        ∙ GS0~4기 스터디 - 2021년 8월 ~ 2022년 6월 <br/>
                        ∙ 문제풀이(단과) - 2021년 8월 ~ 2021년 12월<br/>
                        동영상 강의는 실강 진행 후 다음날 동영상 업로드(공휴일/주말 제외) 됩니다.</li> 
                    <li>강사 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다.<br/>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 패스 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
					<li>본 패스 상품 강의의 경우 배수 제한 없이 무제한 수강이 가능합니다.</li>
					<li>본 패스 상품 수강기간은 각 패스 상품별로 상이하오니 꼭 확인하시기 바랍니다.</li>
					<li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
					<li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
					<li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>
						① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br/>
                        ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.<br/>
                        ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.
                    </li>
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
					<li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
					<li>[MAC ADDRESS 안내]<br>
						본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
						윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
						MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.</li>
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
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        );

        /*수강신청 동의*/ 
            function go_PassLecture(code){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }

                var url = '{{ site_url('/periodPackage/show/cate/309003/pack/648001/prod-code/') }}' + code;
                location.href = url;
            }    
    </script>


@stop