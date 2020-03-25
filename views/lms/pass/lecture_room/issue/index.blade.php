@extends('lcms.layouts.master')
@section('content')
    <h5>- 좌석제 상품에 대한 주문내역을 확인하고, 좌석을 변경할 수 있는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">검색</label>
                    <div class="col-md-4 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false) !!}
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_lectureroom_idx" name="search_lectureroom_idx">
                            <option value="">강의실명</option>
                            {{-- TODO
                            @foreach($arr_search_data['lectureroom'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                            --}}
                        </select>
                    </div>

                    <label class="control-label col-md-1" for="search_value">결제정보</label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control" id="search_pay_status" name="search_pay_status">
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
                        <p class="form-control-static">회원명, 아이디, 휴대폰번호 검색 가능</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_value">상품검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                    <div class="col-md-5">
                        <p class="form-control-static">주문번호, 상품명(코드) 검색 가능</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1">기간검색</label>
                    <div class="col-md-10 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="paid">결제완료일</option>
                            <option value="refund">환불완료일</option>
                        </select>
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off">
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
            <div class="col-xs-6 col-xs-offset-3 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="all_check"/></th>
                        <th>NO</th>
                        <th>주문번호</th>
                        <th>회원명</th>
                        <th>연락처</th>
                        <th>상품명</th>
                        <th>결제상태</th>
                        <th>결제금액 (환불금액)</th>
                        <th>결제완료일 (환불완료일)</th>
                        <th>좌석변경</th>
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
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sms' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' }
                ],
                ajax: {
                    'url' : '{{ site_url('/pass/lectureRoom/issue/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" name="selectMember" class="target-crm-member" value="' + data + '" data-mem-idx="' + data + '">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.OrderNo + '<Br>' + row.SiteName;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.MemName + '<Br>' + '('+row.MemId+')';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.Tel1 + '-' + row.Tel2 + '-' + row.Tel3;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '['+row.LearnPatternCcdName+'] ' + row.ProdName;
                        }},
                    {'data' : 'PayStatusCcdName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var ret = row.RealPayPrice;
                            ret += (row.tRefundPrice > 0) ? ' (' + row.tRefundPrice + ')' : '';
                            return ret;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var ret = row.CompleteDatm;
                            ret += (row.RefundDatm > 0) ? ' (' + row.RefundDatm + ')' : '';
                            return ret;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a class="blue cs-pointer btn-member-seat-modify" ' +
                                'data-learn-pattern="' + row.LearnPatternCcd + '"' +
                                'data-order-idx="' + row.OrderIdx + '"' +
                                'data-lr-code="' + row.LrCode + '"' +
                                'data-lr-unit-code="' + row.LrUnitCode+ '"' +
                                '>[변경]</a>';
                        }},
                ]
            });

            // 전체 체크박스 이벤트
            $("#all_check").on('change', function(event) {
                $("input[name=selectMember]").prop('checked', $("#all_check").prop("checked"));
            });

            $list_table.on('click', '.btn-member-seat-modify', function() {
                var param = $(this).data('lr-code') + '/' + $(this).data('lr-unit-code') + '?order_idx=' + $(this).data('order-idx');
                if ($(this).data("learn-pattern") == '615007') {
                    location.href = "{{ site_url('/pass/lectureRoom/issue/showMemberSeat/') }}" + param;
                } else {
                    $('.btn-member-seat-modify').setLayer({
                        "url": "{{ site_url('/pass/lectureRoom/issue/modifyMemberSeatModal/') }}" + param,
                        "width": "1200",
                    });
                }
            });
        });
    </script>
@stop