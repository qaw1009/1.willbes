@extends('lcms.layouts.master_modal')

@section('layer_title')
    학습상담 확인
@stop

@section('layer_header')
@endsection

@section('layer_content')
    <form class="form-horizontal" id="_search_form_calendar" name="_search_form_calendar" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">제목</label>
            <div class="col-md-11 form-control-static">
                {{$data['Title']}}
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">수강정보</label>
            <div class="col-md-11 form-control-static">
                {{$data['TypeCcdName']}} <span class="ml-10 mr-10">|</span> {{$data['SubjectName']}} <span class="ml-10 mr-10">|</span> {{$data['ProdName']}}
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">공개여부</label>
            <div class="col-md-5 form-control-static">
                {!! ($data['IsPublic'] == 'Y') ? '공개' : '<span class="red">비공개</span>'  !!}
            </div>
            <label class="col-md-1 control-label">조회수</label>
            <div class="col-md-5 form-control-static">
                {{$data['ReadCnt']}} ({{$data['SettingReadCnt']}})
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">첨부</label>
            <div class="col-md-11 form-control-static">
                @for($i = 0; $i < $attach_file_cnt; $i++)
                    @if(empty($data['arr_attach_file_path'][$i]) === false)
                        [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_attach_file_path'][$i].$data['arr_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_attach_file_real_name'][$i]) }}" target="_blank">
                            {{ $data['arr_attach_file_real_name'][$i] }}
                        </a> ]
                    @endif
                @endfor
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">상담내용</label>
            <div class="col-md-11" style="margin-top: 3px;">
                {!! nl2br($data['Content']) !!}
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">등록자</label>
            <div class="col-md-5 form-control-static">
                {{$data['MemName']}}({{$data['MemId']}})
            </div>
            <label class="col-md-1 control-label">등록일</label>
            <div class="col-md-5 form-control-static">
                {{ $data['RegDatm'] }}
            </div>
        </div>

        {{--답변--}}
        <div class="form-group form-group-sm mt-30">
            <label class="col-md-1 control-label">답변자</label>
            <div class="col-md-5 form-control-static">
                {{$data['qnaAdminName']}}
            </div>
            <label class="col-md-1 control-label">답변일</label>
            <div class="col-md-5 form-control-static">
                {{$data['ReplyRegDatm']}}
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">최종답변자</label>
            <div class="col-md-5 form-control-static">
                {{$data['qnaUpdAdminName']}}
            </div>
            <label class="col-md-1 control-label">최종답변일</label>
            <div class="col-md-5 form-control-static">
                {{$data['ReplyUpdDatm']}}
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="col-md-1 control-label">답변내용</label>
            <div class="col-md-11" style="margin-top: 3px;">
                {!! $data['ReplyContent'] !!}
            </div>
        </div>
    </form>
@stop
@section('add_buttons')

@endsection
@section('layer_footer')
<script type="text/javascript">
    $('.file-download').click(function() {
        var _url = '{{ site_url("/site/supporters/member/download") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
        window.open(_url, '_blank');
    });
</script>
@endsection