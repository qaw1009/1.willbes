@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /************************************************************/

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2445_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#0555c6}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2445_02_bg.jpg) no-repeat center top; border-bottom:1px solid #666}
        .evt03 {background:#043e90}      


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/12/2445_top.jpg" alt="퀵 서머리 한정판매"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2445_01.jpg" alt="퀵 서머리 한정판매"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2445_02.jpg" alt="퀵 서머리 한정판매"/>
        </div>

        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2445_03.jpg" alt="퀵 서머리 한정판매"/>
        </div>
    </div>
    <!-- End Container -->


@stop