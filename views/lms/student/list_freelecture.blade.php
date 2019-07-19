@extends('lcms.layouts.master')

@section('content')
    <h5>- 무료강좌 수강생(결제완료자) 현황을 확인할 수 있습니다.</h5>
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
                        <select class="form-control mr-10" id="search_md_cate_code" name="search_md_cate_code">
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
                        @if(sess_data('is_prof') == 'N')
                            <select class="form-control mr-10" id="search_prof_idx" name="search_prof_idx">
                                <option value="">교수</option>
                                @foreach($arr_professor as $row)
                                    <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">제공정보</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_lectype_ccd" name="search_lectype_ccd">
                            <option value="">강좌유형</option>
                            @foreach($LecType_ccd as $key=>$val)
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
                        <select class="form-control" id="search_multiple" name="search_multiple">
                            <option value="">배수여부</option>
                            @foreach($Multiple_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select class="form-control" id="search_sales_ccd" name="search_sales_ccd">
                            <option value="">판매여부</option>
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
                            <option value="lec">강좌명</option>
                            <option value="wlec">마스터강의명</option>
                        </select>
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
                    </div>
                    <div class="col-md-5">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
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
                    <th>No.</th>
                    <th>기본정보</th>
                    <th>강좌유형</th>
                    <th>과정</th>
                    <th>과목</th>
                    <th>교수</th>
                    <th>강좌명</th>
                    <th>진행상태</th>
                    <th>판매가</th>
                    <th>판매여부</th>
                    <th>사용여부</th>
                    <th>수강생현황</th>
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
                    'url' : '{{ site_url('/student/'.$lecType.'/listAjax/') }}'
                    ,'type' : 'post'
                    ,'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }}, // 번호
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.SiteName+'<BR>'+(row.CateName_Parent == null ? '' : row.CateName_Parent+'<BR>')+(row.CateName)+'<BR>'+row.SchoolYear;
                        }}, //기본정보
                    {'data' : 'FreeLecTypeCcd_Name'},//강좌유형
                    {'data' : 'CourseName'},//과정명
                    {'data' : 'SubjectName'},//과목명
                    {'data' : 'wProfName_String'}, // 교수
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '['+row.ProdCode+ '] <a href="javascript:;" class="btn-view" data-prodcode="' + row.ProdCode + '"><u>' + row.ProdName + '</u></a> ';
                        }},//단강좌명

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.wProgressCcd_Name+'<BR>('+row.wUnitCnt+'/'+row.wUnitLectureCnt+')';
                        }},//진행상태

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                        }}, //판매가
                    {'data' : 'SaleStatusCcd_Name', 'render' : function(data, type, row, meta) {
                            return (data !== '판매불가') ? data : '<span class="red">'+data+'</span>';
                        }},//판매여부
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},//사용여부
                    {'data' : 'Count', 'render' : function(data, type, row, meta) {
                            return data + '명';
                        }}
                ]
            });

            // 과정, 과목, 교수 자동 변경
            $search_form.find('select[name="search_lg_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_lg_cate_code");
            $search_form.find('select[name="search_course_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_subject_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_prof_idx"]').chained("#search_site_code");

            $list_table.on('click', '.btn-view', function() {
                location.href = '{{ site_url('/student/'.$lecType.'/view') }}/' + $(this).data('prodcode') + dtParamsToQueryString($datatable);
            });

        });
    </script>
@stop
