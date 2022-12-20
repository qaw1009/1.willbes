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

        .sky {position:fixed; top:200px; right:10px; z-index:100;}
        .sky a {display:block; margin-bottom:10px}

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/12/2854_top_bg.jpg) no-repeat center top;}	

        .evt_01 {background:#c9b9a0}
        .evt_02 {background:#ffdd96}    
        
        /************************************************************/

    </style>
    
	<div class="evtContent NSK">
        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2854_top.jpg" alt="불꽃소방 실강 런칭기념 이벤트" />
                <a href="https://pass.willbes.net/pass/consult/visitConsult/index?s_campus=605001" target="_blank" title="" style="position: absolute; left: 27.23%; top: 79.45%; width: 45.09%; height: 7.56%; z-index: 2;"></a>
            </div>
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2854_01.jpg" alt="상담 투어 패키지" />
                <a href="https://pass.willbes.net/pass/consult/visitConsult/index?s_campus=605001" target="_blank" title="" style="position: absolute; left: 27.32%; top: 86.14%; width: 45.09%; height: 6.55%; z-index: 2;"></a>
            </div>			  
		</div>        

		<div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/12/2854_02.jpg" alt="구매자 증정 선물" />		  
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