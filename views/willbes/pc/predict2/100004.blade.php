@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <style type="text/css">
        .evtCtnsBox {line-height: 1.5}

        input[type=radio],
        input[type=checkbox] {width:16px; height:16px;}
        select,
        input[type=email],
        input[type=tel],
        input[type=number],
        input[type=text] {padding:2px; margin-right:10px; height:26px; vertical-align: middle}
        input[type=file]:focus,
        input[type=text]:focus {border:1px solid #1087ef}
        label {margin:0 10px 0 5px}
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

        .boardTypeB {width:100%; margin:0 auto; border-top:#464646 1px solid; border-bottom:#464646 1px solid; border-left:#cdcdcd 1px solid; background:#fff; line-height: 1.5}
        .boardTypeB caption {display:none}
        .boardTypeB thead th,
        .boardTypeB tbody th {color:#464646; font-weight:bold; border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; text-align:center; padding:15px 8px}
        .boardTypeB tbody td {letter-spacing:normal; padding:10px 8px;}
        .boardTypeB thead th {background:#e9e8e8;}
        .boardTypeB tbody th {background:#f3f3f3;}
        .boardTypeB tbody td {border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; vertical-align:middle; color:#464646; text-align:center}
        .boardTypeB tbody tr.bg01 th {background:#e5f2fe}
        .boardTypeB tbody td input {vertical-align:middle; margin:0 auto}
        .boardTypeB tbody td label {margin-right:10px}
        .boardTypeB tbody td li {display: inline;}
        .boardTypeB tbody td span {vertical-align: top}

        .q_type li {margin:5px 0}
        .q_type li span {display:inline-block; width:70px}

        .btns {text-align:center; margin:30px 0}
        .btns span,
        .btns a {display:inline-block; padding:8px 16px; background:#1087ef; color:#fff !important; font-weight:bold; border:1px solid #1087ef}
        .btns a.btn2 {background:#464646; color:#fff !important; border:1px solid #464646}
        .btns a:hover {background:#fff; color:#1087ef !important}
        .btns a.btn2:hover {background:#fff; color:#464646 !important}

        .txtinfo {border:1px solid #464646; padding:20px; height:150px; overflow-y:scroll}
        .txtinfo li {margin-left:20px; list-style-type: decimal;}

        .sub_warp {width:980px; margin:0 auto; padding:50px 10px; font-size:14px; line-height:1.5}
        .sub_warp h2 {clear:both; font-size:24px; font-weight:bold; padding-left:30px; margin-bottom:1em; color:#464646; background:url(https://static.willbes.net/public/images/promotion/2019/04/1211_passcop_icon1.png) no-repeat left center}
        .sub_warp h2 div {position:absolute; top:5px; right:0; font-size:12px; color:#adadad; letter-spacing:normal}
        .sub_warp h2 span {color:#C03}
        .sub_warp h2 select {padding:5px}

        .markingtitle {font-size:16px; font-weight:bold; padding:10px 0; text-align:center; background:#f4f4f4; border:1px solid #000}
        /*.markingBox {padding:30px 0; border-top:2px solid #000; border-bottom:2px solid #000}*/
        .markingBox {border-bottom:2px solid #000}
        .markingBox h3 {font-size:16px; background:#444; color:#fff; height:40px; line-height:40px; padding:0 20px; margin-bottom:10px; border-radius:15px 15px 0 0}
        .markingBox .number li {display:inline; float:left; margin-right:30px}
        .markingBox .number:after {content:""; display:block; clear:both}

        .omrWarp {padding:1em 0}
        .omrL {float:left; width:77%;}
        .omrL .paper {width:100%; height:690px; overflow-y: scroll; background:#F0F0F0}
        .omrR {float:right; width:22%; padding-left:15px; border-left:1px solid #ccc;}

        .omrR p {margin-bottom:1em}
        .omrWarp th,
        .omrWarp td {text-align:center; padding:4px !important}
        .omrWarp tr.check {background:#eefafd}

        .omrWarp input[type=text] {width:80%; letter-spacing:5px; text-align:center}
        .omrWarp h4 {margin-bottom:0.5em; color:#000; font-size: 14px}
        .qMarking {margin-bottom:1em;}
        .qMarking h4 span {color:#666; vertical-align:bottom}

        .selfMarking input[type=text] {width:50%; margin:0 auto; letter-spacing:0}
        .selfMarking p {margin-top:1em}

        .errata {padding:0 10px}
        .errata li {display:inline; float:left; width:20%; padding-right:20px}
        .errata li:last-child {padding:0}
        .errata p {background:#333; color:#fff; text-align:center; padding:10px 0; margin-bottom:10px}
        .errata .boardTypeB tr td:nth-last-child(3) {color:#09F !important}
        .errata td:first-child {color:#09F !important}
        .mypoint {text-align:left !important}
        .mypoint input[type=number] {width:50px; margin:0 !important; text-align:right}
        .mypoint span {vertical-align: bottom}
        .omrWarp:after {content:""; display:block; clear:both}
    </style>

    <div class="sub_warp NSK">
        <div class="sub3_1">
            <form class="form-table" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="predict_idx" value="{{ $idx }}" />
                <input type="hidden" name="pr_idx" value="{{ $data['PrIdx'] }}" />
                <input type="hidden" name="site_code" value="{{ $__cfg['SiteCode'] }}" />
                <input type="hidden" name="research_type" id="regi_research_type" value="{{ $research_type }}">
                <input type="hidden" name="mode_detail" value="{{ ($data['research1_cnt'] > 0 || $data['research2_cnt'] > 0) ? '2' : '1' }}" />
                <h2>기본정보 입력 </h2>
                <table class="boardTypeB">
                    <colgroup>
                        <col width="20%">
                        <col width="">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th>직렬 / 응시번호</th>
                        <td class="tx-left">
                            <select name="take_mock_part" id="take_mock_part" {{ ($data['research1_cnt'] > 0 || $data['research2_cnt'] > 0) ? 'disabled=disabled' : '' }}>
                                <option value="">응시직렬</option>
                                @foreach($mack_part as $val)
                                    <option value="{{ $val['MockPart'] }}" {{ ($val['MockPart'] == $data['TakeMockPart']) ? 'selected=selected' : '' }}>{{ $val['MockPartName'] }}</option>
                                @endforeach
                            </select>
                            <input type="number" name="take_num" id="take_num" maxlength="8" oninput="maxLengthCheck(this)" style="width:150px" value="{{$data['TakeNumber']}}"
                                    {{ ($data['research1_cnt'] > 0 || $data['research2_cnt'] > 0) ? 'disabled=disabled' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>{{--과목별 책형 / --}}체감난이도</th>
                        <td class="tx-left">
                            @foreach($subject_list as $key => $val)
                                <ul class="q_type">
                                    <li>
                                        <span>{{ $val['SubjectName'] }}</span>
                                        <input type="hidden" name="question_type_{{ $val['PpIdx'] }}" value="1">
                                        {{--<input type="radio" class="question-type" id="question_type_1_{{ $val['PpIdx'] }}" name="question_type_{{ $val['PpIdx'] }}"
                                               data-question-type-ppidx="{{ $val['PpIdx'] }}" value="1"
                                                {{ (empty($reg_paper_data[$val['PpIdx']]) === false && $reg_paper_data[$val['PpIdx']]['QuestionType'] == 1) ? 'checked=checked' : '' }}
                                                {{ ($data['research1_cnt'] > 0 || $data['research2_cnt'] > 0) ? 'disabled=disabled' : '' }}>
                                        <label for="question_type_1_{{ $val['PpIdx'] }}">가형</label>
                                        <input type="radio" class="question-type" id="question_type_2_{{ $val['PpIdx'] }}" name="question_type_{{ $val['PpIdx'] }}"
                                               data-question-type-ppidx="{{ $val['PpIdx'] }}" value="2"
                                                {{ (empty($reg_paper_data[$val['PpIdx']]) === false && $reg_paper_data[$val['PpIdx']]['QuestionType'] == 2) ? 'checked=checked' : '' }}
                                                {{ ($data['research1_cnt'] > 0 || $data['research2_cnt'] > 0) ? 'disabled=disabled' : '' }}>
                                        <label for="question_type_2_{{ $val['PpIdx'] }}">다형</label>--}}

                                        <input type="radio" name="take_level_{{ $val['PpIdx'] }}" class="take-level ml20" id="top_{{ $val['PpIdx'] }}" data-take-level-ppidx="{{ $val['PpIdx'] }}"
                                               value="H" {{ (empty($reg_paper_data[$val['PpIdx']]) === false && $reg_paper_data[$val['PpIdx']]['TakeLevel'] == 'H') ? 'checked=checked' : '' }}
                                                {{ ($data['research1_cnt'] > 0 || $data['research2_cnt'] > 0) ? 'disabled=disabled' : '' }}>
                                        <label for="top_{{ $val['PpIdx'] }}">상</label>
                                        <input type="radio" name="take_level_{{ $val['PpIdx'] }}" class="take-level" id="middle_{{ $val['PpIdx'] }}" data-take-level-ppidx="{{ $val['PpIdx'] }}"
                                               value="M" {{ (empty($reg_paper_data[$val['PpIdx']]) === false && $reg_paper_data[$val['PpIdx']]['TakeLevel'] == 'M') ? 'checked=checked' : '' }}
                                                {{ ($data['research1_cnt'] > 0 || $data['research2_cnt'] > 0) ? 'disabled=disabled' : '' }}>
                                        <label for="middle_{{ $val['PpIdx'] }}">중</label>
                                        <input type="radio" name="take_level_{{ $val['PpIdx'] }}" class="take-level" id="bottom_{{ $val['PpIdx'] }}" data-take-level-ppidx="{{ $val['PpIdx'] }}"
                                               value="L" {{ (empty($reg_paper_data[$val['PpIdx']]) === false && $reg_paper_data[$val['PpIdx']]['TakeLevel'] == 'L') ? 'checked=checked' : '' }}
                                                {{ ($data['research1_cnt'] > 0 || $data['research2_cnt'] > 0) ? 'disabled=disabled' : '' }}>
                                        <label for="bottom_{{ $val['PpIdx'] }}">하</label>
                                    </li>
                                </ul>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>응시횟수</th>
                        <td class="tx-left">
                            <ul class="number">
                                <li><input type="radio" name="take_cnt" id="one" value="1" {{ ($data['TakeCount'] == '1') ? 'checked="checked"' : '' }}><label for="one">1회</label></li>
                                <li><input type="radio" name="take_cnt" id="two" value="2" {{ ($data['TakeCount'] == '2') ? 'checked="checked"' : '' }}><label for="two">2회</label></li>
                                <li><input type="radio" name="take_cnt" id="three" value="3" {{ ($data['TakeCount'] == '3') ? 'checked="checked"' : '' }}><label for="three">3회</label></li>
                                <li><input type="radio" name="take_cnt" id="four" value="4" {{ ($data['TakeCount'] == '4') ? 'checked="checked"' : '' }}><label for="four">4회 이상</label></li>
                            </ul>
                        </td>
                    </tr>
                    @if ($research_type == 'Research2')
                        <tr>
                            <th>본인 예상하는<br>실제 PSAT 커트라인</th>
                            <td class="tx-left mypoint">
                                평균 <input type="number" name="cut_point" id="cut_point" maxlength="4" data-max-num="100" oninput="maxLengthCheck(this)" value="{{ $data['CutPoint'] }}"
                                        {{ ($is_finish == 'Y' && empty($data['CutPoint']) === false) ? 'readonly=readonly' : '' }}> 점
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <th>이름</th>
                        <td class="tx-left">
                            {{sess_data('mem_name')}}
                        </td>
                    </tr>
                    <tr>
                        <th>이메일 </th>
                        <td class="tx-left">
                            <input type="email" id="register_email" name="register_email" maxlength="30" placeholder="이메일" value="{{ ($mode == 'INS' ? sess_data('mem_mail') : $data['UserMailDec']) }}" style="width:250px">
                        </td>
                    </tr>
                    <tr>
                        <th>연락처</th>
                        <td class="tx-left">
                            <input type="tel" id="register_tel" name="register_tel" maxlength="11" placeholder="연락처" value="{{ ($mode == 'INS' ? sess_data('mem_phone') : $data['UserTelDec']) }}" style="width:150px">
                        </td>
                    </tr>
                    </tbody>
                </table>

                <h2 class="mt50">개인정보 수집 및 이용에 대한 안내 </h2>
                <div class="txtinfo">
                    <ul>
                        <li>개인정보 수집 항목(개인정보 보호법 제15조 제2항)<br>
                            - 성명, 응시번호, 휴대폰 번호, 전자 우편 주소</li>
                        <li>개인정보 수집 및 이용 목적(개인정보 보호법 제15조 제2항 제1호)<br>
                            - 성적 이벤트 등의 본인확인<br>
                            - 고지사항 전달, 본인 의사 확인 등 원활한 의사소통 경로의 확보<br>
                            - 서비스 이용과 관련된 정보 안내 등 편의제공 목적</li>
                        <li>개인정보 보유 및 이용기간(개인정보 보호법 제15조 제2항 제3호)<br>
                            - 수집된 개인정보는 상기 2번의 용도 이외의 목적으로는 사용되지 않습니다.</li>
                        <li>개인정보 수집동의 거부 및 거부에 따른 이용제한(개인정보 보호법 제15조 제2항 제4호)<br>
                            - 고객님은 개인정보의 수집 및 이용에 대하여 동의를 거부할 수 있습니다. <br>
                            - 개인정보 수집에 동의하지 않거나, 부정확한 정보를 입력하는 경우, 본 이벤트 관련 서비스 이용이 제한됨을 알려드립니다.</li>
                    </ul>
                </div>
                <div class="mt10">
                    <input type="checkbox" name="is_chk" id="is_chk" {{ ($mode == 'MOD') ? 'checked="checked"' : '' }}><label for="is_chk">윌비스에 개인정보제공 동의하기(필수)</label>
                </div>
                <div class="btns">
                    <a href="javascript:;" onclick="javascript:regi_submit(); return false;">{{ ($mode == 'MOD') ? '수정' : '등록' }}</a>
                </div>
            </form>

            <form class="form-table" id="regi_research_form" name="regi_research_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="predict_idx" value="{{ $idx }}" />
                <input type="hidden" name="pr_idx" value="{{ $data['PrIdx'] }}" />
                <input type="hidden" name="research_type" id="research_type" value="{{ $research_type }}">

                @if ($mode == 'MOD')
                    @if ($research_type == 'Research1')
                        <input type="hidden" id="mode" name="mode" value="{{ ($data['research1_cnt'] > 0) ? 'modify' : 'add' }}" />
                        <div class="markingtitle mt50"> Research 1<br>2022.02.26[토] 17 : 10 ~ 2022.02.26[토] 19 : 45<br>※ 빠른 채점 제공</div>
                        <div class="markingBox">
                            <h3 class="mt30">본인 점수 입력</h3>
                            <div class="omrWarp">
                                @php $_id=1; @endphp
                                @foreach($subject_list as $key => $val)
                                    <div class="qMarking">
                                        <h4>{{ $val['SubjectName'] }}<span> | 원점수: {{ $val['TotalScore'] }}</span></h4>
                                        <table class="boardTypeB">
                                            <col width="70px">
                                            <tr>
                                                <th scope="col">번호</th>
                                                @foreach($question_list['numset'][$val['PpIdx']] as $key2 => $val2)
                                                    <th scope="col">{{ $val2 }}</th>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>답안입력 </td>
                                                @foreach($question_list['numset'][$val['PpIdx']] as $key2 => $val2)
                                                    <td><input class="txt-answer" id="target_{{$_id}}" type="text" name="Answer_{{ $val['PpIdx'] }}[]" maxlength="5"
                                                               oninput="maxLengthCheck(this)" data-input-id="{{$_id}}"
                                                               data-answer-maxnum="{{ (empty($reg_paper_data[$val['PpIdx']]['AnswerNum']) === true ? '' : $reg_paper_data[$val['PpIdx']]['AnswerNum']) }}"
                                                               value="{{ $question_list['answerset'][$val['PpIdx']][$key2] }}"></td>
                                                    @php $_id++; @endphp
                                                @endforeach
                                            </tr>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="btns">
                            <a href="javascript:;" onclick="javascript:research_submit(); return false;">{{ ($data['research1_cnt'] > 0) ? '수정' : '등록' }}</a>
                        </div>
                    @endif

                    @if ($research_type == 'Research2')
                        <input type="hidden" id="mode" name="mode" value="{{ ($data['research2_cnt'] > 0) ? 'modify' : 'add' }}" />
                        <div class="markingtitle mt50">Research 2<br>2022.02.26[토] 19 : 46 ~ 2022.03.01[화] 13 : 00</div>
                        <div class="markingBox">
                            <h3 class="mt30">본인 점수 입력</h3>
                            <table class="boardTypeB">
                                <col  />
                                <col width="80%" />
                                <tr>
                                    <th>과목</th>
                                    <th>점수입력</th>
                                </tr>
                                @foreach($subject_list as $key => $val)
                                    <tr>
                                        <th>{{ $val['SubjectName'] }}</th>
                                        <td class="mypoint">
                                            <input type="text" class="txt-answer2" name="Score[]" maxlength="4" oninput="maxLengthCheck(this)" data-max-num="100"
                                                   value="{{ (empty($arr_reg_answerpaper['subjectSum'][$val['PpIdx']]) === true ? '' : $arr_reg_answerpaper['subjectSum'][$val['PpIdx']]) }}"
                                                    {{ ($is_finish == 'Y') ? 'readonly=readonly' : '' }}> 점
                                            @if ($loop->first === true && empty($arr_reg_answerpaper['subjectSum'][$val['PpIdx']]) === false)
                                                (합격/불합격 여부 :
                                                @if ($arr_reg_answerpaper['subjectSum'][$val['PpIdx']] >= 60)
                                                    <span class="tx-blue">합격</span>)
                                                @else
                                                    <span class="tx-red">불합격</span>)
                                                @endif
                                            @endif
                                            <input type="hidden" name="PpIdx[]" value="{{ $val['PpIdx'] }}" />
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>▶ 내 점수 평균 </th>
                                    <td class="mypoint">
                                        <span class="tx-blue">{{ $arr_reg_answerpaper['avg'] }}</span> 점
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="btns">
                            @if ($is_finish == 'Y')
                                <a href="javascript:;" onclick="javascript:alert('등록완료된 성적입니다.');">등록완료</a>
                            @else
                                <a href="javascript:;" onclick="javascript:research_submit();">{{ ($data['research2_cnt'] > 0) ? '수정' : '등록' }}</a>
                            @endif
                        </div>
                    @endif
                @endif
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $regi_research_form = $('#regi_research_form');
        $(document).ready(function(){
            $(".txt-answer").keyup(function() {
                if (this.value.length == this.maxLength) {
                    var id = $(this).data("input-id") + 1;
                    $('#target_'+id).focus();
                }
            });
        });

        function regi_submit()
        {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            if ($('#regi_research_type').val() == ''){
            alert('{{$base_data['startDayText']}}'+'에 오픈됩니다.');
            return false;
        }

            if ($('#take_mock_part').val() == '') {
                $('#take_mock_part').focus();
                alert('응시직렬을 선택해 주세요.');
                return false;
            }

            if ($('#take_num').val() == '') {
                $('#take_num').focus();
                alert('응시번호를 입력해 주세요.');
                return false;
            }

            if(valiChkTakeNum($('#take_mock_part').val(), $('#take_num').val()) === false) {
                $('#take_num').focus();
                alert('응시번호가 올바르지 않습니다.');
                return false;
            }

            /*var question_type_chk = true;
            $regi_form.find('.question-type').each(function () {
                var ppidxs = $(this).data("question-type-ppidx");
                var question_type_id = 'question_type_'+ppidxs;
                if ($("input:radio[name='"+question_type_id+"']").is(':checked') == false) {
                    question_type_chk = false;
                    return false;
                };
            });
            if (question_type_chk == false) {alert('책형을 선택해 주세요.');return false;}*/

            var take_level_chk = true;
            $regi_form.find('.take-level').each(function () {
                var ppidxs = $(this).data("take-level-ppidx");
                var take_level_id = 'take_level_'+ppidxs;
                if ($("input:radio[name='"+take_level_id+"']").is(':checked') == false) {
                    take_level_chk = false;
                    return false;
                };
            });
            if (take_level_chk == false) {alert('체감난이도를 선택해 주세요.');return false;}

            if ($("input:radio[name='take_cnt']").is(':checked') == false) {
                $("input:radio[name='take_cnt']").focus();
                alert('응시횟수를 선택해 주세요.');return;
            }

            if ($('#regi_research_type').val() == 'Research2') {
                if ($('#cut_point').val() == '') {
                    $('#cut_point').focus();
                    alert('PAST 커트라인 평균점수를 입력해 주세요.');
                    return false;
                }
            }

            if ($('#register_email').val() == '') {
                $('#register_email').focus();
                alert('이메일 주소를 입력해 주세요.');
                return false;
            }

            if(CheckEmail($('#register_email').val()) === false) {
                $('#register_email').focus();
                alert('이메일 형식이 올바르지 않습니다.');
                return false;
            }

            if ($('#register_tel').val() == '') {
                $('#register_tel').focus();
                alert('연락처를 입력해 주세요.');
                return false;
            }

            if ($regi_form.find('input[name="is_chk"]').is(':checked') === false) {
                $regi_form.find('input[name="is_chk"]').focus();
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if (confirm('기본정보를 등록하시겠습니까?')) {
                var _url = '{{ front_url('/predict2/storeAjax') }}';
                ajaxSubmit($regi_form, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            }
        }

        function research_submit() {
            var confirm_msg = '정답을 제출하시겠습니까?';
            var vali_msg = '';
            var chk = /^[1-4]+$/i;
            var chk2 = /^[1-5]+$/i;
            var chk_num = '';
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            if ($('#research_type').val() == 'Research1') {
                $('.txt-answer').each(function () {
                    var val = $(this).val();
                    if (val == '') {
                        vali_msg = '답안을 모두 입력해 주세요.';
                        return false;
                    }
                    chk_num = ($(this).data("answer-maxnum") < 5) ? chk : chk2;
                    if (!chk_num.test(val)) {
                        vali_msg = '허용되지 않은 답안입니다.';
                        return false;
                    }
                });
            }

            if ($('#research_type').val() == 'Research2') {
                if($('#mode').val() == 'modify') {
                    confirm_msg = '수정 후 등록완료 처리되므로 더 이상 수정할 수 없습니다.\n수정하시겠습니까?';
                } else {
                    if ($('#cut_point').val() == '') {
                        $('#cut_point').focus();
                        alert('PAST 커트라인 평균점수를 등록해 주세요.');
                        return false;
                    }
                }
                $('.txt-answer2').each(function () {
                    var val = $(this).val();
                    if (val == '') {
                        vali_msg = '본인 점수를 모두 입력해 주세요.';
                        return false;
                    }
                });
            }
            if (vali_msg) { alert(vali_msg); return; }

            if (confirm(confirm_msg)) {
                var _url = '{{ front_url('/predict2/storeResearchAjax') }}';
                ajaxSubmit($regi_research_form, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            }
        }

        function maxLengthCheck(object){
            if($(object).prop('type') == 'number') {
                object.value = object.value.replace(/[^0-9.]/g, "");
                if($(object).data('max-num') != undefined) {
                    if( Number(object.value) > Number($(object).data('max-num')) ) {
                        object.value = object.value.slice(0, -1);
                    }
                }
            }
            if (object.value.length > object.maxLength) {
                object.value = object.value.slice(0, object.maxLength);
            }
        }

        {{-- 한림고시 응시번호 유효성 체크 --}}
        function valiChkTakeNum(take_mock_part, take_num) {
            var arr_vali = {
                /*'686001' : '100',   {{-- 일반행정 --}}
                '686035' : '104',   {{-- 재경 --}}
                '686036' : '040'    {{-- 국립외교원 --}}*/
            };

            if(take_num === null || take_num.length != 8 || (Object.keys(arr_vali).length > 0 && arr_vali[take_mock_part] != take_num.substring(0,3))) {
                return false;
            } else {
                return true;
            }
        }

        {{-- 이메일 유효성 체크 --}}
        function CheckEmail(str) {
            var reg_email = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
            if(!reg_email.test(str)) {
                return false;
            } else {
                return true;
            }
        }
    </script>
@stop