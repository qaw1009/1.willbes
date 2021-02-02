@extends('willbes.pc.layouts.master')

@section('content')
<link href="/public/css/willbes/style_gosi_gate.css??ver={{time()}}" rel="stylesheet">
<!-- Container -->

<div id="Container" class="Container gosi-gate NSK c_both">
    <div class="widthAuto gosi-gate-top">
        <div class="gosi-gate-sns">
            <ul>
                <li>
                    <a href="https://www.youtube.com/channel/UCsNPdhwjR37qVtuePB599KQ" target="_blank">
                        <img src="{{ img_url('gnb/icon_youtube.png') }}" title="유튜브">
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/pass/promotion/index/cate/3048/code/1104') }}" target="_blank">
                        <img src="{{ img_url('gnb/icon_kakao.png') }}" title="카카오톡">
                    </a>
                </li>
                <li>
                    <a href="https://tv.naver.com/willbes79" target="_blank">
                        <img src="{{ img_url('gnb/icon_navertv.png') }}" title="네이버TV">
                    </a>
                </li>
                <li>
                    <a href="https://blog.naver.com/willbes79" target="_blank">
                        <img src="{{ img_url('gnb/icon_blog.png') }}" title="블로그">
                    </a>
                </li>
                <li>
                    <a href=" https://www.instagram.com/willbes_gong/" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2019/10/icon_instagram.png" title="인스타그램"> 
                    </a>
                </li>
            </ul>
        </div>

        <div class="gosi-logo">
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2003_logo.png" alt="윌비스 공무원">
        </div>

        <div class="gosi-gate-search">
            <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
                <div class="Section widthAuto">
                    <div class="onSearch NGR">
                        <div>
                            <input type="hidden" name="cate" id="unifiedSearch_cate" value="">
                            <input type="hidden" name="search_class" id="unifiedSearch_class" value="">
                            <input type="hidden" name="search_target" id="unifiedSearch_target" value="">
                            <input type="hidden" name="etc_info" id="unifiedEtc_info" value="">
                            <input type="text" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                            <label for="onsearch"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">검색</button></label>
                        </div>
                        <div class="searchPop">
                            <div class="popTit">인기검색어</div>
                            <ul>
                                <li><a href="#nnon">신광은</a></li>
                                <li><a href="#nnon">무료특강</a></li>
                                <li><a href="#nnon">형소법</a></li>
                                <li><a href="#nnon">기미진</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="gosi-gate-menu">
        <ul>
            <li><a href="#none">무료인강</a></li>
            <li><a href="#none">9급</a></li>
            <li><a href="#none">7급 PSAT</a></li>
            <li><a href="#none">7급</a></li>
            <li><a href="#none">세무직</a></li>
            <li><a href="#none">법원직</a></li>
            <li><a href="#none">소방직</a></li>
            <li><a href="#none">기술직</a></li>
            <li><a href="#none">군무원</a></li>
        </ul>
    </div>

    <div class="gosi-bnfull-Sec">
        <div class="gosi-bnfull">
            <div class="sliderBar">
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_fullx65.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_fullx65_01.jpg" alt="배너명"></a></div>
            </div>
        </div>
    </div>


    <div class="Section gosi-gate-Sec">
        <div class="widthAuto">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x285.gif" alt="배너명"></a>
            <div class="gosi-gate-bntop p_re">
                <div id="MainRollingDiv" class="MaintabList">
                    <ul class="Maintab">
                        <li><a data-slide-index="0" href="javascript:void(0);" class="active">9급</a></li>
                        <li><a data-slide-index="1" href="javascript:void(0);">7급</a></li>
                        <li><a data-slide-index="2" href="javascript:void(0);">세무직</a></li>
                        <li><a data-slide-index="3" href="javascript:void(0);">법원직</a></li>
                        <li><a data-slide-index="4" href="javascript:void(0);">농업직</a></li>
                        <li><a data-slide-index="5" href="javascript:void(0);">통신/전기</a></li>
                        <li><a data-slide-index="6" href="javascript:void(0);">전산직</a></li>
                        <li><a data-slide-index="7" href="javascript:void(0);">환경직</a></li>
                        <li><a data-slide-index="8" href="javascript:void(0);">산림자원직</a></li>
                        <li><a data-slide-index="9" href="javascript:void(0);">조경계획 및 설계</a></li>
                    </ul>
                </div>
                <div id="MainRollingSlider" class="MaintabBox">
                    <ul class="MaintabSlider">
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_01.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_02.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_03.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_04.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_05.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_06.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_07.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_08.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_09.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_10.jpg" alt="배너명">
                            </a>
                        </li>
                    </ul>                    
                </div>                
            </div>
            <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
            <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p> 
        </div>
    </div>
    
    <div class="Section gosi-bnfull02">
        <div class="widthAuto">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x227.jpg" alt="배너명"></a>
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto gosi-gate-bn01 nSlider pick">   
            <div class="f_left">  
                <div class="will-nTit NSK-Black">공무원, 어떻게 준비하나요? </div>              
                <div class="sliderNum">
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_550x162_01.jpg" alt="배너명"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_550x162_02.jpg" alt="배너명"></a></div>
                </div>
            </div>
            <div class="f_right">  
                <div class="will-nTit NSK-Black">윌비스 신규회원가입 혜택</div>                  
                <div class="sliderNum">
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_550x162_02.jpg" alt="배너명"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_550x162_01.jpg" alt="배너명"></a></div>
                </div>
            </div>
            </ul>         
        </div>
    </div>

    <div class="Section tpassWrap">
        <div class="widthAuto">
            <div class="f_left"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_tpass_bg.jpg" alt="T-PASS"></div>
            <div class="f_right">
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_01.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_02.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_03.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_04.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_05.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_06.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_07.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_08.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_09.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_10.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_11.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_12.jpg" alt="배너명"></a></div>
            </div>
        </div>
    </div>

    <div class="Section gosi-gate-profWrap">
        <div class="widthAuto">
            <div class="will-nTit NSK-Black">합격을 책임질 윌비스 직렬별 대표 교수진</div>        
            <ul class="gosi-tabs-prof">
                <li><a href="#item01" class="on">9/7급</a></li>
                <li><a href="#item02">세무직</a></li>
                <li><a href="#item03">법원직</a></li>
                <li><a href="#item04">소방직</a></li>
                <li><a href="#item05">기술직</a></li>
                <li><a href="#item06">군무원</a></li>
            </ul>
            <div class="gosi-tabs-contents-wrap">
                <div id="item01" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof">
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
                <div id="item02" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof" >
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        
                    </ul>                
                </div>
                <div id="item03" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof" >
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>    
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>                        
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
                <div id="item04" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof" >
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>    
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>                        
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
                <div id="item05" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof" >
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
                <div id="item06" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof" >
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>                        
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
            </div>
        </div>
    </div>   

    <div class="Section castWrap">
        <div class="widthAuto">
            <div class="tx16 mb20">수험을 가장 잘 아는, 그리고 많은 합격생을 배출한 교수님들이 전합니다.</div>
            <div class="will-nTit NSK-Black">합격을 앞당기는 <span>수험생활 팁</span></div>  
            <div class="castBox">
                <ul class="castslider">
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg">
                            </a>
                        </div>
                        <div class="castTitle">신광은교수님이 칠판을 사고 외워야 했던 이유는?</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg">
                            </a>
                        </div>
                        <div class="castTitle">신광은 경찰팀이 19년2차 합격생들과 함께한 ★대환장파티★ 기대하셔도 좋습니다 </div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_03.jpg">
                            </a>
                        </div>
                        <div class="castTitle">190504 중앙경찰학교 입교 현장스케치</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg">
                            </a>
                        </div>
                        <div class="castTitle">신광은 경찰학원 행사이벤트 및 커리큘럼안내</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg">
                            </a>
                        </div>
                        <div class="castTitle">합격생이 말해주는 1단계 문제풀이 ☜ 12월30일 大개강이라닛☆</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_03.jpg">
                            </a>
                        </div>
                        <div class="castTitle">압도적 1위 장정훈 교수 6만돌파 이벤트!</div>
                    </li>
                </ul> 
                <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/btn_arrowL.png"></a></p>                   
                <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/btn_arrowR.png"></a></p>                              
            </div>
        </div>
    </div>

    <div class="Section gosi-gate-bn02">
        <div class="widthAuto pick">   
            <div class="tx16 mb20">수험을 가장 잘 아는, 그리고 많은 합격생을 배출한 교수님들이 전합니다.</div>
            <div class="will-nTit NSK-Black">윌비스 공무원 학원 <span>실강 안내</span></div>  
            <ul>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_02.jpg" alt="배너명"></a></div>
                    </div>
                </li>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_03.jpg" alt="배너명"></a></div>
                    </div>
                </li>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_03.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_01.jpg" alt="배너명"></a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section mt80">
        <div class="widthAuto">
            <div class="nNoticeBox three">
                <div class="noticeList widthAuto350 f_left">
                    <div class="will-nlistTit p_re">공지사항 <a href="https://cop.dev.willbes.net/support/notice/index" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>경찰3과 과목별 만점자를 소개합니다.</a><img src="{{ img_url('cop/icon_new.png') }}"><span class="date">2018-09-06</span></li>
                        <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a><span class="date">2018-09-01</span></li>
                        <li><a href="#none">[공지] 2018년 제3차 경찰공무원(순경)채용 공고 입니다.</a><span class="date">2018-08-24</span></li>
                        <li><a href="#none">[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</a><span class="date">2018-08-13</span></li>
                        <li><a href="#none">[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">시험공고 <a href="https://cop.dev.willbes.net/support/examAnnouncement/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>2018년 제3차 경찰공무원(순경)채용 필기시험 문제 및 가답안</a><img src="{{ img_url('cop/icon_new.png') }}"><span class="date">2018-09-06</span></li>
                        <li><a href="#none">[공지] 2018년 제3차 경찰공무원 채용 필기시험 문제 및 가답안</a><span class="date">2018-09-01</span></li>
                        <li><a href="#none">2018년 제3차 경찰공무원 채용시험 원서접수일정 안내입니다.</a><span class="date">2018-08-24</span></li>
                        <li><a href="#none">[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</a><span class="date">2018-08-13</span></li>
                        <li><a href="#none">[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">수험뉴스 <a href="https://cop.dev.willbes.net/support/examNews/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>경찰청, 경찰간부후보생 68기 최종합격자 명단 입니다. 확인 바랍니다.</span></a><img src="{{ img_url('cop/icon_new.png') }}"><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>HOT</span>12월 22일, 경찰공무원 합격의 기회가 다가옵니다.</a><span class="date">2018-09-01</span></li>
                        <li><a href="#none">제주자치경찰 확대 시험운영 추진</a><span class="date">2018-08-24</span></li>
                        <li><a href="#none">순경 3차 '필기시험 대비, 기출 분석으로 철저하게'</a><span class="date">2018-08-13</span></li>
                        <li><a href="#none">순경 3차 '필기시험 대비, 기출 분석으로 철저하게'</a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="Section NSK mt50 mb90">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 2</div>
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
                                <div class="nNumber tx-color">1544-0330</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말: 09시~ 22시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 공무원 사이트에 물어보세요!</div>
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
                    
                </dl>
            </div>            
        </div>
    </div>
    <!-- CS센터 //-->

    <div id="QuickMenu" class="MainQuickMenu">
        <ul>
            <li class="dday">
                <div class="QuickSlider">
                    <div class="sliderProf">
                        <div class="QuickDdayBox">
                            <div class="q_tit">3차 필기시험</div>
                            <div class="q_day">2018.12.12</div>
                            <div class="q_dday NSK-Blac">D-5</div>
                        </div>
                        <div class="QuickDdayBox">
                            <div class="q_tit">1차 공무원</div>
                            <div class="q_day">2019.04.05</div>
                            <div class="q_dday NSK-Blac">D-10</div>
                        </div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderProf">
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/0720/banner_20200720103645.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderProf">
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/0625/banner_20200625154631.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderProf">
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/0224/banner_20200624133355.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- End Container -->


<script type="text/javascript">
    $(function() {
        $('.sliderBar').bxSlider({
            mode:'fade',
            auto: true,
            touchEnabled: false,
            controls: false,
            sliderWidth:2000,
            pause: 3000,
            autoHover: true,
            pager: false,
        });
    });

    //상단 메인 배너
    $(function(){ 
        var slidesImg = $(".MaintabSlider").bxSlider({
            mode:'horizontal',
            touchEnabled: false,
            speed:400,
            pause:5000,
            auto : true,	
            autoHover: true,						
            pagerCustom: '#MainRollingDiv',
            controls:false, 				
            onSliderLoad: function(){
                $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1}); 
            }
        });	
        $("#imgBannerRight").click(function (){
            slidesImg.goToPrevSlide();
        });
    
        $("#imgBannerLeft").click(function (){
            slidesImg.goToNextSlide();
        });			
    });

    //교수진 배너    
     $(document).ready(function(){
        $('.gosi-tabs-prof').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
        
            $content = $($active[0].hash);
        
            $links.not($active).each(function () {
            $(this.hash).hide()});
        
            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
        
            $active = $(this);
            $content = $(this.hash);
        
            $active.addClass('active');
            $content.show();
        
            e.preventDefault()})}
        )}
    );

    $(function() {
        $('.sliderProf').bxSlider({        
            auto: true,
            controls: true,
            pause: 4000,
            pager: true,
            pagerType: 'short',
            slideWidth: 208,
            minSlides:1,
            maxSlides:1,
            moveSlides:1,
            adaptiveHeight: true,
            infiniteLoop: true,
            touchEnabled: false,
            autoHover: true,
            onSliderLoad: function(){
                $(".gosi-gate-prof").css("visibility", "visible").animate({opacity:1}); 
            }  
        });
    });

    //캐스트
    $(function() {
        var slidesImg1 = $(".castslider").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:3,
            maxSlides:3,
            slideWidth: 370,
            slideMargin:5,
            autoHover: true,
            moveSlides:1,
            pager:true,
        });
        $("#imgBannerLeft1").click(function (){
            slidesImg1.goToPrevSlide();
        });

        $("#imgBannerRight1").click(function (){
            slidesImg1.goToNextSlide();
        });
    });
</script>
@stop