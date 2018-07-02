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
        <!-- curriWrap -->

        <div class="willbes-Bnr">
            <img src="{{ img_url('sample/bnr1.jpg') }}">
        </div>
        <!-- willbes-Bnr -->

        <div class="willbes-Lec-Search mb60">
            <div class="inputBox p_re">
                <input type="text" id="prod_name" name="prod_name" maxlength="30" value="{{ element('prod_name', $arr_input) }}" placeholder="강의명">
                <button type="submit" onclick="goUrl('prod_name', document.getElementById('prod_name').value);" class="search-Btn">
                    <span>검색</span>
                </button>
            </div>
            <div class="InfoBtn"><a href="#none">수강신청안내 <span>▶</span></a></div>
        </div>
        <!-- willbes-Lec-Search -->

        {{-- 과목별 상품 리스트 --}}
        @foreach($data['subjects'] as $subject_idx => $subject_name)
            <div class="willbes-Lec NG c_both">
                <div class="willbes-Lec-Subject tx-dark-black">· {{ $subject_name }}<span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span></div>
                <!-- willbes-Lec-Subject -->
                {{-- 교수명 타이틀 loop --}}
                @foreach($data['professor_names'][$subject_idx] as $prof_idx => $prof_name)
                    <div class="willbes-Lec-Profdata tx-dark-black">
                        <ul>
                            <li class="ProfImg"><img src="{{ $data['professor_refers'][$prof_idx]['lec_list_img'] or '' }}"></li>
                            <li class="ProfDetail">
                                <div class="Obj">
                                    공무원 국어종결자<br/>정채영 국어 [슬로건]
                                </div>
                                <div class="Name">{{ $prof_name }} 교수님</div>
                            </li>
                            <li class="Reply tx-blue">
                                <strong>수강후기</strong>
                                <dl class="roll-Reply tx-dark-black">
                                    <dt>국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</dt>
                                    <dt>국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</dt>
                                    <dt>국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</dt>
                                </dl>
                            </li>
                        </ul>
                    </div>
                    <!-- willbes-Lec-Profdata -->

                    <div class="willbes-Lec-Line">-</div>
                    <!-- willbes-Lec-Line -->

                    {{-- 교수별 상품 리스트 loop --}}
                    @foreach($data['list'][$subject_idx][$prof_idx] as $idx => $row)
                        <div class="willbes-Lec-Table">
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col style="width: 490px;">
                                    <col style="width: 110px;">
                                    <col style="width: 180px;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-list">{{ $row['CourseName'] }}</td>
                                    <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['wProfName'] }}</span></td>
                                    <td class="w-data tx-left pl25">
                                        <div class="w-tit">
                                            <a href="{{ site_url('/lecture/show/cate/' . $arr_param['cate'] . '/prodCode/' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a>
                                        </div>
                                        <dl class="w-info">
                                            <dt class="mr20">
                                                <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm');">
                                                    <strong>강좌상세정보</strong>
                                                </a>
                                            </dt>
                                            <dt>강의수 : <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span></dt>
                                            <dt class="NSK ml15">
                                                <span class="nBox n1">{{ $row['MultipleApply'] }}배수</span>
                                                <span class="nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                            </dt>
                                        </dl>
                                    </td>
                                    <td class="chk buybtn p_re">
                                        <input type="checkbox" id="goods_chk_{{ $row['ProdCode'] }}" name="goods_chk" value="{{ $row['ProdCode'] }}" class="goods_chk">
                                        <div class="willbes-Lec-buyBtn-sm">
                                            <div>
                                                <button type="submit" onclick="" class="bg-deep-gray">
                                                    <span>장바구니</span>
                                                </button>
                                            </div>
                                            <div>
                                                <button type="submit" onclick="" class="bg-dark-blue">
                                                    <span>바로결제</span>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-notice p_re">
                                        <ul class="w-sp">
                                            <li class=""><a href="#none">OT</a></li>
                                            <li><a href="#none" onclick="openWin('viewBox')">맛보기</a></li>
                                        </ul>
                                        <div id="viewBox" class="viewBox">
                                            @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                <dl class="NSK">
                                                    <dt class="Tit NG">맛보기{{ $sample_idx }}</dt>
                                                    @if(empty($sample_row['wHD']) === false || empty($sample_row['wWD']) === false) <dt class="tBox t1 black"><a href="{{ $sample_row['wWD'] or $sample_row['wHD'] }}">HIGH</a></dt> @endif
                                                    @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="{{ $sample_row['wSD'] }}">LOW</a></dt> @endif
                                                </dl>
                                            @endforeach
                                        </div>
                                        <div class="priceWrap">
                                            <span class="price tx-blue">{{ number_format($row['RealSalePrice'], 0) }}원</span>
                                            <span class="discount">(↓{{ $row['SaleRate'] . (($row['SaleDiscType'] == 'R') ? '%' : '원') }})</span>
                                        </div>
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
                                                    <span class="w-subtit">{{ $book_row['BookProdName'] }}</span>
                                                    <span class="chk">
                                                        <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                            [{{ $book_row['wSaleCcdName'] }}]
                                                        </label>
                                                        <input type="checkbox" id="goods_chk_{{ $book_row['BookProdCode'] }}" name="goods_chk" class="goods_chk" value="{{ $book_row['BookProdCode'] }}" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                    </span>
                                                    <span class="priceWrap">
                                                        <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                        <span class="discount">(↓{{ $row['SaleRate'] . (($row['SaleDiscType'] == 'R') ? '%' : '원') }})</span>
                                                    </span>
                                                </div>
                                            @endforeach
                                                <div class="w-sub ml10">
                                                    <a href="#ch2" onclick="openLink('ch2','hover2'),openWin('InfoForm')"><strong>교재상세정보</strong></a>
                                                </div>
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

        <div class="willbes-Lec-buyBtn">
            <ul>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>장바구니</span>
                    </button>
                </li>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                        <span class="tx-light-blue">바로결제</span>
                    </button>
                </li>
            </ul>
        </div>
        <!-- willbes-Lec-buyBtn -->

        <div id="InfoForm" class="willbes-Layer-Box">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">
                2018 기미진 국어 아침 실전 동형모의고사 특강[국가직 ~서울시] (3-6월)
            </div>
            <div class="lecDetailWrap">
                <ul class="tabWrap tabDepth1 NG">
                    <li><a id="hover1" href="#ch1">강좌상세정보</a></li>
                    <li><a id="hover2" href="#ch2">교재상세정보 (총 2권)</a></li>
                </ul>
                <div class="tabBox">
                    <div id="ch1" class="tabLink">
                        <div class="classInfo">
                            <dl class="w-info NG">
                                <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                <dt class="NSK ml15">
                                    <span class="nBox n1">2배수</span>
                                    <span class="nBox n2">진행중</span>
                                    <span class="nBox n3">예정</span>
                                    <span class="nBox n4">완강</span>
                                </dt>
                            </dl>
                        </div>
                        <div class="classInfoTable">
                            <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 140px;">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-list bg-light-white">
                                        강좌유의사항<br/>
                                        <span class="tx-red">(필독)</span>
                                    </td>
                                    <td class="w-data tx-left pl25">
                                        LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                        자동출력됩니다. (온라인상품기준)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-list bg-light-white">강좌소개</td>
                                    <td class="w-data tx-left pl25">
                                        LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                        자동출력됩니다. (온라인상품기준)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-list bg-light-white">강좌특징</td>
                                    <td class="w-data tx-left pl25">
                                        LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                        자동출력됩니다. (온라인상품기준)
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="ch2" class="tabLink">
                        <div class="bookInfo">
                            <div class="bookImg">
                                <img src="{{ img_url('sample/book.jpg') }}">
                            </div>
                            <div class="bookDetail">
                                <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집 (전2권)</div>
                                <div class="book-Author tx-gray">
                                    <ul>
                                        <li>분야 : 9급공무원 <span class="row-line">|</span></li>
                                        <li>저자 : 저자명 <span class="row-line">|</span></li>
                                        <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                        <li>판형/쪽수 : 190*260 / 769</li>
                                    </ul>
                                    <ul>
                                        <li>출판일 : 2018-00-00 <span class="row-line">|</span></li>
                                        <li>교재비 : <strong class="tx-light-blue">20,000원</strong> (↓20%) <strong class="tx-red">[품절]</strong></li>
                                    </ul>
                                </div>
                                <div class="bookBoxWrap">
                                    <ul class="tabWrap tabDepth2">
                                        <li><a href="#info1">교재소개</a></li>
                                        <li><a href="#info2">교재목차</a></li>
                                    </ul>
                                    <div class="tabBox">
                                        <div id="info1" class="tabContent">
                                            <div class="book-TxtBox tx-gray">
                                                2018년재신정판을내면서..<br/>
                                                첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                            </div>
                                            <div class="caution-txt tx-red">수강생교재는해당온라인강좌수강생에한해구매가능합니다. (교재만별도구매불가능)</div>
                                        </div>
                                        <div id="info2" class="tabContent">
                                            <div class="book-TxtBox tx-gray">
                                                제1편 현대 문법<br/>
                                                제2편 고전 문법<br/>
                                                제3편 국어 생활<br/>
                                                제4편 현대 문학<br/>
                                                제5편 고전 문학<br/>
                                                제1편 현대 문법<br/>
                                                제2편 고전 문법<br/>
                                                제3편 국어 생활<br/>
                                                제4편 현대 문학<br/>
                                                제5편 고전 문학
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-Box -->
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">
    </div>
</div>
<!-- End Container -->
<script type="text/javascript">
    function goUrl(key, val, selector) {
        var $url_form = $(selector || '#url_form');
        var $url_input = $url_form.find('input[name="' + key + '"]');

        if ($url_input.length > 0) {
            $url_input.val(val);
        } else {
            $url_form.append('<input type="hidden" name="' + key + '" value="' + val + '"/>');
        }
        $url_form.submit();
    }
</script>
@stop
