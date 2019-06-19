@extends('lcms.layouts.master_modal')

@section('layer_title')
    과제등록
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" novalidate action="{{ site_url('/crm/sms/storeSend') }}">--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}

        @foreach($input_params as $key => $val)
            <input type="hidden" name="{{$key}}" value="{{$val}}">
        @endforeach
        @endsection

        @section('layer_content')
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="title">과제명<span class="required">*</span></label>
                        <div class="col-md-8 item">
                            <input type="text" id="title" name="title" required="required" class="form-control" maxlength="46" title="제목" value="{{ $data['Title'] }}" placeholder="제목 입니다.">
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="supporters_start_date">제출기간<span class="required">*</span></label>
                        <div class="col-md-4 item">
                            <div class="input-group mb-0">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control datepicker" id="supporters_start_date" name="supporters_start_date" title="제출시작일자" value="{{ $data['SupportersStartDate'] }}" required="required">
                                <div class="input-group-addon no-border no-bgcolor">~</div>
                                <div class="input-group-addon no-border-right">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control datepicker" id="supporters_end_date" name="supporters_end_date" title="제출종료일자" value="{{ $data['SupportersEndDate'] }}" required="required">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="is_use_y">사용여부<span class="required">*</span></label>
                        <div class="col-md-4 item form-inline">
                            <div class="radio">
                                <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                                <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="attach_img_1">첨부</label>
                        <div class="col-md-10 form-inline">
                            @for($i = 0; $i < $attach_file_cnt; $i++)
                                <div class="title">
                                    <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control input-file" title="첨부{{ $i }}"/>
                                </div-->
                                    @if(empty($data['arr_attach_file_path'][$i]) === false)
                                        <p class="form-control-static">[ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_attach_file_path'][$i].$data['arr_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_attach_file_real_name'][$i]) }}" target="_blank">
                                                {{ $data['arr_attach_file_real_name'][$i] }}
                                            </a> ]
                                            <a href="#none" class="file-delete" data-attach-idx="{{ $data['arr_attach_file_idx'][$i]  }}"><i class="fa fa-times red"></i></a>
                                        </p>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="form-group form-group-sm item">
                        <label class="control-label col-md-2" for="content">내용 <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
            <script src="/public/vendor/cheditor/cheditor.js"></script>
            <script src="/public/js/editor_util.js"></script>
            <script type="text/javascript">
                var $modal_regi_form = $('#modal_regi_form');
                $(document).ready(function() {
                    var $editor_profile = new cheditor();
                    $editor_profile.config.editorHeight = '170px';
                    $editor_profile.config.editorWidth = '100%';
                    $editor_profile.inputForm = 'board_content';
                    $editor_profile.run();

                    $modal_regi_form.submit(function() {
                        getEditorBodyContent($editor_profile);
                        var _url = '{{ site_url("/site/supporters/assignment/storeAssignment/") }}' + getQueryString();

                        ajaxSubmit($modal_regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                $datatable.draw();
                            }
                        }, showValidateError, null, false, 'alert');
                    });

                    //파일다운로드
                    $('.file-download').click(function() {
                        var _url = '{{ site_url("/site/supporters/assignment/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                        window.open(_url, '_blank');
                    });

                    // 파일삭제
                    $('.file-delete').click(function() {
                        var _url = '{{ site_url("/site/supporters/assignment/destroyFile/") }}' + getQueryString();
                        var data = {
                            '{{ csrf_token_name() }}' : $modal_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'DELETE',
                            'attach_idx' : $(this).data('attach-idx')
                        };
                        if (!confirm('정말로 삭제하시겠습니까?')) {
                            return;
                        }
                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                $datatable.draw();
                            }
                        }, showError, false, 'POST');
                    });
                });

                $(function() {
                    var $fileBox = $('.filetype');

                    $fileBox.each(function() {
                        var $fileUpload = $(this).find('.input-file'),
                            $fileText = $(this).find('.file-text').attr('disabled', 'disabled'),
                            $fileReset = $(this).find('.file-reset');

                        $fileUpload.on('change', function() {
                            var fileName = $(this).val();
                            $fileText.attr('disabled', 'disabled').val(fileName);
                        });

                        $fileReset.click(function() {
                            $(this).parents($fileBox).find($fileText).val('');
                            $(this).parents($fileBox).find($fileUpload).val('');
                        });
                    });
                });
            </script>
        @stop


        @section('add_buttons')
            <button type="submit" class="btn btn-success">등록</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection