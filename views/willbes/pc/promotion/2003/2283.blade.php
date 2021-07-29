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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,1);}

        /************************************************************/

        .sky {position:fixed;top:200px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2283_top_bg.jpg) no-repeat center top} 

        .evt02 {background:#f0f0f0}

        .evt04 {background:#2c55ff; padding-bottom:100px}
        .evt04 .wrap a {display:block; position: absolute; left: 72.23%; top: 85.91%; width: 14.02%; height: 8.44%; z-index: 2;}

        .evtCtnsBox .check{width:900px;margin:30px auto 0;font-size:16px; text-align:center;line-height:1.5;letter-spacing:-1px;        }
        .evtCtnsBox .check label{color:#fff}
        .evtCtnsBox .check input {border:2px solid #000; margin-right: 8px;height: 17px; width: 17px;} 
        .evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7; border-radius:20px; margin-left:20px}
        .evtCtnsBox .check a:hover {color: #242527;background:#82fae8;}

        .evtInfo {padding:80px 0; background:#fff; color:#000; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px;}
        .evtInfoBox ul {margin-bottom:30px}


    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2283_sky01.jpg" alt="무료수강권">
            </a>
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2283_top.jpg" alt="교정학 함다올"/>
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/51264?subject_idx=1120" target="_blank" title="교수홈" style="position: absolute; left: 83.93%; top: 72.04%; width: 9.46%; height: 8.67%; z-index: 2; "></a>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2283_01.jpg" alt="경쟁률과 합격선"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2283_02.jpg" alt="집중 커리큘럼"/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2283_03.jpg" alt="교정학 함다올을 선택하라"/>
        </div>

        <div class="evtCtnsBox evt04" id="evt04">
            <div class="wrap" data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2283_04_01.jpg" alt=""/>
                <a href="javascript:go_PassLecture('184477');"></a>                     
            </div>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>             
        </div>     
        
        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">이용안내 및 유의사항</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
					<li>제공과정 : 2022 국가직 대비 함다올 교정학 전 과정</li>
                    <li>본 상품의 수강기간은 상품 수강신청 상세안내 화면에 표기된 기간만큼 제공됩니다.</li>
                    <li>개강일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                    <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>                     
				</ul>
				<div class="infoTit"><strong>기기제한</strong></div>
				<ul>
					<li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                    - PC 2대 or 모바일 2대 of PC 1대 + 모바일 1대(총 2대)</li>
                    <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최초 1회에 한해 [내강의실] > [등록기기정보]에서 직접 초기화 가능하며, 그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006 or 1:1 상단게시판으로 문의바랍니다.</li>       
				</ul>
                <div class="infoTit"><strong>수강안내</strong></div>
				<ul>
					<li>먼저 [내강의실] 메뉴에 무한 PASS존으로 접속합니다.</li>
                    <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
                    <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li>
                    <li>본 T-PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 구입 가능합니다.</li>
                    <li>윌비스 LIVE모드는 학원실강에서 진행되는 콘텐츠로, 본 상품에는 LIVE모드 별도 제공되지 않습니다.</li>                    				
				</ul>
				<div class="infoTit"><strong>결제/환불</strong></div>
				<ul>
					<li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                    - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>                    				
				</ul>
                <div class="infoTit"><strong>※ 이용 문의 : 윌비스 고객만족센터 1544-5006</strong></div>
			</div>
		</div>
    </div>


    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>

@stop