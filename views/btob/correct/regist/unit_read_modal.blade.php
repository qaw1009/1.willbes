@extends('lcms.layouts.master_modal')

@section('layer_title')
    과제정보
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" novalidate action="{{ site_url('/crm/sms/storeSend') }}">--}}
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="title">회차명<span class="required">*</span></label>
                        <div class="col-md-8 form-control-static item">
                            {{ $data['Title'] }}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="title">제출기간<span class="required">*</span></label>
                        <div class="col-md-3 form-control-static item">
                            {{ $data['StartDate'] }} - {{ $data['EndDate'] }}
                        </div>
                        <label class="control-label col-md-2" for="title">채점료<span class="required">*</span></label>
                        <div class="col-md-2 form-control-static item">
                            {{ $data['Price'] }}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="is_use_y">사용여부<span class="required">*</span></label>
                        <div class="col-md-4 form-control-static item">
                            {{ ($data['IsUse'] == 'Y') ? '사용' : '미사용' }}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="attach_img_1">첨부</label>
                        <div class="col-md-10 form-control-static">
                            @for($i = 0; $i < $attach_file_cnt; $i++)
                                @if(empty($data['arr_attach_file_path'][$i]) === false)
                                    [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_attach_file_path'][$i].$data['arr_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_attach_file_real_name'][$i]) }}" target="_blank">
                                        {{ $data['arr_attach_file_real_name'][$i] }}
                                    </a> ] <span class="mr-10"></span>
                                @endif
                            @endfor
                        </div>
                    </div>

                    <div class="form-group form-group-sm item">
                        <label class="control-label col-md-2" for="content">내용 <span class="required">*</span>
                        </label>
                        <div class="col-md-8 mt-5">
                            {!! $data['Content'] !!}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2">등록자
                        </label>
                        <div class="col-md-2 form-control-static">
                            {{ $data['AdminName'] }}
                        </div>
                        <label class="control-label col-md-2 col-lg-offset-1">등록일
                        </label>
                        <div class="col-md-5 form-control-static">
                            {{ $data['RegDatm'] }}
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2">최종 수정자
                        </label>
                        <div class="col-md-2 form-control-static">
                            {{ $data['UpdAdminName'] }}
                        </div>
                        <label class="control-label col-md-2 col-lg-offset-1">최종 수정일
                        </label>
                        <div class="col-md-5 form-control-static">
                            {{ $data['UpdDatm'] }}
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                var $modal_regi_form = $('#modal_regi_form');

                //데이터 수정 폼
                $('.btn-modify').click(function() {
                    var site_code = '{{$input_params['site_code']}}';
                    var prod_code = '{{$input_params['prod_code']}}';

                    // 등록 폼으로 내용 변경
                    var data = {'site_code' : site_code, 'prod_code' : prod_code};
                    replaceModal('{{ site_url("/correct/regist/unitCreateModal/{$input_params['correct_idx']}?") }}', data);
                });

                //파일다운로드
                $('.file-download').click(function() {
                    var _url = '{{ site_url("/correct/regist/unitFileDownload") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                    window.open(_url, '_blank');
                });

                //데이터 삭제
                $('.btn-delete').click(function() {
                    var _url = '{{ site_url("/correct/regist/unitDelete") }}/' + {{$input_params['correct_idx']}};
                    var data = {
                        '{{ csrf_token_name() }}' : $modal_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        '_method' : 'DELETE'
                    };

                    if (!confirm('해당 과제를 삭제하시겠습니까?')) {
                        return;
                    }
                    sendAjax(_url, data, function(ret) {
                        if (ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $("#pop_modal").modal('toggle');
                            $datatable.draw();
                        }
                    }, showError, false, 'POST');
                });
            </script>
        @stop


        @section('add_buttons')
            <button type="button" class="btn pull-left btn-danger btn-delete">삭제</button>
            <button type="button" class="btn btn-success btn-modify">수정</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection