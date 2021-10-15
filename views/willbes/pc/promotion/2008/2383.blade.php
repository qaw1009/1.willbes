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

        /************************************************************/
        
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/10/2383_top_bg.jpg) no-repeat center top;}

        .evt_apply {background:#F0EFEB}    

        .evt_04 {padding-bottom:100px;}

        .evt_apply {padding-bottom:50px;}
        .check {width:980px; margin:0 auto;letter-spacing:3; padding-top:30px;}
        .check label {cursor:pointer; font-size:17px;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#484848; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#836849;}

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.7;}
		.evtInfoBox h4 {font-size:25px; margin-bottom:25px;padding-left:10px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; margin-left:20px; list-style:decimal;}

        /************************************************************/      

    </style> 
    
	<div class="evtContent NGR">

		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2383_top.jpg" alt="경찰간부"/>
        </div>

        <div class="evtCtnsBox evt_apply">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2383_apply.jpg" alt="신청하기"/>
                <a  href="javascript:go_PassLecture('186694');" title="" style="position: absolute;left: 32.5%;top: 71.13%;width: 35.3%;height: 17.35%;z-index: 2;"></a>
            </div>   
            <map name="Map1914_apply" id="Map1914_apply">
                <area shape="rect" coords="58,419,1057,531" href="javascript:go_PassLecture('174676');" />
            </map> 
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 한림 동행PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>         
        </div>

        <div class="evtCtnsBox evt_pro">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2383_pro.jpg" alt="바로가기"/>
                <a href="https://www.willbes.net/Player/Sample/186548/1316701/HD" target="_blank" title="문형석" style="position: absolute;left: 1%;top: 57.43%;width: 18.3%;height: 6.35%;z-index: 2;"></a>
                <a href="https://www.willbes.net/Player/Sample/186547/1316471/HD" target="_blank" title="유안석" style="position: absolute;left: 21%;top: 57.43%;width: 18.3%;height: 6.35%;z-index: 2;"></a>
                <a href="https://www.willbes.net/Player/Sample/186543/1315163/HD" target="_blank" title="서영교" style="position: absolute;left: 41%;top: 57.43%;width: 18.3%;height: 6.35%;z-index: 2;"></a>
                <a href="https://www.willbes.net/Player/Sample/186537/1316127/HD" target="_blank" title="김한기" style="position: absolute;left: 61%;top: 57.43%;width: 18.3%;height: 6.35%;z-index: 2;"></a>
                <a href="https://www.willbes.net/Player/Sample/183391/1305713/HD" target="_blank" title="정진천" style="position: absolute;left: 81%;top: 57.43%;width: 18.3%;height: 6.35%;z-index: 2;"></a>
                <a href="https://www.willbes.net/Player/Sample/183390/1304533/HD" target="_blank" title="이국령" style="position: absolute;left: 1%;top: 90.93%;width: 18.3%;height: 6.35%;z-index: 2;"></a>
                <a href="https://www.willbes.net/Player/Sample/186613/1316921/HD" target="_blank" title="선동주" style="position: absolute;left: 21%;top: 90.93%;width: 18.3%;height: 6.35%;z-index: 2;"></a>
                <a href="https://www.willbes.net/Player/Sample/186538/1316133/HD" target="_blank" title="고태환" style="position: absolute;left: 41%;top: 90.93%;width: 18.3%;height: 6.35%;z-index: 2;"></a>
                <a href="https://www.willbes.net/Player/Sample/186307/1314394/HD" target="_blank" title="김동진" style="position: absolute;left: 61%;top: 90.93%;width: 18.3%;height: 6.35%;z-index: 2;"></a>
                <a href="https://www.willbes.net/Player/Sample/186546/1316433/HD" target="_blank" title="이동호" style="position: absolute;left: 81%;top: 90.93%;width: 18.3%;height: 6.35%;z-index: 2;"></a>
            </div>
        </div>
        
        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2383_01.jpg" alt="필기시험 과목개편"/>
        </div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2383_02.jpg" alt="출제비율"/>
        </div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2383_03.jpg" alt="강사진"/>
        </div>

        <div class="evtCtnsBox evt_04">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2383_04.jpg" alt="강의 일정"/>
        </div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox" id="careful">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
                    <li>
                        상품구성은 2021년 11월부터 2022년 10월까지 진행될 2022년 대비 경찰간부 시험 대비 강좌로 구성됩니다.<br>                  
                        동영상 강의는 실강 진행 후 다음날 동영상 업로드(공휴일/주말 제외) 됩니다.    
                    </li>
                    <li>
                        강사 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다.<br> 
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다. 
                    </li>
				</ul>
                <div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품 강의의 경우 배수 제한 없이 무제한 수강이 가능합니다.</li>
                    <li>본 패스 상품 수강기간은 2022년 시험일까지입니다.</li>
                    <li>본 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
                </ul>
                <div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 구매하셔야 합니다.</li>
                    <li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
					<li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>  
                        ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br /> 
                        ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 단과강의의 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.<br /> 
                        ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.
                    </li>            
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>                   
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
                    <li>본 이벤트 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>     
                    <li>
                        [MAC ADDRESS 안내]<br>
                        본 이벤트 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
                        윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
                        MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.
                    </li>      
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

        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ site_url('/package/show/cate/3100/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>

@stop