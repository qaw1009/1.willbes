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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/ 
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/10/2794_top_bg.jpg) no-repeat center top; height:1003px}
        .evtTop p {font-size:70px; position: absolute; width:1000px; left:50%; margin-left:-500px; bottom:100px; color:#fff; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite; letter-spacing:-1px; text-align:center; z-index: 1;}
        @@keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }
        @@-webkit-keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }

        .evt01 {background:#fff}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2022/10/2794_02_bg.jpg) no-repeat center top;}

        .evt03 {background:#F2F2F2}

        .evt05 {background:#efefef}

        .evt06 {padding:100px 0}
        .evt06 .buylec {width:1000px; margin:0 auto; font-size:24px; line-height:1.5;}
        .evt06 .buylec p {font-size:58px; margin-bottom:30px}
        .evt06 .buylec span {color:#484baf}
        .evt06 .buylec div {display:flex; justify-content: center; }
        .evt06 .buylec a {height:100%; width:40%; text-align:center; display:block; font-size:26px; font-weight:bold; color:#fff; background:#555edf; margin:0 10px; padding:20px; border-radius:10px}
        .evt06 .buylec a:last-child {background:#792886}
        .evt06 .buylec2 span {color:#cf3c3c}
        .evt06 .buylec2 a {background:#0dabbe}
        .evt06 .buylec2 a:last-child {background:#cf3c3c}
        .evt06 .buylec a:hover {background:#000}
    </style> 

	<div class="evtContent NSK">

		<div class="evtCtnsBox evtTop" data-aos="fade-up">
            <p class="NSK-Black">"선착순 150명 마감"</p>
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2794_01.jpg" alt="실강 단과반 전격 개설 합격이벤트" />   
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2794_02.jpg" alt="특전" />   
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2794_03.jpg" alt="10.17(월)부터 실강 진행" />   
		</div>

        <div class="evtCtnsBox evt04" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2794_04.jpg" alt="강의특징" /> 
		</div>

        <div class="evtCtnsBox evt05" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2794_05.jpg" alt="교수진" /> 
		</div>

        <div class="evtCtnsBox evt06" data-aos="fade-left">
            <div class="buylec">
                합격을 위한 이유 있는 선택!
                <p class="NSK-Black">MAIN <span>PSAT</span> CLASS <span>기본이론강의</span></p>
                <div>
                    <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3143&course_idx=1427" target="_blank">학원 실강 수강신청 ></a>
                    <a href="https://pass.willbes.net/lecture/index/cate/3103/pattern/only?search_order=regist&subject_idx=&course_idx=1364&school_year=2022" target="_blank">동영상 강의 수강신청 ></a>
                </div>
            </div>
            <div class="buylec buylec2 mt100">
                시작부터 끝까지 최고와 함께!
                <p class="NSK-Black">Perfect <span>PSAT</span> Program <span>PASS</span></p>
                <div>
                    <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3143" target="_blank">학원 실강 수강신청 ></a>
                    <a href="https://pass.willbes.net/Package/index/cate/3103/pack/648001" target="_blank">동영상 강의 수강신청 ></a>
                </div>
            </div>
		</div>

	</div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop