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
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <colgroup>
                        <col style="width: 87%;">
                        <col style="width: 13%;">
                    </colgroup>
                    <tbody>
                    @foreach($data['list'] as $row)
                        @if(empty($row['ProdPriceData']) === false)
                            @php $price_row = $row['ProdPriceData'][0]; @endphp
                        @endif
                        <tr>
                            <td class="w-data tx-left" colspan="2">
                                <dl class="w-info">
                                    <dt>{{ $row['CampusCcdName'] }}<span class="row-line">|</span>{{$row['CourseName']}}
                                </dl>
                                <div class="w-tit">
                                    <a href="{{ front_url('/offVisitPackage/show/').'prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>
                                        접수기간 <span class="tx-blue">{{ date('Y.m.d', strtotime($row['SaleStartDatm'])) }} ~ {{ date('Y.m.d', strtotime($row['SaleEndDatm'])) }}</span>
                                    </dt><br/>
                                    <dt>
                                        <a href="#none" class="lecView" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ front_url('/offPackage') }}')">강좌상세정보</a> <span class="row-line">|</span>
                                        수강형태 <span class="tx-blue">{{$row['StudyPatternCcdName']}}</span>
                                        <span class="NSK ml10 nBox n{{ substr($row['StudyApplyCcd'], -1) == '1' ? '4' : '1' }}">{{$row['StudyApplyCcdName']}}</span>
                                        <span class="NSK nBox n{{ substr($row['AcceptStatusCcd'], -1) }}">{{$row['AcceptStatusCcdName']}}</span>
                                    </dt><br/>
                                @if(empty($price_row) === false)
                                    <dt>
{{--                                        <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})--}}

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

    {{-- 강의 상세 보기 팝업 --}}
    <div id="InfoForm" class="willbes-Layer-Black NG"></div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')

    {{-- footer script --}}
    @include('willbes.m.site.off_visit.only_footer_partial')
</div>
<!-- End Container -->
<script src="/public/js/willbes/product_util.js"></script>
@stop