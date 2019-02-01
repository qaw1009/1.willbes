@extends('lcms.layouts.master_modal')
@section('layer_title')
    블랙리스트정보
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;">
        <input type="hidden" name="search_member_idx" value="{{$data['MemIdx']}}" />
        <input type="hidden" name="UpdTypeCcd" value="656006" />
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            {!! form_errors() !!}
            @include('lms.member.log.infonav')
            <div class="x_panel mt-10">
                <div class="x_content">
                    <table id="list_ajax_table_modal" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>운영사이트</th>
                            <th>이유</th>
                            <th>날짜</th>
                            <th>관리자</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <script type="text/javascript">
                var $datatable;
                var $search_form = $('#search_form_modal');
                var $list_table = $('#list_ajax_table_modal');

                $(document).ready(function() {
                    $datatable = $list_table.DataTable({
                        serverSide: true,
                        lengthMenu: [10],
                        pageLength : 10,
                        pagingType : 'simple_numbers',
                        ajax: {
                            'url' : '{{ site_url('/member/manage/ajaxBlackConsumerDataTable/') }}',
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
                            {'data' : 'SiteName'},
                            {'data' : 'Content', 'render' : function(data, type, row, meta) {
                                    return '<p id="content_id_'+row.BcIdx+'">'+nl2br(data)+'</p>';
                                }},
                            {'data' : 'RegDatm'},
                            {'data' : 'RegAdminName'}
                        ]
                    });
                });
            </script>
        @stop

        @section('add_buttons')

        @endsection

        @section('layer_footer')
    </form>
    <script type="text/javascript">
        function nl2br(str){
            return str.replace(/\n/g, "<br />");
        }
    </script>
@endsection