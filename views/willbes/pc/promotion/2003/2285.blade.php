@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            position:relative
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/
        .sky {position:fixed;top:225px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}
 
        .evtTop {background:#e5effb url(https://static.willbes.net/public/images/promotion/2021/07/2285_top_bg.jpg) no-repeat center top;}
        .evtTop .bigBtn {display:block; font-size:24px; color:#fff; background:#1f2059; width:700px; margin:20px auto 30px; padding:20px 0; border-radius:40px}
        .evtTop .sBtn {display:block; font-size:16px; color:#fff; background:#222; width:200px; margin:0 auto; padding:10px 0;}

        .evt02 {background:#e5effb url(https://static.willbes.net/public/images/promotion/2021/07/2285_02_bg.jpg) repeat-x center top;}
        .evt04 {background:#354251}

    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="javascript:certOpen();">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_sky.png" alt="타사 수강증 인증">
            </a>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_top.jpg" alt="환승 이벤트" />          
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_01.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_02.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_03.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt04">
            <div class="wrap">
                <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}

                    <input type="hidden" name="learn_pattern" value="periodpack_lecture"/>  {{-- 학습형태 --}}
                    <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
                    <input type="hidden" name="ca_idx" id="ca_idx" value=""/>    {{-- 인증 여부 --}}
                    <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="184029:613001:184029" data-prod-code="184029" data-parent-prod-code="184029" data-group-prod-code="184029" data-sale-price="0">
                    <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="618001">

                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_04.jpg" alt="" />
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/184027" target="_blank" title="환승인증 후 수강신청" style="position: absolute; left: 55.98%; top: 20.39%; width: 21.43%; height: 4.38%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/184028" target="_blank" title="환승인증 후 수강신청" style="position: absolute; left: 55.98%; top: 37.65%; width: 21.43%; height: 4.38%; z-index: 2;"></a>
    {{--                <a href="https://pass.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/184029" target="_blank" title="체험팩 신청하기" style="position: absolute; left: 18.3%; top: 79.8%; width: 63.39%; height: 6.14%; z-index: 2;"></a>--}}
                    <a href="#none" name="btn_direct_pay" title="체험팩 신청하기" style="position: absolute; left: 18.3%; top: 79.8%; width: 63.39%; height: 6.14%; z-index: 2;"></a>
                </form>

            </div>
        </div>
    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/product_util.js"></script>
    <script>    
        /* 팝업창 */ 
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

        var $regi_form = $('#regi_form');

        // 바로결제 버튼 클릭
        $regi_form.on('click', 'a[name="btn_direct_pay"]', function () {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var order_cnt = {{ $arr_base['order_count'] or 0 }};
            if(order_cnt > 0){
                alert('이미 구매한 상품입니다.');
                return;
            }

            if(certCheck() == false) {return;}
            var $is_direct_pay = $(this).data('direct-pay');
            cartNDirectPay($regi_form, $is_direct_pay, 'Y');
        });

        function certCheck() {
            var is_ok = false;
            var ca_idx = '';
            var url = frontUrl('/certApply/checkCertApply');
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                'prod_code' : $regi_form.find('input[name="prod_code[]"]:checked').data('prod-code')
            };
            sendAjax(url, data, function(ret) {
                ca_idx = ret.ret_data['CaIdx'];
                is_ok = true;
            }, showAlertError, false, 'POST');
            $("#ca_idx").val(ca_idx);
            if(is_ok) {return;} else {return false;}
        }
    </script>


@stop