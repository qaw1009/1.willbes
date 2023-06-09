@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container cop NSK c_both">
    <div class="Menu widthAuto NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li class="dropdown">
                    <a href="#none">PASS</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">PASS</li>
                            <li><a href="#none">0원 PASS</a></li>
                            <li><a href="#none">6개월 PASS</a></li>
                            <li><a href="#none">12개월 PASS</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="#none">추천 패키지</a></li>
                            <li><a href="#none">선택 패키지</a></li>
                            <li><a href="#none">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div id="newTopDday" class="newTopDday">
        <div class="widthAuto">
            <div id="ddaytime">
                <ul>
                    <li class="txt toptxt">
                        <div class="small">3차 추가채용</div>
                        <div class="big"><span class="cop-color">최종</span> 합격예측서비스</div>
                    </li>
                    <li><img id="dd1" src="{{ img_url('cop/number/0.png') }}"></li>
                    <li><img id="dd2" src="{{ img_url('cop/number/0.png') }}"></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="{{ img_url('cop/number/0.png') }}"></li>
                    <li><img id="hh2" src="{{ img_url('cop/number/0.png') }}"></li>
                    <li><strong>시간</strong></li>
                    <li><img id="mm1" src="{{ img_url('cop/number/0.png') }}"></li>
                    <li><img id="mm2" src="{{ img_url('cop/number/0.png') }}"></li>
                    <li><strong>분</strong></li>
                    <li><img id="ss1" src="{{ img_url('cop/number/0.png') }}"></li>
                    <li><img id="ss2" src="{{ img_url('cop/number/0.png') }}"></li>
                    <li><strong>초</strong></li>
                    <li class="txt lasttxt">
                        <div class="big"><span class="cop-color">3월 29일(금) 발표</span></div>
                        <div class="btn"><a href="http://www.willbescop.net/movie/event.html?event_cd=On_181228_p&topMenuType=O" target="_blank">최종합격예측 참여 &gt;</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section MainVisual">
        <div class="widthAuto">
            <img src="{{ img_url('cop/visual/visual_190108.jpg') }}">
        </div>
    </div>
    <div class="Section Flipped">
        <div class="widthAuto">
            <ul class="inner">
                <li class="l1">
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180327_yp" target="_blank">
                        <div class="f-tit tit1 NSK"># 평생0원PASS</div>
                        <span class="wrap_ban front">
                            <img src="{{ img_url('cop/flipped/flipped_front_190101.png') }}">
                        </span>
                        <span class="wrap_ban back">
                            <img src="{{ img_url('cop/flipped/flipped_back_190101.png') }}">
                        </span>
                    </a>
                </li>
                <li class="l2">
                    <a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170831_p&topMenuType=O#main" target="_blank">
                        <div class="f-tit tit2 NSK"># 2019 대비 기본이론</div>
                        <span class="wrap_ban front">
                            <img src="{{ img_url('cop/flipped/flipped_front_190102.png') }}">
                        </span>
                        <span class="wrap_ban back">
                            <img src="{{ img_url('cop/flipped/flipped_back_190102.png') }}">
                        </span>
                    </a>
                </li>
                <li class="l3">
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=On_premium&topMenuType=O" target="_blank">
                        <div class="f-tit tit3 NSK"># 2019 대비 심화이론/기출</div>
                        <span class="wrap_ban front">
                            <img src="{{ img_url('cop/flipped/flipped_front_190103.png') }}">
                        </span>
                        <span class="wrap_ban back">
                            <img src="{{ img_url('cop/flipped/flipped_back_190103.png') }}">
                        </span>
                    </a>
                </li>
            </ul>
            <div class="willbes-Bnr mt60">
                <ul>
                    <li><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_190102_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop/banner/bnr_190108.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Section1 mt80 mb100">
        <div class="widthAuto">
            <div class="will-big-Tit">
                <div class="small NSK-Thin">더욱 더 완벽하고 강력하게 무장한 신광은경찰팀</div>
                <div class="big NSK-Black"><span class="cop-color">빈틈없는</span> 커리큘럼<span class="small NSK-Thin">으로 합격을 약속합니다.</span></div>
            </div>

            <div class="">
                <div class="cswRollingSlider">
                    <ul class="rollingTabs cswRolling">
                        <li id="curritab1"><img src="{{ img_url('cop//icon_bubble.gif') }}"><a data-slide-index="0" href="#curri1" class="active-slide">●<br/>기본과정</a></li>
                        <li id="curritab2"><a data-slide-index="1" href="#curri2">●<br/>심화과정</a></li>
                        <li id="curritab3"><a data-slide-index="2" href="#curri3">●<br/>3개월필합풀패키지</a></li>
                        <li id="curritab4"><a data-slide-index="3" href="#curri4">●<br/>특강</a></li>
                        <li id="curritab5"><a data-slide-index="4" href="#curri5">●<br/>모의고사/실용글쓰기</a></li>
                        <li id="curritab6"><a data-slide-index="5" href="#curri6">●<br/>인·적성/면접</a></li>
                    </ul>
                </div>
                <div class="cswSlider sliderCurriList mt40">
                    <ul class="CurriSwipe cswRolling">
                        <li id="curri1">
                            <a href="#curritab1" data-slide-index="0">
                                <div class="curriculumBox">
                                    <div class="Tit">기본과정</div>
                                    <div class="subTit">집중연강식 진행</div>
                                    <ul class="info">
                                        <li>· 영어 매달 초 개강</li>
                                        <li>· 2주마다  형소법  →  경찰학<br/>→  한국사  →  형법 진행</li>
                                    </ul> 
                                </div>
                            </a>
                        </li>
                        <li id="curri2">
                            <a href="#curritab2" data-slide-index="1">
                                <div class="curriculumBox">
                                    <div class="Tit">심화과정</div>
                                    <div class="subTit">프리미엄 심화과정</div>
                                    <ul class="info">
                                        <li>· 이론 재정리</li>
                                        <li>· 10주 과정</li>
                                    </ul>
                                </div>
                            </a>
                        </li>
                        <li id="curri3">
                            <a href="#curritab3" data-slide-index="2">
                                <div class="curriculumBox">
                                    <div class="Tit">3개월 필합 풀패키지</div>
                                    <div class="subTit">핵심요약/진도별 정리</div>
                                    <ul class="info">
                                        <li>· 5주 단권화</li>
                                        <li>· 5주 동형모의고사</li>
                                        <li>· FINAL 실전 모의고사</li>
                                    </ul>
                                </div>
                            </a>
                        </li>
                        <li id="curri4">
                            <a href="#curritab4" data-slide-index="3">
                                <div class="curriculumBox">
                                    <div class="Tit">특강</div>
                                    <div class="subTit">집중약점 보완</div>
                                    <ul class="info">
                                        <li>· 과목별 찍기특강</li>
                                    </ul>
                                </div>
                            </a>
                        </li>
                        <li id="curri5">
                            <a href="#curritab5" data-slide-index="4">
                                <div class="curriculumBox">
                                    <div class="Tit">모의고사/실용글쓰기</div>
                                    <div class="subTit">실전력 극대화</div>
                                    <ul class="info">
                                        <li>· 전국 모의고사<br/>&nbsp;&nbsp; (문제풀이기간 제외)</li>
                                        <li>· 실용글쓰기</li>
                                    </ul>
                                </div>
                            </a>
                        </li>
                        <li id="curri6">
                            <a href="#curritab6" data-slide-index="5">
                                <div class="curriculumBox">
                                    <div class="Tit">인·적성/면접</div>
                                    <div class="subTit">집단+개별면접대비</div>
                                    <ul class="info">
                                        <li>· 2달 완성</li>
                                        <li>· 인·적성/면접특강</li>
                                    </ul>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="curriculumTxt">
                이 <span class="cop-color">모든 강의</span>를 평생 0원 PASS 하나로 <span class="cop-color">평생 수강</span>하실 수 있습니다.                    
                <span class="btn"><a href="http://www.willbescop.net/movie/event.html?event_cd=On_180327_yp" target="_blank">평생 0원 PASS 구매하기</a></span>
            </div>
        </div>
    </div>
    <div class="Section Section2 pt100 pb90">
        <div class="widthAuto">
            <div class="will-big-Tit">
                <div class="small NSK-Thin">출제경향이 매번 반복되는 경찰공무원 시험.</div>
                <div class="big NSK-Black"><span class="cop-color">날카롭게 분석된</span> 기출강의<span class="small NSK-Thin">로 마무리해야합니다.</span></div>
            </div>
            <div class="SpecialLecBox mt60">
                <dl>
                    <dt class="nLec p_re">
                        <div class="infoBox">
                            <div class="infoTit">
                                <div class="small NSK-Thin">일반 / 경행 / 101단</div>
                                <div class="big NSK-Black">
                                    최근 5개년<br/>
                                    기출문제
                                </div>
                                <div class="btn">
                                    <div class="btn-sbj"><a href="http://www.willbescop.net/movie/event.html?event_cd=On_181126_y&topMenuType=O" target="_blank">+ &nbsp; 문제 더 보기</a></div>
                                    <div class="btn-lec mt5"><a href="https://cop.dev.willbes.net/lecture/index/cate/3001/pattern/free?course_idx=20032" target="_blank">+ &nbsp; 강의 더 보기</a></div>
                                </div>
                            </div>
                            <div class="infoList">
                                <ul class="List-Table">
                                    <li><a href="#none"><span>[2018년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</a><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
                                    <li><a href="#none"><span>[2018년 1차]</span>경찰공무원(일반/101단/전의경) 채용시험 기출</a><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
                                    <li><a href="#none"><span>[2018년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</a><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
                                    <li><a href="#none"><span>[2018년 1차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</a><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
                                </ul>
                            </div>
                        </div>
                    </dt>
                </dl>
            </div>
        </div>
    </div>
    <div class="Section Section3 mt95">
        <div class="widthAuto">
            <div class="will-big-Tit">
                <div class="small NSK-Thin">여러분의 꿈과 목표를 위해,</div>
                <div class="big NSK-Black"><span class="cop-color">오늘도 최선을 다하는</span> 윌비스 신광은 경찰팀</div>
            </div>
            <ul class="ProfBox ProfCopBox mt60 mb100">
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3001/prof-idx/50082/?subject_idx=10028&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95" target="_blank"><img src="{{ img_url('cop/prof/prof_190101.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3001/prof-idx/50083/?subject_idx=10030&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0" target="_blank"><img src="{{ img_url('cop/prof/prof_190102.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3001/prof-idx/50087/?subject_idx=10032&subject_name=%ED%98%95%EB%B2%95" target="_blank"><img src="{{ img_url('cop/prof/prof_190103.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3001/prof-idx/50088/?subject_idx=10008&subject_name=%EC%98%81%EC%96%B4" target="_blank"><img src="{{ img_url('cop/prof/prof_190104.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3001/prof-idx/50089/?subject_idx=10011&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" target="_blank"><img src="{{ img_url('cop/prof/prof_190105.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3001/prof-idx/50090/?subject_idx=10011&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" target="_blank"><img src="{{ img_url('cop/prof/prof_190106.png') }}"></a></li>
                <!--
                <li class="p_re">         
                    <div class="cSlider copSlider AbsControls">
                        <div class="sliderControls">
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_190101.png') }}"></a></div>
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_190107.png') }}"></a></div>
                        </div>
                    </div>
                </li>
                <li class="p_re">         
                    <div class="cSlider copSlider AbsControls">
                        <div class="sliderControls">
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_190102.png') }}"></a></div>
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_190108.png') }}"></a></div>
                        </div>
                    </div>
                </li>
                -->
            </ul>
        </div>
    </div>
    <div class="Section Section4 pt100 pb90">
        <div class="widthAuto">
            <div class="will-big-Tit big-Tit-line pb50">
                <div class="big NSK-Black"><span class="cop-color">1,881명*</span> 최종합격</div>
                <div class="small NSK-Thin mt10">합격의 기쁨을 나눌 다음 차례, 바로 당신입니다.</div>
                <div class="will-subTit sm mt30">* 2018.경찰공무원 1차최종, 2차 팔가합격인원 기준</div>
            </div> 
            <div class="sliderPassList cSlider mt40">
                <div class="sliderControlsTM">
                    <div>
                        <div class="passBox">
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank">
                                <div class="name">합격자 오희*</div>
                                <div class="img p_re">
                                    <img class="cover" src="{{ img_url('cop/pass/cover.png') }}">   
                                    <img src="{{ img_url('cop/pass/user_190101.png') }}">
                                </div>
                                <div class="cmt">
                                    늦은 나이에 시작한<br/>
                                    도전이었지만<br/>
                                    끝내 해냈습니다.<br/>
                                </div>
                            </a>
                        </div>
                        <div class="passBox">
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank">
                                <div class="name">합격자 김태*</div>
                                <div class="img p_re">
                                    <img class="cover" src="{{ img_url('cop/pass/cover.png') }}"> 
                                    <img src="{{ img_url('cop/pass/user_190102.png') }}">
                                </div>
                                <div class="cmt">
                                    절대 포기마세요.<br/>
                                    끝까지 앉아있는<br/>
                                    여러분이 승자입니다.<br/>
                                </div>
                            </a>
                        </div>
                        <div class="passBox">
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank">
                                <div class="name">합격자 이진*</div>
                                <div class="img p_re">
                                    <img class="cover" src="{{ img_url('cop/pass/cover.png') }}"> 
                                    <img src="{{ img_url('cop/pass/user_190103.png') }}">
                                </div>
                                <div class="cmt">
                                    광은장학회 덕분에<br/>
                                    합격의 기쁨을<br/>
                                    누릴 수 있었습니다.<br/>
                                </div>
                            </a>
                        </div>
                        <div class="passBox">
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank">
                                <div class="name">합격자 최원*</div>
                                <div class="img p_re">
                                    <img class="cover" src="{{ img_url('cop/pass/cover.png') }}"> 
                                    <img src="{{ img_url('cop/pass/user_190104.png') }}">
                                </div>
                                <div class="cmt">
                                    합격자 명단을 확인하는<br/>
                                    마지막 순간까지<br/>
                                    최선을 다하세요.<br/>
                                </div>
                            </a>
                        </div>
                        <div class="passBox">
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank">
                                <div class="name">합격자 양동*</div>
                                <div class="img p_re">
                                    <img class="cover" src="{{ img_url('cop/pass/cover.png') }}"> 
                                    <img src="{{ img_url('cop/pass/user_190105.png') }}">
                                </div>
                                <div class="cmt">
                                    무조껀 신광은경찰팀이<br/>
                                    제시하는 공부량을<br/>
                                    따르세요.<br/>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="passBox">
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank">
                                <div class="name">합격자 오희*</div>
                                <div class="img p_re">
                                    <img class="cover" src="{{ img_url('cop/pass/cover.png') }}">   
                                    <img src="{{ img_url('cop/pass/user_190101.png') }}">
                                </div>
                                <div class="cmt">
                                    늦은 나이에 시작한<br/>
                                    도전이었지만<br/>
                                    끝내 해냈습니다.<br/>
                                </div>
                            </a>
                        </div>
                        <div class="passBox">
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank">
                                <div class="name">합격자 김태*</div>
                                <div class="img p_re">
                                    <img class="cover" src="{{ img_url('cop/pass/cover.png') }}"> 
                                    <img src="{{ img_url('cop/pass/user_190102.png') }}">
                                </div>
                                <div class="cmt">
                                    절대 포기마세요.<br/>
                                    끝까지 앉아있는<br/>
                                    여러분이 승자입니다.<br/>
                                </div>
                            </a>
                        </div>
                        <div class="passBox">
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank">
                                <div class="name">합격자 이진*</div>
                                <div class="img p_re">
                                    <img class="cover" src="{{ img_url('cop/pass/cover.png') }}"> 
                                    <img src="{{ img_url('cop/pass/user_190103.png') }}">
                                </div>
                                <div class="cmt">
                                    광은장학회 덕분에<br/>
                                    합격의 기쁨을<br/>
                                    누릴 수 있었습니다.<br/>
                                </div>
                            </a>
                        </div>
                        <div class="passBox">
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank">
                                <div class="name">합격자 최원*</div>
                                <div class="img p_re">
                                    <img class="cover" src="{{ img_url('cop/pass/cover.png') }}"> 
                                    <img src="{{ img_url('cop/pass/user_190104.png') }}">
                                </div>
                                <div class="cmt">
                                    합격자 명단을 확인하는<br/>
                                    마지막 순간까지<br/>
                                    최선을 다하세요.<br/>
                                </div>
                            </a>
                        </div>
                        <div class="passBox">
                            <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank">
                                <div class="name">합격자 양동*</div>
                                <div class="img p_re">
                                    <img class="cover" src="{{ img_url('cop/pass/cover.png') }}"> 
                                    <img src="{{ img_url('cop/pass/user_190105.png') }}">
                                </div>
                                <div class="cmt">
                                    무조껀 신광은경찰팀이<br/>
                                    제시하는 공부량을<br/>
                                    따르세요.<br/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Section Bnr mt40 mb70">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="http://www.willbescop.net/movie/event.html?event_cd=On_180604_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop/banner/bnr_190109.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Section5 mb70">
        <div class="widthAuto">
            <div class="sliderPick nSlider pick">
                <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> Hot Pick</div>
                <div class="pickBox pick1">
                    <a href="#none"><img src="{{ img_url('cop/event/evt_190101.jpg') }}"></a>
                    <!--
                    <div class="sliderNum">
                        <div><a href="#none"><img src="{{ img_url('cop/event/evt_190101.jpg') }}"></a></div>
                        <div><a href="#none"><img src="{{ img_url('cop/event/evt_190102.jpg') }}"></a></div>
                    </div>
                    -->
                </div>
                <div class="pickBox pick2">
                    <a href="#none"><img src="{{ img_url('cop/event/evt_190102.jpg') }}"></a>
                    <!--
                    <div class="sliderNum">
                        <div><a href="#none"><img src="{{ img_url('cop/event/evt_190101.jpg') }}"></a></div>
                        <div><a href="#none"><img src="{{ img_url('cop/event/evt_190102.jpg') }}"></a></div>
                    </div>
                    -->
                </div>
            </div>
            <div class="sliderEvt nSlider pick">
                <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> 특강/이벤트</div>
                <ul>
                    <li><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_181226_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop/event/evt_190103.jpg') }}"></a></li>
                    <li>
                        <div class="sliderNum">
                            <div><img src="{{ img_url('cop/event/evt_190104.jpg') }}"></div>
                            <div><img src="{{ img_url('cop/event/evt_190105.jpg') }}"></div>
                        </div>
                    </li>
                </ul>
            </div>
            <!--
            <div class="willbes-Bnr pt4">
                <ul>
                    <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_190110.jpg') }}"></a></li>
                </ul>
            </div>
            -->
        </div>
    </div>
    <div class="Section Section6 mb50">
        <div class="widthAuto">
            <div class="nNoticeBox two">
                <div class="recommendLec Lec widthAuto550 f_left p_re">
                    <div class="will-nlistTit">추천강좌</div>
                    <div class="nSliderTM graySlider AbsControls">
                        <div class="sliderNumTM">
                            <div>
                                <div class="LecBox">
                                    <a href="#none">
                                        <div class="imgBox cover">
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_4.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">경찰영어 하승민</div>
                                            <div class="infoTxt">
                                                2019 하승민 영어 기본이론<br/>
                                                (18년 11월)<br/>
                                                <span class="small">56강 /80일 / 업데이트 완료</span><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="LecBox">
                                    <a href="#none">
                                        <div class="imgBox cover">
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_3.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">경찰학개론 장정훈</div>
                                            <div class="infoTxt">
                                                2018 장정훈 경찰학개론<br/>
                                                기본이론 (18년 4월)<br/>
                                                <span class="small">56강 / 80일 / 업데이트 완료</span><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="LecBox">
                                    <a href="#none">
                                        <div class="imgBox cover">
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_2.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">한국사 오태진</div>
                                            <div class="infoTxt">
                                                2018년 1차대비 오태진<br/>
                                                한국사 Final 실전모의고사...<br/>
                                                <span class="small">56강 / 80일 / 업데이트 완료</span><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="LecBox">
                                    <a href="#none">
                                        <div class="imgBox cover">
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_1.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">한국사 원유철</div>
                                            <div class="infoTxt">
                                                2019 원유철 한국사 기본이론<br/>
                                                (근현대사) (18년 9월)<br/>
                                                <span class="small">56강 / 80일 / 업데이트 완료</span><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="newLec Lec widthAuto550 f_right p_re">
                    <div class="will-nlistTit">신규강좌</div>
                    <div class="nSliderTM graySlider AbsControls">
                        <div class="sliderNumTM">
                            <div>
                                <div class="LecBox">
                                    <a href="#none">
                                        <div class="imgBox cover">
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_2.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">한국사 오태진</div>
                                            <div class="infoTxt">
                                                2018년 1차대비 오태진<br/>
                                                한국사 Final 실전모의고사...<br/>
                                                <span class="small">56강 / 80일 / 업데이트 완료</span><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="LecBox">
                                    <a href="#none">
                                        <div class="imgBox cover">
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_1.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">한국사 원유철</div>
                                            <div class="infoTxt">
                                                2019 원유철 한국사 기본이론<br/>
                                                (근현대사) (18년 9월)<br/>
                                                <span class="small">56강 / 80일 / 업데이트 완료</span><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="LecBox">
                                    <a href="#none">
                                        <div class="imgBox cover">
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_4.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">경찰영어 하승민</div>
                                            <div class="infoTxt">
                                                2019 하승민 영어 기본이론<br/>
                                                (18년 11월)<br/>
                                                <span class="small">56강 /80일 / 업데이트 완료</span><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="LecBox">
                                    <a href="#none">
                                        <div class="imgBox cover">
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_3.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">경찰학개론 장정훈</div>
                                            <div class="infoTxt">
                                                2018 장정훈 경찰학개론<br/>
                                                기본이론 (18년 4월)<br/>
                                                <span class="small">56강 / 80일 / 업데이트 완료</span><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nNoticeBox three mt50">
                <div class="noticeList widthAuto350 f_left">
                    <div class="will-nlistTit p_re">공지사항 <a href="https://cop.dev.willbes.net/support/notice/index" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>[공지] 경찰3과 과목별 만점자를 소개합니다.</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>하승민 영어 2018년 3차 시험 적중!</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원(순경)채용 공고 입니다.</span></a><span class="date">2018-08-24</span></li>
                        <li><a href="#none"><span>[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</span></a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">시험공고 <a href="https://cop.dev.willbes.net/support/examAnnouncement/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원(순경)채용 필기시험 문제 및 가답안</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원 채용 필기시험 문제 및 가답안</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>2018년 제3차 경찰공무원 채용시험 원서접수일정 안내입니다.</span></a><span class="date">2018-08-24</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</span></a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">수험뉴스 <a href="https://cop.dev.willbes.net/support/examNews/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>경찰청, 경찰간부후보생 68기 최종합격자 명단 입니다. 확인 바랍니다.</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>12월 22일, 경찰공무원 합격의 기회가 다가옵니다.</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>제주자치경찰 확대 시험운영 추진</span></a><span class="date">2018-08-24</span></li>
                        <li><a href="#none"><span>순경 3차 '필기시험 대비, 기출 분석으로 철저하게'</span></a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="Section Section7 mb50">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesCenter">
                        <div class="centerTit">신광은 경찰 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                    <div class="nTxt">모바일<br/>서비스</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                    <div class="nTxt">1:1<br/>고객지원</div>
                                </a>
                            </li>
                        </ul>
                    </dt>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 1</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-0336</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    월-토: 09시~ 22시<br/>
                                    일요일: 09시~ 20시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>
                </dl>
            </div>
            
        </div>
    </div>
    <div id="QuickMenu" class="MainQuickMenu">
        <ul>
            <li>
                <div class="QuickDdayBox">
                    <div class="q_tit">3차 필기시험</div>
                    <div class="q_day">2018.12.12</div>
                    <div class="q_dday NSK-Blac">D-5</div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="{{ img_url('cop/quick/quick_190108.jpg') }}"></a></div>
                        <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="{{ img_url('cop/quick/quick_190109.jpg') }}"></a></div>
                    </div>
                </div>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_190110.jpg') }}"></a>
            </li>
        </ul>
    </div>
</div>
<!-- End Container -->
@stop