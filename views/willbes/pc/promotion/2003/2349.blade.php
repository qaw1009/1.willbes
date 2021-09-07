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
        .evttop {background:url("https://static.willbes.net/public/images/promotion/2021/09/2349_top_bg.jpg") no-repeat center top;}
        .evt01 {background:#fff;}            
        .evt02 {background:#b011e1;}        
        .evt03 {background:#fff;}  
        .evt04 {background:#ebebeb}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evttop">           
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2349_top.jpg" title="" data-aos="fade-right">   
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2349_01.jpg" title="" data-aos="fade-left">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2349_02.jpg" title="" data-aos="fade-right">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2349_03.jpg" usemap="#Map1913a" title="" border="0" data-aos="fade-right">
        </div>  
        
        <div class="evtCtnsBox evt04">       
            <div class="wrap" data-aos="fade-up">     
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2349_04.jpg" alt="본인에게 딱 맞는 학습 전략"/>
                <a href="https://pass.willbes.net/package/show/cate/3024/pack/648001/prod-code/185542" title="기본이론" target="_blank" style="position: absolute;left: 22.59%; top: 74.93%; width: 20.36%; height: 5.39%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3024/pack/648001/prod-code/185541" title="심화이론" target="_blank" style="position: absolute;left: 55.89%; top: 74.93%; width: 20.36%; height: 5.39%; z-index: 2;"></a>
            </div>     
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