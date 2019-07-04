@extends('lcms.layouts.master_modal')

@section('layer_title')
    제휴사 시스템 운영자 등록
@stop

@section('layer_header')
    <form class="form-horizontal" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
@endsection

@section('layer_content')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-sm">
                <label class="control-label col-md-3">기존 운영자 아이디 <span class="required">*</span>
                </label>
                <div class="col-md-3 item">
                    <input type="text" id="admin_id" name="admin_id" required="required" class="form-control" title="기존 운영자 아이디" value="">
                </div>
                <div class="col-md-6 form-control-static">
                    # LMS 운영자 아이디 조회
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-3">신규 운영자 아이디 <span class="required">*</span>
                </label>
                <div class="col-md-3 item">
                    <input type="text" id="btob_admin_id" name="btob_admin_id" required="required" class="form-control" title="신규 운영자 아이디" value="">
                </div>
                <div class="col-md-6 form-control-static">
                    # 제휴사 시스템 운영자 아이디
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-3">신규 운영자 비밀번호
                </label>
                <div class="col-md-3">
                    <input type="password" id="btob_admin_passwd" name="btob_admin_passwd" class="form-control" title="신규 운영자 비밀번호" value="">
                </div>
                <div class="col-md-6 form-control-static">
                    # 기존 비밀번호를 변경할 경우만 입력
                </div>
            </div>
        </div>
    </div>
    <div class="well mt-15">
        <ul class="no-margin">
            <li class="blue">기존 운영자 아이디를 기준으로 조회된 운영자 정보를 제휴사 시스템 운영자로 등록합니다.</li>
            <li>운영자 아이디가 동일할 경우 신규 운영자 아이디를 변경하여 등록해 주시기 바랍니다.</li>
            <li>LMS와 제휴사 시스템은 별개의 계정으로 운영됩니다.</li>
        </ul>
    </div>
    <script type="text/javascript">
        var $_regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 제휴사 시스템 운영자 등록
            $_regi_form.submit(function() {
                var _url = '{{ site_url('/sys/btob/btobRole/storeAdmin') }}';

                ajaxSubmit($_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">저장</button>
@endsection

@section('layer_footer')
    </form>
@endsection