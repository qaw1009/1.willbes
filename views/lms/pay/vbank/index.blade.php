@extends('lcms.layouts.master')

@section('content')
    <h5>- 결제수단을 무통장입금으로 신청한 주문현황을 확인할 수 있습니다. (결제완료 주문건은 전체결제현황 메뉴에서 확인 가능합니다.)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">결제기본정보</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_pay_channel_ccd" name="search_pay_channel_ccd">
                            <option value="">결제채널</option>
                        @foreach($arr_pay_channel_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_prod_type_ccd" name="search_prod_type_ccd">
                            <option value="">상품구분</option>
                        @foreach($arr_prod_type_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_learn_pattern_ccd" name="search_learn_pattern_ccd">
                            <option value="">상품상세구분</option>
                        @foreach($arr_learn_pattern_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_status_ccd" name="search_pay_status_ccd">
                            <option value="">결제상태</option>
                        @foreach($arr_pay_status_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-8">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_value">상품검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 주문번호 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="">기타결제조건</label>
                    <div class="col-md-5">
                        <div class="checkbox">
                            <input type="checkbox" id="search_chk_is_escrow" name="search_chk_is_escrow" class="flat" value="Y"/> <label for="search_chk_is_escrow" class="input-label">에스크로(e)</label>
                            <input type="checkbox" id="search_chk_is_coupon" name="search_chk_is_coupon" class="flat" value="Y"/> <label for="search_chk_is_coupon" class="input-label">쿠폰적용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="vbank">가상계좌신청일</option>
                            <option value="vbank_cancel">가상계좌취소일</option>
                            <option value="vbank_expire">가상계좌만료일</option>
                        </select>
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date active" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th rowspan="2" class="rowspan pb-30">선택</th>
                    <th rowspan="2" class="pb-30">No</th>
                    <th rowspan="2" class="rowspan pb-30">주문번호</th>
                    <th rowspan="2" class="rowspan pb-30">회원정보</th>
                    <th rowspan="2" class="rowspan pb-30">결제채널</th>
                    <th rowspan="2" class="rowspan pb-20">가상계좌신청일<br/>(가상계좌취소(만료)일)</th>
                    <th rowspan="2" class="rowspan pb-30">가상계좌정보</th>
                    <th rowspan="2" class="rowspan pb-30">가상계좌취소</th>
                    <th colspan="5">상품구분별정보</th>
                </tr>
                <tr class="bg-odd">
                    <th>상품구분</th>
                    <th>상품명</th>
                    <th>결제금액</th>
                    <th>결제상태</th>
                    <th>할인율</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            // 날짜검색 디폴트 셋팅
            setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
                ajax: {
                    'url' : '{{ site_url('/pay/vbank/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: ['.rowspan'],
                rowGroup: {
                    startRender: null,
                    endRender: function(rows, group) {
                        var t_real_pay_price = rows.data().pluck('tRealPayPrice')[0];
                        var t_use_lec_point = rows.data().pluck('tUseLecPoint')[0];
                        var t_use_book_point = rows.data().pluck('tUseBookPoint')[0];

                        var t_html = '<strong>[총 실결제금액] <span class="blue">' + addComma(t_real_pay_price) + '</span>'
                            + ' (사용 포인트 : ' + addComma(t_use_lec_point) + ' | 교재 : ' + addComma(t_use_book_point) + ')</strong>';

                        return $('<tr class="bg-odd"><td colspan="8"></td><td colspan="5">' + t_html + '</td></tr>');
                    },
                    dataSrc : 'OrderIdx'
                },
                columns: [
                    {'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="order_idx" class="flat" value="' + data + '">';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a class="blue cs-pointer btn-view" data-idx="' + row.OrderIdx + '"><u>' + data + '</u></a><br/>' + row.SiteName + (row.IsEscrow === 'Y' ? '(e)' : '');
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone;
                    }},
                    {'data' : 'PayChannelCcdName'},
                    {'data' : 'OrderDatm', 'render' : function(data, type, row, meta) {
                        return data + '<br/>(' + (row.VBankCancelDatm !== null ? row.VBankCancelDatm : row.VBankExpireDatm) + ')';
                    }},
                    {'data' : 'VBankCcdName', 'render' : function(data, type, row, meta) {
                        return data + '<br/>' + row.VBankAccountNo + '<br/>' + row.VBankDepositName + '<br/>' + row.VBankExpireDatm;
                    }},
                    {'data' : 'VBankStatus', 'render' : function(data, type, row, meta) {
                        return data === 'O' ? '<a class="cs-pointer btn-vbank-cancel" data-idx="' + row.OrderIdx + '"><u>[계좌취소]</u></a>' : '';
                    }},
                    {'data' : 'ProdTypeCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.SalePatternCcdName !== '' ? '<br/>(' + row.SalePatternCcdName + ')' : '');
                    }},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> ' + data;
                    }},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'PayStatusCcdName'},
                    {'data' : 'DiscRate', 'render' : function(data, type, row, meta) {
                        return data + (row.IsUseCoupon === 'Y' ? ' (Y)' : '');
                    }}
                ]
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/pay/vbank/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 계좌취소 버튼 클릭
            $list_table.on('click', '.btn-vbank-cancel', function() {
                if (!confirm('해당 계좌를 취소하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'order_idx' : $(this).data('idx')
                };
                sendAjax('{{ site_url('/pay/order/cancel/vbank') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-view', function() {
                location.href = '{{ site_url('/pay/vbank/show') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
