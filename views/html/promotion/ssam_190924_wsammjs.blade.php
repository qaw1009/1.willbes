@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsammjs_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_02_bg.jpg) no-repeat center top;}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_03_bg.jpg) no-repeat center top;}
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsammjs_04_bg.jpg) no-repeat center top; height:950px}
        .evt04 ul {width:1280px; margin:0 auto; padding-top:330px}
        .evt04 ul li {display:inline; float:left; width:50%; text-align:left}
        .evt04 ul li:last-child {text-align:right}
        .evt04 iframe {}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('html.promotion.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsammjs_top.jpg" alt="유아 민정선" usemap="#Mapmjs01" border="0" />
                <map name="Mapmjs01" id="Mapmjs01">
                  <area shape="rect" coords="65,819,445,915" href="#none" alt="기출해설A형" />
                  <area shape="rect" coords="486,818,668,917" href="#none" alt="답안자료" />
                  <area shape="rect" coords="844,818,1220,916" href="#none" alt="기출해설B형" />
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_01.jpg" />
            </div>

            <div class="evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_02.jpg" usemap="#Mapmjs02" border="0">
                <map name="Mapmjs02" class="review_btn" id="wsammjs">
                  <area shape="rect" coords="467,2241,809,2324" href="#none" alt="합격수기확인" />
                </map>
            </div>

            <div class="evt04">
              	<ul>
                	<li><iframe width="600" height="336" src="https://www.youtube.com/embed/Y2W3lUrn3aI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
                    <li><iframe width="600" height="336" src="https://www.youtube.com/embed/yjdW1qJ1vHs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
                </ul>
       	   </div>
        </div>
    </div>
    <!-- End Container -->
@stop