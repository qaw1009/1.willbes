@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "광고계약등록" }}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>

        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="ContIdx" id="ContIdx" value="{{$ContIdx}}">
        @endsection

        @section('layer_content')
            {!! form_errors() !!}

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="ContName">계약명 <span class="required">*</span></label>
                <div class="col-md-10">
                    <input type="text" id="ContName" name="ContName"  value="{{ $data['ContName'] }}" title="계약명"  class="form-control" required="required">
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="StartDate">계약일 <span class="required">*</span></label>
                <div class="col-md-4 form-inline item" >
                    <input type="text" id="StartDate" name="StartDate" maxlength="10" value="{{ $data['StartDate'] }}" title="계약시작일"  style="width:110px" class="form-control datepicker" required="required">
                    ~
                    <input type="text" id="EndDate" name="EndDate" maxlength="10" value="{{ $data['EndDate'] }}" title="계약종료일"  style="width:110px" class="form-control datepicker" required="required">
                </div>
                <label class="control-label col-md-2" for="ExecutePrice">집행금액 <span class="required">*</span></label>
                <div class="col-md-4 form-inline item" >
                    <input type="number" id="ExecutePrice" name="ExecutePrice"  value="{{ $data['ExecutePrice'] }}" title="집행금액"  class="form-control" required="required">
                    * 전체금액 (숫자입력)
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="CompInfo">업체명 <span class="required">*</span></label>
                <div class="col-md-10 form-inline item">
                    <input type="text" id="CompInfo" name="CompInfo"  value="{{ $data['CompInfo'] }}" title="업체명"  class="form-control" required="required" style="width:265px;">
                    &nbsp;&nbsp;(광고대행, 카페 등 광고/홍보 주체)
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="CompPerson">업체담당자</label>
                <div class="col-md-4">
                    <input type="text" id="CompPerson" name="CompPerson" value="{{ $data['CompPerson'] }}" title="업체담당자"  class="form-control"">
                </div>
                <label class="control-label col-md-2" for="CompTel">업체연락처</label>
                <div class="col-md-4">
                    <input type="text" id="CompTel" name="CompTel" value="{{ $data['CompTel'] }}" title="업체연락처"  class="form-control">
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="">대표도메인 </label>
                <div class="col-md-6">
                    <input type="text" name="ReprDomain" id="ReprDomain" value="{{ $data['ReprDomain'] }}" class="form-control" title="대표도메인">
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="">코멘트 </label>
                <div class="col-md-6">
                    <textarea name="Content" title="코멘트" class="form-control" id="Content" placeholder="" rows="3" cols="100">{{$data['Content']}}</textarea>
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
            <script type="text/javascript">
                var $_regi_form = $('#_regi_form');

                $(document).ready(function() {
                    // ajax submit
                    $_regi_form.submit(function() {
                        var _url = '{{ site_url('/site/marketing/contract/store') }}';
                        ajaxSubmit($_regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#cert_create").modal('toggle');
                                //location.replace('{{ site_url('/site/marketing/contract/') }}' + dtParamsToQueryString($datatable));
                                location.reload();
                            }
                        }, showValidateError, addValidate, false, 'alert');
                    });

                    function addValidate()
                    {
                        return true;
                    }
                });

            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection