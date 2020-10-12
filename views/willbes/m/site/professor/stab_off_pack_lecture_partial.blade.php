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
                        <span class="NSK nBox n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</span>
                    </dt><br>
                    <dt>
                        @if(empty($row['ProdPriceData'] ) === false)
                            @foreach($row['ProdPriceData'] as $price_row)
                                @if($loop -> index === 1)
                                    <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }})
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
