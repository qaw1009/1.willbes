@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 주문번호 기준으로 모의고사 결제 및 응시여부를 확인하고 응시표를 출력하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false) !!}
        {!! csrf_field() !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value="{{$siteCodeDef}}">

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {{--<select class="form-control mr-5" id="search_PayStatusCcd" name="search_PayStatusCcd">--}}
                            {{--<option value="">결제상태</option>--}}
                            {{--@foreach($paymentStatus as $k => $v)--}}
                                {{--<option value="{{$k}}" @if($search_PayStatusCcd == $k) selected @endif>{{$v}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<select class="form-control mr-5" id="search_TakeForm" name="search_TakeForm">--}}
                            {{--<option value="">응시형태</option>--}}
                            {{--@foreach($applyType as $k => $v)--}}
                                {{--<option value="{{$k}}">{{$v}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<select class="form-control mr-5" id="search_TakeArea" name="search_TakeArea">--}}
                            {{--<option value="">응시지역</option>--}}
                            {{--@foreach($applyArea as $k => $v)--}}
                                {{--<option value="{{$k}}">{{$v}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<select class="form-control mr-5" id="search_IsTake" name="search_IsTake">--}}
                            {{--<option value="">응시여부</option>--}}
                            {{--<option value="Y" @if($search_IsTake == 'Y') selected @endif>응시</option>--}}
                            {{--<option value="N" @if($search_IsTake == 'N') selected @endif>미응시</option>--}}
                        {{--</select>--}}
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">회원검색</label>
                    <div class="col-md-6">
                        {{--<input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value="{{$search_fi}}"> 회원명, 연락처, 주문번호, 응시변호, 상품명/코드 검색 가능--}}
                    </div>
                </div>
                <div class="pt-10">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary mr-50 btn-excel" id="btn-excel">엑셀다운로드</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary" id="btn_search">검색</button>
                        <button type="button" class="btn btn-default" id="act-searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">이름</th>
                        <th class="text-center">아이디</th>
                        <th class="text-center">휴대폰번호</th>
                        <th class="text-center">직렬</th>
                        <th class="text-center">지역</th>
                        <th class="text-center">응시번호</th>
                        <th class="text-center">수강여부</th>
                        <th class="text-center">시험준비기간</th>
                        <th class="text-center">신청일</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {


            // 검색 초기화
            $('#act-searchInit, #tabs_site_code > li').on('click', function () {
                $search_form.find('[name^=search_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });
                $search_form.find('#search_cateD1').trigger('change');

                var eTarget = (event.target) ? event.target : event.srcElement;
                if($(eTarget).attr('id') == 'searchInit') $datatable.draw();
            });

            // DataTables
            $datatable = $list_table.DataTable({
                info: true,
                language: {
                    "info": "[ 총 _MAX_건 ]"
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                buttons: [
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn btn-sm btn-primary mr-15 btn-message'  },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn btn-sm btn-primary mr-15 btn-sms' },

                ],
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/predict/prerequest/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},

                    {'data' : 'MemName', 'class': 'text-center'},
                    {'data' : 'MemId', 'class': 'text-center'},
                    {'data' : 'Phone', 'class': 'text-center'},
                    {'data' : 'TakeMockPart', 'class': 'text-center'},
                    {'data' : 'TaKeArea', 'class': 'text-center'},
                    {'data' : 'TaKeNumber', 'class': 'text-center'},
                    {'data' : 'LectureType', 'class': 'text-center'},
                    {'data' : 'Period', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}
                ]
            });


            // 응시표  출력 폼
            $list_table.on('click', '.btn-print', function() {
                var url = '{{site_url('/common/printCert/')}}?prod_type=mock_exam&mr_idx='+$(this).data('idx');
                popupOpen(url,'_cert_print', 620, 350);
            });

            // 응시표  출력 이력
            $list_table.on('click', '.print-log', function() {
                $('.print-log').setLayer({
                    'url' : '{{site_url('/mocktest/applyUser/PrintLog/')}}'+$(this).data('idx'),
                    'width' : 1400
                });

            });

            // 엑셀다운로드
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/mocktest/applyUser/list/Y') }}', $search_form.serializeArray(), 'POST');
                }
            });


        });
    </script>
@stop
