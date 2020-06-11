@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .sky {position:fixed; top:225px;right:0;z-index:10;}
        .sky li{padding-bottom:10px;}

        .wb_top {background:#2f328b url(https://static.willbes.net/public/images/promotion/2020/06/1677_top_bg.jpg) no-repeat center}

        .wb_evt01 {padding-bottom:50px}        

        .wb_evt03 {background:#313131}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1682" target="_blank"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_sky_02.jpg" alt="초시생 플랜" >
                </a>
            </li>            
        </ul>       

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_top.jpg" usemap="#Map1677apply" title="추천강좌" border="0" />
            <map name="Map1677apply" id="Map1677apply">
                <area shape="rect" coords="858,714,1032,833" href="https://police.willbes.net/promotion/index/cate/3001/code/1009" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_01.jpg" title="재시생을 위한 합격 플랜" />
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_01_college.jpg" title="심화기출이론 단과" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial')
            @else
            @endif        
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_01_university.jpg" usemap="#Map1677b" title="심화기출이론 종합반" border="0" />
            <map name="Map1677b" id="Map1677b">
                <area shape="rect" coords="67,496,268,546" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/165234" target="_blank" />
                <area shape="rect" coords="452,494,653,547" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/165249" target="_blank" />
                <area shape="rect" coords="838,496,1040,547" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/165250" target="_blank" />
            </map>
        </div>        

        <div class="evtCtnsBox wb_evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_03.jpg" usemap="#Map1677a" title="이미지 다운받기 및 쿠폰 받기" border="0" />
            <map name="Map1677a" id="Map1677a">
                <area shape="rect" coords="279,1088,621,1141" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" />
                <area shape="rect" coords="637,1088,982,1141" href="javascript:;" onclick="giveCheck()" alt="쿠폰 받기" />
            </map>         
        </div>
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

    </div>
    <!-- End Container -->

@stop