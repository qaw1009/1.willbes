<div class="willbes-Prof-Subject pl-zero NG tx-dark-black">· 개설강좌</div>
<div class="acadBoxWrap">
    <ul class="tabWrap tabDepthAcad">
        <li><a href="#acad1" class="on">온라인강좌</a></li>
        <li><a href="#acad2">학원강좌</a></li>
    </ul>
    <div class="AcadtabBox">
        <div id="acad1" class="tabContent">
            <div class="tabGrid">
                <ul class="tabWrap acadline three">
                    <li><a href="#on_only_lecture" class="on">단강좌</a></li>
                    <li><a href="#on_pack_normal">추천패키지</a></li>
                    <li><a href="#on_pack_choice">선택패키지</a></li>
                </ul>
            </div>
            <div class="AcadListBox user-lec-list c_both">
                <div id="on_only_lecture" class="tabContent">
                    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="learn_pattern" value="on_lecture"/>  {{-- 학습형태 --}}
                        <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
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
                                                    <dt class="NSK ml15">
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
                                                            <dl class="NSK">
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
                    </form>
                    {{-- 온라인 단강좌 footer script --}}
                    @include('willbes.pc.site.lecture.only_footer_partial')
                </div>

                <div id="on_pack_normal" class="tabContent">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">추천패키지</div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 95px;">
                                    <col style="width: 665px;">
                                    <col style="width: 180px;">
                                </colgroup>
                                <tbody>

                                @php $pack = '648001'; @endphp
                                @foreach($tab_data['on_pack_normal'] as $row)
                                    <tr>
                                        <td class="w-list bg-light-white">{{$row['CourseName']}}</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="w-tit">
                                                <a href="{{ site_url('/package/show/cate/').substr($row['CateCode'], 0, 4).'/pack/'.$pack.'/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt class="mr20">
                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('/package') }}', '', 'InfoFormPack')">
                                                        <strong class="open-info-modal">패키지상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDate']}}</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            @if(empty($row['ProdPriceData'] ) === false)
                                                @foreach($row['ProdPriceData'] as $price_row)
                                                    @if($loop -> index === 1)
                                                        <div class="priceWrap">
                                                            <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                                            <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- lecTable -->
                        </div>
                        <!-- willbes-Lec-Table -->
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="on_pack_choice" class="tabContent">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">선택패키지</div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 95px;">
                                    <col style="width: 665px;">
                                    <col style="width: 180px;">
                                </colgroup>
                                <tbody>

                                @php $pack = '648002'; @endphp
                                @foreach($tab_data['on_pack_choice'] as $row)
                                    <tr>
                                        <td class="w-list bg-light-white">{{$row['CourseName']}}</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="w-tit">
                                                <a href="{{ site_url('/package/show/cate/').substr($row['CateCode'], 0, 4).'/pack/'.$pack.'/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt class="mr20">
                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('/package') }}', '', 'InfoFormPack')">
                                                        <strong class="open-info-modal">패키지상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDate']}}</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            @if(empty($row['ProdPriceData'] ) === false)
                                                @foreach($row['ProdPriceData'] as $price_row)
                                                    @if($loop -> index === 1)
                                                        <div class="priceWrap">
                                                            <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                                            <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- lecTable -->
                        </div>
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="InfoForm" class="willbes-Layer-Box"></div>
                <div id="InfoFormPack" class="willbes-Layer-Box d2"></div>
                <!-- willbes-Layer-Box -->
            </div>
        </div>
        <!-- 온라인강좌 -->

        <div id="acad2" class="tabContent">
            <div class="tabGrid">
                <ul class="tabWrap acadline two">
                    <li><a href="#off_only_lecture" class="on">단과</a></li>
                    <li><a href="#off_pack_normal">종합반</a></li>
                </ul>
            </div>
            <div class="AcadListBox user-lec-list c_both">
                <div id="off_only_lecture" class="tabContent">
                    <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="learn_pattern" value="off_lecture"/>  {{-- 학습형태 --}}
                        <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                        <div class="willbes-Lec NG c_both mt20">
                            <div class="willbes-Lec-Subject tx-dark-black">단과<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
                            <!-- willbes-Lec-Subject -->

                            <div class="willbes-Lec-Line">-</div>
                            <!-- willbes-Lec-Line -->

                            @foreach($tab_data['off_lecture'] as $idx => $row)
                                <div class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 75px;">
                                            <col style="width: 85px;">
                                            <col style="width: 75px;">
                                            <col style="width: 355px;">
                                            <col style="width: 165px;">
                                            <col style="width: 185px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="w-place">{{ $row['CampusCcdName'] }}</td>
                                            <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['ProfNickName'] }}</span></td>
                                            <td class="w-list">{{ $row['CourseName'] }}</td>
                                            <td class="w-data tx-left">
                                                <div class="w-tit w-acad-tit">{{ $row['ProdName'] }}</div>
                                                <dl class="w-info acad">
                                                    <dt>
                                                        <a href="#none"><strong>강좌상세정보</strong></a>
                                                    </dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강형태 : <span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="acadBox n{{ substr($row['StudyApplyCcd'], -1) }}">{{ $row['StudyApplyCcdName'] }}</span>
                                                    </dt>
                                                </dl><br/>
                                            </td>
                                            <td class="w-schedule">
                                                <span class="tx-blue">{{ date('m/d', strtotime($row['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($row['StudyEndDate'])) }}</span> <br/>
                                                {{ $row['WeekArrayName'] }} ({{ $row['Amount'] }}회차)
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="acadInfo NSK n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</div>
                                                @if(empty($row['ProdPriceData']) === false)
                                                    @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                        <div class="priceWrap chk buybtn p_re">
                                                            <span class="price tx-blue">
                                                                <span class="chkBox"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                                                {{ number_format($price_row['RealSalePrice'], 0) }}원
                                                            </span>
                                                            <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                {{-- 방문결제 버튼 --}}
                                                @if($row['StudyApplyCcd'] != '654002' && $row['IsSalesAble'] == 'Y')
                                                    <div class="visitBuy"><a href="#none" class="btn-off-visit-pay" data-prod-code="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}">방문결제</a></div>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="w-tit tx-black">▷ 강좌정보</div>
                                                <div class="w-txt">
                                                    <strong>{{ $row['ProdName'] }}</strong><br/>
                                                    {!! $row['Content'] !!}<br/>
                                                    * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecInfoTable -->
                                </div>
                                <!-- willbes-Lec-Table -->
                            @endforeach
                        </div>
                    </form>
                    {{-- 학원 단과 footer script --}}
                    @include('willbes.pc.site.off_lecture.only_footer_partial')
                </div>
                <div id="off_pack_normal" class="tabContent">
                    <div class="willbes-Lec NG c_both mt20">
                        <div class="willbes-Lec-Subject tx-dark-black">종합반</div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        @foreach($tab_data['off_pack_lecture'] as $row)
                            <div class="willbes-Lec-Table p_re">
                                <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                    <colgroup>
                                        <col style="width: 75px;">
                                        <col style="width: 90px;">
                                        <col style="width: 590px;">
                                        <col style="width: 185px;">
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td class="w-place bg-light-white">{{$row['CampusCcdName']}}</td>
                                        <td class="w-list">{{$row['CourseName']}}</td>
                                        <td class="w-data tx-left pl15">
                                            <div class="w-tit w-acad-tit">
                                                <a href="{{ site_url('/' . config_item('app_pass_site_prefix') . '/offPackage/show/prod-code/' . $row['ProdCode']) }}">{{$row['ProdName']}}</a>
                                            </div>
                                            <dl class="w-info acad">
                                                <dt>
                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('/' . config_item('app_pass_site_prefix') . '/offPackage') }}', '', 'InfoFormOffPack')">
                                                        <strong class="open-info-modal">종합반 상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>개강월 : <span class="tx-blue">{{$row['SchoolStartYear']}}-{{$row['SchoolStartMonth']}}</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강형태 : <span class="tx-blue">{{$row['StudyPatternCcdName']}}</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="acadBox n{{ substr($row['StudyApplyCcd'], -1) }}">{{$row['StudyApplyCcdName']}}</span>
                                                </dt>
                                            </dl><br/>
                                        </td>
                                        <td class="w-notice p_re">
                                            <div class="acadInfo NSK n{{ substr($row['AcceptStatusCcd'], -1) }}">{{$row['AcceptStatusCcdName']}}</div>
                                            @if(empty($row['ProdPriceData']) === false)
                                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                    <div class="priceWrap chk buybtn p_re">
                                                        <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                        <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
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
                </div>
                <div id="InfoFormOffPack" class="willbes-Layer-Box d2"></div>
                <!-- willbes-Layer-Box -->
            </div>
        </div>
        <!-- 학원강좌 -->
    </div>
</div>