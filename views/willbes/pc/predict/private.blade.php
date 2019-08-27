@extends('willbes.pc.layouts.master_no_sitdbar')
@section('content')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
    <script src="/public/vendor/jqbars/jqbar.js"></script>
    <link rel="stylesheet" href="/public/vendor/jqbars/jqbar.css">
    <script src="/public/vendor/Nwagon/Nwagon.js"></script>
    <link rel="stylesheet" href="/public/vendor/Nwagon/Nwagon.css">

    <div class="p_re evtContent NSK-Thin" id="evtContainer">
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
                                <td>{{ $_SESSION['mem_name'] }} ({{ $_SESSION['mem_id'] }})</td>
                                <td>{{ (empty($arr_base['resist_data']) === false ? array_values($arr_base['resist_data'])[0]['serial'] . ' ('.array_values($arr_base['resist_data'])[0]['areanm'].')' : '-') }}</td>
                                <td>{{ (empty($arr_base['resist_data']) === false ? array_values($arr_base['resist_data'])[0]['TakeNumber'] : '-') }}</td>
                                <td>
                                    @if (empty($arr_base['resist_data']) === false)
                                        @foreach(array_values($arr_base['resist_data'])[0]['subject'] as $key => $val)
                                            {{ $val }} @if($loop->last === false) | @endif
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ (empty($arr_base['resist_data']) === false ? array_values($arr_base['resist_data'])[0]['AddPoint'] . '점' : '-') }}</td>
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

                            @foreach($arr_base['user_subject_avg'] as $row)
                                <tr>
                                    <th>{{ $row['PaperName'] }}</th>
                                    <td>{{ $row['OrgPoint'] }}</td>
                                    <td>{{ $row['AdjustPoint'] }}</td>
                                    <td>{{ number_format($row['MyRank']) }} / {{ number_format($row['TakeNum']) }} </td>
                                    <td>{{ $row['AvrPoint'] }}</td>
                                    <td>{{ $row['FivePerPoint'] }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>총점</th>
                                <th>{{ (empty($arr_base['total_area_avg']['TotalOrgPoint']) === false ? $arr_base['total_area_avg']['TotalOrgPoint'] : '집계중') }}</th>
                                <th>{{ (empty($arr_base['total_area_avg']['TotalAdjustPoint']) === false ? $arr_base['total_area_avg']['TotalAdjustPoint'] : '집계중') }}</th>
                                <th>{{ (empty($arr_base['total_area_avg']['RankNum']) === false ? $arr_base['total_area_avg']['RankNum'] : '집계중') }} / {{ (empty($arr_base['total_area_avg']) === false ? $arr_base['total_area_avg']['Cnt'] : '집계중') }} </th>
                                <th>{{ (empty($arr_base['total_area_avg']['TotalAvrPoint']) === false ? $arr_base['total_area_avg']['TotalAvrPoint'] : '집계중') }}</th>
                                <th>{{ (empty($arr_base['total_area_avg']['TotalFivePerPoint']) === false ? $arr_base['total_area_avg']['TotalFivePerPoint'] : '집계중') }}</th>
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
                                    {{--<span style="bottom:20.77%">--}}
                                    <span style="bottom:{{ ((empty($arr_base['total_area_avg']['TotalAdjustPoint']) === false ? $arr_base['total_area_avg']['TotalAdjustPoint'] : '0') / 500) * 100 }}%">
                                    <strong>{{ (empty($arr_base['total_area_avg']['TotalAdjustPoint']) === false ? $arr_base['total_area_avg']['TotalAdjustPoint'] : '0') }}</strong>
                                </span>
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
                                        <div><span class="myscore" style="height:{{ ((empty($arr_base['total_area_avg']['TotalAdjustPoint']) === false ? $arr_base['total_area_avg']['TotalAdjustPoint'] : '0') / 500) * 100 }}%"></span></div>
                                    </td>

                                    <td>
                                        <div>
                                            <span class="score" style="height:{{ (empty($arr_base['total_area_avg']['TotalAvrPoint']) === false ? $arr_base['total_area_avg']['TotalAvrPoint'] : '0') }}%"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span class="score" style="height:{{ (empty($arr_base['total_area_avg']['TotalFivePerPoint']) === false ? $arr_base['total_area_avg']['TotalFivePerPoint'] : '0') }}%"></span>
                                        </div>
                                    </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>
                                        1배수컷<br>
                                        {{ ((empty($arr_base['arr_line_data']['OnePerCut']) === false && $arr_base['arr_line_data']['IsUse'] == 'Y') ? $arr_base['arr_line_data']['OnePerCut'] : '집계중') }}
                                    </th>
                                    <th>전체평균<br>
                                        {{ (empty($arr_base['total_area_avg']['TotalAvrPoint']) === false ? $arr_base['total_area_avg']['TotalAvrPoint'] : '집계중') }}
                                    </th>
                                    <th>상위5%<br>
                                        {{ (empty($arr_base['total_area_avg']['TotalFivePerPoint']) === false ? $arr_base['total_area_avg']['TotalFivePerPoint'] : '집계중') }}
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
                                @if(empty($arr_base['arr_line_data']) === false && $arr_base['arr_line_data']['IsUse'] == 'Y')
                                    <tr>
                                        <th>합격기대권</th>
                                        <td>집계중</td>
                                    </tr>
                                    <tr>
                                        <th>합격유력권</th>
                                        <td>집계중</td>
                                    </tr>
                                    <tr>
                                        <th>합격안정권</th>
                                        <td>집계중</td>
                                    </tr>
                                    <tr class="bg01">
                                        <th>1배수컷</th>
                                        <th>집계중</th>
                                    </tr>
                                    <tr class="bg01">
                                        <th>합격예측</th>
                                        <th>집계중</th>
                                    </tr>
                                @else
                                    <tr>
                                        <th>합격기대권</th>
                                        <td>{{ $arr_base['arr_line_data']['ExpectAvrPoint1'] }} ~ {{ $arr_base['arr_line_data']['ExpectAvrPoint2'] }}</td>
                                        <td>
                                    </tr>
                                    <tr>
                                        <th>합격유력권</th>
                                        <td>{{ $arr_base['arr_line_data']['StrongAvrPoint1'] }} ~ {{ $arr_base['arr_line_data']['StrongAvrPoint2'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>합격안정권</th>
                                        <td>356.04 이상</td>
                                        <td>{{ $arr_base['arr_line_data']['StabilityAvrPoint'] }} 이상</td>
                                    </tr>
                                    <tr class="bg01">
                                        <th>1배수컷</th>
                                        <td>{{ $arr_base['arr_line_data']['OnePerCut'] }}</td>
                                    </tr>
                                    <tr class="bg01">
                                        <th>합격예측</th>
                                        <th>현재 기준 <span class="tx-red">합격 유력권</span>입니다. </th>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

                <div class="sub3_1 mt100">
                    <h2>직렬 점수대별 경쟁자 분포</h2>
                    <div id="lineChart01"></div>
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
        var dataIs = '{{ $arr_base['resist_is'] }}';
        $(document).ready(function () {
            if(dataIs == 'N'){
                alert('기본정보/점수를 입력해주세요.');
                var _url = '{{ site_url('/promotion/index/cate/3001/code/1344') }}';
                parent.location.href=_url;
                return ;
            }
            initLineChart();
        });

        function initLineChart() {
            var options = {
                'legend':{
                    names: ['', '100점 이하', '200점 이하', '300점 이하', '400점 이하', '500점 이하']
                },
                'dataset':{
                    title:'Playing time per day'
                    ,values: [[0], [{{ $arr_base['count_area_member_point']['cnt_100'] }}], [{{ $arr_base['count_area_member_point']['cnt_200'] }}], [{{ $arr_base['count_area_member_point']['cnt_300'] }}]
                        , [{{ $arr_base['count_area_member_point']['cnt_400'] }}], [{{ $arr_base['count_area_member_point']['cnt_500'] }}]]
                    ,colorset: ['#0072b2']
                    ,fields: ['지원자 수']
                },
                'chartDiv' : 'lineChart01',
                'chartType' : 'line',
                'leftOffsetValue': 40,
                'bottomOffsetValue': 60,
                'chartSize' : {width:1000, height:300},
                'minValue' :0,
                'maxValue' : 1000,
                'increment' : 100,
                'isGuideLineNeeded' : false //default set to false
            };
            Nwagon.chart(options);
        }

    </script>
@stop