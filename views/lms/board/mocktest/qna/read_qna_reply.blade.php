@extends('lcms.layouts.master')

@section('content')
    <h5>- 모의고사 이의제기/정오표 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" novalidate>
        {!! html_def_site_tabs($prod_data['SiteCode'], 'tabs_site_code', 'tab', false, [], false, array($prod_data['SiteCode'] => $prod_data['SiteName'])) !!}
        <div class="x_panel">
            <div class="x_content">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>카테고리</th>
                        <th>모의고사명</th>
                        <th>직렬</th>
                        <th>연도</th>
                        <th>회차</th>
                        <th>접수기간</th>
                        <th>접수상태</th>
                        <th>응시기간</th>
                        <th>사용여부</th>
                        <th>이의제기(미답변수/총건수)</th>
                        <th>정오표</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{$prod_data['CateName']}} {!! ($prod_data['IsUseCate'] == 'Y') ? '' : '<span class="red">(미사용)</span>' !!}
                        </td>
                        <td>
                            [{{$prod_data['ProdCode']}}] {{$prod_data['ProdName']}}
                        </td>
                        <td>
                            {!! (empty($prod_data['MockPartName']) === false) ? implode(',', $prod_data['MockPartName']) : '' !!}
                        </td>
                        <td>{{$prod_data['MockYear']}}</td>
                        <td>{{$prod_data['MockRotationNo']}}</td>
                        <td>
                            {{$prod_data['SaleStartDate']}} ~ {{$prod_data['SaleEndDate']}}
                        </td>
                        <td>{{$prod_data['AcceptStatusCcd_Name']}}</td>
                        <td>
                            {{$prod_data['TakeStartDate']}} ~ {{$prod_data['TakeEndDate']}}
                        </td>
                        <td>
                            {!! ($prod_data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>' !!}
                        </td>
                        <td>
                            <a href="#none" class="btn-list-qna" data-idx="{{$prod_data['ProdCode']}}">
                                <u class="blue">{{$prod_data['qnaUnAnsweredCnt']}}/{{$prod_data['qnaTotalCnt']}}</u>
                            </a>
                        </td>
                        <td>
                            <a href="#none" class="btn-list-notice" data-idx="{{$prod_data['ProdCode']}}">
                                <u class="blue">{{$prod_data['noticeCnt']}}</u>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xs-12 text-right form-inline">
                    <button type="button" class="btn btn-sm btn-primary ml-10 btn-main-list">전체모의고사목록</button>
                </div>
            </div>
        </div>
    </form>

    <form class="form-horizontal form-label-left" novalidate>
        <div class="x_panel">
            <div class="x_title">
                <h2>이의제기</h2>
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
                        @foreach($data['arr_cate_code'] as $key => $val)
                            {{$val}} @if ($loop->last === false) | @endif
                        @endforeach
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
                    <label class="control-label col-md-1-1" for="">공개여부</label>
                    <div class="form-control-static col-md-4">
                        {!! ($data['IsPublic'] == 'Y') ? '공개' : '<span class="red">미공개</span>'  !!}
                    </div>
                    <label class="control-label col-md-1 d-line" for="">조회수</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['ReadCnt']}} ({{$data['SettingReadCnt']}})
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
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">질문</label>
                    <div class="form-control-static col-md-10">{!! $data['Content'] !!}</div>
                </div>
            </div>
        </div>
    </form>

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
            //전체모의고사목록
            $('.btn-main-list').click(function() {
                location.href = '{{ site_url("/board/{$boardName}/mainList") }}/' + getQueryString();
            });

            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                location.href='{{ site_url("/board/{$boardName}") }}/detailList/' + getQueryString();
            });

            $('#btn_previous').click(function() {
                location.href='{{ site_url("/board/{$boardName}/readQnaReply") }}/' + $(this).data('idx') + getQueryString();
            });

            $('#btn_next').click(function() {
                location.href='{{ site_url("/board/{$boardName}/readQnaReply") }}/' + $(this).data('idx') + getQueryString();
            });

            $('.file-download').click(function() {
                var _url = '{{ site_url("/board/{$boardName}/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });

            // 답변 수정/등록 폼
            $('#btn_reply_modify').click(function() {
                var idx = $regi_form.find('input[name="idx"]').val();
                location.replace('{{ site_url("/board/{$boardName}/createQnaReply") }}/' + idx + getQueryString());
            });
        });
    </script>
@stop