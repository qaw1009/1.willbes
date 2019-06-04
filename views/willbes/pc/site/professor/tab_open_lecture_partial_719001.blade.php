<div class="ListTabs">
    <ul>
        <li><a href="#none" onclick="goUrl('course_idx', '');" class="@if(empty(element('course_idx', $arr_input)) === true) on @endif">전체</a><span class="row-line">|</span></li>
        @foreach($tab_data['on_course'] as $idx => $row)
            <li><a href="#none" onclick="goUrl('course_idx', '{{ $row['CourseIdx'] }}');" class="@if(element('course_idx', $arr_input) == $row['CourseIdx']) on @endif">{{ $row['CourseName'] }}</a><span class="row-line">|</span></li>
        @endforeach
    </ul>
</div>
<div class="willbes-Lec NG c_both">
    <div class="willbes-Lec-Subject tx-dark-black">단강좌<span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span></div>
    <!-- willbes-Lec-Subject -->
    <div class="willbes-Lec-Profdata tx-dark-black">
        <ul>
            <li class="ProfImg"><img src="{{ $data['ProfReferData']['lec_list_img'] or '' }}"></li>
            <li class="ProfDetail">
                <div class="Obj">
                    {!! $data['ProfSlogan'] !!}
                </div>
                <div class="Name">{{ $data['ProfNickName'] }} 교수님</div>
            </li>
            @if(empty($tab_data['study_comment']) === false)
                <li class="Reply tx-blue">
                    <strong>수강후기</strong>
                    <div class="sliderUp vSlider">
                        <div class="sliderVertical roll-Reply tx-dark-black">
                            @foreach($tab_data['study_comment'] as $idx => $row)
                                <div>{{ hpSubString($row['Title'], 0, 25, '...') }}</div>
                            @endforeach
                        </div>
                    </div>
                </li>
            @endif
        </ul>
    </div>
    <!-- willbes-Lec-Profdata -->

    <div class="willbes-Lec-Line">-</div>
    <!-- willbes-Lec-Line -->

    {{-- 온라인 단강좌 상품 리스트 loop --}}
    @php $pattern = 'only'; @endphp
    @foreach($tab_data['on_lecture'] as $idx => $row)
        <div id=" {{ $row['ProdCode'] }}" class="willbes-Lec-Table">
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
                        <div class="w-tit">
                            <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 4) }}', 'only');" class="prod-name">{{ $row['ProdName'] }}</a>
                        </div>
                        <dl class="w-info">
                            <dt class="mr20">
                                <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1','{{ site_url('/lecture') }}', 'pattern/{{ $pattern }}/')">
                                    <strong class="open-info-modal">강좌상세정보</strong>
                                </a>
                            </dt>
                            <dt>강의수 : <span class="unit-lecture-cnt tx-blue" data-info="{{ $row['wUnitLectureCnt'] }}">{{ $row['wUnitLectureCnt'] }}강@if(empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span></dt>
                            <dt><span class="row-line">|</span></dt>
                            <dt>수강기간 : <span class="study-period tx-blue" data-info="{{ $row['StudyPeriod'] }}">{{ $row['StudyPeriod'] }}일</span></dt>
                            <dt class="NGR ml15">
                                <span class="multiple-apply nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                <span class="lecture-progress nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                            </dt>
                        </dl>
                        @if($row['IsCart'] == 'N' && $pattern == 'only')
                            <br/><div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>
                        @endif
                    </td>
                    <td class="w-notice p_re">
                        @if( empty($row['LectureSampleData']) === false)
                            <div class="w-sp one"><a href="#none" onclick="openWin('lec_sample_{{ $row['ProdCode'] }}')">맛보기</a></div>
                            <div id="lec_sample_{{ $row['ProdCode'] }}" class="viewBox">
                                <a class="closeBtn" href="#none" onclick="closeWin('lec_sample_{{ $row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                    <dl class="NGR">
                                        <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                        @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                        @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                    </dl>
                                @endforeach
                            </div>
                        @endif
                        @if(empty($row['ProdPriceData']) === false)
                            @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                <div class="priceWrap chk buybtn p_re">
                                    @if($row['IsCart'] == 'Y' || $pattern == 'free')
                                        <span class="chkBox"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_products chk_only_{{ $row['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                    @else
                                        <span class="chkBox" style="width: 14px;"></span>
                                    @endif
                                    <span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span>
                                    <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                    <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                </div>
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
                                <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover2','{{ site_url('/lecture') }}', 'pattern/{{ $pattern }}/')">
                                    <strong class="open-info-modal">교재상세정보</strong>
                                </a>
                            </div>
                            <div class="prod-book-memo d_none">{{ $row['ProdBookMemo'] }}</div>
                        @else
                            <div class="w-sub">
                                <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                            </div>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- lecInfoTable -->
        </div>
        <!-- willbes-Lec-Table -->
    @endforeach
</div>
<!-- willbes-Lec -->