@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원에 방문한 수강생의 학원강좌 결제를 진행하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="order_idx" value="{{ $idx }}"/>
                <input type="hidden" name="mem_idx" value="{{ $data['mem']['MemIdx'] or '' }}" data-result-data=""/>
                <input type="hidden" id="search_site_code" name="search_site_code" value="{{ $def_site_code }}"/>
                @if(isset($data['mem']) === false)
                    <div class="row">
                        <label class="control-label col-md-1" for="search_mem_id">· 회원검색</label>
                        <div class="col-md-8 form-inline">
                            <input type="text" id="search_mem_id" name="search_mem_id" class="form-control input-sm" title="회원검색어" value="">
                            <button type="button" name="btn_member_search" data-result-type="single" class="btn btn-primary btn-sm mb-0 ml-5">회원검색</button>
                            <p class="form-control-static ml-20">이름, 아이디, 휴대폰번호 검색 가능</p>
                        </div>
                    </div>
                    <div class="ln_solid bdt-line mt-10 mb-20"></div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>회원정보</strong></h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-sm btn-primary mr-10 btn-message btn-target-crm-member" data-mem-idx="{{ $data['mem']['MemIdx'] or '' }}">쪽지발송</button>
                        <button type="button" class="btn btn-sm btn-primary mr-10 btn-sms btn-target-crm-member" data-mem-idx="{{ $data['mem']['MemIdx'] or '' }}">SMS발송</button>
                        <button type="button" class="btn btn-sm bg-dark mr-0 btn-auto-login btn-target-crm-member" data-mem-idx="{{ $data['mem']['MemIdx'] or '' }}">자동로그인</button>
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
                                    @if(isset($data['mem']) === true)
                                        <td>{{ $data['mem']['MemIdx'] }} ({{ $data['mem']['SiteName'] }})</td>
                                        <td>{{ $data['mem']['JoinDate'] }}</td>
                                        <td>{{ $data['mem']['MemName'] }} ({{ $data['mem']['Sex'] == 'M' ? '남' : '여' }})</td>
                                        <td>{{ $data['mem']['MemId'] }}</td>
                                        <td>{{ $data['mem']['Phone'] }} ({{ $data['mem']['SmsRcvStatus'] }})</td>
                                        <td>{{ $data['mem']['Mail'] }} ({{ $data['mem']['MailRcvStatus'] }})</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ln_solid mt-5"></div>
                @if($is_order === true)
                    {{-- 주문수정 --}}
                    <div class="row">
                        <div class="col-md-6">
                            <h4><strong>상품결제정보</strong></h4>
                        </div>
                        <div class="col-md-12">
                            <table id="list_pay_info_table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>캠퍼스</th>
                                    <th width="370">상품명
                                        @if($data['order']['IsLecDisc'] == 'Y')
                                            <button type="button" name="btn_lecture_disc_rate_init" class="btn btn-success mb-0">할인취소</button>
                                        @endif
                                    </th>
                                    <th>주문금액</th>
                                    <th>할인율 [ <input type="checkbox" name="is_all_disc_rate" data-set-field="disc_type:R,disc_rate:0" class="flat" value="Y"> 전체적용]</th>
                                    <th>할인사유 [ <input type="checkbox" name="is_all_disc_reason" data-set-field="disc_reason:" class="flat" value="Y"> 전체적용]</th>
                                    <th>카드 [ <input type="checkbox" name="is_all_all_card_pay_price" class="flat" value="card"> 전체적용]</th>
                                    <th>현금 [ <input type="checkbox" name="is_all_all_cash_pay_price" class="flat" value="cash"> 전체적용]</th>
                                    <th>결제금액</th>
                                    <th>단위올림</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['order_prod'] as $order_prod_row)
                                        <tr>
                                            <td>{{ $order_prod_row['CampusCcdName'] }}</td>
                                            <td>{{ $order_prod_row['ProdAddInfo'] }}
                                                <div class="blue inline-block">[{{ $order_prod_row['LearnPatternCcdName'] or $order_prod_row['ProdTypeCcdName'] }}]</div>
                                                {{ $order_prod_row['ProdName'] }}
                                                <input type="hidden" name="order_prod_idx[]" value="{{ $order_prod_row['OrderProdIdx'] }}"/>
                                                <input type="hidden" name="remark[]" value="{{ $order_prod_row['Remark'] }}"/>
                                                <div class="lec_disc_info red">{{ $order_prod_row['Remark'] }}</div>
                                            </td>
                                            <td>
                                                <input type="number" name="order_price[]" class="form-control input-sm" title="주문금액" value="{{ $order_prod_row['OrderPrice'] }}" readonly="readonly">
                                                <input type="hidden" name="sale_price[]" value="{{ $order_prod_row['RealSalePrice'] }}">
                                                <div class="mt-5">
                                                    [정상가] {{ number_format($order_prod_row['SalePrice']) }}
                                                </div>
                                            </td>
                                            <td class="form-inline">
                                                <select class="form-control input-sm set-pay-price" name="disc_type[]">
                                                    <option value="R">%</option>
                                                    <option value="P">원</option>
                                                </select>
                                                <input type="number" name="disc_rate[]" class="form-control input-sm set-pay-price" title="할인율" value="0" style="width: 120px;">
                                            </td>
                                            <td>
                                                <input type="text" name="disc_reason[]" class="form-control input-sm" title="할인사유" value="">
                                            </td>
                                            <td>
                                                <input type="number" name="card_pay_price[]" class="form-control input-sm set-sum-price" title="카드결제금액" value="0">
                                                <div class="mt-5">
                                                    <label><input type="checkbox" name="is_all_card_pay_price" class="flat" value="card"/> 전액적용</label>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" name="cash_pay_price[]" class="form-control input-sm set-sum-price" title="현금결제금액" value="0">
                                                <div class="mt-5">
                                                    <label><input type="checkbox" name="is_all_cash_pay_price" class="flat" value="cash"/> 전액적용</label>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" name="real_pay_price[]" class="form-control input-sm set-sum-price" title="실결제금액" value="{{ $order_prod_row['RealPayPrice'] }}" readonly="readonly">
                                            </td>
                                            <td>
                                                <button type="button" name="btn_surplus_calc" class="btn btn-success">올림</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="9" class="form-inline text-right bg-info bold">
                                        [총 실결제금액] <input type="number" name="total_real_pay_price" class="form-control input-sm ml-10" title="총 실결제금액" value="{{ $data['order']['tRealPayPrice'] }}" readonly="readonly"> 원
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @else
                    {{-- 주문등록 --}}
                    <div class="row">
                        <div class="col-md-6">
                            <h4><strong>상품결제정보</strong></h4>
                        </div>
                        <div class="col-md-6 text-right form-inline item">
                            {!! html_site_select($regi_site_code, 'site_code', 'site_code', 'form-control input-sm', '운영 사이트', 'required', '', false, $arr_regi_site_code) !!}
                            <button type="button" id="btn_product_search" class="btn btn-sm btn-primary mb-0 ml-5">상품검색</button>
                            <span id="selected_product" class="hide"></span>
                        </div>
                        <div class="col-md-12">
                            <table id="list_pay_info_table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>캠퍼스</th>
                                    <th width="370">상품명 <button type="button" name="btn_lecture_disc_rate_init" class="btn btn-success mb-0 hide">할인취소</button></th>
                                    <th>주문금액</th>
                                    <th>할인율 [ <input type="checkbox" name="is_all_disc_rate" data-set-field="disc_type:R,disc_rate:0" class="flat" value="Y"> 전체적용]</th>
                                    <th>할인사유 [ <input type="checkbox" name="is_all_disc_reason" data-set-field="disc_reason:" class="flat" value="Y"> 전체적용]</th>
                                    <th>카드 [ <input type="checkbox" name="is_all_all_card_pay_price" class="flat" value="card"> 전체적용]</th>
                                    <th>현금 [ <input type="checkbox" name="is_all_all_cash_pay_price" class="flat" value="cash"> 전체적용]</th>
                                    <th>결제금액</th>
                                    <th>단위올림</th>
                                    <th>삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(isset($data['order_prod']) === true)
                                        {{-- 독서실, 사물함 연장 --}}
                                        @foreach($data['order_prod'] as $order_prod_row)
                                            <tr id="prod_{{ $order_prod_row['ProdCode'] }}">
                                                <td>{{ $order_prod_row['CampusCcdName'] }}</td>
                                                <td>{{ $order_prod_row['ProdAddInfo'] }}
                                                    <div class="blue inline-block">[{{ $order_prod_row['LearnPatternCcdName'] or $order_prod_row['ProdTypeCcdName'] }}]</div>
                                                    {{ $order_prod_row['ProdName'] }}
                                                    <input type="hidden" name="prod_code[]" value="{{ $order_prod_row['ProdCode'] }}:{{ $order_prod_row['ProdType'] }}:{{ $order_prod_row['LearnPatternCcd'] }}"/>
                                                    @if($order_prod_row['ProdType'] == 'reading_room' || $order_prod_row['ProdType'] == 'locker')
                                                        <div class="red inline-block">- 연장 (<a href="{{ site_url('/pay/visit/show/') . $order_prod_row['TargetOrderIdx'] }}" class="red" target="_blank">{{ $order_prod_row['OrderNo'] }}</a>)</div>
                                                        <br/><button type="button" name="btn_set_seat" class="btn btn-xs btn-success mt-5 mb-0" data-prod-type="{{ $order_prod_row['ProdType'] }}" data-prod-code="{{ $order_prod_row['ProdCode'] }}" data-target-order-idx="{{ $order_prod_row['TargetOrderIdx'] }}"> {{ $order_prod_row['ProdTypeCcdName'] }} 배정</button>
                                                    @endif
                                                    <input type="hidden" name="target_order_idx[]" value="{{ $order_prod_row['TargetOrderIdx'] }}"/>
                                                    <input type="hidden" name="remark[]" value=""/>
                                                    <div class="lec_disc_info red"></div>
                                                </td>
                                                <td>
                                                    <input type="number" name="order_price[]" class="form-control input-sm" title="주문금액" value="{{ $order_prod_row['RealSalePrice'] }}" readonly="readonly">
                                                    <input type="hidden" name="sale_price[]" value="{{ $order_prod_row['RealSalePrice'] }}">
                                                    <div class="mt-5">
                                                        [정상가] {{ number_format($order_prod_row['SalePrice']) }}
                                                    </div>
                                                </td>
                                                <td class="form-inline">
                                                    <select class="form-control input-sm set-pay-price" name="disc_type[]">
                                                        <option value="R">%</option>
                                                        <option value="P">원</option>
                                                    </select>
                                                    <input type="number" name="disc_rate[]" class="form-control input-sm set-pay-price" title="할인율" value="0" style="width: 120px;">
                                                </td>
                                                <td>
                                                    <input type="text" name="disc_reason[]" class="form-control input-sm" title="할인사유" value="">
                                                </td>
                                                <td>
                                                    <input type="number" name="card_pay_price[]" class="form-control input-sm set-sum-price" title="카드결제금액" value="0">
                                                    <div class="mt-5">
                                                        <label><input type="checkbox" name="is_all_card_pay_price" class="flat" value="card"/> 전액적용</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="number" name="cash_pay_price[]" class="form-control input-sm set-sum-price" title="현금결제금액" value="0">
                                                    <div class="mt-5">
                                                        <label><input type="checkbox" name="is_all_cash_pay_price" class="flat" value="cash"/> 전액적용</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="number" name="real_pay_price[]" class="form-control input-sm set-sum-price" title="실결제금액" value="{{ $order_prod_row['RealSalePrice'] }}" readonly="readonly">
                                                </td>
                                                <td>
                                                    <button type="button" name="btn_surplus_calc" class="btn btn-success">올림</button>
                                                </td>
                                                <td>
                                                    <a href="#none" data-prod-code="{{ $order_prod_row['ProdCode'] }}" class="selected-product-delete"><i class="fa fa-times red"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="10" class="form-inline text-right bg-info bold">
                                        [총 실결제금액] <input type="number" name="total_real_pay_price" class="form-control input-sm ml-10" title="총 실결제금액" value="0" readonly="readonly"> 원
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @endif
                <div class="ln_solid mt-5"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>상품결제처리</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group bdt-line bg-odd bold">
                            <label class="control-label col-md-1 pt-5 pl-20">결제수단</label>
                            <div class="col-md-9 form-inline">
                                <input type="radio" id="pay_method_card" name="pay_method_ccd" class="flat" value="{{ $chk_pay_method_ccd['visit_card'] }}" title="카드" disabled="disabled"/> <label class="input-label">카드</label>
                                <input type="radio" id="pay_method_cash" name="pay_method_ccd" class="flat" value="{{ $chk_pay_method_ccd['visit_cash'] }}" title="현금" disabled="disabled"/> <label class="input-label">현금</label>
                                <input type="radio" id="pay_method_willbes_bank" name="pay_method_ccd" class="flat" value="{{ $chk_pay_method_ccd['willbes_bank'] }}" title="윌비스계좌이체" disabled="disabled"/> <label class="input-label">윌비스계좌이체</label>
                                <input type="radio" id="pay_method_card_cash" name="pay_method_ccd" class="flat" value="{{ $chk_pay_method_ccd['visit_card_cash'] }}" title="카드+현금" disabled="disabled"/> <label class="input-label">카드+현금</label>
                                <input type="radio" id="pay_method_zero" name="pay_method_ccd" class="flat" value="{{ $chk_pay_method_ccd['visit_zero'] }}" title="0원결제" @if($is_order === true && $data['order']['tRealPayPrice'] < 1) checked="checked" @else disabled="disabled" @endif/> <label class="input-label mr-50">0원결제</label>
                                [카드선택]
                                <select class="form-control input-sm ml-5" name="card_ccd" disabled="disabled" title="카드선택">
                                    <option value="">카드선택</option>
                                    @foreach($arr_card_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group bg-odd bold">
                            <label class="control-label col-md-1 pt-5 pl-20">결제금액</label>
                            <div class="col-md-9 form-inline">
                                [카드] <input type="number" name="total_card_pay_price" class="form-control input-sm ml-10 mr-10" title="총 카드결제금액" value="0" readonly="readonly">
                                + [현금] <input type="number" name="total_cash_pay_price" class="form-control input-sm ml-10 mr-10" title="총 현금결제금액" value="0" readonly="readonly">
                                = <input type="number" name="sum_real_pay_price" class="form-control input-sm ml-10" title="총 실결제금액" value="0" readonly="readonly"> 원
                            </div>
                        </div>
                        <div class="form-group bold">
                            <label class="control-label col-md-1 pt-5 pl-20">카드+현금계산</label>
                            <div class="col-md-9 form-inline">
                                [카드] <input type="number" name="calc_card_pay_price" class="form-control input-sm ml-10 mr-10" title="총 카드결제금액" value="0">
                                + [현금] <input type="number" name="calc_cash_pay_price" class="form-control input-sm ml-10 mr-10" title="총 현금결제금액" value="0" readonly="readonly">
                                <button type="button" name="btn_card_cash_calc" class="btn btn-sm btn-success">계산</button>
                            </div>
                        </div>
                        @if($is_order === false)
                            <div class="form-group">
                                <label class="control-label col-md-1 pl-20">메모</label>
                                <div class="col-md-7">
                                    <textarea id="order_memo" name="order_memo" class="form-control" rows="2" title="메모"></textarea>
                                </div>
                            </div>
                        @endif
                        <div class="text-center mt-20">
                            <button type="submit" name="btn_visit_order" class="btn btn-success">수강등록하기</button>
                            <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                        </div>
                    </div>
                </div>
            </form>
            @if($is_order === true)
                <div class="ln_solid mt-5"></div>
                <div class="row">
                    {{-- 주문 메모 --}}
                    @include('lms.pay.order.order_memo_partial')
                </div>
            @endif
            <div class="ln_solid mt-15"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mb-0"><strong>학원방문수강접수 전체내역</strong></h4>
                </div>
                <div class="col-md-12">
                    {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
                </div>
                <div class="col-md-12">
                    <table id="list_order_detail_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th class="rowspan">주문번호</th>
                            <th class="rowspan">결제채널</th>
                            <th class="rowspan">결제루트</th>
                            <th class="rowspan">결제수단</th>
                            <th class="rowspan">결제완료일 (접수신청일)</th>
                            <th class="rowspan">총 실결제금액</th>
                            <th>상품구분</th>
                            <th>캠퍼스</th>
                            <th>상품명</th>
                            <th>실결제금액</th>
                            <th>결제상태</th>
                            <th class="rowspan">등록자</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="/public/js/lms/search_member.js"></script>
    <script type="text/javascript">
        var $datatable;
        var $regi_form = $('#regi_form');
        var $list_table = $('#list_order_detail_table');

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
                var arr_prod_info = [];
                var is_prod_check = true;
                var is_pay_check = true;

                {{-- 주문등록 상품 체크 --}}
                @if($is_order === false)
                    if ($regi_form.find('[name="prod_code[]"]').length < 1) {
                        alert('상품을 선택해 주세요.');
                        return false;
                    }

                    // 상품별 추가정보 입력여부 체크
                    $regi_form.find('[name="prod_code[]"]').each(function(index) {
                        arr_prod_info = $(this).val().split(':');

                        if (arr_prod_info[1] === 'reading_room' || arr_prod_info[1] === 'locker') {
                            // 독서실, 사물함 좌석배정 체크
                            if ($regi_form.find('[name="rdr_prod_code[]"][value="' + arr_prod_info[0] + '"]').length < 1) {
                                alert((index + 1) + '번째 상품의 좌석배정 정보를 선택해 주세요.');
                                is_prod_check = false;
                                return false;
                            }
                        } else if (arr_prod_info[1] === 'mock_exam') {
                            // 모의고사 응시정보 체크
                            if ($regi_form.find('[name="mock_prod_code[]"][value="' + arr_prod_info[0] + '"]').length < 1) {
                                alert((index + 1) + '번째 상품의 신청정보를 입력해 주세요.');
                                is_prod_check = false;
                                return false;
                            }
                        }
                    });

                    if (is_prod_check === false) {
                        return false;
                    }
                @endif

                if ($regi_form.find('[name="mem_idx"]').val().length < 1) {
                    alert('회원을 선택해 주세요.');
                    return false;
                }

                if ($regi_form.find('[name="pay_method_ccd"]:checked').length < 1) {
                    alert('결제수단을 선택해 주세요.');
                    return false;
                }

                if ($regi_form.find('[name="total_real_pay_price"]').val() > 0) {
                    if ($regi_form.find('[id="pay_method_zero"]:checked').length > 0) {
                        alert('0원이 초과되는 결제금액은 결제수단을 0원결제로 선택하실 수 없습니다.');
                        return false;
                    }
                } else {
                    if ($regi_form.find('[id="pay_method_zero"]:checked').length < 1) {
                        alert('결제수단을 0원결제로 선택하셔야 합니다.');
                        return false;
                    }
                }

                if ($regi_form.find('[name="pay_method_ccd"]:checked').prop('id').indexOf('_card') > -1 && $regi_form.find('[name="card_ccd"]').val() === '') {
                    alert('결제카드를 선택해 주세요.');
                    return false;
                }

                // 상품별 카드, 현금결제 금액 확인
                $regi_form.find('[name="card_pay_price[]"]').each(function(index) {
                    real_pay_price = parseInt($regi_form.find('[name="real_pay_price[]"]').eq(index).val(), 10);
                    card_pay_price = parseInt($regi_form.find('[name="card_pay_price[]"]').eq(index).val(), 10) || 0;
                    cash_pay_price = parseInt($regi_form.find('[name="cash_pay_price[]"]').eq(index).val(), 10) || 0;

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

                return confirm('해당 상품을 수강 등록하시겠습니까?');
            };

        {{-- 주문등록 --}}
        @if($is_order === false)
            // 회원선택 결과 이벤트
            $regi_form.on('change', 'input[name="mem_idx"]', function() {
                // 회원정보 셋팅
                var mem_data = $(this).data('result-data');
                var $mem_table_td = $('#list_mem_table tbody tr td');

                $mem_table_td.eq(0).html(mem_data.MemIdx + ' (' + mem_data.SiteName + ')');
                $mem_table_td.eq(1).html(mem_data.JoinDate);
                $mem_table_td.eq(2).html(mem_data.MemName + ' (' + (mem_data.Sex === 'M' ? '남' : '여') + ')');
                $mem_table_td.eq(3).html(mem_data.MemId);
                $mem_table_td.eq(4).html(mem_data.Phone + ' (' + mem_data.SmsRcvStatus + ')');
                $mem_table_td.eq(5).html(mem_data.Mail + ' (' + mem_data.MailRcvStatus + ')');

                $('.btn-target-crm-member').data('mem-idx', mem_data.MemIdx);
                $regi_form.find('input[name="search_mem_id"]').val('');

                // 방문수강접수 목록
                $datatable.draw();
            });

            // 상품검색 버튼 클릭
            $('#btn_product_search').on('click', function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return false;
                }

                $('#btn_product_search').setLayer({
                    'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&prod_type=off&return_type=inline&target_id=selected_product&target_field=prod_code'
                        + '&prod_tabs=off,book,reading_room,locker,mock_exam&hide_tabs=off_pack_lecture&is_event=Y',
                    'width' : 1400
                });
            });

            // 상품선택 결과 이벤트
            $regi_form.on('change', '#selected_product', function() {
                var $tbody = $('#list_pay_info_table tbody');
                var code, data, html = '';
                var $selected_prod_code = {};

                // 기 선택된 상품코드 저장
                $tbody.find('input[name="prod_code[]"]').each(function() {
                    code = $(this).val().split(':')[0];
                    $selected_prod_code[code] = code;
                });

                $(this).find('input[name="prod_code[]"]').each(function() {
                    code = $(this).val();
                    data = $(this).data();

                    if ($selected_prod_code.hasOwnProperty(code) === false) {
                        html += '<tr id="prod_' + code + '">\n' +
                            '    <td>' + data.campusCcdName + '</td>\n' +
                            '    <td>' + (typeof(data.cateName) !== 'undefined' ? data.cateName : '') +
                            '    ' + (typeof(data.studyPatternCcdName) !== 'undefined' && data.studyPatternCcdName !== '' ? ' | ' + data.studyPatternCcdName : '') +
                            '    ' + '<div class="blue inline-block">[' + (data.learnPatternCcdName !== '' ? data.learnPatternCcdName : data.prodTypeCcdName) + ']</div> ' + Base64.decode(data.prodName) +
                            '    ' + '<input type="hidden" name="prod_code[]" value="' + code + ':' + data.prodType + ':' + data.learnPatternCcd + '"/>' +
                            '    ' + (data.prodType === 'reading_room' || data.prodType === 'locker' ? '<br/><button type="button" name="btn_set_seat" class="btn btn-xs btn-success mt-5 mb-0" data-prod-type="' + data.prodType + '" data-prod-code="' + code + '" data-target-order-idx="">' + data.prodTypeCcdName + '배정</button>' : '') +
                            '    ' + (data.prodType === 'mock_exam' ? '<br/><button type="button" name="btn_set_mock_exam" class="btn btn-xs btn-success mt-5 mb-0" data-prod-type="' + data.prodType + '" data-prod-code="' + code + '" data-target-order-idx="">신청정보입력</button>' : '') +
                            '    ' + '<input type="hidden" name="target_order_idx[]" value=""/>' +
                            '    ' + '<input type="hidden" name="remark[]" value=""/>' +
                            '    ' + '<div class="lec_disc_info red"></div>' +
                            '    </td>\n' +
                            '    <td>\n' +
                            '       <input type="number" name="order_price[]" class="form-control input-sm" title="주문금액" value="' + data.realSalePrice + '" readonly="readonly">\n' +
                            '       <input type="hidden" name="sale_price[]" value="' + data.realSalePrice + '">\n' +
                            '       <div class="mt-5">\n' +
                            '           [정상가] ' + addComma(data.salePrice) + '\n' +
                            '       </div>\n' +
                            '    </td>\n' +
                            '    <td class="form-inline">\n' +
                            '        <select class="form-control input-sm set-pay-price" name="disc_type[]">\n' +
                            '            <option value="R">%</option>\n' +
                            '            <option value="P">원</option>\n' +
                            '        </select>\n' +
                            '        <input type="number" name="disc_rate[]" class="form-control input-sm set-pay-price" title="할인율" value="0" style="width: 120px;">\n' +
                            '    </td>\n' +
                            '    <td>\n' +
                            '        <input type="text" name="disc_reason[]" class="form-control input-sm" title="할인사유" value="">\n' +
                            '    </td>\n' +
                            '    <td>\n' +
                            '        <input type="number" name="card_pay_price[]" class="form-control input-sm set-sum-price" title="카드결제금액" value="0">\n' +
                            '        <div class="mt-5">\n' +
                            '           <label><input type="checkbox" name="is_all_card_pay_price" class="flat" value="card"/> 전액적용</label>\n' +
                            '        </div>\n' +
                            '    </td>\n' +
                            '    <td>\n' +
                            '        <input type="number" name="cash_pay_price[]" class="form-control input-sm set-sum-price" title="현금결제금액" value="0">\n' +
                            '        <div class="mt-5">\n' +
                            '           <label><input type="checkbox" name="is_all_cash_pay_price" class="flat" value="cash"/> 전액적용</label>\n' +
                            '        </div>\n' +
                            '    </td>\n' +
                            '    <td>\n' +
                            '        <input type="number" name="real_pay_price[]" class="form-control input-sm set-sum-price" title="실결제금액" value="' + data.realSalePrice + '" readonly="readonly">\n' +
                            '    </td>\n' +
                            '    <td>\n' +
                            '        <button type="button" name="btn_surplus_calc" class="btn btn-success">올림</button>\n' +
                            '    </td>\n' +
                            '    <td>\n' +
                            '        <a href="#none" data-prod-code="' + code + '" class="selected-product-delete"><i class="fa fa-times red"></i></a>\n' +
                            '    </td>\n' +
                            '</tr>';
                    }
                });

                $(this).html('');    // 기 선택 상품 초기화
                $tbody.append(html);
                init_iCheck();  // 체크박스 플러그인 활성화
                getLectureDiscRate();   // 강좌할인율 조회
                setTotalPrice();   // 결제금액 재계산
            });

            // 선택상품 삭제 (상품결제정보 테이블 row 삭제)
            $regi_form.on('click', '.selected-product-delete', function() {
                var that = $(this);
                var prod_code = that.data('prod-code');
                var remark = $regi_form.find('#prod_' + prod_code).find('[name="remark[]"]').val();

                that.parent().parent().remove();
                $regi_form.find('.rdr_' + prod_code).remove();  // 독서실, 사물함 좌석배정 정보 삭제
                $regi_form.find('.mock_' + prod_code).remove();  // 모의고사 정보 삭제

                // 할인정보가 선택된 상품을 삭제했을 경우만 강좌할인율 조회
                if (remark.length > 0) {
                    getLectureDiscRate();
                }
                setTotalPrice();   // 결제금액 재계산
            });

            // 강좌할인율 조회
            var getLectureDiscRate = function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                var $tbody = $('#list_pay_info_table tbody');
                var code = '';
                var $params = {};

                // 기설정된 할인정보 초기화
                initLectureDiscRate();

                // 선택된 상품코드 저장
                $tbody.find('input[name="prod_code[]"]').each(function(idx) {
                    code = $(this).val().split(':')[0];
                    $params[idx] = code;
                });

                // 2개 이상의 상품만 강좌할인율 조회 대상
                if (site_code.length < 1 || Object.keys($params).length <= 1) {
                    return;
                }

                // 강좌할인율 조회
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'site_code' : site_code,
                    'params' : JSON.stringify($params)
                };
                sendAjax('{{ site_url('/pay/visit/checkDiscRate') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        if (ret.ret_data !== null && Object.keys(ret.ret_data).length > 0) {
                            $.each(ret.ret_data, function (k, v) {
                                var $prod_tr = $('#prod_' + k);
                                var order_price = parseInt($prod_tr.find('[name="sale_price[]"]').val(), 10) || 0;
                                order_price = order_price * ((100 - v.DiscRate) / 100);  // 주문금액 할인율 반영
                                order_price = Math.ceil(order_price); // 소숫점 올림

                                $prod_tr.find('.lec_disc_info').html(v.DiscTitle + ' (↓' + v.DiscRate + '%)');
                                $prod_tr.find('[name="remark[]"]').val(v.DiscTitle + ' (' + v.DiscRate + '% 할인)');
                                $prod_tr.find('[name="order_price[]"]').val(order_price);
                                $prod_tr.find('[name="disc_rate[]"]').trigger('change');
                            });

                            // 할인취소 버튼 노출
                            $regi_form.find('button[name="btn_lecture_disc_rate_init"]').removeClass('hide');
                        }
                    }
                }, showValidateError, false, 'POST');
            };

            @if(empty($target_type) === false)
                $(function() {
                    // 재주문일 경우 강좌할인율 조회
                    @if($target_type == 'reorder')
                        getLectureDiscRate();
                    @endif

                    // 재주문, 독서실/사물함 연장일 경우 총 실결제금액 셋팅
                    if ($regi_form.find('[name="total_real_pay_price"]').val() < 1) {
                        setTotalPrice();
                    }
                });
            @endif
        @endif

            // 강좌할인율 초기화
            var initLectureDiscRate = function() {
                var $tbody = $('#list_pay_info_table tbody');

                // 기설정된 할인정보 초기화
                $tbody.find('input[name="remark[]"]').each(function(idx) {
                    if ($(this).val().length > 0) {
                        $tbody.find('.lec_disc_info').eq(idx).html('');
                        $tbody.find('[name="remark[]"]').eq(idx).val('');
                        $tbody.find('[name="order_price[]"]').eq(idx).val($tbody.find('[name="sale_price[]"]').eq(idx).val());
                        $tbody.find('[name="disc_rate[]"]').eq(idx).trigger('change');
                    }
                });
            };

            // 강좌할인율 할인취소 버튼 클릭
            $regi_form.on('click', 'button[name="btn_lecture_disc_rate_init"]', function() {
                if (confirm('정말로 할인취소를 하시겠습니까?')) {
                    initLectureDiscRate();
                    $(this).addClass('hide');
                }
            });

            // 독서실, 사물함 좌석배정 버튼 클릭
            $regi_form.on('click', 'button[name="btn_set_seat"]', function() {
                var param = '?mang_type=' + ($(this).data('prod-type') === 'reading_room' ? 'R' : 'L');
                param += '&rdr_master_order_idx=' + $(this).data('target-order-idx');

                $('button[name="btn_set_seat"]').setLayer({
                    "url" : "{{ site_url('/common/searchReadingRoom/createSeatModal/') }}"+ $(this).data('prod-code') + param,
                    "width" : "1200"
                });
            });

            // 모의고사 신청정보입력 버튼 클릭
            $regi_form.on('click', 'button[name="btn_set_mock_exam"]', function() {
                var mem_idx = $regi_form.find('[name="mem_idx"]').val();

                if (mem_idx.length < 1) {
                    alert('회원을 선택해 주세요.');
                    return false;
                }

                $('button[name="btn_set_mock_exam"]').setLayer({
                    "url" : "{{ site_url('/common/searchMockTest/createApplyRegistModal/') }}"+ $(this).data('prod-code') + '?mem_idx=' + mem_idx,
                    "width" : "800"
                });
            });

            // 전체적용 체크박스 클릭
            $regi_form.on('ifChanged', 'input[name="is_all_disc_rate"], input[name="is_all_disc_reason"]', function() {
                var is_set_all = $(this).filter(':checked').val() || 'N';
                var set_fields = $(this).data('set-field').split(',');
                var field = '', set_value = '';

                set_fields.forEach(function(val) {
                    field = val.split(':');

                    if ($regi_form.find('[name="' + field[0] + '[]"]').length > 0) {
                        if (is_set_all === 'Y') {
                            set_value = $regi_form.find('[name="' + field[0] + '[]"]:eq(0)').val();
                            $regi_form.find('[name="' + field[0] + '[]"]').val(set_value);
                        } else {
                            $regi_form.find('[name="' + field[0] + '[]"]').val(field[1]);
                        }

                        if ($regi_form.find('[name="' + field[0] + '[]"]').prop('class').indexOf('set-pay-price') > -1) {
                            $regi_form.find('[name="' + field[0] + '[]"]').trigger('change');   // 결제금액 변경 이벤트 발생
                        }
                    }
                });
            });

            // 할인구분, 할인율 변경할 경우 결제금액 계산 및 셋팅
            $regi_form.on('change', '.set-pay-price', function() {
                var index = $regi_form.find('[name="' + $(this).prop('name') + '"]').index(this);
                var order_price = parseInt($regi_form.find('[name="order_price[]"]').eq(index).val(), 10);
                var disc_type = $regi_form.find('[name="disc_type[]"]').eq(index).val();
                var disc_rate = parseInt($regi_form.find('[name="disc_rate[]"]').eq(index).val(), 10) || 0;
                var real_pay_price = 0;

                if (disc_rate < 0) {
                    alert('할인율은 0 이상의 숫자여야만 합니다.');
                    return;
                }

                // 할인율 적용
                if (disc_type === 'R') {
                    real_pay_price = order_price * ((100 - disc_rate) / 100);
                    real_pay_price = Math.ceil(real_pay_price); // 소숫점 올림
                } else {
                    real_pay_price = order_price - disc_rate;
                }

                // 결제금액 셋팅
                $regi_form.find('[name="real_pay_price[]"]').eq(index).val(real_pay_price);

                // 카드/현금 입력 금액 초기화
                $regi_form.find('[name="card_pay_price[]"]').eq(index).val('0');
                $regi_form.find('[name="cash_pay_price[]"]').eq(index).val('0');

                setTotalPrice();   // 결제금액 재계산
            });

            // 결제, 카드, 현금금액 변경할 경우 결제금액 재계산
            $regi_form.on('change', '.set-sum-price', function() {
                setTotalPrice();
            });

            // 결제, 카드, 현금금액 합산 및 결제수단 셋팅
            var setTotalPrice = function() {
                var inputs = ['real_pay_price', 'card_pay_price', 'cash_pay_price'];
                var input, total_pay_price = 0, i = 0;

                for(i = 0; i < inputs.length; i++) {
                    total_pay_price = 0;
                    input = $regi_form.find('[name="' + inputs[i] + '[]"]');

                    // 금액 합산
                    input.each(function() {
                        total_pay_price += parseInt($(this).val(), 10) || 0;
                    });

                    $regi_form.find('[name="total_' + inputs[i] + '"]').val(total_pay_price);
                }

                // 총 카드, 현금결제금액
                var total_card_pay_price = parseInt($regi_form.find('[name="total_card_pay_price"]').val(), 10);
                var total_cash_pay_price = parseInt($regi_form.find('[name="total_cash_pay_price"]').val(), 10);
                var total_real_pay_price = total_card_pay_price + total_cash_pay_price;
                $regi_form.find('[name="sum_real_pay_price"]').val(total_real_pay_price);

                if (total_real_pay_price > 0) {
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
                            $regi_form.find('[id="pay_method_willbes_bank"]').iCheck('enable');
                        }
                    }
                } else {
                    // 0원결제
                    $regi_form.find('[name="card_ccd"]').prop('disabled', true);
                    $regi_form.find('[id="pay_method_zero"]').iCheck('enable').iCheck('check');
                }
            };

            // 단위올림 계산 및 결제금액 설정
            $regi_form.on('click', 'button[name="btn_surplus_calc"]', function() {
                var index = $regi_form.find('button[name="' + $(this).prop('name') + '"]').index(this);
                var order_price = parseInt($regi_form.find('[name="order_price[]"]').eq(index).val(), 10);
                var real_pay_price = parseInt($regi_form.find('[name="real_pay_price[]"]').eq(index).val(), 10);
                var total_real_pay_price = $regi_form.find('[name="total_real_pay_price"]').val();
                var surplus = total_real_pay_price % 100; // 총실결제금액 10원단위 금액
                var disc_price = 0; // 할인금액

                if (surplus < 1) {
                    return;
                }

                // 결제금액 10원단위 올림
                real_pay_price = real_pay_price + (100 - surplus);

                if (order_price < real_pay_price) {
                    // 결제금액이 주문금액보다 큰 경우 10원단위만큼 결제금액 할인
                    disc_price = surplus;
                } else {
                    // 10원단위만큼 결제금액 추가
                    disc_price = order_price - real_pay_price;
                }

                $regi_form.find('[name="disc_rate[]"]').eq(index).val(disc_price);
                $regi_form.find('[name="disc_type[]"]').eq(index).val('P');
                $regi_form.find('[name="disc_rate[]"]').eq(index).trigger('change');
            });

            // 카드/현금 전액적용 체크박스 클릭
            $regi_form.on('ifChanged', 'input[name="is_all_card_pay_price"], input[name="is_all_cash_pay_price"]', function() {
                var input_name = $(this).prop('name');
                var index = $regi_form.find('[name="' + input_name + '"]').index(this);
                var input_target = $regi_form.find('[name="' + $(this).val() + '_pay_price' + '[]"]').eq(index);
                var input_price = '0';

                if ($(this).prop('checked') === true) {
                    input_price = parseInt($regi_form.find('[name="real_pay_price[]"]').eq(index).val(), 10);
                }

                input_target.val(input_price);
                input_target.trigger('change');
            });

            // 카드/현금 전액적용 전체적용 체크박스 클릭
            $regi_form.on('ifChanged', 'input[name="is_all_all_card_pay_price"], input[name="is_all_all_cash_pay_price"]', function() {
                var input_target = $regi_form.find('[name="is_all_' + $(this).val() + '_pay_price"]');

                if ($(this).prop('checked') === true) {
                    input_target.iCheck('check');
                } else {
                    input_target.iCheck('uncheck');
                }
            });

            // 카드+현금계산 버튼 클릭
            $regi_form.on('click', 'button[name="btn_card_cash_calc"]', function() {
                var prod_cnt = $regi_form.find('[name="real_pay_price[]"]').length;
                var total_real_pay_price = parseInt($regi_form.find('[name="total_real_pay_price"]').val(), 10);
                var calc_card_pay_price = parseInt($regi_form.find('[name="calc_card_pay_price"]').val(), 10);
                var calc_cash_pay_price = total_real_pay_price - calc_card_pay_price;
                var max_card_pay_price = total_real_pay_price - 1000;   // 최대 입력가능 카드결제금액
                var calc_card_rate = (calc_card_pay_price / total_real_pay_price).toFixed(2);   // 카드금액 비율 (소숫점 2자리)
                var sum_card_pay_price = 0, sum_cash_pay_price = 0;     // 상품별 계산된 카드, 현금 결제금액 합계

                if (prod_cnt < 1) {
                    alert('상품을 선택해 주세요.');
                    return;
                }

                if (calc_card_pay_price < 1000) {
                    alert('카드결제금액을 1,000원 이상 입력해 주세요.');
                    return;
                }

                if (calc_card_pay_price > max_card_pay_price) {
                    alert('카드결제금액은 최대 ' + addComma(max_card_pay_price) + '원까지 입력 가능합니다.');
                    return;
                }

                // 상품별 카드, 현금 결제금액 계산
                $regi_form.find('[name="card_pay_price[]"]').each(function(index) {
                    var input_real_pay_price = parseInt($regi_form.find('[name="real_pay_price[]"]').eq(index).val(), 10);
                    var input_card_pay_price, input_cash_pay_price;

                    // 카드결제금액 계산
                    if (prod_cnt === (index + 1)) {
                        input_card_pay_price = calc_card_pay_price - sum_card_pay_price;    // 마지막 카드결제금액 (전체카드결제금액 - 이전카드결제금액 합계)
                    } else {
                        input_card_pay_price = Math.floor(input_real_pay_price * calc_card_rate);   // 실결제금액 * 카드금액 비율
                        input_card_pay_price = input_card_pay_price + (100 - (input_card_pay_price % 100)); // 10원 단위올림
                    }

                    // 현금결제금액 (실결제금액 - 카드결제금액)
                    input_cash_pay_price = input_real_pay_price - input_card_pay_price;

                    // 카드, 현금 결제금액 합계
                    sum_card_pay_price += input_card_pay_price;
                    sum_cash_pay_price += input_cash_pay_price;

                    // 상품별 카드, 현금 결제금액 셋팅
                    $regi_form.find('[name="card_pay_price[]"]').eq(index).val(input_card_pay_price);
                    $regi_form.find('[name="cash_pay_price[]"]').eq(index).val(input_cash_pay_price);
                });

                // 카드+현금 결제금액 계산 검증
                if (calc_card_pay_price !== sum_card_pay_price || calc_cash_pay_price !== sum_cash_pay_price) {
                    alert('입력한 카드+현금 결제금액과 합산된 카드+현금 결제금액이 일치하지 않습니다.');
                    return;
                }

                // 카드+현금계산 > 현금금액 셋팅
                $regi_form.find('[name="calc_cash_pay_price"]').val(calc_cash_pay_price);

                setTotalPrice();   // 결제금액 재계산
            });

            // 방문수강접수 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/pay/visit/listAjax') }}?search_type=mem_idx',
                    'type' : 'POST',
                    'beforeSend' : function() {
                        if ($regi_form.find('[name="mem_idx"]').val().length < 1) {
                            $('.dataTables_processing').css('display', 'none');
                            return false;
                        }
                    },
                    'data' : function(data) {
                        return $.extend(arrToJson($regi_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                dom: 'T<"clear">rtip',
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/pay/visit/show') }}/' + row.OrderIdx + '" class="blue" target="_blank"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'PayChannelCcdName'},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'CompleteDatm', 'render' : function(data, type, row, meta) {
                        return (data !== null ? data : '') + '<br/>(' + row.OrderDatm + ')';
                    }},
                    {'data' : 'tRealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'ProdTypeCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.SalePatternCcdName !== '' ? '<br/>(' + row.SalePatternCcdName + ')' : '');
                    }},
                    {'data' : 'CampusCcdName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> ' + data;
                    }},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'PayStatusCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.PayStatusCcd === '{{ $chk_pay_status_ccd['refund'] }}' ? '<br/>' + (row.RefundDatm !== null ? row.RefundDatm.substr(0, 10) : '') + '<br/>(' + row.RefundAdminName + ')' : '');
                    }},
                    {'data' : 'RegAdminName'}
                ]
            });

            // 학원방문수강접수 전체내역 사이트 탭 클릭
            $('#tabs_site_code').on('click', 'li > a', function() {
                $regi_form.find('input[name="search_site_code"]').val($(this).data('site-code'));
                $datatable.draw();
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
    {{-- 쓰기권한 체크 메시지 --}}
    {!! check_menu_perm_alert('write') !!}
@stop
