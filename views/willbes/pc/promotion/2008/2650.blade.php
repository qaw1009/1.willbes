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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/05/2650_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2022/05/2650_01_bg.jpg) no-repeat center top;}

        .evt_02 {background:#62928c;}

        .evt_05 {background:#fff;}
        .evt_05 .tabs {border-bottom:2px solid #333; width:1120px; margin:0 auto}
        .evt_05 .tabs li {display:inline; float:left; width:14.28%;}
        .evt_05 .tabs a {display:block; padding:20px 0; text-align:center; font-size:20px; color:#fff; background:#c7a696; margin-right:1px}
        .evt_05 .tabs a:hover,
        .evt_05 .tabs a.active {background:#333;}
        .evt_05 .tabs li:last-child a {margin:0}
        .evt_05 .tabs:after {content:''; display:block; clear:both}                    

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.75;}
		.evtInfoBox h4 {font-size:25px; margin-bottom:25px;padding-left:10px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; margin-left:20px; list-style:disc}

        /************************************************************/

    </style>

	<div class="evtContent NGR">

		<div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2650_top.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2650_01.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2650_02.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2650_03.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2650_04.jpg" alt=""/>
        </div>
        
        <div class="evtCtnsBox evt_05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2650_05.jpg" alt="전문 강사진"/>
            <ul class="tabs">
                <li><a href="#tab01">형법</a></li>
                <li><a href="#tab02">형사소송법</a></li>
                <li><a href="#tab03">범죄학</a></li>
                <li><a href="#tab04">경찰학개론</a></li>
                <li><a href="#tab05">헌법</a></li>
                <li><a href="#tab06">민법총칙</a></li>
                <li><a href="#tab07">행정학</a></li>
            </ul>
            <div>
                <span id="tab01"><img src="https://static.willbes.net/public/images/promotion/2022/05/2650_05_01.png" alt="형법" /></span>
                <span id="tab02"><img src="https://static.willbes.net/public/images/promotion/2022/05/2650_05_02.png" alt="형사소송법" /></span>
                <span id="tab03"><img src="https://static.willbes.net/public/images/promotion/2022/05/2650_05_03.png" alt="범죄학" /></span>
                <span id="tab04"><img src="https://static.willbes.net/public/images/promotion/2022/05/2650_05_04.png" alt="경찰학개론" /></span>
                <span id="tab05"><img src="https://static.willbes.net/public/images/promotion/2022/05/2650_05_05.png" alt="헌법" /></span>
                <span id="tab06"><img src="https://static.willbes.net/public/images/promotion/2022/05/2650_05_06.png" alt="민법총칙" /></span>
                <span id="tab07"><img src="https://static.willbes.net/public/images/promotion/2022/05/2650_05_07.png" alt="행정학" /></span>
            </div>            
        </div>
        
        <div class="evtCtnsBox evt_06" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2650_06.jpg" alt=""/>
                <a href="https://spo.willbes.net/package/show/cate/3100/pack/648002/prod-code/195047" target="_blank" title="" style="position: absolute;left: 0.01%;top: 14.25%;width: 99.96%;height: 33.55%;z-index: 2;"></a>
            </div>
        </div>

		<div class="evtCtnsBox evtInfo NGR" data-aos="fade-up">
			<div class="evtInfoBox" id="careful">
				<h4 class="NGEB">온라인PASS 얼리버드 상품안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
                    <li>온라인 동행PASS 얼리버드 상품은 한리법학원 경찰간부 동행팀 교수진의 지정된 ‘예비순환+1~4순환’을 기간 내 배수 제한 없이 무제한 수강 가능합니다.</li>
                    <li>
                        형법(문형석), 형사소송법(유안석/서영교), 경찰학(정진천), 범죄학(김한기), 헌법(이국령/선동주), 민법총칙(고태환), 행정학(이동호)교수별 예비순환 및 1~4순환 과정 중 구매한 상품에 해당되는 강의<br>
                        ※ 개강 전후 부득이한 학원 사정에 의해 일부 강사진의 변동이 있을 수 있습니다.
                    </li>
				</ul>
                <div class="infoTit NG"><strong>수강기간</strong></div>
				<ul>
					<li>수강시작일로부터 2023년 시험일까지 제공되며, 수강을 시작하는 즉시 수강 가능한 강의가 제공됩니다.</li>
                    <li>예비순환 강의는 2022년 8월 8일 73기 대비 종합반 커리큘럼 시작 전 까지 제공됩니다.</li>                   
                </ul>
                <div class="infoTit NG"><strong>동영상 수강방법 및 제한</strong></div>
				<ul>
                    <li>① 홈페이지 [내강의실] 메뉴에서 [PASS강의] > [수강중강좌]로 접속합니다.</li>
                    <li>② 접속 후 구매하신 PASS 상품명 옆의 [강좌추가]를 선택합니다.</li>
                    <li>③ 원하는 과목/교수/강좌를 선택하여 추가하신 후 수강이 가능합니다.</li>
                    <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                    <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재 및 자료 관련</strong></div>
				<ul>
                    <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 가능합니다.<br>
                        ※ 예비순환 강의(72기 대비 1순환 기본강의)교재는 무료로 제공 됩니다.
                    </li> 
                    <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>환불 관련</strong></div>
				<ul>
                    <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                    <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                    <li>본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
                    <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                    <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                    <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.<br>
                        ※ 이용문의 : 고객만족센터 1566-4770
                    </li>
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

            var url = '{{ site_url('/package/show/cate/3100/pack/648002/prod-code/') }}' + code;
            location.href = url;
        }    

    </script>
@stop