@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "검색어설정" }}
@stop

@php
    $disabled = '';
    if($method == 'PUT') {
        $disabled = "disabled";
    }
@endphp

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="SwIdx" id="SwIdx" value="{{$SwIdx}}">
        @endsection

        @section('layer_content')
            {!! form_errors() !!}

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="SiteCode">운영사이트 <span class="required">*</span></label>
                <div class="col-md-4">
                    {!! html_site_select($data['SiteCode'], 'SiteCode', 'SiteCode', '', '운영 사이트', 'required', $disabled, true, $arr_site_code) !!}
                </div>
                <label class="control-label col-md-2" for="CateCode">카테고리</label>
                <div class="col-md-4">
                    <select class="form-control" id="CateCode" name="CateCode" title="카테고리">
                        <option value="">카테고리</option>
                        @foreach($arr_category as $row)
                            <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}" @if($data['CateCode'] == $row['CateCode']) selected="selected"@endif >{{ $row['CateRouteName'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="SearchWord">검색어설정<span class="required">*</span></label>
                <div class="col-md-4">
                    <input type="text" id="SearchWord" name="SearchWord" maxlength="30" value="{{ $data['SearchWord'] }}" title="검색어 설정"  class="form-control" required="required">
                </div>
                <label class="control-label col-md-2" for="StartDate">적용기간 <span class="required">*</span></label>
                <div class="col-md-4 form-inline item">
                    <input type="text" name="StartDate" id="StartDate" value="@if($method==='PUT'){{date("Y-m-d",strtotime($data['StartDate']))}}@endif" class="form-control datepicker" title="검색어 적용기간" style="width:100px;" required="required">
                    ~
                    <input type="text" name="EndDate" id="EndDate" value="@if($method==='PUT'){{date("Y-m-d",strtotime($data['EndDate']))}}@endif" class="form-control datepicker" title="검색어 적용기간" style="width:100px;" required="required" >
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="TargetType">검색어연결방식 <span class="required">*</span></label>
                <div class="col-md-10 form-inline">
                    <select name="TargetType" id="TargetType" class="form-control TargetType" title="연결방식" required="required">
                        <option value="S" {{ $data['TargetType'] == 'S' ? 'selected="selected"' : ''}}>통합검색</option>
                        <option value="L" {{ $data['TargetType'] == 'L' ? 'selected="selected"' : ''}}>링크연결</option>
                    </select>
                    <input type="text" id="TargetUrl" name="TargetUrl" value="{{ $data['TargetUrl'] }}" title="이동주소" {{$data['TargetType'] == 'L' ?  '' : "disabled='disabled'"}} class="form-control" style="width:540px" >
                    <select name="TargetOpen" id="TargetOpen" class="form-control TargetOpen" title="오픈방식" required="required" {{$data['TargetType'] == 'L' ? '': "disabled='disabled'"}}>
                        <option value="_self" {{ $data['TargetOpen'] == '_self' ? 'selected="selected"' : ''}}>현재창</option>
                        <option value="_blank" {{ $data['TargetOpen'] == '_blank' ? 'selected="selected"' : ''}}>새창</option>
                    </select>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="OrderNum">정렬순서 <span class="required">*</span></label>
                <div class="col-md-4 form-inline">
                    <input type="text" class="form-control" name="OrderNum" style="width:50px" maxlength="3" required="required" value="@if($method=="POST"){{0}}@else{{$data["OrderNum"]}}@endif" title="정렬순서">
                    * 역순으로 노출
                </div>
                <label class="control-label col-md-2" for="IsUse_Y">사용여부 <span class="required">*</span></label>
                <div class="col-md-4">
                    <div class="radio">
                        <input type="radio" id="IsUse_Y" name="IsUse" class="flat" value="Y" required="required" @if($data['IsUse']=='Y')checked="checked"@endif/> <label for="IsUse_Y" class="input-label">사용</label>
                        <input type="radio" id="IsUse_N" name="IsUse" class="flat" value="N" required="required" @if($method=="POST" || $data['IsUse']=='N')checked="checked"@endif/> <label for="IsUse_N" class="input-label">미사용</label>
                    </div>
                </div>
            </div>


            @if($method==="PUT")
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

            <div class="form-group form-group-sm item">
                <div class="col-md-12 form-inline text-center">
                    <b>* 등록/수정된 검색어를 프론트 사이트에 적용하려면 반드시<font color="red">'검색어 적용(캐쉬)'</font> 버튼을 클릭해야 합니다.</b>
                </div>
            </div>

            <script type="text/javascript">
                var $regi_form = $('#regi_form');
                $(document).ready(function() {
                    $regi_form.find('select[name="CateCode"]').chained("#SiteCode");
                    $regi_form.on('change','.TargetType', function(){
                        (this.value === 'S') ? $("#TargetUrl, #TargetOpen").attr("disabled", true) : $("#TargetUrl, #TargetOpen").attr("disabled", false);
                    });

                    // ajax submit
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/site/search/searchWord/store') }}';
                        $('#SiteCode').removeAttr("disabled");
                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#word_create").modal('toggle');
                                location.replace('{{ site_url('/site/search/searchWord/') }}' + dtParamsToQueryString($datatable));
                            }
                        }, showValidateError, addFunction, false, 'alert');
                        function addFunction() {
                            $('#SiteCode').attr('disabled', true);
                            return true;
                        }
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