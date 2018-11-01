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
                    <a href="{{ site_url('/home/html/counsel1') }}">상담실</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">상담실</li>
                            <li><a href="{{ site_url('/home/html/counsel1') }}">일반상담</a></li>
                            <li><a href="{{ site_url('/home/html/counsel2') }}">인적성/면접상담</a></li>
                            <li><a href="{{ site_url('/home/html/counsel3_1') }}">심층상담예약</a></li>
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
            <span class="depth-Arrow">></span><strong>상담실</strong>
            <span class="depth-Arrow">></span><strong>심층상담예약</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Counsel c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black pt-zero">· 심층상담예약</div>
            <div class="counsel_infoBox tx-black GM mt40">
                <img src="{{ img_url('counsel/willbes_counsel.jpg') }}">
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable bdt-gray bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 125px;">
                            <col style="width: 660px;">
                            <col style="width: 155px;">
                        </colgroup>
                        <tbody>
                            <tr class="userInfoBox">
                                <th><strong>캠퍼스 선택</strong></th>
                                <td class="w-list tx-left pl20">
                                    <select id="select" name="select" title="캠퍼스 선택" class="">
                                        <option selected="selected">캠퍼스 선택</option>
                                        <option value="노량진">노량진</option>
                                        <option value="노량진1">노량진1</option>
                                        <option value="노량진2">노량진2</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" onclick="" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                        <span><strong>나의 예약현황</strong></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="willbes-counsel_step mt60 c_both">
                <div class="step mb50 NG">
                    <ul>
                        <li><div class="num">01</div>상담일자/시간선택</li>
                        <li class="arrow"><img src="{{ img_url('counsel/icon_arrow_step.png') }}"></li>
                        <li><div class="num">02</div>사전정보입력</li>
                        <li class="arrow"><img src="{{ img_url('counsel/icon_arrow_step.png') }}"></li>
                        <li class="active"><div class="num">03</div>상담예약확인</li>
                    </ul>
                    <div class="info-Box info-Box3 NG">
                        <dl>
                            <dt>
                                · 상담 예약이 완료되었습니다. 예약사항을 다시 한 번 확인해 주세요.<br/>
                                · <span class="tx-blue">상담예약일시를 변경하시려면 예약 취소를 하시고 1단계 상담일자/시간선택 부터 다시 신청하셔야 합니다</span>.<br/>
                                · 예약하신 날짜 및 시간에 도착하지 않으실 경우 상담이 취소될 수 있습니다.<br/>
                            </dt>
                        </dl>
                    </div>
                </div>
                <div class="willbes-User-Info p_re pb30">
                    <div class="InfoTable GM">
                        <table cellspacing="0" cellpadding="0" class="classTable userInfoTable counselTable under-gray bdt-gray bdb-gray tx-gray">
                            <colgroup>
                                <col style="width: 160px;">
                                <col style="width: 780px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-tit">상담예약 일시</td>
                                    <td class="w-info"><span class="tx-light-blue">2018-10-25 (목) 10:00 ~ 10:30</span></td>
                                </tr>
                                <tr>
                                    <td class="w-tit">이름(아이디)</td>
                                    <td class="w-info">홍길동(아이디)</td>
                                </tr>
                                <tr>
                                    <td class="w-tit">생년월일</td>
                                    <td class="w-info">19990101</td>
                                </tr>
                                <tr>
                                    <td class="w-tit">연락처</td>
                                    <td class="w-info">01012345678</td>
                                </tr>
                                <tr>
                                    <td class="w-tit">이메일</td>
                                    <td class="w-info">willbes@willbes.com</td>
                                </tr>
                                <tr>
                                    <td class="w-tit">응시직렬</td>
                                    <td class="w-info">일반</td>
                                </tr>
                                <tr>
                                    <td class="w-tit">응시지역</td>
                                    <td class="w-info">서울</td>
                                </tr>
                                <tr>
                                    <td class="w-tit">수험기간</td>
                                    <td class="w-info">6개월 미만</td>
                                </tr>
                                <tr>
                                    <td class="w-tit">취약과목</td>
                                    <td class="w-info">영어</td>
                                </tr>
                                <tr>
                                    <td class="w-tit">수강여부</td>
                                    <td class="w-info">학원</td>
                                </tr>
                                <tr>
                                    <td class="w-tit">상세정보</td>
                                    <td class="w-info">
                                        2018년 1차 시험<br/>
                                        - 국어: 50점<br/>
                                        - 영어: 50점<br/>
                                        - 사회: 50점<br/>
                                        - 행정법: 50점<br/>
                                        - 행정학: 50점<br/>
                                        * 기타상담사항: 처음 준비합니다. 자세한 상담이 필요합니다.<br/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="willbes-Lec-buyBtn">
                        <ul>
                            <li class="btnAuto90 h36">
                                <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-gray">
                                    <span class="tx-purple-gray">예약취소</span>
                                </button>
                            </li>
                            <li class="btnAuto90 h36">
                                <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                    <span>완료</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Counsel -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop