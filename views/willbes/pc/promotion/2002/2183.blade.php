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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .skybanner {position:fixed; top:200px; width:150px; right:10px; z-index:1;}        
        .skybanner a {display:block; margin-bottom:10px}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2183_top_bg.jpg) no-repeat center;}
        .wb_top > div {position:relative; width:1120px; margin:0 auto}
        .wb_top a:hover {background: rgba(0, 0, 0, 0.3);}

        .wb_01 {background:#08b100;}
        

        .evtInfo {padding:150px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin:20px 0 10px; color:#19ffc3; font-weight:bold}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li { list-style-type: decimal; margin-left:20px; margin-bottom:10px;}
        .evtInfoBox table {margin-bottom:20px; border-top:1px solid #ccc; border-right:1px solid #ccc}
        .evtInfoBox th,
        .evtInfoBox td {padding:10px; text-align:center; border-left:1px solid #ccc; border-bottom:1px solid #ccc}
        .evtInfoBox th {background:#000; color:#fff}
        .evtInfoBox td {background:#444;}       

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#wb_02"><img src="https://static.willbes.net/public/images/promotion/2021/04/2183_sky01.jpg" alt="3법 서포터즈" ></a>
        </div>      
        
        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="신광은 경찰학원" />            
		</div>     

        <div class="evtCtnsBox wb_top">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2183_top.jpg"  alt="3법 서포터즈" />
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="다운로드" style="position: absolute; left: 32.32%; top: 84.73%; width: 35.18%; height: 6.1%; z-index: 2;"></a>
            </div>            
		</div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2021/04/2183_01.jpg"  alt="모집안"/>
		</div>

		<div class="evtCtnsBox wb_02" id="wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2183_02.jpg"  alt="기본완성반 강의 무료"/>       
        </div>      

        <div class="evtCtnsBox evtInfo">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">2022년 개편 대비 <span class="tx-blue">3법 서포터즈</span> 안내사항 및 유의사항</h4>
				<div class="infoTit">3법 서포터즈 안내사항</div>
                <ul>
                    <li>모집기간 : ~5.18(화)</li>
                    <li>모집인원 : 30명 추첨</li>
                    <li>자격요건 : 22년 개편 수업을 통해 경찰관이 되고자하는 누구나</li>
                    <li>신청방법 : 신청서 다운 로드후 <span class="tx-blue">willbespol@naver.com</span> 메일로 전송하기!</li>
                    <li>선발방법 : 서류전형 및 필요에 따라 인터뷰 등 검증절차 진행</li>
                    <li>활동기간 : 선정 후 ~ 강의 종료시까지</li>
                    <li>활동내용 : [경찰관련 커뮤니티 /  개인 블로그 및 SNS 포스팅 및 인증 등] 일일 및 주간 미션 진행 / 세부활동은 추후 공지</li>
                    <li>활동혜택 : 22년 개편 대비 인강 제공 (기본완성반 인강 종합반)</li>
                    <li>서포터즈 발표 : 2021년 5월 21일(금) / 합격자 개별문자 및 연락</li>
                    <li>우수 서포터즈 혜택(추후 공지예정)<br>
                    1) 6/28(월) 개강하는 기본완성기출반 인강 또는 실강 무료(택1)<br>
                    2) 온라인 및 실강 할인 쿠폰(택1)</li>
				</ul>

				<div class="infoTit">3법 서포터즈 유의사항</div>
				<ul>
                    <li>해당 이벤트는 윌비스 신광은경찰 사이트에 가입된 회원만 신청 가능합니다.</li>
                    <li>양식 외의 다른 파일로 신청 접수하거나, 확인할 수 없을 경우엔 선발에서 제외됩니다.<br>
                        (미션이 진행되며 발생하는 후기 및 관련 자료, 미션사항은 모두 윌비스 신광은경찰에 소유권이 있으며, 불법 유포를 금합니다. 또한 진행된 미션에 대한 모든 콘텐츠는 윌비스 신광은경찰의 홍보용으로 사용 될 수 있습니다.)</li>
                    <li>우수 서포터즈 및 체험단은 미션 수행, 성실성 등 내부 기준을 통해 선발합니다.</li>
                    <li>유의사항을 읽지 않고 발생된 상황은 책임지지 않습니다.</li>
                    <li>3법서포터즈 안내문의 : 010-9526-6008 구익현 실장</li>
				</ul>
			</div>
		</div>

	</div>
     <!-- End Container -->
@stop