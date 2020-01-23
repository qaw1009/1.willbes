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
            position:relative; 
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .m_img1 {position:fixed;top:240px;right:10px;z-index:1}

        .wb_top{background:#842565 url("https://static.willbes.net/public/images/promotion/2020/01/1528_top_bg.jpg") no-repeat center top;}

        .wb_cts01 {background:#eaeaea url("https://static.willbes.net/public/images/promotion/2020/01/1528_01_bg.jpg") no-repeat center top;}

        .wb_cts02 {background:#eaeaea;}	

        .wb_cts03 {background:#791d5e url("https://static.willbes.net/public/images/promotion/2020/01/1528_03_bg.jpg") no-repeat center top;}

        .wb_cts04 {background:#fff;padding:50px 0 100px;}
        .tabs { margin-left:-490px; width:980px; z-index:10;margin:0 auto;padding-top:25px;}
        .tabs ul{width:789px;margin:0 auto;}
        .tabs li {display:inline; float:left; width:20%;}
        .tabs li a {display:block; text-align:center; height:45px; line-height:45px; background:#b7b7b7; color:#fff; font-size:16px; margin-right:4px;border-radius:16px;}
        .tabs li a:hover,
        .tabs li a.active {background:#c6b269;}
        .tabs li:last-child a {margin:0}
        .tabs ul:after {content:""; display:block; clear:both}
        .tabs div {width:840px; margin:25px 0 0 70px}
        .tabs div a {display:block; width:400px; margin:160px auto 0; background:#0a0f25; color:#fff; font-size:22px; padding:15px 0; border-radius:40px}
        .tabs div a:hover {background:#c6b269;}
    </style>


    <div class="evtContent" id="evtContainer">        
        <div class="m_img1">
            <a href="#apply" ><img src="http://file3.willbes.net/new_gosi/2019/01/EV190122Y_sky.png" alt="전국모의고사 신청하기" /></a>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1528_top.jpg" title="윌비스 전국모의고사">
        </div>
            
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1528_01.jpg" title="필요한 이유">
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1528_02.jpg" title="실전연습">
        </div>

        <div class="evtCtnsBox wb_cts03" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1528_03.jpg" title="오프라인 신청하기" usemap="#Map1528a" border="0" />
            <map name="Map1528a" id="Map1528a">
                <area shape="rect" coords="470,428,988,545" href="https://pass.willbes.net/pass/mockTest/apply/cate/" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts04" >      
            <div class="tabs">
                <ul>
                    <li><a href="#tab01">서울(노량진)</a></li>
                    <li><a href="#tab02">인천</a></li>                 
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