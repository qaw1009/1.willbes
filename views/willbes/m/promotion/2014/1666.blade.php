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
        .evt04 .title {color:#1d2331; font-size:36px; letter-spacing:-1px}
        .evt04 .curriculum {margin-top:50px}
        .evt04 .curriculum .stitle {color:#ffd55d; font-size:24px; margin-bottom:10px}
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
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1666m_top.jpg" alt="" > 
            <div class='embed-container'>
                <iframe src='https://www.youtube.com/embed/NZLPO-a3JxY?rel=0' frameborder='0' allowfullscreen></iframe> 
            </div>
        </div> 
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1666m_01.jpg" alt="" >            
        </div>

        <div class="evtCtnsBox evt04">
            <div class="title NSK-Black">
                슬기로운 유튜버 생활<br>
                : 유튜브 기획부터 편집, 부업까지 한 번에 마스터하기
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 1 유튜브, 그 대망의 시작</div>
                <ul>
                    <li>1강. 유튜브 저도 할 수 있을까요?</li>
                    <li>2강. 싹피디가 알려주는 유튜브 A to Z 어떤 과정으로 배우게 될까요?</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 2 유튜브 채널 내가 잘할 수 있는 것부터 시작하자!</div>
                <ul>
                    <li>3강. 어떤 채널을 만들어야 할까? 싹피디와 함께 하는 유튜브 채널 처음부터 만들기</li>
                    <li>4강. 채널을 대표하는 멋진 대문 만들기. 채널아트, 프로필 사진 제작하기</li>
                    <li>5강. 어떤 콘텐츠를 만들어 인기가 있을까? 콘텐츠 기획하기</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 3 콘텐츠의 성공은 영상촬영부터 시작한다.</div>
                <ul>
                    <li>6강. 종류가 너무 다양해서 고르지 못하겠어요! 카메라와 촬영 장비 선택하기</li>
                    <li>7강. 빨간거 누르면 녹화되는거 아닌가요? 유튜브에서 쉽게 사용할 수 있는 기본 촬영법</li>
                    <li>8강. 앵글만 바꿨는데 영상이 고급스러워진다고!? 다양한 앵글의 필요성</li>
                    <li>9강. 카메라빨보다는 조명빨! 배우들이 조명감독과 친한 이유는 따로 있다</li>
                    <li>10강. 집에 있는 스탠드와 스마트폰으로도 조명효과를 낼 수 있다</li>
                    <li>11강. 삼각대를 이용하여 카메라 감독처럼 멋진 카메라 무빙을 만들어보자</li>
                    <li>12강. 조그만 녀석이 성능은 괴물! 액션캠으로 생동감 넘치는 영상 만들기</li>
                    <li>13강. 카메라 앞에서 말이 잘 안 나오고 떨려요! 두려움 극복하기</li>
                    <li>14강. 녹화한 파일, 어떻게 정리하면 좋을까요?</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 4 생각보다 쉬운 영상 편집! 따라하다 보니 나도 마스터!?</div>
                <ul>
                    <li>15강. 초보와 전문가 모두 사용하는 프리미어 프로</li>
                    <li>16강. 단축키만 알아도 편집이 두 배는 빨라진다</li>
                    <li>17강. 자르고 붙이면 그게 편집 아닌가요?</li>
                    <li>18강. 평생 쓰는 시퀀스 세팅과 기본적인 영상편집 스킬 뽀개기</li>
                    <li>19강. 싹피디의 편집 노하우 大방출! 전문가처럼 편집 빨리하는 비법</li>
                    <li>20강. 영상을 서서히 크게 만들고 작게 만들고 돌아가게 만들고 효과 넣기!</li>
                    <li>21강. 영화의 한 장면처럼 천천히 시간 흘러가는 느낌 주기</li>
                    <li>22강. 밋밋한 영상에 MSG를 톡톡! 자막 넣어서 영상에 생기 불어넣기</li>
                    <li>23강. 자막에 소리를 넣었는데 눈길이 가네? 움직이는 자막 만들기</li>
                    <li>24강. 말하는 자막 자동으로 만들어주는 프로그램 vrew 사용하기</li>
                    <li>25강. 녹색 크로마키 촬영하고 내가 원하는 배경 합성하기</li>
                    <li>26강. 유튜브 영상 음악, 아무거나 사용해도 될까요?</li>
                    <li>27강. 다 만든 영상, 이제 파일로 만들어요</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 5 썸네일만 잘만들어도 유튜브 90프로는 성공 </div>
                <ul>
                    <li>28강. 유튜브에 나오는 사진, 썸네일의 중요성</li>
                    <li>29강. 대충 캡쳐해서 글자만 넣으면 썸네일이라고요?</li>
                    <li>30강. 파워포인트와 포토샵으로 만드는 효과만점 썸네일 제작</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 6 모두의 귀를 사로잡을 수 있는 내래이션!</div>
                <ul>
                    <li>31강. 팬들의 귀를 호강시키는 내래이션 음성 녹음하기</li>
                </ul>
            </div>
            <div class="curriculum">
                <div class="stitle">CHAPTER 7 고급 스킬, 인서트란?</div>
                <ul>
                    <li>32강. 영상을 한층 고급스럽게 만드는 인서트 기법 활용하기</li>
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