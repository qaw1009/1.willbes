<form id="regi_visit_form" name="regi_visit_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}

    {{-- 장바구니 레이어 --}}
    <div id="basket_box" class="basketBox">
        <div class="MoreBtn"><a><img src="{{ img_url('m/mypage/icon_arrow_on.png') }}"></a></div>
        <div class="basketInfo" style="display: block;">
            <ul id="basket_list" class="basketList">
            </ul>
            <div class="basketPrice">
                <ul>
                    <li>
                        총 주문금액 <span id="total_price">0원</span>
                    </li>
                </ul>
            </div>
            <div class="infoBox">
                <p><input type="checkbox" id="agree" name="agree" value="Y"> <a href="#none">유의사항을 모두 확인했고 동의합니다. ▼</a></p>
                <ul style="display: block;">
                    <li>수강증 분실시 재발급/변경/환불되지 않으며, 판매 및 양도되지 않습니다.<br>
                        (절도, 위.변조시 법적 책임이 따릅니다.)</li>
                    <li>수강 총 횟수의 1/2 미경과시에만 변경 및 환불이 가능합니다.</li>
                </ul>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    var $regi_off_form = $('#regi_off_form');
    var $regi_visit_form = $('#regi_visit_form');

    $(document).ready(function() {
        // 검색어 입력 후 엔터
        $('#search_value').on('keyup', function() {
            if (window.event.keyCode === 13) {
                goSearch();
            }
        });

        // 검색 버튼 클릭
        $('#btn_search').on('click', function() {
            goSearch();
        });

        var goSearch = function() {
            goUrl('search_text', Base64.encode(document.getElementById('search_keyword').value + ':' + document.getElementById('search_value').value));
        };

        // 단과반 체크박스 클릭
        $regi_off_form.on('change', '.chk_products', function() {
            var $_id = $(this).data('prod-code');
            var $_val = $(this).val();
            if ($(this).prop('checked') === true) {
                eachProductCart($_id, $_val);
            } else {
                seachCartIdx($_id);
            }
        });

        // 방문결제 접수 버튼 클릭
        $('#btn_visit_box').on('click', '#btn_visit_pay', function() {
            if ($regi_visit_form.find('input[name="agree"]:checked').length < 1) {
                alert('유의사항을 확인 후 동의해 주세요.');
                return;
            }

            if (confirm('방문접수를 신청하시겠습니까?')) {
                var url = '{{ front_url('/order/visit') }}';
                ajaxSubmit($regi_visit_form, url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.replace(ret.ret_data.ret_url);
                    }
                }, showValidateError, null, false, 'alert');
            }
        });

        // 유의사항 텍스트 클릭
        $('.basketBox .basketInfo .infoBox p a').click(function() {
            var $lec_info_table = $(this).parents('.basketInfo').find('.infoBox ul');
            if ($lec_info_table.is(':hidden')) {
                $lec_info_table.show().css('display','block');
                $(this).text('유의사항을 모두 확인했고 동의합니다. ▼');
            } else {
                $lec_info_table.hide().css('display','none');
                $(this).text('유의사항을 모두 확인했고 동의합니다. ▲');
            }
        });

        // 장바구니 조회
        cartList();
        sameContent();
    });

    {{-- 장바구니 목록 --}}
    function cartList() {
        var url = '{{ front_url('/offVisitLecture/cartList/')}}';
        var data = {
            '{{ csrf_token_name() }}' : $regi_off_form.find('input[name="{{ csrf_token_name() }}"]').val()
        };

        sendAjax(url, data, function(ret) {
            var seq = 0;
            var price_sum = 0;
            var html = '';
            if(ret.data.length > 0) {
                $.each(ret.data, function (i, item) {
                    html += '<li class="basket-row" id="'+ item.CartIdx + '" data-prod-code="' + item.ProdCode + '" data-sub-prod-code="' + item.ProdCodeSub + '">\n';
                    html += '   <p><span>' + item.CampusCcdName + '</span> ' + item.ProdName + '\n';
                    {{-- 단과할인율 표기 --}}
                    if (typeof item.IsLecDisc !== 'undefined' && item.IsLecDisc === 'Y') {
                        html += '<div class="tx-red ml40">' + item.LecDiscTitle + ' (↓' + item.LecDiscRate + item.LecDiscRateUnit + ')</div>\n';
                    }
                    html += '   </p>\n';
                    html += '   <strong>' + addComma(item.RealSalePrice) + '원</strong>\n';
                    html += '   <a href="#none" onclick="rowDelete(\'' + item.CartIdx + '\')">삭제</a>\n';
                    html += '</li>\n';

                    seq += 1;
                    price_sum += parseInt(item.RealSalePrice);
                });
            } else {
                html = '<li><p>장바구니가 비었습니다.</p></li>\n';
            }

            $regi_visit_form.find('#basket_list').html(html);
            $regi_visit_form.find('#total_price').html(addComma(price_sum) + '원');
        }, function(ret){
            cartEtcError('장바구니 목록 조회시 오류가 발생되었습니다.');
        }, false, 'POST');
    }

    {{-- 개별상품 장바구니 담기 --}}
    function eachProductCart(id, val) {
        var $_prod_code_array = [];
        var $_learn_pattern = '{{$learn_pattern}}';
        var $_is_direct_pay = 'N';
        var $_is_visit_pay = 'Y';
        var $_cart_type = 'off_lecture';

        $_prod_code_array.push(val);

        var url = frontUrl('/cart/store');
        var data = $.extend(arrToJson($regi_off_form.find('input[type="hidden"]').serializeArray()), {
            'learn_pattern' : $_learn_pattern,
            'is_direct_pay' : $_is_direct_pay,
            'is_visit_pay' : $_is_visit_pay,
            'cart_type' : $_cart_type,
            'prod_code' : $_prod_code_array
        });
        sendAjax(url, data, function(ret) {
            if(ret.ret_cd) {
                cartList();
            }
        }, function(ret){
            cartError(id, ret.ret_msg);
        }, false, 'POST');
    }

    {{-- 상품코드가 일치하는 장바구니 row 삭제 --}}
    function seachCartIdx(prod_code) {
        var $_cart_row = $regi_visit_form.find('#basket_list .basket-row[data-prod-code="' + prod_code + '"]');
        var $_cart_idx = '';

        if ($_cart_row.length > 0) {
            $_cart_idx = $_cart_row.prop('id') || 0;
            eachProductCartRemove($_cart_idx)
        }
    }

    {{-- 장바구니 삭제 --}}
    function eachProductCartRemove(cart_idx) {
        var url = '{{ front_url('/cart/destroy')}}';
        var data = {
            '{{ csrf_token_name() }}' : $regi_off_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            '_method' : 'DELETE',
            '_del_type' : 'each',
            'cart_idx' : cart_idx
        };
        sendAjax(url, data, function(ret) {
            if (ret.ret_cd) {
                cartList();
                sameContent();
            }
        }, function(ret){
            cartEtcError('장바구니 삭제시 오류가 발생되었습니다.');
        }, false, 'POST');
    }

    {{-- 장바구니 row 삭제 --}}
    function rowDelete(cart_idx) {
        var $_cart_row = $regi_visit_form.find('#basket_list #' + cart_idx);
        var $_prod_code = $_cart_row.data('prod-code');
        eachProductCartRemove(cart_idx, $_prod_code)
        $_cart_row.remove();
    }

    {{-- 장바구니 입력 오류 --}}
    function cartError(id, err_msg) {
        alert(err_msg);
        $('#' + id).prop('checked', false);
    }

    {{-- 장바구니 조회/삭제 오류 --}}
    function cartEtcError(err_msg) {
        alert(err_msg);
    }

    {{-- 상품목록과 장바구니 동기화 --}}
    function sameContent() {
        var $_cart_rows = $regi_visit_form.find('#basket_list .basket-row');
        var $_prod_code;

        @if($class_type == 'offvisitpackage')
            {{-- 패키지일 경우 하위상품 동기화 --}}
            var $_prod_code_sub, $_arr_prod_code_sub;

            $.each($_cart_rows, function() {
                $_prod_code = $(this).data('prod-code');
                $_prod_code_sub = $(this).data('sub-prod-code').toString();

                if ($regi_off_form.find('input[name="prod_code[]"][data-prod-code="' + $_prod_code + '"]').length > 0 && $_prod_code_sub.length > 0) {
                    $_arr_prod_code_sub = $_prod_code_sub.split(',');

                    for (var i = 0; i < $_arr_prod_code_sub.length; i++) {
                        $regi_off_form.find('input[name="prod_code_sub[]"][value="' + $_arr_prod_code_sub[i] + '"]').prop('checked', true);
                    }
                }
            });
        @else
            {{-- 단과반일 경우 상품목록과 장바구니 동기화 --}}
            // 장바구니 체크 (장바구니에 상품코드가 존재하면 선택 처리)
            $.each($_cart_rows, function() {
                $_prod_code = $(this).data('prod-code');
                $regi_off_form.find('input[name="prod_code[]"][data-prod-code="' + $_prod_code + '"]').prop('checked', true);
            });

            // 선택된 상품코드 체크 (선택된 상품코드가 장바구니에 없다면 선택해제 처리)
            $.each($regi_off_form.find('input[name="prod_code[]"]:checked'), function() {
                $_prod_code = $(this).data('prod-code');
                if ($_cart_rows.filter('[data-prod-code="' + $_prod_code + '"]').length < 1) {
                    $(this).prop('checked', false);
                }
            });
        @endif
    }
</script>
