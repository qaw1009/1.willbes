@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:30px}

        /************************************************************/
        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:200px; right:10px; width:148px; z-index:10;}
        .sky a {display:block; margin-bottom:5px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2334_top_bg.jpg) no-repeat center top;}

        .evt01 {border-top:10px solid #2ed462}

        .evt03 {background:#00b6d4; padding-bottom:150px} 
        .evt04 {background:#008f13; padding-bottom:150px} 
        .proLecList .tx-red {color:#fff !important}
    </style> 

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#evt03"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2334_sky1.png" alt="단과반" >
            </a>   
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2334_sky2.png" alt="종합반" >
            </a>          
        </div> 


        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" alt="경찰학원부분 1위" data-aos="fade-right"/>
        </div>              

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2334_top.gif" alt="심화이론반" data-aos="fade-left">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2334_01.jpg" alt="" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2334_02.jpg"  alt="" data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2334_03.jpg"  alt="" data-aos="fade-right"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif             
        </div>

        <div class="evtCtnsBox evt04" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2334_04.jpg"  alt="" data-aos="fade-left"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif 
        </div>

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

@stop