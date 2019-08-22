@extends('willbes.m.layouts.master')

@section('page_title', '장바구니')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <div>
        <ul id="tab_cart" class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
            <li><a id="hover_on_lecture" href="#on_lecture">강좌</a><span class="row-line">|</span></li>
            <li><a id="hover_book" href="#book">교재</a></li>
        </ul>

        <div class="basketWrap">
            <div id="on_lecture">
                <form id="on_lecture_form" name="on_lecture_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="cart_type" value="on_lecture"/>
                    <div class="lec-info bd-none pt-zero pb-zero">
                        <h5>
                            <span class="chk chk2">
                                <label for="all_on_lecture">전체선택</label>
                                <input type="checkbox" id="all_on_lecture" name="_is_all" class="all-check" data-tab-id="on_lecture"/>
                            </span>
                            <a href="#none" class="NGR btn-checked-delete" data-tab-id="on_lecture">선택삭제</a>
                        </h5>
                    </div>

                    <div class="basketListBox">
                        @if(isset($results['list']['on_lecture']) === true)
                            @foreach($results['list']['on_lecture'] as $idx => $row)
                                <div>
                                    <input type="checkbox" id="cart_{{ $row['CartIdx'] }}" name="cart_idx[]" value="{{ $row['CartIdx'] }}">
                                    <label for="cart_{{ $row['CartIdx'] }}">
                                        <ul>
                                            <li><span>{{ $row['CartProdType'] == 'on_pack_lecture' ? '패키지' : '강좌' }}</span></li>
                                            <li>{{ $row['ProdName'] }}</li>
                                            <li>판매가 <span>{{ number_format($row['RealSalePrice'], 0) }}원</span></li>
                                        </ul>
                                    </label>
                                </div>
                            @endforeach
                        @endif
                        <div class="priceBox">
                            <ul>
                                <li><strong>강좌({{ array_get($results, 'count.on_lecture', 0) }}건)</strong> <span class="tx-blue">{{ number_format(array_get($results, 'price.on_lecture', 0)) }}원</span></li>
                                <li><strong>패키지({{ array_get($results, 'count.on_pack_lecture', 0) }}건)</strong> <span class="tx-red">{{ number_format(array_get($results, 'price.on_pack_lecture', 0)) }}원</span></li>
                                <li><strong>배송료</strong> <span class="tx-blue">{{ number_format(array_get($results, 'delivery_price.on_lecture', 0)) }}원</span></li>
                                <li class="NGEB"><strong>결제예상금액</strong> <span class="tx-blue">{{ number_format(array_get($results, 'price.on_lecture', 0) + array_get($results, 'price.on_pack_lecture', 0) + array_get($results, 'delivery_price.on_lecture', 0)) }}원</span></li>
                            </ul>
                        </div>
                    </div>
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
                                    <input type="checkbox" id="cart_{{ $row['CartIdx'] }}" name="cart_idx[]" value="{{ $row['CartIdx'] }}">
                                    <label for="cart_{{ $row['CartIdx'] }}">
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
                                <li><strong>강좌({{ array_get($results, 'count.book', 0) }}건)</strong> <span class="tx-blue">{{ number_format(array_get($results, 'price.book', 0)) }}원</span></li>
                                <li><strong>배송료</strong> <span class="tx-blue">{{ number_format(array_get($results, 'delivery_price.book', 0)) }}원</span></li>
                                <li class="NGEB"><strong>결제예상금액</strong> <span class="tx-blue">{{ number_format(array_get($results, 'price.book', 0) + array_get($results, 'delivery_price.book', 0)) }}원</span></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>   
            
            <ul class="lecTxt NGR">
                <li class="tx-red">정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</li>
                <li>장바구니 상품은 14일 안에 미구매 시 자동 삭제 처리됩니다.</li>
                <li>장바구니 강좌 삭제 시 해당 강좌의 수강생 교재가 포함된 경우 함께 삭제 처리됩니다.</li>
                <li>장바구니 담기 후 해당 상품의 접수기간이 지났거나, 판매상태가 '판매종료'로 변경된 경우 자동 삭제 처리됩니다.</li>
            </ul>
            
            <div class="lec-btns w100p">
                <ul>
                    <li><a href="#none" id="btn_pay" class="btn-purple">결제하기</a></li>
                </ul>
            </div>
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
            var default_tab_id = '{{ element('tab', $arr_input, 'on_lecture') }}';
            if (default_tab_id.length > 0) {
                $('#hover_' + default_tab_id).trigger('click');
            }
        });

        // 전체선택/해제
        $('.all-check').on('change', function() {
            var $form = $('#' + $(this).data('tab-id') + '_form');
            checkAll($form.find('input[name="cart_idx[]"]'), $(this));
        });

        // 선택삭제 버튼 클릭
        $('.btn-checked-delete').on('click', function(event) {
            var $tab_id = $(this).data('tab-id');
            var $form = $('#' + $tab_id + '_form');
            var confirm_msg = '선택한 상품을 삭제하시겠습니까?';
            var data = {};

            $form.find('input[name="cart_idx[]"]:checked').each(function(idx) {
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

        // 결제하기 버튼 클릭
        $('#btn_pay').on('click', function () {
            var $tab_id = $('#tab_cart').find('a').filter('.on').prop('hash').substr(1);
            var $form = $('#' + $tab_id + '_form');

            if ($form.find('input[name="cart_idx[]"]').length < 1) {
                alert('구매할 상품이 없습니다.');
                return;
            }

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