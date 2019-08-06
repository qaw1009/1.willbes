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
                <li class="police">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>

    <!--
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
    -->

    <div class="Section MainVisual">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3001_visual_01.jpg" alt="대한민국1등 경찰학원" usemap="#Map190806" border="0">
            <map name="Map190806" id="Map190806">
                <area shape="rect" coords="31,30,212,105" href="#collaboList" alt="협력기관" />
            </map>
        </div>
        <div class="widthAutoFull summer">
            <img src="https://static.willbes.net/public/images/promotion/main/3001_visual_190613_02.jpg" usemap="#Map160913" title="신광은 경찰 여름이벤트" border="0">
            <map name="Map160913" id="Map160913">
                <area shape="rect" coords="16,210,227,424" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1268 " target="_blank" alt="문풀사전접수" />
                <area shape="rect" coords="231,168,888,468" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1270" target="_blank" alt="더블할인" />
                <area shape="rect" coords="894,212,1102,429" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1283" target="_blank" alt="슈퍼패스" />
            </map>
        </div>
    </div>

    {{--
    <div class="newPlaybn">
        <div class="layer">		
            <div class="video">
                <video style="width:100%" autoplay loop muted="" poster="">
                    <source src="http://sample4.hd.willbes.gscdn.com/police/190318_junhkyeong_bus_1210x360(imsi).mp4" type="video/mp4" width="1210" height="360"></source>
                </video>
            </div>
            <div class="pngimg-real">
                <a href="{{ site_url('/promotion/index/cate/3001/code/1019') }}">
                    <img src="{{ img_url('cop/visual/visual_190323_junhkyeong.png') }}" title="중경입교식, 그 현장을 가다!">
                </a>
            </div>		
        </div>
    </div>
    --}}

    <div class="Section Flipped">
        <div class="widthAuto">
            <ul class="inner">
                <li class="l1">
                    <a href="{{ site_url('#none') }}" target="_blank">
                        <img src="{{ img_url('cop/flipped/flipped01.jpg') }}" title="평생0원PASS">    
                        <!--div class="f-tit tit1 NSK"># 평생0원PASS</div>
                        <span class="wrap_ban front">
                            <img src="{{ img_url('cop/flipped/flipped_front_190101.png') }}">
                        </span>
                        <span class="wrap_ban back">
                            <img src="{{ img_url('cop/flipped/flipped_back_190101.png') }}">
                        </span-->
                    </a>
                </li>
                <li class="l2">
                    <a href="{{ site_url('#none') }}" target="_blank">
                        <img src="{{ img_url('cop/flipped/flipped02.jpg') }}" title="2단계 4주 동형모의고사">
                        <!--div class="f-tit tit2 NSK"># 2019 대비 기본이론</div>
                        <span class="wrap_ban front">
                            <img src="{{ img_url('cop/flipped/flipped_front_190102.png') }}">
                        </span>
                        <span class="wrap_ban back">
                            <img src="{{ img_url('cop/flipped/flipped_back_190102.png') }}">
                        </span-->
                    </a>
                </li>
                <li class="l3">
                    <a href="{{ site_url('#none') }}" target="_blank">
                        <img src="{{ img_url('cop/flipped/flipped03.jpg') }}" title="프리미엄 심화 이론/기출">
                        <!--div class="f-tit tit3 NSK"># 2019 대비 심화이론/기출</div>
                        <span class="wrap_ban front">
                            <img src="{{ img_url('cop/flipped/flipped_front_190103.png') }}">
                        </span>
                        <span class="wrap_ban back">
                            <img src="{{ img_url('cop/flipped/flipped_back_190103.png') }}">
                        </span-->
                    </a>
                </li>
            </ul>
            <div class="willbes-Bnr mt30">
                <ul>
                    <li class="nSlider">
                        {{--<a href="{{ site_url('#none') }}" target="_blank"><img src="{{ img_url('cop/banner/190322_cBar_1120x110.jpg') }}" title="숨은 필합자를 찾아라"></a>--}}
                        <div class="sliderNum">
                            <div>
                                <a href="//www.willbes.net/banner/click?banner_idx=676&return_url=police.willbes.net%2Fpass%2Fsupport%2Fnotice%2Fshow%3Fboard_idx%3D225261&link_url_type=I" target="_self" class=""><img src="https://police.willbes.net/public/uploads/willbes/banner/2019/0604/banner_20190604183514.jpg" alt="19년 1차 고득점"></a>
                            </div>
                            <div>
                                <a href="//www.willbes.net/banner/click?banner_idx=852&return_url=police.willbes.net%2Fpromotion%2Findex%2Fcate%2F3001%2Fcode%2F1242&link_url_type=I" target="_self" class=""><img src="https://police.willbes.net/public/uploads/willbes/banner/2019/0604/banner_20190604183514.jpg" alt="19년 1차 최종합격예측서비스"></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="Section Section3">
        <div class="widthAuto">
            <div><img src="{{ img_url('cop/visual/visual_190323_02.jpg') }}" title="신광은 경찰팀이 1등일 수 밖에 없는 이유! 신의법칙"></div>
            <div><img src="{{ img_url('cop/visual/visual_190323_02_01.jpg') }}" title="압도적 1등 경찰 전문 교수진만 가능합니다."></div>
            <div class="youtubeGod">
                <iframe src="https://www.youtube.com/embed/re8w_IFAPS4?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>        
                <a href="{{ site_url('/promotion/index/cate/3001/code/1129') }}">신의법칙 자세히 보기 &gt;</a>   
            </div>
            <!--div class="will-big-Tit">
                <div class="small NSK-Thin">여러분의 꿈과 목표를 위해,</div>
                <div class="big NSK-Black"><span class="cop-color">오늘도 최선을 다하는</span> 윌비스 신광은 경찰팀</div>
            </div-->
            <ul class="ProfCopBox mt100">
                <li>
                    <img src="{{ img_url('cop/prof/prof_ske.jpg') }}" title="신광은">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_jjh.jpg') }}" title="장정훈">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_kwu.jpg') }}" title="김원욱">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_hsm.jpg') }}" title="하승민">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_otj.jpg') }}" title="오태진">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_wyc.jpg') }}" title="원유철">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_khj.jpg') }}" title="김현정">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
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
            <div><img src="{{ img_url('cop/visual/visual_190323_02_02.jpg') }}" ></div>
        </div>
    </div>

    <div class="Section youtubeWrap">
        <div class="widthAuto tx-center pt100 mb100">   
            <img src="{{ img_url('cop/visual/visual_190323_03.png') }}" title="4개월 단기합격 모든것이 완벽한 합격커리큘럼">   
        </div>        

        <div class="widthAuto">
            <div class="youtubetabWrap">
                <ul class="youtubetab">
                    <li>
                        <a href="#tab1" class="active">
                            신의 법칙! 2주만에 1회독?
                            <span>신광은경찰TV</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab2">
                            2018년 2차 최종합격생 인터뷰
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
                <iframe src="https://www.youtube.com/embed/re8w_IFAPS4?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div id="tab2" class="youtubeBox">
                <iframe src="https://www.youtube.com/embed/GlE9EGMDF98?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
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

    

    <div class="Section Section2 pb110">
        <!--
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
            
            <div class="widthAuto curriculumTit">                
                <img src="{{ img_url('cop/visual/visual_tit02.jpg') }}" title="신의법칙 퍼펙트 커리큘럼">
                <a href="#none">신의법칙 자세히 보기 &gt;</a>                
            </div>
            -->

            <div class="widthAuto CurriStepBox">
                <div class="CurriView"><a href="{{ site_url('/promotion/index/cate/3001/code/1126') }}">커리큘럼 자세히보기 &gt;</a></div>
                <ul class="CurriStep">
                    <li class="active">
                        <div class="curriculumBox">
                            <span><img src="{{ img_url('cop/icon_bubble.gif') }}" alt="2019대비 진행중"> </span>
                            <div class="Tit">기본과정</div>
                            <div class="subTit">집중연강식 진행</div>
                            <ul class="info">
                                <li>기초개념 정리</li>
                                <li>지속적인 복습테스트</li>
                                <li>초시생 필수 수강과정</li>
                            </ul>
                        </div>
                        <a href="#none" onclick="fnPlayerSample('132199', '1019097', 'HD');">OT보기 &gt;</a>
                    </li>
                    <li>&nbsp;</li>
                    <li>
                        <div class="curriculumBox">
                            <div class="Tit">심화과정</div>
                            <div class="subTit">프리미엄 심화과정</div>
                            <ul class="info">
                                <li>실력업그레이드</li>
                                <li>심화 l 이론/기출학습</li>
                                <li>고득점 합격발판 마련</li>
                            </ul>
                        </div>
                        <a href="#none" onclick="fnPlayerSample('132216', '1019296', 'HD');">OT보기 &gt;</a>
                    </li>
                    <li>&nbsp;</li>
                    <li>
                        <div class="curriculumBox">
                            <span><img src="{{ img_url('cop/icon_bubble.gif') }}" alt="2019대비 진행중"> </span>
                            <div class="Tit">문제풀이 과정</div>
                            <div class="subTit">(실전 1+2+3 단계)</div>
                            <ul class="info">
                                <li>1단계 진도별 핵심정리</li>
                                <li>2단계 전범위 동형모의고사</li>
                                <li>3단계 FINAL 실전 모의고사</li>
                            </ul>
                        </div>
                        <a href="#none" onclick="fnPlayerSample('131811', '1014607', 'HD');">OT보기 &gt;</a>
                    </li>
                </ul>
                <div class="curriculumTxt">
                    <span class="cop-color">모든 강의</span>를 평생 0원 PASS 하나로 <span class="cop-color">평생 수강</span>하실 수 있습니다.
                    <span class="btn"><a href="{{ site_url('/promotion/index/cate/3001/code/1009') }}">평생 0원 PASS 구매하기</a></span>
                </div>
            </div>
            <!-- CurriStepBox //-->        
    </div>

    <!--
    <div class="Section Section3 mt95">
        <div class="widthAuto">
            <div class="will-big-Tit">
                <div class="small NSK-Thin">여러분의 꿈과 목표를 위해,</div>
                <div class="big NSK-Black"><span class="cop-color">오늘도 최선을 다하는</span> 윌비스 신광은 경찰팀</div>
            </div>
            <ul class="ProfCopBox mt60 mb100">
                <li>
                    <img src="{{ img_url('cop/prof/prof_ske.jpg') }}" title="신광은">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_jjh.jpg') }}" title="장정훈">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_kwu.jpg') }}" title="김원욱">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_hsm.jpg') }}" title="하승민">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_otj.jpg') }}" title="오태진">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_wyc.jpg') }}" title="원유철">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_khj.jpg') }}" title="김현정">
                    <ul class="ProfBtns">
                        <li><a href="#none">▶</a></li>
                        <li><a href="#none" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                
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
                
            </ul>
        </div>
    </div>
    -->
    
    <div class="Section">
        <div class="widthAuto">  
            <img src="{{ img_url('cop/visual/visual_190323_05.jpg') }}" title="이것이 진짜 Real 합격수기">
            <!--
            <div class="widthAuto smallTit smallTit2">          
                <p><span>진짜 살아있는 정보를 알 수 있는 <strong>합격수기!</strong></span></p>            
            </div>          
            <div class="will-big-Tit big-Tit-line pt50 pb50">
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
            -->            
        </div>
    </div>
    

    <div class="Section Section3 pb90">        
        <div class="widthAuto">
            <img src="{{ img_url('cop/visual/visual_190323_06.jpg') }}" title="기출문제와 강의 One-Stop!">
            <!--div class="widthAuto smallTit">          
                <p><span>기출문제와 강의를 한 곳에 <strong>기출강의!</strong></span></p>            
            </div>
            <div class="will-big-Tit pt100">
                <div class="small NSK-Thin">출제경향이 매번 반복되는 경찰공무원 시험.</div>
                <div class="big NSK-Black"><span class="cop-color">날카롭게 분석된</span> 기출강의<span class="small NSK-Thin">로 마무리해야합니다.</span></div>
            </div-->
            <div class="SpecialLecBox">
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
                                    <li><p><span>[2018년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</p><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
                                    <li><p><span>[2018년 1차]</span>경찰공무원(일반/101단/전의경) 채용시험 기출</p><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
                                    <li><p><span>[2018년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</p><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
                                    <li><p><span>[2018년 1차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</p><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
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
            <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_onHiA01.jpg') }}" title="배너명"></a></li>
            <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_onHiB01.jpg') }}" title="배너명"></a></li>
            <li class="sliderHotIssue nSlider pick">
                <div class="sliderNum">
                    <div><img src="{{ img_url('cop/banner/bnr_onHiC01.jpg') }}"></div>
                    <div><img src="{{ img_url('cop/banner/bnr_onHiC01.jpg') }}"></div>
                </div>
            </li>
        </ul>
    </div>
    <!-- HotIssue //-->    

    <!--
    <div class="Section Bnr mt40 mb70">
        <div class="widthAuto">
            <div class="widthAuto smallTit">          
                <p><span>신광은경찰 Hot Pick! <strong>온라인특강/이벤트</strong></span></p>            
            </div>
            <div class="willbes-Bnr mt60">
                <ul>
                    <li><a href="http://www.willbescop.net/movie/event.html?event_cd=On_180604_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop/banner/bnr_190109.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    -->

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
                                            <img src="{{ img_url('cop/prof/tea_list_1_kmj_104x104.png') }}">
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
                                            <img src="{{ img_url('cop/prof/tea_list_1_kmj_104x104.png') }}">
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
                                            <img src="{{ img_url('cop/prof/tea_list_1_kmj_104x104.png') }}">
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
                                            <img src="{{ img_url('cop/prof/tea_list_1_kmj_104x104.png') }}">
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
                                            <img src="{{ img_url('cop/prof/tea_list_1_kmj_104x104.png') }}">
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
                                            <img src="{{ img_url('cop/prof/tea_list_1_kmj_104x104.png') }}">
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
                                            <img src="{{ img_url('cop/prof/tea_list_1_kmj_104x104.png') }}">
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
                                            <img src="{{ img_url('cop/prof/tea_list_1_kmj_104x104.png') }}">
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
                            <!--li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-0336</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    월-토: 09시~ 22시<br/>
                                    일요일: 09시~ 20시<br/>
                                </div>
                            </li-->
                        </ul>
                    </dt>
                </dl>
            </div>            
        </div>
    </div>

    <div class="Section Section7 mb50">
        <div class="widthAuto">
            <div class="collaborate">
                <div>
                    <ul id="collaboList">
                        <li><a href="https://www.police.go.kr/main.html" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_01.jpg" alt="경찰청"></a></li>
                        <li><a href="http://www.smpa.go.kr/home/homeIndex.do?menuCode=kidonghq" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_02.jpg" alt="서울지방경찰청기동본부"></a></li>
                        <li><a href="http://www.gangdong.ac.kr/Home/Main.mbz" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_03.jpg" alt="강동대학교"></a></li>
                        <li><a href="http://kollabo.kiu.ac.kr/pages/index_mapsi.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_04.jpg" alt="경일대학교"></a></li>
                        <li><a href="http://cover.kimpo.ac.kr/intro/new/index.html" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_05.jpg" alt="김포대학교"></a></li>
                        <li><a href="http://www.jjpolice.go.kr/jjpolice" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_06.jpg" alt="제주지방경찰청"></a></li>
                        <li><a href="https://www.police.ac.kr/police/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_07.jpg" alt="경찰대학"></a></li>
                        <li><a href="https://job.kyungnam.ac.kr/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_08.jpg" alt="경남대학교"></a></li>
                        <li><a href="http://ipsi.kmcu.ac.kr/admission/index.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_09.jpg" alt="계명문화대학교"></a></li>
                        <li><a href="http://www.dju.ac.kr/kor/html/main.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_10.jpg" alt="대전대학교"></a></li>
                        <li><a href="http://www.seowon.ac.kr/web/kor/home" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_11.jpg" alt="서원대학교"></a></li>
                        <li><a href="http://www.sehan.ac.kr/main/main.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_12.jpg" alt="세한대학교"></a></li>
                        <li><a href="http://www.jbnu.ac.kr/kor/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_13.jpg" alt="전북대학교"></a></li>
                        <li><a href="https://www3.chosun.ac.kr/chosun/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_14.jpg" alt="조선대학교"></a></li>
                        <li><a href="https://www.hyundai1990.ac.kr/index/main.asp?re=y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_15.jpg" alt="특성화학교"></a></li>
                        <li><a href="https://lily.sunmoon.ac.kr/MainDefault.aspx" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_16.jpg" alt="선문대학교"></a></li>
                        <li><a href="http://www.wku.ac.kr/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_17.jpg" alt="원광대학교"></a></li>
                        <li><a href="http://www.jj.ac.kr/jj/index.jsp" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_18.jpg" alt="전주대학교"></a></li>
                        <li><a href="http://www.joongbu.ac.kr" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_19.jpg" alt="중부대학교"></a></li>
                    </ul>
                </div>
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
                        <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="{{ img_url('cop/quick/quick_190108.jpg') }}" title="배너명"></a></div>
                        <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="{{ img_url('cop/quick/quick_190109.jpg') }}" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_190110.jpg') }}" title="배너명"></a>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_talk.jpg') }}" title="배너명"></a>
            </li>
        </ul>
    </div>        
</div>
<!-- End Container -->

<div class="mainBottomBn">
    <div>
        <a href="#none">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1009_mainBottom_bn.jpg" title="" class="mbBanner">
        </a>
        <span class="btmEvClose">닫기</span>
    </div>
</div>

<script type="text/javascript">  
        var tab1_url = "https://www.youtube.com/embed/re8w_IFAPS4?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/GlE9EGMDF98?rel=0&modestbranding=1&showinfo=0";        
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


        //하단이벤트배너 닫기
        $(function(){        
            $('.mainBottomBn .btmEvClose').click(function(){
                $('.mainBottomBn').hide();
            });
        });	        
</script>
<script type="text/javascript">
	//<![CDATA[
		var timer_val = 2000; // 배너이동 시간 : 밀리초단위

		var bannerTimer;

		jQuery(function(){
			jQuery("#collaboList").mouseenter(function() {
				killTimer();
			});

			jQuery("#collaboList").mouseleave(function() {
				goTimer();
			});
			
			goTimer();
		});

		function timerFunc() {
			if(bannerTimer){ clearTimeout(bannerTimer); }

			jQuery("#collaboList").prepend(jQuery("#collaboList li:last").clone(true));
			jQuery("#collaboList li:last").remove();

			bannerTimer = setTimeout("timerFunc()", timer_val);
		}

		function goTimer() {
			if(bannerTimer){ clearTimeout(bannerTimer); }
			bannerTimer = setTimeout("timerFunc()", timer_val);
		}

		function killTimer() {
			if(bannerTimer){ clearTimeout(bannerTimer); }
		}
	//]]>
  </script>


@stop