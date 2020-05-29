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
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/05/1654_top_bg.jpg) no-repeat center top}
        .evt01 {background:#ef9614}
        .evt02 {background:#395323}
        .evt02 > div {position:absolute; top:470px; left:50%; width:1028px; margin-left:-514px;}
        .evt02 div div {position:relative; background:#ddd}
        .evt02 span {position:absolute; top:0; display:block; width:64px; height:64px; line-height:64px; 
            color:#fff; background:#00c73c; border-radius:70px; text-align:center; font-size:20px; z-index:1; animation: sp01 1.5s linear infinite;}
        @@keyframes sp01{
		from{transform:scale(1)}50%{transform:scale(1.2)}to{transform:scale(1)}
        }
        .evt02 span:nth-child(1) {left:-10px}
        .evt02 span:nth-child(2) {left:252px}
        .evt02 span:nth-child(3) {left:514px}
        .evt02 span:nth-child(4) {left:776px; background:#d8ab36; line-height:1; padding-top:12px}
        .evt02 ul:after {content:""; display:block; clear:both}
        .evt03 {background:#fff}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1654_top.jpg" alt="열공이벤트" > 
        </div> 
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1654_01.jpg" alt="열공이벤트" > 
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1654_02.jpg" alt="열공이벤트" usemap="#Map1654B" border="0" >
            <map name="Map1654B">
                <area shape="rect" coords="61,951,274,1016" href="https://njob.willbes.net/promotion/index/cate/3114/code/1564#tab01" target="_blank" alt="김정환">
                <area shape="rect" coords="326,951,535,1014" href="https://njob.willbes.net/promotion/index/cate/3114/code/1566#tab01" target="_blank" alt="김경은">
                <area shape="rect" coords="586,949,795,1015" href="https://njob.willbes.net/promotion/index/cate/3114/code/1565#tab01" target="_blank" alt="황채영">
                <area shape="rect" coords="849,948,1059,1017" href="https://njob.willbes.net/promotion/index/cate/3114/code/1567#tab01" target="_blank" alt="정문진">
            </map> 
            <div class="NSK-Black">
                <div>
                    <span>완강</span>
                    <span>완강</span>
                    <span>완강</span>
                    <span>완강<br>예정</span>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1654_03.jpg" alt="열공이벤트" usemap="#Map1654" border="0" >
            <map name="Map1654">
                <area shape="rect" coords="212,1771,352,1833" href="https://cafe.naver.com/specup" target="_blank" alt="스펙업">
                <area shape="rect" coords="393,1773,531,1833" href="https://cafe.naver.com/dokchi" target="_blank" alt="독취사">
                <area shape="rect" coords="573,1773,713,1834" href="https://cafe.naver.com/soho" target="_blank" alt="셀러오션">
                <area shape="rect" coords="755,1772,896,1834" href="https://www.instagram.com" target="_blank" alt="인스타">
            </map> 
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 
    </div>
    <!-- End Container -->
@stop