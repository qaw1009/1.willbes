@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
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

		.skybanner{position: fixed; top: 280px;right:2px;z-index: 1;}

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/01/150407_interview_t_bg.png) repeat-x center top;}	
		.evt_01 {background:#2470c1; padding:50px 0 100px}
        .evt_02 {background:#333439; padding:50px 0 100px}
        .evt_03 {background:#2e2f37; padding:50px 0 100px}
        .evt_04 {background:#2e2f37; padding:50px 0 100px}
        .evt_05 {background:#e4e4e4; padding:0 0 100px}
        .evt_06 {background:#931d1d; padding:0 0 50px}

        .evtCtnsBox table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto; width:980px !important; margin:0 auto; background:#fff}
		.evtCtnsBox table th,
		.evtCtnsBox table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px; line-height:1.5}
		.evtCtnsBox table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evtCtnsBox table tbody th {background: #9697a1; color:#fff;} 
        .evtCtnsBox table tbody td:first-child {text-align:left}
        .evtCtnsBox table tbody td:last-child {color:#e83e3e; font-weight:bold}
		.evtCtnsBox .buyLec {margin-top:30px}
		.evtCtnsBox .buyLec a { display:block; text-align:cetner; font-size:30px; font-weight:600; background:#e83e3e; color:#fff; padding:20px 0; border-radius:50px}
		.evtCtnsBox .buyLec a:hover {background:#e83e3e; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        .jbMenu {width:100%; background:#000; padding:30px 0 0}
        .jbMenu ul {width:980px; margin:0 auto}
        .jbMenu li {display:inline; float:left; width:33.33333%}
        .jbMenu a {display:block; text-align:center; padding:20px 0; font-size:18px; font-weight:bold; color:#333; background:#ccc; margin-right:1px}
        .jbMenu li:last-child a {margin:0}
        .jbMenu ul:after {content:""; display:block; clear:both}
        .jbFixed {position: fixed; top: 0px; z-index:10}
        .jbMenu a:hover,
        .jbMenu a.active,
        .hvr-shutter-out-horizontal_active a {color:#fff; background:#333439;}
        .jbMenu li:nth-child(1) a:hover,
        .jbMenu li:nth-child(1) a.active {background:#2470c1;}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/150407_interview_t.png" alt="면접 & 자기소개서" />
        </div>

        <div class="jbMenu">
            <ul>
                <li><a href="#anchor1" class="hvr-shutter-out-horizontal">면접 및 자기소개서</a></li>
                <li><a href="#anchor2" class="hvr-shutter-out-horizontal">박희주</a></li>
                <li><a href="#anchor3" class="hvr-shutter-out-horizontal">손세훈</a></li>             
            </ul>
        </div>

        <div class="evtCtnsBox" id="anchor1">
            <div class="evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150407_interview_m2.png" alt="박희주" /><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150407_interview_m3.png" alt="손세훈" />
                <table cellspacing="0" cellpadding="0" class="mt50">
                    <colgroup>
                        <col width="">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                          <th>교수명/강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tx-left">박희주 / Case로 만나는 취업 훈련도감(이력서&자기소개서)</td>
                            <td>30일</td>
                            <td><a href="https://work.stage.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160519" target="_blank">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>박희주 / Case로 만나는 취업 훈련도감(면접)</td>
                            <td>30일</td>
                            <td><a href="https://work.stage.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160518" target="_blank">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>박희주 / Case로 만나는 취업 훈련도감(면접&자기소개서) 종합반 </td>
                            <td>60일</td>
                            <td><a href="https://work.stage.willbes.net/package/show/cate/3102/pack/648001/prod-code/160833" target="_blank">수강신청 ></a></td>
                        </tr>   
                        <tr>
                            <td>손세훈 / 소개팅의 전략으로 알아보는 취업 자기소개서 특강  </td>
                            <td>10일</td>
                            <td><a href="https://work.stage.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160520" target="_blank">수강신청 ></a></td>
                        </tr>       
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox" id="anchor2">
            <div class="evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150407_willtc09_6.jpg" alt="자기소개서&면접 박희주" /><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150407_willtc09_7.jpg" alt="강의소개" class="mt50"/>
                <table cellspacing="0" cellpadding="0" class="mt50">
                    <colgroup>
                        <col width="">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>교수명/강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Case로 만나는 취업 훈련도감(이력서&자기소개서) </td>
                            <td>30일</td>
                            <td><a href="https://work.stage.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160519" target="_blank">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>Case로 만나는 취업 훈련도감(면접)</td>
                            <td>30일</td>
                            <td><a href="https://work.stage.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160518" target="_blank">수강신청 ></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox" id="anchor3">
            <div class="evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150407_willtc0701_6.jpg" alt="자기소개서 손세훈"/><BR>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150407_willtc0701_7.jpg" alt="자기소개서" class="mt50"/>                
                <table cellspacing="0" cellpadding="0" class="mt50">
                    <colgroup>
                        <col width="">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tx-left">소개팅의 전략으로 알아보는 취업 자기소개서</td>
                            <td>10일</td>
                            <td><a href="https://work.stage.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160520" target="_blank">수강신청 ></a></td>
                        </tr>                       
                    </tbody>
                </table>
            </div>
        </div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>종합반(패키지)강의는 일시중지/연장이 되지 않습니다.</li>
                    <li>복지할인쿠폰등 다른 할인쿠폰과 중복적용되지 않습니다.</li>
                    <li>강의환불시 이벤트 전 수강료, 수강일수 기준으로 공제가 된 후 환불이 되십니다.</li>                        
				</ul>
			</div>
		</div>
	</div>
    <!-- End Container -->

    <script>       
        $( document ).ready( function() {
            var jbOffset = $( '.jbMenu' ).offset();
            $( window ).scroll( function() {
                if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.jbMenu' ).addClass( 'jbFixed' );
            }
            else {
                $( '.jbMenu' ).removeClass( 'jbFixed' );
            }
            });
        } );

        $(document).ready(function(){
            $('.jbMenu ul').each(function(){
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