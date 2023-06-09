@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
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
                    <input type="text" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="검색어를 입력하세요." maxlength="100"/>
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

    <div class="Depth">
        <a href="#none"><img src="{{ img_url('sub/icon_home.gif') }}"></a>
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>도서</strong></span>
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>도서 상세정보</strong></span>
    </div>

    <div class="Content p_re">   
        <div class="wsBookViewWrap" id="bookimg">    
            <div class="wsBookView">
                <div class="wsBookImg">
                    <div class="imgWrap">
                        <div class="p_re">
                            <img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303154/book_303154_og.jpg" alt="교재명" title="교재명" />
                            <a href="#none" class="NG bookView" onclick="openWin('LayerBookImg'),openWin('BookImg')">+ 미리보기</a>
                        </div>
                    
                        <div class="bookLecBtn mt20">
                            <a href="#none" onclick="openWin('bookLec')" class="lecViewBtn">
                                <strong>교재로 진행중인 강의 ▼</strong>
                            </a> 
                            {{--강의정보--}}
                            <div id="bookLec" class="willbes-Layer-CScenterBox willbes-Layer-bookLecBox">
                                <a class="closeBtn" href="#none" onclick="closeWin('bookLec')">
                                    <img src="{{ img_url('prof/close.png') }}">
                                </a>
                                <div class="Layer-Cont">
                                    <div class="LeclistTable">
                                        <ul>
                                            <li><a href="#none">2022년 과목개편 대비 신광은 형사법 심화기출 (21년 11월)</a></li>
                                            <li><a href="#none">2022년 과목개편 대비 신광은 형사법(수사/증거편) 심화기출 (21년 11월)</a></li>
                                            <li><a href="#none">2022년 과목개편 대비 신광은 형사법 심화기출 (21년 11월)</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                                  
                        </div> 

                        <div class="sliderBookPlay mt20">
                            <div class="slider">
                                <div class="youtube">
                                    <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="youtube yu02">
                                    <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="youtube yu03">
                                    <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wsBookInfo">
                    <h5 class="NG">2020 기특한 국어 전 범위 모의고사 4</h5>
                    <ul class="wsBooktxt">
                        <li><strong class="shead">판매가</strong><span><s>12,000원</s> → <strong>10,800원</strong></span></li>
                        <li><strong class="shead">저자명</strong><span>기미진</span><a href="#none" class="another">저자의 다른교재 보기 &gt;</a></li>
                        <li><strong class="shead">출판사</strong><span>배움</span><a href="#none" class="another">출판사의 다른교재 보기 &gt;</a></li>
                        <li><strong class="shead">페이지</strong><span>152p</span><strong class="shead">ISBN</strong> <span>9791130335087</span></li>
                        <li><strong class="shead">출판일</strong><span>2020-06-16</span><strong class="shead">교재판형</strong><span>225*299</span></li>
                        <li><strong class="shead">배송방법</strong><span>택배(발송 후 1~2일 내 수령가능)</span></li>
                        <li class="p_re">
                            <strong class="shead">배송비</strong>
                            <span>
                                2,500원
                                <a href="#none" class="more">?
                                    <div class="delivery">
                                        • 본 교재는 오후 2시 이전에 주문 건에 한하여 당일 발송되며, 오후 2시 이후 주문 건은 익일 발송됩니다.<br>
                                        • 금요일 오후 2시 이후 결제 건은 월요일에 발송됩니다.<br>
                                        • 배송 방법 : 택배 (배송업체-CJ대한통운)<br>
                                        • 배송 지역 : 전국지역 (해외배송 제한)<br>
                                        • 배송 비용 : 2,500원 (30,000원 이상 구매시 무료배송) <br>
                                        ※ 최초 도서결제 후 묶음 배송을 위한 추가 결제 불가 <br>
                                        • 도서산간지방은 추가 배송비가 발생할 수 있습니다.<br>
                                        • 배송기간 : 발송일로부터 1일~3일(72시간) [도서산간 지방은 2~3일 추가 소요] <br>
                                        ※ 익일 배송완료를 원칙으로 하지만 택배사 사정에 따라 배송이 지연 될 수 있습니다.<br>
                                    </div>
                                </a>
                            </span>
                        </li>
                        <li>
                            <strong class="shead">주문수량</strong>
                            <span>
                                <select id="" name="" title="">
                                    <option selected="selected">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                </select>
                                <div class="buyinfo">
                                    <a href="#none" onclick="openWin('leyerbuyPop')"><span>2개까지</span> 구매가능 ❔</a>
                                    <div class="buyinfoPop" id="leyerbuyPop">
                                        <a href="#none" onclick="closeWin('leyerbuyPop')" class="closeBtn">X</a>
                                        <p>[구매 제한 교재 안내]</p>
                                        해당 교재는 구매 가능 개수가 제한된 교재로 아이디당 안내된 개수까지만 구매 가능합니다. 
                                    </div>
                                </div>
                            </span>                            
                        </li>
                        <li class="total NG">총 상품금액 <strong>10,800원</strong></li>
                    </ul>
                    <div class="wsBook-buyBtn">
                        <ul>
                            <li class="btnAuto180 h36">
                                <button type="submit" onclick="" class="mem-Btn bg-white bd-light-gray">
                                    <span class="tx-black">장바구니</span>
                                </button>
                            </li>
                            <li class="btnAuto180 h36">
                                <button type="submit" onclick="" class="mem-Btn bg-green bd-green">
                                    <span>바로결제</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="naver">
                        네이버페이 영역
                    </div>
                </div>                
            </div>
            
            <div id="Sticky" class="sticky-Wrap mt50">
                <div class="sticky-Grid sticky-menu NG">
                    <ul>
                        <li><a href="#none" onclick="movePos('#introduce');">도서소개 ▼</a></li>
                        <li class="row-line">|</li>
                        <li><a href="#none" onclick="movePos('#writer');">저자소개 ▼</a></li>
                        <li class="row-line">|</li>
                        <li><a href="#none" onclick="movePos('#procedure');">목차 ▼</a></li>
                        <li class="row-line">|</li>
                        <li><a href="#none" onclick="movePos('#guidance');">이용안내 ▼</a></li>
                    </ul>
                </div>
            </div>
            <!-- sticky-menu -->

            <div class="wsBookDetail p_re c_both">
                <a id="introduce" name="introduce" class="sticky-top"></a>
                <div class="willbes-Lec-Tit NG tx-black">도서소개</div>
                <div class="wsBookDetailBox">
                    <div class="wsBookDetailBox-img"><img src="https://static.willbes.net/public/images/promotion/sub/wsbook_sample.jpg"></div>
                    ✔ 이 책의 특징<br>
                    <br>
                    제1부는 적성시험에서 Quiz 문제가 출제되는 이유와 필수적인 접근 방법인 선구안, 기호화, 도표화 등을 소개하고, 
                    Quiz 문제의 구성 요소 및 분석 방법에 대해 설명하고 있다.
                    제2부는 Quiz 문제를 논리 Quiz, 수리 Quiz, 규칙성 찾기, 참말과 거짓말, 기타 Quiz의 5가지 유형으로 세분화하여 
                    각 유형별 기본적인 접근 방법과 전략을 분석한 뒤 해당 기출 문제들을 통해 확인하고 연습할 수 있도록 구성하였다. 
                    본서에는 2007년 ~ 2020년의 5급 공채 및 입법고시 PSAT 상황판단 기출 Quiz 문제 중에서 해당 유형별로 대표성을 가지는 80문제를 수록하였다. 
                    또한 각 문제의 문항 번호 아래에는 난이도를 표시하여 선구안을 기르는 데 도움이 되도록 하였다. 난이도는 별 1개(하), 2개(중), 3개(상)로 표시하였으며, 
                    해당 난이도 표시는 상황판단 기출 문제 전체를 감안한 난이도가 아닌 Quiz 문제 내에서의 난이도로 이해하면 된다. 
                    즉, 별 1개짜리 문제는 Quiz 문제로서의 난이도는 ‘하’이지만, 상황판단 기출 문제 전체로 보자면 ‘중~하’일 수 있다.
                    제3부와 제4부에는 실전 연습을 위해 20문제씩 4회로 구성된 총 80문제의 실전모의고사와 상세한 해설을 수록하였다. 
                    특히 제1회와 제2회는 유형별 실전모의고사로, 제3회와 제4회는 종합형 실전모의고사로 구성함으로써 여러분들의 
                    실력 향상을 확인하고 부족한 부분을 다시 한 번 보완할 수 있도록 하였다. <br>
                    <br>
                    <br>
                    박준범의 합격하는 QUIZ특강<br>
                    서문<br>
                    <br>
                    <br>
                    바야흐로 적성시험의 시대이다.<br>
                    15년 이상의 역사를 갖고 있는 PSAT를 비롯하여 LEET, NCS 등 적성시험을 활용하여 원하는 인재를 선발하고자 하는 기관들은 매년 늘어나고 있다.<br>
                    2021년에는 국가직 7급 공채 시험도 PSAT로 선발하게 되면서 이제 적성시험은 현 시대가 요구하는 당연한 흐름이 되고 있다.<br>
                    <br>
                    <br>
                    PSAT는 다양한 적성시험 중에서도 가장 발전된 형태의 적성시험이라고 할 수 있다. PSAT에서 많은 수험생들이 가장 두려워하는 과목은 단연 상황판단이며, 
                    상황판단 내에서도 제일 까다로운 유형은 바로 Quiz형이다. Quiz 문제의 중요성은 2020년 5월 16일에 치러진 ‘2020년도 국가공무원 5급 공채 등 
                    선발 필기시험’에서도 다시 한 번 확인되었으며, 앞으로 치러질 여러 적성시험에서도 그 중요성은 지속될 것으로 예상된다. 
                    이처럼 많은 수험생들이 어려움을 겪는 유형인만큼 Quiz 문제에서 우수한 성과를 거두어야만 합격하는 것은 아니다. 
                    그러나 Quiz 문제를 충실히 대비해 둠으로써 상황판단 전반에 대한 자신감을 가질 수 있다면, PSAT 합격은 분명 더 가까워질 것이다. 
                    Quiz 문제도 여러분들의 노력으로 분명히 정복할 수 있으며, ‘박준범의 합격하는 Quiz특강’은 여러분들이 Quiz 문제를 정복하는 데 훌륭한 길잡이가 될 것이다.
                    본서는 다음과 같이 구성되어 있다.
                    제1부는 적성시험에서 Quiz 문제가 출제되는 이유와 필수적인 접근 방법인 선구안, 기호화, 도표화 등을 소개하고, 
                    Quiz 문제의 구성 요소 및 분석 방법에 대해 설명하고 있다.
                    제2부는 Quiz 문제를 논리 Quiz, 수리 Quiz, 규칙성 찾기, 참말과 거짓말, 기타 Quiz의 5가지 유형으로 세분화하여 
                    각 유형별 기본적인 접근 방법과 전략을 분석한 뒤 해당 기출 문제들을 통해 확인하고 연습할 수 있도록 구성하였다. 
                    본서에는 2007년 ~ 2020년의 5급 공채 및 입법고시 PSAT 상황판단 기출 Quiz 문제 중에서 해당 유형별로 대표성을 가지는 80문제를 수록하였다. 또한 각 문제의 문항 번호 아래에는 난이도를 표시하여 선구안을 기르는 데 도움이 되도록 하였다. 난이도는 별 1개(하), 2개(중), 3개(상)로 표시하였으며, 해당 난이도 표시는 상황판단 기출 문제 전체를 감안한 난이도가 아닌 Quiz 문제 내에서의 난이도로 이해하면 된다. 즉, 별 1개짜리 문제는 Quiz 문제로서의 난이도는 ‘하’이지만, 상황판단 기출 문제 전체로 보자면 ‘중~하’일 수 있다.
                    제3부와 제4부에는 실전 연습을 위해 20문제씩 4회로 구성된 총 80문제의 실전모의고사와 상세한 해설을 수록하였다. 
                    특히 제1회와 제2회는 유형별 실전모의고사로, 제3회와 제4회는 종합형 실전모의고사로 구성함으로써 여러분들의 실력 
                    향상을 확인하고 부족한 부분을 다시 한 번 보완할 수 있도록 하였다. <br>
                    <br>
                    <br>
                    본서가 출간되기까지 정말 많은 분들의 도움이 있었다.<br>
                    한림법학원과 함께한 8년 동안 부족한 본 강사를 상황판단 전임으로서 전적으로 믿어주시고 아낌없이 지원해주신 
                    ㈜ 윌비스 송주호 대표님, 김지훈 원장님, 최인종 실장님, 김용민 차장님, 이지훈 대리님께 깊은 감사를 표한다. 
                    ‘박준범의 합격하는 법률특강’에 이어 더욱 멋진 편집으로 본서를 한껏 돋보이게 만들어주신 원성일 실장님과 권윤주 과장님께도 진심으로 감사함을 전한다.
                    PSAT 강의를 시작하면서 인연이 되어 14년째 한결같은 우정을 나누고 있는 친구 이나우 강사의 건강과 평안을 기원하며, 아버님의 쾌유를 기원한다.
                    숫자도사 석치수 강사는 ‘박준범의 합격하는 법률특강’에 이어 본서 역시 딱히 도움을 준 것은 없다. 
                    그러나 필자는 그의 강의에 대한 열정만큼은 진심으로 존경한다. 석치수 강사의 요청에 의해, 그의 열정이 어느 정도인지를 엿볼 수 있는 
                    에피소드를 소개해 보겠다. 한창 모강 준비로 정신없이 바쁜 2013년 12월 어느 날, 평소 타던 차량이 고장 나자 그는 필자에게 
                    L사에 아는 영업사원이 있는지 물었다. 그래서 필자는 해당 영업사원의 연락처를 알려주었고, 
                    잠시 후 그는 전화를 걸더니 “안녕하세요? 범이 형 소개로 전화 드렸는데요, L사의 ○○차 사려고 하는데요, 제가 지금 많이 바빠서 그러는데요, 
                    그 차 살 거니까 필요한 서류 알려주시고요, 차 좀 가져다주실래요?”라고 하고는 언제 그랬냐는 듯이 복잡한 도표에 빠져들었다. 
                    차를 보지도 않고 자장면 주문하듯이 전화로 주문하는 석치수! 그런 열정을 바탕으로 앞으로도 오랫동안 학생들에게 좋은 
                    컨텐츠와 많은 즐거움을 줄 거라고 믿는다.
                    ‘박준범의 합격하는 법률특강’에 이어 본서의 교정을 위해서도 혼신의 노력을 다 하였고, 국가공무원 5급 공채 재경직 
                    PSAT에서 수차례 합격했었던 실력을 바탕으로 본서와 관련하여 많은 조언과 좋은 아이디어를 제공해 준 하혜련 양에게 
                    다시 한 번 깊은 감사와 진심어린 존경을 표한다. 하혜련 양은 가히 ‘박준범의 합격하는 Quiz특강’의 1등 공신이라고 할 수 있다. 
                    하혜련 양이 앞으로도 꽃길만 걷기를 응원한다!
                    한 평생 아들에게 아낌없는 사랑만 베풀어주신 아버지, 어머니와 사위가 최고인 줄 아시는 장인, 장모님의 건강을 기원한다. 
                    많은 능력을 갖추고 있지만 아내이자 엄마로서의 능력을 가장 소중히 하며 우리 가족의 행복의 원천인 언제 보아도 미소 짓게 만드는 
                    희진과 자고 있는 모습을 보고 있으면 얘가 중학생인가 싶을 정도로 부쩍 자란 6살 소민이, 
                    언니가 뭐가 그리 좋은지 언니만 바라보면 빙그레 아빠 미소(?)를 짓는 6개월 된 소은이에게 사랑한다는 말을 전한다.<br>
                    <br>
                    <br>
                    코로나 19로 인한 사상 초유의 시험 연기로 인해 매우 혼란스러운 2020년 상반기이다. 필자도 정부의 권고에 협조하기 위해 그간 강의를 개설하지 않았고, 
                    강의를 개설하지 못한 기간에도 수험생 여러분들에게 도움이 되는 일을 하고 싶었다. 본서는 그런 일념으로 준비하였으며, 
                    본서를 활용하여 Quiz 문제를 대비하는 수험생들이 Quiz 문제에서 좋은 점수를 획득하여 PSAT 합격뿐만 아니라 최종합격의 기쁨을 누릴 수 
                    있기를 진심으로 기원한다.<br>
                    <br>
                    여러분은 반드시 합격할 것이다!<br>
                    <br>
                    2020년 6월<br>
                    박준범 드림<br>
                </div>
            </div>

            <div class="wsBookDetail p_re c_both">
                <a id="writer" name="writer" class="sticky-top"></a>
                <div class="willbes-Lec-Tit NG tx-black">저자소개</div>
                <div class="wsBookDetailBox">
                    약력<br>
                    <br>
                    - 고려대 국어국문학과 졸업<br>
                    - 현) 노량진 윌비스고시학원 국어 전임교수<br>
                    - 전) 대한항공 스튜어디스<br>
                    - 전) 대한변호사협회＊서울국제중재센터 상근변호사<br>
                    - 전) (삼성)코닝정밀소재 법무그룹 변호사<br>
                    <br>
                    저서<br>
                    <br>
                    - 기미진 기특한 국어[기본서] (배움)<br>
                    - 기특한 국어 기출문제집(배움)<br>
                    - 기특한 국어 기출 변형 문제집(배움)<br>
                    - 기특한 국어 전범위모의고사(배움)
                </div>
            </div>

            <div class="wsBookDetail p_re c_both">
                <a id="procedure" name="procedure" class="sticky-top"></a>
                <div class="willbes-Lec-Tit NG tx-black">목차</div>
                <div class="wsBookDetailBox">
                    제1부 • Quiz 문제 개관 및 필수 접근 방법<br>
                    <br>
                    <br>
                    Ⅰ<br>
                    적성시험에서의 Quiz 문제 출제 이유		― 10<br>
                    1. Quiz 문제의 의의	… 10<br>
                    2. Quiz 문제의 특징	… 11<br>
                    3. Quiz 문제 출제 이유	… 15<br>
                    <br>
                    Ⅱ<br>
                    선구안(batting eye, 選球眼)	― 16<br>
                    1. 선구안의 의의	… 16<br>
                    2. Quiz 문제에서의 선구안의 중요성	… 16<br>
                    3. 기본적인 선구안	… 17<br>
                    <br>
                    Ⅲ<br>
                    Quiz 문제의 구성 요소 및 분석 방법		― 18<br>
                    1. 질문의 정확한 이해	… 18<br>
                    2. 조건 분석 방법	… 35<br>
                    3. 효과적인 선택지 활용법	… 38<br>
                    <br>
                    Ⅳ<br>
                    기호화	― 56<br>
                    1. 기호화의 필요성	… 56<br>
                    2. 효과적인 기호화 방법	… 56<br>
                    <br>
                    Ⅴ	<br>
                    도표화	― 60<br>
                    1. 1대1 대응관계	… 61<br>
                    2. 1대多 대응관계	… 75<br>
                    3. 전체를 조망하는 도표화	… 85<br>
                    4. 기타 정보의 도표화	… 93<br>
                    <br>
                    <br>
                    제2부 • 유형별 접근 방법<br>
                    <br>
                    <br>
                    Ⅰ<br>
                    논리 Quiz	― 100<br>
                    1. 논리 Quiz의 특징	… 100<br>
                    2. 경우의 수가 적은 조건부터 처리하기		… 100<br>
                    3. 연결되는 조건 찾기	… 117<br>
                    <br>
                    Ⅱ<br>
                    수리 Quiz	― 134<br>
                    1. 수리 Quiz의 특징	… 134<br>
                    2. 대소 관계/연쇄 관계	… 134<br>
                    3. 수리적 감각	… 147<br>
                    <br>
                    Ⅲ<br>
                    규칙성 찾기	― 202<br>
                    1. 규칙성 찾기의 특징	… 202<br>
                    2. 주기성 파악하기	… 203<br>
                    3. 규칙의 특징 파악하기	… 215<br>
                    4. 시차	… 232<br>
                    <br>
                    Ⅳ<br>
                    참말과 거짓말	― 236<br>
                    1. 참말과 거짓말의 특징	… 236<br>
                    2. 참말과 거짓말의 접근 방법	… 237<br>
                    <br>
                    Ⅴ<br>
                    기타 Quiz	― 262<br>
                    1. 명령 수행하기	… 262<br>
                    2. 벤 다이어그램[Venn diagram] 	… 269<br>
                    <br>
                    <br>
                    제3부 • 실전모의고사[문제편]<br>
                    <br>
                    <br>
                    Ⅰ<br>
                    제1회 실전모의고사[논리 Quiz, 참말과 거짓말]	― 278<br>
                    <br>
                    Ⅱ<br>
                    제2회 실전모의고사[수리 Quiz, 규칙성 찾기, 기타 Quiz]		― 298<br>
                    <br>
                    Ⅲ<br>
                    제3회 실전모의고사[종합]	― 319<br>
                    <br>
                    Ⅳ<br>
                    제4회 실전모의고사[종합]	― 339<br>
                    <br>
                    <br>
                    제4부 • 실전모의고사[해설편]<br>
                    <br>
                    <br>
                    Ⅰ<br>
                    제1회 실전모의고사[논리 Quiz, 참말과 거짓말]	― 362<br>
                    <br>
                    Ⅱ<br>
                    제2회 실전모의고사[수리 Quiz, 규칙성 찾기, 기타 Quiz]		― 373<br>
                    <br>
                    Ⅲ<br>
                    제3회 실전모의고사[종합]	― 381<br>
                    <br>
                    Ⅳ<br>
                    제4회 실전모의고사[종합]	― 390<br>
                </div>
            </div>

            <div class="wsBookDetail p_re c_both">
                <a id="guidance" name="guidance" class="sticky-top"></a>
                <div class="willbes-Lec-Tit NG tx-black">이용안내</div>
                <div class="wsBookDetailBox">
                    <div class="guidanceBox">
                        <div class="NG"><strong>꼭 읽어주세요!</strong></div>
                        <ul>
                            <li>평일 오후 2시 이전 결제완료건 : 당일 출고 (도서 공급 및 재고 사정으로 지연될 수 있습니다.)</li>
                            <li>평일 오후 2시 이후 결제완료건 : 익일 출고 (금요일 오후2시 이후 결제완료건은 차주 월요일 출고)</li>
                            <li>출고 후 1일~3일(72시간) 내 수령 가능하며, 발송일 오후 6시부터 배송조회가 가능합니다.</li>
                            <li>배송조회 : “내강의실 >결제관리 >주문/배송조회”에서 확인할 수 있습니다.</li>
                            <li class="tx-red">네이버페이로 결제시 도서 주문내역은 네이버쇼핑(네이버페이) 주문조회에서 확인가능합니다.</li>
                            <li>결제 후 주문취소/주소변경이 필요하신 경우 윌스토리 고객센터로 연락주시기 바랍니다.</li>
                            <li>출고 전 주문취소/주소변경은 출고일 오후 2시 이전까지만 가능합니다.</li>
                            <li>결제완료 후 오후 2시 이전에 온라인상으로 환불신청된 건에 한해서만 당일출고가 되지 않습니다.</li>
                            <li class="tx-red">공급사(출판사)및 온라인서점 재고 사정에 의해 결제완료 이후에도 품절/지연될 수 있으며, 품절 시 관련 사항에 대해서는 전화나 문자로 안내드리겠습니다.</li>
                            <li>윌스토리 고객센터(<span class="tx-red">1544-4944</span>) 전화문의는 평일 오전 9시부터 오후12시, 오후 1시부터 오후5시까지입니다. 주말 공휴일 휴무</li>
                        </ul>
                    </div>
                    <div class="guidanceBox">
                        <div class="NG"><strong>교환 및 환불</strong></div>
                        <ul>
                            <li>도서불량 및 오배송 등의 이유로 반품하실 경우, 반품배송비는 무료입니다.</li>
                            <li>고객님의 변심에 의한 반품, 환불, 교환시 배송비는 고객님 부담입니다.</li>
                            <li>상담원과의 상담 없이 교환 및 반품으로 반송된 도서에 대하여는 책임지지 않습니다.</li>
                            <li>반품 신청시 반송된 도서의 본사 수령 확인 후 환불이 진행됩니다. (카드결제는 카드사 영업일 기준 시일이 3~5일이 소요됩니다.)</li>
                            <li>주문하신 도서의 반품(환불) 및 교환은 교재 결제일로 부터 7일 이내에 온라인상에서 신청 하 실 수 있습니다.</li>
                            <li>도서 환불신청일로 부터 5일 이내 반송 시 환불처리 가능합니다.</li>
                            <li>도서가 훼손되거나 포장이 훼손된 경우 반품 및 교환, 환불이 불가능합니다.</li>
                            <li>반품 또는 교환시 고객님의 사정으로 수거가 지연될 경우에는 반품이 제한될 수 있습니다.</li>
                        </ul>
                    </div>
                    <div class="guidanceBox">
                        <div class="NG"><strong>배송 안내</strong></div>
                        <ul>
                            <li>평일 오후 2시 이전 결제완료건 : 당일 출고 (도서 공급 및 재고 사정으로 지연될 수 있습니다.)</li>
                            <li>평일 오후 2시 이후 결제완료건 : 익일 출고 (금요일 오후2시 이후 결제완료건은 차주 월요일 출고)</li>
                            <li>출고 후 1일~3일(72시간) 내 수령 가능하며, 발송일 오후 6시부터 배송조회가 가능합니다.</li>
                            <li>배송조회 : “내강의실 >결제관리 >주문/배송조회”에서 확인할 수 있습니다.</li>
                            <li class="tx-red">네이버페이로 결제시 도서 주문내역은 네이버쇼핑(네이버페이) 주문조회에서 확인가능합니다.</li>
                            <li>배송 방법 : 택배 (배송업체-CJ대한통운)</li>
                            <li>배송 지역 : 전국지역 (군부대, 해외배송 제한)</li>
                            <li>배송 비용 : 2,500원 (30,000원 이상 구매시 무료배송)<br>
                            ※ 최초 도서결제 후 묶음 배송을 위한 추가 결제 불가</li>
                            <li>도서산간지방은 추가 배송비가 발생할 수 있습니다.</li>
                            <li>군부대 지역의 경우 해당 군부대에 CJ대한통운 택배배송이 되는지 먼저 확인 후 주문을 해주시기 바랍니다. 일부 군부대 지역은 우체국 택배를 제외한 타택배사는 출입이 제한이 될 수 있습니다. (군부대 사서함 주소 사용 시 배송제한)<br>
                            ※ 유의사항 : 군부대 지역 배송 시 우체국 사서함 주소지를 제외하고, 정확한 지번/도로명 주소, 부대명칭 등 을 기재해 주셔야 합니다.<br>
                            예) 경기도 00군 00리 00번지(00도로명) 0000부대(사단, 연대, 대대 등) 00중대 일병 000</li>
                            <li>배송기간 : 발송일로부터 1일~3일(72시간) [도서산간 지방은 2~3일 추가 소요]<br>
                            ※ 익일 배송완료를 원칙으로 하지만 택배사 사정에 따라 배송이 지연 될 수 있습니다.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--wsBookViewWrap//-->

    </div>
    <!--//Content-->

    
    <!-- willbes-Layer-bookimg -->
    <div id="BookImg" class="willbes-Layer-BookImg">
        <a class="closeBtn" href="#bookimg" onclick="closeWin('LayerBookImg'),closeWin('BookImg')">
            <img src="{{ img_url('prof/close.png') }}">
        </a>
        <div class="Layer-Cont">
            <div class="sliderBookBig">
                <div class="sliderBL sliderBookImg">
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/11/bookimg01.jpg" alt="교재명"></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/11/bookimg02.jpg" alt="교재명"></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/11/bookimg03.jpg" alt="교재명"></div>
                </div>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2021/11/bookAL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2021/11/bookAR.png"></a></p>
            </div>
        </div>
    </div>
    <div id="LayerBookImg" class="willbes-Layer-Black"></div>
    <!-- // willbes-Layer-CurriBox -->

    <div class="Quick-Bnr ml20">
        <img src="https://static.willbes.net/public/images/promotion/sub/sub_bn_160.jpg">     
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

<script>
    $(document).ready(function() {
        var slidesImg = $(".sliderBL").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:1,
            maxSlides:1,
            slideMargin:0,
            autoHover: true,
            moveSlides:1
        });

        $(".bookView").click(function() {   
            $(".willbes-Layer-BookImg").show();
            slidesImg.reloadSlider();
        });

        $("#imgBannerLeft").click(function (){
            slidesImg.goToPrevSlide();
        });

        $("#imgBannerRight").click(function (){
            slidesImg.goToNextSlide();
        });
    }); 
</script>


<!-- End Container -->
@stop