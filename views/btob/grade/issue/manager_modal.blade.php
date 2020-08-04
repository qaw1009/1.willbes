@extends('lcms.layouts.master_modal')

@section('layer_title')
    첨삭현황
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/board/professor/{$boardName}/storeReply/") }}?bm_idx=88" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="cua_idx" value="{{ $data['CuaIdx'] }}">
        @endsection

        @section('layer_content')
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group form-group-sm">
                        <label class="control-label form-control-static col-md-1">강좌명</label>
                        <div class="col-md-2 form-control-static">
                            {{$data['ProdName']}}
                        </div>
                        <label class="control-label form-control-static col-md-1">회차명</label>
                        <div class="col-md-2 form-control-static">
                            {{$data['Title']}}
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-1 form-control-static">등록자</label>
                        <div class="col-md-2 form-control-static">
                            {{$data['MemName']}} ({!! hpSubString($data['MemId'],0,2,'*') !!})
                        </div>
                        <label class="control-label col-md-1 form-control-static">점수</label>
                        <div class="col-md-2 form-control-static">
                            {{$data['ReplyScore']}}
                        </div>
                        <label class="control-label col-md-1 form-control-static">제출일</label>
                        <div class="col-md-3 form-control-static">
                            {{$data['RegDatm']}}
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-1 form-control-static">채첨여부</label>
                        <div class="col-md-2 form-control-static">
                            {!! $data['IsReply'] == 'Y' ? '채점' : '미채점' !!}
                        </div>
                        <label class="control-label col-md-1 form-control-static">채점자</label>
                        <div class="col-md-2 form-control-static">
                            {{$data['ReplyAdminName']}}
                        </div>
                        <label class="control-label col-md-1 form-control-static">채점일</label>
                        <div class="col-md-3 form-control-static">
                            {{$data['ReplyRegDatm']}}
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
                                    @if (empty($data['arrAdminFiles']) === false)
                                        @foreach($data['arrAdminFiles'] as $key => $row)
                                            [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ $row['FilePath'].$row['FileName']}}" data-file-name="{{ $row['RealName'] }}" target="_blank">
                                                {{ $row['RealName'] }}
                                            </a> ] <span class="mr-10"></span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label class="control-label col-md-1" for="content">내용</label>
                                <div class="col-md-10">
                                    {!! $data['ProfContent'] !!}
                                </div>
                            </div>
                        </div>

                        <div id="content_2" class="tab-pane fade">
                            <div class="form-group form-group-sm">
                                <label class="control-label col-md-1" for="content">첨부2</label>
                                <div class="col-md-10">
                                    @if (empty($data['arrUserFiles']) === false)
                                        @foreach($data['arrUserFiles'] as $key => $row)
                                            [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ $row['FilePath'].$row['FileName']}}" data-file-name="{{ $row['RealName'] }}" target="_blank">
                                                {{ $row['RealName'] }}
                                            </a> ] <span class="mr-10"></span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label class="control-label col-md-1" for="content">내용</label>
                                <div class="col-md-10">
                                    {!! $data['MemContent'] !!}
                                </div>
                            </div>
                        </div>

                        <div id="content_3" class="tab-pane fade in active">
                            <div class="x_content">
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-1" for="content">첨부</label>
                                    <div class="col-md-10">
                                        @if (empty($data['arrUserFiles']) === false)
                                            @foreach($data['arrUserFiles'] as $key => $row)
                                                [ <a href="javascript:void(0);" class="file-download" data-file-path="{{$row['FilePath'].$row['FileName']}}" data-file-name="{{ $row['RealName'] }}" target="_blank">
                                                    {{ $row['RealName'] }}
                                                </a> ] <span class="mr-10"></span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-1" for="content">점수입력</label>
                                    <div class="col-md-10">
                                        <input type="text" id="reply_score" name="reply_score" class="form-control" title="점수입력" value="{{ $data['ReplyScore'] }}" style="width: 100px;">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-1" for="content">내용</label>
                                    <div class="col-md-10">
                                        <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">@if($data['IsReply'] == 'Y'){!! $data['ReplyContent'] !!}@else{!! $data['MemContent'] !!}@endif</textarea>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-1" for="attach_img_1">첨부</label>
                                    <div class="col-md-10 form-inline">
                                        @for($i = 0; $i < $attach_file_cnt; $i++)
                                            <div class="title">
                                                <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control input-file" title="첨부{{ $i }}"/>
                                                @if (empty($data['arrReplyAdminFiles'][$i]) === false)
                                                    <p class="form-control-static" id="file_reply_{{$i}}">[ <a href="javascript:void(0);" class="file-download" data-file-path="{{$data['arrReplyAdminFiles'][$i]['FilePath'].$data['arrReplyAdminFiles'][$i]['FileName']}}" data-file-name="{{$data['arrReplyAdminFiles'][$i]['RealName']}}" target="_blank">
                                                            {{$data['arrReplyAdminFiles'][$i]['RealName']}}
                                                        </a> ]
                                                        <a href="#none" class="file-delete" data-target-file-id="file_reply_{{$i}}" data-attach-idx="{{$data['arrReplyAdminFiles'][$i]['FileIdx']}}"><i class="fa fa-times red"></i></a>
                                                    </p>
                                                @endif
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    @if ($data['ReplyIsStatus'] == 'N')
                                        <div class="bg-red">삭제처리된 데이터는 채점할 수 없습니다.</div>
                                    @else
                                        <button type="submit" class="btn-sm btn-success">저장</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
            <script src="/public/vendor/cheditor/cheditor.js"></script>
            <script src="/public/js/editor_util.js"></script>
            <script type="text/javascript">
                var $modal_regi_form = $('#modal_regi_form');
                $(document).ready(function() {
                    //editor load
                    var $editor_profile = new cheditor();
                    $editor_profile.config.editorHeight = '170px';
                    $editor_profile.config.editorWidth = '100%';
                    $editor_profile.inputForm = 'board_content';

                    setTimeout(function() {
                        $editor_profile.run();
                    }, 0);

                    $('.file-download').click(function() {
                        var _url = '{{ site_url("/grade/issue/download") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                        window.open(_url, '_blank');
                    });

                    // 파일삭제
                    $('.file-delete').click(function() {
                        var target_file_id = $(this).data('target-file-id');
                        var _url = '{{ site_url("/grade/issue/destroyFile/") }}';
                        var data = {
                            '{{ csrf_token_name() }}' : $modal_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'DELETE',
                            'attach_idx' : $(this).data('attach-idx')
                        };
                        if (!confirm('정말로 삭제하시겠습니까?')) {
                            return;
                        }
                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $('#'+target_file_id).remove();
                            }
                        }, showError, false, 'POST');
                    });

                    // ajax submit
                    $modal_regi_form.submit(function() {
                        getEditorBodyContent($editor_profile);
                        var _url = '{{ site_url("/grade/issue/storeReply/") }}';

                        ajaxSubmit($modal_regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                $datatable.draw();
                            }
                        }, showValidateError, null, false, 'alert');
                    });
                });
            </script>
        @stop

        @section('layer_footer')
    </form>
@endsection