@extends('btob.layouts.master')

@section('content')
    <h5>- 첨삭 회차 등록 및 수강생의 첨삭 답안 제출 현황을 확인하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_content">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>캠퍼스</th>
                    <th>강좌기본정보</th>
                    <th>수강형태</th>
                    <th>과정</th>
                    <th>과목</th>
                    <th>강사</th>
                    <th>단과반명</th>
                    <th>판매여부</th>
                    <th>사용여부</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$product_data['CampusCcd_Name']}}</td>
                    <td>
                        {{$product_data['SiteName']}}<br>
                        {{(empty($product_data['CateName_Parent']) === true ? '' : $product_data['CateName_Parent'].'<Br>')}} {{$product_data['CateName']}}<br>
                        {{$product_data['SchoolYear']}}
                    </td>
                    <td>{{$product_data['StudyPatternCcd_Name']}}</td>
                    <td>{{$product_data['CourseName']}}</td>
                    <td>{{$product_data['SubjectName']}}</td>
                    <td>{{$product_data['wProfName_String']}}</td>
                    <td>[{{$product_data['ProdCode']}}] {{$product_data['ProdName']}}</td>
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
                <button type="button" class="btn btn-sm btn-primary ml-10 btn-product-list">전체강좌목록</button>
            </div>
        </div>
    </div>

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" value="{{$arr_base['site_code']}}">
        <input type="hidden" name="prod_code" value="{{$arr_base['prod_code']}}">

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">조건검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">회차명/내용</label>
                    <div class="col-md-5 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
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
                    <th>번호</th>
                    <th>회차명</th>
                    <th>첨부</th>
                    <th>등록자</th>
                    <th>제출기간</th>
                    <th>등록일</th>
                    <th>채점료</th>
                    <th>사용</th>
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
                    { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-success border-radius-reset mr-15 btn-create-unit'}
                ],
                ajax: {
                    'url' : '{{ site_url('/correct/regist/unitListAjax') }}',
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
                            return '<a href="javascript:void(0);" class="btn-read" data-correct-idx="' + row.CorrectIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'AttachFileName', 'render' : function(data, type, row, meta) {
                            var tmp_return;
                            (data === null) ? tmp_return = '' : tmp_return = '<p class="glyphicon glyphicon-file"></p>';
                            return tmp_return;
                        }},
                    {'data' : 'AdminName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var string = (row.Date_Diff < '0') ? ' <span class="red">(종료)</span>' : '';
                            return row.StartDate + ' - ' + row.EndDate + string;
                        }},
                    {'data' : 'RegDatm'},
                    {'data' : 'Price'},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                        }},
                    {'data' : 'CorrectIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-create-unit" data-correct-idx="' + row.CorrectIdx + '"><u>수정</u></a>';
                        }},
                ],
            });

            //전체강좌목록
            $('.btn-product-list').click(function() {
                location.href = '{{ site_url("/correct/regist/product/") }}';
            });

            //회차등록
            $('.btn-create-unit').click(function() {
                unitCreateModal('');
            });

            //회차수정
            $list_table.on('click', '.btn-create-unit', function() {
                var correct_idx = $(this).data('correct-idx');
                unitCreateModal(correct_idx);
            });

            //read
            $list_table.on('click', '.btn-read', function() {
                var site_code = $search_form.find('input[name="site_code"]').val();
                var prod_code = $search_form.find('input[name="prod_code"]').val();

                $('.btn-read').setLayer({
                    "url" : "{{ site_url("/correct/regist/unitReadModal/") }}" + $(this).data('correct-idx'),
                    "width" : "1200",
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'site_code', 'name' : '사이트코드', 'value' : site_code, 'required' : true },
                        { 'id' : 'prod_code', 'name' : '상품코드', 'value' : prod_code, 'required' : true }
                    ]
                });
            });
        });

        function unitCreateModal(correct_idx)
        {
            var site_code = $search_form.find('input[name="site_code"]').val();
            var prod_code = $search_form.find('input[name="prod_code"]').val();

            $('.btn-create-unit').setLayer({
                "url" : "{{ site_url("/correct/regist/unitCreateModal/") }}" + correct_idx,
                "width" : "1200",
                'add_param_type' : 'param',
                'add_param' : [
                    { 'id' : 'site_code', 'name' : '사이트코드', 'value' : site_code, 'required' : true },
                    { 'id' : 'prod_code', 'name' : '상품코드', 'value' : prod_code, 'required' : true }
                ]
            });
        }
    </script>
@stop