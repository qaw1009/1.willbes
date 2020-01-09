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
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_top {background:#1d3490 url(https://static.willbes.net/public/images/promotion/2020/01/1510_top_bg.jpg) no-repeat center top;}
        
        .wb_cts01{background:#e9e9ec;position:relative;}
        .gif_area .lecture1{position:absolute;left:50%;top:50%;margin-left:-384px;margin-top:-52.5px;}
        .gif_area img{width:320px;height:235px;}

    </style>
    <div class="p_re evtContent NGR" id="evtContainer">        

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1510_top.gif" alt="한덕현 영어 라이브" usemap="#Map1510a" border="0">
            <map name="Map1510a" id="Map1510a">
                <area shape="rect" coords="176,784,548,870" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158680" target="_blank" />
                <area shape="rect" coords="574,785,947,869" href="#frm_713001" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1510_01.jpg" alt="제니스 영어 라이브"> 
            <div class="gif_area">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1193_01_mv1.gif" class="lecture1" alt="제니스 영어 라이브 gif">
            </div>
        </div>     

        <iframe id="frm_713001" frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/promotion/frameCommentList/713001?'.$arr_base['frame_params'])}}"></iframe>
        <div id="NOTICEPASS" class="willbes-Layer-Black"></div>

        <script type="text/javascript">
            function resizeIframe(iframe) {
                iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
            }
        </script>
                 
    </div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>

@stop