@extends('lcms.layouts.master_modal')
@section('layer_title')
    입력 Form
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="idx" value=""/>
@endsection

@section('layer_content')
    {!! form_errors() !!}
    <div class="form-group form-group-sm item">
        <label class="control-label col-md-3" for="name">Name <span class="required">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="name" name="name" required="required" class="form-control" title="이름" value="">
        </div>
    </div>
    <div class="form-group form-group-sm item">
        <label class="control-label col-md-3" for="title">Title <span class="required">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="title" name="title" required="required" class="form-control" title="제목" value="">
        </div>
    </div>
    <div class="form-group form-group-sm item">
        <label class="control-label col-md-3" for="content">Content <span class="required">*</span>
        </label>
        <div class="col-md-8">
            <textarea id="content" name="content" required="required" class="form-control" rows="10" placeholder="" title="내용"></textarea>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sample/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        $datatable.draw();
                    }
                }, showValidateError, null, false, 'alert');
            });

            // form submit
            {{--$regi_form.attr('action', '{{ site_url('/sample/store') }}');--}}
            {{--formSubmit($regi_form);--}}
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">Submit</button>
@endsection

@section('layer_footer')
    </form>
@endsection