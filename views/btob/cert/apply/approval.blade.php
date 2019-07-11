@extends('btob.layouts.master_modal')

@section('layer_title')
    승인관리
@stop

@section('layer_header')
    <form class="form-horizontal" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
        <input type="hidden" name="approval_status" value=""/>
@endsection

@section('layer_content')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">인증회차
                </label>
                <div class="col-md-2 form-control-static">
                    {{ $data['ApplySeq'] }}
                </div>
                <label class="control-label col-md-2">회원정보
                </label>
                <div class="col-md-6 form-control-static">
                    {{ $data['MemName'] }} ({{ $data['MemId'] }}) | {{ $data['MemPhone'] }} | {{ $data['BirthDay'] }}({{ $data['SexKr'] }})
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">지역
                </label>
                <div class="col-md-2 form-control-static">
                    {{ $data['AreaCcdName'] }}
                </div>
                <label class="control-label col-md-2">지점
                </label>
                <div class="col-md-6 form-control-static">
                    {{ $data['BranchCcdName'] }}
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">수험직렬
                </label>
                <div class="col-md-2 form-control-static">
                    {{ $data['TakeKindCcdName'] }}
                </div>
                <label class="control-label col-md-2">신청상품
                </label>
                <div class="col-md-6 form-control-static">
                    {{ $data['ProdName'] }}
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">진행상태
                </label>
                <div class="col-md-2 form-control-static">
                    <span class="{{ $data['ApprovalStatusColor'] }}">{{ $data['ApprovalStatusName'] }}</span>
                </div>
                <label class="control-label col-md-2">수강기간
                </label>
                <div class="col-md-6 form-inline">
                    <div class="input-group mb-0 item">
                        <input type="text" class="form-control datepicker" id="lec_start_date" name="lec_start_date" title="수강시작일" readonly="readonly" value="{{ $data['LecStartDate'] }}">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <input type="text" class="form-control datepicker" id="lec_end_date" name="lec_end_date" title="수강종료일" readonly="readonly" value="{{ $data['LecEndDate'] }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-15">
        <div class="col-md-12 form-inline text-right">
            @if($data['ApprovalStatus'] == 'N')
                {{-- 미승인일 경우만 노출 --}}
                <button type="button" name="btn_approval_reject" data-approval-status="R" data-confirm-msg="승인반려" class="btn btn-success btn-approval-proc">승인반려(재인증가능)</button>
                <button type="button" name="btn_approval_complete" data-approval-status="Y" data-confirm-msg="승인완료(수강등록)" class="btn btn-primary btn-approval-proc mr-0">승인완료(수강등록)</button>
            @elseif($data['ApprovalStatus'] == 'Y')
                {{-- 승인완료일 경우만 노출 --}}
                <button type="button" name="btn_approval_cancel" data-approval-status="C" data-confirm-msg="승인취소(수강취소)" class="btn btn-danger btn-approval-proc">승인취소(수강취소)</button>
            @endif
        </div>
    </div>
    <div class="well well-sm mt-20 mb-0">
        <p class="bold pl-10 mt-10">[승인 진행 관련(진행상태) 안내사항]</p>
        <ul class="no-margin mb-10">
            <li>미승인 : 사용자 신청 직후 상태</li>
            <li>승인반려 : 신청 정보가 불확실하여 승인반려한 상태 <span class="blue">(재인증 신청 가능)</span></li>
            <li>승인완료 : 신청 상품이 수강부여된 상태
                <br/>- 승인완료 처리 시 신청 상품 자동 수강 등록 처리됨
            </li>
            <li>승인취소 : 환불이나, 불가피한 사유로 수강 중지가 필요하여 승인취소한 상태 <span class="blue">(재인증 신청 가능)</span>
                <br/>- 승인취소 처리 시 신청 상품 자동 수강 종료 처리됨
            </li>
            <li>승인만료 : 부여한 수강기간이 종료된 상태 <span class="blue">(재인증 신청 가능)</span>
                <br/>- 해당 수강기간이 지나면 자동으로 만료 처리됨
            </li>
        </ul>
    </div>
    <script type="text/javascript">
        var $_regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 승인처리 버튼 클릭
            $_regi_form.on('click', '.btn-approval-proc', function() {
                // confirm 메시지
                var confirm_msg = '정말로 ' + $(this).data('confirm-msg') + ' 하시겠습니까?';

                // 승인상태
                $_regi_form.find('input[name="approval_status"]').val($(this).data('approval-status'));

                // 승인완료 버튼 클릭
                if ($(this).data('approval-status') === 'Y') {
                    if ($_regi_form.find('input[name="lec_start_date"]').val() === '') {
                        alert('수강시작일을 선택해 주세요.');
                        return;
                    }
                    if ($_regi_form.find('input[name="lec_end_date"]').val() === '') {
                        alert('수강종료일을 선택해 주세요.');
                        return;
                    }

                    // 수강기간 계산
                    var lec_diff_days = moment($_regi_form.find('input[name="lec_end_date"]').val(), 'YYYY-MM-DD').diff($_regi_form.find('input[name="lec_start_date"]').val(), 'days');
                    if (lec_diff_days < 0) {
                        alert('수강종료일은 수강시작일보다 작을 수 없습니다.');
                        return;
                    }

                    // 수강기간 체크 (28일 미만일 경우 메시지 추가)
                    if (lec_diff_days < 27) {
                        confirm_msg = '일반적인 수강기간 설정이 아닙니다.\n' + confirm_msg;
                    }
                }

                if (!confirm(confirm_msg)) {
                    return;
                }

                var url = '{{ site_url('/cert/apply/approval') }}';
                ajaxSubmit($_regi_form, url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        $datatable.draw();
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection