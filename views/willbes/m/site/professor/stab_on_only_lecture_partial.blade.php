<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="learn_pattern" value="{{ get_var($tab_data_key, 'on_lecture') }}"/>  {{-- 학습형태 --}}
    <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
        <tbody>
        <tr>
            <td class="w-data tx-left">
            {{-- 온라인 단강좌 상품 리스트 loop --}}
            @foreach($tab_data[$tab_data_key] as $idx => $row)
                <div class="oneBox">
                @if($row['LecTypeCcd'] === '607003')
                    <div class="OTclass mr10"><span>직장인반</span></div>
                @endif
                    <dl class="w-info">
                        <dt>{{ $row['CourseName'] }}<span class="row-line">|</span>{{ $row['SubjectName'] }}<span class="row-line">|</span>{{ $row['ProfNickName'] }}</dt>
                    </dl>
                    <div class="w-tit tx-blue">
                        <a href="#none" onclick="goLectureShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'only');">
                            {{ $row['ProdName'] }}
                        </a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>강의촬영(실강) : {{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'], 0, 4) . '년 ' . substr($row['StudyStartDate'], 5, 2) . '월' }}</dt><br>
                        <dt>강의수 : <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount']) === false)/{{$row['wScheduleCount']}}강@endif</span><span class="row-line">|</span></dt>
                        <dt>수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span>
                            <span class="NSK ml10 nBox n1">{{ $row['MultipleApply'] === '1' ? '무제한' : $row['MultipleApply'].'배수' }}</span>
                            <span class="NSK nBox n{{ substr($row['wLectureProgressCcd'], -1) + 1 }}">{{ $row['wLectureProgressCcdName'] }}</span>
                        </dt>
                    </dl>
                @if(empty($row['ProdPriceData']) === false)
                    <ul class="priceWrap">
                        @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                            <li>
                                <label>
                                @if($row['IsCart'] == 'Y')
                                    <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_products chk_only_{{ $row['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif />
                                @endif
                                    <span class="pl5">{{ $price_row['SaleTypeCcdName'] }} :</span>
{{--                                    <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }})--}}

                                    @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                        <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                        <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                    @endif
                                    <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                </label>
                            </li>
                        @endforeach

                        @if($row['IsCart'] == 'N')
                            <li class="tx-red">※ 바로결제만 가능한 상품입니다. 상세 페이지에서 결제해 주세요.</li>
                        @endif
                    </ul>

                    <div class="w-buy">
                        <ul class="two">
                        @if($row['IsCart'] == 'Y')
                            <li><a href="#none" name="btn_cart" data-direct-pay="N" data-is-redirect="Y" class="btn_gray">장바구니</a></li>
                            <li><a href="#none" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="btn_blue">바로결제</a></li>
                        @endif
                        </ul>
                    </div>
                @endif
                </div>
            @endforeach
            </td>
        </tr>
        </tbody>
    </table>
</form>
