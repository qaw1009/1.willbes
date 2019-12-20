@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        <!--@include('willbes.pc.layouts.partial.site_menu')//-->

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

                    <div class="InfoBtn"><a href="#none" onclick="openWin('requestInfo')">방문결제안내 <span>▶</span></a></div>
                    <div id="requestInfo" class="willbes-Layer-requestInfo">
                        <a class="closeBtn" href="#none" onclick="closeWin('requestInfo')">
                            <img src="{{ img_url('prof/close.png') }}">
                        </a>
                        <div class="Layer-Tit NG tx-dark-black">방문결제 <span class="tx-blue">안내</span></div>
                        <div class="Layer-Cont">
                            <div class="Layer-SubTit tx-gray">
                                <ul>
                                    <li>
                                        <strong>학원방문결제 안내</strong><br>
                                        - 학원에서 직접 수강할 수 있는 강좌입니다. (온라인>내강의실에서 수강 불가)<br>  
                                        - 학원강좌는 장바구니 담기 없이 바로결제만 가능합니다.<br>
                                        - <span class="tx-red">수강신청 후 정정신청이 불가능</span>합니다. 강의 구성을 꼼꼼히 살핀 후 수강신청해 주세요.<br>
                                        - 방문결제 접수완료 시 결제가 진행되지 않은 상태입니다.<br>
                                        반드시 <span class="tx-red">학원에 방문하시어 결제를 진행</span>하셔야 정상적인 수강이 가능합니다.
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
                                                    <strong class="open-info-modal">종합반 상세정보</strong>
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