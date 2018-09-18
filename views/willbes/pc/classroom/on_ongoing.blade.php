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
                    · 수강중강좌
                </div>
                <div id="info1" class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">일시정지신청</div>
                                <div class="Txt">
                                    - '일시정지(잔여횟수)' 버튼을 클릭하면 강좌별로 <span class="tx-red">최대 3회까지 가능</span>합니다.<br/>
                                    - 1회 일시정지 기간은 수강잔여일을 초과할 수 없으며, <span class="tx-red">일시정지기간의 총합은 수강기간을 초과할 수 없습니다.</span><br/>
                                    - 일시정지된 강좌는 '일시정지강좌'에서 확인할 수 있습니다.<br/>
                                </div>

                                <div class="Tit pt20">수강연장</div>
                                <div class="Txt">
                                    - 수강연장된 강의는 일시정지를 신청할 수 없습니다.<br/>
                                    - '수강연장(잔여횟수)' 버튼을 클릭하면 강좌별로 최대 3회까지 연장이 가능합니다.<br/>
                                    - <span class="tx-red">연장일수는 본래 수강기간의 50%를 초과할 수 없습니다.</span><br/>
                                    - 수강연장은 수강 종료일 전까지만 신청이 가능하며 5일 단위(5일, 10일 15일 등)로 신청할 수 있습니다.<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div id="info2" class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re" style="display: none;">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">패키지강좌</div>
                                <div class="Txt">
                                    - 패키지 강좌는 강의시작일 설정, 일시중지, 강의연장 기능이 제공되지 않습니다.<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div id="info3" class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re" style="display: none;">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">무료강좌</div>
                                <div class="Txt">
                                    - 무료강좌는 수강일변경, 일시정지, 수강연장 기능이 제공되지 않습니다.<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div id="info4" class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re" style="display: none;">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">관리자부여강좌</div>
                                <div class="Txt">
                                    - 관리자부여강좌는 무상 혜택으로 지급된 강좌이므로 수강일변경, 일시정지, 수강연장 기능이 제공되지 않습니다.<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-ONLINEZONE -->

            <div class="willbes-Mypage-Tabs mt40">
                <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/on/list/ongoing/', 'www')}}" onsubmit="">
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
                </form>
            </div>
            <div class="DetailWrap c_both">
                <ul class="tabWrap tabDepthPass">
                    <li><a href="#Mypagetab1" onclick="fnSetMoreTable();openTxt('info1')" class="on">단강좌 ({{count($lecList)}})</a></li>
                    <li><a href="#Mypagetab2" onclick="fnSetMoreTable();openTxt('info2')">패키지강좌 ({{count($pkgList)}})</a></li>
                    <li><a href="#Mypagetab3" onclick="fnSetMoreTable();openTxt('info3')">무료강좌 ({{count($freeList)}})</a></li>
                    <li><a href="#Mypagetab4" onclick="fnSetMoreTable();openTxt('info4')">관리자부여강좌 ({{count($adminList['lec'])+count($adminList['pkg'])}})</a></li>
                </ul>
                <div class="tabBox">
                    <div id="Mypagetab1" class="tabLink">
                        <div class="willbes-Lec-Table pt20 NG d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 700px;">
                                    <col style="width: 120px;">
                                </colgroup>
                                <tbody>
                                @forelse( $lecList as $row )
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">{{$row['StudyRate']}}%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    {{$row['SubjectName']}}<span class="row-line">|</span>
                                                    {{$row['wProfName']}}교수님
                                                    <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/classroom/on/view/ongoing/') }}?orderidx={{$row['OrderIdx']}}&prodcode={{$row['ProdCode']}}&prodcodesub={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{$row['LecStartDate']}}~{{$row['RealLecEndDate']}})</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none" onclick="openWin('EXTRAPASS')"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                            <a href="#none" onclick="openWin('STOPPASS')"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    <!--
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">55%</span>
                                        </td>
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
                                            <a href="#none"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                            <a href="#none"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    -->
                                @empty
                                    <tr>
                                        <td colspan="2" class="tx-center">수강중인 강좌가 없습니다.</td>
                                    </tr>
                                @endforelse
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
                        <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
                            <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 820px;">
                                    <col style="width: 120px;">
                                </colgroup>
                                <tbody>
                                @forelse( $pkgList as $row )
                                    <tr class="bg-light-blue">
                                        <td class="w-data tx-left pl30">
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지222</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt class="MoreBtn"><a href="#none">강좌 열기 ▼</a></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                            <a href="#none"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="tx-center">수강중인 강좌가 없습니다.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="packInfoTable lecTable">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 700px;">
                                    <col style="width: 120px;">
                                </colgroup>
                                <tbody>
                                <tr class="replyTxt">
                                    <td class="w-percent">진도율<br/>
                                        <span class="tx-blue">77%</span>
                                    </td>
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
                                        <a href="#none"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                        <a href="#none"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
                                    </td>
                                </tr>
                                <tr class="replyTxt">
                                    <td class="w-percent">진도율<br/>
                                        <span class="tx-blue">25%</span>
                                    </td>
                                    <td class="w-data tx-left pl10">
                                        <dl class="w-info">
                                            <dt>
                                                영어<span class="row-line">|</span>
                                                한덕현교수님
                                                <span class="NSK ml15 nBox n2">진행중</span>
                                            </dt>
                                        </dl><br/>
                                        <div class="w-tit">
                                            <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 (교육행정대비) 한덕현 제니스 영어 실전 동형모의고사 (4-5월)</a>
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
                                        <a href="#none"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                        <a href="#none"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
                                    </td>
                                </tr>
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
                    <div id="Mypagetab3" class="tabLink">
                        <div class="willbes-Lec-Table pt20 NG d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 820px;">
                                </colgroup>
                                <tbody>
                                @forelse( $freeList as $row )
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="tx-center">수강중인 강좌가 없습니다.</td>
                                    </tr>
                                @endforelse
                                <!--
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">55%</span>
                                        </td>
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
                    <div id="Mypagetab4" class="tabLink">
                        <div class="PassCurriBox CurrLineiBox">
                            <dl class="w-info tx-gray">
                                <dt><a href="#none">단강좌</a></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt><a href="#none">패키지</a></dt>
                            </dl>
                        </div>
                        <div class="willbes-Lec-Table pt20 NG d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 820px;">
                                </colgroup>
                                <tbody>
                                @forelse( $adminList as $row )
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}"><span class="tx-red">[0원결제]</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="tx-center">수강중인 강좌가 없습니다.</td>
                                    </tr>
                                @endforelse
                                <!--
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">55%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none"><span class="tx-red">[제휴사결제]</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                    </tr>
                                    -->
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

        <div id="STOPPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 h800 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('STOPPASS')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">일시정지</div>

            <div class="lecMoreWrap">

                <div class="PASSZONE-List widthAutoFull">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li class="tit strong">· 일시정지 신청</li>
                        <li class="txt">- 일시정지는 강좌별로 <span class="tx-red">최대 3회</span>까지 가능합니다.</li>
                        <li class="txt">- 1회 일시정지 기간은 수강잔여일을 초과할 수 없습니다.</li>
                        <li class="txt">- <span class="tx-red">일시정지기간의 총합은 수강기간을 초과할 수 없습니다.</span></li>
                        <li class="txt">- '일시정지된 강좌는 일시정지강좌' 에서 확인할 수 있습니다.</li>
                    </ul>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mt40 mb15 tx-gray">· 일시정지 신청</div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 135px;">
                                    <col style="width: 565px;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <th class="w-tit bg-light-white strong">강의정보</th>
                                    <td class="w-data tx-left pl15">
                                        <dl class="w-info strong">
                                            <dt>
                                                영어<span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>
                                                한덕현교수님
                                            </dt>
                                        </dl><br>
                                        <div class="w-tit strong">2018 (교육행정대비) 9급 단원별 실전 동형모의고사 PACK</div>
                                        <dl class="w-info tx-gray">
                                            <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                        </dl>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-tit bg-light-white strong">일시정지기간</th>
                                    <td class="w-data tx-left pl15">
                                        <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30">&nbsp; ~&nbsp;
                                        <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">&nbsp;
                                        [변경수강기간] 2018.00.00~2018.00.00
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">신청</a></div>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mb15 tx-gray">· 일시정지 이력 <span class="w-info normal">( 잔여횟수 : <span class="strong tx-light-blue">1</span>회 <span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span> 잔여기간 : <span class="strong tx-light-blue">15</span>일 )</span></div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 100px;">
                                    <col style="width: 270px;">
                                    <col style="width: 170px;">
                                    <col style="width: 160px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>회차<span class="row-line">|</span></th>
                                    <th>일시정지기간<span class="row-line">|</span></th>
                                    <th>신청일자<span class="row-line">|</span></th>
                                    <th>신청자</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="w-num">1차</td>
                                    <td class="w-day">2018.00.00 ~ 2018.00.00</td>
                                    <td class="w-modify-day">2018.00.00</td>
                                    <td class="w-user">회원명</td>
                                </tr>
                                <tr>
                                    <td class="w-num">2차</td>
                                    <td class="w-day">2018.00.00 ~ 2018.00.00</td>
                                    <td class="w-modify-day">2018.00.00</td>
                                    <td class="w-user">회원명</td>
                                </tr>
                                <tr>
                                    <td colspan="4">일시정지 이력이 없습니다.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-List -->
            </div>

        </div>
        <!-- willbes-Layer-PassBox : 일시정지 -->

        <div id="EXTRAPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 h800 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('EXTRAPASS')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">수강연장</div>

            <div class="lecMoreWrap">

                <div class="PASSZONE-List widthAutoFull">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li class="tit strong">· 수강연장</li>
                        <li class="txt">- 수강연장된 강의는 일시정지를 신청할 수 없습니다.</li>
                        <li class="txt">- 강좌별로 <span class="tx-red">최대3회까지</span>만 가능하며, <span class="tx-red">연장일수는 본래 수강기간의 50%를 초과할 수 없습니다.</span></li>
                        <li class="txt">- 수강연장은 종료일까지만 신청이 가능하며 5일단위(5일, 10일, 15일)로 신청할 수 있습니다.</li>
                    </ul>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mt40 mb15 tx-gray">· 수강연장 신청</div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 135px;">
                                    <col style="width: 565px;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <th class="w-tit bg-light-white strong">강의정보</th>
                                    <td class="w-data tx-left pl15">
                                        <dl class="w-info strong">
                                            <dt>
                                                영어<span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>
                                                한덕현교수님
                                            </dt>
                                        </dl><br>
                                        <div class="w-tit strong">2018 (교육행정대비) 9급 단원별 실전 동형모의고사 PACK</div>
                                        <dl class="w-info tx-gray">
                                            <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                        </dl>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-tit bg-light-white strong">연장일수</th>
                                    <td class="w-data tx-left pl15">
                                        <select id="day" name="day" title="day" class="seleDay" style="width: 60px; height: 20px;">
                                            <option selected="selected">5일</option>
                                            <option value="10일">10일</option>
                                            <option value="15일">15일</option>
                                            <option value="20일">20일</option>
                                            <option value="25일">25일</option>
                                            <option value="30일">30일</option>
                                            <option value="35일">35일</option>
                                            <option value="40일">40일</option>
                                        </select>&nbsp; 일 &nbsp;
                                        [연장수강종료일] 2018-00-00
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-tit bg-light-white strong">결제금액</th>
                                    <td class="w-data tx-left pl15">10,000원</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">신청</a></div>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mb15 tx-gray">· 수강연장 이력 <span class="w-info normal">( 잔여횟수 : <span class="strong tx-light-blue">1</span>회 <span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span> 잔여기간 : <span class="strong tx-light-blue">15</span>일 )</span></div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 100px;">
                                    <col style="width: 270px;">
                                    <col style="width: 170px;">
                                    <col style="width: 160px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>회차<span class="row-line">|</span></th>
                                    <th>연장수강 종료일(연장일수)<span class="row-line">|</span></th>
                                    <th>신청일자<span class="row-line">|</span></th>
                                    <th>신청자</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="w-num">1차</td>
                                    <td class="w-day">2018.00.00(5일)</td>
                                    <td class="w-modify-day">2018.00.00</td>
                                    <td class="w-user">회원명</td>
                                </tr>
                                <tr>
                                    <td class="w-num">2차</td>
                                    <td class="w-day">2018.00.00(5일)</td>
                                    <td class="w-modify-day">2018.00.00</td>
                                    <td class="w-user">회원명</td>
                                </tr>
                                <tr>
                                    <td colspan="4">수강연장 이력이 없습니다.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-List -->
            </div>

        </div>
        <!-- willbes-Layer-PassBox : 수강연장 -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">
    </div>
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

        /**
         * 탭이동시 나머지 설명 탭 on off 설정
         */
        function fnSetMoreTable(){
            var $obj = $('.willbes-Cart-Txt');
            var $onoff = $.cookie('moreInfo');
            var $lec_info_table = null;
            var $lec_info_table_tr = null;

            $obj.each(function(){
                $lec_info_table = $(this).find('table.txtTable');
                $lec_info_table_tr = $(this).find('table.txtTable tr');

                if( $onoff == 'off') {
                    $lec_info_table_tr.attr('style', 'display: none; !important');
                    $lec_info_table.addClass('off');
                    $(this).find('span a').text('유의사항안내 보기 ▼');
                } else {
                    $lec_info_table_tr.attr('style', 'display: block; !important');
                    $lec_info_table.removeClass('off');
                    $(this).find('span a').text('유의사항안내 닫기 ▲');
                }
            });
        }
    </script>
@stop