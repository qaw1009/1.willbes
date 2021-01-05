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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2012_top_bg.jpg) no-repeat center;}  

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2012_top.jpg" alt="합격시키겟소"/>
        </div>    

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2012_01.jpg" alt="바라는점"/>
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

      
    </div>
    <!-- End Container -->
  
    
@stop