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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/06/1665_top_bg.jpg) no-repeat center top}
        .evtTop div {position:absolute; top:25px; left:50%; margin-left:200px; width:360px; height:100px; z-index:10;}
        .evtTop div a {display:block; float:left; width:90px; height:100px; font-size:0; text-indent: -9999px;}
        .evtTop div:after {content:""; display:block; clear:both}

        .evtTop_01{background:#4d79f6}

        .evt01 {background:#c09260; padding-bottom:100px}        
        .evt01 .review {position:absolute; top:298px; left:50%; margin-left:-483px; width:966px; height:60px; z-index:5; overflow:hidden;}
        .evt01 .review li {font-size:16px; color:#000; text-align:left; padding-left:200px}
        .evt01 .review li p {position:relative; width:100%; overflow:hidden; white-space:nowrap; height:60px; line-height: 60px; text-overflow:ellipsis; padding:0 15% 0 0}
        .evt01 .review span {position:absolute; top:0; width:80px; right:0; height:60px; line-height: 60px;  z-index:5; text-align:center}
        .evt01 .youtube iframe {width:960px; height:540px; margin:0 auto}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1665_02_bg.jpg) no-repeat center top}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1665_03_bg.jpg) no-repeat center top}
        .evt04 {padding:100px; width:1120px; margin:0 auto; line-height:1.4; text-align:left}
        .evt04 .title {color:#4d79f6; font-size:36px; letter-spacing:-1px}
        .evt04 .curriculum {margin-top:50px}
        .evt04 .curriculum .stitle {color:#c09261; font-size:24px; margin-bottom:10px}
        .evt04 .curriculum li {font-size:18px; margin-bottom:5px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_top.jpg" alt="" > 
            <div>
                <a href="#none">이시한교수</a>
                <a href="/promotion/index/cate/3114/code/1666">이승기PD</a>
                <a href="/promotion/index/cate/3114/code/1668">안혜빈대표</a>
                <a href="/promotion/index/cate/3114/code/1669">이기용대표</a>
            </div>
        </div> 
        <div class="evtCtnsBox evtTop_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_top_01.gif" alt="" > 
        </div> 
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_01.jpg" alt="" > 
            <div class="review">
                <ul>
                    <li><p>유튜브에서 제 아는척 지식을 담당해주는 교수님! 소문듣고 왔어용 강의기대할게요^0^<span>(황연*)</span></p></li>
                    <li><p>저도 성공적인 유튜브 꼭 하고싶습니다 교수님~!!!<span>(최승**)</span></p></li>
                    <li><p>유튜버도 이제는 2세대! 뭔가 변했다 생각했는데 이렇게 분석해주시다니, 기대하겠습니다!<span>(박우*)</span></p></li>
                    <li><p>낯이 익었는데, 문제적남자에서 봤네요 역시! 강의 기대하겠습니다~!<span>(이정*)</span></p></li>
                    <li><p>영상 중 하고싶은 걸 하자 라는 얘기가 너무 와닿네요. 좋은말씀 감사합니다.<span>(김제*)</span></p></li>                    
                </ul>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/OzRyEe5Vops?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_02.jpg" alt="" > 
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

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_03.jpg" alt="" usemap="#MapbtnGo" border="0" >
            <map name="MapbtnGo">
                <area shape="rect" coords="313,854,807,964" href="/promotion/index/cate/3114/code/1710" target="_blank" alt="신청하기">
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