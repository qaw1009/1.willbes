@extends('lcms.layouts.master_modal')

@section('layer_title')
    첨삭현황
@stop

@section('layer_header')
<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
@endsection

@section('layer_content')
<div class="x_panel">
    <div class="x_content">
        <div class="form-group form-group-sm">
            <label class="control-label form-control-static col-md-1">강의명</label>
            <div class="col-md-10 form-control-static">
                제목 입니다.
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1 form-control-static">등록자</label>
            <div class="col-md-2 form-control-static">
                회원명 (아이디)
            </div>
            <label class="control-label col-md-2 form-control-static">휴대폰번호</label>
            <div class="col-md-2 form-control-static">
                010-0000-0000 (Y)
            </div>
            <label class="control-label col-md-2 form-control-static">등록일</label>
            <div class="col-md-3 form-control-static">
                2018-00-00 00:00
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1 form-control-static">채첨여부</label>
            <div class="col-md-2 form-control-static">
                채점
            </div>
            <label class="control-label col-md-2 form-control-static">채점자 (최종수정자)</label>
            <div class="col-md-2 form-control-static">
                교수명 (교수명)
            </div>
            <label class="control-label col-md-2 form-control-static">채점일 (최종수정일)</label>
            <div class="col-md-3 form-control-static">
                2018-00-00 00:00 (2018-00-00 00:00)
            </div>
        </div>
    </div>
</div>


<div class="row form-group-sm">
    <ul class="nav nav-tabs nav-divider">
        <li><a data-toggle="tab" href="#content_1">과제보기</a></li>
        <li><a data-toggle="tab" href="#content_2">작성답안</a></li>
        <li class="active"><a data-toggle="tab" href="#content_3">채점하기</a></li>
    </ul>
</div>

<div class="x_panel">
    <div class="row">
        <div class="tab-content">
            <div id="content_1" class="tab-pane fade">
                <div class="form-group form-group-sm">
                    <label class="control-label col-md-1" for="content">첨부1</label>
                    <div class="col-md-10">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            @if(empty($data['arr_attach_file_path'][$i]) === false)
                                [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_attach_file_path'][$i].$data['arr_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_attach_file_real_name'][$i]) }}" target="_blank">
                                    {{ $data['arr_attach_file_real_name'][$i] }}
                                </a> ] <span class="mr-10"></span>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>

            <div id="content_2" class="tab-pane fade">
                <div class="form-group form-group-sm">
                    <label class="control-label col-md-1" for="content">첨부2</label>
                    <div class="col-md-10">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            @if(empty($user_content_data['arr_attach_file_path'][$i]) === false)
                                [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($user_content_data['arr_attach_file_path'][$i].$user_content_data['arr_attach_file_name'][$i])}}" data-file-name="{{ urlencode($user_content_data['arr_attach_file_real_name'][$i]) }}" target="_blank">
                                    {{ $user_content_data['arr_attach_file_real_name'][$i] }}
                                </a> ] <span class="mr-10"></span>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>

            <div id="content_3" class="tab-pane fade in active">
                <div class="x_content">
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-1" for="content">첨부</label>
                        <div class="col-md-10">
                            @for($i = 0; $i < $attach_file_cnt; $i++)
                                @if(empty($user_content_data['arr_attach_file_path'][$i]) === false)
                                    [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($user_content_data['arr_attach_file_path'][$i].$user_content_data['arr_attach_file_name'][$i])}}" data-file-name="{{ urlencode($user_content_data['arr_attach_file_real_name'][$i]) }}" target="_blank">
                                        {{ $user_content_data['arr_attach_file_real_name'][$i] }}
                                    </a> ] <span class="mr-10"></span>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-1" for="content">내용</label>
                        <div class="col-md-10">
                            <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $user_content_data['Content'] !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-1" for="attach_img_1">첨부</label>
                        <div class="col-md-10 form-inline">
                            @for($i = 0; $i < $attach_file_cnt; $i++)
                                <div class="title">
                                    <div class="filetype col-md-8-1 mt-5">
                                        <input type="text" class="form-control file-text mr-10" disabled="">
                                        <button class="btn btn-sm btn-primary mb-0" type="button">파일 선택</button>
                                        <span class="file-select file-btn">
                                            <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control input-file" title="첨부{{ $i }}"/>
                                        </span>
                                        <input class="file-reset btn-danger btn" type="button" value="X" style="padding: 4px 10px" />
                                    </div>
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
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn-sm btn-success">저장</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('layer_footer')
</form>
@endsection