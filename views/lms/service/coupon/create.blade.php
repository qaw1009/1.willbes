@extends('lcms.layouts.master')

@section('content')
    <h5>- 결제 시 할인 적용될 쿠폰을 발행하는 메뉴입니다. (쿠폰발급 페이지에서 사용내역 확인 가능)</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>쿠폰 정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static"># 최초 등록 후 운영사이트, 카테고리 정보는 수정이 불가능합니다.</p>
                    </div>
                </div>
                <div id="category" class="form-group">
                    <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['CateNames'] }}</p>
                        @else
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10">
                                @if(isset($data['CateCodes']) === true)
                                    @foreach($data['CateCodes'] as $cate_code => $cate_name)
                                        <span class="pr-10">{{ $cate_name }}
                                            <a href="#none" data-cate-code="{{ $cate_code }}" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                            <input type="hidden" name="cate_code[]" value="{{ $cate_code }}"/>
                                        </span>
                                    @endforeach
                                @endif
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="coupon_name">쿠폰명 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="text" id="coupon_name" name="coupon_name" class="form-control" title="쿠폰명" required="required" value="{{ $data['CouponName'] }}">
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1">쿠폰코드
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['CouponIdx'] }}@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="deploy_type_1">쿠폰배포루트 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="radio">
                            <input type="radio" id="deploy_type_1" name="deploy_type" class="flat" value="N" title="쿠폰배포루트" required="required" @if($method == 'POST' || $data['DeployType'] == 'N')checked="checked"@endif/> <label for="deploy_type_1" class="input-label">온라인</label>
                            <input type="radio" id="deploy_type_2" name="deploy_type" class="flat" value="F" @if($data['DeployType'] == 'F')checked="checked"@endif/> <label for="deploy_type_2" class="input-label">오프라인</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="coupon_type_ccd_1">쿠폰유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="radio">
                            @foreach($arr_coupon_type_ccd as $key => $val)
                                <input type="radio" id="coupon_type_ccd_{{ $loop->index }}" name="coupon_type_ccd" class="flat" value="{{ $key }}" @if($loop->index === 1) required="required" title="쿠폰유형" @endif @if($data['CouponTypeCcd'] == $key || ($method == 'POST' && $loop->index === 1))checked="checked"@endif/> <label for="coupon_type_ccd_{{ $loop->index }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="pin_off" class="form-group hide">
                    <label class="control-label col-md-2" for="pin_type_1">쿠폰핀번호유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="radio">
                            <input type="radio" id="pin_type_1" name="pin_type" class="flat" value="S" required="required_if:deploy_type,F" title="쿠폰핀번호유형" @if($method == 'POST' || $data['PinType'] == 'S')checked="checked"@endif/> <label for="pin_type_1" class="input-label">공통핀번호</label>
                            <input type="radio" id="pin_type_2" name="pin_type" class="flat" value="R" @if($data['PinType'] == 'R')checked="checked"@endif/> <label for="pin_type_2" class="input-label">랜덤핀번호</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="pin_issue_cnt">발급개수 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <input type="number" id="pin_issue_cnt" name="pin_issue_cnt" class="form-control" required="required_if:deploy_type,F" title="발급개수" value="{{ $data['PinIssueCnt'] or '1' }}" readonly="readonly" style="width: 100px;"> 개
                        @if(is_null($available_pin_cnt) === false)
                            <span class="pl-20"># 사용 가능한 핀번호 개수 : {{ number_format($available_pin_cnt) }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="apply_type_ccd_1">쿠폰적용구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            @foreach($arr_apply_type_ccd as $key => $arr)
                                <input type="radio" id="apply_type_ccd_{{ $loop->index }}" name="apply_type_ccd" data-input="{{ $arr[1] }}" class="flat" value="{{ $key }}" @if($loop->index === 1) required="required" title="쿠폰적용구분" @endif @if($data['ApplyTypeCcd'] == $key || ($method == 'POST' && $loop->index === 1))checked="checked"@endif/> <label for="apply_type_ccd_{{ $loop->index }}" class="input-label">{{ $arr[0] }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="detail_on" class="form-group form-apply-input">
                    <label class="control-label col-md-2" for="lec_on_type_ccd_1">쿠폰상세구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <div class="checkbox item">
                            @foreach($arr_lec_type_ccd as $key => $arr)
                                @if($arr[1] == 'on')
                                <input type="checkbox" id="lec_on_type_ccd_{{ $loop->index }}" name="lec_type_ccd[]" class="flat" value="{{ $key }}" @if($loop->index === 1) required="required" title="쿠폰상세구분" @endif @if($data['LecTypeCcds'] !== null && in_array($key, $data['LecTypeCcds']) === true)checked="checked"@endif/> <label for="lec_on_type_ccd_{{ $loop->index }}" class="input-label">{{ $arr[0] }}</label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="detail_off" class="form-group form-apply-input hide">
                    <label class="control-label col-md-2" for="lec_off_type_ccd_1">쿠폰상세구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <div class="checkbox item">
                            @foreach($arr_lec_type_ccd as $key => $arr)
                                @if($arr[1] == 'off')
                                <input type="checkbox" id="lec_off_type_ccd_{{ $loop->index }}" name="lec_type_ccd[]" class="flat" value="{{ $key }}" @if($loop->index === 1) required="required" title="쿠폰상세구분" @endif @if($data['LecTypeCcds'] !== null && in_array($key, $data['LecTypeCcds']) === true)checked="checked"@endif/> <label for="lec_off_type_ccd_{{ $loop->index }}" class="input-label">{{ $arr[0] }}</label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="apply_range" class="form-group form-apply-input hide">
                    <label class="control-label col-md-2" for="apply_range_type_1">적용범위 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="apply_range_type_1" name="apply_range_type" data-input="no" class="flat" value="A" title="적용범위" required="required" @if($method == 'POST' || $data['ApplyRangeType'] == 'A')checked="checked"@endif/> <label for="apply_range_type_1" class="input-label">전체</label>
                            <input type="radio" id="apply_range_type_2" name="apply_range_type" data-input="item" class="flat" value="I" @if($data['ApplyRangeType'] == 'I')checked="checked"@endif/> <label for="apply_range_type_2" class="input-label">항목별</label>
                            <input type="radio" id="apply_range_type_3" name="apply_range_type" data-input="product" class="flat" value="P" @if($data['ApplyRangeType'] == 'P')checked="checked"@endif/> <label for="apply_range_type_3" class="input-label">특정상품</label>
                        </div>
                    </div>
                </div>
                <div id="apply_item" class="form-group form-range-input hide">
                    <label class="control-label col-md-2" for="school_year">항목별 적용
                    </label>
                    <div class="col-md-9 form-inline">
                        <div class="form-item-nm-input mr-5 item" style="display: inline-block;">
                            <select class="form-control" id="apply_school_year" name="apply_school_year" title="대비학년도">
                                <option value="">대비학년도</option>
                                @for($i = (date('Y')+1); $i >= 2010; $i--)
                                    <option value="{{ $i }}" @if($i == $data['ApplySchoolYear']) selected="selected" @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-item-nm-input mr-5 item" style="display: inline-block;">
                            <select class="form-control" id="apply_course_idx" name="apply_course_idx" title="과정">
                                <option value="">과정</option>
                                @foreach($arr_course as $row)
                                    <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['CourseIdx'] == $data['ApplyCourseIdx']) selected="selected" @endif>{{ $row['CourseName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-item-nm-input mr-5 item" style="display: inline-block;">
                            <select class="form-control" id="apply_subject_idx" name="apply_subject_idx" title="과목">
                                <option value="">과목</option>
                                @foreach($arr_subject as $row)
                                    <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['SubjectIdx'] == $data['ApplySubjectIdx']) selected="selected" @endif>{{ $row['SubjectName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-item-nm-input mr-5 item" style="display: inline-block;">
                            <select class="form-control" id="apply_prof_idx" name="apply_prof_idx" title="교수">
                                <option value="">교수</option>
                                @foreach($arr_professor as $row)
                                    <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['ProfIdx'] == $data['ApplyProfIdx']) selected="selected" @endif>{{ $row['wProfName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-item-mock-input mr-5 item" style="display: none;">
                            <select class="form-control" id="apply_mock_take_form_ccd" name="apply_mock_take_form_ccd" title="모의고사응시형태" disabled="disabled">
                                <option value="">응시형태</option>
                                @foreach($arr_mock_take_form_ccd as $key => $val)
                                    <option value="{{ $key }}" @if($key == $data['ApplyTakeFormCcd']) selected="selected" @endif>{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div id="apply_product" class="form-group form-range-input hide">
                    <label class="control-label col-md-2">특정상품적용
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['ProdNames'] or '' }}</p>
                        @else
                            <button type="button" id="btn_product_search" class="btn btn-sm btn-primary">상품검색</button>
                            <span id="selected_product" class="pl-10">
                                @if(isset($data['ProdCodes']) === true)
                                    @foreach($data['ProdCodes'] as $prod_code => $prod_name)
                                        <span class="pr-10">[{{ $prod_code }}] {{ $prod_name }}
                                            <a href="#none" data-prod-code="{{ $prod_code }}" class="selected-product-delete"><i class="fa fa-times red"></i></a>
                                            <input type="hidden" name="prod_code[]" value="{{ $prod_code }}"/>
                                        </span>
                                    @endforeach
                                @endif
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="disc_rate">할인율 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <input type="number" id="disc_rate" name="disc_rate" class="form-control" required="required" title="할인율" value="{{ $data['DiscRate'] }}" style="width: 140px;">
                        <select class="form-control" id="disc_type" name="disc_type">
                            <option value="R" @if('R' == $data['DiscType']) selected="selected" @endif>%</option>
                            <option value="P" @if('P' == $data['DiscType']) selected="selected" @endif>원</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="disc_allow_price">할인허용가능금액 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <input type="number" id="disc_allow_price" name="disc_allow_price" class="form-control" required="required" title="할인허용가능금액" value="{{ $data['DiscAllowPrice'] }}" style="width: 140px;"> 원 이상부터
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="issue_start_date">유효기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <div class="input-group mb-0 item">
                            <input type="text" class="form-control datepicker" id="issue_start_date" name="issue_start_date" required="required" title="발급유효시작일자" value="{{ $data['IssueStartDate'] or date('Y-m-d') }}" readonly="readonly">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <input type="text" class="form-control datepicker" id="issue_end_date" name="issue_end_date" required="required" title="발급유효종료일자" value="{{ $data['IssueEndDate'] }}" readonly="readonly">
                            <div class="input-group-addon no-border no-bgcolor gray pl-30"># 발급 유효기간</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="valid_day">사용기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <div class="radio item">
                            <input type="radio" id="valid_type_1" name="valid_type" class="flat" value="day" required="required" title="사용기간구분" @if($method == 'POST' || $data['ValidDay'] > 0)checked="checked"@endif/> <label for="valid_type_1" class="input-label">사용일수</label>
                            <input type="number" id="valid_day" name="valid_day" class="form-control" required="required_if:valid_type,day" data-validate-minmax="1" title="사용일수" value="{{ $data['ValidDay'] > 0 ? $data['ValidDay'] : '' }}" style="width: 100px;"> 일
                        </div>
                        <div class="radio item ml-30">
                            <input type="radio" id="valid_type_2" name="valid_type" class="flat" value="end_date" @if($data['ValidDay'] == 0)checked="checked"@endif/> <label for="valid_type_2" class="input-label">종료일</label>
                            <input type="text" class="form-control datepicker" id="valid_end_date" name="valid_end_date" required="required_if:valid_type,end_date" title="사용종료일" value="{{ $data['ValidEndDate'] }}" readonly="readonly">
                            <select class="form-control ml-5" id="valid_end_hour" name="valid_end_hour" required="required_if:valid_type,end_date" title="사용종료시간(시)" style="width: 50px;">
                                @foreach(range(0, 23) as $h)
                                    @php $hour = sprintf('%02d', $h); @endphp
                                    <option value="{{ $hour }}" @if(empty($data['ValidEndDatm']) === false && $data['ValidEndHour'] == $hour) selected @endif>{{ $hour }}</option>
                                @endforeach
                            </select> 시
                            <select class="form-control" id="valid_end_min" name="valid_end_min" required="required_if:valid_type,end_date" title="사용종료시간(분)" style="width: 50px;">
                                @foreach(range(0, 59) as $m)
                                    @php $min = sprintf('%02d', $m); @endphp
                                    <option value="{{ $min }}" @if(empty($data['ValidEndDatm']) === false && $data['ValidEndMin'] == $min) selected @endif>{{ $min }}</option>
                                @endforeach
                            </select> 분
                        </div>
                        <div class="inline-block ml-20"># 발급 후 사용기간</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="coupon_desc">쿠폰설명
                    </label>
                    <div class="col-md-8">
                        <textarea id="coupon_desc" name="coupon_desc" class="form-control" rows="3" title="쿠폰설명" placeholder="">{{ $data['CouponDesc'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="is_issue">발급여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="is_issue_y" name="is_issue" class="flat" value="Y" required="required" title="발급여부" @if($method == 'POST' || $data['IsIssue'] == 'Y')checked="checked"@endif/> <label for="is_issue_y" class="input-label">발급</label>
                            <input type="radio" id="is_issue_n" name="is_issue" class="flat" value="N" @if($data['IsIssue'] == 'N')checked="checked"@endif/> <label for="is_issue_n" class="input-label">미발급</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <style type="text/css">
        .icheckbox_minimal-blue.checked.disabled { background-position: -40px 0 !important; }
        .iradio_minimal-blue.checked.disabled { background-position: -140px 0 !important; }
    </style>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // ajax submit
            $regi_form.submit(function() {
                @if($method == 'POST')
                {{-- 배송료는 카테고리 선택 불가 --}}
                if($regi_form.find('input[name="apply_type_ccd"]:checked').val() !== '645006' && $regi_form.find('input[name="cate_code[]"]').length < 1) {
                    alert('카테고리 선택 필드는 필수입니다.');
                    return false;
                }
                if($regi_form.find('input[name="apply_range_type"]:checked').val() === 'P' && $regi_form.find('input[name="prod_code[]"]').length < 1) {
                    alert('상품 선택 필드는 필수입니다.');
                    return false;
                }
                {{-- 수강권일 경우 1개의 상품만 등록 가능 --}}
                if($regi_form.find('input[name="coupon_type_ccd"]:checked').val() === '644002' && $regi_form.find('input[name="prod_code[]"]').length !== 1) {
                    alert('수강권일 경우 1개의 상품만 선택 가능합니다.');
                    return false;
                }
                @endif

                var _url = '{{ site_url('/service/coupon/regist/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/service/coupon/regist/index') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 과정, 과목, 교수 자동 변경
            $regi_form.find('select[name="apply_course_idx"]').chained("#site_code");
            $regi_form.find('select[name="apply_subject_idx"]').chained("#site_code");
            $regi_form.find('select[name="apply_prof_idx"]').chained("#site_code");

            {{-- 수정 폼일 경우 설정 데이터 disable 처리 --}}
            @if($method == 'PUT')
                $regi_form.find('input[name="deploy_type"]').iCheck('disable');
                $regi_form.find('input[name="coupon_type_ccd"]').iCheck('disable');
                $regi_form.find('input[name="pin_type"]').iCheck('disable');
                $regi_form.find('input[name="pin_issue_cnt"]').prop('disabled', true);
                $regi_form.find('input[name="apply_type_ccd"]').iCheck('disable');
                $regi_form.find('input[name="lec_type_ccd[]"]').iCheck('disable');
                $regi_form.find('input[name="apply_range_type"]').iCheck('disable');
                $regi_form.find('select[name="apply_school_year"]').prop('disabled', true);
                $regi_form.find('select[name="apply_course_idx"]').prop('disabled', true);
                $regi_form.find('select[name="apply_subject_idx"]').prop('disabled', true);
                $regi_form.find('select[name="apply_prof_idx"]').prop('disabled', true);
                $regi_form.find('select[name="apply_mock_take_form_ccd"]').prop('disabled', true);
                $regi_form.find('input[name="disc_rate"]').prop('disabled', true);
                $regi_form.find('select[name="disc_type"]').prop('disabled', true);
                $regi_form.find('input[name="disc_allow_price"]').prop('disabled', true);
            @endif

            // 운영사이트 변경
            $regi_form.on('change', 'select[name="site_code"]', function() {
                // 카테고리 검색 초기화
                $regi_form.find('input[name="cate_code"]').val('');
                $('#selected_category').html('');

                // 특정상품 선택결과 초기화
                $('#selected_product').html('');
            });

            // 카테고리 검색 or 상품 검색
            $('#btn_category_search, #btn_product_search, #btn_mock_exam_search').on('click', function(event) {
                var btn_id = event.target.getAttribute('id');
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }

                if (btn_id === 'btn_category_search') {
                    $('#btn_category_search').setLayer({
                        'url' : '{{ site_url('/common/searchCategory/index/multiple/site_code/') }}' + site_code,
                        'width' : 900
                    });
                } else if (btn_id === 'btn_product_search') {
                    var prod_type = $('input[name="apply_type_ccd"]:checked').data('input').split(':')[2];
                    if (prod_type === 'book') {
                        // 교재 검색
                        $('#btn_product_search').setLayer({
                            'url' : '{{ site_url('/common/searchBook/') }}?site_code=' + site_code + '&return_type=inline&target_id=selected_product&target_field=prod_code',
                            'width' : 1200
                        });
                    } else if(prod_type === 'on' || prod_type === 'off') {
                        // 강좌 검색
                        $('#btn_product_search').setLayer({
                            'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&prod_type='+prod_type+'&return_type=inline&target_id=selected_product&target_field=prod_code',
                            'width' : 1200
                        });
                    } else if(prod_type === 'mock_exam') {
                        //모의고사 검색
                        $('#btn_product_search').setLayer({
                            'url' : '{{ site_url('/common/searchMockTest/') }}?site_code=' + site_code + '&prod_type='+prod_type+'&return_type=inline&target_id=selected_product&target_field=prod_code',
                            'width' : 1200
                        });
                    }
                }
            });

            // 카테고리, 상품 삭제
            $regi_form.on('click', '.selected-category-delete, .selected-product-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 쿠폰유형 선택
            $regi_form.on('ifChanged ifCreated', 'input[name="coupon_type_ccd"]:checked', function(evt) {
                if ($(this).val() === '644002') {
                    // 수강권 선택
                    if (evt.type === 'ifChanged') {
                        $regi_form.find('input[name="deploy_type"][value="F"]').iCheck('check');
                        $regi_form.find('input[name="apply_range_type"][value="P"]').iCheck('check');
                    }

                    $regi_form.find('input[name="deploy_type"][value="N"]').iCheck('disable');
                    $regi_form.find('input[name="apply_type_ccd"]').not('[value="645001"]').iCheck('disable');
                    $regi_form.find('input[name="apply_range_type"]').not('[value="P"]').iCheck('disable');
                    $regi_form.find('input[name="disc_rate"]').prop('readonly', 'readonly');
                    $regi_form.find('select[name="disc_type"] option[value="P"]').hide();
                    $regi_form.find('input[name="disc_rate"]').val('100');
                } else {
                    if (evt.type === 'ifChanged') {
                        $regi_form.find('input[name="deploy_type"][value="N"]').iCheck('enable');
                        $regi_form.find('input[name="deploy_type"][value="N"]').iCheck('check');
                        $regi_form.find('input[name="apply_type_ccd"]').iCheck('enable');
                        $regi_form.find('input[name="apply_range_type"]').iCheck('enable');
                        $regi_form.find('input[name="apply_range_type"][value="A"]').iCheck('check');
                    }

                    $regi_form.find('input[name="disc_rate"]').prop('readonly', '');
                    $regi_form.find('select[name="disc_type"] option[value="P"]').show();
                    $regi_form.find('input[name="disc_rate"]').val($regi_form.find('input[name="disc_rate"]').prop('defaultValue'));
                }
            });

            // 쿠폰배포루트 선택
            $regi_form.on('ifChanged ifCreated', 'input[name="deploy_type"]:checked', function() {
                var $pin_off = $('#pin_off');
                var deploy_type = $(this).val();

                $pin_off.removeClass('show').addClass('hide');
                if (deploy_type === 'F') {
                    $pin_off.addClass('show');
                }
            });

            // 쿠폰핀번호 유형 선택
            $regi_form.on('ifChanged ifCreated', 'input[name="pin_type"]:checked', function() {
                var pin_type = $(this).val();

                if (pin_type === 'S') {
                    $regi_form.find('input[name="pin_issue_cnt"]').prop('readonly', 'readonly');
                    $regi_form.find('input[name="pin_issue_cnt"]').val('1');
                } else {
                    $regi_form.find('input[name="pin_issue_cnt"]').prop('readonly', '');
                }
            });

            // 쿠폰적용구분 선택
            $regi_form.on('ifChanged ifCreated', 'input[name="apply_type_ccd"]:checked', function(evt) {
                var arr_set = $(this).data('input').split(':');
                var $form_item_nm_input = $('.form-item-nm-input');     // 온라인/학원강좌상품, 교재 항목별 입력폼
                var $form_item_mock_input = $('.form-item-mock-input'); // 모의고사 항목별 입력폼

                // input 초기화
                $('#category').removeClass('hide');
                $('.form-apply-input').removeClass('show').addClass('hide');
                $('.form-range-input').removeClass('show').addClass('hide');

                // 기존 적용된 특정상품 선택결과 초기화
                if (evt.type === 'ifChanged') {
                    $('#selected_product').html('');
                }

                // 카테고리
                if($(this).val() === '645006') {
                    {{-- 배송료는 카테고리 선택 불가 --}}
                    $('#category').addClass('hide');
                }

                // 쿠폰상세구분
                if (arr_set[0] !== 'no') {
                    $('#detail_' + arr_set[0]).removeClass('hide').addClass('show');

                    if (evt.type === 'ifChanged') {
                        // 이전 선택사항 초기화
                        $regi_form.find('input[name="lec_type_ccd[]"]').prop('checked', false).iCheck('update');
                    }
                }

                // 적용범위
                if (arr_set[1] === 'no') {
                    if (evt.type === 'ifChanged') {
                        // 전체선택
                        $regi_form.find('input[name="apply_range_type"][value="A"]').iCheck('uncheck').iCheck('check');
                    }
                }

                if (arr_set[1] === 'range') {
                    $('#apply_range').removeClass('hide').addClass('show');
                    $form_item_nm_input.css('display', 'inline-block');
                    $form_item_mock_input.css('display', 'none');

                    // 모의고사
                    if (arr_set[2] === 'mock_exam') {
                        $form_item_nm_input.css('display', 'none');
                        $form_item_mock_input.css('display', 'inline-block');
                    }

                    if (evt.type === 'ifChanged') {
                        $regi_form.find('input[name="apply_range_type"]:checked').iCheck('uncheck').iCheck('check');    // 이전 선택사항 유지
                        $form_item_nm_input.find('select').prop('disabled', false);
                        $form_item_mock_input.find('select').prop('disabled', true);

                        // 모의고사
                        if (arr_set[2] === 'mock_exam') {
                            $form_item_nm_input.find('select').prop('disabled', true);
                            $form_item_mock_input.find('select').prop('disabled', false);
                        }
                    }
                }
            });

            // 적용범위 선택
            $regi_form.on('ifChanged ifCreated', 'input[name="apply_range_type"]:checked', function() {
                var set_val = $(this).data('input');

                // input 초기화
                $('.form-range-input').removeClass('show').addClass('hide');

                // 쿠폰상세구분
                set_val !== 'no' && $('#apply_' + set_val).removeClass('hide').addClass('show');
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/service/coupon/regist/index') }}' + getQueryString());
            });
        });
    </script>
@stop
