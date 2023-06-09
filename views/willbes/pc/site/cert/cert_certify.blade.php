@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .leaveArmyJoin div h3 {
            text-align:center;
            font-size:30px;
            border-bottom:3px solid #000;
            padding:20px 0;
        }
        .laj_sec input[type=text]  {
            background: #fff;
            height: 25px;
            border: 1px solid #d4d4d4;
            line-height: 25px;
        }
        .attach > li {
            margin-bottom:5px;
        }
        .attach > li strong {
            display: inline-block;
            width: 80px;
            text-align:center;
        }
        .laj_sec textarea {
            text-align:left;
            font-size:12px;
            border:1px solid #e2e2e2;
            padding:10px;
            width: 95%;
            resize: none;
            line-height: 1.3;
        }

    </style>
    <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 leaveArmyJoin NGR">
        <div><h3 class="NSK">2021년 경찰 1차 시험 응시번호 인증하기</h3></div>
        <div class="laj_sec">
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="CertIdx" id="CertIdx" value="{{$cert_idx}}">
                <input type="hidden" name="CertTypeCcd" id="CertTypeCcd" value="{{$data['CertTypeCcd']}}">
                <h4>수강생 정보</h4>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <caption>가입정보</caption>
                        <thead>
                        <tr>
                            <th class="w-tit">이름</th>
                            <th class="w-tit">응시번호</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input id="memname" name="memname" type="text" value="{{sess_data('mem_name')}}" readonly></td>
                            <td><input type="text" name="TakeNo" id="TakeNo" maxlength="5" numberOnly></td>
                        </tr>                      
                        </tbody>
                    </table>

                    <h4 class="mt40">유의사항</h4>
                    <div style="line-height:1.3;">                    
                    1. 제공되는 무료 강좌는 [내강의실>수강중인 강의>관리자부여강좌>패키지]에서 확인 가능합니다.<br>

                    2. 무료강좌 수강 가능한 유효기간은 30일 입니다.<br>

                    3. 배송비 무료쿠폰, 단과 20% 쿠폰, 단과 10% 쿠폰 유효기간은 7일 입니다.<br>

                    4. 재시생 응시번호 인증 후 관리자 승인 확인되면 쿠폰은 [내쿠폰함]으로 자동발급 되어집니다.<br>
                    &nbsp;&nbsp;&nbsp;(매일 18시 전 지급 / 18시 이후 인증 시 다음날 9시 일괄 지급)<br>

                    5. 제공되는 무료강좌는 인증 후 일괄 지급됩니다.<br>
                    &nbsp;&nbsp;&nbsp;(매일 18시 전 지급 / 18시 이후 인증 시 다음날 9시 일괄 지급)

                    </div>

                    <h4 class="mt40">개인정보 수집 및 이용에 대한 안내</h4>
                    <div>
                    <textarea name="" rows="6" cols="">
1. 개인정보 수집 이용 목적
- 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대
- 이벤트 참여에 따른 경품 지급

2. 개인정보 수집 항목
- 신청인의 이름, 아이디, 휴대폰번호


3. 개인정보 이용기간 및 보유기간
- 본 수집, 활용목적 달성 후 바로 파기

4. 개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익
- 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나,
- 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                    </textarea>
                        <div class="mt20">
                            위의 내용을 이해하였으며 위와 같은 개인정보 수집 이용에
                            <label for="ACCEPT_YN1"><input type="radio" name="ACCEPT_YN" value="Y" id="ACCEPT_YN1"> 동의합니다. </label>
                            <label for="ACCEPT_YN2"><input type="radio" name="ACCEPT_YN" value="N" id="ACCEPT_YN2"> 동의하지 않습니다.</label>
                        </div>
                    </div>
                </div>

                <div class="laj_btns">
                    <a href="#none" class="btnA"  id="btn_cert_check">
                        확인
                    </a>
                    <a href="#none" onclick="self.close();">
                        취소
                    </a>
                </div>
            </form>
        </div>
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

                if ($('#TakeNo').val() == '') {
                    alert('응시번호를 입력해주십시오.');
                }

                if($('input:radio[name=ACCEPT_YN]').is(':checked') == false || $('input:radio[name=ACCEPT_YN]:checked').val() == "N" ) {
                    alert("개인정보 수집 이용에 동의하여 주십시오.");
                    return;
                }
                var _url = '{!! front_url('CertApply/store/') !!}';
                if (!confirm('저장하시겠습니까?')) { return true; }
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        //notifyAlert('success', '알림', ret.ret_msg);
                        alert('인증 신청이 등록되었습니다.');
                        opener.location.reload();
                        self.close();
                    }
                }, showValidateError, null, false, 'alert');

            });

        });

        function contentInfo(strCate,strProd,strPack,strLearn) {
            location.href= "{{front_url('periodPackage/show')}}/cate/"+strCate+"/pack/"+strPack+"/prod-code/"+strProd
        }
    </script>


@stop