@extends('willbes.pc.layouts.master_popup')
@section('content')
    <input type=hidden name="oCheckWin">
    <!-- Popup -->
    <div class="Popup willbes-Layer-PassBox">
        <div class="popupContainer">
            <div class="lecMoreWrap pt10">
                <div class="PASSZONE-List widthAutoFull">
                    <div class="passzoneTitInfo tx-light-blue tx-center NG tx22">{{ $productInfo['ProdName'] }}</div>
                    <ul class="passzoneSubInfo tx-gray NGR">
                        <li class="tit strong GM">· 응시 전 필독사항</li>
                        <li class="txt">- 온라인 응시기간 및 지정된 시간에만 응시가 가능하오니 <span class="tx-red">시험시간을 엄수</span>해 주세요.</li>
                        <li class="txt">- '시작하기'클릭 직후부터 시험이 시작되며 시험시간이 카운트다운 됩니다.</li>
                        <li class="txt">- 출제과목 순서대로 응시하거나, 응시자가 원하는 과목 순서대로 응시할 수 있습니다.</li>
                        <li class="txt">- 고민되는 문제는 '고민중'으로 체크 후 차후에 다시 정답을 체크해 주세요.</li>
                        <li class="txt">- 응시 중간에 우측 상단의 'X'를 클릭하거나, <span class="tx-red">임의로 시험을 중단 및 임시저장 후 제출 시, 시험결과를 확인할 수 없습니다.</span>(무효처리)</li>
                        <li class="txt">- <span class="tx-red">응시후 답안지는 모두 체크하셔야 답안 제출이 가능</span>합니다.</li>
                    </ul>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mb15 tx-gray">· 응시과목</div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable usertestTable under-gray bdt-gray tx-gray GM">
                                <colgroup>
                                    @for($i=1; $i<=$pCnt+$sCnt; $i++)
                                        <col style="width: 20%;"/>
                                    @endfor
                                </colgroup>
                                <thead>
                                <tr>
                                    <th class="Top" colspan="{{ $pCnt }}">필수과목</th>
                                    @if($sList)
                                        @foreach($sList as $key => $row)
                                            <th>선택과목{{ $key + 1 }}</th>
                                        @endforeach
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($pList2 as $key => $row)
                                        <td class="@if($qtList[$key]['CNT'] == $qtList[$key]['TCNT']) round-red @elseif($qtList[$key]['CNT'] > 0) round-blue @endif">{{ $row }}</td>
                                    @endforeach
                                    @if($sList)
                                        @foreach($sList2 as $key => $row)
                                            <td class="@if($qtList[$key]['CNT'] == $qtList[$key]['TCNT']) round-red @elseif($qtList[$key]['CNT'] > 0) round-blue @endif">{{ $row }}</td>
                                        @endforeach
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section pt25">
                        <div class="Search-Result strong mb15 tx-gray">· 응시기간 및 시험시간</div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable usertestTable under-gray bdt-gray tx-gray GM">
                                <colgroup>
                                    <col style="width: 40%;"/>
                                    <col style="width: 30%;"/>
                                    <col style="width: 30%;"/>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th class="Top">응시기간</th>
                                    <th>시험시간</th>
                                    <th>잔여시간</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="Top">@if(empty($productInfo['TakeStartDatm']) === false) {{ $productInfo['TakeStartDatm'] }} ~ {{ $productInfo['TakeEndDatm'] }} @else 상시 @endif</td>
                                    <td>@if( $productInfo['TakeTime']  > 60)
                                            {{ floor($productInfo['TakeTime'] / 60) }}시간 {{ $productInfo['TakeTime'] % 60 }}분 ({{ $productInfo['TakeTime'] }}분)
                                        @else
                                            {{ $productInfo['TakeTime'] }}분 ({{ $productInfo['TakeTime'] }}분)
                                        @endif

                                    </td>
                                    <td><span id="time"></span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form class="form-horizontal" id="url_form" name="url_form" method="POST" action="/classroom/MockExam/winpopupstep2" onsubmit="return false;">
                        {!! csrf_field() !!}
                        <input type="hidden" id='prodcode' name="prodcode" value="{{ element('prodcode', $arr_input) }}" />
                        <input type="hidden" name="mridx" value="{{ element('mridx', $arr_input) }}" />
                        <input type="hidden" id='logidx' name="logidx"  />
                    </form>
                    <div class="PASSZONE-Lec-Section pt25">
                        <div class="Search-Result strong mb15 tx-gray">· 응시하기 참고</div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable usertestTable under-gray bdt-gray tx-gray GM">
                                <colgroup>
                                    <col style="width: 25%;"/>
                                    <col style="width: 25%;"/>
                                    <col style="width: 25%;"/>
                                    <col style="width: 25%;"/>
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="Top">
                                        진행중인 과목<br/>
                                        <span class="tx-light-blue">- 파란색</span>으로 표시
                                        <div class="s-line tx-light-blue">국어</div>
                                    </td>
                                    <td>
                                        마킹완료 과목<br/>
                                        - 빨간색 원 표시
                                        <div class="s-line round-red">국어</div>
                                    </td>
                                    <td>
                                        고민 중 문제<br/>
                                        - 문제번호<img src="/public/img/willbes/mypage/icon_question_orange.png" style="margin-top: -5px">표시
                                        <div class="s-line"><img src="/public/img/willbes/mypage/icon_question_orange.png"> 3</div>
                                    </td>
                                    <td>
                                        임시저장 (마킹미완료)<br/>
                                        - 파란색 원 표시
                                        <div class="s-line round-blue">국어</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="passzonebtn tx-center mt20 none">
                    <span>
                        <button type="button" onclick="window.close();" class="btnAuto130 h36 mem-Btn bg-black bd-dark-gray strong">
                            <span class="strong">닫기</span>
                        </button>
                    </span>
                    <span>
                        <button type="button" onclick="goStep2()" class="btnAuto130 h36 mem-Btn bg-blue bd-dark-blue strong">
                            <span class="strong">시험시작하기</span>
                        </button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- //popupContainer -->
    </div>
    <!-- End Popup -->
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id='prodcode' name="prodcode" value="{{ element('prodcode', $arr_input) }}" />
        <input type="hidden" id='mridx' name="mridx" value="{{ element('mridx', $arr_input) }}"/>

    </form>
    <script>

        $(document).ready(function() {
            var sec = {{ $RemainSec }};
            var hour = parseInt(sec / 3600);
            var min = parseInt((sec % 3600) / 60);
            var secc = sec % 60;

            if (hour < 10) hour = '0' + hour;
            if (min < 10) min = '0' + min;
            if (secc < 10) secc = '0' + secc;

            $('#time').html(hour + ":" + min + ":" + secc);
        });

        //
        function goStep2(){
            url = "{{ site_url("/classroom/MockExam/startAjax") }}";
            data = $('#regi_form').serialize();

            sendAjax(url,
                data,
            function(d){
                $('#logidx').val(d.data);
                document.url_form.submit();
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, true, 'POST', 'json');

        }

    </script>
@stop
