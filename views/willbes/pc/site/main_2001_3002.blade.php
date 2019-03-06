@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container adm NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

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
            @include('willbes.pc.site.main_partial.hot_issue_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
        </div>
        <!-- HotIssue //-->

        <div class="Section Bnr mt40 mb70">
            @include('willbes.pc.site.main_partial.event_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
        </div>
        <div class="Section Section5 mb70">
            @include('willbes.pc.site.main_partial.hot_pick_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
        </div>

        <div class="Section Section6 mb50">
            <div class="widthAuto">
                {{-- best/new product include --}}
                @include('willbes.pc.site.main_partial.lecture_' . $__cfg['SiteCode'])
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>
        <div class="Section Section7 mb100">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
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
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
