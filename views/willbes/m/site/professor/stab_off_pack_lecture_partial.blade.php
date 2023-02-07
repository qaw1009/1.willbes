<table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
    <tbody>
    @foreach($tab_data[$tab_data_key] as $idx => $row)
        <tr>
            <td class="w-data tx-left">
                <dl class="w-info">
                    <dt>{{ $row['CampusCcdName'] }}<span class="row-line">|</span>{{ $row['CourseName'] }}
                </dl>
                <div class="w-tit">
                    <a href="#none" onclick="goOffPackShow('{{ $row['ProdCode'] }}');">{{ $row['ProdName'] }}</a>
                </div>
                <dl class="w-info tx-gray">
                    <dt>개강월 <span class="tx-blue">{{ $row['SchoolStartYear'] }}년 {{ $row['SchoolStartMonth'] }}월</span> <span class="row-line">|</span></dt>
                    <dt>수강형태 <span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span>
                        <span class="NSK ml10 nBox n{{ substr($row['StudyApplyCcd'], -1) == '1' ? '4' : '1' }}">{{ $row['StudyApplyCcdName'] }}</span>
                        <span class="NSK nBox n{{$row['AcceptStatusCcd'] === '675004' ? '7' : substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</span>
                    </dt><br>
                    <dt>
                        @if(empty($row['ProdPriceData'] ) === false)
                            @foreach($row['ProdPriceData'] as $price_row)
                                @if($loop -> index === 1)
                                    <div class="priceWrap">
                                        @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                            <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                            <span class="discount">
                                            {{-- TODO 임용 예외처리 : 종합반 + '원' 일 경우 % 로 변환 (21.12.13 최진영)--}}
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
