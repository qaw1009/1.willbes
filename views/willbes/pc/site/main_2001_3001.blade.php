@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container cop NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual">
            <div class="widthAuto">              
                <img src="https://static.willbes.net/public/images/promotion/main/3001_visual_01.jpg" alt="대한민국1등 경찰학원" usemap="#Map190806" border="0">
                <map name="Map190806" id="Map190806">
                    <area shape="rect" coords="2,30,256,126" href="#collaboslides" alt="협력기관" />
                </map>                  
            </div>
            <div class="widthAutoFull summer">
                @if (date('YmdH') < '2019071316')
                    {{--7월 13일 16시까지--}}
                    <img src="https://static.willbes.net/public/images/promotion/main/3001_visual_190628_02.jpg" usemap="#Map190628" title="신광은 경찰 여름이벤트" border="0">
                    <map name="Map190628" id="Map190628">
                        <area shape="rect" coords="16,210,227,424" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1270" target="_blank" alt="기본이론" />
                        <area shape="rect" coords="349,337,486,400" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1268" target="_blank" alt="학원실강" />
                        <area shape="rect" coords="894,212,1102,429" href="https://police.willbes.net/pass/promotion/index/cate/3011/code/1290" target="_blank" alt="빅매치" />
                        <area shape="rect" coords="492,339,629,398" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1268#wb_04" target="_blank" alt="2단계" />
                        <area shape="rect" coords="635,340,772,399" href="https://police.willbes.net/promotion/index/cate/3001/code/1287" target="_blank" alt="동영상" />
                        <area shape="rect" coords="424,418,694,469" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1268" target="_blank" alt="학원실강신청하기" />
                    </map>
                @else
                    {{--7월 13일 16시 이후--}}
                    <img src="https://static.willbes.net/public/images/promotion/main/3001_visual_190808_02.jpg" usemap="#Map190809" title="신광은 경찰 연강시스템" border="0">
                    <map name="Map190809" id="Map190809">
                        <area shape="rect" coords="16,210,227,424" href="https://police.willbes.net/pass/promotion/index/cate/3011/code/1359" target="_blank" alt="기본이론" />
                        <area shape="rect" coords="894,212,1102,429" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1360" target="_blank" alt="프리미엄심화이론" />
                        <area shape="rect" coords="424,418,694,469" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1325" target="_blank" alt="슈퍼패스" />
                    </map>
                @endif
            </div>
        </div>

        {{--
        <div class="newPlaybn">
            <div class="layer">		
                <div class="video">
                    <video style="width:100%" autoplay loop muted="" poster="">
                        <source src="http://sample4.hd.willbes.gscdn.com/police/190509_junhkyeong_bus_1210x360.mp4" type="video/mp4" width="1120" height="360"></source>
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
                    {{-- 메인핵심 배너 include --}}
                    @include('willbes.pc.site.main_partial.main_point_' . $__cfg['SiteCode'])
                </ul>
                <div class="willbes-Bnr mt30">
                    <ul>
                        <li class="nSlider">
                            {!! banner_html(element('메인_핵심띠배너', $data['arr_main_banner']), 'sliderNum') !!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section Section3">
            <div class="widthAuto">
                <div><img src="{{ img_url('cop/visual/visual_190323_02.jpg') }}" title="신광은 경찰팀이 1등일 수 밖에 없는 이유! 신의법칙"></div>
                <div><img src="https://static.willbes.net/public/images/promotion/main/3001_visual_190702_02_01.jpg" title="압도적 1등 경찰 전문 교수진만 가능합니다."></div>
                <div class="youtubeGod">
                    <iframe src="https://www.youtube.com/embed/1t-y10ZK6ig?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>        
                    <a href="{{ site_url('/promotion/index/cate/3001/code/1129') }}">신의법칙 자세히 보기 &gt;</a>   
                </div>
                <ul class="ProfCopBox mt100 mb170">
                    <li>
                        <img src="{{ img_url('cop/prof/prof_ske.jpg') }}" title="신광은">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50547', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop/prof/prof_jjh.jpg') }}" title="장정훈">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50031', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50031/?subject_idx=1005&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop/prof/prof_kwu.jpg') }}" title="김원욱">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50297', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop/prof/prof_hsm.jpg') }}" title="하승민">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50135', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50135/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop/prof/prof_wyc.jpg') }}" title="원유철">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50641', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50641/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop/prof/prof_otj.jpg') }}" title="오태진">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50131', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50131/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>                    
                    <li>
                        <img src="{{ img_url('cop/prof/prof_khj.jpg') }}" title="김현정">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50129', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50129/?subject_idx=1010&subject_name=%EC%98%81%EC%96%B4%EC%95%84%EC%B9%A8%ED%8A%B9%EA%B0%95') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                </ul>
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
                            <span><img src="https://static.willbes.net/public/images/promotion/main/3001_icon_bubble_2020.gif" title="2020대비 진행중"> </span>
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
                            {{--<span><img src="https://static.willbes.net/public/images/promotion/main/3001_icon_bubble_2019.gif" title="2019대비 진행중"> </span>--}}    
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
                    <li class="active">
                        <div class="curriculumBox">                            
                            <span><img src="https://static.willbes.net/public/images/promotion/main/3001_icon_bubble_2019.gif" title="2019대비 진행중"> </span>
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
                    <span class="cop-color">모든 강의</span>를 PASS 하나로 <span class="cop-color">평생 수강</span>하실 수 있습니다.
                    <span class="btn"><a href="{{ site_url('/promotion/index/cate/3001/code/1009') }}">PASS 구매하기</a></span>
                </div>
            </div>
            <!-- CurriStepBox //-->
        </div>        

        <div class="Section">
            <div class="widthAuto">
                <a href="{{ site_url('/promotion/index/cate/3001/code/1032') }}"><img src="https://static.willbes.net/public/images/promotion/main/3001_visual_05.gif" title="합격수기"></a>
            </div>
        </div>

        <div class="Section Section3 pb90">
            <div class="widthAuto">
                <img src="{{ img_url('cop/visual/visual_190323_06.jpg') }}" title="기출문제와 강의 One-Stop!">
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
                                        <div class="btn-sbj"><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1010') }}" target="_blank">+ &nbsp; 문제 더 보기</a></div>
                                        <div class="btn-lec mt5"><a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?course_idx=1075') }}">+ &nbsp; 강의 더 보기</a></div>
                                    </div>
                                </div>
                                <div class="infoList">
                                    <ul class="List-Table">
                                        <li><p><span>[2019년 1차]</span>경찰공무원(일반/101단/전의경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3001?board_idx=162318') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2018년 3차]</span>경찰공무원(일반/경행) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3001?board_idx=162320') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2018년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3001?board_idx=166081') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2018년 1차]</span>경찰공무원(일반/101단/전의경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3001?board_idx=225227') }}" target="_blank">바로가기 ></a></span></li>                                        
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
        
        <div class="Section Section6 mb50" id="to_go">
            <div class="widthAuto">
                {{-- best/new product include --}}
                @include('willbes.pc.site.main_partial.lecture_' . $__cfg['SiteCode'])
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mb50">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mb50">
            <div class="widthAuto">
                <div class="collaborate">
                    <div id="collaboslides">
                        <ul>
                            <li>
                                <a href="https://ap.police.go.kr/ap/main.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_01.jpg" alt="경찰청"></a>
                                <a href="http://www.smpa.go.kr/home/homeIndex.do?menuCode=kidonghq" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_02.jpg" alt="서울지방경찰청기동본부"></a>
                                <a href="http://www.gangdong.ac.kr/Home/Main.mbz" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_03.jpg" alt="강동대학교"></a>
                                <a href="http://kollabo.kiu.ac.kr/pages/index_mapsi.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_04.jpg" alt="경일대학교"></a>
                                <a href="http://cover.kimpo.ac.kr/intro/new/index.html" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_05.jpg" alt="김포대학교"></a>
                                <a href="http://www.jjpolice.go.kr/jjpolice" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_06.jpg" alt="제주지방경찰청"></a>
                                <a href="https://www.police.ac.kr/police/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_07.jpg" alt="경찰대학"></a>
                                <a href="https://job.kyungnam.ac.kr/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_08.jpg" alt="경남대학교"></a>
                                <a href="http://ipsi.kmcu.ac.kr/admission/index.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_09.jpg" alt="계명문화대학교"></a>
                                <a href="http://www.dju.ac.kr/kor/html/main.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_10.jpg" alt="대전대학교"></a>
                            </li>
                            <li>
                                <a href="http://www.seowon.ac.kr/web/kor/home" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_11.jpg" alt="서원대학교"></a>
                                <a href="http://www.sehan.ac.kr/main/main.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_12.jpg" alt="세한대학교"></a>
                                <a href="http://www.jbnu.ac.kr/kor/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_13.jpg" alt="전북대학교"></a>
                                <a href="https://www3.chosun.ac.kr/chosun/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_14.jpg" alt="조선대학교"></a>
                                <a href="https://www.hyundai1990.ac.kr/index/main.asp?re=y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_15.jpg" alt="특성화학교"></a>
                                <a href="https://lily.sunmoon.ac.kr/MainDefault.aspx" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_16.jpg" alt="선문대학교"></a>
                                <a href="http://www.wku.ac.kr/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_17.jpg" alt="원광대학교"></a>
                                <a href="http://www.jj.ac.kr/jj/index.jsp" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_18.jpg" alt="전주대학교"></a>
                                <a href="http://www.joongbu.ac.kr" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_19.jpg" alt="중부대학교"></a>
                                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_temp.jpg" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
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

       
        $(document).ready(function() {
            var collaboslides = $("#collaboslides ul").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1, 
                moveSlides:1,
            });
        }); 

  </script>
    
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
