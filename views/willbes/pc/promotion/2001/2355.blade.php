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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .wrap {width:1120px; margin:0 auto; position:relative}
        .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:4px}

        /************************************************************/
        .evttop {background:url("https://static.willbes.net/public/images/promotion/2021/09/2355_top_bg.jpg") no-repeat center top;}
        .evt01 {background:url("https://static.willbes.net/public/images/promotion/2021/09/2355_01_bg.jpg")}
     

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evttop">           
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2355_top.jpg" title="한가위 드림 이벤트">   
        </div>

        <div class="evtCtnsBox evt01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2355_01.jpg" title="드림 패키지" data-aos="fade-left">
                <a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/185708" target="_blank" title="패키지 신청하기" style="position: absolute; left: 22.5%; top: 90.29%; width: 54.82%; height: 5.33%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2355_02.jpg" title="소문내기 이벤트" data-aos="fade-right">
            <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이벤트 이미지 다운로드" style="position: absolute; left: 22.86%; top: 65.8%; width: 54.82%; height: 5.6%; z-index: 2;"></a>
        </div> 
        
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif  

	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>
@stop