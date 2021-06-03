<form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="learn_pattern" value="{{ get_var($tab_data_key, 'off_lecture') }}"/>  {{-- 학습형태 --}}
    <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
        <tbody>
        <tr>
            <td class="w-data tx-left">
                @foreach($tab_data[$tab_data_key] as $idx => $row)
                    <div class="oneBox">
                        <dl class="w-info">
                            <dt>{{ $row['CampusCcdName'] }}<span class="row-line">|</span>
                                {{ $row['CourseName'] }}<span class="row-line">|</span>
                                {{ $row['SubjectName'] }}<span class="row-line">|</span>
                                {{ $row['ProfNickName'] }}
                            </dt>
                        </dl>
                        <div class="w-tit tx-blue">
                            <a href="#none" onclick="goOffLectureShow('{{ $row['ProdCode'] }}', '{{ $tab_data_key }}');" class="prod-name">{{ $row['ProdName'] }}</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>개강일~종강일 : <span class="tx-blue">{{ date('m/d', strtotime($row['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($row['StudyEndDate'])) }}</span>
                                {{ $row['WeekArrayName'] }} ({{ $row['Amount'] }}회차)
                            </dt><br>
                            <dt>수강형태 : <span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span>
                                <span class="NSK ml10 nBox n{{ substr($row['StudyApplyCcd'], -1) == '1' ? '4' : '1' }}">{{ $row['StudyApplyCcdName'] }}</span>
                                <span class="NSK nBox n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</span>
                            </dt><br>
                            @if(empty($row['ProdPriceData'] ) === false)
                                @foreach($row['ProdPriceData'] as $price_row)
                                    @if($loop -> index === 1)
                                        {{--<span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }})--}}
                                        <div class="priceWrap">
                                            @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                            @endif
                                            <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                        </div>
                                    @endif
                                @endforeach

                                @php $saletypeccd = $row['ProdPriceData'][0]['SaleTypeCcd']; @endphp
                            @else
                                @php $saletypeccd = ''; @endphp
                            @endif
                        </dl>
                        <div class="w-buy">
                            <span class="chkBox d_none"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $saletypeccd . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N' || $row['StudyApplyCcd'] == '654001' ) disabled="disabled" @endif/></span>
                            <ul class="three">
                                @if($row['IsSalesAble'] == 'Y')
                                    @if($row['StudyApplyCcd'] != '654002')
                                        <li><a href="#none" class="btn_white btn-off-visit-pay" data-prod-code="{{ $row['ProdCode'] . ':' . $saletypeccd . ':' . $row['ProdCode'] }}">방문결제</a></li>
                                    @endif
                                    @if($row['StudyApplyCcd'] != '654001')
                                        <li><a href="#none" class="btn_gray" name="btn_off_cart" data-direct-pay="N" data-is-redirect="N" data-prod-code="{{ $row['ProdCode'] }}">장바구니</a></li>
                                        <li><a href="#none" class="btn_blue" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $row['ProdCode'] }}">바로결제</a></li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                @endforeach
            </td>
        </tr>
        </tbody>
    </table>
    {{-- 방문결제 레이어 --}}
    <div id="buy_off_visit_continue_layer" class="willbes-Layer-Black common_buy_layer">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('buy_off_visit_continue_layer')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Message NG">
                <p>해당 상품이<br> 학원방문결제 접수에 담겼습니다.</p>
                <p>학원방문결제 접수로<br> 이동하시겠습니까?<p>
            </div>
            <div class="MessageBtns">
                <a href="#none" class="btn_gray answerBox_block">예</a>
                <a href="#none" class="btn_white waitBox_block">계속구매</a>
            </div>
        </div>
        <div class="dim" onclick="closeWin('buy_off_visit_continue_layer')"></div>
    </div>
</form>
{{-- 방문결제 폼 --}}
<form id="regi_visit_form" name="regi_visit_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="learn_pattern" value="{{ get_var($tab_data_key, 'off_lecture') }}"/>  {{-- 학습형태 --}}
    <input type="hidden" name="cart_type" value="off_lecture"/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value="N"/>    {{-- 바로결제 여부 --}}
    <input type="hidden" name="is_visit_pay" value="Y"/>    {{-- 방문결제 여부 --}}
    <input type="hidden" name="prod_code[]" value=""/>  {{-- 상품코드 --}}
</form>
