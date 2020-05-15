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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;} 

        /************************************************************/
        .evtTop {background:#EBE0CA url(https://static.willbes.net/public/images/promotion/2020/05/1425_top_bg.jpg) no-repeat center top;}   
        .evt01 {background:#fff}       
        .evt02 {background:#d7d7d7}
        .evt02 iframe {position:absolute; top:670px; left:50%; margin-left:-280px;}
        .evt03 {background:#fff}
        .evt04 {background:#eee; padding-bottom:100px}
        .evt04title {border-bottom:1px solid #ccc; width:1120px; margin:0 auto 50px}

        .skyBanner {position:fixed; width:180px; top:200px; right:10px; z-index:5;}
        .skyBanner a {display:block; margin-bottom:5px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        {{--
        <div class="skyBanner">
            <a href="https://lang.willbes.net/periodPackage/show/cate/3093/pack/648001/prod-code/158393" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/12/1425_sky.png" title="바로신청하기"></a>
        </div>
        --}}

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1425_top.jpg" usemap="#Map1425A" title="G-TELP 최단기 목표공략" border="0">
            <map name="Map1425A" id="Map1425A">
                <area shape="rect" coords="687,898,973,973" href="#goLec" alt="수강신청" />
            </map>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1425_01.jpg" title="국제 공인 영어시험 G-TELP">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1425_02.jpg" title="1초비법">
            <iframe width="720" height="364" src="https://www.youtube.com/embed/afYUa3Al1Vo" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox evt03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1425_03.jpg" usemap="#Map1425B" title="교재" border="0">
            <map name="Map1425B" id="Map1425B">
                <area shape="rect" coords="281,830,805,907" href="https://lang.willbes.net/book/index/cate/3093" target="_blank" alt="교재구매하기" />
            </map>
        </div>

        <div class="evtCtnsBox evt04" id="goLec">
            <div class="evt04title"><img src="https://static.willbes.net/public/images/promotion/2020/05/1425_04.jpg"></div>
            @include('willbes.pc.promotion.display_product_partial')
        </div>
    </div>
    <!-- End Container -->
@stop