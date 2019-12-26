@extends('lcms.layouts.master')

@section('content')
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
                        <tr class="bg-white-gray">
                            <th>운영사이트</th>
                            <th>카테고리</th>
                            <th>직렬</th>
                            <th>연도</th>
                            <th>회차</th>
                            <th>모의고사명</th>
                            <th>응시형태</th>
                            <th>응시현황</th>
                            <th>성적오픈일</th>
                        </tr>
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
                            <td>{{$product_info['TakeFormsCcd_Name']}}</td>
                            <td>{{$product_info['USERCNT']}}</td>
                            <td>{{$product_info['GradeOpenDatm']}}</td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">조정점수 최종반영자</label>
                    <div class="col-md-2">{{ $product_info['writer'] }}</div>
                    <label class="control-label col-md-1-1">조정점수 최종반영일</label>
                    <div class="col-md-2">{{ $product_info['wdate'] }}</div>
                </div>
            </div>
        </div>

        <h5>- 직렬별 응시인원 = 모의고사그룹코드로 묶인 경우, 그룹핑된 각 모의고사를 응시한 인원의 총합(각 모의고사의 응시인원과 상이할 수 있음)</h5>
        <div class="x_panel">
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#btn_list').click(function() {
                location.href = '{{ site_url('/mocktestNew/statistics/grade/') }}' + getQueryString();
            });
        });
    </script>
@stop