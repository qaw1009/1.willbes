@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원가입시 증정되는 월컴팩 관리페이지 입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <ul id="tabs_site_code" class="tabs-site-code nav nav-tabs bar_tabs mt-30" role="tablist">
            <li role="presentation" class="active"><a href="#none" role="tab" data-toggle="tab" data-site-code=""><strong>전체</strong></a></li>
            @foreach($wInterestCode as $key => $value)
                <li role="presentation" class=""><a href="#none" role="tab" data-toggle="tab" data-site-code="{{ $key  }}"><strong>{{ $value }}</strong></a></li>
            @endforeach
        </ul>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">품명 검색</label>
                    <div class="col-md-1">
                        <select class="form-control" id="wType" name="wType">
                            <option value="">전체</option>
                            <option value="C">쿠폰</option>
                            <option value="L">강좌</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-cßontrol" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">• 등록된 쿠폰이나 강좌명 그리고 설명내용으로 검색이 가능합니다. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>번호</th>
                    <th>직렬</th>
                    <th>분류</th>
                    <th>품명</th>
                    <th>상태</th>
                    <th>등록일</th>
                    <th>등록자</th>
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
                pagingType : 'simple_numbers',
                lengthMenu: [10,20,30,50,100],
                pageLength : 30,
                buttons: [
                    { text: '<i class="fa fa-envelope-o mr-5"></i> 신규등록', className: 'btn-sm btn-primary border-radius-reset mr-15', action : function(e, dt, node, config){
                            location.href = '{{ site_url('/member/welcomepack/create') }}' + dtParamsToQueryString($datatable);
                        } }
                ],
                ajax: {
                    'url' : '{{ site_url("/member/welcomepack/ajaxList/") }}',
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
                    {'data' : 'wIdx' },
                    {'data' : 'InterestName'},
                    {'data' : 'wType', 'render' : function(data,type,row,meta){
                            return (data == 'C' ? '<font color=red>쿠폰</font>' : '<font color=blue>강좌</font>');
                        }},
                    {'data' : 'ProdName', 'render' : function(data,type,row,meta){
                            return '<a href="#" class="btn-view1 blue" data-idx="' + row.wIdx + '">' + data + '</a>';
                        }},
                    {'data' : 'IsStatus', 'render' : function(data,type,row,meta){
                            return (data == 'N' ? '<font color=red>미사용</font>' : '<font color=blue>사용</font>');
                        }},
                    {'data' : 'RegDatm'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'UpdDatm'},
                    {'data' : 'UpdAdminName'}
                ]
            });

            $list_table.on('click', '.btn-view1', function() {
                location.href=('{{ site_url('/member/welcomepack/detail') }}/' + $(this).data('idx') + '/' + dtParamsToQueryString($datatable));
            });

        });
    </script>
@stop