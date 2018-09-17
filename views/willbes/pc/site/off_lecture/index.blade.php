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
                                            <li><a href="#none" onclick="goUrl('prof_idx', '{{ $row['ProfIdx'] }}');" class="@if(element('prof_idx', $arr_input) == $row['ProfIdx']) on @endif">{{ $row['wProfName'] }}</a></li>
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
            {!! banner('단과_중단') !!}
        </div>
        <!-- willbes-Bnr -->

        <div class="willbes-Lec-Search">
            <div class="inputBox p_re">
                @php $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2) @endphp
                <div class="selectBox">
                    <select id="search_keyword" name="search_keyword" title="직접입력" class="">
                        <option value="ProdName" @if($arr_search_text[0] == 'ProdName') selected="selected" @endif>강좌명</option>
                        <option value="SubjectName" @if($arr_search_text[0] == 'SubjectName') selected="selected" @endif>과목명</option>
                        <option value="wProfName" @if($arr_search_text[0] == 'wProfName') selected="selected" @endif>교수명</option>
                        <option value="CourseName" @if($arr_search_text[0] == 'CourseName') selected="selected" @endif>과정명</option>
                    </select>
                </div>
                <input type="text" id="search_value" name="search_value" maxlength="30" value="{{ element('1', $arr_search_text) }}">
                <button type="button" id="btn_search" onclick="" class="search-Btn">
                    <span>검색</span>
                </button>
            </div>
            <div class="InfoBtn ml10"><a href="#none">강의시간표 안내 <span>▶</span></a></div>
            <div class="InfoBtn"><a href="#none">학원수강 안내 <span>▶</span></a></div>
        </div>
        <!-- willbes-Lec-Search -->

        <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

        {{-- 과목별 상품 리스트 --}}
        @foreach($data['subjects'] as $subject_idx => $subject_name)
            <div class="willbes-Lec NG c_both mt20">
                <div class="willbes-Lec-Subject tx-dark-black">· {{ $subject_name }}<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
                <!-- willbes-Lec-Subject -->

                <div class="willbes-Lec-Line mt20">-</div>
                <!-- willbes-Lec-Line -->

                @foreach($data['list'][$subject_idx] as $idx => $row)
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
                                    <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['wProfName'] }}</span></td>
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
                                        {{ $row['WeekArrayName'] }} ({{ $row['FixNumber'] }}회차)
                                    </td>
                                    <td class="w-notice p_re">
                                        <div class="acadInfo NSK n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</div>
                                        @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                            <div class="priceWrap chk buybtn p_re">
                                                <span class="price tx-blue">
                                                    <span class="chkBox"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                                    {{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                            </div>
                                        @endforeach
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
            <!-- willbes-Lec -->
        @endforeach

            <div class="mb60"></div>
            <div class="willbes-Lec-buyBtn">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">바로결제</span>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- willbes-Lec-buyBtn -->
        </form>

        {{-- footer script --}}
        @include('willbes.pc.site.off_lecture.only_footer_partial')
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">
    </div>
</div>
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
<!-- End Container -->
@stop
