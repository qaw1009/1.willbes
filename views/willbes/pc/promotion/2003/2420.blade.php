@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed;top:200px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2420_top_bg.jpg) no-repeat center top} 

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2420_02_bg.jpg) no-repeat center top}

        .evt03 {padding-bottom:150px;}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2420_04_bg.jpg) no-repeat center top}
        .check {position:absolute; bottom:80px; width:1000px; left:50%; margin-left:-500px; color:#fff; font-size:17px; font-weight:bold; text-align:center}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#cefd5f; color:#000} 
        
        .evtInfo {padding:80px 0; background:#f4f4f4; color:#000; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px;}
        .evtInfoBox ul {margin-bottom:30px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="sky"  id="QuickMenu">
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2420_sky.jpg" alt="이중희 티패스">
            </a>
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2420_top.jpg" alt="소방학 이중희"/>                
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2420_01.jpg" alt="20년 경력"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2420_02.jpg" alt="합격 커리큘럼"/>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up" id="evt04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2420_04.jpg" alt="티패스 수강신청"/>
                <a href="javascript:go_PassLecture('189179')" title=""수강신청 style="position: absolute; left: 71.43%; top: 72.46%; width: 15.36%; height: 8.25%; z-index: 2;"></a>
            </div>
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful" class="infotxt">이용안내확인하기 ↓</a>
            </div> 
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2420_03.jpg" alt="결제하기"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>    
        
        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">이용안내 및 유의사항</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
					<li>제공과정 : 2022 소방직 대비 이중희 소방학/소방관계법규 전 과정</li>
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

            var url = '{{ site_url('/periodPackage/show/cate/3028/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>

@stop