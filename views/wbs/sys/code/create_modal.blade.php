@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ $makeType === "group" ? "그룹유형등록" : "세부항목등록"}}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}

        <input type="hidden" name="makeType" value="{{$makeType}}" />
        <input type="hidden" name="groupCcd" value="{{$groupCcd}}" />
        <input type="hidden" name="Ccd" value="{{$Ccd}}" />
@endsection

@section('layer_content')
    {!! form_errors() !!}

    @if($makeType==="group")
        <div class="form-group form-group-sm item">
            <label class="control-label col-md-2" for="GroupName">그룹유형명 <span class="required">*</span></label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="CcdName" id="CcdName" title="그룹유형명" value="{{ $data['wCcdName'] }}">
            </div>
            <label class="control-label col-md-2" for="">그룹유형코드 <span class="required">*</span></label>
            <div class="col-md-4">
                <p class="form-control-static"> {{ $data['wCcd'] or '등록시 자동 생성'}} </p>
            </div>
        </div>
    @elseif($makeType==="sub")
        <div class="form-group form-group-sm item">
            <label class="control-label col-md-2" for="GroupName">그룹유형명 <span class="required">*</span></label>
            <div class="col-md-4">
                <p class="form-control-static">{{$parent_data['wCcdName']}}</p>
            </div>
            <label class="control-label col-md-2" for="">그룹유형코드 <span class="required">*</span></label>
            <div class="col-md-4">
                <p class="form-control-static">{{$groupCcd}}</p>
            </div>
        </div>
        <div class="form-group form-group-sm item">
            <label class="control-label col-md-2" for="CcdName">세부항목명 <span class="required">*</span></label>
            <div class="col-md-4">
                <input type="text" id="CcdName" name="CcdName" required="required" class="form-control" title="세부항목명" value="{{ $data['wCcdName'] }}">
            </div>
            <label class="control-label col-md-2" for="">세부항목코드 <span class="required">*</span></label>
            <div class="col-md-4">
                <p class="form-control-static">{{ $data['wCcd'] or '등록시 자동 생성'}}</p>
            </div>
        </div>
        <div class="form-group form-group-sm item">
            <label class="control-label col-md-2" for="CcdValue">세부항목값 <span class="required">*</span></label>
            <div class="col-md-4">
                <input type="text" id="CcdValue" name="CcdValue" required="required" class="form-control" title="세부항목값" value="{{ $data['wCcdValue'] }}">
            </div>
            <label class="control-label col-md-2" for="CcdDesc">세부항목설명</label>
            <div class="col-md-4">
                <input type="text" id="CcdDesc" name="CcdDesc"  class="form-control" title="세부항목설명" value="{{ $data['wCcdDesc'] }}">
            </div>
        </div>
        <div class="form-group form-group-sm item">
            <label class="control-label col-md-2" for="CcdEtc">세부항목기타</label>
            <div class="col-md-10">
                <input type="text" id="CcdEtc" name="CcdEtc"  class="form-control" title="기타" value="{{ $data['wCcdEtc'] }}">
            </div>
        </div>
        <div class="form-group form-group-sm item">
            <label class="control-label col-md-2" for="IsUse">사용여부 <span class="required">*</span></label>
            <div class="col-md-4">
                <div class="radio">
                    <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" @if($method=="POST" || $data['wIsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                    <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" required="required" @if($data['wIsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                </div>
            </div>
            <label class="control-label col-md-2" for="OrderNum">노출순서</label>
            <div class="col-md-1">
                <input type="text" id="OrderNum" name="OrderNum"  class="form-control" title="노출순서" value="{{ $data['wOrderNum'] or $parent_data['NextOrderNum'] }}" style="width: 40px">
            </div>
            <div class="col-md-3">
                <p class="form-control-static">미입력 시 마지막 DP</p>
            </div>
        </div>
    @endif

    @if($method==="PUT")
        <div class="form-group form-group-sm item">
            <label class="control-label col-md-2" for="">등록자 </label>
            <div class="col-md-4">
                <p class="form-control-static">{{ $data['wAdminName'] }}</p>
            </div>
            <label class="control-label col-md-2" for="">등록일</label>
            <div class="col-md-4">
                <p class="form-control-static"> {{ $data['wRegDatm'] }}</p>
            </div>
        </div>
        <div class="form-group form-group-sm item">
            <label class="control-label col-md-2">최종수정자</label>
            <div class="col-md-4">
                <p class="form-control-static"> {{ $data['wUpdAdminName'] }}</p>
            </div>
            <label class="control-label col-md-2">최종수정일</label>
            <div class="col-md-4">
                <p class="form-control-static"> {{ $data['wUpdDatm'] }}</p>
            </div>
        </div>
    @endif
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/code/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        location.replace('{{ site_url('/sys/code/') }}' + dtParamsToQueryString($datatable));
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">Submit</button>
@endsection

@section('layer_footer')
    </form>
@endsection