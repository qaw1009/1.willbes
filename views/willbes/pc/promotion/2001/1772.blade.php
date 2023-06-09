@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .subContainer {
        min-height:auto !important;
        margin-bottom:0 !important;
    }
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
    /*****************************************************************/ 
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/08/1772_top_bg.jpg) no-repeat center top;}
    .evt00 {background:#0a0a0a}
    .evt01 {background:#f1f1f1;}
    .evt02 {background:#fff}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1772_00.jpg" alt="대한민국 경찰학원 1위">
        </div> 

        <div class="evtCtnsBox evt_top">  
            <div><img src="https://static.willbes.net/public/images/promotion/2020/08/1772_top.jpg" alt="코로나 19 극복 긴급지원프로젝트"></div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1772_01.jpg" alt="강사진">
        </div>  

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1772_02.jpg" alt="코로나19 극복 이벤트" usemap="#Map1772" border="0">
            <map name="Map1772">
                <area shape="rect" coords="256,720,865,815" href="javascript:;" onclick="giveCheck()" alt="할인쿠폰 받기">
                <area shape="rect" coords="364,1174,750,1222" href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="이벤트이미지받운받기">
            </map>
        </div> 
        
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)

            //다건 쿠폰 중복 발급 체크
            //arr_give_idx_chk: 콤마(,)를 붙여서 생성
            var arr_give_idx_chk = '';
            var give_overlap_chk = '';
            @if(empty($arr_promotion_params['give_type']) === false && $arr_promotion_params['give_type'] == 'coupons')
                arr_give_idx_chk = '&arr_give_idx_chk={{$arr_promotion_params['give_idx1']}},{{$arr_promotion_params['give_idx2']}}';
            @endif
            @if(empty($arr_promotion_params['give_overlap_chk']) === false)
                give_overlap_chk = '&give_overlap_chk={{$arr_promotion_params['give_overlap_chk']}}';
            @endif


            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}'+arr_give_idx_chk;
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
            @endif
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop