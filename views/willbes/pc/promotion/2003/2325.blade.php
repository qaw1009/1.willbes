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
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5); border-radius:10px}

        /************************************************************/

        .sky {position:fixed;top:200px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2325_top_bg.jpg) no-repeat center top;} 
        .evtTop span {position:absolute; left:50%; width:227px; top:483px; margin-left:-690px; z-index:1}

        .evt02 {background:#585858}

        .evt04 {background:#f5f5f5}

        .evt05 {padding:100px 0; width:1120px; margin:0 auto}
        .evt05 .sTitle {margin:100px 0 30px; font-size:20px; text-align:left; color:#464646}


        .evtInfo {padding:80px 0; background:#e1e3e3; color:#000; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px;}
        .evtInfoBox ul {margin-bottom:30px}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        {{--
        <div class="sky" id="QuickMenu">
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_sky01.jpg" alt="무료수강권">
            </a>
        </div>
        --}}

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_top.jpg" alt="인적성검사"/>
            <span data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_top_img.png" alt=""/>
            </span>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_01.jpg" alt="인적성검사는 왜 따로 준비해야할까요?"  data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_02.jpg" alt="인적성검사를 선택해야하는 이유" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_03.jpg" alt="어떤 것을 평가하나요?" data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_04.jpg" alt="세부 결과 제공" data-aos="fade-right"/>   
        </div> 
        
        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_05.jpg" alt="온라인 수강 신청"/>
            <div class="sTitle NSK-Black">인·적성역량(PCA)검사</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <div class="sTitle NSK-Black">인·적성검사</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
            <div class="sTitle NSK-Black">인·적성Lite검사</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
            @endif
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">윌비스 소방공무원 인·적성검사 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
					<li>본 상품은 소방공무원 필기 시험 합격 후 진행하는 채용절차 중 [인·적성검사]에 대비할 수 있는 과정입니다.</li> 
                    <li>1) 윌비스_소방 인적성역량(PCA)검사 [적성 난이도별 1~4단계]<br>
                        - 검사 구성  : 2문 선택형, 4문 리커트, 4문 선택형, (적성) 4지 선다형<br>
                        - 문항수 : 인성역량검사  300문제, 적성검사 40문제<br>
                        - 시험시간 : 인성영량 50분, 적성검사 50분<br>
                        - 검사 평가통계 : 인성 7항목, 역량 4항목, 회복탄력도 4항목, 적성 4항목<br><br>
                    2) 윌비스_소방 인적성검사_[적성 난이도별 1~4단계]<br>
                        - 문항수 : 인성검사 200문제, 적성검사 40문제<br>
                        - 시험시간 : 인성검사 30분, 적성 50분<br>
                        - 검사구분 : 2문 선택형, 4문 리커트, (적성)4지 선다형<br>
                        - 평가통계 : 인성통합 7항목 , 적성 4항목<br><br>
                    3) 윌비스_인적성Lite검사 [적성 난이도별 1~4단계]<br>
                        - 문항수 : 인성 120문제, 적성 40문제<br>
                        - 시험시간 : 인성 15분, 적성 50분<br>
                        - 검사구분 : 2문 선택형, 4문 리커트, (적성)4지 선다형<br>
                        - 평가통계 : 인성통합 7항목 , 적성 4항목<br><br>
                    * 난이도순으로 1~4단계 응시 가능하며, 상품 선택 후 신청하여 수강해주시면 됩니다.</li>                     
                </ul>
                <div class="infoTit"><strong>응시방법</strong></div>
				<ul>
					<li>소개 페이지에서 수강하고자 하는 상품 우측의 가격 옆 체크박스에 체크한 후, [장바구니] 혹은 [바로결제] 버튼을 눌러 결제 화면으로 이동합니다.</li> 
                    <li>주문상품정보를 확인 후 [개인정보 활용 및 환불정책 안내]에 동의하신 후 [결제하기] 버튼을 눌러 유료 결제를 진행합니다.<br>
                    (수강시작일 설정은 불가능하며, 최초 검사 후 7일 이내 결과를 확인하셔야 합니다.)</li> 
                    <li>사이트 우측 상단 [내강의실]에 접속 후 내강의실 세부 메뉴 아래의 [윌비스 인적성(PCA)검사 GO>] 버튼을 눌러 인적성검사 메뉴에 진입합니다.</li> 
                    <li>응시하고자 하는 검사명을 클릭 후 검사를 진행합니다.<br> 
                    (마우스커서가 검사화면을 벗어나거나 검사 팝업창이 비활성화되는 경우에는 검사가 중지되거나 리셋될 수 있으므로 유의바랍니다.)</li> 
                    <li>검사완료 후 검사 팝업창 우측 상단의 X버튼을 눌러 검사창을 종료해주시고 F5 버튼을 눌러 새로고침한 뒤 [결과보기] 버튼을 눌러 응시한 검사의 결과를 확인할 수 있습니다.</li>       
				</ul>
				<div class="infoTit"><strong>성향검사 시 유의사항</strong></div>
				<ul>
					<li>인성검사는 본인의 생각, 행동에 대해 솔직하고 일관되게 응답해야 합니다. 거짓 응답할 경우 신뢰도가 낮게 나타나 불리한 판정이 나올 수 있습니다.</li>
                    <li>검사 중 뒤로가기 기능은 불가능합니다.</li>
                    <li>시간 만료로 검사를 완료하지 못하여 강제 종료될 경우, 검사결과는 정상 처리됩니다.</li>
                    <li>답안 제출 완료 후 재응시는 불가능합니다.</li>       
				</ul>
                <div class="infoTit"><strong>시스템 유의사항</strong></div>
				<ul>
					<li>무선인터넷(Wi-Fi) 환경에서는 검사가 불안정하오니 유선인터넷을 이용하시기 바랍니다.</li>
                    <li>본 검사는 Windows, Mac PC에서만 실행 가능합니다. (타 OS 리눅스에서 불가능)</li>
                    <li>검사 중 마우스가 검사 화면을 벗어날 경우 파란색 경고창이 나타납니다.</li>
                    <li>로그인 후 "이 웹페이지에서 클립보드에 엑세스 할 수 있도록 허용하시겠습니까?"라는 알림창이 나타나면 엑세스 허용을 클릭하시기 바랍니다("허용 안 함"을 누르면 검사진행불가).<br><br>
                        ※ 알림창이 나타나지 않고 흰 화면만 보일 경우, 해결방안 매뉴얼 <a href="https://willbes.canwe.co.kr/exam/test_error.pdf" target="_blank" class="tx-red">
CLICK</a></li>                    				
				</ul>
				
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
@stop