@extends('lcms.layouts.master')

@section('content')
    <h5>- 관리자가 임의로 유료 상품을 등록할 수 있습니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>유료결제등록</h2>
            <div class="pull-right">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>상품등록</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <div class="bdt-line mb-10"></div>
                        <p><i class="fa fa-check ml-10"></i> 상품 등록은 1건만 가능합니다. (다중 선택 불가능)</p>
                        <p><i class="fa fa-check ml-10"></i> 상품구분이 ‘교재’인 경우는 회원 등록이 1명만 가능합니다.</p>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group bdt-line">
                            <label class="control-label col-md-1" for="site_code">운영사이트 <span class="required">*</span>
                            </label>
                            <div class="col-md-2 item">
                                {!! html_site_select('', 'site_code', 'site_code', '', '운영 사이트', 'required') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">상품구분 <span class="required">*</span>
                            </label>
                            <div class="col-md-10 item">
                                <div class="radio">
                                    @foreach($arr_prod_type_target_name as $ccd => $name)
                                        <input type="radio" id="prod_type_{{ $loop->index }}" name="prod_type" class="flat" value="{{ array_search($ccd, $arr_prod_type_target_ccd) }}" @if($loop->index === 1) title="상품구분" required="required" checked="checked" @endif/>
                                        <label for="prod_type_{{ $loop->index }}" class="input-label">{{ $name }}</label>

                                        @if($loop->index == 1)
                                            <div class="inline-block mr-10">
                                                ( <input type="radio" id="is_lec_unit_n" name="is_lec_unit" class="flat" value="N" title="온라인강좌 등록구분" checked="checked" required="required"/> <label for="is_lec_unit_n" class="input-label">강좌등록</label>
                                                <input type="radio" id="is_lec_unit_y" name="is_lec_unit" class="flat" value="Y"/> <label for="is_lec_unit_y" class="input-label mr-0">회차등록</label> )
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">상품검색 <span class="required">*</span>
                            </label>
                            <div class="col-md-10">
                                <button type="button" id="btn_product_search" class="btn btn-sm btn-primary">상품검색</button>
                                <span id="selected_product" class="pl-10"></span>
                            </div>
                        </div>
                        <div id="lec_unit_search" class="form-group hide">
                            <label class="control-label col-md-1">회차검색 <span class="required">*</span>
                            </label>
                            <div class="col-md-10">
                                <button type="button" id="btn_lecture_unit_search" class="btn btn-sm btn-primary">회차검색</button>
                                <span id="sampleList" class="pl-10"></span>
                            </div>
                        </div>
                        <div id="lecture_info" class="form-group">
                            <label class="control-label col-md-1">수강정보 <span class="required">*</span>
                            </label>
                            <div class="col-md-10 form-inline">
                                <div class="control-label col-md-1 pl-0 pr-0">[수강시작일]</div>
                                <div class="col-md-2 pl-0 item">
                                    <input type="text" class="form-control datepicker" id="lec_start_date" name="lec_start_date" required="required_if:prod_type,on_lecture" readonly="readonly" title="수강시작일" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="control-label col-md-1 col-md-offset-1">[수강제공기간]</div>
                                <div class="col-md-2 item">
                                    <input type="number" id="lec_expire_day" name="lec_expire_day" class="form-control" required="required_if:prod_type,on_lecture" title="수강제공기간" value="30" style="width: 100px;"> 일
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">결제금액 <span class="required">*</span>
                            </label>
                            <div class="col-md-9 form-inline item">
                                <input type="number" id="real_pay_price" name="real_pay_price" class="form-control" required="required" data-validate-minmax="1" title="결제금액" value=""> 원
                                <div class="inline-block bold red ml-20"># 0원 이상, 상품 판매금액 이하의 금액으로 입력 가능합니다.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">부여사유유형 <span class="required">*</span>
                            </label>
                            <div class="col-md-9 form-inline item">
                                <select class="form-control" id="admin_reason_ccd" name="admin_reason_ccd" required="required" title="부여사유유형">
                                    <option value="">선택</option>
                                    @foreach($arr_admin_reason_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                <div class="inline-block bold red ml-20"># 부여사유 유형이 ‘수강 상품 변경’일 경우 상세부여사유에 관련 주문번호를 입력해 주세요.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">상세부여사유 <span class="required">*</span>
                            </label>
                            <div class="col-md-5 item">
                                <input type="text" id="admin_etc_reason" name="admin_etc_reason" class="form-control" required="required" title="상세부여사유" value="" maxlength="100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-md-12">
                        <h4><strong>회원등록</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <div class="bdt-line"></div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_mem_type_1">등록구분 <span class="required">*</span>
                            </label>
                            <div class="col-md-10 item">
                                <div class="radio">
                                    <input type="radio" id="search_mem_type_1" name="search_mem_type" class="flat" value="S" title="등록구분" required="required" checked="checked"/> <label for="search_mem_type_1" class="input-label">개별등록</label>
                                    <input type="radio" id="search_mem_type_2" name="search_mem_type" class="flat" value="F"/> <label for="search_mem_type_2" class="input-label">일괄등록</label>
                                </div>
                            </div>
                        </div>
                        <div id="search_mem_type_S" class="form-group form-regi-input">
                            <label class="control-label col-md-1" for="search_mem_id">개별등록
                            </label>
                            <div class="col-md-10 form-inline">
                                <input type="text" id="search_mem_id" name="search_mem_id" class="form-control" title="회원검색어" value="" style="width: 180px;">
                                <button type="button" name="btn_member_search" data-result-type="multiple" class="btn btn-primary mb-0">회원검색</button>
                                <span id="selected_member" class="pl-10"></span>
                            </div>
                        </div>
                        <div id="search_mem_type_F" class="form-group form-regi-input hide">
                            <label class="control-label col-md-1" for="search_mem_file">일괄등록
                            </label>
                            <div class="col-md-10 form-inline">
                                <input type="file" id="search_mem_file" name="search_mem_file" class="form-control" title="회원검색파일" value="">
                                <button type="button" name="btn_member_file_upload" class="btn btn-primary mb-0">업로드하기</button>
                                <span id="selected_member_file" class="hide"></span>
                            </div>
                            <div class="col-md-10 col-md-offset-1 mt-5">
                                <p class="form-control-static"># 첨부파일은 한줄에 한 개의 아이디로 구성된 TXT 파일로 생성</p>
                            </div>
                            <div class="col-md-2 col-md-offset-1 mt-5">
                                <select class="form-control" id="selected_member_file2" name="selected_member_file2" size="4">
                                </select>
                            </div>
                            <div class="col-md-2">
                                <p class="form-control-static">&lt;총 <span id="selected_member_cnt">0</span>명&gt;</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="delivery_address" class="row mt-30 hide">
                    <div class="col-md-12">
                        <h4><strong>배송지 정보</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group bdt-line">
                            <label class="control-label col-md-1">배송지 정보 <span class="required">*</span>
                            </label>
                            <div class="col-md-2">
                                <input type="radio" id="addr_type_m" name="addr_type" class="flat" value="M" checked="checked"/> <label for="prod_type_off" class="input-label">회원 기본정보</label>
                                <input type="radio" id="addr_type_d" name="addr_type" class="flat" value="D"/> <label for="prod_type_book" class="input-label">직접 입력</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">이름 <span class="required">*</span>
                            </label>
                            <div class="col-md-2 item">
                                <input type="text" id="receiver" name="receiver" class="form-control" title="이름" required="required_if:prod_type,book" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">주소 <span class="required">*</span>
                            </label>
                            <div class="col-md-3 form-inline item">
                                <input type="text" id="zipcode" name="zipcode" class="form-control" title="우편번호" required="required_if:prod_type,book" readonly="readonly" maxlength="6">
                                <button type="button" id="btn_post_search" onclick="searchPost('post_search', 'zipcode', 'addr1', 'Y');" class="btn btn-primary mb-0">주소찾기</button>
                                <div id="post_search" style="max-height: 446px; border:1px solid black; display: none;">
                                    <div class="panel panel-primary mt-10 mb-0">
                                        <div class="panel-heading">우편번호 검색
                                            <div class="pull-right"><button type="button" class="close" onclick="closeSearchPost('post_search');"><span aria-hidden="true">×</span></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11 col-md-offset-1 mt-5">
                                <div class="col-md-4 pl-0 item">
                                    <input type="text" id="addr1" name="addr1" class="form-control" title="기본주소" required="required_if:prod_type,book" readonly="readonly" placeholder="기본주소">
                                </div>
                                <div class="col-md-4 item">
                                    <input type="text" id="addr2" name="addr2" class="form-control" title="상세주소" required="required_if:prod_type,book" placeholder="상세주소">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">휴대폰번호 <span class="required">*</span>
                            </label>
                            <div class="col-md-10 form-inline multi item">
                                <select name="receiver_phone1" id="receiver_phone1" class="form-control" required="required_if:prod_type,book" title="휴대폰번호1">
                                    <option value="">선택</option>
                                    @foreach($arr_phone1_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                - <input type="number" id="receiver_phone2" name="receiver_phone2" required="required_if:prod_type,book" class="form-control" maxlength="4" title="휴대폰번호2" value="" style="width: 120px">
                                - <input type="number" id="receiver_phone3" name="receiver_phone3" required="required_if:prod_type,book" class="form-control" maxlength="4" title="휴대폰번호3" value="" style="width: 120px">
                                <input type="hidden" id="receiver_phone" name="receiver_phone" required="required_if:prod_type,book" pattern="mobile" title="휴대폰번호" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">전화번호
                            </label>
                            <div class="col-md-10 form-inline multi item">
                                <select name="receiver_tel1" id="receiver_tel1" class="form-control" title="전화번호1">
                                    <option value="">선택</option>
                                    @foreach($arr_tel1_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                - <input type="number" id="receiver_tel2" name="receiver_tel2" class="form-control" maxlength="4" title="전화번호2" value="" style="width: 120px">
                                - <input type="number" id="receiver_tel3" name="receiver_tel3" class="form-control" maxlength="4" title="전화번호3" value="" style="width: 120px">
                                <input type="hidden" id="receiver_tel" name="receiver_tel" class="optional" pattern="tel" title="전화번호" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">배송시 요청사항
                            </label>
                            <div class="col-md-9">
                                <input type="text" id="delivery_memo" name="delivery_memo" class="form-control" title="배송시 요청사항" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">배송료 <span class="required">*</span>
                            </label>
                            <div class="col-md-10 form-inline item">
                                <input type="number" id="delivery_price" name="delivery_price" class="form-control" required="required_if:prod_type,book" title="배송료" value="0" style="width: 120px;"> 원
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">배송료입금정보
                            </label>
                            <div class="col-md-9">
                                <input type="text" id="order_memo" name="order_memo" class="form-control" title="배송료입금정보" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">유료결제등록하기</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <script src="/public/js/lms/search_member.js"></script>
    <script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
    <script src="/public/js/post_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 유료결제 등록
            $regi_form.submit(function() {
                // 상품코드에 상품타입과 학습형태 추가
                $regi_form.find('input[name="prod_code[]"]').each(function(idx) {
                    $(this).val($(this).val() + ':' + $(this).data('prod-type') + ':' + $(this).data('learn-pattern-ccd'));
                });

                var _url = '{{ site_url('/pay/adminPay/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        goList();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            var addValidate = function() {
                if ($regi_form.find('input[name="real_pay_price"]').val() > $regi_form.find('input[name="real_pay_price"]').data('real-sale-price')) {
                    alert('결제금액은 판매금액을 초과하여 입력하실 수 없습니다.');
                    return false;
                }
                if ($regi_form.find('input[name="mem_idx[]"]').length < 1) {
                    alert('등록할 회원을 선택해 주세요.');
                    return false;
                }
                if ($regi_form.find('input[name="prod_type"]:checked').val() === 'book' && $regi_form.find('input[name="mem_idx[]"]').length > 1) {
                    alert('해당 상품구분은 1명의 회원만 등록 가능합니다.');
                    return false;
                }
                if ($regi_form.find('input[name="prod_code[]"]').length !== 1) {
                    alert('등록할 상품을 1건만 선택해 주세요.');
                    return false;
                }
                if ($regi_form.find('input[name="is_lec_unit"]:checked').val() === 'Y' && $regi_form.find('input[name="wUnitCode[]"]').length < 1) {
                    alert('등록할 회차를 선택해 주세요.');
                    return false;
                }

                if (!confirm('해당 상품을 유료 결제로 등록하시겠습니까?')) {
                    return false;
                }

                return true;
            };

            // 상품구분 선택
            $regi_form.on('ifChecked', 'input[name="prod_type"]', function() {
                var prod_type = $(this).val();
                var delivery_address = $('#delivery_address');
                var lecture_info = $('#lecture_info');

                // 온라인강좌 등록구분, 수강 정보
                if (prod_type === 'on_lecture') {
                    $regi_form.find('input[name="is_lec_unit"]').iCheck('enable');
                    $regi_form.find('input[name="is_lec_unit"]:eq(0)').prop('checked', true).iCheck('update');
                    $regi_form.find('input[name="lec_start_date"]').prop('disabled', false);
                    $regi_form.find('input[name="lec_expire_day"]').prop('disabled', false);
                    lecture_info.removeClass('hide');
                } else {
                    $regi_form.find('input[name="is_lec_unit"]').prop('checked', false).iCheck('update');
                    $regi_form.find('input[name="is_lec_unit"]').iCheck('disable');
                    $regi_form.find('input[name="lec_start_date"]').prop('disabled', true);
                    $regi_form.find('input[name="lec_expire_day"]').prop('disabled', true);
                    lecture_info.addClass('hide');
                }

                // 회원 검색, 배송지 정보
                if (prod_type === 'book') {
                    $regi_form.find('button[name="btn_member_search"]').data('result-type', 'single');
                    $regi_form.find('#search_mem_type_2').iCheck('disable');
                    $regi_form.find('#search_mem_type_1').iCheck('check');
                    $regi_form.find('#selected_member').html('');  // 기존 등록한 회원 초기화
                    delivery_address.removeClass('hide');
                } else {
                    $regi_form.find('button[name="btn_member_search"]').data('result-type', 'multiple');
                    $regi_form.find('#search_mem_type_2').iCheck('enable');
                    delivery_address.addClass('hide');
                }

                $('#selected_product').html('');    // 기 선택 상품 초기화
            });

            // 온라인강좌 강좌/회차 등록 선택
            $regi_form.on('ifChanged', 'input[name="is_lec_unit"]', function() {
                var is_lec_unit = $(this).filter(':checked').val() || 'N';
                var lec_unit_search = $('#lec_unit_search');

                if (is_lec_unit === 'Y') {
                    lec_unit_search.removeClass('hide');
                } else {
                    lec_unit_search.addClass('hide');
                }

                $('#sampleList').html('');    // 기 선택 회차 초기화
            });

            // 상품검색 버튼 클릭
            $('#btn_product_search').on('click', function() {
                var prod_type = $regi_form.find('input[name="prod_type"]:checked').val();
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return false;
                }

                if (prod_type === 'book') {
                    // 교재 검색
                    $('#btn_product_search').setLayer({
                        'url' : '{{ site_url('/common/searchBook/') }}?site_code=' + site_code + '&return_type=inline&target_id=selected_product&target_field=prod_code&is_event=Y',
                        'width' : 1200
                    });
                } else {
                    // 강좌 검색
                    prod_type = prod_type.replace('_lecture', '');

                    $('#btn_product_search').setLayer({
                        'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&prod_type='+prod_type+'&return_type=inline&target_id=selected_product&target_field=prod_code&is_event=Y',
                        'width' : 1200
                    });
                }

                $('#selected_product').html('');    // 기 선택 상품 초기화
            });

            // 상품선택 결과 이벤트 (1건만 선택 가능)
            $regi_form.on('change', '#selected_product', function() {
                if ($(this).find('input[name="prod_code[]"]').length > 1) {
                    alert('등록할 상품을 1건만 선택해 주세요.');
                    $(this).html('');
                }

                // 해당 상품의 판매금액을 결제금액으로 설정
                var real_sale_price = $(this).find('input[name="prod_code[]"]:eq(0)').data('real-sale-price');
                $regi_form.find('input[name="real_pay_price"]').val(real_sale_price);
                $regi_form.find('input[name="real_pay_price"]').data('real-sale-price', real_sale_price);
            });

            // 회차 검색
            $('#btn_lecture_unit_search').on('click', function () {
                var w_lec_idx = $regi_form.find('input[name="prod_code[]"]:eq(0)').data('w-lec-idx') || '';
                if (w_lec_idx === '') {
                    alert('온라인 단강좌 상품을 선택 후 회차 검색을 해 주세요.');
                    return false;
                }

                $('#btn_lecture_unit_search').setLayer({
                    'url': '{{ site_url('common/searchWMasterLecture/unit/') }}' + w_lec_idx
                    , 'width': 1200
                });
            });

            // 상품 삭제
            $regi_form.on('click', '.selected-product-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 교재상품일 경우 배송정보 셋팅
            $regi_form.on('change', 'input[name="mem_idx[]"]:eq(0)', function() {
                if ($regi_form.find('input[name="prod_type"]:checked').val() === 'book') {
                    setDeliveryInfo('M');
                }
            });

            // 배송지 정보 선택 (회원 기본정보 / 직접 입력)
            $regi_form.on('ifChecked', 'input[name="addr_type"]', function() {
                var addr_type = $(this).val();
                setDeliveryInfo(addr_type);
            });

            // 회원정보 배송정보 셋팅
            var setDeliveryInfo = function(addr_type) {
                if (addr_type === 'M') {
                    var mem_data = $regi_form.find('input[name="mem_idx[]"]:eq(0)').data('result-data') || '';

                    if (mem_data !== '') {
                        $regi_form.find('input[name="receiver"]').val(mem_data.MemName);
                        $regi_form.find('input[name="zipcode"]').val(mem_data.ZipCode);
                        $regi_form.find('input[name="addr1"]').val(mem_data.Addr1);
                        $regi_form.find('input[name="addr2"]').val(mem_data.Addr2);
                        $regi_form.find('input[name="receiver_phone"]').val(mem_data.Phone);
                        $regi_form.find('select[name="receiver_phone1"]').val(mem_data.Phone1);
                        $regi_form.find('input[name="receiver_phone2"]').val(mem_data.Phone2);
                        $regi_form.find('input[name="receiver_phone3"]').val(mem_data.Phone3);
                        $regi_form.find('input[name="receiver_tel"]').val(mem_data.Tel);
                        $regi_form.find('select[name="receiver_tel1"]').val(mem_data.Tel1);
                        $regi_form.find('input[name="receiver_tel2"]').val(mem_data.Tel2);
                        $regi_form.find('input[name="receiver_tel3"]').val(mem_data.Tel3);
                    }
                } else {
                    $regi_form.find('input[name="receiver"]').val('');
                    $regi_form.find('input[name="zipcode"]').val('');
                    $regi_form.find('input[name="addr1"]').val('');
                    $regi_form.find('input[name="addr2"]').val('');
                    $regi_form.find('input[name="receiver_phone"]').val('');
                    $regi_form.find('select[name="receiver_phone1"]').val('');
                    $regi_form.find('input[name="receiver_phone2"]').val('');
                    $regi_form.find('input[name="receiver_phone3"]').val('');
                    $regi_form.find('input[name="receiver_tel"]').val('');
                    $regi_form.find('select[name="receiver_tel1"]').val('');
                    $regi_form.find('input[name="receiver_tel2"]').val('');
                    $regi_form.find('input[name="receiver_tel3"]').val('');
                }
            };

            // 목록 이동
            $('#btn_list').click(function() {
                goList();
            });

            var goList = function() {
                location.replace('{{ site_url('/pay/adminPay/index') }}' + getQueryString());
            };
        });

        // 회차 삭제
        function rowDelete(strRow) {
            $('#'+strRow).remove();
        }
    </script>
@stop
