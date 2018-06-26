@extends('lcms.layouts.master_popup')
@section('popup_title')
    회원정보이력보기 ({{$logtype == 'chg' ? "정보변경" : "암호변경"}})
@stop

@section('popup_header')
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        <input type="hidden" name="memIdx" value="{{$data['MemIdx']}}" />
        <input type="hidden" name="UpdTypeCcd" value="{{$UpdTypeCcd}}" />
        {!! csrf_field() !!}
        @endsection

        @section('popup_content')
            {!! form_errors() !!}
            @include('lms.member.log.infonav')
            @include('lms.member.log.lognav')
            <div class="x_panel mt-10">
                <div class="x_content">
                    <table id="list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>변경항목</th>
                            <th>변경일</th>
                            <th>변경자</th>
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
                        lengthMenu: [10],
                        pageLength : 10,
                        pagingType : 'simple_numbers',
                        ajax: {
                            'url' : '{{ site_url("/member/manage/ajaxinfologList/") }}',
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
                            {'data' : ''},
                            {'data' : ''},
                            {'data' : ''}
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