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

        .wb_evt02 {padding-bottom:100px}        

        .wb_evt03 {background:#313131}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="#sky01"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_sky_01.jpg" alt="재시생 플랜" >
                </a>
            </li>
            <li>
                <a href="#sky02"> 
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

        <div class="evtCtnsBox wb_evt01" id="sky01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_01.jpg" title="재시생을 위한 합격 플랜" />
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_01_college.jpg" title="심화기출이론 단과" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial')
            @else
            @endif        
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_01_university.jpg" title="심화기출이론 종합반" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial')
            @else
            @endif        
        </div> 

        <div class="evtCtnsBox wb_evt02" id="sky02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_02.jpg" title="초시생을 위한 합격 플랜" />
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_02_college.jpg" title="기본이론 단과" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial')
            @else
            @endif        
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_02_university.jpg" title="기본이론 종합반" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial')
            @else
            @endif        
        </div> 

        <div class="evtCtnsBox wb_evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_03.jpg" usemap="#Map1677a" title="소문내고 커피득템고" border="0" />
            <map name="Map1677a" id="Map1677a">
                <area shape="rect" coords="305,1081,727,1142" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" />
            </map>            
        </div>
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

    </div>
    <!-- End Container -->

@stop