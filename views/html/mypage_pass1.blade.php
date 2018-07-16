@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
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
            <div class="willbes-Prof-Subject willbes-Pass-Tit NG">
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
                                <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none">강좌추가</a></div>
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

        <div class="willbes-PASSZONE-Tabs mt70">
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
            <div class="PassDetailWrap">
                <div class="aBox passBox answerBox_block NSK f_right"><a href="#none">교재구매</a></div>
                <ul class="tabWrap tabDepthPass">
                    <li><a href="#Passtab1" class="on">즐겨찾기강좌 (2)</a></li>
                    <li><a href="#Passtab2">수강중강좌 (10)</a></li>
                    <li><a href="#Passtab3">수강종료강좌 (3)</a></li>
                    <li><a href="#Passtab4">숨긴강좌 (5)</a></li>
                </ul>
                <div class="tabBox">
                    <div id="Passtab1" class="tabLink">
                        <div class="PassTabBox">
                            <div class="CurriBox">
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
                                        <td class="w-answer"><a href="#none"><span class="aBox passBox waitBox NSK">삭제</span></a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--willbes-Lec-Table -->
                    </div>
                    <div id="Passtab2" class="tabLink">
                        <div class="PassTabBox">
                            <div class="CurriBox">
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
                        <!--willbes-Lec-Table -->
                    </div>
                    <div id="Passtab3" class="tabLink">
                        <div class="PassTabBox">
                            <div class="CurriBox">
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
                        <!--willbes-Lec-Table -->
                    </div>
                    <div id="Passtab4" class="tabLink">
                        <div class="PassTabBox">
                            <div class="CurriBox">
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
                        <!--willbes-Lec-Table -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop