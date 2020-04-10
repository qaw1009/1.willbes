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
                    <div class="col-md-10 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false) !!}
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}_{{ $row['SiteCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_lr_code" name="search_lr_code">
                            <option value="">마스터강의실명</option>
                            @foreach($lecture_room_info['master'] as $row)
                                <option value="{{$row['LrCode']}}" class="{{ $row['CampusCcd'] }}_{{ $row['SiteCode'] }}">{{$row['LectureRoomName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_lr_unit_code" name="search_lr_unit_code">
                            <option value="">좌석정보</option>
                            @foreach($lecture_room_info['unit'] as $row)
                                <option value="{{$row['LrUnitCode']}}" class="{{$row['LrCode']}}">{{$row['UnitName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_learn_pattern_ccd" name="search_learn_pattern_ccd">
                            <option value="">상품종류</option>
                            <option value="615006">단과반 [학원]</option>
                            <option value="615007">종합반 [학원]</option>
                        </select>
                        <select class="form-control" id="search_pay_status" name="search_pay_status">
                            <option value="">결제상태</option>
                            @foreach($arr_pay_status_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_seat_member_status" name="search_seat_member_status">
                            <option value="">좌석상태</option>
                            @foreach($arr_seat_member_ccd as $key => $val)
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
                            <option value="studyenddate">종강일</option>
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
                        <th rowspan="2" class="valign-middle"><input type="checkbox" class="flat" id="all_check"/></th>
                        <th rowspan="2" class="valign-middle">종강</th>
                        <th rowspan="2" class="valign-middle">NO</th>
                        <th rowspan="2" class="valign-middle">주문번호</th>
                        <th rowspan="2" class="valign-middle">회원명</th>
                        <th rowspan="2" class="valign-middle">연락처</th>
                        <th rowspan="2" class="valign-middle">상품종류</th>
                        <th rowspan="2" class="valign-middle">상품명</th>
                        <th rowspan="2" class="valign-middle">강의실명</th>
                        <th rowspan="2" class="valign-middle">좌석정보명</th>
                        <th rowspan="2" class="valign-middle">좌석번호</th>
                        <th colspan="2" class="valign-middle">단과반</th>
                        <th rowspan="2" class="valign-middle">결제상태</th>
                        <th rowspan="2" class="valign-middle">결제금액</th>
                        <th rowspan="2" class="valign-middle">환불금액</th>
                        <th rowspan="2" class="valign-middle">결제완료일 (환불완료일)</th>
                        <th rowspan="2" class="valign-middle">좌석변경</th>
                    </tr>
                    <tr>
                        <th class="valign-middle">좌석상태</th>
                        <th class="valign-middle">개강~종강일</th>
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
            if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
            }

            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");
            $search_form.find('select[name="search_lr_code"]').chained("#search_campus_ccd");
            $search_form.find('select[name="search_lr_unit_code"]').chained("#search_lr_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sms' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 단과상품좌석 종강처리', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-member-seat-delete' }
                ],
                ajax: {
                    'url' : '{{ site_url('/pass/lectureRoom/issue/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: [
                    'group:name'
                ],
                columns: [
                    {'name':'group', 'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" name="selectMember" class="flat target-crm-member" value="' + data + '" data-mem-idx="' + row.MemIdx + '">';
                        }},
                    {'data' : 'LrsrIdx', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" name="lrsr_idx" class="flat" data-lrsr-idx="' + data + '" data-learn-pattern-ccd="'+row.LearnPatternCcd+'">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'name':'group', 'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                            if (data == null) {
                                return '';
                            } else {
                                return '<a href="{{ site_url('/pay/order/show') }}/' + row.OrderIdx + '" class="blue" target="_blank"><u>' + row.OrderNo + '<Br>' + row.SiteName + '</u></a>';
                            }
                        }},
                    {'name':'group', 'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                            return row.MemName + '<Br>' + '('+row.MemId+')';
                        }},
                    {'name':'group', 'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                            return (row.Tel1 == null) ? '없음' : row.Tel1 + '-' + row.Tel2 + '-' + row.Tel3;
                        }},
                    {'name':'group', 'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                            return row.LearnPatternCcdName;
                        }},
                    {'name':'group', 'data' : 'OrderProdIdx', 'render' : function(data, type, row, meta) {
                            return '<a class="blue">['+row.ProdCode+']</a> ' + row.ProdName;
                        }},
                    {'name':'group', 'data' : 'OrderProdIdx', 'render' : function(data, type, row, meta) {
                            return row.LectureRoomName;
                        }},
                    {'data' : 'UnitName'},
                    {'data' : 'SeatNo'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            if (row.LearnPatternCcd == '615006') {
                                return row.MemSeatStatusCcdName;
                            } else {
                                return '';
                            }
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            if (row.LearnPatternCcd == '615006') {
                                return row.StudyStartDate + ' ~ ' + row.StudyEndDate;
                            } else {
                                return '';
                            }
                        }},
                    {'name':'group', 'data' : 'OrderProdIdx', 'render' : function(data, type, row, meta) {
                            return row.PayStatusCcdName;
                        }},
                    {'name':'group', 'data' : 'OrderProdIdx', 'render' : function(data, type, row, meta) {
                            return row.RealPayPrice;
                        }},
                    {'name':'group', 'data' : 'OrderProdIdx', 'render' : function(data, type, row, meta) {
                            var ret = (row.tRefundPrice > 0) ? row.tRefundPrice : '';
                            return ret;
                        }},
                    {'name':'group', 'data' : 'OrderProdIdx', 'render' : function(data, type, row, meta) {
                            var ret = row.CompleteDatm;
                            ret += (row.tRefundPrice > 0) ? '<br>(' + row.RefundDatm + ')' : '';
                            return ret;
                        }},
                    {'data' : 'OrderProdIdx', 'render' : function(data, type, row, meta) {
                            return '<a class="blue cs-pointer btn-member-seat-modify" ' +
                                'data-learn-pattern="' + row.LearnPatternCcd + '"' +
                                'data-order-idx="' + row.OrderIdx + '"' +
                                'data-prod-code-sub="' + row.ProdCodeSub + '"' +
                                'data-lr-code="' + row.LrCode + '"' +
                                'data-lr-unit-code="' + row.LrUnitCode+ '"' +
                                '>[변경]</a>';
                        }}
                ]
            });

            // 전체 체크박스 이벤트
            $list_table.on('ifChanged', '#all_check', function() {
                iCheckAll($list_table.find('input[name="selectMember"]'), $(this));
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/pass/lectureRoom/issue/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            //종강처리
            $('.btn-member-seat-delete').on('click', function(event) {
                var $params = [];
                var learn_pattern_ccd = [];
                var _url = "{{ site_url('/pass/lectureRoom/issue/deleteMemberSeat') }}";

                $('input[name="lrsr_idx"]:checked').each(function() {
                    $params.push($(this).data('lrsr-idx'));
                    learn_pattern_ccd.push($(this).data("learn-pattern-ccd"));
                });
                if (Object.keys($params).length <= '0') {
                    alert('종강처리할 상품을 선택해 주세요.');
                    return false;
                }
                if ($.inArray(615007, learn_pattern_ccd) != -1) {
                    alert('종합반 상품은 선택할 수 없습니다.');
                    return;
                }

                if (confirm('선택된 단과 상품의 좌석에 대해서 만료처리 하시겠습니까?')) {
                    var data = {
                        '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        '_method' : 'PUT',
                        'params' : JSON.stringify($params)
                    };

                    sendAjax(_url, data, function(ret) {
                        if (ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $datatable.draw();
                        }
                    }, showAlertError, false, 'POST');
                }
            });

            $list_table.on('click', '.btn-member-seat-modify', function() {
                /*var param = $(this).data('lr-code') + '/' + $(this).data('lr-unit-code') + '?order_idx=' + $(this).data('order-idx') + '&prod_code_sub=' + $(this).data('prod-code-sub') + dtParamsToQueryString($datatable);*/
                var param = $(this).data('lr-code') + '/' + $(this).data('lr-unit-code') + dtParamsToQueryString($datatable) + '&order_idx=' + $(this).data('order-idx') + '&prod_code_sub=' + $(this).data('prod-code-sub');
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