@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2739_top_bg.jpg) no-repeat center top; }
        .wb_02{background-color: #e1e1e1;}
        .wb_03 .youtube{position: absolute; top:66%; left:50%; transform: translateX(-50%); width:80%;}
        .wb_03 .embed-container{position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;}
        .wb_03 .embed-container iframe, .embed-container object, .embed-container embed{
            position: absolute;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
        }
        .wb_04{padding-bottom: 100px;}
    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2739_top.jpg" alt="행정법의 신"/>
        </div>

        <div class="evtCtnsBox wb_01"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2739_01.jpg" alt="수험생들을 멘붕에 빠뜨린 행정법!"/>
        </div>

        <div class="evtCtnsBox wb_02"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2739_02.jpg" alt="임병주 교수님과 함께면 가능합니다."/>

        </div>

        <div class="evtCtnsBox wb_03"  data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2739_03.jpg" alt="임병주 교수님과 만나면 더 쉬워집니다."/>
                <div class="youtube">
                    <div class="embed-container">
                        <iframe src="https://www.youtube.com/embed/Gp4IU7Ouykc?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="evtCtnsBox wb_04"  data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2739_04.jpg" alt="임병주 교수님만 믿고 따라오세요!"/>
                @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif
            </div>
        </div>

    </div>


    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>


{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop