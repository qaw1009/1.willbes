@extends('btob.layouts.master')

@section('content')
    <h5>- 첨삭 회차 등록 및 수강생의 첨삭 답안 제출 현황을 확인하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강좌검색</label>
                    <div class="col-md-5 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
                        <p class="form-control-static">강좌명, 코드 검색 가능</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">조건검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_subject_idx" name="search_subject_idx">
                            <option value="">과목</option>
                            @foreach($arr_subject as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_prof_idx" name="search_prof_idx">
                            <option value="">강사</option>
                            @foreach($arr_professor as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
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
                    <th>캠퍼스</th>
                    <th>강좌기본정보</th>
                    <th>수강형태</th>
                    <th>과정</th>
                    <th>과목</th>
                    <th>강사</th>
                    <th>단과반명</th>
                    <th>회차등록</th>
                    <th>첨삭현황</th>
                    <th>회차수</th>
                    <th>제출인원</th>
                    <th>미채점</th>
                    <th>채점완료</th>
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
                ajax: {
                    'url' : '{{ site_url('/correct/regist/productListAjax') }}',
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
                    {'data' : 'CampusCcd_Name'},//캠퍼스
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.SiteName+'<BR>'+(row.CateName_Parent == null ? '' : row.CateName_Parent+'<BR>')+(row.CateName)+'<BR>'+row.SchoolYear;
                        }},
                    {'data' : 'CourseName'},//과정명
                    {'data' : 'SubjectName'},//과목명
                    {'data' : 'wProfName_String'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '['+row.ProdCode+ '] ' + row.ProdName;
                        }},//단강좌명

                    {'data' : 'ProdCode', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-regist-unit" data-prod-code="' + row.ProdCode + '"><u>등록</u></a>';
                        }},
                    {'data' : 'ProdCode', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-regist-issue" data-prod-code="' + row.ProdCode + '"><u>확인</u></a>';
                        }},
                    {'data' : null},
                    {'data' : null},
                    {'data' : null},
                    {'data' : null},
                ],
            });

            // 회차등록
            $list_table.on('click', '.btn-regist-unit', function() {
                location.href='{{ site_url("/correct/regist/unit") }}/' + $(this).data('prod-code');
            });

            // 채점현황
            $list_table.on('click', '.btn-regist-issue', function() {
                location.href='{{ site_url("/correct/regist/issueForProduct") }}/' + $(this).data('prod-code');
            });
        });
    </script>
@stop