@extends('lcms.layouts.master')

@section('content')
<h5>- {{$arr_prof_info['ProfNickName']}} 교수 첨삭 게시판</h5>
@include('lms.board.professor.assignment.common_partial')

<form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    {!! html_def_site_tabs($arr_prof_info['SiteCode'], 'tabs_site_code', 'tab', false, [], false, array($arr_prof_info['SiteCode'] => $arr_prof_info['SiteName'])) !!}
    <input type="hidden" name="site_code" value="{{$product_data['SiteCode']}}">
    <input type="hidden" name="cate_code" value="{{$product_data['CateCode']}}">
    <div class="x_panel">
        <div class="x_content">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>강좌기본정보</th>
                    <th>강좌유형</th>
                    <th>과정</th>
                    <th>과목</th>
                    <th>단강좌명</th>
                    <th>판매가</th>
                    <th>판매여부</th>
                    <th>사용여부</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{$product_data['SiteName']}} <br> {{(empty($product_data['CateName_Parent']) === true ? '' : $product_data['CateName_Parent'].'<Br>')}} {{$product_data['CateName']}} <br> {{$product_data['SchoolYear']}}
                        </td>
                        <td>{{$product_data['LecTypeCcd_Name']}}</td>
                        <td>{{$product_data['CourseName']}}</td>
                        <td>{{$product_data['SubjectName']}}</td>
                        <td>[{{$product_data['ProdCode']}}] {{$product_data['ProdName']}}</td>
                        <td>
                            {{--return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';--}}
                            {{number_format($product_data['RealSalePrice'])}}원<BR><strike>{{number_format($product_data['SalePrice'])}}원</strike>
                        </td>
                        <td>
                            @if($product_data['SaleStatusCcd_Name'] == '판매불가')
                                <span class="red">{{$product_data['SaleStatusCcd_Name']}}</span>
                            @else
                                {{$product_data['SaleStatusCcd_Name']}}
                            @endif
                        </td>
                        <td>
                            {!! ($product_data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>' !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right form-inline">
                <button type="button" class="btn btn-sm btn-primary ml-10 btn-main-list">전체강좌목록</button>
            </div>
        </div>
    </div>

    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">조건</label>
                <div class="col-md-2 form-inline">
                    <select class="form-control" id="search_is_use" name="search_is_use">
                        <option value="">사용여부</option>
                        <option value="Y">사용</option>
                        <option value="N">미사용</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">제목/내용</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="search_value" name="search_value">
                </div>

                <label class="control-label col-md-1 col-lg-offset-1" for="search_start_date">등록일</label>
                <div class="col-md-5 form-inline">
                    <div class="input-group">
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            <button type="button" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
        </div>
    </div>
</form>

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>NO</th>
                <th>강의명</th>
                <th>첨부</th>
                <th>등록자</th>
                <th>등록일</th>
                <th>사용</th>
                <th>조회수</th>
                <th>수정</th>
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
            buttons: [
                { text: '<i class="fa fa-copy mr-10"></i> 과제노출스케줄', className: 'btn-sm btn-dark border-radius-reset btn-open-calendar' },
                { text: '<i class="fa fa-copy mr-10"></i> 등록', className: 'btn-sm btn-primary border-radius-reset ml-10 btn-create-assignment' }
            ],
            ajax: {
                'url' : '{{ site_url("/board/professor/{$boardName}/registForBoardAjax/{$prod_code}?") }}' + '{!! $boardDefaultQueryString !!}',
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
                {'data' : 'Title', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-read" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                    }},
                {'data' : 'AttachFileName', 'render' : function(data, type, row, meta) {
                        var tmp_return;
                        (data === null) ? tmp_return = '' : tmp_return = '<p class="glyphicon glyphicon-file"></p>';
                        return tmp_return;
                    }},
                {'data' : 'wAdminName'},
                {'data' : 'RegDatm'},
                {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                    }},
                {'data' : 'ReadCnt'},
                {'data' : 'BoardIdx', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.BoardIdx + '"><u>수정</u></a>';
                    }}
            ]
        });

        //전체강좌목록
        $('.btn-main-list').click(function() {
            location.href = '{{ site_url("/board/professor/{$boardName}/productList") }}/' + getQueryString();
        });

        //과제노출스케줄관리
        $('.btn-open-calendar').click(function () {
            $('.btn-open-calendar').setLayer({
                "url" : "{{ site_url("/board/professor/{$boardName}/createScheduleModal/{$prod_code}?") }}" + '{!! $boardDefaultQueryString !!}',
                "width" : "1200"
            });
        });

        //등록
        $('.btn-create-assignment').click(function() {
            var cate_code = $search_form.find('input[name="cate_code"]').val();
            $('.btn-create-assignment').setLayer({
                "url" : "{{ site_url("/board/professor/{$boardName}/createAssignmentModal/{$prod_code}?") }}" + '{!! $boardDefaultQueryString !!}',
                "width" : "1200",
                'add_param_type' : 'param',
                'add_param' : [
                    { 'id' : 'cate_code', 'name' : '카테고리', 'value' : cate_code, 'required' : true }
                ]
            });
        });

        //수정
        $list_table.on('click', '.btn-modify', function() {
            var cate_code = $search_form.find('input[name="cate_code"]').val();
            var board_idx = $(this).data('idx');
            $('.btn-modify').setLayer({
                "url" : "{{ site_url("/board/professor/{$boardName}/createAssignmentModal/{$prod_code}?") }}" + '{!! $boardDefaultQueryString !!}',
                "width" : "1200",
                'add_param_type' : 'param',
                'add_param' : [
                    { 'id' : 'cate_code', 'name' : '카테고리', 'value' : cate_code, 'required' : true },
                    { 'id' : 'board_idx', 'name' : '게시판식별자', 'value' : board_idx, 'required' : true }
                ]
            });
        });

        //read
        $list_table.on('click', '.btn-read', function() {
            $('.btn-read').setLayer({
                "url" : "{{ site_url("/board/professor/{$boardName}/readAssignmentModal/") }}" + $(this).data('idx') + '?' + '{!! $boardDefaultQueryString !!}',
                "width" : "1200"
            });
        });
    });
</script>
@stop