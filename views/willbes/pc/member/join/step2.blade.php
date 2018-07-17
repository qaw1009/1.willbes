@extends('willbes.pc.layouts.master')

@section('content')
    <form name="join_form" id="join_form" onsubmit="return false;">
        <input type="hidden" name="jointype" id="jointype" value="{{$jointype}}" />
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
                <tr><td colspan="2">
                        {{$jointype}}<br/><br/>
                        {{$enc_data}}<br/><br/>
                        {{$phone}}<br/><br/>
                        {{$memName}}<br/><br/>
                        {{$MailId}}<br/><br/>
                        {{$MailDomain}}<br/><br/>
                    </td></tr>
                <tr>
                    <td class="combine-Tit">이름</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="text" id="MemName" name="MemName" class="iptName" readonly value="{{$memName}}">
                            <ul class="chkBox-Sex">
                                <li class="radio-Btn sexchk p_re checked">
                                    <label for="Sex" class="labelName" style="display: block;">남성</label>
                                    <input type="radio" id="Sex" name="Sex" class="" value="M" title="">
                                </li>
                                <li class="radio-Btn sexchk p_re">
                                    <label for="Sex" class="labelName" style="display: block;">여성</label>
                                    <input type="radio" id="Sex" name="Sex" class="" value="F" title="">
                                </li>
                            </ul>
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">생년월일</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="text" id="BirthDay" name="BirthDay" class="iptBirth" placeholder="생년월일 ex.19800101" maxlength="8">
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">휴대폰번호</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="text" id="Phone" name="Phone" class="iptPhone" placeholder='"-" 제외하고 숫자만 입력' maxlength="11" @if ( $jointype == '655002' ) value="{{$phone}}" readonly @endif >
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">아이디</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="text" id="MemId" name="MemId" class="iptId" placeholder="4~20자리 영문 소문자, 숫자만 입력 가능" maxlength="20">
                            <button type="submit" onclick="" class="mem-Btn combine-Btn ml5 bg-dark-blue bd-dark-blue">
                                <span>중복확인</span>
                            </button>
                        </div>

                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">비밀번호</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="password" id="MemPassword" name="MemPassword" class="iptPwd" placeholder="8~20자리이하 영문대소문자, 숫자, 특수문자중2종류조합" maxlength="20">

                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">비밀번호</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="password" id="MemPassword_chk" name="MemPassword_chk" class="iptPwd" placeholder="비밀번호 확인" maxlength="20">

                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
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
                        <div class="inputBox">
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
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">우편번호</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="text" id="ZipCode" name="ZipCode" class="iptEmail01" placeholder="우편번호" maxlength="5" readonly>
                            <button type="submit" onclick="" class="mem-Btn combine-Btn mb10 bg-dark-blue bd-dark-blue">
                                <span>우편번호 찾기</span>
                            </button>
                            <div class="addbox1 p_re">
                                <input type="text" id="Addr1" name="Addr1" class="iptAdd1" placeholder="기본주소" maxlength="30" readonly>
                            </div>
                            <div class="addbox2 p_re">
                                <input type="text" id="Addr2" name="Addr2" class="iptAdd2" placeholder="상세주소" maxlength="30">
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="agree-Chk mt40 toggle">
                <div class="agree-All-Tit p_re">
                    전체동의
                    <div class="chkBox-Agree">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                </div>
                <ul>
                    <li>
                        <div class="agree-Tit">
                            <a href="#none">
                                <span class="tx-blue">(필수)</span> 만 14세 이상입니다. <span class="tx11">( 만 14세 미만은 회원가입이 제한됩니다.)</span>
                                <div class="chkBox-Agree checked">
                                    <input type="checkbox" id="agree1" name="agree1" class="" maxlength="30">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="agree-Tit">
                            <a href="#none">
                                <span class="tx-blue">(필수)</span> Willbes 통합회원 이용약관 동의
                                <div class="chkBox-Agree checked">
                                    <input type="checkbox" id="agree2" name="agree2" class="" maxlength="30">
                                </div>
                            </a>
                        </div>
                        <div class="agree-Txt">
                            Willbes 통합회원 이용약관 동의<br>
                            Willbes 통합회원 이용약관 동의<br>
                            Willbes 통합회원 이용약관 동의<br>
                            Willbes 통합회원 이용약관 동의<br>
                            Willbes 통합회원 이용약관 동의<br>
                            Willbes 통합회원 이용약관 동의<br>
                            Willbes 통합회원 이용약관 동의<br>
                            Willbes 통합회원 이용약관 동의<br>
                        </div>
                    </li>
                    <li>
                        <div class="agree-Tit">
                            <a href="#none">
                                <span class="tx-blue">(필수)</span> 개인정보 수입 및 이용 동의
                                <div class="chkBox-Agree">
                                    <input type="checkbox" id="agree3" name="agree3" class="" maxlength="30">
                                </div>
                            </a>
                        </div>
                        <div class="agree-Txt">
                            개인정보 수입 및 이용 동의<br/>
                            개인정보 수입 및 이용 동의<br/>
                            개인정보 수입 및 이용 동의<br/>
                            개인정보 수입 및 이용 동의<br/>
                            개인정보 수입 및 이용 동의<br/>
                            개인정보 수입 및 이용 동의<br/>
                            개인정보 수입 및 이용 동의<br/>
                            개인정보 수입 및 이용 동의<br/>
                            개인정보 수입 및 이용 동의<br/>
                            개인정보 수입 및 이용 동의<br/>
                        </div>
                    </li>
                    <li>
                        <div class="agree-Tit">
                            <a href="#none">
                                (선택) 개인정보 위탁 동의
                                <div class="chkBox-Agree">
                                    <input type="checkbox" id="agree4" name="agree4" class="" maxlength="30">
                                </div>
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

    <script src="/public/vendor/validator/validator.js"></script>
    <script src="/public/vendor/jquery/form/jquery.form.min.js"></script>
    <script src="/public/js/util.js"></script>
    <script src="/public/js/validation_util.js"></script>
    <script>
        $(document).ready(function() {
            $("#domain").change(function (){
                setMailDomain('domain', 'MailDomain');
                if($(this).val() == ""){
                    $("#MailDomain").focus();
                } else {
                    $("#MailId").focus();
                }
            });

            $("#btn_submit").click(function (){
                alert($("#Sex").val());
            });
        });
    </script>
@stop