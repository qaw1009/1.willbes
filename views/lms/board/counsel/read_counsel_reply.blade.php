@extends('lcms.layouts.master')

@section('content')
    {!! form_errors() !!}
    <h5>- 온라인 고객센터 1:1 상담 게시판을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal form-label-left" novalidate>
        <div class="x_panel">
            <div class="x_title">
                <h2>1:1 상담 게시판 관리</h2>
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
                                <p class="form-control-static">
                                    [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_attach_file_path'][$i].$data['arr_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_attach_file_real_name'][$i]) }}" target="_blank">
                                        {{ $data['arr_attach_file_real_name'][$i] }}
                                    </a> ]
                                </p>
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
        <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="PUT"/>
            <input type="hidden" name="idx" value="{{ $board_idx }}"/>

            <div class="row">
                <label class="col-md-1-1 mt-15 text-right" for="">답변</label>
                <div class="col-md-9">
                    <div class="form-control-static col-md-1-1">
                        <div class="form-control-static col-md-12 short-div"><b>답변상태</b></div>
                        <div class="form-control-static col-md-12 short-div"><b>VOC 강도</b></div>
                        <div class="form-control-static col-md-12 short-div"><b>답변자</b></div>
                        <div class="form-control-static col-md-12 short-div"><b>최종 수정자</b></div>
                    </div>

                    <div class="form-control-static col-md-4">
                        <div class="form-control-static short-div">
                            {{$data['reply_status']}}
                        </div>
                        <div class="form-control-static short-div">
                            @if($data['VocCcd'] == $voc_ccd_level3)
                                <span class="red">{{$data['voc_value']}}</span>
                            @else
                                {{$data['voc_value']}}
                            @endif
                        </div>
                        <div class="form-control-static short-div">
                            {{$data['counselAdminName']}}
                        </div>
                        <div class="form-control-static short-div">
                            {{$data['counselUpdAdminName']}}
                        </div>
                    </div>

                    <div class="form-control-static col-md-1-1">
                        <div class="form-control-static short-div"><b>답변첨부파일</b></div>
                        <div class="form-control-static short-div"></div>
                        <div class="form-control-static short-div"><b>답변일</b></div>
                        <div class="form-control-static short-div"><b>최종수정일</b></div>
                    </div>

                    <div class="form-control-static col-md-4">
                        <div class="short-div">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            @if(empty($data['arr_reply_attach_file_path'][$i]) === false)
                                <p class="form-control-static">
                                    [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_reply_attach_file_path'][$i].$data['arr_reply_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_reply_attach_file_real_name'][$i]) }}" target="_blank">
                                        {{ $data['arr_reply_attach_file_real_name'][$i] }}
                                    </a> ]
                                </p>
                            @endif
                        @endfor

                        </div>
                        <div class="form-control-static short-div"></div>
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

            <div class="row">
                <div class="form-group">
                    <label class="col-md-1-1 mt-25 text-right" for="memo_contents">매모</label>
                    <div class="col-md-9 mt-20 ml-20">
                        <div class="form-control-static clear">
                            <div class="col-md-10 no-padding item">
                                <textarea id='memo_contents' name='memo_contents' class='form-control' rows='4' title='메모' required='required' placeholder=''></textarea>
                            </div>
                            <div class="form-control-static col-md-1">
                                <button type="submit" class="btn btn-success btn-memo">저장</button>
                            </div>
                        </div>
                        <div class="form-control-static clear">
                            <table id="list_ajax_table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th width="10%">NO</th>
                                    <th>내용</th>
                                    <th width="15%">담당자</th>
                                    <th width="20%">등록일</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($memo_data as $row)
                                    <tr>
                                        <td>{{ $loop->index }}</td>
                                        <td>{!! nl2br($row['Memo']) !!}</td>
                                        <td>{{$row['wAdminName']}}</td>
                                        <td>{{$row['RegDatm']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-center btn-wrap mt-50">
                @if($data['ReplyStatusCcd'] == $arr_ccd_reply['finish'])
                    <button class="btn btn-success mr-10" type="button" id="btn_reply_modify">수정</button>
                @else
                    <button class="btn btn-success mr-10" type="button" id="btn_reply_modify">답변</button>
                @endif
                <button class="btn btn-primary" type="button" id="btn_list">목록</button>
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

    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                location.href='{{ site_url("/board/{$boardName}") }}' + getQueryString();
            });

            $('#btn_previous').click(function() {
                location.href='{{ site_url("/board/{$boardName}/readCounselReply") }}/' + $(this).data('idx') + getQueryString();
            });

            $('#btn_next').click(function() {
                location.href='{{ site_url("/board/{$boardName}/readCounselReply") }}/' + $(this).data('idx') + getQueryString();
            });

            $('.file-download').click(function() {
                var _url = '{{ site_url("/board/{$boardName}/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });

            // 답변 수정/등록 폼
            $('#btn_reply_modify').click(function() {
                var idx = $regi_form.find('input[name="idx"]').val();
                location.href='{{ site_url("/board/{$boardName}/createCounselReply") }}/' + idx + getQueryString();
            });

            // 메모
            $regi_form.submit(function() {
                if (!confirm('상담 코멘트를 등록하시겠습니까??')) {
                    return false;
                }
                var _url = '{{ site_url("/board/{$boardName}/storeMemo") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop