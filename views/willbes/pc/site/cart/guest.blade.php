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
                <li><a id="hover_lecture" href="#lecture" class="">강좌</a></li>
                <li><a id="hover_book" href="#book" class="">교재</a></li>
            </ul>
            <div class="tabBox">
                <div id="lecture" class="tabLink">
                    <form id="lecture_form" name="lecture_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="cart_type" value="{{ $lecture_key }}"/>
                        <div class="willbes-Cartlist c_both mt20">
                            <div class="LeclistTable">
                                <ul class="mb20">
                                    <li class="subBtn NSK"><a href="#none" class="btn-checked-delete" data-tab-id="lecture">선택 상품 삭제 ></a></li>
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
                                        <th><input type="checkbox" name="_is_all" class="all-check" data-tab-id="lecture"/><span class="row-line">|</span></th>
                                        <th>상품정보<span class="row-line">|</span></th>
                                        <th>판매가<span class="row-line">|</span></th>
                                        <th>삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($results['list'][$lecture_key]) === true)
                                        @foreach($results['list'][$lecture_key] as $idx => $row)
                                            <tr>
                                                <td class="w-chk"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] }}" class="chk-cart"/></td>
                                                <td class="w-list tx-left p_re pl20">
                                                    <span class="pBox p{{ $row['CartProdTypeNum'] }}">{{ $row['CartProdTypeName'] }}</span>
                                                    {{ $row['ProdAddInfo'] }}
                                                    <strong>{{ $row['ProdName'] }}</strong>
                                                </td>
                                                <td class="w-price tx-light-blue">{{ number_format($row['RealSalePrice'], 0) }}원</td>
                                                <td class="w-buy">
                                                    <span class="tBox NSK t2 white"><a href="#none" class="btn-only-delete" data-tab-id="lecture" data-prod-code="{{ $row['ProdCode'] }}">삭제</a></span>
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
                                                ( <a class="num tx-light-blue underline" href="#none">{{ array_get($results, 'count.' . $lecture_key, 0) }}건</a> )
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(array_get($results, 'price.' . $lecture_key, 0)) }}원</span>
                                        </dt>
                                        <dt class="price-img">
                                            <span class="row-line">|</span>
                                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                                        </dt>
                                        <dt>
                                            <div>
                                                <span class="pBox p2">{{ starts_with($pack_lecture_key, 'off') === true ? '종합반' : '패키지' }}</span>
                                                ( <a class="num tx-light-blue underline" href="#none">{{ array_get($results, 'count.' . $pack_lecture_key, 0) }}건</a> )
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(array_get($results, 'price.' . $pack_lecture_key, 0)) }}원</span>
                                        </dt>
                                        @if($lecture_key == 'on_lecture')
                                            <dt class="price-img">
                                                <span class="row-line">|</span>
                                                <img src="{{ img_url('sub/icon_plus.gif') }}">
                                            </dt>
                                            <dt>
                                                <div>
                                                    <span class="pBox p4">배송</span>
                                                </div>
                                                <span class="price tx-light-blue">{{ number_format(array_get($results, 'delivery_price.' . $lecture_key, 0)) }}원</span>
                                            </dt>
                                        @endif
                                    </dl>
                                </li>
                                <li class="price-total">
                                    <div>결제예상금액</div>
                                    <span class="price tx-light-blue">{{ number_format(array_get($results, 'price.' . $lecture_key, 0) + array_get($results, 'price.' . $pack_lecture_key, 0) + array_get($results, 'delivery_price.' . $lecture_key, 0)) }}원</span>
                                </li>
                            </ul>
                            <div class="willbes-Lec-buyBtn">
                                <ul>
                                    <li class="btnAuto180 h36">
                                        <button type="button" name="btn_continue" data-tab-id="lecture" class="mem-Btn bg-white bd-dark-blue">
                                            <span class="tx-light-blue">다른상품 더 보기</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- willbes-Cart-Price -->

                        <div class="willbes-Cart-Txt">
                            <table cellspacing="0" cellpadding="0" class="txtTable tx-gray">
                                <tbody>
                                @if($lecture_key == 'on_lecture')
                                    <tr><td>• <span class="tx-red">정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</span></td></tr>
                                @endif
                                <tr><td>• 비회원에서 로그인으로 전환 시, 기존 장바구니에 담겨있던 상품이 모두 사라집니다. 로그인 후 다시 상품을 선택하여 장바구니에 담아야 합니다.</td></tr>
                                <tr><td>• 장바구니 강좌 삭제 시 해당 강좌의 수강생 교재가 포함된 경우 함께 삭제 처리됩니다.</td></tr>
                                @if($lecture_key == 'on_lecture')
                                    <tr><td>• 장바구니 담기 후 해당 상품의 접수기간이 지났거나, 판매상태가 '판매종료'로 변경된 경우 자동 삭제 처리됩니다.</td></tr>
                                @else
                                    <tr><td>• 장바구니 담기 후 해당 상품의 정원 및 접수기간이 마감되었거나, 판매상태가 '판매완료'로 변경된 경우 자동 삭제 처리됩니다.</td></tr>
                                @endif
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
                                        <col style="width: 490px;">
                                        <col style="width: 60px;">
                                        <col style="width: 160px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="_is_all" class="all-check" data-tab-id="book"/><span class="row-line">|</span></th>
                                        <th>상품정보<span class="row-line">|</span></th>
                                        <th>수량<span class="row-line">|</span></th>
                                        <th>판매가<span class="row-line">|</span></th>
                                        <th>삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($results['list']['book']) === true)
                                        @foreach($results['list']['book'] as $idx => $row)
                                            <tr>
                                                <td class="w-chk"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] }}" class="chk-cart"/></td>
                                                <td class="w-list tx-left pl20"><span class="pBox p3">교재</span> {{ $row['ProdAddInfo'] }} <strong>{{ $row['ProdName'] }}</strong></td>
                                                <td>{{ $row['ProdQty'] }}</td>
                                                <td class="w-price tx-light-blue">{{ number_format($row['RealSalePrice'], 0) }}원</td>
                                                <td class="w-buy">
                                                    <span class="tBox NSK t2 white"><a href="#none" class="btn-only-delete" data-tab-id="book" data-prod-code="{{ $row['ProdCode'] }}">삭제</a></span>
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
                                    {{-- TODO : 네이버페이 심사 --}}
                                    {{--<li class="btnAuto180 h36">
                                        <button type="submit" name="btn_pay" data-tab-id="book" class="mem-Btn bg-blue bd-dark-blue">
                                            <span>결제하기</span>
                                        </button>
                                    </li>--}}
                                    {{--// 네이버페이 심사 --}}
                                </ul>
                            </div>
                        </div>
                        <!-- willbes-Cart-Price -->

                        @if($is_npay === true)
                            {{-- 네이버페이 --}}
                            <div class="naverPay">
                                <script type="text/javascript">
                                    // 네이버페이 결제
                                    function buy_nc() {
                                        var $_book_form = $('#book_form');

                                        @if($npay_enable_yn == 'N')
                                            alert('죄송합니다. 구매상품이 없거나 네이버페이로 구매가 불가한 상품입니다.');
                                        @else
                                            if ($_book_form.find('input[name="prod_code[]"]:checked').length < 1) {
                                                // 상품 자동 선택 처리
                                                $_book_form.find('input[name="prod_code[]"]').prop('checked', true);
                                            }

                                            formCreateSubmit('{{ front_url('/npayOrder/register/pattern/cart') }}', $_book_form.serializeArray(), 'POST');
                                        @endif

                                        return false;
                                    }
                                </script>
                                <script type="text/javascript" src="https://pay.naver.com/customer/js/naverPayButton.js" charset="utf-8"></script>
                                <script type="text/javascript" >//<![CDATA[
                                    naver.NaverPayButton.apply({
                                        BUTTON_KEY: '{{ config_app('npay_btn_cert_key') }}', // 페이에서 제공받은 버튼 인증 키 입력
                                        TYPE: 'A', // 버튼 모음 종류 설정
                                        COLOR: 1, // 버튼 모음의 색 설정
                                        COUNT: 1, // 버튼 개수 설정. 구매하기 버튼만 있으면 1, 찜하기 버튼도 있으면 2를 입력.
                                        ENABLE: '{{ $npay_enable_yn }}', // 품절 등의 이유로 버튼 모음을 비활성화할 때에는 "N" 입력
                                        BUY_BUTTON_HANDLER: buy_nc, // 구매하기 버튼 이벤트 Handler 함수 등록, 품절인 경우 not_buy_nc 함수 사용
                                        BUY_BUTTON_LINK_URL: '', // 링크 주소 (필요한 경우만 사용)
                                        //WISHLIST_BUTTON_HANDLER: wishlist_nc, // 찜하기 버튼 이벤트 Handler 함수 등록
                                        //WISHLIST_BUTTON_LINK_URL: '', // 찜하기 팝업 링크 주소(필요한 경우만 사용)
                                        '':''
                                    });
                                //]]></script>
                            </div>
                        @endif

                        <div class="willbes-Cart-Txt">
                            <table cellspacing="0" cellpadding="0" class="txtTable tx-gray">
                                <tbody>
                                {{--<tr><td>• <span class="tx-red">윌스토리 온라인서점은 회원이 아닐 경우에는 원칙적으로 상품 구매가 불가능합니다. 단, 네이버페이를 통한 구매의 경우 비회원도 구입이 가능합니다.</span></td></tr>--}}
                                <tr><td>• 네이버페이 결제 시 주문내역은 ‘네이버쇼핑(네이버페이) > 쇼핑 MY > 주문확인/배송조회’에서 확인 가능합니다.</td></tr>
                                <tr><td>• 네이버페이 결제는 네이버페이 운영방침에 따라 이루어집니다. (<a href="https://help.pay.naver.com/faq/list.help?categoryId=697" target="_blank">https://help.pay.naver.com/faq/list.help?categoryId=697</a>)</td></tr>
                                <tr><td>• 비회원에서 로그인으로 전환 시, 기존 장바구니에 담겨있던 상품이 모두 사라집니다. 로그인 후 다시 상품을 선택하여 장바구니에 담아야 합니다.</td></tr>
                                <tr><td>• 장바구니 담기 후 해당 상품의 판매상태가 '품절', '절판', '출간예정'으로 변경된 경우 자동 삭제 처리됩니다.</td></tr>
                                <tr><td>• 배송 상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토, 일, 공휴일 제외)</td></tr>
                                {{--<tr><td class="pl10">- 단, 윌스토리(온라인서점)에서 구매한 경우 당일 결제한 배송 상품은 익일 발송 처리됩니다. (출고 후 1일~3일(72시간)내 수령)</td></tr>--}}
                                <tr><td>• 교재는 공급사(출판사) 재고 사정에 의해 품절/지연될 수 있으며, 품절 시 관련 사항에 대해 전화나 문자로 안내합니다.</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- willbes-Cart-Txt -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- TODO : 네이버페이 심사 --}}
    {{--<div class="Quick-Bnr Quick-Bnr-book">
        <a href="#none" onclick="alert('비회원 주문내역은 고객센터로 연락하여 확인해주세요');">비회원<br>주문내역</a>
    </div>--}}
    {{--// 네이버페이 심사 --}}

    {!! banner('결제_우측퀵', 'Quick-Bnr ml20 mt85', $__cfg['SiteCode'], '0') !!}
</div>
<!-- End Container -->
<script type="text/javascript">
    var $lecture_form = $('#lecture_form');
    var $book_form = $('#book_form');

    $(document).ready(function() {
        // 장바구니 디폴트 탭 설정
        $(function() {
            var default_tab_id = '{{ element('tab', $arr_input, 'lecture') }}';
            if (default_tab_id.length > 0) {
                default_tab_id = default_tab_id === 'book' ? 'book' : 'lecture';
                openLink('hover_' + default_tab_id);
            }
        });

        // 전체선택/해제
        $('.all-check').on('change', function() {
            var $form = $('#' + $(this).data('tab-id') + '_form');
            checkAll($form.find('input[name="prod_code[]"]'), $(this));
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
                $form.find('input[name="prod_code[]"]:checked').each(function(idx) {
                    data[idx] = $(this).val();
                });

                if(Object.keys(data).length < 1) {
                    alert('삭제할 상품을 선택해 주세요.');
                    return;
                }
            } else {
                // 개별삭제
                data = { 0 : $(this).data('prod-code').toString() };
                confirm_msg = '해당 상품을 삭제하시겠습니까?';
            }

            if (confirm(confirm_msg)) {
                data = {
                    '{{ csrf_token_name() }}' : $form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'prod_code' : JSON.stringify(data)
                };
                sendAjax('{{ front_url('/cart/destroyGuest') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        var reload_url = location.pathname + '?tab=' + $form.find('input[name="cart_type"]').val();
                        location.replace(reload_url);
                    }
                }, showAlertError, false, 'POST');
            }
        });

        // 다른상품 더보기 버튼 클릭
        $('button[name="btn_continue"]').on('click', function () {
            location.href = '{{ element('return_url', $arr_input, '/') }}';
        });

        {{-- TODO : 네이버페이 심사 --}}
        {{--// 결제하기 버튼 클릭
        $('button[name="btn_pay"]').on('click', function () {
            var $tab_id = $(this).data('tab-id');
            var $form = $('#' + $tab_id + '_form');

            if ($form.find('input[name="prod_code[]"]').length < 1) {
                alert('구매할 상품이 없습니다.');
                return;
            }

            if ($form.find('input[name="prod_code[]"]:checked').length < 1) {
                // 상품 자동 선택 처리
                $form.find('input[name="prod_code[]"]').prop('checked', true);
            }

            var url = '{{ front_url('/cart/toGuestOrder') }}';
            ajaxSubmit($form, url, function(ret) {
                if(ret.ret_cd) {
                    location.href = ret.ret_data.ret_url;
                }
            }, showValidateError, null, false, 'alert');
        });--}}
        {{--// 네이버페이 심사 --}}
    });
</script>
@stop
