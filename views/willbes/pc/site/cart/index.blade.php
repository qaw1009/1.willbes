@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Content p_re">
        <div class="willbes-Cartlist c_both">
            <div class="stepCart NG">
                <ul class="tabs-Step">
                    <li class="on"><div><img src="{{ img_url('cart/icon_cart1_on.png') }}"> 장바구니</div></li>
                    <li><div><img src="{{ img_url('cart/icon_cart2.png') }}"> 결제하기</div></li>
                    <li><div><img src="{{ img_url('cart/icon_cart3.png') }}"> 결제완료</div></li>
                </ul>
            </div>
        </div>
        <div class="pocketDetailWrap pt40">
            <ul class="tabWrap tabDepth1 NG">
                <li><a id="hover_on_lecture" href="#on_lecture" class="">강좌</a></li>
                <li><a id="hover_book" href="#book" class="">교재</a></li>
            </ul>
            <div class="tabBox">
                <div id="on_lecture" class="tabLink">
                    <form id="on_lecture_form" name="on_lecture_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="cart_type" value="on_lecture"/>
                        <div class="willbes-Cartlist c_both mt20">
                            <div class="LeclistTable">
                                <ul class="mb20">
                                    <li class="subBtn NSK"><a href="#none" class="btn-checked-delete" data-tab-id="on_lecture">선택 상품 삭제 ></a></li>
                                </ul>
                                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-black upper-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 80px;">
                                        <col style="width: 550px;">
                                        <col style="width: 160px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="_is_all" class="all-check" data-tab-id="on_lecture"/><span class="row-line">|</span></th>
                                        <th>상품정보<span class="row-line">|</span></th>
                                        <th>판매가<span class="row-line">|</span></th>
                                        <th>결제/삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($results['list']['on_lecture']) === true)
                                        @foreach($results['list']['on_lecture'] as $idx => $row)
                                            <tr>
                                                <td class="w-chk"><input type="checkbox" name="cart_idx[]" value="{{ $row['CartIdx'] }}" class="chk-cart"/></td>
                                                @if($row['CartProdType'] != 'on_pack_lecture')
                                                    <td class="w-list tx-left pl20"><span class="pBox p1">강좌</span> {{ $row['ProdName'] }}</td>
                                                @else
                                                    <td class="w-list tx-left p_re pl20">
                                                        <a href="#none" class="btn-package-info" data-cart-idx="{{ $row['CartIdx'] }}">
                                                            <span class="pBox p2">패키지</span> {{ $row['ProdName'] }}
                                                            <img class="dot" style="display: none; margin: -2px 0 0 5px;" src="{{ img_url('sub/icon_detail.gif') }}">
                                                        </a>
                                                        <div id="package_lec_list_{{ $row['CartIdx'] }}" class="willbes-Layer-Box-sm"></div>
                                                    </td>
                                                @endif
                                                <td class="w-price tx-light-blue">{{ number_format($row['RealSalePrice'], 0) }}원</td>
                                                <td class="w-buy">
                                                    <span class="tBox NSK t1 black"><a href="#none" class="btn-only-pay" data-tab-id="on_lecture" data-cart-idx="{{ $row['CartIdx'] }}">결제</a></span>
                                                    <span class="tBox NSK t2 white"><a href="#none" class="btn-only-delete" data-tab-id="on_lecture" data-cart-idx="{{ $row['CartIdx'] }}">삭제</a></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- willbes-Cartlist -->

                        <div class="willbes-Cart-Price p_re">
                            <ul class="cart-PriceBox pl40 NG">
                                <li class="price-list p_re">
                                    <dl class="priceBox">
                                        <dt>
                                            <div>
                                                <span class="pBox p1">강좌</span>
                                                ( <a class="num tx-light-blue underline" href="#none">{{ array_get($results, 'count.on_lecture', 0) }}건</a> )
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(array_get($results, 'price.on_lecture', 0)) }}원</span>
                                        </dt>
                                        <dt class="price-img">
                                            <span class="row-line">|</span>
                                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                                        </dt>
                                        <dt>
                                            <div>
                                                <span class="pBox p2">패키지</span>
                                                ( <a class="num tx-light-blue underline" href="#none">{{ array_get($results, 'count.on_pack_lecture', 0) }}건</a> )
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(array_get($results, 'price.on_pack_lecture', 0)) }}원</span>
                                        </dt>
                                        <dt class="price-img">
                                            <span class="row-line">|</span>
                                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                                        </dt>
                                        <dt>
                                            <div>
                                                <span class="pBox p4">배송</span>
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(array_get($results, 'delivery_price.on_lecture', 0)) }}원</span>
                                        </dt>
                                    </dl>
                                </li>
                                <li class="price-total">
                                    <div>결제예상금액</div>
                                    <span class="price tx-light-blue">{{ number_format(array_get($results, 'price.on_lecture', 0) + array_get($results, 'price.on_pack_lecture', 0) + array_get($results, 'delivery_price.on_lecture', 0)) }}원</span>
                                </li>
                            </ul>
                            <div class="willbes-Lec-buyBtn">
                                <ul>
                                    <li class="btnAuto180 h36">
                                        <button type="button" name="btn_continue" data-tab-id="on_lecture" class="mem-Btn bg-white bd-dark-blue">
                                            <span class="tx-light-blue">다른상품 더 보기</span>
                                        </button>
                                    </li>
                                    <li class="btnAuto180 h36">
                                        <button type="submit" name="btn_pay" data-tab-id="on_lecture" class="mem-Btn bg-blue bd-dark-blue">
                                            <span>결제하기</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- willbes-Cart-Price -->

                        <div class="willbes-Cart-Txt">
                            <table cellspacing="0" cellpadding="0" class="txtTable tx-gray">
                                <tbody>
                                <tr><td>• <span class="tx-red">정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</span></td></tr>                                
                                <tr><td>• 장바구니 상품은 14일 안에 미구매 시 자동 삭제 처리됩니다.</td></tr>
                                <tr><td>• 장바구니 강좌 삭제 시 해당 강좌의 수강생 교재가 포함된 경우 함께 삭제 처리됩니다.</td></tr>
                                <tr><td>• 장바구니 담기 후 해당 상품의 접수기간이 지났거나, 판매상태가 '판매종료'로 변경된 경우 자동 삭제 처리됩니다.</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- willbes-Cart-Txt -->
                    </form>
                </div>
                <div id="book" class="tabLink">
                    <form id="book_form" name="book_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="cart_type" value="book"/>
                        <div class="willbes-Cartlist c_both mt20">
                            <div class="LeclistTable">
                                <ul class="mb20">
                                    <li class="subBtn NSK"><a href="#none" class="btn-checked-delete" data-tab-id="book">선택 상품 삭제 ></a></li>
                                </ul>
                                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-black upper-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 80px;">
                                        <col style="width: 550px;">
                                        <col style="width: 160px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="_is_all" class="all-check" data-tab-id="book"/><span class="row-line">|</span></th>
                                        <th>상품정보<span class="row-line">|</span></th>
                                        <th>판매가<span class="row-line">|</span></th>
                                        <th>결제/삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($results['list']['book']) === true)
                                        @foreach($results['list']['book'] as $idx => $row)
                                            <tr>
                                                <td class="w-chk"><input type="checkbox" name="cart_idx[]" value="{{ $row['CartIdx'] }}" class="chk-cart"/></td>
                                                <td class="w-list tx-left pl20"><span class="pBox p3">교재</span> {{ $row['ProdName'] }}</td>
                                                <td class="w-price tx-light-blue">{{ number_format($row['RealSalePrice'], 0) }}원</td>
                                                <td class="w-buy">
                                                    <span class="tBox NSK t1 black"><a href="#none" class="btn-only-pay" data-tab-id="book" data-cart-idx="{{ $row['CartIdx'] }}">결제</a></span>
                                                    <span class="tBox NSK t2 white"><a href="#none" class="btn-only-delete" data-tab-id="book" data-cart-idx="{{ $row['CartIdx'] }}">삭제</a></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- willbes-Cartlist -->

                        <div class="willbes-Cart-Price p_re">
                            <ul class="cart-PriceBox pl40 NG">
                                <li class="price-list p_re">
                                    <dl class="priceBox">
                                        <dt>
                                            <div>
                                                <span class="pBox p3">교재</span>
                                                ( <a class="num tx-light-blue underline" href="#none">{{ array_get($results, 'count.book', 0) }}건</a> )
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(array_get($results, 'price.book', 0)) }}원</span>
                                        </dt>
                                        <dt class="price-img">
                                            <span class="row-line">|</span>
                                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                                        </dt>
                                        <dt>
                                            <div>
                                                <span class="pBox p4">배송</span>
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(array_get($results, 'delivery_price.book', 0)) }}원</span>
                                        </dt>
                                    </dl>
                                </li>
                                <li class="price-total">
                                    <div>결제예상금액</div>
                                    <span class="price tx-light-blue">{{ number_format(array_get($results, 'price.book', 0) + array_get($results, 'delivery_price.book', 0)) }}원</span>
                                </li>
                            </ul>
                            <div class="willbes-Lec-buyBtn">
                                <ul>
                                    <li class="btnAuto180 h36">
                                        <button type="button" name="btn_continue" data-tab-id="book" class="mem-Btn bg-white bd-dark-blue">
                                            <span class="tx-light-blue">다른상품 더 보기</span>
                                        </button>
                                    </li>
                                    <li class="btnAuto180 h36">
                                        <button type="submit" name="btn_pay" data-tab-id="book" class="mem-Btn bg-blue bd-dark-blue">
                                            <span>결제하기</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- willbes-Cart-Price -->

                        <div class="willbes-Cart-Txt">
                            <table cellspacing="0" cellpadding="0" class="txtTable tx-gray">
                                <tbody>
                                <tr><td>• <span class="tx-red">정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</span></td></tr>                                
                                <tr><td>• 장바구니 상품은 14일 안에 미구매 시 자동 삭제 처리됩니다.</td></tr>
                                <tr><td>• 장바구니 강좌 삭제 시 해당 강좌의 수강생 교재가 포함된 경우 함께 삭제 처리됩니다.</td></tr>
                                <tr><td>• 장바구니 담기 후 해당 상품의 판매상태가 '품절', '절판', '출간예정'으로 변경된 경우 자동 삭제 처리됩니다.</td></tr>
                                <tr><td>• 배송 상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토,일,공휴일 제외)</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- willbes-Cart-Txt -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    {!! banner('결제_우측퀵', 'Quick-Bnr ml20 mt85', $__cfg['SiteCode'], '0') !!}

</div>
<!-- End Container -->
<script type="text/javascript">
    var $lecture_form = $('#on_lecture_form');
    var $book_form = $('#book_form');

    $(document).ready(function() {
        // 장바구니 디폴트 탭 설정
        $(function() {
            var default_tab_id = '{{ element('tab', $arr_input, 'on_lecture') }}';
            if (default_tab_id.length > 0) {
                openLink('hover_' + default_tab_id);
            }
        });

        // 패키지 레이어 팝업
        $lecture_form.on('click', '.btn-package-info', function() {
            var cart_idx = $(this).data('cart-idx');
            var ele_id = 'package_lec_list_' + cart_idx;
            var data = { 'ele_id' : ele_id, 'cart_idx' : cart_idx };
            sendAjax('{{ front_url('/cart/info') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        });

        // 전체선택/해제
        $('.all-check').on('change', function() {
            var $form = $('#' + $(this).data('tab-id') + '_form');
            checkAll($form.find('input[name="cart_idx[]"]'), $(this));
        });

        // 선택삭제/개별삭제 버튼 클릭
        $('.btn-checked-delete, .btn-only-delete').on('click', function(event) {
            var $tab_id = $(this).data('tab-id');
            var $form = $('#' + $tab_id + '_form');
            var btn_name = event.target.getAttribute('class');
            var confirm_msg = '선택한 상품을 삭제하시겠습니까?';
            var data = {};

            if (btn_name === 'btn-checked-delete') {
                // 선택삭제
                $form.find('input[name="cart_idx[]"]:checked').each(function(idx) {
                    data[idx] = $(this).val();
                });

                if(Object.keys(data).length < 1) {
                    alert('삭제할 상품을 선택해 주세요.');
                    return;
                }
            } else {
                // 개별삭제
                data = { 0 : $(this).data('cart-idx').toString() };
                confirm_msg = '해당 강좌 삭제 시 관련 교재도 함께 삭제됩니다.\n해당 상품을 삭제하시겠습니까?';
            }

            if (confirm(confirm_msg)) {
                data = {
                    '{{ csrf_token_name() }}' : $form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'cart_idx' : JSON.stringify(data)
                };
                sendAjax('{{ front_url('/cart/destroy') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        var reload_url = location.pathname + '?tab=' + $tab_id;
                        location.replace(reload_url);
                    }
                }, showAlertError, false, 'POST');
            }
        });

        // 개별결제 버튼 클릭
        $('.btn-only-pay').on('click', function() {
            var $tab_id = $(this).data('tab-id');
            var $form = $('#' + $tab_id + '_form');

            {{-- // 교재상품 선구매 불가 처리
            if ($tab_id === 'book') {
                if ($lecture_form.find('input[name="cart_idx[]"]').length > 0) {
                    alert('장바구니에 담긴 강좌 상품 선 구매 후 교재 상품 구매가 가능합니다.');
                    return;
                }
            }--}}

            if (confirm('해당 상품을 결제하시겠습니까?')) {
                var data = {
                    '{{ csrf_token_name() }}' : $form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'cart_idx[]' : $(this).data('cart-idx').toString(),
                    'cart_type' : $form.find('input[name="cart_type"]').val()
                };
                sendAjax('{{ front_url('/cart/toOrder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        location.href = ret.ret_data.ret_url;
                    }
                }, showAlertError, false, 'POST');
            }
        });

        // 다른상품 더보기 버튼 클릭
        $('button[name="btn_continue"]').on('click', function () {
            var $cate_code = '{{ $results['recent_cate_code'] or element('DefCateCode', $__cfg, '') }}';
            location.href = $cate_code.length > 0 ? '{{ front_url('/lecture/index/cate/') }}' + $cate_code + '/pattern/only' : frontUrl('');
        });

        // 결제하기 버튼 클릭
        $('button[name="btn_pay"]').on('click', function () {
            var $tab_id = $(this).data('tab-id');
            var $form = $('#' + $tab_id + '_form');

            if ($form.find('input[name="cart_idx[]"]').length < 1) {
                alert('구매할 상품이 없습니다.');
                return;
            }

            {{-- // 교재상품 선구매 불가 처리
            if ($tab_id === 'book') {
                if ($lecture_form.find('input[name="cart_idx[]"]').length > 0) {
                    alert('장바구니에 담긴 강좌 상품 선 구매 후 교재 상품 구매가 가능합니다.');
                    return;
                }
            }--}}

            if ($form.find('input[name="cart_idx[]"]:checked').length < 1) {
                // 상품 자동 선택 처리
                $form.find('input[name="cart_idx[]"]').prop('checked', true);
            }

            var url = '{{ front_url('/cart/toOrder') }}';
            ajaxSubmit($form, url, function(ret) {
                if(ret.ret_cd) {
                    location.href = ret.ret_data.ret_url;
                }
            }, showValidateError, null, false, 'alert');
        });
    });
</script>
@stop
