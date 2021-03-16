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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2094_top_bg.jpg) no-repeat center top;}   

        .evt_01 {background:#ebebeb}

        .evt_02 {background:#ebebeb; padding-bottom:100px}

        .check {width:980px; margin:0 auto;letter-spacing:3;}
        .check label {cursor:pointer; font-size:15px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#009150; 
            margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#333}

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.7;}
		.evtInfoBox h4 {font-size:25px; margin-bottom:25px;padding-left:10px;}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; margin-left:20px; list-style:disc}

        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2094_top.jpg" alt="양진목 회로이론 티패스"/>           
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2094_01.jpg" alt="양진목 회로이론 티패스" />            
        </div>  
        
        <div class="evtCtnsBox evt_02">
            <a href="javascript:go_PassLecture('179735');" >
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2094_02.jpg" alt="기초 온라인"/>
            </a>
            <a href="javascript:go_PassLecture('179735');" >
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2094_03.jpg" alt="심화 온라인"/>
            </a>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>  
        </div>

		<div class="evtCtnsBox evtInfo">
			<div class="evtInfoBox" id="careful">
				<h4 class="NSK-Black">윌비스 한림법학원 양진목 회로이론 T-PASS반 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
                    <li>본 PASS는 변리사시험대비 과정으로, 양진목 교수 패키지 강좌를 2배수로 수강할 수있습니다.</li>
                    <li>수강가능 강좌: 회로이론 양진목 교수 기초 패키지/심화 패키지 강좌</li>
                    <li>2021년 대비 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.</li>
                    <li>교수님 일정 및 진행방식은 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼이 변경될 수 있는 점 양해부탁드립니다.</li>
				</ul>
                <div class="infoTit"><strong>수강 방법</strong></div>
				<ul>
					<li>내 강의실 메뉴에서 무한PASS존으로 접속합니다.</li>
                    <li>구매하신 무한 PASS 상품명 옆의 [강좌추가]버튼을 클릭, 원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>수강 관련</strong></div>
				<ul>
					<li>본 PASS를 이용중에는 일시 정지 기능을 사용할 수 없습니다.</li>
                    <li>본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                    - PC 2대 or 모바일 2대 or PC 1대, 모바일 1대(총 2대)</li>
                    <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우 고객센터로 문의하여 주시기 바랍니다.</li>
                    <li>수강 기간은 결제일로부터 1년만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>
				</ul>
				<div class="infoTit"><strong>환불 관련</strong></div>
				<ul>
                    <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                    <li>맛보기 강의를 제외하고 2강 이하 수강시에만 전액 환불 가능합니다.</li>
                    <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                    <li>본 상품은 할인가 적용된 특별 기획 상품이므로 부분환불은 정가 대비 사용일 수에 따라 차감 후 환불됩니다.</li>            
				</ul>
				<div class="infoTit"><strong>유의사항</strong></div>
				<ul>
					<li>본 상품은 할인가 적용된 특별 기획 상품이므로 쿠폰 할인/적립금 사용 등 혜택이 제공되지 않습니다.</li>
                    <li>강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가능합니다.</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 진행될 수 있습니다.</li>      
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

            var url = '{{ site_url('/userPackage/show/cate/309002/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>
@stop