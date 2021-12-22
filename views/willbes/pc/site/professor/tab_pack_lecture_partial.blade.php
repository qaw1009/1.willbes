<div class="acadBoxWrap">
    <div class="AcadtabBox">
    {{-- 하위탭 리스트 --}}
    @include('willbes.pc.site.professor.stab_partial')
    @if($arr_input['tab'] == 'on_pack_lecture')
        <div id="on_pack_lecture" class="tabContent">
            <div class="willbes-Lec NG c_both">
                <div class="willbes-Lec-Subject tx-dark-black">ㆍ온라인강좌 - 패키지 강의</div>
                <!-- willbes-Lec-Subject -->

                <div class="willbes-Lec-Line">-</div>
                <!-- willbes-Lec-Line -->

                {{-- 운영자패키지 --}}
                @foreach($tab_data['on_pack_lecture'] as $row)
                    <div class="willbes-Lec-Table">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col style="width: 95px;">
                                <col style="width: 665px;">
                                <col style="width: 180px;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-list bg-light-white">{{ $row['CourseName'] }}</td>
                                    <td class="w-data tx-left pl25">
                                        <div class="w-tit">
                                            <a href="{{ site_url('/package/show/cate/') . substr($row['CateCode'], 0, 6) . '/pack/' . $row['PackTypeCcd'] . '/prod-code/' . $row['ProdCode'] }}">
                                                {{ $row['ProdName'] }}
                                            </a>
                                        </div>
                                        <dl class="w-info">
                                            <dt class="mr20">
                                                <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('/package') }}')">
                                                    <strong class="open-info-modal">패키지상세정보</strong>
                                                </a>
                                            </dt>
                                            <dt>개강일 : <span class="tx-blue">{{ $row['StudyStartDate'] }}</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">{{ $row['StudyPeriodCcd'] == '616002' ? $row['StudyEndDate'] : $row['StudyPeriod'] . '일' }}</span></dt>
                                            <dt class="NSK ml15">
                                                <span class="nBox n1">{{ $row['MultipleApply'] === '1' ? '무제한' : $row['MultipleApply'] . '배수'}}</span>
                                            </dt>
                                        </dl>
                                    </td>
                                    <td class="w-notice">
                                        @if(empty($row['ProdPriceData'] ) === false)
                                            @foreach($row['ProdPriceData'] as $price_row)
                                                @if($loop -> index === 1)
                                                    <div class="priceWrap">
                                                        @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                            <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                            <span class="discount">
                                                                {{-- TODO 임용 예외처리 : 운영자패키지 + '원' 일 경우 % 로 변환 (21.12.01 최진영)--}}
                                                                @if($__cfg['SiteGroupCode'] === '1011' && $price_row['SaleRateUnit'] === '원' )
                                                                    ({{ number_format(($price_row['SalePrice'] - $price_row['RealSalePrice'] ) / $price_row['SalePrice'] * 100). '%'}}↓)
                                                                @else
                                                                    ({{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }}↓)
                                                                @endif
                                                            </span>
                                                        @endif
                                                        <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- lecTable -->
                    </div>
                    <!-- willbes-Lec-Table -->
                @endforeach
                {{-- 사용자패키지 --}}
                @foreach($tab_data['on_userpack_lecture'] as $row)
                    <div class="willbes-Lec-Table">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col style="width: 95px;">
                                <col style="width: 665px;">
                                <col style="width: 180px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-list bg-light-white">{{ $row['CourseName'] }}</td>
                                <td class="w-data tx-left pl25">
                                    <div class="w-tit">
                                        <a href="{{ site_url('/userPackage/show/cate/') . substr($row['CateCode'], 0, 6) . '/prod-code/' . $row['ProdCode'] }}">
                                            {{ $row['ProdName'] }}
                                        </a>
                                    </div>
                                </td>
                                <td class="w-notice">
                                    @if(empty($row['ProdPriceData'] ) === false)
                                        @foreach($row['ProdPriceData'] as $price_row)
                                            @if($loop -> index === 1)
                                                <div class="priceWrap">
                                                    @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                        <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                        <span class="discount">({{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }}↓)</span>
                                                    @endif
                                                    <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- lecTable -->
                    </div>
                    <!-- willbes-Lec-Table -->
                @endforeach
            </div>
            <!-- willbes-Lec -->
        </div>
        <!-- on_pack_lecture -->
    @endif

    @if($arr_input['tab'] == 'off_pack_lecture')
        <div id="off_pack_lecture" class="tabContent">
            <div class="willbes-Lec NG c_both">
                <div class="willbes-Lec-Subject tx-dark-black">ㆍ학원강좌 - 패키지 강의</div>
                <!-- willbes-Lec-Subject -->

                <div class="willbes-Lec-Line">-</div>
                <!-- willbes-Lec-Line -->

                @foreach($tab_data['off_pack_lecture'] as $row)
                    <div class="willbes-Lec-Table">
                        <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                            <colgroup>
                                <col style="width: 75px;">
                                <col style="width: 90px;">
                                <col style="width: 590px;">
                                <col style="width: 185px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-place bg-light-white">{{ $row['CampusCcdName'] }}</td>
                                <td class="w-list">{{ $row['CourseName'] }}</td>
                                <td class="w-data tx-left pl15">
                                    <div class="w-tit w-acad-tit">
                                        <a href="{{ site_url('/' . config_item('app_pass_site_prefix') . '/offPackage/show/prod-code/' . $row['ProdCode']) }}">
                                            {{ $row['ProdName'] }}
                                        </a>
                                    </div>
                                    <dl class="w-info acad">
                                        <dt>
                                            <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('/' . config_item('app_pass_site_prefix') . '/offPackage') }}')">
                                                <strong class="open-info-modal">종합반 상세정보</strong>
                                            </a>
                                        </dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>개강월 : <span class="tx-blue">{{ $row['SchoolStartYear'] }}-{{ $row['SchoolStartMonth'] }}</span></dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>수강형태 : <span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span></dt>
                                        <dt class="NSK ml15">
                                            <span class="acadBox n{{ substr($row['StudyApplyCcd'], -1) }}">{{ $row['StudyApplyCcdName'] }}</span>
                                        </dt>
                                    </dl>
                                </td>
                                <td class="w-notice p_re">
                                    <div class="acadInfo NSK n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</div>
                                    @if(empty($row['ProdPriceData']) === false)
                                        @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                            <div class="priceWrap chk buybtn p_re">
                                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                    <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                    <span class="discount">
                                                        {{-- TODO 임용 예외처리 : 종합반 + '원' 일 경우 % 로 변환 (21.12.13 최진영)--}}
                                                        @if($__cfg['SiteGroupCode'] === '1011' && $price_row['SaleRateUnit'] === '원' )
                                                            ({{ number_format(($price_row['SalePrice'] - $price_row['RealSalePrice'] ) / $price_row['SalePrice'] * 100). '%'}}↓)
                                                        @else
                                                            ({{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }}↓)
                                                        @endif
                                                    </span>
                                                @endif
                                                <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                            </div>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- lecTable -->
                    </div>
                    <!-- willbes-Lec-Table -->
                @endforeach
            </div>
            <!-- willbes-Lec -->
        </div>
        <!-- off_pack_lecture -->
    @endif
    </div>
</div>
<div id="InfoForm" class="willbes-Layer-Box d2"></div>
<script src="/public/js/willbes/product_util.js"></script>
