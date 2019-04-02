@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="memContainer widthAuto c_both">

    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합 서비스 안내</span>
    </div>
    <!-- 통합 서비스 안내 -->
    <div class="Member mem-Convert widthAuto690">
        <div class="user-Txt tx-black">
            윌비스공무원(www.willbesgosi.net), 신광은경찰(www.willbescop.net)이<br/>
            더 좋은 서비스 제공을 위해 '윌비스' 라는 이름으로 새롭게 통합되었습니다.<br/>
            기존 수강 강좌 및 혜택을 유지하기 위해 윌비스 통합회원으로 전환이 필요하며,<br/>
            <div class="tx-red">전환을 신청하지 않을 시 서비스 이용이 불가능합니다.</div>
        </div>
        <div class="info-Txt tx-black">
            통합회원 전환 시<br/>
            <strong>하나의 ID로 윌비스의 전체 서비스를 이용</strong>하실 수 있습니다.
        </div>
        <div class="convert-chkBox mt30">
            <img src="{{ img_url('login/willbes_convert_user.jpg') }}">
            <div class="chkBox-Save mt30 mb30">
                <input type="checkbox" id="USER_ID_SAVE" name="USER_ID_SAVE" class="iptSave">
                <label for="USER_ID_SAVE" class="labelSave tx-gray"><span class="tx-red">(필수)</span> 윌비스 통합회원 전환을 동의합니다.</label>
            </div>
            <div class="search-Btn btnAuto180 h36">
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>통합회원 신청하기</span>
                </button>
            </div>
        </div>
        <div class="info-Txt tx-black mt60">
            <div class="tx-red">※ 기존사용하는 ID 그대로 통합 ID로 사용할 수 있습니다.</div>
            단, ID가 중복된 통합ID가 있을 경우, 신규 통합 ID를 생성이 필요합니다.<br/>
            <div class="tx-red">※ 기존 수강 강좌, 포인트, 쿠폰은 '통합ID'계정으로 이관됩니다.</div>
        </div>
    </div>
    <!-- End 통합 서비스 안내 -->


    <br/><br/><br/><br/><br/><br/>


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합회원 전환</span>
    </div>
    <!-- 통합회원 전환 : 본인인증 -->
    <div class="Member mem-Convert widthAuto690">
        <ul class="tabs-Step mb40">
            <li class="on">본인인증</li>
            <li>통합회원정보/약관동의</li>
            <li>전환완료</li>
        </ul>
        <div class="user-Txt tx-black">
            기존 이용중인 윌비스 서비스를 확인하기 위해 본인 인증을 해 주세요.</br>
            최초 인증된 ID는 '통합 ID'로 사용됩니다.
        </div>
        <ul class="tabWrap tabs-Certi">
            <li id="tab1"><a href="#convert1"><div>휴대폰 인증</div></a></li>
            <li id="tab2"><a href="#convert2"><div>E-mail 인증</div></a></li>
            <li id="tab3"><a href="#convert3"><div>아이핀 인증</div></a></li>
        </ul>
        <div class="tabBox">
            <div id="convert1">
                <div class="widthAuto460 mt50">
                    <div class="inputBox p_re">
                        <input type="text" id="USER_ID" name="USER_ID" class="iptId bg-gray" maxlength="30" placeholder="로그인한 아이디 출력 (수정불가)" readonly>
                    </div>
                    <div class="tx-red mb30" style="display: block;">가입 시 등록 정보로 인증해 주세요.</div>
                    <div class="inputBox p_re">
                        <input type="text" id="USER_PHONE" name="USER_PHONE" class="iptPhone certi" placeholder="휴대폰번호(-제외)" maxlength="30">
                        <button type="submit" onclick="" class="mem-Btn certi bg-dark-blue bd-dark-blue">
                            <span>인증번호 발송</span>
                        </button>
                    </div>
                    <div class="tx-red mb30" style="display: block;"> ‘-’ 없이 숫자만 입력해 주세요.</div>
                    <div class="inputBox p_re">
                        <input type="text" id="USER_NUMBER" name="USER_NUMBER" class="iptNumber" placeholder="인증번호입력" maxlength="30">
                    </div>
                    <div class="tx-red mb30" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
                </div>
                <div class="convert-Btn mt50 btnAuto120 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>확인</span>
                    </button>
                </div>
                <div class="notice-Txt tx-gray mt40"></div>
            </div>
            <div id="convert2">
                <div class="widthAuto460 mt50">
                    <div class="inputBox p_re">
                        <input type="text" id="USER_ID" name="USER_ID" class="iptId bg-gray" maxlength="30" placeholder="로그인한 아이디 출력 (수정불가)" readonly>
                    </div>
                    <div class="inputBox p_re">
                        <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" placeholder="이메일" maxlength="30"> @ 
                        <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                        <select id="email" name="email" title="직접입력" class="seleEmail">
                            <option selected="selected">직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="daum.net">daum.net</option>
                        </select>
                    </div>
                    <div class="tx-red" style="display: block;">가입 시 등록한 메일주소를 입력해 주세요.</div>
                </div>
                <div class="convert-Btn mt50 btnAuto120 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>확인</span>
                    </button>
                </div>
                <div class="notice-Txt tx-gray mt40">* 입력하신 메일로 발송된 인증메일의 인증링크를 유효시간 30분 안에 클릭해 주세요.</div>
            </div>
            <div id="convert3">
                <div class="widthAuto460 mt50">
                    <div class="inputBox p_re">
                        <input type="text" id="USER_ID" name="USER_ID" class="iptId bg-gray" maxlength="30" placeholder="로그인한 아이디 출력 (수정불가)" readonly>
                    </div>
                    <div class="tx-red" style="display: block;">가입 시 등록 정보로 인증해 주세요.</div>
                </div>
                <div class="convert-Btn mt50 btnAuto120 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>아이핀 인증</span>
                    </button>
                </div>
                <div class="notice-Txt tx-gray mt40">
                    * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
                </div>
            </div>
        </div>
    </div>
    <!-- End 통합회원 전환 : 본인인증 -->


    <br/><br/><br/><br/><br/><br/>


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합회원 전환</span>
    </div>
    <!-- 통합회원 전환 : 약관동의/정보입력 : 미전환/미중복 -->
    <div class="Member mem-Convert widthAuto690">
        <ul class="tabs-Step mb60">
            <li>본인인증</li>
            <li class="on">통합회원정보/약관동의</li>
            <li>전환완료</li>
        </ul>
        <div class="user-Txt tx-black">
            <span class="tx-blue">홍길동</span> 회원님의 아이디 Hong12345, 확인이 완료되었습니다.<br/><br/>
            통합ID 사용 여부와 회원정보를 확인 후 변경된 약관에 동의해 주세요.<br/>
            (단, 다른 회원이 동일 ID를 먼저 사용할 경우, 신규 ID 생성이 필요합니다.)
        </div>
        <div class="agree-user-Chk">
            <ul>
                <li class="agree-Confirm tx-black ok">
                    로그인한 아이디 출력 (수정불가)
                </li>
                <li class="agree-Confirm tx-blue bd-none">
                    통합 ID로 사용 가능한 계정 입니다.
                </li>
            </ul>
        </div>
        <div class="agree-user-Chk mt40">
            <div class="agree-All-Tit tx-black p_re">
                통합회원정보
            </div>
            <ul>
                <li class="agree-Confirm bg-light-gray">
                    이름 노출
                </li>
                <li class="agree-Confirm bg-light-gray">
                    생년월일 노출
                </li>
                <li class="agree-Confirm bg-light-gray">
                    휴대폰번호 노출
                </li>
            </ul>
        </div>
        <div class="agree-Chk mt50 toggle">
            <div class="agree-All-Tit tx-black p_re">
                통합회원 약관동의
            </div>
            <ul>
                <li class="top bg-light-gray">
                    <div class="AllchkBox agree-Tit tx-black">
                        <strong>변경된 이용약관에 대한 내용은 모두 확인하고 전체 동의합니다.</strong>
                        <div class="chkBox-Agree">
                            <input type="checkbox" id="" name="" class="" maxlength="30">
                        </div>
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree checked">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            <span class="tx-blue">(필수)</span> 만 14세 이상입니다. <span class="tx12">( 만 14세 미만은 회원가입이 제한됩니다.)</span>
                        </a>
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree checked">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            <span class="tx-blue">(필수)</span> Willbes 통합회원 이용약관 동의<span class="v_arrow">▼</span>
                        </a>
                    </div>
                    <div class="agree-Txt">
                        @include('willbes.pc.site.main_partial.main_point_' . $__cfg['SiteCode'])
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            <span class="tx-blue">(필수)</span> 개인정보 수입 및 이용 동의<span class="v_arrow">▼</span>
                        </a>
                    </div>
                    <div class="agree-Txt">
                        aaaaa 약관이 노출 됩니다.<br/>
                        sssss 약관이 노출 됩니다.<br/>
                        ddddd 약관이 노출 됩니다.<br/>
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            (선택) 개인정보 위탁 동의<span class="v_arrow">▼</span>
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
        <div class="convert-Btn mt40 pt30 tx-center btnAuto h66">
            <button type="submit" onclick="" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                <span>통합회원 전환하기</span>
            </button>
        </div>
    </div>
    <!-- End 통합회원 전환 : 약관동의/정보입력 : 미전환/미중복 -->


    <br/><br/><br/><br/><br/><br/>


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합회원 전환이 완료되었습니다!</span>
    </div>
    <!-- 통합회원 전환 : 약관동의/정보입력 : 전환완료 -->
    <div class="Member mem-Convert widthAuto690">
        <ul class="tabs-Step mb60">
            <li>본인인증</li>
            <li>통합회원정보/약관동의</li>
            <li class="on">전환완료</li>
        </ul>
        <div class="user-Txt tx-black">
            <strong>윌비스 통합회원 전환을 환영합니다.</strong><br/>
            기존 수강강좌, 포인트, 쿠폰은 '통합 내강의실'에서 확인하실 수 있습니다.
        </div>
        <div class="agree-user-Chk">
            <table cellspacing="0" cellpadding="0" class="auTable">
                <colgroup>
                    <col style="width: 180px;"/> 
                    <col style="width: 510px;"/>
                </colgroup>
                <tbody>
                    <tr>
                        <th>이름</th>
                        <td>이름 노출</td>
                    </tr>
                    <tr>
                        <th>통합ID</th>
                        <td>아이디 노출</td>
                    </tr>
                    <tr>
                        <th>통합 전환일</th>
                        <td>2018.10.10</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="convert-Btn mt60 tx-center btnAuto h36">
            <button type="submit" onclick="" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                <span>확인</span>
            </button>
        </div>
    </div>
    <!-- End 통합회원 전환 : 약관동의/정보입력 : 전환완료 -->


    <br/><br/><br/><br/><br/><br/>


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합회원 전환</span>
    </div>
    <!-- 통합회원 전환 : 통합 미전환 중복 -->
    <div class="Member mem-Convert widthAuto690">
        <ul class="tabs-Step mb60">
            <li>본인인증</li>
            <li class="on">통합회원정보/약관동의</li>
            <li>전환완료</li>
        </ul>
        <div class="user-Txt tx-black">
            <span class="tx-blue">홍길동</span> 회원님의 아이디 Hong12345, 확인이 완료되었습니다.<br/><br/>
            통합ID 사용 여부와 회원정보를 확인 후 변경된 약관에 동의해 주세요.<br/>
            (단, 다른 회원이 동일 ID를 먼저 사용할 경우, 신규 ID 생성이 필요합니다.)
        </div>
        <div class="agree-user-Chk">
            <ul>
                <li class="agree-Confirm tx-black no">
                    로그인한 아이디 출력 (수정불가)
                </li>
                <li class="agree-Confirm tx-red bd-none">
                    이미 사용중인 통합 아이디입니다. 신규 통합 아이디를 생성해 주세요.
                </li>
            </ul>
        </div>
        <div class="agree-user-Chk mt40">
            <div class="agree-All-Tit tx-black p_re">
                통합회원정보
            </div>
            <ul>
                <li class="agree-User">
                    <div class="agree-Tit tx-gray">
                        <div class="inputBox agreeBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="신규 통합 아이디" maxlength="30">
                        </div>
                        <div class="tx-gray mb10">4~20자리 영문 대소문자, 숫자만 입력 가능</div>
                        <div class="tx-red" style="display: block;">* 유효성메시지노출</div>
                    </div>
                </li>
                <li class="agree-User">
                    <div class="agree-Tit tx-gray">
                        <div class="inputBox agreeBox p_re">
                            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" placeholder="신규 비밀번호" maxlength="30">
                            <a class="bg-dark-blue" href="#none">확인</a>
                        </div>
                        <div class="tx-gray mb10">8~20자리이하영문대소문자, 숫자, 특수문자중2종류조합</div>
                        <div class="tx-red" style="display: block;">* 유효성메시지노출</div>
                    </div>
                </li>

                <li class="agree-Confirm bg-light-gray">
                    이름 노출
                </li>
                <li class="agree-Confirm bg-light-gray">
                    생년월일 노출
                </li>
                <li class="agree-Confirm bg-light-gray">
                    휴대폰번호 노출
                </li>
            </ul>
        </div>
        <div class="agree-Chk mt50 toggle">
            <div class="agree-All-Tit tx-black p_re">
                통합회원 약관동의
            </div>
            <ul>
                <li class="top bg-light-gray">
                    <div class="AllchkBox agree-Tit tx-black">
                        <strong>변경된 이용약관에 대한 내용은 모두 확인하고 전체 동의합니다.</strong>
                        <div class="chkBox-Agree">
                            <input type="checkbox" id="" name="" class="" maxlength="30">
                        </div>
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree checked">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            <span class="tx-blue">(필수)</span> 만 14세 이상입니다. <span class="tx11">( 만 14세 미만은 회원가입이 제한됩니다.)</span>
                        </a>
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree checked">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            <span class="tx-blue">(필수)</span> Willbes 통합회원 이용약관 동의<span class="v_arrow">▼</span>
                        </a>
                    </div>
                    <div class="agree-Txt">
                        약관이 노출 됩니다.<br/>
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            <span class="tx-blue">(필수)</span> 개인정보 수입 및 이용 동의<span class="v_arrow">▼</span>
                        </a>
                    </div>
                    <div class="agree-Txt">
                        약관이 노출 됩니다.<br/>
                        약관이 노출 됩니다.<br/>
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            (선택) 개인정보 위탁 동의<span class="v_arrow">▼</span>
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
        <div class="convert-Btn mt40 pt30 tx-center btnAuto h66">
            <button type="submit" onclick="" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                <span>통합회원 전환하기</span>
            </button>
        </div>
    </div>
    <!-- End 통합회원 전환 : 약관동의/정보입력 -->


    <br/><br/><br/><br/><br/><br/>


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합회원가입</span>
    </div>
    <!-- 통합회원가입 : 기가입자 -->
    <div class="Member mem-CombineFin widthAuto690">
        <ul class="tabs-Step mb60">
            <li class="on">본인인증</li>
            <li>약관동의/정보입력</li>
            <li>회원가입완료</li>
        </ul>
        <div class="user-Txt tx-black">
            <strong class="tx-blue">홍길동</strong>회원님은 이미 윌비스 회원으로 등록되어 있습니다.</br>
            회원 아이디로 로그인하시거나, 비밀번호 찾기를 진행해 주세요.
        </div>
        <div class="info-Txt info-Txt-Wrap tx-black mt40">
            <strong class="tx-blue">willbes****</strong> (2018-00-00)
        </div>
        <div class="combinefin-Btn mt60">
            <ul>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>로그인</span>
                    </button>
                </li>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                        <span class="tx-light-blue">비밀번호 찾기</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <!-- End 통합회원가입 : 기가입자 -->

</div>
<!-- End Container -->
@stop