@extends('lcms.layouts.master')

@section('content')
    <h5>- {{$mang_title}} 주문 내역을 확인하고, 좌석배정/변경하거나 연장하는 메뉴입니다. (좌석 신규배정 및 변경/연장배정 가능)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs('', 'tabs_site_code', 'tab', false, [], false, $offLineSite_list) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">조건</label>
                    <div class="col-md-10 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false) !!}
                        <select class="form-control" id="search_pay_status" name="search_pay_status">
                            <option value="">결제상태</option>
                            @foreach($arr_search_data['pay_status'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="" name="">
                            <option value="">예치금반환</option>
                        </select>

                        <select class="form-control" id="search_seat_status" name="search_seat_status">
                            <option value="">배정여부</option>
                            @foreach($arr_search_data['seat_status'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">{{$mang_title}}검색</label>
                    <div class="col-md-4 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_search_data['campus'] as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_readingroom_idx" name="search_readingroom_idx">
                            <option value="">{{$mang_title}}명</option>
                            @foreach($arr_search_data['readingroom'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">회원명, 아이디, 연락처, 주문번호검색가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">기간검색</label>
                    <div class="col-md-10 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="P">결제완료일</option>
                            <option value="R">등록일</option>
                            <option value="S">대여시작일</option>
                            <option value="E">대여종료일</option>
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
            <div class="col-xs-3 text-right bold mb-10">
                * 연장 가능 기간 : 대여종료일 7일 전 ~ 대여종료일 7일 후
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>NO</th>
                    <th class="rowspan">주문번호</th>
                    <th class="rowspan">회원명</th>
                    <th class="rowspan">연락처</th>
                    <th class="rowspan">결제완료일</th>
                    <th class="rowspan">캠퍼스</th>
                    <th class="rowspan">{{$mang_title}}명</th>
                    <th class="rowspan">결제금액</th>
                    <th class="rowspan">결제상태</th>
                    <th>좌석번호</th>
                    <th>예치금</th>
                    <th>대여시작일</th>
                    <th>대여종료일</th>
                    <th>좌석상태</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>변경</th>
                    <th>연장</th>
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
                    { text: '<i class="fa fa-pencil mr-5"></i> {{$mang_title}}등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/pass/readingRoom/regist/create') }}' + dtParamsToQueryString($datatable) + '{!! $default_query_string !!}';
                        }}
                ],
                rowsGroup: ['.rowspan'],
                ajax: {
                    'url' : '{{ site_url('/pass/readingRoom/issue/listAjax') }}' + '?' + '{!! $default_query_string !!}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                            var _url = '{{ site_url('/pay/order/show/') }}' + row.NowOrderIdx + '/';
                            return '<a href="'+ _url +'" target="_blank" class="btn-show-order"><u>'+data+'</u></span>';
                        }},
                    {'data' : 'MemName'},
                    {'data' : 'MemPhone'},
                    {'data' : 'OrderDatm'},
                    {'data' : 'CampusName'},
                    {'data' : 'ReprProdName'},
                    {'data' : 'OrderPrice'},
                    {'data' : 'PayStatusName'},
                    {'data' : 'NowMIdx'},
                    {'data' : 'SubRefundTypeName'},
                    {'data' : 'UseStartDate'},
                    {'data' : 'UseEndDate'},
                    {'data' : 'SeatStatusName'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'SeatRegDatm'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            if(row.SeatStatusCcd == '{{$arr_seat_status_ccd['out']}}' || row.SeatStatusCcd == '{{$arr_seat_status_ccd['end']}}') {
                                return '<p style="color: #bdbdbd">[변경]</p>';
                            } else {
                                return '<a href="javascript:void(0);" class="btn-create-seat-modal" data-prod-code="'+row.ProdCode+'" data-order-idx="'+row.NowOrderIdx+'"><u>[변경]</u></a>';
                            }
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            //퇴실
                            if(row.SeatStatusCcd == '{{$arr_seat_status_ccd['out']}}') {
                                return '<p style="color: #bdbdbd">[연장]</p>';
                            } else {
                                //기간 미만족
                                if (row.ExtensionType == 'Y'
                                    && (row.SeatStatusCcd == '{{$arr_seat_status_ccd['in']}}'
                                        || row.SeatStatusCcd == '{{$arr_seat_status_ccd['extension']}}'
                                        || row.SeatStatusCcd == '{{$arr_seat_status_ccd['change']}}')
                                ) {
                                    return '<a href="javascript:void(0);" class="btn-seat" data-prod-code="' + row.ProdCode + '" data-order-idx="' + row.MasterOrderIdx + '"><u>[연장]</u></a>';
                                } else {
                                    return '<p style="color: #bdbdbd">[연장]</p>';
                                }
                            }

                        }}
                ]
            });

            // 좌석배정/좌석이동
            $list_table.on('click', '.btn-create-seat-modal', function() {
                $('.btn-create-seat-modal').setLayer({
                    "url" : "{{ site_url('/pass/readingRoom/issue/modifySeatModal/') }}"+ $(this).data('prod-code') + '?' + '{!! $default_query_string !!}' + '&now_order_idx=' + $(this).data('order-idx'),
                    "width" : "1200"
                });
            });

            $list_table.on('click', '.btn-seat', function() {
                var param = '&target_order_idx=' + $(this).data('order-idx');
                param += '&target_prod_code=' + $(this).data('prod-code');
                location.href='{{ site_url('/pay/visit/create') }}/?' + param;
            });

            // 엑셀다운로드 이벤트
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/pass/readingRoom/issue/excel/?mang_type=L') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop