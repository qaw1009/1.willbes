@extends('lcms.layouts.master')
@section('content')
    <h5>- 강좌지급 인증정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
{{--                        <select class="form-control" id="search_category" name="search_category">--}}
{{--                            <option value="">카테고리</option>--}}
{{--                            @foreach($arr_category as $row)--}}
{{--                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        <select class="form-control" id="search_md_cate_code" name="search_md_cate_code">--}}
{{--                            <option value="">중분류</option>--}}
{{--                            @foreach($arr_m_category as $row)--}}
{{--                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                        <select class="form-control" id="search_is_auto_approval" name="search_is_auto_approval">
                            <option value="">승인유형</option>
                            <option value="N">수동승인(관리자 승인 처리 시 자동지급)</option>
                            <option value="Y">자동승인(사용자 신청 시 자동지급)</option>
                        </select>
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                    <label class="control-label col-md-1" for="search_title">제목</label>
                    <div class="col-md-5 form-inline">
                        <input type="text" class="form-control" name="search_title" style="width:300px;">
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
                    <th>NO</th>
                    <th>운영사이트</th>
                    <th>코드</th>
                    <th>제목</th>
                    <th>승인유형</th>
                    <th>인증기간</th>
                    <th>수강제공기간</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
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
                    { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/authgive/authGive/create') }}';
                        }
                    }
                ],
                ajax: {
                    'url' : '{{ site_url('/site/authgive/authGive/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'AgCode'},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return '<a href="#" class="btn-modify" data-idx="' + data.AgIdx + '">'+ data.Title +'</a>';
                        }},
                    {'data' : 'IsAutoApprovalName'},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return data.AuthStartDate + ' ~ ' +data.AuthEndDate;
                        }},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return (data.StudyPeriodType === 'P') ? data.StudyPeriodTypeName : data.StudyPeriodTypeName+' ('+ data.StudyPeriod +'일)';
                        }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            $('.btn-regist').setLayer({
                'url' : '{{ site_url('/site/authgive/authGive/create') }}',
                'width' : 900
                ,'modal_id' : 'cert_create'
            });

            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/site/authgive/authGive/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });

        });
    </script>
@stop