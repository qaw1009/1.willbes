<div class="willbes-Prof-Subject pl-zero NG tx-dark-black">· 무료강좌</div>
<div class="willbes-Lec-Search p_re">
    <div class="inputBox p_re">
        <div class="selectBox">
            <select id="search_order" name="search_order" class="" onchange="goUrl('search_order', this.value);">
                <option value="regist" @if(element('search_order', $arr_input) == 'regist') selected="selected" @endif>최근등록순</option>
                <option value="course" @if(element('search_order', $arr_input) == 'course') selected="selected" @endif>과정순</option>
            </select>
        </div>
        @php $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2) @endphp
        <div class="selectBox">
            <select id="search_keyword" name="search_keyword" title="직접입력" class="">
                <option value="ProdName" @if($arr_search_text[0] == 'ProdName') selected="selected" @endif>강좌명</option>
            <!--<option value="SubjectName" @if($arr_search_text[0] == 'SubjectName') selected="selected" @endif>과목명</option>
                <option value="ProfNickName" @if($arr_search_text[0] == 'ProfNickName') selected="selected" @endif>교수명</option>
                <option value="CourseName" @if($arr_search_text[0] == 'CourseName') selected="selected" @endif>과정명</option>//-->
            </select>
        </div>
        <input type="text" id="search_value" name="search_value" maxlength="30" value="{{ element('1', $arr_search_text) }}">
        <button type="button" id="btn_search" onclick="" class="search-Btn">
            <span>검색</span>
        </button>
    </div>
</div>
<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="learn_pattern" value="on_free_lecture"/>  {{-- 학습형태 --}}
    <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
    <div class="willbes-Lec NG c_both mt20">
        <div class="willbes-Lec-Profdata tx-dark-black">
            <ul>
                <li class="ProfImg"><img src="{{ $data['ProfReferData']['lec_list_img'] or '' }}"></li>
                <li class="ProfDetail">
                    <div class="Obj">
                        {!! $data['ProfSlogan'] !!}
                    </div>
                    <div class="Name">{{ $data['ProfNickName'] }} {{ $data['AppellationCcdName'] }}</div>
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

        {{-- 교수별 상품 리스트 loop --}}
        @php $pattern = 'free'; @endphp
        @foreach($tab_data['on_free_lecture'] as $idx => $row)
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
                                <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'free');" class="prod-name">{{ $row['ProdName'] }}</a>
                            </div>
                            <dl class="w-info">
                                <dt>강의촬영(실강) : {{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>강의수 : <span class="unit-lecture-cnt tx-blue" data-info="{{ $row['wUnitLectureCnt'] }}">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강기간 : <span class="study-period tx-blue" data-info="{{ $row['StudyPeriod'] }}">{{ $row['StudyPeriod'] }}일</span></dt>
                                <dt class="NGR ml15">
                                    <span class="multiple-apply nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                    <span class="lecture-progress nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                </dt>
                                <br>
                                <dt class="mr20">
                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1','{{ site_url('/lecture') }}', 'pattern/{{ $pattern }}/')">
                                        <strong class="open-info-modal">강좌상세정보</strong>
                                    </a>
                                </dt>
                            </dl>
                            @if($row['IsCart'] == 'N' && $pattern == 'only')
                                <br/><div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>
                            @endif
                        </td>
                        <td class="w-notice p_re">
                            @if($row['FreeLecTypeCcd'] == '652002')
                                <div class="w-sp100">
                                    보강동영상 비밀번호 입력
                                    <div>
                                        <input type="password" id="free_lec_passwd_{{ $row['ProdCode'] }}" name="free_lec_passwd" placeholder="****" maxlength="20">
                                        <button type="button" name="btn_check_free_passwd"  onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'free');"><span>검색</span></button>
                                    </div>
                                </div>
                            @else
                                @if( empty($row['LectureSampleData']) === false)
                                    <div class="w-sp"><a href="#none" onclick="openWin('lec_sample_{{ $row['ProdCode'] }}')">맛보기</a></div>
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
                                        <ul class="priceWrap">
                                            <li>
                                                @if($row['IsCart'] == 'Y' || $pattern == 'free')
                                                    <span class="chkBox"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_products chk_only_{{ $row['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                                @else
                                                    <span class="chkBox" style="width: 14px;"></span>
                                                @endif
                                                <span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span>
{{--                                                <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>--}}
{{--                                                <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>--}}

                                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                    <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                    <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span>
                                                @endif
                                                <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
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
                                <!--<div class="prod-book-memo d_none">{{ $row['ProdBookMemo'] }}</div>//-->
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

<div id="InfoForm" class="willbes-Layer-Box"></div>
<!-- willbes-Layer-Box -->

{{-- 무료강좌 footer script --}}
@include('willbes.pc.site.lecture.free_footer_partial')
<script type="text/javascript">
    $(document).ready(function() {
        // 검색어 입력 후 엔터
        $('#search_value').on('keyup', function() {
            if (window.event.keyCode === 13) {
                goSearch();
            }
        });

        // 검색 버튼 클릭
        $('#btn_search').on('click', function() {
            goSearch();
        });

        var goSearch = function() {
            goUrl('search_text', Base64.encode(document.getElementById('search_keyword').value + ':' + document.getElementById('search_value').value));
        };
    });
</script>