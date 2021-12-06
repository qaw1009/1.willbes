@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인 운영자패키지, 학원 종합반 상품에 대한 할인율을 관리하는 메뉴입니다.</h5>
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
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : ''), false, [], true) !!}
                        <p class="form-control-static ml-30"># 최초 등록 후 운영사이트는 수정이 불가능합니다.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">상품정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <button type="button" id="btn_product_search" class="btn btn-sm btn-primary">상품검색</button>
                        <span id="selected_product" class="pl-10">
                            @if(empty($data['DiscProd']) === false)
                                @foreach($data['DiscProd'] as $prod_row)
                                    <span class="pr-10">[{{ $prod_row['ProdCode'] }}] {{ $prod_row['ProdName'] }}
                                        <a href="#none" data-prod-code="{{ $prod_row['ProdCode'] }}" class="selected-product-delete"><i class="fa fa-times red"></i></a>
                                        <input type="hidden" name="prod_code[]" value="{{ $prod_row['ProdCode'] }}"/>
                                    </span>
                                @endforeach
                            @endif
                        </span>
                        <div class="mt-10"># 선택한 운영자패키지(종합반)만 묶음 할인 가능합니다.</div>
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
                                        <input type="checkbox" name="is_chk_apply[]" class="flat" value="Y" {!! empty($data['DiscInfo'][$i]) === false && $data['DiscInfo'][$i]['IsApply'] == 'Y' ? 'checked="checked"' : '' !!} title="적용여부"/>
                                        <input type="hidden" name="is_apply[]" value="{{ empty($data['DiscInfo'][$i]) === false ? $data['DiscInfo'][$i]['IsApply'] : '' }}"/>
                                    </td>
                                    <td>
                                        <select name="disc_num[]" class="form-control" title="할인개수">
                                        @for($j=2; $j<=5; $j++)
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
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/product/etc/bundleDisc/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        goList();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                if ($regi_form.find('input[name="prod_code[]"]').length < 1) {
                    alert('등록할 상품을 선택해 주세요.');
                    return false;
                }
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
                // 상품 검색 초기화
                $('#selected_product').html('');
            });

            // 상품 검색
            $regi_form.on('click', '#btn_product_search', function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                var is_campus = $regi_form.find('select[name="site_code"] option:selected').data('is-campus');
                var learn_pattern_ccd = is_campus === 'Y' ? '{{ $arr_search_learn_pattern_ccd['off'] }}' : '{{ $arr_search_learn_pattern_ccd['on'] }}';

                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }

                $('#btn_product_search').setLayer({
                    'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&LearnPatternCcd=' + learn_pattern_ccd + '&return_type=inline&target_id=selected_product&target_field=prod_code&is_event=Y',
                    'width' : 1200
                });
            });

            // 상품 삭제
            $regi_form.on('click', '.selected-product-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 목록 이동
            $('#btn_list').click(function() {
                goList();
            });

            var goList = function() {
                location.replace('{{ site_url('/product/etc/bundleDisc/index') }}' + getQueryString());
            };
        });
    </script>
@stop
