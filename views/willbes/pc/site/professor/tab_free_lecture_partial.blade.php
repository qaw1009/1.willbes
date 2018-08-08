<div class="willbes-Prof-Subject pl-zero pt50 NG tx-dark-black">· 무료강좌</div>
<div class="acadBoxWrap">
    <div class="user-lec-list pt20 c_both">
        <div class="curriWrap c_both">
            <ul class="curriTabs c_both">
                <li><a href="#none" onclick="goUrl('course_idx', '');" class="@if(empty(element('course_idx', $arr_input)) === true) on @endif">전체</a></li>
                @foreach($tab_data['course'] as $idx => $row)
                    <li><a href="#none" onclick="goUrl('course_idx', '{{ $row['CourseIdx'] }}');" class="@if(element('course_idx', $arr_input) == $row['CourseIdx']) on @endif">{{ $row['CourseName'] }}</a></li>
                @endforeach
            </ul>
        </div>
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="learn_pattern" value="on_free_lecture"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
            <div class="willbes-Lec NG mt20 c_both">
                <div class="willbes-Lec-Subject tx-dark-black">· {{ rawurldecode($arr_input['subject_name']) }}<span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span></div>
                <!-- willbes-Lec-Subject -->
                <div class="willbes-Lec-Profdata tx-dark-black">
                    <ul>
                        <li class="ProfImg"><img src="{{ $data['ProfReferData']['lec_list_img'] or '' }}"></li>
                        <li class="ProfDetail">
                            <div class="Obj">
                                {!! $data['ProfSlogan'] !!}
                            </div>
                            <div class="Name">{{ $data['wProfName'] }} 교수님</div>
                        </li>
                        @if($data['StudyCommentData'] != 'N')
                            <li class="Reply tx-blue">
                                <strong>수강후기</strong>
                                <div class="sliderUp vSlider">
                                    <div class="sliderVertical roll-Reply tx-dark-black">
                                        @foreach(json_decode($data['StudyCommentData'], true) as $idx => $row)
                                            <div>{{ $row['Title'] }}</div>
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

                {{-- 교수별 상품 리스트 loop --}}
                @php $pattern = 'free'; @endphp
                @foreach($tab_data['lecture'] as $idx => $row)
                    <div id="lec_table_{{ $row['ProdCode'] }}" class="willbes-Lec-Table">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col style="width: 75px;">
                                <col style="width: 85px;">
                                <col style="width: 490px;">
                                <col style="width: 110px;">
                                <col style="width: 180px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-list">{{ $row['CourseName'] }}</td>
                                <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['wProfName'] }}</span></td>
                                <td class="w-data tx-left pl25">
                                    <div class="w-tit">
                                        <a href="{{ site_url('/lecture/show/cate/' . $__cfg['CateCode'] . '/pattern/' . $pattern . '/prod-code/' . $row['ProdCode']) }}" class="prod-name">{{ $row['ProdName'] }}</a>
                                    </div>
                                    <dl class="w-info">
                                        <dt class="mr20">
                                            <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1','{{ site_url() }}lecture', 'pattern/{{ $pattern }}/')">
                                                <strong>강좌상세정보</strong>
                                            </a>
                                        </dt>
                                        <dt>강의수 : <span class="unit-lecture-cnt tx-blue" data-info="{{ $row['wUnitLectureCnt'] }}">{{ $row['wUnitLectureCnt'] }}강</span></dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="study-period tx-blue" data-info="{{ $row['StudyPeriod'] }}">{{ $row['StudyPeriod'] }}일</span></dt>
                                        <dt class="NSK ml15">
                                            <span class="multiple-apply nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] }}배수</span>
                                            <span class="lecture-progress nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                        </dt>
                                    </dl>
                                    @if($row['IsCart'] == 'N' && $pattern == 'only')
                                        <br/><div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>
                                    @endif
                                </td>
                                <td class="w-notice p_re">
                                    @if( empty($row['LectureSampleData']) === false)
                                        <div class="w-sp one"><a href="#none" onclick="openWin('lec_sample_{{ $row['ProdCode'] }}')">맛보기{{ empty($row['LectureSampleData']) ? '' : count($row['LectureSampleData'])   }}</a></div>
                                        <div id="lec_sample_{{ $row['ProdCode'] }}" class="viewBox">
                                            <a class="closeBtn" href="#none" onclick="closeWin('lec_sample_{{ $row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                            @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                <dl class="NSK">
                                                    <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                                    @if(empty($sample_row['wHD']) === false || empty($sample_row['wWD']) === false) <dt class="tBox t1 black"><a href="{{ $sample_row['wWD'] or $sample_row['wHD'] }}">HIGH</a></dt> @endif
                                                    @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="{{ $sample_row['wSD'] }}">LOW</a></dt> @endif
                                                </dl>
                                            @endforeach
                                        </div>
                                    @endif
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
                                            <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover2','{{ site_url() }}lecture', 'pattern/{{ $pattern }}/')"><strong>교재상세정보</strong></a>
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
            <div class="willbes-Lec-buyBtn">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">바로결제</span>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- willbes-Lec-buyBtn -->
        </form>

        <div id="InfoForm" class="willbes-Layer-Box"></div>
        <!-- willbes-Layer-Box -->

        {{-- 무료강좌 footer script --}}
        @include('willbes.pc.site.lecture.free_footer_partial')
    </div>
</div>