@extends('lcms.layouts.master')

@section('content')
    <h5 class="mb-0">- {{ $calc_name }} 매출요약을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-xs-12">
                <div class="pull-left">
                    {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
                </div>
                {{-- 이전 매출보기 --}}
                @include('lms.profsales.prev_sales_view_partial')
            </div>
        </div>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">상품구분</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <div class="radio">
                            <input type="radio" id="prod_type_1" name="prod_type" class="flat" value="LE" @if($prod_type == 'LE') checked="checked" @endif/> <label for="prod_type_1" class="input-label">단강좌&사용자/운영자패키지(일반형)</label>
                            <input type="radio" id="prod_type_2" name="prod_type" class="flat" value="AC" @if($prod_type == 'AC') checked="checked" @endif/> <label for="prod_type_2" class="input-label">운영자패키지(선택형)</label>
                        </div>
                    </div>
                </div>
                @if($is_tzone === false)
                    <div class="form-group">
                        <label class="control-label col-md-1">교수검색</label>
                        <div class="col-md-11 form-inline">
                            <select class="form-control mr-10" id="search_prof_idx" name="search_prof_idx">
                                <option value="">교수선택</option>
                                @foreach($arr_professor as $row)
                                    <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label class="control-label col-md-1">결제일/환불일</label>
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
                <thead>
                <tr class="bg-odd">
                    <th>교수명</th>
                    <th>매출금액</th>
                    <th>결제수수료</th>
                    <th>환불금액</th>
                    <th class="blue">정산금액</th>
                    <th>비고</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ml-5">
            <div><span class="required">*</span> 단강좌/패키지 매출 내역이며, 패키지는 안분율 적용 금액입니다.</div>
            <div class="mt-5"><span class="required">*</span> PASS는 기여도 적용 및 월할 계산하여 별도 정산 안내 드립니다.</div>
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
                info: false,
                ajax: {
                    'url' : '{{ site_url('/profsales/calc/' . $calc_type . '/listAjax') }}',
                    'type' : 'POST',
                @if($is_tzone === true)
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
                        console.log($search_form.serializeArray());
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.wProfName + ' (' + row.SubjectName + ')';
                    }},
                    {'data' : 'tDivisionPayPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'tDivisionPgFeePrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'tDivisionRefundPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'tDivisionCalcPrice', 'render' : function(data, type, row, meta) {
                        return '<a class="blue bold">' + decimalFormat(data, 8) + '</a>';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return '세액 공제전';
                    }}
                ]
            });

            // 상품구분 라디오 버튼 클릭
            $search_form.on('ifClicked', 'input[name="prod_type"]', function() {
                location.replace('{{ site_url('/profsales/calc/' . $calc_type . '/index') }}?prod_type=' + $(this).val());
            });
        });
    </script>
@stop
