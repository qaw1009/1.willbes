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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; }

        /************************************************************/    

        .sky {position:fixed; top:225px;right:10px;z-index:10;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2004_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#F1F1F1;}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/02/2004_03_bg.jpg) no-repeat center top;}

        .evt04 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646}
        .evt04 .evt04_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 
        
    </style>

    <div class="evtContent NSK" id="evtContainer">         

        <div class="sky">
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1989" target="_blank" > 
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2004_sky.png" alt="1-2월 추천강좌" >
            </a>             
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2004_top.jpg"  alt="2월 추천강좌"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2004_01.jpg"  alt="문제풀이 풀패키지"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2004_02.jpg"  alt="신청하기" usemap="#Map2004_apply" border="0"/>
            <map name="Map2004_apply" id="Map2004_apply">
                <area shape="rect" coords="344,631,456,665" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/175823" target="_blank" />
                <area shape="rect" coords="660,631,773,665" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/175824" target="_blank" />
                <area shape="rect" coords="138,1034,229,1062" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/175827" target="_blank" />
                <area shape="rect" coords="372,1034,460,1061" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/175828" target="_blank" />
                <area shape="rect" coords="656,1034,744,1061" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/175829" target="_blank" />
                <area shape="rect" coords="890,1035,978,1060" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/175830" target="_blank" />
                <area shape="rect" coords="841,1193,1016,1262" href="https://police.willbes.net/promotion/index/cate/3001/code/1976" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2004_03.jpg"  alt="기본이론 종합반"/>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2004_04.jpg"  alt="종합반 및 단과" usemap="#Map2004_link" border="0"/>
            <map name="Map2004_link" id="Map2004_link">
                <area shape="rect" coords="308,644,436,680" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/178086" target="_blank" />
                <area shape="rect" coords="686,644,815,680" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/178087" target="_blank" />
            </map>
            <div class="evt04_box">                  
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif    
        </div>   
           
    </div>
    <!-- End Container -->
@stop