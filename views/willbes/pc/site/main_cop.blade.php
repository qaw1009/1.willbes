@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container cop NSK c_both">
    <div class="Section Bnr mt15 mb40">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_180921.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')

    <div class="Section MainVisual mt20 mb30">
        <div class="widthAuto">
            <div class="VisualBox p_re">
                <div id="MainRollingDiv" class="MaintabList four">
                    <ul class="Maintab">
                        <li><a data-slide-index="0" href="javascript:void(0);" class="active">평생 12개월 PASS</a></li>
                        <li><a data-slide-index="1" href="javascript:void(0);" class="">필합 문풀 PASS</a></li>
                        <li><a data-slide-index="2" href="javascript:void(0);" class="">기본이론</a></li>
                        <li><a data-slide-index="3" href="javascript:void(0);" class="">심화이론/기출</a></li>
                    </ul>
                </div>
                <div id="MainRollingSlider" class="MaintabBox">
                    <div class="bx-wrapper">
                        <div class="bx-viewport">
                            <ul class="MaintabSlider">
                                <li><a href="http://www.willbescop.net/gosi/event.html?event_cd=On_180327_yp&topMenuType=O" target="_blank"><img src="{{ img_url('cop/visual/visual_180914.jpg') }}"></a></li>
                                <li><a href="http://www.willbescop.net/movie/event.html?event_cd=On_180830_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop/visual/visual_180915.jpg') }}"></a></li>
                                <li><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170831_p&topMenuType=O#main" target="_blank"><img src="{{ img_url('cop/visual/visual_180916.jpg') }}"></a></li>
                                <li><a href="http://www.willbescop.net/movie/event.html?event_cd=On_180904_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop/visual/visual_180917.jpg') }}"></a></li>
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="VisualsubBox">
                <ul>
                    <li><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170511_p&topMenuType=O#main" target="_blank"><img src="{{ img_url('cop/visual/visualsub_180914.jpg') }}"></a></li>
                    <li><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_180826_p&topMenuType=O#main" target="_blank"><img src="{{ img_url('cop/visual/visualsub_180915.jpg') }}"></a></li>
                    <!--
                    <li>
                        <div class="bSlider">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('cop/visual/visualsub_180915.jpg') }}"></a></div>
                                <div><img src="{{ img_url('cop/visual/visualsub_180916.jpg') }}"></div>
                                <div><img src="{{ img_url('cop/visual/visualsub_180915.jpg') }}"></div>
                                <div><img src="{{ img_url('cop/visual/visualsub_180916.jpg') }}"></div>
                            </div>
                        </div>
                    </li>
                    -->
                </ul>
            </div>
            <div class="VisualList c_both mt20">
                <ul>
                    <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_180917.jpg') }}"></a></li>
                    <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_180918.jpg') }}"></a></li>
                    <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_180919.jpg') }}"></a></li>
                    <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_180920.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Bnr">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="http://www.willbescop.net/movie/event.html?event_cd=On_180905_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop/banner/bnr_180913.png') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Section1 mb50">
        <div class="widthAuto">
            <div class="will-Tit">윌비스 <span class="tx-color">신광은경찰</span> 강사진</div>
            <ul class="ProfBox">
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3001/prof-idx/50082/?subject_idx=10028&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95" target="_blank"><img src="{{ img_url('cop/prof/prof_180914.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/professor/show/cate/3001/prof-idx/50083/?subject_idx=10030&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0" target="_blank"><img src="{{ img_url('cop/prof/prof_180915.png') }}"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop/prof/prof_180916.png') }}"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop/prof/prof_180917.png') }}"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop/prof/prof_180918.png') }}"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop/prof/prof_180919.png') }}"></a></li>
                <!--
                <li class="p_re">         
                    <div class="cSlider graySlider AbsControls">
                        <div class="sliderControls">
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_180918.png') }}"></a></div>
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_180914.png') }}"></a></div>
                        </div>
                    </div>
                </li>
                <li class="p_re">         
                    <div class="cSlider graySlider AbsControls">
                        <div class="sliderControls">
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_180919.png') }}"></a></div>
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_180916.png') }}"></a></div>
                        </div>
                    </div>
                </li>
                -->
            </ul>
        </div>
    </div>
    <div class="Section Section2 mb50">
        <div class="widthAuto">
            <div class="will-Tit">윌비스 <span class="tx-color">신광은경찰</span> Hot Pick</div>
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_180906_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop/banner/bnr_180914.jpg') }}"></a></li>
                    <li><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_180724_y&EventReply=&topMenuType=O&searchEventNo=152" target="_blank"><img src="{{ img_url('cop/banner/bnr_180915.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Section3 mb50">
        <div class="widthAuto">
            <div class="will-Tit bd-none">경찰 3차 시험대비 <span class="tx-color">특강</span></div>
            <div class="SpecialBox">
                <dl>
                    <dt class="oneLec p_re">
                        <div class="bSlider blueSlider AbsControls">
                            <div class="slider">
                                <div>
                                    <img src="{{ img_url('cop/lecture/lec_180917.jpg') }}">
                                    <div class="infoBox">
                                        <div class="infoTit">[찍기특강]</div>
                                        <div class="infoTxt">
                                            2018년 3차대비 신광은 형사소송법 파이널 찍기특강<br/>
                                            8강 / 20일 / 업데이트 완료<br/>
                                            <ul>
                                                <li><a href="#none">강의맛보기</a></li>
                                                <li><a href="#none">자세히보기</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <img src="{{ img_url('cop/lecture/lec_180918.jpg') }}">
                                    <div class="infoBox">
                                        <div class="infoTit">[찍기특강]</div>
                                        <div class="infoTxt">
                                            2018년 3차대비 신광은 형사소송법 파이널 찍기특강<br/>
                                            8강 / 20일 / 업데이트 완료<br/>
                                            <ul>
                                                <li><a href="#none">강의맛보기</a></li>
                                                <li><a href="#none">자세히보기</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </dt>
                    <dt class="oneLec p_re">
                        <div class="bSlider blueSlider AbsControls">
                            <div class="slider">
                                <div>
                                    <img src="{{ img_url('cop/lecture/lec_180918.jpg') }}">
                                    <div class="infoBox">
                                        <div class="infoTit">[찍기특강]</div>
                                        <div class="infoTxt">
                                            2018년 3차대비 신광은 형사소송법 파이널 찍기특강<br/>
                                            8강 / 20일 / 업데이트 완료<br/>
                                            <ul>
                                                <li><a href="#none">강의맛보기</a></li>
                                                <li><a href="#none">자세히보기</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <img src="{{ img_url('cop/lecture/lec_180917.jpg') }}">
                                    <div class="infoBox">
                                        <div class="infoTit">[찍기특강]</div>
                                        <div class="infoTxt">
                                            2018년 3차대비 신광은 형사소송법 파이널 찍기특강<br/>
                                            8강 / 20일 / 업데이트 완료<br/>
                                            <ul>
                                                <li><a href="#none">강의맛보기</a></li>
                                                <li><a href="#none">자세히보기</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </dt>
                    <dt class="twoLec p_re">
                        <ul>
                            <li class="p_re">            
                                <a href="#none">
                                    <div class="infoTxt">
                                        2018년 3차대비 하승민 영어<br/>
                                        <span class="tx-bright-blue">구문독해&독해특강</span> 패키지<br/>
                                        <span class="w-date">2018.9.28 개강 / 50일</span><br/>
                                    </div>
                                    <div class="imgBox">
                                        <img src="{{ img_url('sample/prof_detail_50082.png') }}">
                                    </div>
                                </a>
                            </li>
                            <li class="p_re">
                                <div class="bSlider blueSlider AbsControls Left">
                                    <div class="slider">
                                        <div>
                                            <a href="#none">
                                                <div class="infoTxt">
                                                    2018년 3차대비 <span class="tx-bright-blue">3단계 Final</span><br/>
                                                    <span class="tx-bright-blue">실전모의고사</span>(史 오태진)<br/>
                                                    <span class="w-date">2018.9.28 개강 / 20일</span><br/>
                                                </div>
                                                <div class="imgBox">
                                                    <img src="{{ img_url('sample/prof_detail_50083.png') }}">
                                                </div>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#none">
                                                <div class="infoTxt">
                                                    2018년 3차대비 <span class="tx-bright-blue">3단계 Final</span><br/>
                                                    <span class="tx-bright-blue">실전모의고사</span>(史 오태진)<br/>
                                                    <span class="w-date">2018.9.28 개강 / 20일</span><br/>
                                                </div>
                                                <div class="imgBox">
                                                    <img src="{{ img_url('sample/prof_detail_50082.png') }}">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </dt>
                </dl>
            </div>
        </div>
    </div>
    <div class="Section Bnr mb50">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="http://www.willbescop.net/movie/event.html?event_cd=On_180713_y&topMenuType=O" target="_blank"><img src="{{ img_url('cop/banner/bnr_180916.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Section4 mb50">
        <div class="widthAuto">
            <dl class="NoticeBox two">
                <dt class="noticeList">
                    <div class="noticeTabs c_both">
                        <ul class="tabWrap noticeWrap three">
                            <li><a href="#notice1" class="on">공지사항</a><span class="row-line">|</span></li>
                            <li><a href="#notice2" class="">시험공고</a><span class="row-line">|</span></li>
                            <li><a href="#notice3" class="">수험뉴스</a></li>
                        </ul>
                        <div class="tabBox noticeBox">
                            <div id="notice1" class="tabContent p_re">
                                <a href="#none" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                <ul class="List-Table">
                                    <li><a href="#none">공지사항 제목이 출력됩니다.</a><span class="date">2018.09.06</span></li>
                                    <li><a href="#none">3월 31일(금) 새벽시스템점검안내 안내안내안내</a><span class="date">2018.09.01</span></li>
                                    <li><a href="#none">설연휴학원고객센터운영안내</a><span class="date">2018.08.24</span></li>
                                    <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018.08.13</span></li>
                                </ul>
                            </div>
                            <div id="notice2" class="tabContent p_re">
                                <a href="#none" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                <ul class="List-Table">
                                    <li><a href="#none">공지사항 제목이 출력됩니다.</a><span class="date">2018.09.06</span></li>
                                    <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a><span class="date">2018.09.01</span></li>
                                    <li><a href="#none">설연휴학원고객센터운영안내22</a><span class="date">2018.08.24</span></li>
                                    <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2018.08.13</span></li>
                                </ul>
                            </div>
                            <div id="notice3" class="tabContent p_re">
                                <a href="#none" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                <ul class="List-Table">
                                    <li><a href="#none">공지사항 제목이 출력됩니다.333</a><span class="date">2018.09.06</span></li>
                                    <li><a href="#none">3월 31일(금) 새벽시스템점검안내33</a><span class="date">2018.09.01</span></li>
                                    <li><a href="#none">설연휴학원고객센터운영안내33</a><span class="date">2018.08.24</span></li>
                                    <li><a href="#none">추석교재배송및고객센터휴무안내33</a><span class="date">2018.08.13</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </dt>
                <dt class="freeLec p_re">
                    <div class="will-listTit">신광은경찰 무료강좌</div>
                    <div class="nSliderTM graySlider AbsControls">
                        <div class="sliderNumTM">
                            <div>
                                <ul>
                                    <li class="p_re">
                                        <div class="infoBox">
                                            <div class="infoTit">[테마별특강]</div>
                                            <a class="btn-add" href="#none"><img src="{{ img_url('cop/icon_add_mid.png') }}"></a>
                                            <a href="#none">
                                                <div class="infoTxt">
                                                    2018년 1차 대비<br/>
                                                    김원욱 형법<br/>
                                                    1개년 최신 판례특강<br/>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="p_re">
                                        <div class="infoBox">
                                            <div class="infoTit">[입문특강]</div>
                                            <a class="btn-add" href="#none"><img src="{{ img_url('cop/icon_add_mid.png') }}"></a>
                                            <a href="#none">
                                                <div class="infoTxt">
                                                    신광은 형사소송법<br/>
                                                    상소 및 재심특강<br/>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="p_re">
                                        <div class="infoBox">
                                            <div class="infoTit">[기출해설특강]</div>
                                            <a class="btn-add" href="#none"><img src="{{ img_url('cop/icon_add_mid.png') }}"></a>
                                            <a href="#none">
                                                <div class="infoTxt">
                                                    신광은형소법 17년 상반기<br/>
                                                    최신기출특강(북부여경, 경찰특공대, 국가직 9급)
                                                </div> 
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li class="p_re">
                                        <div class="infoBox">
                                            <div class="infoTit">[테마별특강2]</div>
                                            <a class="btn-add" href="#none"><img src="{{ img_url('cop/icon_add_mid.png') }}"></a>
                                            <a href="#none">
                                                <div class="infoTxt">
                                                    2018년 1차 대비aa<br/>
                                                    김원욱 형법<br/>
                                                    1개년 최신 판례특강<br/>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="p_re">
                                        <div class="infoBox">
                                            <div class="infoTit">[입문특강3]</div>
                                            <a class="btn-add" href="#none"><img src="{{ img_url('cop/icon_add_mid.png') }}"></a>
                                            <a href="#none">
                                                <div class="infoTxt">
                                                    신광은 형사소송법bb<br/>
                                                    상소 및 재심특강<br/>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="p_re">
                                        <div class="infoBox">
                                            <div class="infoTit">[기출해설특강4]</div>
                                            <a class="btn-add" href="#none"><img src="{{ img_url('cop/icon_add_mid.png') }}"></a>
                                            <a href="#none">
                                                <div class="infoTxt">
                                                    신광은형소법 17년 상반기cc<br/>
                                                    최신기출특강(북부여경, 경찰특공대, 국가직 9급)<br/>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </dt>
            </dl>
            <dl class="NoticeBox four">
                <dt class="recommendBook p_re">
                    <div class="will-listTit">추천교재</div>
                    <div class="nSliderTM graySlider AbsControls">
                        <div class="sliderNumTM">
                            <div>
                                <a href="#none">
                                    <div class="imgBox">
                                        <img src="{{ img_url('sample/book.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">좋은책 / 김원욱</div>
                                        <div class="infoTxt">
                                            2018 김원욱 형법<br/>
                                            원욱이형 키워드1.0<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                    <div class="imgBox">
                                        <img src="{{ img_url('sample/book.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">좋은책 / 김원욱22222</div>
                                        <div class="infoTxt">
                                            2018 김원욱 형법aaaa<br/>
                                            원욱이형 키워드1.0<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </dt>
                <dt class="newBook p_re">
                    <div class="will-listTit">신규교재</div>
                    <div class="nSliderTM graySlider AbsControls">
                        <div class="sliderNumTM">
                            <div>
                                <a href="#none">
                                    <div class="imgBox">
                                        <img src="{{ img_url('sample/book.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">웅비 / 신광은</div>
                                        <div class="infoTxt">
                                            신광은 형사소송법<br/>
                                            필기노트 신정4판<br/>
                                            기본이론 (18년 4월)<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                    <div class="imgBox">
                                        <img src="{{ img_url('sample/book.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">웅비 / 신광은222222</div>
                                        <div class="infoTxt">
                                            신광은 형사소송법gggg<br/>
                                            필기노트 신정4판ssss<br/>
                                            기본이론 (18년 4월)<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </dt>
                <dt class="recommendLec p_re">
                    <div class="will-listTit">추천강좌</div>
                    <div class="nSliderTM graySlider AbsControls">
                        <div class="sliderNumTM">
                            <div>
                                <a href="#none">
                                    <div class="imgBox cover">
                                        <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                        <img src="{{ img_url('sample/prof3-4.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">[형사소송법] 신광은</div>
                                        <div class="infoTxt">
                                            2018 신광은 형사소송법<br/>
                                            기본이론 (3월)<br/>
                                            90,000원(0%할인)<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                    <div class="imgBox cover">
                                        <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                        <img src="{{ img_url('sample/prof3.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">[형사소송법] 신광은222222222</div>
                                        <div class="infoTxt">
                                            2018 신광은 형사소송법<br/>
                                            기본이론 (3월)<br/>
                                            90,000원(0%할인)<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </dt>
                <dt class="newLec p_re">
                    <div class="will-listTit">신규강좌</div>
                    <div class="nSliderTM graySlider AbsControls">
                        <div class="sliderNumTM">
                            <div>
                                <a href="#none">
                                    <div class="imgBox cover">
                                        <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                        <img src="{{ img_url('sample/prof3.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">[경찰학개론] 장정훈</div>
                                        <div class="infoTxt">
                                            2018 장정훈 경찰학개론<br/>
                                            기본이론 (18년 4월)<br/>
                                            90,000원(0%할인)<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                    <div class="imgBox cover">
                                        <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                        <img src="{{ img_url('sample/prof3-4.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">[경찰학개론] 장정훈22222</div>
                                        <div class="infoTxt">
                                            2018 장정훈 경찰학개론<br/>
                                            기본이론 (18년 4월)<br/>
                                            90,000원(0%할인)<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </dt>
            </dl>
        </div>
    </div>
    <div class="Section Section5 mb50">
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
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-0336</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    월-토: 09시~ 22시<br/>
                                    일요일: 09시~ 20시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>
                </dl>
            </div>
        </div>
    </div>   
</div>
{!! popup('657001') !!}
<!-- End Container -->
@stop