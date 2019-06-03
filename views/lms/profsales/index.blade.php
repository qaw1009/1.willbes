@extends('lcms.layouts.master')

@section('content')
    <h5 class="mb-0">- {{ $is_off_site == 'Y' ? '학원' : '온라인' }} {{ $sales_name }} 매출현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-xs-12">
                <div class="pull-left">
                    {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
                </div>
                <div id="wrap_prev_sales_view" class="pull-left ml-15 mt-15 hide">
                    <a href="#none" id="btn_prev_sales_view" class="btn btn-dark mb-0" target="_blank">~ {{ $limit_start_date }} 이전 매출보기</a>
                    [안내사항] 리뉴얼 전({{ $limit_start_date }} 이전) 매출은 직전 <span id="txt_prev_sales_view"></span>에서 확인해 주시기 바랍니다.
                </div>
            </div>
        </div>
        <div class="x_panel clear">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">강좌기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        @if(in_array('campus_ccd', $search_column) === true)
                            <select class="form-control mr-10" id="search_campus_ccd" name="search_campus_ccd">
                                <option value="">캠퍼스</option>
                                @foreach($arr_campus as $row)
                                    <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" >{{$row['CampusName']}}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(in_array('cate_code', $search_column) === true)
                            <select class="form-control mr-10" id="search_cate_code" name="search_cate_code">
                                <option value="">대분류</option>
                                @foreach($arr_category as $row)
                                    <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
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
                        @if(in_array('prof_idx', $search_column) === true && $is_tzone === false)
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
                    <label class="control-label col-md-1">{{ $is_off_site == 'Y' ? '날짜' : '결제일/환불일' }}</label>
                    <div class="col-md-11 form-inline">
                        @if($is_off_site == 'Y')
                            <select class="form-control mr-10" id="search_study_date_type" name="search_study_date_type">
                                <option value="StudyStartDate">개강일</option>
                                <option value="StudyEndDate">종강일</option>
                            </select>
                        @endif
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off">
                        </div>
                        @if($is_off_site == 'N')
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_value">{{ $sales_name }}명</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
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
            <h5><span class="required">*</span> {{ $is_package === false ? '매출' : '수강생' }}현황이 높은 {{ $sales_name }}순으로 노출됩니다. (검색한 기간 안에 매출이 발생한 {{ $sales_name }}만 노출)</h5>
        </div>
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th>No</th>
                @if($is_off_site == 'Y')
                    <th>캠퍼스</th>
                @endif
                    <th>대분류</th>
                    <th>{{ $sales_name }}명</th>
                @if($sales_type == 'offLecture')
                    {{-- 단과반 --}}
                    <th>과정</th>
                    <th>과목</th>
                    <th>교수</th>
                    <th>개강일</th>
                    <th>종강일</th>
                @elseif($sales_type == 'offPackage')
                    {{-- 종합반 --}}
                    <th>교수</th>
                    <th>최초개강일</th>
                    <th>최종종강일</th>
                @elseif($sales_type == 'lecture')
                    {{-- 단강좌 --}}
                    <th>과정</th>
                    <th>과목</th>
                    <th>교수</th>
                    <th>수강기간</th>
                @else
                    {{-- 패키지/기간제패키지 --}}
                    <th>패키지유형</th>
                    <th>교수</th>
                    <th>수강기간</th>
                @endif
                    <th>수강료</th>
                    <th>결제건수</th>
                    <th>환불건수</th>
                @if($is_package === false)
                    <th style="width: 140px;">매출현황<br/>(결제금액-환불금액)</th>
                @else
                    <th>전체건수</th>
                @endif
                </tr>
                <tr id="sumTotal" class="hide">
                    <td colspan="13" class="bg-odd text-center">
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

            // 카테고리, 캠퍼스, 과정, 과목, 교수 자동 변경
            $search_form.find('select[name="search_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");
            $search_form.find('select[name="search_course_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_subject_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_prof_idx"]').chained("#search_site_code");

            @if($is_tzone === true)
                // 이전 매출보기 셋팅
                $search_form.on('change', '#search_site_code', function() {
                    var tab_txt = $(this).find('option:selected').text();
                    if (tab_txt.indexOf('경찰') > -1 || tab_txt.indexOf('공무원') > -1) {
                        $('#wrap_prev_sales_view').removeClass('hide');

                        if (tab_txt.indexOf('경찰') > -1) {
                            $('#txt_prev_sales_view').html('T존 관리자');
                            $('#btn_prev_sales_view').prop('href', 'http://c3.willbescop.net/TZON/login.html');
                        } else {
                            $('#txt_prev_sales_view').html('강사 마이페이지');
                            $('#btn_prev_sales_view').prop('href', 'http://w1.willbesgosi.net/main/index.html');
                        }
                    }
                });
                $search_form.find('select[name="search_site_code"]').trigger('change');
            @endif

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/profsales/' . $sales_type . '/listAjax') }}',
                    'type' : 'POST',
                @if($is_tzone === true && $is_off_site == 'N')
                    {{-- tzone > 온라인강좌일 경우 통합 이후 주문내역만 조회 가능 --}}
                    'beforeSend' : function() {
                        var limit_start_date = '{{ $limit_start_date }}';
                        var search_start_date = $search_form.find('input[name="search_start_date"]').val();

                        if (search_start_date < limit_start_date) {
                            alert(limit_start_date + ' 이전 매출은 위 `' + limit_start_date + ' 이전 매출보기`에서 확인해 주세요.');
                            setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
                            $('.dataTables_processing').css('display', 'none');
                            return false;
                        }
                    },
                @endif
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                @if($is_off_site == 'Y')
                    {'data' : 'CampusCcdName'},
                @endif
                    {'data' : 'LgCateName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '[' + row.ProdCode + '] ' + data;
                    }},
                @if($sales_type == 'offLecture')
                    {{-- 단과반 --}}
                    {'data' : 'CourseName'},
                    {'data' : 'SubjectName'},
                    {'data' : 'wProfName'},
                    {'data' : 'StudyStartDate'},
                    {'data' : 'StudyEndDate'},
                @elseif($sales_type == 'offPackage')
                    {{-- 종합반 --}}
                    {'data' : 'wProfName'},
                    {'data' : 'StudyStartDate'},
                    {'data' : 'StudyEndDate'},
                @elseif($sales_type == 'lecture')
                    {{-- 단강좌 --}}
                    {'data' : 'CourseName'},
                    {'data' : 'SubjectName'},
                    {'data' : 'wProfName'},
                    {'data' : 'StudyPeriod'},
                @else
                    {{-- 패키지/기간제패키지 --}}
                    {'data' : 'PackTypeCcdName'},
                    {'data' : 'wProfName'},
                    {'data' : 'StudyPeriod'},
                @endif
                    {'data' : 'RealSalePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data) + '원<br/><s>' + addComma(row.SalePrice) + '원</s>';
                    }},
                    {'data' : 'tRealPayCnt', 'render' : function(data, type, row, meta) {
                        return '<a class="cs-pointer btn-view" data-prof-idx="' + row.ProfIdx + '" data-prod-code="' + row.ProdCode + '" data-pay-status="paid"><u>' + addComma(data) + '건</u></a>';
                    }},
                    {'data' : 'tRefundCnt', 'render' : function(data, type, row, meta) {
                        return '<a class="red cs-pointer btn-view" data-prof-idx="' + row.ProfIdx + '" data-prod-code="' + row.ProdCode + '" data-pay-status="refund"><u>' + addComma(data) + '건</u></a>';
                    }}
                @if($is_package === false)
                    , {'data' : 'tRemainPrice', 'render' : function(data, type, row, meta) {
                        return '<a class="blue cs-pointer btn-view" data-prof-idx="' + row.ProfIdx + '" data-prod-code="' + row.ProdCode + '" data-pay-status="all"><u>' + addComma(data) + '원</u></a>';
                    }}
                @else
                    , {'data' : 'tOrderProdCnt', 'render' : function(data, type, row, meta) {
                        return '<a class="blue cs-pointer btn-view" data-prof-idx="' + row.ProfIdx + '" data-prod-code="' + row.ProdCode + '" data-pay-status="all"><u>' + addComma(data) + '건</u></a>';
                    }}
                @endif
                ]
            });

            @if($is_package === false)
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

                    $('#sumTotal').removeClass('hide');
                });
            @endif

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/profsales/' . $sales_type . '/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 상세보기 버튼 클릭
            $list_table.on('click', '.btn-view', function() {
                var site_code = $search_form.find('select[name="search_site_code"]').val();
                var study_date_type = $search_form.find('select[name="search_study_date_type"]').val();
                var start_date = $search_form.find('input[name="search_start_date"]').val();
                var end_date = $search_form.find('input[name="search_end_date"]').val();
                var prof_idx = $(this).data('prof-idx');
                var prod_code = $(this).data('prod-code');
                var pay_status = $(this).data('pay-status');

                if (prof_idx === '' || prod_code === '' || site_code === '' || start_date === '' || end_date === '') {
                    alert('검색완료 후 선택해 주세요.');
                    return;
                }

                // uri 셋팅
                var show_uri = '/' + site_code + '/' + prof_idx + '/' + prod_code + '/' + pay_status + '/' + start_date + '/' + end_date;
                @if($is_off_site == 'Y')
                    show_uri += '/' + study_date_type;
                @endif
                location.href = '{{ site_url('/profsales/' . $sales_type . '/show') }}' + show_uri + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
