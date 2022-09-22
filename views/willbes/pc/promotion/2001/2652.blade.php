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
        
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/05/2652_top_bg.jpg) no-repeat center top;position:relative;}
        .evtTop .ani{position:absolute;left:50%;top:250px;margin-left:-371px}

        .evt01 {background:#222545;} 

        .evt02 {background:#ededed;}  
        .youtube {position:absolute; top:411px; left:50%;z-index:1;margin-left:-490px}
        .youtube iframe {width:980px; height:551px}        
       
        .evt04 {padding-bottom:100px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">         

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2652_top.jpg"  alt="출간이벤트"/>
            <div class="ani">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2652_title.png" alt="문구" data-aos="zoom-in">
            </div>
        </div>     

        <div class="evtCtnsBox evt01" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2652_01.jpg"  alt="헌법 도약하기"/>            
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">          
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2652_02.jpg"  alt="커리큘럼"/>
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/-uuLC2sLTg0?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <a href="https://www.youtube.com/channel/UCDjImsjLcG6H9y9jonFF84Q" target="_blank" title="헌법도약 유튜브" style="position: absolute;left: 15.19%;top: 73.03%;width: 32.88%;height: 9.34%;z-index: 2;"></a>
                <a href="https://cafe.daum.net/doyag" target="_blank" title="이국령 카페" style="position: absolute;left: 52.19%;top: 73.03%;width: 32.88%;height: 9.34%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">          
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2652_03.jpg"  alt="소문내고 교재받자"/>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 51.01%;top: 69.99%;width: 34.88%;height: 5.34%;z-index: 2;"></a>
            </div>  
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
        @endif

        <div class="evtCtnsBox evt04" data-aos="fade-up">                 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2652_04.jpg"  alt="수강신청"/> 
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif             
        </div>

    </div>

   <!-- End Container -->

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>    
    <script type="text/javascript">
        $(document).ready(function() {
            AOS.init();       
        });
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop   