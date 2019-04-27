@extends('willbes.pc.layouts.master_no_sitdbar')
@section('content')
<link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
<script src="/public/vendor/jqbars/jqbar.js"></script>
<link rel="stylesheet" href="/public/vendor/jqbars/jqbar.css">
<div class="m_section3_wrap">
    {{--지역별 현황--}}
    <div class="m_section3_2">
        <h2><span>지역별</span> 현황</h2>
        <div class="choice">
            <ul id="choice_ul">
                <li><a href="javascript:selSerial(100);" id="se_100" class="active">일반공채(남)</a></li>
                <li><a href="javascript:selSerial(200);" id="se_200">일반공채(여)</a></li>
                <li><a href="javascript:selSerial(300);" id="se_300">전의경경채</a></li>
                <li><a href="javascript:selSerial(400);" id="se_400">101단</a></li>
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
                        <li class="jb"><a href="javascript:selArea(712013)" id="ss_712014" alt="전북">전북</a></li>
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
                        <span id="area_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}" @if($val2['TakeMockPart'] == 100 && $val2['TakeArea'] == 712001) style="display:;" @else style="display:none;" @endif>
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
                                <th>2019 1차 경쟁률</th>
                                <td>{{ $val2['CompetitionRateNow'] }}</td>
                            </tr>
                            <tr>
                                <th>직전시험 경쟁률</th>
                                <td>{{ $val2['CompetitionRateAgo'] }} </td>
                            </tr>
                            <tr>
                                <th>입력자 평균</th>
                                <td>{{ $val2['AvrPointAgo'] }} </td>
                            </tr>
                            <tr class="bg01">
                                <th>합격기대권</th>
                                @if($val2['IsUse'] == 'Y')<td>{{ $val2['ExpectAvrPoint1'] ? $val2['ExpectAvrPoint1'] : $val2['ExpectAvrPoint1Ref'] }}~{{ $val2['ExpectAvrPoint2'] ? $val2['ExpectAvrPoint2'] : $val2['ExpectAvrPoint2Ref'] }}</td>@else<td>집계중</td>@endif
                            </tr>
                            <tr class="bg01">
                                <th>합격유력권</th>
                                @if($val2['IsUse'] == 'Y')<td>{{ $val2['ExpectAvrPoint1'] ? $val2['ExpectAvrPoint1'] : $val2['ExpectAvrPoint1Ref'] }}~{{ $val2['ExpectAvrPoint2'] ? $val2['ExpectAvrPoint2'] : $val2['ExpectAvrPoint2Ref'] }}</td>@else<td>집계중</td>@endif
                            </tr>
                            <tr class="bg01">
                                <th>합격안정권</th>
                                @if($val2['IsUse'] == 'Y')<td> {{ $val2['StabilityAvrPoint'] ? $val2['StabilityAvrPoint'] : $val2['StabilityAvrPointRef'] }} ~ </td>@else<td>집계중</td>@endif
                            </tr>
                            <tr class="bg01">
                                <th>직전시험 합격선</th>
                                <td>{{ $val2['PassLineAgo'] }} </td>
                            </tr>
                            </tbody>
                        </table>
                        </span>
                    @endforeach
                @endforeach
                <p class="area_txt">※ 지난 시험 경쟁률, 합격선 정보는 2018년 3차 시험 기준임.</p>
            </div>
            <!--m_section3_R//-->
        </div>
    </div>

    {{--과목별 원점수 평균--}}
    {{--<div class="m_section3_3">--}}
        {{--<h2>과목별 <span>원점수 평균</span></h2>--}}
        {{--<div class="m_section3_3L">--}}
            {{--<table class="boardTypeB">--}}
                {{--<col width="25%"/>--}}
                {{--<col width="25%"/>--}}
                {{--<col width="25%"/>--}}
                {{--<col width="25%"/>--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                    {{--<th scope="col">과목</th>--}}
                    {{--<th scope="col">한국사</th>--}}
                    {{--<th scope="col">영어</th>--}}
                    {{--<th scope="col">형법</th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>참여자<br />--}}
                        {{--실시간평균</th>--}}
                    {{--<td>{{ $gradelist2[0]['Avg'] }}</td>--}}
                    {{--<td>{{ $gradelist2[1]['Avg'] }}</td>--}}
                    {{--<td>{{ $gradelist2[2]['Avg'] }}</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th scope="col">과목</th>--}}
                    {{--<th>형사소송법</th>--}}
                    {{--<th>경찰학개론</th>--}}
                    {{--<th>국어</th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>참여자<br />--}}
                        {{--실시간평균</th>--}}
                    {{--<td>{{ $gradelist2[3]['Avg'] }}</td>--}}
                    {{--<td>{{ $gradelist2[4]['Avg'] }}</td>--}}
                    {{--<td>{{ $gradelist2[5]['Avg'] }}</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th scope="col">과목</th>--}}
                    {{--<th>수학</th>--}}
                    {{--<th>사회</th>--}}
                    {{--<th>과학</th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>참여자<br />--}}
                        {{--실시간평균</th>--}}
                    {{--<td>{{ $gradelist2[6]['Avg'] }}</td>--}}
                    {{--<td>{{ $gradelist2[7]['Avg'] }}</td>--}}
                    {{--<td>{{ $gradelist2[8]['Avg'] }}</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}

        {{--<div class="m_section3_3R">--}}
            {{--<select id="selgrade" style="width:98%; border:#555 1px solid; height:28px; line-height:28px;" onchange="selGrade(this.value)">--}}
                {{--@foreach($gradeList as $key => $val)--}}
                    {{--<option value="{{ $val['subject'] }}{{ $val['grade'] }}" selected="selected">{{ $val['subject'] }}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
            {{--<div class="mt10">--}}
                {{--<div>--}}
                    {{--<div id="bar-1"></div>--}}
                    {{--<div id="bar-2"></div>--}}
                    {{--<div id="bar-3"></div>--}}
                    {{--<div id="bar-4"></div>--}}
                    {{--<div id="bar-5"></div>--}}
                    {{--<div id="bar-6"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--합격예측 참여자 분석 현황--}}
    {{--<div class="m_section3_3">--}}
        {{--<h2><span>합격예측 참여자</span> 분석 현황</h2>--}}
        {{--<div class="m_section3_3L">--}}
            {{--<h3><Expect>총점</Expect> 성적 분포</h3>--}}
            {{--<table class="boardTypeC">--}}
                {{--<col width="20%" />--}}
                {{--<col width="" />--}}
                {{--<tr>--}}
                    {{--<th>401-500</th>--}}
                    {{--<td>--}}
                        {{--<div class="graph"><span class="graph1" style="width:15%"></span></div>--}}
                        {{--<Expect class="ratio">15%</Expect>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>301-400</th>--}}
                    {{--<td>--}}
                        {{--<div class="graph"><span class="graph1" style="width:20%"></span></div>--}}
                        {{--<Expect class="ratio">20%</Expect>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>201-300</th>--}}
                    {{--<td>--}}
                        {{--<div class="graph"><span class="graph1" style="width:80%"></span></div>--}}
                        {{--<Expect class="ratio">80%</Expect>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>101-200</th>--}}
                    {{--<td>--}}
                        {{--<div class="graph"><span class="graph1" style="width:90%"></span></div>--}}
                        {{--<Expect class="ratio">90%</Expect>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>0-100</th>--}}
                    {{--<td>--}}
                        {{--<div class="graph"><span class="graph1" style="width:0%"></span></div>--}}
                        {{--<Expect class="ratio">0%</Expect>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--</table>--}}

            {{--<div class="mt10">--}}
                {{--그래프--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!--m_section3_3L//-->--}}

        {{--<div class="m_section3_3R">--}}
            {{--<h3><Expect>과목별</Expect> 성적 분포 - <Expect>영어</Expect></h3>--}}
            {{--<div class="m_section3_3R_warp">--}}
                {{--<ul id="slidesImg3">--}}
                    {{--<li>--}}
                        {{--<table class="boardTypeC">--}}
                            {{--<col width="20%" />--}}
                            {{--<col width="" />--}}
                            {{--<tr>--}}
                                {{--<th>401-500</th>--}}
                                {{--<td>--}}
                                    {{--<div class="graph"><span class="graph1" style="width:15%"></span></div>--}}
                                    {{--<Expect class="ratio">15%</Expect>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<th>301-400</th>--}}
                                {{--<td>--}}
                                    {{--<div class="graph"><span class="graph1" style="width:20%"></span></div>--}}
                                    {{--<Expect class="ratio">20%</Expect>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<th>201-300</th>--}}
                                {{--<td>--}}
                                    {{--<div class="graph"><span class="graph1" style="width:80%"></span></div>--}}
                                    {{--<Expect class="ratio">80%</Expect>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<th>101-200</th>--}}
                                {{--<td>--}}
                                    {{--<div class="graph"><span class="graph1" style="width:90%"></span></div>--}}
                                    {{--<Expect class="ratio">90%</Expect>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<th>0-100</th>--}}
                                {{--<td>--}}
                                    {{--<div class="graph"><span class="graph1" style="width:0%"></span></div>--}}
                                    {{--<Expect class="ratio">0%</Expect>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--</table>--}}
                        {{--<div class="mt10">--}}
                            {{--그래프--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<table class="boardTypeC">--}}
                            {{--<col width="20%" />--}}
                            {{--<col width="" />--}}
                            {{--<tr>--}}
                                {{--<th>401-500</th>--}}
                                {{--<td>--}}
                                    {{--<div class="graph"><span class="graph1" style="width:30%"></span></div>--}}
                                    {{--<Expect class="ratio">30%</Expect>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<th>301-400</th>--}}
                                {{--<td>--}}
                                    {{--<div class="graph"><span class="graph1" style="width:55%"></span></div>--}}
                                    {{--<Expect class="ratio">55%</Expect>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<th>201-300</th>--}}
                                {{--<td>--}}
                                    {{--<div class="graph"><span class="graph1" style="width:80%"></span></div>--}}
                                    {{--<Expect class="ratio">80%</Expect>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<th>101-200</th>--}}
                                {{--<td>--}}
                                    {{--<div class="graph"><span class="graph1" style="width:90%"></span></div>--}}
                                    {{--<Expect class="ratio">90%</Expect>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<th>0-100</th>--}}
                                {{--<td>--}}
                                    {{--<div class="graph"><span class="graph1" style="width:77%"></span></div>--}}
                                    {{--<Expect class="ratio">77%</Expect>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--</table>--}}
                        {{--<div class="mt10">--}}
                            {{--그래프2--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1211_arrowL.png"></a></p>--}}
                {{--<p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1211_arrowR.png"></a></p>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!--m_section3_3R//-->
    {{--</div>--}}

    {{--<div class="m_section3_3">--}}
        {{--<div class="mt50">--}}
            {{--<div class="m_section3_3L clear">--}}
                {{--<h3>선택 과목 <Expect>단일</Expect> 선택 선호도 Best3</h3>--}}
                {{--<table class="boardTypeB">--}}
                    {{--<tr>--}}
                        {{--<th scope="col">순위</th>--}}
                        {{--<th scope="col">선택과목명</th>--}}
                        {{--<th scope="col">비율</th>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>1</th>--}}
                        {{--<td>형사소송법</td>--}}
                        {{--<td>33% </td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>2</th>--}}
                        {{--<td>형법</td>--}}
                        {{--<td>32% </td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>3</th>--}}
                        {{--<td>경찰학개론</td>--}}
                        {{--<td>31%</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}

                {{--<div class="mt10">--}}
                    {{--그래프--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!--m_section3_3L//-->--}}

            {{--<div class="m_section3_3R">--}}
                {{--<h3>선택 과목 <Expect>조합</Expect> 선택 선호도 Best3</h3>--}}
                {{--<table class="boardTypeB">--}}
                    {{--<tr>--}}
                        {{--<th scope="col">순위</th>--}}
                        {{--<th scope="col">선택과목명</th>--}}
                        {{--<th scope="col">비율</th>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>1</th>--}}
                        {{--<td>형사소송법</td>--}}
                        {{--<td>33% </td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>2</th>--}}
                        {{--<td>형법</td>--}}
                        {{--<td>32% </td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>3</th>--}}
                        {{--<td>경찰학개론</td>--}}
                        {{--<td>31%</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}

                {{--<div class="mt10">--}}
                    {{--그래프--}}
                {{--</div>--}}
            {{--</div><!--m_section3_3R//-->--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--과목별 체감난이도 --}}
    {{--<div class="m_section3_3">--}}
        {{--@if(empty($resSet)===false)--}}
            {{--<h2>--}}
                {{--과목별 <span>체감난이도</span>--}}
                {{--<div>--}}
                    {{--<select id=" " name=" " onChange="selSurvey(this.value);">--}}
                        {{--@for($i=1; $i < count($titleSet); $i++)--}}
                        {{--<option value="{{ $i }}" >{{ $titleSet[$i] }}</option>--}}
                        {{--@endfor--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</h2>--}}
            {{--@for($i=1; $i < count($titleSet); $i++)--}}
                {{--<div id="div_{{ $i }}" @if($i != 1) style="display:none;" @endif>--}}
                    {{--[{{ $titleSet[$i] }}]--}}
                    {{--<table class="boardTypeC">--}}
                        {{--<col width="20%" />--}}
                        {{--<col width="40%" />--}}
                        {{--@for($j=1; $j <= $resSet[$i]['CNT']; $j++)--}}
                        {{--<tr>--}}
                            {{--<th>{{ $questionSet[$i]['Comment'.$j] }}</th>--}}
                            {{--<td>--}}
                                {{--<div class="graph"><span class="graph1" style="width:{{ $resSet[$i]['Answer'.$j] }}%"></span></div>--}}
                                {{--<Expect class="ratio">{{ $resSet[$i]['Answer'.$j] }}%</Expect>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--@endfor--}}
                        {{--<tr>--}}
                            {{--<th>구분</th>--}}
                            {{--<td>2019년 1차</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--@endfor--}}
        {{--@else--}}
            {{--<h2>--}}
                {{--과목별 <span>체감난이도</span>--}}
            {{--</h2>--}}
            {{--<div>--}}
                {{--<table class="boardTypeC">--}}
                    {{--<col width="20%" />--}}
                    {{--<col width="40%" />--}}
                    {{--<tr>--}}
                        {{--<th>매우 쉬움</th>--}}
                        {{--<td>--}}
                            {{--<div class="graph"><span class="graph1" style="width:0%"></span></div>--}}
                            {{--<Expect class="ratio">0%</Expect>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>쉬움</th>--}}
                        {{--<td>--}}
                            {{--<div class="graph"><span class="graph1" style="width:0%"></span></div>--}}
                            {{--<Expect class="ratio">0%</Expect>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>보통</th>--}}
                        {{--<td>--}}
                            {{--<div class="graph"><span class="graph1" style="width:0%"></span></div>--}}
                            {{--<Expect class="ratio">0%</Expect>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>어려움</th>--}}
                        {{--<td>--}}
                            {{--<div class="graph"><span class="graph1" style="width:0%"></span></div>--}}
                            {{--<Expect class="ratio">0%</Expect>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>매우 어려움</th>--}}
                        {{--<td>--}}
                            {{--<div class="graph"><span class="graph1" style="width:0%"></span></div>--}}
                            {{--<Expect class="ratio">0%</Expect>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>구분</th>--}}
                        {{--<td>2019년 1차</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--@endif--}}

    {{--</div>--}}

    {{--과목별 오답 랭킹--}}
    {{--<div class="m_section3_4">--}}
        {{--<h2>--}}
            {{--과목별 <span>오답 랭킹</span>--}}
            {{--<div>--}}
                {{--<select id=" " name=" " >--}}
                    {{--<option value="" >과목1</option>--}}
                    {{--<option value="" >과목2</option>--}}
                    {{--<option value="" >과목3</option>--}}
                    {{--<option value="" >과목4</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</h2>--}}

        {{--<div class="mt20">--}}
            {{--<table class="boardTypeB">--}}
                {{--<tr>--}}
                    {{--<th width="10%" rowspan="2">순위 </th>--}}
                    {{--<th width="10%" rowspan="2">문제번호 </th>--}}
                    {{--<th width="10%" rowspan="2">정답 </th>--}}
                    {{--<th colspan="4">보기 선택률 </th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>① </th>--}}
                    {{--<th>② </th>--}}
                    {{--<th>③ </th>--}}
                    {{--<th>④ </th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>1</td>--}}
                    {{--<td>3</td>--}}
                    {{--<td>4 </td>--}}
                    {{--<td>2%</td>--}}
                    {{--<td>10%</td>--}}
                    {{--<td>16%</td>--}}
                    {{--<td>72%</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>2</td>--}}
                    {{--<td>11</td>--}}
                    {{--<td>2 </td>--}}
                    {{--<td>11%</td>--}}
                    {{--<td>58%</td>--}}
                    {{--<td>5%</td>--}}
                    {{--<td>25%</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>3</td>--}}
                    {{--<td>12</td>--}}
                    {{--<td>3 </td>--}}
                    {{--<td>6%</td>--}}
                    {{--<td>12%</td>--}}
                    {{--<td>63%</td>--}}
                    {{--<td>19%</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>4</td>--}}
                    {{--<td>15</td>--}}
                    {{--<td>3 </td>--}}
                    {{--<td>22%</td>--}}
                    {{--<td>6%</td>--}}
                    {{--<td>68%</td>--}}
                    {{--<td>4%</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>5</td>--}}
                    {{--<td>20</td>--}}
                    {{--<td>3 </td>--}}
                    {{--<td>24%</td>--}}
                    {{--<td>7%</td>--}}
                    {{--<td>47%</td>--}}
                    {{--<td>22%</td>--}}
                {{--</tr>--}}
            {{--</table>--}}

            {{--<table cellspacing="0" cellpadding="0" class="boardTypeD mt20" >--}}
                {{--<tr>--}}
                    {{--<td>--}}
                        {{--<ul class="graph">--}}
                            {{--<li>--}}
                                {{--<Expect>50%</Expect>--}}
                                {{--<div><span style="height:50%"></span></div>--}}
                                {{--<span>①</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>60%</Expect>--}}
                                {{--<div><span style="height:60%"></span></div>--}}
                                {{--<span>②</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>42%</Expect>--}}
                                {{--<div><span style="height:42%"></span></div>--}}
                                {{--<span>③</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>12%</Expect>--}}
                                {{--<div><span style="height:12%"></span></div>--}}
                                {{--<span>④</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<ul class="graph graph2">--}}
                            {{--<li>--}}
                                {{--<Expect>50%</Expect>--}}
                                {{--<div><span style="height:50%"></span></div>--}}
                                {{--<span>①</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>60%</Expect>--}}
                                {{--<div><span style="height:60%"></span></div>--}}
                                {{--<span>②</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>42%</Expect>--}}
                                {{--<div><span style="height:42%"></span></div>--}}
                                {{--<span>③</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>12%</Expect>--}}
                                {{--<div><span style="height:12%"></span></div>--}}
                                {{--<span>④</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<ul class="graph graph3">--}}
                            {{--<li>--}}
                                {{--<Expect>50%</Expect>--}}
                                {{--<div><span style="height:50%"></span></div>--}}
                                {{--<span>①</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>60%</Expect>--}}
                                {{--<div><span style="height:60%"></span></div>--}}
                                {{--<span>②</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>42%</Expect>--}}
                                {{--<div><span style="height:42%"></span></div>--}}
                                {{--<span>③</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>12%</Expect>--}}
                                {{--<div><span style="height:12%"></span></div>--}}
                                {{--<span>④</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<ul class="graph graph4">--}}
                            {{--<li>--}}
                                {{--<Expect>50%</Expect>--}}
                                {{--<div><span style="height:50%"></span></div>--}}
                                {{--<span>①</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>60%</Expect>--}}
                                {{--<div><span style="height:60%"></span></div>--}}
                                {{--<span>②</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>42%</Expect>--}}
                                {{--<div><span style="height:42%"></span></div>--}}
                                {{--<span>③</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>12%</Expect>--}}
                                {{--<div><span style="height:12%"></span></div>--}}
                                {{--<span>④</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<ul class="graph graph5">--}}
                            {{--<li>--}}
                                {{--<Expect>50%</Expect>--}}
                                {{--<div><span style="height:50%"></span></div>--}}
                                {{--<span>①</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>60%</Expect>--}}
                                {{--<div><span style="height:60%"></span></div>--}}
                                {{--<span>②</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>42%</Expect>--}}
                                {{--<div><span style="height:42%"></span></div>--}}
                                {{--<span>③</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<Expect>12%</Expect>--}}
                                {{--<div><span style="height:12%"></span></div>--}}
                                {{--<span>④</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th scope="col">문제 3</th>--}}
                    {{--<th scope="col">문제 11</th>--}}
                    {{--<th scope="col">문제 12</th>--}}
                    {{--<th scope="col">문제 15</th>--}}
                    {{--<th scope="col">문제 20</th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td colspan="5">해당 과목에 대한 데이터가 없습니다.</td>--}}
                {{--</tr>--}}
            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="m_section3_5">
        시험지 및 정답 다운로드 <a href="http://public.jinhakapply.com/PoliceV2/data/notice_list.aspx?ReturnSite=SC&ServiceID=19&CategoryID=3&CurrentPage=1" target="_blank">바로가기 ▶</a>
    </div>

    {{--<div class="m_section3_6">--}}
        {{--<div class="pollWrap">--}}
            {{--<h3>설문조사--}}
                {{--<div>--}}
                    {{--<a href="javascript:surveyOpen()" >설문참여</a>--}}
                {{--</div>--}}
            {{--</h3>--}}
            {{--<ul>--}}
                {{--<li>Q1. 전체적인 난이도는?</li>--}}
                {{--<li>Q2. 공통 과목 난이도는?</li>--}}
                {{--<li>Q3. 선택 과목 난이도는?</li>--}}
            {{--</ul>--}}
        {{--</div>--}}

        {{--<div class="bannerWarp">--}}
            {{--<img src="http://file3.willbes.net/new_cop/2017/03/170306_passcop_bn1.png" alt="최종합격을 결정짓는 2차 전형 윌비스 전문가와 함께 전략적으로 준비하세요">--}}
            {{--<div>--}}
                {{--<a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1206" target="_blank">--}}
                {{--<img src="https://static.willbes.net/public/images/promotion/2019/04/1187_bann_20190426.jpg" alt="면접캠프설명회">--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--설문결과--}}
    {{--<div class="m_section3_7">--}}
        {{--<div>--}}
            {{--<h3>설문조사 결과</h3>--}}
            {{--<div class="popcontent">--}}
                {{--<div class="question">--}}
                    {{--<p>응시직렬 </p>--}}
                    {{--<div class="qBox">--}}
                        {{--<ul>--}}
                            {{--<li><input type="radio"  name="" id="CT1" checked><label for="CT1">일반공채</label></li>--}}
                            {{--<li><input type="radio"  name="" id="CT2"/><label for="CT2">전의경 경채</label></li>--}}
                            {{--<li><input type="radio"  name="" id="CT3"/><label for="CT3">101단</label></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="question">--}}
                    {{--<p>Q1. 전체적인 시험 체감 난이도</p>--}}
                    {{--<div class="qBox">--}}
                        {{--그래프--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="question">--}}
                    {{--<p>Q2. 공통 과목 시험 체감 난이도</p>--}}
                    {{--<div class="qBox">--}}
                        {{--그래프--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="question">--}}
                    {{--<p>Q3. 선택 과목 시험 체감 난이도</p>--}}
                    {{--<div class="qBox">--}}
                        {{--그래프--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

</div><!--m_section3_wrap//-->
<script>
    $(document).ready(function () {
        var seltxt = $('#selgrade option:selected').val();
        selGrade(seltxt);
    });

    function selSerial(num){
        setAreaMsg(num);
        $("[id*='se_']").removeClass('active');
        $("#se_"+num).addClass('active');
        $('#selS').val(num);

        //탭넘겼으니 서울다시호출
        $("[id*='area_']").hide();
        $("#area_"+num+'_712001').show();
        $("[id*='ss_']").removeClass('active');
        $("#ss_712001").addClass('active');
        if(num == 400){
            $('#areaset1').hide();
            $('#areaset2').show();
        } else {
            $('#areaset1').show();
            $('#areaset2').hide();
        }
    }

    function selSurvey(num){
        $("[id*='div_']").hide();
        $("#div_"+num).show();
    }

    function selGrade(val){
        var str = val;
        var arrStr = str.split('/');
        $('#bar-1').html('');
        $('#bar-2').html('');
        $('#bar-3').html('');
        $('#bar-4').html('');
        $('#bar-5').html('');
        $('#bar-1').jqbar({ label: arrStr[0], value: arrStr[5], barColor: '#D64747' });
        $('#bar-2').jqbar({ label: arrStr[1], value: arrStr[6], barColor: '#FF681F' });
        $('#bar-3').jqbar({ label: arrStr[2], value: arrStr[7], barColor: '#ea805c' });
        $('#bar-4').jqbar({ label: arrStr[3], value: arrStr[8], barColor: '#88bbc8' });
        $('#bar-5').jqbar({ label: arrStr[4], value: arrStr[9], barColor: '#939393' });
    }

    function surveyOpen(){
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
        var url = "{{ site_url('/survey/index/3') }}";
        window.open(url,'pop','width=800 height=900');
    }

    function selArea(num){
        $("[id*='area_']").hide();
        $("[id*='ss_']").removeClass('active');
        $("#ss_"+num).addClass('active');
        $("#area_"+$('#selS').val()+'_'+num).show();
    }

    function setAreaMsg(num)
    {
        var msg = '※ 지난 시험 경쟁률, 합격선 정보는 2018년 3차 시험 기준임.';
        switch (num) {
            case 100 :
                msg = '※ 지난 시험 경쟁률, 합격선 정보는 2018년 3차 시험 기준임.';
                break;
            case 200 :
                msg = '※ 지난 시험 경쟁률, 합격선 정보는 2018년 3차 시험 기준임.';
                break;
            case 300 :
                msg = '※ 전의경경채의 지난 시험 경쟁률, 합격선 정보는 2018년 1차 시험 기준임.';
                break;
            case 400 :
                msg = '※ 일반공채(남,여)의 지난 시험 경쟁률, 합격선 정보는 2018년 2차 시험 기준임';
                break;
            default :
                break;
        }
        $(".area_txt").text(msg);
    }
</script>

@stop