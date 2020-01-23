@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인 단강좌, 학원 단과반 상품에 대한 과정별 묶음 할인율을 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>할인 정보</h2>
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
                <input type="hidden" name="cate_code" value="{{ $data['CateCode'] }}" title="카테고리" required="required"/>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                        <p class="form-control-static ml-30"># 최초 등록 후 운영사이트, 카테고리, 교재정보는 수정이 불가능합니다.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT' && empty($data['CateCode']) === false)
                            <p class="form-control-static">{{ $data['CateName'] }}</p>
                        @else
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10"></span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="course_idx">과정(순환)선택 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                         <select class="form-control" id="course_idx" name="course_idx" title="과정" required="required">
                            <option value="">과정</option>
                            @foreach($arr_course as $row)
                                <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['CourseIdx'] == $data['CourseIdx']) selected="selected" @endif>{{ $row['CourseName'] }}</option>
                            @endforeach
                        </select>
                        <p class="form-control-static ml-30"># 선택한 과정별 단강좌(단과반)만 묶음 할인 가능합니다.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="disc_title">할인제목 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="disc_title" name="disc_title" class="form-control" title="할인제목" required="required" value="{{ $data['DiscTitle'] }}">
                    </div>
                    <label class="control-label col-md-1-1 col-md-offset-1">할인코드
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['DiscIdx'] }}@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">할인정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <table id="" class="table table-bordered" style="width: 280px;">
                            <tr class="bg-odd">
                                <td>선택</td>
                                <td>할인개수</td>
                                <td>할인율</td>
                            </tr>
                            @for($i=0; $i<4; $i++)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="is_chk_apply[]" class="flat" value="Y" {{ empty($data['DiscInfo'][$i]) === false && $data['DiscInfo'][$i]['IsApply'] == 'Y' ? 'checked="checked"' : '' }} title="적용여부"/>
                                        <input type="hidden" name="is_apply[]" value="{{ empty($data['DiscInfo'][$i]) === false ? $data['DiscInfo'][$i]['IsApply'] : '' }}"/>
                                    </td>
                                    <td>
                                        <select name="disc_num[]" class="form-control" title="할인개수">
                                        @for($j=2; $j<=12; $j++)
                                            <option value="{{ $j }}" {{ empty($data['DiscInfo'][$i]) === false && $data['DiscInfo'][$i]['DiscNum'] == $j ? 'selected="selected"' : '' }}>{{ $j }}개</option>
                                        @endfor
                                        </select>
                                    </td>
                                    <td class="form-inline"><input type="number" name="disc_rate[]" class="form-control" title="할인율" value="{{ empty($data['DiscInfo'][$i]) === false ? $data['DiscInfo'][$i]['DiscRate'] : '' }}" style="width: 80px;"/> %</td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse'] == 'Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse'] == 'N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-3">
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
            // 과정 자동 변경
            $regi_form.find('select[name="course_idx"]').chained("#site_code");

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/product/etc/lectureDisc/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        goList();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                if ($regi_form.find('input[name="is_chk_apply[]"]:checked').length < 1) {
                    alert('할인정보를 1개 이상 입력해 주세요.');
                    return false;
                }

                return true;
            }

            // 할인정보 선택여부 클릭할 경우 선택여부 hidden 필드 값 설정
            $regi_form.on('ifChanged', 'input[name="is_chk_apply[]"]', function() {
                var index = $regi_form.find('input[name="is_chk_apply[]"]').index(this);
                var input = $regi_form.find('input[name="is_apply[]"]');

                if ($(this).is(':checked') === true) {
                    input.eq(index).val('Y');
                } else {
                    input.eq(index).val('N');
                }
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
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }

                $('#btn_category_search').setLayer({
                    'url' : '{{ site_url('/common/searchCategory/index/single/site_code/') }}' + site_code,
                    'width' : 900
                });
            });

            // 목록 이동
            $('#btn_list').click(function() {
                goList();
            });

            var goList = function() {
                location.replace('{{ site_url('/product/etc/lectureDisc/index') }}' + getQueryString());
            };
        });
    </script>
@stop
