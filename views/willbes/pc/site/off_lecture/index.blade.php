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
            {{-- 카테고리 --}}
            <ul class="curriTabs c_both">
                <li><a href="#none" onclick="goUrl('cate_code', '');" class="@if(empty(element('cate_code', $arr_input)) === true) on @endif">전체</a></li>
            @foreach($arr_base['category'] as $idx => $row)
                <li><a href="#none" onclick="goUrl('cate_code', '{{ $row['CateCode'] }}');" class="@if(element('cate_code', $arr_input) == $row['CateCode']) on @endif">{{ $row['CateName'] }}</a></li>
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
                        <tr>
                            <th class="tx-gray">캠퍼스선택</th>
                            <td colspan="9">
                                {{-- 캠퍼스 --}}
                                <ul class="curriSelect">
                                    <li><a href="#none" onclick="goUrl('campus_ccd', '');" class="@if(empty(element('campus_ccd', $arr_input)) === true) on @endif">전체</a></li>
                                @foreach($arr_base['campus'] as $idx => $row)
                                    <li><a href="#none" onclick="goUrl('campus_ccd', '{{ $row['CampusCcd'] }}');" class="@if(element('campus_ccd', $arr_input) == $row['CampusCcd']) on @endif">{{ $row['CampusCcdName'] }}</a></li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                    @if(isset($arr_base['course']) === true)
                        <tr>
                            <th class="tx-gray">과정선택</th>
                            <td colspan="9">
                                {{-- 과정 --}}
                                <ul class="curriSelect">
                                    <li><a href="#none" onclick="goUrl('course_idx', '');" class="@if(empty(element('course_idx', $arr_input)) === true) on @endif">전체</a></li>
                                @foreach($arr_base['course'] as $idx => $row)
                                    <li><a href="#none" onclick="goUrl('course_idx', '{{ $row['CourseIdx'] }}');" class="@if(element('course_idx', $arr_input) == $row['CourseIdx']) on @endif">{{ $row['CourseName'] }}</a></li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th class="tx-gray">과정선택</th>
                            <td colspan="9" class="tx-blue tx-left">* 카테고리 선택시 카테고리별 과정을 확인하실 수 있습니다. 카테고리를 먼저 선택해 주세요!</td>
                        </tr>
                    @endif
                    @if(isset($arr_base['series']) === true)
                        <tr>
                            <th class="tx-gray">직렬선택</th>
                            <td colspan="9">
                                {{-- 직렬 --}}
                                <ul class="curriSelect">
                                    <li><a href="#none" onclick="goUrl('series_ccd', '');" class="@if(empty(element('series_ccd', $arr_input)) === true) on @endif">전체</a></li>
                                    @foreach($arr_base['series'] as $idx => $row)
                                        <li><a href="#none" onclick="goUrl('series_ccd', '{{ $row['ChildCcd'] }}');" class="@if(element('series_ccd', $arr_input) == $row['ChildCcd']) on @endif">{{ $row['ChildName'] }}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                    @if(isset($arr_base['subject']) === true)
                        <tr>
                            <th class="tx-gray">과목선택</th>
                            <td colspan="9">
                                {{-- 과목 --}}
                                <ul class="curriSelect">
                                    <li><a href="#none" onclick="goUrl('subject_idx', '');" class="@if(empty(element('subject_idx', $arr_input)) === true) on @endif">전체</a></li>
                                    @foreach($arr_base['subject'] as $idx => $row)
                                        <li><a href="#none" onclick="goUrl('subject_idx', '{{ $row['SubjectIdx'] }}');" class="@if(element('subject_idx', $arr_input) == $row['SubjectIdx']) on @endif">{{ $row['SubjectName'] }}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th class="tx-gray">과목선택</th>
                            <td colspan="9" class="tx-blue tx-left">* 카테고리 선택시 카테고리별 과목을 확인하실 수 있습니다. 카테고리를 먼저 선택해 주세요!</td>
                        </tr>
                    @endif
                    @if(isset($arr_base['professor']) === true)
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            @if(count($arr_base['professor']) < 1)
                                <td colspan="9" class="tx-blue tx-left">* 선택하신 과목의 교수진이 없습니다.</td>
                            @else
                                <td colspan="9">
                                    {{-- 교수 --}}
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
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Bnr">
            {!! banner('수강신청_단과_중단') !!}
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

            <div class="InfoBtnOff"><a href="{{ front_url('/offinfo/boardInfo/index') }}">강의시간표 안내 <span>▶</span></a></div>
            <div class="InfoBtn mr10"><a href="#none" onclick="openWin('requestInfo')">학원수강 안내 <span>▶</span></a></div>

            <div id="requestInfo" class="willbes-Layer-requestInfo">
                <a class="closeBtn" href="#none" onclick="closeWin('requestInfo')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black">수강신청 <span class="tx-blue">안내</span></div>
                <div class="Layer-Cont">
                    <div class="Layer-SubTit tx-gray">
                        <ul>
                            <li>
                                <strong>학원강좌 수강신청 안내</strong><br>
                                - 학원에서 직접 수강할 수 있는 강좌입니다. (온라인>내강의실에서 수강 불가)  <br>
                                - 학원강좌는 장바구니 담기 없이 바로결제만 가능합니다.<br>
                                - <span class="tx_rad">수강신청 후 정정신청이 불가능</span>합니다. 강의 구성을 꼼꼼히 살핀 후 수강신청해 주세요.
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
                                    <td><span class="acadBox n4">접수중</span></td>
                                    <td class="tx-left">강좌가 개설되었으며 현재 수강신청을 받고 있는 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="acadBox n5">접수예정</span></th>
                                    <td class="tx-left">신규강좌 개설되었으나 아직 수강신청을 받지 않는 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="acadBox n2">온라인접수</span></th>
                                    <td class="tx-left">온라인에서만 수강신청 및 결제가 가능한 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="acadBox n1">방문접수</span></th>
                                    <td class="tx-left">학원에 방문해야만 수강신청 및 결제가 가능한 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="acadBox n3">방문+온라인</span></th>
                                    <td class="tx-left">온라인에서 수강신청 및 결제, 학원방문 후 수강신청 및 결제가 모두 가능한 강좌</td>
                                </tr>
                                <tr>
                                    <th><span class="tx-blue">라이브</span></th>
                                    <td class="tx-left">실시간으로 송출되는 영상으로 수강할 수 있는 강좌 (영상반)</td>
                                </tr>
                                <tr>
                                    <th><span class="tx-blue">실강</span></th>
                                    <td class="tx-left">교수님이 수업하는 강의실에서 직접 수강할 수 있는 강좌</td>
                                </tr>
                                <tr>
                                    <th><img src="{{ img_url('sub/icon_detail.gif') }}"></th>
                                    <td class="tx-left">돋보기 아이콘 클릭 시 하단으로 해당 강좌의 상세정보 열림</td>    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- requestInfo //-->
        </div>
        <!-- willbes-Lec-Search -->

        <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

            <div class="willbes-Lec-Subject tx-dark-black"><span class="MoreBtn"><a href="#none">교제정보 <span>전체보기 ▼</span></a></span></div>

        {{-- 과목별 상품 리스트 --}}
        @foreach($data['subjects'] as $subject_idx => $subject_name)
            <div class="willbes-Lec NG c_both mt20">
                {{--<div class="willbes-Lec-Subject tx-dark-black">· {{ $subject_name }}<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>--}}
                <!-- willbes-Lec-Subject -->

                <div class="willbes-Lec-Line mt20">-</div>
                <!-- willbes-Lec-Line -->

                {{-- 상품 리스트 loop --}}
                @if(element('search_order', $arr_input) == 'course')
                    {{-- 정렬방식이 과정순일 경우 배열키 (OrderNumCourse + ProdCode) 순으로 재정렬 --}}
                    @php ksort($data['list'][$subject_idx]); @endphp
                @endif

                @foreach($data['list'][$subject_idx] as $idx => $row)
                    <a name="{{ $row['ProdCode'] }}"></a>
                    <div id="lec_table_{{ $row['ProdCode'] }}" class="willbes-Lec-Table">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col style="width: 65px;">
                                <col style="width: 85px;">
                                <col style="width: 85px;">
                                <col width="*">
                                <col style="width: 120px;">
                                <col style="width: 70px;">
                                <col style="width: 130px;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-place">{{ $row['CampusCcdName'] }}</td>
                                    <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['ProfNickName'] }}</span></td>
                                    <td class="w-list">{{ $row['CourseName'] }}</td>
                                    <td class="w-data tx-left">
                                        <div class="w-tit w-acad-tit">
                                            <a href="#none" onclick="goShowOff('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 4) }}');" class="prod-name">{{ $row['ProdName'] }}</a>
                                        </div>
                                        <dl class="w-info">
                                            <dt>
                                                <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1', '{{ front_url('/offLecture') }}')">
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
                                        <span class="tx-blue">{{ date('m/d', strtotime($row['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($row['StudyEndDate'])) }}</span> <br/>
                                        <span class="tx11">{{ $row['WeekArrayName'] }}<br/>({{ $row['Amount'] }}회차)</span>
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
                                                    <li class="btnCart"><a href="#none" name="btn_off_cart" data-direct-pay="N" data-is-redirect="Y" data-prod-code="{{ $row['ProdCode'] }}">장바구니</a></li>
                                                    <li class="btnBuy"><a href="#none" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $row['ProdCode'] }}">바로결제</a></li>
                                                @endif
                                            @endif
                                        </ul>
                                    </td>
                                    <td class="w-notice p_re">
                                        <div class="acadInfo NGR n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</div>
                                            <div class="priceWrap chk buybtn p_re">
                                                <span class="price tx-blue">
                                                    <span class="chkBox d_none"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $saletypeccd. ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N' || $row['StudyApplyCcd'] == '654001' ) disabled="disabled" @endif/></span>
                                                    {{ number_format($realsaleprice, 0) }}원
                                                </span>
                                                <span class="discount">(↓{{ $salerate . $salerateunit }})</span>
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
                                                    <a href="#none" class="btnCart" name="btn_off_cart" data-direct-pay="N" data-is-redirect="Y" data-prod-code="{{ $book_row['ProdBookCode']  }}">장바구니</a>
                                                    <a href="#none" class="btnBuy" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $book_row['ProdBookCode']  }}">바로결제</a>
                                                @endif
                                            </div>
                                            <div class="bookbuyInfo">
                                                <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003'){{'tx-red'}}@elseif($book_row['wSaleCcd'] == '112004'){{'tx-purple-gray'}}@endif">
                                                [{{ $book_row['wSaleCcdName'] }}]</label>
                                                <span class="d_none">
                                                    <input type="checkbox" name="prod_code[]"  value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                </span>
                                                <span class="tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                <span class="tx-dark-gray">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                <div>
                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover2','{{ front_url('/offLecture') }}')">
                                        <strong>교재상세정보</strong></a>
                                </div>
                            @else
                                <div>
                                    <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                </div>
                            @endif
                        </div>
                        <!-- lecInfoTable -->
                    </div>
                    <!-- willbes-Lec-Table -->
                @endforeach
            </div>
            <!-- willbes-Lec -->
        @endforeach

            <div id="InfoForm" class="willbes-Layer-Box d3"></div>
        </form>

        {{-- footer script --}}
        @include('willbes.pc.site.off_lecture.only_footer_partial')
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
