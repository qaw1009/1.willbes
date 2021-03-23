<div class="acadBoxWrap">
    <div class="AcadtabBox">
    {{-- 하위탭 리스트 --}}
    @include('willbes.pc.site.professor.stab_partial')
    @if($arr_input['tab'] == 'on_only_lecture')
        <div id="on_only_lecture" class="tabContent">
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="learn_pattern" value="on_lecture"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                <div class="willbes-Lec NG c_both">
                    <div class="willbes-Lec-Subject tx-dark-black">
                        ㆍ온라인강좌 - 단과 강의
                        <div class="selectBoxForm">
                            <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                        </div>
                    </div>

                    <div class="willbes-Lec-Profdata tx-dark-black">
                        <ul>
                            <li class="ProfImg"><img src="{{ $data['ProfReferData']['lec_list_img'] or '' }}" alt="{{ $data['ProfNickName'] }}"></li>
                            <li class="ProfDetail">
                                <div class="Obj">
                                    {!! $data['ProfSlogan'] !!}
                                </div>
                                <div class="Name">{{ $data['ProfNickName'] }} {{ $data['AppellationCcdName'] }}</div>
                            </li>
                            @if(empty($tab_data['study_comment']) === false)
                                <li class="Reply tx-blue">
                                    <strong>수강후기</strong>
                                    <div class="sliderUp">
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
                    @foreach($tab_data['on_lecture'] as $idx => $row)
                        <div id="{{ $row['ProdCode'] }}" class="willbes-Lec-Table">
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
                                        <div class="w-tit"><a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'only');" class="prod-name">{{ $row['ProdName'] }}</a></div>
                                        <dl class="w-info">
                                            <dt class="mr20">
                                                <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1', '{{ site_url('/lecture') }}', 'pattern/only/')">
                                                    <strong class="open-info-modal">강좌상세정보</strong>
                                                </a>
                                            </dt>
                                            <dt>강의수 : <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강{{ $row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount']) === false ? '/' . $row['wScheduleCount'] . '강' : '' }}</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span></dt>
                                            <dt class="NSK ml15">
                                                <span class="nBox n1">{{ $row['MultipleApply'] === '1' ? '무제한' : $row['MultipleApply'] . '배수'}}</span>
                                                <span class="nBox n{{ substr($row['wLectureProgressCcd'], -1) + 1 }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                            </dt>
                                        </dl>
                                        @if($row['IsCart'] == 'N')
                                            <br/><div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>
                                        @endif
                                    </td>
                                    <td class="w-notice p_re">
                                        @if(empty($row['LectureSampleData']) === false)
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
                                                    @if($row['IsCart'] == 'Y')
                                                        <span class="chkBox"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_products chk_only_{{ $row['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                                    @else
                                                        <span class="chkBox" style="width: 14px;"></span>
                                                    @endif
                                                    {{--<span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>--}}

                                                    @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                        <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                        <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span>
                                                    @endif
                                                    <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
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
                                                    <span class="chk">
                                                        <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                            [{{ $book_row['wSaleCcdName'] }}]
                                                        </label>
                                                        @if($row['IsCart'] == 'Y')
                                                            <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                        @endif
                                                    </span>
                                                    <span class="priceWrap">
                                                        <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                    </span>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="w-sub">
                                                <span class="w-subtit none">
                                                    {{ empty($row['ProdBookMemo']) === true ? '※ 별도 구매 가능한 교재가 없습니다.' : $row['ProdBookMemo'] }}
                                                </span>
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
            </form>
            {{-- 온라인 단강좌 footer script --}}
            @include('willbes.pc.site.lecture.only_footer_partial')
        </div>
        <!-- on_only_lecture -->
    @endif

    @if($arr_input['tab'] == 'off_only_lecture')
        <div id="off_only_lecture" class="tabContent">
            <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="learn_pattern" value="off_lecture"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                <div class="willbes-Lec NG c_both">
                    <div class="willbes-Lec-Subject tx-dark-black">
                        ㆍ학원강좌 - 단과 강의
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
                                    <col style="width: 140px;">
                                    <col style="width: 100px;">
                                    <col style="width: 140px;">
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
                                                    {{ number_format($row['ProdPriceData'][0]['SalePrice'], 0) }}원
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
            {{-- 학원 단과 footer script --}}
            @include('willbes.pc.site.off_lecture.only_footer_partial')
        </div>
        <!-- off_only_lecture -->
    @endif
    </div>
</div>
<div id="InfoForm" class="willbes-Layer-Box"></div>
