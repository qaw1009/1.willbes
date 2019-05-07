<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
    {{--
     * 프로모션용 장바구니 저장 및 바로결제
     * @@param ele_id [등록폼 element id]
     * @@param field_name [상품코드 input name]
     * @@param cart_type [장바구니 타입 (tab)]
     * @@param learn_pattern [학습형태]
     * @@param is_direct_pay [바로결제여부 (Y/N)]
    --}}
    function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay)
    {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

        var $regi_form = $('#' + ele_id);
        var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
        var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
        var params;

        if ($is_chk.length > 0) {
            if ($is_chk.is(':checked') === false) {
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
        }

        if ($prod_code.length < 1) {
            alert('강좌를 선택해 주세요.');
            return;
        }

        {{-- 장바구니 저장 기본 파라미터 --}}
        params = [
            { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
            { 'name' : '_method', 'value' : 'POST' },
            { 'name' : 'cart_type', 'value' : cart_type },
            { 'name' : 'learn_pattern', 'value' : learn_pattern },
            { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
        ];

        {{-- 선택된 상품코드 파라미터 --}}
        $prod_code.each(function() {
            params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
        });

        {{-- // 장바구니 저장 URL로 전송 --}}
        formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
    }

    // 날짜차이 계산
    var dDayDateDiff = {
        inDays: function(dd1, dd2) {
            var tt2 = dd2.getTime();
            var tt1 = dd1.getTime();

            return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
        },
        inWeeks: function(dd1, dd2) {
            var tt2 = dd2.getTime();
            var tt1 = dd1.getTime();

            return parseInt((tt2-tt1)/(24*3600*1000*7));
        },
        inMonths: function(dd1, dd2) {
            var dd1Y = dd1.getFullYear();
            var dd2Y = dd2.getFullYear();
            var dd1M = dd1.getMonth();
            var dd2M = dd2.getMonth();

            return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
        },
        inYears: function(dd1, dd2) {
            return dd2.getFullYear()-dd1.getFullYear();
        }
    };

    {{--
     * 프로모션용 디데이카운터
     * @@param end_date [마감일 (YYYYMMDD)]
    --}}
    function dDayCountDown(end_date) {
        // 마감일 1개월전 날짜
        var arr_start_date = moment(end_date).add(-1, 'months').format('YYYY-M-D').split('-');
        var event_day = new Date(arr_start_date[0], arr_start_date[1], arr_start_date[2], 23, 59, 59);
        var now = new Date();
        var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));

        var Monthleft = event_day.getMonth() - now.getMonth();
        var Dateleft = dDayDateDiff.inDays(now, event_day);
        var Hourleft = timeGap.getHours();
        var Minuteleft = timeGap.getMinutes();
        var Secondleft = timeGap.getSeconds();

        if ((event_day.getTime() - now.getTime()) > 0) {
            $('#dd1').attr('src', '{{ img_static_url('promotion/common/') }}' + parseInt(Dateleft/10) + '.png');
            $('#dd2').attr('src', '{{ img_static_url('promotion/common/') }}' + parseInt(Dateleft%10) + '.png');

            $('#hh1').attr('src', '{{ img_static_url('promotion/common/') }}' + parseInt(Hourleft/10) + '.png');
            $('#hh2').attr('src', '{{ img_static_url('promotion/common/') }}' + parseInt(Hourleft%10) + '.png');

            $('#mm1').attr('src', '{{ img_static_url('promotion/common/') }}' + parseInt(Minuteleft/10) + '.png');
            $('#mm2').attr('src', '{{ img_static_url('promotion/common/') }}' + parseInt(Minuteleft%10) + '.png');

            $('#ss1').attr('src', '{{ img_static_url('promotion/common/') }}' + parseInt(Secondleft/10) + '.png');
            $('#ss2').attr('src', '{{ img_static_url('promotion/common/') }}' + parseInt(Secondleft%10) + '.png');

            setTimeout(function() {
                dDayCountDown(end_date);
            }, 1000);
        } else {
            $('#newTopDday').hide();
        }
    }
</script>