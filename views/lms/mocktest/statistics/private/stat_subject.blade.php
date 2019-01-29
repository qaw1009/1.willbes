@extends('lcms.layouts.master')

@section('content')
    <div id="content">
        <h5 class="mt-20">- 모의고사 기준으로 조정점수를 수동반영하고 성적 통계를 확인하는 메뉴입니다.(개인 성적표 통계 처리를 위한 단계)</h5>
        <div class="x_panel">
            <div>
                <div class="pull-left x_title mb-5"><h2>모의고사정보</h2></div>
                <div class="pull-right text-right form-inline mb-5">
                    <button class="btn btn-sm btn-primary act-move" data-idx="{{ $prodcode }}" data-mem="{{ $memidx }}">상세성적확인</button>
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
                        <div class="pull-left x_title mb-5"><h2>과목별득점분석</h2></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-bordered modal-table">
                            <tr>
                                @if(empty($rows['S'])===false)
                                    <th rowspan="2">구분</th>
                                @else
                                    <th>구분</th>
                                @endif
                                @foreach($rows['E'] as $key => $row)
                                    @if(empty($rows['S'])===false)
                                        <th rowspan="2">{{ $row['SubjectName'] }}</th>
                                    @else
                                        <th>{{ $row['SubjectName'] }}</th>
                                    @endif
                                @endforeach
                                @if(empty($rows['S'])===false)
                                    @foreach($rows['S'] as $key => $row)
                                        <th colspan="2">{{ $row['SubjectName'] }}</th>
                                    @endforeach
                                @endif

                                @if(empty($rows['S'])===false)
                                    <th rowspan="2">평균</th>
                                @else
                                    <th>평균</th>
                                @endif
                            </tr>
                            @if(empty($rows['S'])===false)
                            <tr>
                                @foreach($rows['S'] as $key => $row)
                                    <th>원점수</th>
                                    <th>조정점수</th>
                                @endforeach
                            </tr>
                            @endif
                            <tr>
                                <th>본인</th>
                                @foreach($rows['E'] as $key => $row)
                                    <td id="z{{ $key }}">{{ round($row['pOrgPoint'],2) }}</td>
                                @endforeach
                                @if(empty($rows['S'])===false)
                                    @foreach($rows['S'] as $key => $row)
                                        <td>{{ round($row['pOrgPoint'],2) }}</td>
                                        <td id="z{{ $key }}">{{ round($row['pAdjustPoint'],2) }}</td>
                                    @endforeach
                                @endif
                                <td id="zr"></td>
                            </tr>
                            <tr>
                                <th>전체평균</th>
                                @foreach($rows['E'] as $key => $row)
                                    <td id="p{{ $key }}">{{ round($row['opAVG'],2) }}</td>
                                @endforeach
                                @if(empty($rows['S'])===false)
                                    @foreach($rows['S'] as $key => $row)
                                        <td>{{ round($row['opAVG'],2) }}</td>
                                        <td id="p{{ $key }}">{{ round($row['adAVG'],2) }}</td>
                                    @endforeach
                                @endif
                                <td id="pr"></td>
                            </tr>
                            <tr>
                                <th>과목석차</th>
                                @foreach($rows['E'] as $key => $row)
                                    <td id="k{{ $key }}">{{ $row['pRank'] }}</td>
                                @endforeach
                                @if(empty($rows['S'])===false)
                                    @foreach($rows['S'] as $key => $row)
                                        <td colspan="2" id="k{{ $key }}">{{ $row['pRank'] }}</td>
                                    @endforeach
                                @endif
                                <td id="kr">{{ $rows['pSRank'] }}</td>
                            </tr>
                            <tr>
                                <th>백분위</th>
                                @foreach($rows['E'] as $key => $row)
                                    <td id="b{{ $key }}">{{ round($row['tpct'],2) }} %</td>
                                @endforeach
                                @if(empty($rows['S'])===false)
                                    @foreach($rows['S'] as $key => $row)
                                        <td colspan="2" id="b{{ $key }}">{{ round($row['tpct'],2) }} %</td>
                                    @endforeach
                                @endif
                                <td id="br">{{ $rows['stpct'] }} %</td>
                            </tr>
                            <tr>
                                <th>최고점</th>
                                @foreach($rows['E'] as $key => $row)
                                    <td id="m{{ $key }}">{{ round($row['opMax'],2) }}</td>
                                @endforeach
                                @if(empty($rows['S'])===false)
                                    @foreach($rows['S'] as $key => $row)
                                        <td>{{ round($row['opMax'],2) }}</td>
                                        <td id="m{{ $key }}">{{ round($row['adMax'],2) }}</td>
                                    @endforeach
                                @endif
                                <td id="mr"></td>
                            </tr>
                            <tr>
                                <th>표준편차</th>
                                @foreach($rows['E'] as $key => $row)
                                    <td id="s{{ $key }}">{{ round($row['StandardDeviation'],2) }}</td>
                                @endforeach
                                @if(empty($rows['S'])===false)
                                    @foreach($rows['S'] as $key => $row)
                                        <td>{{ round($row['StandardDeviation'],2) }}</td>
                                        <td id="s{{ $key }}">{{ round($row['StandardDeviation'],2) }}</td>
                                    @endforeach
                                @endif
                                <td id="sr"></td>
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
        <div class="pull-right text-right form-inline mb-5">
        <button class="btn btn-sm btn-success" id="goList">목록</button>
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
        var MpIdxSet = {!! json_encode($MpIdxSet) !!};

        $(document).ready(function() {
            var pnum = 0;
            var ptotal = 0;
            var mnum = 0;
            var mtotal = 0;
            var snum = 0;
            var stotal = 0;
            var znum = 0;
            var ztotal = 0;

            var cnt = 0;
            for(var j=0; j < MpIdxSet.length; j++){
                pnum = parseFloat($('#p'+MpIdxSet[j]).html());
                ptotal += pnum;
                mnum = parseFloat($('#m'+MpIdxSet[j]).html());
                mtotal += mnum;
                snum = parseFloat($('#s'+MpIdxSet[j]).html());
                stotal += snum;
                znum = parseFloat($('#z'+MpIdxSet[j]).html());
                ztotal += znum;

                cnt++;
            }

            $('#pr').html((ptotal / cnt).toFixed(2));
            $('#mr').html((mtotal / cnt).toFixed(2));
            $('#sr').html((stotal / cnt).toFixed(2));
            $('#zr').html((ztotal / cnt).toFixed(2));

            // 모달창 오픈
            $('.act-move').on('click', function() {

                var uri_param;
                var prodcode = $(this).data('idx');
                var memidx = $(this).data('mem');

                uri_param = 'prodcode=' + prodcode + '&memidx=' + memidx;

                $('.act-move').setLayer({
                    'url' : '{{ site_url() }}' + '/mocktest/statisticsPrivate/winStatTotal?' + uri_param,
                    'width' : 1400
                });
            });

        });

        // 목록 이동
        $('#goList').on('click', function() {
            location.replace('{{ site_url('/mocktest/statisticsPrivate/') }}' + getQueryString());
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



    </script>
@stop