@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            임용시험 최근 10년 동향
        </div>

        <div class="w-Guide-Ssam mt20">

            <div class="tabBox NG">
                <ul class="tabShow tabSsam">
                    @foreach($arr_base['subject_list'] as $key => $val)
                        <li><a href="#trend_guide{{$loop->index}}" data-subject-id="{{$key}}" class="btn-subject {{($loop->first === true) ? 'on' : ''}}">{{$val}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="tabContent GM">
                @foreach($arr_base['subject_list'] as $key => $val)
                    <div id="trend_guide{{$loop->index}}">
                        <div class="chart-box" id="chart_box_{{$key}}"></div>
                        <div class="trendData">
                            <table cellspacing="0">
                                <colgroup>
                                    <col width="25%">
                                    <col width="25%">
                                    <col width="25%">
                                    <col width="25%">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>학년도</th>
                                    <th>모집</th>
                                    <th>지원</th>
                                    <th>경쟁률</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(empty($arr_base['graph'][$key]) === false)
                                    @foreach($arr_base['graph'][$key] as $row)
                                    <tr>
                                        <td>{{$row['YearTarget']}}{{($row['TakeType'] == '2') ? ' 추시' : ''}}</td>
                                        <td>{{number_format($row['NoticeNumber'])}}</td>
                                        <td>{{number_format($row['TakeNumber'])}}</td>
                                        <td>{{$row['AvgData']}}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach

                {{--<div id="trend_guide1">
                    <div>
                        그래프 1
                    </div>
                    <div>
                        그래프 2
                    </div>
                    <div class="trendData">
                        <table cellspacing="0">
                            <colgroup>
                                <col width="25%">
                                <col width="25%">
                                <col width="25%">
                                <col width="25%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>학년도</th>
                                <th>모집</th>
                                <th>지원</th>
                                <th>경쟁률</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>2020</td>
                                <td>1,154</td>
                                <td>13,103</td>
                                <td>11.35</td>
                            </tr>
                            <tr>
                                <td>2019 추시</td>
                                <td>482</td>
                                <td>12,505</td>
                                <td>25.9</td>
                            </tr>
                            <tr>
                                <td>2019</td>
                                <td>948</td>
                                <td>9,955</td>
                                <td>10.5</td>
                            </tr>
                            <tr>
                                <td>2018</td>
                                <td>1,365</td>
                                <td>8,992</td>
                                <td>6.59</td>
                            </tr>
                            <tr>
                                <td>2017</td>
                                <td>596</td>
                                <td>6,133</td>
                                <td>10.29</td>
                            </tr>
                            <tr>
                                <td>2016</td>
                                <td>696</td>
                                <td>5,597</td>
                                <td>8.04</td>
                            </tr>
                            <tr>
                                <td>2015</td>
                                <td>619</td>
                                <td>4,888</td>
                                <td>7.9</td>
                            </tr>
                            <tr>
                                <td>2014</td>
                                <td>397</td>
                                <td>4,418</td>
                                <td>11.13</td>
                            </tr>
                            <tr>
                                <td>2013</td>
                                <td>578</td>
                                <td>3,863</td>
                                <td>6.68</td>
                            </tr>
                            <tr>
                                <td>2012</td>
                                <td>234</td>
                                <td>4,664</td>
                                <td>19.93</td>
                            </tr>
                            <tr>
                                <td>2011</td>
                                <td>113</td>
                                <td>5,079</td>
                                <td>44.95</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>--}}
            </div>
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')

    </div>
    <!-- End Container -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            htmlGraph({{key($arr_base['subject_list'])}});
            $(".btn-subject").click(function (){
                htmlGraph($(this).data("subject-id"));
            });
        });

        function htmlGraph(subject_id) {
            $(".chart-box").empty();
            $url = '{{front_url('/examInfo/graphHtml/')}}';
            $data = 'subject_id='+subject_id;
            sendAjax($url,
                $data,
                function(d){
                    $("#chart_box_"+subject_id).html(d).end()
                },
                function(req, status, err){
                    /*showError(req, status);*/
                }, false, 'GET', 'html');
        }
    </script>
@stop