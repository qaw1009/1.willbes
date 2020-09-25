@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/09/1841_top_bg.jpg) no-repeat center top;}
        .wb_top span {position:absolute; left:50%; z-index:1;}
        .wb_top span.img1 {top:257px; margin-left:-413px; width:146px; animation:iptimg1 10s infinite;-webkit-animation:iptimg1 10s infinite;}
        .wb_top span.img2 {top:453px; margin-left:240px; width:379px; animation:iptimg2 8s infinite;-webkit-animation:iptimg2 8s infinite;}
        @@keyframes iptimg1{
            0%{margin-left:-513px; opacity: 0;}
            50%{margin-left:-413px; opacity: 1;}
            100%{margin-left:-313px; opacity: 0;}
        }
        @@-webkit-keyframes iptimg1{
            0%{margin-left:-513px; opacity: 0;}
            50%{margin-left:-413px; opacity: 1;}
            100%{margin-left:-313px; opacity: 0;}
        }
        
        @@keyframes iptimg2{
            0%{margin-left:440px; opacity: 0;}
            50%{margin-left:240px; opacity: 1;}
            100%{margin-left:40px; opacity: 0;}
        }
        @@-webkit-keyframes iptimg2{
            0%{margin-left:440px; opacity: 0;}
            50%{margin-left:240px; opacity: 1;}
            100%{margin-left:40px; opacity: 0;}
        }

        .wb_01 {background:#27283a; height:140px}
        .tabs {width:1120px; margin:0 auto}         
        .tabs li {display:inline; float:left}
        .tabs li a {display:block;}
        .tabs li a img.off {display:block}
        .tabs li a img.on {display:none}
        .tabs li a:hover img.off,
        .tabs li a.active img.off {display:none}
        .tabs li a:hover img.on,
        .tabs li a.active img.on {display:block}
        .tabs ul:after {content:""; display:blockl; clear:both}	 
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1841_top.jpg" title="추석맞이 열공지원" /> 
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2020/09/1841_top_img01.png" title="" /></span>      
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2020/09/1841_top_img02.png" title="" /></span>      
        </div>

        <div class="evtCtnsBox wb_01">
            <ul class="tabs">
                <li>
                    <a href="#tab01">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1841_tab01.jpg" title="합격기원 댓글 이벤트" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1841_tab01_on.jpg" title="합격기원 댓글 이벤트" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1841_tab02.jpg" title="신규수강생 기간연장" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1841_tab02_on.jpg" title="신규수강생 기간연장" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab03">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1841_tab03.jpg" title="수강지원 특별한정 강좌할인" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1841_tab03_on.jpg" title="수강지원 특별한정 강좌할인" class="on"/> 
                    </a>
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox" id="tab01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1841_cts01.jpg" title="합격기원 댓글 이벤트">
            {{--댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>

        <div class="evtCtnsBox" id="tab02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1841_cts02.gif" title="신규수강생 기간연장" usemap="#map1841A" border="0">
            <map name="map1841A">
                <area shape="rect" coords="416,1228,693,1285" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank" title="회원가입"/>
            </map>
        </div>

        <div class="evtCtnsBox mb100" id="tab03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1841_cts03.jpg" title="합격기원 댓글 이벤트" usemap="#Map1841B" border="0">
            <map name="Map1841B">
                <area shape="rect" coords="350,542,472,605" href="https://pass.willbes.net/promotion/index/cate/3019/code/1842" target="_blank" title="티패스">
                <area shape="rect" coords="861,536,984,599" href="https://pass.willbes.net/support/notice/show?board_idx=290110" target="_blank" title="9~10월 강좌" />
                <area shape="rect" coords="910,714,1032,777" href="https://pass.willbes.net/promotion/index/cate/3019/code/1717" target="_blank" title="9급패스" />
                <area shape="rect" coords="911,834,1032,897" href="https://pass.willbes.net/promotion/index/cate/3035/code/1480" target="_blank" title="법원팀" />
                <area shape="rect" coords="911,953,1030,1017" href="https://pass.willbes.net/promotion/index/cate/3028/code/1728" target="_blank" title="최우영" />
                <area shape="rect" coords="909,1105,1034,1169" href="https://pass.willbes.net/promotion/index/cate/3019/code/1836" target="_blank" title="7급" />
                <area shape="rect" coords="910,1226,1031,1284" href="https://pass.willbes.net/promotion/index/cate/3023/code/1060" target="_blank" title="소방패스" />
                <area shape="rect" coords="911,1343,1029,1407" href="https://pass.willbes.net/promotion/index/cate/3028/code/1068" target="_blank" title="장사원패키지" />
                <area shape="rect" coords="912,1465,1028,1522" href="https://pass.willbes.net/promotion/index/cate/3024/code/1751" target="_blank" title="군무원티패스" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*tab*/
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
        ) 
    </script>
@stop