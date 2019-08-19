@extends('lcms.layouts.master')

@section('content')
    <h5>- 이벤트 공지사항을 등록/관리 하는 메뉴입니다.</h5>
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
                <label class="control-label col-md-1-1" for="">제목</label>
                <div class="form-control-static col-md-10">
                    {!! ($data['IsBest'] == '1') ? '<span class="red">[HOT]</span>' : '' !!} {{$data['Title']}}
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

                <label class="control-label col-md-1-1" for="">프로모션코드</label>
                <div class="col-md-4">
                    {{ $data['PromotionCode'] }}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1" for="">사용</label>
                <div class="form-control-static col-md-10">
                    {{ ($data['IsUse'] == 'Y') ? '사용' : '미사용' }}
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
                <label class="control-label col-md-1-1" for="">내용</label>
                <div class="form-control-static col-md-10">{!! $data['Content'] !!}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">등록자
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['wAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">등록일
                </label>
                <div class="col-md-4 ml-12-dot">
                    <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">최종 수정자
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">최종 수정일
                </label>
                <div class="col-md-4 ml-12-dot">
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
    {{--@endif--}}

    <!-- 댓글 리스트 -->
    @if ($data['BoardIsComment'] == 'Y')
        @include('lms.board.common.comment')
    @endif

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                location.href='{{ site_url("/board/{$boardName}") }}' + getQueryString();
            });

            //데이터 수정 폼
            $('#btn_modify').click(function() {
                location.href='{{ site_url("/board/{$boardName}/create") }}/' + {{$board_idx}} + getQueryString();
            });

            $('#btn_previous').click(function() {
                location.href='{{ site_url("/board/{$boardName}/read") }}/' + $(this).data('idx') + getQueryString();
            });

            $('#btn_next').click(function() {
                location.href='{{ site_url("/board/{$boardName}/read") }}/' + $(this).data('idx') + getQueryString();
            });

            $('.file-download').click(function() {
                var _url = '{{ site_url("/board/{$boardName}/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });

            //데이터 삭제
            $('#btn_delete').click(function() {
                var _url = '{{ site_url("/board/{$boardName}/delete") }}/' + {{$board_idx}} + getQueryString();
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
                        location.href='{{ site_url("/board/{$boardName}") }}' + getQueryString();
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop