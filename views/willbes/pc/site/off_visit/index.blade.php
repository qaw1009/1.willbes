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
                    <ul class="curriTabs c_both">
                        <li><a href="#none" onclick="goUrl('cate_code', '');" class="@if(empty(element('cate_code', $arr_input)) === true) on @endif">전체</a></li>
                        @foreach($arr_base['category'] as $idx => $row)
                            <li><a href="#none" onclick="goUrl('cate_code', '{{ $row['CateCode'] }}');" class="@if(element('cate_code', $arr_input) == $row['CateCode']) on @endif">{{ $row['CateName'] }}</a></li>
                        @endforeach
                    </ul>
                    <div class="CurriBox">
                        <ul class="btn btnthree tx-gray">
                            <li><a href="{{front_url('/OffVisitPackage')}}">종합반</a></li>
                            <li><a {{$learn_pattern === 'off_lecture' ? 'class=on' : ''}} href="{{front_url('/OffVisitLecture')}}">단과반</a></li>
                            <li><a {{$learn_pattern === 'off_lecture_before' ? 'class=on' : ''}} href="{{front_url('/OffVisitLecture/index/pattern/before')}}">선접수</a></li>
                        </ul>
                        <table cellspacing="0" cellpadding="0" class="curriTable @if($learn_pattern === 'off_lecture_before'){{'d_none'}}@endif">
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

                @if($learn_pattern === 'off_lecture_before')
                <div class="willbes-Mypage-TESTZONE c_both mb25">
                    <div class="willbes-Cart-Txt willbes-Mypage-Txt NGR p_re pb20">
                        <p class="title"><span class="tx-red mr10">[필독!]</span><a href="#none">선접수 수강신청 안내사항 ▼</a></p>
                        <table class="txtTable tx-black pb-zero" style="display: none;" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td>
                                    <strong>1. 선접수 수강신청 대상</strong><br>
                                    * GS-1순환 김기홍 행정쟁송법 실강·실영상 수강생<br>
                                    * GS-1순환 김유미 인사노무관리 실강·실영상 수강생<br>
                                    * GS-1순환 김유미 경영조직 실강/실영상 실강·실영상 수강생<br>
                                    <br>
                                    <strong>2. 수강신청 기간 : 홈페이지 및 선접수 수강신청 대상자 추후 문자공지 예정</strong><br>
                                    <span class="tx-red">* 상기 기간 이후 수강신청은 방문접수로만 가능합니다.</span><br>
                                    <br>
                                    <strong>3. 수강신청 강의 : GS-2순환 김기홍 행정쟁송법, 김유미 인사노무관리/경영조직</strong><br>
                                    <br>
                                    <strong>4. 선접수 과목 등록하면서 일반접수 과목 함께 등록하는 경우</strong><br>
                                    * 예시1. 김유미T 강의 선접수 대상자 but 김기홍T 강의 일반접수 대상자인 경우<br>
                                    ▶ 선접수 기간에 김유미T 강의 + 김기홍T <span class="tx-shadow">실영상반</span> 접수 가능<br>
                                    ▶ 선접수 기간에 김기홍T 실강 강의가 마감 안된 경우 <br>
                                    일반접수 기간에 김기홍T 실영상반 → 실강반 변경 가능<br>
                                    * 예시2. 김기홍T 강의 선접수 대상자 but 김유미T 강의 일반접수 대상자인 경우<br>
                                    ▶선접수 기간에 <span class="tx-shadow">김기홍T 강의만 접수 가능</span> + <span class="tx-shadow">일반접수 기간</span>에 <span class="tx-shadow">김유미T 강의 접수 가능</span><br>
                                    * 예시3. 김유미 or 김기홍 선접수 대상자가 선접수 기간에 그외 일반접수 과목(ex: 김정일T 행정쟁송) 같이 접수 가능<br>
                                    <br>
                                    <strong>5. 종합반의 경우 종합반 수강신청 기간에 실강/실영상 마감제한 없이 수강신청 가능</strong><br>
                                    (종합반 수강신청 기간 종합반 카페 및 문자 공지 예정)<br>
                                    * 종합반의 경우는 GS-2순환 강의 4과목을 선택하셔야 수강신청이 완료됩니다.<br>
                                    <strong>6. 기타 선접수 관련 사항</strong><br>
                                    * 교차 선접수 가능<br>
                                    예시) 김유미T GS1 평일 인사관리 수강 → 김유미T GS2 주말 인사관리 신청 가능<br>
                                    * 선접수 대상자 내에서도 실강 경쟁有 (단, 선접수 기간 동안 실영상반은 마감 없이 신청 가능) <br>
                                    <br>
                                    <strong>7. 수강신청 방법 : 방문신청 가능, 온라인신청 가능(모바일 신청 불가)</strong><br>
                                    * 온라인 수강신청 방법 : <span class="tx-red">홈페이지 로그인(필수)</span> → 우측 상단 학원수강신청 &gt; "선접수 수강신청" 메뉴 클릭<br>
                                    * 종합반 원서에 작성된 성함/연락처와 동일한 성함/연락처 정보로 홈페이지 회원 가입 및 로그인을 하셔야 합니다.<br>
                                    * 3/9(월) 11시부터 "선접수 수강신청" 메뉴가 노출됩니다.<br>
                                    <br>
                                    <strong>8. 수강신청 완료 여부 및 신청 과목 확인 방법</strong><br>
                                    (통합 홈페이지 수강신청 내역 확인 방법_기존 방법 예시입니다.)<br>
                                    홈페이지 로그인 → 내 강의실 → 학원강좌 → 수강신청강좌 에서 확인<br>
                                    <span class="tx-shadow">* 별도의 수강증을 발급받지 않으셔도 학원 수강정보에서 신청이 확인되시면 수강신청이 확정된 것으로 수강증은 추후 강의실 입장 전까지
                    데스크에서 발급받으시기 바랍니다. <br>
                    * 수강증 발급 순서가 아닌 온라인or방문접수 수강신청 순으로 실강/실영상반 수강신청이 확정됩니다.</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                <!-- curriWrap -->
                <div class="Content widthAuto810 p_re">
                    <div class="willbes-Lec-Search p_re mb15">
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
                        <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                        @foreach($data['subjects'] as $subject_idx => $subject_name)
                            <div class="willbes-Lec NG c_both mb25">
                                <div class="willbes-Lec-Subject tx-dark-black">· {{ $subject_name }}<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
                                <!-- willbes-Lec-Subject -->

                                <div class="willbes-Lec-Line">-</div>
                                <!-- willbes-Lec-Line -->

                                {{-- 상품 리스트 loop --}}
                                @if(element('search_order', $arr_input) == 'course')
                                    {{-- 정렬방식이 과정순일 경우 배열키 (OrderNumCourse + ProdCode) 순으로 재정렬 --}}
                                    @php ksort($data['list'][$subject_idx]); @endphp
                                @endif

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
                                            <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['ProfNickName'] }}</span></td>
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
                                                    <dt class="tx-gray">{{ date('Y-m-d', strtotime($row['StudyStartDate'])) }} ~ {{ date('Y-m-d', strtotime($row['StudyEndDate'])) }}</dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="acadInfo NSK n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</div>
                                                @if(empty($row['ProdPriceData']) === false)
                                                    @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                        <div class="priceWrap chk buybtn p_re">
                                                            <span class="price tx-blue">
                                                                <span class="chkBox"><input type="checkbox" name="prod_code[]" id="{{$row['ProdCode']}}" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                                                {{ number_format($price_row['RealSalePrice'], 0) }}원
                                                            </span>
                                                            <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                        </div>
                                                    @endforeach
                                                @endif
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
