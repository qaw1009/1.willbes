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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/01/150403_real_t_bg.jpg) repeat-x center top;}	
		.evt_01 {background:#dcd8d5; padding:50px 0 100px}

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


        /************************************************************/      
    </style> 

	<div class="evtContent NGR">
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/150403_real_t.png" alt="면접 & 자기소개서" />
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/150403_real_m.png" alt="박희주" />
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
                        <td>일반상식 기출핵심정리(이론+문제) 강의</td>
                        <td>70일</td>
                        <td><a href="https://work.stage.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160517" target="_blank">수강신청 ></a></td>
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