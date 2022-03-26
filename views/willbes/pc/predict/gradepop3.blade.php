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
                                <th>{{$val['CcdName']}}</th>
                                <td>
                                    <input type="number" name="Score[]" maxlength="4" data-max-num="{{$val['TotalScore']}}" oninput="maxLengthCheck(this)" @if(empty($subject_grade)===false) value="{{ $subject_grade[$val['PpIdx']] }}" @endif > 점
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
            if($(object).prop('type') == 'number') {
                /*object.value = object.value.replace(/[^0-9.]/g, "");*/
                if($(object).data('max-num') != undefined) {
                    if( Number(object.value) > Number($(object).data('max-num')) ) {
                        object.value = object.value.slice(0, -1);
                    }
                }
            }

            if (object.value.length > object.maxLength){
                object.value = object.value.slice(0, object.maxLength);
            }
        }

        function lastSave(){
            var vali_msg = '';
            var check = true;

            $('input[name="Score[]"]').each(function(){
                var scr_val = $(this).val();

                if($.trim(scr_val) == ''){
                    vali_msg = '점수를 입력하지 않은 과목이 있습니다';
                    check = false;
                }else if(scr_val < 0 || scr_val > 100){
                    vali_msg = '점수는 0~100점 사이 이어야 합니다';
                    check = false;
                } else {
                    if ($(this).data("max-num") == 100) {
                        if(scr_val%5 != 0) {
                            vali_msg = '정확한 원점수를 입력해주세요'; //한문제당 5점
                            check = false;
                        }
                    } else {
                        if(scr_val%5 == 0 || scr_val%5 == 0.5) {
                        } else {
                            vali_msg = '정확한 원점수를 입력해주세요'; //한문제당 0.5점
                            check = false;
                        }
                    }
                }
            });
            if(check == false){ alert(vali_msg); return false; }

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
            if (confirm('채점취소시 입력된 답안은 저장되지 않습니다. \n채점취소 하시겠습니까?')) {
                window.close();
            }
        }
    </script>

@stop