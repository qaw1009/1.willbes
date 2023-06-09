<div class="ListTabs">
    <div class="curriWrap c_both">
        <ul class="curriTabs c_both">
            @if(empty($tab_data['setting_series']) != true)
                <li><a href="#none" onclick="goOpenLectureUrl('series', 'all', '');" class="@if(element('series', $arr_input) == 'all') on @endif">전체</a></li>
                @foreach($tab_data['setting_series'] as $idx => $row)
                    <li><a href="#none" onclick="goOpenLectureUrl('series', '{{ $row['ChildCcd'] }}', '');" class="@if(element('series', $arr_input) == $row['ChildCcd']) on @endif">{{ $row['CcdName'] }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
{{-- 온라인 단강좌 상품 리스트 loop --}}
@php $pattern = 'only'; @endphp
@foreach($tab_data['on_subject'] as $subject_idx => $subject_name)
    <div class="willbes-Lec NG c_both">
        <div class="willbes-Lec-Subject tx-dark-black">· {{ $subject_name }}<span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span></div>
        <!-- willbes-Lec-Subject -->
        <div class="willbes-Lec-Line">-</div>
        <!-- willbes-Lec-Line -->

        {{-- 과목에 해당하는 상품이 없을 경우 --}}
        @if(isset($tab_data['on_lecture'][$subject_idx]) === false)
            @continue
        @endif

        @foreach($tab_data['on_lecture'][$subject_idx] as $idx => $row)
            <div id="lec_table_{{ $row['ProdCode'] }}" class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 290px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="w-list">{{ $row['CourseName'] }}</td>
                        <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['ProfNickName'] }}</span></td>
                        <td class="w-data tx-left pl25">
                            @if($row['LecTypeCcd'] === '607003')
                                <div class="OTclass">
                                    <span>직장인반</span> <a href="#none"  class="lec_type_info">유의사항</a>
                                </div>
                            @endif
                            <div class="w-tit">
                                <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', '{{ $pattern }}');" class="prod-name">{{ $row['ProdName'] }}</a>
                            </div>
                            <dl class="w-info">
                                <dt>강의촬영(실강) : {{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>강의수 : <span class="unit-lecture-cnt tx-blue" data-info="{{ $row['wUnitLectureCnt'] }}">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강기간 : <span class="study-period tx-blue" data-info="{{ $row['StudyPeriod'] }}">{{ $row['StudyPeriodCcd'] == '616002' ? $row['StudyEndDate'] . ' 까지' : $row['StudyPeriod'] . '일' }}</span></dt>
                                <dt class="NSK ml15">
                                    <span class="multiple-apply nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                    <span class="lecture-progress nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                </dt>
                                <br>
                                <dt class="mr20">
                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1', '{{ site_url() }}lecture', 'pattern/{{ $pattern }}/')">
                                        <strong class="open-info-modal">강좌상세정보</strong>
                                    </a>
                                </dt>
                            </dl>
                            @if($row['IsCart'] == 'N' && $pattern == 'only')
                                <br/><div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>
                            @endif
                        </td>
                        <td class="w-notice p_re">
                            @if(empty($row['LectureSampleData']) === false)
                                <div class="w-sp"><a href="#none" onclick="openWin('lec_sample_{{ $row['ProdCode'] }}')">맛보기</a></div>
                                <div id="lec_sample_{{ $row['ProdCode'] }}" class="viewBox">
                                    <a class="closeBtn" href="#none" onclick="closeWin('lec_sample_{{ $row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                    @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                        <dl class="NSK">
                                            <dt class="Tit NG">맛보기</dt>
                                            @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                            @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                        </dl>
                                    @endforeach
                                </div>
                            @endif
                            @if(empty($row['ProdPriceData']) === false)
                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                    <ul class="priceWrap">
                                        <li>
                                            @if($row['IsCart'] == 'Y' || $pattern == 'free')
                                                <span class="chkBox"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_products chk_only_{{ $row['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                            @else
                                                <span class="chkBox" style="width: 14px;"></span>
                                            @endif
                                            <span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span>
                                            {{--<span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>--}}
                                            {{--<span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>--}}

                                            @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                    <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span>
                                            @endif
                                            <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 865px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            @if(empty($row['ProdBookData']) === false)
                                @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                    <div class="w-sub">
                                        <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                        <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                        <span class="chk buybtn p_re">
                                            <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                [{{ $book_row['wSaleCcdName'] }}]
                                            </label>
                                            @if($row['IsCart'] == 'Y' || $pattern == 'free')
                                                <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                            @endif
                                        </span>
                                        <span class="priceWrap">
                                            <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                            <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                        </span>
                                    </div>
                                @endforeach
                                @if($pattern == 'only')
                                    <div class="w-sub tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                @endif
                                <div class="w-sub">
                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover2','{{ site_url() }}lecture', 'pattern/{{ $pattern }}/')">
                                        <strong class="open-info-modal">교재상세정보</strong>
                                    </a>
                                </div>
                                <div class="prod-book-memo d_none">{{ $row['ProdBookMemo'] }}</div>
                            @else
                                <div class="w-sub">
                                    {{ empty($row['ProdBookMemo']) === true ? '※ 별도 구매 가능한 교재가 없습니다.' : $row['ProdBookMemo'] }}
                                </div>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
        @endforeach
    </div>
    <!-- willbes-Lec-Table -->
@endforeach
<!-- willbes-Lec -->
