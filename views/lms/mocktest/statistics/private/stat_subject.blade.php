@extends('lcms.layouts.master')

@section('content')
    <div id="content">
        <h5 class="mt-20">- 응시자 기준으로 개별 모의고사성적을 확인하는 메뉴입니다.</h5>
        <div class="x_panel">
            <div>
                <div class="pull-left x_title mb-5"><h2>모의고사정보</h2></div>
                <div class="pull-right text-right form-inline mb-5">
                    @if($privateExamInfo['TakeForm'] == '690001')
                        <button class="btn btn-sm btn-primary" id="btn_score" data-act-type="{{ ((empty($privateExamInfo['tempCnt']) === true) ? 'N' : 'Y') }}">채점하기</button>
                    @endif
                    @if (empty($dataAdjust) === false)
                        <button class="btn btn-sm btn-primary act-move" data-idx="{{ $prodcode }}" data-mem="{{ $mridx }}">상세성적확인</button>
                    @else
                        <button class="btn btn-sm btn-primary" onclick="javascript:alert('조정점수 반영 후 확인해 주세요.');">상세성적확인</button>
                    @endif
                </div>
            </div>
            @if(empty($privateExamInfo) === false)
                <div class="x_content">
                    <table class="table table-bordered modal-table">
                        <tr>
                            <th>회원명</th>
                            <th>연락처</th>
                            <th>응시번호</th>
                            <th>응시형태</th>
                            <th>연도</th>
                            <th>회차</th>
                            <th>모의고사명</th>
                            <th>카테고리</th>
                            <th>직렬</th>
                            <th>과목</th>
                            <th>응시지역</th>
                            <th>응시일자</th>
                        </tr>
                        <tr>
                            <td>{{ $privateExamInfo['MemName'] }}({{ $privateExamInfo['MemId'] }})</td>
                            <td>{{ $privateExamInfo['Phone'] }}</td>
                            <td>{{ $privateExamInfo['TakeNumber'] }}</td>
                            <td>{{ $privateExamInfo['TakeFormType'] }}</td>
                            <td>{{ $privateExamInfo['MockYear'] }}</td>
                            <td>{{ $privateExamInfo['MockRotationNo'] }}</td>
                            <td>{{ $privateExamInfo['ProdName'] }}</td>
                            <td>{{ $privateExamInfo['CateName'] }}</td>
                            <td>{{ $privateExamInfo['TakeMockPartName'] }}</td>
                            <td>{{ $privateExamInfo['SubjectName'] }}</td>
                            <td>{{ $privateExamInfo['TakeAreaName'] }}</td>
                            <td>{{ $privateExamInfo['GradeDatm'] }}</td>

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
                                    <td><span id="k{{ $key }}">{{ $row['pRank'] }}/{{ $row['CNT'] }}</td>
                                @endforeach
                                @if(empty($rows['S'])===false)
                                    @foreach($rows['S'] as $key => $row)
                                        <td colspan="2" ><span id="k{{ $key }}">{{ $row['pRank'] }}</span>/{{ $row['CNT'] }}</td>
                                    @endforeach
                                @endif
                                <td id="kr">{{ $sumRank }}</td>
                            </tr>
                            <tr>
                                <th>백분위</th>
                                @foreach($rows['E'] as $key => $row)
                                    <td><span id="b{{ $key }}">{{ round($row['tpct'],2) }}</span> %</td>
                                @endforeach
                                @if(empty($rows['S'])===false)
                                    @foreach($rows['S'] as $key => $row)
                                        <td colspan="2"><span id="b{{ $key }}">{{ round($row['tpct'],2) }}</span> %</td>
                                    @endforeach
                                @endif
                                <td id="br">{{ $per }} %</td>
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
                        <td class="tx-center">- 그룹을 등록해주세요. -</td>
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
        <input type="hidden" id="ProdCode" name="ProdCode" value="{{ $prodcode }}">
        <input type="hidden" id="mr_idx" name="mr_idx" value="{{ $mridx }}">
        <input type="hidden" id="mem_idx" name="mem_idx" value="{{ $privateExamInfo['MemIdx'] }}">
    </form>
    <style>
        .tooltip-inner { max-width: 100%; padding: 2px; background: #555; }
        .tooltip-arrow { display: none; }
    </style>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var MpIdxSet = {!! json_encode($MpIdxSet) !!};
        var tcnt = '{{ $row['CNT'] }}';

        $(document).ready(function() {
            var pnum = 0; ptotal = 0; mnum = 0; mtotal = 0; snum = 0; stotal = 0; znum = 0; ztotal = 0;

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
                var mridx = $(this).data('mem');
                uri_param = 'prodcode=' + prodcode + '&mridx=' + mridx;
                var _url = '{{ site_url() }}' + 'mocktest/statisticsPrivate/winStatTotal?' + uri_param;
                win = window.open(_url, 'mockPopupL', 'width=1100, height=845, scrollbars=yes, resizable=yes');
                win.focus();
            });

            //정답제출
            $('#btn_score').on('click', function() {
                var _url = '{{ site_url('/mocktest/statisticsPrivate/answerSaveAjax') }}';
                if($(this).data('act-type') == 'N') {
                    alert('임시저장 데이터가 없습니다.');
                    return;
                }

                if(!confirm('채점하시겟습니까?')) return;
                ajaxLoadingSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert('채점이 완료 되었습니다. 조정점수반영을 해야 정상 산출됩니다.');
                        location.reload();
                    }
                }, showValidateError, null, 'alert', $regi_form);
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
        }

    </script>
@stop