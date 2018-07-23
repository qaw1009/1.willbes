@extends('lcms.layouts.master')
@section('content')
    <h5>- 사이트 이용약관을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <div class="x_panel">
        <div class="x_title">
            <h2>이용약관정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="sup_idx" value="{{ $sup_idx }}"/>
                <input type="hidden" name="content_type" value="{{ $content_type }}"/>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="inline-block item">
                            {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="title">제목 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <input type="text" id="title" name="title" class="form-control" title="제목" required="required" value="{{$data['Title']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="applay_start_day">노출기간
                    </label>
                    <div class="col-md-10">
                        <div class="form-inline">
                            <input type="text" class="form-control datepicker" id="applay_start_day" name="applay_start_day" value="{{$data['ApplayStartDay']}}" style="width: 120px;">
                            <select class="form-control ml-5" id="applay_start_hour" name="applay_start_hour">
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['ApplayStartHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> 시 &nbsp; ~ &nbsp;&nbsp;
                            <input type="text" class="form-control datepicker" id="applay_end_day" name="applay_end_day" value="{{$data['ApplayEndDay']}}">
                            <select class="form-control ml-5" id="applay_end_hour" name="applay_end_hour">
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['ApplayEndHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> 시
                            &nbsp;&nbsp;&nbsp;&nbsp;• 노출기간 미 입력 시 '사용여부'로 노출 여부 설정
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="link_url">링크주소 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <input type="text" id="link_url" name="link_url" class="form-control" title="링크주소" required="required" value="{{$data['LinkUrl']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="content">내용 <span class="required">*</span><br/><br/>
                        {{--<button type="button" id="" class="btn btn-sm btn-default">미리보기</button>--}}
                    </label>
                    <div class="col-md-10 form-inline item">
                        <textarea id="content" name="content" class="form-control" rows="7" title="내용" required="required" placeholder="이용약관 소스를 등록해 주세요." style="width: 100%; resize: none;">{!! $data['Content'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                            <input type="radio" id="is_use_r" name="is_use" class="flat" value="R" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='R')checked="checked"@endif/> <label for="is_use_r" class="">대기</label>
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" @if($data['IsUse']=='Y')checked="checked"@endif/><label for="is_use_y" class="hover mr-5">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="content">설명
                    </label>
                    <div class="col-md-10 form-inline item">
                        <textarea id="desc" name="desc" class="form-control" rows="7" title="설명" style="width: 100%; resize: none;">{!! $data['Desc'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</p>
                    </div>
                </div>
                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            //목록
            $('#btn_list').click(function() {
                location.replace('{{ site_url("/site/terms/agreement/") }}' + getQueryString());
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/terms/agreement/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/terms/agreement/") }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop