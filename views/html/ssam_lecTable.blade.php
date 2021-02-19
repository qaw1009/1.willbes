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
                <h5 class="NSK-Black">윌비스 임용 <span>패키지강의 및 3~4월 단과 </span>강의 일정</h5>
                <table cellspacing="0" cellpadding="0">
                    <colgroup>
                        <col width="60px" />
                        <col width="60px" />
                        <col />
                        <col width="150px" />
                        <col width="160px" />
                        <col width="70px" />
                        <col width="70px" />
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
                            <td rowspan="4">교육학</td>
                            <td rowspan="3">이인재</td>
                            <td class="tx-left">03~04월 이인재 교육학 기초 심화반</td>
                            <td>03.08.(월)~04.27.(화)<br />
                            매주[월/화] 09:30~13:00</td>
                            <td><strong>350,000</strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3134/pattern/only/prod-code/176772" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176777" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~05월 이인재 교육학 [핵심 키워드] 특강 </td>
                            <td>03.10.(수)~05.26.(수)<br />
                            매주[수] 10:00~12:00</td>
                            <td><strong>150,000</strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3134/pattern/only/prod-code/179270" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3138/prod-code/179271" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(3~11월) 이인재 교육학 패키지(심화+기출+문풀+모고)<br>
                                <span>※ 수강시 온/오프 동시 수강 혜택</span> </td>
                            <td>1,400,000 ▶ <strong>550,000</strong><br>(약60%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/178323" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/178329" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td>홍의일</td>
                            <td class="tx-left">Eduzipessay 교육학     </td>
                            <td>03.01.(월)~03.23.(수)<br />
                            매주[월/화] 10:00~17:00</td>
                            <td>직강 330,000 ▶ <strong>165,000</strong><br>(50%↓)<br />
                            인강 330,000 ▶ <strong>297,000</strong><br>(10%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3134/pattern/only/prod-code/176537" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3138/prod-code/176538" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td>유  아</td>
                            <td>민정선</td>
                            <td class="tx-left">2020년 (01~02월) 유아교육개론 </td>
                            <td>2020년 진행강의</td>
                            <td>330,000 ▶ <strong>198,000</strong><br>(40%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3135/pattern/only/prod-code/174296" target="_blank" class="btnSt01">신청하기</a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td rowspan="4">초  등</td>
                            <td rowspan="4">배재민</td>
                            <td class="tx-left">03월 초등 기출문제 분석반 </td>
                            <td>03.07.(일)~03.28.(일)<br />
                            매주[일] 13:00~19:00</td>
                            <td><strong>200,000</strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3136/pattern/only/prod-code/174798" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3140/prod-code/176118" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">04월 초등 국정지도서 각론반 </td>
                            <td>04.04.(일)~04.25.(일)<br />
                            매주[일] 13:00~19:00</td>
                            <td><strong>200,000</strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3136/pattern/only/prod-code/174801" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3140/prod-code/176119" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~10월) 배재민 초등 연간    패키지</td>
                            <td>2,000,000 ▶ <strong>1,400,000</strong><br>(30%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3136/pack/648001/prod-code/176017" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176125" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~8월) 배재민 초등 상반기 패키지 </td>
                            <td>1,500,000 ▶ <strong>1,200,000</strong><br>(20%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3136/pack/648001/prod-code/176514" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176515" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="12">국  어</td>
                            <td rowspan="5">송원영</td>
                            <td class="tx-left">03~04월 국어교육론 교육과정의 체계적 이해 </td>
                            <td>03.04.(목)~04.22.(목)<br />
                            매주[목] 10:00~18:30</td>
                            <td><strong>190,000</strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176568" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176559" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~04월    문학교육론 문제풀이를 통한 교과서 수록 문학 작품 분석<br />
                            및 정리(1) - 문학 교육과정 편 </td>
                            <td>03.05(금)~04.23(금)<br />
                            매주[금] 10:00~18:30</td>
                            <td><strong>190,000</strong></td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/179303" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/179293" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~04월    국어/문학교육론 교육과정 정리 및 문학작품 분석반 <br />
                            <span>* 02.28(일)까지    접수시 할인율 적용 (03.01.이후, 340,000원)</span></td>
                            <td>03.04(목)~04.23.(금)<br />
                            매주[목/금] 10:00~18:00</td>
                            <td>380,000 ▶ <strong>320,000</strong><br>(약15%↓)</td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176554" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176554" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월)    송원영(국어/문학교육론)+권보민(문법) 연간 Full 패키지 </td>
                            <td>3,580,000 ▶ <strong>1,670,000</strong><br>(약53%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176586" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176588" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(3~4월) 전공국어 완전정복 이론반 패키지 </td>
                            <td>680,000 ▶ <strong>380,000</strong><br>(약44%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/179322" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/179316" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="7">권보민</td>
                            <td class="tx-left">03~04월 중세 국어 문법 기초 다지기 </td>
                            <td>03.06.(토)~04.24.(토)<br />
                            매주[토] 10:30~16:00</td>
                            <td><strong>200,000</strong> </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176214" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176246">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~04월 기출문제 분석 및 응용반 2</td>
                            <td>03.06.(토)~04.24.(토)<br />
                            매주[토] 16:00~1700</td>
                            <td><strong>50,000</strong> </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176213" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176247" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~04월    중세 국어 문법 적용력 기르기<br />
                            (중세국어 문법 개론서 분석2 및 자료 강독1)</td>
                            <td>03.06.(토)~04.24.(토)<br />
                            매주[토] 17:00~18:00</td>
                            <td><strong>50,000</strong> </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176212" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176248" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 권보민 국어문법 연간 패키지</td>
                            <td>1,640,000 ▶ <strong>1,066,000</strong><br>(35%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176236" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176262" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~6월) 권보민 국어문법 상반기 패키지 </td>
                            <td>900,000 ▶ <strong>720,000</strong><br>(20%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176234" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176261" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월)    권보민(문법)+송원영(국어/문학교육론) 연간 Full 패키지 </td>
                            <td>3,580,000 ▶ <strong>1,670,000</strong><br>(약53%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176586" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176588" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(3~4월) 전공국어 완전정복 이론반 패키지 </td>
                            <td>680,000 ▶ <strong>380,000</strong><br>(약44%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/179322" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/179316" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="8">영  어</td>
                            <td rowspan="5">김유석</td>
                            <td class="tx-left">03~04월 김유석 일반영어(PPW) / 영미문학(영미소설)반</td>
                            <td>03.12.(금)~04.30.(금)<br />
                            매주[금] 09:30~15:30</td>
                            <td><strong>420,000</strong> </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/179225" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/179224" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~04월 김유석 일반영어 Power Reading    Skills</td>
                            <td>03.12.(금)~04.30.(금)<br />
                            매주[금] 09:30~12:00</td>
                            <td><strong>220,000</strong> </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176741" target="_blank" class="btnSt01">신청하기</a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~04월 김유석 영미문학 영미소설의 이해 </td>
                            <td>03.12.(금)~04.30.(금)<br />
                            매주[금] 13:00~15:30</td>
                            <td><strong>200,000</strong> </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176742" target="_blank" class="btnSt01">신청하기</a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 김유석 일반영어·문학 연간 패키지 </td>
                            <td>2,060,000 ▶ <strong>1,700,000</strong><br>(약17%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176752" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176754" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~4월) 김유석 일반영어·문학 4개월 패키지 </td>
                            <td>840,000 ▶ <strong>750,000</strong><br>(약10%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176755" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176756" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3">김영문</td>

                            <td class="tx-left">03~04월 김영문 영어학 기본이론반(학교문법,    음운론, 음성학, 형태의미론)<br />
                            <span>* 02.28(일)까지 접수시    할인율 적용 (03.01.이후, 140,000원)</span> </td>
                            <td>03.11.(목)~04.29.(목)<br />
                            매주[목] 10:00~13:00</td>
                            <td>140,000 ▶ <strong>126,000</strong><br>(약10%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176453" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176451" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 김영문 영어학 연간 패키지 </td>
                            <td>760,000 ▶ <strong>532,000</strong><br>(30%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176471" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176466" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~4월) 김영문 영어학 기본이론 패키지 </td>
                            <td>280,000 ▶ <strong>224,000 </strong><br>(20%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176549" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176550" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="12">수  학</td>
                            <td rowspan="5">김철홍</td>
                            <td class="tx-left">03~04월 해석학 완전학습반(이론 및 문제풀이 통합반)</td>
                            <td>03.07.(일)~04.25.(일)<br />
                            매주[일] 11:00~18:00</td>
                            <td>340,000 ▶ <strong>300,000</strong><br>(약11%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176933" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176951" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 전공수학 내용학 All-In-One 패키지</td>
                            <td>2,080,000 ▶ <strong>1,456,000</strong><br>(30%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176965" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176977" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~8월) 전공수학 내용학 심화 완전학습 패키지</td>
                            <td>1,680,000 ▶ <strong>1,176,000</strong><br>(30%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176966" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176978" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~5월) 전공수학 내용학 핵심이론 패키지 [대수학과    정수론/해석학/미분기하학]</td>
                            <td>1,060,000 ▶ <strong>742,000</strong><br>(30%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176967" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176979" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 전공수학(내용학&amp;교육론) All-In-One    패키지</td>
                            <td>3,710,000 ▶ <strong>2,226,000</strong><br>(40%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176960" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176972" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="7">박태영</td>
                            <td class="tx-left">03~04월 수학교육과정과 교재연구</td>
                            <td>03.03.(수)~04.28.(수)<br />
                            매주[수] 10:00~14:00</td>
                            <td>300,000 ▶ <strong>270,000</strong><br>(10%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176881" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176921" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~04월    수학내용학 - 위상수학 기본이론 완벽정리반</td>
                            <td>인강전용강의</td>
                            <td>200,000 ▶ <strong>140,000</strong><br>(30%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176886" target="_blank" class="btnSt01">신청하기</a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="tx-left">2021년(3~6월) 전공수학 [위상수학/확률과 통계] 기본이론 패키지 </td>
                            <td>인강전용강의</td>
                            <td>400,000 ▶ <strong>240,000</strong><br>(40%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176968" target="_blank" class="btnSt01">신청하기</a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 수학교육론 All-In-One 패키지</td>
                            <td>1,430,000 ▶ <strong>1,000,000</strong><br>(약30%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176961" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176973" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~6월) 수학교육론 상반기 패키지</td>
                            <td>900,000 ▶ <strong>630,000</strong><br>(30%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176962" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176974" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년 수학교육론 정규특강 패키지[상반기 복습특강+하반기특강]</td>
                            <td>100,000 ▶ <strong>70,000</strong><br>(30%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176964" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176976" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 전공수학(내용학&amp;교육론) All-In-One    패키지</td>
                            <td>3,710,000 ▶ <strong>2,226,000</strong><br>(40%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176960" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176972" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="4">생  물</td>
                            <td>강치욱</td>
                            <td class="tx-left">03~04월 생물학 총론 11판 (Part Ⅱ)<br>
                                <span>*온라인 강의는 [강치욱    과학연구소]에서 수강</span></td>
                            <td>03.06.(토)~04.25.(일)<br />
                            매주[토/일] 13:00~20:00</td>
                            <td>360,000 ▶ <strong>340,000</strong><br>(약5%↓)</td>
                            <td><a href="http://www.biokang.net/" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177445" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2">양혜정</td>
                            <td class="tx-left">03~05월 생물교육론 심화이론 </td>
                            <td>03.03.(수)~05.19.(수)<br />
                            매주[수] 10:00~16:00</td>
                            <td>480,000 ▶ <strong>450,000</strong><br>(약6%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177761" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177765" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년    생물교육론 심화(03~05월) + 파이널문풀(09~10월) 패키지 </td>
                            <td>720,000 ▶ <strong>650,000 </strong><br>(약9%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/177773" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/177775" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td>강치욱<br />
                            +양혜정</td>
                            <td colspan="2" class="tx-left">2021년 생물 내용학 + 생물교육론 패키지<br>
                                <span>* 직강수강만 가능</span></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51087?cate_code=3137&subject_idx=1988&subject_name=생물교육론&tab=pack_lecture" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2">도덕윤리</td>
                            <td rowspan="2">김병찬</td>
                            <td class="tx-left">03~04월 도덕윤리 교과내용학 Ⅱ[응용윤리·정치·사회사상]<br />
                            * 02.28(일)까지    접수시 할인율 적용 (03.01.이후, 330,000원) </td>
                            <td>03.11.(목)~04.29.(목)<br />
                            매주[목] 10:00~18:00</td>
                            <td>330,000 ▶ <strong>300,000</strong><br>(약9%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176647" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176657" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년 (1~10월) 도덕윤리 연간 Full 패키지<br />
                            <span>※ 직강 수강생: 전 강좌 복습용(0.6배수) 인강 제공</span></td>
                            <td>1,980,000 ▶ <strong>1,728,000</strong><br>(약13%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176748" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176757" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3">역  사</td>
                            <td rowspan="3">최용림</td>
                            <td class="tx-left">03~04월 임용역사 심화이론반</td>
                            <td>03.03.(수)~04.22.(목)<br />
                            매주[수/목] 10:00~18:00</td>
                            <td>280,000 ▶ <strong>252,000</strong><br>(10%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176160" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176170" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 임용역사 연간 패키지 </td>
                            <td>1,580,000 ▶ <strong>1,106,000</strong><br>(30%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176176" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176178" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~6월) 임용역사 상반기 패키지 </td>
                            <td>840,000 ▶ <strong>672,000</strong><br>(20%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176177" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176179" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="7">음  악</td>
                            <td rowspan="7">다이애나</td>
                            <td class="tx-left">03~06월 전공음악 종.음.셋 (국악반)</td>
                            <td>03.13.(토)~06.26.(토)<br />
                            매주[토] 10:00~13:00</td>
                            <td><strong>190,000</strong> </td>
                            <td><a href="#none" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="#none" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~06월 전공음악 종.음.셋 (서양음악반)</td>
                            <td>03.13.(토)~06.26.(토)<br />
                            매주[토] 10:00~13:00</td>
                            <td><strong>190,000</strong> </td>
                            <td><a href="#none" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="#none" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~06월 전공음악 종.음.셋 (음악교육론반)</td>
                            <td>03.13.(토)~06.26.(토)<br />
                            매주[토] 10:00~13:00</td>
                            <td><strong>190,000</strong> </td>
                            <td><a href="#none" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="#none" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~06월 전공음악 한줄정리(국악반)</td>
                            <td>03.19.(금)~06.25.(금)<br />
                            매주[금] 14:00~16:00</td>
                            <td><strong>190,000</strong> </td>
                            <td><a href="#none" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="#none" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~06월 전공음악 한줄정리(서양음악반)</td>
                            <td>03.19.(금)~06.25.(금)<br />
                            매주[금] 14:00~16:00</td>
                            <td><strong>190,000</strong> </td>
                            <td><a href="#none" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="#none" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 전공음악 All Free Pass  </td>
                            <td>4,200,000 ▶ <strong>2,050,000</strong><br>(약51%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/177089" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/177089" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(3~11월) 전공음악 심화 Free Pass 패키지</td>
                            <td>3,480,000 ▶ <strong>1,900,000</strong><br>(약45%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/178389" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/178390" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="6">전기<br />
                            전자<br />
                            통신</td>
                            <td rowspan="6">최우영</td>
                            <td class="tx-left">[전기·전자·통신 통합] 03~05월 전기자기학<br />
                            <span>* 02.28(일)까지    접수시 할인율 적용 (03.01.이후, 250,000원)</span></td>
                            <td>03.22.(월)~05.17.(월)<br />
                            매주[월) 14:00~</td>
                            <td>250,000 ▶ <strong>225,000 </strong><br>(10%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176679" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176804" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">[전기]    03~06월 최우영 전자회로반 <br />
                            <span>* 02.28(일)까지    접수시 할인율 적용 (03.01.이후, 300,000원)</span></td>
                            <td>03.24.(수)~06.30.(수)<br />
                            매주[수] 09:00~</td>
                            <td>300,000 ▶ <strong>270,000</strong><br>(10%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176678" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176803" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">[전자/통신]    2021년 03~06월 최우영 전자회로반 <br />
                            <span>* 02.28(일)까지    접수시 할인율 적용 (03.01.이후, 400,000원)</span></td>
                            <td>03.24.(수)~06.23.(수)<br />
                            매주[수] 09:00~</td>
                            <td>400,000 ▶ <strong>360,000</strong><br>(10%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176677" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176802" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 최우영 전기 Full 패키지 </td>
                            <td>2,590,000 ▶ <strong>1,500,000</strong><br>(42%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176685" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176811" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 최우영 전자 Full 패키지 </td>
                            <td>2,790,000 ▶ <strong>1,500,000</strong><br>(46%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176686" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176813" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 최우영 통신 Full 패키지 </td>
                            <td>2,590,000 ▶ <strong>1,500,000</strong><br>(42%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176687" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176812" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="8">정보<br />
                            컴퓨터</td>
                            <td rowspan="8">송광진</td>
                            <td class="tx-left">01~03월 정보컴퓨터 내용학 일반과정</td>
                            <td>01.03.(일)~03.28.(일)<br />
                            매주[일] 13:00~20:00</td>
                            <td>600,000 ▶ <strong>5700,000</strong><br>(5%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/175976" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176130" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">03~04월 정보컴퓨터 내용학 기출문제 분석</td>
                            <td>03.05.(금)~04.23.(금)<br />
                            매주[금] 13:00~19:00</td>
                            <td>400,000 ▶ <strong>380,000</strong><br>(5%↓)</td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176132" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176132" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">04~06월 정보컴퓨터 내용학 심화과정 </td>
                            <td>04.04(일)~06.27.(일)<br />
                            매주[일] 13:00~20:00</td>
                            <td>600,000 ▶ <strong>5700,000</strong><br>(5%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/175977" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176131" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">2021년 정보컴퓨터 내용학 C언어 특강</td>
                            <td>인강전용강의</td>
                            <td>200,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/175983" target="_blank" class="btnSt01">신청하기</a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 송광진 정보컴퓨터 내용학 All-In-One    패키지(C언어 포함)</td>
                            <td>2,800,000 ▶ <strong>2,100,000</strong><br>(25%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176005" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176146" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 송광진 정보컴퓨터 내용학 All-In-One    패키지(C언어 제외)</td>
                            <td>2,600,000 ▶ <strong>1,950,000</strong><br>(25%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176263" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176265" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~6월) 송광진 정보컴퓨터 내용학 이론 All Pass</td>
                            <td>1,200,000 ▶ <strong>1,020,000 </strong><br>(15%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176264" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176266" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(3~9월) 송광진 정보컴퓨터 내용학 문풀 All    Pass</td>
                            <td>1,000,000 ▶ <strong>850,000</strong><br>(15%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/178077" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/178078" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2">정컴교육론</td>
                            <td rowspan="2">장순선</td>
                            <td class="tx-left">04월 정보컴퓨터 교육론 일반과정 </td>
                            <td>04.03.(토)~04.24.(토)<br />
                            매주[토] 13:00~17:00</td>
                            <td>200,000 </td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177050" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177051" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년    장순선 정컴 교육론 All Pass패키지 </td>
                            <td>600,000 ▶ <strong>510,000</strong><br>(15%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/177055" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/177054" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3">중국어</td>
                            <td rowspan="3">정경미</td>
                            <td class="tx-left">01~04월 중국어 기본이론</td>
                            <td>01.02.(토)~04.24.(토)<br />
                            매주[토] 09:30~18:30</td>
                            <td>600,000 ▶ <strong>540,000</strong><br>(10%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177140" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177150" target="_blank" class="btnSt02">신청하기</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left">01~04월 중국어 기본독해 </td>
                            <td>2020년 진행강의</td>
                            <td>600,000 ▶ <strong>540,000</strong><br>(10%↓)</td>
                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177141" target="_blank" class="btnSt01">신청하기</a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-left">2021년(1~11월) 정경미 중국어 연간 Full패키지  </td>
                            <td>3,420,000 ▶ <strong>1,710,000</strong><br>(50%↓)</td>
                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/177161" target="_blank" class="btnSt01">신청하기</a></td>
                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/177162" target="_blank" class="btnSt02">신청하기</a></td>
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