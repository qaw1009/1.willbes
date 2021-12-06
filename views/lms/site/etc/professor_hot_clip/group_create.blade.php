@extends('lcms.layouts.master')
@section('content')
    <h5>- 임용전용 핫클립 그룹 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="site_code" value="2017"/>    {{-- 임용온라인전용 --}}
        <input type="hidden" name="idx" value="{{ $idx }}"/>

        <div class="x_panel">
            <div class="x_title">
                <h2>핫클립 그룹정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                    @if($method == 'PUT')<button type="button" class="btn btn-danger btn-delete" data-idx="{{$idx}}">삭제</button>@endif
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1">메인,이벤트 유형<span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="view_type_main" name="view_type" class="flat" value="1" required="required" title="메인,이벤트 유형" @if($method == 'POST' || $data['ViewType']=='1')checked="checked"@endif/> <label for="view_type_main" class="input-label">메인</label>
                            <input type="radio" id="view_type_event" name="view_type" class="flat" value="2" @if($data['ViewType']=='2')checked="checked"@endif/> <label for="view_type_event" class="input-label">이벤트</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">그룹명<span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <input type="text" class="form-control" name="title" value="{{ $data['Title'] }}" required="required" title="그룹명">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/etc/professorHotClip/groupStore") }}' + getQueryString();
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/etc/professorHotClip/group") }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            //썸네일 개별 삭제
            $regi_form.on('click', '.btn-delete', function() {
                var _url = '{{ site_url("/site/etc/professorHotClip/groupDelete") }}/' + $(this).data('idx');
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE'
                };
                if (!confirm('삭제하시겠습니까?')) { return; }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        alert('삭제되었습니다.');
                        location.replace('{{ site_url("/site/etc/professorHotClip/group") }}');
                    }
                }, showError, false, 'POST');
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/etc/professorHotClip/group") }}' + getQueryString();
            });
        });
    </script>
@stop