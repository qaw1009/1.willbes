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
        <input type="hidden" name="PredictIdx" value="{{ element('PredictIdx', $arr_input) }}">
        <input type="hidden" name="type" value="{{ element('type', $arr_input) }}">
        <div class="willbes-Layer-PassBox NGR">
            <div class="markingTilte">
                <span>{{ ($type == 'answer') ? '답안 등록' : '빠른 채점' }}</span>
                <div class="btns3">
                    <a href="javascript:window.close()">닫기</a>
                </div>
            </div>
            <div class="omrWarp">
                @php $_id=1; @endphp
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
                                <input type="number" class="txt-answer" id="target_{{$_id}}" data-input-id="{{$_id}}" name="Answer[]" maxlength="5" oninput="maxLengthCheck(this)" value="{{ $newQuestion['answerset'][$val['PpIdx']][$key2] }}">
                            </td>
                                @php $_id++; @endphp
                            @endforeach
                        </tr>
                    </table>
                </div>
                <input type="hidden" name="PpIdx[]" value="{{ $val['PpIdx'] }}" />
                @endforeach
            </div><!--omrWarp//-->

            <div class="btns">
                <a href="javascript:lastSave();">완료</a> <a href="javascript:examDeleteAjax()" class="btn2">취소</a>
            </div>
        </div>
    </form>
    <!--willbes-Layer-PassBox//-->

    <script>
        var $all_regi_form = $('#all_regi_form');
        $(document).ready(function(){
            $(".txt-answer").keyup(function() {
                if (this.value.length == this.maxLength) {
                    var id = $(this).data("input-id") + 1;
                    $('#target_'+id).focus();
                }
            });
        });

        function lastSave(){
            var vali_msg = '';
            var chk = /^[1-4]+$/i;
            $('input[name="Answer[]"]').each(function(){
                var val = $(this).val();
                if (val == '') {
                    vali_msg = '답안을 모두 입력해 주세요.';
                    return false;
                }

                if (val.length < 5) {
                    vali_msg = '답안을 모두 입력해주세요.';
                    return false;
                }

                if (!chk.test(val)) {
                    vali_msg = '허용되지 않은 답안입니다.';
                    return false;
                }
            });
            if(vali_msg){ alert(vali_msg); return; }

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
            /*if (confirm('채점취소시 기존의 성적모든데이터는 삭제됩니다. \n 채점취소 하시겠습니까?')) {
                var _url = '{{ front_url('/predict/examDeleteAjax') }}';
                ajaxSubmit($all_regi_form, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        opener.location.reload();
                        window.close();
                    }
                }, showValidateError, null, false, 'alert');
            }*/
            if (confirm('취소 시 입력된 답안은 저장되지 않습니다. \n취소 하시겠습니까?')) {
                window.close();
            }
        }

        function maxLengthCheck(object) {
            if($(object).prop('type') == 'number') {
                object.value = object.value.replace(/[^0-9.]/g, "");
            }

            if (object.value.length > object.maxLength) {
                object.value = object.value.slice(0, object.maxLength);
            }
        }
    </script>

@stop