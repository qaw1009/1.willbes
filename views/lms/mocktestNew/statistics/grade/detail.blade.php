@extends('lcms.layouts.master')

@section('content')
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="prod_code" name="prod_code" value="{{ $product_info['ProdCode'] }}">
    </form>
    <div id="content">
        <h5>- 모의고사 기준으로 조정점수를 수동반영하고 성적 통계를 확인하는 메뉴입니다.(개인 성적표 통계 처리를 위한 단계)</h5>
        <div class="x_panel">
            <div>
                <div class="pull-left mb-5"><h2>모의고사 정보</h2></div>
                <div id='btnarea' class="pull-right text-right form-inline mb-5">
                    <button class="btn btn-sm btn-primary" onClick="printPage()">인쇄</button>
                    <button class="btn btn-sm btn-primary" onClick="scoreMake()">조정점수반영</button>
                    <button class="btn btn-sm btn-success" id="btn_list">목록</button>
                </div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <table class="table table-bordered">
                        <thead class="bg-white-gray">
                        <tr>
                            <th rowspan="2" class="valign-middle">운영사이트</th>
                            <th rowspan="2" class="valign-middle">카테고리</th>
                            <th rowspan="2" class="valign-middle">직렬</th>
                            <th rowspan="2" class="valign-middle">연도</th>
                            <th rowspan="2" class="valign-middle">회차</th>
                            <th rowspan="2" class="valign-middle">모의고사명</th>
                            <th colspan="2" class="valign-middle">응시형태</th>
                            <th colspan="2" class="valign-middle">응시현황</th>
                            <th rowspan="2" class="valign-middle">성적오픈일</th>
                        </tr>
                        <tr>
                            <th class="valign-middle">Online</th>
                            <th class="valign-middle">Off</th>
                            <th class="valign-middle">Online</th>
                            <th class="valign-middle">Off</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $product_info['SiteName'] }}</td>
                            <td>{{ $product_info['CateName'] }}</td>
                            <td>
                                @foreach($product_info['MockPartName'] as $key => $row)
                                    {{ $row }}<br>
                                @endforeach
                            </td>
                            <td>{{$product_info['MockYear']}}</td>
                            <td>{{$product_info['MockRotationNo']}}</td>
                            <td>{{$product_info['ProdName']}}</td>
                            <td>{{$product_info['TakePart_on']}}</td>
                            <td>{{$product_info['TakePart_off']}}</td>
                            <td>{{$product_info['OnlineCnt']}}</td>
                            <td>{{$product_info['OfflineCnt']}}</td>

                            {{--<td>{{$product_info['USERCNT']}}</td>--}}
                            <td>{{$product_info['GradeOpenDatm']}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">조정점수 최종반영자</label>
                    <div class="col-md-2">{{ $product_info['LastGradesUpdAdminName'] }}</div>
                    <label class="control-label col-md-1-1">조정점수 최종반영일</label>
                    <div class="col-md-2">{{ $product_info['LastGradesUpdDatm'] }}</div>
                </div>
            </div>
        </div>

        {{--<h5>- 직렬별 응시인원 = 모의고사그룹코드로 묶인 경우, 그룹핑된 각 모의고사를 응시한 인원의 총합(각 모의고사의 응시인원과 상이할 수 있음)</h5>--}}
        <div class="x_panel">
            @if (empty($list_register_subject) === false)
                @foreach($arr_take_mock_part as $key => $val)
                    <div>
                        <div class="pull-left x_title mb-5"><h2>{{ $val }}</h2></div>
                        <div class="x_content">
                            <table class="table table-bordered modal-table">
                                <thead>
                                    <tr>
                                        <th class="valign-middle" rowspan="2">과목</th>
                                        @foreach($arr_subject_e as $row)
                                            <th class="valign-middle" rowspan="2">{{ $row['subject_name'] }}</th>
                                        @endforeach
                                        @foreach($arr_subject_s as $row)
                                            <th class="valign-middle" colspan="2">{{ $row['subject_name'] }}</th>
                                        @endforeach
                                        <th class="valign-middle" rowspan="2">평균</th>
                                    </tr>
                                    @if(empty($arr_subject_s) === false)
                                    <tr>
                                        @foreach($arr_subject_s as $row)
                                        <th>원점수</th>
                                        <th>조정점수</th>
                                        @endforeach
                                    </tr>
                                    @endif
                                </thead>

                                <tbody>
                                    @foreach($data_e as $data_key => $data_row)
                                        <tr>
                                            <td>{{ $data_key }}</td>
                                            @foreach($data_row as $take_mock_part => $row2)
                                                @if (empty($arr_take_mock_part[$take_mock_part]) === false && $key == $take_mock_part)
                                                    @foreach($row2 as $mp_idx => $val)
                                                        <td>{{ $val }}</td>
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            @if(empty($data_s) === false)
                                                @foreach($data_s as $data_key_s => $data_row_s)
                                                    @if($data_key == $data_key_s)
                                                        @foreach($data_row_s as $take_mock_part_s => $row2_s)
                                                            @if (empty($arr_take_mock_part[$take_mock_part_s]) === false && $key == $take_mock_part_s)
                                                                @foreach($row2_s as $mp_idx => $val)
                                                                    <td>{{ $val['org'] }}</td>
                                                                    <td>{{ $val['adjust'] }}</td>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif

                                            @if(empty($arr_total_avg) === false)
                                                @foreach($arr_total_avg as $total_take_mock_part => $total_row)
                                                    @if (empty($arr_take_mock_part[$total_take_mock_part]) === false && $key == $total_take_mock_part)
                                                        <td>{{ $total_row[$data_key] }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tr>
                                    @endforeach
                                    @foreach($data_default_e as $data_key => $data_row)
                                        <tr>
                                            <td>{{ $data_key }}</td>
                                            @foreach($data_row as $take_mock_part => $row2)
                                                @if (empty($arr_take_mock_part[$take_mock_part]) === false && $key == $take_mock_part)
                                                    @foreach($row2 as $mp_idx => $val)
                                                        <td>{{ $val }}</td>
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            @if(empty($data_default_s) === false)
                                                @foreach($data_default_s as $data_key_s => $data_row_s)
                                                    @if($data_key == $data_key_s)
                                                        @foreach($data_row_s as $take_mock_part_s => $row2_s)
                                                            @if (empty($arr_take_mock_part[$take_mock_part_s]) === false && $key == $take_mock_part_s)
                                                                @foreach($row2_s as $mp_idx => $val)
                                                                    <td colspan="2">{{ $val }}</td>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif

                                            @if(empty($arr_total_avg) === false)
                                                @foreach($arr_total_avg as $total_take_mock_part => $total_row)
                                                    @if (empty($arr_take_mock_part[$total_take_mock_part]) === false && $key == $total_take_mock_part)
                                                        <td>{{ $total_row[$data_key] }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            @else
                <table class="table table-bordered modal-table">
                    <tr>
                        <td class="tx-center">- 등록된 데이터가 없습니다. -</td>
                    </tr>
                </table>
            @endif
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function () {
            $('#btn_list').click(function() {
                location.href = '{{ site_url('/mocktestNew/statistics/grade/') }}' + getQueryString();
            });
        });

        //인쇄
        function printPage(){
            var initBody;
            window.onbeforeprint = function(){
                initBody = document.body.innerHTML;
                $('#btnarea').hide();
                document.body.innerHTML =  $('#content').html();
            };
            window.onafterprint = function(){
                $('#btnarea').show();
                document.body.innerHTML = initBody;
            };
            window.print();
        }

        // 조정점수 반영
        function scoreMake(){
            if(!confirm("조정점수를 반영 하시겠습니까?")) return;
            var _url = '{{ site_url('/mocktestNew/statistics/grade/scoreMakeAjax') }}';
            ajaxLoadingSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                }
            }, showValidateError, null, 'alert', $regi_form);
        }
    </script>
@stop