@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <form method="post" id="pwd_form" name="pwd_form" action="/member/change/proc/" novalidate="novalidate">
                <input type="hidden" name="Password" value="{{$password}}" >
                {!! csrf_field() !!}
                <div class="willbes-User-Info p_re pb60 _both">
                    <div class="InfoTable GM">
                        <div class="willbes-UserInfo-Tit NG mt0">* 기본정보</div>
                        <table cellspacing="0" cellpadding="0" class="classTable userInfoTable under-gray bdt-gray tx-gray">
                            <colgroup>
                                <col style="width: 150px;">
                                <col style="width: 790px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-tit">아이디</td>
                                <td class="w-info">{{$data['MemId']}}</td>
                            </tr>
                            <tr>
                                <td class="w-tit">이름(성별)</td>
                                <td class="w-info">{{$data['MemName']}} ({{$data['Sex'] == 'M' ? '남자' : '여자'}})</td>
                            </tr>
                            <tr>
                                <td class="w-tit">생년월일</td>
                                <td class="w-info">{{$data['BirthDay']}}</td>
                            </tr>
                            <tr>
                                <td class="w-tit">휴대폰번호</td>
                                <td class="w-info">
                                    <div class="phoneBox">
                                        <input type="text" id="Phone1" name="Phone1" class="iptCellhone1 phone" disabled value="{{$data['Phone1']}}"> -
                                        <input type="text" id="Phone2" name="Phone2" class="iptCellhone1 phone" disabled value="{{$data['Phone2']}}"> -
                                        <input type="text" id="Phone3" name="Phone3" class="iptCellhone2 phone" disabled value="{{$data['Phone3']}}">
                                    </div>
                                    <button type="button" onclick="openWin('PHONEPASS')" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                        <span>변경</span>
                                    </button>
                                    <div class="tx-red mt10" style="line-height:1">
                                        <label>
                                            <input name="SmsRcvStatus" type="checkbox" value="Y" id="SmsRcvStatus" {{$data['SmsRcvStatus'] == 'Y' ? 'checked' : ''}} />
                                            윌비스의 신규상품 안내 및 광고성 정보 SMS 수신에 동의합니다.
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">일반전화</td>
                                <td class="w-info">
                                    <div class="phoneBox">
                                        <input type="text" id="Tel1" name="Tel1" class="iptPhone1 phone" maxlength="4" value="{{$data['Tel1']}}"> -
                                        <input type="text" id="Tel2" name="Tel2" class="iptPhone1 phone" maxlength="4" value="{{$data['Tel2']}}"> -
                                        <input type="text" id="Tel3" name="Tel3" class="iptPhone2 phone" maxlength="4" value="{{$data['Tel3']}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">이메일</td>
                                <td class="w-info">
                                    <div class="emailBox">
                                        <input type="text" id="MailId" name="MailId" class="iptEmail1 email" readonly value="{{$data['MailId']}}"> @
                                        <input type="text" id="MailDomain" name="MailDomain" class="iptEmail1 email" readonly value="{{$data['MailDomain']}}">
                                    </div>
                                    <button type="button" onclick="openWin('EMAILPASS')" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                        <span>변경</span>
                                    </button>
                                    <div class="tx-red mt10">
                                        <label>
                                            <input name="MailRcvStatus" type="checkbox" value="Y" id="MailRcvStatus" {{$data['MailRcvStatus'] == 'Y' ? 'checked' : ''}} />
                                            윌비스의 신규상품 안내 및 광고성 정보 이메일 수신에 동의합니다.
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">주소</td>
                                <td class="w-info">
                                    <div class="w-txt">교재 및 경품을 받으실 주소를 정확하게 입력해 주세요.</div>
                                    <div class="inputBox Add p_re">
                                        <div class="searchadd">
                                            <div class="addressBox">
                                                <input type="text" id="ZipCode" name="ZipCode" class="iptAdd zipcode" maxlength="5" readonly value="{{$data['ZipCode']}}">
                                            </div>
                                            <button type="button" id="btn_zipcode" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                                <span>주소찾기</span>
                                            </button>
                                        </div>
                                        <input type="text" id="Addr1" name="Addr1" class="iptAdd1 bg-gray address" placeholder="기본주소" readonly value="{{$data['Addr1']}}">
                                        <input type="text" id="Addr2" name="Addr2" class="iptAdd2 address" placeholder="상세주소" maxlength="30" value="{{$data['Addr2']}}">
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--
                    <div class="InfoTable GM">
                        <div class="willbes-UserInfo-Tit NG">* 부가정보<span class="UserInfo-subTit">(부가정보를 입력하시면 맞춤형 수험관리 혜택을 받으실 수 있습니다.)</span></div>
                        <table cellspacing="0" cellpadding="0" class="classTable userInfoTable under-gray bdt-gray tx-gray">
                            <colgroup>
                                <col style="width: 150px;">
                                <col style="width: 790px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-tit">가입경로</td>
                                <td class="w-info">
                                    <select id="option1" name="option1" title="선택" class="seleOption option">
                                        <option selected="selected">선택</option>
                                        <option value="인터넷카페">인터넷카페</option>
                                        <option value="인터넷검색">인터넷검색</option>
                                        <option value="인터넷광고">인터넷광고</option>
                                        <option value="신문광고">신문광고</option>
                                        <option value="학원">학원</option>
                                        <option value="전단지">전단지</option>
                                        <option value="친구소개">친구소개</option>
                                        <option value="기타">기타</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">직업</td>
                                <td class="w-info">
                                    <select id="option2" name="option2" title="선택" class="seleOption option">
                                        <option selected="selected">선택</option>
                                        <option value="학생">학생</option>
                                        <option value="취업준비생">취업준비생</option>
                                        <option value="직장인">직장인</option>
                                        <option value="기타">기타</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">관심직렬</td>
                                <td class="w-info">
                                    <select id="option3" name="option3" title="선택" class="seleOption option">
                                        <option selected="selected">선택</option>
                                        <option value="경찰">경찰</option>
                                        <option value="공무원">공무원</option>
                                        <option value="기타">기타</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">수험기간</td>
                                <td class="w-info">
                                    <select id="option4" name="option4" title="선택" class="seleOption option">
                                        <option selected="selected">선택</option>
                                        <option value="처음">처음</option>
                                        <option value="6월 ~ 1년">6월 ~ 1년</option>
                                        <option value="1년 ~ 2년">1년 ~ 2년</option>
                                        <option value="2년 이상">2년 이상</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">선호하는 선택과목</td>
                                <td class="w-info">
                                    <div class="w-txt">선호하는 선택과목 2개를 선택해 주세요.</div>
                                    <select id="option5-1" name="option5-1" title="선택" class="seleOption option mr10">
                                        <option selected="selected">선택</option>
                                        <option value="경찰1">경찰1</option>
                                        <option value="공무원1">공무원1</option>
                                    </select>
                                    <select id="option5-2" name="option5-2" title="선택" class="seleOption option">
                                        <option selected="selected">선택</option>
                                        <option value="경찰2">경찰2</option>
                                        <option value="공무원2">공무원2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">1차 관심직종 및<br/>지역</td>
                                <td class="w-info">
                                    <div class="w-txt">1차 관심직종 선택후, 관심지역을 모두 선택해 주세요.</div>
                                    <div class="w-JJ-Box mb5">
                                        <div class="w-tit-JJ">직종</div>
                                        <div class="w-selec-JJ">
                                            <select id="option6-1" name="option6-1" title="선택" class="seleOption option mr10">
                                                <option selected="selected">선택</option>
                                                <option value="경찰1">경찰1</option>
                                                <option value="공무원1">공무원1</option>
                                            </select>
                                            <select id="option6-2" name="option6-2" title="선택" class="seleOption option">
                                                <option selected="selected">선택</option>
                                                <option value="경찰2">경찰2</option>
                                                <option value="공무원2">공무원2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-Area-Box">
                                        <div class="w-tit-Area">지역</div>
                                        <div class="w-selec-Area">
                                        <ul>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 서울</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 경기</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 강원</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 충북</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 충남</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 경북</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 경남</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 전북</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 전남</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 제주</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 부산</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 인천</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 대전</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 광주</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 울산</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 세종</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 대구</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 국가직</label></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">2차 관심직종 및<br/>지역</td>
                                <td class="w-info">
                                    <div class="w-txt">2차 관심직종 선택후, 관심지역을 모두 선택해 주세요.</div>
                                    <div class="w-JJ-Box mb5">
                                        <div class="w-tit-JJ">직종</div>
                                        <div class="w-selec-JJ">
                                            <select id="option7-1" name="option7-1" title="선택" class="seleOption option mr10">
                                                <option selected="selected">선택</option>
                                                <option value="경찰1">경찰1</option>
                                                <option value="공무원1">공무원1</option>
                                            </select>
                                            <select id="option7-2" name="option7-2" title="선택" class="seleOption option">
                                                <option selected="selected">선택</option>
                                                <option value="경찰2">경찰2</option>
                                                <option value="공무원2">공무원2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-Area-Box">
                                        <div class="w-tit-Area">지역</div>
                                        <div class="w-selec-Area">
                                            <ul>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 서울</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 경기</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 강원</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 충북</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 충남</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 경북</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 경남</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 전북</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 전남</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 제주</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 부산</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 인천</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 대전</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 광주</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 울산</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 세종</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 대구</label></li>
                                                <li><label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 국가직</label></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">관심정보</td>
                                <td class="w-info">
                                    <select id="option7" name="option7" title="선택" class="seleOption option">
                                        <option selected="selected">선택</option>
                                        <option value="수험정보">수험정보</option>
                                        <option value="신규강의">신규강의</option>
                                        <option value="이벤트">이벤트</option>
                                        <option value="학습질문">학습질문</option>
                                        <option value="기출 및 강의자료">기출 및 강의자료</option>
                                        <option value="모의고사">모의고사</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">선호이벤트</td>
                                <td class="w-info">
                                    <select id="option8" name="option8" title="선택" class="seleOption option">
                                        <option selected="selected">선택</option>
                                        <option value="수강료할인">수강료할인</option>
                                        <option value="교재무료">교재무료</option>
                                        <option value="경품">경품</option>
                                        <option value="수강기간연장">수강기간연장</option>
                                        <option value="포인트적립">포인트적립</option>
                                        <option value="쿠폰제공">쿠폰제공</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">수신동의</td>
                                <td class="w-info">
                                <label><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk ml-zero"> 개인정보 위탁동의</label>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    -->
                    <div class="willbes-Lec-buyBtn">
                        <ul>
                            <li class="btnAuto180 h36">
                                <button type="submit" class="mem-Btn bg-purple-gray bd-dark-gray">
                                    <span>개인정보수정</span>
                                </button>
                            </li>
                            <li class="btnAuto180 h36">
                                <button type="button" onclick="openWin('WITHDRAWALPASS')" class="mem-Btn bg-white bd-dark-gray">
                                    <span class="tx-purple-gray">회원탈퇴신청</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
            <!-- willbes-User-Info -->

            <div id="PHONEPASS" class="willbes-Layer-Black">
                <form name="phone_form" id="phone_form" method="post" onsubmit=" return false;">
                    <input type="hidden" name="sms_stat" id="sms_stat" value="NEW" />
                    {!! csrf_field() !!}
                    <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 h460 fix">
                        <a class="closeBtn" href="#none" onclick="closeWin('PHONEPASS')">
                            <img src="{{ img_url('sub/close.png') }}">
                        </a>
                        <div class="Layer-Tit tx-dark-black NG">휴대폰번호 인증</div>

                        <div class="lecMoreWrap">
                            <div class="PASSZONE-List widthAutoFull Member">
                                <ul class="passzoneInfo tx-gray NGR">
                                    <li>- 본인인증하시면 휴대폰 번호 변경이 가능합니다.</li>
                                    <li>- 변경하실 휴대폰번호 입력 후 ‘인증번호 발송’ 버튼을 클릭하여 전송된 인증번호를 입력해 주세요.</li>
                                </ul>
                                <div class="widthAuto460">
                                    <div class="inputBox p_re item">
                                        <input type="text" id="var_phone" name="var_phone" class="iptPhone certi" placeholder="변경할 휴대폰번호(-제외)" maxlength="11" required="required" pattern="numeric" data-validate-length="10,11" title="휴대전화번호" >
                                        <button type="button" id="btn_send_sms"class="mem-Btn certi bg-dark-blue bd-dark-blue">
                                            <span>인증번호 발송</span>
                                        </button>
                                    </div>
                                    <div class="tx-red mb15" style="display: block;"></div>
                                    <div class="inputBox p_re item">
                                        <input type="text" id="var_auth" name="var_auth" class="iptNumber certi" placeholder="인증번호 입력" maxlength="6" disabled  required="required" pattern="numeric" data-validate-length="6" title="인증번호">
                                        <button type="button" class="mem-Btn certi bg-dark-blue bd-dark-blue" disabled>
                                            <span id="remain_time">00:00</span>
                                        </button>
                                    </div>
                                    <div class="tx-red mb15" style="display: block;"></div>
                                </div>
                                <div class="convert-Btn mt30 btnAuto120 h36">
                                    <button type="button" id="btn_sms_auth" class="mem-Btn bg-blue bd-dark-blue">
                                        <span>확인</span>
                                    </button>
                                </div>
                            </div>
                            <!-- PASSZONE-List -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- willbes-Layer-PassBox : 휴대폰번호 인증 -->

            <div id="EMAILPASS" class="willbes-Layer-Black">
                <form name="mail_form" id="mail_form" method="post" onsubmit=" return false;">
                    {!! csrf_field() !!}
                    <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 h420 fix">
                        <a class="closeBtn" href="#none" onclick="closeWin('EMAILPASS')">
                            <img src="{{ img_url('sub/close.png') }}">
                        </a>
                        <!--
                        <div class="Layer-Tit tx-dark-black NG">이메일 인증</div>
                        -->
                        <div class="Layer-Tit tx-dark-black NG">이메일 변경</div>
                        <div class="lecMoreWrap">
                            <div class="PASSZONE-List widthAutoFull Member">
                                <ul class="passzoneInfo tx-gray NGR">
                                    <li>- 변경할 이메일 주소를 입력해주십시요.</li>
                                    <!--
                                    <li>- 본인 인증하시면 이메일 주소도 변경이 가능합니다.</li>
                                    <li>- 변경하실 이메일주소 입력 후 ‘이메일 인증’ 버튼을 클릭하여 메일로 발송된 인증링크를 30분 이내에 클릭해 주세요.</li>
                                    -->
                                </ul>
                                <div class="widthAuto570">
                                    <div class="inputBox p_re">
                                        <div class="emailBox">
                                            <input type="text" id="mail_id" name="mail_id" class="iptEmail01" placeholder="이메일" maxlength="30" required="required" title="이메일아이디"> @
                                            <input type="text" id="mail_domain" name="mail_domain" class="iptEmail02" maxlength="30" required="required" placeholder="메일주소" title="이메일주소">
                                            <select id="domain" name="domain" title="직접입력" class="seleEmail ml10">
                                                @foreach($mail_domain_ccd as $key => $val)
                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="search-Btn btnAuto120 mt30 h36">
                                    <button type="button" id="btn_send_mail" class="mem-Btn bg-blue bd-dark-blue">
                                        <span>확인</span>
                                    </button>
                                </div>
                                <!--
                                <div class="notice-Txt tx-gray mt40">* 입력하신 메일로 발송된 인증메일의 인증링크를 유효시간 30분 안에 클릭해 주세요.</div>
                                -->
                            </div>
                            <!-- PASSZONE-List -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- willbes-Layer-PassBox : 이메일 인증 -->

            <div id="WITHDRAWALPASS" class="willbes-Layer-Black">
                <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 h900 fix">
                    <a class="closeBtn" href="#none" onclick="closeWin('WITHDRAWALPASS')">
                        <img src="{{ img_url('sub/close.png') }}">
                    </a>
                    <div class="Layer-Tit tx-dark-black NG">회원탈퇴</div>

                    <div class="lecMoreWrap">
                        <div class="PASSZONE-List widthAutoFull LeclistTable withdrawal">
                            <ul class="passzoneInfo tx-gray NGR">
                                <li class="strong">· 탈퇴전 꼭 확인하세요.</li>
                                <li>- 회원탈퇴 시, 그동안 윌비스의 <span class="tx-red">모든 이용 내역 및 보유하신 포인트와 쿠폰 등의 혜택은 모두 삭제</span>되며, <span class="tx-red">복구가 불가능</span>합니다.</li>
                                <li>- 회원탈퇴 후, 임의해지 및 재가입 방지를 목적으로 1년 간 회원의 성명, 휴대폰번호, 아이디, 이메일 등의 정보를 보관합니다.</li>
                                <li>- 그 외 개인정보는 개인정보처리방침에 따라 처리됩니다.  <span class="tx-red underline">개인정보처리방침 자세히보기 ></span></li>
                                <li>- 회원탈퇴 후 재가입 시 신규 가입으로 처리되며, 탈퇴 전 사용한 아이디로는 재가입이 불가능합니다.</li>
                                <li>- 최근 발송완료 상품이 있을 경우 교재 환불 기간으로 인해 ‘구매일로부터 30일 이후 탈퇴’가 가능합니다.</li>
                            </ul>
                            <table cellspacing="0" cellpadding="0" class="listTable withdrawalTable under-gray bdt-gray tx-gray GM">
                                <colgroup>
                                    <col style="width: 150px;"/>
                                    <col style="width: 160px;"/>
                                    <col style="width: 160px;"/>
                                    <col style="width: 230px;"/>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th class="Top">구분</th>
                                    <th>현황</th>
                                    <th>즉시탈퇴 가능여부</th>
                                    <th>탈퇴조건</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="Top">수강중인 온라인강좌</td>
                                    <td>
                                        유료강좌: <span class="tx-blue strong">{{$data['on_cnt']}}</span>건<br/>
                                        무료강좌: <span class="tx-blue strong">{{$data['on_free_cnt']}}</span>건
                                    </td>
                                    <td>즉시탈퇴가능</td>
                                    <td>탈퇴후 강좌 수강 및 서비스 이용불가</td>
                                </tr>
                                <tr>
                                    <td class="Top">수강중인 학원강좌</td>
                                    <td>
                                        수강중강좌: <span class="tx-blue strong">{{$data['off_cnt']}}</span>건
                                    </td>
                                    <td>즉시탈퇴가능</td>
                                    <td>탈퇴후 강좌 수강불가</td>
                                </tr>
                                <tr>
                                    <td class="Top">사용중인 서비스</td>
                                    <td>응시예정 모의고사: <span class="tx-blue strong">{{$data['mock_cnt']}}</span>건</td>
                                    <td>즉시탈퇴가능</td>
                                    <td>탈퇴후 모의고사 응시 서비스 이용불가</td>
                                </tr>
                                <tr>
                                    <td class="Top">30일 이내 발송 내역</td>
                                    <td>교재: <span class="tx-blue strong">{{$data['shop_cnt']}}</span>건</td>
                                    <td>
                                        @if($data['shop_cnt'] > 0)
                                            <span class="tx-red">즉시탈퇴 불가능</span>
                                        @else
                                            즉시탈퇴가능
                                        @endif
                                    </td>
                                    <td>거래 종료(환불) 후 탈퇴 가능</td>
                                </tr>
                                <tr>
                                    <td class="Top">포인트/쿠폰</td>
                                    <td>
                                        포인트: <span class="tx-blue strong">{{number_format($data['lecture_point'] + $data['book_point'])}}</span>P<br/>
                                        쿠폰: <span class="tx-blue strong">{{$data['coupon_cnt']}}</span>장
                                    </td>
                                    <td>즉시탈퇴가능</td>
                                    <td>탈퇴후 복구 불가</td>
                                </tr>
                                </tbody>
                            </table>
                            @if($data['shop_cnt'] == 0)
                                <div class="Search-Result strong mt40 mb15 tx-gray">* 탈퇴신청 <span class="normal">( * 필수입력항목 )</span></div>
                                <form name="draw_form" id="draw_form" method="post">
                                    {!! csrf_field() !!}
                                    <table cellspacing="0" cellpadding="0" class="listTable userMemoTable withdrawalListTable under-gray bdt-gray tx-gray GM">
                                        <colgroup>
                                            <col style="width: 20%;"/>
                                            <col style="width: 30%;"/>
                                            <col style="width: 20%;"/>
                                            <col style="width: 30%;"/>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <th class="w-tit">이름</th>
                                            <td class="w-list">{{$data['MemName']}}</td>
                                            <th class="w-tit">아이디</th>
                                            <td class="w-list">{{$data['MemId']}}</td>
                                        </tr>
                                        <tr>
                                            <th class="w-tit">비밀번호*</th>
                                            <td class="w-list"><input type="password" id="pwd" name="pwd" class="iptPwd" placeholder="" maxlength="30"></td>
                                            <th class="w-tit">탈퇴사유*</th>
                                            <td class="w-list">
                                                <select id="reason" name="reason" class="seleCause">
                                                    <option value="" selected="selected">탈퇴사유</option>
                                                    <option value="강사불만">강사불만</option>
                                                    <option value="강좌불만">강좌불만</option>
                                                    <option value="교재불만">교재불만</option>
                                                    <option value="서비스불만">서비스불만</option>
                                                    <option value="정보부족">정보부족</option>
                                                    <option value="타사이트이용">타사이트이용</option>
                                                    <option value="아이디변경">아이디변경</option>
                                                    <option value="기타">기타</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w-tit">의견*</th>
                                            <td class="w-list" colspan="3"><input type="text" id="opinion" name="opinion" class="iptWrite" placeholder="" maxlength="100" style="width: 498px;"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <div class="w-btn">
                                    <ul>
                                        <li><a class="blueBox NSK" href="javascript:;" id="btn_draw">탈퇴하기</a></li>
                                        <li><a class="whiteBox NSK" href="javascript:;" onclick="closeWin('WITHDRAWALPASS')">탈퇴취소</a></li>
                                    </ul>
                                </div>
                        </div>
                    @endif
                        <!-- PASSZONE-List -->
                    </div>
                </div>
            </div>
            <!-- willbes-Layer-PassBox : 회원탈퇴 -->

        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <form name="ajaxForm" id="ajaxForm" method="post" >
        {!! csrf_field() !!}
        <input type="hidden" id="enc_data" name="enc_data" value="">
    </form>
    <!-- End Container -->
    <script src="/public/vendor/jquery/validator/jquery.validate.js"></script>
    <script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
    <script>
        var $p_form = $('#phone_form');
        var $m_form = $('#mail_form');
        var rTime = null;
        var objTimer = null;

        $(document).ready(function () {
            function remainTime()
            {
                now = new Date();
                days = (rTime - now) / 1000 / 60 / 60 / 24;
                daysRound = Math.floor(days);
                hours = (rTime - now) / 1000 / 60 / 60 - (24 * daysRound);
                hoursRound = Math.floor(hours);
                minutes = (rTime - now) / 1000 /60 - (24 * 60 * daysRound) - (60 * hoursRound);
                minutesRound = Math.floor(minutes);
                seconds = (rTime - now) / 1000 - (24 * 60 * 60 * daysRound) - (60 * 60 * hoursRound) - (60 * minutesRound);
                secondsRound = Math.round(seconds);

                $("#remain_time").text(minutesRound + "분 " + secondsRound + "초");

                if((rTime -now) < 1){
                    $("#btn_send_sms").prop("disabled", false);
                    $("#var_phone").prop("readonly", false);
                    $("#var_name").prop("readonly", false);
                    $("#var_auth").prop("disabled", true);
                    $("#btn_sms_auth").prop("disabled", true);
                    $("#var_auth").val('');
                    $("#var_phone").focus();
                    $("#sms_stat").val('NEW');
                    $("#remain_time").text("00:00");
                    alert("인증시간이 초과했습니다.");
                    return;
                }

                objTimer = setTimeout(remainTime, 1000);
            }

            $("#btn_send_sms").click(function () {
                var _url = "/member/change/phonesms/";
                $("#btn_send_sms").prop("disabled", true);
                ajaxSubmit($p_form, _url, function(ret) {
                    $("#btn_send_sms").prop("disabled", true);
                    $("#var_phone").prop("readonly", true);
                    $("#var_name").prop("readonly", true);
                    $("#var_auth").prop("disabled", false);
                    $("#btn_sms_auth").prop("disabled", false);
                    $("#var_auth").focus();
                    $("#sms_stat").val('OK');
                    rTime = new Date(ret.ret_data.limit_date);
                    remainTime();
                    alert(ret.ret_msg);

                }, function(ret){
                    $("#btn_send_sms").prop("disabled", false);
                    alert(ret.ret_msg);
                }, null, true, 'alert');
            });

            $("#btn_sms_auth").click(function () {
                if($("#sms_stat").val() == "NEW"){
                    alert('먼저 전화번호를 입력후 인증번호를 받아 주십시요.');
                    return;
                }

                var _url = "/member/change/phonesms/";

                ajaxSubmit($p_form, _url, function(ret) {
                    clearTimeout(objTimer);
                    $("#enc_data").val(ret.ret_data.enc_data);
                    ajaxSubmit($('#ajaxForm'), '/member/change/phone/', function(ret) {
                        $("#Phone1").val(ret.ret_data.phone1);
                        $("#Phone2").val(ret.ret_data.phone2);
                        $("#Phone3").val(ret.ret_data.phone3);
                        alert(ret.ret_msg);
                        closeWin('PHONEPASS');
                    }, function(ret){
                        alert(ret.ret_msg);
                        closeWin('PHONEPASS');
                    }, null, true, 'alert');


                }, function(ret){
                    alert(ret.ret_msg);
                }, null, true, 'alert');
            });


            $("#btn_send_mail").click(function () {
                var _url = "/member/change/mail/";

                ajaxSubmit($m_form, _url, function(ret){
                    alert(ret.ret_msg);
                    closeWin('EMAILPASS');
                }, function(ret){
                    alert(ret.ret_msg);
                }, null, false, 'alert');
            });

            $("#domain").change(function (){
                setMailDomain('domain', 'mail_domain');
                if($(this).val() == ""){
                    $("#mail_domain").focus();
                } else {
                    $("#mail_id").focus();
                }
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

            $("#btn_draw").click(function (){
                if($("#pwd").val() == ""){ alert("비밀번호를 입력해주십시요.");return;}
                if($("#reason option:selected").val() == ""){ alert("탈퇴사유를 선택해주십시요.");return;}
                if($("#opinion").val() == ""){ alert("의견을 입력해주십시요.");return;}

                if(window.confirm('탈퇴 진행시 복구가 불가능합니다.\n탈퇴를 신청하시겠습니까?')){
                    url = "{{front_url('/member/change/draw')}}";
                    data = $("#draw_form").formSerialize();

                    sendAjax(url,
                        data,
                        function(ret){
                            alert(ret.ret_msg);
                            location.replace('/');
                        },
                        function(ret, status){
                            alert(ret.ret_msg);
                        }, false, 'POST', 'json');
                }
            });
        });
    </script>
@stop