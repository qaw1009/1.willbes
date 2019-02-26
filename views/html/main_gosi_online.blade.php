@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->

<div id="Container" class="Container gosi NSK c_both">
    <div class="Menu widthAuto NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">공무원<span class="row-line">|</span></li>
                <li class="subTit">9급</li>
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
                    <a href="#none">공무원학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    
    <div class="Section MainVisual mt30">
        <div class="widthAuto">
            <a href="#none"><img src="{{ img_url('gosi/banner/bnr_bar01.jpg') }}" alt="배너명"></a>
        </div>
        
        <div class="widthAuto mt30">
            <div class="VisualBox p_re bSlider">
                <div id="MainRollingDiv" class="MaintabList three">
                    <ul class="Maintab">
                        <li><a data-slide-index="0" href="javascript:void(0);" class="active">9급 PASS</a></li>
                        <li><a data-slide-index="1" href="javascript:void(0);" class="">제니스 영어</a></li>
                        <li><a data-slide-index="2" href="javascript:void(0);" class="">영어완성 PACK</a></li>
                    </ul>
                </div>
                <div id="MainRollingSlider" class="MaintabBox">
                    <div class="bx-wrapper">
                        <div class="bx-viewport">
                            <ul class="MaintabSlider">
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi/visual/visual_190225_01.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi/visual/visual_190225_02.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi/visual/visual_190225_03.jpg') }}" alt="배너명"></a></li>
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="VisualsubBox">
                <div class="bSlider">
                    <div class="sliderStopAuto">
                        <div><a href="#none"><img src="{{ img_url('gosi/visual/visual_r190225_01.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi/visual/visual_r190225_02.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi/visual/visual_r190225_03.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Section">
        <div class="widthAuto">
            <div><img src="{{ img_url('gosi/visual/visual_tit01.jpg') }}" alt="더! 강력, 더! 완벽해진 윌비스 교수진"></div>
            <ul class="ProfBox">
                <li><a href="https://gosi.dev.willbes.net/professor/show/cate/3010/prof-idx/50080/?subject_idx=10014&subject_name=%EA%B5%AD%EC%96%B4" target="_blank"><img src="{{ img_url('gosi/prof/prof_190225_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="https://gosi.dev.willbes.net/professor/show/cate/3010/prof-idx/50081/?subject_idx=10017&subject_name=%EC%98%81%EC%96%B4" target="_blank"><img src="{{ img_url('gosi/prof/prof_190225_02.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/prof/prof_190225_03.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/prof/prof_190225_04.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/prof/prof_190225_05.jpg') }}" alt="배너명"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section Section3 mt110">
        <div class="widthAuto">
            <div><img src="{{ img_url('gosi/visual/visual_tit02.jpg') }}" alt="추천강좌/이벤트/최신소식"></div>
            <ul class="SpecialBox">
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t02.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t03.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t04.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t05.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t06.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t07.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t08.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t09.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t10.jpg') }}" alt="배너명"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section mt90">
        <div class="widthAuto">
            <div class="willbesLec">
                <div class="smallTit mb30">          
                    <p><span>합격 콘텐츠를 한 눈에! <strong>윌비스 강좌</strong></span></p>            
                </div>

                <div class="bestLectBx">
                    <div class="will-listTit">BEST 강좌</div>
                    
                    <div id="RollingDiv">
                        <ul class="prof-subject">
                            <li><a data-slide-index="0" href="javascript:void(0);" class="active">국어</a></li>
                            <li><a data-slide-index="1" href="javascript:void(0);" class="">영어</a></li>
                            <li><a data-slide-index="2" href="javascript:void(0);" class="">한국사</a></li>
                        </ul>
                    </div>
                    
                    <div id="RollingSlider" class="prof-professors">
                        <div class="bx-wrapper">
                            <div class="bx-viewport">
                                <div class="proftabSlider">
                                    <div class="prof-slider">
                                        <ul>                        
                                            <li>
                                                <img src="{{ img_url('gosi/prof/mainBest01.jpg') }}" alt="" class="photo"/>
                                                <span class="txt1">영어</span>
                                                <span class="txt2">한덕현</span>
                                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                                <a href="#none">맛보기강좌 ></a>
                                            </li>  
                                            <li>
                                                <img src="{{ img_url('gosi/prof/mainBest01.jpg') }}" alt="" class="photo"/>
                                                <span class="txt1">영어2</span>
                                                <span class="txt2">한덕현</span>
                                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                                <a href="#none">맛보기강좌 ></a>
                                            </li>                          
                                        </ul>   
                                    </div>
                                    <div class="prof-slider">
                                        <ul>                     
                                            <li>
                                                <img src="{{ img_url('gosi/prof/mainBest01.jpg') }}" alt="" class="photo"/>
                                                <span class="txt1">영어A</span>
                                                <span class="txt2">한덕현</span>
                                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                                <a href="#none">맛보기강좌 ></a>
                                            </li>                          
                                        </ul>   
                                    </div>
                                    <div class="prof-slider">
                                        <ul>                     
                                            <li>
                                                <img src="{{ img_url('gosi/prof/mainBest01.jpg') }}" alt="" class="photo"/>
                                                <span class="txt1">영어c</span>
                                                <span class="txt2">한덕현</span>
                                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                                <a href="#none">맛보기강좌 ></a>
                                            </li>                          
                                        </ul>   
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <!--ul class="prof-subject">                        
                        <li><a href='#none'>국어</a></li>                        
                        <li ><a href='#none'>영어</a></li>                        
                        <li ><a href='#none'>한국사</a></li>                        
                        <li ><a href='#none'>헌법</a></li>                        
                        <li ><a href='#none'>행정법</a></li>                        
                        <li ><a href='#none'>행정학</a></li>                        
                        <li ><a href='#none'>사회</a></li>                        
                        <li ><a href='#none'>세법</a></li>                        
                        <li ><a href='#none'>회계학</a></li>                        
                        <li ><a href='#none'>경제학</a></li>                        
                        <li ><a href='#none'>국제법</a></li>                        
                        <li ><a href='#none'>전자공학</a></li>                        
                        <li ><a href='#none'>무선공학</a></li>                        
                        <li ><a href='#none'>통신이론</a></li>                        
                        <li ><a href='#none'>전기이론</a></li>                        
                        <li ><a href='#none'>전기기기</a></li>                        
                        <li ><a href='#none'>소방학개론</a></li>                        
                        <li ><a href='#none'>소방관계법규</a></li>                        
                        <li ><a href='#none'>한국사검정능력시험</a></li>                        
                    </ul>

                    <div id="prof-professors" class="prof-professors">
                        <ul class="prof-slider">                        
                            <li>
                                <img src="{{ img_url('gosi/prof/mainBest01.jpg') }}" alt="" class="photo"/>
                                <span class="txt1">영어</span>
                                <span class="txt2">한덕현</span>
                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                <a href="#none">맛보기강좌 ></a>
                            </li>  
                            <li>
                                <img src="{{ img_url('gosi/prof/mainBest01.jpg') }}" alt="" class="photo"/>
                                <span class="txt1">영어2</span>
                                <span class="txt2">한덕현</span>
                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                <a href="#none">맛보기강좌 ></a>
                            </li>                          
                        </ul>
                    </div--> 

                </div>

            </div>
        <div>
    </div>
<!--
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
                                    <li><a href="#none">공지사항 제목이 출력됩니다. <img class="nBasic {{ SUB_DOMAIN }}" src="{{ img_url('sub/icon_new.png') }}"></a><span class="date">2018.09.06</span></li>
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
                    <div class="will-listTit">윌비스 공무원 무료강좌</div>
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
                                                    2019 김영 영어<br/>
                                                    기출문제특강<br/>
                                                    (9-10월)<br/>
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
                                                    2019 박민주 미친한국사<br/>
                                                    기본+심화이론<br/>
                                                    (9-10월)<br/>
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
                                                    2019 기미진 기특한국어<br/>
                                                    기출특강<br/>
                                                    (9월-10월)<br/>
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
                                        <img src="{{ img_url('sample/book1.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">예문사 / 최우영</div>
                                        <div class="infoTxt">
                                            2019 최우영전기이론<br/>
                                            [3차개정]<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                    <div class="imgBox">
                                        <img src="{{ img_url('sample/book2.jpg') }}">
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
                                        <img src="{{ img_url('sample/book2.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">서울고시각 / 장사원</div>
                                        <div class="infoTxt">
                                            2019 NO.1 농업직<br/>
                                            컨셉식용작물(학)<br/>
                                            (개정6판)<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                    <div class="imgBox">
                                        <img src="{{ img_url('sample/book1.jpg') }}">
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
                                        <img class="coverImg" src="{{ img_url('gosi/prof_cover.png') }}">
                                        <img src="{{ img_url('sample/prof3-5.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">[한국사] 박민주</div>
                                        <div class="infoTxt">
                                            2019 박민주 민주한국사<br/>
                                            심화이론(9-10월)<br/>
                                            135,000원(10%할인)<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                    <div class="imgBox cover">
                                        <img class="coverImg" src="{{ img_url('gosi/prof_cover.png') }}">
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
                                        <img class="coverImg" src="{{ img_url('gosi/prof_cover.png') }}">
                                        <img src="{{ img_url('sample/prof3-6.jpg') }}">
                                    </div>
                                    <div class="infoBox">
                                        <div class="infoTit">[영어] 김영</div>
                                        <div class="infoTxt">
                                            2019 김영 영어<br/>
                                            기출문제 특강(9-10월)<br/>
                                            81,000원(10%할인)<br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#none">
                                    <div class="imgBox cover">
                                        <img class="coverImg" src="{{ img_url('gosi/prof_cover.png') }}">
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
                                <div class="nNumber tx-color">1544-0336</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말: 09시~ 22시<br/>
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
                        <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="{{ img_url('gosi_acad/banner/bnr_q02.jpg') }}" alt="배너명"></a></div>
                        <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="{{ img_url('gosi_acad/banner/bnr_q02.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('gosi_acad/banner/bnr_q01.jpg') }}" alt="배너명"></a>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('gosi_acad/banner/bnr_q03.jpg') }}" alt="배너명"></a>
            </li>
        </ul>
    </div>
-->
</div>
<!-- End Container -->
@stop