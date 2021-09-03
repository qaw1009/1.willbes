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

        /************************************************************/
        .evttop {background:#DC7BC8;}
        .evt01 {background:#742C80;}            
        .evt02 {background:#fff;}        
        .evt03 {background:#5C656E;}  
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evttop">           
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1913_top.jpg" title="" data-aos="fade-right">   
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1913_01.jpg" title="" data-aos="fade-left">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1913_02.jpg" title="" data-aos="fade-right">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1913_03.jpg" usemap="#Map1913a" title="" border="0" data-aos="fade-right">
            <map name="Map1913a" id="Map1913a">
                <area shape="rect" coords="754,838,967,923" href="https://pass.willbes.net/package/show/cate/3024/pack/648001/prod-code/174675" target="_blank" />
            </map>
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