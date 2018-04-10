@extends('lcms.layouts.master')

@section('content')
    <h5>- 강좌 구성을 위한 교재 정보를 관리하는 메뉴입니다. (WBS > BMS > 교재관리 정보 연동)</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>교재 정보</h2>
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
                        <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                        <span id="selected_category" class="pl-10">{{ $data['CateRouteName'] }}</span>
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
                            <span id="selected_book" class="pl-10"></span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교재정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <p class="form-control-static">
                            <span class="blue">[출판사]</span>
                            <span id="selected_publ_name" class="pr-20"></span>
                            <span class="blue">[출판일]</span>
                            <span id="selected_publ_date" class="pr-20"></span>
                            <span class="blue">[저자]</span>
                            <span id="selected_author_names"></span>
                        </p>
                        <p class="form-control-static">
                            <span class="blue">[ISBN]</span>
                            <span id="selected_isbn" class="pr-20"></span>
                            <span class="blue">[페이지]</span>
                            <span id="selected_page_cnt" class="pr-20"></span>
                            <span class="blue">[신판여부]</span>
                            <span id="selected_edition_ccd_name" class="pr-20"></span>
                            <span class="blue">[판/쇄]</span>
                            <span id="selected_print_edtion_cnt" class="pr-20"></span>
                            <span class="blue">[판형]</span>
                            <span id="selected_edtion_size"></span>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prepare_year">교재기본정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <div class="inline-block mr-5 item">
                            <select class="form-control" id="prepare_year" name="prepare_year" required="required" title="대비학년도">
                                <option value="">대비학년도</option>
                                @for($i = (date('Y')+1); $i >= 2010; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="inline-block mr-5 item">
                            <select class="form-control" id="course_idx" name="course_idx" required="required" title="과정">
                                <option value="">과정</option>
                                @foreach($course_list as $row)
                                    <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CourseName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inline-block mr-5 item">
                            <select class="form-control" id="subject_idx" name="subject_idx" required="required" title="과목">
                                <option value="">과목</option>
                                @foreach($subject_list as $row)
                                    <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inline-block mr-5 item">
                            <select class="form-control" id="prof_idx" name="prof_idx" required="required" title="교수">
                                <option value="">교수</option>
                                @foreach($professor_list as $row)
                                    <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="book_name">교재명 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="text" id="book_name" name="book_name" class="form-control" title="교재명" required="required" value="{{ $data['BookName'] }}">
                    </div>
                    <label class="control-label col-md-2">교재코드
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static"># 등록시 자동 생성</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="disp_type_ccd">노출위치 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="radio">
                            @foreach($disp_type_ccd as $key => $val)
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
                        <p class="form-control-static">
                            <span class="blue pr-10">[정상가]</span>
                            <input type="number" id="org_price" name="org_price" class="form-control" title="정상가" value="{{ $data['OrgPrice'] }}" readonly="readonly" style="width: 120px;"> 원
                            <span class="blue pl-30 pr-10">[할인적용]</span>
                            <div class="inline-block item">
                                <input type="number" id="dc_amt" name="dc_amt" class="form-control" required="required" title="할인량" value="{{ $data['DcAmt'] }}" style="width: 140px;">
                                <select class="form-control" id="dc_type" name="dc_type">
                                    <option value="R">%</option>
                                    <option value="P">원</option>
                                </select>
                            </div>
                            <span class="blue pl-30 pr-10">[판매가]</span>
                            <div class="inline-block item">
                                <input type="number" id="sale_price" name="sale_price" class="form-control" required="required" title="판매가" value="{{ $data['SalePrice'] }}" style="width: 140px;"> 원
                            </div>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="is_coupon_y">쿠폰적용 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="radio">
                            <input type="radio" id="is_coupon_y" name="is_coupon" class="flat" value="Y" required="required" title="쿠폰적용여부" @if($method == 'POST' || $data['IsCoupon'] == 'Y')checked="checked"@endif/> <label for="is_coupon_y" class="input-label">가능</label>
                            <input type="radio" id="is_coupon_n" name="is_coupon" class="flat" value="N" @if($data['IsCoupon'] == 'N')checked="checked"@endif/> <label for="is_coupon_n" class="input-label">불가능</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2 pt-15" for="is_point_saving_y">북포인트적용 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="radio form-inline">
                            <input type="radio" id="is_point_saving_y" name="is_point_saving" class="flat" value="Y" required="required" title="북포인트적용여부" @if($method == 'POST' || $data['IsPointSaving'] == 'Y')checked="checked"@endif/> <label for="is_point_saving_y" class="input-label">가능</label>
                            [ <input type="number" id="point_saving_amt" name="point_saving_amt" class="form-control" required="requiredif:is_point_saving,Y" title="적립포인트" value="{{ $data['PointSavingAmt'] }}" style="width: 120px;">
                            <select class="form-control" id="point_saving_type" name="point_saving_type">
                                <option value="R">%</option>
                                <option value="P">원</option>
                            </select> 적립 ]
                            &nbsp; &nbsp; <input type="radio" id="is_point_saving_n" name="is_point_saving" class="flat" value="N" @if($data['IsPointSaving'] == 'N')checked="checked"@endif/> <label for="is_point_saving_n" class="input-label">불가능</label>
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
                    <div class="col-md-3 item">
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
                    <label class="control-label col-md-2" for="sale_ccd">판매여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="radio">
                            @foreach($sale_ccd as $key => $val)
                                <input type="radio" id="sale_ccd_{{ $loop->index }}" name="sale_ccd" class="flat" value="{{ $key }}" @if($key == $data['wSaleCcd'])checked="checked"@endif  @if($loop->index == 1)required="required" title="판매여부"@endif/>
                                <label for="sale_ccd_{{ $loop->index }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="form-control-static"># 변경시 WBS > BMS > 교재 기본정보 관리 정보가 자동 수정됩니다.</p>
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
    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
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
                return true;
            }

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

            // 교재 검색
            $('#btn_book_search').setLayer({
                'url' : '{{ site_url('/common/searchWBook') }}',
                'width' : 900
            });

            // 과정, 과목, 교수 자동 변경
            $regi_form.find('select[name="course_idx"]').chained("#site_code");
            $regi_form.find('select[name="subject_idx"]').chained("#site_code");
            $regi_form.find('select[name="prof_idx"]').chained("#site_code");

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
                var org_price = 0 || parseInt($regi_form.find('input[name="org_price"]').val(), 10);
                var dc_amt = 0 || parseInt($regi_form.find('input[name="dc_amt"]').val(), 10);
                var dc_type = $regi_form.find('select[name="dc_type"]').val();

                if (org_price < 1) {
                    return;
                }

                if (dc_type === 'R') {
                    sale_price = org_price - ((org_price * dc_amt) / 100);
                } else {
                    sale_price = org_price - dc_amt;
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
