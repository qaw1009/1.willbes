@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">


    <!-- Container -->

    <div class="p_re evtContent NSK-Thin" id="evtContainer">
        @include('willbes.pc.promotion.2001.1211_top')

        <div class="evtCtnsBox">
            <div class="sub_warp">
                <div class="sub3_1">
                    <h2>지원자 정보</h2>
                    <div>
                        <table class="boardTypeB">
                            <col width="" />
                            <col width="" />
                            <col width="" />
                            <col width="" />
                            <col width="" />
                            <col width="" />
                            <tr>
                                <th scope="col">성명(아이디)</th>
                                <th scope="col">직렬(직류)구분</th>
                                <th scope="col">응시번호</th>
                                <th scope="col">응시과목</th>
                                <th scope="col">가산점 여부</th>
                            </tr>
                            <tr>
                                <td>홍길동(willbes)</td>
                                <td>일반공채:남 (충남)</td>
                                <td>10005</td>
                                <td>한국사 | 영어 | 형법 | 형사소송법 | 경찰학개론</td>
                                <td>3점</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="sub3_1">
                    <h2>직렬 점수 통계</h2>
                    <div>
                        <table class="boardTypeB">
                            <col width=""/>
                            <tr>
                                <th>과목</th>
                                <th>원점수</th>
                                <th>조정점수</th>
                                <th>내 석차 </th>
                                <th>전체 평균</th>
                                <th>상위 5% 평균</th>
                            </tr>
                            <tr>
                                <th>영어</th>
                                <td>101</td>
                                <td>101</td>
                                <td>1,596 / 1,636 </td>
                                <td>97.1</td>
                                <td>98.5</td>
                            </tr>
                            <tr>
                                <th>한국사</th>
                                <td>101</td>
                                <td>101</td>
                                <td>1,596 / 1,636 </td>
                                <td>94.6</td>
                                <td>96.9</td>
                            </tr>
                            <tr>
                                <th>국어 </th>
                                <td>101</td>
                                <td>101</td>
                                <td>1,596 / 1,636 </td>
                                <td>94.6</td>
                                <td>96.9</td>
                            </tr>
                            <tr>
                                <th>사회</th>
                                <td>96</td>
                                <td>67.7</td>
                                <td>1,596 / 1,636 </td>
                                <td>66.7</td>
                                <td>68.3</td>
                            </tr>
                            <tr>
                                <th>세법개론</th>
                                <td>101</td>
                                <td>72.6</td>
                                <td>1,596 / 1,636 </td>
                                <td>68.6</td>
                                <td>71.2</td>
                            </tr>
                            <tr>
                                <th>총점</th>
                                <th>500</th>
                                <th>443.3</th>
                                <th>1,596 / 1,636 </th>
                                <th>392.6</th>
                                <th>400.5</th>
                            </tr>
                        </table>
                        <div class="mt10">
                            * 채점결과에 따른 과목별, 총점과 응시 직렬/지역의 석차, 평균 정보입니다.<br>
                            (원점수 및 조정점수 40점 미만은 과락, 참여자 표본이 작은 경우 일부 패널 분석 데이터 합산 추정치 반영)
                        </div>
                    </div>
                </div>

                <div class="sub3_4_wrap">
                    <div class="sub3_4_L">
                        <p>나의 위치</p>
                        <div class="sub3_4_L_warp">
                            <div class="cutLine">
                                <div>
                                    <span style="bottom:70.77%"><strong>353.85</strong></span>
                                </div>
                            </div>

                            <table class="boardTypeE">
                                <col width="10%" />
                                <col width="30%" />
                                <col width="30%" />
                                <col width="30%" />

                                <tr>
                                    <td>
                                        <ul>
                                            <li>500</li>
                                            <li>400</li>
                                            <li>300</li>
                                            <li>200</li>
                                            <li>100</li>
                                            <li>0</li>
                                        </ul>
                                    </td>




                                    <td>
                                        <div><span class="myscore" style="height:68.652%"></span></div>
                                    </td>



                                    <td>
                                        <div>
                                            <span class="score" style="height:56.31799999999999%"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="score" style="height:68.652%"></span>
                                        </div>
                                    </td>
                                    <td> </td>


                                </tr>
                                <tr>
                                    <th></th>
                                    <th>
                                        1배수컷<br>

                                        343.26


                                    </th>
                                    <th>전체평균<br>

                                        281.59
                                    </th>
                                    <th>상위5%<br>

                                        343.26
                                    </th>
                                    <th> </th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="sub3_4_R">
                        <p>합격가능성 분석결과</p>
                        <div>
                            <table class="boardTypeB">
                                <col />
                                <col />
                                <tr>
                                    <th>합격기대권</th>
                                    <td>326.38 ~ 334.43</td>
                                </tr>
                                <tr>
                                    <th>합격유력권</th>
                                    <td>334.44 ~ 356.03</td>
                                </tr>
                                <tr>
                                    <th>합격안정권</th>
                                    <td>356.04 이상</td>
                                </tr>
                                <tr class="bg01">
                                    <th>1배수컷</th>
                                    <th>343.26</th>
                                </tr>
                                <tr class="bg01">
                                    <th>합격예측</th>
                                    <th>현재 기준 <span class="tx-red">합격 유력권</span>입니다. </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="sub3_1 mt100">
                    <h2>직렬 점수대별 경쟁자 분포</h2>
                    <div>
                        그래프
                    </div>

                    <div class="mt20">
                        * 합격 가능성 분석 결과는 본 서비스 참여 결과 및 패널 표본 합산 예측 결과이므로, 실제 결과와는 다를 수 있으니 참고 자료로만 활용하시기 바랍니다.
                    </div>
                </div>
            </div>
        </div>
        <!--evtCtnsBox//-->

    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mt3').addClass('active');
        });
    </script>


@stop