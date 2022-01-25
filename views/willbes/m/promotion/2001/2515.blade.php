@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/   
    

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
    <div class="evtCtnsBox"  data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2515_mtop.jpg" alt="소문내고 강의할인받자" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2515_m01.jpg" alt="설문조사" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2515_m02.jpg" alt="선물" >
        <a href="https://police.willbes.net/m/lecture/index/cate/3001/pattern/only?search_order=course&school_year=2022" target="_blank" title="단강좌" style="position: absolute;left: 16.17%;top: 38.16%;width: 35.69%;height: 6.49%;z-index: 2;"></a>
        <a href="https://police.willbes.net/m/package/index/cate/3001/pack/648001?course_idx=1004&school_year=&prod_name=22%EB%85%84+1%EC%9B%94" target="_blank" title="기본 강좌" style="position: absolute;left: 15.17%;top: 64.66%;width: 33.39%;height: 5.89%;z-index: 2;"></a>
        <a href="https://police.willbes.net/m/promotion/index/cate/3001/code/2446" target="_blank" title="문제풀이 종합반" style="position: absolute;left: 49.37%;top: 64.66%;width: 38.39%;height: 5.89%;z-index: 2;"></a>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2515_m03.jpg" alt="이벤트" >
        <a href="javascript:void(0)" onclick="giveCheck();" title="쿠폰받기" style="position: absolute;left: 21.86%;top: 52.51%;width: 55.92%;height: 5.89%;z-index: 2;"></a>
        <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운받기" style="position: absolute;left: 21.76%;top: 75.21%;width: 55.92%;height: 5.89%;z-index: 2;"></a>
        <a href="https://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute; left: 5.42%; top: 91.46%; width: 21.39%; height: 5.49%;  z-index: 2;"></a>
        <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute; left: 28.47%; top: 91.46%; width: 21.39%; height: 5.49%;  z-index: 2;"></a>
        <a href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" title="공무원갤러리" style="position: absolute; left: 51.53%; top: 91.46%; width: 21.39%; height: 5.49%; z-index: 2;"></a>
        <a href="https://gall.dcinside.com/board/lists?id=policeofficer" target="_blank" title="순경마이너갤러리" style="position: absolute; left: 74.17%; top: 91.46%; width: 21.39%; height: 5.49%;  z-index: 2;"></a>
    </div>  
    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial')
    @endif 

</div>

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>
<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $( document ).ready( function() {
    AOS.init();
    } );
</script>

<script type="text/javascript">
    $regi_form = $('#regi_form');

    {{--쿠폰발급--}}
    function giveCheck() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
        @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
        @endif
    }
</script>

@stop