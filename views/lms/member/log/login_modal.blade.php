@extends('lcms.layouts.master_modal')
@section('layer_title')
    회원정보이력보기 (로그인이력)
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;">
        <input type="hidden" name="memIdx" value="{{$data['MemIdx']}}" />

        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            {!! form_errors() !!}
            @include('lms.member.log.infonav')
            @include('lms.member.log.lognav')
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1" for="GroupName">IP검색</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="search_value" id="search_value" title="검색어" value="">
                </div>
                <div class="col-md-5">
                    <div class="input-group">
                        <div class="input-group-addon no-border no-bgcolor"></div>
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
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary btn-search" id="btn_search">검색</button>
                </div>
            </div>
            <div class="x_panel mt-10">
                <div class="x_content">
                    <table id="list_ajax_table_modal" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>로그인 날짜</th>
                            <th>로그인 IP</th>
                            <th>로그아웃 날짜</th>
                            <th>로그아웃 IP</th>
                            <th>로그인사용자</th>
                            <th>로그인타입</th>
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
                            'url' : '{{ site_url("/member/manage/ajaxloginlogList/") }}',
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
                            {'data' : 'LoginIp'},
                            {'data' : 'LogoutDatm'},
                            {'data' : 'LogoutIp'},
                            {'data' : 'AdminName', 'render' : function(data, type, row,meta){
                                    return (data == '') ? '사용자' : '운영자('+data+')';
                                }},
                            {'data' : 'LoginType'}
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