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
                {{-- 카테고리 --}}
                <ul class="curriTabs c_both">
                    <li><a href="#none" onclick="goUrl('cate_code', '');" class="@if(empty(element('cate_code', $arr_input)) === true) on @endif">전체</a></li>
                    @foreach($arr_base['category'] as $idx => $row)
                        <li><a href="#none" onclick="goUrl('cate_code', '{{ $row['CateCode'] }}');" class="@if(element('cate_code', $arr_input) == $row['CateCode']) on @endif">{{ $row['CateName'] }}</a></li>
                    @endforeach
                </ul>
                <div class="CurriBox">
                    <ul class="btn tx-gray">
                        <li><a class="on" href="{{front_url('/OffVisitPackage')}}">종합반</a></li>
                        <li><a href="{{front_url('/OffVisitLecture')}}">단과반</a></li>
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

                <div class="willbes-Lec NG c_both mb60">
                    <div class="willbes-Lec-Subject tx-dark-black">· 종합반</div>
                    <!-- willbes-Lec-Subject -->

                    <div class="willbes-Lec-Line">-</div>
                    <!-- willbes-Lec-Line -->
                    @foreach($data['list'] as $row)
                        <div class="willbes-Lec-Table p_re">
                            <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                <colgroup>
                                    <col style="width: 85px;">
                                    <col style="width: 535px;">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-list">{{$row['CourseName']}}</td>
                                    <td class="w-data tx-left">
                                        <div class="w-tit w-acad-tit">
                                            <a href="{{ front_url('/OffVisitPackage/show/').'prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                            <span class="oBox campus_{{$row['CampusCcd']}} ml10 NSK">{{ $row['CampusCcdName'] }}</span>
                                        </div>
                                        <dl class="w-info acad">
                                            <dt>
                                                <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url() }}offPackage')">
                                                    <strong>종합반 상세정보</strong>
                                                </a>
                                            </dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>수강형태 : <span class="tx-blue">{{$row['StudyPatternCcdName']}}</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>접수기간 : <span class="tx-blue">{{ date('Y-m-d', strtotime($row['SaleStartDatm'])) }} ~ {{ date('Y-m-d', strtotime($row['SaleEndDatm'])) }}</span></dt>
                                        </dl>
                                    </td>
                                    <td class="w-notice p_re">
                                        <div class="acadInfo NSK n{{ substr($row['AcceptStatusCcd'], -1) }}">{{$row['AcceptStatusCcdName']}}</div>
                                        @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                            <div class="priceWrap chk buybtn p_re">
                                                <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                    <!-- willbes-Lec-Table -->
                </div>
                <!-- willbes-Lec -->
                </form>
                <div id="InfoForm" class="willbes-Layer-Box willbes-offLine-Layer-Box d3"></div>
            </div>
            {{-- footer script --}}
            @include('willbes.pc.site.off_visit.only_footer_partial')
        </div>
    </div>
    <script src="/public/js/willbes/product_util.js"></script>
    <!-- End Container -->
@stop