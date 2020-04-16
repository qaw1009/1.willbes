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
            min-width:1200px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#585858 url(https://static.willbes.net/public/images/promotion/2020/04/1608_bg.jpg) no-repeat center top;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1200px; position:relative}

		/************************************************************/ 

		.skybanner{position: fixed; top: 280px;right:2px;z-index: 1;}	  

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/04/1608_top_bg.jpg) no-repeat center top;}	
        .evt_01 {width:1180px; margin:0 auto}
        .evt_01 li {display:inline; float:left; width:20%;}
        .evt_01 li a{display:block; text-align:center}
        .evt_01 li:last-child a {margin:0}
        .evt_01 li img:hover {
            -webkit-box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.5);
            -moz-box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.5);
            box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.5);
        }
        .evt_01 ul:hover a:not(:hover){    
            opacity: 0.4; 
        }
        .evt_01 ul:after {content:""; display:block; clear:both}

        .evt_02 {margin-top:130px; padding-bottom:150px}
        .evt_02 ul {width:1180px; margin:0 auto 30px}
        .evt_02 li {display:inline; float:left; width:33.333333%;}
        .evt_02 li a{display:block; text-align:center; height:116px; line-height:116px; font-size:30px; background:#fff; border:3px solid #353435; margin-right:20px}
        .evt_02 li:last-child a {margin:0}
        .evt_02 li a:hover,
        .evt_02 li a.active {background:#353435; border:3px solid #fdfa17; color:#fff}
        .evt_02 ul:after {content:""; display:block; clear:both}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1608_top.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt_01">
            <ul>
                <li><a href="https://gosi.willbes.net/support/gosiNotice/show/cate/3099?board_idx=269388&s_cate_code=3099&s_cate_code_disabled=Y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/04/1608_01_01.jpg" alt="김남훈" /></a></li>
                <li><a href="https://gosi.willbes.net/support/gosiNotice/show/cate/3099?board_idx=269393&s_cate_code=3099&s_cate_code_disabled=Y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/04/1608_01_02.jpg" alt="이재상" /></a></li>
                <li><a href="https://gosi.willbes.net/support/gosiNotice/show/cate/3099?board_idx=269395&s_cate_code=3099&s_cate_code_disabled=Y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/04/1608_01_03.jpg" alt="김기환" /></a></li>
                <li><a href="https://gosi.willbes.net/support/gosiNotice/show/cate/3099?board_idx=269397&s_cate_code=3099&s_cate_code_disabled=Y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/04/1608_01_04.jpg" alt="선동주" /></a></li>
                <li><a href="https://gosi.willbes.net/support/gosiNotice/show/cate/3099?board_idx=269399&s_cate_code=3099&s_cate_code_disabled=Y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/04/1608_01_05.jpg" alt="박도원" /></a></li>
            </ul>            
		</div>

        <div class="evtCtnsBox evt_02">
            <ul class="tabs NSK-Black">
                <li><a href="#tab01">민사법</a></li>
                <li><a href="#tab02">형법/형사법</a></li>
                <li><a href="#tab03">헌법/행정법</a></li>
            </ul>
            <div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2020/04/1608_02.jpg" alt="민사법" usemap="#Map1608A" border="0" />
                <map name="Map1608A" id="Map1608A">
                    <area shape="rect" coords="760,91,948,129" href="https://gosi.willbes.net/support/gosiNotice/show/cate/3099?board_idx=269388&amp;s_cate_code=3099&amp;s_cate_code_disabled=Y" target="_blank" alt="민사법" />
                </map>
            </div>
            <div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/04/1608_03.jpg" alt="" usemap="#Map1608B" border="0" />
                <map name="Map1608B" id="Map1608B">
                    <area shape="rect" coords="737,91,925,129" href="https://gosi.willbes.net/support/gosiNotice/show/cate/3099?board_idx=269393&amp;s_cate_code=3099&amp;s_cate_code_disabled=Y" target="_blank" alt="형법" />
                    <area shape="rect" coords="761,1084,952,1117" href="https://gosi.willbes.net/support/gosiNotice/show/cate/3099?board_idx=269395&amp;s_cate_code=3099&amp;s_cate_code_disabled=Y" target="_blank" alt="형사법" />
                </map>
            </div>
            <div id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2020/04/1608_04.jpg" alt="" usemap="#Map1608C" border="0" />
                <map name="Map1608C" id="Map1608C">
                    <area shape="rect" coords="737,91,925,129" href="https://gosi.willbes.net/support/gosiNotice/show/cate/3099?board_idx=269397&amp;s_cate_code=3099&amp;s_cate_code_disabled=Y" target="_blank" alt="헌법" />
                    <area shape="rect" coords="759,1082,955,1121" href="https://gosi.willbes.net/support/gosiNotice/show/cate/3099?board_idx=269399&amp;s_cate_code=3099&amp;s_cate_code_disabled=Y" target="_blank" alt="행정법" />
                </map>
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