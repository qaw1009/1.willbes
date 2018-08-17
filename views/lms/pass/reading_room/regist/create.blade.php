@extends('lcms.layouts.master')
@section('content')
    <h5>- 독서실 상품을 등록하고 사용현황을 확인하여 좌석을 배정하는 메뉴입니다. (주문회원 기준으로 좌석 신규배정 및 연장배정)</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/pass/readingRoom/regist/store") }}?bm_idx=45" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <div class="x_panel">
            <div class="x_title">
                <h2>독서실등록관리 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required') !!}
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="campus_ccd">캠퍼스</label>
                    <div class="col-md-4 ml-12-dot item form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="campus_ccd" name="campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">독서실코드 코드</label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['DIdx'] }}@else # 등록 시 자동 생성 @endif</p>
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
                    <label class="control-label col-md-1-1" for="">독서실명<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <input type="text" class="form-control" id="" name="" required="required" title="독서실명" value="{{ $data['BannerName'] }}" >
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">강의실<span class="required">*</span></label>
                    <div class="col-md-5 form-inline ml-12-dot item">
                        <input type="number" class="form-control" id="" name="" required="required" title="강의실" value="{{ $data['BannerName'] }}" > 호 <span class="ml-10">• 숫자만 입력</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">독서실총좌석수<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <input type="number" class="form-control" id="" name="" required="required" title="독서실총좌석수" value="{{ $data['BannerName'] }}" > 개 <span class="ml-10">• 숫자만 입력</span>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">가로수<span class="required">*</span></label>
                    <div class="col-md-5 form-inline ml-12-dot item">
                        <input type="number" class="form-control" id="" name="" required="required" title="가로수" value="{{ $data['BannerName'] }}" > 개 <span class="ml-10">• 숫자만 입력</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">시작번호<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <input type="number" class="form-control" id="" name="" required="required" title="시작번호" value="{{ $data['BannerName'] }}" > <span class="ml-10">• 숫자만 입력</span>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">종료번호<span class="required">*</span></label>
                    <div class="col-md-5 form-inline ml-12-dot item">
                        <input type="number" class="form-control" id="" name="" required="required" title="종료번호" value="{{ $data['BannerName'] }}" > <span class="ml-10">• 숫자만 입력</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">판매가<span class="required">*</span></label>
                    <div class="col-md-10 form-inline item">
                        <span class="blue mr-10">[정상가]</span>
                        <input type="number" class="form-control mr-5" id="sale_price" name="sale_price" required="required" title="정상가" value="{{ $data['BannerName'] }}" style="width: 140px;">원
                        <span class="mr-20"></span>

                        <span class="blue mr-10">[할인율]</span>
                        <input type="number" class="form-control" id="sale_rate" name="sale_rate" required="required" title="할인율" value="{{ $data['BannerName'] }}" style="width: 140px;">
                        <select name="sale_disc_type" id="sale_disc_type" class="form-control">
                            <option value="R">%</option>
                            <option value="P">-</option>
                        </select>
                        <span class="mr-20"></span>

                        <span class="blue mr-10">[판매가]</span>
                        <input type="number" class="form-control mr-5" id="real_sale_price" name="real_sale_price" required="required" title="판매가" value="{{ $data['BannerName'] }}" style="width: 140px;" readonly="readonly">원
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">예치금<span class="required">*</span></label>
                    <div class="col-md-10 form-inline item">
                        <input type="number" class="form-control mr-5" id="" name="" required="required" title="예치금" value="{{ $data['BannerName'] }}" style="width: 140px;">원
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
                                <input type="radio" id="sms_is_use_y" name="sms_is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="sms_is_use_y" class="input-label">사용</label>
                                <input type="radio" id="sms_is_use_n" name="sms_is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="sms_is_use_n" class="input-label">미사용</label>
                            </div>
                        </div>
                        <div class="row-line mb-10">
                            <textarea id="sms_content" name="sms_content" class="form-control" rows="3" title="내용" placeholder="">{!! $data['Desc'] !!}</textarea>
                        </div>

                        <div class="row form-inline">
                            <div class="col-md-8">
                                <span class="mr-5">[발신번호]</span>
                                <input type="text" class="form-control" id="cs_tel" name="cs_tel" title="발신번호" value="{{ $data['BannerName'] }}">
                            </div>
                            <div class="col-md-4 red text-right">
                                <span class="content_byte">0</span> Byte <span style="color: #73879C">(80byte 초과 시 LMS 문자로 전환됩니다.)</span>
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

            // 판매가 계산
            $regi_form.on('keyup change', 'input[name="sale_price"], input[name="sale_rate"], select[name="sale_disc_type"]', function() {
                var sale_price = 0 || parseInt($regi_form.find('input[name="sale_price"]').val(), 10);
                var sale_rate = 0 || parseInt($regi_form.find('input[name="sale_rate"]').val(), 10);
                var sale_disc_type = $regi_form.find('select[name="sale_disc_type"]').val();

                if (sale_price < 1 || sale_rate < 1) { return; }
                if (sale_disc_type === 'R') {
                    sale_price = sale_price - ((sale_price * sale_rate) / 100);
                } else {
                    sale_price = sale_price - sale_rate;
                }
                $regi_form.find('input[name="real_sale_price"]').val(sale_price);
            });

            // 바이트 수
            $('#sms_content').on('change keyup input', function() {
                var content_byte = fn_chk_byte($(this).val());
                $('.content_byte').text(content_byte);
            });

            // 고객센터 전화번호
            $regi_form.on('change', 'select[name="site_code"]', function() {
                var $arr_site_csTel = {!! $site_csTel !!};
                var cs_tel = '';
                var this_site_code = $(this).val();
                if (this_site_code == '') {
                    cs_tel = '';
                } else {
                    cs_tel = $arr_site_csTel[this_site_code].replace('-','');
                }
                $('#cs_tel').val(cs_tel);
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/pass/readingRoom/regist") }}/' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/pass/readingRoom/regist/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/pass/readingRoom/regist/") }}/' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop