@extends('lcms.layouts.master_popup')

@section('popup_title')
@stop

@section('popup_header')
@endsection

@section('popup_content')
    <form class="form-horizontal" id="_sub_refund_check_form" name="_sub_refund_check_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}

    <!-- Popup -->
        <div class="form-group mt-20">
            <div class="col-md-11">
                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="act-move"><a href="javascript:gotab('{{ $prodcode }}','{{ $mem_idx }}');">전체 성적 분석</a></li>
                    <li role="presentation" class="active"><a href="#">과목별 문항분석</a></li>
                </ul>
            </div>
            <div class="col-md-1 form-inline">
                <!-- //tab -->
                <p><a href="javascript:printPage()" class="btn btn-default" role="button">출력</a></p>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
            @foreach($pList as $key => $row)

                <!-- 문항별 분석 -->
                <h5 class="bold">{{ $row }}</span> 문항별 분석</h5>
                <div class="text-right mt20 mb20">
                    <div style="float:left;border:2px solid red; width:15px; height:15px; background-color:red;"></div><div style="float:left;"><em>붉은</em>색은 틀린부분표시</div>
                </div>
                <table id="list_ajax_table_model" class="table table-striped table-bordered">
                    <colgroup>
                        <col style="width: 90px;"/>
                        @foreach($dataSubject[$key] as $key2 => $row2)
                            <col width="*">
                        @endforeach
                    </colgroup>
                    <thead>
                    <tr>
                        <th>구분</th>
                        @foreach($dataSubject[$key]['RightAnswer'] as $key2 => $row2)
                            <th>{{ $key2 + 1 }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>정답</td>
                        @foreach($dataSubject[$key]['RightAnswer'] as $key2 => $row2)
                            <td>{{ $row2 }}</td>
                        @endforeach

                    </tr>
                    <tr>
                        <td>마킹</td>
                        @foreach($dataSubject[$key]['Answer'] as $key2 => $row2)
                            <td><span class="@if($dataSubject[$key]['IsWrong'][$key2] == 'N') red bold fa-strikethrough @endif">{{ $row2 }}</span></td>
                        @endforeach

                    </tr>
                    <tr>
                        <td>정답률</td>
                        @foreach($dataSubject[$key]['QAVR'] as $key2 => $row2)
                            <td>{{ $row2 }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>난이도</td>
                        @foreach($dataSubject[$key]['Difficulty'] as $key2 => $row2)
                            <td>{{ $row2 }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            @endforeach

            <!-- 학습요소 -->
            @foreach($dataSubjectV2 as $key => $row)
                <h5 class="bold">{{ $row['MP'] }}</span> 영역 및 학습요소</h5>
                <table id="list_ajax_table_model" class="table table-striped table-bordered">
                    <colgroup>
                        <col style="width: 120px;"/>
                        <col style="width: 65px;"/>
                        <col style="width: 95px;"/>
                        <col style="width: 550px;">
                        <col width="*">
                    </colgroup>
                    <thead>
                    <tr>
                        <th class="sh1">구분</th>
                        <th class="sh2">개수</th>
                        <th class="sh3">평균</th>
                        <th class="sh4">관련문항</th>
                        <th class="sh5">오답문항</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $row['areaName'] }}</td>
                        <td>@if(empty($row['OCNT'])===false) {{ COUNT($row['OCNT']) }} / {{ COUNT($row['QuestionNO']) }} @else 0 / {{ COUNT($row['QuestionNO']) }}@endif</td>
                        <td>{{ $row['AVR'] }}</td>
                        <td>@if(empty($row['QuestionNO'])===false) @foreach($row['QuestionNO'] as $key => $row2) ({{ $row2 }}) @endforeach @endif</td>
                        <td class="red">@if(empty($row['XCNT'])===false) @foreach($row['XCNT'] as $key => $row2) ({{ $row2 }}) @endforeach @endif</td>
                    </tr>
                    </tbody>
                </table>
            @endforeach

            <!-- End 학습요소 -->
            </div>
        </div>

    </div>
    <!-- End Popup -->
    </form>
    <!-- //popupContainer -->
    <form class="form-horizontal" id="url_form" name="url_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" id='prodcode' name="prodcode" value="{{ $prodcode }}" />
    </form>
    <script>
        function gotab(prodcode, memidx){
            var uri_param;
            uri_param = 'prodcode=' + prodcode + '&memidx=' + memidx;

            var _url = '{{ site_url() }}' + 'mocktest/statisticsPrivate/winStatTotal?' + uri_param;
            location.href=_url;
        }

        //인쇄
        function printPage(){
            var initBody;
            window.onbeforeprint = function(){
                initBody = document.body.innerHTML;
                document.body.innerHTML =  $('.modal-body').html();
            };
            window.onafterprint = function(){
                document.body.innerHTML = initBody;
            };
            window.print();
            return false;
        }
    </script>
@stop

@section('popup_footer')
@endsection