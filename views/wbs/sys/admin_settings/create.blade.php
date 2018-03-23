@extends('lcms.layouts.master_modal')

@section('layer_title')
    환경설정
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
@endsection

@section('layer_content')
    {!! form_errors() !!}
    <div class="form-group form-group-sm">
        <label class="control-label col-md-3" for="is_sidebar">전체 LNB메뉴 설정
        </label>
        <div class="col-md-8 item form-inline">
            <div class="radio">
                <input type="radio" name="sidebar_size" class="flat" value="md" required="required" title="LNB메뉴 설정" @if($method == 'POST' || $data['sidebar_size']=='md')checked="checked"@endif/> 펼침
                &nbsp; <input type="radio" name="sidebar_size" class="flat" value="sm" @if($data['sidebar_size']=='sm')checked="checked"@endif/> 숨김
            </div>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-3" for="home_url">Home 설정
        </label>
        <div class="col-md-8 item">
            <input type="text" id="home_url" name="home_url" class="form-control" title="Home 설정" value="{{ $data['home_url'] or '' }}" placeholder="메인 탭 경로 셋팅">
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 환경설정 등록
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/adminSettings/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        location.reload();
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