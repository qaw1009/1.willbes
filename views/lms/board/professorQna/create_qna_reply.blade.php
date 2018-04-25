@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인 고객센터 1:1 상담 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <div class="x_panel">
        <form class="form-horizontal form-label-left" novalidate>
            <div class="x_title">
                <h2>경찰 > 신광은 교수 학습Q&A</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="">제목</label>
                    <div class="form-control-static col-md-9">
                        {{$data['Title']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">운영사이트</label>
                    <div class="form-control-static col-md-2">
                        {{$data['SiteName']}}
                    </div>
                    <label class="control-label col-md-3" for="">구분</label>
                    <div class="form-control-static col-md-5">
                        @foreach($data['arr_cate_code'] as $key => $val)
                            {{$val}} @if ($loop->last === false) | @endif
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">분류</label>
                    <div class="form-control-static col-md-1">
                        {{$data['MdCateName']}}
                    </div>
                    <label class="control-label col-md-1" for="">과목</label>
                    <div class="form-control-static col-md-1">
                        {{$data['SubjectName']}}
                    </div>
                    <label class="control-label col-md-2" for="">질문유형</label>
                    <div class="form-control-static col-md-1">
                        {{$data['TypeCcdName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">질문강좌</label>
                    <div class="form-control-static col-md-7">
                        {{$data['MemName']}}({{$data['MemId']}})
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">등록자</label>
                    <div class="form-control-static col-md-2">
                        회원명(아이디)
                    </div>
                    <label class="control-label col-md-3" for="">휴대폰 번호</label>
                    <div class="form-control-static col-md-5">
                        010-1234-1234 (Y)
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">등록일</label>
                    <div class="form-control-static col-md-2">
                        {{ $data['RegDatm'] }}
                    </div>
                    <label class="control-label col-md-3" for="">사용</label>
                    <div class="form-control-static col-md-5">
                        {!! ($data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>'  !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">첨부</label>
                    <div class="form-control-static col-md-2">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            @if(empty($data['arr_attach_file_path'][$i]) === false)
                                <p class="form-control-static">[ <a href="{{ $data['arr_attach_file_path'][$i] . $data['arr_attach_file_name'][$i] }}" rel="popup-image">{{ $data['arr_attach_file_name'][$i] }}</a> ]</p>
                            @endif
                        @endfor
                    </div>
                    <label class="control-label col-md-3" for="">조회수</label>
                    <div class="form-control-static col-md-5">
                        {{$data['ReadCnt']}} ({{$data['SettingReadCnt']}})
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">질문</label>
                    <div class="form-control-static col-md-9">{!! $data['Content'] !!}</div>
                </div>
            </div>
        </form>
    </div>

    <div class="x_panel">
        <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" name="idx" value="{{ $board_idx }}"/>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-md-2" for="">내용<span class="required">*</span></label>
                    <div class="col-md-9">
                        <textarea id="reply_contents" name="reply_contents" class="form-control" rows="7" title="내용" placeholder="">{!! $data['ReplyContent'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_img_1">첨부</label>
                    <div class="col-md-9 form-inline">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            <div class="mb-5">
                                <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control" title="첨부{{ $i }}"/>
                                @if(empty($data['arr_reply_attach_file_path'][$i]) === false)
                                    <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['arr_reply_attach_file_path'][$i] . $data['arr_reply_attach_file_name'][$i] }}" rel="popup-image">{{ $data['arr_reply_attach_file_name'][$i] }}</a> ]
                                        <a href="#none" class="file-delete" data-attach-idx="{{ $data['arr_reply_attach_file_idx'][$i]  }}"><i class="fa fa-times red"></i></a>
                                    </p>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="ln_solid"></div>
                <div class="form-group text-center mb-30">
                    <div class="col-md-10">
                        <button type="button" class="pull-left btn btn-danger" id="btn_delete">삭제</button>
                        <button type="button" class="pull-right btn btn-primary mr-10" id="btn_list">목록</button>
                        <button type="submit" class="pull-right btn btn-success" id="btn_modify">답변등록</button>
                    </div>
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
                location.replace('{{ site_url("/board/{$boardName}") }}/detailList/' + getQueryString());
            });

            // ajax submit
            $regi_form.submit(function() {
                getEditorBodyContent($editor_profile);
                var _url = '{{ site_url("/board/{$boardName}/storeReply") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/board/{$boardName}") }}/detailList/' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop