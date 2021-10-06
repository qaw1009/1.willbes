@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')

    @if($data['SupportersTypeCcd'] == '736001')
        <link href="/public/css/willbes/promotion/2002_supporters.css?ver={{time()}}" rel="stylesheet">
    @else
        <link href="/public/css/willbes/promotion/2002_supporters2.css?ver={{time()}}" rel="stylesheet">
    @endif

    <!-- Container -->
    <div class="p_re evtContent NGR" id="evtContainer">
        {{--<div class="jumpMenu">
            {{ $data['SupportersYear'] }}년 {{ $data['SupportersNumber'] }}기
        </div>--}}
        <div class="evtTop" >
            @if($data['SupportersTypeCcd'] == '736001')
                <img src="https://static.willbes.net/public/images/promotion/supporters/supporters_top_bg_2020.jpg" title="광은 서포터즈">
            @else
                <img src="https://static.willbes.net/public/images/promotion/supporters/2021_cop_management_top.jpg" title="온라인관리반 체험단">
            @endif

            <div class="notice">
                <div class="title">
                    <a href="javascript:go_popup('', '{{ $data['SupportersIdx'] }}');"><img src="https://static.willbes.net/public/images/promotion/supporters/supporters_top_img01.png" title="공지사항 더보기"></a>
                </div>
                <ul class="list">
                    @if(empty($arr_base['notice_list']) === true)
                        <li>등록된 내용이 없습니다.</li>
                    @endif
                    @foreach($arr_base['notice_list'] as $row)
                        <li><a href="javascript:go_popup('{{ $row['BoardIdx'] }}', '{{ $row['SupportersIdx'] }}');">{{ $row['Title'] }}</a><span>{{ $row['RegDatm'] }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="evt01">
            <ul class="tab NSK-Black">
                @if($data['SupportersTypeCcd'] == '736001')
                    <li><a href="#tab01"><span>서포터즈 소개</span></a></li>
                    <li><a href="#tab02"><span>과제수행</span></a></li>
                    <li><a href="#tab03"><span>제안 및 의견</span></a></li>
                    <li><a href="#tab04"><span>명예의 전당</span></a></li>
                @else
                    @foreach($arr_base['supporters_menu'] as $key => $val)
                        @if (in_array($key,explode(',',$data['MenuInfo'])) === true)
                            <li><a href="#tab0{{$loop->index}}"><span>{{$val}}</span></a></li>
                        @endif
                    @endforeach
                @endif

            </ul>
            <div class="evtCtsBox">
                @if($data['SupportersTypeCcd'] == '736001')
                    <div id="tab01" class="evtCts tx-center">
                        <img src="https://static.willbes.net/public/images/promotion/supporters/supporters_tab01.jpg" title="광은 서포터즈">
                    </div>
                    <div id="tab02" class="evtCts">
                        @include('willbes.pc.site.supporters.home_assignment_partial')
                    </div>
                    <div id="tab03" class="evtCts">
                        @include('willbes.pc.site.supporters.home_suggest_partial')
                    </div>
                    <div id="tab04" class="evtCts">
                        @include('willbes.pc.site.supporters.home_member_partial')
                    </div>
                @else
                    @foreach($arr_base['supporters_menu'] as $key => $val)
                        @if ($key == '746001' && in_array($key,explode(',',$data['MenuInfo'])) === true)
                            <div id="tab01" class="evtCts">
                                @include('willbes.pc.site.supporters.home_attendance_partial')
                            </div>
                        @elseif($key == '746002' && in_array($key,explode(',',$data['MenuInfo'])) === true)
                            <div id="tab02" class="evtCts learn">
                                <h4>● 나의 학습량</h4>
                                <div class="learn01">
                                    <div>이번달 학습 시간 <strong>{{$chartdata['month_sum']['h']}}시간 {{$chartdata['month_sum']['m']}}분 (수강강의 : {{$chartdata['month_sum']['Cnt']}}개)</strong></div>
                                    <div>오늘 수강 강좌 <strong>{{$chartdata['today']['Cnt']}}개</strong></div>
                                </div>
                                <div class="learn02">
                                    <div>
                                        <p>{{$passinfo['ProdName']}}</p>
                                        [수강기간] <span class="tx-blue">{{str_replace('-', '.', $passinfo['LecStartDate'])}}~{{str_replace('-', '.', $passinfo['RealLecEndDate'])}}</span> (잔여기간 <span class="tx-red">{{$passinfo['remainDays']}}일</span>)
                                    </div>
                                    <div class="right">
                                        수강중인 강좌수
                                        <p><span class="tx-blue">{{$passinfo['TakeLecNum']}}강좌</span> / {{$passinfo['LecNum']}}강좌</p>
                                    </div>
                                </div>
                                <div class="learn03">
                                    <div class="stitle">[과목 별 월 학습량]</div>
                                    <div class="data">
                                        <canvas id="chart_div" width="920" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
                            <script type="text/javascript">
                                const $colors = ['#ad78b0', '#00496a', '#bd8a5b', '#f88268', '#73b062'];
                                const $data = {
                                    labels: [@foreach($chartdata['month'] as $month_key => $month) '{{$month_key}}', @endforeach],
                                    datasets: [
                                        @php $i = 0 @endphp
                                        @foreach($chartdata['all'] as $key => $row)
                                        {
                                            label: '{{$key}}',
                                            data: [@foreach($chartdata['month'] as $month_key => $month) {{ empty($month[$key]) == True ? 0 : $month[$key] }}, @endforeach],
                                            backgroundColor: $colors[{{$i}}],
                                        },
                                            @php $i++ @endphp
                                        @endforeach
                                    ]
                                };
                                const $config = {
                                    type: 'bar',
                                    data: $data,
                                    options: {
                                        plugins: {
                                            legend: {
                                                position: 'bottom',
                                                labels: {
                                                    boxHeight:21
                                                }
                                            }
                                        },
                                        responsive: false,
                                        scales: {
                                            x: {
                                                stacked: true
                                            },
                                            y: {
                                                stacked: true
                                            }
                                        }
                                    }
                                };
                                var $ctx = document.getElementById('chart_div').getContext('2d');
                                var myChart = new Chart($ctx, $config);

                                function drawVisualization() {
                                    var data = google.visualization.arrayToDataTable([
                                        [ '날짜' @foreach($chartdata['all'] as $key => $row) , '{{$key}}' @endforeach ]
                                        @foreach($chartdata['month'] as $month_key => $month)
                                            ,[ '{{$month_key}}' @foreach($chartdata['all'] as $key => $row) , {{ empty($month[$key]) == True ? 0 : $month[$key] }} @endforeach
                                            ]
                                        @endforeach
                                    ]);

                                    var options = {
                                        isStacked: true,
                                        width:920,
                                        height:400,
                                        chartArea:{
                                            left:0,
                                            top:0,
                                            width:'100%',
                                            height:'95%'
                                        },
                                        legend : {
                                            position :'none'
                                        },
                                        colors: ['#ad78b0', '#00496a', '#bd8a5b', '#f88268', '#73b062']
                                    };
                                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                                    chart.draw(data, options);
                                }
                            </script>

                        @elseif($key == '746003' && in_array($key,explode(',',$data['MenuInfo'])) === true)
                            <div id="tab03" class="evtCts">
                                @include('willbes.pc.site.supporters.home_assignment_partial')
                            </div>
                        @elseif($key == '746004' && in_array($key,explode(',',$data['MenuInfo'])) === true)
                            <div id="tab04" class="evtCts">
                                @include('willbes.pc.site.supporters.home_suggest_partial')
                            </div>
                        @elseif($key == '746005' && in_array($key,explode(',',$data['MenuInfo'])) === true)
                            <div id="tab05" class="evtCts">
                                @include('willbes.pc.site.supporters.home_qna_partial')
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- End Container -->

    {{--공지사항 레이어팝업--}}
    <div id="popup" class="Pstyle NGR">
        <div id="supporters_notice"></div>
    </div>

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})}
            )}
        );

        function go_popup(obj1, obj2) {
            var ele_id = 'supporters_notice';
            var data = {
                'ele_id' : ele_id,
                'board_idx' : obj1,
                'supporters_idx' : obj2
            };
            sendAjax('{{ front_url('/supporters/notice/index') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                $('#popup').bPopup();
            }, showAlertError, false, 'GET', 'html');
        }
    </script>
@stop