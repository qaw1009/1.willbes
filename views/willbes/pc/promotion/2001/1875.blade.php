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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto;}

        /************************************************************/
        .wb_top {background:#00040F url(https://static.willbes.net/public/images/promotion/2020/10/1875_top_bg.jpg) no-repeat center top;}

        .wb_01 {position:relative;}
        .youtube {position:absolute; top:365px; left:50%;z-index:1;margin-left:-412px}
        .youtube iframe {width:820px; height:460px;}

    </style> 

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1875_top.jpg" alt="철연미천"/>            
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1875_01.jpg" alt="다짐 유튜브"/>    
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/GG7f25Umjaw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>        
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1875_02.jpg" alt="나의 다짐"/>            
        </div> 

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif    
        
    </div>
    <!-- End Container -->
    <script type="text/javascript"> 

    </script>
    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop