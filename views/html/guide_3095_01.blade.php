@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">고등고시<span class="row-line">|</span></li>
                <li class="subTit">국립외교원</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">교수진소개 메인</li>
                            <li><a href="#none">신규강좌게시판</li>
                            <li><a href="#none">경제학</a></li>
                            <li><a href="#none">행정법</a></li>
                            <li><a href="#none">행정학</a></li>
                            <li><a href="#none">정치학</a></li>
                            <li><a href="#none">국제법</a></li>
                            <li><a href="#none">재정학</a></li>
                            <li><a href="#none">정책학</a></li>
                            <li><a href="#none">정보체계론</a></li>
                            <li><a href="#none">국제경제학</a></li>
                            <li><a href="#none">교육학</a></li>
                            <li><a href="#none">PSAT</a></li>
                            <li><a href="#none">영어</a></li>
                            <li><a href="#none">한국사능력검정시험</a></li>
                            <li class="Tit">교수님 홈</li>
                            <li><a href="#none">개설강좌</a></li>
                            <li><a href="#none">무료강좌</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">학습자료실</a></li>
                            <li><a href="#none">수강후기</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">학원강의신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">학원강의신청</a></li>
                            <li><a href="#none">방문결제접수</a></li>
                            <li><a href="#none">학원공지사항</a></li>
                            <li><a href="#none">강의실배정표</a></li>
                            <li><a href="#none">강의시간표</a></li>
                            <li><a href="#none">강의자료실</a></li>
                            <li><a href="#none">강의계획서</a></li>
                            <li><a href="#none">전국모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">온라인수강신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">단강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">수험정보</a></li>
                            <li><a href="#none">학습가이드</a></li>
                            <li><a href="#none">시험통계</a></li>
                            <li><a href="#none">수험 FAQ</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
                <li class="dropdown">
                    <a href="#none">고객센터</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">고객센터 HOME</a></li>
                            <li><a href="#none">자주하는 질문</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">1:1 상담</a></li>
                            <li class="Tit">수강지원</li>
                            <li><a href="#none">PC원격지원</a></li>
                            <li><a href="#none">학습프로그램설치</a></li>
                        </ul>
                    </div>
                </li>
                <li class="hanlim3094">
                    <a href="#none" target="_self">
                        학원 방문 결제 
                        <span class="arrow-Btn">></span>
                    </a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>수험정보</strong>
            <span class="depth-Arrow">></span><strong>선발예정인원 및 과목</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">선발예정인원 및 과목</h3>
            <h4 class="NGR">국립외교원 선발예정인원 및 과목</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="8%">
                        <col width="8%">
                        <col width="8%">
                        <col>
                        <col width="25%">
                        <col width="25%">
                        <col width="10%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th rowspan="3">구분</th>
                            <th colspan="2" rowspan="3">선발분야</th>
                            <th rowspan="3">선발예정인원<br />
                            (총 50명)</th>
                            <th colspan="4">시 험 과 목</th>
                        </tr>
                        <tr>
                            <th colspan="2">제1차시험(선택형 필기)</th>
                            <th colspan="2">제2차시험(논문형 필기)</th>
                        </tr>
                        <tr>
                            <th>필 수</th>
                            <th>선택 또는 
                            지정과목</th>
                            <th>전공평가</th>
                            <th>통합논술</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="5">외교관<br />
                            후보자<br />
                            선발시험</td>
                            <td colspan="2">일반<br />외교</td>
                            <td>46명</td>
                            <td rowspan="5">언어논리영역, <br />
                            자료해석영역,<br />
                            상황판단영역,<br />
                            헌법, <br />
                            영어(영어능력검정 시험으로 대체),<br />
                            한국사(한국사능력검정 시험으로 대체)</td>
                            <td>독어, 불어, 러시아어, 중국어, <br />
                            일어, 스페인어 중 1과목<br />
                            (외국어능력검정시험으로 대체)</td>
                            <td>국제정치학,<br />                      
                            국제법,<br />
                            경제학</td>
                            <td> 학제통합<br />
                            논술시험Ⅰ,
                            학제통합<br />
                            논술시험Ⅱ</td>
                        </tr>
                        <tr>
                            <td rowspan="4">지역<br />
                            외교</td>
                            <td>중동</td>
                            <td>1명</td>
                            <td> 아랍어<br />
                            (어학검증시험으로 대체)</td>
                            <td colspan="2" rowspan="4">없음</td>
                        </tr>
                        <tr>
                            <td>아프리카</td>
                            <td>1명</td>
                            <td> 불어<br />
                            (외국어능력검정시험으로 대체)</td>
                        </tr>
                        <tr>
                            <td>중남미</td>
                            <td>1명</td>
                            <td> 스페인어<br />
                            (외국어능력검정시험으로 대체)</td>
                        </tr>
                        <tr>
                            <td>러시아·<br />
                            CIS</td>
                            <td>1명</td>
                            <td> 러시아어<br />
                            (외국어능력검정시험으로 대체)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop