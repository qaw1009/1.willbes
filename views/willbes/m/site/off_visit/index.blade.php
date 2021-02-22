@extends('willbes.m.layouts.master')

@section('page_title', '학원 방문결제 접수')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <form id="url_form" name="url_form" method="GET">
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
    </form>

    <div>
        {{-- 선택 검색영역 --}}
        <ul class="Lec-Selected NG tx-gray">
            <li>
                <select id="cate_code" name="cate_code" title="카테고리" onchange="goReUrl('cate_code', this.value, 'series_ccd,subject_idx,prof_idx');">
                    @foreach($arr_base['category'] as $idx => $row)
                        <option value="{{ $row['CateCode'] }}" @if(element('cate_code', $arr_input) == $row['CateCode'] || $arr_base['category_default'] == $row['CateCode']) selected="selected" @endif>{{ $row['CateName'] }}</option>
                    @endforeach
                </select>
            </li>
            <li>
                <select id="tab" name="tab" title="상품구분" onchange="location.href=this.value;">
                    <option value="{{ front_url('/offVisitPackage') }}">종합반</option>
                    <option value="{{ front_url('/offVisitLecture') }}" @if($learn_pattern == 'off_lecture') selected="selected" @endif>단과반</option>
                    {{--<option value="{{ front_url('/offVisitLecture/index/pattern/before') }}" @if($learn_pattern == 'off_lecture_before') selected="selected" @endif>선접수</option>--}}
                </select>
            </li>
            <li>
                <select id="campus_ccd" name="campus_ccd" title="캠퍼스" onchange="goUrl('campus_ccd', this.value);">
                    <option value="">캠퍼스전체</option>
                    @foreach($arr_base['campus'] as $idx => $row)
                        <option value="{{ $row['CampusCcd'] }}" @if(element('campus_ccd', $arr_input) == $row['CampusCcd']) selected="selected" @endif>{{ $row['CampusCcdName'] }}</option>
                    @endforeach
                </select>
            </li>
            @if(isset($arr_base['course']) === true)
                <li>
                    <select id="course_idx" name="course_idx" title="과정" onchange="goUrl('course_idx', this.value);">
                        <option value="">과정전체</option>
                        @foreach($arr_base['course'] as $idx => $row)
                            <option value="{{ $row['CourseIdx'] }}" @if(element('course_idx', $arr_input) == $row['CourseIdx']) selected="selected" @endif>{{ $row['CourseName'] }}</option>
                        @endforeach
                    </select>
                </li>
            @endif
            @if(isset($arr_base['series']) === true)
                <li>
                    <select id="series_ccd" name="series_ccd" title="직렬" onchange="goReUrl('series_ccd', this.value, 'subject_idx,prof_idx');">
                        <option value="">직렬전체</option>
                        @foreach($arr_base['series'] as $idx => $row)
                            <option value="{{ $row['ChildCcd'] }}" @if(element('series_ccd', $arr_input) == $row['ChildCcd']) selected="selected" @endif>{{ $row['ChildName'] }}</option>
                        @endforeach
                    </select>
                </li>
            @endif
            @if(isset($arr_base['subject']) === true)
                <li>
                    <select id="subject_idx" name="subject_idx" title="과목" onchange="goReUrl('subject_idx', this.value, 'prof_idx');">
                        <option value="">과목전체</option>
                        @foreach($arr_base['subject'] as $idx => $row)
                            <option value="{{ $row['SubjectIdx'] }}" @if(element('subject_idx', $arr_input) == $row['SubjectIdx']) selected="selected" @endif>{{ $row['SubjectName'] }}</option>
                        @endforeach
                    </select>
                </li>
            @endif
            <li>
                <select id="prof_idx" name="prof_idx" title="교수" onchange="goUrl('prof_idx', this.value);">
                    <option value="">교수전체</option>
                    @if(isset($arr_base['professor']) === true)
                        @foreach($arr_base['professor'] as $idx => $row)
                            <option value="{{ $row['ProfIdx'] }}" @if(element('prof_idx', $arr_input) == $row['ProfIdx']) selected="selected" @endif>{{ $row['ProfNickName'] }}</option>
                        @endforeach
                    @endif
                </select>
            </li>
            <li class="resetBtn2">
                <a href="#none" onclick="location.href=location.pathname">초기화</a>
            </li>
        </ul>

        {{-- 정렬/검색어 영역 --}}
        <div class="willbes-Lec-Selected NG c_both tx-gray pb-zero">
            <select id="search_order" name="search_order" title="정렬순서" class="seleProcess width30p" onchange="goUrl('search_order', this.value);">
                <option value="regist" @if(element('search_order', $arr_input) == 'regist') selected="selected" @endif>최근등록순</option>
                <option value="course" @if(element('search_order', $arr_input) == 'course') selected="selected" @endif>과정순</option>
            </select>
        </div>
        @php $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2) @endphp
        <div class="willbes-Lec-Search NG width100p pl20 pr20 pb20 mt10">
            <div class="inputBox width100p p_re">
                <input type="hidden" id="search_keyword" name="search_keyword" value="ProdName"/>
                <input type="text" id="search_value" name="search_value" class="labelSearch width100p" placeholder="강의명" maxlength="30" value="{{ element('1', $arr_search_text) }}"/>
                <button type="button" id="btn_search" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
        </div>

        {{-- 상품 목록 --}}
        <div class="lineTabs lecListTabs c_both">
            <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <colgroup>
                        <col style="width: 87%;">
                        <col style="width: 13%;">
                    </colgroup>
                    <tbody>
                    @foreach($data['subjects'] as $subject_idx => $subject_name)
                        {{-- 과목명 --}}
                        <tr class="replyList willbes-Open-Table hover">
                            <td class="w-data tx-left">
                                <div class="w-tit">{{ $subject_name }}</div>
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>

                        {{-- 상품 리스트 loop --}}
                        @if(element('search_order', $arr_input) == 'course')
                            {{-- 정렬방식이 과정순일 경우 배열키 (OrderNumCourse + ProdCode) 순으로 재정렬 --}}
                            @php ksort($data['list'][$subject_idx]); @endphp
                        @endif

                        <tr class="willbes-Open-List" style="display: table-row;">
                            <td class="w-data tx-left" colspan="2">
                            @foreach($data['list'][$subject_idx] as $idx => $row)
                                @if(empty($row['ProdPriceData']) === false)
                                    @php $price_row = $row['ProdPriceData'][0]; @endphp
                                @endif

                                <div class="oneBox">
                                    <dl class="w-info">
                                        <dt>
                                        @if(empty($price_row) === false)
                                            <input type="checkbox" name="prod_code[]" id="{{ $row['ProdCode'] }}" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/>
                                        @endif
                                            {{ $row['CampusCcdName'] }}<span class="row-line">|</span>
                                            {{ $row['CourseName'] }}<span class="row-line">|</span>
                                            {{ $row['SubjectName'] }}<span class="row-line">|</span>
                                            {{ $row['ProfNickName'] }}
                                        </dt>
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        {{ $row['ProdName'] }}
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>
                                            개강일~종강일 : <span class="tx-blue">{{ date('m/d', strtotime($row['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($row['StudyEndDate'])) }}</span>
                                            {{ $row['WeekArrayName'] }} ({{ $row['Amount'] }}회차)
                                        </dt><br/>
                                        <dt>
                                            <a href="#none" class="lecView" onclick="openWin('InfoForm{{ $row['ProdCode'] }}')">강좌상세정보</a><span class="row-line">|</span>
                                            수강형태 : <span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span>
                                            <span class="NSK ml10 nBox n{{ substr($row['StudyApplyCcd'], -1) == '1' ? '4' : '1' }}">{{$row['StudyApplyCcdName']}}</span>
                                            <span class="NSK nBox n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</span>
                                        </dt><br/>
                                    @if(empty($price_row) === false)
                                        <dt>
{{--                                            <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})--}}

                                            <div class="priceWrap">
                                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                    <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                    <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                                @endif
                                                <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                            </div>
                                        </dt>
                                    @endif
                                    </dl>
                                </div>
                                <div id="InfoForm{{ $row['ProdCode'] }}" class="willbes-Layer-Black NG">
                                    <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
                                        <a class="closeBtn" href="#none" onclick="closeWin('InfoForm{{ $row['ProdCode'] }}')">
                                            <img src="{{ img_url('m/calendar/close.png') }}">
                                        </a>
                                        <h4>{{ $row['ProdName'] }}</h4>
                                        <div class="LecDetailBox">
                                            <h5>강좌정보</h5>
                                            <div class="tx-dark-gray">
                                                {!! $row['Content'] !!}<br/><br/>
                                                * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dim" onclick="closeWin('InfoForm{{ $row['ProdCode'] }}')"></div>
                                </div>
                            @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    {{-- 방문결제 버튼 --}}
    <div id="btn_visit_box" class="lec-btns w100p">
        <ul>
            <li><a href="#none" id="btn_visit_pay" class="btn-purple-line">방문결제 접수</a></li>
        </ul>
    </div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')

    {{-- footer script --}}
    @include('willbes.m.site.off_visit.only_footer_partial')
</div>
<!-- End Container -->
<script type="text/javascript">
</script>
@stop