@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')

    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

    /*****************************************************************/ 
    
    .evt_top {background:#5F5DFF;}

    </style>

    <div class="evtContent NGR" id="evtContainer"> 

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1929_top.jpg" alt="" usemap="#Map1929a" border="0">
            <map name="Map1929a" id="Map1929a">
                <area shape="rect" coords="54,825,320,931" href="https://www.instagram.com/p/CIPp9TZHwUy/" target="_blank" />
                <area shape="rect" coords="393,825,658,932" href="https://pf.kakao.com/_tUSRK/60893015" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1929_01.jpg" alt="">
        </div>
        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif                      

    </div>
    <!-- End Container --> 
    <link rel="stylesheet" type="text/css" href="/public/vendor/jquery/slick/slick.css">
    <script src="/public/vendor/jquery/slick/jquery.slick.min.js"></script>
    <script type="text/javascript">
      
    </script>   

@stop