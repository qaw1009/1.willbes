@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            background:#fff;
            position:relative;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/      

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2358_top_bg.jpg) center top no-repeat;}   

        .evt01 {position:relative;}
        .youtube {position:absolute; top:425px; left:50%;}
        .youtube iframe {width:537px; height:297px}

        .evt03 {background:#D5DFE9;}

        .evt05 {padding-bottom:100px;}
     
    </style>

    <div class="evtContent NSK" id="evtContainer">   

        <div class="evtCtnsBox wb_top" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_top.jpg" title="저스티스 범죄학" />       
        </div>       

        <div class="evtCtnsBox evt01" data-aos="fade-right">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_01.jpg"  alt="범죄학의 정석" />
                <a href="https://police.willbes.net/professor/show/cate/3002/prof-idx/51278?subject_idx=2178&subject_name" target="_blank" title="교수님_홈" style="position: absolute;left: 72.98%;top: 75.03%;width: 11.46%;height: 7.27%;z-index: 2;"></a>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/8T1HxQ5PPhQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_02.jpg"  alt="무엇을 어떻게" />
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_03.jpg"  alt="커리큘럼" />
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_04.jpg"  alt="소문내기" />
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="범죄학 이미지" style="position: absolute;left: 41.98%;top: 55.03%;width: 34.46%;height: 7.77%;z-index: 2;"></a>
                <a href="http://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute;left: 36.98%;top: 87.03%;width: 6.46%;height: 10.77%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute;left: 46.98%;top: 87.03%;width: 6.46%;height: 10.77%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/kts9719" target="_blank" title="닥공사" style="position: absolute;left: 56.98%;top: 87.03%;width: 6.46%;height: 10.77%;z-index: 2;"></a>
            </div>    
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox evt05" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2358_05.jpg"  alt="100프로무료" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
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
 