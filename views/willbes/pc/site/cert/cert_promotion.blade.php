@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .laj_sec .info {
            line-height:1.4;
        }
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
        <div><h3 class="NSK">경찰공무원 인증</h3></div>
        <div class="laj_sec">
            <div class="info">
                윌비스 경찰 승진사이트는 현직 경찰공무원의 진급시험을 위한 사이트입니다.<br>
                경찰여러분께서는 재직증명서 및 현직 경찰임을 증명할 수 있는 신분증 뒷면 을 등록하여
                현직 경찰임을 인증해 주시기 바랍니다.<br>
                인증을 받으셔야 각종 할인 및 이벤트 혜택이 적용되오니 사이트 이용에 참고하시기 바랍니다.
            </div>

                <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="CertIdx" id="CertIdx" value="{{$cert_idx}}">
                    <input type="hidden" name="CertTypeCcd" id="CertTypeCcd" value="{{$data['CertTypeCcd']}}">
                <div class="LeclistTable mt20">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <caption>가입정보</caption>
                        <thead>
                        <tr>
                            <th class="w-tit">소속</th>
                            <th class="w-tit">직위/직급</th>
                            <th class="w-tit">성명</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input id="Affiliation" name="Affiliation"  type="text"></td>
                            <td><input id="Position" name="Position" type="text"></td>
                            <td><input id="memname" name="memname" type="text" value="{{sess_data('mem_name')}}"></td>
                        </tr>
                        </tbody>
                    </table>

                    <ul class="attach mt20">
                        <li>
                            <strong>첨부 파일</strong>
                            <!--div class="filetype">
                                <input type="text" class="file-text" />
                                <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                <span class="file-select"-->
                                    <input type="file" class="input-file" size="3" id="attachfile" name="attachfile" >
                                <!--/span>
                                <input class="file-reset NSK" type="button" value="X" />
                            </div-->
                        </li>
                        <li>* 파일의 크기는 2MB까지 업로드 가능</li>
                        <li>* 이미지파일 (jpg, png등) 또는 PDF 파일 첨부</li>
                        <li>* 관리자 인증 시, SMS로 개별 알림</li>
                        <li>* 인증시간 : 오후 4시 이전 요청시, 당일 인증 완료 / 오후 4시 이후 요청시 익일 인증완료.</li>
                    </ul>

                    <h4 class="mt40">개인정보 수집 및 이용에 대한 안내</h4>
                    <div>
                    <textarea name="" rows="6" cols="">
1. 개인정보 수집 이용 목적
- 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대
- 이벤트 참여에 따른 경품 지급

2. 개인정보 수집 항목
- 신청인의 소속, 직위/직급, 성명

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
                    <a href="#none" class="btnA" id="btn_cert_check" >
                        인증요청
                    </a>
                    <a href="#none" onclick="self.close()">
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

                if ($('#Affiliation').val() == '') {
                    alert('소속을 입력해 주세요.');
                    $('#Affiliation').focus();
                    return;
                }

                if ($('#Position').val() == '') {
                    alert('직위/직급을 입력해 주세요.');
                    $('#Position').focus();
                    return;
                }

                if ($('#attachfile').val() == '') {
                    alert('첨부파일을 등록해 주세요.');
                    return;
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

    </script>


@stop