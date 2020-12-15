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
                        <li><a href="#trend_guide{{$loop->index}}" data-subject-id="{{$key}}" class="btn-subject {{($loop->first === true) ? 'on' : ''}}">{{$val['subject_name']}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div id="trend_area" class="tabContent GM">
                <div id="chartBox"></div>
                @foreach($arr_base['subject_list'] as $key => $val)
                    <div id="trend_guide{{$loop->index}}">
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
            $data = 'subject_id='+subject_id;
            var data = {
                'subject_id' : subject_id
            };
            sendAjax('{{front_url('/examInfo/graphHtml/')}}', data, function(d) {
                $('#chartBox').html(d).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        }
    </script>
@stop