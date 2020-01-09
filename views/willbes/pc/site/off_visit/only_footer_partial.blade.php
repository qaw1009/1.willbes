<form id="regi_visit_form" name="regi_visit_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <div class="Aside widthAuto290 NG ml20">
        <div class="Tit tx-light-black">장바구니</div>
        <div class="Lec-Pocket-Grid">
            <div id="basket_list"></div>
        </div>
        <table cellspacing="0" cellpadding="0" class="listTable lecPocketTable tx-black p_re">
            <tbody>
            <tr class="AllchkBox"><td><input type="checkbox" id="agree" name="agree" value="Y"/></td></tr>
            <tr class="replyList w-replyList">
                <td class="w-tit">
                    유의사항을 모두 확인했고 동의합니다
                    <span class="arrow-Btn">></span>
                </td>
            </tr>
            <tr class="replyTxt w-replyTxt bg-light-gray">
                <td class="w-txt">
                    <div class="w-txt-Grid">
                        <div class="info-txt">
                            - 수강증 분실시 재발급/변경/환불되지 않으며,<br/>
                            판매 및 양도되지 않습니다.<br/>
                            <span class="tx-blue">(절도, 위.변조시 법적 책임이 따릅니다.)</span>
                        </div>
                    </div>
                    <div class="w-txt-Grid">
                        <div class="info-txt">
                            - 수강 총 횟수의 1/2 미경과시에만 변경 및<br/>
                            환불이 가능합니다.
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="priceBox">
            <ul>
                <li class="p-tit">
                    <span class="a-txt">총</span>
                    <span class="tx-light-blue" id="totalCnt">0</span>건
                </li>
                <li class="w-price t-price tx-light-blue NGEB"  id="totalPrice">0원</li>
            </ul>
        </div>
        <div class="btnAuto250 GM h36">
            <button type="button" name="btn_visit_pay" class="mem-Btn bg-blue bd-dark-blue">
                <span class="">방문결제 접수</span>
            </button>
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

        {{-- checkbox 클릭시 --}}
        $regi_off_form.on('change', '.chk_products', function() {
            var $_id = $(this).data('prod-code');
            var $_val = $(this).val();
            if ($(this).prop('checked') === true) {
                eachProductCart($_id, $_val);
            } else {
                seachCartIdx($_id);
            }
        });

        {{-- 장바구니 추출 / 왼쪽-오른쪽 동기화 --}}
        cartList();
        sameContent();

        // 방문결제 접수 버튼 클릭
        $regi_visit_form.on('click', 'button[name="btn_visit_pay"]', function() {
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
    });

    {{-- 개별상품 장바구니 담기 --}}
    function eachProductCart(id,val) {
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
                    html += '<div class="LecPocketlist" id="'+ item.CartIdx + '" data-prod-code="'+item.ProdCode+'" data-sub-prod-code="'+item.ProdCodeSub +'">';
                    html += '   <span class="oBox campus_'+item.CampusCcd+' ml10 NSK">' + item.CampusCcdName + '</span>\n';
                    html += '   <span class="w-tit p_re">&nbsp;' + item.ProdName + '\n';
                    html += '          <a class="closeBtn" href="javascript:;" onclick="rowDelete(\'' + item.CartIdx + '\')"><img src="{{ img_url('cart/close.png') }}"></a>\n';
                    html += '   </span>\n';
                    html += '   <ul class="NSK"><li class="price tx-blue f_right">' + addComma(item.RealSalePrice) + '원</li></ul>\n';
                    {{-- 단과할인율 표기 --}}
                    if (typeof item.IsLecDisc !== 'undefined' && item.IsLecDisc === 'Y') {
                        html += '<div class="tx-red tx12 c_both">' + item.LecDiscTitle + ' (↓' + item.LecDiscRate + '%)</div>\n';
                    }
                    html += '</div>\n';
                    seq += 1;
                    price_sum += parseInt(item.RealSalePrice);
                });
            } else {
                html = '<div class="LecPocketlist">\n'
                    + '  장바구니가 비었습니다.\n'
                    + '</div>\n';
            }

            $("#basket_list").html(html);
            $("#totalCnt").html(seq);
            $("#totalPrice").html(addComma(price_sum)+'원');

        }, function(ret){
            cartEtcError('장바구니 목록 조회시 오류가 발생되었습니다.');
        }, false, 'POST');
    }

    {{-- 상품코드로 cartidx 찾기 --}}
    function seachCartIdx(prod_code) {
        var $_basket_cnt = $(".LecPocketlist").length;
        var $_cart_idx = '';

        if($_basket_cnt > 0) {
            for(k=0;k<$_basket_cnt;k++) {
                if( $( ".LecPocketlist:eq("+k+")" ).data('prod-code') == prod_code) {
                    $_cart_idx = $( ".LecPocketlist:eq("+k+")" ).attr("id");
                }
            }
        }
        {{-- cartidx 를 찾았으면 삭제하기 --}}
        if ($_cart_idx != '') {
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

    {{-- 장바구니 입력 오류 --}}
    function cartError(id, err_msg) {
        alert(err_msg);
        $("#"+id).prop('checked',false);
        return;
    }

    {{-- 장바구니 조회.삭제 오류 --}}
    function cartEtcError(err_msg) {
        alert(err_msg);
        return;
    }

    {{-- 장바구니 div 삭제 --}}
    function rowDelete(cart_idx) {
        $_prod_code = $('#'+cart_idx).data('prod-code');
        eachProductCartRemove(cart_idx, $_prod_code)
        $('#'+cart_idx).remove();
    }

    {{-- 상품목록 과 장바구니 일치시키기 --}}
    function sameContent() {

        @if($class_type == 'offvisitpackage') {{-- 패키지 일경우 하위상품 동기화--}}
            $_basket_cnt = $(".LecPocketlist").length;
            $_basket_sub_prod_code = '';
            for(k=0;k<$(".LecPocketlist").length;k++) {
                if($("input[name='prod_code[]']").data('prod-code')== $( ".LecPocketlist:eq("+k+")" ).data('prod-code') )  {
                    //alert($( ".LecPocketlist:eq("+k+")" ).data('sub-prod-code'))
                    $_basket_sub_prod_code = $( ".LecPocketlist:eq("+k+")" ).data('sub-prod-code')
                }
            }
            {{-- 하위상품 존재시 체크 하기 --}}
            $_checkbox_cnt = $("input[name='prod_code_sub[]']").length;
            if($_checkbox_cnt > 0) {
                for(i=0;i<$_checkbox_cnt;i++) {
                    if( $_basket_sub_prod_code.indexOf($("input[name='prod_code_sub[]']:eq(" + i + ")").val()) >= 0){
                        $("input[name='prod_code_sub[]']:eq(" + i + ")").prop('checked',true)
                    }
                }
            }

        @else   {{-- 단과반 일경우 왼쪽과 오른쪽 동기화--}}
            $_checkbox_cnt = $("input[name='prod_code[]']").length;
            $_basket_cnt = $(".LecPocketlist").length;
            if($_checkbox_cnt > 0) {
                for(i=0;i<$_checkbox_cnt;i++){
                    for(k=0;k<$_basket_cnt;k++) {
                        if(  $("input[name='prod_code[]']:eq("+i+")").data('prod-code') == $( ".LecPocketlist:eq("+k+")" ).data('prod-code') ) {
                            $("input[name='prod_code[]']:eq("+i+")").prop('checked',true); break ;
                        } else {
                            $("input[name='prod_code[]']:eq("+i+")").prop('checked',false);
                        }
                    }
                }
            }
        @endif
    }

</script>