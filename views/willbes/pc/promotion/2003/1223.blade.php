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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }

        .evt01 {position:relative;overflow:hidden; min-width:1210px; text-align:center; background:#5f4b99 url("https://static.willbes.net/public/images/promotion/2019/04/1223_top_bg.jpg") center top  no-repeat; margin-top:5px;}
        .evt02 {background:#0077ff }
        .evt03 {background:#eef2f5 url("https://static.willbes.net/public/images/promotion/2019/04/1223_02_bg.jpg") center top no-repeat; height:1310px}
        .evt04 {background:#000 url("https://static.willbes.net/public/images/promotion/2019/04/1223_03_bg.jpg") center top no-repeat;}
		.evt05 {background:#000 url("https://static.willbes.net/public/images/promotion/2019/04/1223_04_bg.jpg") center top no-repeat;}
		
		/*TAB 3 학습시스템*/
        .tabWrapEvt {width:910px; margin:0 auto; position:relative}
        .tabWrapEvt li {display:inline; float:left; width:50%; margin-bottom:10px}
        .tabWrapEvt li a {display:block; width:250px; margin:0 auto; float:right}
        .tabWrapEvt li:nth-child(odd) a {float:left;}
        .tabWrapEvt li a img.off {display:block}
        .tabWrapEvt li a img.on {display:none}
        .tabWrapEvt li a:hover img.off {display:none}
        .tabWrapEvt li a:hover img.on {display:block}
        .tabWrapEvt li a.active img.off {display:none}
        .tabWrapEvt li a.active img.on {display:block}
        .tabWrapEvt li:last-child {width:100%; text-align:center; margin-top:260px}
        .tabWrapEvt li:last-child a {float:none}
        .tabWrapEvt ul:after {content:""; display:block; clear:both}
        .tabcts {background:none; position:absolute; top:50px; left:50%; margin-left:-142px; width:285px; z-index:10}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">       
        <div class="evtCtnsBox evt01">
			<img src="https://static.willbes.net/public/images/promotion/2019/04/1223_top.png" usemap="#Map_1223_go" title="윌비스와미래넷이 함께만든 공무원문풀APP출시" border="0">
			<map name="Map_1223_go">
			  <area shape="rect" coords="309,418,557,486" href="https://itunes.apple.com/kr/app/apple-store/id1385928272" target="_blank" alt="AppStore">
			  <area shape="rect" coords="564,419,822,486" href="https://play.google.com/store/apps/details?id=com.miraenet.gexamapp" target="_blank" alt="GooglePlay">
			</map>
		</div>
        <!--evt01//-->

        <div class="evtCtnsBox evt02">
           <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_01.jpg" title="공무원문풀과함께학습을습관으로">
        </div>
        <!--evt02//-->

        <div class="evtCtnsBox evt03">
         <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02.png" alt=""/>
         <!--Tab::comment: 센터에 컨텐츠 위치-->
            <div class="tabWrapEvt">
                <ul>
                    <li>
                        <a href="#tab01">
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t1.png" alt="경향시험응시" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t1_on.png" alt="" class="on"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab02">
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t2.png" alt="경향풀이해설" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t2_on.png" alt="" class="on"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab03">
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t3.png" alt="예상시험응시" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t3_on.png" alt="" class="on"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab04">
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t4.png" alt="예상풀이해설" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t4_on.png" alt="" class="on"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab05">
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t5.png" alt="알찬강의" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t5_on.png" alt="" class="on"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab06">
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t6.png" alt="문풀도전" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t6_on.png" alt="" class="on"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab07">
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t7.png" alt="PUSH알림" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t7_on.png" alt="" class="on"/>
                        </a>
                    </li>
                </ul>
                <div id="tab01" class="tabcts"><img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t_c1.png" alt=""/></div>
                <div id="tab02" class="tabcts"><img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t_c2.png" alt=""/></div>
                <div id="tab03" class="tabcts"><img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t_c3.png" alt=""/></div>
                <div id="tab04" class="tabcts"><img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t_c4.png" alt=""/></div>
                <div id="tab05" class="tabcts"><img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t_c5.png" alt=""/></div>
                <div id="tab06" class="tabcts"><img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t_c6.png" alt=""/></div>
                <div id="tab07" class="tabcts"><img src="https://static.willbes.net/public/images/promotion/2019/04/1223_02_t_c7.png" alt=""/></div>
            </div>
		<!--Tab//-->

        </div>
        <!--evt03//-->

        <div class="evtCtnsBox evt04">
          <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_03.png" usemap="#Map_1223_go2" title="공무원문풀APP다운로드" border="0">
			<map name="Map_1223_go2">
			  <area shape="rect" coords="429,256,677,319" href="https://itunes.apple.com/kr/app/apple-store/id1385928272" target="_blank"alt="AppStore">
			  <area shape="rect" coords="690,255,928,321" href="https://play.google.com/store/apps/details?id=com.miraenet.gexamapp" target="_blank" alt="GooglePlay">
			</map>
        </div>
        <!--evt04//-->

		<div class="evtCtnsBox evt05">
          <img src="https://static.willbes.net/public/images/promotion/2019/04/1223_04.png" title="공무원문풀로열공하고합격선물받는이벤트">
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('.tabWrapEvt').each(function(){
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