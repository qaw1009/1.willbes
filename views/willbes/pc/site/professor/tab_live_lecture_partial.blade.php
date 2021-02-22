<form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="learn_pattern" value="off_lecture"/>  {{-- 학습형태 --}}
    <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

    <div class="willbes-Lec NG c_both">
        <div class="willbes-Lec-Subject tx-dark-black">· 전국 라이브 영상반
            <span class="MoreBtn">
                <a href="#none">교재정보 <span>전체보기 ▼</span></a>
            </span>
        </div>
        <!-- willbes-Lec-Subject -->

        <div class="willbes-Lec-Line">-</div>
        <!-- willbes-Lec-Line -->

        @foreach($tab_data['off_lecture'] as $idx => $row)
            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 65px;">
                        <col style="width: 85px;">
                        <col style="width: 85px;">
                        <col width="*">
                        <col style="width: 130px;">
                        <col style="width: 100px;">
                        <col style="width: 150px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="w-place">{{ $row['CampusCcdName'] }}</td>
                        <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['ProfNickName'] }}</span></td>
                        <td class="w-list">{{ $row['CourseName'] }}</td>
                        <td class="w-data tx-left">
                            <div class="w-tit w-acad-tit">
                                <a href="#none" onclick="goShowOff('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}');" class="prod-name">{{ $row['ProdName'] }}</a>
                            </div>
                            <dl class="w-info">
                                <dt>
                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1', '{{ site_url('/' . config_item('app_pass_site_prefix') .'/offLecture') }}')">
                                        <strong class="open-info-modal">강좌상세정보</strong>
                                    </a>
                                </dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강형태 : <span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span></dt>
                                <dt class="ml15">
                                    <span class="acadBox n{{ substr($row['StudyApplyCcd'], -1) }}">{{ $row['StudyApplyCcdName'] }}</span>
                                </dt>
                            </dl>
                        </td>
                        <td class="w-schedule">
                            <span class="tx-blue">{{ $row['StudyStartDate'] }} <br>~ {{ $row['StudyEndDate'] }}</span><br/>
                            {{ $row['WeekArrayName'] }} ({{ $row['Amount'] }}회차)
                        </td>
                        <td>
                            <ul class="lecBuyBtns">
                                @php
                                    if(empty($row['ProdPriceData']) == false) {
                                        $saletypeccd = $row['ProdPriceData'][0]['SaleTypeCcd'];
                                        $salerate = $row['ProdPriceData'][0]['SaleRate'];
                                        $salerateunit = $row['ProdPriceData'][0]['SaleRateUnit'];
                                        $realsaleprice = $row['ProdPriceData'][0]['RealSalePrice'];
                                    } else {
                                        $saletypeccd = '';
                                        $salerate = '';
                                        $salerateunit = '';
                                        $realsaleprice = 0;
                                    }
                                @endphp

                                @if($row['IsSalesAble'] == 'Y')
                                    @if($row['StudyApplyCcd'] != '654002')
                                        <li class="btnVisit"><a class="btn-off-visit-pay" href="#none" data-prod-code="{{ $row['ProdCode'] . ':' . $saletypeccd . ':' . $row['ProdCode'] }}">방문결제</a></li>
                                    @endif
                                    @if($row['StudyApplyCcd'] != '654001')
                                        <li class="btnCart"><a href="#none" name="btn_off_cart" data-direct-pay="N" data-is-redirect="N" data-prod-code="{{ $row['ProdCode'] }}">장바구니</a></li>
                                        <li class="btnBuy"><a href="#none" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $row['ProdCode'] }}">바로결제</a></li>
                                    @endif
                                @endif
                            </ul>
                        </td>
                        <td class="w-notice">
                            <div class="acadInfo n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</div>
                            <div class="priceWrap">
                                <span class="@if($row['ProdPriceData'][0]['SalePrice'] > $realsaleprice) price @else dcprice @endif @if($row['ProdPriceData'][0]['SalePrice'] == $realsaleprice) tx-blue @endif">
                                    <span class="d_none">
                                        <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $saletypeccd. ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N' || $row['StudyApplyCcd'] == '654001' ) disabled="disabled" @endif/>
                                    </span>
                                    @if($row['ProdPriceData'][0]['SalePrice'] > $realsaleprice)
                                        {{ number_format($row['ProdPriceData'][0]['SalePrice']) }}원
                                    @else
                                        {{ number_format($realsaleprice, 0) }}원
                                    @endif
                                </span>
                                @if($row['ProdPriceData'][0]['SalePrice'] > $realsaleprice)
                                    <span class="discount">({{ ($salerateunit == '%' ? $salerate : number_format($salerate, 0)) . $salerateunit }}↓)</span>
                                    <span class="dcprice">{{ number_format($realsaleprice, 0) }}원</span>
                                @endif
                            </div>
                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <div class="lecInfoTable bookInfoTable">
                    @if(empty($row['ProdBookData']) === false)
                        <ul>
                            @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                <li>
                                    <div class="b-obj">
                                        <span>{{ $book_row['BookProvisionCcdName'] }}</span>
                                        {{ $book_row['ProdBookName'] }}
                                    </div>
                                    <div class="bookBuyBtns">
                                        @if($book_row['wSaleCcd'] == '112001')
                                            <a href="#none" class="btnCart" name="btn_off_cart" data-prod-type="book" data-direct-pay="N" data-is-redirect="N" data-prod-code="{{ $book_row['ProdBookCode']  }}">장바구니</a>
                                            <a href="#none" class="btnBuy" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $book_row['ProdBookCode']  }}">바로결제</a>
                                        @endif
                                    </div>
                                    <div class="bookbuyInfo">
                                        <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003'){{'tx-red'}}@elseif($book_row['wSaleCcd'] == '112004'){{'tx-purple-gray'}}@endif">
                                            [{{ $book_row['wSaleCcdName'] }}]
                                        </label>
                                        <span class="d_none">
                                            <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                        </span>
                                        <span class="tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                        <span class="tx-dark-gray">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                        <div>
                            <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover2', '{{ site_url('/' . config_item('app_pass_site_prefix') . '/offLecture') }}')">
                                <strong class="open-info-modal">교재상세정보</strong>
                            </a>
                        </div>
                    @else
                        <div>
                            <span class="w-subtit none">
                                {{ empty($row['ProdBookMemo']) === true ? '※ 별도 구매 가능한 교재가 없습니다.' : $row['ProdBookMemo'] }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
            <!-- willbes-Lec-Table -->
        @endforeach
    </div>
    <!-- willbes-Lec -->
</form>
<div id="InfoForm" class="willbes-Layer-Box"></div>
{{-- 학원 단과 footer script --}}
@include('willbes.pc.site.off_lecture.only_footer_partial')
