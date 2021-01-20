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

        /************************************************************/        
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2022_top_bg.jpg) no-repeat center top;} 

        .evt_01 {background:#fff;}              
        .btnLec {display:block; border-radius:40px; color:#fff !important; background:#12408c; font-size:30px; text-align:center; padding:20px 0; width:1000px; margin:50px auto}
        .check {width:980px; margin:0 auto;letter-spacing:3; padding-top:30px;}
        .check label {cursor:pointer; font-size:15px;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#1a140e; 
            margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#12408c;}

        .evt_02 {padding-bottom:100px;}

        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2022_03_bg.jpg) no-repeat center top;}   

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.7;}
		.evtInfoBox h4 {font-size:25px; margin-bottom:25px;padding-left:10px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; margin-left:20px; list-style:disc}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2022_top.jpg" alt="얼리버드 기본이론 패키지" />
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2022_01.jpg" alt="수강특전" />    
            <a href="javascript:go_PassLecture('177759');" alt="수강신청" class="btnLec NSK-Black">수강신청 바로가기 ></a>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>       
        </div> 

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2022_02.jpg" alt="수험방향 잡기" usemap="#Map2022a" border="0" />
            <map name="Map2022a" id="Map2022a">
                <area shape="rect" coords="99,774,456,812" href="https://job.willbes.net/support/gosiNotice/show/cate/309003?board_idx=313470&s_cate_code=309003&s_cate_code_disabled=Y" target="_blank" />
            </map>
		</div>     

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2022_03.jpg" alt="과목 및 강사진 안내" />
		</div>    

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox" id="careful">
				<h4 class="NGEB">상품 이용안내 </h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
                    <li>본 상품은 2019년 3월 ~ 2020년 6월에 진행된 [감정평가사 2차 기본강의] 과정입니다.</li>               
				</ul>
                <div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                    <li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
                </ul>
                <div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                    <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                    ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                    ② 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.</li>     
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

            var url = '{{ site_url('/userPackage/show/cate/309003/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>
@stop 