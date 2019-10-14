@extends('lcms.layouts.master_modal')
@section('layer_title')
    SMS 발송내역
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;">
        <input type="hidden" name="MemIdx" value="{{$data['MemIdx']}}" />
        {!! csrf_field() !!}
        @endsection
        @section('layer_content')
            {!! form_errors() !!}
            <div class="x_panel mt-0">
                <div class="x_content">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>회원번호</th>
                                <th>아이디</th>
                                <th>회원이름</th>
                                <th>생년월일</th>
                                <th>전화번호</th>
                                <td>이메일</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$data['MemIdx']}}</td>
                                <td>{{$data['MemId']}}</td>
                                <td>{{$data['MemName']}}</td>
                                <td>{{$data['BirthDay']}} ({{ $data['Sex'] == 'M' ? '남' : '여' }})</td>
                                <td>{{$data['Phone']}}</td>
                                <td>{{$data['Mail']}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-md-2">
                    <select class="form-control" id="search_send_type_ccd" name="search_send_type_ccd" >
                        <option value="">메세지종류</option>
                        @foreach($arr_send_type_ccd as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                </div>
                <label class="control-label col-md-1" for="search_value">내용검색</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="search_value" id="search_value" title="검색어" value="">
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
                            <th>사이트</th>
                            <th>메세지성격</th>
                            <th>메세지종류</th>
                            <th>내용</th>
                            <th>발신번호</th>
                            <th>발신인</th>
                            <th>발송일</th>
                            <th>발송상태</th>
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
                            'url' : '{{ site_url("/member/manage/ajaxSmsLogList/") }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta){
                                    return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                }},
                            {'data' : 'SiteName'},
                            {'data' : 'SendPatternCcdName'},
                            {'data' : 'SendTypeCcdName'},
                            {'data' : 'Content'},
                            {'data' : 'CsTelCcdName'},
                            {'data' : 'wAdminName'},
                            {'data' : 'SendDatm'},
                            {'data' : 'SendStatusCcdName'}
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