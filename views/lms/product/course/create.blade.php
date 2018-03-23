@extends('lcms.layouts.master_modal')

@section('layer_title')
    과정 정보
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
@endsection

@section('layer_content')
    <div class="form-group form-group-sm">
        <div class="x_title text-right">
            <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
        </div>
    </div>
    {!! form_errors() !!}
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <select class="form-control" id="site_code" name="site_code">
                <option value="">사이트선택</option>
                @foreach($site_codes as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
        </div>
        <label class="control-label col-md-2" for="is_use">사용 여부 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <div class="radio">
                <input type="radio" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> 사용
                &nbsp; <input type="radio" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> 미사용
            </div>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="course_name">과정명 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <input type="text" id="course_name" name="course_name" required="required" class="form-control" title="과정명" value="{{ $data['CourseName'] }}">
        </div>
        <label class="control-label col-md-2" for="">과정 코드
        </label>
        <div class="col-md-4">
            <p class="form-control-static">@if($method == 'PUT'){{ $data['CourseIdx'] }}@else # 등록 시 자동 생성 @endif</p>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="keywords">키워드
        </label>
        <div class="col-md-4 item">
            <input type="text" id="keywords" name="keywords" class="form-control" title="키워드" value="{{ $data['Keywords'] }}">
        </div>
        <label class="control-label col-md-2" for="order_num">정렬
        </label>
        <div class="col-md-1">
            <input type="text" name="order_num" class="form-control" value="{{ $data['OrderNum'] }}" style="width: 60px;" />
        </div>
        <div class="col-md-3">
            <p class="form-control-static"># 미 입력시 마지막 DP</p>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2">등록자
        </label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
        </div>
        <label class="control-label col-md-2">등록일
        </label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $data['RegDatm'] }}</p>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2">최종 수정자
        </label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
        </div>
        <label class="control-label col-md-2">최종 수정일
        </label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 과정 등록
            $regi_form.submit(function() {
                var _url = '{{ site_url('/product/course/store') }}';

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