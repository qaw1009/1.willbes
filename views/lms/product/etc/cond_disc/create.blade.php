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
                    <label class="control-label col-md-1-1">할인강좌 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <button type="button" name="btn_product_search" class="btn btn-sm btn-primary" data-cond-type="disc">상품검색</button>
                        <span class="pl-15"># 할인이 적용될 강좌를 선택해주세요.</span>
                        <span id="selected_product_disc" class="pl-10"></span>
                        <div class="mt-10">
                            <table id="list_product_disc_table" class="table table-striped table-bordered mb-0">
                                <thead>
                                <tr>
                                    <th>상품명</th>
                                    <th style="width: 18%;">판매가</th>
                                    <th style="width: 18%;">할인적용</th>
                                    <th style="width: 18%;">할인금액</th>
                                    <th style="width: 60px;">삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(empty($data['DiscProd']) === false)
                                    @foreach($data['DiscProd'] as $prod_row)
                                        <tr>
                                            <td>
                                                [{{ $prod_row['ProdCode'] }}] {{ $prod_row['ProdName'] }}
                                                <input type="hidden" name="prod_code_disc[]" value="{{ $prod_row['ProdCode'] }}"/>
                                            </td>
                                            <td>
                                                <input type="number" name="real_sale_price[]" class="form-control input-sm" title="판매금액" value="{{ $prod_row['RealSalePrice'] }}" readonly="readonly"/> 원
                                            </td>
                                            <td class="form-inline">
                                                <select class="form-control input-sm set-pay-price" name="disc_type[]" title="할인구분">
                                                    <option value="R" @if($prod_row['DiscRate'] == 'R') selected="selected" @endif>%</option>
                                                    <option value="P" @if($prod_row['DiscRate'] == 'P') selected="selected" @endif>원</option>
                                                </select>
                                                <input type="number" name="disc_rate[]" class="form-control input-sm set-pay-price" title="할인율" value="{{ $prod_row['DiscRate'] }}">
                                            </td>
                                            <td>
                                                <input type="text" name="real_pay_price[]" class="form-control input-sm" title="할인금액" value="{{ number_format($prod_row['RealPayPrice']) }}" readonly="readonly"/> 원
                                            </td>
                                            <td>
                                                <a href="#none" class="selected-product-disc-delete"><i class="fa fa-times red"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">신청강좌 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <button type="button" name="btn_product_search" class="btn btn-sm btn-primary" data-cond-type="cond">상품검색</button>
                        <span class="pl-15"># 신청할 강좌를 선택해주세요.</span>
                        <div class="mt-10">
                            <span id="selected_product_cond">
                                @if(empty($data['CondProd']) === false)
                                    @foreach($data['CondProd'] as $prod_row)
                                        <span class="pr-10">[{{ $prod_row['ProdCode'] }}] {{ $prod_row['ProdName'] }}
                                            <a href="#none" class="selected-product-delete"><i class="fa fa-times red"></i></a>
                                            <input type="hidden" name="prod_code_cond[]" value="{{ $prod_row['ProdCode'] }}"/>
                                        </span>
                                    @endforeach
                                @endif
                            </span>
                        </div>
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
                var _url = '{{ site_url('/product/etc/condDisc/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        goList();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                if ($regi_form.find('input[name="prod_code_disc[]"]').length < 1) {
                    alert('등록할 할인강좌 상품을 선택해 주세요.');
                    return false;
                }
                if ($regi_form.find('input[name="prod_code_cond[]"]').length < 1) {
                    alert('등록할 신청강좌 상품을 선택해 주세요.');
                    return false;
                }

                return true;
            }

            // 운영사이트 변경
            $regi_form.on('change', 'select[name="site_code"]', function() {
                // 상품 검색 초기화
                $('#list_product_disc_table tbody').html('');   // 할인강좌
                $('#selected_product_cond').html('');           // 신청강좌
            });

            // 상품 검색
            $regi_form.on('click', 'button[name="btn_product_search"]', function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                var is_campus = $regi_form.find('select[name="site_code"] option:selected').data('is-campus');
                var learn_pattern_ccd = is_campus === 'Y' ? '{{ $arr_search_learn_pattern_ccd['off'] }}' : '{{ $arr_search_learn_pattern_ccd['on'] }}';
                var cond_type = $(this).data('cond-type');
                var target_id = 'selected_product_' + cond_type;
                var target_field = 'prod_code_' + cond_type;

                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }

                $('button[name="btn_product_search"]').setLayer({
                    'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&LearnPatternCcd=' + learn_pattern_ccd + '&return_type=inline&target_id=' + target_id + '&target_field=' + target_field + '&is_event=Y',
                    'width' : 1200
                });
            });

            // 신청강좌 상품삭제
            $regi_form.on('click', '.selected-product-delete', function() {
                $(this).parent().remove();
            });

            // 할인강좌 상품선택 결과 이벤트
            $regi_form.on('change', '#selected_product_disc', function() {
                var $tbody = $('#list_product_disc_table tbody');
                var code, data, html = '';
                var $selected_prod_code = {};

                // 기 선택된 상품코드 저장
                $tbody.find('input[name="prod_code_disc[]"]').each(function() {
                    $selected_prod_code[code] = $(this).val();
                });

                // 선택상품 입력폼 추가
                $(this).find('input[name="prod_code_disc[]"]').each(function() {
                    code = $(this).val();
                    data = $(this).data();

                    if ($selected_prod_code.hasOwnProperty(code) === false) {
                        html += '<tr>' +
                            '   <td>' +
                            '       [' + code + '] ' + Base64.decode(data.prodName) +
                            '       <input type="hidden" name="prod_code_disc[]" value="' + code + '"/>' +
                            '   </td>' +
                            '   <td>' +
                            '       <input type="number" name="real_sale_price[]" class="form-control input-sm" title="판매금액" value="' + data.realSalePrice + '" readonly="readonly"/> 원' +
                            '   </td>' +
                            '   <td class="form-inline">' +
                            '       <select class="form-control input-sm set-pay-price" name="disc_type[]" title="할인구분">' +
                            '           <option value="R">%</option>' +
                            '           <option value="P">원</option>' +
                            '       </select>' +
                            '       <input type="number" name="disc_rate[]" class="form-control input-sm set-pay-price" title="할인율" value="0">' +
                            '   </td>' +
                            '   <td>' +
                            '       <input type="text" name="real_pay_price[]" class="form-control input-sm" title="할인금액" value="' + data.realSalePrice + '" readonly="readonly"/> 원' +
                            '   </td>' +
                            '   <td>' +
                            '       <a href="#none" class="selected-product-disc-delete"><i class="fa fa-times red"></i></a>' +
                            '   </td>' +
                            '</tr>';
                    }
                });

                $(this).html('');    // 기 선택 상품 초기화
                $tbody.append(html);
            });

            // 할인강좌 할인구분, 할인율 변경할 경우 할인금액 계산 및 셋팅
            $regi_form.on('change', '.set-pay-price', function() {
                var index = $regi_form.find('[name="' + $(this).prop('name') + '"]').index(this);
                var real_sale_price = parseInt($regi_form.find('[name="real_sale_price[]"]').eq(index).val(), 10);
                var disc_type = $regi_form.find('[name="disc_type[]"]').eq(index).val();
                var disc_rate = parseInt($regi_form.find('[name="disc_rate[]"]').eq(index).val(), 10) || 0;
                var real_pay_price = 0;

                if (disc_rate < 0) {
                    alert('할인율은 0 이상의 숫자여야만 합니다.');
                    return;
                }
                if (disc_type === 'R' && disc_rate > 100) {
                    alert('할인율은 100 이하의 숫자여야만 합니다.');
                    return;
                }

                // 할인율 적용
                if (disc_type === 'R') {
                    real_pay_price = real_sale_price * ((100 - disc_rate) / 100);
                    real_pay_price = Math.ceil(real_pay_price); // 소숫점 올림
                } else {
                    real_pay_price = real_sale_price - disc_rate;
                }

                if (real_pay_price < 0) {
                    alert('할인금액은 0보다 작을 수 없습니다.');
                    return;
                }

                // 할인금액 셋팅
                $regi_form.find('[name="real_pay_price[]"]').eq(index).val(addComma(real_pay_price));
            });

            // 할인강좌 상품삭제
            $regi_form.on('click', '.selected-product-disc-delete', function() {
                $(this).parent().parent().remove();
            });

            // 목록 이동
            $('#btn_list').click(function() {
                goList();
            });

            var goList = function() {
                location.replace('{{ site_url('/product/etc/condDisc/index') }}' + getQueryString());
            };
        });
    </script>
@stop
