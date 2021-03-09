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
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="CertIdx" id="CertIdx" value="{{$cert_idx}}">
            <input type="hidden" name="CertTypeCcd" id="CertTypeCcd" value="{{$data['CertTypeCcd']}}">

            <div class="eventPop">
                <h3>
                    {{$data['CertTitle']}}
                </h3>
                <div class="eventPopS1">
                    <ul>
                        <li>
                            <strong>* 직렬(직류구분)</strong>
                            <select  name="TakeKind" id="TakeKind" style="width:120px" >
                                @foreach($data['kind_ccd'] as $key => $val)
                                    @if($cert_idx=='37'||$cert_idx=='38')
                                        @if($key == '711001' || $key == '711002' || $key == '711004' || $key == '711005')
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endif
                                    @else
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select id="TakeArea" name="TakeArea" >
                                @foreach($data['area_ccd'] as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                            ※ 응시직렬은 최초 선택/저장 후 수정 불가
                        </li>
                        <li>
                            <strong>* 2021년 1차 필기합격 응시번호</strong>
                            <input type="text" name="TakeNo" id="TakeNo" maxlength="5" numberOnly>
                        </li>
                        <li>
                            <strong>* 응시표 인증파일 - (jpg, gif, png 파일만 등록 가능)</strong>
                            <input type="file" name="attachfile" id="attachfile" style="width:300px">
                        </li>
                        <li>
                            <strong> 추천해준 친구 윌비스 ID</strong>
                            <input type="text" name="AddContent1" id="AddContent1" >
                        </li>
                    </ul>
                </div>

                <div class="eventPopS3">
                    <p>* 개인정보 수집 및 이용에 대한 안내</p>
                    <ul>
                        <li>
                            1. 개인정보 수집 이용 목적 <br>
                            - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 무료특강수강
                        </li>
                        <li>개인정보 수집 항목<br>
                            - 신청인의 이름, 휴대폰 번호, 응시정보 (직렬 및 지역, 응시번호, 필기합격인증이미지 , 추천ID)
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
                        <input name="ACCEPT_YN" id="ACCEPT_YN" type="radio" value="Y"><label for="AA1">동의합니다.</label> <input name="ACCEPT_YN" id="ACCEPT_YN" type="radio" value="N"><label for="BB1">동의하지 않습니다.</label>
                    </div>
                </div>

                <div class="btnsSt3">
                    <a href="#none" id="btn_cert_check" >확인</a>
                    <a href="#none" onclick="self.close()">취소</a>
                </div>
            </div>

        </form>
    </div>
    <!--willbes-Layer-PassBox//-->

    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var take_num_check_type = 'm';     //인증번호 검승스크립트 타입 (m:직렬형태, am:지역+직렬형태)

        $(document).ready(function() {
            $('#TakeKind').change(function () {
                if (this.value == '711004') {
                    $('#TakeArea').val("712001").prop("selected", true);
                    $('#TakeArea option').each(function(){
                        if (this.value != '712001') {
                            $("select option[value*='"+this.value+"']").prop('disabled',true);
                        }
                    });
                } else {
                    $('#TakeArea option').each(function(){
                        $("select option[value*='"+this.value+"']").prop('disabled',false);
                    });
                }
            });

            $("#btn_cert_check").click(function () {
                @if($data["IsCertAble"] !== 'Y')
                alert("인증 신청을 할 수 없습니다.");return;
                @endif

                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

                @if($data['ApprovalStatus'] == 'A' )
                alert("신청하신 내역이 존재하며 '미승인' 상태입니다. ");return;
                @elseif($data['ApprovalStatus'] == 'Y' )
                alert("이미 '승인'된 인증입니다.");return;
                @endif

                if ($('#TakeKind').val() == '') {
                    alert('직렬을 선택해 주세요.');$('#TakeKind').focus();return;
                }

                if ($('#TakeArea').val() == '') {
                    alert('지역을 선택해 주세요.');$('#TakeArea').focus();return;
                }

                if ($('#TakeNo').val() == '') {
                    $('#TakeNo').focus();alert('응시번호를 등록해 주세요.');return;
                }

                var takenum = $('#TakeNo').val();
                takenum = parseInt(takenum);
                if (takeNumChk($("#TakeKind").val(), $("#TakeArea").val(), takenum, take_num_check_type) != true) {
                    alert('올바른 응시번호가 아닙니다.');
                    return;
                }

                if ($('#attachfile').val() == '') {
                    alert('인증파일을 등록해 주세요.');
                    return;
                }

                if($('input:radio[name=ACCEPT_YN]').is(':checked') == false || $('input:radio[name=ACCEPT_YN]:checked').val() == "N" ) {
                    alert("개인정보 수집 이용에 동의하여 주십시오.");return;
                }

                if (!confirm('저장하시겠습니까?')) { return true; }

                var _check_url = '{!! front_url('/CertApply/checkTakeNumber/') !!}';
                ajaxSubmit($regi_form, _check_url, function(ret) {
                    if(ret.ret_cd) {
                        alert('정상적으로 등록되었습니다.');
                        opener.location.reload();
                        self.close();
                    } else {
                        alert("인증 확인이 불가합니다. 운영자에게 문의하여 주십시오.");return;
                    }
                }, showValidateError, null, false, 'alert');
            });

            $("input:text[numberOnly]").on("keyup", function() {
                $(this).val($(this).val().replace(/[^0-9]/g,""));
            });

        });

        // 지역+직렬 범위
        function takeNumChk(take_mock_part, take_area, takenum, check_type) {
            takenum = (isNaN(takenum)) ? 0 : takenum;
            var take_mock_position = (check_type == 'm') ? take_mock_part : take_area + take_mock_part;
            var arrItem = {
                'm' : {
                    '711001' : {'start': '10001', 'end': '19999'},   //일반공채(남)
                    '711002' : {'start': '20001', 'end': '29999'},   //일반공채(여)
                    '711005' : {'start': '30001', 'end': '39999'},   //전의경경채
                    '711004' : {'start': '40001', 'end': '49999'},   //101단
                    '711003' : {'start': '50001', 'end': '59999'},   //경행경채
                },
                'am' : {
                    '712001711001': {'start': '10001', 'end': '16975'},
                    '712001711002': {'start': '20001', 'end': '23855'},
                    '712001711005': {'start': '30001', 'end': '30363'},
                    '712001711004': {'start': '40001', 'end': '41687'},
                    '712002711001': {'start': '10001', 'end': '12650'},
                    '712002711002': {'start': '20001', 'end': '21234'},
                    '712002711005': {'start': '30001', 'end': '30090'},
                    '712003711001': {'start': '10001', 'end': '11808'},
                    '712003711002': {'start': '20001', 'end': '20767'},
                    '712003711005': {'start': '30001', 'end': '30075'},
                    '712004711001': {'start': '10001', 'end': '12545'},
                    '712004711002': {'start': '20001', 'end': '20944'},
                    '712004711005': {'start': '30001', 'end': '30048'},
                    '712005711001': {'start': '10001', 'end': '11234'},
                    '712005711002': {'start': '20001', 'end': '20507'},
                    '712005711005': {'start': '30001', 'end': '30069'},
                    '712006711001': {'start': '10001', 'end': '10945'},
                    '712006711002': {'start': '20001', 'end': '20476'},
                    '712006711005': {'start': '30001', 'end': '30052'},
                    '712007711001': {'start': '10001', 'end': '10692'},
                    '712007711002': {'start': '20001', 'end': '20283'},
                    '712007711005': {'start': '30001', 'end': '30068'},
                    '712008711001': {'start': '10001', 'end': '14346'},
                    '712008711002': {'start': '20001', 'end': '21578'},
                    '712008711005': {'start': '30001', 'end': '30257'},
                    '712009711001': {'start': '10001', 'end': '12458'},
                    '712009711002': {'start': '20001', 'end': '20872'},
                    '712009711005': {'start': '30001', 'end': '30155'},
                    '712010711001': {'start': '10001', 'end': '11757'},
                    '712010711002': {'start': '20001', 'end': '20812'},
                    '712010711005': {'start': '30001', 'end': '30064'},
                    '712011711001': {'start': '10001', 'end': '10741'},
                    '712011711002': {'start': '20001', 'end': '20329'},
                    '712011711005': {'start': '30001', 'end': '30084'},
                    '712012711001': {'start': '10001', 'end': '11726'},
                    '712012711002': {'start': '20001', 'end': '20761'},
                    '712012711005': {'start': '30001', 'end': '30150'},
                    '712013711001': {'start': '10001', 'end': '10739'},
                    '712013711002': {'start': '20001', 'end': '20334'},
                    '712013711005': {'start': '30001', 'end': '30048'},
                    '712014711001': {'start': '10001', 'end': '10556'},
                    '712014711002': {'start': '20001', 'end': '20346'},
                    '712014711005': {'start': '30001', 'end': '30048'},
                    '712015711001': {'start': '10001', 'end': '11066'},
                    '712015711002': {'start': '20001', 'end': '20470'},
                    '712015711005': {'start': '30001', 'end': '30037'},
                    '712016711001': {'start': '10001', 'end': '11530'},
                    '712016711002': {'start': '20001', 'end': '20611'},
                    '712016711005': {'start': '30001', 'end': '30130'},
                    '712017711001': {'start': '10001', 'end': '10429'},
                    '712017711002': {'start': '20001', 'end': '20183'},
                    '712017711005': {'start': '30001', 'end': '30080'}
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