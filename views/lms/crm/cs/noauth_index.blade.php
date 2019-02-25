@extends('lcms.layouts.master_popup')

@section('popup_title')
@stop

@section('popup_header')
@endsection

@section('popup_content')
    <div class="col-md-12 text-left">
        <div class="right_col" role="main" style="min-height: 658px;">
            <div class="col-md-12 row">
                <h5>- 고객 기술 응대 자료를 관리하는 메뉴입니다.</h5>
            </div>
            <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <div class="x_panel">
                    <div class="x_content">
                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_send_pattern_ccd">조건</label>
                            <div class="col-md-11 form-inline">
                                <select class="form-control" id="search_cs_kind_ccd" name="search_cs_kind_ccd">
                                    <option value="">유형검색</option>
                                    @foreach($arr_base['cs_kind_ccd'] as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_value">제목/내용</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="search_value" name="search_value">
                            </div>
                            <label class="control-label col-md-1 col-md-offset-1" for="search_start_date">등록일</label>
                            <div class="col-md-4 form-inline">
                                <div class="input-group mb-0">
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
                            <th>NO</th>
                            <th>유형</th>
                            <th>제목</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            // 기간 조회 디폴트 셋팅
            //setDefaultDatepicker(0, 'days', 'search_start_date', 'search_end_date');

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [],
                ajax: {
                    'url' : '{{ site_url("/crm/manageCs/noAuthListAjax?") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            if (row.IsBest == '1') {
                                return '공지';
                            } else {
                                return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }
                        }},
                    {'data' : 'CsKindCcdName'},
                    {'className' : 'details-control', 'orderable' : false, 'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<u class="bold" style="cursor: pointer">'+data+'</u>';
                        }}
                ],
            });

            $list_table.on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = $datatable.row(tr);

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');

                    // read count
                    var data = {
                        '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
                        '_method' : 'PUT',
                        'idx' : row.data().CtmIdx
                    };
                    sendAjax('{{ site_url('/crm/manageCs/updateReadCnt') }}', data, function(ret) {
                        if (ret.ret_cd) {
                            /*$datatable.draw();*/
                        }
                    }, false, false, 'POST');
                }
            });
        });

        function format(d) {
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                '<td style="width:100%;word-break:break-all;">'+ d.Content +'</td>'+
                '</tr>'+
                '</table>';
        }
    </script>
@stop

@section('popup_footer')
@endsection