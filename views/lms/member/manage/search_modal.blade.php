@extends('lcms.layouts.master_modal')
@section('layer_title')
    회원검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;">
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" novalidate>--}}
        {!! csrf_field() !!}
@endsection

@section('layer_content')
        {!! form_errors() !!}
        <div class="form-group form-group-sm item">
            <label class="control-label col-md-2" for="GroupName">회원검색</label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="search_value" id="search_value" title="그룹유형명" value="{{ $search_value }}">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn bg-blue btn-primary btn-search" id="btn_search">검색</button>
            </div>
        </div>
        <div class="x_panel mt-10">
            <div class="x_content">
                <table id="list_ajax_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>회원번호</th>
                        <th>이름</th>
                        <th>아이디</th>
                        <th>휴대폰</th>
                        <th>E-mail정보</th>
                        <th>가입일</th>
                        <th>선택</th>
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
            var $list_table = $('#list_ajax_table');

            $(document).ready(function() {
                $datatable = $list_table.DataTable({
                    serverSide: true,
                    lengthMenu: [10],
                    pageLength : 10,
                    pagingType : 'simple_numbers',
                    ajax: {
                        'url' : '{{ site_url("/member/manage/ajaxList/") }}',
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
                        {'data' : 'MemIdx'},
                        {'data' : 'MemName'},
                        {'data' : 'MemId'},
                        {'data' : 'Phone'},
                        {'data' : 'Mail'},
                        {'data' : 'JoinDate'},

                        {'data' : null, 'render' : function(data, type, row, meta){
                                return '<button id="btn_select" class="btn-view1 btn bg-blue btn-primary btn-search" data-idx="' + row.MemIdx + '"">선택</button>';
                            }}
                    ]
                });

                $list_table.on('click', '#btn_select', function() {
                    location.replace('{{ site_url('/member/manage/detail') }}/' + $(this).data('idx') );
                });
            });
        </script>
@stop

@section('add_buttons')

@endsection

@section('layer_footer')
    </form>
@endsection