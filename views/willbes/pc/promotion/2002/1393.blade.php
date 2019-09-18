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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .skybanner {
            position:fixed; 
            top:200px; 
            right:0;
            z-index:1;            
        }

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/09/1393_top_bg.jpg) no-repeat center top;}
            .nameBox {position:absolute; top:695px; left:50%; margin-left:-430px; border:7px solid #fff; width:860px; height:200px; text-align:center; background:#0a0e25; color:#fff; overflow:hidden; z-index:10}
        .wb_00 {background:#12172d;}
        .wb_01 {background:#cccfd4;}	
            .tabs {position:absolute; top:292px; left:50%; margin-left:-490px; width:980px; z-index:10}
            .tabs li {display:inline; float:left; width:14.28571%}
            .tabs li a {display:block; text-align:center; height:45px; line-height:45px; background:#222428; color:#fff; font-size:20px; margin-right:4px;}
            .tabs li a:hover,
            .tabs li a.active {background:#c6b269;}
            .tabs li:last-child a {margin:0}
            .tabs ul:after {content:""; display:block; clear:both}
            .tabs div {width:840px; margin:79px 0 0 61px}
            .tabs div a {display:block; width:400px; margin:160px auto 0; background:#0a0f25; color:#fff; font-size:22px; padding:15px 0; border-radius:40px}
            .tabs div a:hover {background:#c6b269;}
        .wb_02 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1393_02_bg.jpg) no-repeat center top; height:1210px;}
        .wb_02 ul {width:1034px; margin:0 auto; padding-top:464px}
        .wb_02 li {display:inline; float:left; margin-bottom:134px; width:33.33333%;}

        .wb_03 {background:#fff; padding-bottom:50px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_00">
			<img src="https://static.willbes.net/public/images/promotion/2019/09/1393_00.jpg" alt="대한민국 경찰학원 1위 윌비스 신광은 경찰학원"/>			
		</div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1393_top.jpg" alt="필기고득점자 합격노하우 이벤트">
            <div class="nameBox">
                <ul id="slider1" class="bxslider">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1393_top_txt.png"/></li>					
                </ul>
            </div>
		</div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1393_01.jpg" alt="리얼 고득점 수기">
            <div class="tabs">
                <ul>
                    <li><a href="#tab01">형소법</a></li>
                    <li><a href="#tab02">형법</a></li>
                    <li><a href="#tab03">경찰학</a></li>
                    <li><a href="#tab04">영어</a></li>
                    <li><a href="#tab05">한국사</a></li>
                    <li><a href="#tab06">수사</a></li>
                    <li><a href="#tab07">행정법</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1393_01_tab01.jpg" alt="수기" />
                    <a href="https://police.willbes.net/pass/support/notice/show?board_idx=237398&s_campus=605001#01" target="_blank">더 많은 과목별 만점자 보기 ></a>
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1393_01_tab02.jpg" alt="수기" />
                    <a href="https://police.willbes.net/pass/support/notice/show?board_idx=237398&s_campus=605001#02" target="_blank">더 많은 과목별 만점자 보기 ></a>
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1393_01_tab03.jpg" alt="수기" />
                    <a href="https://police.willbes.net/pass/support/notice/show?board_idx=237398&s_campus=605001#03" target="_blank">더 많은 과목별 만점자 보기 ></a>
                </div>
                <div id="tab04">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1393_01_tab04.jpg" alt="수기" />
                    <a href="https://police.willbes.net/pass/support/notice/show?board_idx=237398&s_campus=605001#04" target="_blank">더 많은 과목별 만점자 보기 ></a>
                </div>
                <div id="tab05">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1393_01_tab05.jpg" alt="수기" />
                    <a href="https://police.willbes.net/pass/support/notice/show?board_idx=237398&s_campus=605001#05" target="_blank">더 많은 과목별 만점자 보기 ></a>
                </div>
                <div id="tab06">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1393_01_tab06.jpg" alt="수기" />
                    <a href="https://police.willbes.net/pass/support/notice/show?board_idx=237398&s_campus=605001#06" target="_blank">더 많은 과목별 만점자 보기 ></a>
                </div>
                <div id="tab07">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1393_01_tab07.jpg" alt="수기" />
                    <a href="https://police.willbes.net/pass/support/notice/show?board_idx=237398&s_campus=605001#07" target="_blank">더 많은 과목별 만점자 보기 ></a>
                </div>
            </div>		
		</div>

		<div class="evtCtnsBox wb_02">
            <ul>
                <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/1009" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1393_02_bn01.png" alt="패스" /></a></li>
                <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/1333" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1393_02_bn02.png" alt="패스" /></a></li>
                <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/1015" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1393_02_bn03.png" alt="패스" /></a></li>
                <li><a href="https://police.willbes.net/pass/promotion/index/cate/3011/code/1394" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1393_02_bn04.png" alt="패스" /></a></li>
                <li><a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1325" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1393_02_bn05.png" alt="패스" /></a></li>
                <li><a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1360" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1393_02_bn06.png" alt="패스" /></a></li>
            </ul>
        </div>
        
        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1393_03.jpg" alt="고득점 노하우 이벤트" usemap="#Map1393B" border="0" />
            <map name="Map1393B" id="Map1393B">
            <area shape="rect" coords="118,2072,291,2156" href="https://www.instagram.com/" target="_blank" alt="인스타그램" />
            <area shape="rect" coords="358,2073,518,2155" href="https://www.facebook.com/" target="_blank" alt="페이스북" />
            <area shape="rect" coords="119,2180,271,2271" href="http://cafe.daum.net/policeacademy" target="_blank" alt="경사모" />
            <area shape="rect" coords="353,2182,521,2269" href="http://cafe.naver.com/polstudy" target="_blank" alt="경꿈사" />
            <area shape="rect" coords="591,2184,774,2265" href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" alt="공무원갤러리" />
            <area shape="rect" coords="826,2183,1032,2267" href="https://gall.dcinside.com/mgallery/board/lists/?id=policeofficer" target="_blank" alt="순경마이너" />
            </map>
		</div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_emoticon_url_partial')
        @endif         
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        $(function() {
            //Count the number of li elements
            var bx_num01 = $("#slider1 li").length;
            var ticker01 = $('#slider1').bxSlider({
                minSlides: 0,
                maxSlides: 100,
                slideWidth: 980,
                slideMargin: 0,
                ticker: true,
                mode: 'vertical',
                /*tickerHover: true,*/
                speed:20000*bx_num01
            });
        });
        
        /*tab*/
        $(document).ready(function(){
            $('.tabs ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });
    </script>
@stop