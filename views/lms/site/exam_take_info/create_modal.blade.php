@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "응시데이터 등록" }}
@stop

@php
    $disabled = '';
    if($method == 'PUT') {
        $disabled = "";
    }
@endphp

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" id="idx" value="{{$idx}}">
        @endsection

        @section('layer_content')
            {!! form_errors() !!}

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="SiteCode">운영사이트 <span class="required">*</span></label>
                <div class="col-md-4">
                    {!! html_site_select($data['SiteCode'], 'SiteCode', 'SiteCode', '', '운영 사이트', 'required', $disabled) !!}
                </div>
                <label class="control-label col-md-2" for="YearTarget">학년도<span class="required">*</span></label>
                <div class="col-md-4 form-inline">
                    <select class="form-control" id="YearTarget" name="YearTarget" title="학년도" style="width: 80px" required="required">
                        <option value="">학년도</option>
                        @for($i=(date('Y')+1); $i>=2011; $i--)
                            <option value="{{$i}}" @if($data['YearTarget'] == $i) selected="selected" @endif>{{$i}}</option>
                        @endfor
                    </select>
                    &nbsp;&nbsp;
                    <input type="radio" name="TakeType" id="TakeType0" value="1" @if($method === 'POST' || $data['TakeType'] === '1') checked="checked" @endif title="시험구분" class="flat" required="required"> <label class="input-label">정시</label>
                    <input type="radio" name="TakeType" id="TakeType1" value="2" @if($data['TakeType'] === '2') checked="checked" @endif class="flat" title="시험구분" required="required"> <label class="input-label">추시</label>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="SubjectCcd">과목<span class="required">*</span></label>
                <div class="col-md-4">
                    <select class="form-control" id="SubjectCcd" name="SubjectCcd" title="과목" required="required">
                        <option value="">과목</option>
                        @foreach($exam_subject_ccd as $key=>$val)
                            <option value="{{$key}}"  @if($data['SubjectCcd'] == $key) selected="selected" @endif>{{$val}}</option>
                        @endforeach
                    </select>
                </div>
                <label class="control-label col-md-2" for="AreaCcd">지역<span class="required">*</span></label>
                <div class="col-md-4">
                    <select class="form-control" id="AreaCcd" name="AreaCcd" title="지역" required="required">
                        <option value="">지역</option>
                        @foreach($exam_area_ccd as $key=>$val)
                            <option value="{{$key}}" @if($data['AreaCcd'] == $key) selected="selected" @endif>{{$val}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="NoticeNumber">모집인원<span class="required">*</span></label>
                <div class="col-md-4">
                    <input type="number" id="NoticeNumber" name="NoticeNumber" maxlength="30" value="{{$data['NoticeNumber']}}" title="모집인원"  class="form-control" required="required" style="width: 150px">
                </div>
                <label class="control-label col-md-2" for="TakeNumber">지원인원<span class="required">*</span></label>
                <div class="col-md-4">
                    <input type="number" id="TakeNumber" name="TakeNumber" maxlength="30" value="{{$data['TakeNumber']}}" title="지원인원"  class="form-control" required="required" style="width: 150px">
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="CompetitionRate">경쟁률<span class="required">*</span></label>
                <div class="col-md-4 form-inline">
                    <input type="text" id="CompetitionRate" name="CompetitionRate" maxlength="30" value="{{$data['CompetitionRate']}}" title="경쟁률"  class="form-control" required="required" style="width: 150px">%
                </div>
                <label class="control-label col-md-2" for="PassLine">합격선<span class="required">*</span></label>
                <div class="col-md-4">
                    <input type="text" id="PassLine" name="PassLine" maxlength="30" value="{{$data['PassLine']}}" title="합격선"  class="form-control" required="required" style="width: 150px">
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span></label>
                <div class="col-md-4">
                    <input type="radio" id="IsUse_Y" name="IsUse" class="flat" value="Y" required="required" @if($method=="POST" || $data['IsUse']=='Y')checked="checked"@endif/> <label for="IsUse_Y" class="input-label">사용</label>
                    <input type="radio" id="IsUse_N" name="IsUse" class="flat" value="N" required="required" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="IsUse_N" class="input-label">미사용</label>
                </div>
            </div>

            @if($method === "PUT")
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="">등록자 </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2" for="">등록일</label>
                    <div class="col-md-4">
                        <p class="form-control-static"> {{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2">최종수정자</label>
                    <div class="col-md-4">
                        <p class="form-control-static"> {{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종수정일</label>
                    <div class="col-md-4">
                        <p class="form-control-static"> {{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
            @endif

            <script type="text/javascript">
                var $regi_form = $('#regi_form');
                $(document).ready(function() {
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/site/examTakeInfo/store') }}';
                        $('#SiteCode').removeAttr("disabled");
                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#exam_take_create").modal('toggle');
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