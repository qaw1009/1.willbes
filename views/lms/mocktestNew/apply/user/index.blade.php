@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 상품정보를 등록하고 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false, $arr_site_code) !!}
                        <select class="form-control mr-5" id="search_PayStatusCcd" name="search_PayStatusCcd">
                            <option value="">결제상태</option>
                            @foreach($arr_base['paymentStatus'] as $k => $v)
                                <option value="{{$k}}" @if($arr_base['search_PayStatusCcd'] == $k) selected="selected" @endif>{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeForm" name="search_TakeForm">
                            <option value="">응시형태</option>
                            @foreach($arr_base['applyType'] as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeArea" name="search_TakeArea">
                            <option value="">응시지역</option>
                            @foreach($arr_base['applyArea'] as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_IsTake" name="search_IsTake">
                            <option value="">응시여부</option>
                            <option value="Y" @if($arr_base['search_IsTake'] == 'Y') selected="selected" @endif>응시</option>
                            <option value="N" @if($arr_base['search_IsTake'] == 'N') selected="selected" @endif>미응시</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">회원검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value="{{$arr_base['search_fi']}}"> 회원명, 연락처, 주문번호, 응시번호, 상품명/코드 검색 가능
                    </div>
                </div>
                <div class="pt-10">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary mr-50 btn-excel">엑셀다운로드</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary" id="btn_search">검색</button>
                        <button type="button" class="btn btn-default" id="act-searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered">
                <thead class="bg-white-gray">
                <tr>
                    <th class="text-center"></th>
                    <th class="text-center">NO</th>
                    <th class="text-center">주문번호</th>
                    <th class="text-center">회원명</th>
                    <th class="text-center">연락처</th>
                    <th class="text-center">결제완료일</th>
                    <th class="text-center">결제금액</th>
                    <th class="text-center">결제상태</th>
                    <th class="text-center">결제수단</th>
                    <th class="text-center">상품명</th>
                    <th class="text-center">연도</th>
                    <th class="text-center">회차</th>
                    <th class="text-center">응시형태</th>
                    <th class="text-center">응시번호</th>
                    <th class="text-center">카테고리</th>
                    <th class="text-center">직렬</th>
                    <th class="text-center">과목</th>
                    <th class="text-center">응시지역</th>
                    <th class="text-center">응시여부</th>
                    <th class="text-center">응시표출력</th>
                    <th class="text-center">출력횟수</th>
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
            $datatable = $list_table.DataTable({
                buttons: [
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn btn-sm btn-primary mr-15 btn-message'  },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn btn-sm btn-primary mr-15 btn-sms' },

                ],
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktestNew/apply/user/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" id="checkIdx'+data.MrIdx+ '" name="checkIdx[]" class="flat target-crm-member" value="'+data.MrIdx+'" data-mem-idx="'+data.MemIdx+'" />';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'OrderNo', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<a class="blue" href="{{ site_url('/pay/order/show/') }}'+row.OrderIdx+'" target="_blank">' + data + '</a>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<a class="blue" href="{{ site_url('/member/manage/detail/') }}'+row.MemIdx+'" target="_blank">' + row.MemName + '<br>(' + row.MemId + ')</a>';
                        }},
                    {'data' : 'MemPhone', 'class': 'text-center'},
                    {'data' : 'CompleteDatm', 'class': 'text-center'},
                    {'data' : 'RealPayPrice', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return addComma(data);
                        }},
                    {'data' : 'PayStatusCcd', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            /*return (typeof paymentStatus[data] !== 'undefined') ? paymentStatus[data] : '';*/
                            return '';
                        }},
                    {'data' : 'PayMethodCcd_Name'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span>[' + row.ProdCode + '] ' + row.ProdName + '</span>';
                        }},
                    {'data' : 'MockYear', 'class': 'text-center'},
                    {'data' : 'MockRotationNo', 'class': 'text-center'},
                    /*
                    {'data' : 'TakeForm', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (typeof applyType[data] !== 'undefined') ? applyType[data] : '';
                    }},
                    */
                    {'data' : 'TakeForm_Name', 'class': 'text-center'},
                    {'data' : 'TakeNumber', 'class': 'text-center'},
                    {'data' : 'CateName', 'class': 'text-center'},
                    {'data' : 'TakeMockPart_Name', 'class': 'text-center'},
                    {'data' : 'SubjectNameList', 'class': 'text-center'},
                    {'data' : 'TakeArea_Name', 'class': 'text-center'},
                    /*{'data' : 'TakeArea', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (typeof applyArea[data] !== 'undefined') ? applyArea[data] : '';
                    }},*/
                    {'data' : 'IsTake', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '응시' : '미응시';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return  '<a href="javascript:;" class="blue cs-pointer btn-print" data-idx="'+row.MrIdx+'">[출력]</a>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return  '<a class="blue" href="javascript:;" class="print-log" data-idx="'+row.MrIdx+'">'+row.PrintCnt+'</a>';
                        }},
                ]
            });

            // 엑셀다운로드
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/mocktestNew/apply/user/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 응시표 출력 폼
            $list_table.on('click', '.btn-print', function() {
                var url = '{{site_url('/common/printCert/')}}?prod_type=mock_exam&mr_idx='+$(this).data('idx');
                popupOpen(url,'_cert_print', 620, 350);
            });

            //초기화
            $("#act-searchInit").on('click', function () {
                location.replace('{{ site_url('/mocktestNew/apply/user/') }}');
            });
        });
    </script>
@stop