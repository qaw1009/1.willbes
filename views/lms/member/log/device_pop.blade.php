@extends('lcms.layouts.master_popup')
@section('popup_title')
    기기등록정보
@stop

@section('popup_header')
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        <input type="hidden" name="memIdx" value="{{$data['MemIdx']}}" />
        {!! csrf_field() !!}
        @endsection

        @section('popup_content')
            {!! form_errors() !!}
            @include('lms.member.log.infonav')
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
                        lengthMenu: [-1],
                        pageLength : 10,
                        pagingType : 'simple_numbers',
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