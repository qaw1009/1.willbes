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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_01 {background:url(http://file3.willbes.net/new_gosi/2018/03/180323_bs_01_bg.png) center center}
        .wb_02 {background:#5e62f7}
        .wb_03 {background:url(http://file3.willbes.net/new_gosi/2018/08/180828_03_bg.png) center center}
        .wb_04 {background:#fff;}
        .wb_05 {background:#e3e3e3}
        .wb_06 {background:#fff}
        .wb_07 {background:url(http://file3.willbes.net/new_gosi/2018/08/180828_07_bg.png) center center}

        .tabsEvt {width:1210px; margin:0 auto}
        .tabsEvt li {display:inline; float:left;}
        .tabsEvt a {display:block; margin:0 auto}
        .tabsEvt a img.off{display:block}
        .tabsEvt a img.on{display:none}
        .tabsEvt a.active img.off{display:none}
        .tabsEvt a.active img.on{display:block}
        .tabsEvt:after {content:""; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_01" id="top">
            <img src="http://file3.willbes.net/new_gosi/2018/03/180323_bs_01.png"/>
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="http://file3.willbes.net/new_gosi/2018/03/180323_bs_02.png"/>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="http://file3.willbes.net/new_gosi/2018/08/180828_03.png"/>
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="http://file3.willbes.net/new_gosi/2018/08/180828_04.png"/>
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="http://file3.willbes.net/new_gosi/2018/08/180828_05.png"/>
            <ul class="tabsEvt">
                <li><a href="#tab2"><img src="http://file3.willbes.net/new_gosi/2018/08/180828_05_t_1.png" class="off"/><img src="http://file3.willbes.net/new_gosi/2018/08/180828_05_t_1_1.png" class="on"/></a></li>
                <li><a href="#tab1"><img src="http://file3.willbes.net/new_gosi/2018/08/180828_05_t_2.png" class="off"/><img src="http://file3.willbes.net/new_gosi/2018/08/180828_05_t_2_1.png" class="on"/></a></li>
                <li><a href="#tab3"><img src="http://file3.willbes.net/new_gosi/2018/08/180828_05_t_3.png" class="off"/><img src="http://file3.willbes.net/new_gosi/2018/08/180828_05_t_3_1.png" class="on"/></a></li>
            </ul>
            <div id="tab2"><img src="http://file3.willbes.net/new_gosi/2018/08/180828_05_s_01.png" title="수기1"></div>
            <div id="tab1"><img src="http://file3.willbes.net/new_gosi/2018/08/180828_05_s_02.png" title="수기2"></div>
            <div id="tab3"><img src="http://file3.willbes.net/new_gosi/2018/08/180828_05_s_03.png" title="수기3"></div>
        </div>

        <div class="evtCtnsBox wb_06">
            <img src="http://file3.willbes.net/new_gosi/2018/08/180828_06.png"/>
        </div>

        <div class="evtCtnsBox wb_07">
            <img src="http://file3.willbes.net/new_gosi/2018/08/180828_07.png"/>
        </div>

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function(){
            $('ul.tabsEvt').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        );
    </script>

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
        });
    </script>
@stop