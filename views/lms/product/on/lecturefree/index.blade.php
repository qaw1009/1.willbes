@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인 무료강좌 상품 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <div class="x_panel">
            <div class="x_content">

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강좌기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-10" id="search_lg_cate_code" name="search_lg_cate_code">
                            <option value="">대분류</option>
                            @foreach($arr_lg_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10 hide" id="search_md_cate_code" name="search_md_cate_code">
                            <option value="">중분류</option>
                            @foreach($arr_md_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select name="search_schoolyear" id="search_schoolyear" class="form-control" title="대비학년도">
                            <option value="">대비학년도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        &nbsp;
                        <select class="form-control mr-10" id="search_course_idx" name="search_course_idx">
                            <option value="">과정</option>
                            @foreach($arr_course as $row)
                                <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CourseName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_subject_idx" name="search_subject_idx">
                            <option value="">과목</option>
                            @foreach($arr_subject as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_prof_idx" name="search_prof_idx">
                            <option value="">교수</option>
                            @foreach($arr_professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">제공정보</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_freelectype_ccd" name="search_freelectype_ccd">
                            <option value="">강좌유형</option>
                            @foreach($FreeLecType_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select class="form-control" id="search_wprogress_ccd" name="search_wprogress_ccd">
                            <option value="">진행상태</option>
                            @foreach($wProgress_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select class="form-control" id="search_sales_ccd" name="search_sales_ccd">
                            <option value="">제공상태</option>
                            @foreach($Sales_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강좌검색</label>
                    <div class="col-md-6 form-inline">

                        <select class="form-control" id="search_type" name="search_type" style="width:120px;">
                            <option value="lec">무료강좌</option>
                            <option value="wlec">마스터강의</option>
                        </select>
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
                    </div>
                    <div class="col-md-5">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">신규/추천</label>
                    <div class="col-md-5 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" name="search_new" id="search_new" class="flat" value="Y"> 신규
                        </div>
                        &nbsp;
                        <div class="checkbox">
                            <input type="checkbox" name="search_best" id="search_best" class="flat" value="Y"> 추천
                        </div>
                    </div>
                    <label class="control-label col-md-1" for="search_is_use">등록일</label>
                    <div class="col-md-5 form-inline">
                        <input name="search_sdate"  class="form-control datepicker" id="search_sdate" style="width: 100px;"  type="text"  value="">
                        ~ <input name="search_edate"  class="form-control datepicker" id="search_edate" style="width: 100px;"  type="text"  value="">
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
                    <th width="4%">복사<br>선택</th>
                    <th>강좌기본정보</th>
                    <th>강좌유형</th>
                    <th>과정</th>
                    <th>과목</th>
                    <th>교수</th>
                    <th>무료강좌명</th>
                    <th>진행상태</th>
                    <th>신규</th>
                    <th>추천</th>
                    <th width="5%">제공상태</th>
                    <th width="5%">사용여부</th>
                    <th width="5%">신청자</th>
                    <th width="5%">등록자</th>
                    <th width="8%">등록일</th>
                    <th>복사</th>
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

                    { text: '<i class="fa fa-pencil mr-5"></i> 신규/추천 적용', className: 'btn-sm btn-success border-radius-reset mr-15 btn-new-best-modify'}
                    /*,{ text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-order'}*/
                    ,{ text: '<i class="fa fa-copy mr-5"></i> 무료강좌복사', className: 'btn-sm btn-success border-radius-reset mr-15 btn-copy'}
                    ,{ text: '<i class="fa fa-pencil mr-5"></i> 무료강좌등록', className: 'btn-sm btn-primary border-radius-reset btn-reorder',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('product/on/lectureFree/create') }}';
                        }
                    }
                ],

                ajax: {
                    'url' : '{{ site_url('/product/on/lectureFree/listAjax') }}'
                    ,'type' : 'post'
                    ,'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                }
                ,
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="flat"  name="copyProdCode" value="'+row.ProdCode+'">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.SiteName+'<BR>'+(row.CateName_Parent == null ? '' : row.CateName_Parent+'<BR>')+(row.CateName)+'<BR>'+row.SchoolYear;
                        }},
                    {'data' : 'FreeLecTypeCcd_Name'},//강좌유형
                    {'data' : 'CourseName'},//과정명
                    {'data' : 'SubjectName'},//과목명
                    {'data' : 'wProfName_String'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '['+row.ProdCode+ '] <a href="#" class="btn-modify" data-idx="' + row.ProdCode + '"><u>' + row.ProdName + '</u></a> ';
                        }},//무료강좌명

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.wProgressCcd_Name+'<BR>('+row.wUnitLectureCnt+ (row.wScheduleCount == null ? '' : '/'+row.wScheduleCount)+')';
                        }},//진행상태

                    {'data' : 'IsNew', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" class="flat" name="is_new" value="Y" data-idx="'+ row.ProdCode +'" data-origin-is-new="' + data + '" ' + ((data === 'Y') ? ' checked="checked"' : '') + '>';
                        }},

                    {'data' : 'IsBest', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" class="flat" name="is_best" value="Y" data-idx="'+ row.ProdCode +'" data-origin-is-best="' + data + '" ' + ((data === 'Y') ? ' checked="checked"' : '') + '>';
                        }},

                    {'data' : 'SaleStatusCcd_Name', 'render' : function(data, type, row, meta) {
                            return (data !== '판매불가') ? data : '<span class="red">'+data+'</span>';
                        }},//판매여부
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},//사용여부
                    {'data' : 'PayEndCnt'},//신청자
                    {'data' : 'wAdminName'},//등록자
                    {'data' : 'RegDatm'},//등록일
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return (row.ProdCode_Original !== '') ? '<span class="red">Y</span>' : '';
                        }},//복사여부
                ]

            });

            // 과정, 과목, 교수 자동 변경
            $search_form.find('select[name="search_lg_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_lg_cate_code");
            $search_form.find('select[name="search_course_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_subject_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_prof_idx"]').chained("#search_site_code");



            //강의복사
            $('.btn-copy').on('click',function(){
                if ($('input:radio[name="copyProdCode"]').is(':checked') === false) {
                    alert('복사할 강좌를 선택해 주세요.');
                    return false;
                }

                if(confirm("해당 강좌를 복사하시겠습니까?")) {
                    var data = {
                        '{{ csrf_token_name() }}': $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        '_method': 'PUT',
                        'prodCode': $('input:radio[name="copyProdCode"]:checked').val()
                    };

                    sendAjax('{{ site_url('/product/on/lectureFree/copy') }}', data, function (ret) {
                        if (ret.ret_cd) {
                            //notifyAlert('success', '알림', ret.ret_msg);
                            alert(ret.ret_msg);
                            $datatable.draw();
                        }
                    }, showError, false, 'POST');
                }


            });

            // 신규, 추천 상태 변경
            $('.btn-new-best-modify').on('click', function() {
                if (!confirm('신규/추천 상태를 적용하시겠습니까?')) {
                    return;
                }

                var $is_new = $list_table.find('input[name="is_new"]');
                var $is_best = $list_table.find('input[name="is_best"]');
                var $params = {};
                var origin_val, this_val, this_new_val, this_best_val;

                $is_new.each(function(idx) {
                    // 신규 또는 추천 값이 변하는 경우에만 파라미터 설정
                    this_new_val = $(this).filter(':checked').val() || 'N';
                    this_best_val = $is_best.eq(idx).filter(':checked').val() || 'N';
                    this_val = this_new_val + ':' + this_best_val;
                    origin_val = $(this).data('origin-is-new') + ':' + $is_best.eq(idx).data('origin-is-best');
                    if (this_val !== origin_val) {
                        $params[$(this).data('idx')] = { 'IsNew' : this_new_val, 'IsBest' : this_best_val };
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };

                sendAjax('{{ site_url('/product/on/lectureFree/redata') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/product/on/lectureFree/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });

        });
    </script>
@stop
