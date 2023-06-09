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
                        <li><a href="#none" onclick="goReUrl('cate_code', '', 'series_ccd,subject_idx,prof_idx');" class="@if(empty(element('cate_code', $arr_input)) === true) on @endif">전체</a></li>
                        @foreach($arr_base['category'] as $idx => $row)
                            <li><a href="#none" onclick="goReUrl('cate_code', '{{ $row['CateCode'] }}', 'series_ccd,subject_idx,prof_idx');" class="@if(element('cate_code', $arr_input) == $row['CateCode']) on @endif">{{ $row['CateName'] }}</a></li>
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
                                            <li><a href="#none" onclick="goReUrl('series_ccd', '', 'subject_idx,prof_idx');" class="@if(empty(element('series_ccd', $arr_input)) === true) on @endif">전체</a></li>
                                            @foreach($arr_base['series'] as $idx => $row)
                                                <li><a href="#none" onclick="goReUrl('series_ccd', '{{ $row['ChildCcd'] }}', 'subject_idx,prof_idx');" class="@if(element('series_ccd', $arr_input) == $row['ChildCcd']) on @endif">{{ $row['ChildName'] }}</a></li>
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
                                            <li><a href="#none" onclick="goReUrl('subject_idx', '', 'prof_idx');" class="@if(empty(element('subject_idx', $arr_input)) === true) on @endif">전체</a></li>
                                            @foreach($arr_base['subject'] as $idx => $row)
                                                <li><a href="#none" onclick="goReUrl('subject_idx', '{{ $row['SubjectIdx'] }}', 'prof_idx');" class="@if(element('subject_idx', $arr_input) == $row['SubjectIdx']) on @endif">{{ $row['SubjectName'] }}</a></li>
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
                    @if($__cfg['SiteCode'] ==='2011' && element('cate_code', $arr_input) =='3111')
                    <div class="willbes-Cart-Txt willbes-Mypage-Txt NGR p_re pb20">
                        <p class="title"><span class="tx-red mr10">[필독!]</span><a href="#none">선접수 수강신청 안내사항 ▼</a></p>
                        <table class="txtTable tx-black pb-zero" style="display: none;" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td class="tx14"> 
                                    <h4 class="NG mb10 tx16 tx-dark-blue"><span class="tx-shadow">[ GS1순환 단과선등록 안내사항 ]</span></h4>
                                    <strong>1. 신청 대상자</strong><br>
                                    1) 23년대비 GS0순환 이수진 노동법 [실강/실영상] 수강생<br>
                                    2) 23년대비 GS0순환 문일 행정쟁송법 [실강/실영상] 수강생<br>
                                    <span class="tx-red">※ [온라인첨삭반 / 동영상] 강의 수강자는 선접수 대상자가 아닙니다.</span><br>
                                    <br>
                                    <strong>2. 신청 기간 : <span class="tx-shadow">12/15(금) 11시 ~ 12/16(금) 24시</span></strong><br>                                 
                                    <br>
                                    <strong>3. 신청 강의 : GS1순환 강의</strong><br>
                                    <br>
                                    <strong>4. 신청 방법 : 홈페이지(모바일: PC버전 가능) / 방문 신청</strong><br>
                                    ① 온라인신청: 로그인 → 학원수강신청 → 단과선접수 클릭<br>
                                    ② 방문신청: 신분증 지참 후 방문<br>
                                    <span class="tx-shadow">※ 온라인 신청을 권장드립니다.</span><br>
                                    <br>
                                    <strong>5. 수강신청 확인 방법: 로그인 → 내강의실 → 학원강좌 → 수강신청강좌 → 단과반 탭 클릭</strong><br>
                                    <br>
                                    <strong>6. 수강증: 강의실 입장 전까지 데스크에서 발급</strong><br>
                                    <span class="tx-shadow">※ 신분증 지참 필수</span><br>
                                    <br>
                                    <strong>7. GS1순환 <a href="https://job.willbes.net/support/gosiNotice/show/cate/309002?board_idx=442776&s_cate_code=309002&s_cate_code_disabled=Y" target="_blank" class="tx-red">시간표 보기 ></a></strong><br>
                                    <br>
                                    <strong>8. 유의사항</strong><br>
                                    1) 결제순으로 수강신청이 확정됩니다.<br>
                                    <span class="tx-red">2) 단과 선접수 시 실강 잔여좌석이 없을 수 있습니다. (종합반 수강신청 여부에 따라 잔여좌석이 상이합니다.)<br>
                                    3) 기간 내 수강신청을 하더라도 실강은 선착순으로 마감되며, 실영상반/온라인첨삭반은 수강신청 가능합니다.</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
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
                                                            <span class="@if($price_row['SalePrice'] > $price_row['RealSalePrice']) price @else dcprice @endif @if($price_row['SalePrice'] == $price_row['RealSalePrice']) tx-blue @endif">
                                                                <span class="chkBox"><input type="checkbox" name="prod_code[]" id="{{$row['ProdCode']}}" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                                    {{ number_format($price_row['SalePrice'], 0) }}원
                                                                @else
                                                                    {{ number_format($price_row['RealSalePrice'], 0) }}원
                                                                @endif
                                                            </span>

                                                            @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                                <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span>
                                                                <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                            @endif
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
