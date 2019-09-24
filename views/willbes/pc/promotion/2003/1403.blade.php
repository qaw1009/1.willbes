@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_main {background:url(https://static.willbes.net/public/images/promotion/2019/09/1403_top_bg.jpg) no-repeat center top;}
        .wb01 {background:#ececec;}
        .wb02 {background:#fff;}
   
    </style>

    <div class="evtContent NGR" id="evtContainer">     
        
        <div class="evtCtnsBox wb_main">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1403_top.jpg"  alt="오태진이 떴다!"  />
        </div>

        <div class="evtCtnsBox wb01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1403_01.jpg"  alt="방송 출연" />
        </div>

        <div class="evtCtnsBox wb02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1403_02.jpg"  alt="기대평" >

            <iframe id="frm_713001" frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/promotion/frameCommentList/713001?'.$arr_base['frame_params'])}}"></iframe>
            <div id="NOTICEPASS" class="willbes-Layer-Black"></div>

            <script type="text/javascript">
                function resizeIframe(iframe) {
                    iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
                }
            </script>

            <img src="https://static.willbes.net/public/images/promotion/2019/09/1403_03.jpg"  alt="소문평" >       
            {{-- 하단 카페 링크 사용여부 --}}
            <iframe frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/promotion/frameCommentList/713002?bottom_cafe_type='.(empty($bottom_cafe_type) === true ? 'Y' : $bottom_cafe_type).'&'.$arr_base['frame_params'])}}"></iframe>
            <div id="NOTICEPASS" class="willbes-Layer-Black"></div>

            <script type="text/javascript">
                function resizeIframe(iframe) {
                    iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
                }
            </script>          
        </div>      

    </div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>
@stop