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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/06/1666_top_bg.jpg) no-repeat center top}
        .evtTop div {position:absolute; top:25px; left:50%; margin-left:200px; width:360px; height:100px; z-index:10;}
        .evtTop div a {display:block; float:left; width:90px; height:100px; font-size:0; text-indent: -9999px;}
        .evtTop div:after {content:""; display:block; clear:both}

        .evt01 {background:#787878; padding-bottom:100px}        
        .evt01 .review {position:absolute; top:338px; left:50%; margin-left:-483px; width:966px; height:60px; z-index:5; overflow:hidden;}
        .evt01 .review li {font-size:16px; color:#000; text-align:left; padding-left:200px}
        .evt01 .review li p {position:relative; width:100%; overflow:hidden; white-space:nowrap; height:60px; line-height: 60px; text-overflow:ellipsis; padding:0 15% 0 0}
        .evt01 .review span {position:absolute; top:0; width:80px; right:0; height:60px; line-height: 60px;  z-index:5; text-align:center}
        .evt01 .youtube iframe {width:960px; height:540px; margin:0 auto}

        .evt02 {background:#ffd55d}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1665_03_bg.jpg) no-repeat center top}

        .evt04 {padding:100px; width:1120px; margin:0 auto; line-height:1.4; text-align:left}
        .evt04 .title {color:#1d2331; font-size:36px; letter-spacing:-1px}
        .evt04 .curriculum {margin-top:50px}
        .evt04 .curriculum .stitle {color:#ffd55d; font-size:24px; margin-bottom:10px}
        .evt04 .curriculum li {font-size:18px; margin-bottom:5px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1666_top.jpg" alt="" > 
            <div>
                <a href="/promotion/index/cate/3114/code/1665">이시한교수</a>
                <a href="#none">이승기PD</a>
                <a href="/promotion/index/cate/3114/code/1668">안혜빈대표</a>
                <a href="/promotion/index/cate/3114/code/1669">이기용대표</a>
            </div>
        </div>         
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1666_01.jpg" alt="" > 
            <div class="review">
                <ul>
                    <li><p>싹피디님 유튜브 튜토리얼을 너무 잘봤습니다! 진행하실 강의도 기대하겠습니다!<span>(황연*)</span></p></li>
                    <li><p>공식 유튜브 보고 왔어요!! 4일만에 만명 저도 가능하도록 부탁 드리겠습니다 피디님~!<span>(최승*)</span></p></li>
                    <li><p>유튜브에 성공 방정식이라니! PD님의 알짜배기 정보 기다리겠습니다~!<span>(조성*)</span></p></li>
                    <li><p>유튜브 하고픈 마음은 컸는데 도전할 용기가 안났는데, 이강의면 가능하겠어요!<span>(마문*)</span></p></li>
                    <li><p>목소리와 말이 굉장히 딱 머리에 박히네요! PD님 따라 유튜브로 수익내기 도전합니다!<span>(신승*)</span></p></li>
                    <li><p>유튜브가 저의 투잡이 될 수 있도록 도와주세요 PD님!!<span>(장재*)</span></p></li>                    
                </ul>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/NZLPO-a3JxY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1666_02.jpg" alt="" > 
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

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_03.jpg" alt="" usemap="#MapbtnGo" border="0" >
            <map name="MapbtnGo">
                <area shape="rect" coords="313,854,807,964" href="/promotion/index/cate/3114/code/1664" target="_blank" alt="사전예약하기">
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