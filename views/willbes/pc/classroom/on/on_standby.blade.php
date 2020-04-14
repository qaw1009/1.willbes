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
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">수강시작일 설정</div>
                                <div class="Txt">
                                    - 수강시작일은 개강일전까지만 변경 가능합니다.(수강연장강좌는 시작일 변경이 불가능합니다.)<br/>
                                    - '시작일 변경(잔여횟수)'버튼을 클릭하면 강의별 <span class="tx-red">최대3회, 개강일 기준 30일까지</span>만 변경이 가능합니다.<br/>
                                    - 수강시작일을 변경하면 변경된 시작일에 맞춰 종료기간 및 잔여기간이 자동으로 셋팅됩니다.<br/>
                                    - '수강시작'이 이루어진 강좌는 시작일 변경이 불가능합니다.<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-ONLINEZONE -->

            <div class="willbes-Mypage-Tabs mt40">
                <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/on/list/standby/', 'www')}}" onsubmit="">
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                        <select id="sitegroup_ccd" name="sitegroup_ccd" title="process" class="seleProcess">
                            <option selected="selected" value="">과정</option>
                            @foreach($sitegroup_arr as $row )
                                <option value="{{$row['SiteGroupCode']}}" @if(isset($input_arr['sitegroup_ccd']) && $input_arr['sitegroup_ccd'] == $row['SiteGroupCode']) selected="selected" @endif  >{{$row['SiteGroupName']}}</option>
                            @endforeach
                        </select>
                        <!--
                        <select id="course_ccd" name="course_ccd" title="process" class="seleProcess">
                            <option selected="selected" value="">과정</option>
                            @foreach($course_arr as $row )
                                <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                            @endforeach
                        </select>
                        -->
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
                        <li><a href="#Mypagetab1" class="on">단강좌 ({{count($lecList)}})</a></li>
                        <li><a href="#Mypagetab2">패키지강좌 ({{count($pkgList)}})</a></li>
                        <li><a href="#Mypagetab3">PASS강좌 ({{count($passList)}})</a></li>
                        <li><a href="#Mypagetab4">관리자부여강좌 ({{count($adminList['lec'])+count($adminList['pkg'])}})</a></li>
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
                                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                                        {{$row['wProfName']}}교수님
                                                        <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl><br/>
                                                @if($row['LecTypeCcd'] == '607003')
                                                    <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                                @endif
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/classroom/on/view/standby/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['RealLecExpireDay']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강시작일 : <span class="tx-black">{{$row['LecStartDate']}}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                {{-- @if($row['IsRebuy'] > 0 || $row['RebuyCount'] > 0) --}}
                                                @if($row['SalePatternCcd'] == '694003')
                                                    <span class="bBox blueBox NSK">시작일변경 불가</span>
                                                @elseif($row['IsLecStart'] == 'Y')
                                                    @if(empty($row['StudyStartDate']) == false && $row['StudyStartDate'] > date('Y-m-d', time()))
                                                        <a href="javascript:;" onclick="alert('개강일({{ date('m월d일', strtotime($row['StudyStartDate'])) }}) 이후부터 수강시작이 가능합니다.');"><span class="bBox blueBox NSK">수강시작</span></a>
                                                    @else
                                                        <a href="javascript:;" onclick="fnStartToday('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S');"><span class="bBox blueBox NSK">수강시작</span></a>
                                                    @endif
                                                    <a href="javascript:;" onclick="fnStartChange('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S');"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">{{$row['ChgStartNum']}}</span>)</span></a>
                                                @else
                                                    <span class="bBox blueBox NSK">시작일변경 불가</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="tx-center">수강대기중인 강좌가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="Mypagetab2" class="tabLink">
                            @forelse( $pkgList as $row )
                                <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        <tr class="bg-light-blue">
                                            <td class="w-data tx-left pl10">
                                                <div class="w-tit">
                                                    {{$row['ProdName']}}
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강시작일 : <span class="tx-black">{{$row['LecStartDate']}}</span></dt>
                                                    <dt class="MoreBtn"><a href="javascript:;">강좌 열기 ▼</a></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                @if($row['SalePatternCcd'] == '694003')
                                                    <span class="bBox blueBox NSK">시작일변경 불가</span>
                                                @elseif($row['IsLecStart'] == 'Y')
                                                    @if(empty($row['StudyStartDate']) == false && $row['StudyStartDate'] > date('Y-m-d', time()))
                                                        <a href="javascript:;" onclick="alert('개강일({{ date('m월d일', strtotime($row['StudyStartDate'])) }}) 이후부터 수강시작이 가능합니다.');"><span class="bBox blueBox NSK">수강시작</span></a>
                                                    @else
                                                        <a href="javascript:;" onclick="fnStartToday('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P');"><span class="bBox blueBox NSK">수강시작</span></a>
                                                    @endif
                                                    <a href="javascript:;" onclick="fnStartChange('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P');"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">{{$row['ChgStartNum']}}</span>)</span></a>
                                                @else
                                                    <span class="bBox blueBox NSK">시작일변경 불가</span>
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
                                                    @if($subrow['LecTypeCcd'] == '607003')
                                                        <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                                    @endif
                                                    <div class="w-tit">
                                                        <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$subrow['OrderIdx']}}&p={{$subrow['ProdCode']}}&ps={{$subrow['ProdCodeSub']}}">{{$subrow['subProdName']}}</a>
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>강의수 : <span class="tx-black">{{$subrow['wUnitLectureCnt']}}강</span></dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>잔여기간 : <span class="tx-blue">{{$subrow['remainDays']}}일</span>({{$subrow['LecStartDate']}}~{{$subrow['RealLecEndDate']}})</dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>최종학습일 : <span class="tx-black">{{ $subrow['lastStudyDate'] == '' ? '학습이력없음' : $subrow['lastStudyDate'] }}</span></dt>
                                                    </dl>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @empty
                                <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td colspan="2" class="tx-center">수강대기중인 강좌가 없습니다.</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endforelse

                        </div>
                        <div id="Mypagetab3" class="tabLink">
                            <div class="willbes-Lec-Table pt20 NG d_block">
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 820px;">
                                        <col style="width: 120px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse( $passList as $row )
                                    <tr>
                                        <td class="w-data tx-left pl10">
                                            <div class="w-tit">
                                                {{$row['ProdName']}}
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강시작일 : <span class="tx-black">{{$row['LecStartDate']}}</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            @if($row['IsLecStart'] == 'Y')
                                                @if(empty($row['StudyStartDate']) == false && $row['StudyStartDate'] > date('Y-m-d', time()))
                                                    <a href="javascript:;" onclick="alert('개강일({{ date('m월d일', strtotime($row['StudyStartDate'])) }}) 이후부터 수강시작이 가능합니다.');"><span class="bBox blueBox NSK">수강시작</span></a>
                                                @else
                                                    <a href="javascript:;" onclick="fnStartToday('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P');"><span class="bBox blueBox NSK">수강시작</span></a>
                                                @endif
                                                <a href="javascript:;" onclick="fnStartChange('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P');"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">{{$row['ChgStartNum']}}</span>)</span></a>
                                            @else
                                                <span class="bBox blueBox NSK">시작일변경 불가</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="tx-center">수강대기중인 강좌가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="Mypagetab4" class="tabLink">
                            <div class="PassCurriBox CurrLineiBox">
                                <dl class="w-info tx-gray">
                                    <dt><a href="javascript:;" onclick="fnAdminTab('admintab1',this);" class="tx-blue strong">단강좌 ({{count($adminList['lec'])}})</a></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt><a href="javascript:;" onclick="fnAdminTab('admintab2',this);">패키지 ({{count($adminList['pkg'])}})</a></dt>
                                </dl>
                            </div>
                            <div id="admintab1" class="willbes-Lec-Table pt20 NG admintab">
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 820px;">
                                        <col style="width: 120px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse( $adminList['lec'] as $row )
                                        <tr>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                                        {{$row['wProfName']}}교수님
                                                        <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl><br/>
                                                @if($row['LecTypeCcd'] == '607003')
                                                    <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                                @endif
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/classroom/on/view/standby/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['RealLecExpireDay']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강시작일 : <span class="tx-black">{{$row['LecStartDate']}}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                @if($row['IsRebuy'] > 0 || $row['RebuyCount'] > 0)
                                                    <span class="bBox blueBox NSK">시작일변경 불가</span>
                                                @elseif($row['IsLecStart'] == 'Y')
                                                    @if(empty($row['StudyStartDate']) == false && $row['StudyStartDate'] > date('Y-m-d', time()))
                                                        <a href="javascript:;" onclick="alert('개강일({{ date('m월d일', strtotime($row['StudyStartDate'])) }}) 이후부터 수강시작이 가능합니다.');"><span class="bBox blueBox NSK">수강시작</span></a>
                                                    @else
                                                        <a href="javascript:;" onclick="fnStartToday('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S');"><span class="bBox blueBox NSK">수강시작</span></a>
                                                    @endif
                                                    <a href="javascript:;" onclick="fnStartChange('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S');"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">{{$row['ChgStartNum']}}</span>)</span></a>
                                                @else
                                                    <span class="bBox blueBox NSK">시작일변경 불가</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="tx-center">수강중인 강좌가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div id="admintab2" class="willbes-Lec-Table pt20 NG admintab" style="display:none !important;">
                                @forelse( $adminList['pkg'] as $row )
                                    <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
                                        <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                            <colgroup>
                                                <col style="width: 820px;">
                                                <col style="width: 120px;">
                                            </colgroup>
                                            <tbody>
                                            <tr class="bg-light-blue">
                                                <td class="w-data tx-left pl10">
                                                    <div class="w-tit">
                                                        {{$row['ProdName']}}
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>수강시작일 : <span class="tx-black">{{$row['LecStartDate']}}</span></dt>
                                                        <dt class="MoreBtn"><a href="javascript:;">강좌 열기 ▼</a></dt>
                                                    </dl>
                                                </td>
                                                <td class="w-answer">
                                                    @if($row['IsLecStart'] == 'Y')
                                                        @if(empty($row['StudyStartDate']) == false && $row['StudyStartDate'] > date('Y-m-d', time()))
                                                            <a href="javascript:;" onclick="alert('개강일({{ date('m월d일', strtotime($row['StudyStartDate'])) }}) 이후부터 수강시작이 가능합니다.');"><span class="bBox blueBox NSK">수강시작</span></a>
                                                        @else
                                                            <a href="javascript:;" onclick="fnStartToday('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P');"><span class="bBox blueBox NSK">수강시작</span></a>
                                                        @endif
                                                        <a href="javascript:;" onclick="fnStartChange('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P');"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">{{$row['ChgStartNum']}}</span>)</span></a>
                                                    @else
                                                        <span class="bBox blueBox NSK">시작일변경 불가</span>
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
                                                        @if($subrow['LecTypeCcd'] == '607003')
                                                            <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                                        @endif
                                                        <div class="w-tit">
                                                            <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$subrow['OrderIdx']}}&p={{$subrow['ProdCode']}}&ps={{$subrow['ProdCodeSub']}}">{{$subrow['subProdName']}}</a>
                                                        </div>
                                                        <dl class="w-info tx-gray">
                                                            <dt>강의수 : <span class="tx-black">{{$subrow['wUnitLectureCnt']}}강</span></dt>
                                                            <dt><span class="row-line">|</span></dt>
                                                            <dt>잔여기간 : <span class="tx-blue">{{$subrow['remainDays']}}일</span>({{$subrow['LecStartDate']}}~{{$subrow['RealLecEndDate']}})</dt>
                                                            <dt><span class="row-line">|</span></dt>
                                                            <dt>최종학습일 : <span class="tx-black">{{ $subrow['lastStudyDate'] == '' ? '학습이력없음' : $subrow['lastStudyDate'] }}</span></dt>
                                                        </dl>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @empty
                                    <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
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
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-Mypage-Tabs -->

            <div id="STARTPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs"></div>
            <!-- willbes-Layer-PassBox : 수강시작일 변경 -->

        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <form name="chgForm" id="chgForm" >
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="orderidx" id="orderidx" value="" />
        <input type="hidden" name="prodcode" id="prodcode" value="" />
        <input type="hidden" name="prodcodesub" id="prodcodesub" value="" />
        <input type="hidden" name="prodtype" id="prodtype" value="" />
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course_ccd,#subject_ccd,#prof_ccd,#sitegroup_ccd').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {
                }
            });
        });

        function fnStartChange(o, p, sp, t)
        {
            $("#STARTPASS").html('');
            $('#orderidx').val(o);
            $('#prodcode').val(p);
            $('#prodcodesub').val(sp);
            $('#prodtype').val(t);

            url = "{{ site_url("/classroom/on/layerStartDate/") }}";
            data = $('#chgForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#STARTPASS").html(d).end();
                    openWin('STARTPASS');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }

        function fnStartToday(o, p, sp, t)
        {
            if(window.confirm('시작일을 오늘로 설정하시겠습니까?') == false){
                return;
            }

            $('#orderidx').val(o);
            $('#prodcode').val(p);
            $('#prodcodesub').val(sp);
            $('#prodtype').val(t);

            url = "{{ site_url("/classroom/on/setStartToday/") }}";
            data = $('#chgForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert("시작일이 오늘로 설정되었습니다.");
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'html');
        }

        function fnAdminTab(obj, o)
        {
            $('.admintab').hide();
            $('#'+obj).show();
            $(o).parent().parent().find('dt>a').removeClass('strong').removeClass('tx-blue');
            $(o).addClass('strong').addClass('tx-blue');
        }
    </script>
@stop





















































