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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5); border-radius:10px}

        /************************************************************/

        .sky {position:fixed;top:200px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2325_top_bg.jpg) no-repeat center top; height:969px;} 
        .evtTop span {position:absolute; left:50%; width:227px; top:483px; margin-left:-690px; z-index:1}

        .evt02 {background:#585858}

        .evt04 {background:#f5f5f5}

        .evt05 {padding:100px 0; width:1120px; margin:0 auto}
        .evt05 .sTitle {margin:100px 0 30px; font-size:20px; text-align:left; color:#464646}


        .evtInfo {padding:80px 0; background:#fff; color:#000; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px;}
        .evtInfoBox ul {margin-bottom:30px}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        {{--
        <div class="sky" id="QuickMenu">
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_sky01.jpg" alt="무료수강권">
            </a>
        </div>
        --}}

        <div class="evtCtnsBox evtTop">
            <span data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_top_img.png" alt="인적성검사"/>
            </span>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_01.jpg" alt="인적성검사는 왜 따로 준비해야할까요?"  data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_02.jpg" alt="인적성검사를 선택해야하는 이유" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_03.jpg" alt="어떤 것을 평가하나요?" data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_04.jpg" alt="세부 결과 제공" data-aos="fade-right"/>   
        </div> 
        
        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2325_05.jpg" alt="온라인 수강 신청"/>
            <div class="sTitle NSK-Black">인·적성역량(PCA)검사</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <div class="sTitle NSK-Black">인·적성검사</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
            <div class="sTitle NSK-Black">인·적성Lite검사</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
            @endif
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