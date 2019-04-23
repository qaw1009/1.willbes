@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">

    
    <!-- Container -->   

<div class="p_re evtContent NSK-Thin" id="evtContainer">
    @include('html.1210_top')

    <div class="evtCtnsBox">    
        {{--4.26일까지 보여짐--}}
        <div class="ddayBefore"> 
            <h1 class="NGEB">"이것만은 꼭! 시험 전 / 시험 당일 체크 포인트"</h1>  
            <h2>시험 <span>전</span> 유의사항</h2> 
            <table cellspacing="0" cellpadding="0" class="boardTypeB"> 
                <col width="30%"/> 
                <col width=""/>
                <tbody> 
                    <tr> 
                        <th>효율적인 공부시간에 집중적으로! </th> 
                        <td>남은 기간 동안  최고의 효과를 내기 위해서 본인의 공부 스케쥴을 잡아라! </td> 
                    </tr> 
                    <tr> 
                        <th>공부 분량 줄이자! </th> 
                        <td>한 문제라도 더 맞겠다고 새로운 유형을 공부하거나, 공부 범위를 넓히게 되면 안 된다. </td> 
                    </tr> 
                    <tr> 
                        <th>오답노트를 활용해서    공부하자! </th> 
                        <td>가장 취약한 부분을 알 수 있는 오답노트를 정리했다면, <br /> 
                        시험 전까지 오답노트를 반복해서 공부하자! </td> 
                    </tr> 
                    <tr> 
                        <th>단권화 노트,서브노트를    활용하자! </th> 
                        <td>기본서에 단권화 정리를 하였다면 기본서를! <br /> 
                        서브노트를 통해 정리하였다면 서브노트를 자주 보며 이론을 놓지말자! </td> 
                    </tr> 
                    <tr> 
                        <th>모의고사 1회    실전처럼! </th> 
                        <td>실전처럼 연습을 하자! 문제풀이에 익숙해지고 시간안배 스킬 향상에 도움이 된다. <br /> 
                        문제풀이에 걸리는 시간을 꼼꼼히 체크하여 정해진 시간 내에 문제를 풀 수 있도록 연습해야 한다. </td> 
                    </tr> 
                    <tr> 
                        <th>충분한 숙면을 취하자 </th> 
                        <td>마지막 결전의 날 최고의 컨디션을 유지하기 위해서는 규칙적인 생활을하고, 충분한 숙면을 취하도록 하자! </td> 
                    </tr> 
                    <tr> 
                        <th>평정심을 유지하자 </th> 
                        <td>시험 직전에는 누구나 불안하지만, 최대한 마음가짐을 편하게 유지하는 것이 좋습니다. </td> 
                    </tr>
                </tbody> 
            </table> 
        
            <h2>시험 <span>당일</span> 유의사항</h2>  
            <table cellspacing="0" cellpadding="0" class="boardTypeB"> 
                <col width="30%"/> 
                <col width=""/>
                <tbody>
                    <tr>
                        <th>컨디션 조절 잘하자! </th> 
                        <td>시험이라 하여 전날 밤을 지세우는 경우가 있는데 시험당일 최상의 컨디션을 유지하기 위해서는 시험 전날 일찍 잠자리에 들도록 하자! </td> 
                    </tr> 
                    <tr> 
                        <th>30분~1시간 일찍 입실하자! </th> 
                        <td>헐레벌떡 시험시간 임박해서 입실하지말고, 조금 일찍 시험장에 입실하여 본인의 자리, 시험장 분위기에 적응하고 시험에    집중할 마음의 여유를 가지는 것이 좋다! </td> 
                    </tr> 
                    <tr> 
                        <th>문제 제대로 읽자! </th> 
                        <td>긴장하고 마음이 급하여 문제를 잘못 읽는 경우가 발생한다. 맞는 지문 선택인지, 틀린 지문 선택인지 정확하게    읽으세요. </td> 
                    </tr> 
                    <tr> 
                        <th>보기지문 정확하게 체크하자! </th> 
                        <td>꼼꼼히 읽었으나, 정답 지문을 잘못 체크 하는 수험생들이 간혹 있다.  정답1개가 5점이니, 꼭 실수 하지 맙시다! </td> 
                    </tr> 
                    <tr> 
                        <th>시험 시간 안배 잘하자! </th> 
                        <td>100분의 시간 안에 5과목을 풀어야 합니다.<br /> 
                            길고도 짧은 시간이죠! 시간안배를 잘하여서 정답 찍는 문제가 없도록 합시다! </td> 
                    </tr> 
                    <tr> 
                        <th>OMR 마킹 제대로    하자! </th> 
                        <td>마지막까지 긴장의 끈을 놓치마세요!  방심하는 순간 마킹 실수가 생기고, 시험종료 직전에OMR지를 바꾸게 될 수도 있으니.. OMR 마킹시 가장 조심하고 신중해야 합니다. 
                    답안은 반드시 원서접수 시 선택한 필기시험 과목순서에 맞추어 표기하여야 하며, 과목순서를 바꾸어 표기한 경우에도 원서접수 시 선택한 과목순서대로 채점되어 불이익을 받게 되므로 유의하여야 한다. 
                    </td> 
                    </tr> 
                </tbody>
            </table>                 
        </div>
        <!--ddayBefore//-->

        {{--27일 노출--}}       

        <div class="ddayAfter">
            <div class="m_section2">
                <div>
                    <a href="#none">성적 채점하기 ▶</a> 채점서비스를 이용하시면 합격가능선을 확인할 수 있습니다.
                </div>
            </div>

            <div class="m_section3">
                <div class="m_section3_wrap">
                    {{--지역별 현황--}}
                    <div class="m_section3_2">
                        <h2><span>지역별</span> 현황</h2>                    
                        <div class="choice">
                            <ul id="choice_ul">
                                <li><a href="#none" class="active">일반공채</a></li>
                                <li><a href="#none" >전의경경채</a></li>
                                <li><a href="#none" >101단</a></li>
                            </ul>
                        </div>

                        {{--일반경찰--}}
                        <div class="m_section3_box"> 
                            {{--응시지역--}}    
                            <div class="m_section3_L">
                                <ul class="tabs_2016" id="listview">
                                    <li class="seoul"><a href="#none" alt="서울" class="active">서울</a></li>
                                    <li class="ic"><a href="#none" alt="인천">인천</a></li>
                                    <li class="kkb"><a href="#none" alt="경기북부">경기북부</a></li>
                                    <li class="kkn"><a href="#none" alt="경기남부">경기남부</a></li>
                                    <li class="kw"><a href="#none" alt="강원">강원</a></li>
                                    <li class="cb"><a href="#none" alt="충북">충북</a></li>
                                    <li class="cn"><a href="#none" alt="충남">충남</a></li>
                                    <li class="dj"><a href="#none" alt="대전">대전</a></li>
                                    <li class="kb"><a href="#none" alt="경북">경북</a></li>
                                    <li class="kn"><a href="#none" alt="경남">경남</a></li>
                                    <li class="dk"><a href="#none" alt="경남">대구</a></li>
                                    <li class="bs"><a href="#none" alt="부산">부산</a></li>
                                    <li class="us"><a href="#none" alt="울산">울산</a></li>
                                    <li class="jb"><a href="#none" alt="전북">전북</a></li>
                                    <li class="jn"><a href="#none" alt="전남">전남</a></li>
                                    <li class="kj"><a href="#none" alt="광주">광주</a></li>
                                    <li class="jj"><a href="#none" alt="제주">제주</a></li>
                                </ul>
                            </div>
                            <!--m_section3_L//-->
                            
                            {{--모집구분표--}}
                            <div class="m_section3_R">                               
                                <h3 id="title_info">일반공채 - <span class="NSK">서울</span></h3>
                                <table class="boardTypeB">
                                    <col width="30%" />
                                    <col />
                                    <col />
                                    <thead>
                                        <tr>
                                            <th>지역/직렬 </th>
                                            <th>일반공채:남</th>
                                            <th>일반공채:여</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>선발인원(출원인원)</th>
                                            <td>577(10,979)</td>
                                            <td>171(3381)</td>
                                        </tr>                                        
                                        <tr>
                                            <th>2018 경쟁률</th>
                                            <td>19:1 </td>
                                            <td> 19:1 </td>
                                        </tr>
                                        <tr>
                                            <th>직전시험 경쟁률</th>
                                            <td>16:1 </td>
                                            <td> 27:1 </td>
                                        </tr>
                                        <tr>
                                            <th>입력자 평균</th>
                                            <td>281.59 </td>
                                            <td> 251.82 </td>
                                        </tr>                                        
                                        <tr class="bg01">
                                            <th>합격기대권</th>
                                            <td>326.38~334.43 </td>
                                            <td> 340.6~345.32 </td>
                                        </tr>
                                        <tr class="bg01">
                                            <th>합격유력권</th>
                                            <td>334.44~351.14 </td>
                                            <td> 345.33~360.38 </td>
                                        </tr>
                                        <tr class="bg01">
                                            <th>합격안정권</th>
                                            <td>351.15이상 </td>
                                            <td>360.39이상 </td>
                                        </tr>
                                        <tr class="bg01">
                                            <th>직전시험 합격선</th>
                                            <td>330.41이상 </td>
                                            <td>351.82이상 </td>
                                        </tr>
                                    </tbody>
                                </table>                              
                                <p class="area_txt">※ 일반공채(남,여)의 지난 시험 경쟁률, 합격선 정보는 2018년 3차 시험 기준임.</p>
                            </div>
                            <!--m_section3_R//-->                  
                        </div>

                        {{--전의경경채--}}
                        <div class="m_section3_box"> 
                            {{--응시지역--}}    
                            <div class="m_section3_L">
                                <ul class="tabs_2016" id="listview">
                                    <li class="seoul"><a href="#none" alt="서울" class="active">서울</a></li>
                                    <li class="ic"><a href="#none" alt="인천">인천</a></li>
                                    <li class="kkb"><a href="#none" alt="경기북부">경기북부</a></li>
                                    <li class="kkn"><a href="#none" alt="경기남부">경기남부</a></li>
                                    <li class="kw"><a href="#none" alt="강원">강원</a></li>
                                    <li class="cb"><a href="#none" alt="충북">충북</a></li>
                                    <li class="cn"><a href="#none" alt="충남">충남</a></li>
                                    <li class="dj"><a href="#none" alt="대전">대전</a></li>
                                    <li class="kb"><a href="#none" alt="경북">경북</a></li>
                                    <li class="kn"><a href="#none" alt="경남">경남</a></li>
                                    <li class="dk"><a href="#none" alt="경남">대구</a></li>
                                    <li class="bs"><a href="#none" alt="부산">부산</a></li>
                                    <li class="us"><a href="#none" alt="울산">울산</a></li>
                                    <li class="jb"><a href="#none" alt="전북">전북</a></li>
                                    <li class="jn"><a href="#none" alt="전남">전남</a></li>
                                    <li class="kj"><a href="#none" alt="광주">광주</a></li>
                                    <li class="jj"><a href="#none" alt="제주">제주</a></li>
                                </ul>
                            </div>
                            <!--m_section3_L//-->
                            
                            {{--모집구분표--}}
                            <div class="m_section3_R">                               
                                <h3 id="title_info">전의경경채 - <span class="NSK">서울</span></h3>
                                <table class="boardTypeB">
                                    <col width="30%" />
                                    <col />
                                    <col />
                                    <thead>
                                        <tr>
                                            <th>지역/직렬 </th>
                                            <th>일반공채:남</th>
                                            <th>일반공채:여</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>선발인원(출원인원)</th>
                                            <td>577(10,979)</td>
                                            <td>171(3381)</td>
                                        </tr>                                        
                                        <tr>
                                            <th>2018 경쟁률</th>
                                            <td>19:1 </td>
                                            <td> 19:1 </td>
                                        </tr>
                                        <tr>
                                            <th>직전시험 경쟁률</th>
                                            <td>16:1 </td>
                                            <td> 27:1 </td>
                                        </tr>
                                        <tr>
                                            <th>입력자 평균</th>
                                            <td>281.59 </td>
                                            <td> 251.82 </td>
                                        </tr>                                        
                                        <tr class="bg01">
                                            <th>합격기대권</th>
                                            <td>326.38~334.43 </td>
                                            <td> 340.6~345.32 </td>
                                        </tr>
                                        <tr class="bg01">
                                            <th>합격유력권</th>
                                            <td>334.44~351.14 </td>
                                            <td> 345.33~360.38 </td>
                                        </tr>
                                        <tr class="bg01">
                                            <th>합격안정권</th>
                                            <td>351.15이상 </td>
                                            <td>360.39이상 </td>
                                        </tr>
                                        <tr class="bg01">
                                            <th>직전시험 합격선</th>
                                            <td>330.41이상 </td>
                                            <td>351.82이상 </td>
                                        </tr>
                                    </tbody>
                                </table>                              
                                <p class="area_txt">※ 일반공채(남,여)의 지난 시험 경쟁률, 합격선 정보는 2018년 3차 시험 기준임.</p>
                            </div>
                            <!--m_section3_R//-->                  
                        </div>

                        {{--101단--}}
                        <div class="m_section3_box"> 
                            {{--응시지역--}}    
                            <div class="m_section3_L">
                                <ul class="tabs_2016" id="listview">
                                    <li class="seoul"><a href="#none" alt="서울" class="active">서울</a></li>
                                    <li class="ic"><a href="#none" alt="인천">인천</a></li>
                                    <li class="kkb"><a href="#none" alt="경기북부">경기북부</a></li>
                                    <li class="kkn"><a href="#none" alt="경기남부">경기남부</a></li>
                                    <li class="kw"><a href="#none" alt="강원">강원</a></li>
                                    <li class="cb"><a href="#none" alt="충북">충북</a></li>
                                    <li class="cn"><a href="#none" alt="충남">충남</a></li>
                                    <li class="dj"><a href="#none" alt="대전">대전</a></li>
                                    <li class="kb"><a href="#none" alt="경북">경북</a></li>
                                    <li class="kn"><a href="#none" alt="경남">경남</a></li>
                                    <li class="dk"><a href="#none" alt="경남">대구</a></li>
                                    <li class="bs"><a href="#none" alt="부산">부산</a></li>
                                    <li class="us"><a href="#none" alt="울산">울산</a></li>
                                    <li class="jb"><a href="#none" alt="전북">전북</a></li>
                                    <li class="jn"><a href="#none" alt="전남">전남</a></li>
                                    <li class="kj"><a href="#none" alt="광주">광주</a></li>
                                    <li class="jj"><a href="#none" alt="제주">제주</a></li>
                                </ul>
                            </div>
                            <!--m_section3_L//-->
                            
                            {{--모집구분표--}}
                            <div class="m_section3_R">                               
                                <h3 id="title_info">101단 - <span class="NSK">서울</span></h3>
                                <table class="boardTypeB">
                                    <col width="30%" />
                                    <col />
                                    <col />
                                    <thead>
                                        <tr>
                                            <th>지역/직렬 </th>
                                            <th>일반공채:남</th>
                                            <th>일반공채:여</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>선발인원(출원인원)</th>
                                            <td>577(10,979)</td>
                                            <td>171(3381)</td>
                                        </tr>                                        
                                        <tr>
                                            <th>2018 경쟁률</th>
                                            <td>19:1 </td>
                                            <td> 19:1 </td>
                                        </tr>
                                        <tr>
                                            <th>직전시험 경쟁률</th>
                                            <td>16:1 </td>
                                            <td> 27:1 </td>
                                        </tr>
                                        <tr>
                                            <th>입력자 평균</th>
                                            <td>281.59 </td>
                                            <td> 251.82 </td>
                                        </tr>                                        
                                        <tr class="bg01">
                                            <th>합격기대권</th>
                                            <td>326.38~334.43 </td>
                                            <td> 340.6~345.32 </td>
                                        </tr>
                                        <tr class="bg01">
                                            <th>합격유력권</th>
                                            <td>334.44~351.14 </td>
                                            <td> 345.33~360.38 </td>
                                        </tr>
                                        <tr class="bg01">
                                            <th>합격안정권</th>
                                            <td>351.15이상 </td>
                                            <td>360.39이상 </td>
                                        </tr>
                                        <tr class="bg01">
                                            <th>직전시험 합격선</th>
                                            <td>330.41이상 </td>
                                            <td>351.82이상 </td>
                                        </tr>
                                    </tbody>
                                </table>                              
                                <p class="area_txt">※ 일반공채(남,여)의 지난 시험 경쟁률, 합격선 정보는 2018년 3차 시험 기준임.</p>
                            </div>
                            <!--m_section3_R//-->                  
                        </div>
                        
                    </div>
                    
                    {{--과목별 원점수 평균--}}
                    <div class="m_section3_3">
                        <h2>과목별 <span>원점수 평균</span></h2> 
                        <div class="m_section3_3L">
                            <table class="boardTypeB">
                                <col width="25%"/>
                                <col width="25%"/>
                                <col width="25%"/>
                                <col width="25%"/>
                                <tbody>
                                    <tr>
                                            <th scope="col">과목</th>
                                            <th scope="col">한국사</th>
                                            <th scope="col">영어</th>
                                            <th scope="col">형법</th>
                                        </tr>    
                                    <tr>
                                        <th>참여자<br />
                                        실시간평균</th>
                                        <td>63.38</td>
                                        <td>65.09</td>
                                        <td>65.09</td>
                                    </tr>
                                    <tr>
                                      <th scope="col">과목</th>
                                      <th>형사소송법</th>
                                        <th>경찰학개론</th>
                                        <th>국어</th>
                                    </tr>
                                    <tr>
                                      <th>참여자<br />
                                        실시간평균</th>
                                      <td>63.38</td>
                                      <td>65.09</td>
                                      <td>65.09</td>
                                    </tr>
                                    <tr>
                                      <th scope="col">과목</th>
                                      <th>수학</th>
                                        <th>사회</th>
                                        <th>과학</th>
                                    </tr>
                                    <tr>
                                      <th>참여자<br />
                                        실시간평균</th>
                                      <td>63.38</td>
                                      <td>65.09</td>
                                      <td>65.09</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="m_section3_3R">
                            <select id="" name="" style="width:98%; border:#555 1px solid; height:28px; line-height:28px;" onchange="fn_AvgGrade()">
                                <option value="" selected="selected">형법/경찰학개론/형사소송법</option>
                                <option value="" >형법/국어/형사소송법</option>
                                <option value="" >경찰학개론/사회/국어</option>
                            </select>
                            <div class="mt10">
                                그래프
                            </div>
                        </div>      
                    </div>
                        
                    {{--합격예측 참여자 분석 현황--}}
                    <div class="m_section3_3">
                        <h2><span>합격예측 참여자</span> 분석 현황</h2>
                        <div class="m_section3_3L">
                            <h3><strong>총점</strong> 성적 분포</h3>
                            <table class="boardTypeC">
                                <col width="20%" />
                                <col width="" />  
                                <tr>
                                    <th>401-500</th>
                                    <td>
                                    <div class="graph"><span class="graph1" style="width:15%"></span></div>
                                    <strong class="ratio">15%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>301-400</th>
                                    <td>
                                    <div class="graph"><span class="graph1" style="width:20%"></span></div>
                                    <strong class="ratio">20%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>201-300</th>
                                    <td>
                                    <div class="graph"><span class="graph1" style="width:80%"></span></div>
                                    <strong class="ratio">80%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>101-200</th>
                                    <td>
                                    <div class="graph"><span class="graph1" style="width:90%"></span></div>
                                    <strong class="ratio">90%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>0-100</th>
                                    <td>
                                    <div class="graph"><span class="graph1" style="width:0%"></span></div>
                                    <strong class="ratio">0%</strong>
                                    </td>
                                </tr> 
                            </table>
   
                            <div class="mt10">
                                그래프
                            </div> 
                        </div>
                        <!--m_section3_3L//-->
 
                        <div class="m_section3_3R">
                            <h3><strong>과목별</strong> 성적 분포 - <strong>영어</strong></h3>
                            <div class="m_section3_3R_warp">                                
                                <ul id="slidesImg3">
                                    <li>
                                        <table class="boardTypeC">
                                            <col width="20%" />
                                            <col width="" />  
                                            <tr>
                                                <th>401-500</th>
                                                <td>
                                                <div class="graph"><span class="graph1" style="width:15%"></span></div>
                                                <strong class="ratio">15%</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>301-400</th>
                                                <td>
                                                <div class="graph"><span class="graph1" style="width:20%"></span></div>
                                                <strong class="ratio">20%</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>201-300</th>
                                                <td>
                                                <div class="graph"><span class="graph1" style="width:80%"></span></div>
                                                <strong class="ratio">80%</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>101-200</th>
                                                <td>
                                                <div class="graph"><span class="graph1" style="width:90%"></span></div>
                                                <strong class="ratio">90%</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>0-100</th>
                                                <td>
                                                <div class="graph"><span class="graph1" style="width:0%"></span></div>
                                                <strong class="ratio">0%</strong>
                                                </td>
                                            </tr> 
                                        </table>
                                        <div class="mt10">
                                            그래프
                                        </div>                 
                                    </li>
                                    <li>
                                        <table class="boardTypeC">
                                            <col width="20%" />
                                            <col width="" />  
                                            <tr>
                                                <th>401-500</th>
                                                <td>
                                                <div class="graph"><span class="graph1" style="width:30%"></span></div>
                                                <strong class="ratio">30%</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>301-400</th>
                                                <td>
                                                <div class="graph"><span class="graph1" style="width:55%"></span></div>
                                                <strong class="ratio">55%</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>201-300</th>
                                                <td>
                                                <div class="graph"><span class="graph1" style="width:80%"></span></div>
                                                <strong class="ratio">80%</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>101-200</th>
                                                <td>
                                                <div class="graph"><span class="graph1" style="width:90%"></span></div>
                                                <strong class="ratio">90%</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>0-100</th>
                                                <td>
                                                <div class="graph"><span class="graph1" style="width:77%"></span></div>
                                                <strong class="ratio">77%</strong>
                                                </td>
                                            </tr> 
                                        </table>
                                        <div class="mt10">
                                            그래프2
                                        </div>                 
                                    </li>
                                </ul>
                                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1211_arrowL.png"></a></p>
                                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1211_arrowR.png"></a></p>
                            </div>
     
     
   
                        </div>
                        <!--m_section3_3R//-->
                    </div>

                    {{--과목별 체감난이도 --}}
                    <div class="m_section3_3">
                        <h2>
                            과목별 <span>체감난이도</span>
                            <div>
                                <select id=" " name=" " >
                                    <option value="" >과목1</option>
                                    <option value="" >과목2</option>
                                    <option value="" >과목3</option>
                                    <option value="" >과목4</option>
                                </select>
                            </div>
                        </h2>

                        <div>
                            <table class="boardTypeC">
                                <col width="40%" />
                                <col width="20%" />
                                <col width="40%" />
                                <tr>
                                    <td>
                                        <strong class="ratio2ch">15%</strong>
                                        <div class="graph2ch"><span class="graph2" style="width:15%"></span></div>                             
                                    </td>
                                    <th>매우 쉬움</th>
                                    <td>
                                        <div class="graph"><span class="graph1" style="width:20%"></span></div>
                                        <strong class="ratio">20%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="ratio2ch">23%</strong>
                                        <div class="graph2ch"><span class="graph2" style="width:23%"></span></div>                             
                                    </td>
                                    <th>쉬움</th>
                                    <td>
                                        <div class="graph"><span class="graph1" style="width:27%"></span></div>
                                        <strong class="ratio">27%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="ratio2ch">10%</strong>
                                        <div class="graph2ch"><span class="graph2" style="width:10%"></span></div>                             
                                    </td>
                                    <th>보통</th>
                                    <td>
                                        <div class="graph"><span class="graph1" style="width:12%"></span></div>
                                        <strong class="ratio">12%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="ratio2ch">3%</strong>
                                        <div class="graph2ch"><span class="graph2" style="width:3%"></span></div>                             
                                    </td>
                                    <th>어려움</th>
                                    <td>
                                        <div class="graph"><span class="graph1" style="width:5%"></span></div>
                                        <strong class="ratio">5%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="ratio2ch">90%</strong>
                                        <div class="graph2ch"><span class="graph2" style="width:90%"></span></div>                             
                                    </td>
                                    <th>매우 어려움</th>
                                    <td>
                                        <div class="graph"><span class="graph1" style="width:50%"></span></div>
                                        <strong class="ratio">50%</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2019년 1차</td>
                                    <th>구분</th>
                                    <td>2018년 3차</td>
                                </tr>
                            </table>
                        </div>

                        <div class="mt50">
                            <div class="m_section3_3L clear">
                                <h3>선택 과목 <strong>단일</strong> 선택 선호도 Best3</h3>
                                <table class="boardTypeB">
                                    <tr>
                                        <th scope="col">순위</th>
                                        <th scope="col">선택과목명</th>
                                        <th scope="col">비율</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <td>형사소송법</td>
                                        <td>33% </td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>형법</td>
                                        <td>32% </td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>경찰학개론</td>
                                        <td>31%</td>
                                    </tr>
                                </table>

                                <div class="mt10">
                                    그래프
                                </div>		     
                            </div>
                            <!--m_section3_3L//-->
 
                            <div class="m_section3_3R">
                                <h3>선택 과목 <strong>조합</strong> 선택 선호도 Best3</h3>
                                <table class="boardTypeB">
                                    <tr>
                                        <th scope="col">순위</th>
                                        <th scope="col">선택과목명</th>
                                        <th scope="col">비율</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <td>형사소송법</td>
                                        <td>33% </td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>형법</td>
                                        <td>32% </td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>경찰학개론</td>
                                        <td>31%</td>
                                    </tr>
                                </table>

                                <div class="mt10">
                                    그래프
                                </div>     
                            </div><!--m_section3_3R//-->
                        </div>
                    </div>

                    {{--과목별 오답 랭킹--}}
                    <div class="m_section3_4">
                        <h2>
                            과목별 <span>오답 랭킹</span>
                            <div>
                                <select id=" " name=" " >
                                    <option value="" >과목1</option>
                                    <option value="" >과목2</option>
                                    <option value="" >과목3</option>
                                    <option value="" >과목4</option>
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
                                <tr>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>4 </td>
                                    <td>2%</td>
                                    <td>10%</td>
                                    <td>16%</td>
                                    <td>72%</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>11</td>
                                    <td>2 </td>
                                    <td>11%</td>
                                    <td>58%</td>
                                    <td>5%</td>
                                    <td>25%</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>12</td>
                                    <td>3 </td>
                                    <td>6%</td>
                                    <td>12%</td>
                                    <td>63%</td>
                                    <td>19%</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>15</td>
                                    <td>3 </td>
                                    <td>22%</td>
                                    <td>6%</td>
                                    <td>68%</td>
                                    <td>4%</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>20</td>
                                    <td>3 </td>
                                    <td>24%</td>
                                    <td>7%</td>
                                    <td>47%</td>
                                    <td>22%</td>
                                </tr>
                            </table>
                            
                            <table cellspacing="0" cellpadding="0" class="boardTypeD mt20" >      
                                <tr>
                                    <td>
                                        <ul class="graph">
                                            <li>
                                                <strong>50%</strong>
                                                <div><span style="height:50%"></span></div>                    
                                                <span>①</span>
                                            </li>
                                            <li>
                                                <strong>60%</strong>
                                                <div><span style="height:60%"></span></div>                     
                                                <span>②</span>
                                            </li>
                                            <li>
                                                <strong>42%</strong>
                                                <div><span style="height:42%"></span></div>                     
                                                <span>③</span>
                                            </li>
                                            <li>
                                                <strong>12%</strong>
                                                <div><span style="height:12%"></span></div>  
                                                <span>④</span>                    
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="graph graph2">
                                            <li>
                                                <strong>50%</strong>
                                                <div><span style="height:50%"></span></div>                    
                                                <span>①</span>
                                            </li>
                                            <li>
                                                <strong>60%</strong>
                                                <div><span style="height:60%"></span></div>                     
                                                <span>②</span>
                                            </li>
                                            <li>
                                                <strong>42%</strong>
                                                <div><span style="height:42%"></span></div>                     
                                                <span>③</span>
                                            </li>
                                            <li>
                                                <strong>12%</strong>
                                                <div><span style="height:12%"></span></div>  
                                                <span>④</span>                    
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="graph graph3">
                                            <li>
                                                <strong>50%</strong>
                                                <div><span style="height:50%"></span></div>                    
                                                <span>①</span>
                                            </li>
                                            <li>
                                                <strong>60%</strong>
                                                <div><span style="height:60%"></span></div>                     
                                                <span>②</span>
                                            </li>
                                            <li>
                                                <strong>42%</strong>
                                                <div><span style="height:42%"></span></div>                     
                                                <span>③</span>
                                            </li>
                                            <li>
                                                <strong>12%</strong>
                                                <div><span style="height:12%"></span></div>  
                                                <span>④</span>                    
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="graph graph4">
                                            <li>
                                                <strong>50%</strong>
                                                <div><span style="height:50%"></span></div>                    
                                                <span>①</span>
                                            </li>
                                            <li>
                                                <strong>60%</strong>
                                                <div><span style="height:60%"></span></div>                     
                                                <span>②</span>
                                            </li>
                                            <li>
                                                <strong>42%</strong>
                                                <div><span style="height:42%"></span></div>                     
                                                <span>③</span>
                                            </li>
                                            <li>
                                                <strong>12%</strong>
                                                <div><span style="height:12%"></span></div>  
                                                <span>④</span>                    
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="graph graph5">
                                            <li>
                                                <strong>50%</strong>
                                                <div><span style="height:50%"></span></div>                    
                                                <span>①</span>
                                            </li>
                                            <li>
                                                <strong>60%</strong>
                                                <div><span style="height:60%"></span></div>                     
                                                <span>②</span>
                                            </li>
                                            <li>
                                                <strong>42%</strong>
                                                <div><span style="height:42%"></span></div>                     
                                                <span>③</span>
                                            </li>
                                            <li>
                                                <strong>12%</strong>
                                                <div><span style="height:12%"></span></div>  
                                                <span>④</span>                    
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>	
                                    <th scope="col">문제 3</th>
                                    <th scope="col">문제 11</th>
                                    <th scope="col">문제 12</th>
                                    <th scope="col">문제 15</th>
                                    <th scope="col">문제 20</th>
                                </tr>
                                <tr>
                                    <td colspan="5">해당 과목에 대한 데이터가 없습니다.</td>                                
                                </tr>
                            </table>
                        </div>
                    </div>          

                    <div class="m_section3_5">
                        시험지 및 정답 다운로드 <a href="http://public.jinhakapply.com/PoliceV2/data/notice_list.aspx?ReturnSite=SC&ServiceID=19&CategoryID=3&CurrentPage=1
" target="_blank">바로가기 ▶</a>
                    </div>
                        
                    <div class="m_section3_6">
                        <div class="pollWrap">                                                                                    
                            <h3>설문조사
                                <div>
                                    <a href="#none" onclick="pullOpen()">설문참여</a> 
                                </div>
                            </h3>
                            <ul>
                                <li>Q1. 전체적인 난이도는?</li>
                                <li>Q2. 공통 과목 난이도는?</li>
                                <li>Q3. 선택 과목 난이도는?</li>
                            </ul>
                        </div>                                         
                        
                        <div class="bannerWarp">
                            <img src="http://file3.willbes.net/new_cop/2017/03/170306_passcop_bn1.png" alt="최종합격을 결정짓는 2차 전형 윌비스 전문가와 함께 전략적으로 준비하세요">
                            <div>
                                <a href="#none"><img src="http://file3.willbes.net/new_cop/2018/12/EV181222_passcop_bn5.jpg" alt="면접캠프설명회"></a>
                            </div>
                        </div>
                    </div>               

                    {{--설문결과--}}
                    <div class="m_section3_7">
                        <div>                     
                            <h3>설문조사 결과</h3>                     
                            <div class="popcontent">                   
                                <div class="question">
                                    <p>응시직렬 </p>
                                    <div class="qBox">
                                        <ul>
                                            <li><input type="radio"  name="" id="CT1" checked><label for="CT1">일반공채</label></li>
                                            <li><input type="radio"  name="" id="CT2"/><label for="CT2">경행경채</label></li>
                                            <li><input type="radio"  name="" id="CT3"/><label for="CT3">101단</label></li>
                                        </ul>
                                    </div>
                                </div>                   

                                <div class="question">
                                    <p>Q1. 전체적인 시험 체감 난이도</p>
                                    <div class="qBox">
                                        그래프			
                                    </div>
                                </div>

                                <div class="question">
                                    <p>Q2. 공통 과목 시험 체감 난이도</p>
                                    <div class="qBox">
                                        그래프			
                                    </div>
                                </div>

                                <div class="question">
                                    <p>Q3. 선택 과목 시험 체감 난이도</p>
                                    <div class="qBox">
                                        그래프			
                                    </div>
                                </div>
                            </div>                  
                        </div>					                       
                    </div>                                       
                    
                </div><!--m_section3_wrap//-->         
                
                <div class="sectionEvt00 NSK-Black">
                    <a href="#none">빠른 채점하기<span class="NSK-Thin">(답만 입력)</span></a>
                    <a href="#none" class="btn2">시험지보며 채점하기</a>
                </div>
                
                <div class="sectionEvt01" id="event">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_evt00.jpg" alt="합격예측 풀서비스 이용하고 푸짐한 혜택도 받자!" />
                </div>
                
                <div class="sectionEvt01_1">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_evt01.jpg" alt="시험후기 공유하고 채점하면 기프티콘 증정 " />
                </div>

                {{--강사 이미티콘 홍보url댓글--}}
                @include('html.event_replyEmoticon')
                
                <div class="sectionEvt02">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_evt02.jpg" alt="토크쇼 시청 인증샷 공유 이벤트" />
                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/04/1211_evt02_btn.png" alt="공유 이벤트 참여하기" /></a>
                </div>          

                <div class="sectionEvt03">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_evt03.jpg" alt="적중문제 소내내기 이벤트" />
                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/04/1211_evt03_btn.png" alt="적중문제 소내내기 이벤트 참여하기" /></a>
                </div>

            </div><!--m_section3//--> 
        </div><!--ddayAfter//-->
    </div>
    <!--evtCtnsBox//-->
    
</div>
<!-- End Container -->


@stop