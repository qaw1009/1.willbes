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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        /************************************************************/
        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:225px;right:10px;z-index:10;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2135_top_bg.jpg) no-repeat center top;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2135_01_bg.jpg) no-repeat center top;}

        .evt05 {background:#0E3E80;}

        .evt04,.evt06,.evt07 {padding-bottom:100px;}

 
    </style> 

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>     

        <div class="sky">
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2133" target="_blank" > 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2135_sky.png" alt="4월 추천강좌" >
            </a>             
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2135_top.jpg"  alt="4월 추천강좌"/>
        </div>

        <div class="evtCtnsBox evt01">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2101" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2135_01.jpg"  alt="0원 무제한 패스"/>
            </a>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2135_02.jpg"  alt="심화이론.기출 패키지" usemap="#Map2135a" border="0"/>
            <map name="Map2135a" id="Map2135a">
                <area shape="rect" coords="302,1431,820,1490" href="https://police.willbes.net/promotion/index/cate/3001/code/2077" target="_blank">
            </map>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2135_03.jpg"  alt="심화이론+기출 패키지" usemap="#Map2135b" border="0"/>
            <map name="Map2135b" id="Map2135b">
                <area shape="rect" coords="169,588,257,614" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/179384" target="_blank">
                <area shape="rect" coords="459,589,546,614" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/179383" target="_blank">
                <area shape="rect" coords="844,588,930,615" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/179385" target="_blank">
            </map>
        </div>
     
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2135_04.jpg"  alt="심화이론.심화기출 단과"/>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif    
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2135_05.jpg"  alt="기본완성반" usemap="#Map2135c" border="0"/>
            <map name="Map2135c" id="Map2135c">
                <area shape="rect" coords="327,1132,806,1184" href="https://police.willbes.net/promotion/index/cate/3001/code/2092" target="_blank">
            </map> 
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2135_06.jpg"  alt="온라인 종합반"/>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif    
        </div>

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2135_07.jpg"  alt="온라인 단과"/>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                @endif   
        </div>

    </div>
    <!-- End Container -->
@stop