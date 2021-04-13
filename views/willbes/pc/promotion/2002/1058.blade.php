@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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

        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1058_top_bg.jpg) center center}
        .wb_02 {background:#5e62f7}
        .wb_03 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1058_02_bg.jpg) center center}
        .wb_04 {background:#fff;}
        .wb_05 {background:#e3e3e3}
        .wb_06 {background:#fff}
        .wb_07 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1058_07_bg.jpg) center center}

        .tabsEvt {width:980px; margin:0 auto}
        .tabsEvt li {display:inline; float:left; width:33.33333%}
        .tabsEvt a {display:block; margin-right:1px; background:#646464; color:#fff; padding:20px 0; font-size:30px; text-align:center}
        .tabsEvt a:hover,
        .tabsEvt a.active {background:#5e62f7;}
        .tabsEvt li:last-child a {margin:0}
        .tabsEvt:after {content:""; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_01" id="top">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1058_top.jpg"/>
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1058_01.jpg"/>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1058_02_01.jpg"/><br>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1058_02_02.jpg"/><br>
            <div class="pt80"><img src="https://static.willbes.net/public/images/promotion/2021/04/1058_02_04.jpg"/></div>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1058_02_03.jpg"/>
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1058_04.jpg"/>
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1058_05.jpg"/>
            <ul class="tabsEvt NSK-Black">
                <li><a href="#tab2">합습수기 #1</a></li>
                <li><a href="#tab1">합습수기 #2</a></li>
                <li><a href="#tab3">합습수기 #3</a></li>
            </ul>
            <div id="tab2"><img src="https://static.willbes.net/public/images/promotion/2020/09/1058_05_01.jpg" title="수기1"></div>
            <div id="tab1"><img src="https://static.willbes.net/public/images/promotion/2020/09/1058_05_02.jpg" title="수기2"></div>
            <div id="tab3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1058_05_03.jpg" title="수기3"></div>
        </div>

        <div class="evtCtnsBox wb_06">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1058_06.jpg"/>
        </div>

        <div class="evtCtnsBox wb_07">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1058_07.jpg"/>
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

@stop