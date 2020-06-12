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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/01/150406_specialty_t_bg.png) repeat center top;}	
		.evt_01 {background:#3a3f43; padding:50px 0 100px}
        .evt_02 {background:#d2c6ae; padding:50px 0 100px}
        .evt_03,
        .evt_04 {background:#3a3f43; padding:50px 0 100px}

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
        .jbMenu li {display:inline; float:left; width:140px}
        .jbMenu a {display:block; text-align:center; padding:20px 0; font-size:18px; font-weight:bold; color:#333; background:#ccc; margin-right:1px}
        .jbMenu li:last-child a {margin:0}
        .jbMenu ul:after {content:""; display:block; clear:both}
        .jbFixed {position: fixed; top: 0px; z-index:10}
        .jbMenu a:hover,
        .jbMenu a.active,
        .hvr-shutter-out-horizontal_active a {color:#fff; background:#3a3f43;}
        .jbMenu li:nth-child(2) a:hover,
        .jbMenu li:nth-child(2) a.active {color:#333; background:#d2c6ae;}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_specialty_t.png" alt="공기업전공" />
        </div>

        <div class="jbMenu">
            <ul>
                <li><a href="#anchor1" class="hvr-shutter-out-horizontal">법정직</a></li>
                <li><a href="#anchor2" class="hvr-shutter-out-horizontal">상경직</a></li>
                <li><a href="#anchor3" class="hvr-shutter-out-horizontal">법학</a></li>
                <li><a href="#anchor4" class="hvr-shutter-out-horizontal">행정학</a></li>
                <li><a href="#anchor5" class="hvr-shutter-out-horizontal">경영학</a></li>
                <li><a href="#anchor6" class="hvr-shutter-out-horizontal">경제학</a></li>
                <li><a href="#anchor7" class="hvr-shutter-out-horizontal">회계학</a></li>                
            </ul>
        </div>

        <div class="evtCtnsBox" id="anchor1">
            <div class="evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_specialty_b.png" alt="공기업 전공 법정직" />
                <table cellspacing="0" cellpadding="0">
                    <colgroup>
                    	<col width="10%">
                        <col width="">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                          <th>구분</th>
                            <th>교수명/강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="6">단과</th>
                            <td class="tx-left">김춘호 / 공기업 법학 핵심강의  </td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김춘호 / 공기업 법학 객관식 실전문제풀이  </td>
                            <td>40일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김춘호 / 공기업 법학 마무리 모의고사 (민법, 상법) </td>
                            <td>20일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        
                        <tr>
                          <td>김 헌 / 공기업 행정학 핵심강의 </td>
                            <td>20일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김 헌 / 공기업 행정학 핵심정리 강의 </td>
                            <td>20일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김 헌 / 공기업 행정학 단원별문제풀이 강의 </td>
                            <td>40일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <th rowspan="6">종합반</th>
                            <td class="tx-left">김춘호 / 공기업 법학(이론+실전문제풀이) 종합반  </td>
                            <td>100일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김춘호 / 공기업 법학(실전문제풀이+모의고사) 종합반</td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김춘호 / 공기업 법학(이론+실전문제풀이+모의고사) 종합반</td>
                            <td>120일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김 헌 / 공기업 행정학(이론+핵심+문제풀이) 종합반</td>
                            <td>120일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김춘호, 김헌 / 공기업 법정직 (법학&행정학) 이론 종합반</td>
                            <td>120일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김춘호, 김헌 / 공기업 법정직 (법학&행정학) 문제풀이 종합반</td>
                            <td>70일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox" id="anchor2">
            <div class="evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_specialty_b2.png" alt="공기업 전공 상경직" />
                <table cellspacing="0" cellpadding="0" class="mt50">
                    <colgroup>
                    	<col width="10%">
                        <col width="">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                          <th>구분</th>
                            <th>교수명/강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="10">단과</th>
                            <td class="tx-left">김윤상 / 공기업 마무리 경영학</td>
                            <td>25일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김윤상 / 공기업 마무리 경영학(재무관리 포함) </td>
                            <td>30일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김윤상 / 공기업 컴팩트 경영학</td>
                            <td>40일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>                        
                        <tr>
                          <td>김윤상 / 공기업 컴팬트 경영학(재무관리 포함)  </td>
                            <td>50일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김영식 / 공기업 경제학 핵심강의 </td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김영식 / 공기업 경제학 모의고사 강의 </td>
                            <td>30일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김영식 / 2016 공기업 경제학 이론강의</td>
                            <td>30일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김영식 / 2016 공기업 경제학 문제풀이강의 </td>
                            <td>30일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>이경신 / 공기업 회계학 핵심강의 </td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김성수 / 공기업 회계학 진도별모의고사 강의 </td>
                            <td>20일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <th rowspan="3">종합반</th>
                            <td class="tx-left">김영식 / 공기업 경제학(이론+모의고사) 종합반  </td>
                            <td>90일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>이경신, 김성수 / 공기업 회계학(이론+모의고사) 종합반</td>
                            <td>80일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>김윤상, 김영식, 이경신 / 공기업 상경직(경영학&경제학&회계학) 이론 종합반</td>
                            <td>120일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox" id="anchor3">
            <div class="evt_03">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_willtc05_6.jpg" alt="법학 김춘호"/><BR>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_willtc05_7.jpg" alt="법학" class="mt50"/>                
                <table cellspacing="0" cellpadding="0" class="mt50">
                    <colgroup>
                    	<col width="10%">
                        <col width="">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                          <th>구분</th>
                            <th>강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="10">단과</th>
                            <td class="tx-left">공기업 법학 객관식 실전문제풀이</td>
                            <td>30일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 법학 노동법 강의</td>
                            <td>8일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 법학 소송법 강의 </td>
                            <td>10일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>                        
                        <tr>
                          <td>공기업 법학 행정법 강의 </td>
                            <td>10일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 법학 상법 강의</td>
                            <td>20일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 법학 형법 강의</td>
                            <td>12일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 법학 민법 강의</td>
                            <td>30일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 법학 헌법 강의 </td>
                            <td>15일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 법학 법학일반 강의</td>
                            <td>5일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 법학 마무리 모의고사(민법,상법)</td>
                            <td>20일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <th>종합반</th>
                            <td class="tx-left">공기업 법학 핵심이론 종합반    </td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox" id="anchor4">
            <div class="evt_04">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_willtc02_6.jpg" alt="행정학 김헌"/><BR>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_willtc02_7.jpg" alt="행정학" class="mt50"/>               
                
                <table cellspacing="0" cellpadding="0" class="mt50">
                    <colgroup>
                    	<col width="10%">
                        <col width="">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                          <th>구분</th>
                            <th>강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="3">단과</th>
                            <td class="tx-left">공기업 행정학 단원별 문제풀이 강의</td>
                            <td>40일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 행정학 핵심정리 강의</td>
                            <td>20일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 행정학 핵심강의</td>
                            <td>60일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>                       

                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox" id="anchor5">
            <div class="evt_04">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_willtc42_6.png" alt="경영학 김윤상"/><BR>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_willtc42_7.png" alt="경영학" class="mt50"/>             
                <table cellspacing="0" cellpadding="0" class="mt50">
                    <colgroup>
                    	<col width="10%">
                        <col width="">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                          <th>구분</th>
                            <th>강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="4">단과</th>
                            <td class="tx-left">공기업 컴팩트 경영학(재무관리 포함)</td>
                            <td>50일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 컴팩트 경영학</td>
                            <td>40일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 마무리 경영학</td>
                            <td>25일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>                       
                        <tr>
                          <td>공기업 마무리 경영학(재무관리 포함)</td>
                            <td>30일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox" id="anchor6">
            <div class="evt_04">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_willtc01_6.jpg" alt="경제학 김영식"/><BR>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_willtc01_7.jpg" alt="경제학" class="mt50"/>               
                <table cellspacing="0" cellpadding="0" class="mt50">
                    <colgroup>
                    	<col width="10%">
                        <col width="">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                          <th>구분</th>
                            <th>강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="3">단과</th>
                            <td class="tx-left">공기업 경제학 문제풀이강의</td>
                            <td>30일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 경제학 이론강의</td>
                            <td>40일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                          <td>공기업 경제학 모의고사</td>
                            <td>30일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox" id="anchor7">
            <div class="evt_04">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_willtc28_6.jpg" alt="회계학 김성수"/><BR>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/150406_willtc28_7.jpg" alt="회계학" class="mt50"/>               
                <table cellspacing="0" cellpadding="0" class="mt50">
                    <colgroup>
                    	<col width="10%">
                        <col width="">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                          <th>구분</th>
                            <th>강의명</th>
                            <th>기간</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="5">단과</th>
                            <td class="tx-left">2018 회계학 최종정리특강</td>
                            <td>5일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>2018 재무회계 문제풀이</td>
                            <td>50일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>2018 원가회계 문제풀이</td>
                            <td>20일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>2018 재무회계 기본이론</td>
                            <td>50일</td>
                            <td><a href="#">수강신청 ></a></td>
                        </tr>
                        <tr>
                            <td>2018 원가회계 기본이론</td>
                            <td>30일</td>
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