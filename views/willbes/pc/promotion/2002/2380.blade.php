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

        .sky {position:fixed;top:175px; right:10px; z-index:1;}
        .sky a {display:block; margin-bottom:10px}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/10/2380_top_bg.jpg) no-repeat center;}

        .wb_01,.wb_02,.wb_03 {background:#eee;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2370" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2380_sky01.png" alt="온라인 추천강좌" >
            </a>
            <a href="#evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2380_sky02.png" alt="2차대비 추천강좌" >
            </a>
            <a href="#evt02">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2380_sky03.png" alt="1차대비 추천강좌" >
            </a>            
        </div>    

        <div class="evtCtnsBox wb_police" >
			<img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="경찰학원부문 1위" />
		</div>

        <div class="evtCtnsBox wb_top">
			<img src="https://static.willbes.net/public/images/promotion/2021/10/2380_top.jpg"  alt="이달의 추천강좌" data-aos="fade-left"/>
		</div>

        <div class="evtCtnsBox wb_01" id="evt01">
			<img src="https://static.willbes.net/public/images/promotion/2021/10/2380_01.jpg"  alt="10개월 슈퍼패스" data-aos="fade-right"/>
		</div>

        <div class="evtCtnsBox wb_02">
			<img src="https://static.willbes.net/public/images/promotion/2021/10/2380_02.jpg"  alt="2차 대비 합격 커리큘럼" data-aos="fade-left"/>
		</div>

        <div class="evtCtnsBox wb_03">
            <div class="wrap">
			    <img src="https://static.willbes.net/public/images/promotion/2021/10/2380_03.jpg"  alt="10개월 슈퍼패스" data-aos="fade-right"/>
                <a href="https://police.willbes.net/pass/offPackage/show/prod-code/186105" target="_blank" title="" style="position: absolute;left: 16.51%;top: 55.2%;width: 10%;height: 3.63%;z-index: 2;"></a>	
                <a href="https://police.willbes.net/pass/offPackage/show/prod-code/186107" target="_blank" title="" style="position: absolute;left: 45.01%;top: 55.2%;width: 10%;height: 3.63%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/show/prod-code/186109" target="_blank" title="" style="position: absolute;left: 72.71%;top: 55.2%;width: 10%;height: 3.63%;z-index: 2;"></a>
            </div>    	
		</div>

        <div class="evtCtnsBox wb_04" id="evt02">
			<img src="https://static.willbes.net/public/images/promotion/2021/10/2380_04.jpg"  alt="4개월 슈퍼패스" data-aos="fade-left"/>
		</div>

        <div class="evtCtnsBox wb_05">
			<img src="https://static.willbes.net/public/images/promotion/2021/10/2380_05.jpg"  alt="1차 대비 합격 커리큘럼" data-aos="fade-right"/>
		</div>

        <div class="evtCtnsBox wb_06">
            <div class="wrap">
			    <img src="https://static.willbes.net/public/images/promotion/2021/10/2380_06.jpg"  alt="슈퍼패스" data-aos="fade-left"/>
                <a href="https://police.willbes.net/pass/offPackage/show/prod-code/186101" target="_blank" title="" style="position: absolute;left: 16.51%;top: 70.2%;width: 10%;height: 5.25%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/show/prod-code/186103" target="_blank" title="" style="position: absolute;left: 45.01%;top: 70.2%;width: 10%;height: 5.25%;z-index: 2;"></a>
            </div>    
		</div>

	</div> 

    <!-- End Container --> 
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script> 
@stop