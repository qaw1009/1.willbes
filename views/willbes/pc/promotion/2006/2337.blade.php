@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        .evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.3);}

		/************************************************************/ 
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/08/2337_top_bg.jpg) no-repeat center top; background-size:2000px 1104px; height:1104px}
        
        .evt_top div {position:absolute; top:679px; z-index:10; text-align:center; width:100%}

        .evt_01 {padding:300px 0 0}

		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        .csTel {font-size:30px; text-align:center; margin-bottom:150px}
        .csTel span {font-size:50px; vertical-align:text-bottom; margin-left:30px; color:#007ffc}

        /************************************************************/      
    </style>     


	<div class="evtContent NSK">
    
		<div class="evtCtnsBox evt_top">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2337_top.png" alt="소문내기 이벤트"  data-aos="flip-left"/> 
            </div>             
		</div>

		<div class="evtCtnsBox evt_01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2337_01.jpg" alt="이벤트 안내"  data-aos="fade-right"/>
                <a href="@if($file_yn[1] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 이미지 다운" style="position: absolute; left: 25.18%; top: 12.86%; width: 48.04%; height: 7.95%; z-index: 2;"></a>

                <a href="javascript:void(0);" title="링크복사" onclick="copyTxt();" style="position: absolute; left: 25.09%; top: 64.74%; width: 54.38%; height: 9.68%; z-index: 2;"></a>

                <a href="https://www.facebook.com" target="_blank" title="페이스북" style="position: absolute; left: 20%; top: 81.79%; width: 6.25%; height: 14.02%; z-index: 2;"></a>
                <a href="https://www.instagram.com" target="_blank" title="인스타그램" style="position: absolute; left: 30.8%; top: 81.79%; width: 6.25%; height: 14.02%; z-index: 2;"></a>
                <a href="https://section.cafe.naver.com/ca-fe/" target="_blank" title="네이버카페" style="position: absolute; left: 41.43%; top: 81.79%; width: 6.25%; height: 14.02%; z-index: 2;"></a>
                <a href="https://top.cafe.daum.net/_c21_/home" target="_blank" title="다음카페" style="position: absolute; left: 52.14%; top: 81.79%; width: 6.25%; height: 14.02%; z-index: 2;"></a>
                <a href="https://section.blog.naver.com/BlogHome.naver" target="_blank" title="네이버블로그" style="position: absolute; left: 62.95%; top: 81.79%; width: 6.25%; height: 14.02%; z-index: 2;"></a>
                <a href="https://blog.daum.net" target="_blank" title="다음블로그" style="position: absolute; left: 73.66%; top: 81.79%; width: 6.25%; height: 14.02%; z-index: 2;"></a>
            </div>
		</div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 

        <div class="evtCtnsBox csTel NSK">
            빅테이터분석기사 자격증 문의 <span class="NSK-Black">1544-1661</span>
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