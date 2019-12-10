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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; top:200px;right:0;z-index:10;}

        .evtTop {background:#2c0204 url(https://static.willbes.net/public/images/promotion/2019/12/1470_top_bg.jpg) no-repeat center top;}  

        .evt01 {background:#6da403 url(https://static.willbes.net/public/images/promotion/2019/12/1470_01_bg.jpg) no-repeat center top;}
        
        .evt02 {background:#ebebeb;}

        .evt03 {background:#fff;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <ul class="skyBanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1470_sky.png" usemap="#Map1470sky" title="pass 구매하기" border="0">
            <map name="Map1470sky" id="Map1470sky">
                <area shape="rect" coords="-2,1,191,137" href="#event" alt="이벤트" />
                <area shape="rect" coords="0,142,190,312" href="https://police.willbes.net/promotion/index/cate/3001/code/1009" target="_blank" alt="경찰패스" />
            </map>
        </ul>

        <div class="evtCtnsBox evtTop">                
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1470_top.jpg" title="절호의 기회">           
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1470_01.jpg" title="정상급 라인업">
        </div>

        <div class="evtCtnsBox evt02">         
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1470_02.jpg" title="윌비스 신광은 경찰팀">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1470_02s.jpg" usemap="#Map1470a" border="0"/>
            <map name="Map1470a" id="Map1470a">
                <area shape="rect" coords="164,523,554,665" href="https://police.willbes.net/promotion/index/cate/3001/code/1009" target="_blank" alt="온라인 pass 신청하기" />
                <area shape="rect" coords="562,522,933,667" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1471" target="_blank" alt="학원 pass 신청하기" />
            </map>          
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1470_03.jpg" usemap="#Map1470b" title="신청하기" border="0" id="event">
            <map name="Map1470b" id="Map1470b">
                <area shape="rect" coords="496,2059,567,2163" href="http://cafe.daum.net/policeacademy" target="_blank" alt="경시모" />
                <area shape="rect" coords="584,2058,664,2165" href="https://cafe.naver.com/polstudy" target="_blank" alt="경꿈사" />
                <area shape="rect" coords="685,2055,761,2167" href="https://cafe.naver.com/willbes" target="_blank" alt="윌비스" />
                <area shape="rect" coords="778,2053,858,2168" href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" alt="공무원갤러리" />
                <area shape="rect" coords="865,2052,965,2171" href="https://gall.dcinside.com/mgallery/board/lists/?id=policeofficer" target="_blank" alt="순경갤러리" />
            </map>
            <!--  이모티콘 댓글 -->
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon_url_partial', array('bottom_cafe_type'=>'N'))
            @endif
        </div>

    {{--    
    {{--강사 이미티콘 홍보url댓글
    @include('html.event_replyEmoticonUrl')--}}
    --}}
 
    </div>
    <!-- End Container -->

    <script type="text/javascript">
   
    </script>

@stop