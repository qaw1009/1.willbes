@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .laj_sec input[type=text]  {
            background: #fff;
            height: 25px;
            border: 1px solid #d4d4d4;
            line-height: 25px;
        }
        .attach > li {
            margin-bottom:5px;
        }
    </style>



    <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 leaveArmyJoin NGR">
        <div class="laj_top">
            <h3>전역(예정)간부 간편회원가입</h3>
            <ul>
                <li>회원가입을 하셔야 전직교육과정 <span>"윌비스 PASS"</span>의 신청이 가능합니다.</li>
                <li>기존 가입된 회원의 경우 군복무정보 및 인증파일 등록만 해 주시면 됩니다. <br/>
                    * <span><strong>[가입여부 확인]</strong></span> 버튼을 통해 가입여부를 확인해 주세요.
                </li>
                <li>전직교육과정별 신청 사이트가 상이 하오니, 이 점 유의해 주시기 바랍니다.<br/>
                    ※ 하단 및 상품 신청 페이지의 <span><strong>[교육과정 바로가기]</strong></span> 버튼을 통해 각 사이트를 확인하세요.
                </li>
            </ul>
        </div>

        <div class="laj_tab">
            <strong>교육과정 바로가기</strong>
            <a target="_blank" href="{{ app_url('/promotion/index/cate/3030/code/1113', 'pass')) }}" target="_blank">공무원 / 소방자격증</a>
            <a target="_blank" href="{{ app_url('/promotion/index/cate/3001/code/1121', 'police') }}" target="_blank">경찰</a>
        </div>

        <div class="laj_sec">
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="CertIdx" id="CertIdx" value="{{$cert_idx}}">
                <input type="hidden" name="CertTypeCcd" id="CertTypeCcd" value="{{$data['CertTypeCcd']}}">

                <h4>군복무 정보</h4>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <caption>가입정보</caption>
                        <thead>
                        <tr>
                            <th class="w-tit">군무 기관명</th>
                            <th class="w-tit">군별</th>
                            <th class="w-tit">계급</th>
                            <th class="w-tit">군번</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input id="Affiliation" name="Affiliation"  type="text"></td>
                            <td><input id="WorkType" name="WorkType" type="text"></td>
                            <td><input id="Position" name="Position" type="text"></td>
                            <td><input id="EtcContent" name="EtcContent" type="text"></td>
                        </tr>
                        <tr>
                            <td class="w-file answer tx-left pl-zero" colspan="4">
                                인증파일업로드
                                <ul class="attach mb20">
                                    <li>
                                        <!--div class="filetype">
                                            <input type="text" class="file-text" />
                                            <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                            <span class="file-select"-->
                                                <input type="file" class="input-file" size="3" id="attachfile" name="attachfile" >
                                            <!--/span>
                                            <input class="file-reset NSK" type="button" value="X" />
                                        </div-->
                                    </li>
                                    <li>2MB까지 업로드 가능하며, 이미지파일 (jpg,png등) 또는 PDF파일 형태로 첨부</li>
                                    <li>전역(예정)군인 인증 파일 : 병적증명서(군복무확인서), 전역증, 군인신분증 등</li>
                                    <li class="lastli">상기 인증 내용이 다를 경우, 구매한 상품은 취소 및 환불 처리 됩니다.</li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="laj_btns">
                    <a href="#none" class="btnA"  id="btn_cert_check" >
                        인증완료
                    </a>
                    <a href="javascript:;" onclick="self.close()">
                        닫기
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

            //$('button[name="btn_cert_check"]').on('click', function() {
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
                    alert('군무 기관명을 입력해 주세요.');
                    $('#Affiliation').focus();
                    return;
                }
                if ($('#WorkType').val() == '') {
                    alert('군별을 입력해 주세요.');
                    $('#WorkType').focus();
                    return;
                }
                if ($('#Position').val() == '') {
                    alert('계급을 입력해 주세요.');
                    $('#Position').focus();
                    return;
                }
                if ($('#EtcContent').val() == '') {
                    alert('군번을 입력해 주세요.');
                    $('#EtcContent').focus();
                    return;
                }
                if ($('#attachfile').val() == '') {
                    alert('인증파일을 등록해 주세요.');
                    return;
                }
                var _url = '{!! front_url('CertApply/store/') !!}';
                if (!confirm('저장하시겠습니까?')) { return true; }
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        //notifyAlert('success', '알림', ret.ret_msg);
                        alert('인증 신청이 완료되었습니다.');
                        opener.location.reload();
                        self.close();
                    }
                }, showValidateError, null, false, 'alert');

            });
        });

    </script>


@stop