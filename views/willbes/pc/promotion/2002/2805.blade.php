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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:150px; right:20px; width:140px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .wb_00 {background:#153550}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/10/2805_top_bg.jpg) no-repeat center;}

        .wb_02 {background:#f2f2f2 url(https://static.willbes.net/public/images/promotion/2022/10/2805_02.jpg) no-repeat top; height:1510px}
        .wb_02 p {font-size:40px; margin:150px 0 30px}	 
        .wb_02 p strong {color:#0078d4}       
        .wb_02 p:nth-child(1) {margin-top:0}
        .wb_02 .youtube {width:860px; height:484px; margin:0 auto; padding-top:417px}    
        .wb_02 .youtube iframe {width:860px; height:484px} 
         


        .wb_03 {background:#313131;}    

        .wb_04 {background:#307cc8; padding-bottom:150px} 
        .wb_04 .wrap a {display:block; color:#fff; font-size:40px; background:#0f0c1c; padding:20px 50px; width:60%; margin:0 auto 30px; border-radius:10px}
        .wb_04 .wrap a strong {font-size:120px}
        .wb_04 .wrap a:hover{box-shadow:0 10px 20px rgba(0,0,0,.3); background:#413bbf}
        .wb_04 .wrap p {font-size:40px; color:#fff}
        .wb_04 .wrap p span {font-size:24px; vertical-align:middle}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2022/10/2805_sky01.jpg" title="헌번 실강 T-PASS"></a>    
            <a href="https://police.willbes.net/pass/offinfo/boardInfo/show/78?board_idx=437175&" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/10/2805_sky02.jpg" title="4개월 PASS"></a>              
        </div>

        <div class="evtCtnsBox wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2805_00.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">           
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2805_top.jpg"  alt="헌법실강 T-PASS" />        
		</div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2805_01.jpg"  alt="경찰헌법" />
                <a href="https://police.willbes.net/pass/professor/show/prof-idx/51260?cate_code=3010&subject_idx=2139&subject_name=%ED%97%8C%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29
" title="교수님홈" target="_blank" style="position: absolute; left: 78.93%; top: 82.72%; width: 13.13%; height: 2.63%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/ueqN7v3wgKc?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>                                
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2805_03.jpg"  alt="기본종합반 스케줄"/>
        </div>

        <div class="evtCtnsBox wb_04" id="apply" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2805_04.jpg"  alt="기본종합반"/>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/202087" target="_blank"><strong class="NSK-Black">39</strong>만원 신청하기 ></a>
                <p class="NSK-Black">2022.11.14<span class="NSK">(월)</span> 개강</p>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>


@stop