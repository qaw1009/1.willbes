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
        .laj_sec .lecTxt {
            text-align:left;
            font-size:12px;
            border:1px solid #e2e2e2;
            padding:10px;
            width: 100%;
            resize: none;
            line-height: 1.3;
            height:150px;
            overflow-y:auto;
        }
    </style>
    
    <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 leaveArmyJoin NGR">
        <div><h3 class="NSK">갓스물 인증</h3></div>
        <div class="laj_sec">
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="CertIdx" id="CertIdx" value="{{$cert_idx}}">
                <input type="hidden" name="CertTypeCcd" id="CertTypeCcd" value="{{$data['CertTypeCcd']}}">
                <input type="hidden" name="file_chk" value="Y"/>

                <h4>수강생 정보</h4>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <caption>가입정보</caption>
                        <thead>
                        <tr>
                            <th class="w-tit">이름</th>
                            <th class="w-tit">아이디</th>
                            <th class="w-tit">전화번호</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input id="memname" name="memname" type="text" value="{{sess_data('mem_name')}}" readonly></td>
                            <td><input id="memid" name="memid" type="text" value="{{sess_data('mem_id')}}" readonly></td>
                            <td><input id="memphone" name="memphone" type="text" value="{{sess_data('mem_phone')}}" readonly></td>
                        </tr>
                        <tr>
                            <td colspan="3">* 전화번호를 꼭 확인해 주세요. 인증완료시 SMS로 발송될 예정입니다.</td>
                        </tr>
                        </tbody>
                    </table>
                    <h4 class="mt40">인증파일 등록</h4>
                    <ul class="attach">
                        <li>
                            <strong>첨부 파일</strong>
                            <input type="file" class="input-file" size="3" id="attachfile" name="attachfile" style="width:70%;">
                        </li>
                        <li>* 인증파일 2MB까지 업로드 가능하며, 이미지파일 (jpg, png, gif 등) 또는 PDF 파일 형태로 첨부<br>
                            * 인증파일 : 주민등록증 또는 운전면허증 사본 등 (주민등록번호 뒤 7자리 가린 후 업로드 요망)<br>
                            * 관리자 인증 시, SMS로 개별 알림</li>
                    </ul>

                    <h4 class="mt40">유의사항</h4>
                    <div class="lecTxt">
                        * 이벤트 대상자 : 주민등록 상 2001.1.1 ~ 2004.12.31 출생자<br>
                        * 쿠폰은 ID당 1번 발급됩니다. (재발급 불가)<br>
                        * 발급되는 쿠폰은 개편PASS 3기에만 사용 가능한 쿠폰으로, 3기 판매기간에만 사용 가능합니다. <br>
                        (판매기간 : ~2021.4.13(화) 18시)<br>
                        * 인증시간 : 오후 4시 이전 요청 시, 당일 승인 | 오후 4시 이후 요청 시 익일 승인<br>
                        ※ 쿠폰 발급기간 : 2021.4.13(화) 16시까지<br>
                        ※ 단, 주말 및 공휴일 인증 요청건의 경우, 휴일 다음날 22시 이전에 일괄 처리<br>
                        <span class="tx-red">* 상기 인증 내용이 다를 경우, 구매한 상품은 취소 및 환불 처리 됩니다.</span>                   
                    </div>

                    <h4 class="mt40">개인정보 수집 및 이용에 대한 안내</h4>
                    <div class="lecTxt">
                        1. 개인정보 수집 이용 목적<br>
                        - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대<br>
                        - 이벤트 참여에 따른 경품 지급<br>
                        <br>
                        2. 개인정보 수집 항목<br>
                        - 신청인의 이름, 아이디, 휴대폰번호<br>
                        <br>
                        3. 개인정보 이용기간 및 보유기간<br>
                        - 본 수집, 활용목적 달성 후 바로 파기<br>
                        <br>
                        4. 개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나,<br>
                        - 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.                       
                    </div>
                    <div class="mt20">
                        위의 내용을 이해하였으며 위와 같은 개인정보 수집 이용에
                        <label for="ACCEPT_YN1"><input type="radio" name="ACCEPT_YN" value="Y" id="ACCEPT_YN1"> 동의합니다. </label>
                        <label for="ACCEPT_YN2"><input type="radio" name="ACCEPT_YN" value="N" id="ACCEPT_YN2"> 동의하지 않습니다.</label>
                    </div>  
                </div>

                <div class="laj_btns">
                    <a href="#none" class="btnA"  id="btn_cert_check">
                        등록
                    </a>
                    <a href="#none" onclick="javascript:self.close();">
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

        function contentInfo(strCate,strProd,strPack,strLearn) {
            location.href= "{{front_url('periodPackage/show')}}/cate/"+strCate+"/pack/"+strPack+"/prod-code/"+strProd
        }
    </script>


@stop