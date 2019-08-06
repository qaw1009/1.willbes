@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 {{ $calc_name }} 강사료 정산 정보를 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                @if($calc_type == 'mockTest')
                    {{-- 모의고사 --}}
                    <input type="hidden" name="prod_type" value="{{ $prod_type }}"/>
                @else
                    <div class="form-group">
                        <label class="control-label col-md-1">상품구분</label>
                        <div class="col-md-11 form-inline">
                            <div class="radio">
                            @if($calc_type == 'lecture')
                                <input type="radio" id="prod_type_1" name="prod_type" class="flat" value="LE" @if($prod_type == 'LE') checked="checked" @endif/> <label for="prod_type_1" class="input-label">단강좌&사용자/운영자패키지(일반형)</label>
                                <input type="radio" id="prod_type_2" name="prod_type" class="flat" value="AC" @if($prod_type == 'AC') checked="checked" @endif/> <label for="prod_type_2" class="input-label">운영자패키지(선택형)</label>
                                <input type="radio" id="prod_type_3" name="prod_type" class="flat" value="PP" @if($prod_type == 'PP') checked="checked" @endif/> <label for="prod_type_3" class="input-label">기간제패키지</label>
                            @else
                                <input type="radio" id="prod_type_1" name="prod_type" class="flat" value="OL" @if($prod_type == 'OL') checked="checked" @endif/> <label for="prod_type_1" class="input-label">단과반/종합반(일반형)</label>
                                <input type="radio" id="prod_type_2" name="prod_type" class="flat" value="OP" @if($prod_type == 'OP') checked="checked" @endif/> <label for="prod_type_2" class="input-label">종합반(선택형)</label>
                            @endif
                            </div>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label class="control-label col-md-1">교수검색</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-10" id="search_prof_idx" name="search_prof_idx">
                            <option value="">교수선택</option>
                            @foreach($arr_professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">결제일(환불일)</label>
                    <div class="col-md-11 form-inline">
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
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-mon">전월</button>
                        </div>
                        <div class="inline-block ml-30">
                            <span class="required">*</span> 검색한 날짜에 포함된 결제완료, 환불완료 매출 기준으로 정산 산출
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
            <table id="list_ajax_table" class="table table-bordered">
                <thead class="bg-odd">
                <tr>
                    <th rowspan="2" class="valign-middle">No</th>
                    <th rowspan="2" class="valign-middle">교수명</th>
                @if($prod_type == 'PP')
                    {{-- 기간제패키지 --}}
                    <th rowspan="2" class="valign-middle">매출금액(C)<br/>*기여도 적용</th>
                    <th rowspan="2" class="valign-middle">환불금액(D)<br/>*기여도 적용</th>
                    <th rowspan="2" class="valign-middle">결제수수료(E)<br/>*기여도 적용</th>
                    <th rowspan="2" class="valign-middle">수강개월수(F1)</th>
                    <th rowspan="2" class="valign-middle">월안분금액(F)<br/>(C-D-E)/F1</th>
                    <th rowspan="2" class="valign-middle">당월정산금액(H)<br/>F*정산율</th>
                @else
                    <th rowspan="2" class="valign-middle">매출금액(C)<br/>*안분율 적용</th>
                    <th rowspan="2" class="valign-middle">환불금액(D)<br/>*안분율 적용</th>
                    <th rowspan="2" class="valign-middle">결제수수료(E)<br/>*안분율 적용</th>
                    <th rowspan="2" class="valign-middle">정산금액(H)<br/>(C-D-E)*정산율</th>
                @endif
                    <th colspan="2">세액공제</th>
                    <th rowspan="2" class="valign-middle blue">지급액<br/>H-(I+J)</th>
                    <th rowspan="2" class="valign-middle">상세정보</th>
                </tr>
                <tr>
                    <th>소득세(I)<br/>H*0.03</th>
                    <th class="bdr-line">주민세(J)<br/>I*0.1</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr class="bg-odd">
                    <th colspan="2" class="text-center">합계</th>
                    <th id="sumC" class="sumTh"></th>
                    <th id="sumD" class="sumTh"></th>
                    <th id="sumE" class="sumTh"></th>
                @if($prod_type == 'PP')
                    {{-- 기간제패키지 --}}
                    <th></th>
                    <th id="sumF" class="sumTh"></th>
                @endif
                    <th id="sumH" class="sumTh"></th>
                    <th id="sumI" class="sumTh"></th>
                    <th id="sumJ" class="sumTh"></th>
                    <th id="sumFinal" class="blue sumTh"></th>
                    <td><button name="btn_view" class="btn btn-xs btn-success mb-0 ml-5 btn-view" data-prof-idx="" data-subject-idx="" data-study-period="">상세보기</button></td>
                </tr>
                </tfoot>
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

            // 교수 자동 변경
            $search_form.find('select[name="search_prof_idx"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/business/calc/' . $calc_type . '/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.wProfName + ' (' + row.SubjectName + ')';
                    }},
                    {'data' : 'tDivisionPayPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'tDivisionRefundPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'tDivisionPgFeePrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                @if($prod_type == 'PP')
                    {{-- 기간제패키지 --}}
                    {'data' : 'StudyPeriodMonth', 'render' : function(data, type, row, meta) {
                        return data + '개월';
                    }},
                    {'data' : 'tDivisionMonthPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                @endif
                    {'data' : 'tDivisionCalcPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'tDivisionIncomeTax', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'tDivisionResidentTax', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'tFinalCalcPrice', 'render' : function(data, type, row, meta) {
                        return '<a class="blue bold">' + decimalFormat(data, 0) + '</a>';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        var study_period = (typeof row.StudyPeriodMonth !== 'undefined') ? row.StudyPeriodMonth : '';
                        var btn_html = '<button name="btn_view" class="btn btn-xs btn-success mb-0 ml-5 btn-view" data-prof-idx="' + row.ProfIdx + '" data-subject-idx="' + row.SubjectIdx + '" data-study-period="' + study_period + '">상세보기</button>';

                        @if(in_array($prod_type, ['LE', 'AC', 'MT']) === true)
                            {{-- 단강좌, 사용자/운영자패키지, 모의고사일 경우 정산엑셀다운로드 버튼 노출 --}}
                            btn_html += '<button name="btn_calc_excel" id="btn_calc_excel_' + meta.row + '" class="btn btn-xs btn-' + (row.IsCalcDown === 'Y' ? 'danger' : 'primary') + ' mb-0 ml-5 btn-calc-excel" data-prof-idx="' + row.ProfIdx + '" data-subject-idx="' + row.SubjectIdx + '" data-study-period="' + study_period + '">정산엑셀다운로드</button>';
                        @endif

                        return btn_html;
                    }}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                if (json.sum_data !== null) {
                    $('#sumC').html(decimalFormat(json.sum_data.tDivisionPayPrice, 8));
                    $('#sumD').html(decimalFormat(json.sum_data.tDivisionRefundPrice, 8));
                    $('#sumE').html(decimalFormat(json.sum_data.tDivisionPgFeePrice, 8));
                    $('#sumH').html(decimalFormat(json.sum_data.tDivisionCalcPrice, 8));
                    $('#sumI').html(decimalFormat(json.sum_data.tDivisionIncomeTax, 8));
                    $('#sumJ').html(decimalFormat(json.sum_data.tDivisionResidentTax, 8));
                    $('#sumFinal').html(decimalFormat(json.sum_data.tFinalCalcPrice, 0));
                    @if($prod_type == 'PP')
                        {{-- 기간제패키지 --}}
                        $('#sumF').html(decimalFormat(json.sum_data.tDivisionMonthPrice, 8));
                    @endif
                } else {
                    $('#list_ajax_table tfoot tr th.sumTh').html('0');
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/calc/' . $calc_type . '/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 정산엑셀다운로드 버튼 클릭
            $list_table.on('click', '.btn-calc-excel', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    // 교수검색 조건 초기화
                    $search_form.find('select[name="search_prof_idx"]').val('');

                    var arr_param = $search_form.serializeArray();
                    arr_param.push({ 'name' : 'prof_idx', 'value' : $(this).data('prof-idx') });
                    arr_param.push({ 'name' : 'subject_idx', 'value' : $(this).data('subject-idx') });
                    arr_param.push({ 'name' : 'study_period', 'value' : $(this).data('study-period') });

                    formCreateSubmit('{{ site_url('/business/calc/' . $calc_type . '/calcExcel') }}', arr_param, 'POST');

                    // 정산엑셀다운로드 이후 다운로드여부 표기를 위해 버튼 클래스 변경
                    $('#' + $(this).prop('id')).removeClass('btn-primary').addClass('btn-danger').blur();
                }
            });

            // 상세보기 버튼 클릭
            $list_table.on('click', '.btn-view', function() {
                var show_uri = '';
                if ($(this).data('prof-idx') !== '' && $(this).data('subject-idx') !== '') {
                    show_uri = '/' + $(this).data('prof-idx')  + '/' + $(this).data('subject-idx');
                }

                {{-- 기간제패키지 --}}
                if ($search_form.find('input[name="prod_type"]:checked').val() === 'PP' && $(this).data('study-period') !== '') {
                    show_uri += '/' + $(this).data('study-period');
                }

                location.href = '{{ site_url('/business/calc/' . $calc_type . '/show') }}' + show_uri + dtParamsToQueryString($datatable);
            });

            // 상품구분 라디오 버튼 클릭
            $search_form.on('ifClicked', 'input[name="prod_type"]', function() {
                location.replace('{{ site_url('/business/calc/' . $calc_type . '/index') }}?prod_type=' + $(this).val());
            });
        });
    </script>
@stop
