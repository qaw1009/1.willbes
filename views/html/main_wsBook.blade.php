@extends('willbes.pc.layouts.master')

@section('content')
<style type="text/css">

</style>
<!-- Container -->

<div id="Container" class="Container hanlim3094 wsBook NSK c_both">
    <div class="Section widthAuto">
        <div class="wsSearchWrap">
            <div class="wsSearch NSK">
                <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">                
                    <input type="hidden" name="cate" id="unifiedSearch_cate" value="{{$__cfg['CateCode']}}">
                    <select name="search_type">
                        <option value="0">통합검색</option>
                        <option value="1">도서명</option>
                        <option value="2">저자명</option>                            
                        <option value="3">출판사</option>
                    </select>
                    <input type="text" name="" class="d_none">                
                    <input type="search" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="검색어를 입력하세요." maxlength="100"/>
                    <label for="onsearch" class="NSK-Black"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">Search</button></label>
                </form>
            </div>
            <div class="keyword">
                <strong>윌스토리 인기검색어</strong>										
                <a href="#none">김정일</a>                 
                <a href="#none">김유향</a>                 
                <a href="#none">PSAT</a>                 
                <a href="#none">김동진</a>                
                <a href="#none">NCS</a>                 
                <a href="#none">로스쿨</a>                 
                <a href="#none">나무경영아카데미</a>                 
                <a href="#none">노무사</a>                 
                <a href="#none">황종휴</a> 
            </div>
        </div>
    </div>

    @include('html.wsBook_menu')

    <div class="Section">
        <div id="MainRollingSlider" class="MaintabBox">
            <ul class="MaintabSlider" >                         
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2012_bn_1120x400_01.jpg" alt="배너명" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2012_bn_1120x400_02.jpg" alt="배너명" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2012_bn_1120x400_03.jpg" alt="배너명" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2012_bn_1120x400_04.jpg" alt="배너명" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2012_bn_1120x400_05.jpg" alt="배너명" title="배너명"></a></li>                   
            </ul>
            <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
            <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>                  
              
            <div id="MainRollingDiv" class="MaintabList">
                <ul class="Maintab">
                    <li><a data-slide-index="0" href="javascript:void(0);" class="active">윌스토리</a></li>
                    <li><a data-slide-index="1" href="javascript:void(0);">재미있는 행정학 재미있는 행정학</a></li>
                    <li><a data-slide-index="2" href="javascript:void(0);">경제학 기출책 경제학 기출책</a></li>
                    <li><a data-slide-index="3" href="javascript:void(0);">윌비스 제로백</a></li>
                    <li><a data-slide-index="4" href="javascript:void(0);">트리니트 행정법</a></li>
                </ul>
            </div>  
        </div>
    </div>    

    {{--신간/화제의책/예약판매--}}
    <div class="Section">
        <div class="widthAuto bookListWrap">
            <div class="wsbookTabMenu">
                <ul class="tabWrap wsbookTab NGR">
                    <li><a href="#tab01" class="on">신간 안내</a></li>
                    <li><a href="#tab02">화제의 책</a></li>
                    <li><a href="#tab03">예약 판매</a></li>                
                </ul>
                <div class="more"><a href="#none">+ 신간안내 더보기</a></div> 
            </div>
            <div id="tab01" class="bookContent">
                <div class="booktitle">
                    <span><img src="https://static.willbes.net/public/images/promotion/main/2012_main_img01.png" alt="신간안내"></span>
                    <div class="NGEB">신간안내</div>
                    <p>윌스토리가 새로 나온 책을 안내해 드립니다.<br>혹시나 나에게 필요한 책이 나왔는지 확인해 보세요.</p>
                </div>
                <div class="bookList">
                    <ul>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002712L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2021 법률저널 LEET 전국 봉투 모의고사 제4회 - 20.06.21 시행</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002707L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 슬림한 친족 상속법의 맥</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002687L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 민사소송법과 부속법 조문집</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002686L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 박준범의 합격하는 QUIZ 특강</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002683L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 형사소송법 - 제3판</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002679L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 기특한 국어 전 범위 모의고사 4</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002328L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>박초롱 ChoiceEnglish [Reading] Vol.2</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="tab02" class="bookContent">
                <div class="booktitle">
                    <span><img src="https://static.willbes.net/public/images/promotion/main/2012_main_img02.png" alt="화제의책"></span>
                    <div class="NGEB">화제의 책</div>
                    <p>윌스토리에서 화제가 된 책은 무엇일까요?<br>아래에서 확인해보세요!</p>
                </div>
                <div class="bookList">
                    <ul>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002712L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2021 법률저널 LEET 전국 봉투 모의고사 제4회 - 20.06.21 시행</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002707L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 슬림한 친족 상속법의 맥</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002687L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 민사소송법과 부속법 조문집</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002686L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 박준범의 합격하는 QUIZ 특강</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002683L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 형사소송법 - 제3판</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002679L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 기특한 국어 전 범위 모의고사 4</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002328L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>박초롱 ChoiceEnglish [Reading] Vol.2</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                    </ul>
                </div>                
            </div>
            <div id="tab03" class="bookContent">
                <div class="booktitle">
                    <span><img src="https://static.willbes.net/public/images/promotion/main/2012_main_img03.png" alt="예약판매"></span>
                    <div class="NGEB">예약 판매</div>
                    <p>곧 나올 책들을 윌스토리에서<br>먼저 만나보고 예약하세요!</p>
                </div>
                <div class="bookList">
                    <ul>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002712L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2021 법률저널 LEET 전국 봉투 모의고사 제4회 - 20.06.21 시행</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002707L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 슬림한 친족 상속법의 맥</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002687L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 민사소송법과 부속법 조문집</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002686L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 박준범의 합격하는 QUIZ 특강</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002683L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 형사소송법 - 제3판</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002679L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 기특한 국어 전 범위 모의고사 4</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002328L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>박초롱 ChoiceEnglish [Reading] Vol.2</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> 

    {{--베스트셀러--}}
    <div class="Section">
        <div class="widthAuto bookListWrap">
            <div class="wsbookTabMenu">
                <div class="more"><a href="#none">+ 베스트셀러 더보기</a></div> 
            </div>
            <div class="bookContent">
                <div class="booktitle">
                    <span><img src="https://static.willbes.net/public/images/promotion/main/2012_main_img04.png" alt="베스트셀러"></span>
                    <div class="NGEB">베스트셀러</div>
                    <p>윌스토리의 베스트셀러를 소개합니다..<br>당신이 보고싶었던 책도 있나요?</p>
                </div>
                <div class="bookList">
                    <ul>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002712L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2021 법률저널 LEET 전국 봉투 모의고사 제4회 - 20.06.21 시행</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002707L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 슬림한 친족 상속법의 맥</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002687L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 민사소송법과 부속법 조문집</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002686L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 박준범의 합격하는 QUIZ 특강</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002683L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 형사소송법 - 제3판</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002679L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 기특한 국어 전 범위 모의고사 4</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002328L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>박초롱 ChoiceEnglish [Reading] Vol.2</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                        <li>
                            <div class="bookImg">
                                <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002721L.JPG" title="교재명">
                            </div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{--오늘의책/MD 추천--}}
    <div class="Section">
        <div class="widthAuto">
        <div class="todayBook">
			<div class="bookInfo" id="bookInfo">		
				<div class="bookList">
					<div class="bookimgB">
                        <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW19005944L.JPG" alt="쉬운 일은 아니지만"/>
                    </div>
                    <ul class="summary">
                    	<li>오늘 이런 책은 어떠신가요?</li>
                        <li><a href="#none"><span>[오늘의 책]</span> 쉬운 일은 아니지만..</a></li>
                        <li class="introduction">													
                            우리는 괜찮은 사람이 될 수 있을까요? 일러스트레이터 홍화정의 일과 일상 분투기 인스타그램에서 공감 100배 
                            그림과 글로 사랑받는 홍화정 작가의 4컷 그림.. 우리는 괜찮은 사람이 될 수 있을까요? 일러스트레이터 홍화정의 일과 일상 분투기 인스타그램에서 공감 100배 
                            그림과 글로 사랑받는 홍화정 작가의 4컷 그림..
                            우리는 괜찮은 사람이 될 수 있을까요? 일러스트레이터 홍화정의 일과 일상 분투기 인스타그램에서 공감 100배 
                            그림과 글로 사랑받는 홍화정 작가의 4컷 그림.. 우리는 괜찮은 사람이 될 수 있을까요? 일러스트레이터 홍화정의 일과 일상 분투기 인스타그램에서 공감 100배 
                            그림과 글로 사랑받는 홍화정 작가의 4컷 그림..
                        </li>
                        <li><span>15,000원</span> → <strong>12,150원</strong> (10%할인)</li>
					</ul>
				</div>
							
                <div class="bookList">
                    <div class="bookimgB">
                        <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW18004466L.JPG" alt="90년생이 온다"/>
                    </div>
                    <ul class="summary">
                        <li>오늘 이런 책은 어떠신가요?</li>
                        <li><a href="#none"><span>[오늘의 책]</span>90년생이 온다</a></li>
                        <li class="introduction">														
                            새로운 세대, 90년대 생과 함께 생존하기 위한 가이드! 조직에서는 신입 사원이, 시장에서는 트렌드를 이끄는 
                            주요 소비자가 되어 우리 곁에 있는 90년대 생. 자신에게 꼰..
                        </li>
                        <li><span>15,000원</span> → <strong>12,600원</strong> (10%할인)</li>
                    </ul>
                </div>
							
                <div class="bookList">
                    <div class="bookimgB">
                        <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW19007024L.JPG" alt="개와 고양이에 관한 작은 세계사"/>
                    </div>
                    <ul class="summary">
                        <li>오늘 이런 책은 어떠신가요?</li>
                        <li><a href="#none"><span>[오늘의 책]</span>개와 고양이에 관한 작은 세계사</a></li>
                        <li class="introduction">													
                            인간이 사랑한 동물들, 그들과의 관계가 만들어낸   또 하나의 사랑스러운 역사 이야기! 개와 고양이에서 북극곰, 
                            코끼리, 기린, 기니피그, 앵무새까지…… 사랑스럽거나 슬..
                        </li>
                        <li><span>15,000원</span> → <strong>14,400원</strong> (10%할인)</li>
                	</ul>
            	</div>
							
                <div class="bookList">
                    <div class="bookimgB">
                        <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW18003564L.JPG" alt="알사탕"/>
                    </div>
                    <ul class="summary">
                        <li>오늘 이런 책은 어떠신가요?</li>
                        <li><a href="none"><span>[오늘의 책]</span>알사탕</a></li>
                        <li class="introduction">													
                            마음을 전하는 마법의 알사탕! 동동이가 알사탕을 먹자 이상한 소리가 들려오기 시작했어요. 원래는 들을 수 없던 
                            마음의 소리가 들린 것입니다. 바로 소파였죠! 소파가 ..
                        </li>
                        <li><span>15,000원</span> → <strong>10,800원</strong> (10%할인)</li>
                    </ul>
                </div>         

                
                <div class="bookList">
                    <div class="bookimgB">
                        <img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW18004466L.JPG" alt="90년생이 온다"/>
                    </div>
                    <ul class="summary">
                        <li>오늘 이런 책은 어떠신가요?</li>
                        <li><a href="#none"><span>[오늘의 책]</span>90년생이 온다</a></li>
                        <li class="introduction">													
                            새로운 세대, 90년대 생과 함께 생존하기 위한 가이드! 조직에서는 신입 사원이, 시장에서는 트렌드를 이끄는 
                            주요 소비자가 되어 우리 곁에 있는 90년대 생. 자신에게 꼰..
                        </li>
                        <li><span>15,000원</span> → <strong>12,600원</strong> (10%할인)</li>
                    </ul>
                </div>
			</div><!--bookInfo//-->
			
			<ul id="bx-pager-today">														
                <li><a data-slide-index="0" href="#none"><img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW19005944S.JPG" alt="쉬운 일은 아니지만"/></a></li>
                <li><a data-slide-index="0" href="#none"><img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW18004466S.JPG" alt="90년생이 온다"/></a></li>
                <li><a data-slide-index="0" href="#none"><img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW19007024S.JPG" alt="개와 고양이에 관한 작은 세계사"/></a></li>
                <li><a data-slide-index="0" href="#none"><img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW18003564S.GIF" alt="알사탕"/></a></li>
                <li><a data-slide-index="0" href="#none"><img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW18004466S.JPG" alt="90년생이 온다"/></a></li>
            </ul><!--bookimgS//-->
            {{--
            <p class="leftBtn"><a id="bookInfoLeft"><img src="/images/main/arrow_left2.png"></a></p>
            <p class="rightBtn"><a id="bookInfogRight"><img src="/images/main/arrow_right2.png"></a></p>
            --}}
            
            <p class="leftBtn" id="bookInfoLeft"><a href="#none">이전</a></p>
            <p class="rightBtn" id="bookInfogRight"><a href="none">다음</a></p> 

		</div><!--todayBook//-->    	

            <div class="mdBook">
                <h4 class="NGEB">추천도서</h4>
                <div id="mdImg" class="slider">                    
                    <div class="mdList">
                        <a href="#none"><img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20001430L.JPG" alt="아직 멀었다는 말"></a>
                        <ul>
                            <li>[소설/문학/에세이]</li>
                            <li><a href="#none">아직 멀었다는 말</a></li>
                            <li><span>13,500원</span> → <strong>12,150원</strong></li>
                        </ul>                                        
                    </div>	
                    
                    <div class="mdList">
                        <a href="#none"><img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20000454L.JPG" alt="근대 세계의 창조"></a>
                        <ul>
                            <li>[역사/문화]</li>
                            <li><a href="#none">근대 세계의 창조</a></li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul>                                        
                    </div>	
                    
                    <div class="mdList">
                        <a href="#none"><img src="http://www.willstory.co.kr/DataWillstory/upload/willstory_book/PW20002248L.JPG" alt="제주에서 혼자 살고 술은 약해요"></a>
                        <ul>
                            <li>[소설/문학/에세이]</li>
                            <li><a href="#none">제주에서 혼자 살고..</a></li>
                            <li><span>10,000원</span> → <strong>9,000원</strong></li>
                        </ul>                                        
                    </div>	                    
                </div><!--mdImg//-->
            </div> 
        </div> 
    </div>

    {{--1120x100 배너--}}
    <div class="Section c_both mt90">
        <div class="widthAuto bnSecbar01">
            <div class="slider">
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2012_bn_1120x100.gif" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2012_bn_1120x100.gif" alt="배너명"></a></div>
            </div>
        </div>
    </div>
    
    {{--게시판--}}
    <div class="Section mt90">
        <div class="widthAuto"> 
            <div class="noticeTabs">
                <div class="will-listTit">공지사항</div>
                <div class="tabBox noticeBox">
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

            <div class="noticeTabs">
                <div class="will-listTit">수험정보센터</div>
                <div class="tabBox noticeBox">
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

            <div class="noticeTabs mr-zero">
                <div class="will-listTit">정오록/추록</div>
                <div class="tabBox noticeBox">
                    <div class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none">2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    {{--CS센터--}}
    <div class="Section mt50 mb90 c_both">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">도서 문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 18시 (점심시간12시~13시) | 공휴일/일요일휴무
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌스토리 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                    <div class="nTxt">1:1<br/>고객지원</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter5.png') }}">
                                    <div class="nTxt">제휴문의</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter6.png') }}">
                                    <div class="nTxt">저자모집</div>
                                </a>
                            </li>
                            
                        </ul>
                    </dt>
                    
                </dl>
            </div>            
        </div>
    </div>
    

    {{-- 윌스토리 퀵영역 --}}
    <div id="QuickMenu" class="wsBookQuick">
        <ul>
            <li class="bookimg">
                <div class="lastBook">최근본책<span>(2)개</span></div>
                <div class="QuickSlider">                    
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/304013/book_304013_og.png" title="교재명"></a></div>
                        <div><a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303945/book_303945_og.png" title="교재명"></a></div>
                    </div>
                </div>
            </li>
            <li class="cart">
                <a href="#none">장바구니 (2)</a>
            </li>
            <li class="order">
                <a href="#none">주문/배송조회</a>
            </li>
            <li class="top">
                <a href="#Container">TOP</a>
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
            pause:3000,
            sliderWidth:1120,
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

    //오늘의책
    $(document).ready(function() {
        var bookInfo = $("#bookInfo").bxSlider({
            mode:'fade',
            auto:true,
            speed:350,
            pause:4000,            
            controls:false,
            minSlides:1,
            maxSlides:1,
            slideMargin:0,
            autoHover:true,
            moveSlides:1,
            touchEnabled : (navigator.maxTouchPoints > 0),
            pagerCustom:'#bx-pager-today',
            pager:true,
        });       

        $("#bookInfoLeft").click(function (){
            bookInfo.goToPrevSlide();
        });
        
        $("#bookInfogRight").click(function (){
            bookInfo.goToNextSlide();
        });
});
</script>
@stop