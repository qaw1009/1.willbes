@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <!-- Container -->
    <style type="text/css">
        span {vertical-align:auto}
        .willbes-Layer-PassBox {height:700px; overflow-y:scroll;}
        .eventPop {width:600px; margin:0 auto; font-size:12px; color:#333; line-height:1.5; padding-bottom:50px}
        .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;}

        .eventPopS1 {margin-top:1em}
        .eventPopS1 ul > li {border-bottom:1px solid #e4e4e4; padding:10px}
        .eventPopS1 strong {display:block; margin-bottom:10px}
        .eventPopS1 p {margin-bottom:10px}
        .eventPopS1 li ul {margin-bottom:10px}
        .eventPopS1 li li {display:inline-block; border:0; margin-right:10px; padding:0}

        .eventPopS3 {margin-top:1em}
        .eventPopS3 p {font-weight:bold; margin-bottom:10px}
        .eventPopS3 ul,
        .eventPopS3 li {padding:0; margin:0}
        .eventPopS3 ul {border:1px solid #adadad; padding:10px; overflow-y:scroll; height:100px}
        .eventPopS3 li {margin-left:15px; margin-bottom:5px}
        .eventPopS3 div {margin-top:10px;}
        .eventPopS3 input {vertical-align:middle}

        .btnsSt3 {text-align:center; margin-top:20px}
        .btnsSt3 a {display:inline-block; padding:8px 16px; background:#333; color:#fff !important; font-weight:bold; border:1px solid #333}
        .btnsSt3 a:hover {background:#fff; color:#333 !important}

        input[type=radio],
        input[type=checkbox] {width:16px; height:16px;}
        select,
        input[type=text] {padding:2px; margin-right:10px; height:26px; border:1px solid #e4e4e4}
        input[type=file]:focus,
        input[type=text]:focus {border:1px solid #1087ef}
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
    </style>

    <div class="willbes-Layer-PassBox NGR">
        <form class="form-table" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" id="GroupCcd" name="GroupCcd" >
            <input type="hidden" name="SiteCode" value="2001" />
            <input type="hidden" name="PredictIdx" value="{{ $idx }}" />
            <input type="hidden" name="mode" value="{{ $mode }}" />
            <input type="hidden" name="img_pass" value="Y" />
            @if($mode == 'MOD')
                <input type="hidden" name="PrIdx" value="{{ $data['PrIdx'] }}" />
            @endif
            <input type="hidden"  id="TakeMockPart" name="TakeMockPart" value="{{ $data['TakeMockPart'] }}" />

            <div class="eventPop">
                <h3>
                    2019년 경찰 2차 <span class="tx-bright-blue">합격예측 풀서비스 사전예약</span> 신청하기
                </h3>
                <div class="eventPopS1">
                    <ul>
                        <li>
                            <strong>* 직렬(직류구분)</strong>

                            <select style="width:120px" onchange="selSerial(this.value,'')" @if($mode=='MOD') disabled @endif >
                                <option value="">응시직렬</option>
                                @foreach($arr_base['arr_mock_part'] as $key => $val)
                                    <option value="{{ $key }}" {{ ($data['TakeMockPart'] == $val) ? 'selected="selected"' : '' }}>{{ $val }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="TakeArea" name="TakeArea" @if($mode == 'MOD') value="{{ $data['TakeArea'] }}" @endif/>
                            <span id="area1">
                                <select title="지역구분" onChange="selArea(this.value)">
                                    <option value="">지역구분</option>
                                    @if($mode == 'NEW')
                                        @foreach($area as $val)
                                            @if($val['Ccd'] != '712018')
                                                <option value="{{ $val['Ccd'] }}">{{ $val['CcdName'] }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($area as $val)
                                            @if($val['Ccd'] != '712018')
                                                <option value="{{ $val['Ccd'] }}" @if($data['TakeArea'] == $val['Ccd']) selected @endif>{{ $val['CcdName'] }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </span>
                            <span id="area2" style="display:none;">
                                <select title="지역구분" onChange="selArea(this.value,'')">
                                    <option value="">지역구분</option>
                                    <option value="712001">서울</option>
                                </select>
                            </span>
                            ※ 응시직렬은 최초 선택/저장 후 수정 불가
                        </li>
                        <li>
                            <strong class="mt10">* 응시과목</strong>
                            <p>직렬(지역)구분을 선택해주세요.</p>
                            <div>
                                <p>- 공통과목 : <span id="karea1"></span></p>
                                <p>- 선택과목 : </p>
                                <ul id="karea2">

                                </ul>
                            </div>
                            <strong class="mt10">* 가산점여부</strong>
                            <ul>
                                <li><input type="radio" name="AddPoint" id="AddPoint1" value="5" @if($mode == 'MOD' && $data['AddPoint'] == '5') checked @endif /> <label for="AddPoint1">5점</label></li>
                                <li><input type="radio" name="AddPoint" id="AddPoint2" value="4" @if($mode == 'MOD' && $data['AddPoint'] == '4') checked @endif /> <label for="AddPoint2">4점</label></li>
                                <li><input type="radio" name="AddPoint" id="AddPoint3" value="3" @if($mode == 'MOD' && $data['AddPoint'] == '3') checked @endif /> <label for="AddPoint3">3점</label></li>
                                <li><input type="radio" name="AddPoint" id="AddPoint4" value="2" @if($mode == 'MOD' && $data['AddPoint'] == '2') checked @endif /> <label for="AddPoint4">2점</label></li>
                                <li><input type="radio" name="AddPoint" id="AddPoint5" value="1" @if($mode == 'MOD' && $data['AddPoint'] == '1') checked @endif /> <label for="AddPoint5">1점</label></li>
                                <li><input type="radio" name="AddPoint" id="AddPoint6" value="0" @if($mode == 'MOD' && $data['AddPoint'] == '0') checked @endif /> <label for="AddPoint6">없음</label></li>
                            </ul>
                        </li>
                        <li>
                            <strong>* 응시번호</strong>
                            <input type="text" name="TakeNumber" id="TakeNumber" maxlength="5" @if($mode == 'MOD') value="{{ $data['TakeNumber'] }}" @endif />
                        </li>
                        <li>
                            <strong>* 신광은경찰팀 수강여부</strong>
                            <ul>
                                <li><input type="radio" name="LectureType" id="LectureType1" value="1" @if($mode == 'MOD' && $data['LectureType'] == '1') checked @endif /> <label for="LectureType1">온라인강의</label></li>
                                <li><input type="radio" name="LectureType" id="LectureType2" value="2" @if($mode == 'MOD' && $data['LectureType'] == '2') checked @endif /> <label for="LectureType2">학원강의</label></li>
                                <li><input type="radio" name="LectureType" id="LectureType3" value="3" @if($mode == 'MOD' && $data['LectureType'] == '3') checked @endif /> <label for="LectureType3">온라인+학원강의</label></li>
                                <li><input type="radio" name="LectureType" id="LectureType4" value="4" @if($mode == 'MOD' && $data['LectureType'] == '4') checked @endif /> <label for="LectureType4">미수강</label></li>
                            </ul>
                        </li>
                        <li>
                            <strong>* 시험준비기간</strong>
                            <ul>
                                <li><input type="radio" name="Period" id="Period1" value="1" @if($mode == 'MOD' && $data['Period'] == '1') checked @endif /> <label for="Period1">6개월 이하</label></li>
                                <li><input type="radio" name="Period" id="Period2" value="2" @if($mode == 'MOD' && $data['Period'] == '2') checked @endif /> <label for="Period2">1년 이하</label></li>
                                <li><input type="radio" name="Period" id="Period3" value="3" @if($mode == 'MOD' && $data['Period'] == '3') checked @endif /> <label for="Period3">2년 이하</label></li>
                                <li><input type="radio" name="Period" id="Period4" value="4" @if($mode == 'MOD' && $data['Period'] == '4') checked @endif /> <label for="Period4">2년 이상</label></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="eventPopS3">
                    <p>* 개인정보 수집 및 이용에 대한 안내</p>
                    <ul>
                        <li>
                            1. 개인정보 수집 이용 목적 <br>
                            - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대<br>
                            - 이벤트 참여에 따른 경품 지급<br>
                            - 응시 직렬에 따른 성적 분포 통계 자료 제공<br>
                            - 성적 처리 및 분석 후 통계자료 마케팅 등에 활용
                        </li>
                        <li>개인정보 수집 항목<br>
                            - 신청인의 이름,아이디, 응시정보, 과목별 점수, 휴대폰 번호, 이메일 주소
                        </li>
                        <li>개인정보 이용기간 및 보유기간<br>
                            - 본 수집, 활용목적 달성 후 바로 파기
                        </li>
                        <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                            - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나,
                            위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                        </li>
                    </ul>
                    <div>
                        <input name="is_chk" id="is_chk" type="checkbox" value="Y" @if($mode == 'MOD') checked @endif><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>
                </div>

                <div class="btnsSt3">
                    <a href="javascript:js_submit();">@if($mode == 'MOD')수정@else확인@endif</a>
                    <a href="javascript:window.close();">취소</a>
                </div>
            </div>

        </form>
    </div>
    <!--willbes-Layer-PassBox//-->
    <script>
        var $regi_form = $('#regi_form');
        var mode = '{{ $mode }}';

        $( document ).ready( function() {
            if(mode == 'MOD'){
                selSerial('{{ $data['TakeMockPart'] }}', '{{ $data['SubjectCode'] }}');
            }
        });

        function selchk(obj){
            var cknum = $("input:checkbox[id=Ssubject]:checked").length;
            if(cknum == 4){
                alert('선택과목은 3개까지 선택할 수 있습니다.');
                obj.checked = false;
                return;
            }
        }

        function selArea(obj){
            $('#TakeArea').val(obj);
        }

        // 문항정보필드 등록,수정
        function js_submit() {
            if($("input:checkbox[id='is_chk']").is(":checked") == false){
                alert('개인정보 수집을 동의해 주세요');
                return ;
            }

            if($("#TakeMockPart").val() != '800'){
                if($("input:checkbox[id=Ssubject]:checked").length != 3){
                    alert('선택과목은 3개를 선택해 주세요.');
                    return ;
                }
            }

            var takenum = '';
            takenum = $('#TakeNumber').val();
            takenum = parseInt(takenum);

            if($("#TakeMockPart").val() == '100') {
                if(takenum<10001||takenum>19999) {
                    alert('올바른 응시번호가 아닙니다.');
                    return;
                }
            } else if($("#TakeMockPart").val() == '200') {
                if(takenum<20001||takenum>29999) {
                    alert('올바른 응시번호가 아닙니다.');
                    return;
                }
            } else if($("#TakeMockPart").val() == '300') {
                if(takenum<30001||takenum>39999) {
                    alert('올바른 응시번호가 아닙니다.');
                    return;
                }
            } else {
                if(takenum<40001||takenum>49999) {
                    alert('올바른 응시번호가 아닙니다.');
                    return;
                }
            }

            var _url = '';
            if(mode == 'NEW'){
                _url = '{{ site_url('/predict/store') }}';
            } else {
                _url = '{{ site_url('/predict/update') }}';
            }

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    window.close();
                }
            }, showValidateError, null, false, 'alert');
        }

        function selSerial(num,num2){
            $("#TakeMockPart").val(num);
            if(num != ''){
                $('#GroupCcd').val(num);
            } else {
                $('#GroupCcd').val('');
                $('#karea1').html('');
                $('#karea2').html('');
            }

            if(num == '400'){
                $('#area1').hide();
                $('#area2').show();
            } else {
                $('#area1').show();
                $('#area2').hide();
            }

            if(num != null){
                url = "{{ site_url("/predict/getSerialAjax") }}";
                data = $('#regi_form').serialize();

                sendAjax(url,
                    data,
                    function(d){
                        if(num2 != ''){
                            var arrnum2 = num2.split(',');
                            var str = '';
                            var str2 = '';
                            for(var i=0; i < d.data.length; i++){
                                if(d.data[i].Type == 'P'){
                                    if(i == 0){
                                        str += d.data[i].CcdName + "<input type='hidden' name='Psubject[]' value='" + d.data[i].Ccd + "' /> ";
                                    } else {
                                        str += "," + d.data[i].CcdName + "<input type='hidden' name='Psubject[]' value='" + d.data[i].Ccd + "' /> ";
                                    }
                                } else {
                                    var chkyn = '';
                                    for (var j = 0; j < arrnum2.length; j++) {
                                        if(d.data[i].Ccd == arrnum2[j]){
                                            chkyn = 'checked';
                                        }
                                    }
                                    str2 += "<li><input type='checkbox' name='Ssubject[]' id='Ssubject' value='" + d.data[i].Ccd + "' onClick='selchk(this)'"+ chkyn +"><label for='Ssubject"+i+"'>" + d.data[i].CcdName + "</label></li>";
                                }
                            }

                            $('#karea1').html(str);
                            $('#karea2').html(str2);
                        } else {
                            var str = '';
                            var str2 = '';
                            for(var i=0; i < d.data.length; i++){
                                if(d.data[i].Type == 'P'){
                                    if(i == 0){
                                        str += d.data[i].CcdName + "<input type='hidden' name='Psubject[]' value='" + d.data[i].Ccd + "' /> ";
                                    } else {
                                        str += "," + d.data[i].CcdName + "<input type='hidden' name='Psubject[]' value='" + d.data[i].Ccd + "' /> ";
                                    }
                                } else {
                                    str2 += "<li><input type='checkbox' name='Ssubject[]' id='Ssubject' value='" + d.data[i].Ccd + "' onClick='selchk(this)'><label for='Ssubject"+i+"'>" + d.data[i].CcdName + "</label></li>";
                                }
                            }

                            $('#karea1').html(str);
                            $('#karea2').html(str2);
                        }
                    },
                    function(ret, status){
                        //alert(ret.ret_msg);
                    }, true, 'POST', 'json');
            }
        }
    </script>


@stop