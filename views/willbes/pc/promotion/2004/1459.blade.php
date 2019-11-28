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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        /************************************************************/
        
        .skybanner {position:fixed; top:200px; right:0; z-index:1;}

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2019/11/1459_top_bg.jpg") no-repeat center top}
        .evt01 {background:#fff; padding:150px 0 0}
        .evt01 .tab {width:920px; margin:0 auto;}
        .evt01 .tab li {
            display:inline; float:left; width:50%;
        }
        .evt01 .tab li a {
            display:block; padding:15px; text-align:center; color:#b7b7b7; background:#ededed; font-size:30px; font-weight:bold;
            border:3px solid #ededed; border-bottom:3px solid #bcae8e;
        }
        .evt01 .tab li a.active,
        .evt01 .tab li a:hover {
            color:#b39d6c; background:#fff;
            border:3px solid #b39d6c; border-bottom:3px solid #fff;
        }
        .evt02 {background:#efefef;}
        .evt03 {background:#fff;}
    </style>
    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1459_sky.jpg" usemap="#Map1459B" border="0" />
            <map name="Map1459B" id="Map1459B">
                <area shape="rect" coords="24,200,166,300" href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=477" target="_blank" alt="소방" />
                <area shape="rect" coords="26,314,166,424" href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=476&amp;" target="_blank" alt="군무원" />
            </map>
        </div>

        <div class="evtCtnsBox evtTop">           
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1459_top.jpg" title="소방/군무원 FREE ONE-WEEK">
        </div>   

        <div class="evtCtnsBox evt01">
            <ul class="tab">
                <li><a href="#tab01">불꽃소방</a></li>
                <li><a href="#tab02">군무원</a></li>
            </ul>
            <div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1459_01_01.jpg" title="소방 스케줄">
            </div>
            <div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1459_01_02.jpg" title="군무원 스케줄">
            </div>
        </div>   

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1459_02.jpg" usemap="#Map1459a" title="수강신청" border="0">
            <map name="Map1459a" id="Map1459a">
                <area shape="rect" coords="131,745,454,825" href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=477" target="_blank" alt="불꽃소방 신청하기" />
                <area shape="rect" coords="664,745,986,824" href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=476" target="_blank" alt="군무원 신청하기" />
            </map>
        </div> 
        
        <div class="evtCtnsBox evt03">           
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1459_03.jpg" title="학원 위치">
        </div> 
    </div>
    <!-- End Container -->

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
@stop