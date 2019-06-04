@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>
        <div class="curriWrap c_both">
            {{-- 과정 --}}
            <ul class="curriTabs c_both">
                <li><a href="#none" onclick="goUrl('course_idx', '');" class="@if(empty(element('course_idx', $arr_input)) === true) on @endif">전체</a></li>
                @foreach($arr_base['course'] as $idx => $row)
                    <li><a href="#none" onclick="goUrl('course_idx', '{{ $row['CourseIdx'] }}');" class="@if(element('course_idx', $arr_input) == $row['CourseIdx']) on @endif">{{ $row['CourseName'] }}</a></li>
                @endforeach
            </ul>
            <div class="CurriBox">
                <table cellspacing="0" cellpadding="0" class="curriTable">
                    <colgroup>
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                    </colgroup>
                    <tbody>
                    {{-- 직렬 --}}
                    @if(isset($arr_base['series']) === true)
                        <tr>
                            <th class="tx-gray">직렬선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a href="#none" onclick="goUrl('series_ccd', '');" class="@if(empty(element('series_ccd', $arr_input)) === true) on @endif">전체</a></li>
                                    @foreach($arr_base['series'] as $idx => $row)
                                        <li><a href="#none" onclick="goUrl('series_ccd', '{{ $row['ChildCcd'] }}');" class="@if(element('series_ccd', $arr_input) == $row['ChildCcd']) on @endif">{{ $row['ChildName'] }}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                    {{-- 과목 --}}
                    @if(isset($arr_base['subject']) === true)
                        <tr>
                            <th class="tx-gray">과목선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a href="#none" onclick="goUrl('subject_idx', '');" class="@if(empty(element('subject_idx', $arr_input)) === true) on @endif">전체</a></li>
                                    @foreach($arr_base['subject'] as $idx => $row)
                                        <li><a href="#none" onclick="goUrl('subject_idx', '{{ $row['SubjectIdx'] }}');" class="@if(element('subject_idx', $arr_input) == $row['SubjectIdx']) on @endif">{{ $row['SubjectName'] }}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                    {{-- 교수 --}}
                    @if(isset($arr_base['professor']) === true)
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            @if(count($arr_base['professor']) < 1)
                                <td colspan="9" class="tx-blue tx-left">* 선택하신 과목의 교수진이 없습니다.</td>
                            @else
                                <td colspan="9">
                                    <ul class="curriSelect">
                                        @foreach($arr_base['professor'] as $idx => $row)
                                            <li><a href="#none" onclick="goUrl('prof_idx', '{{ $row['ProfIdx'] }}');" class="@if(element('prof_idx', $arr_input) == $row['ProfIdx']) on @endif">{{ $row['ProfNickName'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </td>
                            @endif
                        </tr>
                    @else
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            <td colspan="9" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                        </tr>
                    @endif
                    <tr>
                        <th class="tx-gray">대비년도</th>
                        <td colspan="8" class="tx-left">
                            <span>
                                <input type="radio" id="school_year" name="school_year" value="" onclick="goUrl('school_year', '');" @if(empty(element('school_year', $arr_input)) === true) checked="checked" @endif/>
                                <label for="school_year">전체</label>
                            </span>
                            @for($i=2017; $i<=date('Y')+1; $i++)
                                <span>
                                    <input type="radio" id="school_year" name="school_year" value="{{ $i }}" onclick="goUrl('school_year', '{{ $i }}');" @if(element('school_year', $arr_input) == $i) checked="checked" @endif/>
                                    <label for="school_year">{{ $i }}년</label>
                                </span>
                            @endfor
                        </td>
                        <td class="All-Clear">
                            <a href="#none" onclick="location.href=location.pathname"><img src="{{ img_url('sub/icon_clear.gif') }}" style="margin: -2px 6px 0 0">전체해제</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- search -->

        <div class="willbes-Bnr">
            {!! banner($pattern_name . '_중단', '', $__cfg['SiteCode'], '0') !!}
        </div>
        <!-- willbes-Bnr -->

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
                        <option value="SubjectName" @if($arr_search_text[0] == 'SubjectName') selected="selected" @endif>과목명</option>
                        <option value="ProfNickName" @if($arr_search_text[0] == 'ProfNickName') selected="selected" @endif>교수명</option>
                        <option value="CourseName" @if($arr_search_text[0] == 'CourseName') selected="selected" @endif>과정명</option>
                    </select>
                </div>
                <input type="text" id="search_value" name="search_value" maxlength="30" value="{{ element('1', $arr_search_text) }}">
                <button type="button" id="btn_search" onclick="" class="search-Btn">
                    <span>검색</span>
                </button>
            </div>

            <div class="InfoBtn"><a href="#none" onclick="openWin('requestInfo')">수강신청안내 <span>▶</span></a></div>
            <div id="requestInfo" class="willbes-Layer-requestInfo">
                <a class="closeBtn" href="#none" onclick="closeWin('requestInfo')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black">수강신청 <span class="tx-blue">안내</span></div>
                <div class="Layer-Cont">
                    <div class="Layer-SubTit tx-gray">
                        <ul>
                            <li>
                                <strong>도서구입비 소득공제 시행에 따른 분리결제 적용 안내</strong><br>
                                - 소득공제 대상 상품(교재)와 비대상 상품 (강의)을 함께 주문하실 수 없습니다. <br>
                                (소득공제를 위한 가맹점 분리로 인해 2회 결제 진행)<br>
                                - 반드시 <span class="tx-red">강의와 교재를 각각 결제</span>해주시기 바랍니다. 
                            </li>
                            <li>
                                <strong>아이콘 안내</strong><br>
                                - 강좌리스트에 보여지고 있는 아이콘에 대한 설명입니다. 참고하시어 수강신청해 주세요.
                            </li>
                        </ul>
                    </div>
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable csTable under-gray upper-black tx-gray">
                            <colgroup>
                                <col style="width: 130px;">
                                <col style="width: auto;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td><span class="nBox n4">완강</span></td>
                                    <td class="tx-left">모든 강의 제작 및 업데이트가 완료된 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="nBox n2">진행중</span></th>
                                    <td class="tx-left">강의 업데이트가 진행중인 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="nBox n3">예정</span></th>
                                    <td class="tx-left">신규강좌 업데이트가 예정중인 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="nBox n1">2배수</span></th>
                                    <td class="tx-left">공유 방지를 위해 전체강의시간/개별강의시간의 2배까지 수강이 가능한 강좌</td>
                                </tr>
                                <tr>
                                    <th><img src="{{ img_url('sub/icon_detail.gif') }}"></th>
                                    <td class="tx-left">돋보기 아이콘 클릭 시 해당 강좌의 상세정보 팝업 노출</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- requestInfo //-->
        </div>
        <!-- willbes-Lec-Search -->

        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

        {{-- 과목별 상품 리스트 --}}
        @foreach($data['subjects'] as $subject_idx => $subject_name)
            <div class="willbes-Lec NG c_both mt20">
                <div class="willbes-Lec-Subject tx-dark-black">
                    · {{ $subject_name }}
                    <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                </div>
                <!-- willbes-Lec-Subject -->
                {{-- 교수명 타이틀 loop --}}
                @foreach($data['professor_names'][$subject_idx] as $prof_idx => $prof_name)
                    <div class="willbes-Lec-Profdata tx-dark-black">
                        <ul>
                            <li class="ProfImg"><img src="{{ $data['professor_refers'][$prof_idx]['lec_list_img'] or '' }}"></li>
                            <li class="ProfDetail">
                                <div class="Obj">
                                    {!! str_first_pos_after($prof_name, '::') !!}
                                </div>
                                <div class="Name">{{ str_first_pos_before($prof_name, '::') }} 교수님</div>
                            </li>
                            @if(isset($data['professor_study_comments'][$subject_idx][$prof_idx]) === true && $data['professor_study_comments'][$subject_idx][$prof_idx] != 'N')
                                <li class="Reply tx-blue">
                                    <strong>수강후기</strong>
                                    <div class="sliderUp vSlider">
                                        <div class="sliderVertical roll-Reply tx-dark-black">
                                            @foreach(json_decode($data['professor_study_comments'][$subject_idx][$prof_idx], true) as $idx => $board_row)
                                                <div>{{ $board_row['Title'] }}</div>
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
                    @if(element('search_order', $arr_input) == 'course')
                        {{-- 정렬방식이 과정순일 경우 배열키 (OrderNumCourse + ProdCode) 순으로 재정렬 --}}
                       @php ksort($data['list'][$subject_idx][$prof_idx]); @endphp
                    @endif

                    @foreach($data['list'][$subject_idx][$prof_idx] as $idx => $row)
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
                                            <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 4) }}', '{{ $pattern }}');" class="prod-name">{{ $row['ProdName'] }}</a>
                                        </div>
                                        <dl class="w-info">
                                            <dt class="mr20">
                                                <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1', '{{ site_url() }}lecture', 'pattern/{{ $pattern }}/')">
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
                                        @if($pattern == 'free' && $row['FreeLecTypeCcd'] == '652002')
                                            <div class="w-sp100">
                                                보강동영상 비밀번호 입력
                                                <div>
                                                    <input type="password" id="free_lec_passwd_{{ $row['ProdCode'] }}" name="free_lec_passwd" placeholder="****" maxlength="20">
                                                    <button type="button" name="btn_check_free_passwd" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 4) }}', '{{ $pattern }}');"><span>확인</span></button>
                                                </div>
                                            </div>
                                        @else
                                            @if(empty($row['LectureSampleData']) === false)
                                                <div class="w-sp one"><a href="#none" onclick="openWin('lec_sample_{{ $row['ProdCode'] }}')">맛보기</a></div>
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
                @endforeach
            </div>
            <!-- willbes-Lec -->
        @endforeach

            <div class="mb60"></div>
            <div class="willbes-Lec-buyBtn">
                <ul>
                    @if($pattern == 'only')
                    <li class="btnAuto180 h36">
                        <button type="submit" name="btn_cart" data-direct-pay="N" data-is-redirect="Y" class="mem-Btn bg-blue bd-dark-blue">
                            <span>장바구니</span>
                        </button>
                    </li>
                    @endif
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

        {{-- footer script --}}
        @include('willbes.pc.site.lecture.' . $pattern . '_footer_partial')
    </div>
    {!! banner('수강신청_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
</div>
{!! popup('657002') !!}
<!-- End Container -->
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
@stop
