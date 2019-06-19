@extends('lcms.layouts.master')

@section('content')
    <h5>- 서포터즈 온라인 공지사항 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_title">
                <h2>공지게시판 정보</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="">제목</label>
                    <div class="form-control-static col-md-10">
                        {!! ($data['IsBest'] == '1') ? '<span class="red">[HOT]</span>' : '' !!} {{$data['Title']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">운영사이트</label>
                    <div class="form-control-static col-md-3">
                        {{$data['SiteName']}}
                    </div>
                    <label class="control-label col-md-2" for="">서포터즈명</label>
                    <div class="form-control-static col-md-4">
                        {{ $data['SupportersTitle'] }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">연도</label>
                    <div class="form-control-static col-md-3">
                        {{$data['SupportersYear']}}
                    </div>
                    <label class="control-label col-md-2" for="">기수</label>
                    <div class="form-control-static col-md-2">
                        {{$data['SupportersNumber']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">사용</label>
                    <div class="form-control-static col-md-3">
                        {{ ($data['IsUse'] == 'Y') ? '사용' : '미사용' }}
                    </div>
                    <label class="control-label col-md-2" for="">조회수(생성)</label>
                    <div class="form-control-static col-md-4">
                        {{$data['ReadCnt']}} ({{$data['SettingReadCnt']}})
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">첨부</label>
                    <div class="col-md-8">
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
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">내용</label>
                    <div class="form-control-static col-md-10">{!! $data['Content'] !!}</div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['wAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="button" class="pull-left btn btn-danger" id="btn_delete">삭제</button>
                    <button type="button" class="pull-right btn btn-primary" id="btn_list">목록</button>
                    <button type="button" class="pull-right btn btn-success mr-10" id="btn_modify">수정</button>
                </div>
            </div>
        </div>
    </form>

    {{--@if($data['IsBest'] != 1)--}}
    <div class="x_panel">
        <div class="x_title">
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="btn_previous" style="margin-top: 7px;">이전글</label>
            <div class="form-control-static col-md-10">
                @if(empty($board_previous) === true)
                    이전글이 없습니다.
                @else
                    <a href='javascript:void(0);' id='btn_previous' data-idx='{{$board_previous['BoardIdx']}}'><u>{{$board_previous['Title']}}</u></a>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="btn_next" style="margin-top: 7px;">다음글</label>
            <div class="form-control-static col-md-10">
                @if(empty($board_next) === true)
                    다음글이 없습니다.
                @else
                    <a href='javascript:void(0);' id='btn_next' data-idx='{{$board_next['BoardIdx']}}'><u>{{$board_next['Title']}}</u></a>
                @endif
            </div>
        </div>
    </div>
    {{--@endif--}}

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/supporters/notice/") }}' + getQueryString();
            });

            //데이터 수정 폼
            $('#btn_modify').click(function() {
                location.href='{{ site_url("/site/supporters/notice/create") }}/' + {{$board_idx}} + getQueryString();
            });

            $('#btn_previous').click(function() {
                location.href='{{ site_url("/site/supporters/notice/read") }}/' + $(this).data('idx') + getQueryString();
            });

            $('#btn_next').click(function() {
                location.href='{{ site_url("/site/supporters/notice/read") }}/' + $(this).data('idx') + getQueryString();
            });

            $('.file-download').click(function() {
                var _url = '{{ site_url("/site/supporters/notice/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });

            //데이터 삭제
            $('#btn_delete').click(function() {
                var _url = '{{ site_url("/site/supporters/notice/delete") }}/' + {{$board_idx}} + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE'
                };

                if (!confirm('해당 공지사항을 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.href='{{ site_url('/site/supporters/notice/') }}' + getQueryString();
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop