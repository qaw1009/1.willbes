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
        .evttop {background:#12262d url(https://static.willbes.net/public/images/promotion/2019/11/1442_top2_bg.jpg) no-repeat center top; }
        .evt01 {background:#e8e9ed}            
        .evt02 {background:#ff9e33; position:relative}         
        .evt02 .liveWrap {position:absolute; left:50%; margin-left:-560px; top:593px; z-index:10 }
        .evt03 {background:#ff9e33; padding:200px 0 150px;}        
        
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
        
        </style>

    <div class="p_re evtContent NGR" id="evtContainer">                

        <div class="evtCtnsBox evttop" >     
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1442_top2.jpg" title="기미진&한덕현 아침특강">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1442_01_v2.jpg" usemap="#Map1442a" title="기미진&한덕현 학습전략" border="0">
            <map name="Map1442a" id="Map1442a">
                <area shape="rect" coords="432,2087,690,2151" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158375" target="_blank" />
                <area shape="rect" coords="695,2087,953,2150" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158374" target="_blank" />
            </map>  
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1442_02_v2.jpg" usemap="#Map" title="기미진&한덕현 실강신청.자료다운" border="0">
            <map name="Map" id="Map">
                <area shape="rect" coords="430,439,549,559" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&subject_idx=&course_idx=1062" target="_blank" />
                <area shape="rect" coords="568,440,689,561" href="@if(!sess_data('is_login')) {{'javascript:alert(\'로그인 후 서비스 이용이 가능합니다\')'}} @else @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif @endif" alt="자료다운" />
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
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1442_03.png" title="유의사항">                
        </div>

        {{--댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif  
        
	</div>
    <!-- End Container -->

@stop