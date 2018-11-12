@extends('lcms.layouts.master_modal')

@section('layer_title')
    과제등록
@stop

@section('layer_header')
<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" novalidate action="{{ site_url('/crm/sms/storeSend') }}">--}}
    {!! csrf_field() !!}
    {!! method_field($method) !!}

    @foreach($input_params as $key => $val)
        <input type="hidden" name="{{$key}}" value="{{$val}}">
    @endforeach
@endsection

@section('layer_content')
<div class="x_panel">
    <div class="x_content">
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="title">강의명<span class="required">*</span></label>
            <div class="col-md-8 item">
                <input type="text" id="title" name="title" required="required" class="form-control" maxlength="46" title="제목" value="{{ $data['Title'] }}" placeholder="제목 입니다.">
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="is_use_y">사용여부<span class="required">*</span></label>
            <div class="col-md-4 item form-inline">
                <div class="radio">
                    <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                    <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                </div>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="attach_img_1">첨부</label>
            <div class="col-md-10 form-inline">
                @for($i = 0; $i < $attach_file_cnt; $i++)
                    <div class="title">
                        <div class="filetype col-md-10">
                            <input type="text" class="form-control form-inline file-text mr-10 mt-5" disabled="" style="width: 70%">
                            <button class="btn form-inline btn-sm btn-primary mb-0 mt-5" type="button">파일 선택</button>
                            <span class="file-select file-btn">
                                <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control input-file" title="첨부{{ $i }}"/>
                            </span>
                        </div>
                        @if(empty($data['arr_attach_file_path'][$i]) === false)
                            <p class="form-control-static">[ <a href="{{ $data['arr_attach_file_path'][$i] . $data['arr_attach_file_name'][$i] }}" rel="popup-image">{{ $data['arr_attach_file_real_name'][$i] }}</a> ]
                                <a href="#none" class="file-delete" data-attach-idx="{{ $data['arr_attach_file_idx'][$i]  }}"><i class="fa fa-times red"></i></a>
                            </p>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

        <div class="form-group form-group-sm item">
            <label class="control-label col-md-2" for="content">내용 <span class="required">*</span>
            </label>
            <div class="col-md-8">
                <textarea id="content" name="content" required="required" class="form-control" rows="10" placeholder="" title="내용"></textarea>
            </div>
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
    var $modal_regi_form = $('#modal_regi_form');
    $(document).ready(function() {
        $modal_regi_form.submit(function() {
            var _url = '{{ site_url("/board/professor/{$boardName}/storeAssignment/{$prod_code}/") }}' + getQueryString();

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


@section('add_buttons')
    <button type="submit" class="btn btn-success">등록</button>
@endsection

@section('layer_footer')
</form>
@endsection