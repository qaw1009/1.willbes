@extends('btob.layouts.master')

@section('content')
    <h5>- 작심독서실 회원별 수강이력을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호 검색 가능</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
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
                    <th>No</th>
                    <th>회원명(아이디)</th>
                    <th>성별</th>
                    <th>생년월일</th>
                    <th>연락처</th>
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
            // 수강이력 상세 페이지에서 전달된 검색어가 있을 경우
            @if(isset($arr_input['search_member_value']) === true)
                $search_form.find('input[name="search_member_value"]').val('{{ $arr_input['search_member_value'] }}');
            @endif

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/cert/study/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return '<a href="#none" class="btn-view" data-apply-idx="' + row.LastApplyIdx + '"><u>' + data + '(' + row.MemId + ')</u></a>';
                    }},
                    {'data' : 'SexKr'},
                    {'data' : 'BirthDay'},
                    {'data' : 'MemPhone'}
                ]
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/cert/study/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 수강이력 상세
            $list_table.on('click', '.btn-view', function() {
                location.href = '{{ site_url('/cert/study/show') }}/' + $(this).data('apply-idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
