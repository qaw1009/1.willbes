@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1040_top_bg.jpg) no-repeat center top}
        .wb_cts02 {background:#e9ecf1 url(https://static.willbes.net/public/images/promotion/2020/12/1040_01_bg.jpg) repeat-x center top}

        /* 탭 */
        .tabContaier{width:100%; text-align:center;}
        .tabContaier ul {width:100%; max-width:1120px; text-align:center; ; margin:0 auto;}
        .tabContaier li {display:inline; float:left; }
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}

        .wb_cts04 {background:#fff; position:relative;}
        .wb_cts04 .video {position:absolute; top:842px; left:50%; margin-left:50px; width:456px; z-index:1}
        .wb_cts04 iframe {width:456px; height:253px}
        .wb_cts05 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1040_04_bg.jpg) no-repeat center top;}
        .wb_cts06 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1040_05_bg.jpg) no-repeat center top;}


    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_top.png" alt="윌비스신광은경찰학원 노량진 24시" />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <div class="tabContaier">
                <ul class="cf">
                    <li>
                        <a class="active" href="#tab1">
                            <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_tap1.jpg"  class="off" alt="초시생"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_tap1on.jpg" class="on"  />
                        </a>
                    </li>
                    <li>
                        <a  href="#tab2">
                            <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_tap2.jpg"  class="off" alt="N수생"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_tap2on.jpg" class="on"  />
                        </a>
                    </li>
                </ul>

                <div class="tabContents " id="tab1" >
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_02.jpg" usemap="#Map190325_c3" border="0" /><br>
                    <map name="Map190325_c3" >
                        <area shape="rect" coords="166,680,372,706" href="{{ site_url('/pass/promotion/index/code/1049') }}" target="_blank" />
                    </map>
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_02_01.jpg" />
                </div>

                <div class=" tabContents " id="tab2">
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_02_02.jpg" usemap="#Map190325_c4" border="0" /><br>
                    <map name="Map190325_c4" >
                        <area shape="rect" coords="727,704,961,731" href="{{ site_url('/pass/offPackage/index?cate_code=3010&course_idx=1041') }}" target="_blank"/>
                    </map>
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_02_03.jpg" usemap="#Map190325_c5" border="0" />
                    <map name="Map190325_c5" >
                        <area shape="rect" coords="735,995,964,1022" href="{{ site_url('/pass/promotion/index/code/1128') }}" target="_blank"/>
                    </map>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <div class="video">
                <iframe src="https://www.youtube.com/embed/gFlsobT5PH0?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_03.jpg" alt="SPECIAL EVENT " />
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_04.png" alt="윌비스신광은경찰학원만의 합격 솔루션  " usemap="#Map190325_c2" border="0" />
            <map name="Map190325_c2" >
                <area shape="rect" coords="133,643,323,677" href="{{ site_url('/pass/promotion/index/code/1882') }}"  target="_blank" alt="윌비스신광은경찰팀 SUPER PASS"/>
                <area shape="rect" coords="625,643,816,679" href="{{ site_url('/pass/promotion/index/code/1581') }}" target="_blank" alt="윌비스신광은경찰팀 스파르타"/>
                <area shape="rect" coords="136,1032,321,1065" href="{{ site_url('/pass/promotion/index/code/1053') }}" target="_blank" alt="경찰 통합 생활 관리반"/>
                <area shape="rect" coords="630,1034,815,1065" href="{{ site_url('/pass/consultManagement/index') }}" target="_blank" alt="1:1 심층상담 / 컨설팅"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1040_05.png" alt="믿고 선택해주신만큼 항상 여러분의 합격만을 생각하는 윌비스신광은경찰이 되겠습니다. " />
        </div><!--wb_cts06//-->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();

            $(".tabContaier ul li a").click(function(){

                var activeTab = $(this).attr("href");
                $(".tabContaier ul li a").removeClass("active");
                $(this).addClass("active");
                $(".tabContents").hide();
                $(activeTab).fadeIn();

                return false;
            });
        });
    </script>

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>


@stop