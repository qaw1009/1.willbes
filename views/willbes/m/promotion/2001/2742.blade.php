@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2742m_top.jpg"  alt="기출해서 무료특강" />        
    </div>

    <div class="evtCtnsBox evt01" id="evt_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2742m_01.jpg" alt="경찰총평 이벤트1"/>       
    </div>

    <div class="evtCtnsBox evt01s" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2742m_01s.jpg" alt="이미지 다운받기"/>
            <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 9.31%;top: 32.19%;width: 81.58%;height: 10.34%;z-index: 2;"></a>
        </div>    
    </div>

    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
    @endif

    <div class="evtCtnsBox evt02" id="evt_02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2742m_02.jpg" alt="경찰총평 이벤트2"/>       
    </div>

    <div class="evtCtnsBox evt02s" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2742m_02s.jpg" alt="이벤트 유의사항"/>       
    </div>

    {{--기본댓글--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_normal_partial')
    @endif

    <div class="evtCtnsBox evt03 pb50" id="evt_03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2742m_03.jpg" alt="기출해설 특강"/>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif     
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

@stop