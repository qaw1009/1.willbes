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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/      

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2442_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#f2ca08;}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2442_02_bg.jpg) no-repeat center top;}


        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:14px}
		.evtInfoBox { width:1120px; margin:0 auto; text-align:left; line-height:1.5}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type:none; margin-left:20px; margin-bottom:5px}
        .evtInfoBox li strong{font-weight: bold;}
        .evtInfoBox li strong.red{color:red;}
        .free{color:#e44900;font-size:17px;font-weight:bold;}

        

              
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2442_top.jpg" title="석치수 무료특강">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2442_01.jpg" title="확실한 처방">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2442_02.png" title="올바른 방향설정">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2442_03.jpg" title="진단평가 무료특강">
                <a href="http://naver.me/5CvH8cmy" title="설문조사+정답기입 바로가기" target="_blank" style="position: absolute; left: 16.61%; top: 88.08%; width: 66.34%; height: 5.5%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2442_04_01.jpg" title="석치수 자료해석 진단평가&긴급처방 무료특강">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2442_04_02.jpg" title="오직psat자료해석만을 위한 13년간의 강의">
        </div>

        <!-- <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">특강 정보</h4>
                <div class="infoTit"><strong>● 특강 취지</strong></div>
                <ul>
                    <li>자료해석 풀이 방식에 대한 문제점을 발견하여 해결하고, 자신의 약점에 대한 구체적인 처방을 통해 2022년 7급 공채 <strong>必! 합격을 실현</strong></li>                    
                </ul>  
                <div class="infoTit"><strong>● 문제 구성 방식</strong></div>
                <ul>
                    <li>PSAT 자료해석 빈출 유형으로 구성함을 원칙으로 <strong>본인의 확실한 실력을 확인할 수 있도록 상, 중, 하의 난이도 문제를 모두 포함하여 출제</strong></li>                                    
                </ul>
                <div class="infoTit"><strong>● 수강대상</strong></div>
                <ul>   
                    
                    <li>1. 지금까지 응시한 진단평가에서 <strong>자신의 위치나 약점을 정확하게 확인할 수 없었던 수험생</strong></li>
                    <li>2. 자료해석 공부 방법에 대해 <strong>확실한 가이드라인이 필요한 수험생</strong></li>
                    <li>3. 아무리 공부를 해도 자료해석 <strong>실력이 늘지 않아 불안한 수험생</strong></li>
                    <li>4. 2022년 7급 공채 자료해석 <strong>고득점을 원하는 수험생</strong></li>                       
                </ul>                     
                <div class="infoTit"><strong>● 수강특전</strong></div>
                <ul>   
                    <li class="free">※ 정답기입&설문조사 참여자 무료제공!</li><br>
                    <li>1. 2022년 대비 석치수의 합격하는 <strong>7급 자료해석 기본서(2022년)</strong> 무료제공</li>
                    <li>2. <strong>자료해석 동영상강의 15% 할인쿠폰</strong> 증정</li>
                    <li>3. <strong> 2021년 7급 공채 자료해석 해설</strong> 무료제공</li>
                    <li>4. <strong>2021년 5급 공채 자료해석 해설</strong> 무료제공</li>
                    <li>5. <strong>2021년 민간경력 자료해석 해설</strong> 무료제공</li>
                    <li>6. <strong>긴급처방 25문제 실전모의고사 단권화자료</strong>(복습용) 무료제공</li>
                    <li>7. <strong> 긴급처방 25문제 실전모의고사 해설 + 유사기출 문제</strong> 모음</li>
                    <li>8. 석치수의 합격하는 <strong>주요 개념 확인 노트</strong> 무료제공</li>
                    <li>9. 전체문항 <strong class="red">필기자료</strong> 무료제공</li>
                    <li>10. 석치수의 <strong>합격하는 처방전</strong> 무료제공</li>
                    <li>* 무료 제공 교재는 강사가 직접 구입하여 무료제공됩니다.</li>       
                </ul>                      
            </div>
        </div>-->


	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );


    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop 