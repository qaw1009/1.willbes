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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}

        /************************************************************/     

        .evtTop {background:#5a5a5a;}       
        .evt01 {background:#fff;}
            .tabs { margin-left:-490px; width:980px; z-index:10;margin:0 auto;padding-top:25px;}
            .tabs ul{width:789px;margin:0 auto;}
            .tabs li {display:inline; float:left; width:16.6%;}
            .tabs li a {display:block; text-align:center; height:45px; line-height:45px; background:#b7b7b7; color:#fff; font-size:16px; margin-right:4px;border-radius:16px;}
            .tabs li a:hover,
            .tabs li a.active {background:#c6b269;}
            .tabs li:last-child a {margin:0}
            .tabs ul:after {content:""; display:block; clear:both}
            .tabs div {width:840px; margin:25px 0 0 70px}
            .tabs div a {display:block; width:400px; margin:160px auto 0; background:#0a0f25; color:#fff; font-size:22px; padding:15px 0; border-radius:40px}
            .tabs div a:hover {background:#c6b269;}
        .evt02 {background:#fff;}
        .evt03 {background:#f9f9f9;padding-bottom:100px;}

        .skybanner{position: fixed; bottom:0;z-index: 1;background:#898989;}	
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">       
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_top.jpg" usemap="#Map1414a" title="장학생 선발 전국 모의고사" border="0"  />
            <map name="Map1414a" id="Map1414a">
                <area shape="rect" coords="600,1028,743,1060" href="#to_go" />
                <area shape="rect" coords="345,1071,771,1162" href="https://pass.willbes.net/pass/mockTest/apply/cate/" target="_blank" />
            </map>
        </div>
      
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01.jpg" title="장학생 선발요강 및 시행일정"  /> 
            <div class="tabs">
                <ul>
                    <li><a href="#tab01">서울(노량진)</a></li>
                    <li><a href="#tab02">인천</a></li>
                    <li><a href="#tab03">전북</a></li>
                    <li><a href="#tab04">광주</a></li>
                    <li><a href="#tab05">대구</a></li>
                    <li><a href="#tab06">부산</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab01.jpg" alt="서울(노량진)" />
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab02.jpg" alt="인천" />
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab03.jpg" alt="전북" />
                </div>
                <div id="tab04">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab04.jpg" alt="광주" />
                </div>
                <div id="tab05">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab05.jpg" alt="대구" />
                </div>
                <div id="tab06">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab06.jpg" alt="부산" />
                </div>
            </div>	       
        </div>

        <div class="evtCtnsBox evt02" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_02.jpg" title="고퀄리티 문항"  />
        </div>

        {{--홍보url댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_underbar.png" alt="무료응시 베너" usemap="#Map1414b" border="0" />
            <map name="Map1414b" id="Map1414b">
                <area shape="rect" coords="877,12,1059,84" href="#to_go" />
            </map>
		</div>

    </div>
    <!-- End Container -->

    <script type="text/javascript"> 
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