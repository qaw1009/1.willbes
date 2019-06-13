@extends('lcms.layouts.master_modal')

@section('layer_title')
    사이트 메뉴 정보
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
        <input type="hidden" name="menu_depth" value="{{ $menu_depth }}"/>
        <input type="hidden" name="parent_menu_idx" value="{{ $parent_menu_idx }}" required="required" title="부모메뉴코드"/>
@endsection

@section('layer_content')
        <div class="x_title text-right">
            <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
        </div>
        {!! form_errors() !!}
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="site_code">운영 사이트 <span class="required">*</span>
            </label>
            <div class="col-md-4 item">
                {!! html_site_select($site_code, 'site_code', 'site_code', '', '운영 사이트', 'required', ((empty($site_code) === false) ? 'disabled' : ''), true) !!}
            </div>
            <label class="control-label col-md-2" for="">운영 사이트 코드
            </label>
            <div class="col-md-4 form-control-static">
                <p id="selected_site_code">{{ $site_code }}</p>
            </div>
        </div>
        {{-- 하위메뉴 등록 --}}
        @if($menu_depth > 1)
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">메뉴 경로
                </label>
                <div class="col-md-10 form-control-static">
                    <p class="pl-0">{{ str_replace('>', ' > ', $menu_route_name) }}</p>
                </div>
            </div>
        @endif
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="menu_name">메뉴명 <span class="required">*</span>
            </label>
            <div class="col-md-4 item">
                <input type="text" id="menu_name" name="menu_name" required="required" class="form-control" title="메뉴명" value="{{ $data['MenuName'] }}">
            </div>
            <label class="control-label col-md-2">메뉴코드
            </label>
            <div class="col-md-4 form-control-static">
                @if($method == 'PUT'){{ $data['MenuIdx'] }}@else # 등록 시 자동 생성 @endif
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="menu_url">URL
            </label>
            <div class="col-md-8 item">
                <input type="text" id="menu_url" name="menu_url" class="form-control" title="URL" value="{{ $data['MenuUrl'] }}">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="menu_type">메뉴 구분 <span class="required">*</span>
            </label>
            <div class="col-md-10 item form-inline">
                <select class="form-control" id="menu_type" name="menu_type" title="메뉴 구분">
                    @foreach($menu_type_code as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="url_type">URL 구분
            </label>
            <div class="col-md-3">
                <select class="form-control" id="url_type" name="url_type" title="URL 구분">
                    <option value="route">내부 경로</option>
                    <option value="link">외부 경로</option>
                </select>
            </div>
            <label class="control-label col-md-2 col-md-offset-1" for="url_target">URL 타겟
            </label>
            <div class="col-md-3">
                <select class="form-control" id="url_type" name="url_target" title="URL 타겟">
                    <option value="self">현재창</option>
                    <option value="blank">새창</option>
                    <option value="parent">부모창</option>
                </select>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="menu_etc">기타
            </label>
            <div class="col-md-9 item">
                <input type="text" id="menu_etc" name="menu_etc" class="form-control" title="기타" value="{{ $data['MenuEtc'] }}">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="is_use">사용 여부 <span class="required">*</span>
            </label>
            <div class="col-md-10 item form-inline">
                <div class="radio">
                    <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                    <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                </div>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2">등록자
            </label>
            <div class="col-md-4 form-control-static">
                {{ $data['RegAdminName'] }}
            </div>
            <label class="control-label col-md-2">등록일
            </label>
            <div class="col-md-4 form-control-static">
                {{ $data['RegDatm'] }}
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2">최종 수정자
            </label>
            <div class="col-md-4 form-control-static">
                {{ $data['UpdAdminName'] }}
            </div>
            <label class="control-label col-md-2">최종 수정일
            </label>
            <div class="col-md-4 form-control-static">
                {{ $data['UpdDatm'] }}
            </div>
        </div>
        <script type="text/javascript">
            var $regi_form = $('#_regi_form');

            $(document).ready(function() {
                // 입력값 셋팅
                if($regi_form.find('input[name="_method"]').val() === 'PUT') {
                    $regi_form.find('select[name="menu_type"]').val('{{ $data['MenuType'] }}');
                    $regi_form.find('select[name="url_type"]').val('{{ $data['UrlType'] }}');
                    $regi_form.find('select[name="url_target"]').val('{{ $data['UrlTarget'] }}');
                }

                // 운영사이트 코드 셋팅
                $regi_form.find('select[name="site_code"]').change(function() {
                    $('#selected_site_code').html($(this).val());
                });

                // 메뉴 등록
                $regi_form.submit(function() {
                    var _url = '{{ site_url('/site/siteMenu/store') }}';

                    ajaxSubmit($regi_form, _url, function(ret) {
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
    <button type="submit" class="btn btn-success">저장</button>
@endsection

@section('layer_footer')
    </form>
@endsection