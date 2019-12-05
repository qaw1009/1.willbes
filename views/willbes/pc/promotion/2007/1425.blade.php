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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/10/1425_top_bg.jpg) no-repeat center top;}   
        .evt01 {background:#fff}       
        .evt02 {background:#d7d7d7}
        .evt02 iframe {position:absolute; top:670px; left:50%; margin-left:-280px;}
        .evt03 {background:#fff}

        .skyBanner {position:fixed; width:320px; top:200px; right:0; z-index:5;}
        .skyBanner a {display:block; margin-bottom:5px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skyBanner">
            <a href="https://lang.willbes.net/periodPackage/show/cate/3093/pack/648001/prod-code/158393" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/12/1425_sky.png" title="바로신청하기"></a>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1425_top.jpg" usemap="#Map1425A" title="G-TELP 최단기 목표공략" border="0">
            <map name="Map1425A" id="Map1425A">
                <area shape="rect" coords="828,1081,1114,1156" href="{{site_url('/lecture/show/cate/3093/pattern/only/prod-code/157309')}}" target="_blank" alt="수강신청" />
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
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1425_03.jpg" usemap="#Map1425B" title="교재" border="0">
            <map name="Map1425B" id="Map1425B">
                <area shape="rect" coords="281,830,805,907" href="http://www.willstory.co.kr/book/book_list.asp?search_text=G-TELP&amp;search_type=0&amp;x=0&amp;y=0" target="_blank" alt="교재구매하기" />
            </map>
        </div>
    </div>
    <!-- End Container -->
@stop