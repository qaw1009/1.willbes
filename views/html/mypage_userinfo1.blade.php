@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass_index') }}">내강의실 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass1') }}">무한PASS존</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_online1') }}">온라인강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">온라인강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_online1') }}">수강대기강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online2') }}">수강중강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online3') }}">일시정지강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online4') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_acad1') }}">학원강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_acad1') }}">수강신청강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_acad2') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_event') }}">특강&이벤트 신청현황</a>
                </li>
                <li>
                    <a href="#none">모의고사관리</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_payment1') }}">결제관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">결제관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_payment1') }}">주문/배송조회</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment3') }}">포인트관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment4') }}">쿠폰/수강권관리</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_support1') }}">학습지원관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학습지원관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_support1') }}">쪽지관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support2') }}">알림관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support3') }}">상담내역</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">회원정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">회원정보</li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo1') }}">개인정보관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo2') }}">비밀번호변경</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>내강의실</strong>
            <span class="depth-Arrow">></span><strong>회원정보</strong>
            <span class="depth-Arrow">></span><strong>개인정보관리</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-ONLINEZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG pb-zero">
                · 개인정보관리
            </div>
        </div>
        <!-- willbes-Mypage-ONLINEZONE -->

        <div class="willbes-User-Info p_re pb60 _both">
            <div class="InfoTable GM">
                <div class="willbes-UserInfo-Tit NG">* 기본정보</div>
                <table cellspacing="0" cellpadding="0" class="classTable userInfoTable under-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 150px;">
                        <col style="width: 790px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-tit">아이디</td>
                            <td class="w-info">willbes1</td>
                        </tr>
                        <tr>
                            <td class="w-tit">이름(성별)</td>
                            <td class="w-info">홍길동 (남성)</td>
                        </tr>
                        <tr>
                            <td class="w-tit">생년월일</td>
                            <td class="w-info">1990-00-00</td>
                        </tr>
                        <tr>
                            <td class="w-tit">휴대폰번호</td>
                            <td class="w-info">
                                <div class="phoneBox">
                                    <select id="phone" name="phone" title="010" class="selePhone phone">
                                        <option selected="selected">010</option>
                                        <option value="011">011</option>
                                        <option value="016">016</option>
                                        <option value="017">017</option>
                                        <option value="018">018</option>
                                    </select> -
                                    <input type="text" id="USER_CELLPHONE1" name="USER_CELLPHONE1" class="iptCellhone1 phone" maxlength="30"> -
                                    <input type="text" id="USER_CELLPHONE2" name="USER_CELLPHONE2" class="iptCellhone2 phone" maxlength="30">
                                </div>
                                <button type="submit" onclick="openWin('PHONEPASS')" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                    <span>변경</span>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit">일반전화</td>
                            <td class="w-info">
                                <div class="phoneBox">
                                    <select id="phone" name="phone" title="02" class="selePhone phone">
                                        <option selected="selected">02</option>
                                        <option value="031">031</option>
                                        <option value="032">032</option>
                                        <option value="033">033</option>
                                        <option value="041">041</option>
                                    </select> -
                                    <input type="text" id="USER_PHONE1" name="USER_PHONE1" class="iptPhone1 phone" maxlength="30"> -
                                    <input type="text" id="USER_PHONE2" name="USER_PHONE2" class="iptPhone2 phone" maxlength="30">
                                </div>
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>없음</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit">이메일</td>
                            <td class="w-info">
                                <div class="emailBox">
                                    <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail1 email" maxlength="30"> @
                                    <select id="email" name="email" title="email" class="seleEmail email">
                                        <option selected="selected">willbes.net</option>
                                        <option value="naver.com">naver.com</option>
                                        <option value="daum.net<">daum.net</option>
                                        <option value="gmail.com">gmail.com</option>
                                    </select>
                                </div>
                                <button type="submit" onclick="openWin('EMAILPASS')" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                    <span>변경</span>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit">주소</td>
                            <td class="w-info">
                                <div class="w-txt">교재 및 경품을 받으실 주소를 정확하게 입력해 주세요.</div>
                                <div class="inputBox Add p_re">
                                    <div class="searchadd">
                                        <div class="addressBox">
                                            <input type="text" id="ADD1" name="ADD1" class="iptAdd zipcode" maxlength="30"> -
                                            <input type="text" id="ADD2" name="ADD2" class="iptAdd zipcode" maxlength="30"> 
                                        </div>
                                        <button type="submit" onclick="" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                            <span>주소찾기</span>
                                        </button>
                                    </div>
                                    <input type="text" id="USER_ADD1" name="USER_ADD1" class="iptAdd1 bg-gray address" placeholder="기본주소" maxlength="30" disabled="disabled">
                                    <input type="text" id="USER_ADD2" name="USER_ADD2" class="iptAdd2 address" placeholder="상세주소" maxlength="30">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>서울</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>경기</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>강원</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>충북</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>충남</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>경북</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>경남</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>전북</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>전남</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>제주</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>부산</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>인천</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>대전</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>광주</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>울산</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>세종</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>대구</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>국가직</label></li>
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
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>서울</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>경기</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>강원</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>충북</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>충남</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>경북</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>경남</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>전북</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>전남</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>제주</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>부산</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>인천</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>대전</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>광주</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>울산</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>세종</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>대구</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>국가직</label></li>
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
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk ml-zero"> <label>개인정보 위탁동의</label>
                            </td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            <div class="willbes-Lec-buyBtn">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                            <span>개인정보수정</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="openWin('WITHDRAWALPASS')" class="mem-Btn bg-white bd-dark-gray">
                            <span class="tx-purple-gray">회원탈퇴신청</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- willbes-User-Info -->

        <div id="PHONEPASS" class="willbes-Layer-Black">
            <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 h460">
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
                            <div class="inputBox p_re">
                                <input type="text" id="USER_PHONE" name="USER_PHONE" class="iptPhone certi" placeholder="변경할 휴대폰번호(-제외)" maxlength="30">
                                <button type="submit" onclick="" class="mem-Btn certi bg-dark-blue bd-dark-blue">
                                    <span>인증번호 발송</span>
                                </button>
                            </div>
                            <div class="tx-red mb15" style="display: block;">입력하신 휴대폰번호로 인증번호가 발송되었습니다.</div>
                            <div class="inputBox p_re">
                                <input type="text" id="USER_NUMBER" name="USER_NUMBER" class="iptNumber" placeholder="인증번호 입력" maxlength="30">
                            </div>
                            <div class="tx-red mb15" style="display: block;">인증번호가 일치하지 않습니다.</div>
                        </div>
                        <div class="convert-Btn mt30 btnAuto120 h36">
                            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                <span>확인</span>
                            </button>
                        </div>
                    </div>
                    <!-- PASSZONE-List -->
                </div>
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 휴대폰번호 인증 -->

        <div id="EMAILPASS" class="willbes-Layer-Black">
            <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 h420">
                <a class="closeBtn" href="#none" onclick="closeWin('EMAILPASS')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>
                <div class="Layer-Tit tx-dark-black NG">이메일 인증</div> 

                <div class="lecMoreWrap">
                    <div class="PASSZONE-List widthAutoFull Member">
                        <ul class="passzoneInfo tx-gray NGR">
                            <li>- 본인 인증하시면 이메일 주소도 변경이 가능합니다.</li>
                            <li>- 변경하실 이메일주소 입력 후 ‘이메일 인증’ 버튼을 클릭하여 메일로 발송된 인증링크를 30분 이내에 클릭해 주세요.</li>
                        </ul>
                        <div class="widthAuto570">
                            <div class="inputBox p_re">
                                <div class="emailBox">
                                    <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" placeholder="이메일" maxlength="30"> @ 
                                    <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                                    <select id="email" name="email" title="직접입력" class="seleEmail ml10">
                                        <option selected="selected">직접입력</option>
                                        <option value="naver.com">naver.com</option>
                                        <option value="daum.net">daum.net</option>
                                    </select>
                                </div>
                                <button type="submit" onclick="" class="mem-Btn sm bg-dark-blue bd-dark-blue">
                                    <span>이메일 인증</span>
                                </button>
                            </div>
                            <div class="tx-red mb30" style="display: block;">사용가능한 이메일 주소입니다.</div>
                        </div>
                        <div class="search-Btn btnAuto120 mt30 h36">
                            <button type="submit" onclick="javascript:alert('입력하신 메일주소로 인증메일이 전송되었습니다. 30분 이내에 인증링크를 클릭해 주세요.');" class="mem-Btn bg-blue bd-dark-blue">
                                <span>확인</span>
                            </button>
                        </div>
                    </div>
                    <!-- PASSZONE-List -->
                </div>
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 이메일 인증 -->

        <div id="WITHDRAWALPASS" class="willbes-Layer-Black">
            <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 h900">
                <a class="closeBtn" href="#none" onclick="closeWin('WITHDRAWALPASS')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>
                <div class="Layer-Tit tx-dark-black NG">회원탈퇴</div> 

                <div class="lecMoreWrap">
                    <div class="PASSZONE-List widthAutoFull LeclistTable withdrawal">
                        <ul class="passzoneInfo tx-gray NGR">
                            <li class="tit strong">· 탈퇴전 꼭 확인하세요.</li>
                            <li class="txt">- 회원탈퇴 시, 그동안 윌비스의 <span class="tx-red">모든 이용 내역 및 보유하신 포인트와 쿠폰 등의 혜택은 모두 삭제</span>되며, <span class="tx-red">복구가 불가능</span>합니다.</li>
                            <li class="txt">- 회원탈퇴 후, 임의해지 및 재가입 방지를 목적으로 1년 간 회원의 성명, 휴대폰번호, 아이디, 비밀번호, 이메일 등의 정보를 보관합니다.</li>
                            <li class="txt">- 그 외 개인정보는 개인정보처리방침에 따라 처리됩니다.  <a href="#none" class="tx-red underline">개인정보처리방침 자세히보기 ></a></li>
                            <li class="txt">- 회원탈퇴 후 재가입 시 신규 가입으로 처리되며, 탈퇴 전 사용한 아이디로는 재가입이 불가능합니다.</li>
                            <li class="txt">- 회원탈퇴 즉시 회원정보에 등록된 이메일로 탈퇴 완료 메일이 발송됩니다.</li>
                            <li class="txt">- 최근 배송완료 교재가 있을 경우 교재 환불 기간으로 인해 ‘구매일로부터 30일 이후 탈퇴’가 가능합니다.</li>
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
                                    <td class="tx-left pl15">
                                        유료강좌: <a href="#none" class="tx-blue strong">0</a>건<br/>
                                        무료강좌: <a href="#none" class="tx-blue strong">1</a>건
                                    </td>
                                    <td>즉시탈퇴가능</td>
                                    <td class="tx-left pl15">탈퇴후 강좌 수강 및 서비스 이용불가</td>
                                </tr>
                                <tr>
                                    <td class="Top">수강중인 학원강좌</td>
                                    <td class="tx-left pl15">
                                        유료강좌: <a href="#none" class="tx-blue strong">0</a>건<br/>
                                        무료강좌: <a href="#none" class="tx-blue strong">1</a>건
                                    </td>
                                    <td>즉시탈퇴가능</td>
                                    <td class="tx-left pl15">탈퇴후 강좌 수강불가</td>
                                </tr>
                                <tr>
                                    <td class="Top">사용중인 서비스</td>
                                    <td class="tx-left pl15">응시예정 모의고사: <a href="#none" class="tx-blue strong">1</a>건</td>
                                    <td>즉시탈퇴가능</td>
                                    <td class="tx-left pl15">탈퇴후 모의고사 응시 서비스 이용불가</td>
                                </tr>
                                <tr>
                                    <td class="Top">30일 이내 배송 내역</td>
                                    <td class="tx-left pl15">교재: <a href="#none" class="tx-blue strong">1</a>건</td>
                                    <td><span class="tx-red">즉시탈퇴 불가능</span></td>
                                    <td class="tx-left pl15">거래 종료(환불) 후 탈퇴 가능</td>
                                </tr>
                                <tr>
                                    <td class="Top">포인트/쿠폰</td>
                                    <td class="tx-left pl15">
                                        포인트: <a href="#none" class="tx-blue strong">50,000</a>P<br/>
                                        쿠폰: <a href="#none" class="tx-blue strong">0</a>장
                                    </td>
                                    <td>즉시탈퇴가능</td>
                                    <td class="tx-left pl15">탈퇴후 복구 불가</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="Search-Result strong mt40 mb15 tx-gray">* 탈퇴신청 <span class="normal">( * 필수입력항목 )</span></div>
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
                                    <td class="w-list">홍길동</td>
                                    <th class="w-tit">아이디</th>
                                    <td class="w-list">willbes1</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">비밀번호*</th>
                                    <td class="w-list"><input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" placeholder="" maxlength="30"></td>
                                    <th class="w-tit">탈퇴사유*</th>
                                    <td class="w-list">
                                        <select id="cause" name="cause" title="cause" class="seleCause">
                                            <option selected="selected">탈퇴사유</option>
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
                                    <th class="w-tit">의견</th>
                                    <td class="w-list" colspan="3"><input type="text" id="USER_WRITE" name="USER_WRITE" class="iptWrite" placeholder="" maxlength="30" style="width: 498px;"></td>
                                </tr> 
                            </tbody>
                        </table>
                        <div class="w-btn">
                            <ul>
                                <li><a class="blueBox NSK" href="#none" onclick="">탈퇴하기</a></li>
                                <li><a class="whiteBox NSK" href="#none" onclick="">탈퇴취소</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- PASSZONE-List -->
                </div>
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 회원탈퇴 -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop