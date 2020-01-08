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
                    <li>제2차시험 : 논문형 필기시험 </li>
                    <li>제3차시험 : 면접시험</li>
                </ul>

                <h4 class="NGR mt20">응시자격</h4>
                <ul class="st01">
                    <li>응시결격사유 등 : 해당 시험의 최종시험 시행예정일(면접시험 최종예정일) 현재를 기준으로 「국가공무원법」 제33조(검찰직공무원은 「검찰청법」 제50조)의
                        결격사유에 해당하거나, 「국가공무원법」 제74조(정년)에 해당하는 자 또는 「공무원임용시험령」 등 관계법령에 따라 응시자격이 정지된 자는
                        응시할 수 없습니다.</li>
                    <li>응시연령 : 20세이상(2000. 12. 31. 이전 출생자)</li>
                    <li>학력 및 경력 : 제한없음</li>
                </ul>

                <h4 class="NGR mt20">응시원서 접수기간 및 시험일정</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="30%">
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
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="3">접수기간 : 2.4. 09:00~<br />
                                2.6. 21:00
                                (취소마감일 2.9. 21:00)</td>
                                <td>제1차시험</td>
                                <td>2.21.</td>
                                <td>2.29.</td>
                                <td>3.31.</td>
                            </tr>
                            <tr>
                                <td>제2차시험</td>
                                <td>3.31.</td>
                                <td>6.22.∼6.26.</td>
                                <td>8.31.</td>
                            </tr>
                            <tr>
                                <td>제3차시험</td>
                                <td>8.31.</td>
                                <td>9.17.∼9.19.</td>
                                <td>9.29.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="NGR mt20">영어/한국사능력검정시험 성적표 제출</h4>
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
                        </colgroup>
                        <thead>
                            <tr>
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
                                <td>530</td>
                                <td>71</td>
                                <td>700</td>
                                <td>625</td>
                                <td>340</td>
                                <td>65(level 2)</td>
                                <td>625</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="st01 mt10">
                    <li>인정범위 : 2017. 1. 1. 이후 국내에서 실시된 시험으로서, 제1차시험 시행예정일 전날까지 점수(등급)가 발표된 시험으로 한정하며 기준점수 이상으로 확인된 시험만 인정됩니다.</li>
                    <li>청각장애 응시자의 경우 별도 기준이 적용되며, 기준점수 등 구체적인 내용은 「2020년도 국가공무원 공개경쟁채용시험 등 계획 공고」를 확인하시기 바랍니다.</li>
                </ul>

                <h5 class="NGR mt20">나. 한국사능력검정시험</h5>
                <ul class="st01">
                    <li>기준점수(등급) : 한국사능력검정시험(국사편찬위원회) 2급 이상</li>
                    <li>인정범위 : 2016. 1. 1. 이후 실시된 시험으로서, 제1차시험 시행예정일 전날까지 점수(등급)가 발표된 시험으로 한정하 며 기준점수 이상으로 확인된 시험만 인정됩니다.</li>
                </ul>

                <h5 class="NGR">다. 성적제출</h5>
                <ul class="st01">
                    <li>응시자는 사전등록 시 또는 응시원서 접수 시에 해당 검정시험의 등록번호, 인증번호, 시험일자 및 점수(등급) 등을 정확히 표기하여야 합니다.</li>
                    <li>응시원서 접수 후 제1차시험 시행예정일 전날까지 발표된 성적은 사이버국가고시센터(www.gosi.kr)를 통해 추가등록을 해야 합니다.<br/>
                        [2020. 2. 24. (월) ~ 2. 28.(금)]<br/>
                        ※ 자체 유효기간이 2년인 시험(TOEIC, TOEFL, TEPS, G-TELP)의 경우, 반드시 유효기간 만료 전 별도 안내하는 기간에 사이버국가고시센터
                        (www.gosi.kr)를 통해 사전등록을 해야 합니다. 사전등록을 하지 않고 유효기간이 경과되어 진위여부 확인이 불가능한 성적은 인정되지 않으니
                        유의하시기 바랍니다.
                    </li>
                </ul>          
            </div> 
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop