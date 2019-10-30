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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .evttop {background:url(https://static.willbes.net/public/images/promotion/2019/10/1442_top_bg.jpg) no-repeat center top; }
        .evt01 {background:#e8e9ed}            
        .evt02 {background:#f5e365; position:relative}         
        .evt02 .liveWrap {position:absolute; left:50%; margin-left:-560px; top:593px; z-index:10 }
        .evt03 {background:#f5e365; padding:200px 0 150px; margin-bottom:100px} 
        
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evttop" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1442_top.jpg" alt="기미진 국어 아침특강 라이브" usemap="#Map1442_top" border="0" />
            <map name="Map1442_top" id="Map1442_top">
                <area shape="rect" coords="97,808,226,942" href="https://pass.willbes.net/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=국어&tab=open_lecture" target="_blank" />
                <area shape="rect" coords="236,809,371,944" href="@if(!sess_data('is_login')) {{'javascript:alert(\'로그인 후 서비스 이용이 가능합니다\')'}} @else @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif @endif" alt="자료다운" />
            </map>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1442_01.jpg" usemap="#Map1442_a" title="기미진 국어,그 화제의 커리큘럼" border="0">
            <map name="Map1442_a" id="Map1442_a">
                <area shape="rect" coords="534,1893,915,1964" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157584" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1442_02.jpg" usemap="#Map1442_b" title="라이브 특강 진행 안내" border="0">
            <map name="Map1442_b" id="Map1442_b">
                <area shape="rect" coords="608,393,737,527" href="https://pass.willbes.net/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=국어&tab=open_lecture" target="_blank" />
                <area shape="rect" coords="746,391,883,528" href="@if(!sess_data('is_login')) {{'javascript:alert(\'로그인 후 서비스 이용이 가능합니다\')'}} @else @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif @endif" alt="자료다운" />
            </map>
            <div class="liveWrap">
                @if(empty($data['PromotionLivePlayer']) === false && $data['PromotionLivePlayer'] == 'youtube')
                    @include('willbes.pc.promotion.live_video_youtube_partial')
                @else
                    @include('willbes.pc.promotion.live_video_partial')
                @endif
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1442_03.png" title="무엇이든 물어보세요">                
        </div>

        {{--댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif
	</div>
    <!-- End Container -->

@stop