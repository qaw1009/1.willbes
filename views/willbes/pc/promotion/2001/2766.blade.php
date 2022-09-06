@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">       
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
            line-height:1.3;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000} */

        /************************************************************/
        .evttop {background:url("https://static.willbes.net/public/images/promotion/2022/09/2766_top_bg.jpg") no-repeat center top;}
    

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evttop" data-aos="fade-up">           
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2766_top.jpg" title="한가위 드림 이벤트">   
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2766_01.jpg" title="드림 패키지">
        </div>

        <div class="evtCtnsBox wrap" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2766_02.jpg" title="소문내기 이벤트">
            <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이벤트 이미지 다운로드" style="position: absolute; left: 22.86%; top: 65.8%; width: 54.82%; height: 5.6%; z-index: 2;"></a>
        </div> 
        
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif  

	</div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>
@stop