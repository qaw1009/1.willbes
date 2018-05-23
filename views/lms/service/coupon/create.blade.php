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
                <input type="hidden" name="cate_code" value="{{ $data['CateCode'] }}" title="카테고리 선택" required="required"/>
                <input type="hidden" name="prod_code" value="{{ $data['ProdCode'] }}" title="상품 선택"/>
                <input type="hidden" name="mock_exam_idx" value="{{ $data['MockExamIdx'] }}" title="모의고사 선택"/>
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static"># 최초 등록 후 운영사이트, 카테고리, 마스터강의 정보는 수정이 불가능합니다.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['CateRouteName'] }}</p>
                        @else
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10"></span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="coupon_name">쿠폰명 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="text" id="coupon_name" name="coupon_name" class="form-control" title="쿠폰명" required="required" value="{{ $data['CouponName'] }}">
                    </div>
                    <label class="control-label col-md-2">쿠폰코드
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['CouponIdx'] }}@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="issue_route_ccd_1">쿠폰배포루트 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="issue_route_ccd_1" name="issue_route_ccd" class="flat" value="1" title="쿠폰배포루트" required="required" @if($method == 'POST' || $data['IssueRouteCcd'] == '1')checked="checked"@endif/> <label for="issue_route_ccd_1" class="input-label">온라인</label>
                            <input type="radio" id="issue_route_ccd_2" name="issue_route_ccd" class="flat" value="2" @if($data['IssueRouteCcd'] == '2')checked="checked"@endif/> <label for="issue_route_ccd_2" class="input-label">오프라인</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="apply_type_ccd_1">쿠폰적용구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="apply_type_ccd_1" name="apply_type_ccd" class="flat" value="1" title="쿠폰적용구분" required="required" @if($method == 'POST' || $data['ApplyTypeCcd'] == '1')checked="checked"@endif/> <label for="apply_type_ccd_1" class="input-label">온라인강좌</label>
                            <input type="radio" id="apply_type_ccd_2" name="apply_type_ccd" class="flat" value="2" @if($data['ApplyTypeCcd'] == '2')checked="checked"@endif/> <label for="apply_type_ccd_2" class="input-label">수강연장</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="apply_detail_ccd_1">쿠폰상세구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="checkbox" id="apply_detail_ccd_1" name="apply_detail_ccd[]" class="flat" value="1" title="쿠폰상세구분" required="required" @if($method == 'POST' || $data['ApplyDetailCcd'] == '1')checked="checked"@endif/> <label for="apply_detail_ccd_1" class="input-label">단강좌</label>
                            <input type="checkbox" id="apply_detail_ccd_2" name="apply_detail_ccd[]" class="flat" value="2" @if($data['ApplyDetailCcd'] == '2')checked="checked"@endif/> <label for="apply_detail_ccd_2" class="input-label">운영자패키지</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="apply_range_ccd_1">적용범위 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="apply_range_ccd_1" name="apply_range_ccd" class="flat" value="1" title="적용범위" required="required" @if($method == 'POST' || $data['ApplyRangeCcd'] == '1')checked="checked"@endif/> <label for="apply_range_ccd_1" class="input-label">전체</label>
                            <input type="radio" id="apply_range_ccd_2" name="apply_range_ccd" class="flat" value="2" @if($data['ApplyRangeCcd'] == '2')checked="checked"@endif/> <label for="apply_range_ccd_2" class="input-label">항목별</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="school_year">항목별 적용
                    </label>
                    <div class="col-md-9">
                        <div class="inline-block mr-5 item">
                            <select class="form-control" id="school_year" name="school_year" title="대비학년도">
                                <option value="">대비학년도</option>
                                @for($i = (date('Y')+1); $i >= 2010; $i--)
                                    <option value="{{ $i }}" @if($i == $data['SchoolYear']) selected="selected" @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="inline-block mr-5 item">
                            <select class="form-control" id="course_idx" name="course_idx" title="과정">
                                <option value="">과정</option>
                                @foreach($arr_course as $row)
                                    <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['CourseIdx'] == $data['CourseIdx']) selected="selected" @endif>{{ $row['CourseName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inline-block mr-5 item">
                            <select class="form-control" id="subject_idx" name="subject_idx" title="과목">
                                <option value="">과목</option>
                                @foreach($arr_subject as $row)
                                    <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['SubjectIdx'] == $data['SubjectIdx']) selected="selected" @endif>{{ $row['SubjectName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inline-block mr-5 item">
                            <select class="form-control" id="prof_idx" name="prof_idx" title="교수">
                                <option value="">교수</option>
                                @foreach($arr_professor as $row)
                                    <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['ProfIdx'] == $data['ProfIdx']) selected="selected" @endif>{{ $row['wProfName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">특정상품적용
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['ProdName'] }}</p>
                        @else
                            <button type="button" id="btn_product_search" class="btn btn-sm btn-primary">상품검색</button>
                            <span id="selected_product" class="pl-10"></span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">모의고사
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['MockExamName'] }}</p>
                        @else
                            <button type="button" id="btn_mock_exam_search" class="btn btn-sm btn-primary">모의고사검색</button>
                            <span id="selected_mock_exam" class="pl-10"></span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="disc_price">할인율 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 form-inline item">
                        <input type="number" id="disc_price" name="disc_price" class="form-control" required="required" title="할인량" value="{{ $data['SaleRate'] }}" style="width: 140px;">
                        <select class="form-control" id="disc_type" name="disc_type">
                            <option value="R" @if('R' == $data['SaleDiscType']) selected="selected" @endif>%</option>
                            <option value="P" @if('P' == $data['SaleDiscType']) selected="selected" @endif>원</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="disc_min_price">할인허용가능금액
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="number" id="disc_min_price" name="disc_min_price" class="form-control" title="할인허용가능금액" value="{{ $data['DiscMinPrice'] }}" style="width: 140px;"> 원 이상부터
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="valid_start_date">유효기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 form-inline">
                        <div class="input-group mb-0 item">
                            <input type="text" class="form-control datepicker" id="valid_start_date" name="valid_start_date" required="required" title="유효시작일자" value="{{ $data['ValidStartDate'] }}">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <input type="text" class="form-control datepicker" id="valid_end_date" name="valid_end_date" required="required" title="유효종료일자" value="{{ $data['ValidEndDate'] }}">
                            <div class="input-group-addon no-border no-bgcolor"># 발급 유효기간</div>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="use_days">사용기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <input type="number" id="use_days" name="use_days" class="form-control" required="required" title="사용기간" value="{{ $data['UseDays'] }}" style="width: 100px;"> 일
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
                            <input type="radio" id="is_issue_y" name="is_issue" class="flat" value="Y" required="required" title="발급여부" @if($method == 'POST' || $data['IsIssue'] == 'Y')checked="checked"@endif/> <label for="is_issue_y" class="input-label">사용</label>
                            <input type="radio" id="is_issue_n" name="is_issue" class="flat" value="N" @if($data['IsIssue'] == 'N')checked="checked"@endif/> <label for="is_issue_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group text-center">
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
                var _url = '{{ site_url('/service/coupon/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/service/coupon/index') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 운영사이트 변경
            $regi_form.on('change', 'select[name="site_code"]', function() {
                // 카테고리 검색 초기화
                $regi_form.find('input[name="cate_code"]').val('');
                $('#selected_category').html('');
            });

            // 카테고리 검색
            $('#btn_category_search').on('click', function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.')
                    return;
                }

                $('#btn_category_search').setLayer({
                    'url' : '{{ site_url('/common/searchCategory/index/') }}' + site_code,
                    'width' : 900
                });
            });

            // 과정, 과목, 교수 자동 변경
            $regi_form.find('select[name="course_idx"]').chained("#site_code");
            $regi_form.find('select[name="subject_idx"]').chained("#site_code");
            $regi_form.find('select[name="prof_idx"]').chained("#site_code");

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/service/coupon/index') }}' + getQueryString());
            });
        });
    </script>
@stop
