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
                                    <td>{{ $order_prod_row['ProdTypeCcdName'] }}</td>
                                    <td><div class="blue inline-block">[{{ $order_prod_row['LearnPatternCcdName'] or $order_prod_row['ProdTypeCcdName'] }}]</div> {{ $order_prod_row['ProdName'] }}</td>
                                    <td>{!! empty($order_prod_row['DeliveryStatusCcd']) === false ? $order_prod_row['DeliveryStatusCcdName'] . '<br/>' . substr($order_prod_row['DeliverySendDatm'], 0, 10) : '' !!}</td>
                                    <td>{{ number_format($order_prod_row['CardPayPrice']) }}</td>
                                    <td>{{ number_format($order_prod_row['CashPayPrice']) }}</td>
                                    <td>{{ $order_prod_row['IsUseCoupon'] }} {{ $order_prod_row['IsUseCoupon'] == 'Y' ? '<br/>(' . $order_prod_row['UserCouponIdx'] . ')' : '' }}</td>
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
                                    <span class="red pl-20">[총 환불금액] 0</span>
                                    = [남은금액] {{ number_format($data['order']['tRealPayPrice'] - 0) }}</strong>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="ln_solid mt-5"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>· 환불처리정보</strong></h4>
                </div>
                <div class="col-md-12">
                    <table id="list_order_detail_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2" class="pb-20">상품구분</th>
                            <th rowspan="2" class="pb-20">상품명</th>
                            <th colspan="2">결제금액</th>
                            <th rowspan="2" class="pb-20">결제상태</th>
                            <th colspan="5">환불정보</th>
                        </tr>
                        <tr>
                            <th>카드</th>
                            <th>현금</th>
                            <th>카드</th>
                            <th>현금</th>
                            <th>쿠폰복구</th>
                            <th>환불자</th>
                            <th>환불완료일</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['order_prod'] as $order_prod_row)
                            <tr>
                                <td>{{ $order_prod_row['ProdTypeCcdName'] }}</td>
                                <td><div class="blue inline-block">[{{ $order_prod_row['LearnPatternCcdName'] or $order_prod_row['ProdTypeCcdName'] }}]</div> {{ $order_prod_row['ProdName'] }}</td>
                                <td>{{ number_format($order_prod_row['CardPayPrice']) }}</td>
                                <td>{{ number_format($order_prod_row['CashPayPrice']) }}</td>
                                <td>{{ $order_prod_row['PayStatusCcdName'] }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="10" class="text-center bg-info">
                                <strong>[총 실결제금액] <span class="blue">{{ number_format($data['order']['tRealPayPrice']) }}</span>
                                    (사용 포인트 : {{ number_format($data['order']['tUseLecPoint']) }} | 교재 {{ number_format($data['order']['tUseBookPoint']) }})
                                    <span class="red pl-20">[총 환불금액] 0</span>
                                    = [남은금액] {{ number_format($data['order']['tRealPayPrice'] - 0) }}</strong>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
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
                            <td class="bg-white-only">0원결제 | 온라인강좌(회차등록) | <a class="blue">[단강좌]</a> 강좌명</td>
                        </tr>
                        <tr>
                            <th class="bg-odd">제공정보</th>
                            <td class="bg-white-only">[수강시작일] 2018-00-00 &nbsp; [수강제공기간] 2일 &nbsp; [결제금액] 0원 &nbsp; [제휴사] 해당없음</td>
                        </tr>
                        <tr>
                            <th class="bg-odd">회차정보</th>
                            <td class="bg-white-only">
                                <table id="list_lecture_unit_table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>강의명</th>
                                        <th>촬영일</th>
                                        <th>자료</th>
                                        <th>강의시간</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2강</td>
                                        <td>강의명</td>
                                        <td>2018-00-00</td>
                                        <td><a href="#none"><i class="fa fa-floppy-o"></i></a></td>
                                        <td>70분</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-odd">배송정보</th>
                            <td class="bg-white-only">
                                <p>[이름] 홍길동</p>
                                <p>[주소] 경기도 성남시 중원구 도촌북로 78, 휴먼시아 509동 503호</p>
                                <p>[휴대폰번호] 010-0000-0000</p>
                                <p>[전화번호] 02-0000-0000</p>
                                <p>[배송시 요청사항] 부재시 경비실에 맡겨주세요.</p>
                                <p>[배송료] 2,500원</p>
                                <p>[배송료 입금정보]</p>
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-odd">부여사유</th>
                            <td class="bg-white-only">관리자테스트부여</td>
                        </tr>
                        <tr>
                            <th class="bg-odd">부여자</th>
                            <td class="bg-white-only">관리자명</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
