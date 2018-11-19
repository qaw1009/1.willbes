@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인결제(PG사), 학원방문결제, 0원결제, 무료결제, 제휴사결제로 진행한 전체 결제현황을 확인할 수 있습니다.</h5>
    <div class="x_panel">
        <div class="x_content">
            {!! form_errors() !!}
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>회원정보</strong></h4>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-sm btn-primary mr-10 btn-message">쪽지발송</button>
                    <button class="btn btn-sm btn-primary mr-10 btn-sms">SMS발송</button>
                    <button class="btn btn-sm bg-dark mr-0 btn-auto-login">자동로그인</button>
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
                                <td>{{ $data['mem']['MemIdx'] }} ({{ $data['mem']['SiteName'] }})</td>
                                <td>{{ $data['mem']['JoinDate'] }}</td>
                                <td><u>{{ $data['mem']['MemName'] }} ({{ $data['mem']['Sex'] == 'M' ? '남' : '여' }})</u></td>
                                <td>{{ $data['mem']['MemId'] }}</td>
                                <td>{{ $data['mem']['Phone'] }} ({{ $data['mem']['SmsRcvStatus'] }})</td>
                                <td>{{ $data['mem']['Mail'] }} ({{ $data['mem']['MailRcvStatus'] }})</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ln_solid mt-5"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>주문기본정보</strong></h4>
                </div>
                <div class="col-md-6 text-right">
                </div>
                <div class="col-md-12">
                    <table id="list_order_table" class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <th class="bg-odd">주문번호</th>
                            <td class="bg-white-only"><a class="blue">{{ $data['order']['OrderNo'] }}</a> {{ $data['order']['SiteName'] }} {{ $data['order']['IsEscrow'] == 'Y' ? '(e)' : '' }}</td>
                            <th class="bg-odd">결제루트</th>
                            <td class="bg-white-only">{{ $data['order']['PayRouteCcdName'] }}</td>
                            <th class="bg-odd">결제완료일</th>
                            <td class="bg-white-only">{{ $data['order']['CompleteDatm'] }}</td>
                        </tr>
                        <tr>
                            <th class="bg-odd">실결제금액</th>
                            <td class="bg-white-only">{{ number_format($data['order']['tRealPayPrice']) }}원</td>
                            <th class="bg-odd">포인트사용금액</th>
                            <td class="bg-white-only">{{ number_format($data['order']['tUseLecPoint'] + $data['order']['tUseBookPoint']) }}p
                                (잔액 : 강좌 {{ number_format($data['mem_point']['lecture']) }}p | 교재 {{ number_format($data['mem_point']['book']) }}p)</td>
                            <th class="bg-odd">가상계좌취소(일)</th>
                            <td class="bg-white-only">
                                @if($data['order']['VBankStatus'] == 'O')
                                    <button name="btn_vbank_cancel" class="btn btn-xs btn-success mb-0">계좌취소</button>
                                @else
                                    {{ $data['order']['VBankCancelDatm'] }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-odd">결제수단</th>
                            <td class="bg-white-only" colspan="5">{{ $data['order']['PayMethodCcdName'] }}
                                @if(isset($data['order']['ReceiptUrl']) === true)
                                    <button name="btn_receipt_print" class="btn btn-xs btn-success ml-20 mb-0">매출전표</button>
                                @endif

                                @if($data['order']['IsVBank'] == 'Y')
                                    <span class="pl-20 no-line-height">({{ $data['order']['VBankCcdName'] }} | {{ $data['order']['VBankAccountNo'] }} | {{ $data['order']['VBankDepositName'] }} | {{ $data['order']['OrderDatm'] }})</span>
                                    <span class="pl-20 pr-20 no-line-height">|</span> 입금만료일 : {{ $data['order']['VBankExpireDatm'] }}까지
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>· 주문상세내역</strong></h4>
                </div>
                <div class="col-md-12">
                    <table id="list_order_detail_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2" class="pb-20">상품구분</th>
                            <th rowspan="2" class="pb-20">상품명</th>
                            <th rowspan="2" class="pb-20">배송상태</th>
                            <th colspan="2">결제금액</th>
                            <th colspan="2">할인정보</th>
                            <th colspan="2">미수금정보</th>
                            <th rowspan="2" class="pb-20">결제상태</th>
                            <th rowspan="2" class="pb-20">송장번호</th>
                            <th rowspan="2" class="pb-20">할인사유</th>
                        </tr>
                        <tr>
                            <th>카드</th>
                            <th>현금</th>
                            <th>쿠폰적용</th>
                            <th>할인율</th>
                            <th>미수금</th>
                            <th>분할여부</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data['order_prod'] as $order_prod_row)
                                <tr>
                                    <td>{{ $order_prod_row['ProdTypeCcdName'] }}
                                        {!! empty($order_prod_row['SalePatternCcdName']) === false ? '<br/>(' . $order_prod_row['SalePatternCcdName'] . ')' : '' !!}
                                    </td>
                                    <td><div class="blue inline-block">[{{ $order_prod_row['LearnPatternCcdName'] or $order_prod_row['ProdTypeCcdName'] }}]</div> {{ $order_prod_row['ProdName'] }}</td>
                                    <td>{!! empty($order_prod_row['DeliveryStatusCcd']) === false ? $order_prod_row['DeliveryStatusCcdName'] . '<br/>' . substr($order_prod_row['DeliverySendDatm'], 0, 10) : '' !!}</td>
                                    <td>{{ number_format($order_prod_row['CardPayPrice']) }}</td>
                                    <td>{{ number_format($order_prod_row['CashPayPrice']) }}</td>
                                    <td>{{ $order_prod_row['IsUseCoupon'] }} {!! $order_prod_row['IsUseCoupon'] == 'Y' ? '<br/>(' . $order_prod_row['UserCouponIdx'] . ')' : '' !!}</td>
                                    <td>{{ $order_prod_row['DiscRate'] }}</td>
                                    <td>0</td>
                                    <td></td>
                                    <td>{{ $order_prod_row['PayStatusCcdName'] }}</td>
                                    <td>{{ $order_prod_row['InvoiceNo'] }}</td>
                                    <td>{{ $order_prod_row['DiscReason'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="12" class="text-center bg-info">
                                <strong>[총 실결제금액] <span class="blue">{{ number_format($data['order']['tRealPayPrice']) }}</span>
                                    (사용 포인트 : {{ number_format($data['order']['tUseLecPoint']) }} | 교재 {{ number_format($data['order']['tUseBookPoint']) }})
                                    <span class="red pl-20">[총 환불금액] {{ number_format($data['order']['tRefundPrice']) }}</span>
                                    = [남은금액] {{ number_format($data['order']['tRemainPrice']) }}</strong>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="ln_solid mt-5"></div>
            @if($_is_refund_proc === true)
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>· 환불처리하기</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <form class="form-horizontal form-label-left" id="refund_proc_form" name="refund_proc_form" method="POST" onsubmit="return false;" novalidate>
                            <input type="hidden" name="order_idx" value="{{ $idx }}"/>

                            <table id="list_refund_proc_table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="pb-20">선택</th>
                                    <th rowspan="2" class="pb-20">상품구분</th>
                                    <th rowspan="2" class="pb-20">상품명</th>
                                    <th colspan="2">결제금액</th>
                                    <th rowspan="2" class="pb-20">결제상태</th>
                                    <th colspan="7">환불정보</th>
                                </tr>
                                <tr>
                                    <th>카드</th>
                                    <th>현금</th>
                                    <th>환불산출금액확인</th>
                                    <th>카드</th>
                                    <th>현금</th>
                                    <th>쿠폰복구</th>
                                    <th>사용포인트복구</th>
                                    <th>환불자</th>
                                    <th>환불완료일</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['order_prod'] as $order_prod_row)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="order_prod_idx[]" class="flat" value="{{ $order_prod_row['OrderProdIdx'] }}" data-real-pay-price="{{ $order_prod_row['RealPayPrice'] }}" @if($order_prod_row['PayStatusCcd'] != $_pay_status_ccd['paid']) disabled="disabled" @endif>
                                        </td>
                                        <td>{{ $order_prod_row['ProdTypeCcdName'] }}
                                            {!! empty($order_prod_row['SalePatternCcdName']) === false ? '<br/>(' . $order_prod_row['SalePatternCcdName'] . ')' : '' !!}
                                        </td>
                                        <td><div class="blue inline-block">[{{ $order_prod_row['LearnPatternCcdName'] or $order_prod_row['ProdTypeCcdName'] }}]</div> {{ $order_prod_row['ProdName'] }}</td>
                                        <td>{{ number_format($order_prod_row['CardPayPrice']) }}</td>
                                        <td>{{ number_format($order_prod_row['CashPayPrice']) }}</td>
                                        <td>{{ $order_prod_row['PayStatusCcdName'] }}</td>
                                        @if($order_prod_row['PayStatusCcd'] == $_pay_status_ccd['paid'])
                                            {{-- 결제완료 --}}
                                            <td>
                                                @if($order_prod_row['ProdTypeCcd'] == $_prod_type_ccd['on_lecture'])
                                                    <button name="btn_refund_check" class="btn btn-xs btn-success mb-0" data-order-prod-idx="{{ $order_prod_row['OrderProdIdx'] }}">환불산출금액확인</button>
                                                @elseif($order_prod_row['ProdTypeCcd'] == $_prod_type_ccd['book'])
                                                    <button name="btn_delivery_check" class="btn btn-xs btn-success mb-0" data-order-prod-idx="{{ $order_prod_row['OrderProdIdx'] }}">반송확인</button>
                                                    <input type="hidden" id="is_delivery_check_{{ $order_prod_row['OrderProdIdx'] }}" name="is_delivery_check[]" value="N"/>
                                                    <span id="txt_delivery_check_{{ $order_prod_row['OrderProdIdx'] }}" class="red hide">확인완료</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input id="card_refund_price_{{ $order_prod_row['OrderProdIdx'] }}" name="card_refund_price[]" class="form-control input-sm" title="카드환불금액" value="{{ $order_prod_row['CalcCardRefundPrice'] }}" style="width: 140px;"/>
                                            </td>
                                            <td>
                                                <input id="cash_refund_price_{{ $order_prod_row['OrderProdIdx'] }}" name="cash_refund_price[]" class="form-control input-sm" title="현금환불금액" value="{{ $order_prod_row['CalcCashRefundPrice'] }}" style="width: 140px;"/>
                                            </td>
                                            <td>
                                                @if($order_prod_row['IsUseCoupon'] == 'Y')
                                                    <input type="checkbox" id="is_coupon_refund_{{ $order_prod_row['OrderProdIdx'] }}" name="is_coupon_refund[]" class="flat" value="Y">
                                                @endif
                                            </td>
                                            <td>
                                                @if($order_prod_row['UsePoint'] > 0)
                                                    <input type="checkbox" id="is_point_refund_{{ $order_prod_row['OrderProdIdx'] }}" name="is_point_refund[]" class="flat" value="Y">
                                                @endif
                                            </td>
                                            <td></td>
                                            <td></td>
                                        @else
                                            {{-- 환불완료 --}}
                                            <td></td>
                                            <td>{{ number_format($order_prod_row['CardRefundPrice']) }}</td>
                                            <td>{{ number_format($order_prod_row['CashRefundPrice']) }}</td>
                                            <td>{!! $order_prod_row['IsCouponRefund'] == 'Y' ? 'Y<br/>(' . $order_prod_row['RecoCouponIdx'] . ')' : '' !!}</td>
                                            <td>{!! $order_prod_row['IsPointRefund'] == 'Y' ? 'Y<br/>(' . $order_prod_row['RecoPointIdx'] . ')' : '' !!}</td>
                                            <td>{{ $order_prod_row['RefundAdminName'] }}</td>
                                            <td>{{ $order_prod_row['RefundDatm'] }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="13" class="text-center bg-info form-inline">
                                        <strong>총 환불금액 &nbsp;
                                            [카드] <input name="total_card_refund_price" class="form-control input-sm ml-5 mr-5" title="총카드환불금액" value="0" readonly="readonly">
                                            + [현금] <input name="total_cash_refund_price" class="form-control input-sm ml-5 mr-5" title="총현금환불금액" value="0" readonly="readonly">
                                            = <input name="total_refund_price" class="form-control input-sm ml-5 mr-50" title="총환불금액" value="0" readonly="readonly">
                                            ※ 해당 금액으로 환불처리됩니다.
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="13" class="text-center form-inline">
                                        <strong>[총 실결제금액] <span class="blue">{{ number_format($data['order']['tRealPayPrice']) }}</span>
                                            (사용 포인트 : {{ number_format($data['order']['tUseLecPoint']) }} | 교재 {{ number_format($data['order']['tUseBookPoint']) }})
                                            <span class="red pl-20">[총 환불금액] {{ number_format($data['order']['tRefundPrice']) }}</span>
                                            = [남은금액] {{ number_format($data['order']['tRemainPrice']) }}</strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="text-center">
                                <button type="submit" name="btn_refund_proc" class="btn btn-success">환불처리하기</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if($_is_refund_data === true)
                    <div class="ln_solid mt-5"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4><strong>· 환불내역</strong></h4>
                        </div>
                        <div class="col-md-12">
                            <table id="list_refund_list_table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>환불일</th>
                                    <th>환불상품 (환불금액)</th>
                                    <th>총 환불금액</th>
                                    <th>결제상태</th>
                                    <th>환불사유</th>
                                    <th>환불처리자</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['refund_prod'] as $refund_req_idx => $refund_prod_row)
                                    <tr>
                                        <td>{{ $loop->index }}</td>
                                        <td>{{ $refund_prod_row['RefundDatm'] }}</td>
                                        <td>
                                            @foreach($refund_prod_row['ProdName'] as $sub_idx => $refund_prod_name)
                                                <div class="blue inline-block">[{{ $refund_prod_row['LearnPatternCcdName'][$sub_idx] or $refund_prod_row['ProdTypeCcdName'][$sub_idx] }}]</div> {{ $refund_prod_name }}
                                                ({{ number_format($refund_prod_row['RefundPrice'][$sub_idx]) }}원)<br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ number_format(array_sum($refund_prod_row['RefundPrice'])) }}<br/>
                                            (카드 {{ number_format(array_sum($refund_prod_row['CardRefundPrice'])) }} + 현금 {{ number_format(array_sum($refund_prod_row['CashRefundPrice'])) }})
                                        </td>
                                        <td>{{ $refund_prod_row['PayStatusCcdName'] }}<br/>
                                            ({{ $refund_prod_row['IsBankRefund'] == 'Y' ? '계좌환불' : '연동환불' }}{{ $refund_prod_row['IsApproval'] == 'Y' ? ', 지출결의' : '' }})
                                        </td>
                                        <td>{{ $refund_prod_row['RefundReason'] }}</td>
                                        <td>{{ $refund_prod_row['RefundAdminName'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7" class="text-center bg-info">
                                        <strong>[총 실결제금액] <span class="blue">{{ number_format($data['order']['tRealPayPrice']) }}</span>
                                            (사용 포인트 : {{ number_format($data['order']['tUseLecPoint']) }} | 교재 {{ number_format($data['order']['tUseBookPoint']) }})
                                            <span class="red pl-20">[총 환불금액] {{ number_format($data['order']['tRefundPrice']) }}</span>
                                            = [남은금액] {{ number_format($data['order']['tRemainPrice']) }}</strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @endif
            @else
                @if($_is_refund_data === true)
                    <div class="row">
                        <div class="col-md-6">
                            <h4><strong>· 환불처리정보</strong></h4>
                        </div>
                        <div class="col-md-12">
                            <table id="list_refund_list_table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="pb-20">상품구분</th>
                                    <th rowspan="2" class="pb-20">상품명</th>
                                    <th colspan="2">결제금액</th>
                                    <th rowspan="2" class="pb-20">결제상태</th>
                                    <th colspan="6">환불정보</th>
                                </tr>
                                <tr>
                                    <th>카드</th>
                                    <th>현금</th>
                                    <th>카드</th>
                                    <th>현금</th>
                                    <th>쿠폰복구</th>
                                    <th>사용포인트복구</th>
                                    <th>환불자</th>
                                    <th>환불완료일</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['order_prod'] as $order_prod_row)
                                    @if($order_prod_row['PayStatusCcd'] == $_pay_status_ccd['refund'])
                                        <tr>
                                            <td>{{ $order_prod_row['ProdTypeCcdName'] }}</td>
                                            <td><div class="blue inline-block">[{{ $order_prod_row['LearnPatternCcdName'] or $order_prod_row['ProdTypeCcdName'] }}]</div> {{ $order_prod_row['ProdName'] }}</td>
                                            <td>{{ number_format($order_prod_row['CardPayPrice']) }}</td>
                                            <td>{{ number_format($order_prod_row['CashPayPrice']) }}</td>
                                            <td>{{ $order_prod_row['PayStatusCcdName'] }}</td>
                                            <td>{{ number_format($order_prod_row['CardRefundPrice']) }}</td>
                                            <td>{{ number_format($order_prod_row['CashRefundPrice']) }}</td>
                                            <td>{!! $order_prod_row['IsCouponRefund'] == 'Y' ? 'Y<br/>(' . $order_prod_row['RecoCouponIdx'] . ')' : '' !!}</td>
                                            <td>{!! $order_prod_row['IsPointRefund'] == 'Y' ? 'Y<br/>(' . $order_prod_row['RecoPointIdx'] . ')' : '' !!}</td>
                                            <td>{{ $order_prod_row['RefundAdminName'] }}</td>
                                            <td>{{ $order_prod_row['RefundDatm'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="11" class="text-center bg-info">
                                        <strong>[총 실결제금액] <span class="blue">{{ number_format($data['order']['tRealPayPrice']) }}</span>
                                            (사용 포인트 : {{ number_format($data['order']['tUseLecPoint']) }} | 교재 {{ number_format($data['order']['tUseBookPoint']) }})
                                            <span class="red pl-20">[총 환불금액] {{ number_format($data['order']['tRefundPrice']) }}</span>
                                            = [남은금액] {{ number_format($data['order']['tRemainPrice']) }}</strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @endif
            @endif
            @if($data['order']['PayRouteCcd'] == $_pay_route_ccd['zero'] || $data['order']['PayRouteCcd'] == $_pay_route_ccd['alliance'])
                <div class="ln_solid mt-5"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>관리자 결제정보</strong></h4>
                    </div>
                    <div class="col-md-6 text-right">
                    </div>
                    <div class="col-md-12">
                        <table id="list_admin_pay_table" class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th class="bg-odd">상품구분</th>
                                <td class="bg-white-only">{{ $data['order']['PayRouteCcdName'] }}
                                    | {{ $data['admin_prod']['ProdTypeCcdName'] }}
                                    {{ isset($data['admin_prod']['MyLecData']['wUnitData']) === true ? '(회차등록)' : '' }}
                                    | <div class="blue inline-block">[{{ $data['admin_prod']['LearnPatternCcdName'] or $data['admin_prod']['ProdTypeCcdName'] }}]</div> {{ $data['admin_prod']['ProdName'] }}
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-odd">제공정보</th>
                                <td class="bg-white-only">
                                    @if(empty($data['admin_prod']['MyLecData']) === false)
                                        [수강시작일] {{ $data['admin_prod']['MyLecData']['LecStartDate'] }} &nbsp;
                                        [수강제공기간] {{ $data['admin_prod']['MyLecData']['LecExpireDay'] }}일 &nbsp;
                                    @endif
                                    [결제금액] {{ number_format($data['admin_prod']['RealPayPrice']) }}원 &nbsp;
                                    @if($data['order']['PayRouteCcd'] == $_pay_route_ccd['alliance'])
                                        [제휴사] 해당없음
                                    @endif
                                </td>
                            </tr>
                            @if(isset($data['admin_prod']['MyLecData']['wUnitData']) === true)
                            <tr>
                                <th class="bg-odd">회차정보</th>
                                <td class="bg-white-only">
                                    <table id="list_lecture_unit_table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>강의명</th>
                                            <th>촬영일</th>
                                            <th>강의시간</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['admin_prod']['MyLecData']['wUnitData'] as $unit_row)
                                        <tr>
                                            <td>{{ $unit_row['wUnitLectureNum'] }}회차 {{ $unit_row['wUnitNum'] }}강</td>
                                            <td>{{ $unit_row['wUnitName'] }}</td>
                                            <td>{{ $unit_row['wShootingDate'] }}</td>
                                            <td>{{ $unit_row['wRuntime'] }}분</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @endif
                            @if(empty($data['delivery_addr']) === false)
                            <tr>
                                <th class="bg-odd">배송정보</th>
                                <td class="bg-white-only">
                                    <p>[이름] {{ $data['delivery_addr']['Receiver'] }}</p>
                                    <p>[주소] [{{ $data['delivery_addr']['ZipCode'] }}] {{ $data['delivery_addr']['Addr1'] }} {{ $data['delivery_addr']['Addr2'] }}</p>
                                    <p>[휴대폰번호] {{ $data['delivery_addr']['ReceiverPhone'] }}</p>
                                    <p>[전화번호] {{ $data['delivery_addr']['ReceiverTel'] }}</p>
                                    <p>[배송시 요청사항] {{ $data['delivery_addr']['DeliveryMemo'] }}</p>
                                    <p>[배송료] {{ number_format($data['order']['tDeliveryPrice']) }}원</p>
                                    <p>[배송료 입금정보] {{ $data['delivery_addr']['OrderMemo'] }}</p>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <th class="bg-odd">부여사유</th>
                                <td class="bg-white-only">{{ $data['order']['AdminRegReason'] }}</td>
                            </tr>
                            <tr>
                                <th class="bg-odd">부여자</th>
                                <td class="bg-white-only">{{ $data['order']['RegAdminName'] }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            <div class="ln_solid mt-5"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>메모관리</strong></h4>
                </div>
                <div class="col-md-6 text-right">
                </div>
                <div class="col-md-12">
                    <form class="form-horizontal form-label-left" id="regi_memo_form" name="regi_memo_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="order_idx" value="{{ $idx }}"/>
                        <input type="hidden" name="memo_type" value="normal"/>
                        <div class="item">
                            <textarea id="order_memo" name="order_memo" class="form-control" rows="3" title="메모" required="required" placeholder="메모 내용을 입력해 주십시오."></textarea>
                        </div>
                        <button class="btn btn-sm btn-primary mt-5">메모저장</button>
                    </form>
                </div>
                <div class="col-md-12">
                    <table id="list_memo_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>메모내용</th>
                            <th>등록자</th>
                            <th>등록일</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="text-center">
                <button class="btn btn-primary" type="button" id="btn_list">목록</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $refund_proc_form = $('#refund_proc_form');
        var $regi_memo_form = $('#regi_memo_form');
        var $list_memo_table = $('#list_memo_table');

        $(document).ready(function() {
            // 메모 목록
            $datatable = $list_memo_table.DataTable({
                serverSide: true,
                paging: false,
                ajax: {
                    'url' : '{{ site_url('/common/orderMemo/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($regi_memo_form.find('input[type="hidden"]').serializeArray()), {});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderMemo', 'render' : function(data, type, row, meta) {
                        return data.replace(/\n/gi, '<br/>');
                    }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 메모 등록
            $regi_memo_form.submit(function() {
                var _url = '{{ site_url('/common/orderMemo/store') }}';

                ajaxSubmit($regi_memo_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $regi_memo_form.find('textarea[name="order_memo"]').val('');
                        $datatable.draw();
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 계좌취소 버튼 클릭
            $('button[name="btn_vbank_cancel"]').on('click', function() {
                if (!confirm('해당 계좌를 취소하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $regi_memo_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'order_idx' : $regi_memo_form.find('input[name="order_idx"]').val()
                };
                sendAjax('{{ site_url('/pay/order/cancel/vbank') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            // 매출전표 버튼 클릭
            $('button[name="btn_receipt_print"]').on('click', function() {
                popupOpen('{!! $data['order']['ReceiptUrl'] or '' !!}', '_receipt_print', 430, 700);
            });

        {{-- 환불처리 컨트롤러에서만 사용 --}}
        @if($_is_refund_proc === true)
            // 반송확인 버튼 클릭
            $refund_proc_form.on('click', 'button[name="btn_delivery_check"]', function() {
                var order_prod_idx = $(this).data('order-prod-idx');

                if (confirm('환불할 교재가 반송되었습니까?')) {
                    $refund_proc_form.find('#is_delivery_check_' + order_prod_idx).val('Y');
                    $refund_proc_form.find('#txt_delivery_check_' + order_prod_idx).removeClass('hide');
                }
            });

            // 환불산출금액확인 버튼 클릭
            $refund_proc_form.on('click', 'button[name="btn_refund_check"]', function() {
                var order_idx = $refund_proc_form.find('input[name="order_idx"]').val();
                var order_prod_idx = $(this).data('order-prod-idx');

                $('button[name="btn_refund_check"]').setLayer({
                    'url' : '{{ site_url('/pay/refundProc/calc') }}',
                    'width' : 900,
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'order_idx', 'name' : '주문식별자', 'value' : order_idx, 'required' : true },
                        { 'id' : 'order_prod_idx', 'name' : '주문상품식별자', 'value' : order_prod_idx, 'required' : true }
                    ]
                });
            });

            // 환불처리하기 버튼 클릭
            $refund_proc_form.on('click', 'button[name="btn_refund_proc"]', function() {
                var $params = {};
                var order_prod_idx = '', real_pay_price = 0, card_refund_price = 0, cash_refund_price = 0, is_coupon_refund = '', is_point_refund = '', is_delivery_check = '', is_check = true;
                var $order_prod_idx = $refund_proc_form.find('input[name="order_prod_idx[]"]:checked');
                var order_idx = $refund_proc_form.find('input[name="order_idx"]').val();

                if ($order_prod_idx.length < 1) {
                    alert('환불할 상품을 선택해 주세요.');
                    return;
                }

                $order_prod_idx.each(function() {
                    order_prod_idx = $(this).val();
                    real_pay_price = parseInt($(this).data('real-pay-price'));
                    card_refund_price = parseInt($refund_proc_form.find('#card_refund_price_' + order_prod_idx).val()) || 0;
                    cash_refund_price = parseInt($refund_proc_form.find('#cash_refund_price_' + order_prod_idx).val()) || 0;
                    is_coupon_refund = $refund_proc_form.find('#is_coupon_refund_' + order_prod_idx + ':checked').val() || 'N';
                    is_point_refund = $refund_proc_form.find('#is_point_refund_' + order_prod_idx + ':checked').val() || 'N';
                    is_delivery_check = $refund_proc_form.find('#is_delivery_check_' + order_prod_idx).val();

                    if (real_pay_price < (card_refund_price + cash_refund_price)) {
                        alert('환불금액이 결제금액보다 큽니다.');
                        is_check = false;
                        return false;
                    }

                    if (typeof is_delivery_check !== 'undefined' && is_delivery_check === 'N') {
                        alert('먼저 반송확인 버튼을 클릭해 주세요.');
                        is_check = false;
                        return false;
                    }

                    $params[order_prod_idx] = {
                        'card_refund_price' : card_refund_price,
                        'cash_refund_price' : cash_refund_price,
                        'is_coupon_refund' : is_coupon_refund,
                        'is_point_refund' : is_point_refund
                    };
                });

                if (is_check === false) {
                    return;
                }

                $('button[name="btn_refund_proc"]').setLayer({
                    'url' : '{{ site_url('/pay/refundProc/create') }}',
                    'width' : 900,
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'order_idx', 'name' : '주문식별자', 'value' : order_idx, 'required' : true },
                        { 'id' : 'params', 'name' : '주문상품정보', 'value' : JSON.stringify($params), 'required' : true }
                    ]
                });
            });

            // 환불금액 계산 및 표기
            $refund_proc_form.on('ifChanged keyup input', 'input[name="order_prod_idx[]"], input[name="card_refund_price[]"], input[name="cash_refund_price[]"]', function() {
                var $order_prod_idx = $refund_proc_form.find('input[name="order_prod_idx[]"]:checked');
                var order_prod_idx = '', total_card_refund_price = 0, total_cash_refund_price = 0;

                $order_prod_idx.each(function() {
                    order_prod_idx = $(this).val();
                    total_card_refund_price += parseInt($refund_proc_form.find('#card_refund_price_' + order_prod_idx).val()) || 0;
                    total_cash_refund_price += parseInt($refund_proc_form.find('#cash_refund_price_' + order_prod_idx).val()) || 0;
                });

                $refund_proc_form.find('input[name="total_card_refund_price"]').val(total_card_refund_price);
                $refund_proc_form.find('input[name="total_cash_refund_price"]').val(total_cash_refund_price);
                $refund_proc_form.find('input[name="total_refund_price"]').val(total_card_refund_price + total_cash_refund_price);
            });
        @endif

            // 목록 이동
            $('#btn_list').click(function() {
                var url = location.protocol + '//' + location.host + location.pathname.substr(0, location.pathname.indexOf('/show/')) + '/index';
                url += location.pathname.substr(location.pathname.indexOf('/show/') + 5).replace(/\/[0-9]+/g, '');
                url += getQueryString();

                location.replace(url);
            });
        });
    </script>
@stop
