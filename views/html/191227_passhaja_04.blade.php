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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/01/150331_able_t_bg.png) repeat center top;}	
		.evt_01 {background:url(https://static.willbes.net/public/images/promotion/2020/01/150331_able_m_bg.png) repeat center top;}
        .evt_02 {background:url(https://static.willbes.net/public/images/promotion/2020/01/150331_able_b_bg.png) repeat center top;}
        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2020/01/150331_able_prof_bg.png) repeat center top;}
        .evt_04 {padding:100px 0}
        .evt_05 {background:#333439; padding:50px 0 100px}

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
        .jbMenu li:nth-child(1) a.active {background:#e0e1da; color:#e54d45;}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/150331_able_t.png" alt="한국사 능력검정시험" />
        </div>

        <div class="jbMenu">
            <ul>
                <li><a href="#anchor1" class="hvr-shutter-out-horizontal">한국사 능력검정시험</a></li>
                <li><a href="#anchor2" class="hvr-shutter-out-horizontal">김진재</a></li>
                <li><a href="#anchor3" class="hvr-shutter-out-horizontal">김상범</a></li>             
            </ul>
        </div>        

        <div class="evtCtnsBox" id="anchor1">
            <div class="evtCtnsBox evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150331_able_m.png" alt="출제유형" />
            </div>            
            <div class="evtCtnsBox evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150331_able_b.png" alt="시험 안내" />
            </div>
            <div class="evtCtnsBox evt_03">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150331_able_prof_kjj.png" alt="김진재 교수" /><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150331_able_prof_ksb.png" alt="김상범 교수" />
            </div>
            <div class="evtCtnsBox evt_04">
                <table cellspacing="0" cellpadding="0">
                    <colgroup>
                        <col width="">
                        <col width="15%">
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
                            <td>김진재 /한국사능력검정시험 천기누설 특강[고급](단원별/전범위 기출모의고사 </td>
                            <td>30일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>김진재 /한국사능력검정시험 천기누설 특강[고급](이론)</td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>김진재 /한국사능력검정시험 천기누설 특강[고급](이론+단원별/전범위 기출모의고사)</td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>김상범 /2018 ALL PASS 한국사능력검정시험 대비 기본강의(9월) </td>
                            <td>100일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox" id="anchor2">
            <div class="evt_05">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150331_willtc35_6.jpg" alt="김진재 교수" /><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150331_willtc35_7.jpg" alt="강의소개" class="mt50"/>
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
                            <td>한국사능력검정시험 천기누설 특강[고급](단원별/전범위 기출모의고사)</td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>한국사능력검정시험 천기누설 특강[고급](이론)</td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>한국사능력검정시험 천기누설 특강[고급](이론+단원별/전범위 기출모의고사)</td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox" id="anchor3">
            <div class="evt_05">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150331_wcop36_20_6.png" alt="김상범 교수"/><BR>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150331_wcop36_20_7.png" alt="강의소개" class="mt50"/>                
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
                            <td class="tx-left">2018 ALL PASS 한국사능력검정시험 대비 기본강의(9월) - 중급/고급 대비</td>
                            <td>100일</td>
                            <td><a href="#">수강신청 ></a></td>
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