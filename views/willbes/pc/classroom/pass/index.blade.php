@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/pass/index', 'www')}}" onsubmit="">
                <div class="willbes-Mypage-PASSZONE c_both">
                    <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                        · 무한PASS존
                        <ul>
                            <li class="InfoBtn"><a href="#none" onclick="fnMyDevice();">등록기기정보 <span>▶</span></a></li>
                            <li class="InfoBtn"><a href="#none" onclick="openWin('MorePASS')">프리패스이용안내 <span>▶</span></a></li>
                        </ul>
                    </div>
                    <div class="willbes-Lec-Table NG d_block">
                        <div class="willbes-PASS-Line bg-blue">이용중인 PASS ({{count($passlist)}})</div>
                        <div class="will-Tit-Zone">

                            <div class="will-Tit NG f_left">· 무한PASS선택</div>
                            <span class="willbes-Lec-Selected GM tx-gray" style="float: inherit">
                                <select id="sitecode" name="sitecode" title="process" class="seleProcess">
                                    <option value="">과정</option>
                                    @foreach($sitelist as $row )
                                        <option value="{{$row['SiteCode']}}" @if(isset($input_arr['sitecode']) && $input_arr['sitecode'] == $row['SiteCode']) selected="selected" @endif>{{$row['SiteName']}}</option>
                                    @endforeach
                                </select>
                                <select id="passidx" name="passidx" class="seleName" >
                                    <option value="">무한PASS를 선택해주십시요.</option>
                                    @foreach($passlist as $row )
                                        <option value="{{$row['ProdCode']}}" @if(isset($passinfo['ProdCode']) && $passinfo['ProdCode'] == $row['ProdCode']) selected="selected" @endif>{{$row['ProdName']}}</option>
                                    @endforeach
                                </select>
                            </span>

                        </div>
                        <table cellspacing="0" cellpadding="0" class="lecTable PassZoneTable">
                            <colgroup>
                                <col style="width: 770px;">
                                <col style="width: 170px;">
                            </colgroup>
                            <tbody>
                            @if(empty($passinfo) == false)
                                <tr>
                                    <td class="w-data tx-left">
                                        <div class="w-tit">
                                            {{$passinfo['ProdName']}}
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>[수강기간] <span class="tx-blue">{{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</span> <span class="tx-black">(잔여기간<span class="tx-pink">{{$row['remainDays']}}일</span>)</span></dt>
                                        </dl>
                                    </td>
                                    @if($passinfo['TakeLecNum'] == 0)
                                        <td class="w-lec">
                                            <div class="tx-gray">수강중인 강좌가 없습니다.</div>
                                            <div class="w-sj">강좌를 추가해 주세요.</div>
                                            <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="javascript:;" onclick="fnMoreLec('{{$passinfo['OrderIdx']}}','{{$passinfo['ProdCode']}}');">강좌추가</a></div>
                                        </td>
                                    @else
                                        <td class="w-lec">
                                            <div class="tx-gray">수강중인 강좌수</div>
                                            <div class="w-sj"><span class="tx-blue">{{$passinfo['TakeLecNum']}}강좌</span> / {{$passinfo['LecNum']}}강좌</div>
                                            <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="javascript:;" onclick="fnMoreLec('{{$passinfo['OrderIdx']}}','{{$passinfo['ProdCode']}}');">강좌추가</a></div>
                                        </td>
                                    @endif
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- willbes-Mypage-PASSZONE -->

                <div class="willbes-Mypage-Tabs mt70">
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                        <select id="course_ccd" name="course_ccd" title="process" class="seleProcess">
                            <option value="">과정</option>
                            @foreach($course_arr as $row )
                                <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                            @endforeach
                        </select>
                        <select id="subject_ccd" name="subject_ccd" title="lec" class="seleLec">
                            <option value="">과목</option>
                            @foreach($subject_arr as $row )
                                <option value="{{$row['SubjectIdx']}}" @if(isset($input_arr['subject_ccd']) && $input_arr['subject_ccd'] == $row['SubjectIdx']) selected="selected" @endif >{{$row['SubjectName']}}</option>
                            @endforeach
                        </select>
                        <select id="prof_ccd" name="prof_ccd" title="Prof" class="seleProf">
                            <option value="">교수님</option>
                            @foreach($prof_arr as $row )
                                <option value="{{$row['wProfIdx']}}" @if(isset($input_arr['prof_ccd']) && $input_arr['prof_ccd'] == $row['wProfIdx']) selected="selected" @endif >{{$row['wProfName']}}</option>
                            @endforeach
                        </select>
                    <!--
                        <select id="orderby" name="orderby" title="Laststudy" class="seleStudy">
                            <option value="lastStudyDate^DESC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'lastStudyDate') selected="selected" @endif>최종학습일순</option>
                            <option value="LecStartDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'LecStartDate^ASC') selected="selected" @endif>개강일순</option>
                            <option value="RealLecEndDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'RealLecEndDate^ASC') selected="selected" @endif>종료임박순</option>
                        </select>
                        -->
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
                <div class="aBox passBox answerBox_block NSK f_right"><a href="#none" onclick="fnMoreBook();">교재구매</a></div>
                <ul class="tabWrap tabDepthPass">
                    <li><a href="#Mypagetab1" class="on">즐겨찾기강좌 ({{count($leclist_like)}})</a></li>
                    <li><a href="#Mypagetab2">수강중강좌 ({{count($leclist_ing)}})</a></li>
                    <li><a href="#Mypagetab3">수강완료강좌 ({{count($leclist_end)}})</a></li>
                    <li><a href="#Mypagetab4">숨긴강좌 ({{count($leclist_nodisp)}})</a></li>
                </ul>
                <div class="tabBox">
                    <div id="Mypagetab1" class="tabLink">
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▲</a></span>
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
                                    <th class="tx-gray">전체보기</th>
                                    <td colspan="9">
                                        <ul class="curriSelect">
                                            <li><a href="#none">[국어] 정채영</a></li>
                                            <li><a href="#none">[영어] 기미진</a></li>
                                            <li><a href="#none">[사회] 김세령</a></li>
                                            <li><a href="#none">[형사법] 오대혁</a></li>
                                            <li><a href="#none">[영어] 이현나</a></li>
                                            <li><a href="#none">[사회] 정채영</a></li>
                                            <li><a href="#none">[형사법] 기미진</a></li>
                                            <li><a href="#none">[사회] 오대혁</a></li>
                                            <li><a href="#none">[형사법] 이현나</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            @if(empty($liclist_like) == false)
                                <div class="PASSZONE-Btn">
                                <div class="w-answer"><a href="#none"><span class="aBox passBox waitBox NSK">삭제</span></a></div>
                            </div>
                            @endif
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 55px;">
                                    <col style="width: 120px;">
                                    <col style="width: 680px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                @forelse( $leclist_like as $row )
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">{{$row['StudyRate']}}%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    {{$row['SubjectName']}}<span class="row-line">|</span>
                                                    {{$row['wProfName']}}교수님
                                                    <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/classroom/pass/view/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer"><a href="#none"><span class="aBox passBox waitBox NSK">삭제</span></a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                    </tr>
                                @endforelse
                                <!--
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">82%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
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
                                        <td class="w-answer"><a href="#none"><span class="aBox passBox waitBox NSK">삭제</span></a></td>
                                    </tr>
-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Mypagetab2" class="tabLink">
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▼</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable" style="display: none;">
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
                                    <th class="tx-gray">전체보기</th>
                                    <td colspan="9">
                                        <ul class="curriSelect">
                                            <li><a href="#none">[국어] 정채영</a></li>
                                            <li><a href="#none">[영어] 기미진</a></li>
                                            <li><a href="#none">[사회] 김세령</a></li>
                                            <li><a href="#none">[형사법] 오대혁</a></li>
                                            <li><a href="#none">[영어] 이현나</a></li>
                                            <li><a href="#none">[사회] 정채영</a></li>
                                            <li><a href="#none">[형사법] 기미진</a></li>
                                            <li><a href="#none">[영어] 김세령</a></li>
                                            <li><a href="#none">[형사법] 오대혁</a></li>
                                            <li><a href="#none">[영어] 이현나</a></li>
                                            <li><a href="#none">[형사법] 정채영</a></li>
                                            <li><a href="#none">[사회] 기미진</a></li>
                                            <li><a href="#none">[영어] 김세령</a></li>
                                            <li><a href="#none">[사회] 오대혁</a></li>
                                            <li><a href="#none">[형사법] 이현나</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            @if(empty($leclist_ing) == false)
                            <div class="PASSZONE-Btn">
                                <div class="w-answer">
                                    <span class="w-chk-st"><a href="#none"><img src="{{ img_url('mypage/icon_star_on.png') }}"></a></span>
                                    <a href="#none"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                </div>
                            </div>
                            @endif
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 55px;">
                                    <col style="width: 120px;">
                                    <col style="width: 680px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                @forelse( $leclist_ing as $row )
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
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
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <span class="w-chk-st"><a href="#none"><img src="{{ img_url('mypage/icon_star_on.png') }}"></a></span>
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="tx-center">수강중강좌 정보가 없습니다.</td>
                                    </tr>
                                @endforelse
                                <!--
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <span class="w-chk-st"><a href="#none"><img src="{{ img_url('mypage/icon_star_off.png') }}"></a></span>
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">수강중강좌 정보가 없습니다.</td>
                                    </tr>
                                    -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Mypagetab3" class="tabLink">
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▼</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable" style="display: none;">
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
                                    <th class="tx-gray">전체보기</th>
                                    <td colspan="9">
                                        <ul class="curriSelect">
                                            <li><a href="#none">[영어] 이현나</a></li>
                                            <li><a href="#none">[사회] 정채영</a></li>
                                            <li><a href="#none">[형사법] 기미진</a></li>
                                            <li><a href="#none">[영어] 김세령</a></li>
                                            <li><a href="#none">[형사법] 오대혁</a></li>
                                            <li><a href="#none">[영어] 이현나</a></li>
                                            <li><a href="#none">[형사법] 정채영</a></li>
                                            <li><a href="#none">[사회] 기미진</a></li>
                                            <li><a href="#none">[영어] 김세령</a></li>
                                            <li><a href="#none">[사회] 오대혁</a></li>
                                            <li><a href="#none">[형사법] 이현나</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            @if(empty($leclist_end) == false)
                            <div class="PASSZONE-Btn">
                                <div class="w-answer" style="display: none;"><a href="#none"><span class="aBox passBox answerBox_block NSK">후기등록</span></a></div>
                            </div>
                            @endif
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 735px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                @forelse( $leclist_end as $row )
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">80%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
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
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox answerBox_block NSK">후기등록</span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="tx-center">수강종료강좌 정보가 없습니다.</td>
                                    </tr>
                                @endforelse
                                <!--
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">95%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox answerBox_block NSK">후기등록</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">수강종료강좌 정보가 없습니다.</td>
                                    </tr> =-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Mypagetab4" class="tabLink">
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▼</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable" style="display: none;">
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
                                    <th class="tx-gray">전체보기</th>
                                    <td colspan="9">
                                        <ul class="curriSelect">
                                            <li><a href="#none">[국어] 정채영</a></li>
                                            <li><a href="#none">[영어] 기미진</a></li>
                                            <li><a href="#none">[사회] 김세령</a></li>
                                            <li><a href="#none">[형사법] 오대혁</a></li>
                                            <li><a href="#none">[형사법] 정채영</a></li>
                                            <li><a href="#none">[사회] 기미진</a></li>
                                            <li><a href="#none">[영어] 김세령</a></li>
                                            <li><a href="#none">[사회] 오대혁</a></li>
                                            <li><a href="#none">[형사법] 이현나</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            @if(empty($leclist_nodisp) == false)
                            <div class="PASSZONE-Btn">
                                <div class="w-answer">
                                    <a href="#none"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                </div>
                            </div>
                            @endif
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 55px;">
                                    <col style="width: 120px;">
                                    <col style="width: 680px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                @forelse( $leclist_nodisp as $row )
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    국어<span class="row-line">|</span>
                                                    정채영교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">10강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="tx-center">숨긴강좌정보가 없습니다.</td>
                                    </tr>
                                @endforelse
                                <!--
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 (교육행정대비) 한덕현 제니스 영어 실전 동형모의고사 (4-5월)</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">숨긴강좌정보가 없습니다.</td>
                                    </tr>
                                    -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Mypage-Tabs -->

        <div id="MoreLec" class="willbes-Layer-PassBox willbes-Layer-PassBox900 h1100 abs"></div>
        <!-- willbes-Layer-PassBox : 강좌추가 -->

        <div id="MoreBook" class="willbes-Layer-PassBox willbes-Layer-PassBox800 h1100 abs"></div>
        <!-- willbes-Layer-PassBox : 무한PASS 교재구매 -->

        <div id="MyDevice" class="willbes-Layer-PassBox willbes-Layer-PassBox800 h960 abs"></div>
        <!-- willbes-Layer-PassBox : 등록기기정보 -->

    </div>
    {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <form name="postForm" id="postForm" >
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="OrderIdx" id="OrderIdx" value="{{$passinfo['OrderIdx']}}" />
        <input type="hidden" name="ProdCode" id="ProdCode" value="{{$passinfo['ProdCode']}}" />
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course_ccd,#subject_ccd,#prof_ccd,#orderby,#passidx,#sitecode').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {

                }
            });
        });

        function fnMoreLec()
        {
            url = "{{ site_url("/classroom/pass/layerMoreLec/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#MoreLec").html(d).end();
                    openWin('MoreLec');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }

        function fnMoreBook()
        {
            url = "{{ site_url("/classroom/pass/layerMoreBook/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#MoreBook").html(d).end();
                    openWin('MoreBook');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }

        function fnMyDevice()
        {
            url = "{{ site_url("/classroom/pass/layerMyDevice/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#MyDevice").html(d).end();
                    openWin('MyDevice');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }
    </script>

@stop