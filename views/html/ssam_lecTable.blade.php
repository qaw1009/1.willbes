@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">임용<span class="row-line">|</span></li>
                <li class="subTit">윌비스임용</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">내강의실</a>
                </li>
                <li>
                    <a href="#none">강의안내/신청</a>
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
        <span class="depth"><span class="depth-Arrow">></span><strong>임용정보</strong></span>
        <span class="depth"><span class="depth-Arrow">></span><strong>합격수기</strong></span>
    </div>
    <div class="Content p_re">
        <div class="willbes-AcadInfo c_both">
            <div class="ssamLecTable NGR">
                <h5 class="NSK-Black">윌비스 임용 <span>2021년 패키지강의 및 7~8월 단과</span>강의 일정</h5>
                <table cellspacing="0" cellpadding="0">
                    <colgroup>
                        <col width="70px" />
                        <col width="60px" />
                        <col />
                        <col width="140px" />
                        <col width="245px" />
                        <col width="65px" />
                        <col width="65px" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th rowspan="2">과목</th>
                            <th rowspan="2">교수명</th>
                            <th rowspan="2">과정명</th>
                            <th rowspan="2">(학원직강) 강의일정</th>
                            <th rowspan="2">수강료</th>
                            <th colspan="2">수강신청</th>
                        </tr>
                        <tr>
                            <th>온라인</th>
                            <th>학원직강</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3" class="strong">교육학</td>
                            <td rowspan="3" class="strong">이인재</td>
                            <td class="tx-left">(07~08월) 이인재 교육학 기출분석 및 이론반
                                <br><span class="red">※ 수강시 온/오프 동시 수강 혜택</span></td>
                            <td>07.05.(월)~08.24.(화)<br />
                            매주[월/화] 09:30~13:00</td>
                            <td>350,000</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3134/pattern/only/prod-code/176774" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176779" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 이인재 교육학 연간FULL 패키지(기본/ 심화/ 기출/    문풀/ 모고) </td>
                            <td>1,750,000 ▶ <strong> 1,050,000 <span class="red">(40%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/178325" target="_blank" class="btnSt01">신청하기</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 이인재 교육학 하반기 문풀·모고 패키지</td>
                            <td>700,000     ▶ <strong>   525,000 <span class="red">(25%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/178327" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/178331" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="strong">유  아</td>
                            <td class="strong">민정선</td>
                            <td class="tx-left">2020년 (01~02월) 유아교육개론 </td>
                            <td>2020년 진행강의</td>
                            <td>330,000 ▶ <strong> 198,000 <span class="red">(40%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3135/pattern/only/prod-code/174296" target="_blank" class="btnSt01">신청하기</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="strong">초  등</td>
                            <td rowspan="3" class="strong">배재민</td>
                            <td class="tx-left">(06~08월) 배재민 초등 통합서브노트반</td>
                            <td>06.13.(일)~08.29.(일)<br />
                            매주[일] 13:00~19:00</td>
                            <td>550,000</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3136/pattern/only/prod-code/174803" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3140/prod-code/176121" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~10월) 배재민 초등 연간    패키지</td>
                            <td>2,000,000 ▶ <strong> 1,400,000 <span class="red">(30%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3136/pack/648001/prod-code/176017" target="_blank" class="btnSt01">신청하기</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(09~10월) 배재민 초등    하반기 패키지 </td>
                            <td>500,000 ▶ <strong> 450,000 <span class="red">(10%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3136/pack/648001/prod-code/182495" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182497" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="15" class="strong">국  어</td>
                            <td rowspan="6" class="strong">송원영</td>
                            <td class="tx-left">(07~08월) 송원영 국어교육론 문제풀이를 통한 이론정리반</td>
                            <td>07.01.(목)~08.19.(목)<br />
                            매주[목] 10:00~18:30</td>
                            <td>190,000</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176573" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176561" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">(07~08월) 송원영 국어/문학교육론 문제풀이를 통한 이론정리반</td>
                            <td>07.01.(목)~08.20.(금)<br />
                            매주[목/금] 10:00~18:30</td>
                            <td>380,000 ▶ <strong> 320,000    <span class="red">(약15%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176565" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176556" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">(07~08월) 송원영(국어교육론/문학교육론)+권보민(문법) 문제풀이</td>
                            <td>07.01.(목)~08.21.(토)<br />
                            매주[목/금] 10:00~18:30<br />
                            매주[토] 10:30~18:00</td>
                            <td>680,000 ▶ <strong> 380,000 <span class="red">(약44%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182458" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182457" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 송원영 국어교육론/문학교육론 하반기 문풀·모고 패키지 </td>
                            <td>800,000 ▶ <strong> 640,000    <span class="red">(20%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182463" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182460" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 송원영(국어교육론/문학교육론)+권보민(문법) 연간 Full 패키지 </td>
                            <td>3,580,000 ▶ <strong> 1,670,000 <span class="red">(약53%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176586" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176588" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 송원영(국어교육론/문학교육론)+권보민(문법) 하반기 문풀·모고 패키지 </td>
                            <td>1,540,000 ▶ <strong> 847,000    <span class="red">(45%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182466" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182465" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="9" class="strong">권보민</td>
                            <td class="tx-left">(07~08월) 권보민 국어문법 미니모의고사+적중예상 300제+핵심 주제문법 1</td>
                            <td>07.03.(토)~08.21.(토)<br />
                            매주[토] 10:30~18:00</td>
                            <td>300,000 ▶ <strong> 240,000    <span class="red">(20%↓)</span>
                            <br><span class="red">※ 06.30.(수) 17시까지 결제완료시, 할인적용</a></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182468" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182467" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">(07~08월) 권보민 국어문법 갈무리 미니 모의고사 </td>
                            <td>07.03.(토)~08.21.(토)<br />
                            매주[토] 10:30~16:00</td>
                            <td>200,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176207" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176252" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">(07~08월) 권보민 국어문법 적중 예상 문제 300제 특강</td>
                            <td>07.03.(토)~08.21.(토)<br />
                            매주[토] 16:00~17:00</td>
                            <td>50,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176206" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176253" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">(07~08월) 권보민 국어문법 핵심 주제문법 특강 1</td>
                            <td>07.03.(토)~08.21.(토)<br />
                            매주[토] 17:00~18:00</td>
                            <td>50,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176205" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176254" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">(07~08월) 권보민(문법)+송원영(국어/문학교육론) 문제풀이</td>
                            <td>07.01.(목)~08.21.(토)<br />
                            매주[목/금] 10:00~18:30<br />
                            매주[토] 10:30~18:00</td>
                            <td>680,000 ▶ <strong> 380,000 <span class="red">(약44%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182458" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182457" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 권보민 국어문법 연간 패키지</td>
                            <td>1,640,000 ▶ <strong> 1,066,000 <span class="red">(35%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176236" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176262" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 권보민 국어문법 하반기 문풀·모고 패키지 </td>
                            <td>740,000 ▶ <strong> 592,000    <span class="red">(20%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182470" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182469" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 권보민(문법)+송원영(국어/문학교육론) 연간 Full 패키지 </td>
                            <td>3,580,000 ▶ <strong> 1,670,000 <span class="red">(약53%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176586" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176588" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 권보민(문법)+송원영(국어/문학교육론) 하반기 문풀·모고 패키지 </td>
                            <td>1,540,000 ▶ <strong> 847,000    <span class="red">(45%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182466" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182465" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="6" class="strong">영  어</td>
                            <td rowspan="3" class="strong">김유석</td>
                            <td class="tx-left">(07~08월) 김유석 일반영어/영미문학 상위권 문제풀이</td>
                            <td>07.09.(금)~08.27.(금)<br />
                            매주[금] 09:10~13:00</td>
                            <td>320,000</td>
                            <td><a href="#none" onclick="javascript:alert('6월18일부터 접수');" class="btnSt01">신청하기</a></td>
                            <td><a href="#none" onclick="javascript:alert('6월18일부터 접수');" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 김유석 일반영어/영미문학 연간 패키지 </td>
                            <td>2,060,000 ▶ <strong> 1,700,000 <span class="red">(약17%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176752" target="_blank" class="btnSt01">신청하기</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 김유석 일반영어/영미문학 하반기 문풀·모고 패키지 </td>
                            <td>740,000 ▶ <strong> 680,000    <span class="red">(약8%↓)</span></strong></td>
                            <td><a href="#none" onclick="javascript:alert('6월18일부터 접수');" class="btnSt01">신청하기</a></td>
                            <td><a href="#none" onclick="javascript:alert('6월18일부터 접수');" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="strong">김영문</td>
                            <td class="tx-left">(07~08월) 김영문 영어학 영역별 모의고사 및 기출문제풀이</td>
                            <td>07.01(목)~08.26.(목)<br />
                            매주[목] 10:00~13:00</td>
                            <td>140,000 ▶ <strong> 126,000  <span class="red">  (약10%↓)</span>
                            <br><span class="red">※ 06.30.(수) 17시까지 결제완료시, 할인적용</span></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176458" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176457" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 김영문 영어학 연간 패키지 </td>
                            <td>760,000 ▶ <strong> 532,000    <span class="red">(30%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176471" target="_blank" class="btnSt01">신청하기</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 김영문 영어학    하반기 문풀·모고 패키지  </td>
                            <td>340,000 ▶ <strong> 272,000    <span class="red">(20%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182456" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182455" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="10" class="strong">수  학</td>
                            <td rowspan="4" class="strong">김철홍</td>
                            <td class="tx-left">(07월) 김철홍 선형대수학 완전학습반 (이론 및 문제풀이 통합반) </td>
                            <td>07.04.(일)~07.25.(일)<br />
                            매주[일] 11:00~18:00</td>
                            <td>170,000 ▶ <strong> 153,000 <span class="red">(10%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176936" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176956" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">(08월) 김철홍 복소해석학 완전학습반 (이론 및 문제풀이 통합반)</span></strong></td>
                            <td>08.01.(일)~08.29.(일)<br />
                            매주[일] 11:00~18:00</td>
                            <td>220,000 ▶ <strong> 198,000 <span class="red">(10%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176937" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176957" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 김철홍 전공수학 내용학 All-In-One 패키지</td>
                            <td>2,080,000 ▶ <strong> 1,456,000 <span class="red">(30%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176965" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176977" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 전공수학 김철홍(내용학)+박태영(수교론) All-In-One 패키지</td>
                            <td>3,710,000 ▶ <strong> 2,226,000 <span class="red">(40%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176960" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176972" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="6" class="strong">박태영</td>
                            <td class="tx-left">(07~08월) 박태영 수학교육론 주제별 모의고사반 (최종 노트 완성)</span></strong></td>
                            <td>07.07.(수)~08.25.(수)<br />
                            매주[수] 10:00~14:00</td>
                            <td>300,000 ▶ <strong> 270,000 <span class="red">(10%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176883" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176923" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">(08월 특강) 박태영 수학교육론 서술형 쓰기    연습 One-Day특강  </td>
                            <td>08.25.(수)<br />
                            매주[수] 10:00~14:00</td>
                            <td>30,000</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176896" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176929" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 박태영 수학교육론 All-In-One 패키지</td>
                            <td>1,430,000 ▶ <strong> 1,000,000 <span class="red">(약30%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176961" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176973" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 박태영 수학교육론 하반기  문풀·모고 패키지 </td>
                            <td>530,000 ▶ <strong> 370,000 <span class="red">(약30%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176963" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176975" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년 수학교육론 정규특강 패키지[상반기 복습특강+하반기특강]</td>
                            <td>100,000 ▶ <strong> 70,000 <span class="red">(30%↓)</span></strong></td>
                            <td><a href=https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176964none" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176976" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 전공수학 박태영(수교론)+김철홍(내용학) All-In-One 패키지</td>
                            <td>3,710,000 ▶ <strong> 2,226,000 <span class="red">(40%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176960" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176972" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="strong">생  물</td>
                            <td class="strong">강치욱</td>
                            <td class="tx-left">(05~08월) 강치욱 생물내용학 기출&amp;예제문제 풀이<br />
                            *온라인 강의는 [강치욱 과학연구소]에서 수강</td>
                            <td>05.08.(토)~08.21.(토)<br />
                            매주[토] 13:00~20:00</td>
                            <td>720,000 ▶ <strong> 660,000 <span class="red">(약8%↓)</span></strong></td>
                            <td><a href="http://www.biokang.net/" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177925" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2" class="strong">양혜정</td>
                            <td class="tx-left">(06~08월) 양혜정 생물교육론 기출&amp;예상 문제풀이 </td>
                            <td>06.02.(수)~08.18.(수)<br />
                            매주[수] 10:00~16:00</td>
                            <td>480,000 ▶ <strong> 450,000 <span class="red">(약6%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177762" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177767" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년 양혜정 생물교육론 기출&amp;예상 문제풀이(06~08월) + 파이널문풀(09~10월) 패키지 </td>
                            <td>720,000 ▶ <strong> 650,000 <span class="red">(약9%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/177774" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/177776" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="strong">도덕윤리</td>
                            <td rowspan="3" class="strong">김병찬</td>
                            <td class="tx-left">(07~08월) 김병찬 도덕윤리 영역별/주제별 문제풀이 </td>
                            <td>07.01.(목)~08.26.(목)<br />
                            매주[금] 10:00~18:00</td>
                            <td>330,000 ▶ <strong> 300,000 <span class="red">(약9%↓)</span></strogn>
                            <br><span class="red">※ 06.30.(수) 17시까지 결제완료시, 할인적용</span></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176650" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176660" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년 (01~10월) 도덕윤리 연간 Full 패키지<br />
                            <br>※ 직강 수강생: 전 강좌 복습용(0.6배수) 인강 제공 </td>
                            <td>1,980,000 ▶ <strong> 1,728,000 <span class="red">(약13%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176748" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176757" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년    (07~10월) 도덕윤리 하반기 패키지 (문제풀이+모의고사)</td>
                            <td>660,000 ▶ <strong> 600,000 <span class="red">(약9%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176753" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176759" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="strong">역  사</td>
                            <td rowspan="3" class="strong">최용림</td>
                            <td class="tx-left">(07~08월) 최용림 임용역사 영역별/단원별 문제풀이 </td>
                            <td>07.07.(수)~08.26.(목)<br />
                            매주[수/목] 10:00~18:00</td>
                            <td>280,000 ▶ <strong> 252,000 <span class="red">(10%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176165" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176172" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 최용림 임용역사 연간 FULL 패키지 </td>
                            <td>1,580,000 ▶ <strong> 1,106,000 <span class="red">(30%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176176" target="_blank" class="btnSt01">신청하기</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 최용림 임용역사 하반기 문풀·모고 패키지</td>
                            <td>740,000 ▶ <strong> 518,000 <span class="red">(30%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182496" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182498" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="4" class="strong">음  악</td>
                            <td rowspan="4" class="strong">다이애나</td>
                            <td class="tx-left">(07~08월) 다이애나 전공음악 영역별 문제풀이 </td>
                            <td></td>
                            <td>&nbsp;</td>
                            <td>준비중</td>
                            <td>준비중</td>
                        </tr>
                        <tr>
                            <td class="tx-left">(07~08월) 다이애나 전공음악 기출문제 풀이반</td>
                            <td></td>
                            <td></td>
                            <td>준비중</td>
                            <td>준비중</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 다이애나 전공음악 All Free Pass  </td>
                            <td>4,200,000 ▶ <strong> 2,050,000 <span class="red">(약51%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/177089" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/177089" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">2021년(07~11월) 다이애나 전공음악 하반기 패키지 </td>
                            <td></td>
                            <td></td>
                            <td>준비중</td>
                            <td>준비중</td>
                        </tr>
                        <tr>
                            <td rowspan="7" class="strong">전기<br />
                            전자<br />
                            통신</td>
                            <td rowspan="7" class="strong">최우영</td>
                            <td class="tx-left">(07~09월) [전기·전자·통신 통합] 영역별 문제풀이 </td>
                            <td>07.05.(월)~09.29.(수)<br />
                            매주[월] 14:00~<br />
                            매주[수] 09:00~</td>
                            <td>460,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176681" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176806" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 최우영 전기 연간 Full 패키지 </td>
                            <td>2,590,000 ▶ <strong> 1,500,00 <span class="red">(42%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176685" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176811" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 최우영 전기 하반기 문풀·모고 패키지</td>
                            <td>740,000 ▶ <strong> 592,00 <span class="red">(20%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182650" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182654" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 최우영 전자 연간 Full 패키지 </td>
                            <td>2,790,000 ▶ <strong> 1,500,00 <span class="red">(46%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176686" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176813" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 최우영 전자 하반기 문풀·모고 패키지</td>
                            <td>740,000 ▶ <strong> 592,00 <span class="red">(20%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182651" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182655" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 최우영 통신 연간 Full 패키지 </td>
                            <td>2,590,000 ▶ <strong> 1,500,00 <span class="red">(42%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176687" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176812" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 최우영 통신 하반기 문풀·모고 패키지</td>
                            <td>740,000 ▶ <strong> 592,00 <span class="red">(20%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182652" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182656" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="5" class="strong">정보컴퓨터</td>
                            <td rowspan="5" class="strong">송광진</td>
                            <td class="tx-left">(07~09월) 송광진 정보컴퓨터 적중문제풀이반 </td>
                            <td>07.04(일)~09.19.(일)<br />
                            매주[일] 13:00~20:00</td>
                            <td>600,000 ▶ <strong> 5700,000 <span class="red">(5%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/175979" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176133" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">2021년 정보컴퓨터 내용학 C언어 특강</td>
                            <td>인강전용강의</td>
                            <td>200,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/175983" target="_blank" class="btnSt01">신청하기</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 송광진 정보컴퓨터 내용학 All-In-One 패키지(C언어 포함)</td>
                            <td>2,800,000 ▶ <strong> 2,100,000 <span class="red">(25%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176005" target="_blank" class="btnSt01">신청하기</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 송광진 정보컴퓨터 내용학 All-In-One    패키지(C언어 제외)</td>
                            <td>2,600,000 ▶ <strong> 1,950,000 <span class="red">(25%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176263" target="_blank" class="btnSt01">신청하기</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11) 송광진 정보컴퓨터 내용학 하반기 문풀·모고 패키지</td>
                            <td>1,000,000 ▶ <strong> 800,000 <span class="red">(20%↓)
                            <br>※ 06.30.(수) 17시까지 결제완료시, 할인적용</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182499" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182500" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="strong">정컴교육론</td>
                            <td rowspan="3" class="strong">장순선</td>
                            <td class="tx-left">(06월) 정보컴퓨터 교육론 심화과정</td>
                            <td>06.05.(토)~06.26.(토)<br />
                            매주[토] 13:00~17:00</td>
                            <td>200,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177049" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177052" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">(08월) 장순선 정보컴퓨터 교육론 문제풀이</td>
                            <td>08.07.(토)~08.28.(토)<br />
                            매주[토] 13:00~17:00</td>
                            <td>200,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177048" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177053" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년 정컴 교육론 All Pass패키지 </td>
                            <td>600,000 ▶ <strong> 510,000 <span class="red">(15%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/177055" target="_blank" class="btnSt01">신청하기</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="4" class="strong">중국어</td>
                            <td rowspan="4" class="strong">정경미</td>
                            <td class="tx-left">(07~08월) 정경미 전공중국어 문제풀이+핵심체크반</td>
                            <td>07.03.(토)~08.28.(토)<br />
                            매주[토] 09:30~16:00</td>
                            <td>340,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177146" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177157" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">(07~08월) 정경미 전공중국어 독해    마스터반</td>
                            <td>07.04.(일)~08.29.(일)<br />
                            매주[일] 09:30~18:30</td>
                            <td>340,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177147" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177158" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(01~11월) 정경미 중국어 연간 Full패키지  </td>
                            <td>3,420,000 ▶ <strong> 1,710,000 <span class="red">(50%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/177161" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/177162" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left"> 2021년(07~11월) 정경미 중국어 하반기(문풀·모고 및 독해마스터) 패키지</td>
                            <td>1,140,000 ▶ <strong> 741,000 <span class="red">(35%↓)</span></strong></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/182649" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/182653" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                    </tbody>
                </table>
                <div class="tx-right mt10">※ 상기 내용은 학원 사정 상 변경될 수 있습니다.</div>
            </div>
        </div>
        <!-- willbes-AcadInfo -->
    </div>

</div>
<!-- End Container -->
@stop