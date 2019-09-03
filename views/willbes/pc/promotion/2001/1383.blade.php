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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/09/1382_top_bg.jpg) no-repeat center top;}
        .wb_top span {position:absolute; top:373px; left:50%; margin-left:388px; transform: rotate(5deg); z-index:10; animation:rubberBand2 2s infinite;}
        @@keyframes rubberBand2{
        0%{-ms-transform: rotate(5deg); -webkit-transform: rotate(5deg); transform: rotate(5deg);}
        50%{-ms-transform: rotate(-5eg); -webkit-transform: rotate(-5deg); transform: rotate(-5deg);} 
        100%{-ms-transform: rotate(5deg); -webkit-transform: rotate(5deg); transform: rotate(5deg);}
        }

        .wb_01 {background:#e6de98; height:138px}
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
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1382_top.jpg" alt="추석맞이 열공지원" /> 
            <span><img src="https://static.willbes.net/public/images/promotion/2019/09/1382_top_img.png" alt="" /></span>           
        </div>

        <div class="evtCtnsBox wb_01">
            <ul class="tabs">
                <li>
                    <a href="#tab01">
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1382_tab01_off.jpg" alt="합격기원 댓글 이벤트" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1382_tab01_on.jpg" alt="합격기원 댓글 이벤트" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1382_tab02_off.jpg" alt="신규수강생 기간연장" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1382_tab02_on.jpg" alt="신규수강생 기간연장" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab03">
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1382_tab03_off.jpg" alt="수강지원 특별한정 강좌할인" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1382_tab03_on.jpg" alt="수강지원 특별한정 강좌할인" class="on"/> 
                    </a>
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox" id="tab01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1382_tab01.jpg" alt="합격기원 댓글 이벤트">
            {{--댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>

        <div class="evtCtnsBox" id="tab02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab02.jpg" alt="신규수강생 기간연장" usemap="#map1382A" border="0">
            <map name="map1382A" id="map1382A">
                <area shape="rect" coords="416,1190,693,1247" href="https://www.willbes.net/member/join/?ismobile=0&amp;sitecode=2000" target="_blank" alt="회원가입" />
            </map>
        </div>

        <div class="evtCtnsBox" id="tab03">
            할인강좌
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