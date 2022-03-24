@extends('willbes.pc.layouts.master_no_sitdbar')
@section('content')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css" rel="stylesheet">
    <script src="/public/vendor/Nwagon/Nwagon.js"></script>
    <link rel="stylesheet" href="/public/vendor/Nwagon/Nwagon.css">

    <div class="m_section3_wrap">
        {{--지역별 현황--}}
        <div class="m_section3_2">
            <h2><span>지역별</span> 현황</h2>
            <div class="choice">
                <ul id="choice_ul">
                    @foreach($serialList as $key => $val)
                        <li><a href="javascript:selSerial({{ $key }});" id="se_{{ $key }}" class="{{ $loop->index == 1 ? 'active' : '' }}">{{ $val }}</a></li>
                    @endforeach
                </ul>
            </div>
            <input type="hidden" id="selS" value="100" />
            {{--전의경경채--}}
            <div class="m_section3_box">
                {{--응시지역--}}
                <span id="areaset1">
                <div class="m_section3_L">
                    <ul class="tabs_2016" id="listview">
                        <li class="seoul"><a href="javascript:selArea(712001)" id="ss_712001" alt="서울" class="active">서울</a></li>
                        <li class="ic"><a href="javascript:selArea(712004)" id="ss_712004"  alt="인천">인천</a></li>
                        <li class="kkb"><a href="javascript:selArea(712009)" id="ss_712009" alt="경기북부">경기북부</a></li>
                        <li class="kkn"><a href="javascript:selArea(712008)" id="ss_712008" alt="경기남부">경기남부</a></li>
                        <li class="kw"><a href="javascript:selArea(712010)" id="ss_712010" alt="강원">강원</a></li>
                        <li class="cb"><a href="javascript:selArea(712011)" id="ss_712011" alt="충북">충북</a></li>
                        <li class="cn"><a href="javascript:selArea(712012)" id="ss_712012" alt="충남">충남</a></li>
                        <li class="dj"><a href="javascript:selArea(712006)" id="ss_712006" alt="대전">대전</a></li>
                        <li class="kb"><a href="javascript:selArea(712015)" id="ss_712015" alt="경북">경북</a></li>
                        <li class="kn"><a href="javascript:selArea(712016)" id="ss_712016" alt="경남">경남</a></li>
                        <li class="dk"><a href="javascript:selArea(712003)" id="ss_712003" alt="경남">대구</a></li>
                        <li class="bs"><a href="javascript:selArea(712002)" id="ss_712002" alt="부산">부산</a></li>
                        <li class="us"><a href="javascript:selArea(712007)" id="ss_712007" alt="울산">울산</a></li>
                        <li class="jb"><a href="javascript:selArea(712013)" id="ss_712013" alt="전북">전북</a></li>
                        <li class="jn"><a href="javascript:selArea(712014)" id="ss_712014" alt="전남">전남</a></li>
                        <li class="kj"><a href="javascript:selArea(712005)" id="ss_712005" alt="광주">광주</a></li>
                        <li class="jj"><a href="javascript:selArea(712017)" id="ss_712017" alt="제주">제주</a></li>
                    </ul>
                </div>
            </span>
                <span id="areaset2" style="display:none;">
                <div class="m_section3_L">
                    <ul class="tabs_2016" id="listview">
                        <li class="seoul"><a href="javascript:selArea(712001)" alt="서울" class="active">서울</a></li>
                    </ul>
                </div>
            </span>>
                <!--m_section3_L//-->

                {{--모집구분표--}}
                <div class="m_section3_R">
                    @foreach($areaList as $key => $val)
                        @foreach($areaList[$key] as $key2 => $val2)
                            <span id="area_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}" @if($val2['TakeMockPart'] == 100 && $val2['TakeArea'] == 712001) style="" @else style="display:none;" @endif>
                        <h3 id="title_info">{{ $val2['Serialname'] }} - <span class="NSK">{{ $val2['Areaname'] }}</span></h3>
                        <table class="boardTypeB">
                            <col width="30%" />
                            <col />
                            <col />
                            <thead>
                            <tr>
                                <th>직렬 </th>
                                <th>{{ $val2['Serialname'] }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>선발인원(출원인원)</th>
                                <td>{{ number_format((int)$val2['PickNum']) }} ({{ number_format((int)$val2['TakeNum']) }})</td>
                            </tr>
                            <tr>
                                <th>2021 2차 경쟁률</th>
                                <td>{{ $val2['CompetitionRateNow'] }}</td>
                            </tr>
                            <tr>
                                <th>직전시험 경쟁률</th>
                                <td>{{ $val2['CompetitionRateAgo'] }} </td>
                            </tr>
                            <tr>
                                <th>입력자 평균</th>
                                <td>{{ $val2['AvrPoint'] }} </td>
                            </tr>
                            <tr class="bg01">
                                <th>합격기대권</th>
                                @if($val2['IsUse'] == 'Y')<td>{{ $val2['ExpectAvrPoint1'] ? $val2['ExpectAvrPoint1'] : $val2['ExpectAvrPoint1Ref'] }}~{{ $val2['ExpectAvrPoint2'] ? $val2['ExpectAvrPoint2'] : $val2['ExpectAvrPoint2Ref'] }}</td>@else<td>집계중</td>@endif
                            </tr>
                            <tr class="bg01">
                                <th>합격유력권</th>
                                @if($val2['IsUse'] == 'Y')<td>{{ $val2['StrongAvrPoint1'] ? $val2['StrongAvrPoint1'] : $val2['StrongAvrPoint1Ref'] }}~{{ $val2['StrongAvrPoint2'] ? $val2['StrongAvrPoint2'] : $val2['StrongAvrPoint2Ref'] }}</td>@else<td>집계중</td>@endif
                            </tr>
                            <tr class="bg01">
                                <th>합격안정권</th>
                                @if($val2['IsUse'] == 'Y')<td> {{ $val2['StabilityAvrPoint'] ? $val2['StabilityAvrPoint'] : $val2['StabilityAvrPointRef'] }} 이상 </td>@else<td>집계중</td>@endif
                            </tr>
                            {{--<tr class="bg01">
                                <th>직전시험 합격선</th>
                                <td>{{ $val2['PassLineAgo'] }} </td>
                            </tr>--}}
                            </tbody>
                        </table>
                        </span>
                        @endforeach
                    @endforeach
                    <p class="area_txt"></p>
                </div>
                <!--m_section3_R//-->
            </div>
        </div>

        {{--과목별 원점수 평균--}}
        <div class="m_section3_3">
            <h2>과목별 <span>원점수 평균</span></h2>
            {{--@if(empty($gradelist2) === false)--}}
            @if(empty($gradedata_1) === true || empty($gradedata_2) === true)
                <div class="txtBox01">가답안 발표 후 해당 서비스가 제공됩니다.</div>
            @else
                <div class="m_section3_3L">
                    <table class="boardTypeB">
                        <thead>
                        <tr>
                            <th scope="col">직렬</th>
                            <th scope="col">과목</th>
                            <th scope="col">참여자 실시간 평균</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($gradelist2 as $row)
                            <tr>
                                <th class="{{ $row['Type'] == 'P' ? 'thBg01' : '' }}">{{ $row['SubjectName'] }}</th>
                                <td>{{ $row['Avg'] }}</td>
                            </tr>
                        @endforeach--}}
                        <tr>
                            <th class="thBg01" rowspan="4">
                                일반공채(남),
                                일반공채(여),
                                101단
                            </th>
                        </tr>
                        @foreach($gradedata_1 as $row)
                            <tr>
                                <td>{{ $row['SubjectName'] }}</td>
                                <td>{{ $row['Avg'] }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th class="thBg01" rowspan="4">
                                전의경경채
                            </th>
                        </tr>
                        @foreach($gradedata_2 as $row)
                            <tr>
                                <td>{{ $row['SubjectName'] }}</td>
                                <td>{{ $row['Avg'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if(empty($gradeList) === false)
                <div class="m_section3_3R">
                    <select id="selgrade" style="width:98%; border:#555 1px solid; height:28px; line-height:28px;" onchange="selGrade(this.value)">
                        @foreach($gradeList as $key => $val)
                            <option value="{{ $val['subject'] }}{{ $val['grade'] }}" selected="selected">{{ $val['subject'] }}</option>
                        @endforeach
                    </select>
                    <div class="mt10">
                        <div id="Nwagon"></div>
                    </div>
                </div>
            @endif
        </div>

        {{--합격예측 참여자 분석 현황--}}
        <div class="m_section3_3">
            <h2><span>합격예측 참여자</span> 분석 현황 - 일반공채(남), 일반공채(여), 101단 </h2>
            @if(empty($pointList) === false)
                <div class="m_section3_3L">
                    <h3><Expect>총점</Expect> 성적 분포</h3>
                    <table class="boardTypeC">
                        <col width="20%" />
                        <col width="" />
                        @php $_arr_pa_area = ['4' => '201-250', '3' => '151-200', '2' => '101-150', '1' => '51-100', '0' => '0-50']; @endphp
                        @foreach($_arr_pa_area as $key => $val)
                            <tr>
                                <th>{{ $val }}</th>
                                <td>
                                    <div class="graph"><span class="graph1" style="width:{{ element($key, $pointList, 0) }}%"></span></div>
                                    <Expect class="ratio"><span id="pa{{ $val }}">{{ element($key, $pointList, 0) }}</span>%</Expect>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mt10">
                        <div id="pointarea"></div>
                    </div>
                </div>

                <div class="m_section3_3R">
                    <h3><Expect>과목별</Expect> 성적 분포 - 헌법</h3>
                    <div class="m_section3_3R_warp">
                        <table class="boardTypeC">
                            <col width="20%" />
                            <col width="" />
                            @php $_arr_pa_area = ['4' => '41-50', '3' => '31-40', '2' => '21-30', '1' => '11-20', '0' => '0-10']; @endphp
                            @foreach($_arr_pa_area as $key => $val)
                                <tr>
                                    <th>{{ $val }}</th>
                                    <td>
                                        <div class="graph"><span class="graph1" style="width:{{ element($key, $subjectPointList_1, 0) }}%"></span></div>
                                        <Expect class="ratio"><span id="pa-1{{ $val }}">{{ element($key, $subjectPointList_1, 0) }}</span>%</Expect>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="mt10">
                            <div id="pointarea_subject_1"></div>
                        </div>
                    </div>
                </div>

                <div class="m_section3_3L">
                    <h3><Expect>과목별</Expect> 성적 분포 - 형사법</h3>
                    <table class="boardTypeC">
                        <col width="20%" />
                        <col width="" />
                        @php $_arr_pa_area = ['4' => '81-100', '3' => '61-80', '2' => '41-60', '1' => '21-40', '0' => '0-20']; @endphp
                        @foreach($_arr_pa_area as $key => $val)
                            <tr>
                                <th>{{ $val }}</th>
                                <td>
                                    <div class="graph"><span class="graph1" style="width:{{ element($key, $subjectPointList_2, 0) }}%"></span></div>
                                    <Expect class="ratio"><span id="pa-2{{ $val }}">{{ element($key, $subjectPointList_2, 0) }}</span>%</Expect>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mt10">
                        <div id="pointarea_subject_2"></div>
                    </div>
                </div>

                <div class="m_section3_3R">
                    <h3><Expect>과목별</Expect> 성적 분포 - 경찰학</h3>
                    <div class="m_section3_3R_warp">
                        <table class="boardTypeC">
                            <col width="20%" />
                            <col width="" />
                            @php $_arr_pa_area = ['4' => '81-100', '3' => '61-80', '2' => '41-60', '1' => '21-40', '0' => '0-20']; @endphp
                            @foreach($_arr_pa_area as $key => $val)
                                <tr>
                                    <th>{{ $val }}</th>
                                    <td>
                                        <div class="graph"><span class="graph1" style="width:{{ element($key, $subjectPointList_3, 0) }}%"></span></div>
                                        <Expect class="ratio"><span id="pa-3{{ $val }}">{{ element($key, $subjectPointList_3, 0) }}</span>%</Expect>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="mt10">
                            <div id="pointarea_subject_3"></div>
                        </div>
                    </div>
                </div>
            @else
                <div class="txtBox01">가답안 발표 후 해당 서비스가 제공됩니다.</div>
            @endif
            <!--m_section3_3L//-->
            {{--@if(empty($subjectPointList) === false)
                <div class="m_section3_3R">
                    <h3><Expect>과목별</Expect> 성적 분포 - <Expect id="grtxt"></Expect></h3>
                    <div class="m_section3_3R_warp">
                        <ul>
                            <li>
                                <table class="boardTypeC">
                                    <col width="20%" />
                                    <col width="" />
                                    @php $_arr_gr_area = ['5' => '81-100', '4' => '61-80', '3' => '41-60', '2' => '21-40', '1' => '0-20']; @endphp
                                    @foreach($_arr_gr_area as $key => $val)
                                        <tr>
                                            <th>{{ $val }}</th>
                                            <td>
                                                <div class="graph"><span id='gr{{ $key }}' class="graph1"></span></div>
                                                <Expect class="ratio" id="grt{{ $key }}"></Expect>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="mt10">
                                    <div id="pointarea2"></div>
                                </div>
                            </li>
                        </ul>
                        <p class="leftBtn"><a onClick="selPoint2('P')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1211_arrowL.png" alt="이전"/></a></p>
                        <p class="rightBtn"><a onClick="selPoint2('N')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1211_arrowR.png" alt="다음"/></a></p>
                    </div>
                </div>
            @endif--}}
        <!--m_section3_3R//-->
        </div>

        <div class="m_section3_3">
            <div class="mt50">
                @if(empty($bestList) === false)
                    <div class="m_section3_3L clear">
                        <h3>선택 과목 <Expect>단일</Expect> 선택 선호도 Best3</h3>
                        <table class="boardTypeB">
                            <tr>
                                <th scope="col">순위</th>
                                <th scope="col">선택과목명</th>
                                <th scope="col">비율</th>
                            </tr>
                            @foreach($bestList as $row)
                                <tr class="best-subject">
                                    <th>{{ $loop->index }}</th>
                                    <td class="best-subject-name">{{ $row['SubjectName'] }}</td>
                                    <td><span class="best-subject-ratio">{{ $row['SubjectRatio'] }}</span>%</td>
                                </tr>

                                @if($loop->index >= 3)
                                    @break;
                                @endif
                            @endforeach
                        </table>
                        <div class="mt10">
                            <div id="best1"></div>
                        </div>
                    </div>
                @endif
            <!--m_section3_3L//-->

                @if(empty($bestCombList) === false)
                    <div class="m_section3_3R">
                        <h3>선택 과목 <Expect>조합</Expect> 선택 선호도 Best3</h3>
                        <table class="boardTypeB">
                            <tr>
                                <th scope="col">순위</th>
                                <th scope="col">선택과목명</th>
                                <th scope="col">비율</th>
                            </tr>
                            @foreach($bestCombList as $row)
                                <tr class="best-comb-subject">
                                    <th>{{ $loop->index }}</th>
                                    <td class="best-comb-subject-name">{{ $row['SubjectName'] }}</td>
                                    <td><span class="best-comb-subject-ratio">{{ $row['SubjectRatio'] }}</span>%</td>
                                </tr>

                                @if($loop->index >= 3)
                                    @break;
                                @endif
                            @endforeach
                        </table>
                        <div class="mt10">
                            <div id="best2"></div>
                        </div>
                    </div><!--m_section3_3R//-->
                @endif
            </div>
        </div>

        {{--과목별 체감난이도--}}
        <div class="m_section3_3">
            @if(empty($surveyStatisticsList['Now'])===false)
                <h2>
                    과목별 <span>체감난이도</span>
                    <div>
                        <select id="selsubject" name="selsubject" class="mg-zero" onChange="selSurvey(this);">
                            @foreach($surveyStatisticsList['Now'] as $item => $val)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </h2>
                @foreach($surveyStatisticsList['Now'] as $title => $val)
                    <div class="graph_box" @if($loop->index > 1) style="display: none" @endif>
                        <table class="boardTypeC">
                            {{--<col width="40%" />--}}
                            <col width="20%" />
                            <col width="80%" />
                            @if(empty($val) === false)
                                @foreach($val as $item => $spread)
                                <tr>
                                    {{--
                                    <td>
                                        <div class="graph2ch"><span class="graph2" style="width:{{ $surveyStatisticsList['Prev'][$title][$item] or 0 }}%"></span></div>
                                        <Expect class="ratio2ch">{{ $surveyStatisticsList['Prev'][$title][$item] or 0 }}%</Expect>
                                    </td>
                                    --}}
                                    <th>{{ $item }}</th>
                                    <td>
                                        <div class="graph"><span class="graph1" style="width:{{ $spread or 0 }}%"></span></div>
                                        <Expect class="ratio">{{ $spread or 0 }}%</Expect>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            <tr>
                                {{--<td>2021년 1차</td>--}}
                                <th>구분</th>
                                <td>2022년 1차</td>
                            </tr>
                        </table>
                    </div>
                @endforeach
{{--                <div class="tx-red mt10">※ 2020년 1차 경찰시험에서는 경행경채를 진행하지 않았으므로 해당 과목(수사, 행정법)에 대한 19년 2차 체감난이도를 제공하지 않습니다.</div>--}}
            @endif
        </div>

        {{--과목별 오답 랭킹--}}
        <div class="m_section3_4">
            @if(empty($wrongList) === false)
                <h2>
                    과목별 <span>오답 랭킹</span>
                    <div>
                        <select id="selwrong" name="selwrong" class="mg-zero" onchange="selWrong(this.value)">
                            @foreach($wrongSubject as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </h2>
                <div class="mt20">
                    <table class="boardTypeB">
                        <tr>
                            <th width="10%" rowspan="2">순위 </th>
                            <th width="10%" rowspan="2">문제번호 </th>
                            <th width="10%" rowspan="2">정답 </th>
                            <th colspan="4">보기 선택률 </th>
                        </tr>
                        <tr>
                            <th>① </th>
                            <th>② </th>
                            <th>③ </th>
                            <th>④ </th>
                        </tr>
                        @set($wrongIdx = 0)
                        @foreach($wrongList as $key => $arr)
                            @foreach($arr as $idx => $row)
                                <tr class="wtr_{{ $key }}" @if($wrongIdx > 0) style="display:none;" @endif>
                                    <td>{{ $row['RankNum'] }}</td>
                                    <td>{{ $row['QuestionNO'] }}</td>
                                    <td>{{ $row['RightAnswer'] }}</td>
                                    <td>{{ $row['AnswerRatio1'] }}%</td>
                                    <td>{{ $row['AnswerRatio2'] }}%</td>
                                    <td>{{ $row['AnswerRatio3'] }}%</td>
                                    <td>{{ $row['AnswerRatio4'] }}%</td>
                                </tr>
                            @endforeach
                            @set($wrongIdx = $wrongIdx + 1)
                        @endforeach
                    </table>
                    <table cellspacing="0" cellpadding="0" class="boardTypeD mt20">
                        @foreach($wrongList as $key => $arr)
                            <tr class="wtr_{{ $key }}" @if($loop->index > 1) style="display:none;" @endif>
                                @foreach($arr as $idx => $row)
                                    <td>
                                        <ul class="graph graph{{ $idx + 1 }}">
                                            <li>
                                                <Expect>{{ $row['AnswerRatio1'] }}%</Expect>
                                                <div><span style="height:{{ $row['AnswerRatio1'] }}%;"></span></div>
                                                <span>①</span>
                                            </li>
                                            <li>
                                                <Expect>{{ $row['AnswerRatio2'] }}%</Expect>
                                                <div><span style="height:{{ $row['AnswerRatio2'] }}%;"></span></div>
                                                <span>②</span>
                                            </li>
                                            <li>
                                                <Expect>{{ $row['AnswerRatio3'] }}%</Expect>
                                                <div><span style="height:{{ $row['AnswerRatio3'] }}%;"></span></div>
                                                <span>③</span>
                                            </li>
                                            <li>
                                                <Expect>{{ $row['AnswerRatio4'] }}%</Expect>
                                                <div><span style="height:{{ $row['AnswerRatio4'] }}%;"></span></div>
                                                <span>④</span>
                                            </li>
                                        </ul>
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="wtr_{{ $key }}" @if($loop->index > 1) style="display:none;" @endif>
                                @foreach($arr as $idx => $row)
                                    <th scope="col">문제 {{ $row['QuestionNO'] }}</th>
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>

        <div class="m_section3_5">
            시험지 및 정답 다운로드 <a href="https://public.jinhakapply.com/PoliceV2/data/QuestionAnswerList.aspx?ReturnSite=SC&ServiceID=19&CategoryID=9&CurrentPage=1" target="_blank">바로가기 ▶</a>
        </div>

        <div class="m_section3_6">
            <div class="pollWrap">
                <h3>설문조사
                    <div>
                        <a href="javascript:surveyOpen()" >설문참여</a>
                    </div>
                </h3>
                <ul>
                    <li>Q1. 전체적인 시험난이도는?</li>
                    <li>Q2. 과목별 시험난이도는?</li>
                    <li>Q3. 시험준비하면서 도움된 부분은?</li>
                    <li>Q4. 신광은 경찰면접캠프를 알고있는가?</li>
                </ul>
            </div>

            <div class="bannerWarp">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2080_bn1.png" alt="최종합격을 결정짓는 2차 전형 윌비스 전문가와 함께 전략적으로 준비하세요">
                <div>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/2022/03/2572_camp.png" alt="면접캠프설명회">
                    </a>
                </div>
            </div>
        </div>

        {{--설문결과--}}
        <div class="m_section3_7">
            @if(empty($surveyList) === false)
                <div>
                    <h3>설문조사 결과</h3>
                    <div class="popcontent">
                        <div class="question">
                            <p>응시직렬 </p>
                            <div class="qBox">
                                <ul>
                                    @if(empty($series_data) === false)
                                        @foreach($series_data as $series_key => $series_val)
                                            @foreach($series_val as $key => $title)
                                            <li>
                                                <label><input type="radio" name="sp_serial" value="{{ $key }}" onClick="selSurveyGraph(this.value);" {{ $key == 1 ? 'checked="checked"' : '' }}>{{ $title }}</label>
                                            </li>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div id="graph_box"></div>
                    </div>
                </div>
            @endif
        </div>

    </div><!--m_section3_wrap//-->
    <script>
        $(document).ready(function () {
            $('#selgrade option').eq(0).prop('selected', 'selected');
            selGrade($('#selgrade option:selected').val());
            selPoint();
            selPoint_1();
            selPoint_2();
            selPoint_3();
            /*selPoint2(0);*/
            bestSubject();
            bestCombSubject();
            setAreaMsg(0);
            selSurveyGraph($('input[name="sp_serial"]:checked').val());
        });

        // 지역별 현황
        function selSerial(num){
            setAreaMsg(num);
            $("[id*='se_']").removeClass('active');
            $("#se_"+num).addClass('active');
            $('#selS').val(num);

            // 탭 이동시 서울지역 디폴트 선택
            $("[id*='area_']").hide();
            $("#area_"+num+'_712001').show();
            $("[id*='ss_']").removeClass('active');
            $("#ss_712001").addClass('active');
            if(num === 400) {
                $('#areaset1').hide();
                $('#areaset2').show();
            } else {
                $('#areaset1').show();
                $('#areaset2').hide();
            }
        }

        // 지역별 현황 - 지역 선택
        function selArea(num) {
            $("[id*='area_']").hide();
            $("[id*='ss_']").removeClass('active');
            $("#ss_" + num).addClass('active');
            $("#area_" + $('#selS').val() + '_' + num).show();
        }

        // 과목별 원점수 평균
        function selGrade(val){
            if ($('#selgrade').length < 1) {
                return;
            }

            var arrStr = val.split('/');
            var options = {
                'legend':{
                    names: [arrStr[0], arrStr[1], arrStr[2], arrStr[3], arrStr[4]],
                    hrefs: []
                },
                'dataset': {
                    title: 'Web accessibility status',
                    values: [[parseInt(arrStr[5]),parseInt(arrStr[6]),parseInt(arrStr[7]),parseInt(arrStr[8]),parseInt(arrStr[9])]],
                    bgColor: '#f9f9f9',
                    fgColor: '#30a1ce'
                },
                'chartDiv': 'Nwagon',
                'chartType': 'radar',
                'chartSize': { width: 500, height: 300 }
            };
            $('#Nwagon').html('');
            Nwagon.chart(options);
        }

        // 총점 성적분포
        function selPoint() {
            if ($('#pointarea').length < 1) {
                return;
            }

            var fields = ['0-50', '51-100', '101-150', '151-200', '201-250'];
            var values = [];
            var length = fields.length;
            for(var i = 0; i < length; i++) {
                values.push(parseFloat($('#pa' + fields[i]).text()));
            }

            var options = {
                'dataset':{
                    title: 'Web accessibility status',
                    values: values,
                    colorset: ['#2EB400', '#2BC8C9', "#666666", '#f09a93' , '#f10a00'],
                    fields: fields
                },
                'donut_width' : 35,
                'core_circle_radius':50,
                'chartDiv': 'pointarea',
                'chartType': 'donut',
                'chartSize': {width:700, height:300}
            };
            Nwagon.chart(options);
        }

        //과목별 성적분포
        function selPoint_1() {
            if ($('#pointarea_subject_1').length < 1) {
                return;
            }
            var fields = ['0-10', '11-20', '21-30', '31-40', '41-50'];
            var values = [];
            var length = fields.length;
            for(var i = 0; i < length; i++) {
                values.push(parseFloat($('#pa-1' + fields[i]).text()));
            }
            var options = {
                'dataset':{
                    title: 'Web accessibility status',
                    values: values,
                    colorset: ['#2EB400', '#2BC8C9', "#666666", '#f09a93' , '#f10a00'],
                    fields: fields
                },
                'donut_width' : 35,
                'core_circle_radius':50,
                'chartDiv': 'pointarea_subject_1',
                'chartType': 'donut',
                'chartSize': {width:700, height:300}
            };
            Nwagon.chart(options);
        }
        function selPoint_2() {
            if ($('#pointarea_subject_2').length < 1) {
                return;
            }
            var fields = ['0-20', '21-40', '41-60', '61-80', '81-100'];
            var values = [];
            var length = fields.length;
            for(var i = 0; i < length; i++) {
                values.push(parseFloat($('#pa-2' + fields[i]).text()));
            }
            var options = {
                'dataset':{
                    title: 'Web accessibility status',
                    values: values,
                    colorset: ['#2EB400', '#2BC8C9', "#666666", '#f09a93' , '#f10a00'],
                    fields: fields
                },
                'donut_width' : 35,
                'core_circle_radius':50,
                'chartDiv': 'pointarea_subject_2',
                'chartType': 'donut',
                'chartSize': {width:700, height:300}
            };
            Nwagon.chart(options);
        }
        function selPoint_3() {
            if ($('#pointarea_subject_3').length < 1) {
                return;
            }
            var fields = ['0-20', '21-40', '41-60', '61-80', '81-100'];
            var values = [];
            var length = fields.length;
            for(var i = 0; i < length; i++) {
                values.push(parseFloat($('#pa-3' + fields[i]).text()));
            }
            var options = {
                'dataset':{
                    title: 'Web accessibility status',
                    values: values,
                    colorset: ['#2EB400', '#2BC8C9', "#666666", '#f09a93' , '#f10a00'],
                    fields: fields
                },
                'donut_width' : 35,
                'core_circle_radius':50,
                'chartDiv': 'pointarea_subject_3',
                'chartType': 'donut',
                'chartSize': {width:700, height:300}
            };
            Nwagon.chart(options);
        }




        // 과목별 성적분포
        var currNum = 0;
        /*function selPoint2(type) {
            var arrPoint = [];
            var arrCnt = 0;
            var arrGraph = '';

            // 그래프 데이터 배열
            @foreach($subjectPointList as $row)
            arrPoint.push('{{ implode('/', $row) }}');
            @endforeach

                arrCnt = arrPoint.length - 1;
            if (arrCnt < 0) {
                return;
            }

            // 이전/다음 선택시 그래프번호 조회
            if (type !== 0) {
                if (type === 'N') {
                    currNum = currNum + 1;
                    if (currNum > arrCnt) {
                        currNum = 0;
                    }
                } else {
                    currNum = currNum - 1;
                    if (currNum < 0) {
                        currNum = arrCnt;
                    }
                }
            }

            // 해당 그래프 데이터
            arrGraph = arrPoint[currNum].split('/');

            // 막대그래프 표기
            $('#grtxt').html(arrGraph[0]);
            for(var i = 1; i <= 5; i++) {
                $('#gr' + i).css('width', arrGraph[i] + '%');
                $('#grt' + i).html(arrGraph[i] + '%');
            }

            // 그래프 표기
            $('#pointarea2').html('');
            var options = {
                'dataset':{
                    title: 'Web accessibility status',
                    values: [parseFloat(arrGraph[1]), parseFloat(arrGraph[2]) , parseFloat(arrGraph[3]), parseFloat(arrGraph[4]), parseFloat(arrGraph[5])],
                    colorset: ['#2EB400', '#2BC8C9', "#666666", '#f09a93', '#f10a00'],
                    fields: ['0-20', '21-40', '41-60', '61-80', '81-100']
                },
                'donut_width' : 35,
                'core_circle_radius':50,
                'chartDiv': 'pointarea2',
                'chartType': 'donut',
                'chartSize': {width:700, height:300}
            };
            Nwagon.chart(options);
        }*/

        // 과목별 단일 선호도
        function bestSubject() {
            var fields = [];
            var values = [];
            var obj = $('.best-subject');

            if (obj.length < 1) {
                return;
            }

            $.each(obj, function(index, item) {
                fields.push($(this).find('.best-subject-name').text());
                values.push(parseFloat($(this).find('.best-subject-ratio').text()));
            });

            var options = {
                'dataset':{
                    title: 'Web accessibility status',
                    values: values,
                    colorset: ['#2EB400', '#2BC8C9', "#666666"],
                    fields: fields
                },
                'donut_width' : 85,
                'core_circle_radius':0,
                'chartDiv': 'best1',
                'chartType': 'pie',
                'chartSize': {width:700, height:300}
            };
            Nwagon.chart(options);
        }

        // 과목별 조합 선호도
        function bestCombSubject() {
            var fields = [];
            var values = [];
            var obj = $('.best-comb-subject');

            if (obj.length < 1) {
                return;
            }

            $.each(obj, function(index, item) {
                fields.push($(this).find('.best-comb-subject-name').text());
                values.push(parseFloat($(this).find('.best-comb-subject-ratio').text()));
            });

            var options = {
                'dataset':{
                    title: 'Web accessibility status',
                    values: values,
                    colorset: ['#2EB400', '#2BC8C9', "#666666"],
                    fields: fields
                },
                'donut_width' : 85,
                'core_circle_radius':0,
                'chartDiv': 'best2',
                'chartType': 'pie',
                'chartSize': {width:700, height:300}
            };
            Nwagon.chart(options);
        }

        // 과목별 체감 난이도
        function selSurvey(obj) {
            var sel_index = obj.selectedIndex;
            $(".graph_box").hide().eq(sel_index).show();
        }

        // 과목별 오답 랭킹
        function selWrong(val) {
            $("[class*='wtr_']").hide();
            $(".wtr_" + val).show();
        }

        // 직렬선택
        function selSurveyGraph(obj_val) {
            var json_data = [];
            var idx = 1;
            @if(empty($surveyList) === false)
                json_data = {!! json_encode($surveyList) !!};
            @endif

            if (json_data === null || typeof json_data[obj_val] === 'undefined') {
                return;
            }

            $("#graph_box").html('');
            $.each(json_data[obj_val], function(type, data) {

                // 응시직렬 선택형(그룹) 여러개 적용
                if(Object.keys(data).length == 1){
                    selSurveyHtml(idx, Object.keys(data));
                    nwagonChart(type, data, idx);
                    idx++;
                }else{
                    $.each(data, function (tit,val){
                        selSurveyHtml(idx, tit);

                        var names = [];
                        var fields = [];
                        var values = [];
                        var cnt = 0;
                        var title = tit;

                        $.each(val, function(item_title, items) {
                            names.push(item_title);

                            var spreads = [];
                            $.each(items, function(item, spread) {
                                if(cnt == 0){
                                    fields.push(item);
                                }
                                spreads.push(spread);
                            });
                            values[cnt] = spreads;
                            cnt++;
                        });

                        nwagonChartOption(names, title, values, fields, idx);
                        idx++;
                    });
                }
            });
        }

        // 응시직렬 차트
        function nwagonChart(type,data,idx) {
            var names = [];
            var fields = [];
            var values = [];
            var cnt = 0;
            var title = '';

            $.each(data, function(name, val) {
                title = name;
                $.each(val, function(item_title, items) {
                    if(type == 'S'){ // 전체 시험 난이도
                        names.push(item_title.substring(0,2));
                    }else{
                        names.push(item_title);
                    }

                    var spreads = [];
                    $.each(items, function(item, spread) {
                        if(cnt == 0){
                            fields.push(item);
                        }
                        spreads.push(spread);
                    });
                    values[cnt] = spreads;
                    cnt++;
                });
            });

            nwagonChartOption(names, title, values, fields, idx);
        }

        // 직렬 리스트 html
        function selSurveyHtml(idx, title){
            var html = "";
            html = '<div class="question">';
            html += '<p>Q' + idx + '. ' + title + '</p>';
            html += '<div class="qBox">';
            html += '<div id="survey_' + idx + '"></div>';
            html += '</div>';
            html += '</div>';

            $("#graph_box").append(html);
        }

        function nwagonChartOption(names, title, values, fields, idx){
            var options = {
                'legend': {
                    names: names
                },
                'dataset': {
                    title: [title],
                    values: values,
                    colorset: ['#DC143C', '#FF8C00', "#30a1ce", "#6ac52d", "#ae81ff"],
                    fields: fields
                },
                'chartDiv': 'survey_' + idx,
                'chartType': 'multi_column',
                'chartSize': { width: 900, height: 300 },
                'maxValue': 100,
                'increment': 10
            };
            Nwagon.chart(options);
        }

        function surveyOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/eventSurvey/index/' . $SsIdx2) }}";
            window.open(url,'pop','width=800 height=900');
        }

        function setAreaMsg(num)
        {
            var msg = '※ 직전시험경쟁률 정보는 2021년 2차시험기준임.(전의경 경채 : 21년 1차기준)';
            switch (num) {
                case 800 :
                    msg = '※ 직전시험 경쟁률, 직전시험 합격선 정보는 2019년 2차 시험 기준임.';
                    break;
                default :
                    break;
            }
            $(".area_txt").text(msg);
        }
    </script>

@stop