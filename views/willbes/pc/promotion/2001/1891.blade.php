@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">     
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .wb_top {background:#AEAAAD url(https://static.willbes.net/public/images/promotion/2020/10/1891_top_bg.jpg) no-repeat center top;}
        .wb_01 {background:#fff;}
        .wb_02 {background:#E6E6E6;}
        .wb_03 {background:#A60D08;}
        .wb_04 {background:#E1F1FE url(https://static.willbes.net/public/images/promotion/2020/10/1891_04_bg.jpg) no-repeat center top;}
        .wb_05 {background:#016FCE;}
        .wb_06 {background:#016FCE;}

    </style> 

    <div class="evtContent NGR" id="evtContainer">
     
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_top.jpg" alt="맞춤형 커리큘럼 가이드"/>            
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_01.gif" alt="수험기간 단축, 비용 절약"/>          
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_02.jpg" alt="정규 커리큘럼"/>            
        </div>

        <div class="evtCtnsBox wb_03" id=start>
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_03.jpg" alt="윌비스 베스트 강좌"/>            
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_04.jpg" alt="셀프 진단하기" usemap="#Map1891_start" border="0"/>
            <map name="Map1891_start" id="Map1891_start">
                <area shape="rect" coords="446,420,676,486" href="#start" />
            </map>            
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_05.jpg" alt="테스트 yes or no" usemap="#Map1891_test" border="0"/>
            <map name="Map1891_test" id="Map1891_test">
                <area shape="rect" coords="257,546,551,625" href="#none" />
                <area shape="rect" coords="563,546,863,626" href="#none" />
            </map>            
        </div>

        <div class="evtCtnsBox wb_06">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06a.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891a" border="0"/>
            <map name="Map1891a" id="Map1891a">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1004" target="_blank" />
            </map>  
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06a.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891b" border="0"/>
            <map name="Map1891b" id="Map1891b">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1005" target="_blank" />
            </map> 
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06a.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891c" border="0"/>
            <map name="Map1891c" id="Map1891c">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1006" target="_blank" />
            </map> 
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06a.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891d" border="0"/>
            <map name="Map1891d" id="Map1891d">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1007" target="_blank" />
            </map> 
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06a.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891e" border="0"/>
            <map name="Map1891e" id="Map1891e">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1008" target="_blank" />
            </map> 
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06a.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891f" border="0"/>
            <map name="Map1891f" id="Map1891f">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1009" target="_blank" />
            </map>           
        </div>

    </div>
    <!-- End Container -->
@stop