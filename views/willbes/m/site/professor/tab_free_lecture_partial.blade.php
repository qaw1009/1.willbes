<div class="lineTabs lecListTabs c_both pd-zero">
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST' ) !!}
        <input type="hidden" name="learn_pattern" value="on_free_lecture"/>  {{-- 학습형태 --}}
        <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
        <tbody>
        <tr>
            <td class="w-data tx-left">
            {{-- 무료강좌 리스트 loop --}}
            @php $pattern = 'free'; @endphp
            @foreach($tab_data['on_free_lecture'] as $idx => $row)
                <div class="oneBox">
                    <dl class="w-info">
                        <dt>{{ $row['CourseName'] }}<span class="row-line">|</span>{{ $row['SubjectName'] }}<span class="row-line">|</span>{{ $row['ProfNickName'] }}</dt>
                    </dl>
                    <div class="w-tit tx-blue">
                        <a href="#none" onclick="goLectureShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', '{{ $pattern }}');">
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
                    @if($row['FreeLecTypeCcd'] == '652002')
                        <div class="freeLecPass">
                            @if(empty($row['FreeLecPasswd']) === true)
                                <input type="hidden" id="free_lec_passwd_{{ $row['ProdCode'] }}" name="free_lec_passwd" value="" data-chk="p"/>
                                <a href="#none" class="view" onclick="goLectureShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', '{{ $pattern }}');">보강동영상 보기</a>
                            @else
                                <p>보강동영상 비밀번호 입력</p>
                                <input type="password" id="free_lec_passwd_{{ $row['ProdCode'] }}" name="free_lec_passwd" placeholder="****" maxlength="20"/>
                                <a href="#none" name="btn_check_free_passwd" onclick="goLectureShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', '{{ $pattern }}');">확인</a>
                            @endif
                        </div>
                    @else
                        @if(empty($row['ProdPriceData']) === false)
                            <ul>
                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                    <li>
                                        <label>
                                            <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_products chk_only_{{ $row['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif />
                                            <span class="pl5">{{ $price_row['SaleTypeCcdName'] }} :</span>
{{--                                            <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }})--}}

                                            <div class="priceWrap">
                                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                    <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                    <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                                @endif
                                                <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                            </div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="w-buy">
                                <ul class="two">
                                    <li class="btn_blue"><a href="#none" name="btn_free_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
                                </ul>
                            </div>
                        @endif
                    @endif
                </div>
            @endforeach
            </td>
        </tr>
        </tbody>
    </table>
    </form>
</div>
