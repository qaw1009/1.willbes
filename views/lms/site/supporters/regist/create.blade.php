@extends('lcms.layouts.master_modal')

@section('layer_title')
기수등록
@stop

@section('layer_header')
<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="supporters_idx" value="{{ empty($arr_base['supporters_idx']) === false ? $arr_base['supporters_idx'] : '' }}">
@endsection
@section('layer_content')
    <div class="form-group-sm">
        <div class="form-group">
            <label class="control-label col-md-1-1" for="site_code">운영 사이트 <span class="required">*</span></label>
            <div class="col-md-4 form-inline item">
                {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', '', false, $arr_base['arr_site_code']) !!}
            </div>
            <label class="control-label col-md-1-1" for="start_date">서포터즈 유형 <span class="required">*</span></label>
            <div class="col-md-5 form-inline item">
                <select class="form-control" id="supporters_type_ccd" name="supporters_type_ccd" required="required" title="서포터즈 유형">
                    @foreach($arr_base['supporters_type'] as $key => $val)
                        <option value="{{$key}}" @if($method == 'PUT' && $key == $data['SupportersTypeCcd']) selected="selected" @endif>{{$val}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1-1" for="supporters_year">기수설정 <span class="required">*</span></label>
            <div class="col-md-4 form-inline item">
                <select class="form-control" id="supporters_year" name="supporters_year" required="required" title="기수년도">
                    <option value="">기수년도</option>
                    @for($i = (date('Y')+1); $i >= (date('Y')-3); $i--)
                        <option value="{{ $i }}" @if($i == date('Y') || $i == $data['SupportersYear']) selected="selected" @endif>{{ $i }}</option>
                    @endfor
                </select> 년

                <select class="form-control" id="supporters_number" name="supporters_number" required="required" title="기수">
                    <option value="">기수</option>
                    @for($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" @if($i == $data['SupportersNumber']) selected="selected" @endif>{{ $i }}</option>
                    @endfor
                </select> 기
            </div>

            <label class="control-label col-md-1-1" for="start_date">운영기간 <span class="required">*</span></label>
            <div class="col-md-5 form-inline item">
                <input type="text" class="form-control datepicker" id="start_date" name="start_date" required="required" title="운영시작일" value="{{ $data['StartDate'] }}">
                ~
                <input type="text" class="form-control datepicker" id="end_date" name="end_date" required="required" title="운영종료일" value="{{ $data['EndDate'] }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1-1" for="title">서포터즈명 <span class="required">*</span></label>
            <div class="col-md-8 form-inline item">
                <input type="text" class="form-control" id="title" name="title" required="required" title="서포터즈명" value="{{ $data['Title'] }}" style="width: 300px;">
            </div>
        </div>
        <div class="form-group add-online-form hide">
            <label class="control-label col-md-1-1" for="title">대상강좌 <span class="required">*</span></label>
            <div class="col-md-1">
                <button type="button" id="searchPackage" class="btn btn-sm btn-primary btn-search-pass">상품검색</button>
            </div>
            <div class="col-md-9">
                    <span id="selected_lecture" class="selected_content">
                        @if(empty($arr_base['arr_product_data']) === false)
                            @foreach($arr_base['arr_product_data'] as $idx => $row)
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
        <div class="form-group add-online-form hide">
            <label class="control-label col-md-1-1" for="title">메뉴운영여부 <span class="required">*</span></label>
            <div class="col-md-8">
                <div class="checkbox">
                    @foreach($arr_base['supporters_menu'] as $key => $val)
                        <input type="checkbox" class="flat" id="menu_info_{{$key}}" name="menu_info[]" value="{{$key}}"
                               @if($method == 'POST' || in_array($key,explode(',',$data['MenuInfo']))) checked="checked" @endif>
                            <label class="input-label" for="menu_info_{{$key}}">{{$val}}</label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1-1" for="coupon_issue_ccd">쿠폰자동지급 <span class="required">*</span></label>
            <div class="col-md-4 form-inline item">
                <div class="radio">
                    @foreach($arr_base['coupon_issue_ccd'] as $key => $val)
                        <input type="radio" name="coupon_issue_ccd" id="coupon_issue_ccd{{$loop->index}}" value="{{$key}}" class="flat" required="required"
                               @if(($method == 'POST' && $loop->index == 1) || $data['CouponIssueCcd']==$key)checked="checked"@endif>
                            <label for="coupon_issue_ccd{{$loop->index}}" class="input-label">{{$val}}</label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="form-group addCoupon">
            <label class="control-label col-md-1-1" for="is_coupon_issue_y">쿠폰선택 <span class="required">*</span></label>
            <div class="col-md-10 form-inline">
                <button type="button" class="btn btn-sm btn-primary ml-5" id="couponAdd">쿠폰검색</button>
                <span id="select_coupon">
                    @if(empty($arr_base['arr_coupon_data']) === false)
                        @foreach($arr_base['arr_coupon_data'] as $row)
                            <span id='coupon_{{$row['CouponIdx']}}'><input type='hidden'  name='CouponIdx[]' id='CouponIdx{{$row['CouponIdx']}}' value='{{$row['CouponIdx']}}'>
                                    [{{$row['CouponIdx']}}] {{$row['CouponName']}}
                                <a href='javascript:;' onclick="rowDelete('coupon_{{$row['CouponIdx']}}')"><i class="fa fa-times red"></i></a>&nbsp;&nbsp;&nbsp;</span>
                        @endforeach
                    @endif
                </span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
            <div class="col-md-4 form-inline item">
                <div class="radio">
                    <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부"
                           @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/>
                        <label for="is_use_y" class="input-label">사용</label>
                    <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/>
                        <label for="is_use_n" class="input-label">미사용</label>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var $modal_regi_form = $('#modal_regi_form');

        $(document).ready(function() {
            //서포터즈 유형 선택
            $modal_regi_form.on('change', 'select[name="supporters_type_ccd"]', function() {
                if ($(this).val() == '736002') {
                    $(".add-online-form").removeClass('hide').addClass('show');
                } else {
                    $(".add-online-form").removeClass('show').addClass('hide');
                }
            });
            $modal_regi_form.find('select[name="supporters_type_ccd"]').trigger('change');

            $modal_regi_form.on('ifChanged ifCreated', 'input[name="coupon_issue_ccd"]:checked', function() {
                if($(this).val() == '685002') {
                    $('.addCoupon').removeClass('hide').addClass('show');
                } else {
                    $('.addCoupon').removeClass('show').addClass('hide');
                }
            });

            //쿠폰검색
            $('#couponAdd').on('click', function () {
                if ($("#site_code").val() == "") {
                    alert("운영사이트를 선택해 주세요.");
                    $("#site_code").focus();
                    return false;
                }
                $('#couponAdd').setLayer({
                    'url': '{{ site_url('common/searchCoupon/') }}' + '?site_code=' + $("#site_code").val() + '&deploy_type=N&locationid=select_coupon',
                    'width': 900
                })
            });

            //무한패스검색
            $('#searchPackage').on('click', function(e) {
                var id = 'selected_lecture';
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus(); return false;}
                $('#searchPackage').setLayer({
                    'url' : '{{ site_url('common/searchPeriodPackage/')}}'+'?site_code='+$("#site_code").val()+'&locationid='+id
                    ,'width' : 1200
                })
            });

            // 등록
            $modal_regi_form.submit(function () {
                var _url = '{{ site_url('/site/supporters/regist/store') }}';
                ajaxSubmit($modal_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal2").modal('toggle');
                        $datatable.draw();
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 상품 삭제
            $modal_regi_form.on('click', '.selected-product-delete', function() {
                var that = $(this);
                that.parent().remove();
            });
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