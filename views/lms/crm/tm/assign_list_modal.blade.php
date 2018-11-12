@extends('lcms.layouts.master_modal')

@section('layer_title')
    배정확인
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="tm_idx" value="{{ $tm_idx }}"/>
        @endsection

        @section('layer_content')

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="">배정일 </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{date("Y-m-d",strtotime($data['RegDatm']))}}</p>
                </div>
                <label class="control-label col-md-2" for="">조회기간</label>
                <div class="col-md-4">
                    <p class="form-control-static"> {{$data['SearchPeriod']}}</p>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2">배정조건</label>
                <div class="col-md-4">
                    <p class="form-control-static"> {{ $data['AssignCcd_Name'] }}</p>
                </div>
                <label class="control-label col-md-2">배정자</label>
                <div class="col-md-4">
                    <p class="form-control-static"> {{ $data['wAdminName'] }}</p>
                </div>
            </div>

            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="8%">NO</th>
                            <th width="20%">배정구분</th>
                            <th width="15%">회원명</th>
                            <th width="18%">회원아이디</th>
                            <th >핸드폰번호</th>
                            <th width="15%">TM담당자</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <script type="text/javascript">
                var $datatable;
                var $search_form = $('#_search_form');
                var $list_table = $('#_list_ajax_table');

                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable = $list_table.DataTable({
                        serverSide: true,
                        ajax: {
                            'url' : '{{ site_url('/crm/tm/TmMng/assignListAjax') }}',
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
                            {'data' : 'AssignCcd_Name'},
                            {'data' : 'MemName'},
                            {'data' : 'MemId'},
                            {'data' : 'Phone'},
                            {'data' : 'wAdminName'}
                        ]
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection