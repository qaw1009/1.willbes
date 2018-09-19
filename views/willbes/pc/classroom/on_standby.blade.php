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
                    · 수강대기강좌
                </div>
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">수강시작일 설정</div>
                                <div class="Txt">
                                    - 수강시작일은 개강일전까지만 변경 가능합니다.(수강연장강좌는 시작일 변경이 불가능합니다.)<br/>
                                    - '시작일 변경(잔여횟수)'버튼을 클릭하면 강의별 <span class="tx-red">최대3회, 개강일 기준 30일까지</span>만 변경이 가능합니다.</span><br/>
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
                                            <div class="w-tit">
                                                <a href="{{ site_url('/classroom/on/view/standby/') }}?orderidx={{$row['OrderIdx']}}&prodcode={{$row['ProdCode']}}&prodcodesub={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">{{$row['RealLecExpireDay']}}일</span>({{$row['LecStartDate']}}~{{$row['RealLecEndDate']}})</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강시작일 : <span class="tx-black">{{$row['LecStartDate']}}</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox blueBox NSK">수강시작</span></a>
                                            <a href="#none" onclick="openWin('STARTPASS')"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="tx-center">수강대기중인 강좌가 없습니다.</td>
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
                                </div> -->
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
                                                <dt>수강시작일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox blueBox NSK">수강시작</span></a>
                                        </td>
                                    </tr>
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
                                                <dt>수강시작일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="tx-center">수강대기중인 강좌가 없습니다.</td>
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
                    </div>
                </div>
            </div>
            <!-- willbes-Mypage-Tabs -->

            <div id="STARTPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 h800 abs">
                <a class="closeBtn" href="#none" onclick="closeWin('STARTPASS')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>
                <div class="Layer-Tit tx-dark-black NG">수강시작일 변경</div>
                <div class="lecMoreWrap">
                    <div class="PASSZONE-List widthAutoFull">
                        <ul class="passzoneInfo tx-gray NGR">
                            <li class="tit strong">· 수강시작일 설정</li>
                            <li class="txt">- 수강시작일은 개강일 전까지만 변경 가능합니다.</li>
                            <li class="txt">- '시작일변경' 버튼을 클릭하면 강의별 <span class="tx-red">최대3회, 개강일 기준 30일까지</span>만 변경이 가능합니다.</li>
                            <li class="txt">- 수강시작일을 변경하면 변경된 시작일에 맞춰 종료기간 및 잔여기간이 자동으로 셋팅됩니다.</li>
                            <li class="txt">- 수강시작이 이루어진 강좌는 시작일 변경이 불가능 합니다.</li>
                        </ul>
                        <div class="PASSZONE-Lec-Section">
                            <div class="Search-Result strong mt40 mb15 tx-gray">· 수강시작일 변경</div>
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
                                            <div class="w-tit strong">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                            <dl class="w-info tx-gray">
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w-tit bg-light-white strong">수강 시작일 변경</th>
                                        <td class="w-data tx-left pl15">
                                            <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30">&nbsp; ~&nbsp;
                                            <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">&nbsp;
                                            시작일 입력시, 종료일이 자동 변경됩니다
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="w-btn"><a class="answerBox_block NSK" href="#none" onclick="">변경</a></div>
                            </div>
                        </div>
                        <div class="PASSZONE-Lec-Section">
                            <div class="Search-Result strong mb15 tx-gray">· 수강시작일 변경이력 <span class="w-info normal">( 잔여횟수 : <span class="strong tx-light-blue">1</span>회 <span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span> 잔여기간 : <span class="strong tx-light-blue">15</span>일 )</span></div>
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
                                        <th>수강시작일<span class="row-line">|</span></th>
                                        <th>변경일자<span class="row-line">|</span></th>
                                        <th>변경자</th>
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
                                        <td colspan="4">수강시작일 변경 이력이 없습니다.</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- PASSZONE-List -->
                </div>
            </div>
            <!-- willbes-Layer-PassBox : 수강시작일 변경 -->

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