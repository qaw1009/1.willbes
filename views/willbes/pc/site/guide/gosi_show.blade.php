@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Leclist c_both">
                <div class="w-gosi-Guide">
                    <div class="willbes-gosi-guide GM">
                        <ul class="tabShow tabcsDepth2 tab_gosi_Guide p_re NG">
                            <li class="w-gosi-guide1"><a class="qBox two on" href="#gosi_guide1"><span>공무원채용<br/>시험종류</span></a></li>
                            <li class="w-gosi-guide2"><a class="qBox two" href="#gosi_guide2"><span>직렬별<br/>채용제도</span></a></li>
                            <li class="w-gosi-guide3"><a class="qBox two" href="#gosi_guide3"><span>국가직vs지방직<br/>vs서울시</span></a></li>
                            <li class="w-gosi-guide4"><a class="qBox" href="#gosi_guide4"><span>공무원이 하는일</span></a></li>
                            <li class="w-gosi-guide5"><a class="qBox" href="#gosi_guide5"><span>조정점수제도</span></a></li>
                            <li class="w-gosi-guide6"><a class="qBox" href="#gosi_guide6"><span>시험자격요건</span></a></li>
                            <li class="w-gosi-guide7"><a class="qBox" href="#gosi_guide7"><span>가산점제도</span></a></li>
                            <li class="w-gosi-guide8"><a class="qBox" href="#gosi_guide8"><span>시험과목</span></a></li>
                        </ul>
                        <div class="tabBox mt30">
                            <div id="gosi_guide1" class="tabContent">
                                <div class="examInfoGu3">
                                    <h4 class="hTy4 hTy">응시연령</h4>
                                    <div class="mgB3">
                                        <table class="basicTb basicWd basicWd1">
                                            <colgroup>
                                                <col width="15%">
                                                <col width="*">
                                                <col width="*">
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th>구분</th>
                                                <th>공개경쟁채용 시험</th>
                                                <th>경력경쟁채용 시험</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>세부설명</th>
                                                <td class="txtL">
                                                    <ul>
                                                        <li>
                                                            특별한 학력 · 경력 등에 관계없이 국가공무원으로<br/>
                                                            임용되기를 원하는 모든 국민들에게 동일한 조건<br/>
                                                            의 응시 기회를 부여하고 공정한 공개경쟁을 통해<br/>
                                                            상대적 우수자를 선발하는 시험
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="txtL">
                                                    <ul>
                                                        <li>
                                                            행정수요가 복잡해짐에 따라 공개경쟁채용 시험으로<br/>
                                                            충원하기 곤란한 특수 분야의 전문인력을 확보하기<br/>
                                                            위해 일정 자격요건<span class="tx-origin-red">(임용예정분야의 관련학위,자격증,<br/>
                                                            경력등)</span>을 갖춘 지원자를 대상으로 경쟁을 통해 상대적<br/>
                                                            우수자를 선발하는 시험
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>종류</th>
                                                <td class="txtL">
                                                    <ul>
                                                        <li>
                                                            5급 공개경쟁채용시험(행정, 기술)<br/>
                                                            <span class="tx-origin-red">* 14년부터 5등외무직 공채는 폐지, 외교관후보자<br/>
                                                            선발 시험으로 대체</span><br/>
                                                        </li>
                                                        <li>
                                                            7급 및 9급 공개경쟁채용 시험
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="txtL">
                                                    <ul>
                                                        <li>
                                                            자격증, 학위, 근무경력 등<br/>
                                                            13가지의 자격요건별 경력경쟁채용
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>시험실시기관</th>
                                                <td class="txtL">
                                                    <ul>
                                                        <li>
                                                            주로 인사혁신처가 실시<br/>
                                                            <span class="tx-origin-red">* 부처 요구에 따라 공채대상 직렬추가 가능</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="txtL">
                                                    <ul>
                                                        <li>
                                                            대부분 각 부처 장관이 실시<br/>
                                                        <li>
                                                        <li>
                                                            5 · 7급 민간 경력자 일괄채용 시험, 중증장애인 경력<br/>
                                                            경쟁채용 시험은 인사혁신처 주관으로 실시
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="gosi_guide2" class="tabContent">
                                <div class="examInfoGu3">
                                    <div class="sliderGuide cSliderTM">
                                        <div class="sliderControlsTM">
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">9급 공개경쟁채용시험</h4>
                                                <h5 class="hTy5 hTy txt-gray">2017 국가공무원 채용시험 기준 <span>(지방직은 각 지역에 따라 내용이 상이하니 각 지역별 채용공고를 참고해 주시기 바랍니다)</span></h5>
                                                <img class="agM" src="{{ img_url('gosi/guide/guide_public_c1.jpg') }}">
                                                <h5 class="hTy6 hTy txt-red center">교정직 및 철도공안직 6급 이하 채용시험의 경우 필기시험 합격자를 대상으로 실기시험(체력검사)을 실시하고, 실기시험 합격자에 한하여 면접시험 실시</h5>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">7급 공개경쟁채용시험</h4>
                                                <h5 class="hTy5 hTy txt-gray">2017 국가공무원 채용시험 기준 <span>(지방직은 각 지역에 따라 내용이 상이하니 각 지역별 채용공고를 참고해 주시기 바랍니다)</span></h5>
                                                <img class="agM" src="{{ img_url('gosi/guide/guide_public_c2.jpg') }}">
                                                <h5 class="hTy6 hTy txt-red center">교정직 및 철도공안직 6급 이하 채용시험의 경우 필기시험 합격자를 대상으로 실기시험(체력검사)을 실시하고, 실기시험 합격자에 한하여 면접시험 실시</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="gosi_guide3" class="tabContent">
                                <div class="examInfoGu3">
                                    <div class="sliderGuide cSliderTM">
                                        <div class="sliderControlsTM">
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">9급 공개경쟁채용시험</h4>
                                                <div class="mgB3">
                                                    <table class="basicTb basicWd">
                                                        <colgroup>
                                                            <col width="20%">
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                        </colgroup>
                                                        <thead>
                                                        <tr>
                                                            <th>구분</th>
                                                            <th>국가직</th>
                                                            <th>지방직</th>
                                                            <th>서울시</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th>시행처</th>
                                                            <th>인사혁신처</th>
                                                            <th>각 지방자치단체</th>
                                                            <th>서울시</th>
                                                        </tr>
                                                        <tr>
                                                            <th>시험공고시기</th>
                                                            <th>매년 1월 1일</th>
                                                            <th>각 지방자치단체 별도 공고</th>
                                                            <th>매년 2월중</th>
                                                        </tr>
                                                        <tr>
                                                            <th>거주지제한</th>
                                                            <th>X</th>
                                                            <th>O</th>
                                                            <th>X</th>
                                                        </tr>
                                                        <tr>
                                                            <th>필기시험일시</th>
                                                            <th>4월중</th>
                                                            <th>5~6월중</th>
                                                            <th>6월중</th>
                                                        </tr>
                                                        <tr>
                                                            <th>시험출제기관</th>
                                                            <th>인사혁신처</th>
                                                            <th>인사혁신처</th>
                                                            <th>서울시</th>
                                                        </tr>
                                                        <tr>
                                                            <th>필기시험방법</th>
                                                            <th class="tx-origin-red" colspan="3">4지 1택형 / 5과목 각 객관식 20문항 (총 100분) / 각 과목당 100점 만점</th>
                                                        </tr>
                                                        <tr>
                                                            <th>면접</th>
                                                            <th>인사혁신처</th>
                                                            <th>각 지방 자치단체</th>
                                                            <th>서울시</th>
                                                        </tr>
                                                        <tr>
                                                            <th>근무처</th>
                                                            <th>중앙부처 OR중앙부처 하급기관</th>
                                                            <th>각 지방자치단체 하급기관</th>
                                                            <th>서울시 자치단체</th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">7급 공개경쟁채용시험</h4>
                                                <div class="mgB3">
                                                    <table class="basicTb basicWd">
                                                        <colgroup>
                                                            <col width="20%">
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                        </colgroup>
                                                        <thead>
                                                        <tr>
                                                            <th>구분</th>
                                                            <th>국가직</th>
                                                            <th>지방직</th>
                                                            <th>서울시</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th>시행처</th>
                                                            <th>인사혁신처</th>
                                                            <th>각 지방자치단체</th>
                                                            <th>서울시</th>
                                                        </tr>
                                                        <tr>
                                                            <th>시험공고시기</th>
                                                            <th>매년 1월 1일</th>
                                                            <th>각 지방자치단체 별도 공고</th>
                                                            <th>매년 2월중</th>
                                                        </tr>
                                                        <tr>
                                                            <th>거주지제한</th>
                                                            <th>X</th>
                                                            <th>O</th>
                                                            <th>X</th>
                                                        </tr>
                                                        <tr>
                                                            <th>필기시험일시</th>
                                                            <th>8월중</th>
                                                            <th>10월중</th>
                                                            <th>6월중</th>
                                                        </tr>
                                                        <tr>
                                                            <th>시험출제기관</th>
                                                            <th>인사혁신처</th>
                                                            <th>인사혁신처</th>
                                                            <th>서울시</th>
                                                        </tr>
                                                        <tr>
                                                            <th>필기시험방법</th>
                                                            <th class="tx-origin-red" colspan="3">
                                                                4지 1택형 / 5과목 각 객관식 20문항 (총 100분) / 각 과목당 100점 만점<br/>
                                                                국가직의 경우 공인 영어 성적 대체로 인하여 6과목 각 객관식 20문항 (총 120분)
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>면접</th>
                                                            <th>인사혁신처</th>
                                                            <th>각 지방 자치단체</th>
                                                            <th>서울시</th>
                                                        </tr>
                                                        <tr>
                                                            <th>근무처</th>
                                                            <th>중앙부처 OR중앙부처 하급기관</th>
                                                            <th>각 지방자치단체 하급기관</th>
                                                            <th>서울시 자치단체</th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="gosi_guide4" class="tabContent">
                                <div class="examInfoGu3">
                                    <h4 class="hTy4 hTy">공무원이 하는일</h4>
                                    <h5 class="hTy5 hTy txt-gray">공무원 직렬(직류)은 예시로 나와있는 행정,세무,관세 등 이외에도 다른 직렬(직류)들이 있으니 자세한 내용은 공무원임용시험령 및 시험공고문을 확인하시기 바랍니다.</h5>
                                    <div class="mgB3">
                                        <table class="basicTb basicWd">
                                            <colgroup>
                                                <col width="20%">
                                                <col width="*">
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th>직렬</th>
                                                <th>직무</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th><strong>행정</strong>(일반행정)</th>
                                                <td>정책기획 및 조사, 정책의 집행 및 평가, 대민행정 등 국가 행정 업무 전반을 담당</td>
                                            </tr>
                                            <tr>
                                                <th><strong>행정</strong>(교육행정)</th>
                                                <td>교육에 관련된 각종 정책 수립 및 교육기관 운영 및 재정에 관한 정책 수립 및 지원</td>
                                            </tr>
                                            <tr>
                                                <th><strong>행정</strong>(회계)</th>
                                                <td>결산조정분개, 원가 계산 및 확정, 결산보고서 작성 등</td>
                                            </tr>
                                            <tr>
                                                <th><strong>세무</strong></th>
                                                <td>내국세의 부과 및 감면 징수, 국세심사청구에 대한 심판 등에 대한 업무</td>
                                            </tr>
                                            <tr>
                                                <th><strong>관세</strong></th>
                                                <td>수출 · 입 물품의 통관 및 밀수 단속 · 조세범칙 사건의 조사 및 심리 등</td>
                                            </tr>
                                            <tr>
                                                <th><strong>공업</strong>(일반기계)</th>
                                                <td>수도 · 위생설비 · 계량기 등 각종 기계기구 · 기계설비에 관한 기술 업무</td>
                                            </tr>
                                            <tr>
                                                <th><strong>공업</strong>(전기)</th>
                                                <td>전력시설 · 전기공사 · 전기기기 · 전기용품 등의 전기기술 분야 업무</td>
                                            </tr>
                                            <tr>
                                                <th><strong>농업</strong>(일반농업)</th>
                                                <td>식량증산, 비료제조, 채소 등 각종 농산물 생산 및 검사</td>
                                            </tr>
                                            <tr>
                                                <th><strong>보건</strong></th>
                                                <td>전염병 예방을 위한 국내외 출입국 선박 및 항공기 대상  검역 업무</td>
                                            </tr>
                                            <tr>
                                                <th><strong>시설</strong>(일반토목)</th>
                                                <td>농지개량 및 농지확대를 위한 조사 · 계획 · 설계 · 측량 제도와 공사 · 시공</td>
                                            </tr>
                                            <tr>
                                                <th><strong>우정</strong>(계리)</th>
                                                <td>우체국 금융 · 회계 · 현업창구 업무 등 각종 계산관리 업무 및 우편통계 관련 업무</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="gosi_guide5" class="tabContent">
                                <div class="examInfoGu3">
                                    <h4 class="hTy4 hTy">조정점수 제도</h4>
                                    <div class="mgB3 tx-center">
                                        <img src="{{ img_url('gosi/guide/guide_public_c3.jpg') }}">
                                    </div>
                                </div>
                            </div>
                            <div id="gosi_guide6" class="tabContent">
                                <div class="examInfoGu3">
                                    <div class="sliderGuide cSliderTM">
                                        <div class="sliderControlsTM">
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">한눈에 보는 시험 자격 요건</h4>
                                                <img class="agM" src="{{ img_url('gosi/guide/guide_public_c4.jpg') }}">
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">행정안전부(인사혁신처)소속 국가공무원</h4>
                                                <div class="mgBox NG mt-zero">
                                                    <div class="tt">국적</div>
                                                    <ul class="ttx">
                                                        <li>
                                                            <span class="st tx-origin-red">원칙 : </span>
                                                            <span>원칙적으로 대한민국 국적을 가져야만 공무원으로 임용될 수 있음</span>
                                                        </li>
                                                        <li>
                                                            <div class="st tx-origin-red">외국인</div>
                                                            <div>
                                                                - 국가공무원법 제 26조의 3, 공무원 임용령 제4조 등 법령에서 외국인을 공무원으로 임용할 수 있도록 규정한 경우에 한해 전문경력관, 임기제 공무원 등으로 임용할 수 있음
                                                            </div>
                                                        <li>
                                                            <div class="st tx-origin-red">재외동포</div>
                                                            <div>
                                                                - 외국의 영주권을 획득한 재외동포는 원칙적으로 공무원으로 임용될 수 있으나, 주민등록상 거주지 제한규정을 두는 채용시험<br/>
                                                                &nbsp; <span class="tx-green">(9급 공채, 지역별 구분모집)</span>의 경우에는 국내 거소가 신고된 재외국민에 한하여 응시자격이 부여됨<br/>
                                                                - 재외동포가 그 나라의 국적 · 시민권을 획득한 경우에는 외국인에 준하여 공무원 임용자격이 제한됨
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="st tx-origin-red">복수국적자</div>
                                                            <div>
                                                                - 국적법에 의한 복수국적자<span class="tx-green">(대한민국 국적과 외국 국적을 함께 가진 사람)</span>도 원칙적으로 공무원 임용이 가능하나, 국가안보 등 일부 분야에서 임용이 불가함<br/>
                                                                - 국적법에 의해 대한민국 국적을 상실할 경우에는 공무원 임용자격이 제한됨
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mgBox NG">
                                                    <div class="tt">학력 및 경력</div>
                                                    <div class="ttx">
                                                        공개경쟁채용시험 <span class="tx-green">(외교관후보자 선발시험의 일반외교 분야 포함)</span>은 <span class="tx-origin-red">학력이나 경력에 관계없이 누구라도 응시</span>할 수 있음
                                                    </div>
                                                </div>
                                                <div class="mgBox NG">
                                                    <div class="tt">응시연령</div>
                                                    <div class="ttx">
                                                        <ul>
                                                            <li>
                                                                공무원 채용시험에 응시하고자 하는 자는 최종시험 시행 예정일이 속한 연도에 다음의 구분에 따른 응시연령에 해당되어야 함<br/>
                                                                <span class="tx-green">- 9급 공개경쟁채용시험 중 교정 · 보호직 : 20세 이상(2018년의 경우, 1998.12.31 이전 출생자)</span><br/>
                                                                <span class="tx-green">- 9급 공개경쟁채용시험 : 18세 이상(2018년의 경우, 2000.12.31 이전 출생자)</span><br/>
                                                                <span class="tx-green">- 7급 공개경쟁채용시험 : 20세 이상(2018년의 경우, 1998.12.31 이전 출생자)</span><br/>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="mgBox NG">
                                                    <div class="tt">응시 결격사유</div>
                                                    <dl class="ttx mb15">
                                                        <dt>국가공무원법 제 33조(외무공무원은 외무공무원법 제9조, 검찰직 공무원은 검찰청법 제50조)의 임용 결격사유에 해당하는 자</dt>
                                                        <dt>국가공무원법 제74조(정년), 외무공무원법 제27조(정년)에 해당하는 자</dt>
                                                        <dt>공무원임용시험령 등 관계법령에 의해 응시자격이 정지된 자</dt>
                                                    </dl>
                                                    <div class="tx-origin-red pl10">TIP : 기소유예, 구류, 벌금, 과태료, 범칙금 군 복무 중 영창, 본인이 아닌 가족 등의 전과, 신용불량, 세금체납, 의가사제대, 현역 부적합 판정 개인회생절차 중인 자 등은 응시 결격사유에 해당하지 않음</div>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">행정안전부(인사혁신처)소속 국가공무원</h4>
                                                <h5 class="hTy6 hTy txt-red right pr45">기타 일부건은 인사혁신처(행정안전부)와 동일합니다.</h5>
                                                <div class="mgBox NG mt-zero">
                                                    <div class="tt">응시자격</div>
                                                    <dl class="ttx">
                                                        <dt>응시연령 : 최종시험예정일이 속한 연도에 8 · 9급은 18세 이상</dt>
                                                        <dt>거주지 제한 : 필요 시 일정기간 거주한 자로 제한</dt>
                                                    </dl>
                                                </div>
                                                <div class="mgBox NG">
                                                    <div class="tt">거주지 요건</div>
                                                    <ul class="ttx mb15">
                                                        <li>
                                                            임용권자는 연고지 임용 기타 지역적 특수성을 고려하여 그 응시자격을 일정한 지역에서 일정한 기간 동안 거주한 자로 지역 제한<br/>
                                                            - 서울시를 제외한 16개 시 · 도의 시험에서 응시자격 요건으로 당해 지역에 주민등록상 주소지 및 등록기준지(舊 본적지)로 제한
                                                        </li>
                                                        <li>
                                                            거주지 제한 필요시 일정기간 거주한 자로 제한<br/>
                                                            ① 시험 응시하는 해 이전부터 최종 시험일까지 응시 지역에 주민등록상 주소지를 갖고 있거나<br/>
                                                            ② 시험 응시하는 해 이전까지 해당 응시지역의 주민등록상 주소지를 두고있는 기간을 합산하여 총 3년 이상인 사람
                                                        </li>
                                                    </ul>
                                                    <div class="tx-origin-red pl10">위 ① 또는 ②중 하나의 요건을 충족하면 응시 가능</div>
                                                </div>
                                                <div class="mgBox NG">
                                                    <div class="tt">재외국민(영주권자) 응시가능</div>
                                                    <dl class="ttx">
                                                        <dt>관계기관 의견수렴을 거쳐 국내 거주 재외국민(영주권자)에게도 7 · 9급 공채시험의 응시자격 부여<br/></dt>
                                                        <dt>주민등록 또는 국내거소신고(재외국민에 한함)가 <span class="tx-origin-red">위 거주지 요건 ① 또는 ②중 하나의 요건을 충족하면 응시</span> 가능</dt>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="gosi_guide7" class="tabContent">
                                <div class="examInfoGu3">
                                    <div class="sliderGuide cSliderTM">
                                        <div class="sliderControlsTM">
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">가산점 적용대상자 및 가산점 비율</h4>
                                                <div class="mgB3">
                                                    <table class="basicTb basicWd basicWd1">
                                                        <colgroup>
                                                            <col width="30%">
                                                            <col width="30%">
                                                            <col width="40%">
                                                        </colgroup>
                                                        <thead>
                                                        <tr>
                                                            <th>구분</th>
                                                            <th>가산비율</th>
                                                            <th>비고</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th>취업지원대상자</th>
                                                            <th>과목별 만점의 10% 또는 5%</th>
                                                            <td class="txtL" rowspan="3">
                                                                <ul>
                                                                    <li>
                                                                        취업지원대상자 가점과 의사상자 등<br/>
                                                                        가점은 1개만 적용
                                                                    </li>
                                                                    <li>
                                                                        취업지원대상자/ 의사상자 등 가점과<br/>
                                                                        자격증 가산점은 각각 적용
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                취업지원대상자<br/>
                                                                <span class="tx-green">(의사자 유족, 의상자 본인 및 가족)</span>
                                                            </th>
                                                            <th>과목별 만점의 5% 또는 3%</th>
                                                        </tr>
                                                        <tr>
                                                            <th>직렬별 가산대상 자격증 소지자</th>
                                                            <th>
                                                                과목별 만점의 3~5%<br/>
                                                                <span class="tx-green">(1개의 자격증만 인정)</span>
                                                            </th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <h5 class="hTy6 hTy txt-red left pl45"><span>국가직의 경우, 직렬 공통으로 적용되었던 통신 · 정보처리 및 사무관리분야 자격증 가산점은 2017년부터 폐지</span></h5>
                                                <h4 class="hTy4 hTy mt50">취업지원대상자 및 의사상자 등</h4>
                                                <div class="mgBox NG">
                                                    <div class="ttx">
                                                        <ul>
                                                            <li>
                                                                독립유공자예우에 관한 법률 제16조, 국가유공자 등 예우 및 지원에 관한 법률 제 29조, 보훈보상대상자 지원에 관한 법률 제33조, 5·18민주
                                                                유공자 예우에 관한 법률 제20조, 특수임무유공자 예우 및 단체설립에 관한 법률 제19조에 의한 취업지원대상자, 고엽제 후유의증 등 환자지원
                                                                및 단체설립에 관한 법률 제7조의 9에 의한 고엽제 후유의증환자와 그 가족 및 국가공무원법 제36조의 2에 의한 의사자 유족, 의사자 본인 및
                                                                가족은 각 과목별 득점에 위 표에서 정한 가산비율에 해당하는 점수를 가산합니다.
                                                            </li>
                                                            <li>취업지원대상자 및 의사상자 등 가점은 각 과목 만점의 40%이상 득점한 자에 한하여, 각 과목별 득점에 각 과목별 만점의 일정비율(10%,5%,3%)에 해당하는 점수를 가산합니다.</li>
                                                            <li>국가유공자 5·18민주 유공자, 특수임무유공자 등 취업지원대상자 가점을 받아 합격하는 사람은 선발예정인원의 30%(의사상자 등 가점의경우 10%)를 초과할 수 없습니다. 다만, 응시인원이 선발예정인원과 같거나 그보다 적은 경우에는 그러하지 않습니다.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">직렬별 가산대상 자격증 소지자</h4>
                                                <div class="mgBox NG mt-zero">
                                                    <div class="tt">행정직</div>
                                                    <div class="ttx">
                                                        <div class="st tx-origin-red mb15">각 과목 만점의 40% 이상 득점한 자에 한하여 각 과목별 득점에 각 과목별 만점의 5% 가산</div>
                                                        <div>
                                                            - 행정직(일반행정-선거행정) : 변호사, 변리사 / 행정직(교육행정) : 변호사 / 행정직(회계) : 공인회계사 <br/>
                                                            &nbsp;/ 행정직(고용노동) : 변호사, 공인노무사, 직업상담사 1급, 직업상담사 2급 <span class="st tx-origin-red">(단, 7급은 3% 가산)</span><br/>
                                                            - 직업상담직 : 변호사, 공인노무사, 직업상담사 1급, 직업상담사 2급 <span class="st tx-origin-red">(단,7급은 3%가산)</span><br/>
                                                            - 세무직 : 변호사, 공인회계사, 세무사<br/>
                                                            - 관세직 : 변호사, 공인회계사, 관세사<br/>
                                                            - 감사직 : 변호사, 공인회계사, 감정평가사, 세무사<br/>
                                                            - 교정직 · 보호직 · 철도경찰직 : 변호사, 법무사<br/>
                                                            - 통계직 : 사회조사분석사 1급, 사회조사분석사 2급 <span class="st tx-origin-red">(단,7급은 3%가산)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mgBox mgBox-none NG">
                                                    <div class="tt">기술직</div>
                                                    <div class="ttx">
                                                        국가기술자격법령 또는 그 밖의 법령에서 정한 자격증 소지자가 해당 분야(전산직 제외)에 응시할 경우<br/>
                                                        각 과목 만점의 40% 이상 득점한 자에 한하여 각 과목별 득점에 각 과목별 만점의 일정비율에 해당하는 점수를 가산합니다.<br/><br/>
                                                    </div>
                                                    <div class="mgB3 GM">
                                                        <table class="basicTb basicWd1">
                                                            <colgroup>
                                                                <col width="12%">
                                                                <col width="22%">
                                                                <col width="22%">
                                                                <col width="22%">
                                                                <col width="22%">
                                                            </colgroup>
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">구분</th>
                                                                <th colspan="2">7급</th>
                                                                <th colspan="2">9급</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="bg-white">
                                                                    기술사, 기능장, 기사<br/>
                                                                    <span class="tx-green">[시설직(건축)의<br/>
                                                                    건축사 포함]
                                                                    </span>
                                                                </th>
                                                                <th class="bg-white">산업기사</th>
                                                                <th class="bg-white">
                                                                    기술사, 기능장, 기사,<br/>
                                                                    산업기사<br/>
                                                                    <span class="tx-green">[시설직 (건축)의<br/> 건축사 포함]</span>
                                                                </th>
                                                                <th class="bg-white">
                                                                    기능사<br/>
                                                                    <span class="tx-green">[농업직(일반농업)의<br/>
                                                                    농산물품질관리사 포함]</span>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <th class="bg-white tx-red">가점비율</th>
                                                                <th class="bg-white tx-red">5%</th>
                                                                <th class="bg-white tx-red">3%</th>
                                                                <th class="bg-white tx-red">5%</th>
                                                                <th class="bg-white tx-red">3%</th>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">직렬별 가산대상 자격증 소지자</h4>
                                                <div class="mgBox mgBox-none NG mt-zero">
                                                    <div class="tt">서울시/지방직 자격증 소지자 가산 특전</div>
                                                    <h5 class="hTy6 hTy txt-red right"><span>국가직은 2017.1.1부터 정보화자격증 가산점 폐지</span></h5>
                                                    <div class="mgB3 GM">
                                                        <table class="basicTb basicWd1">
                                                            <colgroup>
                                                                <col width="20%">
                                                                <col width="*">
                                                                <col width="*">
                                                            </colgroup>
                                                            <thead>
                                                            <tr>
                                                                <th class="" rowspan="2">구분</th>
                                                                <th class="" colspan="2">자격증 등급별 가산비율</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="tx-red">1%</th>
                                                                <th class="tx-red">0.5%</th>
                                                            </tr>
                                                            <tr>
                                                                <th>7급</th>
                                                                <td class="bg-white">
                                                                    정보관리기술사, 컴퓨터시스템응용기술사<br/>
                                                                    정보처리기사, 전자계산기조직응용기사<br/>
                                                                    컴퓨터활용능력 1급
                                                                </td>
                                                                <td class="bg-white">
                                                                    사무자동화산업기사, 정보처리산업기사<br/>
                                                                    전자계산기제어산업기사, 워드프로세서<br/>
                                                                    컴퓨터활용능력 2급
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>9급</th>
                                                                <td class="bg-white">
                                                                    정보관리기술사, 컴퓨터시스템응용기술사<br/>
                                                                    정보처리기사, 전자계산기조직응용기사<br/>
                                                                    사무자동화산업기사, 정보처리산업기사<br/><br/>

                                                                    전자계산기제어산업기사, 컴퓨터활용능력 1급
                                                                </td>
                                                                <td class="bg-white">
                                                                    정보기기운용기능사, 정보처리기능사<br/>
                                                                    워드프로세서, 컴퓨터활용능력 2급
                                                                </td>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="gosi_guide8" class="tabContent">
                                <div class="examInfoGu3">
                                    <div class="sliderGuide cSliderTM">
                                        <div class="sliderControlsTM">
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">9급 시험과목</h4>
                                                <div class="mgB3">
                                                    <table class="basicTb basicWd">
                                                        <colgroup>
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                        </colgroup>
                                                        <thead>
                                                        <tr>
                                                            <th>직렬(직류)</th>
                                                            <th>필수과목(3)</th>
                                                            <th>선택과목(택2)</th>
                                                            <th>주요근무 예정기관(예시)</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th>행정직 (일반행정)</th>
                                                            <th class="tx-origin-red" rowspan="3">
                                                                국어<br/>
                                                                영어<br/>
                                                                한국사
                                                            </th>
                                                            <th>행정법총론, 행정학개론, 사회, 과학, 수학</th>
                                                            <th>전부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>행정직 (고용노동)</th>
                                                            <th>노동법개론, 행정법총론, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>고용노동부</th>
                                                        </tr>
                                                        <tr>
                                                            <th>행정직 (교육행정)</th>
                                                            <th>교육학개론, 행정법총론, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>교육부</th>
                                                        </tr>
                                                        <tr>
                                                            <th>행정직 (선거행정)</th>
                                                            <th class="tx-origin-red" colspan="2">필수(4) : 국어,영어,한국사,공직선거법 선택(1) : 행정법총론, 형법</th>
                                                            <th>중앙선거관리위원회</th>
                                                        </tr>
                                                        <tr>
                                                            <th>직업상담직 (직업상담)</th>
                                                            <th class="tx-origin-red" rowspan="10">
                                                                국어<br/>
                                                                영어<br/>
                                                                한국사
                                                            </th>
                                                            <th>노동법개론, 직업상담, 심리학개론, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>고용노동부</th>
                                                        </tr>
                                                        <tr>
                                                            <th>세무직 (세무)</th>
                                                            <th>세법개론, 회계학, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>국세청</th>
                                                        </tr>
                                                        <tr>
                                                            <th>관세직 (관세)</th>
                                                            <th>관세법개론, 회계원리, 사회,과학, 수학, 행정학개론</th>
                                                            <th>관세청</th>
                                                        </tr>
                                                        <tr>
                                                            <th>통계직 (통계)</th>
                                                            <th>통계학개론, 경제학개론, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>통계청, 그밖의 수요부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>교정직 (교정)</th>
                                                            <th>교정학개론, 형사소송법개론, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>법무부</th>
                                                        </tr>
                                                        <tr>
                                                            <th>보호직 (보호)</th>
                                                            <th>형사소송법개론, 사회복지학개론, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>법무부</th>
                                                        </tr>
                                                        <tr>
                                                            <th>검찰직 (검찰)</th>
                                                            <th>형법, 형사소송법, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>검찰청</th>
                                                        </tr>
                                                        <tr>
                                                            <th>마약수사직 (마약수사)</th>
                                                            <th>형법, 형사소송법, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>검찰청</th>
                                                        </tr>
                                                        <tr>
                                                            <th>출입국관리직(출입국 관리)</th>
                                                            <th>행정법총론, 국제법개론, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>법무부</th>
                                                        </tr>
                                                        <tr>
                                                            <th>철도경찰직 (철도경찰)</th>
                                                            <th>형사소송법개론, 형법총론, 사회, 과학, 수학, 행정학개론</th>
                                                            <th>국토교통부</th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">9급 시험과목</h4>
                                                <div class="mgB3">
                                                    <table class="basicTb basicWd">
                                                        <colgroup>
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                        </colgroup>
                                                        <thead>
                                                        <tr>
                                                            <th>직렬(직류)</th>
                                                            <th colspan="2">필수과목(5)</th>
                                                            <th>주요근무 예정기관(예시)</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th>공업직(일반기계)</th>
                                                            <th class="tx-origin-red" rowspan="10">
                                                                국어<br/>
                                                                영어<br/>
                                                                한국사
                                                            </th>
                                                            <th>기계일반, 기계설계</th>
                                                            <th rowspan="3">
                                                                중소벤처기업부<br/>
                                                                조달청<br/>
                                                                그 밖의 수요부처
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>공직(전기)</th>
                                                            <th>전기이론, 전기기기</th>
                                                        </tr>
                                                        <tr>
                                                            <th>공업직(화공)</th>
                                                            <th>화학공학일반, 공업화학</th>
                                                        </tr>
                                                        <tr>
                                                            <th>농업직(일반농업)</th>
                                                            <th>재배학개론, 식용작물</th>
                                                            <th>농림축산식품부, 그 밖의 수요부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>임업직(산림자원)</th>
                                                            <th>조림, 임업경영</th>
                                                            <th>산림청, 그 밖의 수요부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>시설직(일반토목)</th>
                                                            <th>응용역학개론, 토목설계</th>
                                                            <th>국토교통부, 해양수산부, 그 밖의 수요부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>방재안전직</th>
                                                            <th>재난관리론, 안전관리론</th>
                                                            <th>행정안전부, 그 밖의 수요부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>전산직(전산개발)</th>
                                                            <th>컴퓨터일반, 정보보호론</th>
                                                            <th>전 부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>전산직(정보보호)</th>
                                                            <th>네트워크보안, 정보시스템보안</th>
                                                            <th>전 부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>방송통신직(전송기술)</th>
                                                            <th>전자공학개론, 무선공학개론</th>
                                                            <th>과학기술정보통신부, 그 밖의 수요부처</th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">7급 시험과목</h4>
                                                <div class="mgB3">
                                                    <table class="basicTb basicWd">
                                                        <colgroup>
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                        </colgroup>
                                                        <thead>
                                                        <tr>
                                                            <th>직렬(직류)</th>
                                                            <th colspan="2">시험과목 7과목</th>
                                                            <th>주요근무 예정기관(예시)</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th>행정직(일반행정)</th>
                                                            <th class="tx-origin-red" rowspan="23">
                                                                국어<br/>
                                                                <span class="tx-green">(한문포함)</span><br/><br/>

                                                                영어<br/>
                                                                <span class="tx-green">(국가직<br/>
                                                                영어능력<br/>
                                                                검정시험<br/>
                                                                으로 대체)</span><br/><br/>

                                                                한국사
                                                            </th>
                                                            <th>헌법, 행정법, 행정학, 경제학</th>
                                                            <th>전 부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>행정직(인사조직)</th>
                                                            <th>헌법, 행정법, 행정학, 인사 · 조직론</th>
                                                            <th>인사혁신처, 그 밖의 수요부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>행정직(고용노동)</th>
                                                            <th>헌법, 노동법, 행정법, 경제학</th>
                                                            <th>고용노동부</th>
                                                        </tr>
                                                        <tr>
                                                            <th>행정직(회계)</th>
                                                            <th>헌법, 행정법, 회계학, 경제학</th>
                                                            <th>전 부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>행정직(선거행정)</th>
                                                            <th>헌법, 행정법, 행정학, 공직선거법</th>
                                                            <th>중앙선거관리위원회</th>
                                                        </tr>
                                                        <tr>
                                                            <th>세무직(세무)</th>
                                                            <th>헌법, 세법, 회계학, 경제학</th>
                                                            <th>국세청</th>
                                                        </tr>
                                                        <tr>
                                                            <th>관세직(관세)</th>
                                                            <th>헌법, 행정법, 관세법, 무역학</th>
                                                            <th>관세청</th>
                                                        </tr>
                                                        <tr>
                                                            <th>통계직(통계)</th>
                                                            <th>헌법, 행정법, 통계학, 경제학</th>
                                                            <th>통계청, 그 밖의 수요부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>감사직(감사)</th>
                                                            <th>헌법, 행정법, 회계학, 경영학</th>
                                                            <th>감사원</th>
                                                        </tr>
                                                        <tr>
                                                            <th>교정직(교정)</th>
                                                            <th>헌법, 교정학, 형사소송법, 행정법</th>
                                                            <th>법무부</th>
                                                        </tr>
                                                        <tr>
                                                            <th>보호직(보호)</th>
                                                            <th>헌법, 형사소송법, 심리학, 형사정책</th>
                                                            <th>법무부</th>
                                                        </tr>
                                                        <tr>
                                                            <th>검찰직(검찰)</th>
                                                            <th>헌법, 형법, 형사소송법, 행정법</th>
                                                            <th>검찰청</th>
                                                        </tr>
                                                        <tr>
                                                            <th>출입국관리직(출입국관리)</th>
                                                            <th>헌법, 행정법, 국제법, 형사소송법</th>
                                                            <th>법무부</th>
                                                        </tr>
                                                        <tr>
                                                            <th>공업직(일반기계)</th>
                                                            <th>물리학개론, 기계공작법, 기계설계, 자동제어</th>
                                                            <th rowspan="3">
                                                                과학기술정보통신부<br/>
                                                                산업통상자원부<br/>
                                                                특허청,방위사업청<br/>
                                                                그밖의 수요부처
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>공업직(전기)</th>
                                                            <th>물리학개론, 전기자기학, 회로이론, 전기기기</th>
                                                        </tr>
                                                        <tr>
                                                            <th>공업직(화공)</th>
                                                            <th>화학개론, 화공열역학, 전달현상, 반응공학</th>
                                                        </tr>
                                                        <tr>
                                                            <th>농업직(일반농업)</th>
                                                            <th>생물학개론, 재배학, 식용작물학, 토양학</th>
                                                            <th>농림축산식품부, 그 밖의 수요부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>임업직(산림자원)</th>
                                                            <th>생물학개론, 조림학, 임업경영학, 조경학</th>
                                                            <th>산림청</th>
                                                        </tr>
                                                        <tr>
                                                            <th>시설직(일반토목)</th>
                                                            <th>물리학개론, 응용역학, 수리수문학, 토질역학</th>
                                                            <th rowspan="2">
                                                                국토교통부<br/>
                                                                해양수산부<br/>
                                                                그 밖의 수요부처
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>시설직(건축)</th>
                                                            <th>물리학개론, 건축계획학, 건축구조학, 건축시공학</th>
                                                        </tr>
                                                        <tr>
                                                            <th>방재안전직(방재안전)</th>
                                                            <th>재난관리론, 안전관리론, 도시계획, 방재관계법규</th>
                                                            <th>행정안전부, 그 밖의 수요부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>전산직(전산개발)</th>
                                                            <th>자료구조론, 데이터베이스론, 소프트웨어공학, 정보보호론</th>
                                                            <th>전 부처</th>
                                                        </tr>
                                                        <tr>
                                                            <th>방송통신직(전송기술)</th>
                                                            <th>물리학개론, 통신이론, 전기자기학, 전자회로</th>
                                                            <th>
                                                                과학기술정보통신부<br/>
                                                                그 밖의 수요부처
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>외무영사직(외무영사)</th>
                                                            <th colspan="2">
                                                                <span class="tx-origin-red">필수(6) :</span> 국어(한문포함), 영어(국가직:영어능력검정시험으로 대체), 한국사,<br/>
                                                                헌법, 국제정치학, 국제법<br/>
                                                                <span class="tx-origin-red">선택(1) :</span> 독어, 불어, 러시아어, 중국어, 일어, 스페인어
                                                            </th>
                                                            <th>외교부</th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">국가직과 서울시/지방직 시험과목이 다른 경우</h4>
                                                <div class="mgBox_no">
                                                    <table class="tableBox NG">
                                                        <colgroup>
                                                            <col width="25%">
                                                            <col width="25%">
                                                            <col width="25%">
                                                            <col width="25%">
                                                        </colgroup>
                                                        <tbody>
                                                        <tr>
                                                            <th>9급 세무직</th>
                                                            <td class="tx18 bg-light-gray">
                                                                <span class="tx-origin-red tx16">[ 국가직 ]</span><br/>
                                                                세법개론
                                                            </td>
                                                            <td class="bg-white">
                                                                국어<br/>
                                                                영어<br/>
                                                                한국사<br/>
                                                                회계학
                                                            </td>
                                                            <td class="tx18 bg-light-gray">
                                                                <span class="tx-origin-red tx16">[ 서울시/지방직 ]</span><br/>
                                                                지방세법
                                                            </td>
                                                        </tr>
                                                        <tr class="hh"><td></td></tr>
                                                        <tr>
                                                            <th>7급 일반행정</th>
                                                            <td class="tx18 bg-light-gray">
                                                                <span class="tx-origin-red tx16">[ 국가직 ]</span><br/>
                                                                영어<br/>
                                                                <span class="tx13">(영어검정능력시험으로 대체)</span><br/>
                                                                경제학
                                                            </td>
                                                            <td class="bg-white">
                                                                국어<br/>
                                                                헌법<br/>
                                                                한국사<br/>
                                                                행정학<br/>
                                                                행정법
                                                            </td>
                                                            <td class="bg-light-gray">
                                                                <span class="tx-origin-red tx16">[ 서울시/지방직 ]</span><br/>
                                                                경제학원론<br/>
                                                                지방자치론<br/>
                                                                지역개발론<br/>
                                                                <span class="tx-origin-red">中 택1</span>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="guide_slider">
                                                <h4 class="hTy4 hTy">국가직 7급 영어능력검정시험 성적 기준</h4>
                                                <div class="mgB3">
                                                    <table class="basicTb basicWd">
                                                        <colgroup>
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                            <col width="*">
                                                        </colgroup>
                                                        <thead>
                                                        <tr>
                                                            <th rowspan="2">시험명</th>
                                                            <th colspan="3">TOEFL</th>
                                                            <th rowspan="2">TOEIC</th>
                                                            <th rowspan="2">TEPS</th>
                                                            <th rowspan="2">G-TELP</th>
                                                            <th rowspan="2">FLEX</th>
                                                        </tr>
                                                        <tr>
                                                            <th>PBT</th>
                                                            <th>CBT</th>
                                                            <th>IBT</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th>
                                                                7급 공채<br/>
                                                                (외무영사직렬 제외)
                                                            </th>
                                                            <th>530</th>
                                                            <th>197</th>
                                                            <th>71</th>
                                                            <th>700</th>
                                                            <th>625</th>
                                                            <th>
                                                                65<br/>
                                                                (LEVEL 2)
                                                            </th>
                                                            <th>625</th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                7급 공채<br/>
                                                                (외무영사직렬)
                                                            </th>
                                                            <th>567</th>
                                                            <th>227</th>
                                                            <th>86</th>
                                                            <th>790</th>
                                                            <th>700</th>
                                                            <th>
                                                                77<br/>
                                                                (LEVEL 2)
                                                            </th>
                                                            <th>700</th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="hTy txt-gray pl45 pr45 mt30 mb15">
                                                    <ul class="dot">
                                                        <li>2015.1.1 이후 국내에서 실시된 시험으로서, 필기시험 시행예정일 전날까지 점수(등급)가 발표된 시험으로 한정하며 기준점수 이상으로 확인된 시험만 인정됩니다.</li>
                                                        <li>2015.1.1 이후 외국에서 응시한 TOEFL,일본에서 응시한 TOEIC, 미국에서 응시한 G-TELP는 필기시험 시행예정일 전날까지 점수(등급)가 발표된 시험으로 한정하며 기준점수 이상으로 확인된 시험만 인정됩니다.</li>
                                                        <li>
                                                            다만, 자체 유효기간이 2년인 시험(TOEIC, TOEFL, TEPS, G-TELP)의 경우에는 유효기간이 경과되면 시행기관으로부터 성적을 조회할 수 없어 진위여부가 확인되지 않습니다.
                                                            따라서 해당능력검정시험의 유효기간이 만료될 예정인 경우 반드시 유효기간 만료 전 별도 안내하는 기간에 사이버국가고시센타(HTTP://GOSL.KR)를 통해 사전등록을 해야 합니다.
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h5 class="hTy6 hTy txt-red left pl45"><span>* 사전등록을 하지않고 유효기간이 경과되어 진위여부 확인이 불가능한 성적은 인정되지 않으니 유의하시기 바랍니다.</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! banner('수험정보_우측', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
@stop