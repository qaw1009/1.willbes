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
        /************************************************************/
        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:200px;right:10px; width:120px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:#f9f0dc}
        .evtTop .evtTab {width:1120px; position:absolute; bottom:-5px; left:50%; margin-left:-560px}
        .evtTab li {display:inline; float:left; width:50%}
        .evtTab li a {display:block; background:#000; color:#939393; font-size:24px; height:65px; line-height:65px; text-align:center; margin-top:5px}
        .evtTab li a.active {background:#fff; color:#000; border:5px solid #000; border-bottom:0; height:70px; line-height:65px; margin:0}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:30px}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/08/2324_02_bg.jpg) no-repeat center top; position:relative; height:1183px}

        .evt03 {width:1120px; margin:0 auto 100px;} 
        .evt03 h4 {font-size:60px}
        .evt03 h4 span {color:#723d21; vertical-align: top;}
        .evt03 .title {text-align:left; font-size:24px; margin:100px auto 30px; font-weight:bold}
        .evt03 .title span {vertical-align:top; color:#ed0000;}
    </style> 

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            {{--
            <a href="#evt03"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2324_sky1.png" alt="학원강좌" >
            </a>  
            --}}
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2330" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2324_sky2.png" alt="경찰pass" >
            </a>          
        </div> 


        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" alt="경찰학원부분 1위" data-aos="fade-right"/>
        </div>              

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2324_top.jpg" alt="9월 추천강좌" data-aos="fade-left">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2324_01.jpg" alt="" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2324_02.jpg"  alt=""   data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
            <h4 class="NSK-Black"><span>9월</span> 추천 강좌</h4>
            <div class="title">2022대비 온라인  <span>기본이론</span> 신청 ></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 

            <div class="title">2022대비 온라인 <span>심화이론</span> 신청 ></div>
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