@extends('lcms.layouts.master_modal')

@section('layer_title')
    학습상담 확인
@stop

@section('layer_header')
@endsection

@section('layer_content')
    <form class="form-horizontal" id="_search_form_calendar" name="_search_form_calendar" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">제목</label>
            <div class="col-md-11 form-control-static">
                {{$data['Title']}}
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">수강정보</label>
            <div class="col-md-11 form-control-static">
                {{$data['TypeCcdName']}} <span class="ml-10 mr-10">|</span> {{$data['SubjectName']}} <span class="ml-10 mr-10">|</span> {{$data['ProdName']}}
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">공개여부</label>
            <div class="col-md-5 form-control-static">
                {!! ($data['IsPublic'] == 'Y') ? '공개' : '<span class="red">비공개</span>'  !!}
            </div>
            <label class="col-md-1 control-label">조회수</label>
            <div class="col-md-5 form-control-static">
                {{$data['ReadCnt']}} ({{$data['SettingReadCnt']}})
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">첨부</label>
            <div class="col-md-11 form-control-static">
                @for($i = 0; $i < $attach_file_cnt; $i++)
                    @if(empty($data['arr_attach_file_path'][$i]) === false)
                        [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_attach_file_path'][$i].$data['arr_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_attach_file_real_name'][$i]) }}" target="_blank">
                            {{ $data['arr_attach_file_real_name'][$i] }}
                        </a> ]
                    @endif
                @endfor
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">상담내용</label>
            <div class="col-md-11">
                {!! nl2br($data['Content']) !!}
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">등록자</label>
            <div class="col-md-5 form-control-static">
                {{$data['MemName']}}({{$data['MemId']}})
            </div>
            <label class="col-md-1 control-label">등록일</label>
            <div class="col-md-5 form-control-static">
                {{ $data['RegDatm'] }}
            </div>
        </div>
    </form>

    <div class="x_panel">
        <form class="form-horizontal form-label-left" id="_regi_form_modal" name="_regi_form_modal" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" name="idx" value="{{ $board_idx }}"/>
            <div class="row">
                <label class="col-md-1" for="">내용 <span class="required">*</span></label>
                <div class="col-md-9">
                    <textarea id="reply_contents" name="reply_contents" class="form-control" rows="7" title="내용" placeholder="">{!! $data['ReplyContent'] !!}</textarea>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1-1 mt-15 text-right"  for="attach_img_1">첨부</label>
                <div class="form-group form-group-sm">
                    <div class="col-md-9 form-inline">
                        <a id="btn_attach_toggle" href="#none">첨부펼침 <span id="attach_toggle_img" class="fa fa-chevron-up"></span></a>
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            <div class="title attach-file-div @if($i!==0) hide @endif">
                                <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control input-file" title="첨부{{ $i }}"/>
                                @if(empty($data['arr_reply_attach_file_path'][$i]) === false)
                                    <p class="form-control-static ml-30 mr-10">
                                        [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_reply_attach_file_path'][$i].$data['arr_reply_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_reply_attach_file_real_name'][$i]) }}" target="_blank">
                                            {{ $data['arr_reply_attach_file_real_name'][$i] }}
                                        </a> ]
                                        <a href="#none" class="file-delete" data-attach-idx="{{ $data['arr_reply_attach_file_idx'][$i]  }}"><i class="fa fa-times red"></i></a>
                                    </p>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm text-center btn-wrap mt-50">
                <button type="submit" class="btn btn-success" id="btn_modify">답변등록</button>
            </div>
        </form>
    </div>
@stop
@section('add_buttons')

@endsection
@section('layer_footer')
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>

    <script type="text/javascript">
        var $_regi_form_modal = $('#_regi_form_modal');

        $(document).ready(function() {
            // editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.editorHeight = '170px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'reply_contents';
            $editor_profile.run();

            $('#btn_attach_toggle').click(function() {
                var $attach_toggle_img = $('#attach_toggle_img');
                if($attach_toggle_img.hasClass('fa-chevron-up') === true) {
                    $attach_toggle_img.removeClass('fa-chevron-up');
                    $attach_toggle_img.addClass('fa-chevron-down');
                    $('.attach-file-div').each(function(i) {
                        if(i !== 0){
                            $(this).removeClass('hide');
                            $(this).addClass('show');
                        }
                    });
                } else {
                    $attach_toggle_img.removeClass('fa-chevron-down');
                    $attach_toggle_img.addClass('fa-chevron-up');
                    $('.attach-file-div').each(function(i) {
                        if(i !== 0){
                            $(this).removeClass('show');
                            $(this).addClass('hide');
                        }
                    });
                }
            });

            // ajax submit
            $_regi_form_modal.submit(function() {
                getEditorBodyContent($editor_profile);
                var _url = '{{ site_url("/site/supporters/member/storeReply") }}';

                ajaxSubmit($_regi_form_modal, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        $datatable.draw();
                    }
                }, showValidateError, null, false, 'alert');
            });

            $('.file-download').click(function() {
                var _url = '{{ site_url("/site/supporters/member/download") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });
        });
    </script>
@endsection