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
        .evtCtnsBox .wrap a {border:1px solid #000}

		/************************************************************/ 

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/09/2767_top_bg.jpg) no-repeat center top; background-size:2000px; height:1240px}	
        .evt_top img {position: absolute; top:100px; left:50%; margin-left:-400px}

        .evt_02 {background:#e6e6e6}
        
        .evt_04 {width:1120px; margin:0 auto; padding:100px; text-align:left; font-size:24px; line-height:1.4 }
        .evt_04 li {list-style-type: disc; margin-left:20px; margin-bottom:20px; }
        .evt_04 li div {font-size:20px; color:#666}

        .loadmap {position: relative; /*padding-bottom:56.25%;*/ overflow: hidden; max-width:100%; height:500px; }
        .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}
        
        /************************************************************/

    </style>
    
	<div class="evtContent NSK">
    
		<div class="evtCtnsBox evt_top">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2767_top_img.png" alt="2023 손해평가사 취득 완벽 대비반" data-aos="fade-down"/>
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2767_01.jpg" alt="손해평가사란?" />			  
		</div>     

		<div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2767_02.jpg" alt="10월 7일 개강" />			  
		</div>   


        <div class="evtCtnsBox evt_03">
            <div class="wrap" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2767_03.jpg" alt="손해평가사 학원 수강신청" />			  
                <a href="#none" title="1차 대비 종합반" style="position: absolute; left: 63.39%; top: 66.3%; width: 21.7%; height: 8.79%; z-index: 2;"></a>
                <a href="#none" title="2차 대비 종합반" style="position: absolute; left: 63.39%; top: 76.08%; width: 21.7%; height: 8.79%; z-index: 2;"></a>
                <a href="#none" title="1차 + 2차 대비 종합반" style="position: absolute; left: 63.39%; top: 86.15%; width: 21.7%; height: 8.79%; z-index: 2;"></a>
            </div> 
            <div class="wrap" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2767_04.jpg" alt="손해평가사 동영상 수강신청" />			  
                <a href="#none" title="1차 대비 종합반" style="position: absolute; left: 63.39%; top: 22.75%; width: 21.79%; height: 19.08%;  z-index: 2;"></a>
                <a href="#none" title="2차 대비 종합반" style="position: absolute; left: 63.39%; top: 44.84%; width: 21.79%; height: 19.08%;  z-index: 2;"></a>
                <a href="#none" title="1차 + 2차 대비 종합반" style="position: absolute; left: 63.39%; top: 67.19%; width: 21.79%; height: 19.08%;  z-index: 2;"></a>
            </div>            
		</div> 

        <div class="loadmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2238.5189534842293!2d126.72321452519192!3d37.49037028993977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b7c45f64466a5%3A0x41ad2be6af1f3f59!2zKOyjvCnsnIzruYTsiqTqs7XrrLTsm5Dqsr3ssLDtlZnsm5A!5e0!3m2!1sko!2skr!4v1662530065277!5m2!1sko!2skr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>   

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
			<ul>
                <li>
                    주소
                    <div>인천 부평구 경원대로 1385 부평일번가 11층(부평지하상가 13번 출구)</div>
                </li>
                <li>
                    수강상담
                    <div>1544-1661 / 032-508-0020</div>
                </li>
            </ul>	  
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
    

@stop