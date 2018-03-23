@extends('lcms.layouts.master')
@section('page_title')
    시스템 공통관리 <i class="fa fa-angle-right"></i> <span class="blue">공통코드관리</span>
@stop

@section('content')
    <div class="x_panel">
        <div class="x_title">
            입력 Form
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" novalidate>--}}
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-3" for="name">Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" id="name" name="name" required="required" class="form-control" title="이름" value="{{ $data['name'] }}">
                    </div>
                </div>
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-3" for="title">Title <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" id="title" name="title" required="required" class="form-control" title="제목" value="{{ $data['title'] }}">
                    </div>
                </div>
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-3" for="content">Content <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <textarea id="content" name="content" required="required" class="form-control" rows="10" placeholder="" title="내용">{!! $data['content'] !!}</textarea>
                    </div>
                </div>
                @for($i = 1; $i <= 3; $i++)
                    <div class="form-group form-group-sm item">
                        <label class="control-label col-md-3" for="content">Attach File{{ $i }}
                        </label>
                        <div class="col-md-6">
                            <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control" title="파일{{ $i }}"/>
                        </div>
                    </div>
                @endfor
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-3" for="content">User File
                    </label>
                    <div class="col-md-6">
                        <input type="file" id="user_file" name="user_file" class="form-control" title="사용자 파일"/>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button class="btn btn-primary" type="button" id="btn_cancel">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // ajax submit
            $regi_form.submit(function() {
                var _url = ('{{ $method }}' == 'PUT') ?  '{{ site_url('/sample/update') }}' : '{{ site_url('/sample/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/sample/index') }}');
                    }
                }, showValidateError, null, false, 'alert');
            });

            // form submit
            {{--$regi_form.attr('action', '{{ site_url('/sample/store') }}');--}}
            {{--formSubmit($regi_form);--}}

            $('#btn_cancel').click(function() {
                location.replace('{{ site_url('/sample/index') }}');
            });

            // 사이드바 메뉴 강제 고정
            forceMenuActive('{{ site_url('/sample/index') }}');
        });
    </script>
@stop
