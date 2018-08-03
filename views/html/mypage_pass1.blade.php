@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
                <li>
                    <a href="#none">내강의실 HOME</a>
                </li>
                <li>
                    <a href="#none">무한PASS존</a>
                </li>
                <li>
                    <a href="#none">온라인강좌</a>
                </li>
                <li>
                    <a href="#none">학원강좌</a>
                </li>
                <li>
                    <a href="#none">특강&이벤트 신청현황</a>
                </li>
                <li>
                    <a href="#none">모의고사관리</a>
                </li>
                <li>
                    <a href="#none">결제관리</a>
                </li>
                <li>
                    <a href="#none">학습지원관리</a>
                </li>
                <li>
                    <a href="#none">회원정보</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>내강의실</strong>
            <span class="depth-Arrow">></span><strong>무한PASS존</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-PASSZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 무한PASS존
                <ul>
                    <li class="InfoBtn"><a href="#none">등록기기정보 <span>▶</span></a></li>
                    <li class="InfoBtn"><a href="#none">프리패스이용안내 <span>▶</span></a></li>
                </ul>
            </div>
            <div class="willbes-Lec-Table NG d_block">
                <div class="willbes-PASS-Line bg-blue">이용중인 PASS (2)</div>
                <div class="will-Tit-Zone">
                    <div class="will-Tit NG f_left">· 나의학습/혜택정보</div>
                    <span class="willbes-Lec-Selected GM tx-gray">
                        <select id="process" name="process" title="process" class="seleProcess">
                            <option selected="selected">과정</option>
                            <option value="헌법">헌법</option>
                            <option value="스파르타반">스파르타반</option>
                            <option value="공직선거법">공직선거법</option>
                        </select>
                        <select id="name" name="name" title="name" class="seleName">
                            <option selected="selected">무한 PASS명</option>
                            <option value="PASS1">PASS1</option>
                            <option value="PASS2">PASS2</option>
                            <option value="PASS3">PASS3</option>
                        </select>
                    </span>
                </div>
                <table cellspacing="0" cellpadding="0" class="lecTable PassZoneTable">
                    <colgroup>
                        <col style="width: 770px;">
                        <col style="width: 170px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">
                                    <a href="#none">윌비스 페트라 PASS 7기 (1년)</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>[수강기간] <span class="tx-blue">2018.10.20 ~ 2018.11.20</span> <span class="tx-black">(잔여기간<span class="tx-pink">100일</span>)</span></dt>
                                </dl>
                            </td>
                            <td class="w-lec">
                                <div class="tx-gray">수강중인 강좌수</div>
                                <div class="w-sj"><span class="tx-blue">10강좌</span> / 100강좌</div>
                                <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="openWin('MoreLec')">강좌추가</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">
                                    <a href="#none">윌비스 페트라 PASS 7기 (1년)</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>[수강기간] <span class="tx-blue">2018.10.20 ~ 2018.11.20</span> <span class="tx-black">(잔여기간<span class="tx-pink">100일</span>)</span></dt>
                                </dl>
                            </td>
                            <td class="w-lec">
                                <div class="tx-gray">수강중인 강좌수</div>
                                <div class="w-sj"><span class="tx-blue">10강좌</span> / 100강좌</div>
                                <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none">강좌추가</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Mypage-PASSZONE -->

        <div class="willbes-Mypage-Tabs mt70">
            <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                <select id="lec" name="lec" title="lec" class="seleLec">
                    <option selected="selected">과목</option>
                    <option value="헌법">헌법</option>
                    <option value="스파르타반">스파르타반</option>
                    <option value="공직선거법">공직선거법</option>
                </select>
                <select id="Prof" name="Prof" title="Prof" class="seleProf">
                    <option selected="selected">교수님</option>
                    <option value="정채영">정채영</option>
                    <option value="기미진">기미진</option>
                    <option value="김세령">김세령</option>
                </select>
                <select id="study" name="study" title="study" class="seleStudy">
                    <option selected="selected">학습유형</option>
                    <option value="유형1">유형1</option>
                    <option value="유형2">유형2</option>
                    <option value="유형3">유형3</option>
                </select>
                <select id="date" name="date" title="date" class="seleDate">
                    <option selected="selected">최종학습일순</option>
                    <option value="1일">1일</option>
                    <option value="2일">2일</option>
                    <option value="3일">3일</option>
                </select>
                <div class="willbes-Lec-Search GM f_right">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="DetailWrap c_both">
                <div class="aBox passBox answerBox_block NSK f_right"><a href="#none">교재구매</a></div>
                <ul class="tabWrap tabDepthPass">
                    <li><a href="#Mypagetab1" class="on">즐겨찾기강좌 (2)</a></li>
                    <li><a href="#Mypagetab2">수강중강좌 (10)</a></li>
                    <li><a href="#Mypagetab3">수강종료강좌 (3)</a></li>
                    <li><a href="#Mypagetab4">숨긴강좌 (5)</a></li>
                </ul>
                <div class="tabBox">
                    <div id="Mypagetab1" class="tabLink">
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▲</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable">
                                <colgroup>
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="tx-gray">전체보기</th>
                                        <td colspan="9">
                                            <ul class="curriSelect">
                                                <li><a href="#none">[국어] 정채영</a></li>
                                                <li><a href="#none">[영어] 기미진</a></li>
                                                <li><a href="#none">[사회] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[사회] 정채영</a></li>
                                                <li><a href="#none">[형사법] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[형사법] 정채영</a></li>
                                                <li><a href="#none">[사회] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[사회] 오대혁</a></li>
                                                <li><a href="#none">[형사법] 이현나</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            <div class="PASSZONE-Btn">
                                <div class="w-answer"><a href="#none"><span class="aBox passBox waitBox NSK">삭제</span></a></div>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 55px;">
                                    <col style="width: 120px;">
                                    <col style="width: 680px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer"><a href="#none"><span class="aBox passBox waitBox NSK">삭제</span></a></td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">82%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer"><a href="#none"><span class="aBox passBox waitBox NSK">삭제</span></a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Mypagetab2" class="tabLink">
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▼</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable" style="display: none;">
                                <colgroup>
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="tx-gray">전체보기</th>
                                        <td colspan="9">
                                            <ul class="curriSelect">
                                                <li><a href="#none">[국어] 정채영</a></li>
                                                <li><a href="#none">[영어] 기미진</a></li>
                                                <li><a href="#none">[사회] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[사회] 정채영</a></li>
                                                <li><a href="#none">[형사법] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[형사법] 정채영</a></li>
                                                <li><a href="#none">[사회] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[사회] 오대혁</a></li>
                                                <li><a href="#none">[형사법] 이현나</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            <div class="PASSZONE-Btn">
                                <div class="w-answer">
                                    <span class="w-chk-st"><a href="#none"><img src="{{ img_url('mypage/icon_star_on.png') }}"></a></span>
                                    <a href="#none"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                </div>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 55px;">
                                    <col style="width: 120px;">
                                    <col style="width: 680px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <span class="w-chk-st"><a href="#none"><img src="{{ img_url('mypage/icon_star_on.png') }}"></a></span>
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <span class="w-chk-st"><a href="#none"><img src="{{ img_url('mypage/icon_star_off.png') }}"></a></span>
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">수강중강좌 정보가 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                    <div id="Mypagetab3" class="tabLink">
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▼</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable" style="display: none;">
                                <colgroup>
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="tx-gray">전체보기</th>
                                        <td colspan="9">
                                            <ul class="curriSelect">
                                                <li><a href="#none">[국어] 정채영</a></li>
                                                <li><a href="#none">[영어] 기미진</a></li>
                                                <li><a href="#none">[사회] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[사회] 정채영</a></li>
                                                <li><a href="#none">[형사법] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[형사법] 정채영</a></li>
                                                <li><a href="#none">[사회] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[사회] 오대혁</a></li>
                                                <li><a href="#none">[형사법] 이현나</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            <div class="PASSZONE-Btn">
                                <div class="w-answer" style="display: none;"><a href="#none"><span class="aBox passBox answerBox_block NSK">후기등록</span></a></div>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 735px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">80%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox answerBox_block NSK">후기등록</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">95%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox answerBox_block NSK">후기등록</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">수강종료강좌 정보가 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Mypagetab4" class="tabLink">   
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▼</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable" style="display: none;">
                                <colgroup>
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="tx-gray">전체보기</th>
                                        <td colspan="9">
                                            <ul class="curriSelect">
                                                <li><a href="#none">[국어] 정채영</a></li>
                                                <li><a href="#none">[영어] 기미진</a></li>
                                                <li><a href="#none">[사회] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[사회] 정채영</a></li>
                                                <li><a href="#none">[형사법] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[형사법] 정채영</a></li>
                                                <li><a href="#none">[사회] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[사회] 오대혁</a></li>
                                                <li><a href="#none">[형사법] 이현나</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            <div class="PASSZONE-Btn">
                                <div class="w-answer">
                                    <a href="#none"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                </div>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 55px;">
                                    <col style="width: 120px;">
                                    <col style="width: 680px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    국어<span class="row-line">|</span>
                                                    정채영교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">10강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 (교육행정대비) 한덕현 제니스 영어 실전 동형모의고사 (4-5월)</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">숨긴강좌정보가 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Mypage-Tabs -->

        <div id="MoreLec" class="willbes-Layer-PassBox">
            <a class="closeBtn" href="#none" onclick="closeWin('MoreLec')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">강좌추가</div> 

            <div class="lecMoreWrap">

                <div class="PASSZONE-List">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li>· '무한PASS존'에서 수강하기 위한 강좌를 추가하는 메뉴입니다.</li>
                        <li>· '수강할 강좌 검색' 후 체크박스를 클릭하시면, 우측 '강좌 선택내역'에 선택한 강좌가 추가됩니다.</li>
                        <li>· '강좌선택내역'에서 강좌 확인 후 '강좌추가' 버튼을 클릭하면 수강이 가능합니다.</li>
                        <li>·  강좌명 클릭시 '강좌상세정보' 영역에서 정보를 확인할 수 있습니다.</li>
                    </ul>
                    <div class="willbes-Lec-Selected willbes-Pass-Selected tx-gray">
                        <select id="lec" name="lec" title="lec" class="seleLec">
                            <option selected="selected">과목</option>
                            <option value="헌법">헌법</option>
                            <option value="스파르타반">스파르타반</option>
                            <option value="공직선거법">공직선거법</option>
                        </select>
                        <select id="Prof" name="Prof" title="Prof" class="seleProf">
                            <option selected="selected">교수님</option>
                            <option value="정채영">정채영</option>
                            <option value="기미진">기미진</option>
                            <option value="김세령">김세령</option>
                        </select>
                        <select id="study" name="study" title="study" class="seleStudy">
                            <option selected="selected">학습유형</option>
                            <option value="유형1">유형1</option>
                            <option value="유형2">유형2</option>
                            <option value="유형3">유형3</option>
                        </select>
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                            <div class="subBtn f_right"><a href="#none">초기화</a></div>
                        </div>
                        <div class="Search-Result">
                            <div class="Total">총 100건</div>
                            <div class="chkBox">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 수강중강좌 제외
                            </div>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Wrap">
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 50px;">
                                    <col style="width: 55px;">
                                    <col style="width: 55px;">
                                    <col style="width: 80px;">
                                    <col style="width: 320px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"><span class="row-line">|</span></th>
                                        <th>과목명<span class="row-line">|</span></th>
                                        <th>교수명<span class="row-line">|</span></th>
                                        <th>학습유형<span class="row-line">|</span></th>
                                        <th>강좌명</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo">
                                        <td colspan="5">
                                            <div class="lecDetailWrap mt30 mb60">
                                                <ul class="tabWrap tabDepth2">
                                                    <li><a href="#ch1">강좌상세정보</a></li>
                                                    <li><a href="#ch2">강좌목차</a></li>
                                                </ul>
                                                <div class="tabBox mt30">
                                                    <div id="ch1" class="tabLink">
                                                        <table cellspacing="0" cellpadding="0" class="classTable under-gray bdt-gray tx-gray">
                                                            <colgroup>
                                                                <col style="width: 105px;">
                                                                <col width="*">
                                                            </colgroup>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">
                                                                        강좌유의사항<br>
                                                                        <span class="tx-red">(필독)</span>
                                                                    </td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">강좌소개</td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">강좌특징</td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="ch2" class="tabLink">
                                                        <div class="LeclistTable">
                                                            <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                                                                <colgroup>
                                                                    <col style="width: 50px;">
                                                                    <col style="width: 365px;">
                                                                    <col style="width: 120px;">
                                                                </colgroup>
                                                                <thead>
                                                                    <tr>
                                                                        <th>No<span class="row-line">|</span></th>
                                                                        <th>강의명<span class="row-line">|</span></th>
                                                                        <th>강의시간</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="w-no">1강</td>
                                                                        <td class="w-list tx-left pl20">1강 03월 05일 : 모의고사 1회</td>
                                                                        <td class="w-time">50분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">2강</td>
                                                                        <td class="w-list tx-left pl20">2강 03월 05일 : 모의고사 2회</td>
                                                                        <td class="w-time">40분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">3강</td>
                                                                        <td class="w-list tx-left pl20">3강 03월 05일 : 모의고사 3회</td>
                                                                        <td class="w-time">30분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">4강</td>
                                                                        <td class="w-list tx-left pl20">4강 03월 12일 : 모의고사 4회</td>
                                                                        <td class="w-time">20분</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo">
                                        <td colspan="5">
                                            <div class="lecDetailWrap mt30 mb60">
                                                <ul class="tabWrap tabDepth2">
                                                    <li><a href="#ch1">강좌상세정보</a></li>
                                                    <li><a href="#ch2">강좌목차</a></li>
                                                </ul>
                                                <div class="tabBox mt30">
                                                    <div id="ch1" class="tabLink">
                                                        <table cellspacing="0" cellpadding="0" class="classTable under-gray bdt-gray tx-gray">
                                                            <colgroup>
                                                                <col style="width: 105px;">
                                                                <col width="*">
                                                            </colgroup>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">
                                                                        강좌유의사항<br>
                                                                        <span class="tx-red">(필독)</span>
                                                                    </td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">강좌소개</td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">강좌특징</td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="ch2" class="tabLink">
                                                        <div class="LeclistTable">
                                                            <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                                                                <colgroup>
                                                                    <col style="width: 50px;">
                                                                    <col style="width: 365px;">
                                                                    <col style="width: 120px;">
                                                                </colgroup>
                                                                <thead>
                                                                    <tr>
                                                                        <th>No<span class="row-line">|</span></th>
                                                                        <th>강의명<span class="row-line">|</span></th>
                                                                        <th>강의시간</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="w-no">1강</td>
                                                                        <td class="w-list tx-left pl20">1강 03월 05일 : 모의고사 1회</td>
                                                                        <td class="w-time">50분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">2강</td>
                                                                        <td class="w-list tx-left pl20">2강 03월 05일 : 모의고사 2회</td>
                                                                        <td class="w-time">40분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">3강</td>
                                                                        <td class="w-list tx-left pl20">3강 03월 05일 : 모의고사 3회</td>
                                                                        <td class="w-time">30분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">4강</td>
                                                                        <td class="w-list tx-left pl20">4강 03월 12일 : 모의고사 4회</td>
                                                                        <td class="w-time">20분</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>aa</td></tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>bb</td></tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>cc</td></tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>dd</td></tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>ee</td></tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>ff</td></tr>
                                </tbody>
                            </table>
                        </div>
                    
                    </div>
                </div>
                <!-- PASSZONE-List -->

                <div class="PASSZONE-Add">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li>· 선택된 강좌 확인 후 '강좌추가' 버튼을 클릭하면 '무한PASS존 > 수강중강좌탭'에 강좌가 추가됩니다.</li>
                        <li>· 강좌추가후 '교재구매' 버튼 클릭시 추가한 강좌(수강중강좌)에 대한 교재를 구매할 수 있습니다.</li>
                    </ul>
                    <div class="PASSZONE-Lec-Grid">
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable under-gray bdt-gray tx-gray">
                                <colgroup>
                                    <col style="width: 25px;">
                                    <col style="width: 175px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-info passzone">
                                            <dl class="w-info">
                                                <dt>국어</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>정채영</dt>
                                            </dl><br/>
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 40강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-info passzone">
                                            <dl class="w-info">
                                                <dt>국어</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>정채영</dt>
                                            </dl><br/>
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 40강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-info passzone">
                                            <dl class="w-info">
                                                <dt>국어</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>정채영</dt>
                                            </dl><br/>
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 40강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-info passzone">
                                            <dl class="w-info">
                                                <dt>국어</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>정채영</dt>
                                            </dl><br/>
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 40강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-Add -->

            </div>

        </div>
        <!-- willbes-Layer-PassBox -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop