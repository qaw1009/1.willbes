@extends('lcms.layouts.master')

@section('content')
    <h5>- 제휴 할인율을 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>제휴할인 정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                        <p class="form-control-static ml-30"># 최초 등록 후 운영사이트는 수정이 불가능합니다.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="aff_type_ccd">제휴구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                         <select class="form-control" id="aff_type_ccd" name="aff_type_ccd" title="제휴구분" required="required">
                             <option value="">선택</option>
                            @foreach($arr_aff_type_ccd as $key => $val)
                                <option value="{{ $key }}" @if($key == $data['AffTypeCcd'] || ($method == 'POST' && $loop->index == 1)) selected="selected" @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="aff_name">제휴업체명 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="aff_name" name="aff_name" class="form-control" title="제휴업체명" required="required" value="{{ $data['AffName'] }}">
                    </div>
                    <label class="control-label col-md-1-1 col-md-offset-1">제휴업체코드
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['AffIdx'] }}@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="apply_type_ccd_1">적용구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <div class="checkbox item">
                            @foreach($arr_apply_type_ccd as $key => $val)
                                <input type="checkbox" id="apply_type_ccd_{{ $loop->index }}" name="apply_type_ccd[]" class="flat" value="{{ $key }}" @if($loop->index === 1) required="required" title="적용구분" @endif @if($method == 'PUT' && in_array($key, $data['ApplyTypeCcds']) === true)checked="checked"@endif/> <label for="apply_type_ccd_{{ $loop->index }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="disc_rate">할인율 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                        <input type="number" id="disc_rate" name="disc_rate" class="form-control" required="required" title="할인율" value="{{ $data['DiscRate'] }}" style="width: 140px;">
                        <select class="form-control" id="disc_type" name="disc_type">
                            <option value="R" @if('R' == $data['DiscType']) selected="selected" @endif>%</option>
                            <option value="P" @if('P' == $data['DiscType']) selected="selected" @endif>원</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse'] == 'Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse'] == 'N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/product/etc/affiliateDisc/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        goList();
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 목록 이동
            $('#btn_list').click(function() {
                goList();
            });

            var goList = function() {
                location.replace('{{ site_url('/product/etc/affiliateDisc/index') }}' + getQueryString());
            };
        });
    </script>
@stop
