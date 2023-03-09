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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}*/

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/03/2918_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#000}

    </style>

    <div class="evtContent NSK mb100">

        <div class="sky" id="QuickMenu">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2023/03/2918_sky.png" alt="소문내봄"></a>
            <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2023/03/2918_sky2.png" alt="알려봄"></a>                 
        </div>

        <div class="evtCtnsBox evtTop" data-aos="flip-down">        
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2918_top.jpg" title="적중은 윌비스 경찰팀">    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2918_01.jpg" title="교수진">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up" id="evt_01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2918_02.jpg" title="적중문제를 소문내봄">
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운로드" style="position: absolute;left: 56.84%;top: 69.55%;width: 29.98%;height: 5.65%;z-index: 2;"></a> 
            </div>     
        </div>

        {{--홍보url댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox evt03" data-aos="fade-up" id="evt_02">       
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2918_03.jpg" title="적중문제를 알려봄">              
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif 
                        
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