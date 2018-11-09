@extends('lcms.layouts.master')
@section('content')
    <h5>- 회원을 검색하고 TM 담당자들에게 회원을 배정하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="search_is_use">조건검색</label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control" id="AssignCcd" name="AssignCcd">
                            <option value="">배정조건</option>
                            @foreach($AssignCcd  as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="StartDate">배정일 검색</label>
                    <div class="col-md-4 form-inline">
                        <input name="StartDate"  class="form-control datepicker" id="StartDate" style="width: 100px;"  type="text"  value="" >
                        ~ <input name="EndDate"  class="form-control datepicker" id="EndDate" style="width: 100px;"  type="text"  value="" >

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default mr-20" id="_btn_reset">검색초기화</button>
            </div>
        </div>
    </form>


    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="50">NO</th>
                    <th width="150">배정일</th>
                    <th >조회기간</th>
                    <th width="200">배정조건</th>
                    <th width="150">배정건수</th>
                    <th width="100">확인</th>
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

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 회원배정', className: 'btn-sm btn-primary border-radius-reset btn-reorder',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('crm/tm/') }}';
                        }
                    }
                ],
                ajax: {
                    'url' : '{{ site_url('/crm/tm/tmListAjax') }}',
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
                    {'data' : 'RegDate'},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return data.SearchPeriod;
                        }},
                    {'data' : 'AssignCcd_Name'},
                    {'data' : 'MemCnt'},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return '<a href="#" class="btn-modify btn_info" data-idx="' + data.TmIdx + '"><u>확인</u></a>';
                        }}
                ]
            });

            $list_table.on('click', '.btn_info', function() {

                var url = '{{ site_url('/crm/tm/assignList/') }}'+$(this).data('idx');
                $('.btn_info').setLayer({
                    'url' : url,
                    'width' : 1000
                });
            });



        });
    </script>
@stop