@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="memContainer widthAuto c_both">

    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합 서비스 안내</span>
    </div>
    <!-- 통합 서비스 안내 : 본인인증 -->
    <div class="Member mem-Combine widthAuto690 mb100">
        <div class="user-Txt tx-black">
            윌비스 한림법학원 회원 통합으로 인하여 <span class="tx-red">회원 개인정보 보안을 위해</span><br/>
            번거러우시더라도 <span class="tx-red">본인인증을 진행</span>해 주시기 바랍니다.
        </div>
        <ul class="tabWrap tabLoginDepth1 tabs full c_both mt40">
            <li><a href="#join1" class="on">휴대폰 인증</a></li>
            <!--li><a href="#join2">E-mail 인증</a></li-->
        </ul>
        <div class="tabBox">
            <div id="join1">
                <div class="widthAuto460">
                    <div class="inputBox p_re mb30">
                        <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="이름" maxlength="30">
                    </div>
                    <div class="inputBox p_re mb30">
                        <input type="text" id="USER_PHONE" name="USER_PHONE" class="iptPhone certi" placeholder="휴대폰번호(-제외)" maxlength="30">
                        <button type="submit" onclick="" class="mem-Btn certi bg-dark-blue bd-dark-blue">
                            <span>인증번호 발송</span>
                        </button>
                    </div>
                    <div class="inputBox p_re mb30">
                        <input type="text" id="USER_NUMBER" name="USER_NUMBER" class="iptNumber certi" placeholder="인증번호입력" maxlength="30">
                        <button type="submit" onclick="" class="mem-Btn certi bg-dark-blue bd-dark-blue">
                            <span>00:00</span>
                        </button>
                    </div>
                </div>
                <div class="search-Btn btnAuto120 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>확인</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End 통합 서비스 안내 : 본인인증 -->


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합 서비스 안내</span>
    </div>
    <!-- 통합 서비스 안내 : 비밀번호 변경 -->
    <div class="Member mem-Combine widthAuto690 mb100">
        <div class="user-Txt tx-black">
            윌비스 한림법학원 회원 통합으로 인하여 <span class="tx-red">회원 개인정보 보안을 위해</span><br/>
            번거러우시더라도 <span class="tx-red">비밀번호를 변경</span>해 주시기 바랍니다.
        </div>
        <table cellspacing="0" cellpadding="0" class="combineTable mb60 mt40">
            <colgroup>
                <col style="width: 20%;"/>
                <col style="width: auto;"/>
            </colgroup>
            <thead>
                <tr>
                    <th class="tx-blue tx-left" colspan="2">* 비밀번호 변경</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="combine-Tit">이름</td>
                    <td>
                        홍길동
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">생년월일</td>
                    <td>
                        19800101
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">휴대폰번호</td>
                    <td>
                        010-1234-5670
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">아이디</td>
                    <td>
                        willbes
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">비밀번호</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" placeholder="8~20자리이하영문대소문자, 숫자, 특수문자중2종류조합" maxlength="30">
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">비밀번호 확인</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" placeholder="8~20자리이하영문대소문자, 숫자, 특수문자중2종류조합" maxlength="30">
                            <button type="submit" onclick="" class="mem-Btn combine-Btn ml5 bg-dark-blue bd-dark-blue">
                                <span>비밀번호 확인</span>
                            </button>
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="search-Btn btnAuto120 h36">
            <button type="submit" onclick="" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                <span>비밀번호 변경하기</span>
            </button>
        </div>

    </div>
    <!-- End 통합회원가입 : 비밀번호 변경 -->


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합 서비스 안내</span>
    </div>
    <!-- 통합 서비스 안내 : 아이디 변경 -->
    <div class="Member mem-Combine widthAuto690 mb100">
        <div class="user-Txt tx-black">
            <strong class="tx-blue">ABCD</strong>는 이미 중복된 아이디입니다.<br/>
            번거러우시더라도 <span class="tx-red">윌비스 통합 서비스의 원활한 이용을 위해 아이디 변경을 </span>부탁드리겠습니다.
        </div>        
        <table cellspacing="0" cellpadding="0" class="combineTable mb60 mt40">
            <colgroup>
                <col style="width: 20%;"/>
                <col style="width: auto;"/>
            </colgroup>
            <thead>
                <tr>
                    <th class="tx-blue tx-left" colspan="2">* 아이디 변경</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="combine-Tit">이름</td>
                    <td>
                        홍길동
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">생년월일</td>
                    <td>
                        19800101
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">휴대폰번호</td>
                    <td>
                        010-1234-5670
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">통합 ID</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="4~20자리 영문 소문자,숫자만 입력 가능" maxlength="30">
                            <button type="submit" onclick="" class="mem-Btn combine-Btn ml5 bg-dark-blue bd-dark-blue">
                                <span>중복 확인</span>
                            </button>
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">비밀번호</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" placeholder="8~20자리이하영문대소문자, 숫자, 특수문자중2종류조합" maxlength="30">
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">비밀번호 확인</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" placeholder="8~20자리이하영문대소문자, 숫자, 특수문자중2종류조합" maxlength="30">
                            <button type="submit" onclick="" class="mem-Btn combine-Btn ml5 bg-dark-blue bd-dark-blue">
                                <span>비밀번호 확인</span>
                            </button>
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="search-Btn btnAuto120 h36">
            <button type="submit" onclick="" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                <span>아이디 변경하기</span>
            </button>
        </div>

    </div>
    <!-- End 통합회원가입 : 아이디 변경 -->

    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합 서비스 안내</span>
    </div>
    <!-- 통합 서비스 안내 : 고객센터-->
    <div class="Member mem-Combine widthAuto690 mb100">
        <div class="user-Txt tx-black">
            일치하는 정보가 없습니다.<br>
            다시 <span class="tx-red">본인인증을 진행</span>해 주시거나 고객센터로 문의해 주시기 바랍니다.
        </div>      
        <div class="search-Btn btnAuto120 h36 mt40">
            <button type="submit" onclick="" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                <span>본인인증 다시 하기</span>
            </button>
        </div>
        <div class="info-Txt-cs NG">
            <span>
                1544-5006 <a href="{{ site_url('/support/main') }}" target="_blank">고객센터 ></a>
            </span>     
        </div>
    </div>
    <!-- End 통합회원가입 : 아이디 변경 -->

</div>
<!-- End Container -->
@stop