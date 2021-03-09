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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/10/1874_top_bg.jpg) no-repeat center top;}
        .evt01 {}
        .evtLec {width:1120px; margin:0 auto; text-align:left}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>     

        <div class="sky">
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1881" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1874_sky.png" alt="" >
            </a>             
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1874_top.jpg"  alt="10월 추천강좌" usemap="#Map1874" border="0" />
            <map name="Map1874">
              <area shape="rect" coords="834,799,1076,909" href="https://police.willbes.net/promotion/index/cate/3001/code/1864" target="_blank" alt="0원패스">
            </map>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1874_02.jpg"  alt="심화이론,기출 단과"/>
        </div>

        <div class="evtCtnsBox evtLec">
            {{--프로모션 동영상 단과 불러오기 모바일--}}
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1874_03.jpg"  alt="심화이론,기출 패키지" usemap="#Map1874_01" border="0"/>
            <map name="Map1874_01">
              <area shape="rect" coords="248,597,525,656" href="https://police.willbes.net/package/show/cate/3010/pack/648001/prod-code/173091" target="_blank" alt="오태진패키지">
              <area shape="rect" coords="598,596,867,658" href="https://police.willbes.net/package/show/cate/3010/pack/648001/prod-code/173090" target="_blank" alt="원유철패키지">
            </map>
        </div>

        <div class="evtCtnsBox evtLec">
            {{--프로모션 동영상 단과 불러오기 모바일--}}
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif 
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1874_04.jpg"  alt="기본이론 종합반" usemap="#Map1874_02" border="0" />
            <map name="Map1874_02">
              <area shape="rect" coords="74,700,339,758" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/169703" target="_blank" alt="원유철 종합반">
              <area shape="rect" coords="414,700,686,754" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/169704" target="_blank" alt="오태진종합반">
              <area shape="rect" coords="760,702,1027,758" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/169705" target="_blank" alt="경행경채종합반">
            </map>
        </div>
    </div>
    <!-- End Container -->
@stop