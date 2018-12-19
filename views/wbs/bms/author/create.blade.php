@extends('lcms.layouts.master_modal')

@section('layer_title')
    저자
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
@endsection

@section('layer_content')
    <div class="x_title text-right">
        <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
    </div>
    {!! form_errors() !!}
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="author_name">저자명 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <input type="text" id="author_name" name="author_name" required="required" class="form-control" title="저자명" value="{{ $data['wAuthorName'] }}">
        </div>
        <label class="control-label col-md-2" for="">저자 코드
        </label>
        <div class="col-md-4">
            <p class="form-control-static">@if($method == 'PUT'){{ $data['wAuthorIdx'] }}@else # 등록 시 자동 생성 @endif</p>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="is_use">사용 여부 <span class="required">*</span>
        </label>
        <div class="col-md-10 item form-inline">
            <div class="radio">
                <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
            </div>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="author_desc">설명</span>
        </label>
        <div class="col-md-10 item">
            <textarea id="author_desc" name="author_desc" class="form-control" rows="3" title="설명" placeholder="">{{ $data['wAuthorDesc'] }}</textarea>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2">등록자
        </label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $data['wRegAdminName'] }}</p>
        </div>
        <label class="control-label col-md-2">등록일
        </label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $data['wRegDatm'] }}</p>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2">최종 수정자
        </label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $data['wUpdAdminName'] }}</p>
        </div>
        <label class="control-label col-md-2">최종 수정일
        </label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $data['wUpdDatm'] }}</p>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 저자 등록
            $regi_form.submit(function() {
                var _url = '{{ site_url('/bms/author/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
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
    <button type="submit" class="btn btn-success">저장</button>
@endsection

@section('layer_footer')
    </form>
@endsection