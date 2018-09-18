@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-ONLINEZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 일시정지강좌
                </div>
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif ">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">일시정지강좌</div>
                                <div class="Txt">
                                    - '일시정지해제'버튼을 클릭하시면 일시정지 상태가 해제되어 즉시 수강하실 수 있습니다.<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-ONLINEZONE -->
            <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/on/list/ongoing/', 'www')}}" onsubmit="">
                <div class="willbes-Mypage-Tabs mt40">
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                        <select id="course_ccd" name="course_ccd" title="process" class="seleProcess">
                            <option selected="selected" value="">과정</option>
                            @foreach($course_arr as $row )
                                <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                            @endforeach
                        </select>
                        <select id="subject_ccd" name="subject_ccd" title="lec" class="seleLec">
                            <option selected="selected" value="">과목</option>
                            @foreach($subject_arr as $row )
                                <option value="{{$row['SubjectIdx']}}" @if(isset($input_arr['subject_ccd']) && $input_arr['subject_ccd'] == $row['SubjectIdx']) selected="selected" @endif >{{$row['SubjectName']}}</option>
                            @endforeach
                        </select>
                        <select id="prof_ccd" name="prof_ccd" title="Prof" class="seleProf">
                            <option selected="selected" value="">교수님</option>
                            @foreach($prof_arr as $row )
                                <option value="{{$row['wProfIdx']}}" @if(isset($input_arr['prof_ccd']) && $input_arr['prof_ccd'] == $row['wProfIdx']) selected="selected" @endif >{{$row['wProfName']}}</option>
                            @endforeach
                        </select>
                        <select id="Laststudy" name="Laststudy" title="Laststudy" class="seleStudy">
                            <option selected="selected">최종학습일순</option>
                            <option value="최근추가순">최근추가순</option>
                            <option value="종료임박순">종료임박순</option>
                        </select>
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="search_text" name="search_text" class="labelSearch" value="@if(isset($input_arr['search_text'])){{$input_arr['search_text']}}@endif" placeholder="강좌명을 검색해 주세요" maxlength="30">
                                <button type="submit" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="DetailWrap c_both">
                        <ul class="tabWrap tabDepthPass">
                            <li><a href="#Mypagetab1" class="on">단강좌 ({{count($lecList)}})</a></li>
                            <li><a href="#Mypagetab2">패키지강좌 ({{count($pkgList)}})</a></li>
                        </ul>
                        <div class="tabBox">
                            <div id="Mypagetab1" class="tabLink">
                                <div class="willbes-Lec-Table pt20 NG d_block">
                                    <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        @forelse( $lecList as $row )
                                        <tr>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        영어<span class="row-line">|</span>
                                                        한덕현교수님
                                                        <span class="NSK ml15 nBox n2">진행중</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="#none"><span class="bBox whiteBox NSK">일시정지해제</span></a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="tx-center">일시중지 강좌가 없습니다.</td>
                                            </tr>
                                        @endforelse
                                        <!--
                                        <tr>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        영어<span class="row-line">|</span>
                                                        한덕현교수님
                                                        <span class="NSK ml15 nBox n2">진행중</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="#none"><span class="bBox whiteBox NSK">일시정지해제</span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                        </tr> -->
                                        </tbody>
                                    </table>
                                    <!--
                                    <div class="Paging">
                                        <ul>
                                            <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                                            <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                                            <li><a href="#none">2</a><span class="row-line">|</span></li>
                                            <li><a href="#none">3</a><span class="row-line">|</span></li>
                                            <li><a href="#none">4</a><span class="row-line">|</span></li>
                                            <li><a href="#none">5</a><span class="row-line">|</span></li>
                                            <li><a href="#none">6</a><span class="row-line">|</span></li>
                                            <li><a href="#none">7</a><span class="row-line">|</span></li>
                                            <li><a href="#none">8</a><span class="row-line">|</span></li>
                                            <li><a href="#none">9</a><span class="row-line">|</span></li>
                                            <li><a href="#none">10</a></li>
                                            <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                                        </ul>
                                    </div>
                                    -->
                                </div>
                            </div>
                            <div id="Mypagetab2" class="tabLink">
                                <div class="willbes-Lec-Table pt20 NG d_block">
                                    <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        @forelse( $pkgList as $row )
                                        <tr>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        영어<span class="row-line">|</span>
                                                        한덕현교수님
                                                        <span class="NSK ml15 nBox n4">완강</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지222</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="#none"><span class="bBox whiteBox NSK">일시정지해제</span></a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="tx-center">일시중지 강좌가 없습니다.</td>
                                            </tr>
                                        @endforelse
                                        <!--
                                        <tr>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        영어<span class="row-line">|</span>
                                                        한덕현교수님
                                                        <span class="NSK ml15 nBox n2">진행중</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지333</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="#none"><span class="bBox whiteBox NSK">일시정지해제</span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                        </tr> -->
                                        </tbody>
                                    </table>
                                    <!--
                                    <div class="Paging">
                                        <ul>
                                            <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                                            <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                                            <li><a href="#none">2</a><span class="row-line">|</span></li>
                                            <li><a href="#none">3</a><span class="row-line">|</span></li>
                                            <li><a href="#none">4</a><span class="row-line">|</span></li>
                                            <li><a href="#none">5</a><span class="row-line">|</span></li>
                                            <li><a href="#none">6</a><span class="row-line">|</span></li>
                                            <li><a href="#none">7</a><span class="row-line">|</span></li>
                                            <li><a href="#none">8</a><span class="row-line">|</span></li>
                                            <li><a href="#none">9</a><span class="row-line">|</span></li>
                                            <li><a href="#none">10</a></li>
                                            <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                                        </ul>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- willbes-Mypage-Tabs -->

        </div>
        {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course_ccd,#subject_ccd,#prof_ccd').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {

                }
            });
        });
    </script>
@stop