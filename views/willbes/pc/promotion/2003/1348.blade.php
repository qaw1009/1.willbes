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
        .evttop {background:url(https://static.willbes.net/public/images/promotion/2019/08/1348_top_bg.jpg) no-repeat center top; }
        .evt01 {background:#f6fafb}            
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2019/08/1348_02_bg.jpg) no-repeat center top; position:relative}         
        .evt02 .liveWrap {position:absolute; left:50%; margin-left:-560px; top:593px; z-index:10 }
        .evt03 {background:#5329b1 url(https://static.willbes.net/public/images/promotion/2019/08/1348_03_bg.jpg) no-repeat center top; padding:200px 0 150px; margin-bottom:100px} 
        
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evttop" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1348_top.jpg" alt="이상구 라이브 국제법/정치학" usemap="#Map1348_top" border="0" />
            <map name="Map1348_top" id="Map1348_top">
                <area shape="rect" coords="72,675,205,803" href="javascript:alert('마감되었습니다.')" alt="실강신청" />
                <area shape="rect" coords="214,675,342,804" href="@if(!sess_data('is_login')) {{'javascript:alert(\'로그인 후 서비스 이용이 가능합니다\')'}} @else @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif @endif" alt="자료다운" />
            </map>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1348_01.jpg" title="출제가능한 문제만 모조리 정리한다">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1348_02.jpg" usemap="#Map1348" title="라이브 특강 진행 안내" border="0">
            <map name="Map1348" id="Map1348">
                <area shape="rect" coords="622,413,751,542" href="javascript:alert('마감되었습니다.')" alt="실강신청" />
                <area shape="rect" coords="762,414,892,542" href="@if(!sess_data('is_login')) {{'javascript:alert(\'로그인 후 서비스 이용이 가능합니다\')'}} @else @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif @endif" alt="자료다운" />
            </map>
            <div class="liveWrap">
                @include('willbes.pc.promotion.live_video_partial') 
            </div>                          
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1348_03.png" title="무엇이든 물어보세요~">                
        </div>

        {{--댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif
	</div>
    <!-- End Container -->

@stop