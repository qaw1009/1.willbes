@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
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

        .evt_top {background:#39056A url(https://static.willbes.net/public/images/promotion/2022/08/1916_top_bg.jpg) no-repeat center top;}	
        
        .evt_01 {background:#343434; height:1500px}	
        .evt_01 .img01 {position:absolute; top:-350px; left:50%; margin-left:200px; z-index: 1;}
        .evt_01 .img02 {position:absolute; top:120px; left:50%; margin-left:-510px; z-index: 2;}
        .evt_02 {background:#2a2726}	


        /************************************************************/      
    </style> 
	<div class="evtContent NSK" id="evtContainer">
		<div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/1916_top.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/1916_01_01.png" alt="" class="img01" data-aos="fade-left"/>
            <img src="https://static.willbes.net/public/images/promotion/2022/08/1916_01_02.png" alt="" class="img02" data-aos="fade-right"/>
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/1916_02.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/1916_03.jpg" alt="" />
                <a href="https://gosi.willbes.net/package/show/cate/3094/pack/648002/prod-code/200730" title="예비순환" style="position: absolute; left: 58.75%; top: 38.35%; width: 32.14%; height: 8.23%; z-index: 2;"></a>
                <a href="https://gosi.willbes.net/package/show/cate/3094/pack/648002/prod-code/200731" title="GS1순환" style="position: absolute; left: 58.75%; top: 55.2%; width: 32.14%; height: 8.23%; z-index: 2;"></a>
                <a href="https://gosi.willbes.net/package/show/cate/3094/pack/648002/prod-code/200732" title="예비+GS1" style="position: absolute; left: 58.75%; top: 72.35%; width: 32.14%; height: 8.23%; z-index: 2;"></a>
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
@stop