@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1200px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1200px;}

		/************************************************************/ 

		.skybanner{position: fixed; top: 280px;right:2px;z-index: 1;}	  

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/12/1995_top_bg.jpg) no-repeat center top;}	

        .evt_02 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1995_02_bg.jpg) no-repeat center top;padding-bottom:100px;}	
        .evt_02 ul {width:1120px;margin:0 auto;}
        .evt_02 li {display:inline; float:left; width:33.333333%;}
        .evt_02 li a{display:block; text-align:center; height:116px; line-height:116px; font-size:30px; background:#fff; border:3px solid #ff4d5a; margin-right:20px;}
        .evt_02 li:last-child a {margin:0}
        .evt_02 li a:hover,
        .evt_02 li a.active {background:#a8a8a8; border:3px solid #ff4d5a; color:#000}
        .evt_02 ul:after {content:""; display:block; clear:both}

        .evt_03 {background:#ebebeb;}

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px; margin-top:100px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:30px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
        .evtInfoBox span {color:#ff6d6d;vertical-align:bottom}           
        .contact {font-size:17px;} 

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1995_top.jpg" alt="" />
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1995_01.jpg" alt="" />
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1995_02.jpg" alt="" />
            <ul class="tabs NSK-Black"  style="padding:100px 0 25px;">
                <li><a href="#tab01">자료해석</a></li>
                <li><a href="#tab02">상황판단</a></li>
                <li><a href="#tab03">언어논리</a></li>
            </ul>
            <div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1995_02_01.png" alt="" />
            </div>
            <div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1995_02_02.png" alt="" />
            </div>
            <div id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1995_02_03.png" alt="" style="padding-bottom:25px;" /><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1995_02_04.png" alt="" />
            </div>
		</div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1995_03.jpg" alt="" />
		</div>

        <div class="evtCtnsBox evt_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1995_04.jpg" alt="" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
		</div>

        <div class="evtCtnsBox evtInfo NSK" id="notice">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">PSAT 실전모의고사+해설 및 핵심정리 동영상 종합반 이벤트 안내</h4>
                <div class="infoTit NSK-Black"><strong>이용안내</strong></div>
                <ul>
                    <li>강의 : PSAT 실전 모의고사 + 해설 및 핵심정리강의 3과목  동영상종합반</li>
                    <li><span>수강료 :  15%할인 (498,000원 -> 423,300원)</span></li>
                    <li><span>수강기간 :  2021년 3월 6일까지</span></li>
                </ul>
                <div class="infoTit NSK-Black"><strong>교재</strong></div>
                <ul>
                    <li>모의고사 문제와 해설 : 모의고사 문제와 해설은 업로드되지 않고 각 과목별 개강 이후 종강일까지 주 2~3회씩 택배발송예정입니다.</li>
                    <li>동영상 공지사항에 등록된 모의고사 문제와 해설지 택배발송 안내를 참고부탁드립니다. </li>
                    <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>
                <div class="infoTit NSK-Black"><strong>강의수강</strong></div>
                <ul>
                    <li>강의배수 제한 : 강의는 2배수 제한 규정이 적용됩니다.</li>
                    <li>신청하신 강의는 2021년 3월 6일까지 수강하실 수 있습니다.(일시정지, 강의연장 불가)</li>
                </ul>
                <div class="infoTit NSK-Black"><strong>환불</strong></div>
                <ul>
                    <li>결제일로부터 7일 이내 전액 환불 가능합니다. 단, 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의 자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 수강하신 상품의 정가를 기준으로 이용기간을 공제하고 환불됩니다.<br>
                        (환불시 무료로 제공된 기본서는 반납 또는 교재비 차감 후 환불됩니다.)                
                    </li>
                    <li>사용자패키지를 통한 3과목 이상 수강시 일부과목만의 환불은 불가합니다.</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
                </ul>
                <div class="infoTit NSK-Black"><strong>유의사항</strong></div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                </ul>
                <p class="contact"><strong>※ 이용 문의 : 윌비스 고객만족센터 1566-4770</strong></p>
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
    </script>
@stop