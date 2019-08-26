@extends('lcms.layouts.master')
@section('content')
    <style>
        .btn-save-is-sms-use {padding: 3px 11px !important; margin-bottom: auto !important;}
    </style>
    <h5>- {{$mang_title}} 상품을 등록하고 현황을 확인하여 좌석을 배정하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/pass/readingRoom/regist/store") }}?{!! $default_query_string !!}" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="mang_type" value="{{$mang_type}}">
        <input type="hidden" name="lr_idx" value="{{$lr_idx}}">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{$mang_title}}등록관리 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        {{--{!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}--}}
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : ''), false, $offLineSite_list) !!}
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="campus_ccd">캠퍼스</label>
                    <div class="col-md-4 ml-12-dot item form-inline">
                        <select class="form-control" id="campus_ccd" name="campus_ccd" @if($method == 'PUT')disabled="disabled"@endif>
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">{{$mang_title}}코드</label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['ProdCode'] }}@else # 등록 시 자동 생성 @endif</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 ml-12-dot item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="rd_name">{{$mang_title}}명<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <input type="text" class="form-control" id="rd_name" name="rd_name" required="required" title="{{$mang_title}}명" value="{{ $data['ReadingRoomName'] }}" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="lake_layer">{{($mang_type == 'R') ? '강의실' : '층'}}<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <input type="number" class="form-control" id="lake_layer" name="lake_layer" required="required" title="강의실명" value="{{ $data['LakeLayer'] }}" > 호 <span class="ml-10">• 숫자만 입력</span>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="use_start_date">사용기간<span class="required">*</span></label>
                    <div class="col-md-5 form-inline ml-12-dot item">
                        <input type="text" class="form-control datepicker" id="use_start_date" name="use_start_date" value="{{$data['UseStartDate']}}">
                        <div class="form-control input-group-addon no-border no-bgcolor">~</div>
                        <input type="text" class="form-control datepicker" id="use_end_date" name="use_end_date" value="{{$data['UseEndDate']}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="use_qty">{{$mang_title}}총{{($mang_type == 'R') ? '좌석' : '개'}}수<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <input type="number" class="form-control" id="use_qty" name="use_qty" required="required" title="{{$mang_title}}총{{$mang_title}}총{{($mang_type == 'R') ? '좌석' : '개'}}수" value="{{ $data['UseQty'] }}" > 개 <span class="ml-10">• 숫자만 입력</span>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="transverse_num">가로수<span class="required">*</span></label>
                    <div class="col-md-5 form-inline ml-12-dot item">
                        <input type="number" class="form-control" id="transverse_num" name="transverse_num" required="required" title="가로수" value="{{ $data['TransverseNum'] }}" > 개 <span class="ml-10">• 숫자만 입력</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="start_no">{{($mang_type == 'R') ? '좌석' : ''}}시작번호<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <input type="number" class="form-control" id="start_no" name="start_no" required="required" title="{{($mang_type == 'R') ? '좌석' : ''}}시작번호" value="{{ $data['StartNo'] }}" > <span class="ml-10">• 숫자만 입력</span>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="end_no">{{($mang_type == 'R') ? '좌석' : ''}}종료번호<span class="required">*</span></label>
                    <div class="col-md-5 form-inline ml-12-dot item">
                        <input type="number" class="form-control" id="end_no" name="end_no" required="required" title="{{($mang_type == 'R') ? '좌석' : ''}}종료번호" value="{{ $data['EndNo'] }}" readonly="readonly"> <span class="ml-10">• 숫자만 입력</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="sale_price">판매가<span class="required">*</span></label>
                    <div class="col-md-10 form-inline item">
                        <span class="blue mr-10">[정상가]</span>
                        <input type="number" class="form-control mr-5" id="sale_price" name="sale_price" required="required" title="정상가" value="{{ $data['main_SalePrice'] }}" style="width: 140px;">원
                        <span class="mr-20"></span>

                        <span class="blue mr-10">[할인율]</span>
                        <input type="number" class="form-control" id="sale_rate" name="sale_rate" required="required" title="할인율" value="{{ ($method == 'POST') ? '0' : $data['main_SaleRate'] }}" style="width: 140px;">
                        <select name="sale_disc_type" id="sale_disc_type" class="form-control">
                            <option value="R" @if($data['main_SaleDiscType'] == 'R')selected="selected"@endif>%</option>
                            <option value="P" @if($data['main_SaleDiscType'] == 'L')selected="selected"@endif>원</option>
                        </select>
                        <span class="mr-20"></span>

                        <span class="blue mr-10">[판매가]</span>
                        <input type="number" class="form-control mr-5" id="real_sale_price" name="real_sale_price" required="required" title="판매가" value="{{ $data['main_RealSalePrice'] }}" style="width: 140px;" readonly="readonly">원
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="sub_prod_code_price">예치금</label>
                    <div class="col-md-10 form-inline">
                        <input type="number" class="form-control mr-5" id="sub_prod_code_price" name="sub_prod_code_price" title="예치금" value="{{ $data['sub_RealSalePrice'] }}" style="width: 140px;">원
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="desc">설명</label>
                    <div class="col-md-10 item">
                        <textarea id="desc" name="desc" class="form-control" rows="3" title="내용" placeholder="">{!! $data['Desc'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="desc">대여종료자동문자</label>
                    <div class="col-md-10">
                        <div class="row-line mb-10">
                            <div class="radio">
                                <span class="mr-5">[문자발송사용여부]</span>
                                <input type="radio" id="sms_is_use_y" name="sms_is_use" class="flat" value="Y" required="required" title="사용여부" @if($data['IsSmsUse']=='Y')checked="checked"@endif/> <label for="sms_is_use_y" class="input-label">사용</label>
                                <input type="radio" id="sms_is_use_n" name="sms_is_use" class="flat" value="N" @if($method == 'POST' || $data['IsSmsUse']=='N')checked="checked"@endif/> <label for="sms_is_use_n" class="input-label">미사용</label>
                                @if($method == 'PUT') <button class="btn-save-is-sms-use btn btn-primary" type="button" id="btn_save_is_sms_use">문자발송 사용여부 저장</button> @endif
                            </div>
                        </div>
                        <div class="row-line mb-10">
                            <textarea id="sms_memo" name="sms_memo" class="form-control" rows="3" title="내용" placeholder="">{!! $data['SmsContent'] !!}</textarea>
                        </div>

                        <div class="row form-inline">
                            <div class="col-md-8">
                                <span class="mr-5">[발신번호]</span>
                                {!! html_callback_num_select($arr_send_callback_ccd, $data['SendTel'], 'cs_tel', 'cs_tel', '', '발신번호', '') !!}
                            </div>
                            <div class="col-md-4 red text-right">
                                <span class="content_byte" id="content_byte">0</span> Byte <span style="color: #73879C">(55byte 이상일 경우 MMS로 전환됩니다.)</span>
                            </div>
                        </div>
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
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">수정일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>

        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="campus_ccd"]').chained("#site_code");

            //좌석종료번호 계산
            $regi_form.on('keyup change', 'input[name="use_qty"], input[name="start_no"]', function() {
                var end_no;
                var use_qty = 0 || parseInt($regi_form.find('input[name="use_qty"]').val(), 10);
                var start_no = 0 || parseInt($regi_form.find('input[name="start_no"]').val(), 10);
                if (use_qty < 1 || start_no < 1) { return; }
                end_no = (start_no + use_qty) -1;

                $regi_form.find('input[name="end_no"]').val(end_no);
            });

            // 판매가 계산
            $regi_form.on('keyup change', 'input[name="sale_price"], input[name="sale_rate"], select[name="sale_disc_type"]', function() {
                var sale_price = 0 || parseInt($regi_form.find('input[name="sale_price"]').val(), 10);
                var sale_rate = 0 || parseInt($regi_form.find('input[name="sale_rate"]').val(), 10);
                var sale_disc_type = $regi_form.find('select[name="sale_disc_type"]').val();

                if (sale_price < 1 || sale_rate < 0) { return; }
                if (sale_disc_type === 'R') {
                    sale_price = sale_price - ((sale_price * sale_rate) / 100);
                } else {
                    sale_price = sale_price - sale_rate;
                }
                $regi_form.find('input[name="real_sale_price"]').val(sale_price);
            });

            // 바이트 수
            $('#sms_memo').on('change keyup input', function() {
                $('#content_byte').text(fn_chk_byte($(this).val()));
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/pass/readingRoom/regist") }}/' + getQueryString();
            });

            //문자발송 사용여부 저장
            $('#btn_save_is_sms_use').click(function() {sms_is_use
                var sms_is_use = $regi_form.find('input[name="sms_is_use"]:checked').val();
                if(!confirm('문자발송 사용여부를 '+( sms_is_use == 'Y' ? '사용' : '미사용' )+'으로 저장하시겠습니까?')) return false;
                var _url = '{{ site_url("/pass/readingRoom/regist/storeSmsIsUse") }}' + getQueryString();
                ajaxSubmit($regi_form, _url, function(ret) {
                    console.log('ret', ret);
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        //location.replace('{{ site_url("/pass/readingRoom/regist/") }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/pass/readingRoom/regist/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/pass/readingRoom/regist/") }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop