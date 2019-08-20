@extends('lcms.layouts.master')

@section('content')
    <h5>- 강좌 구성을 위한 교재 정보를 관리하는 메뉴입니다. (WBS > BMS > 교재관리 정보 연동)</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>교재 정보</h2>
            <div class="row">
                <div class="col-md-6">
                    <button type="button" id="btn_wbook_search" class="btn btn-sm btn-success">동일한 마스터 교재로 등록된 교재 보기</button>
                </div>
                <div class="col-md-6 text-right pt-10">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
            </div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>
                <input type="hidden" name="wbook_idx" value="{{ $data['wBookIdx'] }}" title="교재 선택" required="required"/>
                <input type="hidden" name="cate_code" value="{{ $data['CateCode'] }}" title="카테고리 선택" required="required"/>
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static"># 최초 등록 후 운영사이트, 카테고리, 교재정보는 수정이 불가능합니다.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT' && empty($data['CateCode']) === false)
                            <p class="form-control-static">{{ $data['CateRouteName'] }}</p>
                        @else
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10">{{ $data['CateRouteName'] }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교재정보 불러오기 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['wBookName'] }} [{{ $data['wBookIdx'] }}]</p>
                        @else
                            <button type="button" id="btn_book_search" class="btn btn-sm btn-primary">교재검색</button>
                            <span id="selected_book" class="pl-10">@if(empty($data['wBookIdx']) === false){{ $data['wBookName'] }} [{{ $data['wBookIdx'] }}]@endif</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교재정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <p class="form-control-static">
                            <span class="blue">[출판사]</span>
                            <span id="selected_publ_name" class="pr-20">{{ $data['wPublName'] }}</span>
                            <span class="blue">[출판일]</span>
                            <span id="selected_publ_date" class="pr-20">{{ $data['wPublDate'] }}</span>
                            <span class="blue">[저자]</span>
                            <span id="selected_author_names">{{ $data['wAuthorNames'] }}</span>
                        </p>
                        <p class="form-control-static">
                            <span class="blue">[ISBN]</span>
                            <span id="selected_isbn" class="pr-20">{{ $data['wIsbn'] }}</span>
                            <span class="blue">[페이지]</span>
                            <span id="selected_page_cnt" class="pr-20">@if($method == 'PUT') {{ $data['wPageCnt'] }}p @endif</span>
                            <span class="blue">[신판여부]</span>
                            <span id="selected_edition_ccd_name" class="pr-20">{{ $data['wEditionCcdName'] }}</span>
                            <span class="blue">[판/쇄]</span>
                            <span id="selected_print_edtion_cnt" class="pr-20">@if($method == 'PUT') {{ $data['wPrintCnt'] }}판 {{ $data['wEditionCnt'] }}쇄 @endif</span>
                            <span class="blue">[판형]</span>
                            <span id="selected_edtion_size">{{ $data['wEditionSize'] }}</span>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="school_year">교재기본정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <div class="inline-block mr-5 item">
                            <select class="form-control" id="school_year" name="school_year" required="required" title="대비학년도">
                                <option value="">대비학년도</option>
                                @for($i = (date('Y')+1); $i >= 2010; $i--)
                                    <option value="{{ $i }}" @if($i == $data['SchoolYear']) selected="selected" @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="inline-block mr-5 item">
                            <select class="form-control" id="course_idx" name="course_idx" required="required" title="과정">
                                <option value="">과정</option>
                                @foreach($arr_course as $row)
                                    <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['CourseIdx'] == $data['CourseIdx']) selected="selected" @endif>{{ $row['CourseName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">과목/교수정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <button type="button" id="btn_prof_subject_search" class="btn btn-sm btn-primary">과목/교수검색</button>
                        <span id="selected_prof_subject" class="pl-10">
                            @if(empty($data['ProfSubject']) === false)
                                @foreach($data['ProfSubject'] as $idx => $row)
                                    <span class="pr-10">{{ $row['ProfSubjectName'] }}
                                        <a href="#none" data-prof-subject-idx="{{ $row['ProfSubjectIdx'] }}" class="selected-prof-subject-delete"><i class="fa fa-times red"></i></a>
                                        <input type="hidden" name="prof_subject_idx[]" value="{{ $row['ProfSubjectIdx'] }}"/>
                                    </span>
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="book_name">교재명 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="text" id="book_name" name="book_name" class="form-control" title="교재명" required="required" value="{{ $data['ProdName'] }}">
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1">교재코드
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['ProdCode'] }}@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="disp_type_ccd">노출위치 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="radio">
                            @foreach($arr_disp_type_ccd as $key => $val)
                                <input type="radio" id="disp_type_ccd_{{ $loop->index }}" name="disp_type_ccd" class="flat" value="{{ $key }}" @if($loop->index === 1) required="required" title="노출위치" @endif @if($data['DispTypeCcd'] == $key || ($method == 'POST' && $loop->index === 1))checked="checked"@endif/> <label for="disp_type_ccd_{{ $loop->index }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="is_free_n">무료여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="radio">
                            <input type="radio" id="is_free_n" name="is_free" class="flat" value="N" required="required" title="무료여부" @if($method == 'POST' || $data['IsFree'] == 'N')checked="checked"@endif/> <label for="is_free_n" class="input-label">유료</label>
                            <input type="radio" id="is_free_y" name="is_free" class="flat" value="Y" @if($data['IsFree'] == 'Y')checked="checked"@endif/> <label for="is_free_y" class="input-label">무료</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="sale_price">교재비 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <span class="blue pr-10">[정상가]</span>
                        <input type="number" id="org_price" name="org_price" class="form-control" title="정상가" value="{{ $data['wOrgPrice'] }}" readonly="readonly" style="width: 120px;"> 원
                        <span class="blue pl-30 pr-10">[할인적용]</span>
                        <div class="inline-block item">
                            <input type="number" id="dc_amt" name="dc_amt" class="form-control" required="required" title="할인량" value="{{ $data['SaleRate'] }}" style="width: 140px;">
                            <select class="form-control" id="dc_type" name="dc_type">
                                <option value="R" @if('R' == $data['SaleDiscType']) selected="selected" @endif>%</option>
                                <option value="P" @if('P' == $data['SaleDiscType']) selected="selected" @endif>원</option>
                            </select>
                        </div>
                        <span class="blue pl-30 pr-10">[판매가]</span>
                        <div class="inline-block item">
                            <input type="number" id="sale_price" name="sale_price" class="form-control" required="required" title="판매가" value="{{ $data['RealSalePrice'] }}" readonly="readonly" style="width: 140px;"> 원
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="is_coupon_y">쿠폰적용 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="radio">
                            <input type="radio" id="is_coupon_y" name="is_coupon" class="flat" value="Y" required="required" title="쿠폰적용여부" @if($method == 'POST' || $data['IsCoupon'] == 'Y')checked="checked"@endif/> <label for="is_coupon_y" class="input-label">가능</label>
                            <input type="radio" id="is_coupon_n" name="is_coupon" class="flat" value="N" @if($data['IsCoupon'] == 'N')checked="checked"@endif/> <label for="is_coupon_n" class="input-label">불가능</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2 pt-15" for="is_point_saving_y">북포인트적용 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="radio form-inline">
                            <input type="radio" id="is_point_saving_y" name="is_point_saving" class="flat" value="Y" required="required" title="북포인트적용여부" @if($method == 'POST' || $data['IsPoint'] == 'Y')checked="checked"@endif/> <label for="is_point_saving_y" class="input-label">가능</label>
                            [ <input type="number" id="point_saving_amt" name="point_saving_amt" class="form-control" required="requiredif:is_point_saving,Y" title="적립포인트" value="{{ $method == 'POST' ? '1' : $data['PointSavePrice'] }}" style="width: 120px;">
                            <select class="form-control" id="point_saving_type" name="point_saving_type">
                                <option value="R"@if('R' == $data['PointSaveType']) selected="selected" @endif>%</option>
                                <option value="P"@if('P' == $data['PointSaveType']) selected="selected" @endif>원</option>
                            </select> 적립 ]
                            &nbsp; &nbsp; <input type="radio" id="is_point_saving_n" name="is_point_saving" class="flat" value="N" @if($data['IsPoint'] == 'N')checked="checked"@endif/> <label for="is_point_saving_n" class="input-label">불가능</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교재소개
                    </label>
                    <div class="col-md-9">
                        <div id="selected_wbook_desc" class="form-control-static">{!! $data['wBookDesc'] !!}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">저자소개
                    </label>
                    <div class="col-md-9">
                        <div id="selected_wauthor_desc" class="form-control-static">{!! $data['wAuthorDesc'] !!}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">목차소개
                    </label>
                    <div class="col-md-9">
                        <div id="selected_wtable_desc" class="form-control-static">{!! $data['wTableDesc'] !!}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교재재고
                    </label>
                    <div class="col-md-9">
                        <div id="selected_wstock_cnt" class="form-control-static">{{ $data['wStockCnt'] }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse'] == 'Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse'] == 'N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="is_new">신규/추천여부
                    </label>
                    <div class="col-md-4">
                        <div class="checkbox">
                            <input type="checkbox" id="is_new" name="is_new" class="flat" value="Y" title="신규여부" @if($data['IsNew'] == 'Y')checked="checked"@endif/> <label for="is_new" class="input-label">신규</label>
                            <input type="checkbox" id="is_best" name="is_best" class="flat" value="Y" @if($data['IsBest'] == 'Y')checked="checked"@endif/> <label for="is_best" class="input-label">추천</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    @if($method == 'PUT')
                    <label class="control-label col-md-2">사용여부(W)
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($data['wIsUse'] == 'Y') 사용 @else <span class="red">미사용</span> @endif</p>
                    </div>
                    @endif
                    <label class="control-label col-md-2">판매여부
                    </label>
                    <div class="col-md-4">
                        <p id="selected_wsale_ccd_name" class="form-control-static">{{ $data['wSaleCcdName'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
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
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/bms/book/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/bms/book/index') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                if($regi_form.find('input[name="prof_subject_idx[]"]').length < 1) {
                    alert('과목/교수 정보 필드는 필수입니다.');
                    return false;
                }
                if ($regi_form.find('input[name="sale_price"]').val() < 0) {
                    alert('판매가를 0원 이상으로 입력해 주세요.');
                    $regi_form.find('input[name="dc_amt"]').focus();
                    return false;
                }
                if ($regi_form.find('input[name="is_free"]:checked').val() === 'Y' && $regi_form.find('input[name="sale_price"]').val() !== '0') {
                    alert('무료교재의 경우 판매가를 0원으로 입력해 주세요.');
                    return false;
                }
                if ($regi_form.find('input[name="is_free"]:checked').val() === 'N' && $regi_form.find('input[name="sale_price"]').val() < 1) {
                    alert('유료교재의 경우 판매가를 0원을 초과하여 입력해 주세요.');
                    return false;
                }

                return true;
            }

            // 동일한 마스터 교재로 등록된 교재 보기 버튼 클릭
            $('#btn_wbook_search').on('click', function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                var wbook_idx = $regi_form.find('input[name="wbook_idx"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }

                if (!wbook_idx) {
                    alert('마스터 교재를 먼저 선택해 주십시오.');
                    return;
                }

                $('#btn_wbook_search').setLayer({
                    'url' : '{{ site_url('common/searchBook/') }}'+'?site_code=' + site_code + '&wbook_idx=' + wbook_idx,
                    'width' : 1200
                })
            });

            // 운영사이트 변경
            $regi_form.on('change', 'select[name="site_code"]', function() {
                // 카테고리 검색 초기화
                $regi_form.find('input[name="cate_code"]').val('');
                $('#selected_category').html('');

                // 과목/교수 검색 초기화
                $('#selected_prof_subject').html('');
            });

            // 카테고리 검색
            $('#btn_category_search').on('click', function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }

                // 과목/교수 검색 초기화
                $('#selected_prof_subject').html('');

                $('#btn_category_search').setLayer({
                    'url' : '{{ site_url('/common/searchCategory/index/single/site_code/') }}' + site_code,
                    'width' : 900
                });
            });

            // 교재 검색
            $('#btn_book_search').setLayer({
                'url' : '{{ site_url('/common/searchWBook') }}',
                'width' : 900
            });

            // 과정 자동 변경
            $regi_form.find('select[name="course_idx"]').chained("#site_code");

            // 과목/교수 검색 버튼 클릭
            $('#btn_prof_subject_search').on('click', function(event) {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                var cate_code = $regi_form.find('input[name="cate_code"]').val();
                var search_url = '{{ site_url('/common/searchProfessorSubject/index/') }}';

                if (!site_code || !cate_code) {
                    alert('운영사이트와 카테고리를 먼저 선택해 주십시오.');
                    return;
                }

                $('#btn_prof_subject_search').setLayer({
                    'url' : search_url + site_code + '/' + cate_code,
                    'width' : 900
                });
            });

            // 과목/교수 연결 데이터 삭제
            $regi_form.on('click', '.selected-prof-subject-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 무료여부 값에 따른 교재비, 쿠폰, 북포인트 설정
            $regi_form.on('ifChanged ifCreated', 'input[name="is_free"]:checked', function(evt) {
                var $dc_amt = $regi_form.find('input[name="dc_amt"]');
                var $dc_type = $regi_form.find('select[name="dc_type"]');
                var $is_coupon = $regi_form.find('input[name="is_coupon"]');
                var $is_point_saving = $regi_form.find('input[name="is_point_saving"]');

                if($(this).val() === 'Y') {
                    $dc_amt.val('100').prop('readonly', true);
                    $dc_type.val('R').prop('disabled', true);
                    $is_coupon.filter('#is_coupon_y').prop('checked', false).iCheck('update');
                    $is_coupon.filter('#is_coupon_y').prop('disabled', true).iCheck('update');
                    $is_coupon.filter('#is_coupon_n').prop('checked', true).iCheck('update');
                    $is_point_saving.filter('#is_point_saving_y').prop('checked', false).iCheck('update');
                    $is_point_saving.filter('#is_point_saving_y').prop('disabled', true).iCheck('update');
                    $is_point_saving.filter('#is_point_saving_n').iCheck('check');

                    if (evt.type === 'ifChanged') {
                        $dc_amt.trigger('change');
                    }
                } else {
                    $dc_amt.val('{{ $data['SaleRate'] or '0' }}').prop('readonly', false);
                    $dc_type.val('{{ $data['SaleDiscType'] or 'R' }}').prop('disabled', false);
                    $is_coupon.filter('#is_coupon_y').prop('disabled', false).iCheck('update');
                    $is_point_saving.filter('#is_point_saving_y').prop('disabled', false).iCheck('update');

                    if (evt.type === 'ifChanged' && $dc_amt.val() !== '' && (($dc_amt.val() !== '100' && $dc_type.val() === 'R') || ($dc_amt.val() !== '0' && $dc_type.val() === 'P'))) {
                        $dc_amt.trigger('change');
                    }
                }
            });

            // 북포인트적용 disabled 처리
            $regi_form.on('ifChanged ifCreated', 'input[name="is_point_saving"]:checked', function() {
                var $point_saving_amt = $regi_form.find('input[name="point_saving_amt"]');
                var $point_saving_type = $regi_form.find('select[name="point_saving_type"]');
                if($(this).val() === 'Y') {
                    $point_saving_amt.prop('disabled', false);
                    $point_saving_type.prop('disabled', false);
                } else {
                    $point_saving_amt.prop('disabled', true);
                    $point_saving_type.prop('disabled', true);
                }
            });

            // 판매가 계산
            $regi_form.on('keyup change', 'input[name="org_price"], input[name="dc_amt"], select[name="dc_type"]', function() {
                var sale_price = 0;
                var org_price = parseInt($regi_form.find('input[name="org_price"]').val(), 10) || 0;
                var dc_amt = parseInt($regi_form.find('input[name="dc_amt"]').val(), 10) || 0;
                var dc_type = $regi_form.find('select[name="dc_type"]').val();

                if (org_price < 1) {
                    return;
                }

                if (dc_type === 'R') {
                    sale_price = org_price - ((org_price * dc_amt) / 100);
                } else {
                    sale_price = org_price - dc_amt;
                }

                if (sale_price < 0) {
                    alert('판매가를 0원 이상으로 입력해 주세요.');
                    return;
                }

                if (sale_price < 1) {
                    // 판매금액이 0원일 경우 무료 체크
                    $regi_form.find('input[id="is_free_n"]').prop('checked', false).iCheck('update');
                    $regi_form.find('input[id="is_free_y"]').prop('checked', true).iCheck('update');
                } else {
                    $regi_form.find('input[id="is_free_n"]').prop('checked', true).iCheck('update');
                    $regi_form.find('input[id="is_free_y"]').prop('checked', false).iCheck('update');
                }

                $regi_form.find('input[name="sale_price"]').val(sale_price);
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/bms/book/index') }}' + getQueryString());
            });
        });
    </script>
@stop
