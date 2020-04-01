@extends('lcms.layouts.master')
@section('content')
    <h5>- 좌석제 상품에 대한 주문내역을 확인하고, 좌석을 변경할 수 있는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" name="order_idx" value="{{ $data['OrderIdx'] }}">
                <input type="hidden" name="prod_code_sub_all" value="{{ $data['ProdCodeSubAll'] }}">
                <div class="form-group">
                    <label class="control-label col-md-1-1">주문번호
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{$data['OrderNo']}} [{{$data['SiteName']}}]</p>
                    </div>
                    <label class="control-label col-md-1-1">회원정보
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{$data['MemName']}} | {{$data['Tel1']}}-{{$data['Tel2']}}-{{$data['Tel3']}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">결제금액
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{$data['RealPayPrice']}}</p>
                    </div>
                    <label class="control-label col-md-1-1">결제일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{$data['CompleteDatm']}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">상품명
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{$data['ProdName']}}</p>
                    </div>
                    <label class="control-label col-md-1-1">결제상태
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{$data['PayStatusCcdName']}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">단과반정보
                    </label>
                    <div class="col-md-12">
                        <table id="list_table" class="table table-bordered table-striped">
                            <thead class="bg-white-gray">
                            <tr>
                                <th>단과반명</th>
                                <th>상태</th>
                                <th>강의실명</th>
                                <th>좌석정보명</th>
                                <th>좌석번호</th>
                                <th>좌석선택기간</th>
                                <th>좌석변경</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="text-center">
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $regi_form = $('#regi_form');
        var $list_table = $('#list_table');
        $(document).ready(function() {
            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/pass/lectureRoom/issue") }}/' + getQueryString();
            });

            $datatable = $list_table.DataTable({
                serverSide: true,
                info: true,
                language: {
                    "info": "[ 총 _MAX_건 ]"
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                paging: false,
                ajax: {
                    'url' : '{{ site_url('/pass/lectureRoom/issue/listAjaxMemberProductSubData') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($regi_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: [
                    'group:name'
                ],
                columns: [
                    {'data' : 'ProdName'},
                    {'name':'group', 'data' : 'LrUnitCode', 'render' : function(data, type, row, meta) {
                            return row.MemSeatStatusCcdName;
                        }},
                    {'name':'group', 'data' : 'LrUnitCode', 'render' : function(data, type, row, meta) {
                            return row.LectureRoomName;
                        }},
                    {'name':'group', 'data' : 'LrUnitCode', 'render' : function(data, type, row, meta) {
                            return row.UnitName;
                        }},
                    {'name':'group', 'data' : 'LrUnitCode', 'render' : function(data, type, row, meta) {
                            return row.SeatNo;
                        }},
                    {'name':'group', 'data' : 'LrUnitCode', 'render' : function(data, type, row, meta) {
                            return row.SeatChoiceStartDate + ' ~ ' + row.SeatChoiceEndDate;
                        }},
                    {'name':'group', 'data' : 'LrUnitCode', 'render' : function(data, type, row, meta) {
                            return '<a class="blue cs-pointer btn-member-seat-modify" ' +
                                'data-order-idx="' + row.OrderIdx + '"' +
                                'data-prod-code-sub="' + row.ProdCode + '"' +
                                'data-lr-code="' + row.LrCode + '"' +
                                'data-lr-unit-code="' + row.LrUnitCode+ '"' +
                                '>[변경]</a>';
                        }}
                ]
            });

            $list_table.on('click', '.btn-member-seat-modify', function() {
                var param = $(this).data('lr-code') + '/' + $(this).data('lr-unit-code') + '?order_idx=' + $(this).data('order-idx') + '&prod_code_sub=' + $(this).data('prod-code-sub');
                $('.btn-member-seat-modify').setLayer({
                    "url": "{{ site_url('/pass/lectureRoom/issue/modifyMemberSeatModal/') }}" + param,
                    "width": "1200",
                });
            });
        });
    </script>
@stop