@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="{{ site_url('/home/html/prof') }}">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/package1') }}">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="{{ site_url('/home/html/package1') }}">추천 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/package2') }}">선택 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/diypackage') }}">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/list') }}">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mocktest1') }}">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="{{ site_url('/home/html/mocktest1') }}">시험공고</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest2') }}">수험뉴스</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest3') }}">기출문제</a></li>
                            <li><a href="#none">공무원가이드</a></li>
                            <li><a href="#none">초보합격전략</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/event_ing') }}">이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">이벤트</li>
                            <li><a href="{{ site_url('/home/html/event_ing') }}">진행중인 이벤트</a></li>
                            <li><a href="{{ site_url('/home/html/event_end') }}">마감된 이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>이벤트</strong>
            <span class="depth-Arrow">></span><strong>진행중인 이벤트</strong>
        </span>
    </div>
    <div class="Content p_re">
        <div class="willbes-Leclist c_both">

            <!-- View -->
            <div class="willbes-Leclist c_both">
                <div class="LecViewTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 65px;">
                            <col style="width: 110px;">
                            <col style="width: 465px;">
                            <col style="width: 150px;">
                            <col style="width: 150px;">
                        </colgroup>
                        <thead>
                            <tr><th colspan="5" class="w-list tx-left pl20"><span class="w-select tx-blue">[이벤트]</span> <strong>합격생 중교 입교 버스 든든 이벤트</strong></th></tr>
                            <tr>
                                <td class="w-type">신림<span class="row-line">|</span></td>
                                <td class="w-area tx-left pl20">회원+비회원<span class="row-line">|</span></td>
                                <td class="w-area tx-left pl20">[접수기간] 2018-00-00 ~ 2018-00-00<span class="row-line">|</span></td>
                                <td class="w-date">2018-00-00<span class="row-line">|</span></td>
                                <td class="w-click"><strong>조회수</strong> 123</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-file tx-left pl20" colspan="5">
                                    <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                    <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-txt tx-left" colspan="5">
                                    수험생 여러분들께 보다 나은 수강환경을 제공해드리기 위해<br/>
                                    서버 점검 및 개선 작업이 진행될 예정입니다.<br/><br/>
                                    점검 시간에는 수강이 원활하지 않으니 양해 부탁드립니다.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CheckBox -->
            <div class="willbes-Leclist c_both mt50">
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 110px;">
                            <col style="width: 720px;">
                            <col style="width: 110px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="w-tit" colspan="2">신청리스트</th>
                                <th class="w-chk">선택</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-list tx-left pl20" colspan="2">한덕현 교수님 새벽 모의고사 무료특강(11/08)</td>
                                <td class="w-chk"><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            </tr>
                            <tr>
                                <td class="w-list tx-left pl20" colspan="2">기미진 교수님 새벽 모의고사 무료특강(11/05)</td>
                                <td class="w-chk"><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            </tr>
                            <tr>
                                <td class="w-list tx-left pl20" colspan="2">신청리스트명이 노출됩니다.</td>
                                <td class="w-chk"><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            </tr>
                            <tr class="userInfoBox">
                                <th><strong>신청자정보</strong></th>
                                <td class="w-list tx-left pl20" colspan="2">
                                    · 이름, 연락처, 이메일주소를 모두 입력해 주세요.<br/>
                                    <input type="text" id="name" name="name" class="iptName" maxlength="30" placeholder="이름" style="width: 110px;">
                                    <input type="text" id="tel" name="tel" class="iptTel" maxlength="30" placeholder="휴대폰번호('-'없이 입력)" style="width: 220px;">
                                    <input type="text" id="email" name="email" class="iptEmail" maxlength="30" placeholder="이메일" style="width: 220px;">
                                    <button type="submit" onclick="" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                        <span>신청하기</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- List -->
            <div class="willbes-Leclist c_both mt50">
                <div class="LeclistTable p_re">
                    <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 830px;">
                            <col style="width: 110px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="w-textarea pl20 pt25"><textarea placeholder="댓글을 입력해 주세요."></textarea></th>
                                <th class="w-btn pr20 pt25">
                                    <button type="submit" onclick="" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                        <span>등록</span>
                                    </button>
                                </th>
                            </tr>
                            <tr>
                                <td class="w-list tx-left pl20 bd-none" colspan="2">* 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다.</td>
                            </tr>
                        </thead>
                    </table>
                    <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black bdb-gray tx-gray mt30">
                        <colgroup>
                            <col style="width: 95px;">
                            <col style="width: 90px;">
                            <col style="width: 615px;">
                            <col style="width: 140px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <td class="w-no"><img src="{{ img_url('sub/icon_notice.gif') }}"></td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                                <td class="w-more"><a class="tx-light-blue" href="#none" onclick="openWin('NOTICEPASS')">자세히보기 ></a></td>
                            </tr>
                            <tr>
                                <td class="w-no"><img src="{{ img_url('sub/icon_notice.gif') }}"></td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20">공지사항 제목이 노출됩니다.</td>
                                <td class="w-more"><a class="tx-light-blue" href="#none">자세히보기 ></a></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-no">홍길동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20" colspan="2">
                                    2018년 하반기 경찰공무원 경력경쟁채용시험 공고<a class="w-del" href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-no">홍길*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20" colspan="2">
                                    이벤트에 참여해 봤자 어차피 당첨이 안되서 별관심 없었는데 신광은 교수님 너무 좋아하고 존경하여 참여하게 되었습니다.<br/>
                                    모를 행운이 언젠간 올 수도 있겠죠? ㅎ 다른분이 당첨되셔도 미리 축하 말씀드릴께욧! 신광은 경찰팀 파이팅! 그뒤에서 묵묵히<br/>
                                    주시는 직원분들도 팟팅하시구요 감기 조심하세요 ㅎㅎ 어홍헝홍홍ㅋㅋ
                                </td>
                            </tr>
                            <tr>
                                <td class="w-no">홍길*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                            </tr>
                            <tr>
                                <td class="w-no">홍길*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                            </tr>
                            <tr>
                                <td class="w-no">홍길*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                            </tr>
                            <tr>
                                <td class="w-no">홍길*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                            </tr>
                            <tr>
                                <td class="w-no">홍길*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                            </tr>
                            <tr>
                                <td class="w-no">홍길*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                            </tr>
                            <tr>
                                <td class="w-no">홍길*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                            </tr>
                            <tr>
                                <td class="w-no">홍길*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right p_ab" style="right: 0;">
                        <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                            <span>목록</span>
                        </button>
                    </div>
                    <div class="Paging">
                        <ul>
                            <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                            <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                            <li><a href="#none">2</a><span class="row-line">|</span></li>
                            <li><a href="#none">3</a><span class="row-line">|</span></li>
                            <li><a href="#none">4</a><span class="row-line">|</span></li>
                            <li><a href="#none">5</a><span class="row-line">|</span></li>
                            <li><a href="#none">6</a><span class="row-line">|</span></li>
                            <li><a href="#none">7</a><span class="row-line">|</span></li>
                            <li><a href="#none">8</a><span class="row-line">|</span></li>
                            <li><a href="#none">9</a><span class="row-line">|</span></li>
                            <li><a href="#none">10</a></li>
                            <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="NOTICEPASS" class="willbes-Layer-Black">
                <div class="willbes-Layer-PassBox willbes-Layer-PassBox700 h520 fix">
                    <a class="closeBtn" href="#none" onclick="closeWin('NOTICEPASS')">
                        <img src="{{ img_url('sub/close.png') }}">
                    </a>
                    <div class="Layer-Tit tx-dark-black NG">공지사항</div> 

                    <div class="lecMoreWrap">

                        <div class="PASSZONE-List widthAutoFull LeclistTable Memolist LecViewTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 420px;">
                                    <col style="width: 115px;">
                                    <col style="width: 115px;">
                                </colgroup>
                                <thead>
                                    <tr><th colspan="5" class="w-list tx-left pl20"><span class="w-select tx-blue">[이벤트]</span> <strong>합격생 중교 입교 버스 든든 이벤트</strong></th></tr>
                                    <tr>
                                        <td class="w-type pl20">&nbsp;</td>
                                        <td class="w-date">2018-00-00<span class="row-line">|</span></td>
                                        <td class="w-click"><strong>조회수</strong> 123</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-file tx-left pl20" colspan="5">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-txt tx-left" colspan="5" style="height: 250px;">
                                            수험생 여러분들께 보다 나은 수강환경을 제공해드리기 위해<br/>
                                            서버 점검 및 개선 작업이 진행될 예정입니다.<br/><br/>
                                            점검 시간에는 수강이 원활하지 않으니 양해 부탁드립니다.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- PASSZONE-List -->

                    </div>
                </div>
            </div>
            <!-- willbes-Layer-PassBox : 자세히보기 -->

        </div>

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop