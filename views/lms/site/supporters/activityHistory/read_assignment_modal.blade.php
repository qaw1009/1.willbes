@extends('lcms.layouts.master_modal')

@section('layer_title')
    과제 제출 확인
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/supporters/activityHistory/storeReply/") }}?bm_idx=88" novalidate>--}}
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group form-group-sm">
                        <label class="control-label form-control-static col-md-1">과제명</label>
                        <div class="col-md-10 form-control-static">
                            {{$data['SupportersTitle']}}
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-1 form-control-static">등록자</label>
                        <div class="col-md-2 form-control-static">
                            {{$data['MemName']}} ({{$data['MemId']}})
                        </div>
                        <label class="control-label col-md-2 form-control-static">기수</label>
                        <div class="col-md-2 form-control-static">
                            {{$data['SupportersYear']}}년 {{$data['SupportersNumber']}}기
                        </div>
                        <label class="control-label col-md-2 form-control-static">제출일</label>
                        <div class="col-md-3 form-control-static">
                            {{$data['RegDatm']}}
                        </div>
                    </div>
                </div>
            </div>


            <div class="row form-group-sm">
                <ul class="nav nav-tabs nav-divider">
                    <li><a data-toggle="tab" href="#content_1">과제보기</a></li>
                    <li class="active"><a data-toggle="tab" href="#content_2">작성답안</a></li>
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
                                        @if(empty($data['arr_attach_file_path_admin'][$i]) === false)
                                            [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_attach_file_path_admin'][$i].$data['arr_attach_file_name_admin'][$i])}}" data-file-name="{{ urlencode($data['arr_attach_file_real_name_admin'][$i]) }}" target="_blank">
                                                {{ $data['arr_attach_file_real_name_admin'][$i] }}
                                            </a> ] <span class="mr-10"></span>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label class="control-label col-md-1" for="content">내용</label>
                                <div class="col-md-10">
                                    {!! $data['BoardContent'] !!}
                                </div>
                            </div>
                        </div>

                        <div id="content_2" class="tab-pane fade in active">
                            <div class="form-group form-group-sm">
                                <label class="control-label col-md-1" for="content">첨부2</label>
                                <div class="col-md-10">
                                    @for($i = 0; $i < $attach_file_cnt; $i++)
                                        @if(empty($data['arr_attach_file_path_user'][$i]) === false)
                                            [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_attach_file_path_user'][$i].$data['arr_attach_file_name_user'][$i])}}" data-file-name="{{ urlencode($data['arr_attach_file_real_name_user'][$i]) }}" target="_blank">
                                                {{ $data['arr_attach_file_real_name_user'][$i] }}
                                            </a> ] <span class="mr-10"></span>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label class="control-label col-md-1" for="content">내용</label>
                                <div class="col-md-10">
                                    {!! $data['AssignmentContent'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                var $modal_regi_form = $('#modal_regi_form');
                $(document).ready(function() {
                    $('.file-download').click(function() {
                        var _url = '{{ site_url("/site/supporters/activityHistory/download") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                        window.open(_url, '_blank');
                    });

                    // 파일삭제
                    $('.file-delete').click(function() {
                        var target_file_id = $(this).data('target-file-id');
                        var _url = '{{ site_url("/site/supporters/activityHistory/destroyFile/") }}' + getQueryString();
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
                });
            </script>
        @stop

        @section('layer_footer')
    </form>
@endsection