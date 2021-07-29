@extends('willbes.pc.layouts.master')

@section('content')

<link href="/public/css/willbes/style_gosi_gate_2021.css??ver={{time()}}" rel="stylesheet">

<!-- Container -->

<div id="Container" class="Container gosi-gate-v2 NSK c_both">

    <div class="widthAuto gosi-gate-secTop">
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

        <div class="Menu widthAuto NSK c_both">
            <h3>
                <div class="menu-Tit">
                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/2003_logo_2021.png" alt="윌비스공무원">
                </div>
                <ul class="menu-List">
                    <div>
                        <a href="#none">9급</a>
                    </div>
                    <div>
                        <a href="#none">7급PSAT</a>
                    </div>
                    <div>
                        <a href="#none">7급</a>
                    </div>
                    <div>
                        <a href="#none">세무직</a>
                    </div>
                    <div>
                        <a href="#none">법원직</a>
                    </div>
                    <div>
                        <a href="#none">소방직</a>
                    </div>
                    <div>
                        <a href="#none">기술직</a>
                    </div>
                    <div>
                        <a href="#none">군무원</a>
                    </div>
                    <div class="dropdown">
                        <a href="#none"><span></span>학원</a>
                        <div class="drop-Box list-drop-Box">
                            <ul>
                                <li><a href="#none">노량진(본원)</a></li>
                                <li><a href="#none">부산</a></li>
                                <li><a href="#none">대구</a></li>
                                <li><a href="#none">인천</a></li>
                                <li><a href="#none">광주</a></li>
                            </ul>
                        </div>
                    </div>
                </ul>
                <div class="menu-banner">
                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_330x100.jpg" alt="배너"></a>
                </div>
            </h3>
        </div>
    </div> 

    <div class="Section gosi-gate-Sec">                
        <div class="gosi-gate-bntop-img" id="gosiMainSlide">
            <div class="gate-bntop-Slider mainSlider01">
                <ul class="swiper-wrapper">
                    <li class="swiper-slide">
                        <div class="bnBig">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopL_815x400.jpg" alt="배너명">
                            </a>
                        </div>
                        <div class="bnSm">
                            <div>
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_03.jpg" alt="배너명">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide">
                        <div class="bnBig">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopL_815x400.jpg" alt="배너명">
                            </a>
                        </div>
                        <div class="bnSm">
                            <div>
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_03.jpg" alt="배너명">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide">
                        <div class="bnBig">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopL_815x400.jpg" alt="배너명">
                            </a>
                        </div>
                        <div class="bnSm">
                            <div>
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_03.jpg" alt="배너명">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide">
                        <div class="bnBig">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopL_815x400.jpg" alt="배너명">
                            </a>
                        </div>
                        <div class="bnSm">
                            <div>
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_03.jpg" alt="배너명">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide">
                        <div class="bnBig">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopL_815x400.jpg" alt="배너명">
                            </a>
                        </div>
                        <div class="bnSm">
                            <div>
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_03.jpg" alt="배너명">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide">
                        <div class="bnBig">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopL_815x400.jpg" alt="배너명">
                            </a>
                        </div>
                        <div class="bnSm">
                            <div>
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_03.jpg" alt="배너명">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide">
                        <div class="bnBig">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopL_815x400.jpg" alt="배너명">
                            </a>
                        </div>
                        <div class="bnSm">
                            <div>
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_03.jpg" alt="배너명">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide">
                        <div class="bnBig">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopL_815x400.jpg" alt="배너명">
                            </a>
                        </div>
                        <div class="bnSm">
                            <div>
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_03.jpg" alt="배너명">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide">
                        <div class="bnBig">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopL_815x400.jpg" alt="배너명">
                            </a>
                        </div>
                        <div class="bnSm">
                            <div>
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_03.jpg" alt="배너명">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide">
                        <div class="bnBig">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopL_815x400.jpg" alt="배너명">
                            </a>
                        </div>
                        <div class="bnSm">
                            <div>
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bntopR_265x120_03.jpg" alt="배너명">
                                </a>
                            </div>
                        </div>
                    </li>
                </ul> 
            </div>                     
        </div>   

        <div class="MaintabList">
            <div class="widthAuto p_re">
                <div class="MaintabControl">
                    <div class="swiper-pagination-gate"></div>
                    <div class="start" style="display:none;"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconPlay.png" alt="재생"></div>
                    <div class="stop"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconStop.png" alt="정지"></div>
                    <div class="swiper-btn-prev"></div>
                    <div class="swiper-btn-next"></div>                    
                </div>
                <div class="MaintabWrap">
                    <ul class="Maintab">
                        <li><a data-swiper-slide-index="0" href="javascript:void(0);" class="active">9급pass</a></li>
                        <li><a data-swiper-slide-index="1" href="javascript:void(0);">7급pass</a></li>
                        <li><a data-swiper-slide-index="2" href="javascript:void(0);">세무직pass</a></li>
                        <li><a data-swiper-slide-index="3" href="javascript:void(0);">법원직pass</a></li>
                        <li><a data-swiper-slide-index="4" href="javascript:void(0);">농업직pass</a></li>
                        <li><a data-swiper-slide-index="5" href="javascript:void(0);">통신/전기pass</a></li>
                        <li><a data-swiper-slide-index="6" href="javascript:void(0);">전산직pass</a></li>
                        <li><a data-swiper-slide-index="7" href="javascript:void(0);">환경직pass</a></li>
                        <li><a data-swiper-slide-index="8" href="javascript:void(0);">산림자원직</a></li>
                        <li><a data-swiper-slide-index="9" href="javascript:void(0);">조경계획 및 설계</a></li>
                    </ul>
                </div>
                <div class="MaintabAll">
                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/btnAB.png" alt="전체보기"></a>
                </div>
                <div class="MaintabAllView" style="display:none;">
                    <div class="title">
                        <span>진행중인 모든 이벤트</span>
                        <span><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/btnClose.png" alt="닫기"></a></span>
                    </div>
                    <div class="tabCts">
                        <a data-swiper-slide-index="0" class="active">9급pass</a>
                        <a data-swiper-slide-index="1" href="javascript:void(0);">7급pass</a>
                        <a data-swiper-slide-index="2" href="javascript:void(0);">세무직pass</a>
                        <a data-swiper-slide-index="3" href="javascript:void(0);">법원직pass</a>
                        <a data-swiper-slide-index="4" href="javascript:void(0);">농업직pass</a>
                        <a data-swiper-slide-index="5" href="javascript:void(0);">통신/전기pass</a>
                        <a data-swiper-slide-index="6" href="javascript:void(0);">전산직pass</a>
                        <a data-swiper-slide-index="7" href="javascript:void(0);">환경직pass</a>
                        <a data-swiper-slide-index="8" href="javascript:void(0);">산림자원직</a>
                        <a data-swiper-slide-index="9" href="javascript:void(0);">조경계획 및 설계</a>
                    </div>
                </div>                 
            </div>
        </div> 
    </div>
    

    <div class="Section newsWrap">
        <div class="widthAuto">
            <div class="will-nTit NSK-Black">지금 바로 주목해야 할 <span>새로운 소식!</span></div> 
            <div class="newsBox">
                <ul class="newsSlider">
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x251_01.png" alt="배너명">
                            </a>
                        </div>
                        <div class="newsTitle">신광은교수님이 칠판을 사고 외워야 했던 이유는?</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x251_02.png" alt="배너명">
                            </a>
                        </div>
                        <div class="newsTitle">신광은 경찰팀이 19년2차 합격생들과 함께한 ★대환장파티★ 기대하셔도 좋습니다 </div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x251_03.png" alt="배너명">
                            </a>
                        </div>
                        <div class="newsTitle">190504 중앙경찰학교 입교 현장스케치</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x251_04.png" alt="배너명">
                            </a>
                        </div>
                        <div class="newsTitle">신광은 경찰학원 행사이벤트 및 커리큘럼안내</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x251_05.png" alt="배너명">
                            </a>
                        </div>
                        <div class="newsTitle">합격생이 말해주는 1단계 문제풀이 ☜ 12월30일 大개강이라닛☆</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x251_01.png" alt="배너명">
                            </a>
                        </div>
                        <div class="newsTitle">압도적 1위 장정훈 교수 6만돌파 이벤트!</div>
                    </li>
                </ul> 
                <p class="leftBtn"><a id="newsSliderLeft"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconAL60.png"></a></p>                   
                <p class="rightBtn"><a id="newsSliderRight"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconAR60.png"></a></p>                              
            </div>
        </div>
    </div>
    
    <div class="Section gosi-bnfull02">
        <div class="widthAuto">
            <div class="will-nTit NSK-Black"><span>초보 수험생</span>이라면, <span>꼭</span> 확인해보세요!</div>
        </div>
        <div class="slider">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_2000x220.jpg" alt="배너명"></a>
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_2000x220.jpg" alt="배너명"></a>
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_2000x220.jpg" alt="배너명"></a>
        </div>
    </div>

    <div class="Section mt80">        
        <div class="widthAuto tx-center">
            <div class="will-nTit NSK-Black mb40">단기 합격자는 <span>지금 이 시기, ‘이론’</span>에 <span>집중</span>했습니다.</div>
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/visual_contents.gif" alt="">
        </div>
    </div>

    <div class="Section tpassWrap">        
        <div class="widthAuto">
            <div class="will-nTit NSK-Black tx-left mb40">자신 있는 주력 과목을 만들고 싶다면, <span>윌비스 T-PASS!</span></div>
            <div class="tpassLeft">
                <div class="slider">
                    <div class="banner-group">
                        <div class="bnimg">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/tpass_540x410.jpg" alt="배너명">
                            </a>
                        </div>
                        <p>영어 합격 스나이퍼 갓덕현</p>
                        2022 대비 합격을 위한 전 과정 제공!
                    </div>

                    <div class="banner-group">
                        <div class="bnimg">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/tpass_540x410.jpg" alt="배너명">
                            </a>
                        </div>
                        <p>영어 합격 스나이퍼 갓덕현</p>
                        2022 대비 합격을 위한 전 과정 제공!
                    </div>

                    <div class="banner-group">
                        <div class="bnimg">
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/tpass_540x410.jpg" alt="배너명">
                            </a>
                        </div>
                        <p>영어 합격 스나이퍼 갓덕현</p>
                        2022 대비 합격을 위한 전 과정 제공!
                    </div>
                </div>
            </div>
            <div class="tpassRight">
                <div class="tpassRightTop">
                    <div class="slider">
                        <div class="banner-group">
                            <div class="bnimg">
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/tpass_540x160.jpg" alt="배너명">
                                </a>
                            </div>
                            <p>불꽃소방 합격의 새로운 신화 이종오</p>
                            이제, 합격의 관건은 소방학&관계법규입니다.
                        </div>

                        <div class="banner-group">
                            <div class="bnimg">
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/tpass_540x160.jpg" alt="배너명">
                                </a>
                            </div>
                            <p>불꽃소방 합격의 새로운 신화 이종오</p>
                            이제, 합격의 관건은 소방학&관계법규입니다.
                        </div>
                    </div>
                </div>
                <div class="tpassRightBottom">
                    <div class="slider">
                        <div class="banner-group">
                            <div class="bnimg">
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/tpass_260x160_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <p>정통 국어 박사 오대혁</p>
                            제대로 이해시켜주는 수험 국어의 결정체!
                        </div>

                        <div class="banner-group">
                            <div class="bnimg">
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/tpass_260x160_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <p>합격을 관통하는 한국사 김상범 한국사 김상범</p>
                            지혜롭게 공부하라! 김상범을 따르라! 김상범을 따르라!
                        </div>
                    </div>
                    <div class="slider">
                        <div class="banner-group">
                            <div class="bnimg">
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/tpass_260x160_02.jpg" alt="배너명">
                                </a>
                            </div>
                            <p>합격을 관통하는 한국사 김상범 한국사 김상범</p>
                            지혜롭게 공부하라! 김상범을 따르라! 김상범을 따르라!
                        </div>
                        
                        <div class="banner-group">
                            <div class="bnimg">
                                <a href="#none">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/tpass_260x160_01.jpg" alt="배너명">
                                </a>
                            </div>
                            <p>정통 국어 박사 오대혁</p>
                            제대로 이해시켜주는 수험 국어의 결정체!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section castWrap">
        <div class="widthAuto">
            <div class="will-nTit NSK-Black">쉬면서도 열공이 되는 <span>윌비스 YOUTUBE 영상</span>을 시청해보세요!</div>  
            <div class="castBox">
                <ul class="castslider">
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg">
                            </a>                        
                            <div class="castTitle">신광은교수님이 칠판을 사고 외워야 했던 이유는?</div>
                        </div>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg">
                            </a>                        
                            <div class="castTitle">신광은교수님이 칠판을 사고 외워야 했던 이유는?</div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg">
                            </a>                        
                            <div class="castTitle">신광은 경찰팀이 19년2차 합격생들과 함께한 ★대환장파티★ 기대하셔도 좋습니다 </div>
                        </div>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg">
                            </a>                        
                            <div class="castTitle">신광은 경찰팀이 19년2차 합격생들과 함께한 ★대환장파티★ 기대하셔도 좋습니다 </div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_03.jpg">
                            </a>                        
                            <div class="castTitle">190504 중앙경찰학교 입교 현장스케치</div>
                        </div>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_03.jpg">
                            </a>                        
                            <div class="castTitle">190504 중앙경찰학교 입교 현장스케치</div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg">
                            </a>                        
                            <div class="castTitle">신광은교수님이 칠판을 사고 외워야 했던 이유는?</div>
                        </div>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg">
                            </a>                        
                            <div class="castTitle">신광은교수님이 칠판을 사고 외워야 했던 이유는?</div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg">
                            </a>                        
                            <div class="castTitle">신광은 경찰팀이 19년2차 합격생들과 함께한 ★대환장파티★ 기대하셔도 좋습니다 </div>
                        </div>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg">
                            </a>                        
                            <div class="castTitle">신광은 경찰팀이 19년2차 합격생들과 함께한 ★대환장파티★ 기대하셔도 좋습니다 </div>
                        </div>
                    </li>
                </ul> 
                {{--
                <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/btn_arrowL.png"></a></p>                   
                <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/btn_arrowR.png"></a></p>      
                --}}                        
            </div>
        </div>
    </div>

    <div class="Section gosi-gate-profWrap">
        <div class="widthAuto">
            <div class="will-nTit NSK-Black">합격을 끝까지 책임지는 윌비스 교수진을 만나보세요!</div>        
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

    <div class="Section gosi-gate-bn02">
        <div class="widthAuto pick">  
            <div class="will-nTit NSK-Black mb40">윌비스 공무원학원 <span>노량진 캠퍼스</span>에서는 무엇을 개강하나요?</div> 

            <div class="slider">
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_1120x185.jpg" alt="배너명"></a>
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_1120x185.jpg" alt="배너명"></a>
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_1120x185.jpg" alt="배너명"></a>
            </div> 

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

    <div class="Section mt100">
        <div class="widthAuto">
            <div class="nNoticeBox three">
                <div class="noticeList widthAuto530 f_left">
                    <div class="will-nlistTit p_re">공지사항 <a href="https://cop.dev.willbes.net/support/notice/index" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>경찰3과 과목별 만점자를 소개합니다.</a><img src="{{ img_url('cop/icon_new.png') }}"><span class="date">2018-09-06</span></li>
                        <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a><span class="date">2018-09-01</span></li>
                        <li><a href="#none">[공지] 2018년 제3차 경찰공무원(순경)채용 공고 입니다.</a><span class="date">2018-08-24</span></li>
                        <li><a href="#none">[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</a><span class="date">2018-08-13</span></li>
                        <li><a href="#none">[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto530 f_right">
                    <div class="will-nlistTit p_re">시험공고 <a href="https://cop.dev.willbes.net/support/examAnnouncement/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>2018년 제3차 경찰공무원(순경)채용 필기시험 문제 및 가답안</a><img src="{{ img_url('cop/icon_new.png') }}"><span class="date">2018-09-06</span></li>
                        <li><a href="#none">[공지] 2018년 제3차 경찰공무원 채용 필기시험 문제 및 가답안</a><span class="date">2018-09-01</span></li>
                        <li><a href="#none">2018년 제3차 경찰공무원 채용시험 원서접수일정 안내입니다.</a><span class="date">2018-08-24</span></li>
                        <li><a href="#none">[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</a><span class="date">2018-08-13</span></li>
                        <li><a href="#none">[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="Section NSK mt80 mb90">
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
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/1112/banner_20210201181048.png" title="배너명"></a></div>
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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
<script type="text/javascript">

    //swiper 메인 슬라이드
    $(document).ready(function(){
        var mainslider = new Swiper('.mainSlider01', {
            direction: 'horizontal',
            loop: true,
            observer: true,
            observeParents: true,
            slidesPerView : 'auto',
            pagination: {
            el: ".swiper-pagination-gate",
            type: "fraction",
            },
            // autoplay: {
            //     delay: 3000,
            //     disableOnInteraction: false,
            // }, //3초에 한번씩 자동 넘김
            navigation: {
                nextEl: ".swiper-btn-next",
                prevEl: ".swiper-btn-prev",
            },
            on: {
                slideChange: function () {
                    $('.Maintab li > a').removeClass('active');
                    $('.Maintab li > a').eq(this.realIndex).addClass('active').trigger('click');
                    if($('.Maintab li:eq(0) > a').hasClass('active')){
                        mainslider.update();
                        // location.reload();
                    }  
                    $('.tabCts a').removeClass('active');
                    $('.tabCts a').eq(this.realIndex).addClass('active');                    
                }
            }
        });

        //메인 슬라이드 메뉴1
        $('.Maintab li > a').on('click', function(){
            $('.Maintab li > a').removeClass('active');
            $(this).addClass('active');
            var num = $(this).attr('data-swiper-slide-index');
            mainslider.slideTo(num);
            var target = $(this); 
            muCenter(target);
        });

        //슬라이드 메뉴1 클릭시 위치조정
        function muCenter(target){
            var snbwrap = $('.Maintab');
            var targetPos = target.position();
            var box = $('.MaintabWrap');
            var boxHarf = box.width()/2;
            var pos;
            var listWidth=0;
            
            snbwrap.find('li').each(function(){ listWidth += $(this).outerWidth(); })
            
            var selectTargetPos = targetPos.left + target.outerWidth()/2;
            if (selectTargetPos <= boxHarf) { // left
                pos = 0;
            }else if ((listWidth - selectTargetPos) <= boxHarf) { //right
                pos = listWidth-box.width();
            }else {
                pos = selectTargetPos - boxHarf;
            }
            
            setTimeout(function(){snbwrap.css({
                "transform": "translateX("+ (pos*-1) +"px)",
                "transition-duration": "500ms"
            })}, 200);
        } 

        //메인 슬라이드 메뉴2(진행중인 모든 이벤트)
        $('.tabCts > a').on('click', function(){
            $('.tabCts > a').removeClass('active');
            $(this).addClass('active');
            var num = $(this).attr('data-swiper-slide-index');
            mainslider.slideTo(num);    
        });
        //슬라이드 재생, 스탑 버튼
        $('.start').on('click', function() {
            mainslider.autoplay.start();
            $(this).hide();
            $('.stop').show();
            return false;
        });
        $('.stop').on('click', function() {
            mainslider.autoplay.stop();
            $(this).hide();
            $('.start').show();
            return false;
        });

        //진행중인 모든 이벤트 닫기, 열기
        $('.MaintabAll a').on('click', function() {
            $('.MaintabAllView').slideToggle("fast");
        });
        $('.MaintabAllView span a').on('click', function() {
            $('.MaintabAllView').hide();
        });
    });


    //새로운소식    
    $(function() {
        var newsImg = $(".newsSlider").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:false,
            controls:false,
            slideWidth: 224,
            minSlides:5,
            maxSlides:5,
            slideMargin:0,
            autoHover:true,
            moveSlides:1,
        });
        $("#newsSliderLeft").click(function (){
            newsImg.goToPrevSlide();
        });

        $("#newsSliderRight").click(function (){
            newsImg.goToNextSlide();
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
</script>

@stop