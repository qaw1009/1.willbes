@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰간부<span class="row-line">|</span></li>
                <li class="subTit">간부후보생</li>
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
            <span class="depth-Arrow">></span><strong>시험정보</strong>
            <span class="depth-Arrow">></span><strong>가산점</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">가산점</h3>
            <h4 class="NGR">자격증 등의 가산점 기준 </h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="10%"/>
                        <col width="10%"/>
                        <col />
                        <col />
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th rowspan="2" colspan="2">분 야</th>
                            <th colspan="3">관련 자격증 및 가산점</th>
                        </tr>
                        <tr>
                            <th>5점</th>
                            <th>4점</th>
                            <th>2점</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="2">학위</th>
                            <th>박사학위</th>
                            <th>석사 학위</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="2">정보처리</th>
                            <td>정보관리기술사<br />
                            전자계산기조직응용기술사</td>
                            <td>정보처리기사 <br />
                            전자계산기조직응용기사<br />
                            정보보안기사</td>
                            <td>정보처리기사<br />
                            정보보안산업기사<br />
                            사무자동화산업기사<br />
                            컴퓨터활용능력1ㆍ2급<br />
                            워드프로세서1급</td>
                        </tr>
                        <tr>
                            <th colspan="2">전자ㆍ통신</th>
                            <td>정보통신기술사<br />
                            전자계산기기술사</td>
                            <td>무선설비·전파통신·전파전자·정보통신·전자·전자계산기기사<br />
                            통신설비기능장</td>
                            <td>무선설비·전파통신·전파전자·정보통신·통신선로·전자·전자계산기산업기사</td>
                        </tr>
                        <tr>
                            <th colspan="2">국어</th>
                            <td>한국실용글쓰기검정 750점 이상<br />
                            한국어능력시험 770점 이상<br />
                            국어능력인증시험 162점 이상</td>
                            <td>한국실용글쓰기검정 630점 이상<br />
                            한국어능력시험 670점 이상<br />
                            국어능력인증시험 147점 이상</td>
                            <td>한국실용글쓰기검정 550점 이상<br />
                            한국어능력시험 570점 이상<br />
                            국어능력인증시험 130점 이상</td>
                        </tr>
                        <tr>
                            <th rowspan="3">외국어</th>
                            <th>영어</th>
                            <td>TOEIC 900 이상<br />
                            TEPS 850이상<br />
                            &lt;추가&gt; (New TEPS 488 이상) <br />
                            TOEFL(IBT) 102 이상 <br />
                            TOEFL(PBT) 608 이상<br />
                            TOSEL(advanced) 880 이상<br />
                            FLEX 790 이상<br />
                            PELT(main) 446 이상<br />
                            G-TELP Level 2  89이상 </td>
                            <td>TOEIC 800 이상<br />
                            TEPS 720이상<br />
                            (New TEPS 399 이상) <br />
                            TOEFL(IBT) 88 이상 <br />
                            TOEFL(PBT) 570 이상<br />
                            TOSEL(advanced) 780 이상<br />
                            FLEX 714 이상<br />
                            PELT(main) 304 이상<br />
                            G-TELP Level 2  75이상</td>
                            <td>TOEIC 600 이상 <br />
                            TEPS 500이상 <br />
                            (New TEPS 268 이상) <br />
                            TOEFL(IBT) 57 이상 <br />
                            TOEFL(PBT) 489 이상 <br />
                            TOSEL(advanced) 580 이상 <br />
                            FLEX 480 이상 <br />
                            PELT(main) 242 이상 <br />
                            G-TELP Level 2  48이상 </td>
                        </tr>
                        <tr>
                            <th>일어</th>
                            <td>JLPT 1급(N1)<br />
                            JPT 850 이상</td>
                            <td>JLPT 2급(N2)<br />
                            JPT 650 이상</td>
                            <td>JLPT 3급(N3, N4)<br />
                            JPT 550 이상</td>
                        </tr>
                        <tr>
                            <th>중국어</th>
                            <td>HSK 9급이상(新 HSK 6급)</td>
                            <td>HSK 8급 (新 HSK 5급210점 이상)</td>
                            <td>HSK 7급 (新 HSK 4급195점 이상)</td>
                        </tr>
                        <tr>
                            <th colspan="2">노동</th>
                            <td>공인노무사</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="2">무도</th>
                            <td></td>
                            <td>무도4단 이상</td>
                            <td>무도2ㆍ3단</td>
                        </tr>
                        <tr>
                            <th colspan="2">부동산</th>
                            <td>감정평가사</td>
                            <td></td>
                            <td> 공인중개사</td>
                        </tr>
                        <tr>
                            <th colspan="2">교육</th>
                            <td>청소년상담사1급</td>
                            <td>정교사 2급 이상<br />
                            청소년지도사1급<br />
                            청소년상담사 2급</td>
                            <td>청소년지도사 2·3급<br />
                            청소년상담사 3급</td>
                        </tr>
                        <tr>
                            <th colspan="2">재난.안전관리</th>
                            <td>건설안전ㆍ전기안전ㆍ소방ㆍ<br />
                            가스기술사</td>
                            <td>건설안전·산업안전·소방설비·가스·원자력기사<br />
                            위험물기능장<br />
                            핵연료물질취급감독자면허<br />
                            방사선취급감독자면허<br />
                            경비지도사</td>
                            <td>산업안전·건설안전·소방설비·가스·위험물산업 기사<br />
                            1종 대형면허<br />
                            특수면허(트레일러,레커)<br />
                            조종면허(기중기,불도우저)<br />
                            응급구조사<br />
                            핵연료물질취급자면허<br />
                            방사성동위원소취급자면허</td>
                        </tr>
                        <tr>
                            <th colspan="2">화약</th>
                            <td>화약류관리기술사</td>
                            <td>화약류제조기사<br />
                            화약류관리기사</td>
                            <td>화약류제조산업기사<br />
                            화약류관리산업기사</td>
                        </tr>
                        <tr>
                            <th colspan="2">교통</th>
                            <td>교통기술사<br />
                            도시계획기술사</td>
                            <td>교통기사<br />
                            도시계획기사<br />
                            교통사고분석사<br />
                            도로교통사고감정사</td>
                            <td>교통산업기사</td>
                        </tr>
                        <tr>
                            <th colspan="2">토목</th>
                            <td>토목시공기술사<br />
                            토목구조기술사<br />
                            토목품질시험기술사</td>
                            <td>토목기사</td>
                            <td>토목산업기사</td>
                        </tr>
                        <tr>
                            <th colspan="2">법무</th>
                            <td>변호사</td>
                            <td>법무사</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="2">세무회계</th>
                            <td>공인회계사</td>
                            <td>세무사<br />
                            관세사</td>
                            <td>전산세무 1·2급<br />
                            전산회계 1급</td>
                        </tr>
                        <tr>
                            <th colspan="2">의료</th>
                            <td>의사<br />
                            상담심리사1급</td>
                            <td>약사<br />
                            정신보건임상심리사 1급<br />
                            임상심리사 1급<br />
                            상담심리사 2급</td>
                            <td>임상병리사, 물리치료사, 방사선사, 간호사, 의무기록사, 치과기공사<br />
                            정신보건임상심리사2급<br />
                            임상심리사2급<br />
                            작업치료사</td>
                        </tr>
                        <tr>
                            <th colspan="2">특허</th>
                            <td>변리사</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="2">건축</th>
                            <td>건축구조·건축기계설비·건축시공·건축품질시험기술사</td>
                            <td>건축, 건축설비기사</td>
                            <td>건축ㆍ건축설비ㆍ<br />
                            건축일반시공산업기사</td>
                        </tr>
                        <tr>
                            <th colspan="2">전기</th>
                            <td>건축전기설비ㆍ전기응용기술사</td>
                            <td>전기ㆍ전기공사기사</td>
                            <td>전기ㆍ전기기기ㆍ전기공사산업기사</td>
                        </tr>
                        <tr>
                            <th colspan="2">식품위생</th>
                            <td>식품기술사</td>
                            <td>식품기사</td>
                            <td>식품산업기사</td>
                        </tr>
                        <tr>
                            <th colspan="2">환경</th>
                            <td>폐기물처리기술사<br />
                            화공기술사<br />
                            수질관리기술사<br />
                            농화학기술사<br />
                            대기관리기술사</td>
                            <td>폐기물처리기사<br />
                            화공기사<br />
                            수질환경기사<br />
                            농화학기사<br />
                            대기환경기사</td>
                            <td>폐기물처리산업기사<br />
                            화공산업기사<br />
                            수질환경산업기사<br />
                            대기환경산업기사</td>
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