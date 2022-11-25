@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.4; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/
   
    .evt01 .youtube {position:relative; padding-top:30px; padding-bottom:56.25%; margin:0; height:0;background: #000;} 
    .evt01 .youtube iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%; z-index: 2;}

    .evt05 {background:#F5F5F5; padding-bottom:8vh}
    .slide_con {padding:0 30px 30px}
    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .slide_con .bx-wrapper .bx-pager {
        width: auto;
        bottom: -30px;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #2D57A3;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }    

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) { 
        
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }
    
</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2826m_top.jpg" alt="100일 완성반" >        
    </div> 

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2826m_01.jpg" alt="고득점 형사법"/>
        <div class="youtube">
            <iframe src="https://www.youtube.com/embed/ojZcGpQXrcs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2826m_01_01.jpg" alt=""/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2826m_02.jpg"  alt="합격률"/>               
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2826m_03.jpg"  alt="커리큘럼"/>               
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2826m_04.jpg"  alt="경찰학 교재"/>                
    </div>

    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2826m_05.jpg" alt="리얼 수강후기" >
        <div class="slide_con">
            <ul id="slidesImg2">
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment01.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment02.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment03.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment04.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment05.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment06.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment07.png" alt="" /></li>                
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment08.png" alt="" /></li>               
            </ul>
        </div>
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2826m_06.jpg"  alt="그레이스 호퍼 명언"/>               
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2826m_08.jpg" alt="이미지 다운받기"/>
            <a href="javascript:void(0);" onclick="giveCheck(); return false;" title="할인쿠폰받기" style="position: absolute;left: 25.31%;top: 62.73%;width: 49.44%;height: 4.38%;z-index: 2;"></a>
            <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 59.31%;top: 71.27%;width: 33.94%;height: 7.58%;z-index: 2;"></a>
        </div>
    </div>

    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
    @endif

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2826m_07.jpg"  alt="후회없는 선택"/>
            <a href="https://police.willbes.net/m/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" title="신청하기" style="position: absolute;left: 34.47%;top: 89.65%;width: 31.25%;height: 5.57%;z-index: 2;"></a>
        </div>      
    </div>
</div>
<!-- End Container -->

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">
    $(document).ready( function(){
        AOS.init();
    });
    
    /*슬라이드*/
    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg2").bxSlider({
            auto: true,
            speed: 500,
            pause: 4000,
            mode:'horizontal',
            autoControls: false,
            controls:false,
            pager:true,
        });
    });

    {{--쿠폰발급--}}
    function giveCheck() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        $regi_form = $('#regi_form');
        @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&give_idx={{$arr_promotion_params['give_idx']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('전국 모의고사 할인쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
        @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
        @endif
    }
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop