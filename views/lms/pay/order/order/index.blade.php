@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인결제(PG사), 학원방문결제, 0원결제, 제휴사결제로 진행한 전체 결제현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">결제기본정보</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_pay_route_ccd" name="search_pay_route_ccd">
                            <option value="">결제루트</option>
                        </select>
                        <select class="form-control mr-10" id="search_pay_method_ccd" name="search_pay_method_ccd">
                            <option value="">결제수단</option>
                        </select>
                        <select class="form-control mr-10" id="search_prod_type_ccd" name="search_prod_type_ccd">
                            <option value="">상품구분</option>
                        </select>
                        <select class="form-control mr-10" id="search_learn_pattern_ccd" name="search_learn_pattern_ccd">
                            <option value="">상품상세구분</option>
                        </select>
                        <select class="form-control mr-10" id="search_pay_status_ccd" name="search_pay_status_ccd">
                            <option value="">결제상태</option>
                        </select>
                        <select class="form-control mr-10" id="search_delivery_status_ccd" name="search_delivery_status_ccd">
                            <option value="">배송상태</option>
                        </select>
                        <select class="form-control mr-10" id="search_delivery_price_type" name="search_delivery_price_type">
                            <option value="">배송료구분</option>
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
                    <label class="control-label col-md-1" for="search_prod_value">기타결제조건</label>
                    <div class="col-md-5">
                        <div class="checkbox">
                            <input type="checkbox" id="search_chk_is_escrow" name="search_chk_is_escrow" class="flat" value="Y"/> <label for="search_chk_is_escrow" class="input-label">에스크로(e)</label>
                            <input type="checkbox" id="search_chk_is_coupon" name="search_chk_is_coupon" class="flat" value="Y"/> <label for="search_chk_is_coupon" class="input-label">쿠폰적용</label>
                            <input type="checkbox" id="search_chk_is_admin_refund" name="search_chk_is_admin_refund" class="flat" value="Y"/> <label for="search_chk_is_admin_refund" class="input-label">지결환불</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="">결제완료일</option>
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
                <button type="button" class="btn btn-default btn-search btn-reset-search" id="btn_reset_search">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th rowspan="2" class="rowspan pb-30">선택</th>
                    <th rowspan="2" class="rowspan pb-30">No</th>
                    <th rowspan="2" class="rowspan pb-30">주문번호</th>
                    <th rowspan="2" class="rowspan pb-30">회원정보</th>
                    <th rowspan="2" class="rowspan pb-30">결제채널</th>
                    <th rowspan="2" class="rowspan pb-30">결제루트</th>
                    <th rowspan="2" class="rowspan pb-30">결제수단</th>
                    <th rowspan="2" class="rowspan pb-20">결제완료일<br/>(가상계좌신청일)</th>
                    <th colspan="7" style="border-width: 1px; border-left: 0; border-bottom: 0;">상품구분별정보</th>
                </tr>
                <tr>
                    <th>상품구분</th>
                    <th>상품명</th>
                    <th>결제금액</th>
                    <th>환불금액</th>
                    <th>결제상태</th>
                    <th>배송상태</th>
                    <th style="border-right-width: 1px;">쿠폰적용</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" id="order_idx" name="order_idx" class="flat" value="Y"/></td>
                        <td>5</td>
                        <td><a href="{{ site_url('/pay/order/order/edit') }}" class="blue" data-use-lec-point="2000" data-use-book-point="0">2018000000</a><br/>경찰[온라인] (e)</td>
                        <td>홍길동(id)<br/>010-0000-0000 (Y)</td>
                        <td>PC</td>
                        <td>온라인</td>
                        <td>신용카드</td>
                        <td>2018-00-00 00:00</td>
                        <td>온라인강좌</td>
                        <td><span class="blue">[운영자패키지] 패키지명</span></td>
                        <td>500,000</td>
                        <td><span class="red">50,000</span></td>
                        <td>환불완료<br/>2018-00-00<br/>(관리자명)</td>
                        <td></td>
                        <td>10%</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="order_idx" name="order_idx" class="flat" value="Y"/></td>
                        <td>5</td>
                        <td><a href="{{ site_url('/pay/order/order/edit') }}" class="blue" data-use-lec-point="2000" data-use-book-point="0">2018000000</a><br/>경찰[온라인] (e)</td>
                        <td>홍길동(id)<br/>010-0000-0000 (Y)</td>
                        <td>PC</td>
                        <td>온라인</td>
                        <td>신용카드</td>
                        <td>2018-00-00 00:00</td>
                        <td>온라인강좌</td>
                        <td><span class="blue">[단강좌] 단강좌명</span></td>
                        <td>150,000</td>
                        <td><span class="red">50,000</span></td>
                        <td>환불완료-지결<br/>2018-00-00<br/>(관리자명)</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="order_idx" name="order_idx" class="flat" value="Y"/></td>
                        <td>5</td>
                        <td><a href="{{ site_url('/pay/order/order/edit') }}" class="blue" data-use-lec-point="2000" data-use-book-point="0">2018000000</a><br/>경찰[온라인] (e)</td>
                        <td>홍길동(id)<br/>010-0000-0000 (Y)</td>
                        <td>PC</td>
                        <td>온라인</td>
                        <td>신용카드</td>
                        <td>2018-00-00 00:00</td>
                        <td>교재</td>
                        <td><span class="blue">[교재] 교재명</span></td>
                        <td>20,000</td>
                        <td>0</td>
                        <td>결제완료</td>
                        <td>발송완료<br/>2018-00-00</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="order_idx" name="order_idx" class="flat" value="Y"/></td>
                        <td>5</td>
                        <td><a href="{{ site_url('/pay/order/order/edit') }}" class="blue" data-use-lec-point="2000" data-use-book-point="0">2018000000</a><br/>경찰[온라인] (e)</td>
                        <td>홍길동(id)<br/>010-0000-0000 (Y)</td>
                        <td>PC</td>
                        <td>온라인</td>
                        <td>신용카드</td>
                        <td>2018-00-00 00:00</td>
                        <td>배송료</td>
                        <td>일반배송료</td>
                        <td>2,500</td>
                        <td>0</td>
                        <td>결제완료</td>
                        <td></td>
                        <td></td>
                    </tr>
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
                ajax: false,
                paging: true,
                searching: false,
                rowsGroup: ['.rowspan'],
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
                rowGroup: {
                    startRender: null,
                    endRender: function(rows, group) {
                        var real_pay_price = rows.data().pluck(10).reduce(function(a, b) {
                            return a + b.replace(/[^\d]/g, '') * 1;
                        }, 0);

                        var refund_price = rows.data().pluck(11).reduce(function(a, b) {
                            return a + b.replace(/[^\d]/g, '') * 1;
                        }, 0);

                        var remain_price = real_pay_price - refund_price;
                        var use_lec_point = $(group).data('use-lec-point');
                        var use_book_point = $(group).data('use-book-point');

                        return $('<td colspan="15" class="pull-right pr-30">')
                            .append('[총 실결제금액] <span class="blue"><strong>' + addComma(real_pay_price) + '</strong></span>')
                            .append(' (사용 포인트 : ' + addComma(use_lec_point) + ' | 교재 : ' + addComma(use_book_point) + ')')
                            .append('<span class="red pl-20">[총 환불금액] ' + addComma(refund_price) + '</span> = [남은금액] ' + addComma(remain_price))
                            .append('</td>');
                    },
                    dataSrc : 2
                }
            });

/*            // 주문 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
                ajax: {
                    'url' : '{{ site_url('/pay/order/order/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="order_idx" class="flat" value="">';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo'},
                    {'data' : 'MemName'},
                    {'data' : 'PayChannelCcd'},
                    {'data' : 'PayRouteCcd'},
                    {'data' : 'PayMethodCcd'},
                    {'data' : 'PayDatm'},
                    {'data' : 'ProdTypeCcd'},
                    {'data' : 'ProdName'},
                    {'data' : 'PayPrice'},
                    {'data' : 'RefundPrice'},
                    {'data' : 'PayStatusCcd'},
                    {'data' : 'DeliveryStatusCcd'},
                    {'data' : 'IsCoupon'}
                ]
            });*/

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/pay/order/order/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });
        });
    </script>
@stop
