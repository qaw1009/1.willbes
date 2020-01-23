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
            <span class="depth-Arrow">></span><strong>시험방법</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">시험방법</h3>
            <h4 class="NGR">모집인원 및 분야</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th>분야</th>
                            <th>남.여 통합</th>
                            <th>세무회계</th>
                            <th>사이버</th>
                            <th>소계</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>인원(명)</td>
                            <td>40</td>
                            <td>5</td>
                            <td>5</td>
                            <td>50</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="NGR mt20">응시자격</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col />
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th>구분</th>
                            <th>응시자격조건</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>연령</th>
                            <td>만 21세이상 40세 이하인 대한민국의 남자·여자<br /></td>
                        </tr>
                        <tr>
                            <th>학력</th>
                            <td>제한 없음</td>
                        </tr>
                        <tr>
                            <th>병역</th>
                            <td>남자의 경우 병역을 필하였거나 면제된 사람(면접시험 전일까지 전역 예정자 포함)<br />
                            ※ 만기전역자 외에 가사사정으로 인한 전역, 직권면직자 중 공상으로 전역한 사람도 응시자격 인정</td>
                        </tr>
                        <tr>
                            <th>신체조건</th>
                            <td>-시력이 좌·우 각각 0.8이상인 자(교정시력 포함)<br />
                            - 청력이 완전하고 색신 이상이 아닌 자(약도색신은 예외) <br />
                            - 고혈압·저혈압이 아니며 사지가 완전하고 난치 질환이 없는 자 <br /></td>
                        </tr>
                        <tr>
                            <th>운전면허</th>
                            <td>자동차 운전면허 1종보통 이상의 소지자 (원서접수일부터 면접시험 최종일까지 유효하여야 함)</td>
                        </tr>
                        <tr>
                            <th>어학</th>
                            <td>면접시험일까지 유효하여야 함</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="NGR mt20">원서접수</h4>
            <ul class="st01">
                <li>경찰청 인터넷 원서접수 사이트(http://gosi.police.go.kr)로 접수하며, 원서작성 시 최근 1년 이내에 촬영한 상반신 칼라사진(3×4cm) 업로드(원서접수 기간 이후에는 사진 교체 불가)
                <li>응시자는 영어 능력 검정시험 성적을 입력하고, 해당 어학성적표를 스캔하여 업로드<br>
                (영어성적은 원서접수 마감일 기준 2년 이내의 성적에 한해 유효하고, 영어성적이 기준점수 미달 시 접수 불가하며, 성적 허위기재 
                시에는 부정행위로 간주)</li>
                <li>필기시험 응시지역은 주소지와 상관없이 희망하는 응시지구의 선택이 가능<br>
                (응시지구-6개소 : 서울, 부산, 대구, 대전, 광주, 경기남부지방경찰청, 필기시험장소는 응시지구별로 지정) (임용시 최초 근무지역은 입교 후 교육성적 등 별도 방법에 의하며, 원서접수 시 선택한 응시지구와는 관련 없음)
                </li>
                <li>응시수수료 7,000원</li>
                <li>응시표는 전형 일정에 따라 인터넷 원서접수 사이트에서 교부 및 시험 장소를 공지<br>
                (시험 당일 응시표, 신분증, 필기도구를 반드시 지참하여야 함)
                </li>
            </ul>    
            <h4 class="NGR mt20">필기시험</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th rowspan="2" scope="col">시험</th>
                            <th rowspan="2" scope="col">과목별</th>
                            <th colspan="3" scope="col">분야</th>
                        </tr>
                        <tr>
                            <th scope="col">일반</th>
                            <th scope="col">세무/회계</th>
                            <th scope="col">사이버</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="5">1차 시험<br />
                                (객관식) </th>
                            <td rowspan="5">필수</td>
                            <td>한국사</td>
                            <td>한국사</td>
                            <td>한국사</td>
                        </tr>
                        <tr>
                            <td>형법</td>
                            <td>형법</td>
                            <td>형법</td>
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td>영어</td>
                            <td>영어</td>
                        </tr>
                        <tr>
                            <td>행정학</td>
                            <td>형사소송법</td>
                            <td>형사소송법</td>
                        </tr>
                        <tr>
                            <td>경찰학개론</td>
                            <td>세법개론</td>
                            <td>정보보호론</td>
                        </tr>
                        <tr>
                            <th rowspan="5">2차 시험<br />
                                (주관식)</th>
                            <td>필수</td>
                            <td>형사소송법</td>
                            <td>회계학</td>
                            <td>시스템네트워크<br />
                                보안</td>
                        </tr>
                        <tr>
                            <td rowspan="4">선택<br />
                                (1개 과목)</td>
                            <td>행정법</td>
                            <td>상법총칙</td>
                            <td rowspan="2">데이터베이스론</td>
                        </tr>
                        <tr>
                            <td>경제학</td>
                            <td>경제학</td>
                        </tr>
                        <tr>
                            <td>민법총칙</td>
                            <td>통계학</td>
                            <td>통신이론</td>
                        </tr>
                        <tr>
                            <td>형사정책</td>
                            <td>재정학</td>
                            <td>소프트웨어공학</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="mt10">
                ※ 영어시험은 영어능력 검정시험의 종류 및 기준점수에 의거, 기준점수 이상이면 합격한 것으로 간주한다. 
            </div>
            <div class="mt20">
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">구분</th>
                            <th scope="col">시험과목</th>
                            <th scope="col">비고</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1교시<br />
                                (80분)</th>
                            <td>전분야 : 한국사, 형법</td>
                            <td rowspan="2">객관식(필수)</td>
                        </tr>
                        <tr>
                            <th>2교시<br />
                                (80분)</th>
                            <td>일반 : 행정학, 경찰학개론 <br />
                                세무회계 : 형사소송법, 세법개론<br />
                            사이버 : 형사소송법, 정보보호론</td>
                        </tr>
                        <tr>
                            <th>3교시<br />
                                (70분)</th>
                            <td>일반 : 형사소송법<br />
                                세무회계 : 회계학<br />
                            사이버 : 시스템네트워크보안</td>
                            <td>주관식(필수)</td>
                        </tr>
                        <tr>
                            <th>4교시<br />
                                (70분)</th>
                            <td>일반 : 행정법, 경제학, 민법총칙, 형사정책 중 택 1<br />
                                세무회계 : 상법총칙, 경제학, 통계학, 재정학 중 택 1<br />
                            사이버 ; 테이터베이스론, 통신이론, 소프트웨어공학 중 택 1</td>
                            <td>주관식 (선택)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tx-blue strong mt10">
                영어인증(영어과목을 대체하는 영어능력 검정시험의 종류 및 기준점수(제41조관련) 
            </div>
            <div class="mt20">
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="10%"/>
                        <col />
                        <col width="20%"/>
                    </colgroup>
                    <thead>
                        <tr>
                            <th colspan="2" scope="col">시험의 종류</th>
                            <th scope="col">기준점수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>토플<br />
                            (TOFEL)</th>
                            <td>미국 이.티.에스(E.T.S : Education Testing Service)에서 시행하는 시험<Br>(Test of English as a Foreign Language)으로서
                            그 실시 방식에 따라 피.비.티(PBT : Paper Based Test)씨.비.티(CBT : Computer Based Test) 및 아이.비.티(IBT:Internet Based Test)로 구분한다.</td>
                            <td>PBT 490점이상
                              <br />
                            IBT 58점이상</td>
                        </tr>
                        <tr>
                            <th>토익<br />
                            (TOEIC)</th>
                            <td>미국 이.티.에스(E.T.S : Education Testing Service)에서 시행하는 시험<Br>(Test of English International Communication)을 말한다.</td>
                            <td>625점이상</td>
                        </tr>
                        <tr>
                            <th>텝스<br />
                            (TEPS)</th>
                            <td>서울대 영어능력검정시험(Test of English Proficiency, Seoul National University)을 말한다.</td>
                            <td>
                            520점 이상<Br>(2018. 5. 12. 전에 실시된 시험)<Br>
                            280점 이상<Br>(2018. 5. 12. 이후 실시된 시험)
							</td>
                        </tr>
                        <tr>
                            <th>지텔프<br />
                            (G-TELP)</th>
                            <td>미국 국제테스트연구원(International Testing Services Center)에서 주관하는 시험(General Test of English Language Proficiency)을 말한다.</td>
                            <td>Level 2의<br />
                            50점이상</td>
                        </tr>
                        <tr>
                            <th>플렉스<br />
                            (FLEX)</th>
                            <td>한국외국어대 어학능력검정시험(Foreign Language EXamination)을 말한다.</td>
                            <td>520점이상</td>
                        </tr>
                        <tr>
                            <th>펠트<br />
                            (PELT)</th>
                            <td>한국외국어평가원에서 시행하는 시험을 말한다.(Practical English Language Test)</td>
                            <td>PEL Main<br />
                            254점이상<br /></td>
                        </tr>
                        <tr>
                            <th>토셀<br />
                            (TOSEL)</th>
                            <td>한국교육방송공사에서 주관하는 시험을 말한다.(Test of the Skills in the English Language)</td>
                            <td>Advanced<br />
                            550점이상</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt10">
                ※ 영어성적은 정기시험 성적만 인정하고, 기준점수를 충족하지 못한 경우에는 해당 시험의 영어 과목을 불합격으로 처리(합격한 경우 필기시험 성적에는 미반영)
            </div>
            
            <h4 class="NGR mt20">신체검사</h4>
            <div class="mt10">
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="10%"/>
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">구분</th>
                            <th scope="col">내용 및 기준</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>체격</th>
                            <td>국립ㆍ공립병원 또는 종합병원에서 실시한 경찰공무원 채용시험 신체검사 및 약물검사의 결과 건강상태가 양호하고, <br>
                            사지가 완전하며, 가슴ㆍ배ㆍ입ㆍ구강 및 내장의 질환이 없어야 한다.</td>
                        </tr>
                        <tr>
                            <th>시력</th>
                            <td>시력(교정시력을 포함한다)은 양쪽 눈이 각각 0.8 이상이어야 한다.</td>
                        </tr>
                        <tr>
                            <th>색신</th>
                            <td>색신이상(약도 색신이상은 제외한다)이 아니어야 한다.</td>
                        </tr>
                        <tr>
                            <th>청력</th>
                            <td>청력이 정상[좌우 각각 40데시벨(dB) 이하의 소리를 들을 수 있는 경우를 말한다]이어야 한다.</td>
                        </tr>
                        <tr>
                            <th>혈압</th>
                            <td>고혈압[수축기혈압이 145수은주밀리미터(mmHg)을 초과하거나 확장기혈압이 90수은주밀리미터(mmHg)을 초과하는 경우를 말한다] <br>
                            또는 저혈압[수축기혈압이 90수은주밀리미터(mmHg) 미만이거나 확장기혈압이 60수은주밀리미터(mmHg) 미만인 경우를 말한다]이 아니어야 한다.</td>
                        </tr>
                        <tr>
                            <th>사시</th>
                            <td>검안기 측정 결과 수평사위 20프리즘 이상이거나 수직사위 10프리즘 이상이 아니어야 한다. <br>
                            다만, 안과전문의의 정상 판단을 받은 경우에는 그러하지 아니하다.</td>
                        </tr>
                        <tr>
                            <th>문신</th>
                            <td>시술동기, 의미 및 크기가 경찰공무원의 명예를 훼손할 수 있다고 판단되는 문신이 없어야 한다</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <h4 class="NGR mt20">체력검사</h4>
            <div class="mt10">
                <strong>2021년도 경찰간부후보생 공개경쟁선발시험(제70기) 체력검사 평가기준</strong><br/>
                - 2021년도 경찰간부후보생 공개경쟁선발시험(제70기)부터는 남녀 통합선발하게 됩니다.<br/>
                - 경찰공무원임용령 시행규칙 제34조의 2가 개정됨에 따라 체력검사 종목 및 체력기준이 변경되오니 확인하시기 바랍니다.
            </div>
            <h5 class="NGR mt10 tx-blue">변경후</h4>
            <div class="mt10">
                ■ 경찰공무원 임용령 시행규칙 [별표 5의3] <신설 2019. 7.2> [시행일 2020. 1. 1.]<br/>
                경찰간부후보생 공개경쟁선발시험 체력검사의 평가기준 및 방법<br/>
                (제34조의2제2항 관련)
            </div>
            <div class="mt10">
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="8%"/>
                        <col />
                    </colgroup>
                    <thead>
                        <tr>
                            <th colspan="2">구분</th>
                            <th>10점</th>
                            <th>9점</th>
                            <th>8점</th>
                            <th>7점</th>
                            <th>6점</th>
                            <th>5점</th>
                            <th>4점</th>
                            <th>3점</th>
                            <th>2점</th>
                            <th>1점</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="5">남자</th>
                            <th>50m달리기
                            (초)</th>
                            <td>7.0
                            이하</td>
                            <td>7.01~
                            7.21</td>
                            <td>7.22~
                            7.42</td>
                            <td>7.43~
                            7.63</td>
                            <td>7.64~
                            7.84</td>
                            <td>7.85~
                            8.05</td>
                            <td>8.06~
                            8.26</td>
                            <td>8.27~
                            8.47</td>
                            <td>8.48~
                            8.68</td>
                            <td>8.69
                            이상</td>
                        </tr>
                        <tr>
                            <th>왕복오래달리기(회)</th>
                            <td>77이상</td>
                            <td>76~72</td>
                            <td>71~67</td>
                            <td>66~62</td>
                            <td>61~57</td>
                            <td>56~52</td>
                            <td>51~47</td>
                            <td>46~41</td>
                            <td>40~35</td>
                            <td>34이하</td>
                        </tr>
                        <tr>
                            <th>윗몸일으키기
                            (회/1분)</th>
                            <td>58
                            이상</td>
                            <td>57~55</td>
                            <td>54~52</td>
                            <td>51~49</td>
                            <td>48~46</td>
                            <td>45~43</td>
                            <td>42~40</td>
                            <td>39~36</td>
                            <td>35~32</td>
                            <td>31
                            이하</td>
                        </tr>
                        <tr>
                            <th>좌우 악력(kg)</th>
                            <td>64이상</td>
                            <td>63~61</td>
                            <td>60~58</td>
                            <td>57~55</td>
                            <td>54~52</td>
                            <td>51~49</td>
                            <td>48~46</td>
                            <td>45~43</td>
                            <td>42~40</td>
                            <td>39이하</td>
                        </tr>
                        <tr>
                            <th>팔굽혀펴기(회/1분)</th>
                            <td>61이상</td>
                            <td>60~56</td>
                            <td>55~51</td>
                            <td>50~46</td>
                            <td>45~40</td>
                            <td>39~34</td>
                            <td>33~28</td>
                            <td>27~22</td>
                            <td>21~16</td>
                            <td>15이하</td>
                        </tr>
                        <tr>
                            <th rowspan="5">여자</th>
                            <th>50m달리기
                            (초)</th>
                            <td>8.23
                            이하</td>
                            <td>8.24~
                            8.47</td>
                            <td>8.48~
                            8.71</td>
                            <td>8.72~
                            8.95</td>
                            <td>8.96~
                            9.19</td>
                            <td>9.20~
                            9.43</td>
                            <td>9.44~
                            9.67</td>
                            <td>9.68~
                            9.91</td>
                            <td>9.92~
                            10.15</td>
                            <td>10.16
                            이상</td>
                        </tr>
                        <tr>
                            <th>왕복오래달리기(회)</th>
                            <td>51이상</td>
                            <td>50~47</td>
                            <td>46~44</td>
                            <td>43~41</td>
                            <td>40~38</td>
                            <td>37~35</td>
                            <td>34~32</td>
                            <td>31~28</td>
                            <td>27~24</td>
                            <td>23이하</td>
                        </tr>
                        <tr>
                            <th>윗몸일으키기
                            (회/1분)</th>
                            <td>55
                            이상</td>
                            <td>54~51</td>
                            <td>50~47</td>
                            <td>46~43</td>
                            <td>42~39</td>
                            <td>38~35</td>
                            <td>34~31</td>
                            <td>30~27</td>
                            <td>26~23</td>
                            <td>22
                            이하</td>
                        </tr>
                        <tr>
                            <th>좌우 악력(kg)</th>
                            <td>44이상</td>
                            <td>43~42</td>
                            <td>41~40</td>
                            <td>39~38</td>
                            <td>37~36</td>
                            <td>35~34</td>
                            <td>33~31</td>
                            <td>30~28</td>
                            <td>27~25</td>
                            <td>24이하</td>
                        </tr>
                        <tr>
                            <th>팔굽혀펴기(회/1분)</th>
                            <td>31이상</td>
                            <td>30~28</td>
                            <td>27~25</td>
                            <td>24~22</td>
                            <td>21~19</td>
                            <td>18~16</td>
                            <td>15~13</td>
                            <td>12~10</td>
                            <td>9~7</td>
                            <td>6이하</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt10">
                * 평가방법<br>
                1. 체력검사의 평가종목 중 1종목이상 1점을 받은 경우에는 불합격으로 한다.<br>
                2. 50미터 달리기의 경우에는 측정된 수치 중 소수점 셋째자리 이하는 버리고, 좌우 악력의 경우에는 소수 첫째자리에서 반올림한다.<br>
                3. 체력검사의 평가종목별 구체적인 측정방법은 경찰청장이 정한다. 
            </div>
            <h4 class="NGR mt20">적성검사</h4>
            <div>
                적성검사는 경찰관으로서의 적격성(인성·적성)에 대한 평가이다. <br>
                경찰공무원으로서의 직무수행에 필요한 적격성 여부와 자질을 종합 검정하는 것으로서 인성검사와 정밀신원조회로 구분하여 실시한다. 
                종합적성검사의 실시 결과에 따른 합격 판정은 해당 시험위원 3분의 2 이상의 찬성에 의한다. <br>
                <span class="tx-blue">기초능력</span> : 직업의 종류에 관계없이 사회인으로서의 기본 능력으로 그 직업에 꼭 필요한 정신적 · 육체적인 능력을 말한다. <br>
                <span class="tx-blue">성격 및 흥미</span> : 기초능력을 가지고 있어도 이를 뒷받침해 주는 차분한 성격 및 그 일에 대한 흥미를 알아보는 것 또한 중요하다. 
            </div>
            <h4 class="NGR mt20">면접시험</h4>
            <div>
                경찰관으로서 직무수행에 필요한 능력, 발전성, 적격성 등 검정 <br>
                평정요소<br>
                - 제1호: 경찰공무원으로서의 적성 (제4차시험 적성검사 점수반영) <br>
                - 제2호: 의사발표의 정확성과 논리성 및 전문지식 <br>
                - 제3호: 용모,품행, 예의 봉사성, 정직성, 성실성, 발전가능성<br>
                - 제4호: 자격증 등 경찰업무관련 특수기술 능력 <br>
                합격자의 결정 : 총점의 4할이상의 득점자<br>
                제1호(적성관련항) 과 제4호(자격증 관련항)을 제외한 제2호와 제3호의 평정점<br>
                <br>
                ※ 면접시험 불합격 기준<br>
                · 면접시험 총점이 4할 미만인 경우<br>
                · 제2호 및 제3호의 평정요소에 대하여 면접위원의 과반수가 1점을 준 경우 
            </div>
            <h4 class="NGR mt20">최종합격자 결정</h4>
            <div>
                <span class="tx-blue">필기시험(50%) + 체력검사(25%) + 면접시험(20%) + 가산점(5%)</span>를 합산한 성적의 고득점 순으로 선발예정인원을 최종합격자로 결정
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop