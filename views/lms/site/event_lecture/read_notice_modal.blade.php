@extends('lcms.layouts.master_modal')

@section('layer_title')
    공지사항 정보
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_read_notice_form" name="modal_read_notice_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
@endsection

    @section('layer_content')
        <div class="x_panel">
            <div class="x_title">
                <h2>공지게시판 정보</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="">제목</label>
                    <div class="form-control-static col-md-9">
                        {!! ($data['IsBest'] == 'Y') ? '<span class="red">[HOT]</span>' : '' !!} {{$data['Title']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">운영사이트</label>
                    <div class="form-control-static col-md-2">
                        {{$data['SiteName']}}
                    </div>
                    <label class="control-label col-md-2" for="">구분</label>
                    <div class="form-control-static col-md-6">
                        @foreach($data['arr_cate_code'] as $key => $val)
                            {{$val}} @if ($loop->last === false) | @endif
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">캠퍼스</label>
                    <div class="form-control-static col-md-5">
                        {{$data['CampusName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">사용</label>
                    <div class="form-control-static col-md-5">
                        {{ ($data['IsUse'] == 'Y') ? '사용' : '미사용' }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">첨부</label>
                    <div class="col-md-4">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            @if(empty($data['arr_attach_file_path'][$i]) === false)
                                <p class="form-control-static">[ <a href="{{ $data['arr_attach_file_path'][$i] . $data['arr_attach_file_name'][$i] }}" rel="popup-image">{{ $data['arr_attach_file_name'][$i] }}</a> ]</p>
                            @endif
                        @endfor
                    </div>
                    <label class="control-label col-md-2" for="">조회수(생성)</label>
                    <div class="form-control-static col-md-2">
                        {{$data['ReadCnt']}} ({{$data['SettingReadCnt']}})
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">내용</label>
                    <div class="form-control-static col-md-9">{!! $data['Content'] !!}</div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-2">
                        <p class="form-control-static">{{ $data['wAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-2">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var $modal_read_notice_form = $('#modal_read_notice_form');

            $(document).ready(function() {
                $('#btn_notice_delete').click(function() {
                    var _url = '{{ site_url("/site/eventLecture/deleteNotice/".$board_idx) }}';
                    var data = {
                        '{{ csrf_token_name() }}' : $modal_read_notice_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        '_method' : 'DELETE'
                    };

                    if (!confirm('해당 공지사항을 삭제하시겠습니까?')) {
                        return;
                    }
                    sendAjax(_url, data, function(ret) {
                        if (ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $('#pop_modal').modal("toggle");    //modal close
                            $datatable_comment.draw();          //comment table draw
                        }
                    }, showError, false, 'POST');
                });

                $('#btn_notice_modify').click(function() {
                    var uri_param = '?board_idx='+"{{$board_idx}}";
                    replaceModal('{{ site_url('/site/eventLecture/createNoticeModal/'.$el_idx) }}' + uri_param, {});
                });
            });
        </script>
    @stop

    @section('add_buttons')
    {{--<button type="submit" class="btn btn-success">저장</button>--}}
            <button type="button" class="pull-left btn btn-danger" id="btn_notice_delete">삭제</button>
            <button type="button" class="btn btn-success mr-10" id="btn_notice_modify">수정</button>
    @endsection

    @section('layer_footer')
    </form>
@endsection