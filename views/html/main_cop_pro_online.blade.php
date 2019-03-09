@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container pro NSK c_both">
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
            <img src="{{ img_url('cop/visual/visual_190213.jpg') }}" alt="전국 4,000명 동시수강">            
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto Profinfo">          
            <img src="{{ img_url('cop_pro/visual/visual_190227_01.jpg') }}" alt="전문화된 교수진">
            <span class="btn01"><a href="https://cop.dev.willbes.net/professor/show/cate/3006/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95">자세히보기 &gt;</a></span>
            <span class="btn02"><a href="https://cop.dev.willbes.net/professor/show/cate/3006/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95">자세히보기 &gt;</a></span>
            <ul>
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3006/prof-idx/50553/?subject_idx=1024&subject_name=%EC%A3%BC%EA%B4%80%EC%8B%9D%ED%96%89%EC%A0%95%EB%B2%9"><img src="{{ img_url('cop_pro/banner/bnr_372_01.jpg') }}" alt="경찰행정학 이성호"></a></li>
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3006/prof-idx/50115/?subject_idx=1027&subject_name=%EA%B2%BD%EC%B0%B0%EC%8B%A4%EB%AC%B42"><img src="{{ img_url('cop_pro/banner/bnr_372_02.jpg') }}" alt="경찰실무 송광호"></a></li>
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3006/prof-idx/50277/?subject_idx=1023&subject_name=%EA%B2%BD%EC%B0%B0%EC%8B%A4%EB%AC%B4%EC%A2%85%ED%95%A9"><img src="{{ img_url('cop_pro/banner/bnr_372_03.jpg') }}" alt="실무종합 조용석"></a></li>
            </ul>           
        </div>
    </div> 

    <div class="Section mt90">
        <div class="widthAuto">           
            <div class="will-nTit bd-none">승진대비 <span class="tx-color">계급&amp;직렬</span> 승진 PASS</div>
            <ul class="proPAss">
                <li><a href="#none"><img src="{{ img_url('cop_pro/banner/bnr_557_01.jpg') }}" alt="계급별 12개월 PASS"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop_pro/banner/bnr_557_02.jpg') }}" alt="교수별 12개월 PASS"></a></li>
            </ul>            
        </div>
    </div>

    <div class="Section mt90">
        <div class="widthAuto">           
            <div class="will-nTit bd-none">윌비스 <span class="tx-color">신광은경찰</span> MOU 협약식</div>
            <div class="mou">
                <ul>
                    <li><img src="{{ img_url('cop_pro/visual/visual_556_01.jpg') }}" alt="MOU 협약식"></li>
                    <li><img src="{{ img_url('cop_pro/visual/visual_556_02.jpg') }}" alt="MOU 협약식"></li>
                    <li><img src="{{ img_url('cop_pro/visual/visual_556_03.jpg') }}" alt="MOU 협약식"></li>
                    <li><img src="{{ img_url('cop_pro/visual/visual_556_04.jpg') }}" alt="MOU 협약식"></li>
                </ul> 
            <div>           
        </div>
    </div>

    <div class="Section Section3 mt90">
        <div class="widthAuto">
            <div class="will-nTit bd-none">승진합격을 위한 윌비스 <span class="tx-color">경찰승진</span> 교수님</div>
            <ul class="ProfCopBox mt20 mb100">
                <li>
                    <img src="{{ img_url('cop_pro/prof/prof_ske.jpg') }}" alt="신광은">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="https://cop.dev.willbes.net/professor/show/cate/3006/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95" >교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop_pro/prof/prof_kwu.jpg') }}" alt="김원욱">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="https://cop.dev.willbes.net/professor/show/cate/3006/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95" >교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop_pro/prof/prof_jys.jpg') }}" alt="조용석">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="https://cop.dev.willbes.net/professor/show/cate/3006/prof-idx/50553/?subject_idx=1024&subject_name=%EC%A3%BC%EA%B4%80%EC%8B%9D%ED%96%89%EC%A0%95%EB%B2%95" >교수소개</a></li>
                    </ul>
                </li>                
                <li>
                    <img src="{{ img_url('cop_pro/prof/prof_skh.jpg') }}" alt="송광호">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="https://cop.dev.willbes.net/professor/show/cate/3006/prof-idx/50115/?subject_idx=1027&subject_name=%EA%B2%BD%EC%B0%B0%EC%8B%A4%EB%AC%B42" >교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop_pro/prof/prof_lsh.jpg') }}" alt="이성호">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="https://cop.dev.willbes.net/professor/show/cate/3006/prof-idx/50277/?subject_idx=1023&subject_name=%EA%B2%BD%EC%B0%B0%EC%8B%A4%EB%AC%B4%EC%A2%85%ED%95%A9" >교수소개</a></li>
                    </ul>
                </li>
            </ul>
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
                                                2019 하승민 영어 기본이론 (18년 11월)<br/>
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
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
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
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
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
                                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                            <img src="{{ img_url('sample/prof10_2.jpg') }}">
                                        </div>
                                        <div class="infoBox">
                                            <div class="infoTit">한국사 오태진</div>
                                            <div class="infoTxt">
                                                2018년 1차대비 오태진
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
                                                2019 원유철 한국사 기본이론
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

    <div class="Section Section7 mb100">
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
                        <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="{{ img_url('cop/quick/quick_190108.jpg') }}" alt="배너명"></a></div>
                        <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="{{ img_url('cop/quick/quick_190109.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_190110.jpg') }}" alt="배너명"></a>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_talk.jpg') }}" alt="배너명"></a>
            </li>
        </ul>
    </div>
</div>
<!-- End Container -->

<script type="text/javascript">
    $(function(){ 
        $('.mou ul').bxSlider({ 
            speed:800,  
            responsive:true,
            infiniteLoop:true,
            pager:false,
            slideWidth:556,
            minSlides:1,
            maxSlides:2,
        });
    });
</script>

@stop