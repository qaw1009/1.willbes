@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container cop NSK c_both">
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Section MainVisual">
        <div class="widthAuto">
            <iframe src="https://www.youtube.com/embed/lrZxQV21DE8?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            <img src="{{ img_url('cop/visual/visual_190213.jpg') }}" alt="전국 4,000명 동시수강">
        </div>
    </div>

    <div class="Section youtubeWrap">
        <div class="widthAuto smallTit">
            <p><span>수험생에게 도움이 되는 <strong>특별한 영상!</strong></span></p>
            <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="{{ img_url('cop/icon_add_big.png') }}" alt="동영상 더보기"></a>
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
                            신의 법칙! 주만에 1회독?
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
    <!-- youtubeWrap //-->

    <div class="Section Flipped">
        <div class="widthAuto">
            <ul class="inner">
                <li class="l1">
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=On_180327_yp" target="_blank">
                        <img src="{{ img_url('cop/flipped/flipped01.jpg') }}" alt="평생0원PASS">
                        {{--<div class="f-tit tit1 NSK"># 평생0원PASS</div>
                        <span class="wrap_ban front">
                            <img src="{{ img_url('cop/flipped/flipped_front_190101.png') }}">
                        </span>
                        <span class="wrap_ban back">
                            <img src="{{ img_url('cop/flipped/flipped_back_190101.png') }}">
                        </span>--}}
                    </a>
                </li>
                <li class="l2">
                    <a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170831_p&topMenuType=O#main" target="_blank">
                        <img src="{{ img_url('cop/flipped/flipped02.jpg') }}" alt="2019 대비 기본이론<">
                        {{--<div class="f-tit tit2 NSK"># 2019 대비 기본이론</div>
                        <span class="wrap_ban front">
                            <img src="{{ img_url('cop/flipped/flipped_front_190102.png') }}">
                        </span>
                        <span class="wrap_ban back">
                            <img src="{{ img_url('cop/flipped/flipped_back_190102.png') }}">
                        </span>--}}
                    </a>
                </li>
                <li class="l3">
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=On_premium&topMenuType=O" target="_blank">
                        <img src="{{ img_url('cop/flipped/flipped03.jpg') }}" alt="2019 대비 심화이론/기출">
                        {{--<div class="f-tit tit3 NSK"># 2019 대비 심화이론/기출</div>
                        <span class="wrap_ban front">
                            <img src="{{ img_url('cop/flipped/flipped_front_190103.png') }}">
                        </span>
                        <span class="wrap_ban back">
                            <img src="{{ img_url('cop/flipped/flipped_back_190103.png') }}">
                        </span>--}}
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

    <div class="Section Section2 pb110">
        <div class="widthAuto curriculumTit">
            <img src="{{ img_url('cop/visual/visual_tit02.jpg') }}" alt="신의법칙 퍼펙트 커리큘럼">
            <a href="#none">신의법칙 자세히 보기 &gt;</a>
        </div>

        <div class="widthAuto CurriStepBox">
            <ul class="CurriStep">
                <li class="active">
                    <div class="curriculumBox">
                        <span><img src="{{ img_url('cop/icon_bubble.gif') }}" alt="2019대비 진행중"> </span>
                        <div class="Tit">기본과정</div>
                        <div class="subTit">집중연강식 진행</div>
                        <ul class="info">
                            <li>영어 매달 초 개강</li>
                            <li>2주마다  형소법  →  경찰학<br/>→  한국사  →  형법 진행</li>
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
                <li>
                    <img src="{{ img_url('cop/prof/prof_ske.jpg') }}" alt="신광은">
                    <ul class="ProfBtns">
                        <li><a href="#none" onclick="fnPlayerProf('50547', 'OT');">▶</a></li>
                        <li><a href="{{ front_url('/professor/show/cate/3001/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95') }}" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_jjh.jpg') }}" alt="장정훈">
                    <ul class="ProfBtns">
                        <li><a href="#none" onclick="fnPlayerProf('50031', 'OT');">▶</a></li>
                        <li><a href="{{ front_url('/professor/show/cate/3001/prof-idx/50031/?subject_idx=1005&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0') }}" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_kwu.jpg') }}" alt="김원욱">
                    <ul class="ProfBtns">
                        <li><a href="#none" onclick="fnPlayerProf('50297', 'OT');">▶</a></li>
                        <li><a href="{{ front_url('/professor/show/cate/3001/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95') }}" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_hsm.jpg') }}" alt="하승민">
                    <ul class="ProfBtns">
                        <li><a href="#none" onclick="fnPlayerProf('50135', 'OT');">▶</a></li>
                        <li><a href="{{ front_url('/professor/show/cate/3001/prof-idx/50135/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4') }}" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_otj.jpg') }}" alt="오태진">
                    <ul class="ProfBtns">
                        <li><a href="#none" onclick="fnPlayerProf('50131', 'OT');">▶</a></li>
                        <li><a href="{{ front_url('/professor/show/cate/3001/prof-idx/50131/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_wyc.jpg') }}" alt="원유철">
                    <ul class="ProfBtns">
                        <li><a href="#none" onclick="fnPlayerProf('50641', 'OT');">▶</a></li>
                        <li><a href="{{ front_url('/professor/show/cate/3001/prof-idx/50641/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{ img_url('cop/prof/prof_khj.jpg') }}" alt="김현정">
                    <ul class="ProfBtns">
                        <li><a href="#none" onclick="fnPlayerProf('50129', 'OT');">▶</a></li>
                        <li><a href="{{ front_url('/professor/show/cate/3001/prof-idx/50129/?subject_idx=1010&subject_name=%EC%98%81%EC%96%B4%EC%95%84%EC%B9%A8%ED%8A%B9%EA%B0%95') }}" target="_blank">교수소개</a></li>
                    </ul>
                </li>
                {{--<li class="p_re">
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
                </li>--}}
            </ul>
        </div>
    </div>

    <div class="Section Section4 pt100 pb90">
        <div class="widthAuto">
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
    <!-- 기출강의// -->

    <div class="Section HotIssue pt50 pb50">
        <div class="widthAuto">
            <div class="widthAuto smallTit">
                <p><span>학원 최신 소식을 한 눈에! <strong>학원 Hot Issue</strong></span></p>
            </div>
        </div>
        <ul class="widthAuto mt60">
            <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_onHiA01.jpg') }}" alt="배너명"></a></li>
            <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_onHiB01.jpg') }}" alt="배너명"></a></li>
            <li class="sliderHotIssue nSlider pick">
                <div class="sliderNum">
                    <div><img src="{{ img_url('cop/banner/bnr_onHiC01.jpg') }}"></div>
                    <div><img src="{{ img_url('cop/banner/bnr_onHiC01.jpg') }}"></div>
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
                    {{--<div class="sliderNum">
                        <div><a href="#none"><img src="{{ img_url('cop/event/evt_190101.jpg') }}"></a></div>
                        <div><a href="#none"><img src="{{ img_url('cop/event/evt_190102.jpg') }}"></a></div>
                    </div>--}}
                </div>
                <div class="pickBox pick2">
                    <a href="#none"><img src="{{ img_url('cop/event/evt_190102.jpg') }}"></a>
                    {{--<div class="sliderNum">
                        <div><a href="#none"><img src="{{ img_url('cop/event/evt_190101.jpg') }}"></a></div>
                        <div><a href="#none"><img src="{{ img_url('cop/event/evt_190102.jpg') }}"></a></div>
                    </div>--}}
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
            {{--<div class="willbes-Bnr pt4">
                <ul>
                    <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_190110.jpg') }}"></a></li>
                </ul>
            </div>--}}
        </div>
    </div>
    <div class="Section Section6 mb50">
        <div class="widthAuto">
            {{-- best/new product include --}}
            @include('willbes.pc.site.main_partial.lecture_' . $__cfg['SiteCode'])
            {{-- board include --}}
            @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
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
                                <a href="{{ front_url('/support/faq/index') }}">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ front_url('/support/mobile/index') }}">
                                    <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                    <div class="nTxt">모바일<br/>서비스</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ front_url('/support/qna/index') }}">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ front_url('/support/remote/index') }}">
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
                            {{--<li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-0336</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    월-토: 09시~ 22시<br/>
                                    일요일: 09시~ 20시<br/>
                                </div>
                            </li>--}}
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
                <a href="http://pf.kakao.com/_qAxoYC" target="_blank"><img src="{{ img_url('cop/quick/quick_talk.jpg') }}" alt="배너명"></a>
            </li>
        </ul>
    </div>
</div>
@stop