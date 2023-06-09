@extends('lcms.layouts.master')

@section('content')
    <h5>- {{$arr_swich['title'] or '온라인 고객센터 1:1 상담 게시판'}} 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal form-label-left" novalidate>
        <div class="x_panel">
            <div class="x_title">
                <h2>{{$arr_swich['title'] or '1:1 상담 게시판 관리'}}</h2>
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
                        @elseif(empty($arr_swich['cate_name']) === false)
                            {{$arr_swich['cate_name']}}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">과목</label>
                    <div class="form-control-static col-md-10">
                        {{$data['SubjectName']}}
                    </div>
                </div>

                <div class="form-group {{$arr_swich['reply']['MdCateName'] or ''}}">
                    <label class="control-label col-md-1-1" for="">분류</label>
                    <div class="form-control-static col-md-4">
                        {{$data['MdCateName']}}
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">상담유형</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['TypeCcdName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">등록자</label>
                    <div class="form-control-static col-md-4">
                        <a href="/member/manage/detail/{{ $data['MemIdx'] }}" target="_blank">{{$data['MemName']}}({{$data['MemId']}})</a>
                        <button type="button" class="btn bg-blue btn-auto-login ml-10" id="btn_login" data-mem-idx="{{ $data['MemIdx'] }}">자동로그인</button>
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
                    <label class="control-label col-md-1-1 d-line" for="">공개</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {!! ($data['IsPublic'] == 'Y') ? '공개' : '<span class="red">비공개</span>'  !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">첨부</label>
                    <div class="col-md-4">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            @if(empty($data['arr_attach_file_path'][$i]) === false)
                                <p class="form-control-static">[ <a href="{{ $data['arr_attach_file_path'][$i] . $data['arr_attach_file_name'][$i] }}" rel="popup-image">{{ $data['arr_attach_file_real_name'][$i] }}</a> ]</p>
                            @endif
                        @endfor
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">조회수(생성)</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['ReadCnt']}} ({{$data['SettingReadCnt']}})
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">질문</label>
                    <div class="form-control-static col-md-10">{!! nl2br($data['Content']) !!}</div>
                </div>
            </div>
        </div>
    </form>

    <div class="x_panel">
        {!! form_errors() !!}
        <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" name="idx" value="{{ $board_idx }}"/>
            <div class="row {{$arr_swich['reply']['reply_status_ccd'] or ''}}">
                <label class="col-md-1-1 mt-15 text-right" for="">답변</label>
                <div class="col-md-9">
                    <div class="form-control-static col-md-1-1">
                        <div class="form-control-static short-div"><b>답변상태</b></div>
                        <div class="form-control-static short-div"><b>VOC 강도 <span class="required">*</span></b></div>
                    </div>
                    <div class="form-control-static col-md-10">
                        <div class="short-div">
                            @foreach($data['arr_reply_code'] as $key => $val)
                                <input type="radio" id="reply_status_ccd_{{$key}}" name="reply_status_ccd" class="flat" value="{{$key}}" title="{{$val}}" @if($key == $data['arr_reply_code'] || (empty(element($arr_swich['reply']['default_reply_status_ccd'],$data['arr_reply_code'])) === false && element($arr_swich['reply']['default_reply_status_ccd'],$data['arr_reply_code']) == $val))checked="checked"@endif/>
                                <label for="reply_status_ccd_{{$key}}" class="input-label">{{$val}}</label>
                            @endforeach
                        </div>
                        <div class="short-div item">
                            @foreach($data['arr_voc_code'] as $key => $val)
                                <input type="radio" id="voc_ccd_{{$key}}" name="voc_ccd" class="flat" value="{{$key}}" title="{{$val}}" @if($key == $data['VocCcd'] || (empty(element($arr_swich['reply']['default_voc_ccd'],$data['arr_voc_code'])) === false && element($arr_swich['reply']['default_voc_ccd'],$data['arr_voc_code']) == $val))checked="checked"@endif/>
                                <label for="voc_ccd_{{$key}}" class="hover mr-5">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="col-md-1-1 mt-15 text-right" for=""></label>
                    <div class="col-md-9">
                        <textarea id="reply_contents" name="reply_contents" class="form-control" rows="7" title="내용" placeholder="">{!! $data['reply_content'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1-1 mt-15 text-right" for="attach_img_1">첨부</label>
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

            <div class="row">
                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10" id="btn_reply_modify">
                        @if($data['ReplyStatusCcd'] == $arr_ccd_reply['finish'])
                            수정
                        @else
                            @if(empty($arr_swich['reply']['btn_name']) === false)
                                {{ $arr_swich['reply']['btn_name'] }}
                            @else
                                저장
                            @endif
                        @endif

                        {{--@if(empty($arr_swich['reply']['cate_cnt']) === false)
                            <span class="reply_cnt">{{$arr_unAnswered[$arr_swich['reply']['cate_cnt']]}}</span>
                        @endif--}}
                    </button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
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
                location.href='{{ site_url("/board/{$boardName}") }}' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                if (!confirm('저장 하시겠습니까?')) {
                    return false;
                }
                getEditorBodyContent($editor_profile);
                var _url = '{{ site_url("/board/{$boardName}/storeReply") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/board/{$boardName}") }}/' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 파일삭제
            $('.file-delete').click(function() {
                var _url = '{{ site_url("/board/{$boardName}/destroyFile/") }}' + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'attach_idx' : $(this).data('attach-idx')
                };
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
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