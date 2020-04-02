@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 학원강좌 강사료 정산 정보를 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" name="prof_idx" value="{{ $prof_idx }}"/>
        <input type="hidden" name="prod_code" value="{{ $prod_code }}"/>
        <input type="hidden" name="prod_type" value="{{ $prod_type }}"/>
        <input type="hidden" name="pch_idx" value="{{ $pch_idx }}"/>
        <input type="hidden" name="base_datm" value="{{ $base_datm }}"/>
        <input type="hidden" name="mem_cnt" value="{{ $sum_data['tMemCnt'] }}"/>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered mb-0">
                    <thead class="">
                    <tr>
                        <th rowspan="2" class="valign-middle">정산일자</th>
                        <th rowspan="2" class="valign-middle">강사명</th>
                        <th rowspan="2" class="valign-middle">대분류</th>
                        <th rowspan="2" class="valign-middle">캠퍼스</th>
                        <th rowspan="2" class="valign-middle">단과반명</th>
                        <th rowspan="2" class="valign-middle">개강일</th>
                        <th rowspan="2" class="valign-middle">종강일</th>
                        <th rowspan="2" class="valign-middle">횟수</th>
                        @if($prod_type == 'CP')
                            <th rowspan="2" class="valign-middle">수강인원</th>
                        @else
                            <th colspan="3">수강인원</th>
                        @endif
                        <th colspan="9">정산금액(원)</th>
                    </tr>
                    <tr>
                        @if($prod_type == 'OL')
                            <th class="valign-middle">단과반</th>
                            <th class="valign-middle">종합반</th>
                            <th class="valign-middle">합계</th>
                        @endif
                        <th class="valign-middle">수수료공제전<br/>수강총액</th>
                        <th class="valign-middle">수수료공제후<br/>수강총액</th>
                        <th class="valign-middle">추가<br/>공제액</th>
                        <th class="valign-middle">강사료정산<br/>대상금액</th>
                        <th class="valign-middle">강사료<br/>비율</th>
                        <th class="valign-middle">강사료</th>
                        <th class="valign-middle">원천세</th>
                        <th class="valign-middle">기타추가<br/>공제액</th>
                        <th class="valign-middle">강사료<br/>지급액</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $data['CalcDate'] }}</td>
                        <td>{{ $data['wProfName'] }}</td>
                        <td>{{ $data['CateName'] }}</td>
                        <td>{{ $data['CampusCcdName'] }}</td>
                        <td>[{{ $data['ProdCode'] }}] {{ $data['ProdName'] }}</td>
                        <td>{{ $data['StudyStartDate'] }}</td>
                        <td>{{ $data['StudyEndDate'] }}</td>
                        <td>{{ $data['Amount'] }}</td>
                        @if($prod_type == 'OL')
                            <td>{{ number_format($data['LecRealCnt']) }}</td>
                            <td>{{ number_format($data['PackRealCnt']) }}</td>
                        @endif
                        <td>{{ number_format($data['LecRealCnt'] + $data['PackRealCnt']) }}</td>
                        <td>{{ is_null($data['PrePrice']) === true ? '' : number_format($data['PrePrice']) }}</td>
                        <td>{{ is_null($data['RemainPrice']) === true ? '' : number_format($data['RemainPrice']) }}</td>
                        <td>{{ is_null($data['DeductPrice']) === true ? '' : number_format($data['DeductPrice']) }}</td>
                        <td>{{ is_null($data['TargetPrice']) === true ? '' : number_format($data['TargetPrice']) }}</td>
                        <td>{{ $prod_type == 'CP' || is_null($data['LecCalcRate']) === true ? '' : number_format($data['LecCalcRate']) . $data['LecCalcRateUnit'] . ',' }}
                            {{ is_null($data['PackCalcRate']) === true ? '' : number_format($data['PackCalcRate']) . $data['PackCalcRateUnit'] }}</td>
                        <td>{{ is_null($data['CalcPrice']) === true ? '' : number_format($data['CalcPrice']) }}</td>
                        <td>{{ is_null($data['TaxPrice']) === true ? '' : number_format($data['TaxPrice']) }}</td>
                        <td>{{ is_null($data['EtcDeductPrice']) === true ? '' : number_format($data['EtcDeductPrice']) }}</td>
                        <td class="blue bold">{{ is_null($data['FinalCalcPrice']) === true ? '' : number_format($data['FinalCalcPrice']) }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-12 text-right">
                <button type="button" name="btn_order_excel" class="btn btn-sm btn-success mr-0">엑셀다운로드</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="list_order_table" class="table table-bordered mb-5">
                    <thead class="">
                    <tr>
                        <th rowspan="2" class="valign-middle">No</th>
                        <th rowspan="2" class="valign-middle" style="min-width: 120px;">주문번호</th>
                        <th rowspan="2" class="valign-middle" style="min-width: 70px;">결제일</th>
                        <th rowspan="2" class="valign-middle">회원명</th>
                        <th rowspan="2" class="valign-middle">연락처</th>
                        <th colspan="4">결제금액(수강료)</th>
                        <th rowspan="2" class="valign-middle">결제루트</th>
                        <th rowspan="2" class="valign-middle">결제<br/>수수료율</th>
                        <th rowspan="2" class="valign-middle">결제<br/>수수료</th>
                        <th rowspan="2" class="valign-middle">환불금액</th>
                        <th rowspan="2" class="valign-middle" style="min-width: 70px;">환불완료일</th>
                        <th rowspan="2" class="valign-middle">합계</th>
                        @if($prod_type == 'CP')
                            <th rowspan="2" class="valign-middle">종합반<br/>수강번호</th>
                        @else
                            <th rowspan="2" class="valign-middle" style="max-width: 70px;">상품구분</th>
                        @endif
                        <th rowspan="2" class="valign-middle" style="min-width: 160px;">종합반명</th>
                        <th rowspan="2" class="valign-middle">비고</th>
                        <th rowspan="2" class="valign-middle">추가할인</th>
                        @if($prod_type == 'OL')
                            <th rowspan="2" class="valign-middle" style="min-width: 160px;">세트할인</th>
                        @endif
                    </tr>
                    <tr>
                        <th class="valign-middle">신용카드</th>
                        <th class="valign-middle">현금</th>
                        <th class="valign-middle">실시간계좌이체</th>
                        <th class="valign-middle bdr-line">무통장입금</th>
                    </tr>
                    <tr class="bg-info">
                        <th colspan="5" class="text-center">합계</th>
                        <th>{{ $prod_type == 'CP' ? '' : number_format($sum_data['tPreCardPrice']) }}</th>
                        <th>{{ $prod_type == 'CP' ? '' : number_format($sum_data['tPreCashPrice']) }}</th>
                        <th>{{ $prod_type == 'CP' ? '' : number_format($sum_data['tPreBankPrice']) }}</th>
                        <th>{{ $prod_type == 'CP' ? '' : number_format($sum_data['tPreVBankPrice']) }}</th>
                        <th></th>
                        <th></th>
                        <th>{{ $prod_type == 'CP' ? '' : number_format($sum_data['tPgFeePrice']) }}</th>
                        <th></th>
                        <th></th>
                        <th>{{ $prod_type == 'CP' ? '' : number_format($sum_data['tRemainPrice']) }}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        @if($prod_type == 'OL')
                            <th></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="bdt-line">
                        @foreach($order_data as $row)
                            <tr class="list_order_tr{{ empty($row['RefundDatm']) === false ? ' red' : '' }}">
                                <td>{{ $loop->remaining }}</td>
                                <td><a href="{{ site_url('/pay/order/show/') . $row['OrderIdx'] }}" class="{{ empty($row['RefundDatm']) === false ? 'red' : 'blue' }}" target="_blank"><u>{{ $row['OrderNo'] }}</u></a></td>
                                <td>{{ substr($row['CompleteDatm'], 0, 16) }}</td>
                                <td>{{ $row['MemName'] }}({{ $row['MemId'] }})</td>
                                <td>{{ $row['MemPhone'] }}</td>
                                <td>{{ $prod_type == 'CP' ? '' : number_format($row['PreCardPrice']) }}</td>
                                <td>{{ $prod_type == 'CP' ? '' : number_format($row['PreCashPrice']) }}</td>
                                <td>{{ $prod_type == 'CP' ? '' : number_format($row['PreBankPrice']) }}</td>
                                <td>{{ $prod_type == 'CP' ? '' : number_format($row['PreVBankPrice']) }}</td>
                                <td>{{ $row['PayRouteCcdName'] }}</td>
                                <td>{{ $row['PgFee'] }}</td>
                                <td>{{ $prod_type == 'CP' ? '' : number_format($row['DivisionPgFeePrice']) }}</td>
                                <td>{{ $prod_type == 'CP' ? '' : (empty($row['RefundDatm']) === false ? number_format($row['DivisionRefundPrice'] * -1) : '') }}</td>
                                <td>{{ empty($row['RefundDatm']) === false ? substr($row['RefundDatm'], 0, 16) : '' }}</td>
                                <td>{{ $prod_type == 'CP' ? '' : number_format($row['RemainPrice']) }}</td>
                                @if($prod_type == 'CP')
                                    <td>{{ $row['PackCertNo'] }}</td>
                                @else
                                    <td>{{ str_replace('[학원]', '', $row['LearnPackTypeName']) }}</td>
                                @endif
                                <td>{{ empty($row['ProdName']) === false ? '[' . $row['ProdCode'] . '] ' . $row['ProdName'] : '' }}</td>
                                <td>{{ mb_substr($row['OrderMemo'], 0, 10) }}</td>
                                <td>{{ $row['DiscRateUnit'] }}</td>
                                @if($prod_type == 'OL')
                                    <td>{{ $row['Remark'] }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-10">
            <div class="col-md-12 text-right">
                <button type="button" name="btn_order_excel" class="btn btn-sm btn-success mr-0">엑셀다운로드</button>
            </div>
        </div>
        <div class="x_panel mt-20">
            <div class="x_title">
                <h2><strong>강사료 산출</strong></h2>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1">수수료공제전수강총액</label>
                    <div class="col-md-9 form-inline item">
                        @if($prod_type == 'CP')
                            <input type="text" name="pre_price" class="form-control set-add-comma" title="수수료공제전수강총액" required="required" value="{{ empty($data['PrePrice']) === true ? '' : number_format($data['PrePrice']) }}"> 원
                        @else
                            <p class="form-control-static">
                                <input type="hidden" name="pre_price" value="{{ $sum_data['tPrePrice'] }}"/>
                                <strong>{{ number_format($sum_data['tPrePrice']) }}원</strong>
                                @if($is_calc_hist === true)
                                    | <span class="blue">참고금액 : {{ number_format($data['PrePrice']) }}원</span>
                                    | <span class="blue">차액 : {{ number_format($data['PrePrice'] - $sum_data['tPrePrice']) }}원</span>
                                @endif
                            </p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">수수료공제후수강총액<br/>(총합계금액)</label>
                    <div class="col-md-9 form-inline item">
                        @if($prod_type == 'CP')
                            <input type="hidden" name="lec_remain_price" value="0"/>
                            <input type="text" name="pack_remain_price" class="form-control set-add-comma" title="수수료공제후수강총액" required="required" value="{{ empty($data['PackRemainPrice']) === true ? '' : number_format($data['PackRemainPrice']) }}"> 원
                        @else
                            <p class="form-control-static">
                                <input type="hidden" name="lec_remain_price" value="{{ $sum_data['tLecRemainPrice'] }}"/>
                                <input type="hidden" name="pack_remain_price" value="{{ $sum_data['tPackRemainPrice'] }}"/>
                                <strong>{{ number_format($sum_data['tRemainPrice']) }}원</strong>
                                = <span>단과반 ({{ number_format($sum_data['tLecRemainPrice']) }}원) + 종합반 ({{ number_format($sum_data['tPackRemainPrice']) }}원)</span>
                                @if($is_calc_hist === true)
                                    | <span class="blue">참고금액 : 단과반 ({{ number_format($data['LecRemainPrice']) }}원) + 종합반 ({{ number_format($data['PackRemainPrice']) }}원)</span>
                                    | <span class="blue">차액 : {{ number_format($data['RemainPrice'] - $sum_data['tRemainPrice']) }}원</span>
                                @endif
                            </p>
                        @endif
                        <div class="mt-5">
                            <span class="required">*</span> 산출기준 = 수수료공제전수강총액 - 결제수단별 수수료
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">추가공제액</label>
                    <div class="col-md-9">
                        <div class="form-inline">
                            <div class="pull-left mr-10">
                                <button type="button" name="btn_deduct_add" data-deduct-type="n" class="btn btn-sm btn-default bg-dark no-margin">+추가</button>
                                <input type="hidden" name="lec_deduct_price" title="단과반추가공제액" required="required" value="0"/>
                                <input type="hidden" name="pack_deduct_price" title="종합반추가공제액" required="required" value="0"/>
                            </div>
                            <div id="layer_deduct_n" class="pull-left">
                                <div class="mb-5{{ $is_calc_hist === true && empty($data['DeductData']) === false ? ' hide' : '' }}">
                                    @if($prod_type == 'CP')
                                        <input type="hidden" name="deduct_n_lec_type[]" title="추가공제강좌구분" value="P"/>
                                    @else
                                        <select class="form-control set-calc-price" name="deduct_n_lec_type[]" title="추가공제강좌구분">
                                            <option value="L">단과반</option>
                                            <option value="P">종합반</option>
                                        </select>
                                    @endif
                                    <select class="form-control set-calc-price" name="deduct_n_type[]" title="추가공제구분">
                                        <option value="-">-</option>
                                        <option value="+">+</option>
                                    </select>
                                    <input type="text" name="deduct_n_name[]" class="form-control" title="추가공제명" value="" style="width: 260px;">
                                    <input type="text" name="deduct_n_price[]" class="form-control set-calc-price set-add-comma" title="추가공제금액" value=""> 원
                                </div>
                                @if($is_calc_hist === true)
                                    @foreach($data['DeductData'] as $row)
                                        <div class="mb-5">
                                            @if($prod_type == 'CP')
                                                <input type="hidden" name="deduct_n_lec_type[]" title="추가공제강좌구분" value="P"/>
                                            @else
                                                <select class="form-control set-calc-price" name="deduct_n_lec_type[]" title="추가공제강좌구분">
                                                    <option value="L"{{ $row['DeductLecType'] == 'L' ? ' selected="selected"' : '' }}>단과반</option>
                                                    <option value="P"{{ $row['DeductLecType'] == 'P' ? ' selected="selected"' : '' }}>종합반</option>
                                                </select>
                                            @endif
                                            <select class="form-control set-calc-price" name="deduct_n_type[]" title="추가공제구분">
                                                <option value="-"{{ $row['DeductPrice'] < 0 ? ' selected="selected"' : '' }}>-</option>
                                                <option value="+"{{ $row['DeductPrice'] >= 0 ? ' selected="selected"' : '' }}>+</option>
                                            </select>
                                            <input type="text" name="deduct_n_name[]" class="form-control" title="추가공제명" value="{{ $row['DeductName'] }}" style="width: 260px;">
                                            <input type="text" name="deduct_n_price[]" class="form-control set-calc-price set-add-comma" title="추가공제금액" value="{{ number_format(abs($row['DeductPrice'])) }}"> 원
                                            <a href="#none" class="btn-deduct-delete red ml-5 set-calc-price">[삭제]</a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">강사료산정대상금액</label>
                    <div class="col-md-5 form-inline item">
                        <input type="text" name="target_price" class="form-control set-add-comma" title="강사료산정대상금액" required="required" value="" readonly="readonly"> 원
                        <input type="hidden" name="lec_target_price" title="단과반강사료산정대상금액" required="required" value=""/>
                        <input type="hidden" name="pack_target_price" title="종합반강사료산정대상금액" required="required" value=""/>
                        <p class="form-control-static{{ $prod_type == 'CP' ? ' hide' : '' }}">
                            = 단과반 (<span id="layer_lec_target_price">0</span>원)
                            + 종합반 (<span id="layer_pack_target_price">0</span>원)
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">
                            <span class="required">*</span> 산출기준 = 수수료공제후수강총액 - 추가공제액
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">강사료비율</label>
                    <div class="col-md-9 form-inline">
                        <div class="item">
                            @if($prod_type == 'CP')
                                <input type="hidden" name="lec_calc_type" title="단과반강사료비율구분" required="required" value="R"/>
                                <input type="hidden" name="lec_calc_rate" title="단과반강사료비율" required="required" value="0"/>
                            @else
                                <span class="pr-5">[단과반]</span>
                                <select class="form-control" name="lec_calc_type" title="단과반강사료비율구분" required="required">
                                    <option value="R"{{ $data['LecCalcType'] == 'R' ? ' selected="selected"' : '' }}>비율(%)</option>
                                    <option value="T"{{ $data['LecCalcType'] == 'T' ? ' selected="selected"' : '' }}>시급(원)</option>
                                    <option value="P"{{ $data['LecCalcType'] == 'P' ? ' selected="selected"' : '' }}>월정액(원)</option>
                                </select>
                                <input type="text" name="lec_calc_rate" class="form-control set-add-comma" title="단과반강사료비율" required="required" value="{{ $data['LecCalcRate'] }}">
                            @endif
                        </div>
                        <div class="item{{ $prod_type == 'CP' ? '' : ' mt-5' }}">
                            <span class="{{ $prod_type == 'CP' ? 'hide' : 'pr-5' }}">[종합반]</span>
                            <select class="form-control" name="pack_calc_type" title="종합반강사료비율구분">
                                <option value="R"{{ $data['PackCalcType'] == 'R' ? ' selected="selected"' : '' }}>비율(%)</option>
                                <option value="T"{{ $data['PackCalcType'] == 'T' ? ' selected="selected"' : '' }}>시급(원)</option>
                                <option value="P"{{ $data['PackCalcType'] == 'P' ? ' selected="selected"' : '' }}>월정액(원)</option>
                            </select>
                            <input type="text" name="pack_calc_rate" class="form-control set-add-comma" title="종합반강사료비율" required="required" value="{{ $data['PackCalcRate'] }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">정산기준계산금액<br/>(강사료)</label>
                    <div class="col-md-5 form-inline item">
                        <input type="text" name="calc_price" class="form-control set-add-comma" title="정산기준계산금액(강사료)" required="required" value="" readonly="readonly"> 원
                        <input type="hidden" name="lec_calc_price" title="단과반정산기준계산금액(강사료)" required="required" value=""/>
                        <input type="hidden" name="pack_calc_price" title="종합반정산기준계산금액(강사료)" required="required" value=""/>
                        <p class="form-control-static{{ $prod_type == 'CP' ? ' hide' : '' }}">
                            = 단과반 (<span id="layer_lec_calc_price">0</span>원)
                            + 종합반 (<span id="layer_pack_calc_price">0</span>원)
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">
                            <span class="required">*</span> 산출기준 = 강사료산정대상금액 * 강사료비율
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">원천세</label>
                    <div class="col-md-5 form-inline item">
                        <input type="number" name="tax_rate" class="form-control" title="원천세율" required="required" value="{{ empty($data['TaxRate']) === false ? $data['TaxRate'] : '3.3' }}" style="width: 80px;"> %
                        <input type="text" name="tax_price" class="form-control set-add-comma ml-20" title="원천세" required="required" value="" readonly="readonly"> 원
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">
                            <span class="required">*</span> 산출기준 = 정산기준계산금액 * 원천세율(%)
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">기타추가공제액</label>
                    <div class="col-md-9">
                        <div class="form-inline">
                            <div class="pull-left mr-10">
                                <button type="button" name="btn_deduct_add" data-deduct-type="e" class="btn btn-sm btn-default bg-dark no-margin">+추가</button>
                                <input type="hidden" name="etc_deduct_price" title="기타추가공제액" required="required" value=""/>
                            </div>
                            <div id="layer_deduct_e" class="pull-left">
                                <div class="mb-5{{ $is_calc_hist === true && empty($data['EtcDeductData']) === false ? ' hide' : '' }}">
                                    <select class="form-control" name="deduct_e_type[]" title="기타공제구분">
                                        <option value="-">-</option>
                                        <option value="+">+</option>
                                    </select>
                                    <input type="text" name="deduct_e_name[]" class="form-control" title="기타공제명" value="" style="width: 300px;">
                                    <input type="text" name="deduct_e_price[]" class="form-control set-add-comma" title="기타공제금액" value=""> 원
                                </div>
                                @if($is_calc_hist === true)
                                    @foreach($data['EtcDeductData'] as $row)
                                        <div class="mb-5">
                                            <select class="form-control" name="deduct_e_type[]" title="기타공제구분">
                                                <option value="-"{{ $row['DeductPrice'] < 0 ? ' selected="selected"' : '' }}>-</option>
                                                <option value="+"{{ $row['DeductPrice'] >= 0 ? ' selected="selected"' : '' }}>+</option>
                                            </select>
                                            <input type="text" name="deduct_e_name[]" class="form-control" title="기타공제명" value="{{ $row['DeductName'] }}" style="width: 300px;">
                                            <input type="text" name="deduct_e_price[]" class="form-control set-add-comma" title="기타공제금액" value="{{ number_format(abs($row['DeductPrice'])) }}"> 원
                                            <a href="#none" class="btn-deduct-delete red ml-5">[삭제]</a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">강사료지급액</label>
                    <div class="col-md-5 form-inline item">
                        <input type="text" name="final_calc_price" class="form-control set-add-comma" title="정산기준계산금액" required="required" value="" readonly="readonly"> 원
                        <button type="button" name="btn_calc" class="btn btn-sm btn-primary ml-10">강사료산출하기</button>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">
                            <span class="required">*</span> 산출기준 = 정산기준계산금액 - 원천세 - 기타추가공제액
                        </p>
                    </div>
                </div>
                @if($is_calc_hist === true)
                    <div class="form-group no-border-bottom">
                        <label class="control-label col-md-1-1">최근정산일자</label>
                        <div class="col-md-9 form-inline">
                            <p class="form-control-static red bold">{{ $data['RegDatm'] }}</p>
                            <button type="button" name="btn_calc_excel" class="btn btn-sm btn-success ml-10">엑셀다운로드</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-success mr-10">정산하기</button>
                <button class="btn btn-primary" type="button" id="btn_list">목록</button>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var $datatable;
        var $regi_form = $('#regi_form');
        var $list_table = $('#list_order_table');

        $(document).ready(function() {
            // 주문목록
            $datatable = $list_table.DataTable({
                serverSide : false,
                ajax : false,
                dom : 'T<"clear">rtip',
                scrollX : true,
                //scrollXInner : 1776,
                scrollY : 500,
                scrollCollapse : true,
                responsive : false,
                paging : false,
                info : false
            });

            // 주문목록 엑셀다운로드 버튼 클릭
            $regi_form.on('click', 'button[name="btn_order_excel"]', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/calc/offLectureHL/orderListExcel') }}', $regi_form.serializeArray(), 'POST');
                }
            });

            // 정산하기 버튼 클릭
            $regi_form.submit(function() {
                var _url = '{{ site_url('/business/calc/offLectureHL/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        goList();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            var addValidate = function() {
                var is_deduct_check = true;
                var is_etc_deduct_check = true;

                if ($regi_form.find('.list_order_tr').length < 1) {
                    alert('정산대상이 없습니다.');
                    return false;
                }

                if (parseInt(onlyNumber($regi_form.find('[name="pre_price"]').val()), 10) < 1) {
                    alert('수수료공제전 수강총액은 0원보다 커야만 합니다.');
                    return false;
                }

                if ($regi_form.find('[name="prod_type"]').val() === 'CP') {
                    if (parseInt(onlyNumber($regi_form.find('[name="pre_price"]').val()), 10) < parseInt(onlyNumber($regi_form.find('[name="pack_remain_price"]').val()), 10)) {
                        alert('수수료공제전 수강총액은 수수료공제후 수강총액보다 커야만 합니다.');
                        return false;
                    }
                }

                // 추가공제액 항목명 체크
                $regi_form.find('[name="deduct_n_price[]"]').each(function(index, item) {
                    if (item.value.length > 0) {
                        if ($regi_form.find('[name="deduct_n_name[]"]').eq(index).val().length < 1) {
                            alert((index + 1) + '번째 추가공제액 항목명이 없습니다.');
                            $regi_form.find('[name="deduct_n_name[]"]').eq(index).focus();
                            is_deduct_check = false;
                            return false;
                        }
                    }
                });

                if (is_deduct_check === false) {
                    return false;
                }

                // 추가공제액 항목명 체크
                $regi_form.find('[name="deduct_e_price[]"]').each(function(index, item) {
                    if (item.value.length > 0) {
                        if ($regi_form.find('[name="deduct_e_name[]"]').eq(index).val().length < 1) {
                            alert((index + 1) + '번째 기타추가공제액 항목명이 없습니다.');
                            $regi_form.find('[name="deduct_e_name[]"]').eq(index).focus();
                            is_etc_deduct_check = false;
                            return false;
                        }
                    }
                });

                if (is_etc_deduct_check === false) {
                    return false;
                }

                return confirm('해당 정보로 정산하시겠습니까?');
            };

            // 추가사항, 기타추가사항 추가 버튼 클릭
            $regi_form.on('click', 'button[name="btn_deduct_add"]', function() {
                var type = $(this).data('deduct-type');
                var layer = $regi_form.find('#layer_deduct_' + type);
                var set_class = type === 'n' ? ' set-calc-price' : '';
                var html = '<div class="mb-5">'
                    + layer.children('div').eq(0).html()
                    + '<a href="#none" class="btn-deduct-delete red ml-5' + set_class + '">[삭제]</a>'
                    + '</div>';
                layer.append(html);
            });

            // 추가사항, 기타추가사항 삭제 버튼 클릭
            $regi_form.on('click', '.btn-deduct-delete', function() {
                $(this).parent().remove();

                // 추가공제액 필드값이 삭제될 경우 강사료 자동 산출
                if ($(this).prop('class').indexOf('set-calc-price') > -1) {
                    setFinalCalcPrice();
                }
            });

            // 추가공제액 필드값이 변경될 경우 강사료 자동 산출
            $regi_form.on('change', '.set-calc-price', function() {
                setFinalCalcPrice();
            });

            // 강사료산출하기 버튼 클릭
            $regi_form.on('click', 'button[name="btn_calc"]', function() {
                setFinalCalcPrice();
            });

            @if($is_calc_hist === true)
                // 이전 강사료정산 데이터를 기준으로 강사료 자동 산출
                $(function() {
                    setFinalCalcPrice();
                });
            @endif

            // 최종 강사료 계산
            var setFinalCalcPrice = function() {
                var final_calc_price;
                var lec_remain_price, pack_remain_price;
                var lec_deduct_price = 0, pack_deduct_price = 0;
                var lec_target_price, pack_target_price, target_price;
                var lec_calc_type, lec_calc_rate, pack_calc_type, pack_calc_rate;
                var lec_calc_price, pack_calc_price, calc_price;
                var tax_rate, tax_price, etc_deduct_price = 0;
                var deduct_price, signed;

                // 수수료공제후수강총액
                lec_remain_price = parseInt(onlyNumber($regi_form.find('[name="lec_remain_price"]').val()), 10) || 0;
                pack_remain_price = parseInt(onlyNumber($regi_form.find('[name="pack_remain_price"]').val()), 10) || 0;

                // 추가공제액 합계
                $regi_form.find('[name="deduct_n_price[]"]').each(function(index, item) {
                    deduct_price = parseInt(onlyNumber(item.value), 10) || 0;
                    signed = $regi_form.find('[name="deduct_n_type[]"]').eq(index).val() === '+' ? 1 : -1;
                    deduct_price = deduct_price * signed;

                    if ($regi_form.find('[name="deduct_n_lec_type[]"]').eq(index).val() === 'L') {
                        lec_deduct_price += deduct_price;   // 단과반추가공제액
                    } else {
                        pack_deduct_price += deduct_price;  // 종합반추가공제액
                    }
                });
                $regi_form.find('[name="lec_deduct_price"]').val(lec_deduct_price);
                $regi_form.find('[name="pack_deduct_price"]').val(pack_deduct_price);

                // 강사료산정대상금액
                lec_target_price = lec_remain_price + lec_deduct_price;
                pack_target_price = pack_remain_price + pack_deduct_price;
                target_price = lec_target_price + pack_target_price;
                $regi_form.find('[name="lec_target_price"]').val(lec_target_price);
                $regi_form.find('[name="pack_target_price"]').val(pack_target_price);
                $regi_form.find('#layer_lec_target_price').text(addComma(lec_target_price));
                $regi_form.find('#layer_pack_target_price').text(addComma(pack_target_price));
                $regi_form.find('[name="target_price"]').val(target_price).trigger('keyup');

                // 단과반정산기준계산금액 (강사료비율 적용)
                lec_calc_type = $regi_form.find('[name="lec_calc_type"]').val();
                lec_calc_rate = parseInt(onlyNumber($regi_form.find('[name="lec_calc_rate"]').val()), 10) || 0;
                lec_calc_price = getCalcPrice(lec_target_price, lec_calc_type, lec_calc_rate);
                $regi_form.find('[name="lec_calc_price"]').val(lec_calc_price);
                $regi_form.find('#layer_lec_calc_price').text(addComma(lec_calc_price));

                // 종합반정산기준계산금액 (강사료비율 적용)
                pack_calc_type = $regi_form.find('[name="pack_calc_type"]').val();
                pack_calc_rate = parseInt(onlyNumber($regi_form.find('[name="pack_calc_rate"]').val()), 10) || 0;
                pack_calc_price = getCalcPrice(pack_target_price, pack_calc_type, pack_calc_rate);
                $regi_form.find('[name="pack_calc_price"]').val(pack_calc_price);
                $regi_form.find('#layer_pack_calc_price').text(addComma(pack_calc_price));

                // 정산기준계산금액
                calc_price = lec_calc_price + pack_calc_price;
                $regi_form.find('[name="calc_price"]').val(calc_price).trigger('keyup');

                // 원천세
                tax_rate = parseFloat($regi_form.find('[name="tax_rate"]').val()) || 0;
                tax_price = calc_price * (tax_rate / 100);
                tax_price = Math.floor(tax_price);
                $regi_form.find('[name="tax_price"]').val(tax_price).trigger('keyup');

                // 기타추가공제액
                $regi_form.find('[name="deduct_e_price[]"]').each(function(index, item) {
                    deduct_price = parseInt(onlyNumber(item.value), 10) || 0;
                    signed = $regi_form.find('[name="deduct_e_type[]"]').eq(index).val() === '+' ? 1 : -1;
                    deduct_price = deduct_price * signed;
                    etc_deduct_price += deduct_price;   // 기타추가공제액
                });
                $regi_form.find('[name="etc_deduct_price"]').val(etc_deduct_price);

                // 최종 강사료지급액
                final_calc_price = calc_price - tax_price + etc_deduct_price;
                $regi_form.find('[name="final_calc_price"]').val(final_calc_price).trigger('keyup');

                return final_calc_price;
            };

            // 정산기준금액 계산 (강사료산정대상금액에 강사료비율 적용)
            var getCalcPrice = function(target_price, calc_type, calc_rate) {
                var calc_price, hour_rate = 10;

                if (calc_type === 'R') {
                    calc_price = target_price * (calc_rate / 100);  // 강사료비율 적용
                    calc_price = Math.floor(calc_price); // 소숫점 버림
                } else if (calc_type === 'T') {
                    calc_price = calc_rate * hour_rate;
                } else {
                    calc_price = calc_rate;
                }

                return calc_price;
            };

            // 강사료산출 엑셀다운로드 버튼 클릭
            $regi_form.on('click', 'button[name="btn_calc_excel"]', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/calc/offLectureHL/calcExcel') }}', $regi_form.serializeArray(), 'POST');
                }
            });

            // 금액 필드 천단위 콤마 추가
            $regi_form.on('keyup focus', '.set-add-comma', function() {
                var val = onlyNumber($(this).val());
                $(this).val(addComma(val)); // 콤마 추가
            });

            // 목록 이동
            $('#btn_list').click(function() {
                goList();
            });

            var goList = function() {
                location.replace('{{ site_url('/business/calc/offLectureHL/index?prod_type=') }}' + $regi_form.find('[name="prod_type"]').val() + '&' + getQueryString().substr(1));
            };
        });
    </script>
@stop
