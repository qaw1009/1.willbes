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
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        var $regi_form = $('#' + ele_id);
        var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
        var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
        var params;

        if ($is_chk.length > 0) {
            if ($is_chk.is(':checked') === false) {
                alert('이용안내에 동의하셔야 합니다.');
                $is_chk.focus();
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

    {{--
     * 프로모션용 디데이카운터
     * @@param end_date [마감일 (YYYY-MM-DD)]
     * @@param end_time [마감시간 (HH:MM)]
     * @@param dis_type [txt, img]
     * @@param ele_id [element id]
    --}}
    function dDayCountDown(end_date, end_time, dis_type, ele_id) {
        if(!end_time) end_time = '00:00';
        if(!dis_type) dis_type = 'img';
        if(!ele_id){
            if(dis_type === 'img'){
                ele_id = 'newTopDday';
            }else{
                ele_id = 'ddayCountText';
            }
        }

        var dday = moment(end_date + ' ' + end_time + ':00', 'YYYY-MM-DD HH:mm:ss');
        var now, distance;
        var d, h, m, s;

        var dDayCountRepeat = setInterval(function(){
            now = moment().format('YYYY-MM-DD HH:mm:ss');
            distance = dday.diff(now, 'milliseconds');

            if (distance <= 0) {
                d=0;h=0;m=0;s=0;
                $('#' + ele_id).hide();
                clearInterval(dDayCountRepeat);
            } else {
                d = Math.floor(distance / (1000 * 60 * 60 * 24));
                h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                s = Math.floor((distance % (1000 * 60)) / 1000);

                if (h < 10) {
                    h = '0' + h;
                }
                if (m < 10) {
                    m = '0' + m;
                }
                if (s < 10) {
                    s = '0' + s;
                }

                if(dis_type === 'img') {
                    $('#dd1').attr('src', '{{ img_static_url('/promotion/common/') }}' + parseInt(d / 10) + '.png');
                    $('#dd2').attr('src', '{{ img_static_url('/promotion/common/') }}' + parseInt(d % 10) + '.png');

                    $('#hh1').attr('src', '{{ img_static_url('/promotion/common/') }}' + parseInt(h / 10) + '.png');
                    $('#hh2').attr('src', '{{ img_static_url('/promotion/common/') }}' + parseInt(h % 10) + '.png');

                    $('#mm1').attr('src', '{{ img_static_url('/promotion/common/') }}' + parseInt(m / 10) + '.png');
                    $('#mm2').attr('src', '{{ img_static_url('/promotion/common/') }}' + parseInt(m % 10) + '.png');

                    $('#ss1').attr('src', '{{ img_static_url('/promotion/common/') }}' + parseInt(s / 10) + '.png');
                    $('#ss2').attr('src', '{{ img_static_url('/promotion/common/') }}' + parseInt(s % 10) + '.png');
                }else {
                    $('#' + ele_id).html(d + '일 ' + h + ':' + m + ':' + s);
                }
            }

        }, 1000);
    }

    {{--
        * 프로모션용 텍스트 복사
        * @@param copy_txt [텍스트]
    --}}
    function copyTxt(copy_txt){
        if(!copy_txt) copy_txt = location.protocol + '//' + location.host + location.pathname;

        if (typeof window.clipboardData == 'object') {
            var check = window.clipboardData.setData('Text', copy_txt);
            if (check !== false) {
                alert("복사되었습니다. Ctrl+v 를 눌러 붙여넣기해 주세요.");
            }
        } else {
            var copy = function (e) {
                e.preventDefault();
                alert("복사되었습니다. Ctrl+v 를 눌러 붙여넣기해 주세요.");

                if (e.clipboardData) {
                    e.clipboardData.setData('text/plain', copy_txt);
                }
            };

            window.addEventListener('copy', copy);
            document.execCommand('copy');
            window.removeEventListener('copy', copy);
        }
    }
</script>