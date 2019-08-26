@extends('willbes.pc.layouts.master_no_sitdbar')
@section('content')
<link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
<script src="/public/vendor/jqbars/jqbar.js"></script>
<link rel="stylesheet" href="/public/vendor/jqbars/jqbar.css">
<script src="/public/vendor/Nwagon/Nwagon.js"></script>
<link rel="stylesheet" href="/public/vendor/Nwagon/Nwagon.css">
<style rel="stylesheet">
    /*body {*/
        /*margin: 0;*/
        /*overflow: hidden;*/
        /*background: #152B39;*/
        /*font-family: Courier, monospace;*/
        /*font-size: 14px;*/
        /*color:#ccc;*/
    /*}*/

    .wrapper {
        display: block;
        margin: 5em auto;
        border: 2px solid #555;
        width: 900px;
        height: 350px;
        position: relative;
    }
    p{text-align:center;}
    .label {
        height: 1em;
        padding: .3em;
        background: rgba(255, 255, 255, .8);
        position: absolute;
        display: none;
        color:#333;

    }
</style>
<div class="evtCtnsBox">
    <div class="sub_warp">
        @if($dataIs == 'Y')
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
                        <td>{{ $_SESSION['mem_name'] }}({{ $_SESSION['mem_id'] }})</td>
                        <td>{{ $data[0]['serial'] }} ({{ $data[0]['areanm'] }})</td>
                        <td>{{ $data[0]['TakeNumber'] }}</td>
                        <td>{{ $subjectStr }}</td>
                        <td>{{ $data[0]['AddPoint'] }}점</td>
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
                        <th>내 석차(%)</th>
                        <th>전체 평균</th>
                        <th>상위 5% 평균</th>
                    </tr>
                    @foreach($scoreList as $key => $val)
                    <tr>
                        <th>{{ $val['subject'] }}</th>
                        <td>{{ $val['score'] }}</td>
                        <td>{{ $val['addscore'] }}</td>
                        <td>{{ $val['Rank'] != '집계중'?$val['Rank']."%" : '집계중'}}</td>
                        <td>{{ $val['AvrPoint'] }}</td>
                        <td>{{ $val['FivePerPoint'] }}</td>
                    </tr>
                    @endforeach
                    @if(empty($scoreList) == true)
                        <tr>
                            <td colspan="6"> - 입력된 점수가 없습니다.(성적채점 및 확인에서 점수를 입력해주세요) -</td>
                        </tr>
                    @endif
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
                            <span style="bottom:{{ $mysumPer }}%"><strong>{{ $mysum }}</strong></span>
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
                                <div><span class="myscore" style="height:{{ $oneper }}%"></span></div>
                            </td>

                            <td>
                                <div>
                                    <span class="score" style="height:{{ $avgper }}%"></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span class="score" style="height:{{ $fiveperPer }}%"></span>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <th></th>
                            <th>
                                1배수컷<br>
                                {{ $gradeLine['OnePerCut'] }}
                            </th>
                            <th>전체평균<br>
                                {{ $avg }}
                            </th>
                            <th>상위5%<br>
                                {{ $fiveper }}
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
                            <td>{{ $gradeLine['ExpectAvrPoint1']?$gradeLine['ExpectAvrPoint1']:$gradeLine['ExpectAvr1Ref'] }} ~ {{ $gradeLine['ExpectAvrPoint2']?$gradeLine['ExpectAvrPoint2']:$gradeLine['ExpectAvr2Ref'] }}</td>
                        </tr>
                        <tr>
                            <th>합격유력권</th>
                            <td>{{ $gradeLine['StrongAvrPoint1']?$gradeLine['StrongAvrPoint1']:$gradeLine['StrongAvr1Ref'] }} ~ {{ $gradeLine['StrongAvrPoint2']?$gradeLine['StrongAvrPoint2']:$gradeLine['StrongAvr2Ref'] }}</td>
                        </tr>
                        <tr>
                            <th>합격안정권</th>
                            <td>{{ $gradeLine['StabilityAvrPoint']?$gradeLine['StabilityAvrPoint']:$gradeLine['StabilityAvrRef'] }}</td>
                        </tr>
                        <tr class="bg01">
                            <th>1배수컷</th>
                            <th>{{ $gradeLine['OnePerCut'] }}</th>
                        </tr>
                        <tr class="bg01">
                            <th>합격예측</th>
                            <th>{!! $str !!} </th>
                        </tr>
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
    @endif
</div>
<!--evtCtnsBox//-->
<script type="text/javascript">
    var dataIs = '{{ $dataIs }}';
    $(document).ready(function () {

        if(dataIs == 'N'){
            alert('기본정보/점수를 입력해주세요.');
            var _url = '{{ site_url('/promotion/index/cate/3001/code/1211') }}';
            parent.location.href=_url;
            return ;
        }
        initLineChart();
    });
    var oData = {
        {!! $arrPoint !!}
    };

    function initLineChart() {
        var options = {
            'legend':{
                names: ['', '100점 이하', '200점 이하', '300점 이하', '400점 이하', '500점 이하']
            },
            'dataset':{
                title:'Playing time per day',
                values: [[0], [608], [350], [180], [85], [45]], //TODO 하드코딩
                colorset: ['#0072b2'],
                fields: ['지원자 수']
            },
            'chartDiv' : 'lineChart01',
            'chartType' : 'line',
            'leftOffsetValue': 40,
            'bottomOffsetValue': 60,
            'chartSize' : {width:1000, height:300},
            'minValue' :0,
            'maxValue' : 1000,
            'increment' : 100,
            'isGuideLineNeeded' : true //default set to false
        };
        Nwagon.chart(options);
    }

</script>
@stop