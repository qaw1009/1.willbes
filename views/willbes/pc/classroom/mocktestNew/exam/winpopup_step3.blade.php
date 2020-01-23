@extends('willbes.pc.layouts.master_popup')

@section('content')
    <!-- Popup -->
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="mr_idx" value="{{ element('mr_idx',$arr_input) }}"/>
        <input type="hidden" name="prod_code" value="{{ element('prod_code',$arr_input) }}"/>
        <input type="hidden" name="log_idx" value="{{ element('log_idx', $arr_input) }}"/>
    </form>

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
                                    @for($i=1; $i<=$p_cnt+$s_cnt; $i++)
                                        <col style="width: 20%;"/>
                                    @endfor
                                </colgroup>
                                <thead>
                                <tr>
                                    <th class="Top" colspan="{{$p_cnt}}">필수과목</th>
                                    @if(empty($s_subject) === false)
                                        @foreach($s_subject as $key => $row)
                                            <th>선택과목{{$loop->index}}</th>
                                        @endforeach
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($p_subject as $key => $row)
                                        <td class="{{ ($qtList[$key]['CNT'] == $qtList[$key]['TCNT'] ? 'round-red' : 'round-blue') }}">{{ $row }}</td>
                                    @endforeach
                                    @foreach($s_subject as $key => $row)
                                        <td class="{{ ($qtList[$key]['CNT'] == $qtList[$key]['TCNT'] ? 'round-red' : 'round-blue') }}">{{ $row }}</td>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section pt40">
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
                                    <td class="Top">{{ (empty($productInfo['TakeStartDatm']) === false) ? $productInfo['TakeStartDatm'].'~'.$productInfo['TakeEndDatm'] : '상시' }}</td>
                                    <td>
                                        @if($productInfo['TakeTime']  > 60)
                                            {{ floor($productInfo['TakeTime'] / 60) }}시간 {{ $productInfo['TakeTime'] % 60 }}분 ({{ $productInfo['TakeTime'] }}분)
                                        @else
                                            {{ $productInfo['TakeTime'] }}분 ({{ $productInfo['TakeTime'] }}분)
                                        @endif
                                    </td>
                                    <td>{{ $end_time }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                        <button type="button" onclick="endExam();" class="btnAuto130 h36 mem-Btn bg-black bd-dark-gray strong">
                            <span class="strong">시험종료</span>
                        </button>
                    </span>
                        <span>
                        <button type="button" onclick="backExam();" class="btnAuto130 h36 mem-Btn bg-blue bd-dark-blue strong">
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

    <script type="text/javascript">
        var $regi_form = $("#regi_form");
        //시험종료
        function endExam() {
            if (confirm('시험 종료 후 재응시는 불가능합니다. \n종료하시겠습니까?')) {
                var _url = '{{ front_url('/classroom/mocktest/exam/examEndAjax') }}';
                ajaxSubmit($regi_form, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert('시험이 종료되었습니다.');
                        opener.location.reload();
                        window.close();
                    }
                }, showValidateError, null, false, 'alert');
            }
        }

        //답안다시확인
        function backExam() {
            if (confirm('답안을 다시 확인하시겠습니까?')) {
                document.regi_form.action = '{{ front_url('/classroom/mocktest/exam/winpopupstep2') }}';
                document.regi_form.submit();
            }
        }
    </script>
@stop