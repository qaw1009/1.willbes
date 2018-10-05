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
                                                    <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                @if($row['IsExten'] == 'N')
                                                    <a><span class="bBox blueBox NSK">수강연장불가</span></a>
                                                @elseif($row['ExtenCount'] >= $row['ExtenNum'])
                                                    <a><span class="bBox blueBox NSK">연장횟수초과({{$row['ExtenCount']}})</span></a>
                                                @else
                                                    <a href="javascript:;" onclick="fnExtend('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}','S');"><span class="bBox blueBox NSK">수강연장({{$row['ExtenCount']}})</span></a>
                                                @endif

                                                @if($row['IsPause'] == 'N')
                                                    <a><span class="bBox whiteBox NSK">일시정지불가</span></a>
                                                @elseif($row['PauseCount'] >= $row['PauseNum'])
                                                    <a><span class="bBox whiteBox NSK">정지횟수초과(<span class="tx-light-blue">{{$row['PauseCount']}}</span>)</span></a>
                                                @else
                                                    <a href="javascript:;" onclick="fnPause('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}','S');"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">{{$row['PauseCount']}}</span>)</span></a>
                                                @endif
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
                                @forelse( $pkgList as $row )
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        <tr class="bg-light-blue">
                                            <td class="w-data tx-left pl30">
                                                <div class="w-tit">
                                                    {{$row['ProdName']}}
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                    <dt class="MoreBtn"><a href="#none">강좌 열기 ▼</a></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                @if($row['IsExten'] == 'N')
                                                    <a><span class="bBox blueBox NSK">수강연장불가</span></a>
                                                @elseif($row['ExtenCount'] >= $row['ExtenNum'])
                                                    <a><span class="bBox blueBox NSK">연장횟수초과({{$row['ExtenCount']}})</span></a>
                                                @else
                                                    <a href="javascript:;" onclick="fnExtend('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','','P');"><span class="bBox blueBox NSK">수강연장({{$row['ExtenCount']}})</span></a>
                                                @endif

                                                @if($row['IsPause'] == 'N')
                                                    <a><span class="bBox whiteBox NSK">일시정지불가</span></a>
                                                @elseif($row['PauseCount'] >= $row['PauseNum'])
                                                    <a><span class="bBox whiteBox NSK">정지횟수초과(<span class="tx-light-blue">{{$row['PauseCount']}}</span>)</span></a>
                                                @else
                                                    <a href="javascript:;" onclick="fnPause('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','','P');"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">{{$row['PauseCount']}}</span>)</span></a>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table cellspacing="0" cellpadding="0" class="packInfoTable lecTable">
                                        <colgroup>
                                            <col style="width: 120px;">
                                            <col style="width: 820px;">
                                        </colgroup>
                                        <tbody>
                                        @foreach( $row['subleclist'] as $subrow )
                                            <tr>
                                                <td class="w-percent">진도율<br/>
                                                    <span class="tx-blue">{{$subrow['StudyRate']}}%</span>
                                                </td>
                                                <td class="w-data tx-left pl10">
                                                    <dl class="w-info">
                                                        <dt>
                                                            {{$subrow['SubjectName']}}<span class="row-line">|</span>
                                                            {{$subrow['wProfName']}}교수님
                                                            <span class="NSK ml15 nBox n{{ substr($subrow['wLectureProgressCcd'], -1)+1 }}">{{$subrow['wLectureProgressCcdName']}}</span>
                                                        </dt>
                                                    </dl><br/>
                                                    <div class="w-tit">
                                                        <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$subrow['OrderIdx']}}&p={{$subrow['ProdCode']}}&ps={{$subrow['ProdCodeSub']}}">{{$subrow['subProdName']}}</a>
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>강의수 : <span class="tx-black">{{$subrow['wUnitLectureCnt']}}강</span></dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>잔여기간 : <span class="tx-blue">{{$subrow['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>최종학습일 : <span class="tx-black">{{ $subrow['lastStudyDate'] == '' ? '학습이력없음' : $subrow['lastStudyDate'] }}</span></dt>
                                                    </dl>
                                                </td>
                                                <!--
                                                <td class="w-answer">
                                                    <a href="#none"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                                    <a href="#none"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
                                                </td> -->
                                            </tr>
                                        @endforeach
                                        <!--
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
                                </tr> -->
                                        </tbody>
                                    </table>
                                @empty
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td colspan="2" class="tx-center">수강중인 패키지강좌가 없습니다.</td>
                                        </tr>
                                        </tbody>
                                    </table>
                            @endforelse
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
                                                    <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
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
                                    @forelse( $adminList['lec'] as $row )
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
                                                    <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}"><span class="tx-red">[{{$row['PayRouteCcdName']}}]</span> {{$row['subProdName']}}</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                </dl>
                                            </td>
                                        </tr>
                                        <!--
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
                                    -->
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

            <div id="STOPPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 h800 abs"></div>
            <!-- willbes-Layer-PassBox : 일시정지 -->

            <div id="EXTRAPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 h800 abs"></div>
            <!-- willbes-Layer-PassBox : 수강연장 -->

        </div>
        {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <form name="postForm" id="postForm" >
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="orderidx" id="orderidx" value="" />
        <input type="hidden" name="prodcode" id="prodcode" value="" />
        <input type="hidden" name="prodcodesub" id="prodcodesub" value="" />
        <input type="hidden" name="prodtype" id="prodtype" value="" />
    </form>
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

        function fnPause(o, p, sp, t)
        {
            $("#STARTPASS").html('');
            $('#orderidx').val(o);
            $('#prodcode').val(p);
            $('#prodcodesub').val(sp);
            $('#prodtype').val(t);

            url = "{{ site_url("/classroom/on/layerPause/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#STOPPASS").html(d).end();
                    openWin('STOPPASS');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }

        function fnExtend(o, p, sp, t)
        {
            $("#STARTPASS").html('');
            $('#orderidx').val(o);
            $('#prodcode').val(p);
            $('#prodcodesub').val(sp);
            $('#prodtype').val(t);

            url = "{{ site_url("/classroom/on/layerExtend/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#EXTRAPASS").html(d).end();
                    openWin('EXTRAPASS');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }
    </script>
@stop