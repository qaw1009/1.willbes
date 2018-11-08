@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 주문번호 기준으로 모의고사 결제 및 응시여부를 확인하고 응시표를 출력하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false) !!}
        {!! csrf_field() !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value="{{$siteCodeDef}}">

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        <select class="form-control mr-5" id="search_PayStatusCcd" name="search_PayStatusCcd">
                            <option value="">결제상태</option>
                            @foreach($paymentStatus as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeForm" name="search_TakeForm">
                            <option value="">응시형태</option>
                            @foreach($applyType as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeArea" name="search_TakeArea">
                            <option value="">응시지역</option>
                            @foreach($applyArea as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_IsStatus" name="search_IsStatus">
                            <option value="">응시여부</option>
                            <option value="Y">응시</option>
                            <option value="N">미응시</option>
                        </select>
                        <select class="form-control mr-5" id="search_IsTicketPrint" name="search_IsTicketPrint">
                            <option value="">응시표출력</option>
                            <option value="Y">출력</option>
                            <option value="N">미출력</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">회원검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 회원명, 연락처, 주문번호, 응시변호, 상품명/코드 검색 가능
                    </div>
                </div>
                <div class="pt-10">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary mr-50" id="act-excelDown">엑셀다운로드</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary" id="btn_search">검색</button>
                        <button type="button" class="btn btn-default" id="act-searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="mt-20">* 응시표 출력 제한 횟수는 '1회'로 제한되며, 추가 출력을 원할 경우 '응시표복원'을 선택해 주세요</div>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center">NO</th>
                        <th class="text-center">주문번호</th>
                        <th class="text-center">회원명</th>
                        <th class="text-center">연락처</th>
                        <th class="text-center">결제완료일</th>
                        <th class="text-center">결제금액</th>
                        <th class="text-center">결제상태</th>
                        <th class="text-center">상품명</th>
                        <th class="text-center">연도</th>
                        <th class="text-center">회차</th>
                        <th class="text-center">응시형태</th>
                        <th class="text-center">응시번호</th>
                        <th class="text-center">카테고리</th>
                        <th class="text-center">직렬</th>
                        <th class="text-center">과목</th>
                        <th class="text-center">응시지역</th>
                        <th class="text-center">응시여부</th>
                        <th class="text-center">응시표출력</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            var paymentStatus = JSON.parse('{!! json_encode($paymentStatus) !!}');
            var applyType = JSON.parse('{!! json_encode($applyType) !!}');
            var applyArea = JSON.parse('{!! json_encode($applyArea) !!}');

            // 검색 초기화
            $('#act-searchInit, #tabs_site_code > li').on('click', function () {
                $search_form.find('[name^=search_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });
                $search_form.find('#search_cateD1').trigger('change');

                var eTarget = (event.target) ? event.target : event.srcElement;
                if($(eTarget).attr('id') == 'searchInit') $datatable.draw();
            });

            // DataTables
            $datatable = $list_table.DataTable({
                info: true,
                language: {
                    "info": "[ 총 _MAX_건 ]"
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                buttons: [
                    { text: '<i class="fa fa-bolt"></i> 쪽지발송', className: 'btn btn-sm btn-primary mr-15 act-copy', action: sendMemo },
                    { text: '<i class="fa fa-phone"></i> SMS발송', className: 'btn btn-sm btn-primary mr-15 act-copy', action: sendSms },
                    { text: '<i class="fa fa-undo"></i> 응시표복원', className: 'btn btn-sm btn-success', action: restoreTicket }
                ],
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktest/applyUser/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" class="flat" name="target" value="' + row.MrIdx + '">';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/') }}" target="_blank">' + data + '</a>';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/') }}" target="_blank">' + row.MemName + '<br>(' + row.MemId + ')</a>';
                    }},
                    {'data' : 'MemPhone', 'class': 'text-center'},
                    {'data' : 'CompleteDatm', 'class': 'text-center'},
                    {'data' : 'RealPayPrice', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'PayStatusCcd', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (typeof paymentStatus[data] !== 'undefined') ? paymentStatus[data] : '';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '<span>[' + row.ProdCode + '] ' + row.ProdName + '</span>';
                    }},
                    {'data' : 'MockYear', 'class': 'text-center'},
                    {'data' : 'MockRotationNo', 'class': 'text-center'},
                    {'data' : 'TakeForm', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (typeof applyType[data] !== 'undefined') ? applyType[data] : '';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) { return 0; }},
                    {'data' : 'CateName', 'class': 'text-center'},
                    {'data' : 'CcdName', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) { return 0; }},

                    {'data' : 'TakeArea', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (typeof applyArea[data] !== 'undefined') ? applyArea[data] : '';
                    }},
                    {'data' : 'IsStatus', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '응시' : '미응시';
                    }},
                    {'data' : 'IsTicketPrint', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '출력' : '<span class="blue underline-link">[미출력]</span>';
                    }},
                ]
            });

            // 엑셀 다운로드

            // 쪽지발송
            function sendMemo() {

            }

            // SMS발송
            function sendSms() {

            }

            // 응시표복원
            function restoreTicket() {

            }
        });
    </script>
@stop
