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
                                    {!! str_first_pos_after($prof_name, '::') !!}
                                </div>
                                <div class="Name">{{ str_first_pos_before($prof_name, '::') }} 교수님</div>
                            </li>
                            <li class="Reply tx-blue">
                                <strong>수강후기</strong>
                                <div class="sliderUp">
                                    <div class="sliderVertical roll-Reply tx-dark-black">
                                        <div>1국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                        <div>2국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                        <div>3국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- willbes-Lec-Profdata -->

                    <div class="willbes-Lec-Line">-</div>
                    <!-- willbes-Lec-Line -->

                    {{-- 교수별 상품 리스트 loop --}}
                    @foreach($data['list'][$subject_idx][$prof_idx] as $idx => $row)
                        <div id="lec_table_{{ $row['ProdCode'] }}" class="willbes-Lec-Table">
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
                                            <a href="{{ site_url('/lecture/show/cate/' . $arr_param['cate'] . '/prodcode/' . $row['ProdCode']) }}" class="prod-name">{{ $row['ProdName'] }}</a>
                                        </div>
                                        <dl class="w-info">
                                            <dt class="mr20">
                                                <a href="#none" class="btn-lecture-info" data-prod-code="{{ $row['ProdCode'] }}" data-tab-id="hover1">
                                                    <strong>강좌상세정보</strong>
                                                </a>
                                            </dt>
                                            <dt>강의수 : <span class="unit-lecture-cnt tx-blue" data-info="{{ $row['wUnitLectureCnt'] }}">{{ $row['wUnitLectureCnt'] }}강</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt>수강기간 : <span class="study-period tx-blue" data-info="{{ $row['StudyPeriod'] }}">{{ $row['StudyPeriod'] }}일</span></dt>
                                            <dt class="NSK ml15">
                                                <span class="multiple-apply nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] }}배수</span>
                                                <span class="lecture-progress nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                            </dt>
                                        </dl>
                                    </td>
                                    <td class="chk buybtn p_re">
                                        <input type="checkbox" id="goods_chk_{{ $row['ProdCode'] }}" name="goods_chk" value="{{ $row['ProdCode'] }}" class="goods_chk">
                                    </td>
                                    <td class="w-notice p_re">
                                        <div class="w-sp one"><a href="#none" onclick="openWin('lec_sample_{{ $row['ProdCode'] }}')">맛보기</a></div>
                                        <div id="lec_sample_{{ $row['ProdCode'] }}" class="viewBox">
                                            @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                <dl class="NSK">
                                                    <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
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
                                                    <span class="chk buybtn p_re">
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
                                                    <a href="#none" class="btn-lecture-info" data-prod-code="{{ $row['ProdCode'] }}" data-tab-id="hover2"><strong>교재상세정보</strong></a>
                                                </div>
                                                <div class="prod-book-memo d_none">{{ $row['ProdBookMemo'] }}</div>
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

        <div id="lec_info_layer"></div>
        <!-- willbes-Layer-Box -->
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">
    </div>
</div>
<div class="willbes-Lec-buyBtn-sm NG">
    <div>
        <button type="submit" onclick="openWin('pocketBox')" class="bg-deep-gray">
            <span>장바구니</span>
        </button>
    </div>
    <div>
        <button type="submit" onclick="" class="bg-dark-blue">
            <span>바로결제</span>
        </button>
    </div>
    <div id="pocketBox" class="pocketBox" style="display: none;">
        해당 상품이 장바구니에 담겼습니다.<br/>
        장바구니로 이동하시겠습니까?
        <ul class="NSK mt20">
            <li class="aBox answerBox_block"><a href="#none">예</a></li>
            <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
        </ul>
    </div>
</div>
<!-- willbes-Lec-buyBtn-sm -->
<!-- End Container -->
<script type="text/javascript">
    $(document).ready(function() {
        // 강좌상세정보, 교재상세정보 버튼 클릭
        $('.willbes-Lec-Table').on('click', '.btn-lecture-info', function() {
            var $prod_code = $(this).data('prod-code'), $lec_table = $('#lec_table_' + $prod_code);
            var data = {
                'prod_name' : $lec_table.find('.prod-name').text(),
                'unit_lecture_cnt' : $lec_table.find('.unit-lecture-cnt').data('info'),
                'study_period' : $lec_table.find('.study-period').data('info'),
                'multiple_apply' : $lec_table.find('.multiple-apply').data('info'),
                'lecture_progress' : $lec_table.find('.lecture-progress').data('info'),
                'prod_book_memo' : $lec_table.find('.prod-book-memo').text()
            };
            sendAjax('{{ site_url('/lecture/info/prodcode/') }}' + $prod_code, data, function(ret) {
                $('#lec_info_layer').html(ret).show().css('display', 'block').trigger('create');
            }, showError, false, 'GET', 'html');

            openWin('info_form');
            openLink($(this).data('tab-id'));
        });
    });
</script>
@stop
