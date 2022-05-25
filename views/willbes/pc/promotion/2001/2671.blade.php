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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtContent span {vertical-align:auto}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}*/

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}

        .evt00 {background:#0a0a0a}       

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/05/2671_top_bg.jpg) no-repeat center top;}
       
        .evt01 {background:#e7e7e7}
        
        .evt02 {background:#fff;position:relative;}
        .youtube {position:absolute; top:380px; left:50%;z-index:1;margin-left:-430px}
        .youtube iframe {width:860px; height:484px}

        .evt03 {background:#f6f6f6}        

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#event01">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2671_sky.png" alt="소문내기">
            </a>         
        </div>

        <div class="evtCtnsBox evt00"  data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>   

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2671_top.jpg"  alt="신기훈 헌법"/>           
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2671_01.jpg"  alt="생생한 후기"/>            
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2671_02.jpg"  alt="학습 가이드"/>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/A9Vcvs072l8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>                 
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">      
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2671_03.jpg"  alt="필요한 만큼만"/>    
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up" id="event01">
            <div class="wrap">          
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2671_04.jpg"  alt="이벤트 홍보"/>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 51.39%;top: 75.93%;width: 33.88%;height: 4.34%;z-index: 2;"></a>
            </div>     
        </div>     

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
        @endif      

        <div class="evtCtnsBox evt05 pb100" data-aos="fade-up">                     
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2671_05.jpg"  alt="신규 개설 강좌"/>             
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