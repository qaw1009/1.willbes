@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 {{ $advance_name }} 선수금을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group no-border-bottom">
                    <label class="control-label col-md-1">기준일</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_date" name="search_date" value="" autocomplete="off" readonly="readonly">
                        </div>
                        <div class="inline-block ml-30">
                            {{--<span class="required">*</span> 기준일이 오늘일 경우 조회결과가 상이할 수 있습니다.--}}
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
            <div class="text-right">
                <h5 class="no-margin pt-5 inline-block"><span class="required">*</span> 웹상에는 상위 100개까지만 검색됩니다.</h5>
                <button type="button" class="btn btn-sm btn-success btn-excel ml-10 mr-0"><i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드</button>
            </div>
            <table id="list_ajax_table" class="table table-bordered">
                <thead class="bg-odd">
                <tr>
                    <th rowspan="2" class="valign-middle">No</th>
                    <th colspan="{{ $advance_type == 'lecture' ? '15' : '17' }}">결제정보</th>
                    <th colspan="{{ $advance_type == 'lecture' ? '20' : '13' }}" class="bg-success">회계정보</th>
                </tr>
                <tr>
                    <th class="valign-middle">주문번호</th>
                    <th class="valign-middle">회원명</th>
                    <th class="valign-middle">결제루트</th>
                    <th class="valign-middle">결제수단</th>
                    <th class="valign-middle">상품구분</th>
                @if($advance_type == 'offLecture')
                    {{-- 학원강좌 --}}
                    <th class="valign-middle">캠퍼스</th>
                @endif
                    <th class="valign-middle">상품코드</th>
                    <th class="valign-middle">상품명</th>
                    <th class="valign-middle">강좌코드</th>
                    <th class="valign-middle">강좌명</th>
                    <th class="valign-middle">교수명</th>
                @if($advance_type == 'offLecture')
                    {{-- 학원강좌 --}}
                    <th class="valign-middle">과목명</th>
                @endif
                    <th class="valign-middle">결제금액</th>
                    <th class="valign-middle" style="min-width: 76px;">결제일</th>
                    <th class="valign-middle">환불금액</th>
                    <th class="valign-middle" style="min-width: 76px;">환불완료일</th>
                    <th class="valign-middle">결제상태</th>
                    <th class="valign-middle bg-success">전체금액</th>
                    <th class="valign-middle bg-info">안분율</th>
                    <th class="valign-middle bg-success">안분금액</th>
                    <th class="valign-middle bg-info">정산율</th>
                    <th class="valign-middle bg-success">배분금액</th>
                @if($advance_type == 'lecture')
                    {{-- 온라인강좌 --}}
                    <th class="valign-middle bg-success" style="min-width: 76px;">수강시작일</th>
                    <th class="valign-middle bg-success" style="min-width: 76px;">수강종료일</th>
                    <th class="valign-middle bg-warning" style="min-width: 76px;">실제수강종료일<br/>(총무료연장일+총일시정지일)</th>
                    <th class="valign-middle bg-warning">총무료연장일수</th>
                    <th class="valign-middle bg-warning">총일시정지일수</th>
                    <th class="valign-middle bg-warning">1차일시정지</th>
                    <th class="valign-middle bg-warning">2차일시정지</th>
                    <th class="valign-middle bg-warning">3차일시정지</th>
                    <th class="valign-middle bg-warning">수강상태</th>
                    <th class="valign-middle bg-success">총유료수강일수</th>
                    <th class="valign-middle bg-success">잔여수강일수</th>
                    <th class="valign-middle bg-success">사용수강일수</th>
                @else
                    {{-- 학원강좌 --}}
                    <th class="valign-middle bg-success" style="min-width: 76px;">개강일</th>
                    <th class="valign-middle bg-success" style="min-width: 76px;">종강일</th>
                    <th class="valign-middle bg-success">전체강의횟수</th>
                    <th class="valign-middle bg-success">잔여강의횟수</th>
                    <th class="valign-middle bg-success">사용강의횟수</th>
                @endif
                    <th class="valign-middle bg-info blue bold">잔여금액(선수금)</th>
                    <th class="valign-middle bg-danger red bold">사용금액</th>
                    <th class="valign-middle bg-success" style="min-width: 76px;">기준일</th>
                </tr>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <style type="text/css">
        #list_ajax_table > thead > tr > th.valign-middle { border-bottom-width: 1px !important; }
    </style>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            // 날짜검색 디폴트 셋팅
            if ($search_form.find('input[name="search_date"]').val().length < 1) {
                $search_form.find('input[name="search_date"]').val('{{ date('Y-m-d', strtotime('-1 days')) }}');
            }

            $datatable = $list_table.DataTable({
                serverSide: true,
                scrollX : true,
                scrollY : 410,
                responsive : false,
                dom: 'T<"clear">rtip',
                paging : false,
                ajax: {
                    'url' : '{{ site_url('/business/advance/' . $advance_type . '/listAjax') }}',
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
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/pay/order/show') }}/' +row.OrderIdx + '" class="blue" target="_blank"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')';
                    }},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'LearnPatternCcdName', 'render' : function(data, type, row, meta) {
                        return (row.SalePatternCcd.slice(-1) !== '1' ? row.SalePatternCcdName : data) + (row.PackTypeCcdName !== null ? '<br/>(' + row.PackTypeCcdName + ')' : '');
                    }},
                @if($advance_type == 'offLecture')
                        {{-- 학원강좌 --}}
                    {'data' : 'CampusCcdName'},
                @endif
                    {'data' : 'ProdCode'},
                    {'data' : 'ProdName'},
                    {'data' : 'ProdCodeSub'},
                    {'data' : 'ProdNameSub'},
                    {'data' : 'wProfName'},
                @if($advance_type == 'offLecture')
                    {{-- 학원강좌 --}}
                    {'data' : 'SubjectName'},
                @endif
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'CompleteDatm', 'render' : function(data, type, row, meta) {
                        return data.substr(0, 10);
                    }},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return data > 0 ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }},
                    {'data' : 'RefundDatm', 'render' : function(data, type, row, meta) {
                        return data !== null ? data.substr(0, 10) : '';
                    }},
                    {'data' : 'PayStatusName', 'render' : function(data, type, row, meta) {
                        return row.RefundPrice > 0 ? '<span class="red no-line-height">' + data + '</span>' : data;
                    }},
                    {'data' : 'RemainPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'ProdDivisionRate'},
                    {'data' : 'DivisionPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'ProdCalcPerc'},
                    {'data' : 'DivisionCalcPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'LecStartDate'},
                    {'data' : 'LecEndDate'},
                @if($advance_type == 'lecture')
                    {{-- 온라인강좌 --}}
                    {'data' : 'RealLecEndDate'},
                    {'data' : 'tExtenDays'},
                    {'data' : 'tPauseDays'},
                    {'data' : 'LecPausePeriod1'},
                    {'data' : 'LecPausePeriod2'},
                    {'data' : 'LecPausePeriod3'},
                    {'data' : 'StudyStatusName', 'render' : function(data, type, row, meta) {
                        return row.RefundPrice > 0 ? '<span class="red no-line-height">' + data + '</span>' : data;
                    }},
                    {'data' : 'LecExpireDay'},
                    {'data' : 'LecRemainDay'},
                    {'data' : 'LecUseDay'},
                @else
                    {{-- 학원강좌 --}}
                    {'data' : 'LecAmount'},
                    {'data' : 'LecRemainAmount'},
                    {'data' : 'LecUseAmount'},
                @endif
                    {'data' : 'DivisionRemainPrice', 'render' : function(data, type, row, meta) {
                        return '<span class="blue no-line-height">' + addComma(data) + '</span>';
                    }},
                    {'data' : 'DivisionUsePrice', 'render' : function(data, type, row, meta) {
                        return '<span class="red no-line-height">' + addComma(data) + '</span>';
                    }},
                    {'data' : 'BaseDate'}
                ]
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/advance/' . $advance_type . '/excel') }}', $search_form.serializeArray(), 'POST', '_blank');
                }
            });
        });
    </script>
@stop
