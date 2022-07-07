@extends('lcms.layouts.master_single')

@section('content')
    <h3 class="text-left bold">Sample</h3>
    <div class="x_panel text-left">
        <div class="x_title bold">
            # Captcha
        </div>
        <div class="x_content">
            <form id="captcha_form" name="captcha_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <div class="row">
                    <div class="col-md-12">
                        {!! $captcha !!}
                    </div>
                    <div class="col-md-12 mt-10">
                        <input type="text" id="captcha_num" name="captcha_num" class="form-control col-md-1" title="인증번호" required="required" value="" maxlength="6">
                    </div>
                    <div class="col-md-12 mt-10">
                        <button type="submit" class="btn btn-success">저장</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="x_panel text-left">
        <div class="x_title bold">
            # Page cache
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ site_url('/common/sample/pageCache') }}" target="_blank" class="btn btn-primary">자체 페이지 캐시</a>
                    <a href="{{ site_url('/common/sample/urlCache') }}" target="_blank" class="btn btn-success">외부 페이지 캐시</a>
                    <a href="{{ site_url('/common/sample/createCache') }}" target="_blank" class="btn btn-dark">페이지 캐시 생성</a>
                    <a href="{{ site_url('/common/sample/loadCache') }}" target="_blank" class="btn btn-warning">페이지 캐시 로드</a>
                    <a href="{{ site_url('/common/sample/removeCache') }}" target="_blank" class="btn btn-danger">페이지 캐시 삭제</a>
                </div>
            </div>
        </div>
    </div>
    <div class="x_panel text-left">
        <div class="x_title bold">
            # Image base64 encoding upload
        </div>
        <div class="x_content">
            <form id="upload_form" name="upload_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" id="attach_img" name="attach_img" class="form-control col-md-2" title="업로드이미지" required="required"/>
                    </div>
                    <div class="col-md-12 mt-10">
                        <label>
                            <textarea id="enc_string" name="enc_string" class="form-control" required="required" style="width: 800px; height: 200px;"></textarea>
                        </label>
                    </div>
                    <div class="col-md-12 mt-10" id="preview_wrap" style="display: none;">
                        <img src="#" id="preview_img" alt="이미지 미리보기">
                        <img src="#" id="upload_img" alt="업로드 이미지" style="display: none;">
                    </div>
                    <div class="col-md-12 mt-10">
                        <button type="submit" class="btn btn-success">저장</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="x_panel text-left">
        <div class="x_title bold">
            # File upload
        </div>
        <div class="x_content">
            <form id="file_form" name="file_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" id="attach_file1" name="attach_file" class="form-control col-md-2" title="업로드파일1" required="required"/>
                    </div>
                    <div class="col-md-12 mt-10" id="attach_result" style="display: none;">
                    </div>
                    <div class="col-md-12 mt-10">
                        <button type="submit" class="btn btn-success">저장</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $captcha_form = $('#captcha_form');
        var $upload_form = $('#upload_form');
        var $file_form = $('#file_form');

        $(document).ready(function() {
            // Captcha 인증번호 비교
            $captcha_form.submit(function() {
                var _url = '{{ site_url('/common/sample/captchaVerify') }}';

                ajaxSubmit($captcha_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 이미지 선택 이벤트
            $upload_form.on('change', 'input[name="attach_img"]', function(event) {
                var file = event.target.files[0];   // $(this)[0].files[0];
                var reader  = new FileReader();

                if (file) {
                    reader.readAsDataURL(file);
                }

                reader.addEventListener('load', function() {
                    var enc_string = reader.result;
                    $upload_form.find('#enc_string').val(enc_string);
                    $upload_form.find('#preview_img').prop('src', enc_string);
                    $upload_form.find('#preview_wrap').show();
                }, false);
            });

            // 이미지 업로드
            $upload_form.submit(function() {
                var _url = '{{ site_url('/common/sample/uploadEncImg') }}';

                ajaxSubmit($upload_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        $upload_form.find('#upload_img').prop('src', ret.ret_data.upload_img).show();
                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 파일 업로드
            $file_form.submit(function() {
                var _url = '{{ site_url('/common/sample/uploadFile') }}';

                ajaxSubmit($file_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        var html = '';
                        $.each(ret.ret_data, function(i, item) {
                            Object.keys(item).forEach(function(key) {
                                html += key + ' = ' + item[key] + '<br/>';
                            });
                            html += '<br/><img src="' + item['full_url'] + '" alt="업로드파일">';
                        });

                        $file_form.find('#attach_result').html(html);
                        $file_form.find('#attach_result').show();
                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>

@stop
