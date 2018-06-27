@extends('lcms.layouts.master_modal')
@section('layer_title')
    기기등록정보
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        <input type="hidden" name="memIdx" value="{{$data['MemIdx']}}" />
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            {!! form_errors() !!}
            @include('lms.member.log.infonav')
            <div class="x_panel mt-0">
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="chg_name">기기등록현황</label>
                        <div class="col-md-9 item">
                            총 X대(PC X대 + 모바일 X대)
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="chg_name">기기등록정책</label>
                        <div class="col-md-9 item">
                            * 맥 어드레스는 PC/모바일 제한없이 최대 2대까지 등록 가능<br/>
                            * 맥 어드레스 초기화(삭제)는 1회로 제한 (회원이 직접 1회 초기화 가능)
                        </div>
                    </div>
                </div>
            </div>

            <div class="x_panel mt-10">
                <div class="x_content">
                    <table id="list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>삭제</th>
                            <th>기기구분</th>
                            <th>고유번호</th>
                            <th>등록일</th>
                            <th>삭제일</th>
                            <th>삭제자</th>
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
                        paging : false,
                        ajax: {
                            'url' : '{{ site_url("/member/manage/ajaxdeviceList/") }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta){
                                    // 리스트 번호
                                    return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                }},
                            {'data' : 'LoginDatm'},
                            {'data' : null},
                            {'data' : 'LoginIp'},
                            {'data' : 'LoginIp'},
                            {'data' : 'LoginIp'}
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