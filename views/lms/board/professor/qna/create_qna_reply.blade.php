@extends('lcms.layouts.master')

@section('content')
    <h5>- 교수 학습Q&A 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <div class="x_panel">
        <form class="form-horizontal form-label-left" novalidate>
            <div class="x_title">
                <h2>{{$arr_prof_info['ProfNickName']}} 교수 학습Q&A</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">제목</label>
                    <div class="form-control-static col-md-10">
                        {{$data['Title']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">운영사이트</label>
                    <div class="form-control-static col-md-4">
                        {{$data['SiteName']}}
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">카테고리</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        @if(empty($data['arr_cate_code']) === false)
                            @foreach($data['arr_cate_code'] as $key => $val)
                                {{$val}} @if ($loop->last === false) | @endif
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="">분류</label>
                    <div class="form-control-static col-md-3">
                        {{$data['MdCateName']}}
                    </div>
                    <label class="control-label col-md-1 b-line" for="">과목</label>
                    <div class="form-control-static col-md-3 ml-8-dot">
                        {{$data['SubjectName']}}
                    </div>
                    <label class="control-label col-md-1 c-line" for="">질문유형</label>
                    <div class="form-control-static col-md-3 ml-8-dot">
                        {{$data['TypeCcdName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">질문강좌</label>
                    <div class="form-control-static col-md-10">

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">등록자</label>
                    <div class="form-control-static col-md-4">
                        {{$data['MemName']}}({{$data['MemId']}})
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">휴대폰 번호</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['MemPhone']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">등록일</label>
                    <div class="form-control-static col-md-4">
                        {{ $data['RegDatm'] }}
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">사용</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {!! ($data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>'  !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">첨부</label>
                    <div class="form-control-static col-md-4">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            @if(empty($data['arr_attach_file_path'][$i]) === false)
                                <p class="form-control-static">[ <a href="{{ $data['arr_attach_file_path'][$i] . $data['arr_attach_file_name'][$i] }}" rel="popup-image">{{ $data['arr_attach_file_real_name'][$i] }}</a> ]</p>
                            @endif
                        @endfor
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">조회수</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['ReadCnt']}} ({{$data['SettingReadCnt']}})
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">질문</label>
                    <div class="form-control-static col-md-10">{!! $data['Content'] !!}</div>
                </div>
            </div>
        </form>
    </div>

    <div class="x_panel">
        <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" name="idx" value="{{ $board_idx }}"/>
            <div class="row">
                <label class="col-md-1-1 mt-15 text-right" for="">내용 <span class="required">*</span></label>
                <div class="col-md-9">
                    <textarea id="reply_contents" name="reply_contents" class="form-control" rows="7" title="내용" placeholder="">{!! $data['ReplyContent'] !!}</textarea>
                </div>
            </div>
            
            <div class="row">
                <label class="col-md-1-1 mt-15 text-right"  for="attach_img_1">첨부</label>
                <div class="form-group">
                    <div class="col-md-9 form-inline">
                        <a id="btn_attach_toggle" href="#none">첨부펼침 <span id="attach_toggle_img" class="fa fa-chevron-up"></span></a>
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            <div class="title attach-file-div @if($i!==0) hide @endif">
                                <!--div class="filetype">
                                    <input type="text" class="form-control file-text" disabled="">
                                    <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                    <span class="file-select file-btn"-->
                                        <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control input-file" title="첨부{{ $i }}"/>
                                    <!--/span>
                                </div-->
                                @if(empty($data['arr_reply_attach_file_path'][$i]) === false)
                                    <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['arr_reply_attach_file_path'][$i] . $data['arr_reply_attach_file_name'][$i] }}" rel="popup-image">{{ $data['arr_reply_attach_file_real_name'][$i] }}</a> ]
                                        <a href="#none" class="file-delete" data-attach-idx="{{ $data['arr_reply_attach_file_idx'][$i]  }}"><i class="fa fa-times red"></i></a>
                                    </p>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="form-group text-center btn-wrap mt-50">
                <button type="submit" class="btn btn-success" id="btn_modify">답변등록</button>
                <button type="button" class="btn btn-primary mr-10" id="btn_list">목록</button>
            </div>
        
        </form>
    </div>

    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.editorHeight = '170px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'reply_contents';
            $editor_profile.run();

            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                location.href='{{ site_url("/board/professor/{$boardName}") }}/detailList/' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                getEditorBodyContent($editor_profile);
                var _url = '{{ site_url("/board/professor/{$boardName}/storeReply") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/board/professor/{$boardName}") }}/detailList/' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

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

        });
    </script>
@stop