@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "수정이력 목록" }}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="search_form" name="search_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}

        @endsection
        @section('layer_content')

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-1" for="">조건</label>
                <div class="col-md-5 form-inline" >
                    <select class="form-control" id="search_table" name="search_table" style="width:150px">
                        <option value="">Db-Table명</option>
                        @foreach($search_tables as $row)
                            <option value="{{ $row['TableName'] }}">[{{ $row['TableName'] }}]  {{ empty($row['TABLE_COMMENT']) ? $row['TABLE_COMMENT'] : ' - '. $row['TABLE_COMMENT'] }}</option>
                        @endforeach
                    </select>
                    &nbsp;<select class="form-control" id="search_class" name="search_class" style="width:150px">
                        <option value="">Class명</option>
                        @foreach($search_classes as $row)
                            <option value="{{ $row['ExecClass'] }}">{{ $row['ExecClass'] }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="control-label col-md-1" for="search_start_date">백업일자</label>
                <div class="col-md-5 form-inline">
                    <div class="input-group">
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
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-1" for="search_idx_name">식별자정보</label>
                <div class="col-md-5 form-inline" >
                    이름 : <input type="text" class="form-control" id="search_idx_name" name="search_idx_name" value="{{element('search_idx_name', $arr_search)}}">
                    값 :     <input type="text" class="form-control" id="search_idx" name="search_idx" value="{{element('search_idx', $arr_search)}}">
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <div class="col-md-12">
                    <table id="list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="50" style="text-align: center;"  >No</th>
                            <th width="100" style="text-align: center;"  class="group rowspan">처리그룹</th>
                            <th width="150" style="text-align: center;"  >실행Class</th>
                            <th width="200" style="text-align: center;"  >백업Table</th>
                            <th width="100" style="text-align: center;"  >식별자명</th>
                            <th width="70" style="text-align: center;"  >식별자</th>
                            <th style="text-align: center;"  >백업데이터</th>
                            <th width="120" style="text-align: center;"  >백업일자</th>
                            <th width="80" style="text-align: center;"  >등록관리자</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        @stop
        @section('layer_footer')

    </form>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');
        var $class_config =  {!!json_encode($class_config)!!};
        var $method_config =  {!!json_encode($method_config)!!};

        $(document).ready(function() {
            // 기간 조회 디폴트 셋팅
            setDefaultDatepicker(-12, 'months', 'search_start_date', 'search_end_date');

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                lengthMenu : [ 50, 70, 100 ],
                rowsGroup: ['.rowspan'],
                ajax: {
                    'url' : '{{ site_url('/sys/dbBackupLog/listAjax') }}',
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
                    {'data' : 'ProcessGroup', 'render' : function(data, type, row, meta){
                            return '<b>' + data + '</b>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.ExecClass + '/' + row.ExecMethod + ($class_config[row.ExecClass] !== undefined ? '<BR>' + $class_config[row.ExecClass] +'/'+$method_config[row.ExecMethod] : '');
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.TableName + (row.TableComment === '' ? '' : '<BR> - ' + row.TableComment +'');
                        }},
                    {'data' : 'IdxName'},
                    {'data' : 'Idx'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.BackupData === null ? '' : '<button type="button" class="btn-warning log-info" data-idx="'+ row.TbdIdx +'">확인</button>';
                        }},
                    {'data' : 'RegDatm'},
                    {'data' : 'RegAdminName'}
                ]
            });

            $list_table.on('click', '.log-info', function() {
                $('.log-info').setLayer({
                    'url' : '{{ site_url('/sys/dbBackupLog/show/') }}' + $(this).data('idx'),
                    'width' : 1000,
                    'modal_id' : 'show_detail'
                });
            })
        });
    </script>
@endsection