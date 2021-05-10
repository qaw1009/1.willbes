@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;position:relative;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2195_top_bg.jpg) no-repeat center;}

        .wb_cts03 {background:#f0f0f0;padding-bottom:200px;}

        .wb_cts04 {padding-top:150px;}

        .wb_cts05 {padding:80px 0 130px;}

        .wb_cts06 {background:#3d505f;}

        .evtCtnsBox .link a:hover {background-color:rgba(0,0,0,0.2)}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2195_top.jpg" alt="승진 응원 이벤트" />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <div class="link">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2195_01.jpg" alt="인스타그램에 소문" />
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="홍보 이미지1" style="position: absolute; left: 37.55%; top: 48.14%; width: 6.54%; height: 2.86%; z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" title="홍보 이미지2" style="position: absolute; left: 55.55%; top: 48.14%; width: 6.54%; height: 2.86%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02">
            <div class="link">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2195_02.jpg" alt="할인쿠폰 받기" />
                <a href="javascript:void(0);" title="할인 쿠폰받기" onclick="giveCheck(0,713002);" style="position: absolute; left: 52.55%; top: 23.14%; width: 20.54%; height: 5.86%; z-index: 2;"></a>
                <a href="https://www.instagram.com" target="_blank" title="인스타그램" style="position: absolute; left: 47.55%; top: 57.14%; width: 8.54%; height: 5.86%; z-index: 2;"></a>
                {{--홍보url--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
                @endif
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03">
            <div class="link">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2195_03.jpg" alt="100% 무료쿠폰 받기" />
                <a href="javascript:void(0);" title="100% 무료쿠폰 받기" onclick="giveCheck(1,713001);" style="position: absolute; left: 50.55%; top: 55.14%; width: 20.54%; height: 4.86%; z-index: 2;"></a>
                {{--기본댓글--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_normal_partial')
                @endif
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <div class="link">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2195_04.jpg" alt="신광은 형법 심화이론 강좌" />
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05">
            <a href="https://police.willbes.net/promotion/index/cate/3006/code/2036" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2195_05.jpg" alt="경찰승진을 위한 맞춤형 패스" />
            </a>
        </div>

        <div class="evtCtnsBox wb_cts06">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2195_06.jpg" alt="화이팅" />
        </div>

    </div>

    <!-- End Container -->

    <script>
        var $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck(give_idx, comment_ccd) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['arr_give_idx_chk']) === false)

            var promotion_params = "?give_type={{$arr_promotion_params['give_type']}}&give_overlap_chk={{$arr_promotion_params['give_overlap_chk']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}&event_code={{$data['ElIdx']}}&give_idx="+give_idx+"&comment_ccd="+comment_ccd;
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}' + promotion_params;

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
@stop