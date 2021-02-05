@extends('lcms.layouts.master')

@section('content')
    <h5>- 임용 월별 {{ $calc_name }} 정산내역을 확인할 수 있습니다. (2020년 12월 매출부터 확인 가능)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;" data-use-app="false">
        {!! csrf_field() !!}
        @if($is_tzone === true)
            <input type="hidden" id="search_site_code" name="search_site_code" value="{{ $def_site_code }}"/>
        @else
            {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group no-border-bottom">
                        <label class="control-label col-md-1">교수검색</label>
                        <div class="col-md-11 form-inline">
                            {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                            <select class="form-control mr-10" id="search_prof_idx" name="search_prof_idx">
                                <option value="">교수선택</option>
                                @foreach($arr_professor as $row)
                                    <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" id="search_prod_value" name="search_prod_value" style="width: 25%;">
                            <span class="pl-20"># 강좌명 검색 가능</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                    <button type="button" class="btn btn-default btn-search" id="btn_app_unused_reset">초기화</button>
                </div>
            </div>
        @endif
        <div id="search_result" class="hide">
            <h2 class="text-center fs-30 bold mt-20">
                <span class="dark"><span class="wprof-name">{{ $def_wprof_name }}</span> 교수님</span>
                <span class="dark-blue">{{ $calc_name }} 배당 현황</span>
            </h2>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="inline-block fs-14">
                        <a href="{{ site_url('/profsales/calc/offLectureSM/') }}" class="{{ $is_off_site == 'Y' ? 'bold' : '' }}">직강배당현황</a>
                        |
                        <a href="{{ site_url('/profsales/calc/lectureSM/') }}" class="{{ $is_off_site == 'N' ? 'bold' : '' }}">인강배당현황</a>
                    </h5>
                </div>
                <div class="col-md-8 text-right">
                    @if($is_tzone === true)
                        <a href="#none" onclick="window.open('/home/gotoSsam');" class="btn btn-dark mb-0" target="_blank">
                            이전 사이트 매출현황 보기 (~2020년 11월까지)
                        </a>
                    @endif
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-md-1">
                    <select class="form-control" id="search_year" name="search_year">
                        @for($y = date('Y'); $y >= 2021; $y--)
                            <option value="{{ $y }}">{{ $y }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-11 form-inline">
                    @for($m = 1; $m <= 12; $m++)
                        <button type="button" name="btn_search_month" data-search-month="{{ $m }}" class="btn btn-default pl-30 pr-30 {{ $m == $def_curr_month ? 'btn-primary' : '' }}">{{ $m }}월</button>
                    @endfor
                    <input type="hidden" name="search_month" value="{{ $def_curr_month }}"/>
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-xs-12">
                    <h2 class="bold">
                        <span class="green"><span class="wprof-name">{{ $def_wprof_name }}</span> 교수님</span>
                        <span class="red"><span class="curr-month">{{ $def_curr_month }}</span>월 {{ $is_off_site == 'Y' ? '5' : '15' }}일 지급분</span>
                        <span class="green">{{ $calc_name }} 배당금 내역</span>
                    </h2>
                    @if($is_off_site == 'Y')
                        <div>* <span class="curr-month">{{ $def_curr_month }}</span>월 배당금 구성 :
                            <span class="prev2-month">{{ $def_prev2_month }}</span>월 직강 전체 배당 금액의 1/2 +
                            <span class="prev1-month">{{ $def_prev1_month }}</span>월 직강 전체 배당 금액의 1/2
                        </div>
                    @else
                        <div>* <span class="curr-month">{{ $def_curr_month }}</span>월 지급분 :
                            <span class="prev1-month">{{ $def_prev1_month }}</span>월 매출에 대한 인강 배당금
                        </div>
                    @endif
                    <div>* 정산 이후 환불 건 등으로 인해 금액이 100% 일치하지 않을 수도 있습니다.</div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-12">
                    <h4><strong>총 {{ $calc_name }} 배당 금액</strong></h4>
                </div>
                <div class="col-md-5">
                    <table id="list_total_table" class="table table-bordered">
                        <tr class="bg-white-gray bold">
                            <td rowspan="2"><span class="curr-month">{{ $def_curr_month }}</span>월 {{ $calc_name }} 배당 합계</td>
                            @if($is_off_site == 'Y')
                                <td><span class="prev2-month">{{ $def_prev2_month }}</span>월 정산금액 ½(F)<br/>(갑근세3.3% 공제)</td>
                                <td><span class="prev1-month">{{ $def_prev1_month }}</span>월 정산금액 ½(G)<br/>(갑근세3.3% 공제)<br/>(E/2)-((E/2)*3.3%)</td>
                                <td>실지급액(H)<br/>(F+G)</td>
                            @else
                                <td><span class="prev1-month">{{ $def_prev1_month }}</span>월 정산금액(F)</td>
                                <td>갑근세(3.3%)(G)<br/>(F*0.033)</td>
                                <td>실지급액(H)<br/>(F-G)</td>
                            @endif
                        </tr>
                        <tr class="">
                            <td id="t_final_set_price1">0</td>
                            <td id="t_final_set_price2">0</td>
                            <td id="t_final_calc_price">0</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <h4 class="mb-5"><strong><span class="prev1-month">{{ $def_prev1_month }}</span>월 {{ $calc_name }} 수강 신청 현황</strong></h4>
                    @if($is_off_site == 'N')
                        <span class="required">*</span> 강의 연장 결제 건의 경우 정상 수강료와 차이가 클 수 있습니다.
                    @endif
                </div>
                <div class="col-md-12">
                    <table id="list_ajax_table" class="table table-bordered">
                        <thead>
                        <tr class="bg-white-gray">
                            <th class="valign-middle rowspan">강의명</th>
                            <th class="valign-middle">결제구분</th>
                            <th class="valign-middle">정상가</th>
                            <th class="valign-middle">인원</th>
                            <th class="valign-middle">결제금액(A)</th>
                            <th class="valign-middle">환불금액(B)</th>
                            <th class="valign-middle">결제수수료(C)</th>
                            <th class="valign-middle">차감 후 금액(D)<br/>(A-B-C)</th>
                            <th class="valign-middle blue">최종 정산금액(E)<br/>(D*정산율)</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-20 mb-30">
                <div class="col-md-12">
                    <h4 class="mb-5"><strong>환불 현황</strong></h4>
                    <span class="red">* 환불 현황은 위 수강 신청 현황에 포함된 내역입니다.</span>
                </div>
                <div class="col-md-12">
                    <table id="list_ajax_refund_table" class="table table-bordered">
                        <thead>
                        <tr class="bg-white-gray">
                            <th class="valign-middle rowspan">강의명</th>
                            <th class="valign-middle">결제구분</th>
                            <th class="valign-middle">정상가</th>
                            <th class="valign-middle">인원</th>
                            <th class="valign-middle">결제금액(A)</th>
                            <th class="valign-middle">환불금액(B)</th>
                            <th class="valign-middle">결제수수료(C)</th>
                            <th class="valign-middle">차감 후 금액(D)<br/>(A-B-C)</th>
                            <th class="valign-middle blue">최종 정산금액(E)<br/>(D*정산율)</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var $datatable, $datatable_refund;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');
        var $list_table_refund = $('#list_ajax_refund_table');

        $(document).ready(function() {
            // 교수 자동변경
            $search_form.find('select[name="search_prof_idx"]').chained("#search_site_code");

            // submit event (app.js submit event 사용안함)
            $search_form.submit(function(e) {
                e.preventDefault();

                // 수강신청현황 조회
                $datatable.draw();

                // 환불신청현황 조회
                $datatable_refund.draw();
            });

            // 초기화 버튼 클릭 (app.js click event 사용안함)
            $search_form.on('click', '#btn_app_unused_reset', function() {
                var prev_site_code = $search_form.find('select[name="search_site_code"]').val();  // 이전 선택된 사이트코드
                $search_form[0].reset();
                $search_form.find('select[name="search_site_code"]').val(prev_site_code);
                $search_form.find('#search_result').addClass('hide');
                $search_form.submit();
            });

            // 사이트탭 클릭
            $search_form.on('change', 'select[name="search_site_code"]', function() {
                $search_form.find('select[name="search_prof_idx"]').val('');
                $search_form.find('#search_result').addClass('hide');
            });

            // 월 버튼 클릭
            $search_form.on('click', 'button[name="btn_search_month"]', function() {
                var $btn_month = $search_form.find('button[name="btn_search_month"]');
                var search_year = $search_form.find('select[name="search_year"]').val();
                var search_month = $(this).data('search-month');
                var search_date = search_year + '-' + search_month + '-01';
                var prev1_month = moment(search_date, 'YYYY-MM-DD').add(-1, 'months').format('M');
                var prev2_month = moment(search_date, 'YYYY-MM-DD').add(-2, 'months').format('M');

                $btn_month.removeClass('btn-primary');  // remove active
                $(this).addClass('btn-primary');    // active

                $search_form.find('input[name="search_month"]').val(search_month);      // 당월
                $search_form.find('.curr-month').text(search_month);    // 당월
                $search_form.find('.prev1-month').text(prev1_month);    // 전월
                $search_form.find('.prev2-month').text(prev2_month);    // 전전월

                // 수강신청현황 조회
                $datatable.draw();

                // 환불신청현황 조회
                $datatable_refund.draw();
            });

            // 수강신청현황
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                info: false,
                dom: 'T<"clear">rtip',
                ajax: {
                    'url' : '{{ site_url('/profsales/calc/' . $calc_type . '/calcListAjax') }}',
                    'type' : 'POST',
                    'beforeSend' : function() {
                        var limit_year_month = '{{ $limit_year_month }}';
                        var search_year_month = $search_form.find('select[name="search_year"]').val() + '-' + strLpad($search_form.find('input[name="search_month"]').val(), 2, '0');

                        if (search_year_month < limit_year_month) {
                            @if($is_tzone === true)
                            alert(limit_year_month + ' 이전 배당현황은 `이전 사이트 매출현황 보기`에서 확인해 주세요.');
                            @else
                            alert(limit_year_month + ' 이전 배당현황은 `이전 사이트`에서 확인해 주세요.');
                            @endif
                        }
                    },
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                createdRow: function(row, data, dataIndex) {
                    if (data.ProdCodeSub === 'TOTAL') {
                        $(row).addClass('bg-info bold');
                    } else if (data.PayTypeCcd === 'PROD') {
                        $(row).addClass('bg-white-gray bold');
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : 'ProdCodeSub', 'render' : function(data, type, row, meta) {
                        return data === 'TOTAL' ? '소계' : row.ProdNameSub + ' (' + data + ')'
                            + '<br/><a href="#none" data-search-type="all" data-prof-idx="' + row.ProfIdx + '" data-prod-code-sub="' + row.ProdCodeSub + '" data-prod-name-sub="' + Base64.encode(row.ProdNameSub) + '" class="blue btn-view">[수강생 보기]</a>';
                    }},
                    {'data' : 'PayTypeCcd', 'render' : function(data, type, row, meta) {
                        return data === 'PROD' ? '소계' : row.PayTypeCcdName;
                    }},
                    {'data' : 'SalePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tPayCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDivisionPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDivisionRefundPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDivisionPgFeePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDivisionCalcPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDivisionCalcRatePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }}
                ]
            });

            // 총 배당금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                if (json.is_search === true) {
                    $search_form.find('#search_result').removeClass('hide');

                    {{-- 교수명 표기 --}}
                    if ($search_form.find('select[name="search_prof_idx"]').length > 0) {
                        $search_form.find('.wprof-name').text($search_form.find('select[name="search_prof_idx"] option:checked').text());
                    }

                    {{-- 총 배당금액 표기 --}}
                    if (json.total !== null) {
                        $search_form.find('#t_final_set_price1').text(addComma(json.total.tFinalSetPrice1));
                        $search_form.find('#t_final_set_price2').text(addComma(json.total.tFinalSetPrice2));
                        $search_form.find('#t_final_calc_price').text(addComma(json.total.tFinalCalcPrice));
                    } else {
                        $search_form.find('#t_final_set_price1').text('0');
                        $search_form.find('#t_final_set_price2').text('0');
                        $search_form.find('#t_final_calc_price').text('0');
                    }
                }
            });

            // 환불현황
            $datatable_refund = $list_table_refund.DataTable({
                serverSide: true,
                paging: false,
                info: false,
                processing: false,
                dom: 'T<"clear">rtip',
                ajax: {
                    'url' : '{{ site_url('/profsales/calc/' . $calc_type . '/refundListAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                createdRow: function(row, data, dataIndex) {
                    if (data.ProdCodeSub === 'TOTAL') {
                        $(row).addClass('bg-info bold');
                    } else if (data.PayTypeCcd === 'PROD') {
                        $(row).addClass('bg-white-gray bold');
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : 'ProdCodeSub', 'render' : function(data, type, row, meta) {
                        return data === 'TOTAL' ? '소계' : row.ProdNameSub + ' (' + data + ')'
                            + '<br/><a href="#none" data-search-type="refund" data-prof-idx="' + row.ProfIdx + '" data-prod-code-sub="' + row.ProdCodeSub + '" data-prod-name-sub="' + Base64.encode(row.ProdNameSub) + '" class="blue btn-view">[환불내역 보기]</a>';
                    }},
                    {'data' : 'PayTypeCcd', 'render' : function(data, type, row, meta) {
                        return data === 'PROD' ? '소계' : row.PayTypeCcdName;
                    }},
                    {'data' : 'SalePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tPayCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDivisionPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDivisionRefundPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDivisionPgFeePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDivisionCalcPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDivisionCalcRatePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }}
                ]
            });

            // 수강생/환불내역 보기 버튼 클릭
            $search_form.on('click', '.btn-view', function() {
                $('.btn-view').setLayer({
                    'url' : '{{ site_url('/profsales/calc/' . $calc_type . '/show') }}',
                    'width' : 1200,
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'search_type', 'name' : '조회구분', 'value' : $(this).data('search-type'), 'required' : true },
                        { 'id' : 'search_date_param1', 'name' : '조회년도', 'value' : $search_form.find('select[name="search_year"]').val(), 'required' : true },
                        { 'id' : 'search_date_param2', 'name' : '조회월', 'value' : $search_form.find('input[name="search_month"]').val(), 'required' : true },
                        { 'id' : 'search_site_code', 'name' : '사이트코드', 'value' : $search_form.find('[name="search_site_code"]').val(), 'required' : true },
                        { 'id' : 'search_prof_idx', 'name' : '교수식별자', 'value' : $(this).data('prof-idx'), 'required' : true },
                        { 'id' : 'search_prod_code_sub', 'name' : '상품코드서브', 'value' : $(this).data('prod-code-sub'), 'required' : true },
                        { 'id' : 'search_prod_name_sub', 'name' : '상품명서브', 'value' : $(this).data('prod-name-sub'), 'required' : true }
                    ]
                });
            });
        });
    </script>
@stop
