@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container adm NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual">
            <div class="widthAuto">
                <img src="{{ img_url('cop_adm/visual/visual_190323_01.jpg') }}" title="수험생이 증명하는 압도적 대한민국 1등 경찰학원">
            </div>
        </div>

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

        <div class="Section Flipped">
            <div class="widthAuto">
                <ul class="inner">
                    {{-- 메인핵심 배너 include --}}
                    @include('willbes.pc.site.main_partial.main_point_' . $__cfg['SiteCode'])
                </ul>
                <div class="willbes-Bnr mt30">
                    <ul>
                        <li>
                            {!! banner_html(element('메인_핵심띠배너', $data['arr_main_banner'])) !!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section Section3">
            <div class="widthAuto">
                <div><img src="{{ img_url('cop_adm/visual/visual_190323_02.jpg') }}" title="신광은 경찰팀이 1등일 수 밖에 없는 이유! 신의법칙"></div>
                <div><img src="{{ img_url('cop_adm/visual/visual_190323_02_01.jpg') }}" title="압도적 1등 경찰 전문 교수진만 가능합니다."></div>
                <div class="youtubeGod">
                    <iframe src="https://www.youtube.com/embed/1t-y10ZK6ig?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>        
                    <a href="{{ site_url('/promotion/index/cate/3001/code/1129') }}">신의법칙 자세히 보기 &gt;</a>   
                </div>
                <ul class="ProfCopBox mt100">
                    <li class="sliderHotIssue nSlider pick">
                        <div class="sliderNum">
                            <div><a href="{{ site_url('/professor/show/cate/3002/prof-idx/50721/?subject_idx=1006&subject_name=%EC%88%98%EC%82%AC') }}"><img src="{{ img_url('cop_adm/prof/prof_ske.jpg') }}" alt="신광은 수사"></a></div>
                            <div><a href="{{ site_url('/professor/show/cate/3002/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95') }}"><img src="{{ img_url('cop_adm/prof/prof_ske02.jpg') }}" alt="신광은 형사소송법"></a></div>
                        </div>
                    </li>
                    <li class="sliderHotIssue nSlider pick">
                        <div class="sliderNum">
                            <div><a href="{{ site_url('/professor/show/cate/3002/prof-idx/50031/?subject_idx=1005&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0') }}"><img src="{{ img_url('cop_adm/prof/prof_jjh.jpg') }}" alt="장정훈 경찰학개론"></a></div>
                            <div><a href="{{ site_url('/professor/show/cate/3002/prof-idx/50723/?subject_idx=1007&subject_name=%ED%96%89%EC%A0%95%EB%B2%95') }}"><img src="{{ img_url('cop_adm/prof/prof_jjh02.jpg')}}" alt="장정훈 행정법"></a></div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ site_url('/professor/show/cate/3002/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95') }}"><img src="{{ img_url('cop_adm/prof/prof_kwu.jpg') }}" alt="김원욱 형법"></a>
                    </li>
                </ul>
                <div><img src="{{ img_url('cop/visual/visual_190323_02_02.jpg') }}" ></div>
            </div>
        </div>

        <div class="Section youtubeWrap">
            <div class="widthAuto tx-center pt100 mb100">   
                <img src="{{ img_url('cop_adm/visual/visual_190323_03.png') }}" title="4개월 단기합격 모든것이 완벽한 합격커리큘럼">   
            </div>

            <div class="widthAuto mt80">
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
                                4개월 단기합격
                                <span>신광은경찰TV</span>
                            </a>
                        </li> 
                        <li>
                            <a href="#tab3">
                                영어, 한국사 200점! 오직 신광은팀에서만 가능하죠.
                                <span>신광은경찰TV</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab4">
                                3법 300, 평균 98!!!! 8개월 합격
                                <span>신광은경찰TV</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="tab1" class="youtubeBox">
                    <iframe src="https://www.youtube.com/embed/re8w_IFAPS4?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div id="tab2" class="youtubeBox">
                    <iframe src="https://www.youtube.com/embed/NPe7NiOyA5E?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
                </div> 
                <div id="tab3" class="youtubeBox">
                    <iframe src="https://www.youtube.com/embed/my1yYcTb0ig?rel=0&modestbranding=1&showinfo=0&controls=2" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div id="tab4" class="youtubeBox">
                    <iframe src="https://www.youtube.com/embed/Vldycfx-OaE?rel=0&modestbranding=1&showinfo=0&controls=2" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
        <!-- youtubeWrap //-->

        <div class="Section Section2 pb110">
            <div class="widthAuto CurriStepBox">
                <div class="CurriView"><a href="{{ site_url('/promotion/index/cate/3001/code/1126') }}">커리큘럼 자세히보기 &gt;</a></div>
                <ul class="CurriStep">
                    <li class="active">
                        <div class="curriculumBox">
                            <span><img src="{{ img_url('cop_adm/icon_bubble.gif') }}" alt="2019대비 진행중"> </span>
                            <div class="Tit">기본과정</div>
                            <div class="subTit">집중연강식 진행</div>
                            <ul class="info">
                                <li>기초개념 정리</li>
                                <li>지속적인 복습테스트</li>
                                <li>초시생 필수 수강과정</li>
                            </ul>
                        </div>
                        <a href="#none" onclick="fnPlayerSample('132200', '1019097', 'HD');">OT보기 &gt;</a>
                    </li>
                    <li>&nbsp;</li>
                    <li class="active">
                        <div class="curriculumBox">
                            <span><img src="{{ img_url('cop_adm/icon_bubble.gif') }}" alt="2019대비 진행중"> </span>    
                            <div class="Tit">심화과정</div>
                            <div class="subTit">프리미엄 심화과정</div>
                            <ul class="info">
                                <li>실력업그레이드</li>
                                <li>심화 l 이론/기출학습</li>
                                <li>고득점 합격발판 마련</li>
                            </ul>
                        </div>
                        <a href="#none" onclick="fnPlayerSample('132217', '1019296', 'HD');">OT보기 &gt;</a>
                    </li>
                    <li>&nbsp;</li>
                    <li>
                        <div class="curriculumBox">
                            <div class="Tit">문제풀이 과정</div>
                            <div class="subTit">(실전 1+2+3 단계))</div>
                            <ul class="info">
                                <li>1단계 진도별 핵심정리</li>
                                <li>2단계 전범위 동형모의고사</li>
                                <li>3단계 FINAL 실전 모의고사</li>
                            </ul>
                        </div>
                        <a href="#none" onclick="fnPlayerSample('131812', '1014607', 'HD');">OT보기 &gt;</a>
                    </li>
                </ul>
                
                <div class="curriculumTxt">
                    <span class="cop-color">모든 강의</span>를 평생 0원 PASS 하나로 <span class="cop-color">평생 수강</span>하실 수 있습니다.
                    <span class="btn"><a href="{{ site_url('/promotion/index/cate/3001/code/1009') }}">평생 0원 PASS 구매하기</a></span>
                </div>
                
            </div>
            <!-- CurriStepBox //-->
        </div>

        

        <div class="Section">
            <div class="widthAuto">
                <a href="{{ site_url('/promotion/index/cate/3001/code/1032') }}"><img src="{{ img_url('cop_adm/visual/visual_190323_05.jpg') }}" title="합격수기"></a>
            </div>
        </div>

        <div class="Section Section3 mt100 pb90">
            <div class="widthAuto">
                <img src="{{ img_url('cop_adm/visual/visual_190323_06.jpg') }}" title="기출문제와 강의 One-Stop!">
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
                                        <div class="btn-sbj"><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1010') }}" target="_blank">+ &nbsp; 문제 더 보기</a></div>
                                        <div class="btn-lec mt5"><a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?course_idx=1075') }}" target="_blank">+ &nbsp; 강의 더 보기</a></div>
                                    </div>
                                </div>
                                <div class="infoList">
                                    <ul class="List-Table">
                                        <li><p><span>[2018년 3차]</span>경찰공무원(일반/경행) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?course_idx=1075') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2018년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?course_idx=1075') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2018년 1차]</span>경찰공무원(일반/101단/전의경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?course_idx=1075') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2017년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?course_idx=1075') }}" target="_blank">바로가기 ></a></span></li>
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
        var tab1_url = "https://www.youtube.com/embed/re8w_IFAPS4?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/NPe7NiOyA5E?rel=0&modestbranding=1&showinfo=0";        
        var tab3_url = "https://www.youtube.com/embed/my1yYcTb0ig?rel=0&modestbranding=1&showinfo=0";
        var tab4_url = "https://www.youtube.com/embed/Vldycfx-OaE?rel=0&modestbranding=1&showinfo=0";

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
