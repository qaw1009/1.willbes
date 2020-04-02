@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 학원강좌(한림전용) 강사료 정산 정보를 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">상품구분</label>
                    <div class="col-md-11 form-inline">
                        <div class="radio">
                            <input type="radio" id="prod_type_1" name="prod_type" class="flat" value="OL" @if($prod_type == 'OL') checked="checked" @endif/> <label for="prod_type_1" class="input-label">단과반/종합반(일반형,선택형)</label>
                            <input type="radio" id="prod_type_2" name="prod_type" class="flat" value="CP" @if($prod_type == 'CP') checked="checked" @endif/> <label for="prod_type_2" class="input-label">종합반(선택형강사배정)</label>
                        </div>
                    </div>
                </div>
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
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="StudyStartDate">개강일</option>
                            <option value="StudyEndDate">종강일</option>
                            <option value="CalcDate">정산일</option>
                        </select>
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
                    </div>
                    <label class="control-label col-md-1">상품검색</label>
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
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered">
                <thead class="bg-odd">
                <tr>
                    <th rowspan="2" class="valign-middle">No</th>
                    <th rowspan="2" class="valign-middle">정산일자</th>
                    <th rowspan="2" class="valign-middle">강사명</th>
                    <th rowspan="2" class="valign-middle">대분류</th>
                    <th rowspan="2" class="valign-middle">캠퍼스</th>
                    <th rowspan="2" class="valign-middle">단과반명</th>
                    <th rowspan="2" class="valign-middle">개강일</th>
                    <th rowspan="2" class="valign-middle">종강일</th>
                    <th rowspan="2" class="valign-middle">횟수</th>
                    @if($prod_type == 'CP')
                        <th rowspan="2" class="valign-middle">수강인원</th>
                    @else
                        <th colspan="3">수강인원</th>
                    @endif
                    <th colspan="9">정산금액(원)</th>
                    <th rowspan="2" class="valign-middle">상세정보</th>
                </tr>
                <tr>
                    @if($prod_type == 'OL')
                        <th class="valign-middle">단과반</th>
                        <th class="valign-middle">종합반</th>
                        <th class="valign-middle">합계</th>
                    @endif
                    <th class="valign-middle">수수료공제전<br/>수강총액</th>
                    <th class="valign-middle">수수료공제후<br/>수강총액</th>
                    <th class="valign-middle">추가<br/>공제액</th>
                    <th class="valign-middle">강사료정산<br/>대상금액</th>
                    <th class="valign-middle">강사료<br/>비율</th>
                    <th class="valign-middle">강사료</th>
                    <th class="valign-middle">원천세</th>
                    <th class="valign-middle">기타추가<br/>공제액</th>
                    <th class="valign-middle bdr-line">강사료<br/>지급액</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr class="bg-odd">
                    <th colspan="9" class="text-center">합계</th>
                    @if($prod_type == 'OL')
                        <th id="t_lec_real_cnt" class="sumTh"></th>
                        <th id="t_pack_real_cnt" class="sumTh"></th>
                    @endif
                    <th id="t_real_cnt" class="sumTh"></th>
                    <th id="t_pre_price" class="sumTh"></th>
                    <th id="t_remain_price" class="sumTh"></th>
                    <th id="t_deduct_price" class="sumTh"></th>
                    <th id="t_target_price" class="sumTh"></th>
                    <th></th>
                    <th id="t_calc_price" class="sumTh"></th>
                    <th id="t_tax_price" class="sumTh"></th>
                    <th id="t_etc_deduct_price" class="sumTh"></th>
                    <th id="t_final_calc_price" class="sumTh"></th>
                    <th></th>
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
                    'url' : '{{ site_url('/business/calc/offLectureHL/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'CalcDate'},
                    {'data' : 'wProfName'},
                    {'data' : 'CateName'},
                    {'data' : 'CampusCcdName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return data !== '' ? '<div style="max-width: 160px; word-break: break-all;">[' + row.ProdCode + '] ' + data + '</div>' : '';
                    }},
                    {'data' : 'StudyStartDate'},
                    {'data' : 'StudyEndDate'},
                    {'data' : 'Amount'},
                @if($prod_type == 'OL')
                    {'data' : 'LecRealCnt', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'PackRealCnt', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                @endif
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return addComma(parseInt(data.LecRealCnt, 10) + parseInt(data.PackRealCnt, 10));
                    }},
                    {'data' : 'PrePrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'RemainPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'DeductPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'TargetPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return (data.LecCalcRate == null || $search_form.find('#prod_type_2:checked').length > 0 ? '' : addComma(data.LecCalcRate) + data.LecCalcRateUnit + ', ')
                            + (data.PackCalcRate == null ? '' : addComma(data.PackCalcRate) + data.PackCalcRateUnit);
                    }},
                    {'data' : 'CalcPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'TaxPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'EtcDeductPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'FinalCalcPrice', 'render' : function(data, type, row, meta) {
                        return '<a class="blue bold">' + (data == null ? '' : addComma(data)) + '</a>';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<button name="btn_view" class="btn btn-xs btn-success mb-0 ml-5 btn-view" data-prof-idx="' + row.ProfIdx + '" data-prod-code="' + row.ProdCode + '" data-prod-type="' + row.ProdType + '" data-pch-idx="' + row.PchIdx + '">상세보기</button>';
                    }}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                var t_lec_real_cnt = 0, t_pack_real_cnt = 0, t_pre_price = 0, t_remain_price = 0, t_deduct_price = 0;
                var t_target_price = 0, t_calc_price = 0, t_tax_price = 0, t_etc_deduct_price = 0, t_final_calc_price = 0;

                if (json.recordsTotal > 0) {
                    $.each(json.data, function(idx, row) {
                        t_lec_real_cnt += parseInt(row.LecRealCnt) || 0;
                        t_pack_real_cnt += parseInt(row.PackRealCnt) || 0;
                        t_pre_price += parseInt(row.PrePrice) || 0;
                        t_remain_price += parseInt(row.RemainPrice) || 0;
                        t_deduct_price += parseInt(row.DeductPrice) || 0;
                        t_target_price += parseInt(row.TargetPrice) || 0;
                        t_calc_price += parseInt(row.CalcPrice) || 0;
                        t_tax_price += parseInt(row.TaxPrice) || 0;
                        t_etc_deduct_price += parseInt(row.EtcDeductPrice) || 0;
                        t_final_calc_price += parseInt(row.FinalCalcPrice) || 0;
                    });

                    @if($prod_type == 'OL')
                        $('#t_lec_real_cnt').text(addComma(t_lec_real_cnt));
                        $('#t_pack_real_cnt').text(addComma(t_pack_real_cnt));
                    @endif

                    $('#t_real_cnt').text(addComma(t_lec_real_cnt + t_pack_real_cnt));
                    $('#t_pre_price').text(addComma(t_pre_price));
                    $('#t_remain_price').text(addComma(t_remain_price));
                    $('#t_deduct_price').text(addComma(t_deduct_price));
                    $('#t_target_price').text(addComma(t_target_price));
                    $('#t_calc_price').text(addComma(t_calc_price));
                    $('#t_tax_price').text(addComma(t_tax_price));
                    $('#t_etc_deduct_price').text(addComma(t_etc_deduct_price));
                    $('#t_final_calc_price').text(addComma(t_final_calc_price));
                } else {
                    $('#list_ajax_table tfoot tr th.sumTh').text('');
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/calc/offLectureHL/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 상세보기 버튼 클릭
            $list_table.on('click', '.btn-view', function() {
                var show_uri = '/' + $(this).data('prof-idx') + '/' + $(this).data('prod-code') + '/' + $(this).data('prod-type');
                show_uri += $(this).data('pch-idx') == null ? '' : '/' + $(this).data('pch-idx');

                location.href = '{{ site_url('/business/calc/offLectureHL/show') }}' + show_uri + dtParamsToQueryString($datatable);
            });

            // 상품구분 라디오 버튼 클릭
            $search_form.on('ifClicked', 'input[name="prod_type"]', function() {
                location.replace('{{ site_url('/business/calc/offLectureHL/index') }}?prod_type=' + $(this).val());
            });
        });
    </script>
@stop
