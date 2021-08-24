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
                    <a href="{{ front_url('/userPackage/show/cate/', false, true).$row['CateCode'].'/prod-code/'.$row['ProdCode'] }}">{{ $row['ProdName'] }}</a>
                </div>
                <dl class="w-info tx-gray">
                    <dt>
                @if(empty($row['ProdPriceData'] ) === false)
                    @foreach($row['ProdPriceData'] as $price_row)
                        @if($loop -> index === 1)
                            <div class="priceWrap">
                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                    <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                    <span class="discount">({{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }}↓)</span> ▶
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
