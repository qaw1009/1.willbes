@extends('lcms.layouts.master')

@section('content')
    <h5>- {{ $is_off_site == 'Y' ? '학원' : '온라인' }} {{ $sales_name }} 매출현황을 확인할 수 있습니다.</h5>
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
                                <th>전체건수</th>
                            @if($is_package === false)
                                <th style="width: 160px;">매출현황<br/>(결제금액-환불금액)</th>
                            @endif
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $data['SiteName'] }}</td>
                            @if($is_off_site == 'Y')
                                <td>{{ $data['CampusCcdName'] }}</td>
                            @endif
                                <td>{{ $data['LgCateName'] }}</td>
                                <td>[{{ $data['ProdCode'] }}] {{ $data['ProdName'] }}</td>
                            @if($sales_type == 'offLecture')
                                {{-- 단과반 --}}
                                <td>{{ $data['CourseName'] }}</td>
                                <td>{{ $data['SubjectName'] }}</td>
                                <td>{{ $data['wProfName'] }}</td>
                                <td>{{ $data['StudyStartDate'] }}</td>
                                <td>{{ $data['StudyEndDate'] }}</td>
                            @elseif($sales_type == 'offPackage')
                                {{-- 종합반 --}}
                                <td>{{ $data['wProfName'] }}</td>
                                <td>{{ $data['StudyStartDate'] }}</td>
                                <td>{{ $data['StudyEndDate'] }}</td>
                            @elseif($sales_type == 'lecture')
                                {{-- 단강좌 --}}
                                <td>{{ $data['CourseName'] }}</td>
                                <td>{{ $data['SubjectName'] }}</td>
                                <td>{{ $data['wProfName'] }}</td>
                                <td>{{ $data['StudyPeriod'] }}</td>
                            @else
                                {{-- 패키지/기간제패키지 --}}
                                <td>{{ $data['PackTypeCcdName'] }}</td>
                                <td>{{ $data['wProfName'] }}</td>
                                <td>{{ $data['StudyPeriod'] }}</td>
                            @endif
                                <td>{{ number_format($data['RealSalePrice'], 0) }}원<br/><s>{{ number_format($data['SalePrice'], 0) }}원</s></td>
                                <td>{{ number_format($data['tRealPayCnt'], 0) }}건</td>
                                <td class="red">{{ number_format($data['tRefundCnt'], 0) }}건</td>
                                <td class="blue bold">{{ number_format($data['tOrderProdCnt']) }}건</td>
                            @if($is_package === false)
                                <td class="blue bold">{{ number_format($data['tRemainPrice']) }}원</td>
                            @endif
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
                                <option value="{{ $key }}"{{ $arr_input['pay_status_ccd'] == $key ? ' selected' : '' }}>{{ $val }}</option>
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
                    <label class="control-label col-md-1">{{ $is_off_site == 'Y' ? '날짜' : '결제일/환불일' }}</label>
                    <div class="col-md-11 form-inline">
                        @if($is_off_site == 'Y')
                            <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                                <option value="paid">결제완료일</option>
                                <option value="refund">환불완료일</option>
                            </select>
                        @endif
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
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th>선택</th>
                @if($is_tzone === false)
                    <th>No</th>
                @endif
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
                <tr id="sumTotal" class="hide">
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
            // 검색조건 초기화
            $search_form.find('input[name="search_prod_value"]').val('');
            @if($is_off_site == 'Y')
                $search_form.find('input[name="search_start_date"]').val('');
                $search_form.find('input[name="search_end_date"]').val('');
            @else
                $search_form.find('input[name="search_start_date"]').val('{{ $arr_input['start_date'] }}');
                $search_form.find('input[name="search_end_date"]').val('{{ $arr_input['end_date'] }}');
            @endif

            $datatable = $list_table.DataTable({
                serverSide: true,
                displayStart: 0,
                displayLength: 20,
            @if($is_tzone === false)
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
            @endif
                ajax: {
                    'url' : '{{ site_url('/profsales/' . $sales_type . '/orderListAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        console.log(data);
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                @if($is_tzone === false)
                    {'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="order_idx" class="flat target-crm-member" value="' + data + '" data-mem-idx="' + row.MemIdx + '">';
                    }},
                @endif
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                @if($is_tzone === false)
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/pay/order/show') }}/' +row.OrderIdx + '" class="blue" target="_blank"><u>' + data + '</u></a>';
                    }},
                @else
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<u class="blue">' + data + '</u>';
                    }},
                @endif
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

            @if($is_package === false)
                // 조회된 기간의 합계금액 표시 (datatable load event)
                $datatable.on('xhr.dt', function(e, settings, json) {
                    @if($is_off_site == 'N')
                        $('#search_period').html('[' + $search_form.find('input[name="search_start_date"]').val() + ' ~ ' + $search_form.find('input[name="search_end_date"]').val() + ']');
                    @endif

                    if (json.sum_data !== null) {
                        $('#sum_pay_price').html(addComma(json.sum_data.tRealPayPrice) + ' (' + addComma(json.sum_data.tRealPayCnt) + '건)');
                        $('#sum_refund_price').html(addComma(json.sum_data.tRefundPrice) + ' (' + addComma(json.sum_data.tRefundCnt) + '건)');
                        $('#sum_total_price').html(addComma(json.sum_data.tRealPayPrice - json.sum_data.tRefundPrice));
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
                    formCreateSubmit('{{ site_url('/profsales/' . $sales_type . '/orderListExcel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/profsales/' . $sales_type . '/index') }}' + getQueryString());
            });
        });
    </script>
@stop
