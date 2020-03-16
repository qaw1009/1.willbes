@extends('lcms.layouts.master')

@section('content')
    <h5>- 관리자가 종합반 수강접수를 진행하는 메뉴입니다. (종합반 유형이 ‘일반형’,’선택형(강사배정)’)인 경우만 해당)</h5>
    <div class="x_panel">
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="order_idx" value="{{ $idx }}"/>
                <input type="hidden" name="unpaid_idx" value="{{ $unpaid_idx or '' }}"/>
                <input type="hidden" name="mem_idx" value="{{ $data['mem']['MemIdx'] or '' }}" data-result-data=""/>
                <input type="hidden" id="search_site_code" name="search_site_code" value="{{ $def_site_code }}"/>
                @if(isset($data['mem']) === false)
                    <div class="row">
                        <label class="control-label col-md-1" for="search_mem_id">· 회원검색</label>
                        <div class="col-md-8 form-inline">
                            <input type="text" id="search_mem_id" name="search_mem_id" class="form-control input-sm" title="회원검색어" value="">
                            <button type="button" name="btn_member_search" data-result-type="single" class="btn btn-primary btn-sm mb-0 ml-5">회원검색</button>
                            <p class="form-control-static ml-20">이름, 아이디, 휴대폰번호 검색 가능</p>
                        </div>
                    </div>
                    <div class="ln_solid bdt-line mt-10 mb-20"></div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>회원정보</strong></h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-sm btn-primary mr-10 btn-message btn-target-crm-member" data-mem-idx="{{ $data['mem']['MemIdx'] or '' }}">쪽지발송</button>
                        <button type="button" class="btn btn-sm btn-primary mr-10 btn-sms btn-target-crm-member" data-mem-idx="{{ $data['mem']['MemIdx'] or '' }}">SMS발송</button>
                        <button type="button" class="btn btn-sm bg-dark mr-0 btn-auto-login btn-target-crm-member" data-mem-idx="{{ $data['mem']['MemIdx'] or '' }}">자동로그인</button>
                    </div>
                    <div class="col-md-12">
                        <table id="list_mem_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>회원번호</th>
                                <th>회원가입일</th>
                                <th>회원명 (성별)</th>
                                <th>아이디</th>
                                <th>휴대폰번호 (수신여부)</th>
                                <th>E-mail주소 (수신여부)</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if(isset($data['mem']) === true)
                                        <td>{{ $data['mem']['MemIdx'] }} ({{ $data['mem']['SiteName'] }})</td>
                                        <td>{{ $data['mem']['JoinDate'] }}</td>
                                        <td>{{ $data['mem']['MemName'] }} ({{ $data['mem']['Sex'] == 'M' ? '남' : '여' }})</td>
                                        <td>{{ $data['mem']['MemId'] }}</td>
                                        <td>{{ $data['mem']['Phone'] }} ({{ $data['mem']['SmsRcvStatus'] }})</td>
                                        <td>{{ $data['mem']['Mail'] }} ({{ $data['mem']['MailRcvStatus'] }})</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ln_solid mt-5"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>상품결제정보</strong></h4>
                    </div>
                    <div class="col-md-6 text-right form-inline item">
                        @if(empty($data['prod']['SiteCode']) === false)
                            <input type="hidden" name="site_code" value="{{ $data['prod']['SiteCode'] }}"/>
                        @else
                            {!! html_site_select('', 'site_code', 'site_code', 'form-control input-sm', '운영 사이트', 'required', '', false, $arr_site_code) !!}
                            <button type="button" id="btn_product_search" class="btn btn-sm btn-primary mb-0 ml-5">상품검색</button>
                            <span id="selected_product" class="hide"></span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <table id="list_pay_info_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>캠퍼스</th>
                                <th width="390">상품명</th>
                                <th>주문금액</th>
                                <th>할인율</th>
                                <th>할인사유</th>
                                <th>총주문금액</th>
                                <th>삭제</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            @if(empty($data['prod']) === false)
                                <td>{{ $data['prod']['CampusCcdName'] }}</td>
                                <td>{{ $data['prod']['ProdAddInfo'] }}
                                    <div class="blue inline-block">[{{ $data['prod']['LearnPatternCcdName'] }}]</div>
                                    {{ $data['prod']['ProdName'] }}
                                    <input type="hidden" name="prod_code" value="{{ $data['prod']['ProdCode'] }}:{{ $data['prod']['ProdTypeCcd'] }}:{{ $data['prod']['LearnPatternCcd'] }}"/>
                                    <input type="hidden" name="order_prod_idx" value="{{ $data['prod']['OrderProdIdx'] or '' }}"/>
                                </td>
                                <td>
                                    <input type="number" name="order_price" class="form-control input-sm" title="주문금액" value="{{ $data['prod']['OrgOrderPrice'] }}" readonly="readonly">
                                </td>
                                <td class="form-inline">
                                    <select class="form-control input-sm set-pay-price" name="disc_type" @if($method == 'POST') readonly="readonly" @endif>
                                        @if($method == 'PUT')
                                            <option value="R">%</option>
                                            <option value="P">원</option>
                                        @else
                                            <option value="{{ $data['prod']['DiscType'] }}">{{ $data['prod']['DiscType'] == 'R' ? '%' : '원' }}</option>
                                        @endif
                                    </select>
                                    <input type="number" name="disc_rate" class="form-control input-sm set-pay-price" title="할인율" value="{{ $data['prod']['DiscRate'] or '0' }}" style="width: 160px;" @if($method == 'POST') readonly="readonly" @endif>
                                </td>
                                <td>
                                    <input type="text" name="disc_reason" class="form-control input-sm" title="할인사유" value="{{ $data['prod']['DiscReason'] or '' }}" @if($method == 'POST') readonly="readonly" @endif>
                                </td>
                                <td>
                                    <input type="number" name="org_pay_price" class="form-control input-sm" title="총주문금액" value="{{ $data['prod']['OrgPayPrice'] }}" readonly="readonly">
                                </td>
                                <td></td>
                            @else
                                <td colspan="7"></td>
                            @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ln_solid mt-5"></div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="fa-ul mb-0">
                            <li><i class="fa-li fa fa-check-square-o"></i>‘일반형’, ’선택형(강사배정)’ 종합반만 관리자가 수기로 수강접수 가능하며, 프론트에서 접수대기로 신청한 ‘선택형(강사배정)’ 종합반의 경우도 수강접수 가능합니다.</li>
                            <li><i class="fa-li fa fa-check-square-o"></i>프론트에서 접수대기로 신청한 ‘일반형’, ’선택형’ 종합반은 [일반]수강접수 메뉴에서만 확인 및 수강접수 가능합니다.</li>
                        </ul>
                    </div>
                </div>
                <div class="ln_solid mt-15"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>상품결제처리</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group bdt-line bg-odd bold">
                            <label class="control-label col-md-1 pt-10 pl-20">결제수단</label>
                            <div class="col-md-9 form-inline">
                                <input type="radio" id="pay_method_card" name="pay_method_ccd" class="flat" value="{{ $chk_pay_method_ccd['visit_card'] }}" title="카드" disabled="disabled"/> <label class="input-label">카드</label>
                                <input type="radio" id="pay_method_cash" name="pay_method_ccd" class="flat" value="{{ $chk_pay_method_ccd['visit_cash'] }}" title="현금" disabled="disabled"/> <label class="input-label">현금</label>
                                <input type="radio" id="pay_method_willbes_bank" name="pay_method_ccd" class="flat" value="{{ $chk_pay_method_ccd['willbes_bank'] }}" title="윌비스계좌이체" disabled="disabled"/> <label class="input-label">윌비스계좌이체</label>
                                <input type="radio" id="pay_method_card_cash" name="pay_method_ccd" class="flat" value="{{ $chk_pay_method_ccd['visit_card_cash'] }}" title="카드+현금" disabled="disabled"/> <label class="input-label">카드+현금</label>
                                <input type="radio" id="pay_method_zero" name="pay_method_ccd" class="flat" value="{{ $chk_pay_method_ccd['visit_zero'] }}" title="0원결제" checked="checked"/> <label class="input-label mr-50">0원결제</label>
                                [카드선택]
                                <select class="form-control input-sm ml-5" name="card_ccd" disabled="disabled" title="카드선택">
                                    <option value="">카드선택</option>
                                    @foreach($arr_card_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group bg-odd bold">
                            <label class="control-label col-md-1 pl-20">결제금액</label>
                            <div class="col-md-9 form-inline">
                                <div class="inline-block valign-top mt-5">[카드]</div>
                                <div class="inline-block">
                                    <input type="number" name="card_pay_price" class="form-control input-sm ml-10 mr-10 set-sum-price" title="최종 카드결제금액" value="0">
                                    <div class="mt-5 ml-10">
                                        <label><input type="checkbox" name="is_all_card_pay_price" class="flat" value="card"/> 전액적용</label>
                                    </div>
                                </div>
                                <div class="inline-block valign-top mt-5">+ [현금]</div>
                                <div class="inline-block">
                                    <input type="number" name="cash_pay_price" class="form-control input-sm ml-10 mr-10 set-sum-price" title="최종 현금결제금액" value="0">
                                    <div class="mt-5 ml-10">
                                        <label><input type="checkbox" name="is_all_cash_pay_price" class="flat" value="cash"/> 전액적용</label>
                                    </div>
                                </div>
                                <div class="inline-block valign-top">
                                    = <input type="number" name="real_pay_price" class="form-control input-sm ml-10" title="최종 실결제금액" value="0" readonly="readonly"> 원
                                    <br/>
                                </div>
                            </div>
                        </div>
                        @if($method == 'POST')
                            <div class="form-group">
                                <label class="control-label col-md-1 pl-20">메모</label>
                                <div class="col-md-7">
                                    <textarea id="order_memo" name="order_memo" class="form-control" rows="2" title="메모"></textarea>
                                </div>
                            </div>
                        @endif
                        @if($is_unpaid === false)
                            <div class="form-group">
                                <label class="control-label col-md-1 pl-20">종합반수강번호</label>
                                <div class="col-md-7">
                                    <input type="text" name="pack_cert_no" class="form-control input-sm" title="종합반수강번호" value="" style="width: 140px;"/>
                                </div>
                            </div>
                        @endif
                        <div class="form-group pt-5 pb-5">
                            <div class="col-md-12 form-inline">
                                <input type="checkbox" id="is_unpaid" name="is_unpaid" class="flat" value="Y" {!! $is_unpaid === true ? 'checked="checked"' : '' !!} title="미수금액납부여부"/> <label for="is_unpaid" class="input-label">미수금액 납부 여부</label>
                            </div>
                        </div>
                        <div id="unpaid_form" class="form-group hide">
                            <div class="col-md-12">
                                <div class="form-control-static">
                                    <strong class="mr-20">[미수금액]</strong>
                                    @if($is_unpaid === true)
                                        <span id="calc_org_pay_price">{{ number_format($data['prod']['OrgPayPrice']) }}</span>원(총주문금액) -
                                        (<span id="calc_real_pay_price">0</span>원(결제금액) +
                                        {{ number_format($data['prod']['tRealPayPrice']) }}원(총기결제금액) -
                                        {{ number_format($data['prod']['tRefundPrice']) }}원(총기환불금액)) =
                                        <strong class="red"><span id="calc_unpaid_price">{{ number_format($data['prod']['tRealUnPaidPrice']) }}</span>원</strong>
                                    @else
                                        <span id="calc_org_pay_price">{{ empty($data['prod']) === false ? number_format($data['prod']['OrgPayPrice']) : 0 }}</span>원(총주문금액) -
                                        (<span id="calc_real_pay_price">0</span>원(결제금액) +
                                        0원(총기결제금액) -
                                        0원(총기환불금액)) =
                                        <strong class="red"><span id="calc_unpaid_price">{{ empty($data['prod']) === false ? number_format($data['prod']['OrgPayPrice']) : 0 }}</span>원</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 form-inline mt-5">
                                <strong class="mr-50">[비고]</strong>
                                <input type="text" name="unpaid_memo" class="form-control input-sm" title="비고" value="" style="width: 540px;">
                            </div>
                            @if($is_unpaid === true)
                                <div class="col-md-12 mt-20">
                                    <table id="list_unpaid_info_table" class="table table-bordered">
                                        <thead>
                                        <tr class="bg-odd">
                                            <th>No</th>
                                            <th>결제일</th>
                                            <th>결제금액</th>
                                            <th>환불금액</th>
                                            <th>미납금액</th>
                                            <th>주문번호</th>
                                            <th>비고</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="7" class="bg-odd text-center">
                                                    <h4 class="inline-block no-margin">
                                                        [총 기결제금액] <span class="blue">{{ number_format($data['prod']['tRealPayPrice']) }}원</span> |
                                                        [총 기환불금액] <span class="red">{{ number_format($data['prod']['tRefundPrice']) }}원</span> |
                                                        [총 미납금액] <span class="red">{{ number_format($data['prod']['tRealUnPaidPrice']) }}원</span>
                                                    </h4>
                                                </td>
                                            </tr>
                                        @foreach($data['list'] as $row)
                                            <tr>
                                                <td>{{ $loop->remaining }}</td>
                                                <td>{{ $row['CompleteDatm'] }}</td>
                                                <td>{{ number_format($row['RealPayPrice']) }}</td>
                                                <td>{{ number_format($row['RefundPrice']) }}</td>
                                                <td>{{ number_format($row['RealUnPaidPrice']) }}</td>
                                                <td><a href="{{ site_url('/pay/offVisitPackage/show/' . $row['OrderIdx']) }}" class="blue" target="_blank"><u>{{ $row['OrderNo'] }}</u></a></td>
                                                <td>{{ $row['UnPaidMemo'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        <div class="text-center mt-20">
                            <button type="submit" name="btn_visit_order" class="btn btn-success">수강등록하기</button>
                            <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                        </div>
                    </div>
                </div>
            </form>
            @if($method == 'PUT')
                <div class="ln_solid mt-5"></div>
                <div class="row">
                    {{-- 주문 메모 --}}
                    @include('lms.pay.order.order_memo_partial')
                </div>
            @endif
            <div class="ln_solid mt-15"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mb-0"><strong>[종합반] 학원방문수강접수 전체내역</strong></h4>
                </div>
                <div class="col-md-12">
                    {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
                </div>
                <div class="col-md-12">
                    <table id="list_order_detail_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th class="rowspan">주문번호</th>
                            <th class="rowspan">결제채널</th>
                            <th class="rowspan">결제루트</th>
                            <th class="rowspan">결제수단</th>
                            <th class="rowspan">결제완료일 (접수신청일)</th>
                            <th class="rowspan">총 실결제금액</th>
                            <th>상품구분</th>
                            <th>캠퍼스</th>
                            <th>상품명</th>
                            <th>실결제금액</th>
                            <th>결제상태</th>
                            <th class="rowspan">등록자</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="/public/js/lms/search_member.js"></script>
    <script type="text/javascript">
        var $datatable;
        var $regi_form = $('#regi_form');
        var $list_table = $('#list_order_detail_table');

        $(document).ready(function() {
            // 수강등록하기 버튼 클릭
            $regi_form.submit(function() {
                var _url = '{{ site_url('/pay/offVisitPackage/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        goList();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            var addValidate = function() {
                if ($regi_form.find('[name="prod_code"]').length < 1) {
                    alert('상품을 선택해 주세요.');
                    return false;
                }

                if ($regi_form.find('[name="mem_idx"]').val().length < 1) {
                    alert('회원을 선택해 주세요.');
                    return false;
                }

                if ($regi_form.find('[name="pay_method_ccd"]:checked').length < 1) {
                    alert('결제수단을 선택해 주세요.');
                    return false;
                }

                if ($regi_form.find('[name="real_pay_price"]').val() > 0) {
                    if ($regi_form.find('[id="pay_method_zero"]:checked').length > 0) {
                        alert('0원이 초과되는 결제금액은 결제수단을 0원결제로 선택하실 수 없습니다.');
                        return false;
                    }
                } else {
                    if ($regi_form.find('[id="pay_method_zero"]:checked').length < 1) {
                        alert('결제수단을 0원결제로 선택하셔야 합니다.');
                        return false;
                    }
                }

                if ($regi_form.find('[name="pay_method_ccd"]:checked').prop('id').indexOf('_card') > -1 && $regi_form.find('[name="card_ccd"]').val() === '') {
                    alert('결제카드를 선택해 주세요.');
                    return false;
                }

                // 미수금액납부여부 체크
                if ($regi_form.find('[name="unpaid_idx"]').val().length > 0 && $regi_form.find('[name="is_unpaid"]:checked').length < 1) {
                    alert('미수금액 납부 여부를 선택해 주세요.');
                    return false;
                }

                // 총 결제금액 확인
                if ($regi_form.find('[name="is_unpaid"]:checked').length < 1) {
                    if ($regi_form.find('[name="org_pay_price"]').val() !== $regi_form.find('[name="real_pay_price"]').val()) {
                        alert('총 주문금액과 총 카드+현금결제금액이 일치하지 않습니다.');
                        return false;
                    }
                } else {
                    if (parseInt($regi_form.find('[name="org_pay_price"]').val(), 10) <= parseInt($regi_form.find('[name="real_pay_price"]').val(), 10)) {
                        alert('총 카드+현금결제금액은 총 주문금액보다 작아야 합니다.');
                        return false;
                    }
                }

                return confirm('해당 상품을 수강 등록하시겠습니까?');
            };

            // 회원선택 결과 이벤트
            $regi_form.on('change', 'input[name="mem_idx"]', function() {
                // 회원정보 셋팅
                var mem_data = $(this).data('result-data');
                var $mem_table_td = $('#list_mem_table tbody tr td');

                $mem_table_td.eq(0).html(mem_data.MemIdx + ' (' + mem_data.SiteName + ')');
                $mem_table_td.eq(1).html(mem_data.JoinDate);
                $mem_table_td.eq(2).html(mem_data.MemName + ' (' + (mem_data.Sex === 'M' ? '남' : '여') + ')');
                $mem_table_td.eq(3).html(mem_data.MemId);
                $mem_table_td.eq(4).html(mem_data.Phone + ' (' + mem_data.SmsRcvStatus + ')');
                $mem_table_td.eq(5).html(mem_data.Mail + ' (' + mem_data.MailRcvStatus + ')');

                $('.btn-target-crm-member').data('mem-idx', mem_data.MemIdx);
                $regi_form.find('input[name="search_mem_id"]').val('');

                // 방문수강접수 목록
                $datatable.draw();
            });

            // 상품검색 버튼 클릭
            $('#btn_product_search').on('click', function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return false;
                }

                if ($regi_form.find('[name="mem_idx"]').val().length < 1) {
                    alert('회원을 먼저 선택해 주세요.');
                    return false;
                }

                $('#btn_product_search').setLayer({
                    'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&prod_type=off&return_type=inline&target_id=selected_product&target_field=prod_code'
                        + '&prod_tabs=off&hide_tabs=off_lecture,off_pack_lecture&is_event=Y&is_single=Y&LearnPatternCcd={{ $search_learn_pattern_ccd }}',
                    'width' : 1400
                });
            });

            // 상품선택 결과 이벤트
            $regi_form.on('change', '#selected_product', function() {
                var $tbody = $('#list_pay_info_table tbody');
                var code, data, html = '', prod_code = 0;

                $(this).find('input[name="prod_code[]"]').each(function(idx) {
                    code = $(this).val();
                    data = $(this).data();

                    html += '<tr>\n' +
                        '    <td>' + data.campusCcdName + '</td>\n' +
                        '    <td>' + (typeof(data.cateName) !== 'undefined' ? data.cateName : '') +
                        '    ' + (typeof(data.studyPatternCcdName) !== 'undefined' && data.studyPatternCcdName !== '' ? ' | ' + data.studyPatternCcdName : '') +
                        '    ' + '<div class="blue inline-block">[' + (data.learnPatternCcdName !== '' ? data.learnPatternCcdName : data.prodTypeCcdName) + ']</div> ' + Base64.decode(data.prodName) +
                        '    ' + '<input type="hidden" name="prod_code" value="' + code + ':' + data.prodType + ':' + data.learnPatternCcd + '"/>\n' +
                        '    </td>\n' +
                        '    <td>\n' +
                        '        <input type="number" name="order_price" class="form-control input-sm" title="주문금액" value="' + data.realSalePrice + '" readonly="readonly">\n' +
                        '    </td>\n' +
                        '    <td class="form-inline">\n' +
                        '        <select class="form-control input-sm set-pay-price" name="disc_type">\n' +
                        '            <option value="R">%</option>\n' +
                        '            <option value="P">원</option>\n' +
                        '        </select>\n' +
                        '        <input type="number" name="disc_rate" class="form-control input-sm set-pay-price" title="할인율" value="0" style="width: 160px;">\n' +
                        '    </td>\n' +
                        '    <td>\n' +
                        '        <input type="text" name="disc_reason" class="form-control input-sm" title="할인사유" value="">\n' +
                        '    </td>\n' +
                        '    <td>\n' +
                        '        <input type="number" name="org_pay_price" class="form-control input-sm" title="총주문금액" value="' + data.realSalePrice + '" readonly="readonly">\n' +
                        '    </td>\n' +
                        '    <td>\n' +
                        '        <a href="#none" data-prod-code="' + code + '" class="selected-product-delete"><i class="fa fa-times red"></i></a>\n' +
                        '    </td>\n' +
                        '</tr>';

                    // 1번째 상품만 적용
                    if (idx === 0) {
                        prod_code = code;
                        return false;
                    }
                });

                // 미수금주문여부 체크
                if (checkUnPaidOrder(prod_code) === false) {
                    return;
                }

                $(this).html('');    // 기 선택 상품 초기화
                $tbody.html(html);
                setTotalPrice('Y');   // 결제금액 재계산
            });

            // 미수금주문여부 체크
            var checkUnPaidOrder = function(prod_code) {
                var unpaid_idx = null;
                var order_idx = null;
                var mem_idx = $regi_form.find('input[name="mem_idx"]').val();

                if (prod_code.length < 1 || mem_idx.length < 1) {
                    alert('필수 파라미터 오류입니다.');
                    return false;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'prod_code' : prod_code,
                    'mem_idx' : mem_idx
                };
                sendAjax('{{ site_url('/pay/offVisitPackage/checkUnPaidOrder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        unpaid_idx = ret.ret_data.unpaid_idx;
                        order_idx = ret.ret_data.order_idx;
                    }
                }, showValidateError, false, 'POST');

                if (unpaid_idx !== null && unpaid_idx !== '') {
                    alert('미수금 주문내역이 존재합니다.');
                    location.replace('{{ site_url('/pay/offVisitPackage/create') }}/' + order_idx + '/' + unpaid_idx + '/' + prod_code + '/' + mem_idx + getQueryString());
                }

                return true;
            };

            // 선택상품 삭제 (상품결제정보 테이블 row 삭제)
            $regi_form.on('click', '.selected-product-delete', function() {
                var that = $(this);
                that.parent().parent().remove();

                setTotalPrice('Y');   // 결제금액 재계산
            });

            // 할인구분, 할인율 변경할 경우 결제금액 계산 및 셋팅
            $regi_form.on('change', '.set-pay-price', function() {
                var order_price = parseInt($regi_form.find('[name="order_price"]').val(), 10);
                var disc_type = $regi_form.find('[name="disc_type"]').val();
                var disc_rate = parseInt($regi_form.find('[name="disc_rate"]').val(), 10) || 0;
                var real_pay_price = 0;

                if (disc_rate < 0) {
                    alert('할인율은 0 이상의 숫자여야만 합니다.');
                    return;
                }

                // 할인율 적용
                if (disc_type === 'R') {
                    real_pay_price = order_price * ((100 - disc_rate) / 100);
                    real_pay_price = Math.ceil(real_pay_price); // 소숫점 올림
                } else {
                    real_pay_price = order_price - disc_rate;
                }

                // 결제금액(총주문금액) 셋팅
                $regi_form.find('[name="org_pay_price"]').val(real_pay_price);

                setTotalPrice('Y');   // 결제금액 재계산
            });

            // 카드, 현금금액 변경할 경우 결제금액 재계산
            $regi_form.on('change', '.set-sum-price', function() {
                setTotalPrice('N');
            });

            // 결제, 카드, 현금금액 합산 및 결제수단 셋팅
            var setTotalPrice = function(is_init) {
                var card_pay_price = 0, cash_pay_price = 0, real_pay_price = 0, unpaid_price = 0;
                var org_pay_price = parseInt($regi_form.find('[name="org_pay_price"]').val(), 10) || 0;

                if (is_init === 'Y') {
                    $regi_form.find('[name="card_pay_price"]').val('0');
                    $regi_form.find('[name="cash_pay_price"]').val('0');
                    $regi_form.find('[name="real_pay_price"]').val('0');
                    $('#calc_org_pay_price').text(addComma(org_pay_price));    // 미수금액영역 총주문금액 설정
                    $('#calc_unpaid_price').text(addComma(org_pay_price));  // 미수금액영역 미수금액 설정
                } else {
                    // 최종 카드, 현금금액 변경
                    card_pay_price = parseInt($regi_form.find('[name="card_pay_price"]').val(), 10) || 0;
                    cash_pay_price = parseInt($regi_form.find('[name="cash_pay_price"]').val(), 10) || 0;
                    real_pay_price = card_pay_price + cash_pay_price;
                    $regi_form.find('[name="real_pay_price"]').val(real_pay_price);
                    $('#calc_real_pay_price').text(addComma(real_pay_price));    // 미수금액영역 결제금액 설정

                    // 미수금액영역 미수금액 설정
                    @if($is_unpaid === true)
                        unpaid_price = parseInt('{{ $data['prod']['tRealUnPaidPrice'] or 0 }}', 10);
                    @else
                        unpaid_price = org_pay_price;
                    @endif

                    unpaid_price = unpaid_price - real_pay_price;

                    if (unpaid_price < 0) {
                        alert('결제금액이 미수금액보다 큽니다.');
                        // 결제금액 초기화
                        $regi_form.find('[name="card_pay_price"]').val('0');
                        $regi_form.find('[name="cash_pay_price"]').val('0');
                        setTotalPrice('N');
                        return;
                    } else {
                        $('#calc_unpaid_price').text(addComma(unpaid_price));
                    }
                }

                if (real_pay_price > 0) {
                    // 결제수단, 카드사 선택 셋팅
                    $regi_form.find('[name="pay_method_ccd"]').iCheck('disable');

                    if (card_pay_price > 0) {
                        $regi_form.find('[name="card_ccd"]').prop('disabled', false);
                        if (cash_pay_price > 0) {
                            $regi_form.find('[id="pay_method_card_cash"]').iCheck('enable').iCheck('check');
                        } else {
                            $regi_form.find('[id="pay_method_card"]').iCheck('enable').iCheck('check');
                        }
                    } else {
                        if (cash_pay_price > 0) {
                            $regi_form.find('[name="card_ccd"]').prop('disabled', true);
                            $regi_form.find('[id="pay_method_cash"]').iCheck('enable').iCheck('check');
                            $regi_form.find('[id="pay_method_willbes_bank"]').iCheck('enable');
                        }
                    }
                } else {
                    // 0원결제
                    $regi_form.find('[name="card_ccd"]').prop('disabled', true);
                    $regi_form.find('[id="pay_method_zero"]').iCheck('enable').iCheck('check');
                }
            };

            // 미수금액 납부 여부 클릭
            $regi_form.on('ifChanged ifCreated', '[name="is_unpaid"]', function() {
                var unpaid_form = $('#unpaid_form');

                if ($(this).is(':checked') === true) {
                    unpaid_form.removeClass('hide');
                } else {
                    unpaid_form.addClass('hide');
                }
            });

            // 카드/현금 전액적용 체크박스 클릭
            $regi_form.on('ifChanged', 'input[name="is_all_card_pay_price"], input[name="is_all_cash_pay_price"]', function() {
                var input_target = $regi_form.find('[name="' + $(this).val() + '_pay_price' + '"]');
                var input_price = '0';

                if ($(this).prop('checked') === true) {
                    if ($regi_form.find('[name="is_unpaid"]').prop('checked') === true) {
                        input_price = parseInt($regi_form.find('#calc_unpaid_price').text().replace(/,/g, ''), 10);
                    } else {
                        input_price = parseInt($regi_form.find('[name="org_pay_price"]').val(), 10);
                    }
                }

                input_target.val(input_price);
                input_target.trigger('change');
            });

            // [종합반] 방문수강접수 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/pay/offVisitPackage/listAjax') }}?search_type=mem_idx',
                    'type' : 'POST',
                    'beforeSend' : function() {
                        if ($regi_form.find('[name="mem_idx"]').val().length < 1) {
                            $('.dataTables_processing').css('display', 'none');
                            return false;
                        }
                    },
                    'data' : function(data) {
                        return $.extend(arrToJson($regi_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                dom: 'T<"clear">rtip',
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/pay/offVisitPackage/show') }}/' + row.OrderIdx + '" class="blue" target="_blank"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'PayChannelCcdName'},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'CompleteDatm', 'render' : function(data, type, row, meta) {
                        return (data !== null ? data : '') + '<br/>(' + row.OrderDatm + ')';
                    }},
                    {'data' : 'tRealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'ProdTypeCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.SalePatternCcdName !== '' ? '<br/>(' + row.SalePatternCcdName + ')' : '');
                    }},
                    {'data' : 'CampusCcdName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> ' + data;
                    }},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'PayStatusCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.PayStatusCcd === '{{ $chk_pay_status_ccd['refund'] }}' ? '<br/>' + (row.RefundDatm !== null ? row.RefundDatm.substr(0, 10) : '') + '<br/>(' + row.RefundAdminName + ')' : '');
                    }},
                    {'data' : 'RegAdminName'}
                ]
            });

            // 학원방문수강접수 전체내역 사이트 탭 클릭
            $('#tabs_site_code').on('click', 'li > a', function() {
                $regi_form.find('input[name="search_site_code"]').val($(this).data('site-code'));
                $datatable.draw();
            });

            // 목록 이동
            $('#btn_list').click(function() {
                goList();
            });

            var goList = function() {
                location.replace('{{ site_url('/pay/offVisitPackage/index') }}' + getQueryString());
            };
        });
    </script>
@stop
