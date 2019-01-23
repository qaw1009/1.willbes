@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>
            <div class="mem-Tit mem-Acad-Tit">
                <img src="{{ img_url('login/logo.gif') }}">
                <span class="tx-blue">학원 방문결제 접수</span>
            </div>
            <div class="widthAuto">
                <div class="curriWrap c_both mb25">
                    <ul class="curriTabs c_both">
                        <li><a href="#none" onclick="goUrl('cate_code', '');" class="@if(empty(element('cate_code', $arr_input)) === true) on @endif">전체</a></li>
                        @foreach($arr_base['category'] as $idx => $row)
                            <li><a href="#none" onclick="goUrl('cate_code', '{{ $row['CateCode'] }}');" class="@if(element('cate_code', $arr_input) == $row['CateCode']) on @endif">{{ $row['CateName'] }}</a></li>
                        @endforeach
                    </ul>
                    <div class="CurriBox">
                        <ul class="btn tx-gray">
                            <li><a href="{{front_url('/OffVisitPackage')}}">종합반</a></li>
                            <li><a class="on" href="{{front_url('/OffVisitLecture')}}">단과반</a></li>
                        </ul>
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
                                        <ul class="curriSelect">
                                            <ul class="curriSelect">
                                                <li><a href="#none" onclick="goUrl('course_idx', '');" class="@if(empty(element('course_idx', $arr_input)) === true) on @endif">전체</a></li>
                                                @foreach($arr_base['course'] as $idx => $row)
                                                    <li><a href="#none" onclick="goUrl('course_idx', '{{ $row['CourseIdx'] }}');" class="@if(element('course_idx', $arr_input) == $row['CourseIdx']) on @endif">{{ $row['CourseName'] }}</a></li>
                                                @endforeach
                                            </ul>
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
                <div class="Content widthAuto810 p_re">
                    <div class="willbes-Lec-Search mb15">
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
                        <div class="InfoBtn"><a href="#none">방문결제 안내 <span>▶</span></a></div>
                    </div>
                    <!-- willbes-Lec-Search -->


                    <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
                        <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                        @foreach($data['subjects'] as $subject_idx => $subject_name)
                            <div class="willbes-Lec NG c_both mb25">
                                <div class="willbes-Lec-Subject tx-dark-black">· {{ $subject_name }}<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
                                <!-- willbes-Lec-Subject -->

                                <div class="willbes-Lec-Line">-</div>
                                <!-- willbes-Lec-Line -->

                                @foreach($data['list'][$subject_idx] as $idx => $row)
                                <div class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 75px;">
                                            <col style="width: 95px;">
                                            <col style="width: 450px;">
                                            <col style="width: 200px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="w-list">{{ $row['CourseName'] }}</td>
                                            <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['wProfName'] }}</span></td>
                                            <td class="w-data tx-left">
                                                <div class="w-tit w-acad-tit">
                                                    {{ $row['ProdName'] }}<span class="oBox campus_{{$row['CampusCcd']}} ml10 NSK">{{ $row['CampusCcdName'] }}</span>
                                                </div>
                                                <dl class="w-info acad">
                                                    <dt>
                                                        <a href="#none">
                                                            <strong>강좌상세정보</strong>
                                                        </a>
                                                    </dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="tx-blue">{{ $row['StudyPatternCcdName'] }}</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="tx-gray">{{ date('Y-m-d', strtotime($row['SaleStartDatm'])) }} ~ {{ date('Y-m-d', strtotime($row['SaleEndDatm'])) }}</dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="acadInfo NSK n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</div>
                                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                    <div class="priceWrap chk buybtn p_re">
                                                    <span class="price tx-blue">
                                                        <span class="chkBox"><input type="checkbox" name="prod_code[]" id="{{$row['ProdCode']}}" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
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

                    </form>

                </div>

                {{-- footer script --}}
                @include('willbes.pc.site.off_visit.only_footer_partial')
            </div>
    </div>
    <script type="text/javascript">
    </script>
    <!-- End Container -->
@stop
