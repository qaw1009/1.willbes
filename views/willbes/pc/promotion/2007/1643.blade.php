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
        .evtTop {background:#7795b4 url(https://static.willbes.net/public/images/promotion/2020/05/1643_top_bg.jpg) no-repeat center top;}   
        .evt01 {background:#fff}       
        .evt02 {background:#a3b9d0}
        .evt02 iframe {position:absolute; top:670px; left:50%; margin-left:-360px;}
        .evt03 {background:#fff}
        .evt04 {background:#eee; padding-bottom:100px}
        .evt04title {border-bottom:1px solid #ccc; width:1120px; margin:0 auto 50px}

        .skyBanner {position:fixed; width:180px; top:200px; right:10px; z-index:5;}
        .skyBanner a {display:block; margin-bottom:5px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1643_top.jpg" usemap="#Map1643a" title="G-TELP 목표점수 단기완성" border="0">
            <map name="Map1643a" id="Map1643a">
                <area shape="rect" coords="9,673,513,788" href="#goLec" />
            </map>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1643_01.jpg" title="국제 공인 영어시험 G-TELP">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1643_02.jpg" title="김혜진 교수 소개">
            <iframe width="720" height="364" src="https://www.youtube.com/embed/XtZj6UqsE3Y" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox evt03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1643_03.jpg" usemap="#Map1643b" title="교재구매하기" border="0">
            <map name="Map1643b" id="Map1643b">
                <area shape="rect" coords="325,824,842,906" href="https://lang.willbes.net/book/index/cate/3093" target="_blank" />
            </map> 
        </div>

        <div class="evtCtnsBox evt04" id="goLec">
            <div class="evt04title"><img src="https://static.willbes.net/public/images/promotion/2020/05/1643_04.jpg"></div>
            @include('willbes.pc.promotion.display_product_partial')
        </div>
    </div>
    <!-- End Container -->
@stop