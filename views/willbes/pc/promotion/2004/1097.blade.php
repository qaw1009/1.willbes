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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            width:130px;
            z-index:1;
        }

        .wb_cts01 {background:#2b2b35 url(http://file3.willbes.net/new_gosi/2018/11/EV181123_c15_bg.jpg) no-repeat center top; position:relative;}
	    .wb_cts02 {background:#ffffff url(http://file3.willbes.net/new_gosi/2018/11/EV181123_c4_bg.jpg) no-repeat center top;}	

        /* 탭 */
        .tabContaier{width:100%; text-align:center;}
        .tabContaier ul {width:100%; max-width:1210px; text-align:center; ; margin:0 auto;   }		
        .tabContaier li {display:inline; float:left; }	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier .bg01 {  background: url(http://file3.willbes.net/new_gosi/2018/11/EV181123_c8_bg.jpg) no-repeat center bottom; background-position:0px 2752px;}
        .tabContaier .bg02 {  background: url(http://file3.willbes.net/new_gosi/2018/11/EV181123_c8_bg.jpg) no-repeat center bottom; background-position:0px 2919px;}

        .wb_cts03 { position:absolute;  top:3660px; width:100%; min-width:1210px; text-align:center; background:#040405 url(http://file3.willbes.net/new_gosi/2018/11/EV181123_c8_bg.jpg) no-repeat center top;}
      

        .wb_cts04 { width:100%; min-width:1210px; text-align:center; background:#fff;}
        .wb_cts04 p {padding-top:612px;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="{{ site_url('/pass/promotion/index/cate/3043/code/1101') }}" target="_blank">
                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_sky.png" alt="7급 초시생 합격전략설명회">
            </a>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c1.png" alt="7급 행정직 탭" usemap="#Map181123_c1" border="0" /><br>
            <map name="Map181123_c1" >
                <area shape="rect" coords="156,19,540,86" href="{{ site_url('/pass/promotion/index/cate/3043/code/1096') }}" onFocus="this.blur();"  alt="9급 106일 마무리반"/>
                <area shape="rect" coords="675,14,1061,91" href="{{ site_url('#none') }}" onFocus="this.blur();" alt="7급 170일 마무리반"/>
            </map>
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c2.png" alt="윌비스 7급 행정직 7개월 단기완성 순환반" />
        </div><!--wb_cts01//-->


        <div class="evtCtnsBox wb_cts02" >
            <div class="tabContaier">
                <ul>
                    <li>
                        <a class="active" href="#tab1">
                            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c3_1.jpg"  class="off" alt=""/>
                            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c3_1on.jpg" class="on"  />
                        </a>
                    </li>
                    <li>
                        <a  href="#tab2">
                            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c3_2.jpg"  class="off" alt=""/>
                            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c3_2on.jpg" class="on"  />
                        </a>
                    </li>

                </ul>

                <div class="tabContents" id="tab1" >
                    <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c4.png" /><br>
                    <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c6.jpg" /><br>
                    <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c7.jpg" /><br>
                    <a href="{{ site_url('/pass/promotion/index/cate/3043/code/1101') }}">
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c9.jpg" />
                    </a>
                </div>

                <div class=" tabContents" id="tab2">
                    <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c10.png" /><br>
                    <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c12.jpg" /><br>
                    <img src="http://file3.willbes.net/new_gosi/2018/11/EV181123_c13.jpg" /><br>
                    <a href="{{ site_url('/pass/promotion/index/cate/3043/code/1100') }}">
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190128_c14.jpg" />
                    </a>
                </div>
            </div><!--tabContaier//-->
        </div><!--wb_cts02//-->


    </div>
    <!-- End Container -->

    <script>
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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop