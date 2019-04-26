@extends('willbes.pc.layouts.master_popup')
@section('content')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
    <!-- Container -->
    <style type="text/css">
        .willbes-Layer-PassBox {height:auto; padding:0}
    </style>
    <form id="all_regi_form" name="all_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" name="PrIdx"    value="{{ $pridx }}">
        <input type="hidden" name="ProdCode" value="{{ element('prodcode', $arr_input) }}">
        <div class="willbes-Layer-PassBox NGR">
            <div class="markingTilte">
                <span>빠른 채점</span>
                <div class="btns3">
                    <a href="javascript:window.close()">닫기</a>
                </div>
            </div>
            <div class="omrWarp">
                @foreach($subject_list as $key => $val)
                <div class="qMarking">
                    <h3>{{ $val['CcdName'] }}<span> | 원점수: {{ $val['TotalScore'] }}</span></h3>
                    <table width="0" cellspacing="0" cellpadding="0" class="boardTypeB">
                        <col width="20%" />
                        @foreach($newQuestion['numset'][$val['PpIdx']] as $key2 => $val2)
                        <col width="20%" />
                        @endforeach
                        <tr>
                            <th scope="col">번호</th>
                            @foreach($newQuestion['numset'][$val['PpIdx']] as $key2 => $val2)
                            <th scope="col">{{ $val2 }}번</th>
                            @endforeach
                        </tr>
                        <tr>
                            <td>답안입력 </td>
                            @foreach($newQuestion['numset'][$val['PpIdx']] as $key2 => $val2)
                            <td>
                                <input type="text" name="Answer[]" maxlength="5" oninput="maxLengthCheck(this)" value="{{ $newQuestion['answerset'][$val['PpIdx']][$key2] }}">
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
                <input type="hidden" name="PpIdx[]" value="{{ $val['PpIdx'] }}" />
                @endforeach
            </div><!--omrWarp//-->

            <div class="btns">
                <a href="javascript:lastSave();">채점완료</a> <a href="javascript:examDeleteAjax()" class="btn2">채점취소</a>
            </div>
        </div>
    </form>
    <!--willbes-Layer-PassBox//-->

    <script>
        var $all_regi_form = $('#all_regi_form');

        function maxLengthCheck(object){
            if (object.value.length > object.maxLength){
                object.value = object.value.slice(0, object.maxLength);
            }
        }

        function lastSave(){
            if (confirm('정답을 제출하시겠습니까?')) {
                var _url = '{{ front_url('/predict/examSendAjax2') }}';
                ajaxSubmit($all_regi_form, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        opener.location.reload();
                        window.close();
                    }
                }, showValidateError, null, false, 'alert');
            }
        }

        function examDeleteAjax() {
            if (confirm('채점취소시 기존의 성적모든데이터는 삭제됩니다. \n 채점취소 하시겠습니까?')) {
                var _url = '{{ front_url('/predict/examDeleteAjax') }}';
                ajaxSubmit($all_regi_form, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        opener.location.reload();
                        window.close();
                    }
                }, showValidateError, null, false, 'alert');
            }
        }
    </script>

@stop