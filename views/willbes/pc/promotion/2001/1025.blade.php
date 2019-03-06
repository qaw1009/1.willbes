@extends('willbes.pc.layouts.master')

@section('content')

    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .wb_top {background:#0b274c url(http://file3.willbes.net/new_cop/2019/01/EV190102_p1_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#d4d4d4}
        .wb_cts02 {background:#2c2c2c; padding-bottom:140px}
        .wb_cts03 {background:#1087ef}
        .wb_cts04 {background:#fff; padding-bottom:100px}
        .wb_cts05 {background:#e2e2e2}


        /* 탭 */
        .tabContaier{width:100%; text-align:center;}
        .tabContaier ul {width:100%; max-width:980px; text-align:center; margin:0 auto}
        .tabContaier li {display:inline; float:left; }
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {
            content:'';
            display:block;
            clear:both;
        }


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190102_p1.png"  alt="적중의여신 " />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190102_p2.png"  alt="적중=하승민 " />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190102_p3.png"  alt="동영상" />
            <iframe width="854" height="480" src="https://www.youtube.com/embed/ouOkVtFChAc?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190102_p4.png"  alt="적중" />
        </div>


        <div class="evtCtnsBox wb_cts04" >
            <div style="margin:100px 0 50px 0;">
                <img src="http://file3.willbes.net/new_cop/2019/01/EV190102_p5.png"  alt="100%" usemap="#more" />
                <map name="more" id="more">
                    <area shape="rect" coords="442,518,773,579" href="http://www.willbescop.net/notice/view.html?topMenuType=F&topMenuGnb=FM_008&topMenu=MAIN&menuID=FM_008_001&topMenuName=ÀÏ¹Ý°æÂû&BOARD_MNG_SEQ=NOTICE_000&NOTICETYPE=notice&INCTYPE=view&currentPage=1&BOARD_SEQ=138232&PARENT_BOARD_SEQ=0&searchEventNo=undefined&SEARCHKIND=&SEARCHTEXT=" onfocus='this.blur()'  alt="적중사례" target="_blank">
                </map>
            </div>
            <div style="width:980px;text-align:center;margin:0 auto;">
                <div class="tabContaier">
                    <ul class="cf">
                        <li>
                            <a class="active" href="#tab1">
                                <img src="http://file3.willbes.net/new_cop/2019/01/EV190102_p5_tap1_off.jpg"  class="off" alt="01"/>
                                <img src="http://file3.willbes.net/new_cop/2019/01/EV190102_p5_tap1_on.jpg" class="on"  />
                            </a>
                        </li>
                        <li>
                            <a href="#tab2">
                                <img src="http://file3.willbes.net/new_cop/2019/01/EV190102_p5_tap2_off.jpg"  class="off" alt="02"/>
                                <img src="http://file3.willbes.net/new_cop/2019/01/EV190102_p5_tap2_on.jpg" class="on"  />
                            </a>
                        </li>
                    </ul>
                    <div class="tabContents" id="tab1">
                        <p><img  src="http://file3.willbes.net/new_cop/2019/01/EV190102_p5_1.jpg"></p>
                    </div>
                    <div class="tabContents mt20" id="tab2" >
                        <p><img  src="http://file3.willbes.net/new_cop/2019/01/EV190102_p5_2.jpg"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190102_p6.png"  alt="커리큘럼 & 강의신청" usemap="#p1" />
            <map name="p1" id="p1">
                <area shape="rect" coords="167,1081,443,1149" href="/lecture/index/cate/3001/pattern/only" onfocus='this.blur()'  target="_blank" alt="온라인강의 신청">
                <area shape="rect" coords="509,1081,787,1149" href="/pass/offLecture/index" onfocus='this.blur()' target="_blank" alt="학원강의 신청">
            </map>
        </div>

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
            /*e.preventDefault(); */
        });

        $( document ).ready( function() {
            var jbOffset = $( '.skybanner' ).offset();
            $( window ).scroll( function() {
                if ( $( document ).scrollTop() > jbOffset.top ) {
                    $( '.skybanner' ).addClass( 'skybanner_sectionFixed' );
                }
                else {
                    $( '.skybanner' ).removeClass( 'skybanner_sectionFixed' );
                }
            });
        } );
    </script>

@stop