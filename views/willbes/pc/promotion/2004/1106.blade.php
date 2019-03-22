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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }
        .skybanner li {
            margin-bottom:5px;
        }
 

        .wb_top {background:#060508 url(http://file3.willbes.net/new_gosi/2019/02/EV190212Y_01_bg.jpg) no-repeat center top; position:relative}
        .wb_top .evBtn {position:absolute; top:1100px; left:50%; margin-left:-413px; width:827px; z-index:10}
        .wb_top .evBtn li {display:inline; float:left; margin-right:55px}
        .wb_top .evBtn li:last-child {margin:0}
        .wb_top .evBtn li a {display:block; text-align:center}
        .wb_top .evBtn li img.off {display:block}
        .wb_top .evBtn li img.on {display:none}
        .wb_top .evBtn li a:hover img.off {display:none}
        .wb_top .evBtn li a:hover img.on {display:block}
        .wb_top .check {width:100%; margin:0 auto; padding:30px 0px; letter-spacing:3 !important; color:#fff}
        .wb_top .check input {border:2px solid #bb152c; margin-right:10px !important; height:24px !important}
        .wb_top .check a {display:inline-block; padding:12px 20px 10px 20px; color:#27262c; background:#e3c0a2; margin-left:50px; border-radius:20px}

        .wb_cts02 {background:#fedb8d}
        .wb_cts03 {background:#2d2d35}
        .wb_cts04 {background:#fedb8d}
        .wb_cts05 {background:#1b1b20 url(http://file3.willbes.net/new_gosi/2018/09/EV180920Y_02_bg.jpg) no-repeat center top}
        .wb_cts06 {background:#fff}


    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="{{ site_url('/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=국어&tab=tcc') }}" target="_blank" alt="기미진">
                <img src="http://file3.willbes.net/new_gosi/2019/02/EV190212_sky.png" />
            </a>
        </div>

        <div class="evtCtnsBox wb_top" > <img src="http://file3.willbes.net/new_gosi/2019/02/EV190212Y_01.jpg" alt="기특한 국어 기미진" usemap="#Map_180702_lec" />
            <div class="evBtn">
                <ul>
                    <li><a href="{{ site_url('/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4') }}" target="_blank"> <img src="http://file3.willbes.net/new_gosi/2018/09/EV180920Y_01_btn01Off.png" alt="기미진 홈" class="off"/> <img src="http://file3.willbes.net/new_gosi/2018/09/EV180920Y_01_btn01On.png" alt="기미진 홈" class="on"/> </a> </li>
                    <li><a href="{{ site_url('/promotion/index/cate/3019/code/1074') }}" target="_blank"> <img src="http://file3.willbes.net/new_gosi/2018/09/EV180920Y_01_btn02Off.png" alt="국어 T-PASS" class="off" target="_blank"/> <img src="http://file3.willbes.net/new_gosi/2018/09/EV180920Y_01_btn02On.png" alt="국어 T-PASS" class="on"/> </a> </li>
                    <li><a onclick="move1()"> <img src="http://file3.willbes.net/new_gosi/2018/09/EV180920Y_01_btn03Off.png" alt="국어 신규강의" class="off" target="_blank"/> <img src="http://file3.willbes.net/new_gosi/2018/09/EV180920Y_01_btn03On.png" alt="국어 신규강의" class="on"/> </a> </li>
                </ul>
            </div>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2019/02/EV190212Y_02.jpg"  alt="기미진국어를수식하는말"/>
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2019/02/EV190212_03Y.jpg"  alt="기특한국어최적화커리큘럼"/>
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_gosi/2019/02/EV190212Y_03.jpg"  alt="아침실전모고자세히" usemap="#Map_190212_moi" border="0"/>
            <map name="Map_190212_moi">
                <area shape="rect" coords="192,882,1015,963" href="{{ site_url('/pass/promotion/index/cate/3043/code/1098') }}" target="_blank" alt="아침실전모의고사자세히">
            </map>
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05">
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180920Y_02.jpg"  alt="기특한국어교재소개"/>
        </div>
        <!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts06" id="lec">
            <img src="http://file3.willbes.net/new_gosi/2019/02/EV190212Y_04.jpg" alt="기특한국어신규강좌OPEN수강신청" usemap="#Map_190212_aca_go" border="0"/>
            <map name="Map_190212_aca_go">
                <area shape="rect" coords="188,995,1010,1086" href="{{ site_url('/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4&tab=open_lecture') }}" target="_blank" alt="학원실강수강신청">
            </map>
        </div>
        <!--wb_cts06//-->

    </div>
    <!-- End Container -->

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop