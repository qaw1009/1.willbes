@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/     

        .evttop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2579_top_bg.jpg) no-repeat center top;} 
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/03/2579_01_bg.jpg) no-repeat center top;} 

        /*타이머*/
        .time {width:1120px; margin:0 auto; text-align:center; padding:15px 0; font-size:40px; color:#fff}
        .time span {color:#fdeb00;font-weight:bold; vertical-align:top; font-size:44px}     

        /*타이머 스크롤*/
        .jbMenu {display:none}
        .jbMenu {top:0px; width:100%; background:#000; display:block; z-index:10;}
        .jbFixed {position:fixed; top: 0px}
    </style>

    <div class="evtContent NSK" id="evtContainer">  
        <div class="evtCtnsBox jbMenu"> 
            <div class="time NSK-Black" id="newTopDday">
                국가직 <span>{{ (empty($arr_base['dday_data'][0]['DDay']) === false) ? 'D'.$arr_base['dday_data'][0]['DDay'] : '' }}</span>                      
            </div> 
        </div>

        <div class="evtCtnsBox evttop" data-aos="fade-up">                 
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2579_top.jpg" title="윌비스 적중 50선">                       
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2579_01.gif" title="적중 라이브 편성표">      
                <a href="#none" title="문자 알림 받기" style="position: absolute; left: 26.61%; top: 83.22%; width: 47.05%; height: 6.64%; z-index: 2;"></a>     
            </div>   
        </div> 

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2579_02.jpg" title="자료 다운로드"> 
                @if(sess_data('is_login') === true)
                    <a href="@if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif" @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') target="_blank" @endif title="다운로드" style="position: absolute; left: 66.88%; top: 49.24%; width: 24.73%; height: 41.62%; z-index: 2;"></a>
                @else
                    <a href="javascript:loginCheck();" title="다운로드" style="position: absolute; left: 66.88%; top: 49.24%; width: 24.73%; height: 41.62%; z-index: 2;"></a>
                @endif
            </div>
            <div class="liveWrap">
                @if(empty($data['PromotionLivePlayer']) === false && $data['PromotionLivePlayer'] == 'youtube')
                    @include('willbes.pc.promotion.live_video_youtube_partial')
                @else
                    @include('willbes.pc.promotion.live_video_partial')
                @endif
            </div>  
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif                
        </div> 

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2579_03.jpg" title="소문내기 이벤트"> 
                <a href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" title="공무원 갤러리" style="position: absolute; left: 15.09%; top: 91.6%; width: 14.38%; height: 6.33%; z-index: 2;"></a>
                <a href="https://cafe.daum.net/9glade" target="_blank" title="구꿈사" style="position: absolute; left: 29.91%; top: 91.6%; width: 14.38%; height: 6.33%; z-index: 2;"></a>
                <a href="https://cafe.naver.com/gugrade" target="_blank" title="공드림" style="position: absolute; left: 44.11%; top: 91.6%; width: 14.38%; height: 6.33%; z-index: 2;"></a>
                <a href="https://www.instagram.com" target="_blank" title="인스타그램" style="position: absolute; left: 58.39%; top: 91.6%; width: 14.38%; height: 6.33%; z-index: 2;"></a>
                <a href="https://www.willbes.net/classroom/home/index" target="_blank" title="게시판" style="position: absolute; left: 73.13%; top: 91.6%; width: 14.38%; height: 6.33%; z-index: 2;"></a>
            </div>             


            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
            @endif                      
        </div> 
	</div>
    <!-- End Container -->

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });

        /* 스크롤배너*/
        $( document ).ready( function() {
            var jbOffset = $( '.jbMenu' ).offset();
                $( window ).scroll( function() {
                    if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.jbMenu' ).addClass( 'jbFixed' );
            }
            else {
                    $( '.jbMenu' ).removeClass( 'jbFixed' );
                }
            });
        });

        function loginCheck(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
    
@stop