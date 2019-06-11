@extends('lcms.layouts.master_modal')

@section('layer_title')
    {{$boardInfo[$bm_idx]}}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="x_panel">
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
                        <label class="control-label col-md-2 col-lg-offset-1" for="">구분</label>
                        <div class="form-control-static col-md-5">
                            @if(empty($data['arr_cate_code']) === false)
                                @foreach($data['arr_cate_code'] as $key => $val)
                                    {{$val}} @if ($loop->last === false) | @endif
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="">캠퍼스</label>
                        <div class="form-control-static col-md-5">
                            {{$data['CampusName']}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="">과목명</label>
                        <div class="form-control-static col-md-2">
                            {{$data['SubjectName']}}
                        </div>
                        <label class="control-label col-md-2 col-lg-offset-1" for="">과정</label>
                        <div class="form-control-static col-md-2">
                            {{$data['CourseName']}}
                        </div>
                        <label class="control-label col-md-1" for="">교수명</label>
                        <div class="form-control-static col-md-2">
                            {{$data['ProfNickName']}}
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
                        <div class="col-md-3">
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
                        <label class="control-label col-md-2" for="">조회수(생성)</label>
                        <div class="form-control-static col-md-5">
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
                        <label class="control-label col-md-2 col-lg-offset-1">등록일
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
                        <label class="control-label col-md-2 col-lg-offset-1">최종 수정일
                        </label>
                        <div class="col-md-5">
                            <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="pull-right btn btn-primary" id="btn_list">목록</button>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                var $regi_form = $('#regi_form');

                $(document).ready(function() {
                    $('#btn_list').click(function() {
                        var bm_idx = '{{$bm_idx}}';
                        var get_site_code = '{{$get_site_code}}';
                        var path = '';

                        if (bm_idx == '82') {
                            path = 'ListOfflineBoardModal';
                        } else if (bm_idx == '83') {
                            path = 'ListLiveLectureMaterialModal';
                        }

                        var uri_route = path + '/' + bm_idx + '?site_code=' + get_site_code;
                        replaceModal('{{ site_url('/live/videoManager/') }}' + uri_route, {});
                    });

                    $('.file-download').click(function() {
                        var _url = '{{ site_url("/live/videoManager/download") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                        window.open(_url, '_blank');
                    });
                });
            </script>

        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection