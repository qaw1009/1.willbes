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
            <tr class="replyList w-replyList hover">
                <td class="w-tit">
                    유의사항을 모두 확인했고 동의합니다
                    <span class="arrow-Btn">></span>
                </td>
            </tr>
            <tr class="replyTxt w-replyTxt bg-light-gray" style="display: table-row;">
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
        @if(in_array($__cfg['SiteCode'], ['2010', '2011', '2013']) === true)
            {{-- 한림전용 개인정보활용 및 환불정책안내 팝업 (고등고시, 자격증, 경찰간부학원만 노출) --}}
            <div class="LecPocketLinkBox">
                <a href="#none" onclick="openWin('protect')">개인정보활용 및 환불정책 안내</a>
            </div>
            <div id="protect" class="willbes-Layer-Black">
                <div class="willbes-Layer-CartBox">
                    <a class="closeBtn" href="#none" onclick="closeWin('protect')">
                        <img src="{{ img_url('cart/close_cart.png') }}">
                    </a>
                    <div class="Layer-Tit NG bg-blue"> 개인정보활용 및 환불정책 안내</div>
                    <div class="Layer-Cont">
                        <table cellspacing="0" cellpadding="0" class="couponTable under-gray bdt-light-gray tx-gray">
                            <colgroup>
                                <col style="width: 120px;">
                                <col>
                            </colgroup>
                            <tbody>
                            <tr>
                                <th>개인정보활용 안내</th>
                                <td class="tx-left">
                                    윌비스는 고객의 개인정보보호를 소중하게 생각하고, 고객의 개인정보를 보호하기 위하여 항상 최선을 다해 노력하고 있습니다.<br>
                                    윌비스는 개인정보보호 관련 주요 법률인「정보통신망 이용촉진 및 정보보호 등에 관한 법률」을 비롯한 모든 개인정보보호 관련 법률을 준수하고 있습니다.<br>
                                    또한, 윌비스는「개인정보처리방침」을 제정하여 이를 준수하고 있으며, 윌비스의「개인정보처리방침」을 홈페이지에 공개하여 고객이 언제나 용이하게 열람할 수 있도록 하고 있습니다.<br>
                                    윌비스의「개인정보처리방침」은 관련 법률 및 지침의 변경 또는 내부 운영 방침의 변경에 따라 변경될 수 있습니다.<br>
                                    윌비스의「개인정보처리방침」이 변경될 경우 변경된 사항을 홈페이지를 통하여 공지합니다.<br>
                                    윌비스 개인정보처리방침은 아래와 같은 내용을 담고 있습니다.<br>
                                    <br>
                                    <div><a href="{{app_url('/company/protect', 'www')}}" target="_blank" class="tx-blue">[윌비스 개인정보 취급방침 보기 →]</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tx-left">
                                    <div class="chkBoxAgree">
                                        <input type="checkbox" id="agree_protect" name="agree_protect" value="Y">
                                        <label for="agree_protect">위 개인정보활용 안내사항을 모두 읽었으며 동의합니다. (필수)</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>환불정책 안내</th>
                                <td class="tx-left">
                                    <p class="tx14">⊙  한림법학원 실강종합반 환불정책</p>
                                    (학원설립및과외교습에관한법률 제18조 및 동시행령 제18조에 근거함)<br>
                                    <br>
                                    - 환불시 강의료 정산 = 총 등록(결제) 금액 - 퇴원일까지 진행된 강의 수강료*<br>
                                    * 퇴원일까지 진행된 강의 수강료 기준: 단과 수강료 기준 1회당 가격 X 진행된 강의 횟수<br>
                                    - 강의 개강일 기준 총 회차의 50% 이상이 진행된 경우 해당강의는 전회차 수강료로 정산됩니다.<br>
                                    - 종합반 반 변경은 불가하며, 기존 종합반 탈퇴 후 재가입하셔야 합니다. (탈퇴 시 상기 환불정책 준수)<br>
                                    <br>
                                    <div><a href="{{app_url('/company/agreement', 'www')}}" target="_blank" class="tx-blue">[윌비스 이용약관 보기 →]</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tx-left">
                                    <div class="chkBoxAgree">
                                        <input type="checkbox" id="agree_refund" name="agree_refund" value="Y">
                                        <label for="agree_refund">위 환불정책 안내사항을 모두 읽었으며 동의합니다. (필수)</label>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="allBtn">
                            위 개인정보 활용 및 환불정책 안내사항을 모두 읽었으며 동의합니다.
                            <a href="#none" id="agree_all">전체동의</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
            if ($regi_visit_form.find('#protect').length > 0) {
                if ($regi_visit_form.find('input[name="agree_protect"]:checked').length < 1 || $regi_visit_form.find('input[name="agree_refund"]:checked').length < 1) {
                    alert('개인정보활용 및 환불정책 안내 내용을 확인해 주세요.');
                    openWin('protect');
                    return;
                }
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

        // 한림전용 개인정보활용 및 환불정책안내 개별동의 버튼 클릭
        $regi_visit_form.on('click', '#protect .chkBoxAgree input:checkbox', function() {
            if ($regi_visit_form.find('input[name="agree_protect"]:checked').length > 0 && $regi_visit_form.find('input[name="agree_refund"]:checked').length > 0) {
                alert('개인정보활용 및 환불정책 안내에 동의하셨습니다. 최종 방문결제를 진행해 주세요.');
                closeWin('protect');
            }
        });

        // 한림전용 개인정보활용 및 환불정책안내 전체동의 버튼 클릭
        $regi_visit_form.on('click', '#protect #agree_all', function() {
            $regi_visit_form.find('#protect .chkBoxAgree input:checkbox').prop('checked', true);
            alert('개인정보활용 및 환불정책 안내에 동의하셨습니다. 최종 방문결제를 진행해 주세요.');
            closeWin('protect');
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
                        html += '<div class="tx-red tx12 c_both">' + item.LecDiscTitle + ' (↓' + item.LecDiscRate + item.LecDiscRateUnit + ')</div>\n';
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
