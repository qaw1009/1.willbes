@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">학원<span class="row-line">|</span></li>
                <li class="subTit">윌비스 임용</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">내강의실</a>
                </li>
                <li class="dropdown">
                    <a href="#none">강의안내/신청</a>
                    <div class="drop-Box list-drop-Box list-drop-Box-ic">
                        <ul>
                            <li class="Tit">교육학</li>
                            <li>
                                <a href="#none">김차웅</a>
                                <a href="#none">이인재</a>
                                <a href="#none">홍의일</a>
                            </li>
                            <li class="Tit">유아</li>
                            <li>
                                <a href="#none">민정선</a>
                            </li>
                            <li class="Tit">초등</li>
                            <li>
                                <a href="#none">배재민</a>
                            </li>
                        </ul>
                        <ul>
                            <li class="Tit">중등</li>
                            <li>
                                <span>전공국어</span>
                                <a href="#none">송원영</a>
                                <a href="#none">이원근</a>
                                <a href="#none">권보민</a>
                            </li>
                            <li>
                                <span>전공영어</span>
                                <a href="#none">김유석</a>
                                <a href="#none">김영문</a>
                                <a href="#none">공훈</a>
                            </li>
                            <li>
                                <span>전공수학</span>
                                <a href="#none">김철홍</a>
                            </li>
                            <li>
                                <span>수학교육론</span>
                                <a href="#none">박태영</a>
                            </li>
                            <li>
                                <span>전공생물</span>
                                <a href="#none">강치욱</a>
                            </li>
                            <li>
                                <span>생물교육론</span>
                                <a href="#none">양혜정</a>
                            </li>
                            <li>
                                <span>도덕윤리</span>
                                <a href="#none">김병찬</a>
                            </li>
                            <li>
                                <span>전공역사</span>
                                <a href="#none">최용림</a>
                            </li>
                            <li>
                                <span>전공음악</span>
                                <a href="#none">다이애나</a>
                            </li>
                            <li>
                                <span>전기전자통신</span>
                                <a href="#none">최우영</a>
                            </li>
                            <li>
                                <span>정보컴퓨터</span>
                                <a href="#none">송광진</a>
                            </li>
                            <li>
                                <span>정보교육론</span>
                                <a href="#none">장순선</a>
                            </li>
                            <li>
                                <span>전공중국어</span>
                                <a href="#none">정경미</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재안내/신청</a>
                </li>
                <li>
                    <a href="#none">무료강의</a>
                </li>
                <li>
                    <a href="#none">임용정보</a>
                </li>
                <li>
                    <a href="#none">고객센터</a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="depth">
            <span class="depth-Arrow">></span><strong>런닝 메이트</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide-Ssam">
            <img src="https://static.willbes.net/public/images/promotion/sub/2018_runningMate.jpg" alt="">
            <div class="runningMate NSK">
                <div class="guidebox">
                    <table>
                        <col width="20%" />
                        <col />
                        <tbody>
                            <tr>
                                <th>대상</th>
                                <td class="tx-left">사법대학, 교직이수, 교육대학원 재학생</td>
                            </tr>                   
                            <tr>
                                <th>활동</th>
                                <td class="tx-left">- 교내 학사 일정 및 특이사항 정보 제공<br />
                                - 타학원 설명회 및 이벤트 일정 및 자료 공유<br />
                                - 자사 행사 시, 포스터/전단/홍보물품이 발송되면 학생들 유동이 많은 곳에 비치, 홍보 활동 지원<br />
                                - 기타 임용 관련 설문 조사 및 요청사항 협조</td>
                            </tr>
                            <tr>
                                <th>인증</th>
                                <td class="tx-left">별도 배부되는 활동지 작성 후, 공용 메일로 전송 (wbssam@naver.com)</td>
                            </tr>
                            <tr>
                                <th>특전</th>
                                <td class="tx-left">- 활동 완료 시, 교육학 또는 전공 과목 인강 제공 (2개월 커리)<br />
                                - 적극 활동할 경우 담당자 판단으로 교재 및 추가 혜택 제공</td>
                            </tr>
                            <tr>
                                <th>신청방법</th>
                                <td class="tx-left">- 신청서 작성 후 이메일 발송<br />
                                - 검토 후 활동 매뉴얼과 함께 개별 연락 예정</td>
                            </tr>
                            <tr>
                                <th>문의</th>
                                <td class="tx-left">e-mail : wbssam@naver.com  / tel : 1544-3169</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="request NSK-Black"><a heft="https://static.willbes.net/public/images/promotion/main/2018/willbesSsam_runningMate.hwp">신청서 다운받기 ></a></div>
            </div>
        </div>
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop