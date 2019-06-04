@extends('lcms.layouts.master')

@section('content')
    <h5>- 사이트 기준 {{ $stats_name }}별 매출현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">상품기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        @if(in_array('cate_code', $search_column) === true)
                            <select class="form-control mr-10" id="search_cate_code" name="search_cate_code">
                                <option value="">대분류</option>
                                @foreach($arr_category as $row)
                                    <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('campus_ccd', $search_column) === true)
                            <select class="form-control mr-10" id="search_campus_ccd" name="search_campus_ccd">
                                <option value="">캠퍼스</option>
                                @foreach($arr_campus as $row)
                                    <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" >{{$row['CampusName']}}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('school_year', $search_column) === true)
                            <select class="form-control mr-10" id="search_school_year" name="search_school_year">
                                <option value="">대비학년도</option>
                                @for($i = (date('Y')+1); $i >= 2005; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        @endif
                        @if(in_array('lec_type_ccd', $search_column) === true)
                            <select class="form-control mr-10" id="search_lec_type_ccd" name="search_lec_type_ccd">
                                <option value="">강좌유형</option>
                                @foreach($arr_lec_type_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('study_pattern_ccd', $search_column) === true)
                            <select class="form-control mr-10" id="search_study_pattern_ccd" name="search_study_pattern_ccd">
                                <option value="">수강형태</option>
                                @foreach($arr_study_pattern_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('course_idx', $search_column) === true)
                            <select class="form-control mr-10" id="search_course_idx" name="search_course_idx">
                                <option value="">과정</option>
                                @foreach($arr_course as $row)
                                    <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CourseName'] }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('subject_idx', $search_column) === true)
                            <select class="form-control mr-10" id="search_subject_idx" name="search_subject_idx">
                                <option value="">과목</option>
                                @foreach($arr_subject as $row)
                                    <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('prof_idx', $search_column) === true)
                            <select class="form-control mr-10" id="search_prof_idx" name="search_prof_idx">
                                <option value="">교수</option>
                                @foreach($arr_professor as $row)
                                    <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('pack_type_ccd', $search_column) === true)
                            <select class="form-control mr-10" id="search_pack_type_ccd" name="search_pack_type_ccd">
                                <option value="">패키지유형</option>
                                @foreach($arr_pack_type_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('pack_period_ccd', $search_column) === true)
                            <select class="form-control mr-10" id="search_pack_period_ccd" name="search_pack_period_ccd">
                                <option value="">수강기간</option>
                                @foreach($arr_pack_period_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('publ_idx', $search_column) === true)
                            <select class="form-control mr-10" id="search_publ_idx" name="search_publ_idx">
                                <option value="">출판사</option>
                                @foreach($arr_publisher as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('author_idx', $search_column) === true)
                            <select class="form-control mr-10" id="search_author_idx" name="search_author_idx">
                                <option value="">저자</option>
                                @foreach($arr_author as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_value">상품검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">결제일/환불일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
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
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
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
        <div class="x_title text-right">
            <h5><span class="required">*</span> 매출현황이 높은 {{ $stats_name }}순으로 노출됩니다. (검색한 기간 안에 1원 이상 매출이 발생한 {{ $stats_name }}만 노출)</h5>
        </div>
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th>No</th>
                    <th>대분류</th>
                    <th>{{ $stats_name }}명</th>
                @if($stats_type == 'lecture')
                    {{-- 단강좌 --}}
                    <th>대비학년도</th>
                    <th>강좌유형</th>
                    <th>과정</th>
                    <th>과목</th>
                    <th>교수</th>
                    <th>진행상태</th>
                @elseif($stats_type == 'packageUser')
                    {{-- 사용자패키지 --}}
                    <th>대비학년도</th>
                @elseif($stats_type == 'packageAdmin')
                    {{-- 운영자패키지 --}}
                    <th>대비학년도</th>
                    <th>패키지유형</th>
                @elseif($stats_type == 'packagePeriod')
                    {{-- 기간제패키지 --}}
                    <th>대비학년도</th>
                    <th>패키지유형</th>
                    <th>수강기간</th>
                @elseif($stats_type == 'offLecture')
                    {{-- 단과반 --}}
                    <th>캠퍼스</th>
                    <th>대비학년도</th>
                    <th>수강형태</th>
                    <th>개강년월</th>
                    <th>개강일</th>
                    <th>종강일</th>
                    <th>과정</th>
                    <th>과목</th>
                    <th>교수</th>
                @elseif($stats_type == 'offPackageAdmin')
                    {{-- 종합반 --}}
                    <th>캠퍼스</th>
                    <th>대비학년도</th>
                    <th>수강형태</th>
                    <th>개강년월</th>
                    <th>개강일</th>
                    <th>종강일</th>
                @elseif($stats_type == 'book')
                    {{-- 교재 --}}
                    <th>과목/교수</th>
                    <th>출판사</th>
                    <th>저자</th>
                @endif
                @if($stats_type != 'packageUser')
                    {{-- 사용자패키지일 경우 판매가 없음 --}}
                    <th>판매가</th>
                @endif
                @if(starts_with($stats_type, 'off') === false)
                    {{-- 학원강좌가 아닐 경우 판매상태, 학원강좌일 경우 개설여부, 접수상태 --}}
                    <th>판매상태</th>
                @else
                    <th>개설여부</th>
                    <th>접수상태</th>
                @endif
                    <th>매출현황</th>
                </tr>
                <tr>
                    <td colspan="20" class="bg-odd text-center">
                        <h4 class="inline-block no-margin">
                            <span id="search_period" class="pr-5"></span>
                            <span class="blue"><span id="sum_pay_price">0</span></span>
                            - <span class="red"><span id="sum_refund_price">0</span></span>
                            = <span id="sum_total_price">0</span>원
                        </h4>
                    </td>
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
            // 날짜검색 디폴트 셋팅
            if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
            }

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/sales/' . $stats_type . '/listAjax') }}',
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
                    {'data' : 'LgCateName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '[' + row.ProdCode + '] ' + data;
                    }},
                @if($stats_type == 'lecture')
                    {{-- 단강좌 --}}
                    {'data' : 'SchoolYear'},
                    {'data' : 'LecTypeCcdName'},
                    {'data' : 'CourseName'},
                    {'data' : 'SubjectName'},
                    {'data' : 'wProfName_String'},
                    {'data' : 'wProgressCcd_Name', 'render' : function(data, type, row, meta) {
                        return data + ' (' + row.wUnitCnt +  '/' + row.wUnitLectureCnt + ')';
                    }},
                @elseif($stats_type == 'packageUser')
                    {{-- 사용자패키지 --}}
                    {'data' : 'SchoolYear'},
                @elseif($stats_type == 'packageAdmin')
                    {{-- 운영자패키지 --}}
                    {'data' : 'SchoolYear'},
                    {'data' : 'PackTypeCcdName'},
                @elseif($stats_type == 'packagePeriod')
                    {{-- 기간제패키지 --}}
                    {'data' : 'SchoolYear'},
                    {'data' : 'PackTypeCcdName'},
                    {'data' : 'PackPeriodCcdName'},
                @elseif($stats_type == 'offLecture')
                    {{-- 단과반 --}}
                    {'data' : 'CampusCcdName'},
                    {'data' : 'SchoolYear'},
                    {'data' : 'StudyPatternCcdName'},
                    {'data' : 'SchoolStartYear', 'render' : function(data, type, row, meta) {
                        return data + '/' + row.SchoolStartMonth;
                    }},
                    {'data' : 'StudyStartDate'},
                    {'data' : 'StudyEndDate'},
                    {'data' : 'CourseName'},
                    {'data' : 'SubjectName'},
                    {'data' : 'wProfName_String'},
                @elseif($stats_type == 'offPackageAdmin')
                    {{-- 종합반 --}}
                    {'data' : 'CampusCcdName'},
                    {'data' : 'SchoolYear'},
                    {'data' : 'StudyPatternCcdName'},
                    {'data' : 'SchoolStartYear', 'render' : function(data, type, row, meta) {
                        return data + '/' + row.SchoolStartMonth;
                    }},
                    {'data' : 'StudyPeriod', 'render' : function(data, type, row, meta) {
                        return data.substr(0, 10);
                    }},
                    {'data' : 'StudyPeriod', 'render' : function(data, type, row, meta) {
                        return data.substr(11, 10);
                    }},
                @elseif($stats_type == 'book')
                    {{-- 교재 --}}
                    {'data' : 'ProfSubjectNames', 'render' : function(data, type, row, meta) {
                        return data.replace(/,/g, '<br/>');
                    }},
                    {'data' : 'wPublName'},
                    {'data' : 'wAuthorNames'},
                @endif
                @if($stats_type != 'packageUser')
                    {{-- 사용자패키지일 경우 판매가 없음 --}}
                    {'data' : 'RealSalePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data) + '원<br/><s>' + addComma(row.SalePrice) + '원</s>';
                    }},
                @endif
                @if(starts_with($stats_type, 'off') === false)
                    {{-- 학원강좌가 아닐 경우 판매상태, 학원강좌일 경우 개설여부, 접수상태 --}}
                    {'data' : 'SaleStatusCcdName'},
                @else
                    {'data' : 'IsLecOpen', 'render' : function(data, type, row, meta) {
                        return data === 'Y' ? '개설' : '폐강';
                    }},
                    {'data' : 'AcceptStatusCcdName'},
                @endif
                    {'data' : 'tRemainPrice', 'render' : function(data, type, row, meta) {
                        return '<a class="blue cs-pointer btn-view" data-idx="' + row.ProdCode + '"><u>' + addComma(data) + '원</u><br/>(' + addComma(row.tOrderProdCnt) + '건)</a>';
                    }}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                $('#search_period').html('[' + $search_form.find('input[name="search_start_date"]').val() + ' ~ ' + $search_form.find('input[name="search_end_date"]').val() + ']');

                if (json.sum_data !== null) {
                    $('#sum_pay_price').html(addComma(json.sum_data.tRealPayPrice) + ' (' + addComma(json.sum_data.tRealPayCnt) + '건)');
                    $('#sum_refund_price').html(addComma(json.sum_data.tRefundPrice) + ' (' + addComma(json.sum_data.tRefundCnt) + '건)');
                    $('#sum_total_price').html(addComma(json.sum_data.tRemainPrice));
                } else {
                    $('#sum_pay_price').html('0');
                    $('#sum_refund_price').html('0');
                    $('#sum_total_price').html('0');
                }
            });

            // 카테고리, 과정, 과목, 교수 자동 변경
            $search_form.find('select[name="search_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");
            $search_form.find('select[name="search_course_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_subject_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_prof_idx"]').chained("#search_site_code");

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/sales/' . $stats_type . '/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 매출현황 금액 클릭
            $list_table.on('click', '.btn-view', function() {
                var site_code = $search_form.find('select[name="search_site_code"]').val();
                var start_date = $search_form.find('input[name="search_start_date"]').val();
                var end_date = $search_form.find('input[name="search_end_date"]').val();

                // uri 셋팅
                var show_uri = '/' + $(this).data('idx') + '/' + site_code + '/' + start_date + '/' + end_date;

                location.href = '{{ site_url('/sales/' . $stats_type . '/show') }}' + show_uri + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
