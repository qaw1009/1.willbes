@extends('lcms.layouts.master')

@section('content')
    <h5>- 종합반 수강생(결제완료자) 현황을 확인할 수 있습니다.(종합반에 포함된 단과반 수강생 현황도 확인 가능)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강좌기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_campus_code" name="search_campus_code" title="캠퍼스">
                            <option value="">캠퍼스</option>
                            @foreach($campusList as $row)
                                <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" >{{$row['CampusName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_lg_cate_code" name="search_lg_cate_code" title="대분류">
                            <option value="">대분류</option>
                            @foreach($arr_lg_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_md_cate_code" name="search_md_cate_code" title="중분류">
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
                        <select class="form-control selectpicker" id="search_course_idx" name="search_course_idx" title="과정" data-size="10" data-live-search="true">
                            <option value="">과정</option>
                            @foreach($arr_course as $row)
                                <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CourseName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control selectpicker" id="search_subject_idx" name="search_subject_idx" title="과목" data-size="10" data-live-search="true">
                            <option value="">과목</option>
                            @foreach($arr_subject as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>
                        @if(sess_data('is_prof') == 'N')
                            <select class="form-control selectpicker" id="search_prof_idx" name="search_prof_idx" title="교수" data-size="10" data-live-search="true">
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
                        <select class="form-control" id="search_studypattern_ccd" name="search_studypattern_ccd" title="수강형태">
                            <option value="">수강형태</option>
                            @foreach($studypattern_ccd as $key => $val)
                                @if($key != '653003')
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endif
                            @endforeach
                        </select>
                        <select class="form-control" id="search_studyapply_ccd" name="search_studyapply_ccd" title="수강신청구분">
                            <option value="">수강신청구분</option>
                            @foreach($studyapply_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select name="search_schoolstartyear" id="search_schoolstartyear"  class="form-control" title="개강년도">
                            <option value="">개강년도</option>
                            @for($i=(date('Y')+1); $i>=2014; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>&nbsp;
                        <select name="search_schoolstartmonth" id="search_schoolstartmonth"  class="form-control" title="개강월">
                            <option value="">개강월</option>
                            @for($i=1;$i<=12;$i++)
                                @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                <option value="{{$ii}}">{{$ii}}</option>
                            @endfor
                        </select>
                        <select class="form-control" id="search_islecopen" name="search_islecopen" title="개설여부">
                            <option value="">개설여부</option>
                            <option value="Y">개설</option>
                            <option value="N">폐강</option>
                        </select>
                        <select class="form-control" id="search_sales_ccd" name="search_sales_ccd" title="판매여부">
                            <option value="">판매여부</option>
                            @foreach($Sales_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_is_use" name="search_is_use" title="사용여부">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강좌검색</label>
                    <div class="col-md-3 form-inline">
                        <select class="form-control" id="search_type" name="search_type" title="강좌/교수구분" style="width:120px;">
                            <option value="lec">강의명</option>
                            <option value="prof">강사명</option>
                        </select>
                        <input type="text" class="form-control" id="search_value_list" name="search_value_list" title="강좌/교수검색어" style="width:250px;">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_sdate">날짜검색</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_date_type" name="search_date_type" title="날짜구분" style="width:120px;">
                            <option value="B.StudyStartDate">개강일</option>
                            <option value="B.StudyEndDate">종강일</option>
                            <option value="A.SaleStartDatm">접수시작일</option>
                            <option value="A.SaleEndDatm">접수종료일</option>
                            <option value="A.RegDatm">등록일</option>
                        </select>
                        <input name="search_sdate"  class="form-control datepicker" id="search_sdate" style="width: 100px;"  type="text"  value="" title="조회시작일">
                        ~ <input name="search_edate"  class="form-control datepicker" id="search_edate" style="width: 100px;"  type="text"  value="" title="조회종료일">
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

        <div class="x_panel mt-10">
            <div class="x_content">
                • 수강생현황은 결제상태가 ‘결제완료’인 건수만 카운트됩니다. (환불완료 제외)
                <table id="list_ajax_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th><label><input type="checkbox" id="all_check" class="flat"/> 선택</label></th>
                        <th>No.</th>
                        <th>캠퍼스</th>
                        <th>기본정보</th>
                        <th>수강형태</th>
                        <th>수강신청구분</th>
                        <th>개강 년/월</th>
                        <th>강의명</th>
                        <th>판매가</th>
                        <th>정원</th>
                        <th>개설여부</th>
                        <th>접수기간</th>
                        <th>접수상태</th>
                        <th>사용여부</th>
                        <th>수강생현황</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-database mr-5"></i> 선택강좌 수강생 보기', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-list' },
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 선택강좌 수강생 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/student/'.$lecType.'/listAjax/') }}'
                    ,'type' : 'post'
                    ,'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                }
                ,
                columns: [
                    {'data' : null, 'render' : function(date, type, row,meta){
                            return '<input type="checkbox" id="ProdCode" name="ProdCode[]" value="'+row.ProdCode+'" class="ProdCode flat" />';
                        }}, // 선택
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }}, // 번호
                    {'data' : 'CampusCcd_Name' }, // 캠퍼스
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.SiteName+'<BR>'+(row.CateName_Parent == null ? '' : row.CateName_Parent+'<BR>')+(row.CateName)+'<BR>'+row.SchoolYear;
                        }}, //기본정보
                    {'data' : 'StudyPatternCcd_Name' },// 수강형태
                    {'data' : 'StudyApplyCcd_Name' },// 수강신청구분
                    {'data' : null, 'render' : function (data, type, row,meta){
                            return row.SchoolStartYear + '년 ' + row.SchoolStartMonth + '월';
                        } },// 개강 년/월
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '['+row.ProdCode+ '] <a href="javascript:;" class="btn-view" data-prodcode="' + row.ProdCode + '"><u>' + row.ProdName + '</u></a> ';
                        }},//단강좌명
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                        }}, //판매가
                    {'data' : 'FixNumber', 'render' : function(data, type, row, meta){
                            return data + '명';
                        } },//정원
                    {'data' : 'IsLecOpen', 'render' : function(data, type, row, meta){
                            return (data == 'Y') ? '개설' : '폐강';
                        } },// 개설여부
                    {'data' : null, 'render' : function(data, type, row, meta){
                            return row.SaleStartDatm + ' ' + row.SaleStartHour + '시 ~ ' + row.SaleEndDatm + ' ' + row.SaleEndHour + '시';
                        } },// 접수기간
                    {'data' : 'AcceptStatusCcd_Name' },// 접수상태
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},//사용여부
                    {'data' : 'Count', 'render' : function(data, type, row, meta) {
                            return data + '명';
                        }}
                ]

            });

            // 과정, 과목, 교수 자동 변경
            $search_form.find('select[name="search_campus_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_lg_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_lg_cate_code");
            $search_form.find('select[name="search_course_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_subject_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_prof_idx"]').chained("#search_site_code");

            $list_table.on('click', '.btn-view', function() {
                location.href = '{{ site_url('/student/'.$lecType.'/view') }}/' + $(this).data('prodcode') + dtParamsToQueryString($datatable);
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                if($(".ProdCode:checked").length < 1){
                    alert("출력할 강좌를 선택해주십시요.");
                    return;
                }

                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/student/'.$lecType.'/excel/') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 수강생보기
            $('.btn-list').on('click', function(event) {
                if($(".ProdCode:checked").length < 1){
                    alert("강좌를 선택해주십시요.");
                    return;
                }

                $data = $("#search_form").formSerialize();

                $('.btn-list').setLayer({
                    url : "{{ site_url('/student/offpkg/viewLayer/') }}?"+$data,
                    width : 1700
                });

            });

            $list_table.on('ifChanged', '#all_check', function(event) {
                iCheckAll($list_table.find('.ProdCode'), $(this));
            });
        });
    </script>
@stop
