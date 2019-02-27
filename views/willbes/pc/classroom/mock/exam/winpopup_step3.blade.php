@extends('willbes.pc.layouts.master_popup')
@section('content')
    <!-- Popup -->
    <div class="Popup willbes-Layer-PassBox">
        <div class="popupContainer">
            <div class="lecMoreWrap pt10">
                <div class="PASSZONE-List widthAutoFull">
                    <div class="passzoneTitInfo tx-light-blue tx-center NG">{{ $productInfo['ProdName'] }}</div>

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
                                    @foreach($sList as $key => $row)
                                        <th>선택과목{{ $key + 1 }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($pList2 as $key => $row)
                                        <td class="@if($qtList[$key]['CNT'] == $qtList[$key]['TCNT']) round-red @elseif($qtList[$key]['CNT'] > 0) round-blue @endif">{{ $row }}</td>
                                    @endforeach
                                    @foreach($sList2 as $key => $row)
                                        <td class="@if($qtList[$key]['CNT'] == $qtList[$key]['TCNT']) round-red @elseif($qtList[$key]['CNT'] > 0) round-blue @endif">{{ $row }}</td>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        <input type="hidden" name="MrIdx"    value="{{ $mridx }}">
                        <input type="hidden" name="ProdCode" value="{{ element('ProdCode', $arr_input) }}">
                        <input type="hidden" name="LogIdx"   value="{{ element('LogIdx', $arr_input) }}" />
                    </form>

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
                                    <th>남은시간</th>
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
                        <input type="hidden" name="prodcode" value="{{ element('ProdCode', $arr_input) }}" />
                        <input type="hidden" name="logidx" value="{{ $logidx }}" />
                        <input type="hidden" name="mridx" value="{{ $mridx }}" />
                    </form>
                    <div class="passzonefinInfo tx-gray tx-center mt50">
                        답안제출이 모두 완료되었습니다.<br/>
                        성적이 집계된 후 성적표를 확인할 수 있습니다.<br/>
                        <strong>시험을 끝내시면 재응시할 수 없습니다.</strong><br/>
                        <div>
                            * 성적표는 시험응시일 마감 이후 3일 ~ 5일 안에 제공<br/>
                            * 성적확인 메뉴 : 내강의실 > 모의고사관리 > 성적결과
                        </div>
                    </div>
                    <div class="passzonebtn tx-center mt30 none">
                    <span>
                        <button type="submit" onclick="examEndAjax()" class="btnAuto130 h36 mem-Btn bg-black bd-dark-gray strong">
                            <span class="strong">시험종료</span>
                        </button>
                    </span>
                        <span>
                        <button type="submit" onclick="goStep2()" class="btnAuto130 h36 mem-Btn bg-blue bd-dark-blue strong">
                            <span class="strong">답안다시확인</span>
                        </button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- //popupContainer -->
    </div>
    <!-- End Popup -->
    <script>
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            var sec = {{ $RemainSec }};
            var hour = parseInt(sec / 3600);
            var min = parseInt((sec % 3600) / 60);
            var secc = sec % 60;

            if (hour < 10) hour = '0' + hour;
            if (min < 10) min = '0' + min;
            if (secc < 10) secc = '0' + secc;

            $('#time').html(hour + ":" + min + ":" + secc);

            examSendAjax();

        });

        function examSendAjax(){
            var _url = '{{ front_url('/classroom/MockExam/examSendAjax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                }
            }, showValidateError, null, false, 'alert');
        }

        $(window).on('beforeunload ',function() {
            examEndAjax();
        });

        function examEndAjax(){
            var _url = '{{ front_url('/classroom/MockExam/examEndAjax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert('시험이 종료되었습니다.');
                    opener.location.reload();
                    window.close();
                }
            }, showValidateError, null, false, 'alert');
        }
        
        function goStep2(){
            document.url_form.submit();
        }

    </script>
@stop
