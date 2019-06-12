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
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>

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
                    <div class="col-md-10 form-inline item">
                        <div class="radio">
                            @foreach($CertCondition_ccd as $key=>$val)
                                <input type="radio" name="CertConditionCcd" id="CertConditionCcd{{$loop->index}}" value="{{$key}}" class="flat" required="required" @if($data['CertConditionCcd']==$key) checked="checked" @else @if($loop->index == 1) checked="checked" @endif @endif > {{$val}}&nbsp;&nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="No">인증회차 <span class="required">*</span></label>
                    <div class="col-md-4 form-inline item" >
                        <select class="form-control" id="No" name="No" title="인증회차" style="width:60px;">
                            @for($i=1;$i<=10;$i++)
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

                <div class="form-group form-group-sm item addProduct">
                    <label class="control-label col-md-2" for="No">무한패스선택 <span class="required">*</span></label>
                    <div class="col-md-10">
                        <button type="button" id="searchPackage" class="btn btn-sm btn-primary">무한패스검색</button>

                        <span id="selected_lecture">
                            @if(empty($data['productData_json']) === false)
                                @foreach(json_decode($data['productData_json'], true) as $idx => $row)
                                    <span id='prodcode_{{$row['ProdCode']}}'><input type='hidden'  name='ProdCode[]' value='{{$row['ProdCode']}}'>
                                    [{{$row['ProdCode']}}] {{$row['ProdName']}}
                                    <a href='javascript:;' onclick="rowDelete('prodcode_{{$row['ProdCode']}}')"><i class="fa fa-times red"></i></a>&nbsp;&nbsp;&nbsp;</span>
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group form-group-sm item addCoupon hide">
                    <label class="control-label col-md-2" for="No">쿠폰선택 <span class="required">*</span></label>
                    <div class="col-md-10">
                        <button type="button" id="searchCoupon" class="btn btn-sm btn-primary">쿠폰검색</button>
                        <span id="selected_coupon">
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

                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span></label>
                    <div class="col-md-4">
                        <div class="radio">
                            <input type="radio" id="IsUse_Y" name="IsUse" class="flat" value="Y" required="required" @if($method=="POST" || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="IsUse_N" name="IsUse" class="flat" value="N" required="required" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
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
                var $regi_form = $('#regi_form');

                $(document).ready(function() {

                    $regi_form.find('select[name="CateCode"]').chained("#site_code");

                    $regi_form.on('ifChanged', 'input[name="CertConditionCcd"]:checked', function() {
                        if($(this).val() == '685001') {
                            $('.addProduct').removeClass('hide');
                            $('.addCoupon').addClass('hide');
                        } else if($(this).val() == '685002') {
                            $('.addProduct').addClass('hide');
                            $('.addCoupon').removeClass('hide');
                        } else {
                            $('.addProduct').addClass('hide');
                            $('.addCoupon').addClass('hide');
                        }
                    });

                    @if( $data['CertConditionCcd'] == '685001')
                        $('.addProduct').removeClass('hide');
                        $('.addCoupon').addClass('hide');
                    @elseif( $data['CertConditionCcd'] == '685002')
                        $('.addProduct').addClass('hide');
                        $('.addCoupon').removeClass('hide');
                    @elseif( $data['CertConditionCcd'] == '685003')
                        $('.addProduct').addClass('hide');
                        $('.addCoupon').addClass('hide');
                    @endif

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

                    // ajax submit
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/site/cert/cert/store') }}';

                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#cert_create").modal('toggle');
                                location.replace('{{ site_url('/site/cert/cert/') }}' + dtParamsToQueryString($datatable));
                            }
                        }, showValidateError, addValidate, false, 'alert');
                    });

                    function addValidate()
                    {
                        if($('input:radio[name="CertConditionCcd"]:checked').val() == '685001') {
                            if($("input[name='ProdCode[]']").length == 0) {
                                alert('무한패스를 선택하여 주십시오.');$('#searchLecture').focus();return;
                            }
                        } else if($('input:radio[name="CertConditionCcd"]:checked').val() == '685002') {
                            if( $("input[name='CouponIdx[]']").length == 0) {
                                alert('쿠폰을 선택하여 주십시오.');$('#searchCoupon').focus();return;
                            }

                        }
                        return true;
                    }
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