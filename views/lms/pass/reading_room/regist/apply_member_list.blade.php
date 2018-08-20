@extends('lcms.layouts.master')

@section('content')
    <h5>- 독서실 상품을 등록하고 사용현황을 확인하여 좌석을 배정하는 메뉴입니다. (주문회원 기준으로 좌석 신규배정 및 연장배정)</h5>
    <form class="form-horizontal" id="read_form" name="read_form" method="POST" onsubmit="return false;">
        <div class="x_panel mt-10">
            <div class="x_content">
                <div class="form-group">
                    <div class="col-md-4">
                        • 독서실 정보
                    </div>
                </div>
                <table id="list_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>운영사이트</th>
                        <th>독서실코드</th>
                        <th>독서실명</th>
                        <th>강의실</th>
                        <th>예치금</th>
                        <th>판매가</th>
                        <th>좌석현황</th>
                        <th>잔여석</th>
                        <th>마감여부</th>
                        <th>자동문자</th>
                        <th>사용여부</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($room_data as $row)
                            <tr>
                                <td>{{ $row['SiteName'] }}</td>
                                <td>{{ $row['SiteName'] }}</td>
                                <td>{{ $row['SiteName'] }}</td>
                                <td>{{ $row['SiteName'] }}</td>
                                <td>{{ $row['SiteName'] }}</td>
                                <td>{{ $row['SiteName'] }}</td>
                                <td>{{ $row['SiteName'] }}</td>
                                <td>{{ $row['SiteName'] }}</td>
                                <td>{{ $row['SiteName'] }}</td>
                                <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                                    <span class="hide">{{ $row['IsUse'] }}</span>
                                </td>
                                <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                                    <span class="hide">{{ $row['IsUse'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">회원명, 아이디, 연락처, 주문번호, 검새 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">기간검색</label>
                    <div class="col-md-6 form-inline">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right form-inline">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>검 색</button>
                <button type="button" class="btn btn-default" id="_btn_reset">검색초기화</button>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>주문번호</th>
                    <th>회원명</th>
                    <th>연락처</th>
                    <th>결제수단</th>
                    <th>결제완료일</th>
                    <th>독서실명</th>
                    <th>결제금액</th>
                    <th>결제상태</th>
                    <th>좌석배정</th>
                    <th>좌석배정</th>
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
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/pass/readingRoom/regist/applyMemberListAjax') }}',
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
                    {'data' : 'OrderNum', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-order-list" data-idx="' + row.Idx + '"><u>' + row.OrderNum + '</u></a>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.MemName + '<br>' + '('+row.MemId+')';
                        }},
                    {'data' : 'MemTel'},
                    {'data' : '결제수단'},
                    {'data' : '결제완료일'},
                    {'data' : '독서실명'},
                    {'data' : '결제금액'},
                    {'data' : '결제상태'},
                    {'data' : '좌석배정'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modal-detail-member-list" data-idx="' + row.Idx + '"><u>' + row.aaa + '</u></a>';
                        }}
                ]
            });

            // 좌석배정
            $list_table.on('click', '.btn-modal-detail-member-list', function() {
                $('.btn-modal-detail-member-list').setLayer({
                    "url" : "{{ site_url('/pass/readingRoom/regist/createMemberModal') }}/" + $(this).data('idx'),
                    "width" : "1200"
                });
            });
        });
    </script>
@stop