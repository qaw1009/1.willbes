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

        .sky {position:fixed; top:200px; width:150px; right:0; z-index:10;}        
        .sky a {display:block; margin-bottom:10px}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2742_top_bg.jpg) no-repeat center top;height:1130px;}
        .evt_top .main_img {position:absolute; top:365px; left:50%; margin-left:-518.5px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2022/08/2742_sky01.png" alt="이벤트1" ></a>
            <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2022/08/2742_sky02.png" alt="이벤트2" ></a>
            <a href="#evt_03"><img src="https://static.willbes.net/public/images/promotion/2022/08/2742_sky03.png" alt="무료특강" ></a>
        </div>    

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2742_top.png"  alt="기출해서 무료특강" data-aos="fade-down" class="main_img"/>        
        </div>

        <div class="evtCtnsBox evt01" id="evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2742_01.jpg" alt="경찰총평 이벤트1"/>       
        </div>

        <div class="evtCtnsBox evt01s" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2742_01s.jpg" alt="이미지 다운받기"/>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 56.81%;top: 21.19%;width: 29.88%;height: 12.34%;z-index: 2;"></a>
            </div>    
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
        @endif

        <div class="evtCtnsBox evt02" id="evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2742_02.jpg" alt="경찰총평 이벤트2"/>       
        </div>

        <div class="evtCtnsBox evt02s" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2742_02s.jpg" alt="이벤트 유의사항"/>       
        </div>

        <div class="evtCtnsBox evt03 pb100" id="evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2742_03.jpg" alt="기출해설 특강"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif     
        </div>

    </div>

<!-- End evtContainer -->

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