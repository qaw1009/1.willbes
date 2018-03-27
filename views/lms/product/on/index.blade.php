@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인 단강좌 상품 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <ul class="nav nav-tabs mt-20 mb-10" role="tablist">
            <li role="presentation" class="active"><a href="#none" role="tab" data-toggle="tab"><strong>전체</strong></a></li>
            <li role="presentation"><a href="#none" role="tab" data-toggle="tab"><strong>경찰</strong></a></li>
            <li role="presentation"><a href="#none" role="tab" data-toggle="tab"><strong>공무원</strong></a></li>
            <li role="presentation"><a href="#none" role="tab" data-toggle="tab"><strong>임용</strong></a></li>
        </ul>
        <div class="x_panel">
            <div class="x_content">

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강의기본정보</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_cate_1" name="search_cate_1">
                            <option value="">대분류</option>
                            <option value=""></option>
                        </select>

                        <select class="form-control" id="search_cate_2" name="search_cate_2">
                            <option value="">중분류</option>
                            <option value=""></option>
                        </select>

                        <select class="form-control" id="search_cate_3" name="search_cate_3">
                            <option value="">소분류</option>
                            <option value=""></option>
                        </select>

                        <select class="form-control" id="search_grade" name="search_grade">
                            <option value="">대비학년도</option>
                            <option value=""></option>
                        </select>

                        <select class="form-control" id="search_course" name="search_course">
                            <option value="">과정</option>
                            <option value=""></option>
                        </select>

                        <select class="form-control" id="search_subject" name="search_subject">
                            <option value="">과목</option>
                            <option value=""></option>
                        </select>

                        <select class="form-control" id="search_subject" name="search_subject">
                            <option value="">교수</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">제공정보</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_cate_1" name="search_cate_1">
                            <option value="">특강여부</option>
                            <option value=""></option>
                        </select>

                        <select class="form-control" id="search_cate_2" name="search_cate_2">
                            <option value="">진행상태</option>
                            <option value=""></option>
                        </select>

                        <select class="form-control" id="search_cate_3" name="search_cate_3">
                            <option value="">배수여부</option>
                            <option value=""></option>
                        </select>

                        <select class="form-control" id="search_grade" name="search_grade">
                            <option value="">판매여부</option>
                            <option value=""></option>
                        </select>

                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강좌검색</label>
                    <div class="col-md-5 form-inline">

                        <select class="form-control" id="search_cate_1" name="search_cate_1" style="width:120px;">
                            <option value="">단강좌</option>
                            <option value="">마스터강의</option>
                        </select>
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">

                    </div>
                    <div class="col-md-6">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">신규/추천</label>
                    <div class="col-md-5 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" name="" id="" class="flat"  > 신규
                        </div>
                        &nbsp;
                        <div class="checkbox">
                            <input type="checkbox" name="" id="" class="flat"  > 추천
                        </div>
                    </div>
                    <label class="control-label col-md-1" for="search_is_use">등록일</label>
                    <div class="col-md-5 form-inline">
                        <input name="search_sdate"  class="form-control datepicker" id="search_sdate" style="width: 100px;"  type="text" readonly="" value="">
                        ~<input name="search_edate"  class="form-control datepicker" id="search_edate" style="width: 100px;"  type="text" readonly="" value="">
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
                    <th>복사<br>선택</th>
                    <th>강의기본정보</th>
                    <th>특강여부</th>
                    <th>과정명</th>
                    <th>과목명 </th>
                    <th>교수명 </th>
                    <th>단강좌명 </th>
                    <th>진행상태 </th>
                    <th>판매가 </th>
                    <th>신규 </th>
                    <th>추천 </th>
                    <th>배수 </th>
                    <th>판매여부 </th>
                    <th>사용여부 </th>
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

            $datatable = $list_table.DataTable({
                serverSide: true,

                buttons: [

                    { text: '<i class="fa fa-thumbs-o-up mr-5"></i> 신규/추천 적용', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-reorder',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('/cms/lecture/create') }}';
                        }
                    }
                    ,{ text: '<i class="fa fa-copy mr-5"></i> 강의복사', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('/') }}';
                        }
                    }
                   ,{ text: '<i class="fa fa-pencil mr-5"></i> 단강좌등록', className: 'btn-sm btn-primary border-radius-reset btn-reorder',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('product/on/lecture/create') }}';
                        }
                    }
                ],

                ajax: {
                    'url' : '{{ site_url('/product/on/lecture/listAjax') }}'
                    ,'type' : 'post'
                    ,'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                }
                ,
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="btn-copy" data-idx="'+ +'">';
                        }},
                    {'data' : null},//강의기본정보
                    {'data' : null},//특강
                    {'data' : null},//과정명
                    {'data' : null},//과목명
                    {'data' : null},//교수명
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="#" class="btn-modify" data-idx="' + row.wLecIdx + '"><u>' + data + '</u></a> ['+row.wLecIdx+ ']';
                        }},//단강좌명
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="#" class="btn-unit" data-idx="' + row.wLecIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox">';
                        }},
                    {'data' : null},//배수
                    {'data' : null},//판매여부
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},//사용여부
                    {'data' : 'wRegAdminName'},//등록자
                    {'data' : 'wRegDatm'}//등록일
                ]

            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/product/on/lecture/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });



        });
    </script>
@stop
