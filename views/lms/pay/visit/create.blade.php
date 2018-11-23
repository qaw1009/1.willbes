@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원에 방문한 수강생의 학원강좌 결제를 진행하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="order_idx" value="{{ $idx }}"/>
                <input type="hidden" name="mem_idx" value="{{ $data['order']['MemIdx'] }}"/>
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>회원정보</strong></h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-sm btn-primary mr-10 btn-message">쪽지발송</button>
                        <button class="btn btn-sm btn-primary mr-10 btn-sms">SMS발송</button>
                        <button class="btn btn-sm bg-dark mr-0 btn-auto-login">자동로그인</button>
                    </div>
                    <div class="col-md-12">
                        <table id="list_mem_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>회원번호</th>
                                <th>회원가입일</th>
                                <th>회원명 (성별)</th>
                                <th>아이디</th>
                                <th>휴대폰번호 (수신여부)</th>
                                <th>E-mail주소 (수신여부)</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data['mem']['MemIdx'] }} ({{ $data['mem']['SiteName'] }})</td>
                                    <td>{{ $data['mem']['JoinDate'] }}</td>
                                    <td>{{ $data['mem']['MemName'] }} ({{ $data['mem']['Sex'] == 'M' ? '남' : '여' }})</td>
                                    <td>{{ $data['mem']['MemId'] }}</td>
                                    <td>{{ $data['mem']['Phone'] }} ({{ $data['mem']['SmsRcvStatus'] }})</td>
                                    <td>{{ $data['mem']['Mail'] }} ({{ $data['mem']['MailRcvStatus'] }})</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ln_solid mt-5"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>· 상품결제정보</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <table id="list_order_detail_table" class="table table-striped table-bordered">
                        @if($_is_order === true)
                            <thead>
                            <tr>
                                <th>상품명</th>
                                <th>주문금액</th>
                                <th>할인율 [ <input type="checkbox" name="is_all_disc_rate" data-set-field="disc_type:R,disc_rate:0" class="flat" value="Y"> 전체적용 ]</th>
                                <th>할인사유 [ <input type="checkbox" name="is_all_disc_reason" data-set-field="disc_reason:" class="flat" value="Y"> 전체적용 ]</th>
                                <th>카드</th>
                                <th>현금</th>
                                <th>결제금액</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data['order_prod'] as $order_prod_row)
                                    <tr>
                                        <td><div class="blue inline-block">[{{ $order_prod_row['LearnPatternCcdName'] or $order_prod_row['ProdTypeCcdName'] }}]</div> {{ $order_prod_row['ProdName'] }}
                                            <input type="hidden" name="order_prod_idx[]" value="{{ $order_prod_row['OrderProdIdx'] }}"/>
                                        </td>
                                        <td>
                                            <input type="number" name="order_price[]" class="form-control input-sm" title="주문금액" value="{{ $order_prod_row['OrderPrice'] }}" readonly="readonly">
                                        </td>
                                        <td class="form-inline">
                                            <select class="form-control input-sm set-pay-price" name="disc_type[]">
                                                <option value="R">%</option>
                                                <option value="P">원</option>
                                            </select>
                                            <input type="number" name="disc_rate[]" class="form-control input-sm set-pay-price" title="할인율" value="0" style="width: 160px;">
                                        </td>
                                        <td>
                                            <input type="text" name="disc_reason[]" class="form-control input-sm" title="할인사유" value="">
                                        </td>
                                        <td>
                                            <input type="number" name="card_pay_price[]" class="form-control input-sm set-sum-price" title="카드결제금액" value="0">
                                        </td>
                                        <td>
                                            <input type="number" name="cash_pay_price[]" class="form-control input-sm set-sum-price" title="현금결제금액" value="0">
                                        </td>
                                        <td>
                                            <input type="number" name="real_pay_price[]" class="form-control input-sm set-sum-price" title="실결제금액" value="{{ $order_prod_row['RealPayPrice'] }}" readonly="readonly">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7" class="form-inline text-right bg-info bold">
                                    [총 실결제금액] <input type="number" name="total_real_pay_price" class="form-control input-sm ml-10" title="총 실결제금액" value="{{ $data['order']['tRealPayPrice'] }}" readonly="readonly"> 원
                                </td>
                            </tr>
                            </tfoot>
                        @endif
                        </table>
                    </div>
                </div>
                <div class="ln_solid mt-5"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>· 상품결제처리</strong></h4>
                    </div>
                    <div class="col-md-12 bold">
                        <div class="form-group bdt-line bg-odd">
                            <label class="control-label col-md-1 pt-5 pl-20">결제수단</label>
                            <div class="col-md-9 form-inline">
                                <input type="radio" id="pay_method_card" name="pay_method_ccd" class="flat" value="{{ $_pay_method_ccd['visit_card'] }}" title="카드" required="required" disabled="disabled"/> <label class="input-label">카드</label>
                                <input type="radio" id="pay_method_cash" name="pay_method_ccd" class="flat" value="{{ $_pay_method_ccd['visit_cash'] }}" title="현금" disabled="disabled"/> <label class="input-label">현금</label>
                                <input type="radio" id="pay_method_card_cash" name="pay_method_ccd" class="flat" value="{{ $_pay_method_ccd['visit_card_cash'] }}" title="카드+현금" disabled="disabled"/> <label class="input-label mr-30">카드+현금</label>
                                [카드선택]
                                <select class="form-control input-sm ml-5" name="card_ccd" disabled="disabled" title="카드선택">
                                    <option value="">카드선택</option>
                                    @foreach($arr_card_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group bg-odd">
                            <label class="control-label col-md-1 pt-5 pl-20">결제금액</label>
                            <div class="col-md-9 form-inline">
                                [카드] <input type="number" name="total_card_pay_price" class="form-control input-sm ml-10 mr-10" title="총 카드결제금액" value="0" readonly="readonly">
                                + [현금] <input type="number" name="total_cash_pay_price" class="form-control input-sm ml-10 mr-10" title="총 현금결제금액" value="0" readonly="readonly">
                                = <input type="number" name="sum_real_pay_price" class="form-control input-sm ml-10" title="총 실결제금액" value="0" readonly="readonly"> 원
                            </div>
                        </div>
                        <div class="text-center mt-20">
                            <button type="submit" name="btn_visit_order" class="btn btn-success">수강등록하기</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="ln_solid mt-5"></div>
            <div class="row">
                {{-- 주문 메모 --}}
                @include('lms.pay.order.order_memo_partial')
            </div>
            <div class="ln_solid"></div>
            <div class="text-center">
                <button class="btn btn-primary" type="button" id="btn_list">목록</button>
            </div>
        </div>
    </div>
    <script src="/public/js/lms/order_memo.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 수강등록하기 버튼 클릭
            $regi_form.submit(function() {
                var _url = '{{ site_url('/pay/visit/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        goList();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            var addValidate = function() {
                var real_pay_price = 0;
                var card_pay_price = 0;
                var cash_pay_price = 0;
                var is_pay_check = true;

                if ($regi_form.find('[name="pay_method_ccd"]:checked').length < 1) {
                    alert('결제수단이 선택되지 않았습니다.');
                    return false;
                }
                
                if ($regi_form.find('[name="pay_method_ccd"]:checked').prop('id').indexOf('_card') > -1 && $regi_form.find('[name="card_ccd"]').val() === '') {
                    alert('결제카드를 선택해 주세요.');
                    return false;
                }

                // 상품별 카드, 현금결제 금액 확인
                $regi_form.find('[name="card_pay_price[]"]').each(function(index) {
                    real_pay_price = parseInt($regi_form.find('[name="real_pay_price[]"]').eq(index).val());
                    card_pay_price = parseInt($regi_form.find('[name="card_pay_price[]"]').eq(index).val()) || 0;
                    cash_pay_price = parseInt($regi_form.find('[name="cash_pay_price[]"]').eq(index).val()) || 0;

                    if (real_pay_price !== (card_pay_price + cash_pay_price)) {
                        alert((index + 1) + '번째 상품의 카드, 현금 결제금액이 올바르지 않습니다.');
                        is_pay_check = false;
                        return false;
                    }
                });

                if (is_pay_check === false) {
                    return false;
                }

                // 총 결제금액 확인
                if ($regi_form.find('[name="total_real_pay_price"]').val() !== $regi_form.find('[name="sum_real_pay_price"]').val()) {
                    alert('총 실결제금액과 총 카드+현금결제금액이 일치하지 않습니다.');
                    return false;
                }

                if (!confirm('해당 상품을 수강 등록하시겠습니까?')) {
                    return false;
                }

                return true;
            };

            // 전체적용 체크박스 클릭
            $regi_form.on('ifChanged', 'input[name="is_all_disc_rate"], input[name="is_all_disc_reason"]', function() {
                var is_set_all = $(this).filter(':checked').val() || 'N';
                var set_fields = $(this).data('set-field').split(',');
                var field = '', set_value = '';

                set_fields.forEach(function(val) {
                    field = val.split(':');

                    if (is_set_all === 'Y') {
                        set_value = $regi_form.find('[name="' + field[0] + '[]"]:eq(0)').val();
                        $regi_form.find('[name="' + field[0] + '[]"]').val(set_value);
                    } else {
                        $regi_form.find('[name="' + field[0] + '[]"]').val(field[1]);
                    }

                    if ($regi_form.find('[name="' + field[0] + '[]"]').prop('class').indexOf('set-pay-price') > -1) {
                        $regi_form.find('[name="' + field[0] + '[]"]').trigger('change');   // 결제금액 변경 이벤트 발생
                    }
                });
            });

            // 할인구분, 할인율 변경할 경우 결제금액 계산 및 셋팅
            $regi_form.on('change', '.set-pay-price', function() {
                var index = $regi_form.find('[name="' + $(this).prop('name') + '"]').index(this);
                var order_price = parseInt($regi_form.find('[name="order_price[]"]').eq(index).val());
                var disc_type = $regi_form.find('[name="disc_type[]"]').eq(index).val();
                var disc_rate = parseInt($regi_form.find('[name="disc_rate[]"]').eq(index).val()) || 0;
                var real_pay_price = 0;

                // 할인율 적용
                if (disc_type === 'R') {
                    real_pay_price = order_price * ((100 - disc_rate) / 100);
                } else {
                    real_pay_price = order_price - disc_rate;
                }

                $regi_form.find('[name="real_pay_price[]"]').eq(index).val(real_pay_price);
                $regi_form.find('[name="real_pay_price[]"]').eq(index).trigger('change');   // 결제금액 변경 이벤트 발생
            });

            // 결제, 카드, 현금금액 합산
            $regi_form.on('change', '.set-sum-price', function() {
                var target = $(this).prop('name').split('_')[0];
                var input = $regi_form.find('[name="' + $(this).prop('name') + '"]');
                var total_pay_price = 0;
                var total_card_pay_price = 0;
                var total_cash_pay_price = 0;

                // 금액 합산
                input.each(function() {
                    total_pay_price += parseInt($(this).val()) || 0;
                });
                $regi_form.find('[name="total_' + target + '_pay_price"]').val(total_pay_price);

                // 카드, 현금결제금액 변경할 경우만
                if (target !== 'real') {
                    // 총 카드, 현금결제금액
                    total_card_pay_price = parseInt($regi_form.find('[name="total_card_pay_price"]').val());
                    total_cash_pay_price = parseInt($regi_form.find('[name="total_cash_pay_price"]').val());
                    $regi_form.find('[name="sum_real_pay_price"]').val(total_card_pay_price + total_cash_pay_price);

                    // 결제수단, 카드사 선택 셋팅
                    $regi_form.find('[name="pay_method_ccd"]').iCheck('disable');

                    if (total_card_pay_price > 0) {
                        $regi_form.find('[name="card_ccd"]').prop('disabled', false);
                        if (total_cash_pay_price > 0) {
                            $regi_form.find('[id="pay_method_card_cash"]').iCheck('enable').iCheck('check');
                        } else {
                            $regi_form.find('[id="pay_method_card"]').iCheck('enable').iCheck('check');
                        }
                    } else {
                        if (total_cash_pay_price > 0) {
                            $regi_form.find('[name="card_ccd"]').prop('disabled', true);
                            $regi_form.find('[id="pay_method_cash"]').iCheck('enable').iCheck('check');
                        }
                    }
                }
            });

            // 목록 이동
            $('#btn_list').click(function() {
                goList();
            });

            var goList = function() {
                location.replace('{{ site_url('/pay/visit/index') }}' + getQueryString());
            };
        });
    </script>
@stop
