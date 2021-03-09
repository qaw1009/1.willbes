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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2085_top_bg.jpg) no-repeat center top;}

        .evt03 {padding-bottom:100px;}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/02/2085_04_bg.jpg) no-repeat center top;}

        .evt05 {padding-bottom:100px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>     

        <div class="sky">
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2075" target="_blank" > 
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2085_sky.png" alt="3월 추천강좌" >
            </a>             
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2085_top.jpg"  alt="3월 추천강좌"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2085_01.jpg"  alt="심화이론 기출패키지"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2085_02.jpg"  alt="신청하기" usemap="#Map2085_apply" border="0"/>
            <map name="Map2085_apply" id="Map2085_apply">
                <area shape="rect" coords="170,625,257,651" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/179384" target="_blank" > 
                <area shape="rect" coords="460,625,546,651" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/179383" target="_blank" > 
                <area shape="rect" coords="844,625,930,651" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/179385" target="_blank" > 
            </map>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2085_03.jpg"  alt="심화이론.심화기출 단과"/>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif    
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2085_04.jpg"  alt="기본이론 종합반"/>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2085_05.jpg"  alt="종합반 및 단과" usemap="#Map2085_link" border="0"/>
            <map name="Map2085_link" id="Map2085_link">
                <area shape="rect" coords="308,644,436,680" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/178086" target="_blank" />
                <area shape="rect" coords="686,644,815,680" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/178087" target="_blank" />
            </map>               
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif    
        </div>   
           
    </div>
    <!-- End Container -->
@stop