@extends('willbes.m.layouts.master')

@section('page_title', '결제하기')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <div class="paymentWrap">
        <ul class="paymentTxt NGR">
            <li>강좌시작일 설정은 결제일로부터 30일 범위 내로 설정 가능합니다. (일부 강좌 제외)</li>
            <li>강좌시작일을 설정하지 않은 경우 결제일(무통장입금 결제수단의 경우 가상계좌 신청일)로부터 7일 후 강좌가 자동 시작됩니다.</li>
            <li>개강일이 설정한 강좌시작일 이후 인 경우 해당 강좌시작일은 개강일로 자동 셋팅됩니다.</li>
            <li>배송 상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토,일,공휴일제외)</li>
        </ul>

        <div class="paymentCts">
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="cart_type" value="{{ $results['cart_type'] }}"/>
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                        <tr class="replyList willbes-Open-Table">
                            <td>
                                주문정보
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            {{-- 주문상품 --}}
                            @foreach($results['list'] as $idx => $row)
                                <ul class="payLecList" id="cart_row_{{ $row['CartIdx'] }}">
                                    <li><span>{{ $row['CartProdTypeName'] }}</span></li>
                                    <li>
                                        {{ $row['ProdName'] }}
                                        <input type="hidden" name="cart_idx[]" value="{{ $row['CartIdx'] }}" data-real-sale-price="{{ $row['RealPayPrice'] }}" data-is-point="{{ $row['IsPoint'] }}" data-save-point-price="{{ $row['PointSavePrice'] }}" data-save-point-type="{{ $row['PointSaveType'] }}"/>
                                        <input type="hidden" name="coupon_detail_idx[{{ $row['CartIdx'] }}]" value="" data-cart-idx="{{ $row['CartIdx'] }}" data-coupon-disc-price="0" class="chk_price chk_coupon"/>
                                    </li>
                                    {{-- 교재상품일 경우만 수량 노출 --}}
                                    @if($row['CartProdType'] == 'book')
                                        <li>
                                            <strong>수량</strong>
                                            <span class="tx-blue">{{ $row['ProdQty'] }}</span>
                                        </li>
                                    @endif
                                    {{-- 정가(할인율), 판매형태가 일반일 경우만 노출 (재수강, 수강연장 제외) --}}
                                    @if(ends_with($row['SalePatternCcd'], '001') === true)
                                        <li>
                                            <strong>정가(할인율)</strong>
                                            <span class="tx-blue">{{ number_format($row['SalePrice']) }}원
                                            (↓{{ number_format($row['SaleRate']) . ($row['SaleDiscType'] == 'R' ? '%' : '원') }})</span>
                                        </li>
                                    @endif
                                    <li>
                                        <strong>실 결제금액</strong>
                                        {{-- 쿠폰할인이 적용된 실제 결제금액 --}}
                                        <span class="tx-blue">
                                            <span class="real-pay-price">{{ number_format($row['RealPayPrice']) }}</span>원
                                        </span>
                                        {{-- 판매금액 정보 --}}
                                        <span class="line-through wrap-real-sale-price d_none">
                                            (<span class="real-sale-price">{{ number_format($row['RealPayPrice']) }}</span>원)
                                        </span>
                                    </li>
                                    {{-- 온라인강좌일 경우만 수강기간 노출/강좌시작일 설정 --}}
                                    @if($row['CartType'] == 'on_lecture')
                                        {{-- 수강기간 (연장기간) --}}
                                        @if(empty($row['ExtenDay']) === false)
                                            <li class="NGR"><strong>연장기간</strong> {{ $row['ExtenDay'] }}일</li>
                                        @elseif(empty($row['StudyPeriod']) === false)
                                            <li class="NGR"><strong>수강기간</strong> {{ $row['StudyPeriod'] }}일</li>
                                        @endif
                                        <li class="NGR">
                                            {{-- 강좌시작일지정 여부 : Y, 결제일 이후부터 30일 이내 날짜로 설정 가능, 개강일 전이라면 개강일부터 30일 이내 설정 가능 --}}
                                            {{-- 디폴트 설정 => 시작일자 : 결제일 + 8일, 종료일자 : 시작일자 + 수강기간 --}}
                                            <strong>강좌시작일 설정</strong>
                                            @if($row['IsLecStart'] == 'Y')
                                                <input type="text" name="study_start_date[{{ $row['CartIdx'] }}]" class="datepicker btn-set-study-date" value="{{ $row['DefaultStudyStartDate'] }}" data-cart-idx="{{ $row['CartIdx'] }}" data-study-period="{{ $row['StudyPeriod'] }}" data-is-study-start-date="{{ $row['IsStudyStartDate'] }}" readonly="readonly" placeholder="시작일"/>
                                                ~ <input type="text" name="study_end_date[{{ $row['CartIdx'] }}]" class="bg-gray" value="{{ $row['DefaultStudyEndDate'] }}" readonly="readonly" placeholder="종료일"/>
                                            @else
                                                <span class="tx-blue">
                                                    @if(empty($row['ExtenDay']) === false)
                                                        연장 신청한 강좌의 기본 수강기간이 종료된 후 바로 수강 시작
                                                    @else
                                                        결제완료 후 바로 수강 시작
                                                    @endif
                                                </span>
                                            @endif
                                        </li>
                                    @endif
                                    {{-- 쿠폰사용가능 상품일 경우만 노출 --}}
                                    @if($row['IsCoupon'] == 'Y')
                                        <li>
                                            <a href="#none" class="btn-coupon-apply" data-cart-idx="{{ $row['CartIdx'] }}">쿠폰적용</a>
                                            {{-- 적용쿠폰정보 (쿠폰명, 할인금액) --}}
                                            <span class="wrap-coupon d_none">
                                                <span class="coupon-name"></span>
                                                <span class="tx-blue">(<span class="coupon-disc-price">0</span>원 할인)</span>
                                                <a href="#none" class="btn-coupon-apply-delete delete" data-cart-idx="{{ $row['CartIdx'] }}"><img src="{{ img_url('m/main/close.png') }}"></a>
                                            </span>
                                        </li>
                                    @endif
                                    {{-- 단과할인율 표기 --}}
                                    @if(isset($row['IsLecDisc']) === true && $row['IsLecDisc'] == 'Y')
                                        <li>
                                            <span class="tx-red">{{ $row['LecDiscTitle'] }} (↓{{ $row['LecDiscRate'] }}%)</span>
                                        </li>
                                    @endif
                                </ul>
                            @endforeach
                            {{-- 자동지급 사은품 --}}
                            @if(empty($results['freebie']) === false)
                                @foreach($results['freebie'] as $fb_idx => $fb_row)
                                    <ul class="payLecList">
                                        <li><span>사은품</span></li>
                                        <li>{{ $fb_row['ProdName'] }}</li>
                                    </ul>
                                @endforeach
                            @endif
                            </td>
                        </tr>
                    {{-- 구매자/배송정보 (배송정보여부가 Y일 경우만 노출) --}}
                    @if($results['is_delivery_info'] === true)
                        <tr class="replyList willbes-Open-Table">
                            <td>
                                구매자정보
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left" colspan="2">
                                <ul class="payLecList buyerLecList">
                                    <li><strong>이름</strong> {{ $results['member']['MemName'] }}</li>
                                    <li class="tx12"><strong>휴대폰번호</strong> {{ $results['member']['Phone'] }}</li>
                                    <li><strong>이메일</strong> {{ $results['member']['Mail'] }}</li>
                                    <li class="tx-blue">구매자 정보는 회원가입 시 등록한 정보로 셋팅되며, 수정이 필요한 경우 회원 정보 페이지에서만 가능합니다.</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="replyList willbes-Open-Table">
                            <td>
                                배송정보
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left" colspan="2">
                                <div>
                                    <input type="radio" id="addr_type_e" name="addr_type" value="E" checked="checked"><label for="addr_type_e">구매자 정보와 동일</label>
                                    <input type="radio" id="addr_type_d" name="addr_type" value="D"><label for="addr_type_d">직접입력</label>
                                </div>
                                <div class="delivery">
                                    <a href="#none" id="btn_my_addr_list">배송주소록</a>
                                </div>
                                <div class="buyerInfo">
                                    <table>
                                        <col width="85px"/>
                                        <col width=""/>
                                        <tr>
                                            <th scope="row">이름</th>
                                            <td class="item"><input type="text" id="receiver" name="receiver" value="{{ $results['member']['MemName'] }}" title="이름" required="required" maxlength="30" style="width:120px"/></td>
                                        </tr>
                                        <tr>
                                            <th rowspan="3" scope="row">주소</th>
                                            <td class="item">
                                                <input type="text" id="zipcode" name="zipcode" title="우편번호" required="required" readonly="readonly" class="chk_price bg-gray" maxlength="6" style="width:120px"/>
                                                <a href="#none" id="btn_search_post" class="findaddress">주소찾기</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="item"><input type="text" id="addr1" name="addr1" title="기본주소" required="required" readonly="readonly" class="bg-gray" maxlength="30" style="width:100%"/></td>
                                        </tr>
                                        <tr>
                                            <td class="item"><input type="text" id="addr2" name="addr2" title="상세주소" required="required" maxlength="30" style="width:100%"/></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">휴대폰번호</th>
                                            <td>
                                                <div class="item multi">
                                                    <select id="receiver_phone1" name="receiver_phone1" title="휴대폰번호1" required="required">
                                                        <option value="">선택</option>
                                                        @foreach($arr_phone1_ccd as $key => $val)
                                                            <option value="{{ $key }}">{{ $val }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" id="receiver_phone2" name="receiver_phone2" title="휴대폰번호2" required="required" maxlength="4" style="width:60px"/>
                                                    <input type="text" id="receiver_phone3" name="receiver_phone3" title="휴대폰번소3" required="required" maxlength="4" style="width:60px"/>
                                                    <input type="hidden" id="receiver_phone" name="receiver_phone" title="휴대폰번호" required="required" pattern="phone"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">전화</th>
                                            <td>
                                                <div class="item multi">
                                                    <select id="receiver_tel1" name="receiver_tel1" title="전화번호1">
                                                        <option value="">선택</option>
                                                        @foreach($arr_tel1_ccd as $key => $val)
                                                            <option value="{{ $key }}">{{ $val }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" id="receiver_tel2" name="receiver_tel2" title="전화번호2" maxlength="4" style="width:60px"/>
                                                    <input type="text" id="receiver_tel3" name="receiver_tel3" title="전화번호3" maxlength="4" style="width:60px"/>
                                                    <input type="hidden" id="receiver_tel" name="receiver_tel" title="전화번호" pattern="tel" class="optional"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">배송요청사항</th>
                                            <td><input type="text" id="delivery_memo" name="delivery_memo" maxlength="60" style="width:100%" placeholder="배송 메시지를 입력해주세요."/></td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endif
                    {{-- 온라인강좌 패키지 포함 or 학원강좌일 경우 포인트 사용 불가 --}}
                    @if($results['is_available_use_point'] === true)
                        <tr class="replyList willbes-Open-Table">
                            <td>
                                포인트
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left" colspan="2">
                                <div class="paymentPoint item">
                                    {{ $results['point_type_name'] }} 포인트 [{{ number_format($results['point']) }}P 보유]
                                    <input type="number" name="use_point" title="사용포인트" class="chk_price" required="required" pattern="numeric" data-validate-minmax="0" value="0" maxlength="10" style="width:80px" > P 차감
                                    <a href="#none" id="btn-all-use-point">전액사용</a>
                                </div>
                                <ul class="paymentTxt pd_all_none bd-none">
                                    <li>{{ $results['point_type_name'] }} 포인트는 <span class="tx-blue">{{ number_format(config_item('use_min_point')) }}P</span> 부터 <span class="tx-blue">{{ config_item('use_point_unit') }}P</span> 단위로 사용 가능합니다. </li>
                                    <li>포인트를 사용하여 결제할 경우 포인트가 적립되지 않습니다.</li>
                                    <li>환불 시 사용된 포인트는 복원되지 않고 소멸되며, 적립된 포인트는 회수됩니다.</li>
                                </ul>
                            </td>
                        </tr>
                    @endif
                        <tr class="replyList willbes-Open-Table">
                            <td>
                                총 결제금액
                                <span class="tx-blue f_right"><span class="total-pay-price">{{ number_format($results['total_pay_price']) }}</span>원</span>
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left" colspan="2">
                                <div class="priceBox">
                                    <ul>
                                        <li>
                                            <strong>상품주문금액</strong>
                                            <span>{{ number_format($results['total_prod_order_price']) }}원</span>
                                        </li>
                                        <li>
                                            <strong>쿠폰할인금액</strong>
                                            <span><span id="total_coupon_disc_price">0</span>원</span>
                                        </li>
                                        {{-- 온라인강좌 패키지 포함 or 학원강좌일 경우 포인트 사용 불가 --}}
                                        @if($results['is_available_use_point'] === true)
                                            <li>
                                                <strong>포인트 차감금액</strong>
                                                <span><span id="point_disc_price">0</span>원</span>
                                            </li>
                                        @endif
                                        <li>
                                            <strong>배송료</strong>
                                            <span><span id="delivery_price">{{ number_format($results['delivery_price']) }}</span>원</span>
                                        </li>
                                        <li class="NGEB">
                                            <strong>결제예상금액</strong>
                                            <span class="tx-blue"><span class="total-pay-price">{{ number_format($results['total_pay_price']) }}</span>원</span>
                                            {{-- 학원강좌일 경우 포인트 적립 불가 --}}
                                            @if($results['cart_type'] != 'off_lecture')
                                                <p class="NGR tx14 pt5">
                                                    <strong>적립예정포인트</strong>
                                                    <span class="tx-blue"><span id="total_save_point">{{ number_format($results['total_save_point']) }}</span>원</span>
                                                </p>
                                            @endif
                                        </li>
                                    </ul>
                                    <p id="delivery_add_price_caution_txt" class="mt10"></p>
                                </div>
                            </td>
                        </tr>
                    {{-- 총결제금액이 0원 초과일 경우만 노출 --}}
                    @if($results['total_pay_price'] > 0)
                        <tr class="pay-method replyList willbes-Open-Table">
                            <td>
                                결제수단
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr class="pay-method">
                            <td class="w-data tx-left" colspan="2">
                                <ul class="method">
                                    @foreach($arr_pay_method_ccd as $key => $val)
                                        <li>
                                            <label for="pay_method_ccd_{{ $key }}">
                                                <input type="radio" id="pay_method_ccd_{{ $key }}" name="pay_method_ccd" value="{{ $key }}" class="mr5" @if($loop->index == 1) title="결제수단" required="required" checked="checked" @endif/>
                                                {{ str_replace_array(['(간편결제)', '실시간', '(가상계좌)'], '', $val) }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                <div class="policyInfo">
                    <ul>
                        <li class="tx16">
                            <div class="AllchkBox chk">
                                전체동의
                                <span class="chkBox-Agree">
                                    <input type="checkbox" id="agree_all" name="agree_all" value="Y"/>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="chkBox chk">
                                <p>유의사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span> <span class="MoreBtn tx-center">▼</span></p>
                                <span class="chkBox-Agree item">
                                    <input type="checkbox" id="agree1" name="agree1" value="Y" title="유의사항 안내" required="required"/>
                                </span>
                            </div>
                            <div class="txtBox NGR">
                                {{-- TODO : 임의 등록 --}}
                                <strong>신용카드 결제 시</strong><br/>
                                - 최종 결제승인 이전에 전자결제창을 닫지 마시기 바랍니다.<br/>
                                - 전자금융거래 기본법에 따라 결제금액이 30만원 이상일 경우 전자상거래법에 의해 발급된 공인인증서를 이용하여<br/>
                                본인 확인을 거쳐야 결제를 할 수 있습니다.<br/><br/>
                                <strong>무통장 입금 결제 시</strong><br/>
                                - 주문시마다 새로운 입금계좌번호가 생성됩니다.<br/>
                                - 상품을 나누어 주문하시는 경우 주문별로 생성되는 입금계좌로 각각 입금하여 주십시오.<br/>
                                - 입금기한 내에 입금을 하지 않을 경우, 생성된 입금계좌는 자동으로 사라집니다. 결제를 원할 시, 재주문을 해주시기 바랍니다.<br/>
                                - 수강료 입금 후(15분 이내) 입금 승인처리 되며, 현금 영수증은 입금이 완료 되면 발행됩니다.<br/><br/>
                                <strong>실시간 계좌이체 결제 시</strong><br/>
                                - 인터넷 뱅킹 사용 여부와 상관없이 공인인증서가 있어야 결제가 가능합니다.<br/>
                                - 지정하신 은행계좌에서 결제 금액이 실시간으로 이체되며 결제 승인 후 바로 수강이 가능합니다.<br/>
                                - 현금 영수증은 입금이 완료되면 발행됩니다.<br/>
                            </div>
                        </li>
                        <li>
                            <div class="chkBox chk">
                                <p>개인정보 활용 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span> <span class="MoreBtn tx-center">▼</span></p>
                                <span class="chkBox-Agree item">
                                    <input type="checkbox" id="agree2" name="agree2" value="Y" title="개인정보 활용안내" required="required"/>
                                </span>
                            </div>
                            <div class="txtBox NGR">
                                {{-- TODO : 임의 등록 --}}
                                윌비스는 고객의 개인정보보호를 소중하게 생각하고, 고객의 개인정보를 보호하기 위하여 항상 최선을 다해 노력하고 있습니다.<br/>
                                윌비스는 개인정보보호 관련 주요 법률인「정보통신망 이용촉진 및 정보보호 등에 관한 법률」을 비롯한 모든 개인정보보호 관련 법률을 준수하고 있습니다.<br/>
                                또한, 윌비스는「개인정보처리방침」을 제정하여 이를 준수하고 있으며, 윌비스의「개인정보처리방침」을 홈페이지에 공개하여 고객이 언제나 용이하게 열람할 수 있도록 하고 있습니다.<br/>
                                윌비스의「개인정보처리방침」은 관련 법률 및 지침의 변경 또는 내부 운영 방침의 변경에 따라 변경될 수 있습니다.<br/>
                                윌비스의「개인정보처리방침」이 변경될 경우 변경된 사항을 홈페이지를 통하여 공지합니다.<br/>
                                윌비스 개인정보처리방침은 아래와 같은 내용을 담고 있습니다.<br/><br/>
                                <a href="javascript:;" onclick="popupOpen('{{app_url('/company/protect', 'www')}}', 'protect', '1000', '600', null, null, 'yes');" class="tx-blue">[윌비스 개인정보 취급방침 보기]</a>
                            </div>
                        </li>
                        <li>
                            <div class="chkBox chk">
                                <p>환불정책 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span> <span class="MoreBtn tx-center">▼</span></p>
                                <span class="chkBox-Agree item">
                                    <input type="checkbox" id="agree3" name="agree3" value="Y" title="환불정책 안내" required="required"/>
                                </span>
                            </div>
                            <div class="txtBox NGR">
                                {{-- TODO : 임의 등록 --}}
                                결제수단별 환불정책은 아래와 같습니다.<br/>
                                <br/>
                                <strong>신용카드 결제 시</strong><br/>
                                - 현금 환불은 불가능하며, 카드 취소만 가능합니다.<br/>
                                - 당일 결제 후 당일 취소 시 바로 승인 취소됩니다.<br/>
                                - 당일 결제 후 다음날 취소 시 카드사별로 2~3일 후에 승인 취소됩니다.<br/>
                                <br/>
                                <strong>무통장 입금 결제 시</strong><br/>
                                - 결제자가 제공한 계좌 정보로 환불됩니다.<br/>
                                - 당일 결제 후 당일 환불하였더라도 은행별로 2~3일 후에 환불처리 됩니다.<br/>
                                <br/>
                                <strong>실시간 계좌이체 결제 시</strong><br/>
                                - 결제한 은행 계좌로 환불됩니다. <br/>
                                - 당일 결제 후 당일 환불하였더라도 은행별로 2~3일 후에 환불처리 됩니다.<br/>
                                <br/>
                                ※ 전체 윌비스 환불 정책과 관련한 상세 사항은 이용약관의 ‘제 4장 서비스 환불’ 항목에서 확인해 주세요.<br/>
                                <br/>
                                <a href="javascript:;" onclick="popupOpen('{{app_url('/company/agreement', 'www')}}', 'agreement', '1000', '600', null, null, 'yes');" class="tx-blue">[윌비스 이용약관 보기]</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="lec-btns w100p">
                    <ul>
                        <li><a href="#none" id="btn_pay" class="btn-purple">결제하기</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')

    {{--우편번호찾기--}}
    <div id="SearchPostWrap" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h470 fix">
            <a class="closeBtn" href="#none" onclick="closeSearchPost('SearchPostWrap');">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>
                우편번호 찾기
            </h4>
            <div class="bdt-gray"></div>
            <div id="SearchPost"></div>
        </div>
        <div class="dim" onclick="closeSearchPost('SearchPostWrap')"></div>
    </div>

    {{--배송주소록--}}
    <div id="MyAddress" class="willbes-Layer-Black"></div>

    {{--쿠폰적용--}}
    <div id="Coupon" class="willbes-Layer-Black"></div>
</div>
<!-- End Container -->
<script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
<script src="/public/js/post_util.js"></script>
<script src="/public/vendor/validator/multifield.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        // 강좌종료일 설정 (수정안함)
        $regi_form.on('change keyup input', '.btn-set-study-date', function() {
            var default_date = $(this).prop('defaultValue')
                , selected_date = $(this).val()
                , cart_idx = $(this).data('cart-idx')
                , study_days = $(this).data('study-period')
                , is_study_start_date = $(this).data('is-study-start-date')
                , base_date = moment().format('YYYY-MM-DD')
                , after30_date = moment().add(29, 'days').format('YYYY-MM-DD')
                , text_date = '결제일';

            if (is_study_start_date === 'N') {
                // 개강일이 결제일 이후 일 경우
                base_date = default_date;
                after30_date = moment(base_date).add(29, 'days').format('YYYY-MM-DD');
                text_date = '개강일';
            }

            if (base_date > selected_date || after30_date < selected_date) {
                alert('강좌시작일은 ' + text_date + ' 이후부터 30일 이내의 날짜여야만 합니다.');
                $(this).datepicker('update', default_date);
                return;
            }

            // 강좌종료일 설정
            $regi_form.find('input[name="study_end_date[' + cart_idx + ']"]').val(moment(selected_date).add(study_days - 1, 'days').format('YYYY-MM-DD'));
        });

        // 쿠폰적용 버튼 클릭 (수정안함)
        $regi_form.on('click', '.btn-coupon-apply', function() {
            var $use_point = $regi_form.find('input[name="use_point"]');
            if ($use_point.length > 0 && parseInt($use_point.val()) > 0) {
                alert('이미 적용하신 포인트는 쿠폰 적용 후 재 적용해 주십시오.');
                $use_point.val('0').trigger('change');
            }

            var ele_id = 'Coupon';
            var coupon_detail_idx = {};
            $regi_form.find('.chk_coupon').each(function(idx) {
                if ($(this).val().length > 0) {
                    coupon_detail_idx[idx] = $(this).val();
                }
            });
            var data = { 'ele_id' : ele_id, 'cart_idx' : $(this).data('cart-idx'), 'coupon_detail_idx' : JSON.stringify(coupon_detail_idx) };

            sendAjax('{{ front_url('/myCoupon/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        });

        // 쿠폰적용 삭제버튼 클릭 (수정안함)
        $regi_form.on('click', '.btn-coupon-apply-delete', function() {
            if (confirm('해당 쿠폰을 삭제하시겠습니까?')) {
                var cart_idx = $(this).data('cart-idx');
                var $cart_row = $regi_form.find('#cart_row_' + cart_idx);

                $cart_row.find('input[name="coupon_detail_idx[' + cart_idx + ']"]').data('coupon-disc-price', 0);
                $cart_row.find('input[name="coupon_detail_idx[' + cart_idx + ']"]').val('').trigger('change');
                $cart_row.find('.wrap-coupon').addClass('d_none');
                $cart_row.find('.wrap-real-sale-price').addClass('d_none');
                $cart_row.find('.coupon-name').html('');
                $cart_row.find('.coupon-disc-price').html('0');
                $cart_row.find('.real-pay-price').html(addComma($cart_row.find('input[name="cart_idx[]"]').data('real-sale-price')));

                alert('삭제 되었습니다.');
            }
        });

        // 포인트 전액사용 버튼 클릭 (수정안함)
        $regi_form.on('click', '#btn-all-use-point', function() {
            var has_point = parseInt('{{ $results['point'] }}');     // 보유 포인트
            var $use_point = $regi_form.find('input[name="use_point"]');
            $use_point.val(has_point).trigger('change').trigger('blur');
        });

        // 포인트 사용 (수정안함)
        $regi_form.on('blur', 'input[name="use_point"]', function() {
            var use_point = parseInt($(this).val()) || 0;
            if (use_point < 1) {
                return;
            }

            var coupon_detail_idx = {};
            $regi_form.find('.chk_coupon').each(function(idx) {
                coupon_detail_idx[$(this).data('cart-idx')] = $(this).val();
            });

            // 사용포인트 체크
            var is_check = false;
            var url = '{{ front_url('/order/checkUsePoint') }}';
            var data = {
                '{{ csrf_token_name() }}': $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'POST',
                'cart_type' : '{{ $results['cart_type'] }}',
                'use_point' : use_point,
                'coupon_detail_idx' : JSON.stringify(coupon_detail_idx)
            };
            sendAjax(url, data, function (ret) {
                if (ret.ret_cd) {
                    if (ret.ret_data.is_check === true) {
                        is_check = true;
                    } else {
                        alert(ret.ret_data.is_check);
                    }
                }
            }, showValidateError, false, 'POST');

            if (is_check === false) {
                $regi_form.find('input[name="use_point"]').val('0').trigger('change');
            }
        });

        // 결제금액 계산 및 표기
        $regi_form.on('change', '.chk_price', function() {
            var total_prod_order_price = parseInt('{{ $results['total_prod_order_price'] }}');      // 전체상품주문금액
            var delivery_price = parseInt('{{ $results['delivery_price'] }}');     // 배송료
            var point_disc_price = parseInt($regi_form.find('input[name="use_point"]').val()) || 0;        // 포인트 사용금액

            // 쿠폰할인금액 계산
            var total_coupon_disc_price = 0;
            $regi_form.find('.chk_coupon').each(function() {
                total_coupon_disc_price += parseInt($(this).data('coupon-disc-price'));
            });

            // 추가 배송료 계산
            var delivery_add_price = 0;
            if (delivery_price > 0) {
                var zipcode = $regi_form.find('input[name="zipcode"]').val().substr(0, 2);
                var chk_zipcode = '{{ implode(',', config_item('delivery_add_price_charge_zipcode')) }}';
                var caution_txt = '';

                $.each(chk_zipcode.split(','), function(k, v) {
                    if (v === zipcode) {
                        delivery_add_price = parseInt('{{ $__cfg['DeliveryAddPrice'] }}');
                        caution_txt = '※ 회원님께서는 <span class="tx-red">도서산간, 제주도 배송지 대상자로 배송료 ' + addComma(delivery_add_price) + '원이 추가</span>로 적용 되었습니다.';
                        return false;
                    }
                });

                $regi_form.find('#delivery_add_price_caution_txt').html(caution_txt);
            }

            // 배송료 + 추가 배송료
            delivery_price = delivery_price + delivery_add_price;

            // 실제결제금액
            var total_pay_price = total_prod_order_price - total_coupon_disc_price - point_disc_price + delivery_price;

            // 금액표기
            $regi_form.find('#total_coupon_disc_price').html(addComma(total_coupon_disc_price));
            $regi_form.find('#point_disc_price').html(addComma(point_disc_price));
            $regi_form.find('#delivery_price').html(addComma(delivery_price));
            $regi_form.find('.total-pay-price').html(addComma(total_pay_price));

            // 적립포인트 계산
            if (point_disc_price > 0) {
                // 포인트를 사용한 경우 적립포인트 없음
                $regi_form.find('#total_save_point').html('0');
            } else {
                var cart_data = {}, cart_idx, coupon_disc_price = 0, total_save_point = 0;

                $regi_form.find('input[name="cart_idx[]"]').each(function() {
                    cart_idx = $(this).val();
                    cart_data = $(this).data();
                    coupon_disc_price = parseInt($regi_form.find('input[name="coupon_detail_idx[' + cart_idx + ']"]').data('coupon-disc-price'));

                    if (cart_data.isPoint === 'Y' && coupon_disc_price < 1) {
                        total_save_point += cart_data.savePointType === 'R' ? parseInt(cart_data.realSalePrice * (cart_data.savePointPrice / 100), 10) : cart_data.savePointPrice;
                    }
                });

                $regi_form.find('#total_save_point').html(addComma(total_save_point));
            }

            // 총결제금액에 따른 결제수단 표시 여부 (수정 => 결제수단 선택자 변경, 결제수단 변경 이벤트 발생 삭제, 결제수단명 표기 삭제)
            if (total_pay_price > 0) {
                $regi_form.find('.pay-method').css('display', '');
                $regi_form.find('input[name="pay_method_ccd"]').prop('disabled', false);
            } else {
                $regi_form.find('.pay-method').css('display', 'none');
                $regi_form.find('input[name="pay_method_ccd"]').prop('disabled', true);
            }
        });

        // 주소찾기 버튼 클릭 (추가)
        $regi_form.on('click', '#btn_search_post', function() {
            var width = 550;
            var wrap_width = $('.paymentWrap').width();
            if(wrap_width != null && typeof wrap_width != 'undefined' && wrap_width < 668) {
                width = wrap_width - (wrap_width * 0.1) - 48;   // 화면너비 - 화면너비 10% - 레이어 padding값
            }

            searchPost('SearchPost', 'zipcode', 'addr1', 'Y', width, '370', 'SearchPostWrap');
        });

        // 나의 배송 주소록 버튼 클릭 (수정안함)
        $regi_form.on('click', '#btn_my_addr_list', function() {
            var ele_id = 'MyAddress';
            var data = { 'ele_id' : ele_id };
            sendAjax('{{ front_url('/myDeliveryAddress/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        });

        // 배송 주소지 선택 (수정안함)
        $regi_form.find('input[name="addr_type"]').on('click', function() {
            var addr_type = $(this).val();

            if (addr_type === 'E') {
                $regi_form.find('input[name="receiver"]').val('{{ $results['member']['MemName'] }}');
                $regi_form.find('input[name="zipcode"]').val('{{ $results['member']['ZipCode'] }}');
                $regi_form.find('input[name="addr1"]').val('{{ $results['member']['Addr1'] }}');
                $regi_form.find('input[name="addr2"]').val('{{ $results['member']['Addr2'] }}');
                $regi_form.find('input[name="receiver_phone"]').val('{{ $results['member']['Phone'] }}');
                $regi_form.find('select[name="receiver_phone1"]').val('{{ $results['member']['Phone1'] }}');
                $regi_form.find('input[name="receiver_phone2"]').val('{{ $results['member']['Phone2'] }}');
                $regi_form.find('input[name="receiver_phone3"]').val('{{ $results['member']['Phone3'] }}');
                $regi_form.find('input[name="receiver_tel"]').val('{{ $results['member']['Tel'] }}');
                $regi_form.find('select[name="receiver_tel1"]').val('{{ $results['member']['Tel1'] }}');
                $regi_form.find('input[name="receiver_tel2"]').val('{{ $results['member']['Tel2'] }}');
                $regi_form.find('input[name="receiver_tel3"]').val('{{ $results['member']['Tel3'] }}');
            } else if (addr_type === 'R') {
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST'
                };
                sendAjax('{{ front_url('/order/recentDeliveryAddress') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        if (ret.ret_data.length < 1) {
                            alert('최근 배송지 정보가 없습니다.');
                            return;
                        }
                        $regi_form.find('input[name="receiver"]').val(ret.ret_data.Receiver);
                        $regi_form.find('input[name="zipcode"]').val(ret.ret_data.ZipCode);
                        $regi_form.find('input[name="addr1"]').val(ret.ret_data.Addr1);
                        $regi_form.find('input[name="addr2"]').val(ret.ret_data.Addr2);
                        $regi_form.find('input[name="receiver_phone"]').val(ret.ret_data.ReceiverPhone);
                        $regi_form.find('select[name="receiver_phone1"]').val(ret.ret_data.ReceiverPhone1);
                        $regi_form.find('input[name="receiver_phone2"]').val(ret.ret_data.ReceiverPhone2);
                        $regi_form.find('input[name="receiver_phone3"]').val(ret.ret_data.ReceiverPhone3);
                        $regi_form.find('input[name="receiver_tel"]').val(ret.ret_data.ReceiverTel);
                        $regi_form.find('select[name="receiver_tel1"]').val(ret.ret_data.ReceiverTel1);
                        $regi_form.find('input[name="receiver_tel2"]').val(ret.ret_data.ReceiverTel2);
                        $regi_form.find('input[name="receiver_tel3"]').val(ret.ret_data.ReceiverTel3);
                        $regi_form.find('input[name="delivery_memo"]').val(ret.ret_data.DeliveryMemo);
                    }
                }, showAlertError, false, 'POST');
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

            // 추가 배송료 추가 여부 확인을 위해 이벤트 발생
            $regi_form.find('input[name="zipcode"]').trigger('change');
        });

        // 배송 주소지 관련 로드 이벤트 발생 (수정안함)
        if ($regi_form.find('input[name="zipcode"]').length > 0) {
            // 배송 주소지 디폴트 셋팅
            $regi_form.find('input[name="addr_type"]:checked').trigger('click');
        }

        // 결제하기 버튼 클릭 (수정 => 결제버튼 선택자 변경)
        $('#btn_pay').on('click', function() {
            var url = '{{ front_url('/payment/request') }}';
            ajaxSubmit($regi_form, url, function(ret) {
                if(ret.ret_cd) {
                    if (ret.ret_data.hasOwnProperty('ret_url') === true) {
                        if (ret.ret_msg !== '') {
                            alert(ret.ret_msg);
                        }
                        location.replace(ret.ret_data.ret_url);
                    } else {
                        $('body').append(ret.ret_data);
                    }
                }
            }, showValidateError, null, false, 'alert');
        });
    });
</script>
@stop