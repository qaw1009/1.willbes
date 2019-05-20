@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="memContainer widthAuto c_both">

    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합회원가입</span>
    </div>
    <!-- 통합회원가입 : 본인인증 -->
    <div class="Member mem-Combine widthAuto690">
        <ul class="tabs-Step mb60">
            <li class="on">본인인증</li>
            <li>약관동의/정보입력</li>
            <li>회원가입완료</li>
        </ul>
        <ul class="tabWrap tabLoginDepth1 tabs full c_both">
            <li><a href="#join1" class="on">휴대폰 인증</a></li>
            <!--li><a href="#join2">E-mail 인증</a></li-->
        </ul>
        <div class="tabBox">
            <div id="join1">
                <div class="widthAuto460">
                    <div>· 휴대폰</div>
                    <div class="inputBox p_re">
                        <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="이름" maxlength="30">
                    </div>
                    <div class="tx-red mb30" style="display: block;">이름을 정확하게 입력해 주세요.</div>
                    <div class="inputBox p_re">
                        <input type="text" id="USER_PHONE" name="USER_PHONE" class="iptPhone certi" placeholder="휴대폰번호(-제외)" maxlength="30">
                        <button type="submit" onclick="" class="mem-Btn certi bg-dark-blue bd-dark-blue">
                            <span>인증번호 발송</span>
                        </button>
                    </div>
                    <div class="tx-red mb30" style="display: block;"> ‘-’ 없이 숫자만 입력해 주세요.</div>
                    <div class="inputBox p_re">
                        <input type="text" id="USER_NUMBER" name="USER_NUMBER" class="iptNumber certi" placeholder="인증번호입력" maxlength="30">
                        <button type="submit" onclick="" class="mem-Btn certi bg-dark-blue bd-dark-blue">
                            <span>00:00</span>
                        </button>
                    </div>
                    <div class="tx-red mb30" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
                </div>
                <div class="search-Btn btnAuto120 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>확인</span>
                    </button>
                </div>
                <div class="notice-Txt tx-gray mt40"></div>
            </div>
            <!--
            <div id="join2">
                <div class="widthAuto460">
                    <div class="inputBox p_re">
                        <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="이름" maxlength="30">
                    </div>
                    <div class="tx-red mb30" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
                    <div class="inputBox p_re">
                        <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" placeholder="이메일" maxlength="30"> @ 
                        <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                        <select id="email" name="email" title="직접입력" class="seleEmail">
                            <option selected="selected">직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="daum.net">daum.net</option>
                        </select>
                    </div>
                </div>
                
                <div class="search-Btn btnAuto120 mt70 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>확인</span>
                    </button>
                </div>
                <div class="notice-Txt tx-gray mt40">* 입력하신 메일로 발송된 인증메일의 인증링크를 유효시간 30분 안에 클릭해 주세요.</div>
            </div>
            -->
        </div>
    </div>
    <!-- End 통합회원가입 : 본인인증 -->


    <br/><br/><br/><br/><br/><br/>


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
                            <input type="text" id="USER_NAME" name="USER_NAME" class="iptName" placeholder="홍길동" maxlength="30">
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
                            <input type="text" id="USER_BIRTH" name="USER_BIRTH" class="iptBirth" placeholder="ex.19800101" maxlength="30">
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">휴대폰번호</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="text" id="USER_PHONE" name="USER_PHONE" class="iptPhone" placeholder='"-" 제외하고 숫자만 입력' maxlength="30">
                        </div>
                        <div class="tx-red mt10" style="display: block;">                            
                            <input name="" type="checkbox" value="" id="a01" />
                            <label for="a01">
                            윌비스의 신규상품 안내 및 광고성 정보 SMS 수신에 동의합니다.
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">아이디</td>
                    <td>
                        <div class="inputBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="4~20자리 영문 대소문자, 숫자만 입력 가능" maxlength="30">
                        </div>
                        <div class="tx-red mt10" style="display: block;">* 유효성메시지노출</div>
                    </td>
                </tr>
                <tr>
                    <td class="combine-Tit">비밀번호</td>
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
                <tr>
                    <td class="combine-Tit">관심정보</td>
                    <td>                       
                        <input name="" type="checkbox" value="" id="a02" /> <label for="a02">공무원</label>
                        <input name="" type="checkbox" value="" id="a03" class="ml10"/> <label for="a03">경찰</label>                        
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
                                    <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" placeholder="이메일" maxlength="30"> 
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
                        <div class="tx-red mbox-txt mt10" style="display: block;">
                            <input name="" type="checkbox" value="" id="bbb" />
                            <label for="bbb">
                            윌비스의 신규상품 안내 및 광고성 정보 이메일 수신에 동의합니다.
                            </label>
                        </div>
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
                                <input type="text" id="USER_ADD1" name="USER_ADD1" class="iptAdd1" placeholder="기본주소" maxlength="30" readonly>
                            </div>
                            <div class="addbox2 p_re">
                                <input type="text" id="USER_ADD2" name="USER_ADD2" class="iptAdd2" placeholder="상세주소" maxlength="30">
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
                    <input type="checkbox" id="" name="" class="" maxlength="30">
                </div>
            </div>
            <ul>
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
                        @include('willbes.pc.company.agreementContent')
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            <span class="tx-blue">(필수)</span> 개인정보 취급방침 및 이용 동의<span class="v_arrow">▼</span>
                        </a>
                    </div>
                    <div class="agree-Txt">
                        @include('willbes.pc.company.protectContent')
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
        <div class="combine-Btn mt40 pt30 btnAuto h66">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>동의하고 회원가입</span>
            </button>
        </div>
    </div>
    <!-- End 통합회원가입 : 약관동의/정보입력 -->


    <br/><br/><br/><br/><br/><br/>


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합회원가입</span>
    </div>
    <!-- 통합회원가입 : 회원가입완료 -->
    <div class="Member mem-CombineFin widthAuto690">
        <ul class="tabs-Step mb60">
            <li>본인인증</li>
            <li>약관동의/정보입력</li>
            <li class="on">회원가입완료</li>
        </ul>
        <div class="user-Txt tx-black">
            <span class="tx-blue">홍길동</span>님, <strong>윌비스 통합 회원 가입을 환영합니다.</strong></br>
            <span class="tx-blue">아이디 willbes</span>로 모든 윌비스 서비스를 이용하실 수 있습니다.
        </div>
        <div class="tx-center"><img class="mt70" src="{{ img_url('login/willbes_welcome.jpg') }}"></div>

        {{--
        <div class="info-Txt info-Txt-Wrap tx-black mt60">
            현재 웰컴팩 이벤트 중입니다.<br>
            특별한 혜택을 받으시려면 아래 서비스를 선택해주세요.
            <div class="mt10">
                <input name="cp1" type="radio" value="" id="cp1" /><label for="cp1"> 경찰</label>
                <input name="cp1" type="radio" value="" id="cp2" /><label for="cp2"> 공무원</label>
            </div>            
        </div>
        --}}

        <div class="info-Txt info-Txt-Wrap tx-black mt60">
            <strong class="tx-gray">시작할 서비스를 선택해 주세요</strong>
            <select id="site" name="site" title="선택안함" class="seleSite">
                <option selected="selected">선택안함</option>
                <option value="공무원">공무원</option>
                <option value="경찰">경찰</option>
            </select>
        </div>
        <button type="submit" onclick="" class="mem-Btn h36 mt30 bg-blue bd-dark-blue">
            <span>시작하기</span>
        </button>
    </div>
    <!-- End 통합회원가입 : 회원가입완료 -->


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