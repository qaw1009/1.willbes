<table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
    <colgroup>
        <col style="width: 87%;">
        <col style="width: 13%;">
    </colgroup>
    <tbody>
    @foreach($tab_data[$tab_data_key] as $row)
        <tr>
            <td class="w-data tx-left">
                <dl class="w-info">
                    <dt>{{ $row['CourseName'] }}</dt>
                </dl>
                <div class="w-tit">
                    <a href="{{ front_url('/package/show/cate/', false, true).$row['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'] }}">{{ $row['ProdName'] }}</a>
                </div>
                <dl class="w-info tx-gray">
                    <dt>개강일 <span class="tx-blue">{{ $row['StudyStartDateYM'] }}</span> <span class="row-line">|</span></dt>
                    <dt>수강기간 <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span> <span class="NSK ml10 nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'] . '배수'}}</span></dt><br>
                    <dt>
                @if(empty($row['ProdPriceData'] ) === false)
                    @foreach($row['ProdPriceData'] as $price_row)
                        @if($loop -> index === 1)
{{--                            <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }})--}}

                            <div class="priceWrap">
                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                    <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                    <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                @endif
                                <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                            </div>
                        @endif
                    @endforeach
                @endif
                    </dt>
                </dl>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
