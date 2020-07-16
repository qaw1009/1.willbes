@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .gosi-gate-sns {width:150px; height:40px; float:left; position:absolute; top:30px}
    .gosi-gate-sns li {display:inline; float:left; margin-right:5px}
    .gosi-gate-sns ul:after {content:''; display:block; clear:both}
    .gosi-gate-menu {width:1120px; margin:30px auto 0}
    .gosi-gate-menu li {display:inline; float:left; width:11.11111%;}    
    .gosi-gate-menu a {display:block; text-align:center; font-size:14px; border:1px solid #333; margin-right:5px; padding:10px 0}
    .gosi-gate-menu a:hover {background:#333; color:#fff}
    .gosi-gate-menu li:last-child a {margin:0}
    .gosi-gate-menu ul:after {content:''; display:block; clear:both}
</style>

<div id="Container" class="Container gosi NGR c_both">
    <div class="widthAuto p_re">
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
                <dt>
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
    
    <div class="Section">
        <div class="widthAuto mt20">
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_1120x80.jpg" alt="배너명">
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto mt20">
            차년도 합격을 위한 레이스는 이미 시작되었다!
            경쟁자보다 앞서가기 위한 전략, 윌비스 PASS가 정답입니다.
        </div>
    </div>

    

    <div class="Section p_re">        
        <div class="MainVisual NSK">            
            <div class="VisualBox">
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2019/1007/banner_20200122114821.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2019/1007/banner_20200122114821.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2019/1007/banner_20200122114821.jpg" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
            <div class="VisualsubBox">
                <div class="bSlider VisualsubBoxTop">                    
                    <div class="slider">
                        <div><a href="#none"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2019/0604/banner_20190604154532.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_364x128_01.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>   
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_364x248_01.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_364x248_01.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_364x248_01.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <div class="Section barBnr">
        <div class="widthAuto">
            <a href="#none"><img src="{{ img_url('gosi/banner/bnr_1120x110.jpg') }}" alt="배너명"></a>
        </div>
    </div>
    
    <div class="Section">
        <div class="widthAuto">
            <div><img src="{{ img_url('gosi/visual/visual_tit01.jpg') }}" alt="더! 강력, 더! 완벽해진 윌비스 교수진"></div>
            <ul class="PBcts">
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_01.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_01.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_02.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_02.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_02.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_03.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_03.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_04.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_04.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_05.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_05.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
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

    <div class="Section NSK mt90">
        <div class="widthAuto">
            <div class="willbesLec">
                <div class="smallTit mb30">          
                    <p><span>합격 콘텐츠를 한 눈에! <strong>윌비스 강좌</strong></span></p>            
                </div> 
                <div class="will-listTit">BEST 강좌</div>                
                <div class="bestLectBx">                                                  
                    <ul class="prof-subject">                        
                        <li><a href='#none'><span>|</span>국어</a></li>                        
                        <li><a href='#none'><span>|</span>영어</a></li>                        
                        <li><a href='#none'><span>|</span>한국사</a></li>                        
                        <li><a href='#none'><span>|</span>헌법</a></li>                        
                        <li><a href='#none'><span>|</span>행정법</a></li>                        
                        <li><a href='#none'><span>|</span>행정학</a></li>                        
                        <li><a href='#none'><span>|</span>사회</a></li>                        
                        <li><a href='#none'><span>|</span>세법</a></li>                        
                        <li><a href='#none'><span>|</span>회계학</a></li>                        
                        <li><a href='#none'><span>|</span>경제학</a></li>                        
                        <li><a href='#none'><span>|</span>국제법</a></li>                        
                        <li><a href='#none'><span>|</span>전자공학</a></li>                        
                        <li><a href='#none'><span>|</span>무선공학</a></li>                        
                        <li><a href='#none'><span>|</span>통신이론</a></li>                        
                        <li><a href='#none'><span>|</span>전기이론</a></li>                        
                        <li><a href='#none'><span>|</span>전기기기</a></li>                        
                        <li><a href='#none'><span>|</span>소방학개론</a></li>                        
                        <li><a href='#none'><span>|</span>소방관계법규</a></li>                        
                        <li><a href='#none'><span>|</span>한국사검정능력시험</a></li>                        
                    </ul>

                    <div id="prof-professors" class="prof-professors">
                        <ul class="prof-slider">                        
                            <li>
                                <div><img src="{{ img_url('gosi/prof/tea_myroom_1_kmj_145x152.png') }}" alt="" class="강사명"/></div>
                                <span class="txt1">영어</span>
                                <span class="txt2">한덕현</span>
                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                <a href="#none">맛보기강좌 ></a>
                            </li>  
                            <li>
                                <div><img src="{{ img_url('gosi/prof/tea_myroom_1_kmj_145x152.png') }}" alt="" class="강사명"/></div>
                                <span class="txt1">영어2</span>
                                <span class="txt2">한덕현</span>
                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                <a href="#none">맛보기강좌 ></a>
                            </li>                          
                        </ul>
                    </div> 
                </div>
                
                <div class="will-listTit mt45">무료특강</div>
                <ul class="freeLectBx">
                    <li>
                        <img src="{{ img_url('gosi/banner/bnr_free01.jpg') }}" alt="" class="배너명"/>
                        <p>기초입문특강</p>
                        국어,영어,한국사 기초입문 풀패키지
                    </li>
                    <li>
                        <img src="{{ img_url('gosi/banner/bnr_free02.jpg') }}" alt="" class="배너명"/>
                        <p>기초문제 해설특강</p>
                        출제경향 완벽대비
                    </li>
                </ul>
            </div>
            <!-- willbesLec//-->

            <div class="willbesNews">
                <div class="smallTit mb30">          
                    <p><span>윌비스 <strong>소식</strong></span></p>                                
                </div>
                <div class="noticeTabs">
                <div class="will-listTit mt45">공지사항</div>
                    <div class="tabBox noticeBox" style="margin-top:-30px">
                        <div class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="noticeTabs mt30">
                    <ul class="tabWrap noticeWrap three">
                        <li><a href="#notice1" class="on">시험정보</a></li>
                        <li><a href="#notice2" class="">수험공고</a></li>
                        <li><a href="#notice3" class="">수험뉴스</a></li>
                    </ul>
                    <div class="tabBox noticeBox">
                        <div id="notice1" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>국가직 | 2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>HOT</span>서울시 | 2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">제주도 | 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">광주광역시 | 2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">부산광역시 | 2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                        <div id="notice2" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내22</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                        <div id="notice3" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내333</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--willbesNews //-->
        </div>
    </div>

    <div class="Section NG mt90">
        <div class="widthAuto">            
            <div class="smallTit mb30">          
                <p><span>솔직한 <strong>수강후기</strong><a href="#none"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a></span></p>                                
            </div>
            <div class="reviewBx">
                <div class="sliderNumV vSlider">
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- 수강후기 //-->

    <div class="Section NSK mt90 mb90">
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
                                <div class="nNumber tx-color">1544-0336</div>
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
            <li>
                <div class="QuickSlider ">
                    <div class="sliderNum">
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
                    <div class="sliderNum">
                        <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                        <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
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
<script src="/public/js/willbes/jquery.counterup.min.js"></script>
<script src="/public/js/willbes/waypoints.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function( $ ) {
        $('#counter').counterUp({
            delay: 11, // the delay time in ms
            time: 1000 // the speed time in ms
        });
    });
    
    $(function(){ 
        $('.prof-subject').bxSlider({ 
            speed:800,  
            responsive:true,
            infiniteLoop:true,
            pager:false,
            slideWidth:78,
            minSlides:1,
            maxSlides:8
        });
    });

    $(function() {
        $('.sliderNumV').bxSlider({
            mode: 'vertical', 
            auto: true,
            controls: true,
            infiniteLoop: true,
            slideWidth: 1120,
            pagerType: 'short',
            minSlides: 3,
            pause: 3000,
            pager: true,
            onSliderLoad: function(){
                $(".vSlider").css("visibility", "visible").animate({opacity:1}); 
            } 
        });
    });

    //자동검색어
    $(function(){
        var autocomplete_text = ["스파르타","신광은","모의고사","장정훈","최신판례","김원욱","하승민","형사소송법","네친구","해설","형법","최신","수사","실용글쓰기","최기판","오태진","승진","면접","리마인드","원유철","숫자","판례","해설강의","경찰학","김현정","기출","Flex","원기총","형소법","개정","실무종합","영어","문제풀이","마무리","오현웅","행정법","동형","2단계","2020","경찰학개론","송광호","학설","한국사","좋은데이","조문","심화","신광은 형사소송법","문제폭격","최신기출","1차","실용","추록","최신 판례","형사소송","신의한수","해양경찰","총평","숫자특강","심화이론","기지개","특강","형사법","구문독해","마무리특강","경찰승진","입문특강","해사법규","위원회","키워드","김준기","교재","형사소송법 심화","무료특강","2020년 1차","시험","승진기출","기본이론","헌법","실무","모의","글쓰기","해양경찰학","합격","공득인","김원욱 형법","체력","형법 심화","형법 최신","형법 심화이론","법학경채","아침","박우찬","기출해설","적중","형법 핵심이론 요약정리","조문특강","파이널","합기독","ox","개정법령","마무리 특강","5개년","형법 최신판례","패키지","최신기출판례","기본","독해","사료","요약","법학","20년 1차","범죄수사","기출문제","장정훈 경찰학개론","2차","문제","주관식","형사","찍기","심화기출","2차대비","해양경찰학개론","보강","1단계","문풀","죄수론","2020년 1차대비 신광은 형사소송법","법령","최신판례특강","죄수","전문법칙","역사","민법","일정","2020 1차","강의","하이힐","단계","박영식","판례특강","진도별","경찰실무","정태정","2019","경찰간부","19년 2차","해설특강","최기","2020년 2차","오태진 한국사","해양","간부","최신판","형법최신판례","제이슨","숫자 특강","무료","형사소송법 입문","해사영어","경찰","김원욱 형법 기본","300","신광은 형사법","실전","도사국사","경찰작용법","2018","2020년 1차대비 김원욱 형법 기본","찍기특강","선박","2020년 2차대비 신광은 형사소송법","형사소송법 최신판례","면접캠프","2018년 3차","기관술"," 마무리","베이직","형법 마무리","3개월","아침영어","신광은 형소법","이것만","인증","김원욱형법","이론","국어","경찰특공대","해수부","이기자","문제폭격 스파르타","신광은 경찰","신광은 형사소송법 기본이론 ","장정훈 행정법","풀이","1차대비","최신 기출","한국사 기본","1개년","심화이론특강","300제"];
        $("#unifiedSearch_text").autocomplete({
            source: autocomplete_text,
            select: function(event, ui) {
            },
            focus: function(event, ui) {
                return false;
            }
        })
    });

    //인기검색어
    $(document).ready(function() {
        var fieldExample = $('.unifiedSearch');
            fieldExample.focus(function() {
            var div = $('div.searchPop').show();
            $(document).bind('focusin.example click.example',function(e) {
                if ($(e.target).closest('.example, .unifiedSearch').length) return;
                $(document).unbind('.example');
                div.fadeOut('medium');
            });
        });
        $('div.searchPop').hide();
    });
</script>
@stop