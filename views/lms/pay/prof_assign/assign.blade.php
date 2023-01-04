@extends('lcms.layouts.master_modal')

@section('layer_title')
    강사배정
@stop

@section('layer_header')
    <form class="form-horizontal" id="_prof_assign_form" name="_prof_assign_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="order_idx" value="{{ $order_idx }}"/>
        <input type="hidden" name="order_prod_idx" value="{{ $order_prod_idx }}"/>
        <input type="hidden" name="prod_code" value="{{ $prod_code }}"/>
        <input type="hidden" name="prod_code_sub" value=""/>
        <input type="hidden" name="unpaid_idx" value="{{ $unpaid_idx }}"/>
@endsection

@section('layer_content')
    <div class="row">
        @if($data['IsUnPaid'] == 'Y')
            {{-- 미수금주문 --}}
            <div class="col-md-12">
                <p class="pl-5"><i class="fa fa-check-square-o"></i> 회원/상품정보</p>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-odd">
                        <th>회원정보</th>
                        <th>수강증</th>
                        <th>종합반수강번호</th>
                        <th>카테고리</th>
                        <th>캠퍼스</th>
                        <th>종합반명</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $data['MemName'] }}({{ $data['MemId'] }})<br/>{{ $data['MemPhone'] }}</td>
                            <td>{{ $data['CertNo'] }}</td>
                            <td>{{ $data['PackCertNo'] }}</td>
                            <td>{{ $data['LgCateName'] }}{{ empty($data['MdCateName']) === false ? '>' . $data['MdCateName'] : '' }}</td>
                            <td>{{ $data['CampusCcdName'] }}</td>
                            <td>[{{ $data['ProdCode'] }}] {{ $data['ProdName'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <p class="pl-5"><i class="fa fa-check-square-o"></i> 주문정보</p>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-odd">
                        <th>No</th>
                        <th>결제일</th>
                        <th>결제금액</th>
                        <th>환불금액</th>
                        <th>미납금액</th>
                        <th>주문번호</th>
                        <th>비고</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="7" class="bg-odd text-center pt-5 pb-5">
                            <div class="inline-block no-margin">
                                [총 주문금액] <span class="">{{ number_format($unpaid_data['OrgPayPrice']) }}원</span> |
                                [총 기결제금액] <span class="blue">{{ number_format($unpaid_data['tRealPayPrice']) }}원</span> |
                                [총 기환불금액] <span class="red">{{ number_format($unpaid_data['tRefundPrice']) }}원</span> |
                                [총 미납금액] <span class="red">{{ number_format($unpaid_data['tRealUnPaidPrice']) }}원</span>
                            </div>
                        </td>
                    </tr>
                    @foreach($unpaid_hist as $row)
                        <tr>
                            <td>{{ $loop->remaining }}</td>
                            <td>{{ $row['CompleteDatm'] }}</td>
                            <td>{{ number_format($row['RealPayPrice']) }}</td>
                            <td>{{ number_format($row['RefundPrice']) }}</td>
                            <td>{{ number_format($row['RealUnPaidPrice']) }}</td>
                            <td><a href="{{ site_url('/pay/offProfAssign/show/' . $row['OrderIdx']) }}" class="blue" target="_blank"><u>{{ $row['OrderNo'] }}</u></a></td>
                            <td>{{ $row['UnPaidMemo'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-md-12">
                <p class="pl-5"><i class="fa fa-check-square-o"></i> 주문정보</p>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-odd">
                            <th class="valign-middle">주문번호</th>
                            <th class="valign-middle">회원정보</th>
                            <th class="valign-middle">수강증</th>
                            <th class="valign-middle">종합반<br/>수강번호</th>
                            <th class="valign-middle">카테고리</th>
                            <th class="valign-middle">캠퍼스</th>
                            <th class="valign-middle">종합반명</th>
                            <th class="valign-middle">결제루트</th>
                            <th class="valign-middle">결제수단</th>
                            <th>결제금액<br/>(환불금액)</th>
                            <th>결제완료일<br/>(환불완료일)</th>
                            <th class="valign-middle">결제상태</th>
                            <th class="valign-middle">미수금여부</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{{ site_url('/pay/offProfAssign/show/' . $data['OrderIdx']) }}" class="blue" target="_blank"><u>{{ $data['OrderNo'] }}</u></a><br/>{{ $data['SiteName'] }}</td>
                            <td>{{ $data['MemName'] }}({{ $data['MemId'] }})<br/>{{ $data['MemPhone'] }}</td>
                            <td>{{ $data['CertNo'] }}</td>
                            <td>{{ $data['PackCertNo'] }}</td>
                            <td>{{ $data['LgCateName'] }}{{ empty($data['MdCateName']) === false ? '>' . $data['MdCateName'] : '' }}</td>
                            <td>{{ $data['CampusCcdName'] }}</td>
                            <td>[{{ $data['ProdCode'] }}] {{ $data['ProdName'] }}</td>
                            <td>{{ $data['PayRouteCcdName'] }}</td>
                            <td>{{ $data['PayMethodCcdName'] }}</td>
                            <td>{{ number_format($data['RealPayPrice']) }}
                                {!! $data['PayStatusCcd'] === $chk_pay_status_ccd['refund'] ? '<br/>(' . number_format($data['RefundPrice']) . ')' : '' !!}
                            </td>
                            <td>{{ $data['CompleteDatm'] }}
                                {!! $data['PayStatusCcd'] === $chk_pay_status_ccd['refund'] ? '<br/>(' . $data['RefundDatm'] . ')' : '' !!}
                            </td>
                            <td>{{ $data['PayStatusCcdName'] }}</td>
                            <td>{{ $data['IsUnPaid'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        <div class="col-md-12 mt-10">
            <p class="pl-5"><i class="fa fa-check-square-o"></i> 강사배정</p>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <ul class="nav nav-tabs bar_tabs mb-10" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_ess" role="tab" data-toggle="tab">필수과목</a></li>
                        <li role="presentation"><a href="#tab_choice" role="tab" data-toggle="tab">선택과목 (과정별 {{ $data['PackSelCount'] }}과목 선택가능)</a></li>
                    </ul>
                </div>
                <div class="col-md-2 text-right pt-20">
                    <button type="button" name="_btn_prof_assign_log" class="btn btn-sm btn-success mr-0">강사변경내역</button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="tab-content">
                @foreach($sub_prod_data as $key => $prod_data)
                    <div id="tab_{{ $key }}" class="tab-pane {{ $key == 'ess' ? 'active' : '' }}">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="bg-odd">
                                <th>과정</th>
                                <th>과목</th>
                                <th>선택</th>
                                <th>교수</th>
                                <th>수강형태</th>
                                <th width="260">단과반명</th>
                                <th>개강일~종강일</th>
                                <th>요일(회차)</th>
                                <th>수강생</th>
                                <th>강사배정기간</th>
                                <th>수강증출력</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prod_data as $row)
                                <tr>
                                    <td class="row_{{ $key }}_course_name">{{ $row['CourseName'] }}<span class="hide">{{ $row['CourseIdx'] }}</span></td>
                                    <td class="row_{{ $key }}_subject_name">{{ $row['SubjectName'] }}<span class="hide">{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}</span></td>
                                    <td><input type="checkbox" name="prod_code_sub_{{ $key }}_{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}" class="flat prod-code-sub" value="{{ $row['ProdCodeSub'] }}" {!! $row['IsAssign'] == 'Y' ? 'checked="checked"' : '' !!}/></td>
                                    <td>{{ $row['wProfName'] }}</td>
                                    <td>{{ $row['StudyPatternCcdName'] }}</td>
                                    <td>{{ $row['ProdNameSub'] }}
                                        @if(empty($row['LectureRoomSeatNo']) === false)
                                            <br/><span class="blue">좌석번호 : {{ $row['LectureRoomSeatNo'] }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $row['StudyStartDate'] }}<br/>~{{ $row['StudyEndDate'] }}</td>
                                    <td>{{ $row['WeekArrayName'] }}({{ $row['Amount'] }})</td>
                                    <td>{{ number_format($row['AssignMemCnt']) }}</td>
                                    <td>{{ $row['ProfChoiceStartDate'] }}<br/>~{{ $row['ProfChoiceEndDate'] }}</td>
                                    <td>
                                        @if($row['IsAssign'] == 'Y')
                                            <button type="button" class="btn btn-xs btn-success mr-0 btn-sub-print" data-site-code="{{ $data['SiteCode'] }}" data-order-idx="{{ $data['OrderIdx'] }}" data-order-prod-idx="{{ $data['OrderProdIdx'] }}" data-prod-code-sub="{{ $row['ProdCodeSub'] }}">수강증출력</button>
                                        @endif
                                        {{-- 배정된 단과만 표기 => 이전 수강증출력 이력 표기 --}}
                                        @if($row['IsPrintCert'] == 'Y')
                                            <br/><a class="red cs-pointer btn-sub-print-log" data-toggle="popover" data-html="true" data-placement="left" data-content="" data-order-idx="{{ $data['OrderIdx'] }}" data-order-prod-idx="{{ $data['OrderProdIdx'] }}" data-prod-code-sub="{{ $row['ProdCodeSub'] }}">(Y)</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach

                {{-- 선택과목이 없는 경우 --}}
                @if(empty($sub_prod_data['choice']) === true)
                    <div id="tab_choice" class="tab-pane">
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="/public/js/lms/common_order.js"></script>
    <script type="text/javascript">
        var $_assign_form = $('#_prof_assign_form');

        $(document).ready(function() {
            $_assign_form.submit(function() {
                var _url = '{{ site_url('/pay/offProfAssign/store') }}';
                var prod_code_sub = '';

                // 상품코드서브 셋팅
                $_assign_form.find('.prod-code-sub').each(function() {
                    if($(this).is(':checked') === true) {
                        prod_code_sub += ',' + $(this).val();
                    }
                });
                $_assign_form.find('input[name="prod_code_sub"]').val(prod_code_sub.substr(1));

                ajaxSubmit($_assign_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        $datatable.draw();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                if ($_assign_form.find('.prod-code-sub:checked').length < 1) {
                    alert('단과반을 1개 이상 선택해 주세요.');
                    return false;
                }

                return confirm('적용 하시겠습니까?');
            }

            // 과목 선택 체크박스 클릭
            $_assign_form.on('ifChecked', '.prod-code-sub', function() {
                iCheckOnly($_assign_form.find('input[name="' + $(this).prop('name') + '"]'), $(this).val());
            });

            // 강사변경내역 버튼 클릭
            $_assign_form.on('click', 'button[name="_btn_prof_assign_log"]', function() {
                $('button[name="_btn_prof_assign_log"]').setLayer({
                    'url' : '{{ site_url('/pay/offProfAssign/assignLog/') }}',
                    'width' : 900,
                    'height' : 600,
                    'modal_id' : 'profAssignLog',
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'order_idx', 'name' : '주문식별자', 'value' : $_assign_form.find('input[name="order_idx"]').val(), 'required' : true },
                        { 'id' : 'order_prod_idx', 'name' : '주문상품식별자', 'value' : $_assign_form.find('input[name="order_prod_idx"]').val(), 'required' : true }
                    ]
                });
            });

            // 수강증 출력 버튼 클릭
            $_assign_form.on('click', '.btn-sub-print', function() {
                var url = '{{ site_url('/common/printCert/') }}?prod_type=off_sub_lecture&order_idx=' + $(this).data('order-idx')
                    + '&order_prod_idx=' + $(this).data('order-prod-idx') + '&prod_code_sub=' + $(this).data('prod-code-sub') + '&site_code=' + $(this).data('site-code');
                popupOpen(url, '_cert_print', 620, 350);
            });

            // 수강증 출력 로그 보기
            $_assign_form.on('mouseover', '.btn-sub-print-log', function() {
                // 수강증 출력 로그 조회
                if ($(this).data('content').length < 1) {
                    var html = getPrintCertLog('SubLecCert', $(this).data('order-idx'), $(this).data('order-prod-idx'), $(this).data('prod-code-sub'));
                    $(this).data('content', html);
                }
            });

            {{-- 강사미배정일 경우만 필수과목 과정/과목별 단과반이 1개일 경우 선택 처리 --}}
            @if($is_prof_assign === false)
                function setOnlyLectureChecked() {
                    $_assign_form.find('#tab_ess').find('.prod-code-sub').each(function () {
                        if ($_assign_form.find('#tab_ess').find('input[name="' + $(this).prop('name') + '"]').length === 1) {
                            $(this).iCheck('check');
                        }
                    });
                }
                setOnlyLectureChecked();
            @endif

            // 과정, 과목 rowspan
            setRowspan('row_ess_course_name');
            setRowspan('row_ess_subject_name');
            setRowspan('row_choice_course_name');
            setRowspan('row_choice_subject_name');
        });
    </script>
    {{-- 쓰기권한 체크 메시지 --}}
    {!! check_menu_perm_alert('write') !!}
@stop

@section('add_buttons')
    @if($data['PayStatusCcd'] === $chk_pay_status_ccd['paid'])
        <button type="submit" name="_btn_prof_assign" class="btn btn-success">적용</button>
    @endif
@endsection

@section('layer_footer')
    </form>
@endsection