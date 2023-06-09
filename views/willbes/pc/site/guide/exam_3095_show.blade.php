@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="w-Guide">
                <h3 class="NSK-Black">시험일정 및 응시자격</h3>
                <h4 class="NGR">시험방법</h4>
                <ul class="st01 mt20">
                    <li>제1차시험 : 선택형 필기시험</li>
                    <li>제2차시험 : 논문형 필기시험</li>
                    <li>제3차시험 : 면접시험</li>
                </ul>

                <h4 class="NGR mt20">응시자격</h4>
                <ul class="st01 mt20">
                    <li>응시결격사유 등 : 해당 시험의 최종시험 시행예정일(면접시험 최종예정일) 현재를 기준으로 「국가공무원법」 제33조(외무공무원은 「외무 공무원법」
                        제9조)의 결격사유에 해당하거나, 「국가공무원법」 제74조(정년)·「외무공무원법」 제27조(정년)에 해당하는 자 또는 「공무원임용시험령」 등
                        관계법령에 따라 응시자격이 정지된 자는 응시할 수 없습니다.</li>
                    <li>응시연령 : 20세 이상(2002. 12. 31. 이전 출생자)</li>
                    <li>학력 및 경력 : 제한없음</li>
                </ul>

                <h4 class="NGR mt20">접수시간 및 시험일정</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>접수 및 취소기간</th>
                                <th>구분</th>
                                <th>시험장소 공고일</th>
                                <th>시험일</th>
                                <th>합격자 발표일</th>
                            </tr>
                        <thead>
                            <tr>
                                <td rowspan="3"> 접수기간 : <br />
                                    1.25. 09:00~1.27. 21:00<br />
                                (취소마감일 1.30. 18:00)</td>
                                <td>제1차시험</td>
                                <td>2.18</td>
                                <td>2.26</td>
                                <td>4.6</td>
                            </tr>
                            <tr>
                                <td>제2차시험</td>
                                <td>4.6</td>
                                <td>6.25 ~ 6.30</td>
                                <td>9.2</td>
                            </tr>
                            <tr>
                                <td>제3차시험</td>
                                <td>9.2</td>
                                <td>9.19 ~ 9.21</td>
                                <td>10.4</td>
                            </tr>
                    </table>
                </div>

                <h4 class="NGR mt20">영어/한국사/외국어능력검정시험 성적표 제출</h4>
                <h5 class="NGR">가. 영어능력검정시험</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th rowspan="2">시험명</th>
                                <th colspan="2">TOEFL</th>
                                <th rowspan="2">TOEIC</th>
                                <th rowspan="2">TEPS<br />
                                ('18.5.12. 전 시험)</th>
                                <th rowspan="2">TEPS<br />
                                ('18.5.12. 이후 시험)</th>
                                <th rowspan="2">G-TELP</th>
                                <th rowspan="2">FLEX</th>
                            </tr>
                            <tr>
                                <th>PBT</th>
                                <th>IBT</th>
                            </tr>
                            <tr>
                                <td>외교관후보자 선발시험</td>
                                <td>590</td>
                                <td>97</td>
                                <td>870</td>
                                <td>800</td>
                                <td>452</td>
                                <td>88(level 2)</td>
                                <td>800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="st01 mt10">
                    <li>인정범위 : 2017. 1. 1. 이후 국내에서 실시된 시험으로서, 제1차시험 시행예정일 전날까지 점수(등급)가 발표된 시험으로 한정하며 기준점수 이상으로 확인된 시험만 인정됩니다.</li>
                    <li>청각장애 응시자의 경우 별도 기준이 적용되며, 기준점수 등 구체적인 내용은 「2022년도 국가공무원 공개경쟁채용시험 등 계획 공고」를 확인하시기 바랍니다.</li>
                </ul>

                <h5 class="NGR mt20">나. 한국사능력검정시험</h5>
                <ul class="st01">
                    <li>기준점수(등급) : 한국사능력검정시험(국사편찬위원회) 2급 이상</li>
                    <li>인정범위 : 2016. 1. 1. 이후 실시된 시험으로서, 제1차시험 시행예정일 전날까지 점수(등급)가 발표된 시험으로 한정하 며 기준점수 이상으로 확인된 시험만 인정됩니다.</li>
                </ul>

                <h5 class="NGR mt20">다. 외국어능력검정시험</h5>
                <ul class="st01">
                    <li>대상시험 및 기준점수 : 「2022년도 국가공무원 공개경쟁채용시험 등 계획 공고」 참조</li>
                    <li>인정범위 : 2017. 1. 1. 이후 실시된 시험으로서, 제1차시험 시행예정일 전날까지 점수(등급)가 발표된 시험으로 한정하며 기준점수 이상으로 확인된 시험만 인정됩니다.<br>
                    <li>청각장애 응시자의 경우 별도 기준이 적용되며, 기준점수 등 구체적인 내용은 「2022년도 국가공무원 공개경쟁채용시험 등 계획 공고」를 확인하시기 바랍니다. </li>
                </ul>

                <h5 class="NGR">라. 성적제출</h5>
                <ul class="st01">
                    <li>응시자는 사전등록 시 또는 응시원서 접수 시에 해당 검정시험의 등록번호, 인증번호, 시험일자 및 점수(등급) 등을 정확히 표기하여야 합니다.</li>
                    <li>성적이 발표되지 않는 등 불가피한 사정으로 원서 접수 시까지 한국사능력검정시험 성적을 제출하지 못하는 경우에는 추가등록기간[2022.2.21.(월) ~ 2.25.(금)] 내에 사이버국가고시센터(www.gosi.kr)를 통해 등록을 해야 합니다.</li>
                    <li>자체 유효기간이 2년인 시험(TOEIC, TOEFL, TEPS, G-TELP, SNULT, 신HSK, JPT)의 경우, 반드시 유효기간 만료 전 별도 안내하는 기간에
                        사이버국가고시센터(www.gosi.kr)를 통해 사전등록을 해야 합니다. 사전등록을 하지 않고 유효기간이 경과되어 진위여부 확인이 불가능한
                        성적은 인정되지 않으니 유의하시기 바랍니다.</li>
                </ul> 
            </div>    
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop