@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .willbes-Layer-PassBox span {vertical-align:auto}
        .eventPop {width:640px; margin:0 auto; font-size:12px; color:#333; line-height:1.5; padding-bottom:50px}
        .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;}
        .eventPop h3 span.title {display:block; color:#fff; background:#1087ef; border-radius:30px; padding:10px 20px; width:60%; margin:0 auto 10px}

        .eventPopS1 {margin-top:1em}
        .eventPopS1 ul > li {border-bottom:1px solid #e4e4e4; padding:15px 0; line-height:1.5}
        .eventPopS1 ul > li:last-child {border:0}
        .eventPopS1 ul > li.w50 {display:inline; float:left; width:50%}
        .eventPopS1 strong {display:block; margin-bottom:10px; font-size:14px}
        .eventPopS1 p {margin-bottom:10px}
        .eventPopS1 p a {float:right; text-decoration:underline}

        .eventPopS1 ul > li div strong {font-size:12px}
        .eventPopS1 li ul {margin-bottom:10px}
        .eventPopS1 li li {display:inline-block; border:0; margin-right:10px; padding:0}
        .eventPopS1 th,
        .eventPopS1 td {text-align:center; padding:5px}
        .eventPopS1 th {background:#f0f0f0;}
        .eventPopS1 .info {border:1px solid #e4e4e4; padding:10px; height:150px; overflow-y:scroll}

        .subject-p {}
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
        input[type=checkbox] {width:16px; height:16px; margin-right:5px}
        select,
        input[type=text] {padding:2px; margin-right:10px; height:26px; border:1px solid #e4e4e4}
        input[type=file]:focus,
        input[type=text]:focus {border:1px solid #1087ef}
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
        label {margin-right:10px}
        }

    </style>
    <div class="willbes-Layer-PassBox NGR">
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
        {{--<form id="regi_form" name="regi_form" method="POST" action="{{ front_url('/predict/storeFinalPoint2') }}" novalidate>--}}
            {!! csrf_field() !!}
            {!! method_field($arr_base['METHOD']) !!}
            <input type="hidden" name="predict" value="{{ $arr_base['predict_idx'] }}">
            <input type="hidden" name="flag_1" id="flag_1" value="1">
            <input type="hidden" name="flag_2" id="flag_2" value="1">
            <input type="hidden" name="flag_value_1" id="flag_value_1">
            <input type="hidden" name="flag_value_2" id="flag_value_2">
            <input type="hidden" name="flag_text_1" id="flag_text_1">
            <input type="hidden" name="flag_text_2" id="flag_text_2">
            <div class="eventPop">
                <h3>
                    <span class="title">윌비스 합격기원 2차 EVENT</span> <span class="tx-bright-blue">내 예상 점수와 체감 난이도 등록하기</span>
                </h3>
                <div class="eventPopS1">
                    <ul>
                        <li>
                            이름 <span class="tx-red">*</span> <input type="text" value="{{sess_data('mem_name')}}" title="성명" readonly="readonly">
                            휴대폰번호 <span class="tx-red">*</span> <input type="text" value="{{sess_data('mem_phone')}}" title="연락처" readonly="readonly">
                            <span class="tx-red">※ 응시직렬은 최초 선택/저장 후 수정 불가</span>
                        </li>
                        <li>
                            <strong>1. 공고 유형 <span class="tx-red">*</span> </strong>
                            <input type="radio" name="announcement_type" id="announcement_type_1" value="서울시"><label for="announcement_type_1">서울시</label>
                            <input type="radio" name="announcement_type" id="announcement_type_2" value="지방직"><label for="announcement_type_2">지방직</label>
                        </li>
                        <li>
                            <strong>2. 응시 직렬 <span class="tx-red">*</span> </strong>
                            @foreach($arr_base['arr_mock_part'] as $key => $val)
                                <input type="radio" name="mock_part" id="mock_part_{{ $key }}" value="{{ $key }}"><label for="mock_part_{{ $key }}">{{ $val }}</label>
                            @endforeach
                        </li>
                        <li>
                            <strong>3. 예상 점수 <span class="tx-red">*</span> </strong>
                            <div class="subject-p">
                                <ul>
                                    @foreach($arr_base['arr_subject_ccd']['P'] as $key => $val)
                                        <li>
                                            <input type="hidden" name="subject_p[]" value="{{ $key }}">
                                            <span>{{ $val }}</span><input type="text" maxlength="3" name="point_p[]">점
                                        </li>
                                    @endforeach
                                    <li>
                                        <select name="subject_s[]" id="s_subject_1" onchange="javascript:fn_sel_subject_tmp(1, this.options[this.selectedIndex].value,this.options[this.selectedIndex].text);" style="width:120px;">
                                            <option value="">선택과목</option>
                                            @foreach($arr_base['arr_subject_ccd']['S'] as $key => $val)
                                                <option value="{{ $key }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="point_s[]">점
                                    </li>
                                    <li>
                                        <select name="subject_s[]" id="s_subject_2" onchange="javascript:fn_sel_subject_tmp(2, this.options[this.selectedIndex].value,this.options[this.selectedIndex].text);" style="width:120px;">
                                            <option value="">선택과목</option>
                                            @foreach($arr_base['arr_subject_ccd']['S'] as $key => $val)
                                                <option value="{{ $key }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="point_s[]">점
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <strong>4. 체감 난이도<span class="tx-red">*</span> </strong>
                            <table cellspacing="0" cellpadding="0">
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width=""/>
                                <col width="20%"/>
                                <thead>
                                <tr>
                                    <th>과목</th>
                                    <th colspan="3">난이도</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($arr_base['arr_subject_ccd']['P'] as $key => $val)
                                        <tr>
                                            <td>{{ $val }}</td>
                                            <td>매우 어려움</td>
                                            <td>
                                                <input type="radio" name="level_p[{{ $key }}][]" id="level-p-5" value="5"><label for="level-p-5">5</label>
                                                <input type="radio" name="level_p[{{ $key }}][]" id="level-p-4" value="4"><label for="level-p-4">4</label>
                                                <input type="radio" name="level_p[{{ $key }}][]" id="level-p-3" value="3"><label for="level-p-3">3</label>
                                                <input type="radio" name="level_p[{{ $key }}][]" id="level-p-2" value="2"><label for="level-p-2">2</label>
                                                <input type="radio" name="level_p[{{ $key }}][]" id="level-p-1" value="1"><label for="level-p-1">1</label>
                                            </td>
                                            <td>매우 쉬움</td>
                                        </tr>
                                    @endforeach

                                    @foreach($arr_base['arr_subject_ccd']['S'] as $key => $val)
                                        <tr class="subject_s_radio_1" id="subject-s-1-{{ $key }}">
                                            <td>{{ $val }}</td>
                                            <td>매우 어려움</td>
                                            <td>
                                                <input type="radio" name="level_s[{{ $key }}][]" id="level-s-5" value="5"><label for="level-s-5">5</label>
                                                <input type="radio" name="level_s[{{ $key }}][]" id="level-s-4" value="4"><label for="level-s-4">4</label>
                                                <input type="radio" name="level_s[{{ $key }}][]" id="level-s-3" value="3"><label for="level-s-3">3</label>
                                                <input type="radio" name="level_s[{{ $key }}][]" id="level-s-2" value="2"><label for="level-s-2">2</label>
                                                <input type="radio" name="level_s[{{ $key }}][]" id="level-s-1" value="1"><label for="level-s-1">1</label>
                                            </td>
                                            <td>매우 쉬움</td>
                                        </tr>
                                    @endforeach

                                    @foreach($arr_base['arr_subject_ccd']['S'] as $key => $val)
                                        <tr class="subject_s_radio_2" id="subject-s-2-{{ $key }}">
                                            <td>{{ $val }}</td>
                                            <td>매우 어려움</td>
                                            <td>
                                                <input type="radio" name="level_s[{{ $key }}][]" id="level-s-5" value="5"><label for="level-s-5">5</label>
                                                <input type="radio" name="level_s[{{ $key }}][]" id="level-s-4" value="4"><label for="level-s-4">4</label>
                                                <input type="radio" name="level_s[{{ $key }}][]" id="level-s-3" value="3"><label for="level-s-3">3</label>
                                                <input type="radio" name="level_s[{{ $key }}][]" id="level-s-2" value="2"><label for="level-s-2">2</label>
                                                <input type="radio" name="level_s[{{ $key }}][]" id="level-s-1" value="1"><label for="level-s-1">1</label>
                                            </td>
                                            <td>매우 쉬움</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </li>
                        <li>
                            <strong>5. 윌비스 풀케어 서비스를 알게 된 경로는? (다중선택 가능)</strong>
                            <input type="checkbox" name="etc_values[]" id="윌비스 홈페이지" value="윌비스 홈페이지"><label for="윌비스 홈페이지">윌비스 홈페이지</label>
                            <input type="checkbox" name="etc_values[]" id="학원 내 게시물" value="학원 내 게시물"><label for="학원 내 게시물">학원 내 게시물</label>
                            <input type="checkbox" name="etc_values[]" id="전단지" value="전단지"><label for="전단지">전단지</label>
                            <input type="checkbox" name="etc_values[]" id="현수막" value="현수막"><label for="현수막">현수막</label>
                            <input type="checkbox" name="etc_values[]" id="커뮤니티 게시물" value="커뮤니티 게시물"><label for="커뮤니티 게시물">커뮤니티(카페, DC등) 게시물</label><br>
                            <input type="checkbox" name="etc_values[]" id="커뮤니티 배너" value="커뮤니티 배너"><label for="커뮤니티 배너">커뮤니티(카페, DC등) 배너</label>
                            <input type="checkbox" name="etc_values[]" id="온라인 보도자료" value="온라인 보도자료"><label for="온라인 보도자료">온라인 보도자료</label>
                            <input type="checkbox" name="etc_values[]" id="Daum 배너" value="Daum 배너"><label for="Daum 배너">Daum 배너</label>
                            <input type="checkbox" name="etc_values[]" id="YouTube" value="YouTube"><label for="YouTube">YouTube</label>
                            <input type="checkbox" name="etc_values[]" id="기타" value="기타"><label for="기타">기타</label>
                        </li>
                        <li>
                            <strong>* 개인정보 수집 및 이용에 대한 안내</strong>
                            <div class="info">
                                1. 개인정보 수집 이용 목적 <br>
                                - 이벤트 참여자 경품 추첨 및 설문조사 결과 활용<br>
                                <br>
                                2. 개인정보 수집 항목 <br>
                                - 필수항목 : 성명, 연락처<br>
                                <br>
                                3. 개인정보 이용기간 및 보유기간<br>
                                - 이용 목적 달성 시 파기<br>
                                <br>
                                4. 신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                                - 개인정보 수집에 동의하지 않는 경우 이벤트 참여가 어렵습니다.<br>
                                <br>
                                5. 입력하신 개인정보는 수집목적 외 참여자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.
                            </div>
                        </li>
                    </ul>
                    <div>
                        <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>
                </div>

                <div class="btnsSt3">
                    <button type="submit">확인</button>
                    <button type="button" onclick="javascript:window.close();">취소</button>
                </div>
            </div>
        </form>
    </div>
    <!--willbes-Layer-PassBox//-->

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            $('.subject_s_radio_1').hide();
            $('.subject_s_radio_2').hide();
        });

        function fn_sel_subject_tmp(flag, val, text){
            var flag_1 = $("#flag_1").val();
            var flag_2 = $("#flag_2").val();

            if(flag==1){
                $('.subject_s_radio_1').hide();
                if (val != '') {
                    $('#subject-s-1-'+val).show();
                }

                if(flag_1==1){
                    $('#s_subject_2').children("[value='"+val+"']").remove(); // 옵션 삭제
                    $("#flag_1").val("2");
                    $("#flag_value_1").val(val);
                    $("#flag_text_1").val(text);
                    $("#n_subject_1").attr("disabled", false);
                }else{
                    $('#s_subject_2').children("[value='"+val+"']").remove(); // 옵션 삭제
                    $('#s_subject_2').append($("<option></option>").val($("#flag_value_1").val()).text($("#flag_text_1").val())); // 옵션 추가
                    $("#flag_value_1").val(val);
                    $("#flag_text_1").val(text);
                    sortSelect('s_subject_2');
                }
            }

            if(flag==2){
                $('.subject_s_radio_2').hide();
                if (val != '') {
                    $('#subject-s-2-'+val).show();
                }

                if(flag_2==1){
                    $('#s_subject_1').children("[value='"+val+"']").remove(); // 옵션 삭제
                    $("#flag_2").val("2");
                    $("#flag_value_2").val(val);
                    $("#flag_text_2").val(text);
                    $("#n_subject_2").attr("disabled", false);
                }else{
                    $('#s_subject_1').children("[value='"+val+"']").remove(); // 옵션 삭제
                    $('#s_subject_1').append($("<option></option>").val($("#flag_value_2").val()).text($("#flag_text_2").val())); // 옵션 추가
                    $("#flag_value_2").val(val);
                    $("#flag_text_2").val(text);
                    sortSelect('s_subject_1');
                }
            }
        }

        function sortSelect(selId){
            var sel = $('#'+selId);
            var optionList = sel.find('option');
            optionList.sort(function(a, b){
                //if (a.text > b.text) return 1;
                //else if (a.text < b.text) return -1;
                //else {
                if (a.value > b.value) return 1;
                else if (a.value < b.value) return -1;
                else return 0;
                //}
            });
            // 정렬된 option 리스트를 HTML로 재작성
            var sorted = '';
            for (var i=0; i<optionList.length; i++) {
                var selected = '';
                if (optionList[i].selected) selected = ' selected';
                sorted += '<option value="'+optionList[i].value+'"'+selected+'>'+optionList[i].text+'</option>';
            }
            sel.html(sorted);
        }

        $regi_form.submit(function () {
            var _url = '{{ front_url('/predict/storeFinalPoint2') }}';

            if ($regi_form.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    window.close();
                }
            }, showValidateError, null, false, 'alert');
        });
    </script>
@stop