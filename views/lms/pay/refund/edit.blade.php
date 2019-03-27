@extends('lcms.layouts.master_modal')

@section('layer_title')
    환불요청정보수정
@stop

@section('layer_header')
    <form class="form-horizontal" id="_refund_edit_form" name="_refund_edit_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="order_idx" value="{{ $order_idx }}"/>
        <input type="hidden" name="refund_req_idx" value="{{ $refund_req_idx }}"/>
@endsection

@section('layer_content')
    <div class="row">
        <div class="col-md-12 mt-10">
            <table class="table table-bordered">
                <colgroup>
                    <col width="120px"/>
                    <col width="*"/>
                </colgroup>
                <tbody>
                <tr>
                    <th class="bg-odd">환불정보
                        <div class="mt-5">
                            {!! $data['IsApproval'] == 'Y' ? '<i class="fa fa-check-square-o"></i> 지결' : '' !!}
                        </div>
                        <div class="mt-5">
                            {!! $data['RefundType'] == 'P' ? '<i class="fa fa-check-square-o"></i> 연동환불' : '' !!}
                        </div>
                    </th>
                    <td class="form-inline form-group-sm pl-15" colspan="3">
                        @if($data['RefundType'] == 'B')
                        <div class="mt-5">
                            [입금은행]
                            <select class="form-control ml-5 mr-30" id="refund_bank_ccd" name="refund_bank_ccd" title="입금은행">
                                <option value="">은행선택</option>
                                @foreach($arr_bank_ccd as $key => $val)
                                    <option value="{{ $key }}" {{ $data['RefundBankCcd'] == $key ? 'selected="selected"' : '' }}>{{ $val }}</option>
                                @endforeach
                            </select>
                            [계좌번호]
                            <input type="number" id="refund_account_no" name="refund_account_no" class="form-control ml-5 mr-30" title="계좌번호" value="{{ $data['RefundAccountNo'] }}"/>
                            [예금주]
                            <input type="text" id="refund_deposit_name" name="refund_deposit_name" class="form-control ml-5" title="예금주" value="{{ $data['RefundDepositName'] }}"/>
                        </div>
                        @endif
                        <div class="mt-10 item">
                            [환불사유]
                            <input type="text" id="refund_reason" name="refund_reason" class="form-control ml-5" title="환불사유" required="required" value="{{ $data['RefundReason'] }}" style="width: 86%;"/>
                        </div>
                        <div class="mt-10">
                            [환불메모]
                            <input type="text" id="refund_memo" name="refund_memo" class="form-control ml-5" title="환불메모" value="{{ $data['RefundMemo'] }}" style="width: 86%;"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="bg-odd">등록자</th>
                    <td>{{ $data['RefundReqAdminName'] }}</td>
                    <th class="bg-odd">등록일시</th>
                    <td>{{ $data['RefundReqDatm'] }}</td>
                </tr>
                <tr>
                    <th class="bg-odd">수정자</th>
                    <td>{{ $data['RefundReqUpdAdminName'] }}</td>
                    <th class="bg-odd">수정일시</th>
                    <td>{{ $data['RefundReqUpdDatm'] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $_refund_edit_form = $('#_refund_edit_form');

        $(document).ready(function() {
            $_refund_edit_form.submit(function() {
                var _url = '{{ site_url('/pay/refundProc/update') }}';

                ajaxSubmit($_refund_edit_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        //notifyAlert('success', '알림', ret.ret_msg);
                        alert(ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        location.reload();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                var $refund_bank_ccd = $_refund_edit_form.find('select[name="refund_bank_ccd"]');
                var $refund_account_no = $_refund_edit_form.find('input[name="refund_account_no"]');
                var $refund_deposit_name = $_refund_edit_form.find('input[name="refund_deposit_name"]');

                if ($refund_bank_ccd.val() !== '' || $refund_account_no.val() !== '' || $refund_deposit_name.val() !== '') {
                    if (!($refund_bank_ccd.val() !== '' && $refund_account_no.val() !== '' && $refund_deposit_name.val() !== '')) {
                        alert('환불계좌정보를 모두 입력해 주세요.');
                        return false;
                    }
                }

                if (!confirm('수정 하시겠습니까?')) {
                    return false;
                }

                return true;
            }
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" name="_btn_refund_edit" class="btn btn-success">수정</button>
@endsection

@section('layer_footer')
    </form>
@endsection