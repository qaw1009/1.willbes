@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">
        <p>- 환불된 상품의 성적데이터 이관.</p>
        <p>- 같은 상품만 이관 가능합니다.</p>
    </h5>
    <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-2 control-label">아이디</label>
                    <div class="col-md-2 form-inline">
                        <input type="text" class="form-control" name="mem_id">
                    </div>
                    <label class="col-md-2 control-label">상품코드</label>
                    <div class="col-md-2 form-inline">
                        <input type="text" class="form-control" name="prod_code">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-2 control-label">환불된 수험번호</label>
                    <div class="col-md-2 form-inline">
                        <input type="text" class="form-control" name="refund_take_num">
                    </div>
                    <label class="col-md-2 control-label">환불된 주문번호</label>
                    <div class="col-md-3 form-inline">
                        <input type="text" class="form-control" name="refund_order_no">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-2 control-label">이괄할 대상 수험번호</label>
                    <div class="col-md-2 form-inline">
                        <input type="text" class="form-control" name="take_num">
                    </div>
                    <label class="col-md-2 control-label">이괄할 대상 주문번호</label>
                    <div class="col-md-3 form-inline">
                        <input type="text" class="form-control" name="order_no">
                    </div>
                </div>

                <div class="pt-10">
                    <div class="col-md-12 text-left">
                        <button type="submit" class="btn btn-primary" id="btn_submit">이관처리</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $regi_form.submit(function() {
            if (!confirm('이관 완료 후 복구는 불가능합니다. 그래도 진행 하시겠습니까?')) {
                return;
            }

            var _url = '{{site_url('/mocktest/transferData/store')}}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                }
            }, showValidateError, null, false, 'alert');
        });
    </script>
@stop