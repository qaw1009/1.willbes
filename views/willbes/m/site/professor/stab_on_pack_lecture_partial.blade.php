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
                            <div class="priceWrap">
                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                    <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                    <span class="discount">
                                        {{-- TODO 임용 예외처리 :  '원' 일 경우 % 로 변환 (21.12.01 최진영)--}}
                                        @if($__cfg['SiteGroupCode'] === '1011' && $price_row['SaleRateUnit'] === '원' )
                                            ({{ number_format(($price_row['SalePrice'] - $price_row['RealSalePrice'] ) / $price_row['SalePrice'] * 100). '%'}}↓)
                                        @else
                                            ({{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }}↓)
                                        @endif
                                    </span> ▶
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
