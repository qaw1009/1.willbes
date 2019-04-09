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

                {{--
                TODO: 필요없는 항목
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">분류</label>
                    <div class="form-control-static col-md-3">
                        {{$data['MdCateName']}}
                    </div>
                </div>
                --}}
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">과목</label>
                    <div class="form-control-static col-md-4">
                        {{$data['SubjectName']}}
                    </div>
                    <label class="control-label col-md-1-1" for="">질문유형</label>
                    <div class="form-control-static col-md-4">
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
                                [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_attach_file_path'][$i].$data['arr_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_attach_file_real_name'][$i]) }}" target="_blank">
                                    {{ $data['arr_attach_file_real_name'][$i] }}
                                </a> ]
                            @endif
                        @endfor
                    </div>
                    <label class="control-label col-md-1 d-line" for="">조회수</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['ReadCnt']}} ({{$data['SettingReadCnt']}})
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">질문</label>
                    <div class="form-control-static col-md-10">{!! nl2br($data['Content']) !!}</div>
                </div>
            </div>
        </form>
    </div>

    <div class="x_panel">
        <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" name="idx" value="{{ $board_idx }}"/>
            <div class="row">
                <label class="col-md-1-1 mt-15 text-right" for="">답변</label>
                <div class="col-md-9">
                    <div class="form-control-static col-md-1-1">
                        <div class="form-control-static col-md-12 short-div"><b>답변자</b></div>
                        <div class="form-control-static col-md-12 short-div"><b>수정자</b></div>
                        <div class="form-control-static col-md-12 short-div"><b>첨부파일</b></div>
                    </div>
                
                    <div class="form-control-static col-md-4">
                        <div class="form-control-static short-div">
                            {{$data['qnaAdminName']}}
                        </div>
                        <div class="form-control-static short-div">
                            {{$data['qnaUpdAdminName']}}
                        </div>
                        <div class="form-control-static short-div">
                            @for($i = 0; $i < $attach_file_cnt; $i++)
                                @if(empty($data['arr_reply_attach_file_idx'][$i]) === false)
                                    [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_reply_attach_file_path'][$i].$data['arr_reply_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_reply_attach_file_real_name'][$i]) }}" target="_blank">
                                        {{ $data['arr_reply_attach_file_real_name'][$i] }}
                                    </a> ]
                                @endif
                            @endfor
                        </div>
                    </div>

                    <div class="form-control-static col-md-1-1">
                        <div class="form-control-static short-div"><b>답변일</b></div>
                        <div class="form-control-static short-div"><b>수정일</b></div>
                    </div>

                    <div class="form-control-static col-md-4">
                        <div class="form-control-static short-div">{{$data['ReplyRegDatm']}}</div>
                        <div class="form-control-static short-div">{{$data['ReplyUpdDatm']}}</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="col-md-1-1 text-right" for="">답변내용</label>
                    <div class="col-md-9 ml-20">
                        {!! $data['ReplyContent'] !!}
                    </div>
                </div>
            </div>

            <div class="form-group text-center btn-wrap mt-50">
                {{--<button type="button" class="pull-left btn btn-danger" id="btn_delete">삭제</button>--}}
                @if($data['ReplyStatusCcd'] == $arr_ccd_reply['finish'])
                    <button class="btn btn-success mr-10" type="button" id="btn_reply_modify">수정</button>
                @else
                    <button class="btn btn-success mr-10" type="button" id="btn_reply_modify">답변</button>
                @endif
                <button type="button" class="btn btn-primary" id="btn_list">목록</button>
            </div>

        </form>
    </div>

    <div class="x_panel">
        <div class="x_title">
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1-1" for="btn_previous" style="margin-top: 7px;">이전글</label>
            <div class="form-control-static col-md-10">
                @if(empty($board_previous) === true)
                    이전글이 없습니다.
                @else
                    <a href='javascript:void(0);' id='btn_previous' data-idx='{{$board_previous['BoardIdx']}}'><u>{{$board_previous['Title']}}</u></a>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1-1" for="btn_next" style="margin-top: 7px;">다음글</label>
            <div class="form-control-static col-md-10">
                @if(empty($board_next) === true)
                    다음글이 없습니다.
                @else
                    <a href='javascript:void(0);' id='btn_next' data-idx='{{$board_next['BoardIdx']}}'><u>{{$board_next['Title']}}</u></a>
                @endif
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                location.href='{{ site_url("/board/professor/{$boardName}") }}/detailList/' + getQueryString();
            });

            $('#btn_previous').click(function() {
                location.href='{{ site_url("/board/professor/{$boardName}/readQnaReply") }}/' + $(this).data('idx') + getQueryString();
            });

            $('#btn_next').click(function() {
                location.href='{{ site_url("/board/professor/{$boardName}/readQnaReply") }}/' + $(this).data('idx') + getQueryString();
            });

            $('.file-download').click(function() {
                var _url = '{{ site_url("/board/professor/{$boardName}/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });

            // 답변 수정/등록 폼
            $('#btn_reply_modify').click(function() {
                var idx = $regi_form.find('input[name="idx"]').val();
                location.replace('{{ site_url("/board/professor/{$boardName}/createQnaReply") }}/' + idx + getQueryString());
            });
        });
    </script>
@stop