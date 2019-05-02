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
        <div class="willbes-Layer-PassBox NGR">
            <div class="markingTilte">
                <span>점수 직접 입력</span>
                <div class="btns3">
                    <a href="javascript:window.close()">닫기</a>
                </div>
            </div>
            <div class="omrWarp">
                <div class="qMarking">
                    <div class="selfMarking">
                        <table class="boardTypeB">
                            <col width="40%" />
                            <col width="" />
                            <tr>
                                <th scope="col">과목</th>
                                <th scope="col">점수입력</th>
                            </tr>
                            @foreach($subject_list as $key => $val)
                            <tr>
                                <th>`</th>
                                <td>
                                    <input type="text" name="Score[]" maxlength="3" oninput="maxLengthCheck(this)" @if(empty($subject_grade)===false) value="{{ $subject_grade[$val['PpIdx']] }}" @endif > 점
                                    <input type="hidden" name="PpIdx[]" value="{{ $val['PpIdx'] }}" />
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <p>* 점수를 직접 입력 하실 경우, 정오표는 별도로 제공되지 않습니다.</p>
                    </div>
                </div>
            </div><!--omrWarp//-->

            <div class="btns">
                <a href="javascript:lastSave();">입력완료</a> <a href="javascript:examDeleteAjax()" class="btn2">입력취소</a>
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
                var _url = '{{ front_url('/predict/examSendAjax3') }}';
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