@extends('willbes.m.layouts.master')

@section('page_title', '장바구니')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <div>
        <ul id="tab_cart" class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
            <li><a id="hover_lecture" href="#lecture">강좌</a><span class="row-line">|</span></li>
            <li><a id="hover_book" href="#book">교재</a></li>
        </ul>

        <div class="basketWrap">
            <div id="lecture">
                <form id="lecture_form" name="lecture_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="cart_type" value="{{ $lecture_key }}"/>
                    <div class="lec-info bd-none pt-zero pb-zero">
                        <h5>
                            <span class="chk chk2">
                                <label for="all_lecture">전체선택</label>
                                <input type="checkbox" id="all_lecture" name="_is_all" class="all-check" data-tab-id="lecture"/>
                            </span>
                            <a href="#none" class="NGR btn-checked-delete" data-tab-id="lecture">선택삭제</a>
                        </h5>
                    </div>

                    <div class="basketListBox">
                        @if(isset($results['list'][$lecture_key]) === true)
                            @foreach($results['list'][$lecture_key] as $idx => $row)
                                <div>
                                    <input type="checkbox" id="prod_{{ $row['ProdCode'] }}" name="prod_code[]" value="{{ $row['ProdCode'] }}">
                                    <label for="prod_{{ $row['ProdCode'] }}">
                                        <ul>
                                            <li><span>{{ $row['CartProdTypeName'] }}</span></li>
                                            <li>{{ $row['ProdName'] }}</li>
                                            <li>판매가 <span>{{ number_format($row['RealSalePrice'], 0) }}원</span></li>
                                        </ul>
                                    </label>
                                </div>
                            @endforeach
                        @endif
                        <div class="priceBox">
                            <ul>
                                <li><strong>강좌({{ array_get($results, 'count.' . $lecture_key, 0) }}건)</strong> <span class="tx-blue">{{ number_format(array_get($results, 'price.' . $lecture_key, 0)) }}원</span></li>
                                <li><strong>{{ starts_with($pack_lecture_key, 'off') === true ? '종합반' : '패키지' }}({{ array_get($results, 'count.' . $pack_lecture_key, 0) }}건)</strong> <span class="tx-red">{{ number_format(array_get($results, 'price.' . $pack_lecture_key, 0)) }}원</span></li>
                                <li><strong>배송료</strong> <span class="tx-blue">{{ number_format(array_get($results, 'delivery_price.' . $lecture_key, 0)) }}원</span></li>
                                <li class="NGEB"><strong>결제예상금액</strong> <span class="tx-blue">{{ number_format(array_get($results, 'price.' . $lecture_key, 0) + array_get($results, 'price.' . $pack_lecture_key, 0) + array_get($results, 'delivery_price.' . $lecture_key, 0)) }}원</span></li>
                            </ul>
                        </div>
                    </div>

                    <ul class="lecTxt NGR">
                        <li class="tx-red">정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</li>
                        <li>장바구니 상품은 14일 안에 미구매 시 자동 삭제 처리됩니다.</li>
                        <li>장바구니 강좌 삭제 시 해당 강좌의 수강생 교재가 포함된 경우 함께 삭제 처리됩니다.</li>
                        <li>장바구니 담기 후 해당 상품의 접수기간이 지났거나, 판매상태가 '판매종료'로 변경된 경우 자동 삭제 처리됩니다.</li>
                        <li>배송 상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토,일,공휴일 제외)</li>
                    </ul>
                </form>
            </div>

            <div id="book">
                <form id="book_form" name="book_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="cart_type" value="book"/>
                    <div class="lec-info bd-none pt-zero pb-zero">
                        <h5>
                            <span class="chk chk2">
                                <label for="all_book">전체선택</label>
                                <input type="checkbox" id="all_book" name="_is_all" class="all-check" data-tab-id="book"/>
                            </span>
                            <a href="#none" class="NGR btn-checked-delete" data-tab-id="book">선택삭제</a>
                        </h5>
                    </div>

                    <div class="basketListBox">
                        @if(isset($results['list']['book']) === true)
                            @foreach($results['list']['book'] as $idx => $row)
                                <div>
                                    <input type="checkbox" id="prod_{{ $row['ProdCode'] }}" name="prod_code[]" value="{{ $row['ProdCode'] }}">
                                    <label for="prod_{{ $row['ProdCode'] }}">
                                        <ul>
                                            <li><span>교재</span></li>
                                            <li>{{ $row['ProdName'] }}</li>
                                            <li>판매가 <span>{{ number_format($row['RealSalePrice'], 0) }}원</span> 수량 <span>{{ $row['ProdQty'] }}</span></li>
                                        </ul>
                                    </label>
                                </div>
                            @endforeach
                        @endif
                        <div class="priceBox">
                            <ul>
                                <li><strong>교재({{ array_get($results, 'count.book', 0) }}건)</strong> <span class="tx-blue">{{ number_format(array_get($results, 'price.book', 0)) }}원</span></li>
                                <li><strong>배송료</strong> <span class="tx-blue">{{ number_format(array_get($results, 'delivery_price.book', 0)) }}원</span></li>
                                <li class="NGEB"><strong>결제예상금액</strong> <span class="tx-blue">{{ number_format(array_get($results, 'price.book', 0) + array_get($results, 'delivery_price.book', 0)) }}원</span></li>
                            </ul>
                        </div>
                    </div>

                    <ul class="lecTxt NGR">
                        <li>네이버페이 결제 시 주문내역은 ‘네이버쇼핑(네이버페이) > 쇼핑 MY > 주문확인/배송조회’에서 확인 가능합니다.</li>
                        <li>네이버페이 결제는 네이버페이 운영방침에 따라 이루어집니다. <a href="https://help.pay.naver.com/faq/list.help?categoryId=697" target="_blank" class="tx-red">자세히보기 ></a></li>
                        <li>비회원에서 로그인으로 전환 시, 기존 장바구니에 담겨있던 상품이 모두 사라집니다. 로그인 후 다시 상품을 선택하여 장바구니에 담아야 합니다.</li>
                        <li>장바구니 담기 후 해당 상품의 판매상태가 ‘품절’, ‘절판’, ‘출간예정’으로 변경된 경우 자동 삭제 처리됩니다.</li>
                        <li>배송 상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토, 일, 공휴일 제외)</li>
                        <li>교재는 공급사(출판사) 재고 사정에 의해 품절/지연될 수 있으며, 품절 시 관련 사항에 대해 전화나 문자로 안내합니다.</li>
                    </ul>

                    @if($is_npay === true)
                        {{-- 네이버페이 --}}
                        <div class="mb20 mb50 tx-center">
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
                            <script type="text/javascript" src="https://pay.naver.com/customer/js/mobile/naverPayButton.js" charset="utf-8"></script>
                            <script type="text/javascript" >//<![CDATA[
                                naver.NaverPayButton.apply({
                                    BUTTON_KEY: '{{ config_app('npay_btn_cert_key') }}', // 페이에서 제공받은 버튼 인증 키 입력
                                    TYPE: 'MA', // 버튼 모음 종류 설정
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
                </form>
            </div>

            {{-- TODO : 네이버페이 심사 --}}
            {{--<div class="lec-btns w100p">
                <ul>
                    <li><a href="#none" id="btn_pay" class="btn-purple">결제하기</a></li>
                </ul>
            </div>--}}
            {{--// 네이버페이 심사 --}}
        </div>
    </div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')
</div>
<!-- End Container -->
<script type="text/javascript">
    $(document).ready(function() {
        // 장바구니 디폴트 탭 설정
        $(function() {
            var default_tab_id = '{{ element('tab', $arr_input, 'lecture') }}';
            if (default_tab_id.length > 0) {
                default_tab_id = default_tab_id === 'book' ? 'book' : 'lecture';
                $('#hover_' + default_tab_id).trigger('click');
            }
        });

        // 전체선택/해제
        $('.all-check').on('change', function() {
            var $form = $('#' + $(this).data('tab-id') + '_form');
            checkAll($form.find('input[name="prod_code[]"]'), $(this));
        });

        // 선택삭제 버튼 클릭
        $('.btn-checked-delete').on('click', function(event) {
            var $tab_id = $(this).data('tab-id');
            var $form = $('#' + $tab_id + '_form');
            var confirm_msg = '선택한 상품을 삭제하시겠습니까?';
            var data = {};

            $form.find('input[name="prod_code[]"]:checked').each(function(idx) {
                data[idx] = $(this).val();
            });

            if(Object.keys(data).length < 1) {
                alert('삭제할 상품을 선택해 주세요.');
                return;
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

        {{-- TODO : 네이버페이 심사 --}}
        {{--// 결제하기 버튼 클릭
        $('#btn_pay').on('click', function () {
            var $tab_id = $('#tab_cart').find('a').filter('.on').prop('hash').substr(1);
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