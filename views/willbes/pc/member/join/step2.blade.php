@extends('willbes.pc.layouts.master')

@section('content')
<style type="text/css">
        .policyNew {padding:20px}
        .policyNew {padding:20px}
        .policyNew h3 {font-size:18px; color:#0c5dc0 !important; margin-bottom:20px; color:#06F; border-bottom:2px solid #0c5dc0; padding-bottom:10px}
        .policyNew p {margin-bottom:20px; font-weight:bold; font-size:14px; color:#333; border-bottom:1px solid #ccc; border-top:1px solid #ccc; padding:10px 0}
        .policyNew div {margin-bottom:10px}
        .policyNew ul,
        .policyNew ol {margin-bottom:30px}
        .policyNew li {margin-bottom:8px; line-height:1.5; margin-left:20px}

        .titsubject {margin-top:20px; background:#f3f2f2; padding:20px 20px 10px; }
        .titsubject li {display:inline; float:left; width:50%; margin-left:0}
        .titsubject li a {color:#000}
        .titsubject:after {content:""; display:block; clear:both}

        .policyNew th {background:#f0f0f0; border-right:#d7d7d7 1px solid; border-bottom:#d7d7d7 1px solid; color:#666; padding:10px 0}
        .policyNew td {border-right:#d7d7d7 1px solid; border-bottom:#d7d7d7 1px solid; padding:8px; line-height:1.5}
        .policyNew th:last-child,
        .policyNew td:last-child {border-right:0}
        .policyNew tr.trTypeA td:last-child {border-right:#d7d7d7 1px solid}
        .policyNew tr.trTypeB td:last-child {border-bottom:#666 1px solid}
        .policyNew tr.trTypeC th {border-bottom:#666 1px solid}
        .policyNew tr:last-child td {border-bottom:0}
        .policyNew table.tdCenter td {text-align:center}
        .policyNew table {width:100%; border-collapse:collapse; border-spacing:0; border:#666 1px solid !important; background:#fff; margin:10px 0}
        .policyNew .txtInfo {margin:40px 0}
        .policyNew .tit2 {color:#F33}
    </style>

    <form name="join_form" id="join_form" method="post" novalidate="novalidate">
        {!! csrf_field() !!}
        <input type="hidden" name="CertifiedInfoTypeCcd" id="CertifiedInfoTypeCcd" value="{{$jointype}}" />
        <input type="hidden" name="enc_data" id="enc_data" value="{{$enc_data}}" />
        <!-- Container -->
        <div id="Container" class="memContainer widthAuto c_both">
            <div class="mem-Tit">
                <img src="{{ img_url('login/logo.gif') }}">
                <span class="tx-blue">통합회원가입</span>
            </div>
            <!-- 통합회원가입 : 약관동의/정보입력 -->
            <div class="Member mem-Combine widthAuto690">
                <ul class="tabs-Step mb60">
                    <li>본인인증</li>
                    <li class="on">약관동의/정보입력</li>
                    <li>회원가입완료</li>
                </ul>

                <table cellspacing="0" cellpadding="0" class="combineTable mb60">
                    <colgroup>
                        <col style="width: 100px;"/>
                        <col style="width: 590px;"/>
                    </colgroup>
                    <thead>
                    <tr>
                        <th class="tx-blue tx-left" colspan="2">* 필수정보</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="combine-Tit">이름</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="txtMemName" name="txtMemName" class="iptName" disabled value="{{$memName}}">
                                <input type="hidden" id="MemName" name="MemName" value="{{$memName}}">
                                <ul class="chkBox-Sex">
                                    <li class="radio-Btn sexchk p_re checked">
                                        <label for="Sex" class="labelName" style="display: block;">남성</label>
                                        <input type="radio" id="SexM" name="Sex" class="chkSex" value="M" title="성별" checked="checked">
                                    </li>
                                    <li class="radio-Btn sexchk p_re">
                                        <label for="Sex" class="labelName" style="display: block;">여성</label>
                                        <input type="radio" id="SexF" name="Sex" class="chkSex" value="F" title="성별">
                                    </li>
                                </ul>
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">생년월일</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="BirthDay" name="BirthDay" class="iptBirth" placeholder="ex.19800101" maxlength="8" />
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">휴대폰번호</td>
                        <td>
                            <div class="inputBox p_re">
                                @if ( $jointype == '655002' )
                                    <input type="text" id="txtPhone" name="txtPhone" class="iptPhone" placeholder='"-" 제외하고 숫자만 입력' maxlength="13" value="{{$phone}}" disabled title="핸드폰번호" />
                                    <input type="hidden" id="Phone" name="Phone" value="{{$phone}}" />
                                @else
                                    <input type="text" id="Phone" name="Phone" class="iptPhone" placeholder='"-" 제외하고 숫자만 입력' maxlength="13" title="핸드폰번호" />
                                @endif
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                            <div class="tx-red mt10" style="display: block;">
                                <input name="SmsRcvStatus" type="checkbox" value="Y" id="SmsRcvStatus" />
                                <label for="SmsRcvStatus">
                                    윌비스의 신규상품 안내 및 광고성 정보 SMS 수신에 동의합니다.
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">아이디</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="MemId" name="MemId" class="iptId" placeholder="4~20자리 영문 소문자, 숫자만 입력 가능" maxlength="20" title="아이디" />
                                <!-- <button type="submit" onclick="" class="mem-Btn combine-Btn ml5 bg-dark-blue bd-dark-blue">
                                    <span>중복확인</span>
                                </button> -->
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">비밀번호</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="password" id="MemPassword" name="MemPassword" class="iptPwd" placeholder="8~20자리이하 영문대소문자, 숫자, 특수문자중2종류조합" maxlength="20" title="비밀번호" />
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">비밀번호확인</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="password" id="MemPassword_chk" name="MemPassword_chk" class="iptPwd" placeholder="비밀번호 확인" maxlength="20" title="비밀번호 확인" />
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table cellspacing="0" cellpadding="0" class="combineTable">
                    <colgroup>
                        <col style="width: 100px;"/>
                        <col style="width: 590px;"/>
                    </colgroup>
                    <thead>
                    <tr>
                        <th class="tx-blue tx-left" colspan="2">* 선택정보</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="combine-Tit">이메일</td>
                        <td>
                            <div class="inputBox p_re">
                                <dl>
                                    <dt class="mbox1 p_re">
                                        <input type="text" id="MailId" name="MailId" class="iptEmail01" placeholder="이메일" maxlength="30" @if ( $jointype == '655003' ) value="{{$MailId}}" readonly @endif>
                                    </dt>
                                    <dt class="mbox-dot">@</dt>
                                    <dt class="mbox2">
                                        <input type="text" id="MailDomain" name="MailDomain" class="iptEmail02" maxlength="30" @if ( $jointype == '655003' ) value="{{$MailDomain}}" readonly @endif>
                                    </dt>
                                    <dt class="mbox-sele">
                                        <select id="domain" name="domain" title="직접입력" class="seleEmail" @if ( $jointype == '655003' ) disabled @endif>
                                            @foreach($mail_domain_ccd as $key => $val)
                                                <option value="{{ $key }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </dt>
                                </dl>
                            </div>
                            <div class="tx-red mbox-txt mt10" style="display: block;">
                                <input name="MailRcvStatus" type="checkbox" value="Y" id="MailRcvStatus" />
                                <label for="MailRcvStatus">
                                    윌비스의 신규상품 안내 및 광고성 정보 이메일 수신에 동의합니다.
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">우편번호</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="ZipCode" name="ZipCode" class="iptEmail01" xstyle="width: 100%" placeholder="우편번호" maxlength="5" readonly>
                                <button type="button" id="btn_zipcode" class="mem-Btn combine-Btn mb10 bg-dark-blue bd-dark-blue">
                                    <span>우편번호 찾기</span>
                                </button>
                                <div class="addbox1 p_re">
                                    <input type="text" id="Addr1" name="Addr1" class="iptAdd1" placeholder="기본주소" maxlength="50" readonly>
                                </div>
                                <div class="addbox2 p_re">
                                    <input type="text" id="Addr2" name="Addr2" class="iptAdd2" placeholder="상세주소" maxlength="50">
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="agree-Chk mt40 toggle">
                    <div class="AllchkBox agree-All-Tit p_re">
                        전체동의
                        <div class="chkBox-Agree">
                            <input type="checkbox" id="agree_all" name="agree_all" class="" >
                        </div>
                    </div>
                    <ul>
                        <li class="chk">
                            <div class="chkBox-Agree">
                                <input type="checkbox" id="agree1" name="agree1" class="" >
                            </div>
                            <div class="agree-Tit">
                                <a href="#none">
                                    <span class="tx-blue">(필수)</span> 만 14세 이상입니다. <span class="tx12">( 만 14세 미만은 회원가입이 제한됩니다.)</span>
                                </a>
                            </div>
                        </li>
                        <li class="chk">
                            <div class="chkBox-Agree">
                                <input type="checkbox" id="agree2" name="agree2" class="" >
                            </div>
                            <div class="agree-Tit">
                                <a href="#none">
                                    <span class="tx-blue">(필수)</span> Willbes 통합회원 이용약관 동의<span class="arrow">▼</span>
                                </a>
                            </div>
                            <div class="agree-Txt">
                                <div class="policyNew">
                                    <h3>이용약관</h3>
                                    <ol class="titsubject">
                                        <li><a href="#N01">제 1 장 총칙</a></li>
                                        <li><a href="#N02">제 2 장 회원가입</a></li>
                                        <li><a href="#N03">제 3 장 서비스 이용계약</a></li>
                                        <li><a href="#N04">제 4 장 서비스 환불</a></li>
                                        <li><a href="#N05">제 5 장 손해배상</a></li>
                                    </ol>

                                    <p id="N01">제 1 장 총 칙</p>
                                    <div>
                                        <strong>제1조 [목적]</strong><br />
                                        본 약관은 (주)윌비스(이하 "회사"라 합니다)가 웹사이트 통하여 제공하는 교육정보서비스(이하 "서비스"라 합니다)의 이용과 관련하여 회사와 회원 사이에 권리ㆍ의무 및 책임사항 등을 규정함을 목적으로 합니다.<br />
                                        <br />
                                        <strong>제2조 [약관의 게시 및 효력과 변경]</strong><br />
                                        ① 회사는 이용자가 별도의 연결 화면을 통하여 약관을 확인할 수 있도록 회사 웹사이트에 게시하며, 약관의 전문을 출력할 수 있도록 하고 있습니다.<br />
                                        ② 회사는 약관의 내용을 굵은 문자 또는 색채 등으로 명확하게 표시하여 이용자가 알아보기 쉽도록 하고 있습니다.<br />
                                        ③ 본 약관은 이용자가 약관의 내용에 동의하며 회원가입을 신청하고, 회사가 그 신청에 대하여 승낙함으로써 효력이 발생합니다.<br />
                                        ④ 회사는 기존 회원이 본 약관 본 조 제6항에 따른 공지 또는 통지에도 불구하고, 동 기간 내에 이의를 제기하지 않는 경우에는 변경된 약관을 승인한 것으로 봅니다.<br />
                                        ⑤ 회사는 관계 법령을 위배하지 않는 범위에서 본 약관을 개정할 수 있습니다.<br />
                                        ⑥ 회사가 약관을 개정할 경우에는 적용 일자 및 개정 사유를 명시하여, 개정 전 약관과 함께 적용일 최소 14일 전부터 회사 웹사이트에서 확인할 수 있도록 게시하며, 기존 회원에게는 본 약관 제5조의 방법을 통하여 약관 개정 사실을 통지합니다.<br />
                                        ⑦ 기존 회원이 변경된 약관에 동의하지 않는 경우 서비스 이용을 중단하고 회원 탈퇴를 할 수 있습니다.<br />
                                        <br />
                                        <strong>제3조 [약관 외 준칙]</strong><br />
                                        본 약관에 명시되지 않은 사항에 대해서는 관련 법령, 회사가 정한 서비스의 개별 이용 약관, 세부 이용 지침 및 규칙 등의 규정을 따르게 됩니다<br />
                                        <br />
                                        <strong>제4조 [용어의 정의]</strong><br />
                                        ① 본 약관에서 사용하는 용어의 정의는 다음과 같습니다. <br />
                                        - “이용자”라 함은 “회사”의 웹사이트에 접속하여 본 약관에 따라 “회사”가 제공하는 “콘텐츠” 및 제반 서비스를 이용하는“회원” 및 “비회원”을 말합니다.<br />
                                        - “회원”이라 함은 회사의 웹사이트에 접속하여 본 약관에 동의 함으로써 회사와 이용계약을 체결하고 아이디(ID)를 부여 받은 자로서 회사가 제공하는 정보와 서비스를 지속적으로 이용할 수 있는 자를 말합니다.<br />
                                        - “콘텐츠”라 함은 회사가 제작하여 웹사이트에서 제공하는 온라인 강좌 및 기타 관련 정보를 의미함으로써, 정보통신망 이용촉진 및 정보보호 등에 관한 법률 제2조 제1항 제1호의 규정에 의한 정보 통신망에서 사용되는 부호ㆍ문자ㆍ음성ㆍ음향ㆍ이미지 또는 영상 등으로 표현된 자료 또는 정보를 말합니다.<br />
                                        - “아이디(ID)”라 함은 회원의 식별 및 서비스 이용을 위하여 회원이 정하고 회사가 승인하는 문자 또는 숫자의 조합을 말합니다.<br />
                                        - “비밀번호(PASSWORD)”라 함은 서비스 이용 시, 아이디와 일치되는 회원임을 확인하고, 회원 개인정보 보호를 위하여, 회원 자신이 정한 문자 또는 숫자의 조합을 말합니다.<br />
                                        - “전자우편(Email)”이라 함은 인터넷을 통한 우편 혹은 전기적 매체를 이용한 우편을 말합니다.<br />
                                        - “운영자(관리자)”라 함은 서비스의 전반적인 관리와 원활한 운영을 위하여 회사에서 선정한 사람 또는 회사를 말합니다.<br />
                                        - “회원의 게시물”이라 함은 회사의 서비스가 제공되는 웹사이트에 회원이 올린 글, 이미지, 각종 파일 및 링크, 각종 댓글 등의 정보를 의미합니다.<br />
                                        - “포인트”라 함은 회원의 서비스 이용에 대한 대가로서 회사가 적립시켜 주는 적립금을 말하며, 그 이용 등에 관한 구체적인 사항은 본 약관 제16조에 에 따릅니다.<br />
                                        ② 전항 각 호에 해당하는 정의 이외의, 기타 용어의 정의에 대하여는 거래 관행 및 관계 법령에 따릅니다. <br />
                                        <br />
                                        <strong>제5조 ["회원"에 대한 통지]</strong><br />
                                        ① 회사는 회원에게 알려야 할 사항이 발생하는 경우, 회원가입 시 회원이 공개한 전자우편 또는 팝업창, 유ㆍ무선 등의 방법으로 통지할 수 있습니다.<br />
                                        ② 회사는 회원 전체에 대한 통지의 경우 최소 14일 이상 회사 웹사이트 게시판에 게시함으로써 전항의 통지에 갈음할 수 있습니다. 다만, 회원 본인의 거래 및 사이트의 이용과 관련하여 중대한 영향을 미치는 사항에 대하여는 30일 이상 전항과 동일한 방법으로 별도 통지할 수 있습니다.
                                    </div>


                                    <p id="N02">제 2 장 회원가입</p>
                                    <div>
                                        <strong>제6조 [회원가입]</strong><br />
                                        ① 회원으로 가입하여 회사 서비스의 이용을 희망하는 자는 약관의 내용을 숙지한 후 동의함을 표시하고, 회사가 제시하는 소정의 회원가입 양식에 관련 사항을 기재하여 회원가입을 신청하여야 합니다.<br />
                                        ② 회사는 전항에 따라 회원이 온라인 회원가입 신청 양식에 기재하는 모든 회원 정보를 실제 데이터인 것으로 간주합니다.<br />
                                        ③ 실명이나 실제 정보를 입력하지 않은 회원은 법적인 보호를 받을 수 없으며, 본 약관의 관련 규정에 따라 서비스 사용에 제한을 받을 수 있습니다.<br />
                                        ④ 회사는 본 조 제1항에 따른 이용자의 신청에 대하여 회원가입을 승낙함을 원칙으로 합니다. 다만, 회사는 다음 각 호에 해당하는 신청에 대하여는 승낙을 하지 않을 수 있으며, 승낙 이후라도 취소할 수 있습니다.<br />
                                        - 이용자의 귀책사유로 인하여 승인이 불가능한 경우<br />
                                        - 실명을 사용하지 않은 경우<br />
                                        - 타인의 명의 또는 개인정보를 도용하는 경우<br />
                                        - 허위의 정보를 제공하는 경우<br />
                                        - 중복된 아이디 또는 본인인증 정보(이메일 주소, 휴대폰 번호)를 사용하는 경우<br />
                                        - 회사가 제시하는 회원가입 신청 양식에 관련 내용을 기재하지 않은 경우<br />
                                        - 이전에 회사 이용약관 또는 관계 법령을 위반하여 회원 자격이 상실되었던 경우<br />
                                        - 본 약관 제18조 [회원의 의무]를 위반하는 경우<br />
                                        - 기타 본 약관 및 관계 법령을 위반하는 경우<br />
                                        - 회원가입 신청 양식에 기재되어 회사에 제공되는 개인정보(ID, 비밀번호, 주소 등)가 선량한 풍속 기타 사회질서에 위배되거나 타인을 모욕하는 경우<br />
                                        - 당사의 서비스를 고의로 방해하였을 경우<br />
                                        ⑤ 회사는 서비스 관련 설비의 여유가 없거나, 기술상 또는 업무상 문제가 있는 경우에는 승낙을 유보할 수 있습니다.<br />
                                        ⑥ 회사가 본 조 제4항과 제5항에 따라 회원가입 신청의 승낙을 하지 아니하거나 유보한 경우에는 팝업창을 통하여 즉시 이용자(신청자)에게 알립니다. 단, 회사의 귀책사유 없이 신청자에게 알릴 수 없는 경우에는 예외로 합니다.<br />
                                        <br />
                                        <strong>제7조 [회원정보의 변경]</strong><br />
                                        ① 회원은 회사 웹사이트 “정보수정” 페이지에서 언제든지 자신의 개인정보를 열람하고 수정할 수 있습니다.<br />
                                        ② 회원이 전항의 변경사항을 수정하지 않아 발생한 불이익에 대하여 회사는 책임지지 않습니다.  <br />
                                        <br />
                                        <strong>제8조 [“회원”의 “아이디” 및 “비밀번호”의 관리에 대한 의무]</strong><br />
                                        ① 회원은 아이디와 비밀번호에 대한 관리책임이 있으며, 이를 타인에게 공개하여 제3자가 이용하도록 하여서는 아니 됩니다.<br />
                                        ② 회원은 자신의 아이디 및 비밀번호가 유출되어 제3자에 의해 사용되고 있음을 인지한 경우, 즉시 회사에 알려야 합니다.<br />
                                        ③ 회사는 전항의 경우 회원의 개인정보보호 및 기타 서비스 부정이용행위 방지 등을 위하여 회원에게 비밀번호의 변경 등 필요한 조치를 요구할 수 있으며, 회원은 회사의 요구가 있는 즉시 회사의 요청에 성실히 응해야 합니다.<br />
                                        ④ 회사는 회원이 본 조 제2항 및 제3항에 따른 의무를 성실히 이행하지 않아 발생한 불이익에 대하여 책임지지 않습니다. <br />
                                        <br />
                                        <strong>제9조 [이용계약의 해지•해제 등]</strong><br />
                                        ① 회원이 이용계약의 해지 또는 해제를 원할 경우에는 본인이 회사 고객센터에 전화 접수를 하거나 웹사이트를 통하여 신청할 수 있으며, 회사는 회원의 의사표시를 수령한 후 지체 없이 이러한 사실을 회신하고 본 약관에 따라 환불 등의 조치를 취합니다.<br />
                                        ② 회사는 회원이 본 약관 또는 관계 법령을 위반하는 경우, 이용계약을 해지할 수 있습니다. <br />
                                    </div>


                                    <p id="N03">제 3 장 서비스 이용계약</p>
                                    <div>
                                        <strong>제10조 [서비스의 원활한 이용]</strong><br />
                                        ① 회사는 서비스의 원활한 제공을 위하여 이용자가 웹사이트 접속 시, 회사에서 제작 및 배포하는 ActiveX Control의 설치를 권장합니다.<br />
                                        ② 이용자가 프로그램 설치를 위하여 설치 동의 [“예”] 버튼을 클릭하면, 회원 PC에 자동으로 설치됩니다.<br />
                                        ③ 이용자가 회사에서 권장하는 본 조 제1항의 프로그램을 설치하지 않는 경우 일부 서비스 이용에 어려움이 있을 수 있습니다. <br />
                                        <br />
                                        <strong>제11조 [콘텐츠 이용에 필요한 기술사양]</strong><br />
                                        ① 회사가 제공하는 콘텐츠를 이용하는데 필요한 PC의 최소사양은 아래와 같습니다.<br />
                                        - CPU: Pentium dualcore 2.1 이상<br />
                                        - 메모리: 4G 이상<br />
                                        - HDD: C:\ 공간이 2G이상<br />
                                        - VGA : NVIDIA GeForce FX 5200 Memory: 128MB <br />
                                        ATI Radeon 9500 128MB 이상<br />
                                        - 운영체제 : Windows 7 이상<br />
                                        - DirectX : 9.0 이상<br />
                                        - Internet Explorer : 8.0 이상<br />
                                        ② 회사가 제공하는 콘텐츠를 이용할 수 있는 학습기기의 기술사양은 고객센터에 전화로 문의하거나 회사 웹사이트 내에서 확인할 수 있습니다.  <br />
                                        <br />
                                        <strong>제12조 [거래조건에 대한 정보의 표시]</strong><br />
                                        ① 회사는 다음 각 호에 해당하는 사항을 해당 콘텐츠 또는 그 포장에 표시합니다.<br />
                                        - 콘텐츠의 명칭, 종류, 내용, 가격, 이용기간<br />
                                        - 콘텐츠 이용에 필요한 전자매체의 최소한의 기술사양<br />
                                        - 휴대가 가능한 학습용 전자기기의 사용가능 여부<br />
                                        - 환불기준 등 서비스 이용계약의 해지방법 및 효과<br />
                                        - 이용약관 및 개인정보처리방침<br />
                                        ② 회사는 전항 각 호의 사항을 회사 웹사이트, 본 이용약관, 개인정보처리방침 등에서 이미 고지하고 있는 경우, 별도로 표시하지 않을 수 있습니다.  <br />
                                        <br />
                                        <strong>제13조 [서비스 이용계약의 성립 및 결제방법 등]</strong>
                                        ① 회원은 회사가 제공하는 다음 각 호 또는 이와 유사한 절차에 의하여 콘텐츠 서비스 이용을 신청을 합니다. 회사는 계약 체결 전, 다음 각 호의 사항에 관하여 회원이 정확하게 이해하고 실수 또는 착오 없이 거래할 수 있도록 정보를 제공합니다.<br />
                                        - 콘텐츠 목록의 열람 및 선택<br />
                                        - 콘텐츠 상세정보 확인<br />
                                        - 결제하기 클릭<br />
                                        - 주문상품 및 결제금액 확인<br />
                                        - 성명, 주소, 연락처 등 배송지 정보 입력<br />
                                        - 결제수단 선택<br />
                                        - 결제금액 재확인<br />
                                        - 결제<br />
                                        ② 회원은 신용카드, 무통장입금, 실시간계좌이체 등 회사에서 정하고 있는 방법으로 유료서비스의 결제가 가능합니다. 다만, 각 결제수단마다 결제수단의 특성에 따른 일정한 제한이 있을 수 있습니다.<br />
                                        ③ 미성년 회원의 결제는 원칙적으로 보호자의 명의 또는 보호자 동의 하에 이루어져야 하고, 보호자는 본인 동의 없이 체결된 자녀(미성년자)의 계약을 취소할 수 있습니다.<br />
                                        ④ 미성년자가 유료서비스의 대금을 자신의 명의로 결제하는 경우, 당해 미성년자는 보호자의 승낙을 증명하는 문서, 전자우편 등을 제공하거나 유•무선을 통하여 확인을 할 수 있도록 보호자의 연락처를 제공하여야 합니다. 만약 이러한 절차를 이행하지 않을 경우 결제금액은 보호자에 의하여 처분이 허락된 재산으로 볼 수 있습니다.<br />
                                        ⑤ 회사는 보호자의 동의 여부를 유/무선의 방법을 통하여 확인할 수 있습니다.<br />
                                        ⑥ 회사는 회원의 유료서비스 이용신청이 다음 각 호에 해당하는 경우에는 승낙하지 않거나, 그 사유가 해소될 때까지 승낙을 유보할 수 있습니다.<br />
                                        - 유료 서비스의 이용요금을 납입하지 않는 경우<br />
                                        - 유료 서비스 신청금액 총액과 입금총액이 일치하지 않은 경우<br />
                                        - 기타 합리적인 이유가 있는 경우로서 회사가 필요하다고 인정되는 경우<br />
                                        ⑦ 회사는 회원이 본조 위 조항의 절차에 따라 유료서비스 이용을 신청할 경우, 승낙의 의사표시로써 본 약관 제5조의 방법을 통하여 회원에게 통지하고, 승낙의 통지가 회원에게 도달한 시점에 계약이 성립한 것으로 봅니다.<br />
                                        ⑧ 회사의 승낙의 의사표시에는 회원의 이용신청에 대한 확인 및 서비스제공 가능여부, 이용신청의 정정, 취소 등에 관한 정보 등을 포함합니다.<br />
                                        <br />
                                        <strong>제14조 [강좌 서비스 이용관련]</strong><br />
                                        ① 회원은 회사가 제공하는 강좌 서비스를 이용할 수 있습니다.<br />
                                        ② 회사는 강좌 서비스를 유료로 제공할 수 있으며 이 경우 이용요금과 이용조건, 결제방법 등은 회사가 별도 고지하는 절차에 따릅니다.<br />
                                        (예 : 회원이 신청한 강좌 정보에 안내된 배수에 따라 각 회차별 기준으로 해당 배수만큼 수강 가능 시간을 제공합니다. 단, 강좌의 수강기간 내에서만 수강할 수 있습니다.)<br />
                                        ③ 회사는 회원이 강좌 서비스의 수강을 시작하는 경우 회원이 신청한 강좌 서비스를 즉시 이용할 수 있도록 합니다.<br />
                                        ④ 회원은 수강 신청 시 신청일로부터 30일이내의 범위에서 수강시작일을 지정할 수 있으며, 수강시작일 지정 후 1회에 한하여 신청일 기준으로 30일 이내에서 수강시작일을 재지정할 수 있습니다. (수강중인 강좌는 시작일을 변경할 수 없습니다.)<br />
                                        ⑤ 회원은 강좌 서비스에 대하여 수강 기간 내 총 3회까지 강좌 서비스의 일시 정지를 신청할 수 있으며, 수강 잔여기간 내에서만 일지정지가 가능합니다. (수강 잔여 기간이 50일이 남았을 경우 최대 일시정지 기간은 50일을 초과하지 못합니다.)
                                        다만, 일시 정지 기간이 경과한 경우에는 강좌 서비스가 자동으로 재개됩니다.<br />
                                        ⑥ 회원은 다음 각 호에서 정한 기간과 횟수에 따라 강좌 서비스 이용기간 연장 신청을 할 수 있습니다.<br />
                                        - 연장신청은 해당 강좌 수강기간 종료일 이전까지만 유료로 신청 및 결제할 수 있습니다.<br />
                                        (1일 수강료 산출 기준 : 강좌의 정상가÷수강기간)<br />
                                        - 연장 신청 횟수는 총 3회까지 가능합니다.<br />
                                        - 연장 신청은 본 강좌 수강기간의 50% 범위 내에서만 가능합니다.<br />
                                        (예 : 본 강좌 수강기간이 100일인 경우 연장 3회 활용 시 수강기간의 합이 50일 넘지 못합니다.) <br />
                                        - 연장 신청한 강좌는 수강시작일 변경이 불가능합니다.<br />
                                        - 연장 신청한 강좌는 처음 신청했던 강좌의 수강기간 만료일 다음날부터 수강 가능합니다.<br />
                                        - 연장 신청은 수강 종료일 전까지만 신청이 가능하며 5일 단위(5일, 10일 15일 등)로 신청할 수 있습니다.<br />
                                        ⑦ 회원은 수강한 강좌를 재수강 신청할 수 있으며 수강한 강좌의 정상가 대비 20%가 할인됩니다. 다만, 재수강하고자 하는 강좌가 현재 서비스중인 경우에 한하며 포인트, 쿠폰 등을 이용한 중복할인은 적용되지 않습니다.<br />
                                        ⑧ 회원에게 제공되는 수강시작일변경, 일시정지, 연장신청 등은 단강좌 상품에 한하여 제공됩니다. (PASS, 기간제 ,패키지, 무료 상품 등은 제공되지 않습니다.)<br />
                                        ⑨ 회원이 신청한 상품은 다른 상품으로 변경이 불가능합니다. (환불 후 재결제를 통해서만 다른 상품으로 변경하실 수 있습니다.)<br />
                                        ⑩ 위와 관련한 강좌 서비스 상세 운영정책은 회사 웹사이트 내에서 확인할 수 있습니다.<br />
                                        <strong>제15조 [교재의 구입 및 배송 등]</strong> <br />
                                        ① 교재 구입은 회사 웹사이트에서 신청 가능하며, 일부 교재는 온라인 강좌를 수강 신청한 회원만을 대상으로 합니다.<br />
                                        ② 조세특례제한법 제126조의 2 '도서, 공연비 소득공제' 관련 정부 지침에 따라 교재는 강좌와 동시 결제가 불가능합니다.<br />
                                        ③ 국내 배송은 대금 결제 후 1주일 이내로 하며 불가피한 사유가 있는 경우 배송 소요기간은 연장될 수 있으며 회사는 회원에게 이 사실을 통보합니다.<br />
                                        ④ 구매한 상품이 품절 등의 사유로 원하는 기한 내에 배송이 불가능할 경우 회사는 이 사실을 회원에게 알리고, 즉시 주문취소 및 환불 등의 조치를 취합니다.<br />
                                        <strong>제16조 [포인트 이용 관련]</strong><br />
                                        ① '포인트'에 대한 운영정책은 다음 각 호의 규정에 따릅니다.<br />
                                        포인트는 강좌 포인트, 교재 포인트로 구분됩니다.<br />
                                        <br />
                                        &lt;포인트 적립&gt;<br />
                                        - 회원가입 시 기본 혜택으로 강좌 포인트 2000p, 교재 포인트 1000p가 자동 적립되며, 적립일로부터 1년까지 사용 가능합니다.<br />
                                        - 온라인 상품(단강좌, 수강연장) 결제 시 실결제금액의 1%가 자동 적립되며, 적립일로부터 1년까지 사용 가능합니다.<br />
                                        - 교재 상품 결제 시 실결제금액의 1%가 자동 적립되며, 적립일로부터 1년까지 사용 가능합니다. (단, 배송료는 포인트가 적립되지 않습니다.)<br />
                                        - 학원 상품 및 할인 적용된 온라인 상품(단강좌, PASS, 기간제패키지, 일반패키지, 재수강 등), 할인 적용된 교재 결제 시에는 포인트가 적립되지 않습니다.<br />
                                        - 쿠폰, 포인트를 사용하여 결제한 경우 포인트는 적립되지 않습니다.<br />
                                        - 특정 상품 또는 프로모션의 경우 해당 페이지 내 이용안내의 개별 공지를 통해 별도의 포인트 적립 정책이 적용될 수 있습니다.<br />
                                        <br />
                                        &lt;포인트 사용&gt;<br />
                                        - 강좌 포인트는 온라인 단강좌, 수강연장 신청에 한해 사용 가능합니다. <br />
                                        - 교재 포인트는 교재에 한해 사용 가능하며, 배송료에는 사용할 수 없습니다.<br />
                                        - 학원 상품 및 할인 적용된 온라인 상품(단강좌, PASS, 기간제패키지, 일반패키지, 재수강 등), 할인 적용된 교재 결제 시에는 포인트를 사용할 수 없습니다.<br />
                                        - 적립된 포인트는 2500P 이상부터 1P 단위로 사용 가능합니다.<br />
                                        - 포인트의 사용/소멸시에는 유효기간이 가까운 포인트부터 차감됩니다.<br />
                                        - 특정 상품 또는 프로모션의 경우 해당 페이지 내 이용안내의 개별 공지를 통해 별도의 포인트 사용 정책이 적용될 수 있습니다.<br />
                                        - 포인트를 사용하여 결제한 상품을 환불할 경우 결제 시 사용한 포인트는 반환되지 않으며, 적립된 포인트는 자동 회수됩니다.<br />
                                        - 포인트는 타인에게 양도될 수 없습니다.<br />
                                        - 회원탈퇴 시 남은 포인트는 모두 소멸되며 재적립 되지 않습니다.<br />
                                        ② '쿠폰(수강권)'에 대한 운영정책은 다음 각 호의 규정에 따릅니다.<br />
                                        - 쿠폰은 적용 조건에 따라 사용 여부가 제한됩니다.<br />
                                        - 쿠폰을 사용하여 결제한 상품을 환불할 경우 결제 시 사용한 쿠폰은 반환되지 않습니다.<br />
                                        - 수강권은 회사 제휴사를 통해서만 지급되며, 내강의실에서 수강권 번호를 등록한 후 수강하실 수 있습니다.<br />
                                        - 유효기간 만료된 수강권은 등록되지 않습니다.<br />
                                        ③ 포인트와 쿠폰은 중복 할인이 불가능합니다. (즉, 포인트를 사용하여 결제 시 쿠폰 사용이 불가능하며, 쿠폰을 사용하여 결제 시 포인트 사용이 불가능합니다.)<br />
                                        <br />
                                        <strong>제17조 [회사의 의무]</strong><br />
                                        ① 회사는 법령과 본 약관이 정하는 권리의 행사와 의무의 이행을 신의에 좇아 성실하게 하여야 합니다.<br />
                                        ② 회사는 회원이 서비스를 이용하는 과정에서 회원 개인정보가 외부로 유출되지 않도록 방화벽을 설치하는 등 별도의 보안장치를 사용하고 있으며, 그 구체적인 내용은 회사 웹사이트에 “개인정보처리방침”에서 확인할 수 있습니다.<br />
                                        ③ 회사는 회원이 유료서비스 이용 및 그 대금내역을 수시로 확인할 수 있도록 조치합니다.<br />
                                        ④ 회사는 서비스 이용과 관련하여 회원으로부터 제기된 의견이나 불만이 정당하다고 인정할 경우에는 이를 지체 없이 처리합니다. 회원이 제기한 의견이나 불만사항에 대해서는 게시판을 활용하거나 전자우편 등을 통하여 그 처리과정 및 결과를 전달합니다.<br />
                                        ⑤ 회사는 본 약관에서 정한 의무 위반으로 인하여 회원이 입은 손해를 배상합니다.  <br />
                                        <br />
                                        <strong>제18조 [회원의 의무]</strong><br />
                                        ① 회사의 명시적 동의가 없는 한 회원의 이용권한은 회원 개인에 한정되며, 타인에게 양도, 증여하거나 이를 담보로 제공할 수 없습니다.<br />
                                        ② 회사는 회원이 다음 각 호의 해당하는 의무를 위반 하였을 경우 기간을 정하여 전부 또는 일부의 서비스 이용을 중지하거나 상당 기간의 최고 후 이용계약을 해지할 수 있습니다.<br />
                                        - 회원이 이용신청 또는 변경 시, 허위사실을 기재하거나, 자신 또는 다른 회원의 ID 및 개인정보를 이용ㆍ공유하는 경우<br />
                                        - 회원이 회사 또는 제3자의 권리나 저작권을 침해하는 경우<br />
                                        - 회원이 다른 이용자의 서비스 이용을 방해하거나, 회사의 운영진, 직원 또는 관계자를 사칭하는 경우<br />
                                        - 회원이 회사 웹사이트 내에서 사회의 안녕질서 혹은 미풍양속을 저해하는 행위를 하거나, 그와 관련된 부호ㆍ문자ㆍ음성ㆍ음향 및 영상 등의 정보를 게시하여 타인에게 유포시키는 경우<br />
                                        - 회원이 회사로부터 무상으로 제공받은 포인트, 쿠폰(수강권)의 재화를 제3자와 유ㆍ무상 등의 방법으로 거래하는 경우<br />
                                        - 회사의 서비스 운영을 고의로 방해 하거나 그리할 목적으로 다량의 정보를 전송하거나 광고성 정보를 전송하는 경우<br />
                                        - 관계법령 및 기타 본 약관에서 규정한 사항을 위반한 경우<br />
                                        - 회사 및 타인의 명예를 훼손하거나 모욕하는 경우 <br />
                                        <br />
                                        <strong>제19조 [부정이용 금지 및 차단]</strong><br />
                                        ① 회사는 다음 각 호에 해당하는 경우를 부정 이용행위로 봅니다.<br />
                                        - 동일한 ID로 2대 이상의 PC에서 동시접속이 발생하는 경우<br />
                                        - 동일한 ID로 다수의 PC 또는 IP에서 서비스를 이용하는 경우<br />
                                        - 자신의 ID 및 강좌 등의 서비스를 타인이 이용하도록 하는 경우<br />
                                        - 자신의 ID 및 강좌 등의 서비스를 타인에게 판매, 대여, 양도하는 행위 및 이를 광고하는 행위<br />
                                        - 서비스 이용 중, 복제프로그램을 실행하는 경우 또는 녹화를 하거나 시도하는 경우<br />
                                        - 큰 강의실이나 공공장소에서 대형TV나 빔 프로젝터를 이용해 대규모로 수강하는 경우<br />
                                        ② 회사는 전항에 따른 부정 이용자가 발견 되었을 경우, 다음 각 호에 따른 조치를 취할 수 있습니다. <br />
                                        - 1차 발견 시 : 전자우편, 쪽지, 팝업창을 통하여 경고합니다. <br />
                                        - 2차 발견 시 : 전호와 동일한 방법으로 경고하고 동시에 서비스 이용을 정지 시킵니다. 이때, 본인을 확인할 수 있는 주민등록등본을 첨부하여 “재발방지확약ㆍ보증서”를 회사에 송달하는 경우에는 서비스 이용정지를 해제 합니다.<br />
                                        - 3차 발견 시 : 전자우편, 쪽지, 팝업창 또는 유ㆍ무선을 통하여 3차 위반내용의 통지 및 서비스 이용을 정지 시키고 30일간의 소명기간 부여하며, 정당한 사유가 없는 경우 강제 탈퇴처리 합니다.<br />
                                        ③ 회원은 전항 제2호의 조치를 이유로, 서비스 이용기간의 연장을 요구할 수 없습니다.<br />
                                        ④ 회원은 회사로부터의 본 조 제2항의 조치에 이의가 있는 경우, 회사 고객센터에 해당 사실에 대하여 소명할 수 있으며, 회원이 자신의 고의나 과실이 없었음을 입증한 경우 회사는 서비스 제공정지 기간만큼 이용기간을 연장합니다.<br />
                                        ⑤ 부정이용 식별방법 및 차단<br />
                                        - 회사는 회원의 서비스 이용 중에 수집ㆍ확인된 IP정보 등의 자료를 토대로, 서버를 통하여 부정이용 여부를 분류ㆍ확인합니다.<br />
                                        - 회사는 이용자가 서비스 이용 중에 복제프로그램을 실행시키거나 동일한 ID로 동시 접속을 하는 경우, 서비스 이용 접속을 강제로 차단합니다.<br />
                                        <br />
                                        <strong>제20조 [서비스의 제공 및 변경]</strong><br />
                                        ① 회사는 연중무휴, 1일 24시간 서비스 제공을 원칙으로 합니다.<br />
                                        ② 회사는 운영상 또는 기술상 등의 상당한 이유가 있는 경우 제공하고 있는 서비스를 변경할 수 있습니다.<br />
                                        ③ 전항에 따라 서비스가 변경되는 경우에는 변경되는 사유 및 내용을 본 약관 제5조에 따른 방법으로 회원에게 통지합니다.  <br />
                                        <br />
                                        <strong>제21조 [정보의 제공 및 광고의 게재 등]</strong><br />
                                        ① 회사는 회원이 서비스 이용 중 필요하다고 인정되는 다양한 정보를 공지사항이나 전자우편 또는 유선상 등의 방법으로 회원에게 제공할 수 있습니다. 다만, 회원은 언제든지 전자우편 등을 통하여 수신 거절을 할 수 있습니다.<br />
                                        ② 회사는 서비스 제공과 관련하여 해당 서비스 화면, 회사 웹사이트, 회원가입 시 회원이 직접 작성한 전자우편 등에 광고를 게재할 수 있습니다. 광고가 게재된 전자우편 등을 수신한 회원은 수신거절을 할 수 있습니다.<br />
                                        ③ 회사는 회원에게 회사가 서비스하는 상품에 대하여 회원가입 시 기입한 전화번호로 전화권유판매를 할 수 있으며, 회원은 온라인 홈페이지 또는 고객센터 등을 통하여 회사의 전화권유판매에 대한 수신거절을 할 수 있습니다. <br />
                                        <br />
                                        제22조 [회원이 등록한 게시물의 이용 및 삭제]<br />
                                        ① 회사는 회원이 등록한 게시물 중, 본 약관 및 관계 법령 등에 위배되는 게시물이 있는 경우 이를 지체 없이 삭제합니다.<br />
                                        ② 회사가 운영하는 게시판 등에 게시된 정보로 인하여 법률상 이익이 침해된 자는 회사에게 당해 정보의 삭제 또는 반박 내용의 게재를 요청할 수 있습니다. 이 경우 회사는 지체 없이 필요한 조치를 취하고 이를 즉시 신청인에게 통지 합니다.<br />
                                        ③ 회사는 회사가 제공하는 웹사이트에 회원이 게시한 게시물을 이용ㆍ수정하여 마케팅 및 출판 등에 활용할 수 있습니다.<br />
                                        ④ 회원은 전항에 따른 회사의 이용 등에 대하여 웹사이트 등을 통하여 철회할 수 있으며, 회사는 회원의 철회 의사를 받은 후로부터 해당 회원의 게시물을 이용하지 않습니다. 단 회사는 철회의 의사표시 전 기제작된 제작물에 대하여는 소진 시까지 사용할 수 있습니다. <br />
                                        <br />
                                        <strong>제23조 [저작권]</strong><br />
                                        ① 회사가 제공하는 모든 콘텐츠에 대한 저작권은 회사에 있습니다.<br />
                                        ② 회원은 회사가 제공하는 서비스를 이용함으로써 얻은 정보를 회사의 사전 승낙 없이 녹화ㆍ복제ㆍ편집ㆍ전시ㆍ전송ㆍ배포ㆍ판매ㆍ방송ㆍ공연하는 등의 행위로 회사의 저작권을 침해 하여서는 안됩니다.  <br />
                                        <br />
                                        <strong>제24조 [개인정보보호]</strong><br />
                                        ① 회사는 회원의 개인정보보호를 중요시 하며, 회원이 회사의 서비스를 이용함과 동시에 온라인상에서 회사에게 제공한 개인정보의 철저한 보호를 위하여 최선을 다하고 있습니다.<br />
                                        ② 개인정보보호와 관련된 자세한 사항은 회사 웹사이트에서 전자적 표시형태로 제공되는 개인정보처리방침에서 확인하실 수 있습니다.  <br />

                                    </div>

                                    <p id="N04">제 4 장 서비스 환불</p>
                                    <div>
                                        <strong>제25조 [청약철회]</strong><br />
                                        ① 교재 및 재화 등을 공급받은 날로부터 7일 이내에 전화 등으로 청약철회가 가능합니다. 다만, 재화 등의 내용이 회사가 표시•광고한 내용과 다르거나 계약내용과 다르게 이행된 경우에는 그 재화 등을 공급받은 날부터 3개월 이내, 그 사실을 안 날 또는 알 수 있었던 날부터 30일 이내에 청약철회가 가능합니다.<br />
                                        ② 회원이 재화 등의 청약철회를 하는 경우 회사에 공급받은 재화를 반환하여야 하며, 회사는 재화 등을 반환받은 날부터 3영업일 이내에 이미 지급받은 대금을 환불합니다.<br />
                                        ③ 청약철회 시 재화 등이 일부 소비된 경우에는 해당 금액을 공제하고 환불하며, 반환에 필요한 비용은 회원이 부담해야 합니다.<br />
                                        ④ 다음 각 호의 경우에는 회원의 청약철회가 제한됩니다.<br />
                                        - 회원의 책임있는 사유로 재화 등이 멸실되거나 훼손된 경우. 다만, 재화 등의 내용을 확인하기 위하여 포장 등을 훼손한 경우는 제외됩니다.<br />
                                        - 회원의 사용 또는 일부 소비로 재화 등의 가치가 현저히 감소한 경우<br />
                                        - 시간이 지나 다시 판매하기 곤란할 정도로 재화 등의 가치가 현저히 감소한 경우<br />
                                        - 복제가 가능한 재화 등의 포장을 훼손한 경우<br />
                                        <br />
                                        <strong>제26조 [강좌 서비스 환불]</strong> <br />
                                        ① 회사가 고의 또는 중대한 과실로 서비스를 지속할 수 없는 경우에는 회원의 요구에 따라 잔여수강료를 환불합니다.<br />
                                        ② 회사 또는 회원의 귀책사유가 없는 천재지변 등의 사유로 인하여 회사가 서비스를 지속 할 수 없는 경우에는 천재지변 등의 사유가 종료한 후 회원의 요구에 따라 잔여 수강료를 반환하되, 위 기간 동안의 수강료는 반환하지 않습니다.<br />
                                        ③ 회사는 회원의 요구 또는 귀책사유로 인하여 계약이 해지되는 경우에는 수강시작일(당일 포함)부터 해지일까지의 이용일수 또는 이용회차에 해당하는 금액을 공제 후 환불하며 자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br />
                                        - 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br />
                                        - PASS, 기간제, 패키지 상품 및 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br />
                                        - 이용기간 기준의 온라인 강좌 상품(PASS, 기간제패키지 을)을 수강한 경우 환불 기준 : <br />
                                        결제금액 - (강좌 정상가의 1일 이용대금×이용일수)<br />
                                        - 학습회차 기준의 온라인 강좌 상품(단강좌, 패키지 상품)를 수강한 경우 환불 기준 :<br />
                                        결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용회수)<br />
                                        - 최종 완강 되지 않은 강좌의 학습회차 계산은 공지된 예정 강좌수를 기준으로 환불 금액을 산출합니다.<br />
                                        - 특정 상품 및 프로모션의 경우 해당 페이지 내 이용안내의 개별 공지를 통해 별도의 환불규정이 적용될 수 있습니다.<br />
                                        - 재수강 및 연장신청한 강좌도 본 환불규정에 따릅니다.<br />
                                        <br />
                                        <strong>제27조 [학원강좌 서비스 환불]</strong><br />
                                        ① 학원 강좌 환불은 다음 각 호의 규정에 따릅니다.<br />
                                        - 수강신청(결제완료) 후 실강좌 개강 전에는 전액 환불 가능합니다.<br />
                                        - 수강신청(결제완료) 후 실강좌 개강 후에는 학원을 방문하여 환불 가능합니다.<br />
                                        - 기타 환불규정은 교육청 수강료 반환 기준을 준수합니다.<br />
                                        <br />
                                        <strong>제28조 [교재 등 재화 등의 환불]</strong><br />
                                        ① 구매한 상품이 품절 등의 사유로 원하는 기한 내에 배송이 불가능할 경우, '몰' 이 사실을 회원에게 알리고, 즉시 주문취소 및 환불 등의 조치를 취합니다.<br />
                                        ② 회원이 주문한 상품과 회사가 배송한 상품이 다를 경우 회사는 환불 조치하며, 배송된 상품의 배송료는 회사가 부담합니다.<br />
                                        ③ 배송된 상품이 파손, 손상되었거나 오염되었을 경우 회사는 환불 조치하나, 이용자의 책임 있는 사유로 상품 등이 훼손된 경우에는 제외합니다.<br />
                                        ④ 회원의 귀책사유로 상품을 잘못 주문한 경우, 환불할 수 없습니다.<br />
                                        ⑤ 상품의 환불은 상품대금 결제 후 회사의 교재 배송일 기준 10일 이내로 합니다.<br />
                                        ⑥ 정상적 환불과 관련한 각종 수수료 및 비용은 회원이 부담한다.<br />
                                        ⑦ 상품 환불의 경우 반송된 상품을 회사가 확인 후 환불절차가 진행됩니다.<br />
                                        <br />
                                        <strong>제29조 [포인트, 쿠폰(수강권) 환불]</strong><br />
                                        ① 회사가 무료로 회원에게 지급한 포인트, 쿠폰은 유효기간 내에만 사용이 가능하며 환불은 되지 않습니다. 포인트, 쿠폰의 유효기간은 회사정책에 의한 기준을 따르며, 그 기간 이후에는 자동으로 소멸됩니다.<br />
                                        ② 회원은 포인트 적립에 오류가 있거나 전부 또는 일부가 삭제된 경우, 회사에 이의신청을 할 수 있습니다. 회사는 회원의 이의신청에 따라 그 내역을 확인한 후 그 결과를 회원에게 통지하고, 이의신청이 정당한 경우 즉시 포인트, 쿠폰 복구 등의 조치를 취합니다.<br />
                                        ③ 회사는 경영상•기술상의 이유로 포인트, 쿠폰 서비스를 종료하는 경우 최소 30일 전까지 회원에게 이 사실을 고지하며, 이 기간 내에 사용하지 못한 포인트, 쿠폰 대해서는 사전에 정한 보상 방법에 따라 회원에게 보상할 수 있습니다.<br />
                                        ④ 포인트, 쿠폰에 대한 자세한 환불 기준은 제16조 운영정책에 따릅니다.<br />
                                        <strong>제30조 [과오금의 환급]</strong><br />
                                        ① 회원이 교습비 및 대금 등을 결제함에 있어서 과오금을 지급한 경우 회사는 대금결제와 동일한 방법으로 과오금을 환불합니다. 다만, 동일한 방법으로 과오금의 환불이 불가능할 때에는 즉시 이를 고지하고, 회원이 선택한 방법으로 환불합니다.<br />
                                        ② 회사의 책임 있는 사유로 과오금이 발생한 경우 회사는 계약비용•수수료 등에 관계없이 과오금 전액을 환불합니다.<br />
                                        다만, 회원의 책임있는 사유로 과오금이 발생한 경우 회사는 과오금을 환불하는데 소요되는 비용을 합리적인 범위 내에서 공제하고 환불할 수 있습니다.<br />

                                    </div>

                                    <p id="N05">제 5 장 손해배상 등</p>
                                    <div>
                                        <strong>제31조 [손해배상]</strong><br />
                                        ① 회사는 고의 또는 중대한 과실에 의하여 회원에게 손해를 입힌 경우 그 손해를 배상할 책임이 있습니다.<br />
                                        ② 회사는 시스템 점검, 증설과 교체 등 회사가 정한 기간 외에 고의 또는 중대한 과실로 예고 없이 서비스가 일시 중단될 경우 유료 서비스 이용기간을 연장하는 방법으로 회원에게 보상합니다.<br />
                                        ③ 회사는 회원이 결제한 유료 서비스를 이용할 수 없는 경우, 해당 유료 서비스의 복원, 교환 또는 환불 조치 합니다.<br />
                                        ④ 회사는 회원이 서비스를 이용함에 있어 관련 법령 내지 본 약관을 위반함으로 인하여 회사 또는 제3자에게 손해가 발생하거나 제3자로부터 회사가 손해배상 청구 또는 각종 소(이의) 제기를 받는 경우, 당해 회원은 회사에 발생하는 손해를 배상하여야 합니다. <br />
                                        <br />
                                        <strong>제32조 [면책조항]</strong><br />
                                        ① 회사는 천재지변 또는 이에 준하는 불가항력으로 인하여 서비스를 제공할 수 없는 경우에는 서비스 제공에 관한 책임이 면제됩니다.<br />
                                        ② 회사는 회원의 귀책사유로 인하여 발생한 서비스 이용의 장애에 대하여는 책임을 지지 않습니다.<br />
                                        ③ 회사는 회원이 서비스와 관련하여 게재한 정보, 자료, 사실의 신뢰도, 정확성 등의 내용에 관하여는 책임을 지지 않습니다.<br />
                                        ④ 회원 아이디와 비밀번호의 관리 및 이용상의 부주의로 인하여 발생되는 손해 또는 제3자에 의한 부정사용 등에 대하여 책임을 지지 않습니다.<br />
                                        ⑤ 회사는 이용자 상호간 또는 이용자와 제3자 간에 콘텐츠를 매개로 하여 발생한 분쟁 등에 대하여 책임을 지지 않습니다.  <br />
                                        <br />
                                        <strong>제33조 [분쟁의 해결 등]</strong><br />
                                        ① 회사와 이용자 간의 서비스와 관련하여 발생한 분쟁을 원만하게 해결하기 위하여 필요한 모든 노력을 하여야 합니다.<br />
                                        ② 제1항의 규정에도 불구하고, 동 분쟁으로 인하여 소송이 제기될 경우 동 소송은 회사의 본사 소재지를 관할하는 법원의 관할로 합니다.<br />
                                    </div>


                                    <p>부칙</p>
                                    <div>
                                        - 본 약관은 2019년 3월 25일부터 적용하고, 이전 약관은 본 약관으로 대체합니다.
                                    </div>
                                </div>
                                {{--
                                <link rel="stylesheet" type="text/css" href="/data/terms/terms.css" id="stylesheet" />
                                <style type="text/css">
                                    .part {
                                        margin: 0;
                                        padding: 0;
                                        font-family : "dotum", "돋음", "굴림", Verdana, Arial, Helvetica, sans-serif;
                                        font-size : 12px;
                                        color:#666666;
                                        line-height:150%;
                                        letter-spacing: -1px;
                                        word-spacing: 2px;
                                    }
                                </style>
                                <div class="part bg_w">
                                    <p>윌비스는(이사'회사'는)" 정보통신망 이용촉진 및 정보보호”에 관한 법률을 준수하고 있습니다.</p>
                                    <h2>1장 총 칙 </h2>

                                    <h3 class="first1"><a name="a1">제 1 조 (목적)</a></h3>
                                    <p class="mbt5">이 약관은 (주)윌비스(www.willbes.net, 이하 '몰'이라 한다)가 제공하는 온라인서비스의 이용조건 및 절차, 기타 필요한 사항을 규정함을 목적으로 한다.</p>

                                    <h3 class="first1"><a name="a2">제 2 조 (약관의 효력)</a></h3>
                                    <p class="mbt5">
                                        ① 이 약관은 게시판에 공지하거나 회원 가입시 동의, 또는 기타의 방법으로 회원에게 통지함으로써 효력이 발생한다.<br>
                                        ② '몰'은 이 약관의 내용을 변경할 수 있으며, 변경된 약관은 제1항과 같은 방법으로 공지 또는 통지함으로써 효력이 발생한다.<br>
                                        ③ 약관의 변경사항 및 내용은 (주)윌비스 사이트(http://www.willbes.net)에 적용된다.
                                    </p>

                                    <h3 class="first1"><a name="a3">제 3 조 (약관 이외의 준칙)</a></h3>
                                    <p class="mbt5">이 약관에 명시되지 않은 사항은 전기통신기본법 , 전기통신사업법, 기타 관련법령에 규정되어 있는 경우 그 규정에 따른다.</p>

                                    <h3 class="first1"><a name="a4">제 4 조 (용어의 정의)</a></h3>
                                    <p  class="mbt5">이 약관에서 사용하는 용어의 정의는 다음과 같습니다.</p>
                                    <ol class="mbt15">
                                        <li>회원 : '몰'과 서비스이용에 관한 계약을 체결한 자</li>
                                        <li>아이디(ID) : 회원 식별과 회원의 서비스 이용을 위하여 회원이 선정하고 '몰'이 승인   하는 문자와 숫자의 조합</li>
                                        <li>비밀번호 : 회원이 통신상의 자신의 비밀을 보호하기 위해 선정한 문자와 숫자의 조합 </li>
                                        <li>전자우편(e-mail) : 인터넷을 통한 우편  5. 해지 : '몰' 또는 회원이 서비스 이용 이후 그 이용계약을 종료 시키는 의사표시</li>
                                    </ol>

                                    <h2>제 2 장 서비스 이용계약 </h2>
                                    <h3 class="first1"><a name="a5">제 5 조 (이용계약의 성립)</a></h3>
                                    <p  class="mbt5">이용계약은 서비스이용신청자의 이용신청에 대하여 '몰'이 승낙을 함으로써 성립된다 </p>

                                    <h3 class="first1"><a name="a6">제 6 조 (이용신청)</a></h3>
                                    <p  class="mbt5">
                                        ① 서비스 이용신청자는 서비스를 통하여 '몰' 소정의 가입신청서를 제출함으로써 이용신청을 할 수 있다.<br>
                                        ② 서비스 이용신청자는 반드시 실명으로 이용신청을 하여야 하며, 1인당 1개의 ID만 신청을 할 수 있다.
                                    </p>

                                    <h3 class="first1"><a name="a7">제 7 조 (이용신청의 승낙)</a></h3>
                                    <p  class="mbt5">
                                        ① '몰'은 제6조에 따른 이용신청에 대하여 특별한 사정이 없는 한 접수순서에 따라서 이용신청을 승낙한다.<br>
                                        ② '몰'이 이용신청을 승낙하는 경우 회원에 대하여 서비스를 통하여 다음 각 호의 사항을 통지한다.  </p>
                                    <ol class="mbt15">
                                        <li>아이디(ID)  2. 회원의 책임, 의무 및 권익보호 등에 관한 사항</li>
                                    </ol>
                                    <p  class="mbt5">③ '몰' 다음 각 호의 1에 해당하는 경우 이용신청에 대한 승낙을 제한할 수 있고, 그 사유가 해소될 까지 승낙을 유보할 수 있다.</P>
                                    <ol class="mbt15">
                                        <li>서비스 관련 설비의 용량이 부족한 경우</li>
                                        <li>기술상 장애사유가 있는 경우</li>
                                        <li>기타 '몰'이 필요하다고 인정되는 경우</li>
                                    </ol>
                                    <p class="mbt5">④ '몰' 다음 각 호의 1에 해당하는 사항을 인지하는 경우 등 이용 신청을 승낙하지 아니한다.</P>
                                    <ol class="mbt15">
                                        <li>이름이 실명이 아닌 경우</li>
                                        <li>다른 사람의 명의를 사용하여 신청한 경우</li>
                                        <li>가입신청서의 내용을 허위로 기재한 경우</li>
                                        <li>사회의 안녕질서 또는 미풍양속을 저해할 목적으로 신청한 경우</li>
                                        <li>기타 '몰' 소정의 이용신청요건을 충족하지 못하는 경우</li>
                                    </ol>
                                    <p  class="mbt5">⑤ 제3항 또는 제4항에 의하여 이용신청의 승낙을 유보하거나 승낙하지 아니하는 경우, '몰'은 이를 이용신청자에 알려야 한다. 다만, '몰'의 귀책 사유 없이 이용신청자에게 통지할 수 없는 경우는 예외로 한다.</P>

                                    <h3 class="first1"><a name="a8">제 8 조 (회원 아이디(ID)의 변경)</a></h3>
                                    <p  class="mbt5">다음 각 호의 1에 해당하는 경우 '몰'은 직권 또는 회원의 신청에 의하여 회원 아이디(ID)를 변경할 수 있다.</p>
                                    <ol class="mbt15">
                                        <li>회원 아이디(ID)가 회원의 전화번호 등으로 등록되어 있어서 회원의 사생활을 침해할 우려가 있는 경우</li>
                                        <li>타인에게 혐오감을 주거나 미풍양속에 어긋나는 경우</li>
                                        <li>기타 '몰' 소정의 합리적인 사유가 있는 경우</li>
                                    </ol>

                                    <h2>제 3 장 서비스 제공 및 이용 </h2>
                                    <h3 class="first1"><a name="a9">제 9 조 (서비스의 내용)</a></h3>
                                    <p  class="mbt5">① '몰' 이 제공하는 서비스 내용은 다음과 같다. </p>
                                    <ol class="mbt15">
                                        <li>학원 실강의 유료 서비스</li>
                                        <li>온라인 강의 유료 서비스</li>
                                        <li>온라인 교재 유료 서비스</li>
                                        <li>온라인 수험 정보 무료 서비스</li>
                                    </ol>
                                    <p class="mbt5"> ② '몰'은 필요한 경우 서비스의 내용을 추가 또는 변경할 수 있다. 이 경우 '몰'은 추가 또는 변경내용을 회원에게 통지 혹은 사이트에 공지한다.</p>

                                    <h3 class="first1"><a name="a10">제 10 조 (서비스의 요금)</a></h3>
                                    <p class="mbt5">'몰'이 제공하는 서비스는 무료 또는 유료로 구분하여 제공한다. 서비스요금은 해당 강의에 따라, 각 강의별로 사이트에 공지한다 </p>

                                    <h3 class="first1"><a name="a11">제 11 조 (서비스의 개시)</a></h3>
                                    <p class="mbt5">서비스는 '몰'이 제7조에 따라서 이용신청을 승낙한 때부터 즉시 개시된다. 다만, '몰' 업무상 또는 기술상의 장애로 인하여 서비스를 즉시 개시하지 못하는 경우 '몰'은 회원에게 이를 지체 없이 통지한다.</p>

                                    <h3 class="first1"><a name="a12">제 12 조 (서비스 이용시간)</a></h3>
                                    <p class="mbt5">
                                        ① 서비스는 '몰'의 업무상 또는 기술상 장애, 기타 특별한 사유가 없는 한 연중무휴, 1일 24시간 이용할 수 있다. 다만 설비의 점검 등 '몰'이 필요한 경우 또는 설비의 장애, 서비스 이용의 폭주 등 불가항력 사항으로 인하여 서비스 이용에 지장이 있는 경우, 예외적으로 서비스 이용의 전부 또는 일부에 대하여 제한할 수 있다.<br>
                                        ② '몰'이 제공하는 서비스 중 일부에 대한 서비스 이용시간을 별도로 정할 수 있으며, 이 경우 그 이용시간을 사전에 회원에게 공지 또는 통지한다.
                                    </p>

                                    <h3 class="first1"><a name="a13">제 13 조 (정보의 제공 및 광고의 게재)</a></h3>
                                    <p class="mbt5">
                                        ① '몰'은 서비스를 운용함에 있어서 각종 정보를 서비스에 게재하는 방법 등으로 회원에게 제공할 수 있다.<br>
                                        ② '몰'은 서비스의 운용과 관련하여 서비스 화면, 홈페이지, 전자우편 등에 광고 등을 게재할 수 있다.
                                    </p>

                                    <h3 class="first1"><a name="a14">제 14 조 (서비스 제공의 중지)</a></h3>
                                    <p class="mbt5">'몰'은 다음 각 호의 1에 해당하는 경우 서비스의 제공을 중지할 수 있다.</p>
                                    <ol class="mbt15">
                                        <li>설비의 보수 등을 위하여 부득이한 경우</li>
                                        <li>전기통신사업법에 규정된 기간통신사업자가 전기통신서비스를 중지하는 경우 </li>
                                        <li>기타 '몰'이 서비스를 제공할 수 없는 사유가 발생한 경우</li>
                                    </ol>

                                    <h2>제 4 장 서비스와 관련한 권리·의무관계 </h2>
                                    <h3 class="first1"><a name="a15">제 15 조 ('몰'의 의무)</a></h3>
                                    <p class="mbt5">
                                        ① '몰'은 제12조 및 제14조에서 정한 경우를 제외하고 이 약관에서 정한 바에 따라 계속적, 안정적으로 서비스를 제공할 수 있도록 최선의 노력을 한다.<br>
                                        ② '몰'은 서비스에 관련된 설비를 항상 운용할 수 있는 상태로 유지 보수하고, 장애가 발생하는 경우 지체 없이 이를 수리·복구할 수 있도록 최선의 노력을 다하여야 한다. <br>
                                        ③ '몰'은 서비스와 관련한 회원의 불만사항이 접수되는 경우 이를 즉시 처리하여야 하며, 즉시 처리가 곤란한 경우 그 사유와 처리 일정을 서비스 또는 전자우편을 통하여 동 회원에게 통지하여야 한다.
                                    </p>


                                    <h3 class="first1"><a name="a16">제 16 조 (개인정보의 보호)</a></h3>
                                    <p class="mbt5"></p>
                                    <p class="mbt5">
                                        ① '몰'은 서비스와 관련하여 기득한 회원의 개인정보를 본인의 사전 승낙 없이 타인에게 누설, 공개 또는 배포할 수 없으며, 서비스 관련업무 이외의 상업적 목적으로 사용할 수 없다. 다만, 다음 각 호의 1에 해당하는 경우에는 그러하지 아니 한다.</p>
                                    <ol class="mbt15">
                                        <li>관계법령에 의하여 수사상의 목적으로 관계기관으로부터 요구 받은 경우</li>
                                        <li>정보통신윤리위원회의 요청이 있는 경우</li>
                                        <li>기타 관계법령에 의한 경우</li>
                                    </ol>
                                    <p class="mbt5">② 제1항의 범위 내에서, '몰'은 광고업무와 관련하여 회원 전체 또는 일부의 개인정보에 관한 통계자료를 작성하여 이를 사용할 수 있고, 서비스를 통하여 회원의 컴퓨터에 쿠키를 전송할 수 있다. 이 경우 회원은 쿠키의 수신을 거부하거나 쿠키의 수신에 대하여 경고하도록 사용하는 컴퓨터의 브라우저의 설정을 변경할 수 있다. </p>


                                    <h3 class="first1"><a name="a17">제 17 조 (회원의 의무)</a></h3>
                                    <p class="mbt5">
                                        ① 회원은 관계법령, 이 약관의 규정, 이용안내 및 주의사항 등 '몰'이 통지하는 사항을 준수하여야 하며, 기타 '몰'의 업무에 방해되는 행위를 하여서는 아니 된다. </p>
                                    <ol class="mbt15">
                                        <li> 회원은 '몰'의 사전 승낙 없이 서비스를 이용하여 어떠한 영리 행위도 할 수 없다.</li>
                                        <li>회원은 서비스를 이용하여 얻은 정보를 '몰'의 사전 승낙 없이 복사, 복제, 변경, 번역, 출판·방송 기타의 방법으로 사용하거나 이를 타인에게 제공할 수 없다.</li>
                                        <li>회원은 이용신청서의 기재내용 중 변경된 내용이 있는 경우 서비스를 통하여 그 내용을'몰'에 통지, 변경사항을 수정하여야 한다.</li>
                                    </ol>
                                    <p class="mbt5">
                                        ② 회원은 서비스 이용과 관련하여 다음 각 호의 행위를 하여서는 아니 된다. </p>

                                    <ol class="mbt15">
                                        <li>다른 회원의 아이디(ID)를 부정 사용하는 행위</li>
                                        <li>범죄행위를 목적으로 하거나 기타 범죄행위와 관련된 행위</li>
                                        <li>선량한 풍속, 기타 사회질서를 해하는 행위 </li>
                                        <li>타인의 명예를 훼손하거나 모욕하는 행위 </li>
                                        <li> 타인의 지적재산권 등의 권리를 침해하는 행위 </li>
                                        <li>해킹행위 또는 컴퓨터바이러스의 유포행위 </li>
                                        <li>타인의 의사에 반하여 광고성 정보 등 일정한 내용을 지속적으로 전송 또는 타 사이트를 링크하는 행위 </li>
                                        <li>서비스의 안정적인 운영에 지장을 주거나 줄 우려가 있는 일체의 행위 </li>
                                        <li>기타 관계법령에 위배되는 행위</li>
                                        <li>게시판 또는 실시간 메시지 서비스를 통한 상업적 광고홍보 또는 상거래 행위  </li>
                                    </ol>

                                    <h3 class="first1"><a name="a18">제 18 조 (게시물 또는 내용물의 삭제)</a></h3>
                                    <p class="mbt5">'몰'은 서비스의 게시물 또는 내용물이 제 17조의 규정에 위반되거나 '몰' 소정의 게시기간을 초과하는 경우 사전 통지나 동의 없이 이를 삭제할 수 있다. </p>

                                    <h3 class="first1"><a name="a19">제 19 조 (게시물에 대한 권리·의무)</a></h3>
                                    <p class="mbt5">게시물에 대한 저작권을 포함한 모든 권리 및 책임은 이를 게시한 회원에게 있다.</p>

                                    <h2>제 5 장 상품배송 및 환불, 수강 취소</h2>
                                    <h3 class="first1"><a name="a20">제 20 조(상품배송, 취소, 환불)</a></h3>
                                    <p class="mbt5">
                                        ① 국내배송은 대금 결제 후 1주일 이내로 한다. 다만, 불가피한 사유가 있는 경우 배송소요기간은 연장될 수 있으며, '몰'은 회원에게 이 사실을 통보한다.<br>
                                        ② 구매한 상품이 품절 등의 사유로 원하는 기한 내에 배송이 불가능할 경우, '몰' 이 사실을 회원에게 알리고, 즉시 주문취소 및 환불 등의 조치를 한다.<br>
                                        ③ 회원이 주문한 상품과 '몰'이 배송한 상품이 다를 경우, '몰'은 환불조치 하며, 배송된 상품의 운송비는 회사가 부담한다. <br>
                                        ④ 배송된 상품이 파손, 손상되었거나 오염되었을 경우 '몰'은 환불 조치하나, 이용자의 책임 있는 사유로 상품 등이 훼손된 경우에는 제외된다. <br>
                                        ⑤ 회원의 귀책사유로 상품을 잘못 주문한 경우, 환불할 수 없다.<br>
                                        ⑥ 상품의 환불은 상품대금 결제 후 '몰'의 교재 배송일 기준 10일 이내로 한다. <br>
                                        ⑦ 정상적 환불과 관련한 각종 수수료 및 비용은 회원이 부담한다.<br>
                                        ⑧ 상품 환불의 경우, 반송된 상품을 '몰'이 확인 후 환불절차가 진행된다.</p>


                                    <h3 class="first1"><a name="a21">제 21 조(학원강의 환불)</a></h3>
                                    <p class="mbt5">학원 실강의 환불은 다음 각 호의 규정에 의한다. </p>
                                    <ol class="mbt15">
                                        <li>수강신청(결제완료) 후 실강의 개강 전에는 전액 환불</li>
                                        <li>수강신청(결제완료) 후 실강의 개강 후에는 학원을 방문하여 환불</li>
                                        <li>기타 환불규정은 교육청 수강료 반환 기준을 준수한다.</li>
                                    </ol>

                                    <h3 class="first1"><a name="a22">제 22 조(인터넷강의 환불)</a></h3>
                                    <p class="mbt5">
                                        ① '몰'이 고의 또는 중대한 과실로 서비스를 지속할 수 없는 경우에는 회원의 요구에 따라 잔여수강료를 환불한다.<br>
                                        ② '몰' 또는 회원의 귀책사유가 없는 천재지변 등의 사유로 인하여 '몰'이 서비스를 지속 할 수 없는 경우에는 천재지변 등의 사유가 종료한 후 회원의 요구에 따라 잔여 수강료를 반환하되, 위 기간 동안의 수강료는 반환하지 아니 한다. <br>
                                        ③ '몰'은 회원의 요구 또는 귀책사유로 인하여 계약이 해지되는 경우에는 수강진도율 30%미만 수강시 수강시작일(당일 포함)부터 해지일까지의 이용일수로 환불이 되며,수강진도율 30%이상 수강시 강의 본 횟차를 제외한 수강하지 않은 잔여 횟차에 대해 환불이됩니다.
                                    </p>

                                    <ol class="mbt15">
                                        <li>(삭제)</li>
                                        <li>환불기준<br>
                                            - 강의파일을 열거나 강의자료를 다운로드 이용시 수강한 것으로 간주하여 진도율에 상관없이 강의 본 횟차를 제외한 수강하지 않은 잔여횟차에 대해 환불이 된다.<br>
                                            - 수강일수 공제 : 수강시작일로부터 환불요청일까지 일수공제한다. (1일 공제금액 : 수강료/인터넷강의수강기간)<br>
                                            - 수강 가능 강의 수가 최종 개강되지 않은 강좌의 경우에는 직전 수강 강의 수 또는 공지된 예상수강 가능 강의 기준으로 한다.<br>
                                            - 패키지강좌 및 특별 기획 이벤트강좌 등 할인상품의 경우 환불 시에는 수강한 상품의 정가를 기준으로 공제하고 환불함을 원칙으로 한다.<br>
                                            - 이용기간 기준의 인터넷강의(패키지강좌 및 특별 기획 이벤트강좌 등)를 수강한 경우 환불 기준 : 결제금액 - (강좌 정가의 1일 이용대금 * 이용일수)<br>
                                            - 최종 완강 되지 않은 강의의 이용회차 계산은 공지된 예정 수강기준을 기준으로 한다.<br>
                                            - 패키지강좌 및 특별 기획 이벤트강좌는 기획 할인 상품으로서 상품 이용안내의 개별 공지를 통해 별도의 환불규정이 적용될 수 있다.<br>
                                            - 재수강 및 연장강의도 본 환불규정에 따른다.<br>
                                        </li>
                                        <li>(삭제)</li>
                                    </ol>
                                    <p class="mbt5">
                                        ④ 다음 사항에 해당될 경우에는 환불이 되지 않는다.<br>
                                    </p>
                                    <ol class="mbt15">
                                        <li>(삭제)</li>
                                        <li>(삭제)</li>
                                        <li>(삭제)</li>
                                        <li>(삭제)</li>
                                        <!--li>수강시작 후 일시정지, 또는 수강변경을 하였을 경우</li>
                                        <li>수강 진도율이 30% 이상 진행된 경우</li>
                                        <li>종합반으로 수강신청을 한 경우</li>
                                        <li>재수강 및 수강연장으로 강의를 신청한 경우</li-->
                                    </ol>
                                    <p class="mbt5">
                                        ⑤ 수강취소의 의사표시는 유선,상담게시판 및 전자문서를 통해서 한다.<br>
                                    </p>
                                    <p class="mbt5">
                                        ⑥ 기타 윌비스의 고의·과실이 있는 경우<br>
                                    </p>
                                    <ol class="mbt15">
                                        <li>동영상강의의 경우 구매계약시의 강의과정을 윌비스가 8/10이상 서비스 공급하지 못하였을 경우에는 당해 결제금액 전액을 환불한다. 다만, 8/10이상 서비스 공급하였으나, 완전한 서비스 공급이 불가능 한 경우에는 다른 동영상강의로 대체하거나 잔여강의일수 또는 기수강한 강의수를 이용자에게 유리한 조건으로 일할 계산하여 환불한다.
                                        </li>

                                    </ol>


                                    </p>


                                    <br>


                                    <h3 class="first1"><a name="a23">제 23 조(인터넷강의 수강과목 변경)</a></h3>
                                    <p class="mbt5">
                                        ① 수강과목 변경은 수강 시작일로부터 7일 이내로 수강 진도율이 10% 미만시 1회에 한하여 가능하다. <br>
                                        ② 수강과목 변경에 대한 금액의 차이(추가납부, 환불)에 대하여는 각각의 의무를 이행하여야 하며, 추가납부, 환불에 대한 제 비용은 회원 부담을 원칙으로 한다.</p>

                                    <h3 class="first1"><a name="a24">제 24 조(인터넷강의 재수강 할인)</a></h3>
                                    <p class="mbt5">
                                        ① 수강하신 강의를 재수강할 경우 기존 금액의 20%를 할인한다. 다만 재수강 하고자 하는 강의가 현재 서비스 중인 경우에 한하며 할인쿠폰을 이용한 중복할인이 되지 않는다. <br>
                                        ② 재수강의 경우 처음 수강신청 했던 강의만 수강할 수 있으며 해당강의의 신규강의가 서비스되어도 신규강의로 변경되지 않는다. 이외의 규정은 기존 강의와 동일 적용된다.
                                    </p>

                                    <h3 class="first1"><a name="a25">제 25 조(인터넷강의 일시정지)</a></h3>
                                    <p class="mbt5">
                                        ① 인터넷 강의 일시정지는 총 3회까지 중지 할 수 있다.<br>
                                        ② 단, 종합반 / 연장신청강의는 일시정지를 할 수 없다.<br>
                                        ③ 일시정지는 수강 잔여기간 내에서만 가능하다.(수강 잔여기간이 50일 남았을 경우 최대일시정지기간은 50일을 초과하지 못한다.)<br>
                                        ④ 일시정지기간동안은 수강을 할 수 없으며 일시정지기간만큼 수강종료일은 자동연장된다.
                                    </p>

                                    <h3 class="first1"><a name="a26">제 26 조(인터넷강의 배수관련)</a></h3>
                                    <p class="mbt5">

                                        ① 수강 신청한 강의의 각 강별 기준으로 1.5~2배수까지 반복 수강할 수 있다.
                                        단, 해당사이트의 사정을 고려하여 본 조항의 적용이 변경될 수 있다.<br><!--(예 : 강의(1강)가 60분인 경우 최대 120분까지 수강 가능, 2배속으로 수강시 30분만에 수강완료, 같은 강의를 최대 4번까지 수강가능)--><br>
                                        ② 인터넷강의는 해당 강의의 수강기간 내에서만 수강할 수 있다.<br>

                                    </p>

                                    <h3 class="first1"><a name="a27">제 27 조(인터넷강의 수강시작일의 변경)</a></h3>
                                    <p  class="mbt5">
                                        ① 수강신청시 신청일로부터 30일이내의 범위에서 수강시작일을 지정할 수 있으며, 수강시작일 지정 후 1회에 한하여 신청일 기준으로 30일 이내에서 수강시작일을 재지정할 수 있다.<br>
                                        ② 수강중인 강의는 시작일을 변경할 수 없다. </p>

                                    <h3 class="first1"><a name="a28">제 28 조(인터넷강의 수강기간 연장)</a></h3>
                                    <p class="mbt5">
                                        ① 연장신청은 해당강의 수강기간 종료일 이전까지만 유료로 신청 및 결제할 수 있다.<br>
                                        - 인터넷강의를 연장할 경우 1일 수강료는 인터넷강의수강료를 수강일수로 나눈 금액으로 계산된다.<br>
                                        ② 1회 연장일수는 최소 1일에서 최대 30일의 범위 내에서만 할 수 있다. 단 해당사이트의 사정을 고려하여 본 조항의 적용이 변경될 수 있다. <br>
                                        ③ 연장횟수는 총3회까지 할 수 있다.(단 연장 3회의 합이 기존 수강일수의 50%까지만 연장이 가능)<br>
                                        ④ 연장 신청한 강의는 제21조(환불), 제24조(일시정지) 및 제 26조(수강시작일의 변경)가 적용되지 않는다.<br>
                                        ⑤ 연장신청강의는 처음 신청했던 강의의 수강기간만료일 다음날부터 수강한다. </p>

                                    <h2>제 6 장 PMP 강의</h2>
                                    <h3 class="first1"><a name="a29">제 29 조( PMP 강의이용규정)</a></h3>
                                    <p  class="mbt5">
                                        ① PMP 강의변경은 〔별표1〕에 의한 경우에만 가능하다. <br>
                                        ② PMP 강의중지, 연장, 환불규정 〔별표2〕에 의한다.	<br>
                                        ③ PMP 기기등록 등에 관한 규정은 〔별표3〕에 의한다. <br>
                                        ④ 그 외의 규정은 인터넷강의 수강규정에 준한다.</p>

                                    <h2>제 7 장 포인트제도의 시행 </h2>
                                    <h3 class="first1"><a name="a30">제 30 조 (포인트) </a></h3>
                                    <p class="mbt5">
                                        ① '몰'은 특정상품을 구입하는 고객에게 포인트를 부여할 수 있다 . 이러한 포인트 부여는 다음 각 호의 방법에 따르며, 그 구체적인 방법은 '몰'의 운영정책에 의한다. </p>
                                    <ol class="mbt15">
                                        <li>'몰'은 포인트 부여를 안내한 상품에 대해 특정한 비율 만큼 포인트를 부여한다. </li>
                                        <li>'몰'은 포인트 부여를 안내한 상품에 대해 당해 판매가에 상관없이 일정한 금액을 부여 하는 방식으로 포인트를 부여한다. </li>
                                        <li>'몰'의 운영정책에 따라 상품별로 포인트 부여가 불가능 할 수 있다.</li>
                                        <li>(삭제)</li>
                                        <li>포인트로 결제한 상품구매의 경우에는 포인트가 적립되지 않는다. </li>
                                        <li>포인트는 2,500 포인트 이상부터 사용이 가능하다. 	</li>
                                        <li>부여받은 포인트를 사용하고 난 후 주문을 취소하는 경우에는 이미 사용된 포인트를 제외한 금액만 환불된다. </li>
                                        예) 100,000원의 도서를 구매할 때, 적립된 포인트  2,500원을 사용하여 구매한 후 100,000원 주문을 반품하는 경우에는 이미 사용한 포인트  2,500원을 차감한 금액 97,500원만 환불됩니다.</li>
                                        <li>포인트로 구매한 상품에 대한 교환은 동일 금액 내에서만 가능하다. 단, 교환으로 인한 차액 발생시 환불은 되지 않는다. </li>
                                        <li>'몰'의 포인트는 타인에게 양도될 수 없다.   </li>
                                        <li> 고객이 회원을 탈퇴한 경우에, 포인트는 모두 소멸되며 재적립 되지 않는다.  </li>
                                        <li>적립된 포인트를 5년 동안 사용하지 않을 경우, 또는 사용 할 수 없을 경우 자동 소멸된다.</li>
                                    </ol>

                                    <h2>제 8 장 기 타  </h2>
                                    <h3 class="first1"><a name="a31">제 31 조 (양도 및 분할사용, 다중상영 금지)</a></h3>
                                    <p class="mbt5">
                                        ① 회원이 서비스의 이용권한, 기타 이용 계약상 지위를 타인에게 양도, 증여할 수 없으며, 이를 담보로 제공할 수 없다. <br>
                                        ② 아이디를 제공하여, 빔 프로젝트 및 기타 영상물로 상영을 금지한다.<br>
                                        ③ 아이디를 타인과 시간을 분할하여 사용할 수 없다.<br>
                                        ④ 상기 1, 2, 3항을 위반할 경우, '몰'은 법적 조치를 취할 수 있으며, 발생하는 손해에 대해서 회원은 '몰'에 이용금액 * 1000배의 금액을 배상하여야 한다. </p>


                                    <h3 class="first1"><a name="a32">제 32 조 (계약해지 및 이용제한)</a></h3>
                                    <p class="mbt5">
                                        ① 회원이 이용계약을 해지하고자 하는 때에는 본인이 유선 또는 상담실을 통하여 해지하고자 하는 날의 1일전까지(단, 해지일이 법정공휴일인 경우 공휴일 개시 2일전까지) 이를 '몰'에 신청하여야 한다.	  <br>
                                        ② '몰' 회원이 제17조 기타 이 약관의 내용을 위반하고, '몰' 소정의 기간 이내에 이를 해소하지 아니하는 경우 서비스 이용계약을 해지할 수 있다.  <br>
                                        ③ '몰' 제2항에 의해 해지된 회원이 다시 이용신청을 하는 경우, 일정기간 그 승낙을 제한할 수 있다. </p>


                                    <h3 class="first1"><a name="a33">제 33 조 (손해배상)</a></h3>
                                    <p class="mbt5">'몰' 무료로 제공되는 서비스와 관련하여 회원에게 어떠한 손해가 발생하더라도 동 손해가 '몰'의 중대한 과실에 의한 경우를 제외하고 이에 대하여 책임을 부담하지 아니한다 . </p>

                                    <h3 class="first1"><a name="a34">제 34 조 (면책·배상)</a></h3>
                                    <p class="mbt5">① '몰'은 회원이 서비스에 게재한 정보, 자료, 사실의 정확성, 신뢰성 등 그 내용에 관하여는 어떠한 책임을 부담하지 아니하고, 회원은 자기의 책임아래 서비스를 이용하며, 서비스를 이용하여 게시 또는 전송한 자료 등에 관하여 손해가 발생하거나 자료의 취사선택, 기타 서비스 이용과 관련하여 어떠한 불이익이 발생하더라도 이에 대한 모든 책임은 회원에게 있다.  <br>
                                        ② '몰' 회원이 제17조 및 기타 이 약관의 내용을 위반하고, '몰 소정의 기간 이내에 이를 해소하지 아니하는 경우 서비스 이용 계약을 해지할 수 있다.  <br>
                                        ③ 회원 아이디(ID)와 비밀번호의 관리 및 이용상의 부주의로 인하여 발생되는 손해 또는 제3자에 의한 부정사용 등에 대한 책임은 모두 회원에게 있다.  <br>
                                        ④ 회원이 제17조, 기타 이 약관의 규정을 위반함으로 인하여 '몰'이 회원 또는 제3자에 대하여 책임을 부담하게 되고, 이로써 '몰'에게 손해가 발생하게 되는 경우, 이 약관을 위반한 회원은 '몰'에게 발생하는 모든 손해를 배상하여야 하며, 동 손해로부터 '몰'을 면책시켜야 한다. </p>

                                    <h3 class="first1"><a name="a35">제 35 조 (분쟁의 해결)</a></h3>
                                    <p  class="mbt5">
                                        ① '몰'과 회원은 서비스와 관련하여 발생한 분쟁을 원만하게 해결하기 위하여 필요한 모든 노력을 하여야 한다. <br>
                                        ② 제1항의 규정에도 불구하고, 동 분쟁으로 인하여 소송이 제기될 경우 동 소송은 '몰'의 본사 소재지를 관할하는 법원의 관할로 한다. </p>


                                    <h3 class="first1"><a name="a36">제 36 조 (불법이용 식별방법을 위한 자료 수집)</a></h3>
                                    <p  class="mbt5">
                                        ① '몰'은 불법이용 식별방법을 위하여 회원의 서비스 이용 중에 IP정보, 캡쳐화면(강의복제, 동영상 레코딩 프로그램 실행시) 등의 자료를 수집하여, 이를 토대로 서버를 통하여 부정이용 여부를 분류ㆍ확인한다.	  <br>
                                        ② '몰'은 회원이 서비스 이용 중에 복제프로그램을 실행시키거나 동일한 ID로 동시 접속을 하는 경우, 서비스 이용 접속을 강제로 종료 시킬 수 있다.</p>

                                    <h3 class="first1"><a name="a37">제 37 조 (불법 아이디 공유, 동영상 캡쳐 회원의 제재)</a></h3>
                                    <p class="mbt5">① "몰"은 이용자의 불법 아이디 공유 감시 및 동영상 캡쳐를 방지를 목적으로 한 컨텐츠 보안 솔루션을 통하여 보안감시 활동 중 저작권 위반 행위의 해당하는 정황이 확인된 회원에 한하여 불법 시도 정황 정보를 보안 서버에 기록한 후 〔별표4〕 같이 고지 및 후속처리를 진행한다.</p>

                                    <h3 class="first1">부칙 (시행일 2017년 01월 13일) </h3>
                                    <p class="mbt15">
                                        ① 이 약관은 2017년 01월 13일부터 시행한다.<br>
                                        ② 2013년 2월 18일~2017년 01월 12일 시행되던 종전의 약관은 본 약관으로 대체합니다.<br>
                                        <a href="/etc/terms.asp?terms=20140519" target="_blank"><span class="txt02">[이전 이용약관 보기]</span></a> (2013년 2월 18일~2017년 01월 12일)</p>

                                    <h3 class="first1">별표1 〔PMP 강의변경기준〕</h3>
                                    <ol class="mbt15">
                                        <li>인터넷강의를 PMP강의로 변경</li>
                                        인터넷강의 수강시작일로부터 7일이내, 진도율이 10%를 초과하지 않을 경우에는 고객센터(1544-5006 ARS 0번)로 연락을 할 경우 변경가능하다.
                                        <li>PMP강의를 인터넷강의로 변경</li>
                                        PMP강의의 특성상 인터넷강의로의 변경은 원칙적으로 불가하다. 다만, 수강시작일 전이나 수강시작일로부터 7일이내 이면서 강의파일을 다운받지 않았을 경우에는 고객센터(1544-5006 ARS 0번)로 연락을 할 경우 변경가능하다.
                                        <li>PMP강의에서 PMP강의로의 변경</li>
                                        PMP강의의 특성상 다른 강의로의 강의변경은 원칙적으로 불가하지만, 수강시작일 전이나 수강시작일로부터 7일이내 이면서 강의파일을 다운받지 않았을 경우에는 고객센터(1544-5006 ARS 0번)로 연락을 할 경우 변경가능하다.
                                    </ol>
                                    <h3 class="first1">별표2 〔PMP 강의중지, 연장, 환불규정〕</h3>
                                    <ol class="mbt15">
                                        <li>일시중지</li>
                                        PMP 강의는 강의파일을 다운받는 특성상 일시중지 기능이 없다.
                                        <li>강의연장</li>
                                        유료연장은 PMP강의 수강종료일 이전에 신청해야 하며 연장시 강의파일을 다시 다운받아야 한다.
                                        <li>강의환불</li>
                                        PMP강의는 샘플강의만 다운받았을 경우에만 가능하며 환불규정은 인터넷강의 환불규정에 준한다. 샘플강의이외의 파일을 다운 받았을 경우에는 환불이 불가하다.
                                    </ol>
                                    <h3 class="first1">별표3 〔PMP 기기 등록 등에 관한 규정〕</h3>
                                    <ol class="mbt15">
                                        <li>기기등록
                                            강의수강시 1대의 PMP만 사용(PMP기기를 최초 연결하여 강의를 다운 받을 때, 설치되는 프로그램에서 기기자동등록)하여 수강할 수 있으며, 현재 수강 중인 강의가 있을 경우에는 강의 종료 시까지 기기변경은 원칙적으로 불가하다.
                                        <li>기기고장, 불량의 경우
                                            A/S 접수증이나 기기 수리 확인서제출시 해당수리기간 일수 수강기간연장
                                        <li>기기 분실로 인한 경우
                                            신규 기기 구입영수증 제출시 기기변경
                                        <li>확인서 등 등록절차
                                            PMP기기 불량/수리교환증, A/S접수증, 분실 등록 내역 등을 윌비스이러닝사업팀 고객센터로 팩스(FAX : 02-871-8277)나 이메일(gosimain@hanmail.net) 로 전송.
                                    </ol>
                                    <h3 class="first1">별표4 〔불법 아이디 공유, 동영상 캡쳐 회원의 제재〕</h3>
                                    <ol class="mbt15">
                                        <li>ID공유 및 불법 사용의 유형<br>
                                            - 같은 시간대에 여러 장소에서 수강한 흔적이 발견되는 경우<br>
                                            - 접속장소가 일정 패턴 없이 수시로 변경되는 경우<br>
                                            - (주)윌비스가 아닌 제3자 에게 돈을 지불하고 ID를 받아 수강하는 경우<br>
                                            - 한 ID로 여러 사람이 같이 수강할 경우<br>
                                            - 해당아이디를 타인에게 양도한 경우<br>
                                            - 큰 강의실이나 공공장소에서 대형TV나 빔 프로젝터를 이용해 대규모로 수강하는 경우
                                        </li>
                                        <li>불법 아이디 공유 및 동영상 캡쳐 시도시 해당 이용자에 대한 고지 및 조치사항<br>
                                            - 1차 적발 : 회원 측에 내강의실 또는 이메일에서 확인가능한 개인공지를 통해 저작권 위반행위 금지경고.<br>
                                            - 2차 적발 : 수강시간 종량제 1배수 제한, 종량제관련 추가시간 조정불가, 3일간의 동영 상 접속차단 조치 및 고지.<br>
                                            - 3차 적발 : 명단 게시 및(실명일부 및 회원ID), 수강권 박탈(수강료 환불불가) 조치및 고지.<br>
                                            - 4차 적발 : 타인명의로 추가적인 불법공유행위 적발시 "온라인 디지털 콘텐츠산업 발전 법 제22조"에 의거 형사고발조치.<br>
                                            ...
                                        </li>
                                    </ol>

                                </div>
                                --}}
                            </div>
                        </li>
                        <li class="chk">
                            <div class="chkBox-Agree">
                                <input type="checkbox" id="agree3" name="agree3" class="" >
                            </div>
                            <div class="agree-Tit">
                                <a href="#none">
                                    <span class="tx-blue">(필수)</span> 개인정보 수입 및 이용 동의<span class="arrow">▼</span>
                                </a>
                            </div>
                            <div class="agree-Txt">                               

                                <div class="policyNew">
                                    <table class="tdCenter">
                                        <col width="35%"/>
                                        <col width="30%" />
                                        <col width="" />
                                        <thead>
                                        <tr>
                                            <th>개인정보 항목</th>
                                            <th>개인정보를제공 받는 자</th>
                                            <th>개인정보를 제공 받는 자의 개인정보 이용목적</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>성명, 아이디, 학번, 연락처, 이메일주소, 주소</td>
                                            <td>서비스 제공을 위한 본인식별<br />
                                                &nbsp;, 개인별 맞춤 서비스 제공<br />
                                                &nbsp;, 공지사항 전달을 위해 활용</td>
                                            <td>탈퇴시까지</td>
                                        </tr>
                                        <tr>
                                            <td>IP주소, MAC어드레스</td>
                                            <td>학습자격확인을 위해 활용</td>
                                            <td>탈퇴시까지</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div>
                                        <strong>* 동의거부 권리 안내</strong><br />
                                        정보주체는 개인정보 수집·이용에 대해 거부 할 권리가 있습니다.<br />
                                        -> 거부에 따른 불이익 : 평가인정 신청에 반드시 필요한 사항으로 거부하실 경우 평가인정을 받으실 수 없습니다. 또한 환불진행이 원할하게 진행되지 않는 등 홈페이지 이용이 제한됩니다.
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--
                        <li class="chk">
                            <div class="chkBox-Agree">
                                <input type="checkbox" id="agree4" name="agree4" class="" value="Y">
                            </div>
                            <div class="agree-Tit">
                                <a href="#none">
                                    (선택) 개인정보 위탁 동의<span class="arrow">▼</span>
                                </a>
                            </div>
                            <div class="agree-Txt">
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                            </div>
                        </li>
                        -->
                    </ul>
                </div>
                <div class="combine-Btn mt40 pt30 bdt-light-gray btnAuto h66">
                    <button type="button" id="btn_submit" class="mem-Btn bg-blue bd-dark-blue">
                        <span>동의하고 회원가입</span>
                    </button>
                </div>
            </div>
            <!-- End 통합회원가입 : 약관동의/정보입력 -->
            <br/><br/><br/><br/><br/><br/>
        </div>
        <!-- End Container -->
    </form>
    <script>
        var $join_form = $('#join_form');
        var confirm_id = false;

        $(document).ready(function() {
            $("#MemId").val('');
            $("#MemPassword").val('');
            $("#MemPassword_chk").val('');

            $join_form.validate({
                onkeyup : false,
                rules : {
                    Sex : {
                        required : true
                    },
                    BirthDay : {
                        required : true,
                        minlength : 8,
                        maxlength : 8,
                        number : true,
                        birthday_chk : true,
                        under_age : true
                    },
                    Phone : {
                        required : true,
                        minlength : 10,
                        maxlength : 11,
                        number : true,
                        phone_chk : true
                    },
                    MemId : {
                        required : true,
                        minlength : 4,
                        maxlength : 20,
                        id_char : true,
                        id_chk : true
                    },
                    MemPassword : {
                        required : true,
                        minlength : 8,
                        maxlength : 20,
                        pwd_mix : true
                    },
                    MemPassword_chk : {
                        required : true,
                        pwd_chk : true
                    }
                },
                messages : {
                    Sex : {
                        required : "성별을 선택해주십시요."
                    },
                    BirthDay : {
                        required : "생년월일을 입력해주십시요.",
                        minlength : "생년월일은 8자리 숫자만 가능합니다.1",
                        maxlength : "생년월일은 8자리 숫자만 가능합니다.2",
                        birthday_chk : "정상적인 날짜형식이 아닙니다.",
                        under_age : "14세 미만은 가입이 불가능합니다."
                    },
                    Phone : {
                        required : "핸드폰번호를 입력해주십시요.",
                        minlength : "핸드폰번호는 10~11자리 숫자만 가능합니다.1",
                        maxlength : "핸드폰번호는 10~11자리 숫자만 가능합니다.2",
                        phone_chk : "정상적인 핸드폰번호가 아닙니다."
                    },
                    MemId : {
                        required : "아이디를 입력해주십시요.",
                        minlength : "아이디는 4~20자의 영어소문자, 숫자 만 사용 가능합니다.",
                        maxlength : "아이디는 4~20자의 영어소문자, 숫자 만 사용 가능합니다.",
                        id_char : "아이디는 4~20자의 영어소문자, 숫자 만 사용 가능합니다.",
                        id_chk : "이미 가입된 아이디입니다. (아이디는 4~20자의 영어소문자, 숫자 만 사용 가능합니다.)"
                    },
                    MemPassword : {
                        required : "비밀번호를 입력해주십시요.",
                        minlength : "비밀번호는 8~20자리로 입력해주십시요.1",
                        maxlength : "비밀번호는 8~20자리로 입력해주십시요.2",
                        pwd_mix : "영문대소문자, 숫자, 특수문자중 2종류이상 조합해야 합니다."
                    },
                    MemPassword_chk : {
                        required : "비밀번호를 다시한번 입력해주십시요.",
                        pwd_chk : "비밀번호가 일치하지 않습니다."
                    }
                },
                invalidHandler: function(form, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        validator.errorList[0].element.focus();
                    }
                },
                onfocusout:function(element, event){
                    var res = $(element).valid();
                },
                errorPlacement: function(error, $element) {
                    var name = $element.attr("name");
                    if(name == 'Sex'){
                        var obj = $('input[name=MemName]');
                    }else {
                        var obj = $("input[name=" + name + "]");
                    }

                    var msg = obj.parent().parent().children('.err_msg');
                    msg.html(error);
                }
            });

            $.validator.addMethod("id_chk", function(value, element) {
                var ret  = check_id(value);
                return ret;
            });

            $.validator.addMethod("id_char", function(value, element) {
                var p = /^[0-9a-z]{4,20}$/;
                if(p.test(value)) {return true;}
                else {return false;}
            });


            $.validator.addMethod("birthday_chk", function(value, element) {
                var BirthDay = $("input[name='BirthDay']").val();
                var p = /^(19|20)\d{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[0-1])$/;
                if( p.test(BirthDay) ){ return true;}
                else {return false; }
            });

            $.validator.addMethod("under_age", function(value, element) {
                var BirthDay = $("input[name='BirthDay']").val();
                var age = calcAge(BirthDay);
                if(age < 14){
                    return false;
                } else {
                    return true;
                }
            });

            $.validator.addMethod("pwd_chk", function(value, element) {
                var pwd = $("input[name='MemPassword']").val();
                var pwdchk = $("input[name='MemPassword_chk']").val();

                if (pwd == pwdchk) { return true; }
                else { return false;}
            });

            $.validator.addMethod("phone_chk", function(value, element) {
                var Phone = $("input[name='Phone']").val();
                var p = /^((01[1|6|7|8|9])[1-9]+[0-9]{6,7})|(010[1-9][0-9]{7})$/;
                if( p.test(Phone) ){ return true;}
                else {return false; }
            });

            $.validator.addMethod("pwd_mix",function(value, element){
                var n = value.search(/[0-9]/g);
                var e = value.search(/[a-zA-Z]/ig);
                var s = value.search(/[`~!@#$%^&*|\\\'\";:\/?\<\>\,\.\[\]\{\}\+\-\=\_\(\)]/gi);
                var rtn = true;
                if( (n < 0 && e < 0) || (e < 0 && s < 0) || (s < 0 && n < 0) ){
                    rtn = false;
                }
                return this.optional(element) || rtn;
            });

            $('#btn_submit').click(function(){
                if($join_form.valid() == true){
                    if($('#agree1').is(":checked") != true ||
                        $('#agree2').is(":checked") != true ||
                        $('#agree3').is(":checked") != true ){
                        alert('필수항목에 동의해야 회원가입이 가능합니다.');
                        return;
                    }

                    $join_form.attr("action", "/member/join/proc");
                    $join_form.submit();
                }
            });

            function check_id(value)
            {
                var obj = $('input[name="MemId"]');
                var msg = obj.parent().parent().children('.error_msg');
                var _url = '{{front_app_url("/member/join/checkID/", "www")}}';
                var data = $('#join_form').formSerialize();

                $.ajax({
                    type: "POST",
                    url: _url,
                    cache : false,
                    dataType: 'text',
                    data: data,
                    async:false,
                    success: function (res) {
                        if(res == '0000'){
                            confirm_id = true;
                        } else {
                            confirm_id = false;
                        }
                    }
                });

                return confirm_id;
            }

            $("#domain").change(function (){
                setMailDomain('domain', 'MailDomain');
                if($(this).val() == ""){
                    $("#MailDomain").focus();
                } else {
                    $("#MailId").focus();
                }
            });

            $('input[name=Sex]').click(function(){
                $('.sexchk').removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $("#btn_zipcode,#ZipCode").click(function (){
                var width = 500;
                var height = 600;

                new daum.Postcode({
                    oncomplete: function(data) {
                        var extraAddr = '';

                        // if(data.bname !== ''){ extraAddr += data.bname; }
                        if(data.buildingName !== ''){ extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName); }

                        $("#ZipCode").val(data.zonecode);
                        $("#Addr1").val(data.roadAddress);
                        $("#Addr2").val(extraAddr);

                        $("#Addr2").focus();
                    }
                }).open({
                    left: (window.screen.width / 2) - (width / 2),
                    top: (window.screen.height / 2) - (height / 2)
                });
            });
        });
    </script>
    <script src="/public/vendor/jquery/validator/jquery.validate.js"></script>
    <script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
    <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
    <script type="text/javascript">
        kakaoPixel('6331763949938786102').pageView();
    </script>
@stop