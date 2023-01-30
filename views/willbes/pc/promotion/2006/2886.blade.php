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
       /* .evtCtnsBox .wrap a {border:1px solid #000}*/

		/************************************************************/

       
        .evt_top {background:#6cd2ff}   

		.tabs {border-bottom:2px solid #021433; display:flex; justify-content: center; width:1120px; margin:0 auto}
		.tabs li {width:100%;}
		.tabs li a {display:block; color:#021433; background:#6cd2ff; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:18px;font-weight:bold;}
		.tabs li a:hover,
		.tabs li a.active {background:#021433; color:#fff}     
        .tabs li:last-child a {margin:0}

        .evt_02 {padding-bottom:150px}
        
        .evtCtnsBox .check{width: 800px; margin:50px auto 0; font-size:16px; text-align:center;line-height:1.5;
					  letter-spacing:-1px;font-weight:bold;}
		.evtCtnsBox .check label{color:#000}
		.evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
		.evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin-left:20px}
        .evtCtnsBox .check a:hover {background-color:#021433; color:#fff}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:15px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.5}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/

    </style> 
	<div class="evtContent NSK">

		<div class="evtCtnsBox evt_top" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2886_top.jpg" alt="" />		
                <a href="#lecbuy" title="기본+문풀" style="position: absolute; left: 14.73%; top: 81.69%; width: 33.04%; height: 6.31%; z-index: 2;"></a>	
                <a href="#lecbuy" title="문풀+최종" style="position: absolute; left: 51.79%; top: 81.69%; width: 33.04%; height: 6.31%; z-index: 2;"></a>	  
            </div>
		</div>        
       
        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2886_01.jpg" alt="" />	
            <ul class="tabs">
				<li><a href="#tab01">민법</a></li>
				<li><a href="#tab02">노동법</a></li>
				<li><a href="#tab03">사회보험법</a></li>
				<li><a href="#tab04">경제학원론</a></li>
				<li><a href="#tab05">경영학개론</a></li>
			</ul>
			<div id="tab01" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2023/01/2886_01_t01.jpg" alt="민법" />
			</div>
			<div id="tab02" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2023/01/2886_01_t02.jpg" alt="노동법"/>
			</div>
            <div id="tab03" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2023/01/2886_01_t03.jpg" alt="사회보험법"/>
			</div>
			<div id="tab04" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2023/01/2886_01_t04.jpg" alt="경제학원론"/>
			</div>
			<div id="tab05" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2023/01/2886_01_t05.jpg" alt="경영학개론"/>
			</div>            
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2886_02_01.jpg" alt="" />
            <div class="wrap" id="lecbuy">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2886_02_02.jpg" alt="" />
                <a href="javascript:void(0);" data-url="https://job.willbes.net/userPackage/show/cate/309002/prod-code/204986" onclick="go_PassLecture(this)" title="" style="position: absolute; left: 12.86%; top: 38.48%; width: 22.23%; height: 26.75%; z-index: 2;"></a>
                <a href="javascript:void(0);" data-url="https://job.willbes.net/userPackage/show/cate/309002/prod-code/204987" onclick="go_PassLecture(this)" title="" style="position: absolute; left: 38.21%; top: 38.48%; width: 22.23%; height: 26.75%;  z-index: 2;"></a>
                <a href="javascript:void(0);" data-url="https://job.willbes.net/package/show/cate/309002/pack/648001/prod-code/200222" onclick="go_PassLecture(this)" title="" style="position: absolute; left: 64.2%; top: 38.48%; width: 22.23%; height: 26.75%;  z-index: 2;"></a>

                <a href="javascript:void(0);" data-url="https://job.willbes.net/userPackage/show/cate/309002/prod-code/204105" onclick="go_PassLecture(this)" title="" style="position: absolute; left: 12.59%; top: 68.35%; width: 22.23%; height: 26.75%; z-index: 2;"></a>
                <a href="javascript:void(0);" data-url="https://job.willbes.net/userPackage/show/cate/309002/prod-code/204999" onclick="go_PassLecture(this)" title="" style="position: absolute; left: 38.21%; top: 68.35%; width: 22.23%; height: 26.75%;z-index: 2;"></a>
                <a href="javascript:void(0);" data-url="https://job.willbes.net/userPackage/show/cate/309002/prod-code/205000" onclick="go_PassLecture(this)" title="" style="position: absolute; left: 64.2%; top: 68.35%; width: 22.23%; height: 26.75%;z-index: 2;"></a>
            </div>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>
        </div>


		<div class="evtCtnsBox evtInfo NGR" id="careful">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>1차 상품구성은 2023년 1월부터 2023년 5월까지 진행될 2023년 대비 공인노무사 1차 대비 강좌로 구성됩니다.</li>
                    <li>할인율은 상품에 따라 차이가 있음을 양지해주시기 바랍니다.</li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 패스 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 패스 상품 수강기간은 각 상품의 시험일까지 입니다.</li>
                    <li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 일부 강의(문제풀이, 최종정리)의 경우 개강 이후 강의시작일 설정가능(상담실 문의)</li>
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
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                        ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                        ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.
                        ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.</li>
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

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>


@stop