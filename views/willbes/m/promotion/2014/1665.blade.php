@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
        .evtCtnsBox img {width:100%; max-width:720px;}

        /************************************************************/

        .evtTop .embed-container {position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;} 
        .evtTop .embed-container iframe,
        .evtTop .embed-container object, 
        .evtTop .embed-container embed {position: absolute; top: 0; left: 0; width: 100%; height: 100%;}

        .evt02 {position:relative}
        .evt02 a {display:block; text-align:center; position:absolute; width:100%; bottom:6%}
        .evt02 a img {max-width:518px; width:80%}

        .evt04 {padding:50px; line-height:1.4; text-align:left}
        .evt04 .title {color:#4d79f6; font-size:36px; letter-spacing:-1px}
        .evt04 .curriculum {margin-top:50px}
        .evt04 .curriculum .stitle {color:#c09261; font-size:24px; margin-bottom:10px}
        .evt04 .curriculum li {font-size:18px; margin-bottom:5px}

        @@media only screen and (max-width: 640px) {
        .evt04 {padding:50px 20px;}
        .evt04 .title {font-size:26px;}
        .evt04 .curriculum {margin-top:30px}
        .evt04 .curriculum .stitle {font-size:18px;}
        .evt04 .curriculum li {font-size:14px;}
        }
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665m_top.jpg" alt="" > 
            <div class='embed-container'>
                <iframe src='https://www.youtube.com/embed/OzRyEe5Vops?rel=0' frameborder='0' allowfullscreen></iframe> 
            </div>
        </div> 
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665m_01.jpg" alt="" >            
        </div>

        <div class="evtCtnsBox evt04">
            <div class="title NSK-Black">인스타마켓 실전 창업의 모든것</div>
            <div class="curriculum">
                <div class="stitle">1. 인스타그램 계정 키우기</div>
                <ul>
                    <li>1강. 인스타마켓, 얼마나 벌 수 있어요? </li>
                    <li>2강. 인스타에 대한 거짓, 전부 리뷰해드립니다. </li>
                    <li>3강. 인스타 마켓, 진성고객 1000명이 필요한 이유</li>
                    <li>4강. 상품이 잘 팔리는 계정은 뭐가 다를까?</li>
                    <li>5강. 내 상품을 사줄 고객 데려오는 법</li>
                    <li>6강. 고객이 나에게 끌리는 가장 확실한 방법</li>
                    <li>7강. 고객이 내가 더 궁금해지는 인스타그램 프로필</li>
                    <li>8강. 좋아요 500개, 댓글 100개받는 일상글의 비밀</li>
                    <li>9강. 고객이 하루에도 3번 찾는 계정 만들기</li>
                    <li>10강. 고객을 사로잡는 감각적인 피드 구성법</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">2. 이미지마케팅</div>
                <ul>
                    <li>1강. 인스타마켓, 정말 사진이 중요할까?</li>
                    <li>2강. 포토샵 없이 보정할 수 있는 어플 모음집</li>
                    <li>3강. 동영상으로 매력 어필하기</li>
                    <li>3강. 인스타마켓 - 셀카 잘 찍는 법</li>
                    <li>4강. 인스타마켓 - 인물사진 잘 찍는 법</li>
                    <li>5강. 인스타마켓 - 음식 사진 잘 찍는 법</li>
                    <li>6강. 인스타마켓 - 배경사진 잘 찍는 법</li>
                    <li>7강. 인스타마켓 이미지마케팅 추가 강의 1</li>
                    <li>8강. 인스타마켓 이미지마케팅 추가 강의 2</li>
                    <li>9강. 인스타마켓 이미지마케팅 추가 강의 3</li>
                    <li>10강. 인스타마켓 이미지마케팅 추가 강의 4</li>
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

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665m_02.jpg" alt="" > 
            <a href="/m/promotion/index/cate/3114/code/1664" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/06/1665m_btn.png" alt="" ></a>
        </div>
    </div>
    <!-- End Container -->
@stop