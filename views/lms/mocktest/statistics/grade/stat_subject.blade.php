@extends('lcms.layouts.master')

@section('content')
    <div id="content">
        <h5 class="mt-20">- 모의고사 기준으로 조정점수를 수동반영하고 성적 통계를 확인하는 메뉴입니다.(개인 성적표 통계 처리를 위한 단계)</h5>
        <div class="x_panel">
            <div>
                <div class="pull-left x_title mb-5"><h2>모의고사정보</h2></div>
                <div class="pull-right text-right form-inline mb-5">
                    <button class="btn btn-sm btn-primary" id="act-addRow" onClick="printPage()">인쇄</button>
                    <button class="btn btn-sm btn-primary" id="act-sort" onClick="scoreMake({{ $prodcode }})">조정점수반영</button>
                    <button class="btn btn-sm btn-success" id="goList">목록</button>
                </div>
            </div>
            @if(empty($productInfo) === false)
            <div class="x_content">
                <table class="table table-bordered modal-table">
                    <tr>
                        <th>모의고사그룹명</th>
                        <th>운영사이트</th>
                        <th>카테고리</th>
                        <th>직렬</th>
                        <th>연도</th>
                        <th>회차</th>
                        <th>모의고사명</th>
                        <th>응시형태</th>
                        <th>응시현황</th>
                    </tr>
                    <tr>
                        <td>{{ $productInfo['GroupName'] }}</td>
                        <td>{{ $productInfo['SiteName'] }}</td>
                        <td>{{ $productInfo['CateName'] }}</td>
                        <td>
                            @foreach($productInfo['MockPartName'] as $key => $row)
                                {{ $row }}<br>
                            @endforeach
                        </td>
                        <td>{{ $productInfo['MockYear'] }}</td>
                        <td>{{ $productInfo['MockRotationNo'] }}</td>
                        <td>{{ $productInfo['ProdName'] }}</td>
                        <td>{{ $productInfo['TakeFormsCcd_Name'] }}</td>
                        <td>{{ $productInfo['USERCNT'] }}</td>
                    </tr>
                    <tr>
                        <th>성적오픈일</th>
                        <td>{{ $productInfo['GradeOpenDatm'] }}</td>
                        <th colspan="2">조정점수 최종반영자</th>
                        <td colspan="2">{{ $productInfo['writer'] }}</td>
                        <th>조정점수 최종반영일</th>
                        <td colspan="4">{{ $productInfo['wdate'] }}</td>
                    </tr>
                </table>
            </div>
            @else
                <table class="table table-bordered modal-table">
                    <tr>
                        <td class="tx-center">- 등록된 데이터가 없습니다. -</td>
                    </tr>
                </table>
            @endif
        </div>
        <h5 class="mt-20">- 모의고사 기준으로 조정점수를 수동반영하고 성적 통계를 확인하는 메뉴입니다.(개인 성적표 통계 처리를 위한 단계)</h5>
        <div class="x_panel">
            @if(empty($list)===false)
                @foreach($list as $keys => $rows)
                <div>
                    <div class="pull-left x_title mb-5"><h2>{{ $rows['CcdName'] }}</h2></div>
                </div>
                <div class="x_content">

                    <table class="table table-bordered modal-table">
                        <tr>
                            <th rowspan="2">구분</th>
                            @foreach($rows['E'] as $key => $row)
                            <th rowspan="2">{{ $row['SubjectName'] }}</th>
                            @endforeach
                            @foreach($rows['S'] as $key => $row)
                            <th colspan="2">{{ $row['SubjectName'] }}</th>
                            @endforeach
                            <th rowspan="2">평균</th>
                        </tr>
                        <tr>
                            @foreach($rows['S'] as $key => $row)
                            <th>원점수</th>
                            <th>조정점수</th>
                            @endforeach
                        </tr>
                        <tr>
                            <th>전체평균</th>
                            @foreach($rows['E'] as $key => $row)
                            <td id="p{{ $keys }}_{{ $key }}">{{ round($row['opAVG'],2) }}</td>
                            @endforeach
                            @foreach($rows['S'] as $key => $row)
                                <td>{{ round($row['opAVG'],2) }}</td>
                                <td id="p{{ $keys }}_{{ $key }}">{{ round($row['adAVG'],2) }}</td>
                            @endforeach
                            <td id="pr{{ $keys }}"></td>
                        </tr>
                        <tr>
                            <th>최고점</th>
                            @foreach($rows['E'] as $key => $row)
                                <td id="m{{ $keys }}_{{ $key }}">{{ round($row['opMax'],2) }}</td>
                            @endforeach
                            @foreach($rows['S'] as $key => $row)
                                <td>{{ round($row['opMax'],2) }}</td>
                                <td id="m{{ $keys }}_{{ $key }}">{{ round($row['adMax'],2) }}</td>
                            @endforeach
                            <td id="mr{{ $keys }}"></td>
                        </tr>
                        <tr>
                            <th>표준편차</th>
                            @foreach($rows['E'] as $key => $row)
                                <td id="s{{ $keys }}_{{ $key }}">{{ round($row['StandardDeviation'],2) }}</td>
                            @endforeach
                            @foreach($rows['S'] as $key => $row)
                                <td>{{ round($row['StandardDeviation'],2) }}</td>
                                <td id="s{{ $keys }}_{{ $key }}">{{ round($row['StandardDeviation'],2) }}</td>
                            @endforeach
                            <td id="sr{{ $keys }}"></td>
                        </tr>
                        <tr>
                            <th>응시인원</th>
                            @foreach($rows['E'] as $key => $row)
                                <td id="q{{ $keys }}">{{ round($row['CNT'],2) }}</td>
                            @endforeach
                            @foreach($rows['S'] as $key => $row)
                                <td colspan="2">{{ round($row['CNT'],2) }}</td>
                            @endforeach
                            <td id="qr{{ $keys }}"></td>
                        </tr>

                    </table>

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
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="ProdCode" name="ProdCode" value="">
    </form>
    <style>
        .tooltip-inner { max-width: 100%; padding: 2px; background: #555; }
        .tooltip-arrow { display: none; }
    </style>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var TakeMockPartSet = {!! json_encode($TakeMockPartSet) !!};
        var MpIdxSet = {!! json_encode($MpIdxSet) !!};

        $(document).ready(function() {
            for(var i=0; i < TakeMockPartSet.length; i++){
                var pnum = 0;
                var ptotal = 0;
                var mnum = 0;
                var mtotal = 0;
                var snum = 0;
                var stotal = 0;
                var cnt = 0;
                for(var j=0; j < MpIdxSet.length; j++){
                    pnum = parseFloat($('#p'+TakeMockPartSet[i]+'_'+MpIdxSet[j]).html());
                    ptotal += pnum;
                    mnum = parseFloat($('#m'+TakeMockPartSet[i]+'_'+MpIdxSet[j]).html());
                    mtotal += mnum;
                    snum = parseFloat($('#s'+TakeMockPartSet[i]+'_'+MpIdxSet[j]).html());
                    console.log(snum);
                    stotal += snum;
                    cnt++;
                }

                $('#pr'+TakeMockPartSet[i]).html((ptotal / cnt).toFixed(2));
                $('#mr'+TakeMockPartSet[i]).html((mtotal / cnt).toFixed(2));
                $('#sr'+TakeMockPartSet[i]).html((stotal / cnt).toFixed(2));
                $('#qr'+TakeMockPartSet[i]).html($('#q'+TakeMockPartSet[i]).html());
            }
        });

        // 목록 이동
        $('#goList').on('click', function() {
            location.replace('{{ site_url('/mocktest/statisticsGrade/') }}' + getQueryString());
        });

        //인쇄
        function printPage(){
            var initBody;
            window.onbeforeprint = function(){
                initBody = document.body.innerHTML;
                document.body.innerHTML =  $('#content').html();
            };
            window.onafterprint = function(){
                document.body.innerHTML = initBody;
            };
            window.print();
            return false;
        }

        // 조정점수 반영
        function scoreMake(prodcode){
            $('#ProdCode').val(prodcode);

            var _url = '{{ site_url('/mocktest/statisticsGrade/scoreMakeAjax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                }
            }, showValidateError, null, false, 'alert');
        }

    </script>
@stop