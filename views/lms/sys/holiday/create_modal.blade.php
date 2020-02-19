@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{$mode == 'add' ? '휴일 입력' : '휴일 수정'}}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="mode" value="{{$mode}}" />
        <input type="hidden" name="idx" value="{{$mode == 'mod' ? $data['hIdx'] : ''}}" />
        @endsection

        @section('layer_content')
            {!! form_errors() !!}
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-3" for="date">날짜 <span class="required">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" id="date" name="date" class="form-control datepicker" readonly required="required" class="form-control" title="날짜" value="{{$mode == 'mod' ? $data['hDate'] : ''}}">
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-3" for="desc">설명 <span class="required">*</span>
                </label>
                <div class="col-md-8">
                    <textarea id="desc" name="desc" required="required" class="form-control" rows="5" placeholder="" title="설명">{{$mode == 'mod' ? $data['hDesc'] : ''}}</textarea>
                </div>
            </div>
        @if($mode == 'mod')
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-3" for="date">상태</span>
                </label>
                <div class="col-md-8">
                    <label><input type="radio" name="isuse" {{$data['IsUse'] == 'Y' ? 'CHECKED' : ''}} value='Y' > <span class="blue">사용</span></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="isuse" {{$data['IsUse'] == 'N' ? 'CHECKED' : ''}} value='N' > <span class="red">미사용</span></label>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-3" for="date">등록자</span>
                </label>
                <div class="col-md-8">{{$data['regAdminName']}}</div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-3" for="date">등록일</span>
                </label>
                <div class="col-md-8">{{$data['RegDatm']}}</div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-3" for="date">수정자</span>
                </label>
                <div class="col-md-8">{{$data['updAdminName']}}</div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-3" for="date">수정일</span>
                </label>
                <div class="col-md-8">{{$data['UpdDatm']}}</div>
            </div>
        @endif
            <script type="text/javascript">
                var $regi_form = $('#regi_form');

                $(document).ready(function() {
                    // ajax submit
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/sys/holiday/store') }}';

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