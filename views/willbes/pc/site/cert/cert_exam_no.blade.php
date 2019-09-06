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
                                    @if($cert_idx=='24')
                                        @if($key != '711005')
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
                            <strong>* 2019년 2차 필기합격 응시번호</strong>
                            <input type="text" name="TakeNo" id="TakeNo"  numberOnly>
                        </li>
                        <li>
                            <strong>* 응시표 인증파일 - (jpg, gif, png 파일만 등록 가능)</strong>
                            <input type="file" name="attachfile" id="attachfile" style="width:300px">
                        </li>
                        <!--li>
                            <strong> 추천해준 친구 윌비스 ID</strong>
                            <input type="text" name="AddContent1" id="AddContent1" >
                        </li-->
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
                            - 신청인의 이름, 휴대폰 번호, 이메일 주소, 응시정보 (직렬 및 지역, 응시번호, 필기합격인증이미지)
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

        $(document).ready(function() {

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
    </script>

@stop