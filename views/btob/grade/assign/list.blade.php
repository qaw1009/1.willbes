@extends('btob.layouts.master')
@section('content')
    <h5>- 채점관리자들에게 회원을 배정하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="AssignCcd">조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_prod_code" name="search_prod_code" title="강좌명">
                            <option value="">-강좌명-</option>
                            @foreach($lecture_data as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_correct_idx" name="search_correct_idx" title="회차명">
                            <option value="">-회차명-</option>
                        </select>
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
                    <th width="50">NO</th>
                    <th width="120">강좌명</th>
                    <th width="200">회차명</th>
                    <th width="120">검색건수</th>
                    <th width="120">배정건수</th>
                    <th width="150">배정일</th>
                    <th width="80">배정관리자</th>
                    <th width="100">배정확인</th>
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
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 회원배정', className: 'btn-sm btn-primary border-radius-reset btn-reorder',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('/grade/assignMng/') }}';
                        }
                    }
                ],
                ajax: {
                    'url' : '{{ site_url('/grade/assignMng/listAjax') }}',
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
                    {'data' : 'ProdName'},
                    {'data' : 'Title'},
                    {'data' : 'UnitCount'},
                    {'data' : 'MemCnt', 'render' : function(data, type, row, meta){
                            var str = '없음';
                            if (data != null) {
                                str = '';
                                var obj = data.split(','), i=1;
                                for (key in obj) {
                                    str += "("+i+"회) "+obj[key] + "<br>";
                                i+=i;}
                            }
                            return str;
                        }},
                    {'data' : 'RegDatm', 'render' : function(data, type, row, meta){
                            var str = '없음';
                            if (data != null) {
                                str = '';
                                var obj = data.split(','), i=1;
                                for (key in obj) {
                                    str += "("+i+"회) "+obj[key] + "<br>";
                                i+=i;}
                            }
                            return str;
                        }},
                    {'data' : 'RegAdminName', 'render' : function(data, type, row, meta){
                            var str = '없음';
                            if (data != null) {
                                str = '';
                                var obj = data.split(','), i=1;
                                for (key in obj) {
                                    str += "("+i+"회) "+obj[key] + "<br>";
                                i+=i;}
                            }
                            return str;
                        }},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return '<a href="#" class="btn_info btn-detail" data-correct-idx="' + data.CorrectIdx + '"><u>확인</u></a>';
                        }}
                ]
            });

            $search_form.on('change', 'select[name="search_prod_code"]', function() {
                $('#search_correct_idx').children('option:not(:first)').remove();
                var add_options = '';
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'prod_code' : $(this).val()
                };
                var url = '/common/search/correctUnitAjax/';
                sendAjax(url, data, function(ret) {
                    if (ret !== null && Object.keys(ret).length > 0) {
                        $.each(ret, function (k, v) {
                            add_options += '<option value="'+k+'">'+v+'</option>';
                        });
                        $('#search_correct_idx').append(add_options);
                    }
                }, showValidateError, false, 'POST');
            });

            $list_table.on('click', '.btn-detail', function() {
                var url = '{{ site_url('/grade/assignMng/assignInfoModal/') }}' + $(this).data("correct-idx");
                //location.href = url;
                $('.btn-detail').setLayer({
                    'url' : url,
                    'width' : 1000,
                });
            });
        });
    </script>
@stop