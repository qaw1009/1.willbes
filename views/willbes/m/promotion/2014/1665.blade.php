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
            <div class="title NSK-Black">지속가능한 유튜브 채널만들기 : 기획부터 실행까지 한 방에</div>
            <div class="curriculum">
                <div class="stitle">1부 : 유튜브 목적</div>
                <ul>
                    <li>1강 : 유튜브 지금 시작하시나요?</li>
                    <li>2강 : 도대체 당신이 유튜브를 하려는 이유는?</li>
                    <li>3강 : 유튜브를 하려는 8가지 목적과 각각의 핵심 포인트 Part 1</li>
                    <li>4강 : 유튜브를 하려는 8가지 목적과 각각의 핵심 포인트 Part 2</li>
                    <li>5강 : 유튜브 목적이 채널 운영에 미치는 영향</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">2부 : 유튜브 최신 트렌드</div>
                <ul>
                    <li>6강 : 유튜브 2세대가 시작된 해는 과연 언제일까?</li>
                    <li>7강 : 1세대 유튜버와 2세대 유튜버의 세대 차이 </li>
                    <li>8강 : 요즘 잘 나가는 채널 분석 </li>
                    <li>9강 : 유튜브 7가지 최신 트렌드</li>
                    <li>10강 : 2세대 유튜버의 2가지 핵심은?</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">3부 : 유튜브 기획</div>
                <ul>
                    <li>11강 : 채널 기획 전 반드시 체크해야 할 스스로에 대한 5대 점검사항</li>
                    <li>12강 : 지속가능하기 위한 콘텐츠의 5가지 조건</li>
                    <li>13강 : 콘텐츠의 뼈대가 되는 두 가지 기둥</li>
                    <li>14강 : 콘텐츠에 매력을 더하는 두 가지 양념</li>
                    <li>15강 : 구독자가 느끼는 매력은 어디서 나오는가?</li>
                    <li>16강 : 차마 대놓고 물어보지 못하는 질문들</li>
                    <li>17강 : 채널의 내용결정</li>
                    <li>18강 : 채널의 형식결정</li>
                    <li>19강 : 채널의 등장인물 결정</li>
                    <li>20강 : 사소한 것 같지만 결코 사소하지 않은 것들 결정하기</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">4부 : 유튜브 운영</div>
                <ul>
                    <li>21강 : 장비 결정하기 1 - 카메라는 어떤 것을 쓸까? </li>
                    <li>22강 : 장비 결정하기 2 - 마이크는 따로 쓰는 것이 좋을까? </li>
                    <li>23강 : 장비 결정하기 3 - 기타 장비들과 장비들의 조합</li>
                    <li>24강 : 편집 결정하기 </li>
                    <li>25강 : 여러 가지 편집 프로그램들 </li>
                    <li>26강 : 채널 제목은 브랜드 만들기다</li>
                    <li>27강 : 채널 대문 만들기 </li>
                    <li>28강 : 매력적인 섬네일 만들기</li> 
                    <li>29강 : 영상제목 만들기 </li>
                    <li>30강 : 운영을 도와주는 결정적 무료 프로그램들</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">5부 : 유튜브 실행</div>
                <ul>
                    <li>31강 : 콘텐츠 업로드 하기</li>
                    <li>32강 : 유튜브 분석툴 활용하기 </li>
                    <li>33강 : 구독자를 늘리는 방법</li>
                    <li>34강 : 악플 대응 방법 </li>
                    <li>35강 : 콜라보와 콘텐츠 벤치마킹</li>
                    <li>36강 : 유튜브 홍보를 보완해주는 도구들</li> 
                    <li>37강 : 저작권 문제는 어떻게 되나?</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">6부 : 유튜브로 수입 창출하기</div>
                <ul>
                    <li>38강 : 유튜브 광고수익의 기본 원리</li>
                    <li>39강 : 구글 에드센스 설정</li>
                    <li>40강 : 유튜브로 돈 벌 때, 반드시 피해야 할 사항</li>
                    <li>41강 : 협찬으로 돈 벌기 </li>
                    <li>42강 : 브랜드로 돈 벌기</li>
                    <li>43강 : 비즈니스로 확장하기</li>
                    <li>44강 : 채널분화를 고민하는 시점</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">강의를 마치며</div>
                <ul>
                    <li>45강 : 시작한 사람만이 성공할 수 있다</li>
                </ul>
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