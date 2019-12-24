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
            <span class="depth-Arrow">></span><strong>최종합격관리</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">최종합격관리</h3>            
            <ul class="guideTab NGR">
                <li><a href="#tab01" class="on">필기합격자 제출서류</a></li>
                <li><a href="#tab02">필기합격자 서류 제출방법</a></li>
            </ul>
            <div id="tab01">
                <h4 class="NGR">필기합격자 제출서류</h4>
                <div>
                    <span class="tx-blue">모든 제출서류는 적성, 신체, 체력 검사시 제출 함</span><Br>
                    단 가산점 대상 자격증 사본은 적성검사종료일 까지 제출가능
                </div>
                <ul class="st01">
                    <li>기본증명서 (동사무소발행) - 1부<Br>
                        * 주민번호 13자리가 정확히 표시된 것</li>
                    <li>가족관계증명서 (동사무소발행-본인명의) - 1부<Br>
                        * 주민번호 13자리가 정확히 표시된 것</li>
                    <li>신원진술서 (붙임 참조) - 4부<Br>
                        * 각 장마다 사진부착, 서명 또는 날인을 반드시 할 것</li>
                    <li>개인신용정보서 (발급기관 붙임 참조) - 2부</li>
                    <li>고등학교 생활기록부 (검정고시 출신자는 중학교 생활기록부) - 2부<Br>
                        * “人秘” 상태로 제출 (개봉 / 人秘처리가 안된 서류는 반려)</li>
                    <li>공무원채용신체검사서 (간이약물검사포함) - 1부<Br>
                        * 청력검사결과는 수치로 기재 (합격기준 : 20db 이하)<Br>
                        * 병원장의 “人秘” 상태로 제출 (개봉 / 人秘처리가 안된 서류는 반려)
                        * 공무원채용신체검사(약물검사 포함)는 2010. 11. 07. 이후에 발행된 것부터 유효함</li>
                    <li>병적증명서 (병적확인용) - 1부<Br>
                        * 현역 복무중인 자는 부대장 발행 전역예정증명서 제출</li>
                    <li>신원조회서 (지문대조표 - 붙양식임 참조) - 1부<Br>
                        * 경찰관서에서 우수무지 지문 채취 후 우측상단에 채취 경찰관의 확인 날인</li>
                    <li>최종학력증명서 (졸업, 휴학, 재학, 제적 포함) - 1부</li>
                    <li>자기소개서 (붙임 참조) - 1부</li>
                    <li>제출서류 목록표 (붙임양식 참조) - 1부</li>
                    <li>가산점 대상 자격증 사본 - 각1부<Br>
                        * A4용지 1장에 자격증 1개만 복사 (ex 자격증이 2개이면 A4용지 2장 제출)<Br>
                        * 3.25까지 제출한 것만 인정 단, 외국어분야는 ’09. 4. 22 이후 취득한 성적표만 인정</li>
                    <li>표창장, 감사장 사본 (해당자에 한함) - 1부<Br>
                        * 중요범인 검거 등을 통해 경찰관서장의 상훈을 수상한 경력이 있는 자</li>
                    <li>취업보호대상자 증명서 (보훈처장 발행, 해당자에 한함) - 1부</li>
                </ul> 
                <div class="tx-red mt10">
                    제출서류 매장 하단에 응시번호 및 성명 기재 (例 10123 홍길동)<Br>
                    단, 인비서류(생활기록부, 신체검사서)는 봉투 겉면에 기재
                </div>
            </div>

            <div id="tab02">
                <h4 class="NGR">2011년 1차 채용 필기합격자 제출서류 내용정리</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="18%"/>
                            <col />
                            <col />
                            <col />
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>기본증명서</th>
                                <td>동사무소 발행</td>
                                <td>1부</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>가족관계증명서</th>
                                <td>동사무소 - 본의명의</td>
                                <td>1부</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>신원진술서</th>
                                <td>-</td>
                                <td>1부</td>
                                <td>워드 적성 후 출력 후 양면복사, 각 장마다 사직부착, 서명 또는 날인 반드시 할 것.</td>
                            </tr>
                            <tr>
                                <th>개인신용 정보서</th>
                                <td>-</td>
                                <td>1부</td>
                                <td>* 발급절차 * <br />
                                (은행연합회 : Internet 및 직접방문 / 신용정보사업자 (법인) : Internet)<br />
                                인터넷 발급시 &ldquo;공인인증서&rdquo;가 필요합니다.
                                <table cellspacing="0" cellpadding="0" class="table-Guided">
                                    <tbody>
                                    <tr>
                                        <th>은행연합회</th>
                                        <td><a href="http://www.credit4u.or.kr/" target="_blank">www.credit4u.or.kr</a></td>
                                        <td>-</td>
                                        <td>흑백<br />
                                        가능</td>
                                    </tr>
                                    <tr>
                                        <th>한국신용정보</th>
                                        <td><a href="http://www.mycredit.co.kr/" target="_blank">www.mycredit.co.kr</a></td>
                                        <td>1588-2486</td>
                                        <td rowspan="4">반드시<br />
                                        칼라<br />
                                        출력</td>
                                    </tr>
                                    <tr>
                                        <th>서울신용평가정보</th>
                                        <td><a href="http://www.siren24.com/" target="_blank">www.siren24.com</a></td>
                                        <td>02)3445-5000</td>
                                    </tr>
                                    <tr>
                                        <th>한국신용평가정보</th>
                                        <td><a href="http://www.creditbank.co.kr/" target="_blank">www.creditbank.co.kr</a></td>
                                        <td>02)3771-1000</td>
                                    </tr>
                                    <tr>
                                        <th>(주)한국개인신용</th>
                                        <td><a href="http://www.allcredit.co.kr/" target="_blank">www.allcredit.co.kr</a></td>
                                        <td>02)*708-1000</td>
                                    </tr>
                                    </tbody>
                                </table></td>
                            </tr>
                            <tr>
                                <th>고등학교 생활기록부</th>
                                <td>가까운 초등,중등,고등학교<br />
                                (필히 인비처리)</td>
                                <td>1부</td>
                                <td>추가 1부 발행하여 기록내용 인지요망</td>
                            </tr>
                            <tr>
                                <th>공무원 채용<br />
                                신체검사서</th>
                                <td>가까운 종합병원<br />
                                인비상태처리(병원장발행)</td>
                                <td>1부</td>
                                <td> 간 이 약 물 검 사 포 함 + 청 력 검 사 결 과 수 치 기 재<br />
                                (합격기준 : 20db 이하)
                                <table cellspacing="0" cellpadding="0" class="table-Guided">
                                    <tbody>
                                    <tr>
                                        <th> 구분</th>
                                        <th>검사<br />
                                        비용</th>
                                        <th>간이약물<br />
                                        검사기간</th>
                                        <th>업무시간</th>
                                        <th>준비물</th>
                                        <th>문의<br />
                                        전화</th>
                                    </tr>
                                    <tr>
                                        <th>보라매병원</th>
                                        <td>45,260원</td>
                                        <td>2일</td>
                                        <td>10~16시<br />
                                        (중식12~13시)</td>
                                        <td>신분증</td>
                                        <td>02)870-3333~4</td>
                                    </tr>
                                    <tr>
                                        <th>대방성애병원</th>
                                        <td>50,000원</td>
                                        <td>2~3일</td>
                                        <td>10~16시<br />
                                        (중식12:30~13:30)</td>
                                        <td>신분증</td>
                                        <td>02)840-7121</td>
                                    </tr>
                                    <tr>
                                        <th>중앙대병원</th>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">9시간 금식 - 과음, 과로 절대금지, 약복용금지(감기약 등)</td>
                                    </tr>
                                    </tbody>
                                </table></td>
                            </tr>
                            <tr>
                                <th>병적증명서</th>
                                <td>병무청 및 동사무소<br />
                                (Fax신청)</td>
                                <td>1부</td>
                                <td>현역 복무중인 자는 부대장 발행 전역예정증명서 제출</td>
                            </tr>
                            <tr>
                                <th>신원조회서</th>
                                <td>경찰관서<br />
                                (경찰서 및 지구대)</td>
                                <td>1부</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>최종학력증명서</th>
                                <td>출신학교 및 동사무소<br />
                                (Fax신청)</td>
                                <td>1부</td>
                                <td>*졸업, *휴학, *재학, *제적</td>
                            </tr>
                            <tr>
                                <th>자기소개서</th>
                                <td>-</td>
                                <td>1부</td>
                                <td>워드 작성 후 양면복사 4장 =&gt;사진부착 및  필히 서명날인</td>
                            </tr>
                            <tr>
                                <th>제출서류 목록표</th>
                                <td>-</td>
                                <td>1부</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>가산점 대상  자격증</th>
                                <td>-</td>
                                <td>각 1부</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>표창장 / 감사장 사본</th>
                                <td>-</td>
                                <td>1부</td>
                                <td>해당자에 한함<br />
                                (*중요범인 검거 등을 통해 경찰관서장의 상훈을 수강한 경력이 있는자)</td>
                            </tr>
                            <tr>
                                <th>취업보호대상자 증명서</th>
                                <td>보훈처장 발행</td>
                                <td>1부</td>
                                <td>해당자에 한함</td>
                            </tr>
                        </tbody>
                    </table>
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