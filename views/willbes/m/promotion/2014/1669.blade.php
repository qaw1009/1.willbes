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
        .evt04 .title {color:#2978bb; font-size:36px; letter-spacing:-1px}
        .evt04 .curriculum {margin-top:50px}
        .evt04 .curriculum .stitle {color:#00a279; font-size:24px; margin-bottom:10px}
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
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1669m_top.jpg" alt="" > 
            <div class='embed-container'>
                <iframe src='https://www.youtube.com/embed/tXL-6wWRTfI?rel=0' frameborder='0' allowfullscreen></iframe> 
            </div>
        </div> 
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1669m_01.jpg" alt="" >            
        </div>

        <div class="evtCtnsBox evt04">
            <div class="title NSK-Black">수익 창출을 위한 네이버 블로그 마케팅 新전략</div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 1</div>
                <ul>
                    <li>1. 프로 N잡러 되기, 블로그로 돈 벌어볼까? - 8년차 유명한 마케팅전문가, 처음엔 블로거였다?</li>
                    <li>2. 왜 유튜브가 아닌 네이버 블로그인가? - 유튜브가 대세인 이 시대에 블로그로?</li>
                    <li>3. 블로그로 월 100만원 정도는 더 벌어줘야지! - 블로그로 수익화하는 다양한 방법 알아보기</li>                        
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 2</div>
                <ul>
                    <li>4. 우선 체험단으로 생활비 절약부터! - 블로그 전문회사 CEO가 알려주는 체험단 선정 되는 법</li>
                    <li>5. 용돈벌이 시작해볼까? 블로그 기자단 시작하기 - 블로그 전문회사 CEO가 알려주는 블로그 기자단 A to Z</li>
                    <li>6. 네이버 애드포스트로 수익을 UP!! - 애드포스트를 통해 내 수익을 추가하기</li>
                    <li>7. 내 제품이나 서비스를 비용들이지 않고 홍보하기! - 나만의 블로그를 통해 매출을 올려보자!</li>
                    <li>8. 월 100만원? 일을 키워볼까? - 남의 제품만 홍보 하지 말고, 내 제품을 찾아볼까?</li>
                    <li>9. 블로그로 퍼스널 브랜딩하기 - 잘하는 사람? 유명한 사람? 나를 브랜딩 해보기</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 3</div>
                <ul>
                    <li>10. 기본적으로 알아야 할 블로그 셋팅하기 - 블로그 이름,프로필 구성하기</li>
                    <li>11. 내 블로그의 전문성을 보여주는 카테고리 셋팅하기 - 블로그 카테고리 구성하기</li>
                    <li>12. 블로그의 첫인상 제대로 꾸미기 - 프로필과 카테고리에 꼭 들어 가야 할 것들은?</li>
                    <li>13. 블로그 이웃 꼭 늘려야 하나요? - 블로그 이웃이 요즘에도 필요할까?</li>
                    <li>14. 블로그 이웃 늘려보기! - 블로그 이웃을 신청하고 받아 줘보자!</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 4</div>
                <ul>
                    <li>15. 네이버 알고리즘? 상위노출? - 알고리즘이 뭐고 상위노출이 뭔가?</li>
                    <li>16. C-랭크 알고리즘이 뭐길래 말이 많지? - C-랭크 알고리즘 파헤치기</li>
                    <li>17. D.I.A는 또 뭐야? 한번 알아보기 - D.I.A 파헤치기</li>
                    <li>18. 네이버 블로그 글쓰기 기능 한번 짚어볼까? - 이 정도만 알아도 블로그 글쓰는 정도야 뭐</li>
                    <li>19. 내 글이 노출이 되기 위해서는? - 어떻게 써야 상위노출이 잘 될까?</li>
                    <li>20. 사람들이 반응 하는 콘텐츠 만들기1 - 좋은 콘텐츠 만드는 방법은?</li>
                    <li>21. 사람들이 반응 하는 콘텐츠 만들기2 - 사람들은 제목을 보고 클릭한다?</li>
                    <li>22. 사람들이 반응 하는 콘텐츠 만들기3 - 빅데이터를 활용해서 반응하는 콘텐츠 만들기</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 5</div>
                <ul>
                    <li>23. 키워드? 그게 뭐에요? - 키워드가 뭔지 제대로 이해하기</li>
                    <li>24. 키워드가 왜 중요한가! - 같은 말이어도 검색하는 단어가 다르다?</li>
                    <li>25. 사람들이 찾는 키워드는? - 검색광고를 통해서 사람들이 찾는 키워드 확인하기</li>
                    <li>26. 실제로 매출이 나오는 키워드는? - 조회수만 높다고 좋은 키워드가 아니다?</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">수업을 마치며</div>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665m_02.jpg" alt="" > 
            {{--<a href="/m/promotion/index/cate/3114/code/1664" target="_blank">--}}
            <a href="#none"  onclick="javascript:alert('곧 본강의가 오픈됩니다!');" >
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1665m_btn.png" alt="" >
            </a>
        </div>
    </div>
    <!-- End Container -->
@stop