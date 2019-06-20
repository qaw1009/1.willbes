@extends('lcms.layouts.master_modal')

@section('layer_title')
    제안/토론 확인
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form">
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="title">제목</label>
                        <div class="col-md-8 item">
                            {{ $data['Title'] }}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="is_public_y">공개여부</label>
                        <div class="col-md-4 item form-inline">
                            {{ ($data['IsPublic'] == 'Y') ? '사용' : '미사용' }}
                        </div>
                        <label class="control-label col-md-2" for="read_cnt">조회수</label>
                        <div class="col-md-4 item form-inline">
                            {{ $data['ReadCnt'] }}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="attach_img_1">첨부</label>
                        <div class="col-md-10 form-inline">
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
                        <label class="control-label col-md-2" for="content">내용 
                        </label>
                        <div class="col-md-8">
                            {!! $data['Content'] !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">등록자
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $data['MemName'] }}</p>
                        </div>
                        <label class="control-label col-md-2 col-lg-offset-1">등록일
                        </label>
                        <div class="col-md-5">
                            <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                var $modal_regi_form = $('#modal_regi_form');
                //파일다운로드
                $('.file-download').click(function() {
                    var _url = '{{ site_url("/site/supporters/activityHistory/download") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                    window.open(_url, '_blank');
                });
            </script>
        @stop

        @section('layer_footer')
    </form>
@endsection