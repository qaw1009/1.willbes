@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/
</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2796m_top.jpg"  alt=" " />        
    </div>

    <div class="evtCtnsBox evt01" id="evt_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2796m_01.jpg" alt=" "/>       
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2796m_02.jpg" alt=" "/>       
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2796m_03.jpg" alt=" "/>       
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2796m_04.jpg" alt=" "/>  
        <a href="https://police.willbes.net/m/pass/offinfo/boardInfo/index/80" title="강의시간표 확인" target="_blank" style="position: absolute; left: 19.31%; top: 87.21%; width: 61.39%; height: 7.15%; z-index: 2;"></a>     
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2796m_05.jpg" alt="이미지 다운받기"/>
            <a href="javascript:void(0);" onclick="giveCheck(); return false;" title="할인쿠폰받기" style="position: absolute; left: 9.31%; top: 60.73%; width: 81.94%; height: 4.28%; z-index: 2;"></a>
            <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 9.31%; top: 78.57%; width: 81.94%; height: 4.28%; z-index: 2;"></a>
        </div>    
    </div>

    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
    @endif

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2796m_06_01.jpg" alt="경찰총평 이벤트2"/>  
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif       
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2796m_06_02.jpg" alt="기출해설 특강"/>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif   
    </div>
    
</div>

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>
<!-- End Container -->


    <script type="text/javascript"> 
        var $regi_form = $('#regi_form');
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>



@stop