@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /************************************************************/               
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/09/2347_top_bg.jpg) no-repeat center top}  
       
        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2021/09/2347_01_bg.jpg) no-repeat center top}  

        .evt_02 {background:#fd637b}    

        .evt_05 {padding:50px 0;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox evtTop" data-aos="fade-left">          
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2347_top.jpg" title="무엇이든 물어보세요">
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2347_01.jpg" title="고민있는 수험생">
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-left">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2347_02.jpg" title="맛있는 간식이 듬뿍">
                <a href="javascript:void(0)" title="알림 신청하기" style="position: absolute;left: 7.29%;top: 85.59%;width: 41.93%;height: 6.49%;z-index: 2;"></a>
                <a href="#reply" title="댓글달기" style="position: absolute;left: 51.29%;top: 85.59%;width: 41.93%;height: 6.49%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt_03" id="reply" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2347_03.jpg" title="여러분의 고민은">
            {{-- 이모티콘 댓글 --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
            @endif
        </div>

        <div class="evtCtnsBox evt_04" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2347_04.jpg" title="소문내주세요">
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif 
        </div>

        <div class="evtCtnsBox evt_05" data-aos="fade-right">
            {{--<img src="https://static.willbes.net/public/images/promotion/2021/09/2347_05.jpg" title="라이브존">--}}           
            <div class="liveWrap" >
                @if(empty($data['PromotionLivePlayer']) === false && $data['PromotionLivePlayer'] == 'youtube')
                    @include('willbes.pc.promotion.live_video_youtube_partial')
                @else
                    @include('willbes.pc.promotion.live_video_partial')
                @endif
            </div>        
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif 
        </div>

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop