@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .Container {
            width:100% !important;
            min-width:1210px !important;
            background:#fff;
            padding:0 !important;
            background:#fff;
            text-align:center;
        }
        
        .evt_06 {background:#F6F6F6;padding-bottom:125px;}
        .evt_06 .tabBox {position:relative; width:940px; margin:0 auto;}
        .evt_06 .tab li {display:inline; float:left; width:50%;border:1px solid #1a1a1a;}
        .evt_06 .tab li a {display:block; text-align:center; font-size:22px; font-weight:600; background:#fff; color:#000; height:60px; line-height:60px; margin-right:1px}
        .evt_06 .tab li a:hover,
        .evt_06 .tab li a.active {background:#9b1f29; color:#fff;}
        .evt_06 .tab li:last-child a {margin:0}
        .evt_06 .tab:after {content:""; display:block; clear:both}

    </style>    

    <div id="Container" class="Container gosi NGR c_both">

        <div class="Menu widthAuto NGR c_both">
                @include('willbes.pc.layouts.partial.site_menu')
        </div>

        <div class="evt_06">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/3103_06.jpg" style="width:940px;" />       
            <div class="tabBox">
                <ul class="tab">
                    <li><a href="#tab04" class="active">모의평가 전(2020년 10월~11월)</a></li>
                    <li><a href="#tab05">모의평가 후(2021년 1월~6월)</a></li>
                </ul>
                <div id="tab04" style="padding-top:40px;">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/3103_tab2_c1.png" alt="" style="width:940px;">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/3103_tab2_c2.png" alt="" style="padding-top:40px;width:940px;">
                </div>
                <div id="tab05" style="padding-top:40px;">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/3103_tab2_c3.png" alt="" style="width:940px;">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/3103_tab2_c4.png" alt="" style="padding-top:40px;width:940px;">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/3103_tab2_c5.png" alt="" style="padding-top:40px;width:940px;">
                </div>
            </div>
        </div> 

    </div>

    <!-- End Container -->
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tab').each(function(){
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
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop