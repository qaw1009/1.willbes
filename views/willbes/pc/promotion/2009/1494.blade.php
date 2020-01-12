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

        .tabs {width:1120px; margin:0 auto}
		.tabs li {display:inline; float:left; width:50%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:60px; line-height:60px; text-align:center; margin-right:1px; font-size:20px}
		.tabs li a:hover,
		.tabs li a.active {background:#ffecdb; color:#d5181f}
		.tabs li:last-child a {margin:0}
		.tabs:after {content:""; display:block; clear:both}  

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/01/150617_willpass_ncs_t1_bg.png) repeat center top;}	
		.evt_01 {background:url(https://static.willbes.net/public/images/promotion/2020/01/150617_willpass_ncs_t2_2_bg.png) repeat center top;}
        .evt_02 {background:#24bfc1}
        .evt_03 {background:#329b9c}
        .evt_04 {padding:100px 0}
        .evt_04 table {width:980px !important; margin:0 auto;}

        .evtCtnsBox table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto;}
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

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/150617_willpass_ncs_t1.png" alt="ncs를 알아야 공기업 합격이 보인다." />
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/150617_willpass_ncs_t2_2.png" alt="출제유형" />
        </div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/150617_willpass_ncs_t3_2.png" alt="소프트웨어자산관리사 2급 올인원 스피드 합격패키지" />
        </div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/150617_willpass_ncs_t4.png" alt="소프트웨어자산관리사 2급 올인원 스피드 합격패키지" />
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
                        <td>김영식 / All In One NCS 직업기초능력평가 수리적/비언어적 문제해결능력 문제풀이 </td>
                        <td>40일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160513" target="_blank">수강신청 ></a></td>
                    </tr>
                    <tr>
                        <td>손세훈 / All In One NCS 직업기초능력평가 언어적 문제해결능력 문제풀이  </td>
                        <td>20일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160497" target="_blank">수강신청 ></a></td>
                    </tr>
                </tbody>
            </table>
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
@stop