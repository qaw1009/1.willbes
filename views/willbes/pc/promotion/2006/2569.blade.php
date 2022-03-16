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
		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/2569_top_bg.jpg) no-repeat center top;}	


        .evt_01 {background:#51c3a9}  
        .evt_03 {padding-bottom:150px}   

        .careful {color:#f72739;font-size:18px;font-weight:bold;}     


		.check {letter-spacing:3; color:#fff; margin-top:30px;}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#46b99c; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#000}
        
		.tabs {border-bottom:2px solid #46b99c; width:1120px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:20%;}
        .tabs.six li {width:16.66666%;}
		.tabs li a {display:block; color:#fff; background:#000; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:18px;font-weight:bold;}
		.tabs li a:hover,
		.tabs li a.active {background:#46b99c;color:#fff;}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}        

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

		<div class="evtCtnsBox evt_top" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/03/2569_top.jpg" alt="2022 노무패스" />
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/03/2569_01.jpg" alt="합격의 기준" />
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
			    <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_02.jpg" alt="노무패스 신청하기" />                
                <a href="javascript:void(0);" data-url="https://job.willbes.net/periodPackage/show/cate/309002/pack/648001/prod-code/192321" onclick="go_PassLecture(this)" title="노무패스 1차" style="position: absolute; left: 0%; top: 90.71%; width: 23.3%; height: 9.29%; z-index: 2;"></a>
                <a href="javascript:void(0);" data-url="https://job.willbes.net/periodPackage/show/cate/309002/pack/648002/prod-code/192320" onclick="go_PassLecture(this)" title="노무패스 2차" style="position: absolute; left: 25.45%; top: 90.71%; width: 23.3%; height: 9.29%; z-index: 2;"></a>
                <a href="javascript:void(0);" data-url="https://job.willbes.net/periodPackage/show/cate/309002/pack/648002/prod-code/192319" onclick="go_PassLecture(this)" title="동차 베이직" style="position: absolute; left: 50.98%; top: 90.71%; width: 23.3%; height: 9.29%; z-index: 2;"></a>
                <a href="javascript:void(0);" data-url="https://job.willbes.net/periodPackage/show/cate/309002/pack/648002/prod-code/192318" onclick="go_PassLecture(this)" title="동차 프리미엄" style="position: absolute; left: 76.43%; top: 90.71%; width: 23.3%; height: 9.29%; z-index: 2;"></a>
            </div>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div> 
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_01.jpg" alt="학습 커리큘럼" /> 
            <ul class="tabs">
				<li><a href="#tab01">민법</a></li>                
				<li><a href="#tab02">노동법</a></li>
				<li><a href="#tab03">사회보험법</a></li>
                <li><a href="#tab04">경제학개론</a></li>
                <li><a href="#tab05">경영학개론</a></li>
			</ul>
			<div id="tab01" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t01.jpg" alt="민법"/>
                <a href="javascript:fnPlayerSample('178934', '1328806', 'HD');" title="" style="position: absolute; left: 78.04%; top: 39.9%; width: 17.77%; height: 7.45%; z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('178938', '1328830', 'HD');" title="" style="position: absolute; left: 78.04%; top: 89.9%; width: 17.77%; height: 7.45%; z-index: 2;"></a>
			</div>
			<div id="tab02" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t02.jpg" alt="노동법"/>                      
                <a href="javascript:fnPlayerSample('178945', '1337920', 'HD');" title="" style="position: absolute; left: 77.86%; top: 80.13%; width: 17.77%; height: 14.9%; z-index: 2;"></a>
			</div>
			<div id="tab03" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t03.jpg" alt="사회보험법"/>
                <a href="javascript:fnPlayerSample('178957', '1341680', 'HD');" title="" style="position: absolute; left: 77.75%; top: 77.81%; width: 18.23%; height: 17.22%; z-index: 2;"></a>            
			</div>
            <div id="tab04" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t04.jpg" alt="경영학개론"/>
                <a href="javascript:fnPlayerSample('182626', '1333158', 'HD');" title="" style="position: absolute; left: 77.84%; top: 79.11%; width: 17.69%; height: 13.98%; z-index: 2;"></a>               
			</div>
            <div id="tab05" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t05.jpg" alt="경영학개론"/>
                <a href="javascript:fnPlayerSample('178960', '1333162', 'HD');" title="" style="position: absolute; left: 77.84%; top: 79.11%; width: 17.69%; height: 13.98%; z-index: 2;"></a>               
			</div>

            <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_02.jpg" alt="수험전략 수립 2차" />

            <ul class="tabs six">
				<li><a href="#tab06">노동법</a></li>
				<li><a href="#tab07">행정쟁송법</a></li>
				<li><a href="#tab08">인사노무관리</a></li>
                <li><a href="#tab09">경영조직론</a></li>
				<li><a href="#tab10">노동경제학</a></li>
                <li><a href="#tab11">민사소송법</a></li>
			</ul>
            <div id="tab06" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t06.jpg" alt="노동법"/>
                <a href="javascript:fnPlayerSample('178952', '1310632', 'HD');" title="" style="position: absolute; left: 77.75%; top: 39.4%; width: 18.23%; height: 8.11%; z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('178967', '1310629', 'HD');" title="" style="position: absolute; left: 77.75%; top: 89.4%; width: 18.23%; height: 8.11%; z-index: 2;"></a>            
			</div>
            <div id="tab07" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t07.jpg" alt="행정쟁송법"/>
                <a href="javascript:fnPlayerSample('178987', '1317039', 'HD');" title="" style="position: absolute;left: 77.75%;top: 39.9%;width: 18.23%;height: 7.06%;z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('178977', '1317081', 'HD');" title="" style="position: absolute;left: 77.75%;top: 89.9%;width: 18.23%;height: 7.06%;z-index: 2;"></a>             
			</div>
            <div id="tab08" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t08.jpg" alt="인사노무관리"/>
                <a href="javascript:fnPlayerSample('179003', '1320594', 'HD');" title="" style="position: absolute; left: 77.86%; top: 26.27%; width: 18.21%; height: 5.41%; z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('178993', '1320597', 'HD');" title="" style="position: absolute; left: 77.86%; top: 59.71%; width: 18.21%; height: 5.41%; z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('190986', '1340053', 'HD');" title="" style="position: absolute; left: 77.86%; top: 92.83%; width: 18.21%; height: 5.41%; z-index: 2;"></a>          
			</div> 
            <div id="tab09" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t09.jpg" alt="경영조직론"/>
                <a href="javascript:fnPlayerSample('179008', '1323542', 'HD');" title="" style="position: absolute; left: 77.86%; top: 26.27%; width: 18.21%; height: 5.41%; z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('178998', '1323544', 'HD');" title="" style="position: absolute; left: 77.86%; top: 59.71%; width: 18.21%; height: 5.41%; z-index: 2;"></a>
                <a href="javascript:fnPlayerSample('190986', '1340053', 'HD');" title="" style="position: absolute; left: 77.86%; top: 92.83%; width: 18.21%; height: 5.41%; z-index: 2;"></a>              
			</div> 
            <div id="tab10" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t10.jpg" alt="민사소송법"/>
                <a href="javascript:fnPlayerSample('187937', '1343829', 'HD');" title="" style="position: absolute; left: 77.86%; top: 78.81%; width: 18.21%; height: 16.23%; z-index: 2;"></a>            
			</div> 
            <div id="tab11" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2569_03_t11.jpg" alt="민사소송법"/>
                <a href="javascript:fnPlayerSample('178941', '1323547', 'HD');" title="" style="position: absolute; left: 77.86%; top: 78.81%; width: 18.21%; height: 16.23%; z-index: 2;"></a>            
			</div>
		</div>         

		<div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">상품 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>				
                    <li>1차 상품구성은 2022년 1월부터 2023년 5월까지 진행될 2022/2023년 대비 공인노무사 1차 대비 강좌로 구성됩니다.</li>
                    <li>2차 GS순환 강의는 순환별로 강의가 개설 된 후 순차적으로 업로드 됩니다.<br>
                    * (GS0순환-2021/2022년 9월, GS1순환-2022/2023년 1월, GS2순환-2022/2023년 4월, GS3순환-2022/2023년 6월)<br>
                    * 동영상 강의는 실강 진행 후 다음날 동영상 업로드 됩니다.</li>
                    <li>강사 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다.</li>
                    <li>강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.</li>
                    <li>순환별 강의 중 주말반과 평일반 두 개의 과정이 개설된 경우, 한 개의 과정만 제공됩니다.</li>
				</ul>
				<div class="infoTit"><strong>수강관련</strong></div>
				<ul>
					<li>본 패스 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 패스 상품 강의의 경우 배수 제한 없이 무제한 수강이 가능합니다.</li>
                    <li>본 패스 상품 수강기간은 각 상품의 시험일까지 입니다.</li>
                    <li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
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
        $(document).ready(function() {
            AOS.init();
        });
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
        function go_PassLecture(obj){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }else{
                var _url = $(obj).data('url');
                window.open(_url);
            }
        }     
    </script>


@stop