@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">   
    .willbes-Layer-PassBox span {vertical-align:auto}
    .eventPop {width:640px; margin:0 auto; font-size:12px; color:#333; line-height:1.5; padding-bottom:50px}
    .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;} 

    .eventPopS1 {margin-top:1em}
    .eventPopS1 ul > li {border-bottom:1px solid #e4e4e4; padding:15px 0}
    .eventPopS1 ul > li.w50 {display:inline; float:left; width:50%}
    .eventPopS1 strong {display:block; margin-bottom:10px; font-size:14px}
    .eventPopS1 p {margin-bottom:10px}
    .eventPopS1 p a {float:right; text-decoration:underline}
    .eventPopS1 ul > li div {padding:20px; border:1px solid #e4e4e4; margin-bottom:10px}
    .eventPopS1 ul > li div strong {font-size:12px}
    .eventPopS1 li ul {margin-bottom:10px}
    .eventPopS1 li li {display:inline-block; border:0; margin-right:10px; padding:0}

    .subject-p li {display:inline; margin-right:20px; margin-bottom:10px}
    .subject-p li span {width:80px; text-align:center; display:inline-block; background:#f0f0f0; height:26px; line-height:26px;}
    .subject-p li input {margin-right:5px; width:80px}

    .viewTb {width:100%;}
	.viewTb th,
	.viewTb td{padding:8px; border-bottom:1px solid #cdcdcd; border-right:1px solid #cdcdcd}
	.viewTb thead th,
	.viewTb tbody th {text-align:center; font-weight:bold; border-right:1px solid #cdcdcd; background:#f0f0f0}
    .viewTb thead th {border-top:1px solid #cdcdcd}
    .viewTb th:last-child,
    .viewTb td:last-child {border-right:0}
	.viewTb tr.txtC td {text-align:center}
	.viewTb input[type=text],
	.viewTb input[type=password],
	.viewTb input[type=number] {width:70px}
	.viewTb td .route li {display:inline; float:left; width:50%}
    .viewTb td .route:after {content:""; display:block; clear:both}

    .eventPopS3 {margin-top:1em}
    .eventPopS3 p {font-weight:bold; margin-bottom:10px}
    .eventPopS3 ul,
    .eventPopS3 li {padding:0; margin:0}
    .eventPopS3 ul {border:1px solid #adadad; padding:10px; overflow-y:scroll; height:100px}
    .eventPopS3 li {margin-left:15px; margin-bottom:5px}
    .eventPopS3 div {margin-top:10px;}
    .eventPopS3 input {vertical-align:middle}

    .btnsSt3 {text-align:center; margin-top:20px}
    .btnsSt3 button {display:inline-block; padding:8px 16px; background:#333; color:#fff !important; font-weight:bold; border:1px solid #333; width:70px; height:37px;}
    .btnsSt3 button:hover {background:#fff; color:#333 !important}

    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}    
    select,
    input[type=text] {padding:2px; margin-right:10px; height:26px; border:1px solid #e4e4e4}
    input[type=file]:focus,
    input[type=text]:focus {border:1px solid #1087ef}
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
}

</style>
<div class="willbes-Layer-PassBox NGR">
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! method_field($arr_base['METHOD']) !!}
        <input type="hidden" name="predict" value="{{ $arr_base['predict_idx'] }}">
        <input type="hidden" name="cert" value="{{ $arr_base['cert_idx'] }}">
        <div class="eventPop">
            <h3>
                <span class="tx-bright-blue">나의 성적 입력</span>
            </h3>
            <div class="eventPopS1">
                <ul>
                    <li>
                        <strong>* 직렬(직류구분)</strong>
                        <select name="mock_part" id="mock_part" style="width:120px">
                            @foreach($arr_base['arr_mock_part'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select id="take_area" name="take_area">
                            <option value="">지역구분</option>
                            @foreach($arr_base['arr_area'] as $row)
                                <option value="{{ $row['Ccd'] }}">{{ $row['CcdName'] }}</option>
                            @endforeach
                        </select>
                        ※ 응시직렬은 최초 선택/저장 후 수정 불가
                    </li>
                    <li>
                        <strong>* 필기점수 입력</strong>
                        <p class="tx-blue">
                            반드시 성적표에 기재된 조정점수를 입력해 주세요.
                            <a href="http://gosi.police.go.kr"  target="_blank">필기시험 성적 확인하기 ▶</a>
                        </p>

                        @foreach($arr_base['arr_subject_ccd']['P'] as $key => $rows)
                            <div class="subject-p" id="subject_p_{{ $key }}">
                                <strong>공통과목</strong>
                                <ul>                                  
                                    <li>
                                    @foreach($rows as $value => $name)
                                        <input type="hidden" name="subject_p_code[{{ $key }}][]" value="{{ $value }}">  
                                        <span>{{ $name }}</span> <input type="text" maxlength="3" name="subject_p[{{ $value }}]" id="subject_p_{{ $value }}"> 점 @if($loop->last === false) / @endif                                        
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                        @endforeach

                        @foreach($arr_base['arr_subject_ccd']['S'] as $key => $rows)
                            <div class="subject-s" id="subject_s_{{ $key }}">
                                <strong>{{($key == 300) ? '필수' : '선택'}}과목</strong>
                                <table class="viewTb">
                                    <col span="2" />
                                    <thead>
                                        <tr class="bdRno">
                                            <th>
                                                <select name="subject_s[{{ $key }}][]" style="width:120px;">
                                                    <option value="">{{($key == 300) ? '필수' : '선택'}}과목1</option>
                                                    @foreach($rows as $value => $name)
                                                        <option value="{{ $value }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th>
                                                <select name="subject_s[{{ $key }}][]" style="width:120px;">
                                                    <option value="">{{($key == 300) ? '필수' : '선택'}}과목2</option>
                                                    @foreach($rows as $value => $name)
                                                        <option value="{{ $value }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th>
                                                <select name="subject_s[{{ $key }}][]"  style="width:120px;">
                                                    <option value="">{{($key == 300) ? '필수' : '선택'}}과목3</option>
                                                    @foreach($rows as $value => $name)
                                                        <option value="{{ $value }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="txtC">
                                            <td><input type="text" maxlength="5" name="point[{{ $key }}][]"> 점</td>
                                            <td><input type="text" maxlength="5" name="point[{{ $key }}][]"> 점</td>
                                            <td><input type="text" maxlength="5" name="point[{{ $key }}][]"> 점</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endforeach

                        <div>
                            <strong>체력점수 / 가산점 입력</strong>
                            <span>체력점수</span> <input type="text" maxlength="3" name="strength_point" id="strength_point"> 점 /
                            <span>가산점</span> <input type="text" maxlength="3" name="add_point" id="add_point">점
                        </div>
                    </li>
                    <li>
                        * 본 서비스는 필기시험 점수, 체력 점수, 가산점을 합산한 성적으로 면접점수는 제외되어 실제 결과와 차이가 있을 수 있습니다.<br>
                        * 본 서비스의 점수 입력 마감 기한은 <span class="tx-red">2019년 7월 16일 (화)</span> 까지 입니다.
                    </li>
                </ul>
            </div>

            <div class="btnsSt3">
                <button type="submit">확인</button>
                <button type="button" onclick="javascript:window.close();">취소</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    var $regi_form = $('#regi_form');
    var regexp = /^[0-9]*$/;
    var mock_part = '';

    $(document).ready(function() {
        mock_part = $regi_form.find('select[name="mock_part"]').val();
        $('.subject-p, .subject-s').hide();
        $('#subject_p_'+mock_part+', #subject_s_'+mock_part).show();

        $regi_form.on('change', 'select[name="mock_part"]', function() {
            $('.subject-p, .subject-s').hide();
            $('#subject_p_'+$(this).val()+', #subject_s_'+$(this).val()).show();
        });

        $regi_form.submit(function () {
            addValidate();

            /*var _url = '{{ front_url('/predict/storeFinalPoint') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    window.close();
                }
            }, showValidateError, addValidate, false, 'alert');*/
        });

        function addValidate()
        {
            var ret = false;
            mock_part = $regi_form.find('select[name="mock_part"]').val();
            var add_point = $regi_form.find('input[name="add_point"]').val();

            $regi_form.find('input[name="subject_p_code['+mock_part+'][]"]').each(function (index) {
                var key = $(this).val();
                var subject_p_val = $regi_form.find('input[name="subject_p['+key+']"]').val();
                if (!regexp.test(subject_p_val)) {
                    alert('공통과목은 숫자만 입력 가능합니다.');
                    ret = false;
                    return false;
                } else {
                    ret = true;
                }
            });

            if (add_point > 5) {
                alert('가산점은 0~5점 사이로 입력해 주세요.');
                ret = false;
            }

            var temp = [];
            $regi_form.find('select[name="subject_s['+mock_part+'][]"]').each(function (index) {
                if ($(this).val() != '') {
                    temp[index] = $(this).val();
                }
            });

            //임시 배열값 과 옵션값이 같으면 임시 변수값 증가
            $(temp).each(function(i) {
                var x = 0;
                $regi_form.find('select[name="subject_s['+mock_part+'][]"]').each(function() {
                    if( temp[i] == $(this).val() ) {
                        x++;
                    }
                });
                // 임시 변수 값 중복체크
                if(x > 1) {
                    alert('동일한 선택과목이 있습니다.');
                    ret = false;
                    return false;
                }
            });

            return ret;
        }
    });
</script>
<!--willbes-Layer-PassBox//-->
@stop