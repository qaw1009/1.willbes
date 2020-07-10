@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/06/1668_top_bg.jpg) no-repeat center top}
        .evtTop div {position:absolute; top:25px; left:50%; margin-left:200px; width:360px; height:100px; z-index:10;}
        .evtTop div a {display:block; float:left; width:90px; height:100px; font-size:0; text-indent: -9999px;}
        .evtTop div:after {content:""; display:block; clear:both}

        .evt01 {background:#787878; padding-bottom:100px}        
        .evt01 .review {position:absolute; top:348px; left:50%; margin-left:-483px; width:966px; height:60px; z-index:5; overflow:hidden;}
        .evt01 .review li {font-size:16px; color:#000; text-align:left; padding-left:200px}
        .evt01 .review li p {position:relative; width:100%; overflow:hidden; white-space:nowrap; height:60px; line-height: 60px; text-overflow:ellipsis; padding:0 15% 0 0}
        .evt01 .review span {position:absolute; top:0; width:80px; right:0; height:60px; line-height: 60px;  z-index:5; text-align:center}
        .evt01 .youtube iframe {width:960px; height:540px; margin:0 auto}

        .evt01_01 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1668_03_bg.jpg) no-repeat center top}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1668_02_bg.jpg) no-repeat center top}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1665_03_bg.jpg) no-repeat center top}
        .evt04 {padding:100px; width:1120px; margin:0 auto; line-height:1.4; text-align:left}
        .evt04 .title {color:#74242d; font-size:36px; letter-spacing:-1px}
        .evt04 .curriculum {margin-top:50px}
        .evt04 .curriculum .stitle {color:#da655c; font-size:24px; margin-bottom:10px}
        .evt04 .curriculum li {font-size:18px; margin-bottom:5px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1668_top.jpg" alt="" > 
            <div>
                <a href="/promotion/index/cate/3114/code/1665">이시한교수</a>
                <a href="/promotion/index/cate/3114/code/1666">이승기PD</a>
                <a href="#none">안혜빈대표</a>
                <a href="/promotion/index/cate/3114/code/1669">이기용대표</a>
            </div>
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1668_01.jpg" alt="" > 
            <div class="review">
                <ul>
                    <li><p>선한 영향력 안혜빈대표님~~ 좋은 강의 기대하겠습니다 ^^<span>(김다*)</span></p></li>
                    <li><p>안혜빈대표님의 멋진 강의가 기다려지네요~.<span>(이수*)</span></p></li>
                    <li><p>사전예약 신청 완료!! 강의 오픈하는 그날만 기다리겠습니다.<span>(박우*)</span></p></li>
                    <li><p>멋진 사람! 멋진강의~<span>(이정*)</span></p></li>
                    <li><p>안혜빈 대표님의 강의가 정말 기대됩니다. <span>(박민*)</span></p></li>
                    <li><p>대표님 따라서 인스타로 입문하겠습니다!!<span>(한재*)</span></p></li>                    
                </ul>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/sO1Y3lGfMsM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt01_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1668_03.jpg" alt="" > 
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1668_02.jpg" alt="" > 
        </div>

        <div class="evtCtnsBox evt04">
            <div class="title NSK-Black">인스타마켓 실전 창업의 모든것</div>
            <div class="curriculum">
                <div class="stitle">1. 인스타그램 계정 키우기</div>
                <ul>
                    <li>1강. 인스타마켓, 얼마나 벌 수 있어요?</li>
                    <li>2강. 인스타에 대한 거짓, 전부 리뷰해드립니다.</li>
                    <li>3강. 많은 SNS중 인스타그램을 하는 이유</li>
                    <li>4강. 인스타마켓을 준비하기 전 인스타그램 이해하기</li>
                    <li>5강. 인스타그램으로 성공하는 계정들 특징</li>
                    <li>6강. 인스타그램 용어 정리의 모든 것</li>
                    <li>7강. 인스타 마켓, 진성고객 1000명이 필요한 이유</li>
                    <li>8강. 판매량이 높은 계정은 프로필이 다르다</li>
                    <li>9강. 좋아요 500개, 댓글 100개받는 일상글의 비밀</li>
                    <li>10강. 고객이 하루에도 3번 찾는 계정 만들기</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">2. 이미지마케팅</div>
                <ul>
                    <li>1강. 인스타마켓, 정말 사진이 중요할까?</li>
                    <li>2강. 인스타그램, 같이 활용하면 좋은 어플/웹사이트 모음집 (1)</li>
                    <li>3강.  인스타그램, 같이 활용하면 좋은 어플/웹사이트 모음집 (2)</li>
                    <li>4강. 컨셉에 맞는 이미지 마케팅 하는 법</li>
                    <li>5강. 인물사진, 스마트폰 하나로 화보 만들기</li>
                    <li>6강. 상품사진, 스마트폰 하나로 200만원 절약하기</li>
                    <li>7강. 배경사진, 0원으로 DSLR처럼 찍기</li>
                    <li>8강. 음식사진, 촬영 전문가에게 배운 스마트폰 사진술</li>
                    <li>9강. 눈길을 사로잡는 사진 보정 법</li>
                    <li>10강. 스마트폰 하나로 영상 정복하기</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">3. 툴 사용법 </div>
                <ul>
                    <li>1강. 인스타그램 스토리로 고객과 소통하기</li>
                    <li>2강. 인스타그램 하이라이트에 나만의 모음집 만들기</li>
                    <li>3강. 인스타그램 프로필 링크, 필요한 만큼 추가할 수 있는 비밀</li>
                    <li>4강. 개인사업자, 이렇게 판매링크 만들면 된다.</li>
                    <li>5강. 고객의 후기, 리포스트로 적극 활용하자.</li>
                    <li>6강. 인스타그램 언팔로우 사용하기</li>
                    <li>7강. 인스타마켓 툴 사용법 추가 강의 1</li>
                    <li>8강. 인스타마켓 툴 사용법 추가 강의 2</li>
                    <li>9강. 인스타마켓 툴 사용법 추가 강의 3</li>
                    <li>10강. 인스타마켓 툴 사용법 추가 강의 4</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">4. 성공사례 벤치마킹</div>
                <ul>
                    <li>1강. 인스타마켓 성공사례 1</li>
                    <li>2강. 인스타마켓 성공사례 2</li>
                    <li>3강. 인스타마켓 성공사례 3</li>
                    <li>4강. 인스타마켓 성공사례 4</li>
                    <li>5강. 인스타마켓 성공사례 5</li>
                    <li>6강. 인스타마켓 성공사례 6</li>
                    <li>7강. 인스타마켓 성공사례 7</li>
                    <li>8강. 인스타마켓 성공사례 8</li>
                    <li>9강. 인스타마켓 성공사례 9</li>
                    <li>10강.인스타마켓 성공사례 10</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">5. 마켓의 이해와 글쓰기 </div>
                <ul>
                    <li>1강. 인스타마켓에서 잘 팔리는 아이템</li>
                    <li>2강. 인스타마켓, 판매 전 고객과 신뢰쌓기</li>
                    <li>3강. 인스타 마켓 예고글</li>
                    <li>4강. 인스타마켓 판매글</li>
                    <li>5강. 인스타마켓 이해/글쓰기 추가강의 1</li>
                    <li>6강. 인스타마켓 이해/글쓰기 추가강의 2</li>
                    <li>7강. 인스타마켓 이해/글쓰기 추가강의 3</li>
                    <li>8강. 인스타마켓 이해/글쓰기 추가강의 4</li>
                    <li>9강. 인스타마켓 이해/글쓰기 추가강의 5</li>
                    <li>10강. 인스타마켓 이해/글쓰기 추가강의 6</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">6. 매출 구매전환 및 단골관리를 위한 다른 마케팅 채널과 콜라보</div>
                <ul>
                    <li>1강. 나는 왜 판매가 안되었을까 자가점검 해보기</li>
                    <li>2강. 팬덤 형성하는 방법 - 이벤트 진행</li>
                    <li>3강. 인스타 마켓은 첫째날이 가장 중요하다</li>
                    <li>4강. 객단가 높혀 매출 2배 올리기 (프로모션 진행 등)</li>
                    <li>5강. 클레임 고객을 단골로 만드는 커뮤니케이션 스킬</li>
                    <li>6강. 특별 아이템 제공 - 셀픽스</li>
                    <li>7강. 1+1 콜라보 마케팅:  인스타와 스마트스토어</li>
                    <li>8강. 1+1 콜라보 마케팅: 인스타와 블로그 , 인스타와 페이스북</li>
                    <li>9강. 1+1 콜라보 마케팅: 인스타와 틱톡, 인스타와 IGTV, 인스타와 유튜브</li>
                    <li>10강. 앞으로 구매전환을 높히기 위해 내가 해야할 일 체크리스트</li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_03.jpg" alt="" usemap="#MapbtnGo" border="0" >
            <map name="MapbtnGo">
                <area shape="rect" coords="313,854,807,964" href="/promotion/index/cate/3114/code/1712" target="_blank" alt="신청하기">
            </map>
        </div>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            var collaboslides = $(".review ul").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:3,
                maxSlides:3, 
                moveSlides:3,
            });
        });
    </script>
@stop