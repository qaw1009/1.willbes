@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container adm NSK c_both">
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

    <div class="Section MainVisual">
        <div class="widthAuto">            
            <iframe src="https://www.youtube.com/embed/lrZxQV21DE8?rel=0&modestbranding=1&showinfo=0&&wmode=transparent" frameborder="0" allowfullscreen=""></iframe>            
            <img src="{{ img_url('cop_adm/visual/visual_190213.jpg') }}" alt="전국 4,000명 동시수강">            
        </div>
    </div>

    <div class="Section youtubeWrap">
        <div class="widthAuto smallTit">          
            <p><span>수험생에게 도움이 되는 <strong>특별한 영상!</strong></span></p>
            <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="{{ img_url('cop_adm/icon_add_big.png') }}" alt="동영상 더보기"></a>             
        </div>

        <div class="widthAuto mt80">
            <div class="youtubetabWrap">
                <ul class="youtubetab">
                    <li>
                        <a href="#tab1" class="active">
                            2018년 2차 최종합격생 인터뷰
                            <span>신광은경찰TV</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab2">
                            신의 법칙! 2주만에 1회독?
                            <span>신광은경찰TV</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab3">
                            스타강사가 들려주는 시험 꿀팁!
                            <span>신광은경찰TV</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab4">
                            중경입교식! 그 현장을 가다!
                            <span>신광은경찰TV</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="tab1" class="youtubeBox">
                <iframe src="https://www.youtube.com/embed/GlE9EGMDF98?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div id="tab2" class="youtubeBox">
                <iframe src="https://www.youtube.com/embed/re8w_IFAPS4?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div id="tab3" class="youtubeBox">
                <iframe src="https://www.youtube.com/embed/VEmBnYu8tcc?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div id="tab4" class="youtubeBox">
                <iframe src="https://www.youtube.com/embed/lrZxQV21DE8?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
    </div> 
    <!-- youtubeWrap //-->   

    <div class="Section Flipped">
        <div class="widthAuto">
            <ul class="inner">
                <li class="l1">
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180327_yp" target="_blank">
                        <img src="{{ img_url('cop_adm/flipped/flipped01.jpg') }}" alt="평생0원PASS"> 
                    </a>
                </li>
                <li class="l2">
                    <a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170831_p&topMenuType=O#main" target="_blank">
                        <img src="{{ img_url('cop_adm/flipped/flipped02.jpg') }}" alt="2019 대비 기본이론<">
                    </a>
                </li>
                <li class="l3">
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=On_premium&topMenuType=O" target="_blank">
                        <img src="{{ img_url('cop_adm/flipped/flipped03.jpg') }}" alt="2019 대비 심화이론/기출">
                    </a>
                </li>
            </ul>
            <div class="willbes-Bnr mt60">
                <ul>
                    <li><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_190102_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop_adm/banner/bnr_190108.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="Section Section2 pb110">            
            <div class="widthAuto curriculumTit">                
                <img src="{{ img_url('cop_adm/visual/visual_tit02.jpg') }}" alt="신의법칙 퍼펙트 커리큘럼">
                <a href="#none">신의법칙 자세히 보기 &gt;</a>                
            </div>

            <div class="widthAuto CurriStepBox">
                <ul class="CurriStep">
                    <li class="active">                        
                        <div class="curriculumBox">
                            <span><img src="{{ img_url('cop_adm/icon_bubble.gif') }}" alt="2019대비 진행중"> </span>
                            <div class="Tit">기본과정</div>
                            <div class="subTit">집중연강식 진행</div>
                            <ul class="info">
                                <li>2주마다 개강</li>
                                <li>형소법 → 경찰학 → 형법 진행
                                    <br/> (수사, 행정법 영상반 진행)</li>
                            </ul>                            
                        </div>
                        <a href="#none">OT보기 &gt;</a>                      
                    </li>
                    <li>&nbsp;</li>
                    <li>
                        <div class="curriculumBox">
                            <div class="Tit">심화과정</div>
                            <div class="subTit">프리미엄 심화과정</div>
                            <ul class="info">
                                <li>이론 재정리</li>
                                <li>10주 과정</li>
                            </ul>
                        </div>
                        <a href="#none">OT보기 &gt;</a> 
                    </li>
                    <li>&nbsp;</li>
                    <li>
                        <div class="curriculumBox">
                            <div class="Tit">3개월 필합 풀패키지</div>
                            <div class="subTit">핵심요약/진도별 정리</div>
                            <ul class="info">
                                <li>5주 단권화</li>
                                <li>5주 동형모의고사</li>
                                <li>FINAL 실전 모의고사</li>
                            </ul>
                        </div>
                        <a href="#none">OT보기 &gt;</a> 
                    </li>
                </ul>
                <div class="curriculumTxt">
                    <span class="cop-color">모든 강의</span>를 평생 0원 PASS 하나로 <span class="cop-color">평생 수강</span>하실 수 있습니다.                    
                    <span class="btn"><a href="http://www.willbescop.net/movie/event.html?event_cd=On_180327_yp" target="_blank">평생 0원 PASS 구매하기</a></span>
                </div>
            </div>
            <!-- CurriStepBox //-->        
    </div>

    <div class="Section Section3 mt95">
        <div class="widthAuto">
            <div class="will-big-Tit">
                <div class="small NSK-Thin">여러분의 꿈과 목표를 위해,</div>
                <div class="big NSK-Black"><span class="cop-color">오늘도 최선을 다하는</span> 윌비스 신광은 경찰팀</div>
            </div>
            <ul class="ProfCopBox mt60 mb100">
                <li class="sliderHotIssue nSlider pick">
                    <div class="sliderNum">
                        <div><img src="{{ img_url('cop_adm/prof/prof_ske.jpg') }}"></div>
                        <div><img src="{{ img_url('cop_adm/prof/prof_ske02.jpg') }}"></div>
                    </div>
                </li>
                <li class="sliderHotIssue nSlider pick">
                    <div class="sliderNum">
                        <div><img src="{{ img_url('cop_adm/prof/prof_jjh.jpg') }}"></div>
                        <div><img src="{{ img_url('cop_adm/prof/prof_jjh02.jpg') }}"></div>
                    </div>
                </li>
                <li>
                    <img src="{{ img_url('cop_adm/prof/prof_kwu.jpg') }}" alt="김원욱">
                </li>
            </ul>
        </div>
    </div>

    <div class="Section Section2 mt90 mb90">
        <div class="widthAuto">  
            <img src="{{ img_url('cop_adm/visual/visual_03.jpg') }}" alt="합격수기">
        </div>
    </div>

    <div class="Section Section3 mt100 pb90">        
        <div class="widthAuto">
            <div class="widthAuto smallTit">          
                <p><span>기출문제와 강의를 한 곳에 <strong>기출강의!</strong></span></p>            
            </div>
            <div class="will-big-Tit pt100">
                <div class="small NSK-Thin">출제경향이 매번 반복되는 경찰공무원 시험.</div>
                <div class="big NSK-Black"><span class="cop-color">날카롭게 분석된</span> 기출강의<span class="small NSK-Thin">로 마무리해야합니다.</span></div>
            </div>
            <div class="SpecialLecBox mt60">
                <dl>
                    <dt class="nLec p_re">
                        <div class="infoBox">
                            <div class="infoTit">
                                <div class="small NSK-Thin">경행경채</div>
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
    <!-- 기출강의// -->
    
    <div class="Section HotIssue pt50 pb50">
        <div class="widthAuto">  
            <div class="widthAuto smallTit">          
                <p><span>학원 최신 소식을 한 눈에! <strong>학원 Hot Issue</strong></span></p>            
            </div>
        </div>
        <ul class="widthAuto mt60">
            <li><a href="#none"><img src="{{ img_url('cop_adm/banner/bnr_onHiA01.jpg') }}" alt="배너명"></a></li>
            <li><a href="#none"><img src="{{ img_url('cop_adm/banner/bnr_onHiB01.jpg') }}" alt="배너명"></a></li>
            <li class="sliderHotIssue nSlider pick">
                <div class="sliderNum">
                    <div><img src="{{ img_url('cop_adm/banner/bnr_onHiC01.jpg') }}"></div>
                    <div><img src="{{ img_url('cop_adm/banner/bnr_onHiC01.jpg') }}"></div>
                </div>
            </li>
        </ul>
    </div>
    <!-- HotIssue //-->    

    <div class="Section Bnr mt40 mb70">
        <div class="widthAuto">
            <div class="widthAuto smallTit">          
                <p><span>신광은경찰 Hot Pick! <strong>온라인특강/이벤트</strong></span></p>            
            </div>
            <div class="willbes-Bnr mt60">
                <ul>
                    <li><a href="http://www.willbescop.net/movie/event.html?event_cd=On_180604_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop_adm/banner/bnr_190109.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Section5 mb70">
        <div class="widthAuto">
            <div class="sliderPick nSlider pick">
                <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> Hot Pick</div>
                <div class="pickBox pick1">
                    <a href="#none"><img src="{{ img_url('cop_adm/event/evt_190101.jpg') }}"></a>
                </div>
                <div class="pickBox pick2">
                    <a href="#none"><img src="{{ img_url('cop_adm/event/evt_190102.jpg') }}"></a>
                </div>
            </div>
            <div class="sliderEvt nSlider pick">
                <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> 특강/이벤트</div>
                <ul>
                    <li><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_181226_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop_adm/event/evt_190103.jpg') }}"></a></li>
                    <li>
                        <a href="#none"><img src="{{ img_url('cop_adm/event/evt_190105.jpg') }}" alt="김원욱 형법 1개년 최신기출/판례"></a>
                        <!--div class="sliderNum">
                            <div><img src="{{ img_url('cop_adm/event/evt_190104.jpg') }}"></div>
                            <div><img src="{{ img_url('cop_adm/event/evt_190105.jpg') }}"></div>
                        </div-->
                    </li>
                </ul>
            </div>

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
                                            <img class="coverImg" src="{{ img_url('cop_adm/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_4.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">경찰영어 하승민</div>
                                            <div class="infoTxt">
                                                2019 하승민 영어 기본이론 (18년 11월)<br/>
                                                <span class="small">56강 /80일 / 업데이트 완료</span><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="LecBox">
                                    <a href="#none">
                                        <div class="imgBox cover">
                                            <img class="coverImg" src="{{ img_url('cop_adm/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_3.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">경찰학개론 장정훈</div>
                                            <div class="infoTxt">
                                                2018 장정훈 경찰학개론 기본이론 (18년 4월)<br/>
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
                                            <img class="coverImg" src="{{ img_url('cop_adm/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_2.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">한국사 오태진</div>
                                            <div class="infoTxt">
                                                2018년 1차대비 오태진 한국사 Final 실전모의고사...<br/>
                                                <span class="small">56강 / 80일 / 업데이트 완료</span><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="LecBox">
                                    <a href="#none">
                                        <div class="imgBox cover">
                                            <img class="coverImg" src="{{ img_url('cop_adm/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_1.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">한국사 원유철</div>
                                            <div class="infoTxt">
                                                2019 원유철 한국사 기본이론 (근현대사) (18년 9월)<br/>
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
                                            <img class="coverImg" src="{{ img_url('cop_adm/prof_cover.png') }}">
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
                                            <img class="coverImg" src="{{ img_url('cop_adm/prof_cover.png') }}">
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
                                            <img class="coverImg" src="{{ img_url('cop_adm/prof_cover.png') }}">
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
                                            <img class="coverImg" src="{{ img_url('cop_adm/prof_cover.png') }}">
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
                    <div class="will-nlistTit p_re">공지사항 <a href="https://cop.dev.willbes.net/support/notice/index" target="_blank" class="btn-add"><img src="{{ img_url('cop_adm/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>[공지] 경찰3과 과목별 만점자를 소개합니다.</span><img src="{{ img_url('cop_adm/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>하승민 영어 2018년 3차 시험 적중!</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원(순경)채용 공고 입니다.</span></a><span class="date">2018-08-24</span></li>
                        <li><a href="#none"><span>[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</span></a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">시험공고 <a href="https://cop.dev.willbes.net/support/examAnnouncement/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop_adm/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원(순경)채용 필기시험 문제 및 가답안</span><img src="{{ img_url('cop_adm/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원 채용 필기시험 문제 및 가답안</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>2018년 제3차 경찰공무원 채용시험 원서접수일정 안내입니다.</span></a><span class="date">2018-08-24</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</span></a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">수험뉴스 <a href="https://cop.dev.willbes.net/support/examNews/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop_adm/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>경찰청, 경찰간부후보생 68기 최종합격자 명단 입니다. 확인 바랍니다.</span><img src="{{ img_url('cop_adm/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>12월 22일, 경찰공무원 합격의 기회가 다가옵니다.</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>제주자치경찰 확대 시험운영 추진</span></a><span class="date">2018-08-24</span></li>
                        <li><a href="#none"><span>순경 3차 '필기시험 대비, 기출 분석으로 철저하게'</span></a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="Section Section7 mb100">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesCenter">
                        <div class="centerTit">신광은 경찰 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop_adm/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop_adm/icon_cecenter2.png') }}">
                                    <div class="nTxt">모바일<br/>서비스</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop_adm/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop_adm/icon_cecenter4.png') }}">
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
                        <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="{{ img_url('cop_adm/quick/quick_190108.jpg') }}" alt="배너명"></a></div>
                        <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="{{ img_url('cop_adm/quick/quick_190109.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop_adm/quick/quick_190110.jpg') }}" alt="배너명"></a>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop_adm/quick/quick_talk.jpg') }}" alt="배너명"></a>
            </li>
        </ul>
    </div>
</div>
<!-- End Container -->

<script type="text/javascript">        
        var tab1_url = "https://www.youtube.com/embed/GlE9EGMDF98?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/re8w_IFAPS4?rel=0&modestbranding=1&showinfo=0";
        var tab3_url = "https://www.youtube.com/embed/VEmBnYu8tcc?rel=0&modestbranding=1&showinfo=0";
        var tab4_url = "https://www.youtube.com/embed/lrZxQV21DE8?rel=0&modestbranding=1&showinfo=0";

        $(function() {
        $(".youtubeBox").hide(); 
        $(".youtubeBox:first").show();
        $(".youtubetab li a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab3"){
                    html_str = "<iframe src='"+tab3_url+"' frameborder='0' allowfullscreen></iframe>";                   
                }else if(activeTab == "#tab4"){
                    html_str = "<iframe src='"+tab4_url+"' frameborder='0' allowfullscreen></iframe>";
                }
                $(".youtubetab a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".youtubeBox").hide(); 
                $(".youtubeBox").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
                });
            });		
</script>

@stop