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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

		/************************************************************/ 

		.skybanner{position: fixed; top: 280px;right:2px;z-index: 1;}	  

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/04/1607_top_bg.jpg) no-repeat center top;}	
		.evt_01 {background:url(https://static.willbes.net/public/images/promotion/2020/04/1607_01_bg.jpg) no-repeat center top;}
        .evt_02 {background:#222d4d;}
        .evt_03 {background:#fff;}
        .evt_04 {background:#f2f2f2; padding-top:100px}
        .evt_04 .tabs {width:1200px; margin:0 auto; border-bottom:2px solid #222d4d}
        .evt_04 .tabs li { display:inline; float:left; width:50%}
        .evt_04 .tabs a {border-bottom:12px solid #f2f2f2; display:block}
        .evt_04 .tabs a.active {border-bottom:12px solid #81dfe2}
        .evt_04 .tabs:after {content:""; display:block; clear:both}
        .evt_04_02,
        .evt_04_04 {background:#fff;}
        .evt_04_03 {background:#81dfe2;}



        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1607_top.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1607_01.jpg" alt="" />
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1607_02.jpg" alt="" />
		</div>    

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1607_03.jpg" alt="" />
        </div>
        
        <div class="evtCtnsBox evt_04">
            <ul class="tabs">
                <li><a href="#tab01"><img src="https://static.willbes.net/public/images/promotion/2020/04/1607_04_tab01.jpg" alt="" /></a></li>
                <li><a href="#tab02"><img src="https://static.willbes.net/public/images/promotion/2020/04/1607_04_tab02.jpg" alt="" /></a></li>
            </ul>
            <div id="tab01">
                <div class="evt_04_01"><img src="https://static.willbes.net/public/images/promotion/2020/04/1607_04_A01.jpg" alt="" /></div>
                <div class="evt_04_02"><img src="https://static.willbes.net/public/images/promotion/2020/04/1607_04_A02.jpg" alt="" /></div>
                <div class="evt_04_03">
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1607_04_A03.jpg" alt="" usemap="#Map1607A" border="0" />
                    <map name="Map1607A" id="Map1607A">
                        <area shape="rect" coords="313,375,803,516" href="#none" onclick="javascript:alert('4/16(목)부터 접수예정.');" />
                    </map>
                    </div>
                <div class="evt_04_04"><img src="https://static.willbes.net/public/images/promotion/2020/04/1607_04_A04.jpg" alt="" /></div>                
            </div>
            <div id="tab02">
                <div class="evt_04_01"><img src="https://static.willbes.net/public/images/promotion/2020/04/1607_04_B01.jpg" alt="" /></div>
                <div class="evt_04_02"><img src="https://static.willbes.net/public/images/promotion/2020/04/1607_04_B02.jpg" alt="" /></div>
                <div class="evt_04_03">
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1607_04_B03.jpg" usemap="#Map1607B" border="0" />
                    <map name="Map1607B" id="Map1607B">
                        <area shape="rect" coords="313,375,803,516" href="#none" onclick="javascript:alert('4/16(목)부터 접수예정.');" />
                    </map>></div>
                <div class="evt_04_04"><img src="https://static.willbes.net/public/images/promotion/2020/04/1607_04_B04.jpg" alt="" /></div>
            </div>
        </div>
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('.tabs').each(function(){
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