@extends('lcms.layouts.master')

@section('content')
    <h5>- 제휴사 접속 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="">제휴사</label>
                    <div class="col-md-2 form-inline">
                        <select class="form-control" id="search_btobidx" name="search_btobidx">
                            <option value="">제휴사검색</option>
                            @foreach($list_company as $row)
                            <option value="{{$row['BtobIdx']}}">{{$row['BtobName']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="control-label col-md-1" for="search_value">IP검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static"></p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </form>


    <div class="x_panel mt-10">
        <div class="x_content">

            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="80">No</th>
                    <th width="150">접속사이트</th>
                    <th  width="150">제휴사명</th>
                    <th  width="300">이전도메인</th>
                    <th>사용자정보</th>
                    <th  width="150">접속IP</th>
                    <th  width="150">접속일</th>
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

                    ],
                    ajax: {
                        'url' : '{{ site_url('/sys/btob/AccessLog/listAjax') }}',
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
                        {'data' : 'SiteName'},
                        {'data' : 'BtobName'},
                        {'data' : 'ReferDomain'},
                        {'data' : 'UserAgent'},
                        {'data' : null, 'render' : function(data, type, row, meta) {
                                return '<strong>'+data.RegIp+'</strong>'
                            }},
                        {'data' : 'RegDatm'}
                    ]
                });
        });

    </script>
@stop
