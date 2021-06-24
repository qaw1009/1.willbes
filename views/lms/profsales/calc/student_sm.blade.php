@extends('lcms.layouts.master')

@section('content')
    <h5>- 임용 연도별 {{ $calc_name }} 수강생 현황을 확인할 수 있습니다. (2020년 12월 매출부터 확인 가능)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
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
                            <select class="form-control selectpicker" id="search_prof_idx" name="search_prof_idx" title="교수선택" data-size="10" data-live-search="true">
                                <option value="">교수선택</option>
                                @foreach($arr_professor as $row)
                                    <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" id="search_prod_value" name="search_prod_value" title="상품검색어" style="width: 25%;">
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
                <span class="dark-blue">{{ $calc_name }} 수강생 현황</span>
            </h2>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="inline-block fs-14">
                        <a href="{{ site_url('/profsales/calc/offLectureStudSM/') }}" class="{{ $is_off_site == 'Y' ? 'bold' : '' }}">직강수강생현황</a>
                        |
                        <a href="{{ site_url('/profsales/calc/lectureStudSM/') }}" class="{{ $is_off_site == 'N' ? 'bold' : '' }}">인강수강생현황</a>
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
                <div class="col-md-12 form-inline">
                    <span class="fs-14 bold pr-20">기간검색</span>
                    <div class="input-group mb-0 mr-10">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" title="조회시작일자">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <div class="input-group-addon no-border-right">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" title="조회종료일자">
                    </div>
                    <div class="btn-group mr-5" role="group">
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="7-days">7일</button>
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="2-months">2개월</button>
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="4-months">4개월</button>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm btn-search" id="btn_search_in_set_search_date">검 색</button>
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-xs-12">
                    <h2 class="bold"><span class="green">주의사항</span></h2>
                    <div>* 본 화면의 수강내역은 미정산 집계 현황이므로 실제와 다를 수 있습니다.</div>
                    <div>* 강좌명 클릭 시, 수강생 정보 확인이 가능합니다.</div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <table id="list_ajax_table" class="table table-bordered">
                        <thead>
                        <tr class="bg-white-gray">
                            <th class="valign-middle">강의명</th>
                            <th class="valign-middle">수강생 수 (패키지)</th>
                            <th class="valign-middle">수강금액</th>
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

        $(document).ready(function() {
            // 날짜검색 디폴트 셋팅
            if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
            }

            // 교수 자동변경
            $search_form.find('select[name="search_prof_idx"]').chained("#search_site_code");

            // 초기화 버튼 클릭 (app.js click event 사용안함)
            $search_form.on('click', '#btn_app_unused_reset', function() {
                var prev_site_code = $search_form.find('select[name="search_site_code"]').val();  // 이전 선택된 사이트코드
                $search_form[0].reset();
                $search_form.find('select[name="search_site_code"]').val(prev_site_code);
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
                $search_form.find('#search_result').addClass('hide');
                $search_form.submit();
            });

            // 사이트탭 클릭
            $search_form.on('change', 'select[name="search_site_code"]', function() {
                $search_form.find('select[name="search_prof_idx"]').val('');
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
                $search_form.find('#search_result').addClass('hide');
            });

            // 수강생현황
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                info: false,
                dom: 'T<"clear">rtip',
                ajax: {
                    'url' : '{{ site_url('/profsales/calc/' . $calc_type . '/studListAjax') }}',
                    'type' : 'POST',
                    'beforeSend' : function() {
                        var limit_start_date = '{{ $limit_start_date }}';
                        var limit_search_days = parseInt('{{ $limit_search_days }}');
                        var search_start_date = $search_form.find('input[name="search_start_date"]').val();
                        var search_end_date = $search_form.find('input[name="search_end_date"]').val();
                        var diff_search_days = moment(search_end_date, 'YYYY-MM-DD').diff(moment(search_start_date, 'YYYY-MM-DD'), 'days') + 1;

                        if (diff_search_days > limit_search_days) {
                            alert('최대 4개월까지 조회 가능합니다.');
                        } else if (search_start_date < limit_start_date) {
                            @if($is_tzone === true)
                            alert(limit_start_date + ' 이전 수강생현황은 `이전 사이트 매출현황 보기`에서 확인해 주세요.');
                            @else
                            alert(limit_start_date + ' 이전 수강생현황은 `이전 사이트`에서 확인해 주세요.');
                            @endif
                            $search_form.find('input[name="search_start_date"]').val(limit_start_date);
                        }
                    },
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                createdRow: function(row, data, dataIndex) {
                    if (data.ProdCodeSub === 'TOTAL') {
                        $(row).addClass('bg-info bold');
                    }
                },
                columns: [
                    {'data' : 'ProdCodeSub', 'render' : function(data, type, row, meta) {
                        return data === 'TOTAL' ? '소계' : row.ProdNameSub + ' (' + data + ')'
                            + '<br/><a href="#none" data-prof-idx="' + row.ProfIdx + '" data-prod-code-sub="' + row.ProdCodeSub + '" data-prod-name-sub="' + Base64.encode(row.ProdNameSub) + '" class="blue btn-view">[수강생 보기]</a>';
                    }},
                    {'data' : 'tPayCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data) + '명 (' + addComma(row.tPayPackCnt) + '명)';
                    }},
                    {'data' : 'tRemainPrice', 'render' : function(data, type, row, meta) {
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
                }
            });

            // 상품명 클릭 (수강생 보기)
            $search_form.on('click', '.btn-view', function() {
                $('.btn-view').setLayer({
                    'url' : '{{ site_url('/profsales/calc/' . $calc_type . '/show') }}',
                    'width' : 1400,
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'search_type', 'name' : '조회구분', 'value' : 'paid', 'required' : true },
                        { 'id' : 'search_date_param1', 'name' : '시작일', 'value' : $search_form.find('input[name="search_start_date"]').val(), 'required' : true },
                        { 'id' : 'search_date_param2', 'name' : '종료일', 'value' : $search_form.find('input[name="search_end_date"]').val(), 'required' : true },
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
