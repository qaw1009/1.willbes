@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/ 


        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/07/2722_top_bg.jpg) no-repeat center top;}

        .evt01 {width:800px; margin:50px auto 100px; font-size:20px; line-height:1.3;}
        .evt01 div {padding:20px 0; text-align:left; border-bottom:1px solid #d4d4d4; position:relative; color:#737373}
        .evt01 p {font-size:22px}
        .evt01 p strong {color:#000}
        .evt01 a {padding:5px 15px; border-radius:10px; background:#00997f; color:#fff; position:absolute; right:0; top:25px; font-size:20px;}
        .evt01 a:hover {background:#000}


        /************************************************************/      
    </style> 

    <div class="evtContent NSK" id="evtContainer">
		<div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2722_top.jpg" alt="김동진 법원팀" />
		</div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2722_01.jpg" alt="김동진 법원팀" />
		</div>        

        <div class="evt01" data-aos="fade-left">
            <div>
                <p>2023 대비 <strong>법원직 동행6기 전체설명회</strong></p>
                진행 : 김동진 교수
                <a href="javascript:fnPlayerSample('181196', '1305141', 'HD');">바로가기 👉</a>
            </div>
            <div>
                <p>2023 대비 <strong>법원직 동행6기 생활규칙안내</strong></p>
                진행 : 문형석 교수
                <a href="javascript:fnPlayerSample('181196', '1305141', 'HD');">바로가기 👉</a>
            </div>
            <div>
                <p>2023 대비 <strong>법원직 민법 커리큘럼안내</strong></p>
                진행 : 김동진 교수
                <a href="javascript:fnPlayerSample('181196', '1305141', 'HD');">바로가기 👉</a>
            </div>
            <div>
                <p>2023 대비 <strong>법원직 민사소송법 커리큘럼안내</strong></p>
                진행 : 이덕훈 교수
                <a href="javascript:fnPlayerSample('181196', '1305141', 'HD');">바로가기 👉</a>
            </div>
            <div>
                <p>2023 대비 <strong>법원직 형법 커리큘럼안내</strong></p>
                진행 : 이덕훈 교수
                <a href="javascript:fnPlayerSample('181196', '1305141', 'HD');">바로가기 👉</a>
            </div>
            <div>
                <p>2023 대비 <strong>법원직 형사소송법 커리큘럼안내</strong></p>
                진행 : 유안석 교수
                <a href="javascript:fnPlayerSample('181196', '1305141', 'HD');">바로가기 👉</a>
            </div>
            <div>
                <p>2023 대비 <strong>법원직 헌법 커리큘럼안내</strong></p>
                진행 : 이국령 교수
                <a href="javascript:fnPlayerSample('181196', '1305141', 'HD');">바로가기 👉</a>
            </div>
            <div>
                <p>2023 대비 <strong>법원직 국어 커리큘럼안내</strong></p>
                진행 : 박재현 교수
                <a href="javascript:fnPlayerSample('181196', '1305141', 'HD');">바로가기 👉</a>
            </div>
            <div>
                <p>2023 대비 <strong>법원직 영어 커리큘럼안내</strong></p>
                진행 : 박초롱 교수
                <a href="javascript:fnPlayerSample('181196', '1305141', 'HD');">바로가기 👉</a>
            </div>
            <div>
                <p>2023 대비 <strong>법원직 한국사 커리큘럼안내</strong></p>
                진행 : 임진석 교수
                <a href="javascript:fnPlayerSample('181196', '1305141', 'HD');">바로가기 👉</a>
            </div>
		</div>

        <div class="evtCtnsBox evt04" data-aos="fade-right">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2701_04.jpg" alt="절대 만족 후기"/>
                <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute; left: 34.46%; top: 80.45%; width: 30.89%; height: 5.55%; z-index: 2;"></a>
            </div>
		</div>
	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>
@stop