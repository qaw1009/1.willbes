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
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab01_off.jpg" alt="합격기원 댓글 이벤트" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab01_on.jpg" alt="합격기원 댓글 이벤트" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab02_off.jpg" alt="신규수강생 기간연장" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab02_on.jpg" alt="신규수강생 기간연장" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab03">
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab03_off.jpg" alt="수강지원 특별한정 강좌할인" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab03_on.jpg" alt="수강지원 특별한정 강좌할인" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab04">
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab04_off.jpg" alt="추석연휴 학원강의 안내" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab04_on.jpg" alt="추석연휴 학원강의 안내" class="on"/> 
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
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab02.jpg" alt="신규수강생 기간연장" usemap="#map1383A" border="0">
            <map name="map1383A" id="map1383A">
                <area shape="rect" coords="417,1269,694,1326" href="https://www.willbes.net/member/join/?ismobile=0&amp;sitecode=2000" target="_blank" alt="회원가입" />
            </map>
        </div>

        <div class="evtCtnsBox" id="tab03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab03.jpg" alt="합격기원 댓글 이벤트" usemap="#Map1384C" border="0">
            <map name="Map1384C" id="Map1384C">
                <area shape="rect" coords="390,779,734,840" href="https://police.willbes.net/promotion/index/cate/3001/code/1009" target="_blank" alt="텀블러받기" />
            </map>
        </div>

        <div class="evtCtnsBox" id="tab04">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1383_tab04.jpg" alt="추석연휴 형법 무료특강" usemap="#Map1383B" border="0">
            <map name="Map1383B" id="Map1383B">
                <area shape="rect" coords="414,777,702,839" href="https://police.willbes.net/pass/event/show/ongoing?event_idx=405" target="_self" alt="무료특강신청하기" />
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