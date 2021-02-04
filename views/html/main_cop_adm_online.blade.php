@extends('willbes.pc.layouts.master')
@section('content')
<link href="/public/css/willbes/style_cop_adm.css??ver={{time()}}" rel="stylesheet">
<!-- Container -->
    <div id="Container" class="Container adm NGR c_both">
        <div class="Menu widthAuto NSK c_both">
            <h3>
                <ul class="menu-Tit">
                    <li class="Tit">온라인경찰<span class="row-line">|</span></li>
                    <li class="subTit">경행경채</li>
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

        <div class="Section MainVisual mt20">
            <div class="VisualBox p_re">            
                <div id="MainRollingSlider" class="MaintabBox">
                    <ul class="MaintabSlider">
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_01.jpg" alt="배너명"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_02.jpg" alt="배너명"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_03.jpg" alt="배너명"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_04.jpg" alt="배너명"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_05.jpg" alt="배너명"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_06.jpg" alt="배너명"></a></li>
                    </ul>                  
                    <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p> 
                </div> 
                <div id="MainRollingDiv" class="MaintabList NSK">
                    <div class="Maintab">
                        <span><a data-slide-index="0" href="javascript:void(0);" class="active">0원 무제한 패스</a></span>
                        <span><a data-slide-index="1" href="javascript:void(0);" class="">개편과목 프리패스</a></span>
                        <span><a data-slide-index="2" href="javascript:void(0);" class="">신광은 형사법</a></span>
                        <span><a data-slide-index="3" href="javascript:void(0);" class="">장정훈 경찰학</a></span>
                        <span><a data-slide-index="4" href="javascript:void(0);" class="">김원욱 헌법</a></span>
                        <span><a data-slide-index="5" href="javascript:void(0);" class="">환승할인</a></span>
                    </div>
                </div>           
            </div>        
        </div>

        <div class="Section mt100">
            <div class="widthAuto NSK">
                <ul>
                    <li class="SecBanner02">
                        <div class="tag">#초시생 잇템 SUPER PASS</div>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_01.jpg" title="배너명"></a>
                    </li>
                    <li class="SecBanner02">
                        <div class="tag">#12개월 끝장 PASS</div>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_02.jpg" title="배너명"></a>
                    </li>
                    <li class="SecBanner02">
                        <div class="tag">#문제풀이 풀패키지</div>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_03.jpg" title="배너명"></a>
                    </li>
                    <li class="SecBanner02">
                        <div class="bSlider">        
                            <div class="slider">
                                <div>
                                    <div class="tag">#기본이 중요! 기본이론 집중완성</div>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_04.jpg" title="배너명"></a>
                                </div>
                                <div>
                                    <div class="tag">#기본이론 집중완성</div>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_05.jpg" title="배너명"></a>
                                </div>
                                <div>
                                    <div class="tag">#기본이론 집중완성</div>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_06.jpg" title="배너명"></a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div> 

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    최근 <span class="cop-color">업로드</span> 강좌
                    <span class="f_right tx12 NSK-Thin pt10">* 최근 1주일 이내 업데이트된 강좌들 입니다.</span>
                </div>
                <div class="uploadLec NSK">
                    <div class="vSlider">
                        <div class="sliderNumV">
                            <div>
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/51135/lec_list_51135.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>형법 신광은</p>
                                            <p>2021년 1차대비 신광은 형법 기본이론(20년 11월)</p>
                                            <p>12월 16일 총 4강 업로드</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50135/lec_list_50135.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>영어 하승민</p>
                                            <p>2021년 1차대비 하승민 영어 형법 기본이론(20년 11,12월)</p>
                                            <p>12월 16일 총 3강 업로드</p>
                                        </div>
                                    </a>
                                </div>   
                            </div>

                            <div>                         
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/51146/lec_list_51146.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>형법 김원욱</p>
                                            <p>2021년 1차대비 김원욱 형법 기본이론(20년 11월)</p>
                                            <p>12월 16일 총 4강 업로드</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50748/lec_list_50748.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>영어 김현정</p>
                                            <p>2021년 1차대비 김현정 영어 형법 기본이론(20년 11,12월)</p>
                                            <p>12월 16일 총 3강 업로드</p>
                                        </div>
                                    </a>
                                </div>   
                            </div>  

                            <div>                      
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50748/lec_list_50748.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>영어 김현정</p>
                                            <p>2021년 1차대비 김현정 영어 형법 기본이론(20년 11,12월)</p>
                                            <p>12월 16일 총 3강 업로드</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/51135/lec_list_51135.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>형법 신광은</p>
                                            <p>2021년 1차대비 신광은 형법 기본이론(20년 11월)</p>
                                            <p>12월 16일 총 4강 업로드</p>
                                        </div>
                                    </a>
                                </div>  
                            </div>

                            <div>                       
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/51135/lec_list_51135.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>형법 신광은</p>
                                            <p>2021년 1차대비 신광은 형법 기본이론(20년 11월)</p>
                                            <p>12월 16일 총 4강 업로드</p>
                                        </div>
                                    </a>
                                </div> 
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50748/lec_list_50748.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>영어 김현정</p>
                                            <p>2021년 1차대비 김현정 영어 형법 기본이론(20년 11,12월)</p>
                                            <p>12월 16일 총 3강 업로드</p>
                                        </div>
                                    </a>
                                </div>  
                            </div>

                            <div>                                             
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/51146/lec_list_51146.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>형법 김원욱</p>
                                            <p>2021년 1차대비 김원욱 형법 기본이론(20년 11월)</p>
                                            <p>12월 16일 총 4강 업로드</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50748/lec_list_50748.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>영어 김현정</p>
                                            <p>2021년 1차대비 김현정 영어 형법 기본이론(20년 11,12월)</p>
                                            <p>12월 16일 총 3강 업로드</p>
                                        </div>
                                    </a>
                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    개편 과목 <span class="cop-color">전문 교수진</span>
                    <span class="tx16 NSK-Thin pt10 ml20">2022년 경찰 합격을 위한 선택! 과목개편 대비 강좌을 경험해보세요.</span>
                </div>
                <ul class="SecBanner03">
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_370x415_01.jpg" title="배너명">
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_370x415_02.jpg" title="배너명">
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_370x415_03.jpg" title="배너명">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section mt70">
            <div class="widthAuto SecBanner04">
                <div class="bSlider">
                    <div class="slider">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_1120x100_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_1120x100_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_1120x100_03.jpg" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section SectionBg01 mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    전문 <span class="cop-color">교수진</span>
                    <span class="tx16 NSK-Thin pt10 ml20">최고의 교수진으로 수험생의 합격을 돕겠습니다.</span>
                </div>
                <ul class="SecBanner05">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2001/3002_208x320_01.jpg" alt="배너명" usemap="#Map220A" border="0">
                        <a href="#none" title="맛보기영상"></a>
                        <a href="#none" title="베스트강좌" class="link02"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2001/3002_208x320_02.jpg" alt="배너명" usemap="#Map220B" border="0">
                        <a href="#none" title="맛보기영상"></a>
                        <a href="#none" title="베스트강좌" class="link02"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2001/3002_208x320_03.jpg" alt="배너명" usemap="#Map220C" border="0">
                        <a href="#none" title="맛보기영상"></a>
                        <a href="#none" title="베스트강좌" class="link02"></a>
                    </li>                
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2001/3002_208x320_04.jpg" alt="배너명" usemap="#Map220D" border="0">
                        <a href="#none" title="맛보기영상"></a>
                        <a href="#none" title="베스트강좌" class="link02"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2001/3002_208x320_05.jpg" alt="배너명" usemap="#Map220E" border="0">
                        <a href="#none" title="맛보기영상"></a>
                        <a href="#none" title="베스트강좌" class="link02"></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section SectionBg02 NSK">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    수험생 맞춤 콘텐츠
                    <span class="tx16 NSK-Thin pt10 ml20">경시생들에게 제공하는 수강 맞춤 콘텐츠 입니다.</span>
                </div>
                <ul class="SecBanner06">
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_01.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_02.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_03.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_04.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_05.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_06.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_07.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_08.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_09.jpg" alt="배너명"></a>
                    </li>
                </ul>
                <div class="will-nTit NSK-Black mt100">
                    신광은경찰팀 TV
                </div>
                <div class="tabTv">
                    <div class="tabTvBtns">
                        <ul class="NSK-Black">
                            <li><a href="#tabTv01" class="on"><span>커리큘럼 & 공부방법</span></a></li>
                            <li><a href="#tabTv02"><span>신광은경찰팀 특강</span></a></li>
                            <li><a href="#tabTv03"><span>합격생 영상</span></a></li>
                        </ul>
                        <div class="moreBtn"><a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank">영상 더보기 ></a></div>
                    </div>
                    <div id="tabTv01" class="TvctsBox">
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_01.jpg" alt="배너명"></a>
                            <p>2022년 커리큘&공부방법</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_02.jpg" alt="배너명"></a>
                            <p>22년 개편 경찰학 완전대비</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_03.jpg" alt="배너명"></a>
                            <p>경찰헌법 무료특강</p>
                        </div>
                    </div>
                    <div id="tabTv02" class="TvctsBox">                    
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_02.jpg" alt="배너명"></a>
                            <p>22년 개편 경찰학 완전대비</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_03.jpg" alt="배너명"></a>
                            <p>경찰헌법 무료특강</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_01.jpg" alt="배너명"></a>
                            <p>2022년 커리큘&공부방법</p>
                        </div>
                    </div>
                    <div id="tabTv03" class="TvctsBox">
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_03.jpg" alt="배너명"></a>
                            <p>경찰헌법 무료특강</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_01.jpg" alt="배너명"></a>
                            <p>2022년 커리큘&공부방법</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_02.jpg" alt="배너명"></a>
                            <p>22년 개편 경찰학 완전대비</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto SecBanner07">
                <div class="will-nTit NSK-Black">
                    경찰학원 핫 이슈 
                    <span class="tx16 NSK-Thin pt10 ml20">학원의 최신 소식을 한 눈에 확인하세요.</span>
                </div>
                <ul>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x361_01.jpg" alt="배너명">
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x361_01.jpg" alt="배너명">
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x361_01.jpg" alt="배너명">
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x181_01.jpg" alt="배너명">
                        </a>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x181_02.jpg" alt="배너명">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="Section SectionBg03 mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    경찰 BEST <span class="tx-color">교재</span>
                    <span class="tx16 NSK-Thin pt10 ml20">최고의 교수진으로 수험생의 합격을 돕겠습니다.</span>
                    <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                </div>
                <div class="bookContent NSK">
                    <ul class="bookList">
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span>                       
                                <div class="bookImg">                                
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311683_sm.jpg" title="교재명">
                                </div>
                                <div>
                                    <p>네친구 신광은 형사소송법(신정10판)</p>
                                    <p>[판매중] 10,800원 (10%)</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311691_sm.jpg" title="교재명">
                                </div>
                                <p>2021 경찰채용 1차대비 김원욱 형법 적중예상문제풀이</p>
                                <p>[판매중] 20,700원 (↓10%)</p>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311717_sm.jpg" title="교재명">
                                </div>                        
                                <p>2020 슬림한 친족 상속법의 맥</p>
                                <p>[판매중] 8,800원 (↓20%)</p>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311728_sm.jpg" title="교재명">
                                </div>                        
                                <p>2020 민사소송법과 부속법 조문집</p>
                                <p>[판매중] 8,800원 (↓20%)</p>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311719_sm.jpg" title="교재명">
                                </div>                        
                                <p>2020 원가관리회계 문제풀이</p>
                                <p>[품절] 20,700원 (↓10%)</p>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311683_sm.jpg" title="교재명">
                                </div>
                                <div>                            
                                    <p>2020 원가관리회계 문제풀이</p>
                                    <p>[판매중] 8,800원 (↓20%)</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311691_sm.jpg" title="교재명">
                                </div>                        
                                <p>2021 법률저널 LEET 전국 봉투 모의고사 제4회 - 20.06.21 시행</p>
                                <p>[판매중] 20,700원 (↓10%)</p>
                            </a>
                        </li>
                    </ul>  
                    <p class="leftBtn" id="imgBannerLeft3"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight3"><a href="none">다음</a></p>         
                </div>
            </div>
        </div>

        {{-- 교재보기 팝업 willbes-Layer-Box --}}
        <div id="InfoForm" class="willbes-Layer-Box">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm'),closeWin('bookPocketBox')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">
                교재상세정보
            </div>
            <div class="lecDetailWrap">
                <div class="tabBox">
                    <div class="tabLink book2">
                        <div class="bookWrap">
                            <div class="bookInfo">
                                <div class="bookImg">
                                    <img src="{{ img_url('sample/book.jpg') }}">
                                </div>
                                <div class="bookDetail p_re">
                                    <div class="bookBuy">
                                        <ul class="bookBuyBtns">
                                            <li class="btnCart"><a onclick="openWin('bookPocketBox')">장바구니</a>                                
                                            <li class="btnBuy"><a href="#none">바로결제</a></li>
                                        </ul>
                                        <div id="bookPocketBox" class="bookPocketBox">
                                            <a class="closeBtn" href="#none" onclick="closeWin('bookPocketBox')">
                                                <img src="{{ img_url('cart/close.png') }}">
                                            </a>
                                            해당 상품이 장바구니에 담겼습니다.<br/>
                                            장바구니로 이동하시겠습니까?
                                            <ul class="NSK mt20">
                                                <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('bookPocketBox')">닫기</a></li>
                                            </ul>
                                        </div>  
                                    </div>

                                    <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집 (전2권)</div>
                                    <div class="book-Author tx-gray">
                                        <ul>
                                            <li>분야 : 9급공무원 <span class="row-line">|</span></li>
                                            <li>저자 : 저자명 <span class="row-line">|</span></li>
                                            <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                            <li>판형/쪽수 : 190*260 / 769</li>
                                        </ul>
                                        <ul>
                                            <li>출판일 : 2018-00-00 <span class="row-line">|</span></li>
                                            <li>교재비 : <strong class="tx-light-blue">20,000원</strong> (↓20%) <strong class="tx-red">[품절]</strong> <strong class="tx-light-blue">[판매중]</strong></li>
                                        </ul>
                                    </div>
                                    <div class="bookBoxWrap">
                                        <ul class="tabWrap tabDepth2">
                                            <li><a href="#info1" class="on">교재소개</a></li>
                                            <li><a href="#info2">교재목차</a></li>
                                        </ul>
                                        <div class="tabBox">
                                            <div id="info1" class="tabContent">
                                                <div class="book-TxtBox tx-gray">
                                                    2018년재신정판을내면서..<br/>
                                                    첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                    둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                    셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                    기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                                </div>
                                                <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
                                            </div>
                                            <div id="info2" class="tabContent">
                                                <div class="book-TxtBox tx-gray">
                                                    제1편 현대 문법<br/>
                                                    제2편 고전 문법<br/>
                                                    제3편 국어 생활<br/>
                                                    제4편 현대 문학<br/>
                                                    제5편 고전 문학<br/>
                                                    제1편 현대 문법<br/>
                                                    제2편 고전 문법<br/>
                                                    제3편 국어 생활<br/>
                                                    제4편 현대 문학<br/>
                                                    제5편 고전 문학
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-Box -->  

        <div class="Section Section6 mt80">
            <div class="widthAuto">
                <div class="nNoticeBox three">
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

        <div class="Section Section7 mt30">
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

        <div class="Section Section7 mt50 mb50">
            <div class="widthAuto">
                <div class="collaborate">
                    <div id="collaboslides">
                        <ul>
                            <li>
                                <a href="https://www.police.go.kr/main.html" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_01.jpg" alt="경찰청"></a>
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
            <ul>
                <li class="dday">
                    <div class="QuickSlider">
                        <div class="sliderNum">
                            <div class="QuickDdayBox">
                                <div class="q_tit">3차 필기시험</div>
                                <div class="q_day">2018.12.12</div>
                                <div class="q_dday NSK-Blac">D-5</div>
                            </div>
                        </div>
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
    //상단배너
        $(function(){ 
        var slidesImg = $(".MaintabSlider").bxSlider({
            mode:'horizontal',
            touchEnabled: false,
            speed:400,
            pause:5000,
            sliderWidth:2000,
            auto : true,	
            autoHover: true,						
            pagerCustom: '#MainRollingDiv',
            controls:false, 				
            onSliderLoad: function(){
                $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1}); 
            }
        });	
        $("#imgBannerLeft").click(function (){
            slidesImg.goToPrevSlide();
        });
    
        $("#imgBannerRight").click(function (){
            slidesImg.goToNextSlide();
        });			
    }); 

    //최근 업로드 강좌 
    $(function() {
        $('.sliderNumV').bxSlider({
            mode: 'fade', 
            auto: true,
            touchEnabled: false,
            controls: false,
            pause: 3000,
            autoHover: true,
            pager:true,
            onSliderLoad: function(){
                $(".vSlider").css("visibility", "visible").animate({opacity:1}); 
            }
        });
    });

    
    //경찰팀 TV
    $(function() {
        $('.tabTvBtns ul').each(function () {
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
            $content = $($active[0].hash);
            $links.not($active).each(function () {
                $(this.hash).css({visibility: 'hidden', height: '0', overflow: 'hidden'});
            });

            $(this).on('click', 'a', function (e) {
                $active.removeClass('on');
                $content.hide().css({visibility: 'hidden', height: '0', overflow: 'hidden'});

                $active = $(this);
                $content = $(this.hash);

                $active.addClass('on');
                $content.show().css({visibility: 'visible', height: 'auto', overflow: 'visible'});
                e.preventDefault();
            });
        });
    });

    //교재
    $(function() {
        var slidesImg1 = $(".bookList").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:6,
            maxSlides:6,
            slideWidth: 186,
            slideMargin:0,
            autoHover: true,
            moveSlides:1,
            pager:true,
            touchEnabled: false,
        });
        $("#imgBannerLeft3").click(function (){
            slidesImg1.goToNextSlide();
        });
        $("#imgBannerRight3").click(function (){
            slidesImg1.goToPrevSlide();
        });        
    });
</script>

@stop