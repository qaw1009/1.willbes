@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 학원강좌 강사료 정산 정보를 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">교수검색</label>
                    <div class="col-md-5 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-10" id="search_prof_idx" name="search_prof_idx">
                            <option value="">교수선택</option>
                            @foreach($arr_professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>
                        <div class="inline-block ml-30">
                            <span class="required">*</span> 교수를 선택해 주세요.
                        </div>
                    </div>
                    <label class="control-label col-md-1">캠퍼스</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control mr-10" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">선택</option>
                            @foreach($arr_campus as $row)
                                <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" >{{$row['CampusName']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">검색일</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control mr-10" id="search_study_date_type" name="search_study_date_type">
                            <option value="StudyStartDate">개강일</option>
                            <option value="StudyEndDate">종강일</option>
                        </select>
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_study_start_date" name="search_study_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_study_end_date" name="search_study_end_date" value="" autocomplete="off">
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
                    <th rowspan="2" class="valign-middle" style="width: 100px;">상품구분</th>
                    <th rowspan="2" class="valign-middle" style="width: 160px;">상품명</th>
                    <th rowspan="2" class="valign-middle">캠퍼스</th>
                    <th rowspan="2" class="valign-middle" style="width: 160px;">단과반명</th>
                    <th rowspan="2" class="valign-middle" style="width: 80px;">개강일</th>
                    <th rowspan="2" class="valign-middle" style="width: 80px;">종강일</th>
                    <th rowspan="2" class="valign-middle">인원</th>
                    <th rowspan="2" class="valign-middle">매출금액(C)<br/>*안분율 적용</th>
                    <th rowspan="2" class="valign-middle">환불금액(D)<br/>*안분율 적용</th>
                    <th rowspan="2" class="valign-middle">결제수수료(E)<br/>*안분율 적용</th>
                    <th rowspan="2" class="valign-middle">순매출(F)<br/>(C-D-E)</th>
                    <th rowspan="2" class="valign-middle">정산금액(H)<br/>F*정산율</th>
                    <th colspan="2">세액공제</th>
                    <th rowspan="2" class="valign-middle blue">지급액<br/>H-(I+J)</th>
                    <th rowspan="2" class="valign-middle" style="width: 70px;">상세정보</th>
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
                    <th colspan="8" class="text-center">합계</th>
                    <th id="sumB" class="sumTh"></th>
                    <th id="sumC" class="sumTh"></th>
                    <th id="sumD" class="sumTh"></th>
                    <th id="sumE" class="sumTh"></th>
                    <th id="sumF" class="sumTh"></th>
                    <th id="sumH" class="sumTh"></th>
                    <th id="sumI" class="sumTh"></th>
                    <th id="sumJ" class="sumTh"></th>
                    <th id="sumFinal" class="blue sumTh"></th>
                    <td><button name="btn_view" class="btn btn-xs btn-success mb-0 ml-5 btn-view" data-prod-code="" data-prod-code-sub="">상세보기</button></td>
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
            if ($search_form.find('input[name="search_study_start_date"]').val().length < 1 || $search_form.find('input[name="search_study_end_date"]').val().length < 1) {
                setDefaultDatepicker(-1, 'mon', 'search_study_start_date', 'search_study_end_date');
            }

            // 교수, 캠퍼스 자동 변경
            $search_form.find('select[name="search_prof_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/business/calc/offLectureSD/listAjax') }}',
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
                    {'data' : 'wProfName'},
                    {'data' : 'LearnPatternCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.PackTypeCcdName !== '' ? '(' + row.PackTypeCcdName + ')' : '');
                    }},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return data !== '' ? '[' + row.ProdCode + '] ' + data : '';
                    }},
                    {'data' : 'CampusCcdName'},
                    {'data' : 'ProdNameSub', 'render' : function(data, type, row, meta) {
                        return '[' + row.ProdCodeSub + '] ' + data;
                    }},
                    {'data' : 'StudyStartDate'},
                    {'data' : 'StudyEndDate'},
                    {'data' : 'tRemainPayCnt', 'render' : function(data, type, row, meta) {
                        return data == null ? '0' : addComma(data);
                    }},
                    {'data' : 'tDivisionPayPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '0' : addComma(data);
                    }},
                    {'data' : 'tDivisionRefundPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '0' : addComma(data);
                    }},
                    {'data' : 'tDivisionPgFeePrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '0' : addComma(data);
                    }},
                    {'data' : 'tDivisionRemainPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '0' : addComma(data);
                    }},
                    {'data' : 'tDivisionCalcPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '0' : addComma(data);
                    }},
                    {'data' : 'tDivisionIncomeTax', 'render' : function(data, type, row, meta) {
                        return data == null ? '0' : addComma(data);
                    }},
                    {'data' : 'tDivisionResidentTax', 'render' : function(data, type, row, meta) {
                        return data == null ? '0' : addComma(data);
                    }},
                    {'data' : 'tFinalCalcPrice', 'render' : function(data, type, row, meta) {
                        return '<a class="blue bold">' + (data == null ? '0' : addComma(data)) + '</a>';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<button name="btn_view" class="btn btn-xs btn-success mb-0 ml-5 btn-view" data-prod-code="' + row.ProdCode + '" data-prod-code-sub="' + row.ProdCodeSub + '">상세보기</button>';
                    }}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                if (json.sum_data !== null) {
                    $('#sumB').html(addComma(json.sum_data.tRemainPayCnt));
                    $('#sumC').html(addComma(json.sum_data.tDivisionPayPrice));
                    $('#sumD').html(addComma(json.sum_data.tDivisionRefundPrice));
                    $('#sumE').html(addComma(json.sum_data.tDivisionPgFeePrice));
                    $('#sumF').html(addComma(json.sum_data.tDivisionRemainPrice));
                    $('#sumH').html(addComma(json.sum_data.tDivisionCalcPrice));
                    $('#sumI').html(addComma(json.sum_data.tDivisionIncomeTax));
                    $('#sumJ').html(addComma(json.sum_data.tDivisionResidentTax));
                    $('#sumFinal').html(addComma(json.sum_data.tFinalCalcPrice));
                } else {
                    $('#list_ajax_table tfoot tr th.sumTh').html('0');
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/calc/offLectureSD/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 상세보기 버튼 클릭
            $list_table.on('click', '.btn-view', function() {
                var site_code = $search_form.find('select[name="search_site_code"]').val();
                var prof_idx = $search_form.find('select[name="search_prof_idx"]').val();
                var study_date_type = $search_form.find('select[name="search_study_date_type"]').val();
                var study_start_date = $search_form.find('input[name="search_study_start_date"]').val();
                var study_end_date = $search_form.find('input[name="search_study_end_date"]').val();
                var prod_code = $(this).data('prod-code');
                var prod_code_sub = $(this).data('prod-code-sub');

                if (prof_idx === '' || study_date_type === '' || study_start_date === '' || study_end_date === '') {
                    alert('검색완료 후 선택해 주세요.');
                    return;
                }

                // uri 셋팅
                var show_uri = '/' + site_code + '/' + prof_idx + '/' + study_date_type + '/' + study_start_date + '/' + study_end_date;
                if (prod_code !== '' && prod_code_sub !== '') {
                    show_uri = show_uri + '/' + prod_code + '/' + prod_code_sub;
                }

                location.href = '{{ site_url('/business/calc/offLectureSD/show') }}' + show_uri + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
