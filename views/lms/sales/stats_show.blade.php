@extends('lcms.layouts.master')

@section('content')
    <h5>- 사이트 기준 {{ $stats_name }}별 매출현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
        <div class="x_panel">
            <div class="x_content mt-0">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>상품정보</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>운영사이트</th>
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
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $data['SiteName'] }}</td>
                                <td>{{ $data['LgCateName'] }}</td>
                                <td class="bold">[{{ $data['ProdCode'] }}] {{ $data['ProdName'] }}</td>
                                @if($stats_type == 'lecture')
                                    {{-- 단강좌 --}}
                                    <td>{{ $data['SchoolYear'] }}</td>
                                    <td>{{ $data['LecTypeCcdName'] }}</td>
                                    <td>{{ $data['CourseName'] }}</td>
                                    <td>{{ $data['SubjectName'] }}</td>
                                    <td>{{ $data['wProfName_String'] }}</td>
                                    <td>{{ $data['wProgressCcd_Name'] }} ({{ $data['wUnitCnt'] }}/{{ $data['wUnitLectureCnt'] }})</td>
                                @elseif($stats_type == 'packageUser')
                                    {{-- 사용자패키지 --}}
                                    <td>{{ $data['SchoolYear'] }}</td>
                                @elseif($stats_type == 'packageAdmin')
                                    {{-- 운영자패키지 --}}
                                    <td>{{ $data['SchoolYear'] }}</td>
                                    <td>{{ $data['PackTypeCcdName'] }}</td>
                                @elseif($stats_type == 'packagePeriod')
                                    {{-- 기간제패키지 --}}
                                    <td>{{ $data['SchoolYear'] }}</td>
                                    <td>{{ $data['PackTypeCcdName'] }}</td>
                                    <td>{{ $data['PackPeriodCcdName'] }}</td>
                                @elseif($stats_type == 'offLecture')
                                    {{-- 단과반 --}}
                                    <td>{{ $data['CampusCcdName'] }}</td>
                                    <td>{{ $data['SchoolYear'] }}</td>
                                    <td>{{ $data['StudyPatternCcdName'] }}</td>
                                    <td>{{ $data['SchoolStartYear'] }}/{{ $data['SchoolStartMonth'] }}</td>
                                    <td>{{ $data['StudyStartDate'] }}</td>
                                    <td>{{ $data['StudyEndDate'] }}</td>
                                    <td>{{ $data['CourseName'] }}</td>
                                    <td>{{ $data['SubjectName'] }}</td>
                                    <td>{{ $data['wProfName_String'] }}</td>
                                @elseif($stats_type == 'offPackageAdmin')
                                    {{-- 종합반 --}}
                                    <td>{{ $data['CampusCcdName'] }}</td>
                                    <td>{{ $data['SchoolYear'] }}</td>
                                    <td>{{ $data['StudyPatternCcdName'] }}</td>
                                    <td>{{ $data['SchoolStartYear'] }}/{{ $data['SchoolStartMonth'] }}</td>
                                    <td>{{ substr($data['StudyPeriod'], 0, 10) }}</td>
                                    <td>{{ substr($data['StudyPeriod'], 11, 10) }}</td>
                                @elseif($stats_type == 'book')
                                    {{-- 교재 --}}
                                    <td>{{ str_replace(',', '<br/>', $data['ProfSubjectNames']) }}</td>
                                    <td>{{ $data['wPublName'] }}</td>
                                    <td>{{ $data['wAuthorNames'] }}</td>
                                @endif
                                @if($stats_type != 'packageUser')
                                    {{-- 사용자패키지일 경우 판매가 없음 --}}
                                    <td>{{ number_format($data['RealSalePrice']) }}<br/><s>{{ number_format($data['SalePrice']) }}</s></td>
                                @endif
                                @if(starts_with($stats_type, 'off') === false)
                                    {{-- 학원강좌가 아닐 경우 판매상태, 학원강좌일 경우 개설여부, 접수상태 --}}
                                    <td>{{ $data['SaleStatusCcdName'] }}</td>
                                @else
                                    <td>{{ $data['IsLecOpen'] == 'Y' ? '개설' : '폐강' }}</td>
                                    <td>{{ $data['AcceptStatusCcdName'] }}</td>
                                @endif
                                <td class="blue bold">{{ number_format($data['tRemainPrice']) }}원<br/>({{ number_format($data['tOrderProdCnt']) }}건)</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <button class="btn btn-primary mr-0" type="button" id="btn_list">전체목록</button>
            </div>
        </div>
        <div class="x_panel mt-10">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">결제조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_pay_channel_ccd" name="search_pay_channel_ccd">
                            <option value="">결제채널</option>
                            @foreach($arr_pay_channel_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_route_ccd" name="search_pay_route_ccd">
                            <option value="">결제루트</option>
                            @foreach($arr_pay_route_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_method_ccd" name="search_pay_method_ccd">
                            <option value="">결제수단</option>
                            @foreach($arr_pay_method_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_status_ccd" name="search_pay_status_ccd">
                            <option value="">결제상태</option>
                            @foreach($arr_pay_status_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_value">주문검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">주문번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">결제일/환불일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="{{ $arr_input['start_date'] }}">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="{{ $arr_input['end_date'] }}">
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
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th>선택</th>
                    <th>No</th>
                    <th>주문번호</th>
                    <th>회원정보</th>
                    <th>결제채널</th>
                    <th>결제루트</th>
                    <th>결제수단</th>
                    <th>결제금액</th>
                    <th>결제완료일</th>
                    <th>환불금액</th>
                    <th>환불완료일</th>
                    <th>결제상태</th>
                </tr>
                <tr>
                    <td colspan="12" class="bg-odd text-center">
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

            // 검색조건 초기화
            $search_form.find('input[name="search_prod_value"]').val('');

            $datatable = $list_table.DataTable({
                serverSide: true,
                displayStart: 0,
                displayLength: 20,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
                ajax: {
                    'url' : '{{ site_url('/sales/' . $stats_type . '/orderListAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        console.log(data);
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="order_idx" class="flat target-crm-member" value="' + data + '" data-mem-idx="' + row.MemIdx + '">';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/pay/order/show') }}/' +row.OrderIdx + '" class="blue" target="_blank"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone;
                    }},
                    {'data' : 'PayChannelCcdName'},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return row.RealPayPrice !== null ? addComma(data) : '';
                    }},
                    {'data' : 'CompleteDatm'},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return row.RefundPrice !== null ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }},
                    {'data' : 'RefundDatm'},
                    {'data' : 'PayStatusName'}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                $('#search_period').html('[' + $search_form.find('input[name="search_start_date"]').val() + ' ~ ' + $search_form.find('input[name="search_end_date"]').val() + ']');

                if (json.sum_data !== null) {
                    $('#sum_pay_price').html(addComma(json.sum_data.tRealPayPrice) + ' (' + addComma(json.sum_data.tRealPayCnt) + '건)');
                    $('#sum_refund_price').html(addComma(json.sum_data.tRefundPrice) + ' (' + addComma(json.sum_data.tRefundCnt) + '건)');
                    $('#sum_total_price').html(addComma(json.sum_data.tRealPayPrice - json.sum_data.tRefundPrice));
                } else {
                    $('#sum_pay_price').html('0');
                    $('#sum_refund_price').html('0');
                    $('#sum_total_price').html('0');
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/sales/' . $stats_type . '/orderListExcel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/sales/' . $stats_type . '/index') }}' + getQueryString());
            });
        });
    </script>
@stop
