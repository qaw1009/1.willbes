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

		.evt_top {background:#333439; padding:50px 0}	
        .evt_01 {background:#ffcc00; padding:50px 0 100px}
        .evt_02 {background:#fff; padding:100px 0}

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
            <img src="https://static.willbes.net/public/images/promotion/2020/01/2016_willtc34_6_jpg.png" alt="공기업 기계직" />
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/2016_willtc34_7.jpg" alt="강의소개" />            
        </div>

        <div class="evtCtnsBox evt_02">
            <table cellspacing="0" cellpadding="0">
                <colgroup>
                    <col width="">
                    <col width="10%">
                    <col width="15%">
                </colgroup>
                <thead>
                    <tr>
                        <th>교수명/ 강의명</th>
                        <th>기간</th>
                        <th>신청</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>[일반기계기사] 김정배 |  기초수학 핵심강의</td>
                        <td>5일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160498" target="_blank">수강신청 ></a></td>
                    </tr>      

                    <tr>
                        <td>[일반기계기사] 김정배 |  기계기사 기출문제풀이</td>
                        <td>5일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160500" target="_blank">수강신청 ></a></td>
                    </tr>       

                    <tr>
                        <td>[일반기계기사] 김정배 |  동역학 핵심강의</td>
                        <td>30일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160502" target="_blank">수강신청 ></a></td>
                    </tr>        

                    <tr>
                        <td>[일반기계기사] 김정배 |  유압기기 핵심강의</td>
                        <td>12일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160504" target="_blank">수강신청 ></a></td>
                    </tr>        

                    <tr>
                        <td>[일반기계기사] 이현문 |  기계재료 핵심강의</td>
                        <td>30일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160506" target="_blank">수강신청 ></a></td>
                    </tr>
                    
                    <tr>
                        <td>[일반기계기사] 이현문 |  기계제작법 핵심강</td>
                        <td>60일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160507" target="_blank">수강신청 ></a></td>
                    </tr>        

                    <tr>
                        <td>[일반기계기사] 김정배 |  기계설계 핵심강의</td>
                        <td>60일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160508" target="_blank">수강신청 ></a></td>
                    </tr>        

                    <tr>
                        <td>[일반기계기사] 김정배 |  유체역학 핵심강의</td>
                        <td>60일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160509" target="_blank">수강신청 ></a></td>
                    </tr>        

                    <tr>
                        <td>[일반기계기사] 김정배 |  열역학 핵심강의</td>
                        <td>60일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160510" target="_blank">수강신청 ></a></td>
                    </tr>       

                    <tr>
                        <td>[일반기계기사] 김정배 |  재료역학 핵심강의</td>
                        <td>60일</td>
                        <td><a href="https://work.willbes.net/lecture/show/cate/3102/pattern/only/prod-code/160511" target="_blank">수강신청 ></a></td>
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