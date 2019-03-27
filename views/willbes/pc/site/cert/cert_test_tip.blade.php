@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .eventPop {font-size:12px; color:#333; line-height:1.5}
        .eventPop {width:530px; margin:0 auto}
        .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;}
        .eventPopS1 {margin-top:1em}
        .eventPopS1 span {margin-right:10px}

        .eventPopS2 {margin-top:1em}
        .eventPopS2 span {margin-right:10px}
        .eventPopS2 strong {color:red}
        .eventPopS2 p {border-bottom:1px solid #adadad; padding:1em 0;}

        .eventPopS3 {margin-top:2em}
        .eventPopS3 p {font-weight:bold; margin-bottom:10px}
        .eventPopS3 ul,
        .eventPopS3 li {padding:0; margin:0}
        .eventPopS3 ul {border:1px solid #adadad; padding:10px; overflow-y:scroll; height:100px}
        .eventPopS3 li {margin-left:15px; margin-bottom:5px}
        .eventPopS3 div {margin-top:10px;}
        .eventPopS3 input {vertical-align:middle}

        .eventPopS4 {text-align:center;padding:20px 0; margin-top:20px}
        .eventPopS4 a {margin:0 5px}
        select,
        input[type=file],
        input[type=text] {padding:2px; margin-right:10px}
        }
    </style>

    <div class="willbes-Layer-PassBox NGR">
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="CertIdx" id="CertIdx" value="{{$cert_idx}}">
            <input type="hidden" name="CertTypeCcd" id="CertTypeCcd" value="{{$data['CertTypeCcd']}}">

            <input type="hidden" name="CenCode" id="CenCode" value="police_2018_3">

            <div class="eventPop">
                <h3>경찰면접 역전 꿀팁 대방출 인증하기</h3>
                <div class="eventPopS1">
                    <div>
                        <span>직렬</span>
                        <select  name="TakeKind" id="TakeKind" style="width:120px" >
                            @foreach($data['kind_ccd'] as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
                        <span>지역</span>
                        <select id="TakeArea" name="TakeArea" >
                            @foreach($data['area_ccd'] as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
                        <span>응시번호</span>
                        <input type="text" name="TakeNo" id="TakeNo" style="width:120px" numberOnly>
                    </div>
                    <div class="mt10">
                        <span>추천인아이디</span>
                        <input type="text" name="AddContent1" id="AddContent1" style="width:120px">
                        <span>추천인이름</span>
                        <input type="text" name="AddContent2" id="AddContent2" style="width:120px">
                    </div>
                </div>
                <div class="eventPopS2">
                    <p>
                        * 확인이 어려운 증빙서류를 첨부하거나, 부정한 방법으로 참여했을 경우, 별도 통보 없이 제공된 혜택은 즉시 회수됩니다.<br>
                        * 3차 필기합격생만 적용 및 인증됩니다.<br>
                        * 기존 한번이라도 인증한 회원은 해당사항이 없습니다(2018년 3차 응시번호 기준입니다)  
                    </p>
                </div>
                <div class="eventPopS3">
                    <p>* 개인정보 수집 및 이용에 대한 안내</p>
                    <ul>
                        <li>개인정보 수집 이용 목적 <br>
                            - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 무료특강수강</li>
                        <li>개인정보 수집 항목<br>
                            - 신청인의 이름, 휴대폰 번호, 이메일 주소, 응시정보 (직렬 및 지역, 응시번호, 응시표)
                        </li>
                        <li>개인정보 이용기간 및 보유기간<br>
                            - 본 수집, 활용목적 달성 후 바로 파기
                        </li>
                        <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                            - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나,<br>
                            - 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                        </li>
                    </ul>
                    <div>
                        위의 내용을 이해하였으며 위와 같은 개인정보 수집 이용에 <br>
                        <input name="ACCEPT_YN" id="ACCEPT_YN" type="radio" value="Y"><label for="AA1">동의합니다.</label> <input name="ACCEPT_YN" id="ACCEPT_YN" type="radio" value="N"><label for="BB1">동의하지 않습니다.</label>
                    </div>
                </div>

                <div class="eventPopS4">
                    <a href="#none" id="btn_cert_check" ><img src="http://file3.willbes.net/new_cop/2017/03/EV170310_p_pop_btn1.gif"  alt="확인" /></a>
                    <a href="#none" onclick="self.close()"><img src="http://file3.willbes.net/new_cop/2017/03/EV170310_p_pop_btn2.gif"  alt="취소" /></a>
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

                if($('input:radio[name=ACCEPT_YN]').is(':checked') == false || $('input:radio[name=ACCEPT_YN]:checked').val() == "N" ) {
                    alert("개인정보 수집 이용에 동의하여 주십시오.");return;
                }

                if (!confirm('저장하시겠습니까?')) { return true; }

                var _check_url = '{!! front_url('CertApply/checkTakeNumber/') !!}';
                ajaxSubmit($regi_form, _check_url, function(ret) {
                    if(ret.ret_cd) {
                        alert('인증 신청이 등록되었습니다.');
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