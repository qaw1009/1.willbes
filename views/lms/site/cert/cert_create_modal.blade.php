@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "인증등록" }}
@stop

@php
    $disabled = '';
    if($method == 'PUT') {
        $disabled = "disabled";
    }
@endphp


@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_modal_form" name="regi_modal_form" method="POST" onsubmit="return false;" novalidate>

        {!! csrf_field() !!}
        {!! method_field($method) !!}

        <input type="hidden" name="CertIdx" id="CertIdx" value="{{$CertIdx}}">

        @endsection

        @section('layer_content')
            {!! form_errors() !!}

                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="GroupName">운영사이트 <span class="required">*</span></label>
                    <div class="col-md-4">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', $disabled) !!}
                    </div>
                    <label class="control-label col-md-2" for="">카테고리 <span class="required">*</span></label>
                    <div class="col-md-4">
                        <select class="form-control" id="CateCode" name="CateCode" title="카테고리" required="required">
                            <option value="">카테고리</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}" @if($data['CateCode'] == $row['CateCode']) selected="selected"@endif >{{ $row['CateRouteName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="CcdName">인증구분 <span class="required">*</span></label>
                    <div class="col-md-4">
                        <select class="form-control" id="CertTypeCcd" name="CertTypeCcd" title="인증구분" required="required">
                            <option value="">인증구분</option>
                            @foreach($CertType_ccd as $key=>$val)
                                <option value="{{ $key }}" @if($data['CertTypeCcd'] == $key) selected="selected"@endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="CertTitle">인증제목 <span class="required">*</span></label>
                    <div class="col-md-4">
                        <input type="text" id="CertTitle" name="CertTitle" maxlength="30" value="{{ $data['CertTitle'] }}" title="인증제목"  class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="CertConditionCcd">인증조건 <span class="required">*</span></label>
                    <div class="col-md-10">
                        <div class="radio">
                            @foreach($CertCondition_ccd as $key=>$val)
                                <input type="radio" name="CertConditionCcd" id="CertConditionCcd{{$loop->index}}" value="{{$key}}" class="flat" required="required" @if($data['CertConditionCcd']==$key) checked="checked" @else @if($loop->index == 1) checked="checked" @endif @endif > <label class="input-label">{{$val}}</label>&nbsp;&nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="No">인증회차 <span class="required">*</span></label>
                    <div class="col-md-4 form-inline item" >
                        <select class="form-control" id="No" name="No" title="인증회차" style="width:60px;">
                            @for($i=1;$i<=50;$i++)
                                <option value="{{ $i }}" @if($data['No'] == $i) selected="selected"@endif>{{ $i }}</option>
                            @endfor
                        </select> 회
                    </div>
                    <label class="control-label col-md-2" for="">인증기간 <span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <input type="text" name="CertStartDate" id="CertStartDate" value="@if($method==='PUT'){{date("Y-m-d",strtotime($data['CertStartDate']))}}@endif" class="form-control datepicker" title="인증기간" style="width:100px;" required="required">
                        ~
                        <input type="text" name="CertEndDate" id="CertEndDate" value="@if($method==='PUT'){{date("Y-m-d",strtotime($data['CertEndDate']))}}@endif" class="form-control datepicker" title="인증기간" style="width:100px;" required="required" >
                    </div>
                </div>
                <div class="form-group form-group-sm item select_div" id="div_685001">
                    <label class="control-label col-md-2" >선택 <span class="required">*</span></label>
                    <div class="col-md-2">
                        <button type="button" id="searchPackage" class="btn btn-sm btn-primary btn-search-pass">무한패스검색</button>
                    </div>
                    <div class="col-md-8">
                        <span id="selected_lecture" class="selected_content">
                            @if($data['CertConditionCcd'] === '685001' && empty($data['productData_json']) === false)
                                @foreach(json_decode($data['productData_json'], true) as $idx => $row)
                                    <span class="pr-10">
                                        [{{$row['ProdCode']}}] {{$row['ProdName']}}
                                        <a href="#none" data-prod-code="{{$row['ProdCode']}}" class="selected-product-delete"><i class="fa fa-times red"></i></a>
                                        <input type="hidden" name="ProdCode[]" value="{{$row['ProdCode']}}"/>
                                    </span>
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group form-group-sm item select_div" id="div_685002">
                    <label class="control-label col-md-2" >쿠폰선택 <span class="required">*</span></label>
                    <div class="col-md-2">
                        <button type="button" id="searchCoupon" class="btn btn-sm btn-primary">쿠폰검색</button>
                    </div>
                    <div class="col-md-8">
                        <span id="selected_coupon" class="selected_content">
                            @if(empty($data['couponData_json']) === false)
                                @foreach(json_decode($data['couponData_json'], true) as $idx => $row)
                                    <span id='coupon_{{$row['CouponIdx']}}'><input type='hidden'  name='CouponIdx[]' id='CouponIdx{{$row['CouponIdx']}}' value='{{$row['CouponIdx']}}'>
                                        [{{$row['CouponIdx']}}] {{$row['CouponName']}}
                                        <a href='javascript:;' onclick="rowDelete('coupon_{{$row['CouponIdx']}}')"><i class="fa fa-times red"></i></a>&nbsp;&nbsp;&nbsp;</span>
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group form-group-sm item select_div" id="div_685004">
                    <label class="control-label col-md-2" >상품선택 <span class="required">*</span></label>
                    <div class="col-md-2">
                        <button type="button" id="searchProduct" class="btn btn-sm btn-primary btn-search-product">온라인강좌검색</button>
                    </div>
                    <div class="col-md-8">
                        <span id="selected_product" class="selected_content">
                            @if($data['CertConditionCcd'] === '685004' && empty($data['productData_json']) === false)
                                @foreach(json_decode($data['productData_json'], true) as $idx => $row)
                                    <span class="pr-10">
                                        [{{$row['ProdCode']}}] {{$row['ProdName']}}
                                        <a href="#none" data-prod-code="{{$row['ProdCode']}}" class="selected-product-delete"><i class="fa fa-times red"></i></a>
                                        <input type="hidden" name="prod_code[]" value="{{$row['ProdCode']}}"/>
                                    </span>
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>

                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="IsAutoApproval">자동승인여부 <span class="required">*</span></label>
                    <div class="col-md-4">
                        <div class="radio">
                            <input type="radio" id="IsAutoApproval_Y" name="IsAutoApproval" class="flat" value="Y" required="required" @if($data['IsAutoApproval']=='Y')checked="checked"@endif/> <label for="IsAutoApproval_Y" class="input-label">사용</label>
                            <input type="radio" id="IsAutoApproval_N" name="IsAutoApproval" class="flat" value="N" required="required" @if($method=="POST" || $data['IsAutoApproval']=='N')checked="checked"@endif/> <label for="IsAutoApproval_N" class="input-label">미사용</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="IsAutoSms">자동문자발송여부 <span class="required">*</span></label>
                    <div class="col-md-4">
                        <div class="radio">
                            <input type="radio" id="IsAutoSms_Y" name="IsAutoSms" class="flat" value="Y" required="required" @if($data['IsAutoSms']=='Y')checked="checked"@endif/> <label for="IsAutoSms_Y" class="input-label">사용</label>
                            <input type="radio" id="IsAutoSms_N" name="IsAutoSms" class="flat" value="N" required="required" @if($method=="POST" || $data['IsAutoSms']=='N')checked="checked"@endif/> <label for="IsAutoSms_N" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span></label>
                    <div class="col-md-4">
                        <div class="radio">
                            <input type="radio" id="IsUse_Y" name="IsUse" class="flat" value="Y" required="required" @if($method=="POST" || $data['IsUse']=='Y')checked="checked"@endif/> <label for="IsUse_Y" class="input-label">사용</label>
                            <input type="radio" id="IsUse_N" name="IsUse" class="flat" value="N" required="required" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="IsUse_N" class="input-label">미사용</label>
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
            <script type="text/javascript">
                var $regi_modal_form = $('#regi_modal_form');

                $(document).ready(function() {

                    $regi_modal_form.find('select[name="CateCode"]').chained("#site_code");

                    $regi_modal_form.on('ifChanged', 'input[name="CertConditionCcd"]:checked', function() {
                        elementHideShow($(this).val());
                    });

                    elementHideShow('{{$data['CertConditionCcd']}}');

                    function elementHideShow(strVal) {
                        $div = $('.select_div');
                        $div.addClass('hide');
                        $div.each(function() {
                            $('#div_'+strVal).removeClass('hide');
                        });
                    }
                    //무한패스검색
                    $('#searchPackage').on('click', function(e) {
                        var id = 'selected_lecture';
                        if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                        $('#searchPackage').setLayer({
                            'url' : '{{ site_url('common/searchPeriodPackage/')}}'+'?site_code='+$("#site_code").val()+'&locationid='+id
                            ,'width' : 1200
                        })
                    });

                    //쿠폰검색
                    $('#searchCoupon').on('click', function(e) {
                        var id = 'selected_coupon';
                        if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                        $('#searchCoupon').setLayer({
                            'url' : '{{ site_url('common/searchCoupon/') }}'+'?site_code='+$("#site_code").val()+'&ProdCode='+$('#ProdCode').val()+'&locationid='+id
                            ,'width' : 900
                        })
                    });

                    //강좌상품검색
                    $('#searchProduct').on('click', function(e) {
                        if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                        $('#searchProduct').setLayer({
                            'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + $("#site_code").val() + '&prod_type=on&return_type=inline&target_id=selected_product&target_field=prod_code&is_event=Y',
                            'width' : 1200
                        })
                    });

                    // ajax submit
                    $regi_modal_form.submit(function() {
                        var _url = '{{ site_url('/site/cert/cert/store') }}';
                        ajaxSubmit($regi_modal_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#cert_create").modal('toggle');
                                location.replace('{{ site_url('/site/cert/cert/') }}' + dtParamsToQueryString($datatable));
                            }
                        }, showValidateError, addValidate, false, 'alert');
                    });

                    function addValidate()
                    {
                        $checked_type = $('input:radio[name="CertConditionCcd"]:checked').val();

                        if($checked_type === '685001') {
                            if($('#selected_lecture').find($("input[name='ProdCode[]']")).length == 0){
                                alert('무한패스를 선택하여 주십시오.');$('#searchLecture').focus();return;
                            }
                        } else if($checked_type === '685002') {
                            if( $("input[name='CouponIdx[]']").length == 0) {
                                alert('쿠폰을 선택하여 주십시오.');$('#searchCoupon').focus();return;
                            }
                        } else if($checked_type === '685004') {
                            if($('#selected_product').find($("input[name='prod_code[]']")).length == 0){
                                alert('온라인강좌를 선택하여 주십시오.');$('#searchProduct').focus();return;
                            }
                        }

                        $('.select_div').each(function(idx){
                            if(this.id !== 'div_'+$checked_type) {
                                $('#'+this.id).find('span.selected_content').children().remove();
                            }
                        });

                        return true;
                    }
                });

                $regi_modal_form.on('click', '.selected-product-delete', function() {
                    $(this).parent().remove();
                });

                function rowDelete(strRow) {
                    $('#'+strRow).remove();
                }
            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection