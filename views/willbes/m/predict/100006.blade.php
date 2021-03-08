@extends('willbes.m.layouts.master')

@section('content')
@php
    $now = date('YmdHi');
    $yoil = array("일","월","화","수","목","금","토");
    $service_start_datm = $arr_base['predict_data']['ServiceSDatm'];
    $service_end_datm = $arr_base['predict_data']['ServiceEDatm'];
    $service_start_year = substr($service_start_datm, '0','4');
    $service_start_mon = substr($service_start_datm, '4','2');
    $service_start_day = substr($service_start_datm, '6','2');
    $service_yoil = $yoil[date('w', strtotime($service_start_year.'-'.$service_start_mon.'-'.$service_start_day))];
@endphp
<link href="/public/css/willbes/promotion/2002_1332M.css" rel="stylesheet">
    <!-- Container -->
    <form class="form-table" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="GroupCcd" name="GroupCcd" >
        <input type="hidden" name="SiteCode" value="2001" />
        <input type="hidden" name="PredictIdx" value="{{ $idx }}" />
        <input type="hidden" name="mode" value="{{ $mode }}" />
        <input type="hidden" name="img_pass" value="Y" />
        @if($mode == 'MOD')
            <input type="hidden" id="PrIdx" name="PrIdx" value="{{ $data['PrIdx'] }}" />
        @endif
        <input type="hidden" id="TakeMockPart" name="TakeMockPart" value="{{ $data['TakeMockPart'] }}" />

        <div id="Container" class="Container NG c_both">
            <div class="predictWrap">
                <div class="willbes-Tit">
                    합격예측 풀서비스 <span class="NGEB">사전예약</span>
                </div>
                <div class="marktxt2">빠르고 간편한 모바일 전용 채점 서비스 입니다.</div>
                <div class="tg-note">
                    <div class="tg-tit"> <a href="javascript:;">채점 시 유의사항<img src="{{ img_url('m/mypage/icon_arrow_off_white.png') }}"></a></div>
                    <div class="tg-cont">
                        <ul>
                            <li>
                                성적 신뢰도를 위해 채점은 1회만 수정 가능하오니, 신중하게 채점해 주시기 바랍니다.
                            </li>
                            <li>
                                채점하는 방식은 본인의 상황에 맞게 선택할 수 있습니다.<br />
                                - '일반채점' : 문제창에서 바로 문제를 확인하면서 OMR 정답지에 답을 체크 (PC)<br />
                                - '빠른채점'은 시험지를 다운받아 문제를 풀어본 후, 문항별 선택 번호만 입력 (PC/모바일)<br />
                                - '직접입력'은 별도 채점 없이 본인의 점수를 직접 입력 (PC/모바일)
                            </li>
                            <li>
                                채점 후 ‘완료’ 버튼을 반드시 눌러야 전형정보 관리에 성적이 반영됩니다.
                            </li>
                            <li>
                                기본정보는 사전예약기간에만(~3/5)수정이 가능하며, 본 서비스 오픈후에는(3/6~)수정이 불가합니다.
                            </li>
                            <li>
                                자세한 합격예측 분석 데이터는 PC버전에서 확인 가능합니다.
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- //tg-note -->

                <div class="markMbtn2">
                    <a href="javascript:;">기본정보입력</a>
                    @if ($arr_base['predict_data']['ServiceSDatm'] <= date('YmdHi'))
                        @if($mode != 'MOD')
                            <a href="javascript:alert('기본정보를 입력해주세요.')" class="btn2">채점 및 성적확인</a>
                        @else
                            <a href="javascript:;" onclick="javascript:gotab({{ $idx }});" class="btn2">채점 및 성적확인</a>
                        @endif
                    @else
                        @if ($mode != 'MOD')
                            <a href="javascript:alert('기본정보를 입력해주세요.')" class="btn2">빠른답안입력</a>
                        @elseif ($answer_serviceYn == 'Y')
                            <a href="javascript:;" onclick="javascript:addAnswer({{ $idx }});" class="btn2">빠른답안입력</a>
                        @else
                            <a href="javascript:alert('빠른답안입력 서비스 기간이 아닙니다.')" class="btn2">빠른답안입력</a>
                        @endif
                        {{--<a href="javascript:;" onclick="javascript:alert('{{$service_start_mon}}월{{$service_start_day}}일({{$service_yoil}}) 오픈예정입니다.');" class="btn2">채점 및 성적확인</a>--}}
                    @endif
                    {{--27일부터 보이는 버튼--}}
                    {{--<a href="javascript:alert('기본정보를 저장하고 채점해주세요.');" class="btn2">채점 및 성적확인</a>--}}
                </div>

                <h4 class="markingTit1">기본정보입력</h4>
                <form name="frm"  id="frm" action="" method="post">
                    <table cellspacing="0" cellpadding="0" class="table_type">
                        <col width="20%" />
                        <col width="*" />
                        <tr>
                            <th>직렬(직류)</th>
                            <td>
                                <select title="응시직렬" onChange="selSerial(this.value,'')" @if($mode=='MOD') disabled @endif>
                                    <option value="">응시직렬</option>
                                    @foreach($arr_base['arr_mock_part'] as $key => $val)
                                        <option value="{{ $key }}" {{ ($data['TakeMockPart'] == $key) ? 'selected="selected"' : '' }}>{{ $val }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="TakeArea" name="TakeArea" @if($mode == 'MOD') value="{{ $data['TakeArea'] }}" @endif/>
                                <span id="area1">
                                    <select title="지역구분" class="take_area" onChange="selArea(this.value)">
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
                                    <select title="지역구분" class="take_area" onChange="selArea(this.value,'')">
                                        <option value="">지역구분</option>
                                        <option value="712001" @if(empty($data['TakeArea']) === false && $data['TakeArea'] == 712001) selected @endif>서울</option>
                                    </select>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>응시과목</th>
                            <td>
                                {{--직렬/지역 선택 전--}}
                                직렬(지역)구분을 선택해주세요.
                                {{--직렬/지역 선택 후--}}
                                <div>
                                    <p>공통과목 : <span id="karea1"></span></p>
                                    <p id="sel3">선택과목(3과목)를 체크해주세요.</p>
                                    <ul class="sel_info" id="karea2">

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>가산점 여부</th>
                            <td>
                                <ul class="sel_info">
                                    <li><input type="radio" name="AddPoint" id="AddPoint1" value="5" @if($mode == 'MOD' && $data['AddPoint'] == '5') checked @endif /> <label for="AddPoint1">5점</label></li>
                                    <li><input type="radio" name="AddPoint" id="AddPoint2" value="4" @if($mode == 'MOD' && $data['AddPoint'] == '4') checked @endif /> <label for="AddPoint2">4점</label></li>
                                    <li><input type="radio" name="AddPoint" id="AddPoint3" value="3" @if($mode == 'MOD' && $data['AddPoint'] == '3') checked @endif /> <label for="AddPoint3">3점</label></li>
                                    <li><input type="radio" name="AddPoint" id="AddPoint4" value="2" @if($mode == 'MOD' && $data['AddPoint'] == '2') checked @endif /> <label for="AddPoint4">2점</label></li>
                                    <li><input type="radio" name="AddPoint" id="AddPoint5" value="1" @if($mode == 'MOD' && $data['AddPoint'] == '1') checked @endif /> <label for="AddPoint5">1점</label></li>
                                    <li><input type="radio" name="AddPoint" id="AddPoint6" value="0" @if($mode == 'MOD' && $data['AddPoint'] == '0') checked @endif /> <label for="AddPoint6">없음</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>시험응시번호</th>
                            <td>
                                <label>
                                    <input type="text" name="TakeNumber" id="TakeNumber" maxlength="5" @if($mode == 'MOD') value="{{ $data['TakeNumber'] }}" @endif />
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>신광은팀<br />수강 </th>
                            <td>
                                <ul class="sel_info">
                                    <li><input type="radio" name="LectureType" id="LectureType1" value="1" @if($mode == 'MOD' && $data['LectureType'] == '1') checked @endif /> <label for="LectureType1">온라인강의</label></li>
                                    <li><input type="radio" name="LectureType" id="LectureType2" value="2" @if($mode == 'MOD' && $data['LectureType'] == '2') checked @endif /> <label for="LectureType2">학원강의</label></li>
                                    <li><input type="radio" name="LectureType" id="LectureType3" value="3" @if($mode == 'MOD' && $data['LectureType'] == '3') checked @endif /> <label for="LectureType3">온라인+학원강의</label></li>
                                    <li><input type="radio" name="LectureType" id="LectureType4" value="4" @if($mode == 'MOD' && $data['LectureType'] == '4') checked @endif /> <label for="LectureType4">미수강</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>시험<br />준비 기간 </th>
                            <td>
                                <ul class="sel_info">
                                    <li><input type="radio" name="Period" id="Period1" value="1" @if($mode == 'MOD' && $data['Period'] == '1') checked @endif /> <label for="Period1">6개월 이하</label></li>
                                    <li><input type="radio" name="Period" id="Period2" value="2" @if($mode == 'MOD' && $data['Period'] == '2') checked @endif /> <label for="Period2">1년 이하</label></li>
                                    <li><input type="radio" name="Period" id="Period3" value="3" @if($mode == 'MOD' && $data['Period'] == '3') checked @endif /> <label for="Period3">2년 이하</label></li>
                                    <li><input type="radio" name="Period" id="Period4" value="4" @if($mode == 'MOD' && $data['Period'] == '4') checked @endif /> <label for="Period4">2년 이상</label></li>
                                </ul>
                            </td>
                        </tr>
                    </table>

                    <div>
                        ※ 합격예측 풀서비스 기간에는 입력한 기본 정보를 수정할 수 없습니다.
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
                </form>

                <div class="markSbtn1">
                    @if ($arr_base['predict_data']['ServiceIsUse'] == 'Y' && $arr_base['predict_data']['ServiceSDatm'] <= date('YmdHi'))
                        @if($mode != 'MOD')
                            <a href="javascript:js_submit();">저장</a>
                        @else
                            <a href="javascript:;" onclick="javascript:gotab({{ $idx }});" class="btn2">채점하기</a>
                        @endif
                    @else
                            <a href="javascript:js_submit();">@if($mode == 'MOD')수정@else저장@endif</a>
                    @endif
                </div>
            </div>
            <!-- predictWrap //-->

            <div class="goTopbtn">
                <a href="javascript:link_go();">
                    <img src="{{ img_url('m/main/icon_top.png') }}">
                </a>
            </div>
            <!-- Topbtn -->

        </div>
    </form>
    <!-- End Container -->

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var mode = '{{ $mode }}';
        var take_num_check_type = 'm';     //인증번호 검승스크립트 타입 (m:직렬형태, am:지역+직렬형태)

        $( document ).ready( function() {
            if(mode == 'MOD'){
                selSerial('{{ $data['TakeMockPart'] }}', '{{ $data['SubjectCode'] }}');
            }
        });

        function selchk(obj){
            var cknum = $("input[name='Ssubject[]']:checked").length;
            if(cknum == 4){
                alert('선택과목은 3개까지 선택할 수 있습니다.');
                obj.checked = false;
                return;
            }
        }

        function selArea(obj){
            $('#TakeArea').val(obj);
        }

        $(function() {
            $('.tg-tit a').click(function() {
                var $lec_buy_table = $('.tg-cont');

                if ($lec_buy_table.is(':hidden')) {
                    $lec_buy_table.show().css('visibility','visible');
                    $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off_white.png');
                } else {
                    $lec_buy_table.hide().css('visibility','hidden');
                    $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on_white.png');
                }
            });
        });

        // 문항정보필드 등록,수정
        function js_submit(onoff_type) {
            if (onoff_type == 'off') {
                alert('합격예측 풀서비스 기간에는 입력한 기본 정보를 수정할 수 없습니다.');
                return;
            }

            if($("input:checkbox[id='is_chk']").is(":checked") == false){
                alert('개인정보 수집을 동의해 주세요');
                return ;
            }

            if ($("#TakeMockPart").val() == '') {
                alert('응시직렬을 선택해주세요.');
                return;
            }

            if ($("#TakeArea").val() == '') {
                alert('응시지역을 선택해주세요.');
                return;
            }

            if($("#TakeMockPart").val() == '300' || $("#TakeMockPart").val() == '800'){
            } else {
                if($("input[name='Ssubject[]']:checked").length != 3){
                    alert('선택과목은 3개를 선택해 주세요.');
                    return ;
                }
            }

            var takenum = $('#TakeNumber').val();
            takenum = parseInt(takenum);
            if (takeNumChk($("#TakeMockPart").val(), $("#TakeArea").val(), takenum, take_num_check_type) != true) {
                alert('올바른 응시번호가 아닙니다.');
                return;
            }

            var _url = '';
            if(mode == 'NEW'){
                _url = '{{ site_url('/predict/store') }}';
            } else {
                _url = '{{ site_url('/predict/update') }}';
            }
            //
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                    /*location.href = '{{ front_url('/predict/popwin2/?PredictIdx=') }}' + $('#PredictIdx').val() + '&pridx='+$('#PrIdx').val();*/
                }
            }, showValidateError, null, false, 'alert');
        }

        function selSerial(num, num2){
            if (mode == 'NEW' && $("#TakeMockPart").val() != num) {
                $(".take_area").val('');
                $("#TakeArea").val('');
            }

            $("#TakeMockPart").val(num);
            if(num != ''){
                $('#GroupCcd').val(num);
            } else {
                $('#GroupCcd').val('');
                $('#karea1').html('');
                $('#karea2').html('');
            }

            if(num == '300'){
                $('#sel3').hide();
            } else {
                $('#sel3').show();
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
                                    str2 += "<li><input type='checkbox' name='Ssubject[]' id='Ssubject"+i+"' value='" + d.data[i].Ccd + "' onClick='selchk(this)'"+ chkyn +"><label for='Ssubject"+i+"'>" + d.data[i].CcdName + "</label></li>";
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
                                    str2 += "<li><input type='checkbox' name='Ssubject[]' id='Ssubject"+i+"' value='" + d.data[i].Ccd + "' onClick='selchk(this)'><label for='Ssubject"+i+"'>" + d.data[i].CcdName + "</label></li>";
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

        function gotab(PredictIdx){
            location.href = '{{ front_url('/predict/popwin2/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val();
        }

        function addAnswer(PredictIdx) {
            location.href = '{{ front_url('/predict/popwin2m/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val() + '&type=answer';
        }

        // 지역+직렬 범위
        function takeNumChk(take_mock_part, take_area, takenum, check_type) {
            takenum = (isNaN(takenum)) ? 0 : takenum;
            var take_mock_position = (check_type == 'm') ? take_mock_part : take_area + take_mock_part;
            var arrItem = {
                'm' : {
                    '100' : {'start': '10001', 'end': '19999'},   //일반공채(남)
                    '200' : {'start': '20001', 'end': '29999'},   //일반공채(여)
                    '300' : {'start': '30001', 'end': '39999'},   //전의경경채
                    '400' : {'start': '40001', 'end': '49999'},   //101단
                    '800' : {'start': '50001', 'end': '59999'},   //경행경채
                },
                'am' : {
                    '712001100': {'start': '10001', 'end': '16975'},
                    '712001200': {'start': '20001', 'end': '23855'},
                    '712001300': {'start': '30001', 'end': '30363'},
                    '712001400': {'start': '40001', 'end': '41687'},
                    '712002100': {'start': '10001', 'end': '12650'},
                    '712002200': {'start': '20001', 'end': '21234'},
                    '712002300': {'start': '30001', 'end': '30090'},
                    '712003100': {'start': '10001', 'end': '11808'},
                    '712003200': {'start': '20001', 'end': '20767'},
                    '712003300': {'start': '30001', 'end': '30075'},
                    '712004100': {'start': '10001', 'end': '12545'},
                    '712004200': {'start': '20001', 'end': '20944'},
                    '712004300': {'start': '30001', 'end': '30048'},
                    '712005100': {'start': '10001', 'end': '11234'},
                    '712005200': {'start': '20001', 'end': '20507'},
                    '712005300': {'start': '30001', 'end': '30069'},
                    '712006100': {'start': '10001', 'end': '10945'},
                    '712006200': {'start': '20001', 'end': '20476'},
                    '712006300': {'start': '30001', 'end': '30052'},
                    '712007100': {'start': '10001', 'end': '10692'},
                    '712007200': {'start': '20001', 'end': '20283'},
                    '712007300': {'start': '30001', 'end': '30068'},
                    '712008100': {'start': '10001', 'end': '14346'},
                    '712008200': {'start': '20001', 'end': '21578'},
                    '712008300': {'start': '30001', 'end': '30257'},
                    '712009100': {'start': '10001', 'end': '12458'},
                    '712009200': {'start': '20001', 'end': '20872'},
                    '712009300': {'start': '30001', 'end': '30155'},
                    '712010100': {'start': '10001', 'end': '11757'},
                    '712010200': {'start': '20001', 'end': '20812'},
                    '712010300': {'start': '30001', 'end': '30064'},
                    '712011100': {'start': '10001', 'end': '10741'},
                    '712011200': {'start': '20001', 'end': '20329'},
                    '712011300': {'start': '30001', 'end': '30084'},
                    '712012100': {'start': '10001', 'end': '11726'},
                    '712012200': {'start': '20001', 'end': '20761'},
                    '712012300': {'start': '30001', 'end': '30150'},
                    '712013100': {'start': '10001', 'end': '10739'},
                    '712013200': {'start': '20001', 'end': '20334'},
                    '712013300': {'start': '30001', 'end': '30048'},
                    '712014100': {'start': '10001', 'end': '10556'},
                    '712014200': {'start': '20001', 'end': '20346'},
                    '712014300': {'start': '30001', 'end': '30048'},
                    '712015100': {'start': '10001', 'end': '11066'},
                    '712015200': {'start': '20001', 'end': '20470'},
                    '712015300': {'start': '30001', 'end': '30037'},
                    '712016100': {'start': '10001', 'end': '11530'},
                    '712016200': {'start': '20001', 'end': '20611'},
                    '712016300': {'start': '30001', 'end': '30130'},
                    '712017100': {'start': '10001', 'end': '10429'},
                    '712017200': {'start': '20001', 'end': '20183'},
                    '712017300': {'start': '30001', 'end': '30080'}
                }
            };

            if (typeof arrItem[check_type][take_mock_position] !== 'undefined') {
                if (takenum < arrItem[check_type][take_mock_position]['start'] || takenum > arrItem[check_type][take_mock_position]['end']) {
                    return false;
                }
            } else {
                return false;
            }
            return true;
        }
    </script>
@stop