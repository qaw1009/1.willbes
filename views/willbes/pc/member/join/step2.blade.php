@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="/public/img/front/login/logo.gif">
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
                    <th class="tx-blue" colspan="2">* 필수정보</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="combine-Tit">이름</td>
                    <td>
                        <div class="inputBox p_re">
                            <label for="USER_NAME" class="labelName" style="display: block;">홍길동</label>
                            <input type="text" id="USER_NAME" name="USER_NAME" class="iptName" maxlength="30">
                            <ul class="chkBox-Sex">
                                <li class="radio-Btn sexchk p_re checked">
                                    <label for="USER_SEX" class="labelName" style="display: block;">남성</label>
                                    <input type="radio" id="" name="sex" class="" value="male" title="" checked="checked">
                                </li>
                                <li class="radio-Btn sexchk p_re">
                                    <label for="USER_SEX" class="labelName" style="display: block;">여성</label>
                                    <input type="radio" id="" name="sex" class="" value="female" title="">
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
                            <label for="USER_BIRTH" class="labelBirth" style="display: block;">생년월일 ex.19800101</label>
                            <input type="text" id="USER_BIRTH" name="USER_BIRTH" class="iptBirth" maxlength="30">
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">휴대폰번호</td>
                    <td>
                        <div class="inputBox p_re">
                            <label for="USER_PHONE" class="labelPhone" style="display: block;">"-" 제외하고 숫자만 입력</label>
                            <input type="text" id="USER_PHONE" name="USER_PHONE" class="iptPhone" maxlength="30">
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">아이디</td>
                    <td>
                        <div class="inputBox p_re">
                            <label for="USER_ID" class="labelId" style="display: block;">4~20자리 영문 대소문자, 숫자만 입력 가능</label>
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">비밀번호</td>
                    <td>
                        <div class="inputBox p_re">
                            <label for="USER_PWD" class="labelPwdNew" style="display: block;">8~20자리이하영문대소문자, 숫자, 특수문자중2종류조합</label>
                            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" maxlength="30">
                            <button type="submit" onclick="" class="mem-Btn combine-Btn ml5 bg-dark-blue bd-dark-blue">
                                <span>비밀번호 확인</span>
                            </button>
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
                    <th class="tx-blue" colspan="2">* 선택정보</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="combine-Tit">이메일</td>
                    <td>
                        <div class="inputBox">
                            <dl>
                                <dt class="mbox1 p_re">
                                    <label for="USER_EMAIL" class="labelEmail" style="display: block;">이메일</label>
                                    <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" maxlength="30">
                                </dt>
                                <dt class="mbox-dot">@</dt>
                                <dt class="mbox2">
                                    <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                                </dt>
                                <dt class="mbox-sele">
                                    <select id="email" name="email" title="직접입력" class="seleEmail">
                                        <option selected="selected">직접입력</option>
                                        <option value="naver.com">naver.com</option>
                                        <option value="daum.net">daum.net</option>
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
                            <button type="submit" onclick="" class="mem-Btn combine-Btn mb10 bg-dark-blue bd-dark-blue">
                                <span>우편번호 찾기</span>
                            </button>
                            <div class="addbox1 p_re">
                                <label for="USER_ADD1" class="labelAdd1" style="display: block;">기본주소</label>
                                <input type="text" id="USER_ADD1" name="USER_ADD1" class="iptAdd1" maxlength="30">
                            </div>
                            <div class="addbox2 p_re">
                                <label for="USER_ADD2" class="labelAdd2" style="display: block;">상세주소</label>
                                <input type="text" id="USER_ADD2" name="USER_ADD2" class="iptAdd2" maxlength="30">
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
                                    <input type="checkbox" id="" name="" class="" maxlength="30">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="agree-Tit">
                            <a href="#none">
                                <span class="tx-blue">(필수)</span> Willbes 통합회원 이용약관 동의
                                <div class="chkBox-Agree checked">
                                    <input type="checkbox" id="" name="" class="" maxlength="30">
                                </div>
                            </a>
                        </div>
                        <div class="agree-Txt"></div>
                    </li>
                    <li>
                        <div class="agree-Tit">
                            <a href="#none">
                                <span class="tx-blue">(필수)</span> 개인정보 수입 및 이용 동의
                                <div class="chkBox-Agree">
                                    <input type="checkbox" id="" name="" class="" maxlength="30">
                                </div>
                            </a>
                        </div>
                        <div class="agree-Txt"></div>
                    </li>
                    <li>
                        <div class="agree-Tit">
                            <a href="#none">
                                (선택) 개인정보 위탁 동의
                                <div class="chkBox-Agree">
                                    <input type="checkbox" id="" name="" class="" maxlength="30">
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
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>동의하고 회원가입</span>
                </button>
            </div>
        </div>
        <!-- End 통합회원가입 : 약관동의/정보입력 -->
        <br/><br/><br/>
    </div>
    <!-- End Container -->
@stop