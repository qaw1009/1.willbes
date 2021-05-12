@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}
    .evtTop01 {background:#bebcbd;}
    .evtTop > ul {padding:20px }
    .evtTop > ul li {list-style:disc; margin-left:15px; margin-bottom:5px; text-align:left;}
    .evtTop span {position:absolute; right:5%; top:35%; animation: sp01 1.5s linear infinite;}
    .evtTop span img {width:80px}
    @@keyframes sp01{
         from{transform:scale(1)}50%{transform:scale(0.9)}to{transform:scale(1)}
     }
    .evtMenu {background:#fff; width:100%; border-bottom:1px solid #edeff0; border-top:1px solid #edeff0}
    .tabs {width:100%; max-width:720px; margin:0 auto;}
    .tabs li {display:inline; float:left; width:25%}
    .tabs li a {display:block; text-align:center; font-size:14px; line-height:1.5; padding:15px 0; color:#999; font-weight:bold; letter-spacing:-1px;}
    .tabs li a:hover,
    .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
    .tabs:after {content:""; display:block; clear:both}

    .evt01 {margin:20px 0;}
    .evt01 .dday {font-size:18px; text-align:center; margin-bottom:20px}
    .evt01 .dday strong {font-size:24px}
    .evt01 .dday img {display:inline-block; margin-right:10px; width:70px;
        -webkit-animation: vibrate-1 1s linear infinite both;
        animation: vibrate-1 1s linear infinite both;
    }
    @@-webkit-keyframes vibrate-1 {
        0% {
            -webkit-transform: translate(0);
            transform: translate(0);
        }
        20% {
            -webkit-transform: translate(-2px, 2px);
            transform: translate(-2px, 2px);
        }
        40% {
            -webkit-transform: translate(-2px, -2px);
            transform: translate(-2px, -2px);
        }
        60% {
            -webkit-transform: translate(2px, 2px);
            transform: translate(2px, 2px);
        }
        80% {
            -webkit-transform: translate(2px, -2px);
            transform: translate(2px, -2px);
        }
        100% {
            -webkit-transform: translate(0);
            transform: translate(0);
        }
    }
    @@keyframes vibrate-1 {
        0% {
            -webkit-transform: translate(0);
            transform: translate(0);
        }
        20% {
            -webkit-transform: translate(-2px, 2px);
            transform: translate(-2px, 2px);
        }
        40% {
            -webkit-transform: translate(-2px, -2px);
            transform: translate(-2px, -2px);
        }
        60% {
            -webkit-transform: translate(2px, 2px);
            transform: translate(2px, 2px);
        }
        80% {
            -webkit-transform: translate(2px, -2px);
            transform: translate(2px, -2px);
        }
        100% {
            -webkit-transform: translate(0);
            transform: translate(0);
        }
    }
    .evt01 .dday span {color:#3a99f0; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}

    .evt02 {padding-top:50px}

    .evt03 {}   

    .evt04 {padding-bottom:50px; background:#f6f6f6}
    .evt04 div {color:#2a92ed; font-size:24px; font-weight:600; margin-top:20px}

    .evt05 {text-align:left; padding:50px 20px}
    .evt05 h5 {color:#3a99f0; font-size:2.2rem; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
    .evt05 .evt05Txt01 {font-size:1.6rem;}
    .evt05 dl {margin-top:30px;}
    .evt05 dl:first-child {margin:0}
    .evt05 dt {font-size:16px; font-weight:bold; color:#3a99f0; margin-top:30px}
    .evt05 dt:first-child {margin:0}
    .evt05 .curriculum {margin:30px 0}
    .evt05 .sample {margin:0 auto}
    .evt05 .sample li {display:inline; float:left; width:49%; padding:10px 0; margin-right:1%; border-radius:10px; 
        background:#2a92ed; color:#fff; font-size:16px; font-weight:600; text-align:center}
    .evt05 .sample li p {margin-bottom:15px;}
    .evt05 .sample li a {display:inline-block; padding:5px 10px; font-size:14px; margin-right:5px; border-radius:4px}
    .evt05 .sample li a.btnst01 {border:1px solid #ccc;}
    .evt05 .sample li a.btnst02 {border:1px solid #000; color:#fff; background:#333}
    .evt05 .sample li a.btnst03 {border:1px solid #ccc; color:#000; background:#ccc}
    .evt05 .sample li a:hover {background:#000; color:#fff}
    .evt05 .sample li:last-child {margin:0}
    .evt05 .sample:after {content:""; display:block; clear:both}

    .evt05 .evt05Txt02 {font-size:14px; line-height:1.4; letter-spacing:-1px; color:#333; margin-top:20px; text-align:left}   
 
    .evt06 {background:#ececec; padding-top:20px}
    .evt06 .columns {padding:20px;
        column-count: 1;
        column-gap:20px;
    }
    .evt06 .columns div {
        text-align:justify; font-size:14px; line-height:1.4;
        display:inline-block;
        padding:20px; border:1px solid #eee; border-radius:10px;
        margin-bottom:20px; color:#888; background:#fff;
        width:100%;
    }
    .evt06 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px; color:#2a92ed}
    .evt06 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
    .evt06 .columns div strong {font-size:bold; color:#333}

    .evt07 {background:#2a92ed; padding:20px 0}
    /*.evt07 li {display:inline; float:left; width:50%}*/
    .evt07 li a {display:block; font-size:1rem; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px; margin:0 1.5%;}
    .evt07 li a:hover {background:#fff; color:#000;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .evt07 li span {display:block; font-size:1.25rem}
    .evt07 ul:after {content:""; display:block; clear:both}

    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
        background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2);left:0; z-index:10;
        text-align:center;
    }

    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px}
    .btnbuy a {display:block; width:100%; max-width:720px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#0099ff;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}


    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt01 .dday {font-size:30px;}
        .evt01 .dday strong {font-size:40px}
        .evt01 .dday img {width:142px;}
        .evt02 .price br,
        .evt05 h5 br {display:none}
        .evt05 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}        
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <div class="evtTop01"><img src="https://static.willbes.net/public/images/promotion/2020/07/1710_top.jpg" alt="이시한 교수" ></div>             
        <div class="evtTop02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_01.jpg" alt="이시한 교수" >
        </div>
        <span><a href="#tab03"><img src="https://static.willbes.net/public/images/promotion/2020/07/1710_sky02.png" alt="맛보기강의"></a></span>       
        <div class="evtMenu">
            <ul class="tabs">
                <li><a href="#tab01" data-tab="tab01" class="top-tab">수강신청</a></li>
                <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                <li><a href="#tab03" data-tab="tab03" class="top-tab">커리큘럼 안내</a></li>
                <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
            </ul>
        </div>  
    </div>  
    

    <div id="tab01" class="evtCtnsBox">
        <div class="evt01">
            {{--
            <div class="dday NSK-Thin"><img src="https://static.willbes.net/public/images/promotion/2020/07/1710_img01.png" alt="시계" >
                <strong class="NSK-Black"><span id="ddayCountText"></span> 남았습니다.</strong>
            </div> 
            --}}
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1710_02.jpg" alt="" >       
        </div>
    </div>

    <div id="tab02">
        <div class="evtCtnsBox evt02">
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/OzRyEe5Vops?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="mt40 mb80"><img src="https://static.willbes.net/public/images/promotion/2020/07/1710_03.png" alt="" ></div>     
        </div> 

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_04.jpg" alt="" ><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_05.jpg" alt="" ><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_06.jpg" alt="" ><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_07.jpg" alt="" >          
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_08.jpg" alt="" ><br>
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/zF21fLMGoJY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="NSK-Black">#유튜브, 지금 시작하시나요?</div>
        </div>
    </div>  

    <div id="tab03">
        <div class="evtCtnsBox evt05">
            <h5 class="NSK-Black">
                <div>지속가능한<br> 유튜브 채널만들기 :</div>
                <div>기획부터<br> 실행까지 한 방에</div>
            </h5>
            <div class="evt05Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
            <div class="curriculum">
                <dl>
                    <dd>
                        <ul class="sample">
                            @if(empty($arr_base['promotion_otherinfo_data']) === false)
                                @php $i = 1; @endphp
                                @foreach($arr_base['promotion_otherinfo_data'] as $row)                                    
                                    <li>
                                        <p>{{$i}}강 맛보기 수강 ▼</p>                                       
                                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD", "{{config_item('starplayer_license')}}");' class="btnst02">HIGH ></a>
                                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=SD", "{{config_item('starplayer_license')}}");' class="btnst03">LOW ></a>
                                    </li>
                                    @php $i += 1; @endphp
                                @endforeach
                            @else
                                <li><a href="#none">1강 맛보기<br> 수강 준비중 ></a></li>
                                <li><a href="#none">2강 맛보기<br> 수강 준비중 ></a></li>
                            @endif
                        </ul>
                        <div class="evt05Txt02">
                            * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                            * 스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                            * 팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                        </div>
                    </dd>
                </dl>                       
                        
            	<dl>
                    <dt>1부 : 유튜브 목적</dt> 
                    <dd>1강 : 유튜브 지금 시작하시나요?</dd>
                    <dd>2강 : 도대체 당신이 유튜브를 하려는 이유는?</dd>
                    <dd>3강 : 유튜브를 하려는 8가지 목적과 각각의 핵심 포인트 Part 1</dd>
                    <dd>4강 : 유튜브를 하려는 8가지 목적과 각각의 핵심 포인트 Part 2</dd>
                    <dd>5강 : 유튜브 목적이 채널 운영에 미치는 영향</dd>

                    <dt>2부 : 유튜브 최신 트렌드 </dt>
                    <dd>6강 : 유튜브 2세대가 시작된 해는 과연 언제일까?</dd>
                    <dd>7강 : 1세대 유튜버와 2세대 유튜버의 세대 차이 </dd>
                    <dd>8강 : 요즘 잘 나가는 채널 분석 </dd>
                    <dd>9강 : 유튜브 7가지 최신 트렌드</dd>
                    <dd>10강 : 2세대 유튜버의 2가지 핵심은?</dd>

                    <dt>3부 : 유튜브 기획</dt>
                    <dd>11강 : 채널 기획 전 반드시 체크해야 할 스스로에 대한 5대 점검사항 </dd>
                    <dd>12강 : 지속가능하기 위한 콘텐츠의 5가지 조건 </dd>
                    <dd>13강 : 콘텐츠의 뼈대가 되는 두 가지 기둥</dd>
                    <dd>14강 : 콘텐츠에 매력을 더하는 두 가지 양념</dd>
                    <dd>15강 : 구독자가 느끼는 매력은 어디서 나오는가?</dd>
                    <dd>16강 : 차마 대놓고 물어보지 못하는 질문들</dd>
                    <dd>17강 : 채널의 내용결정</dd>
                    <dd>18강 : 채널의 형식결정 </dd>
                    <dd>19강 : 채널의 등장인물 결정 </dd>
                    <dd>20강 : 사소한 것 같지만 결코 사소하지 않은 것들 결정하기</dd>

                    <dt>4부 : 유튜브 운영</dt>
                    <dd>21강 : 장비 결정하기 1 - 카메라는 어떤 것을 쓸까?</dd>
                    <dd>22강 : 장비 결정하기 2 - 마이크는 따로 쓰는 것이 좋을까? </dd>
                    <dd>23강 : 장비 결정하기 3 - 기타 장비들과 장비들의 조합</dd>
                    <dd>24강 : 편집 결정하기 </dd>
                    <dd>25강 : 여러 가지 편집 프로그램들 </dd>
                    <dd>26강 : 채널 제목은 브랜드 만들기다</dd>
                    <dd>27강 : 채널 대문 만들기 </dd>
                    <dd>28강 : 매력적인 섬네일 만들기</dd> 
                    <dd>29강 : 영상제목 만들기</dd>
                    <dd>30강 : 운영을 도와주는 결정적 무료 프로그램들</dd>

                    <dt>5부 : 유튜브 실행</dt>
                    <dd>31강 : 콘텐츠 업로드 하기</dd>
                    <dd>32강 : 유튜브 분석툴 활용하기</dd> 
                    <dd>33강 : 구독자를 늘리는 방법</dd>
                    <dd>34강 : 악플 대응 방법 </dd>
                    <dd>35강 : 콜라보와 콘텐츠 벤치마킹</dd>
                    <dd>36강 : 유튜브 홍보를 보완해주는 도구들</dd> 
                    <dd>37강 : 저작권 문제는 어떻게 되나?</dd>

                    <dt>6부 : 유튜브로 수입 창출하기</dt>
                    <dd>38강 : 유튜브 광고수익의 기본 원리</dd>
                    <dd>39강 : 구글 에드센스 설정</dd>
                    <dd>40강 : 유튜브로 돈 벌 때, 반드시 피해야 할 사항</dd>
                    <dd>41강 : 협찬으로 돈 벌기</dd>
                    <dd>42강 : 브랜드로 돈 벌기</dd>
                    <dd>43강 : 비즈니스로 확장하기</dd>
                    <dd>44강 : 채널분화를 고민하는 시점</dd>

                    <dt>강의를 마치며</dt>
                    <dd>45강 : 시작한 사람만이 성공할 수 있다</dd>
                </dl>
            </div>
        </div>
    </div>

    <div id="tab04">
        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_09.png" alt="BEST 수강후기" >
            <div class="columns">
                <div>
                    <p>Golden B**</p>
                    우와… 부럽네요. 저도 유튜브 채널 운영해 보고 싶네요. 
                </div>  
                <div>
                    <p>IY*</p>
                    와~ 숨차지만 멋지게 달려 오셨네요. 저에게 시한책방은 생각할 틈도 없이 바쁠 때 한 박자 쉬어가는 “잠깐”멈춤” 입니다! 앞으로 더 기대됩니다!!
                </div>                     
                <div>
                    <p>리바*</p>
                    다른 북튜버들 구독도 많이 하고 자주 보는 편인데 무료로 영상 보는 게 죄송한 유일한 유튜버
                </div> 
                <div>
                    <p>정현*</p>
                    저는 한끼줍쇼로 지구인이 되었죠^^! 시한 책방 파이팅~♡ 
                </div>
                <div>
                    <p>like Y**</p>
                    책이 나온다니 너무 축하드립니다. 도서관에 신간신청해야겠어요!
                </div> 
                <div>
                    <p>래*</p>
                    와 정말 너무 축하드립니다! 항상 신선한 자극을 많이 받습니다. 앞으로도 쭉쭉 번창하셔요!
                </div> 
                <div>
                    <p>Cheong a k**</p>
                    유익한 콘텐츠 뒤에 많은 우여곡절이 있었군요.. 앞으로도 파이팅이요!
                </div> 
                <div>
                    <p>바나*</p>
                    정말 기대돼요!!
                </div> 
                <div>
                    <p>꽃*</p>
                    우와 진짜 하루에 잠은 몇시간 자고 하시는 건가요? 항상 배우고갑니다^^
                </div> 
                <div>
                    <p>YH*</p>
                    시한책방은 제가 고전에 입문할 수 있도록 도와준 채널이예요! 
                    책소개도 군더더기 없고 동영상 후반부에 토론거리 소개해주시는거 보면서 주제에 대해 이런저런 생각을 할 수 있어서 좋아요!! 
                    앞으로도 좋은 책 소개 많이 부탁드릴게요~ 유튜브 실버버튼 골드버튼 다 받으시길!!ㅋㅋㅋ
                </div> 
                <div>
                    <p>SG*</p>
                    와아......책들을 매번 편의하게 맛보여주시더니 이젠 어느 때고 먹으라고 도시락을 보내주시네요. 
                    잘먹겠습니다~ 여러번 꼭꼭 씹어 먹을게요~ 2주년 축하합니다! 구독자도 감개무량~~
                </div>
                <div>
                    <p>Yonghun K**</p>
                    우연히 보게 된 영상인데요. 시한님의 엄청난 내공에 놀라고 갑니다. 3번 연속으로 집중해서 보았네요~^^;; 
                    이 영상을 보면서 다시금 제게 질문하게 되네요. 왜 책을 읽고 있는지...^^;; 
                    2년 동안 '꾸준히', '정직하게', '겸손하게' 방송 해주셔서 너무 감사합니다!!
                    (보지 못한 영상들은 틈틈히 역주행하도록 하겠습니다..ㅎㅎㅎ)

                </div>
                <div>
                    <p>박수*</p>
                    인기쟁이네요 교수님 책을 등진 세계에서 등불같은 존재로 빛나주시길
                </div>
                <div>
                    <p>파라*</p>
                    오래전부터 영상 꾸준히 잘 보고 여러가지 많은 것들을 배워갔는데요, 
                    댓글은 한 번도 쓴적이 없는 것 같아요! 그런데 오늘은 꼭 댓글을 달고 싶더라구요. 
                    좋은 일 하시는 시한님 정말 멋있으세요bb 앞으로 채널이 더 커지길 바랄게요!
                </div>
            </div>              
        </div>
        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_10.jpg" >
            <ul>
                <li>
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
                        <span class="NSK-Black">지금, N잡강의 신청하고</span>
                        부수입 만들기 도전! →
                    </a>
                </li>
            </ul>
        </div>	
    </div>

    <div class="evtCtnsBox evtFooter" id="infoText">
        <h3 class="NSK-Black">[이용 및 환불 안내]</h3>
        <p># 수강안내</p>
        <ul>

            <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다. (내강의실 > '수강 중 강좌'에서 확인 가능)</li>
            <li>PC/휴대폰/태블릿에서 언제든 수강가능합니다.</li>
            <li>커리큘럼은 사정에 따라 일부 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.</li>
            <li>동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.</li>
            <li>결제 완료 시 강의는 즉시 수강 시작되오니, 이 점 참고 부탁 드립니다.</li> 
            <li>수강상품 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li> 
            <li>본 강의는 재수강,수강연장은 불가능합니다.</li>
        </ul>

        <p># 환불안내</p>
        <ul>
            <li>이용안내 및 환불 특약으로 안내된 별도 환불 기준이 있는 경우 우선 적용합니다.</li>
            <li>강의재생시간에 관계없이 강의를 재생한 경우, 학습 자료 및 모바일 다운로드 이용한 경우 수강한 것으로 간주합니다.(맛보기 강의 제외)</li>
            <li>강좌비*에서 기수강 강의수에 대한 금액* 및 위약금*(강의 정상가의 10%)을 차감 후 부분 환불이 진행됩니다.<br>
            * 강좌비: 결제금액에서 서비스프로그램 등 추가 혜택에 해당하는 금액을 차감한 순수강좌비<br>
            * 기수강강의 금액: 결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수)<br>
            * 수강시작일로부터 7일 이내 위약금 없음<br>
            * 수강시작일로부터 7일 이후 위약금 적용 (정상가의 10% 공제) </li>
            <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.</li>
            <li>환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
            <li>총강의수 전체 기수강 시에는 전액환불이 불가합니다.</li>
        </ul>

        <p># 기타유의사항</p>
        <ul>
            <li>제공되는 사은혜택과 동영상은 구분하여 별도구매 불가합니다.</li>
            <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다. </li>
            <li>수강혜택 사은품으로 발급된 인증코드 및 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
        </ul>

        <div>※ 이용문의 : 고객만족센터 1544-5006</div>
    </div>  
</div>
<!-- End Container -->

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
        [온라인강의] 신청하기 >
        </a>
    </div>
    <div id="pass" class="infoCheck">
        <input type="checkbox" name="y_pkg" value="168088" style="display: none;" checked/>
        <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
        <a href="#infoText">이용안내 확인하기 ↓</a>
    </div>
</div>


    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}','txt');
        });

        /*스크롤고정*/
        $(function() {
            var nav = $('.evtMenu');
            var navTop = nav.offset().top+100;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 100);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });

        $(window).on('scroll', function() {
            $('.top-tab').each(function() {
                if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                    $('.top-tab').removeClass('active')
                    $(this).addClass('active');
                }
            });
        });

        function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay)
        {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form = $('#' + ele_id);
            var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
            var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
            var params;

            if ($is_chk.length > 0) {
                if ($is_chk.is(':checked') === false) {
                    alert('이용안내에 동의하셔야 합니다.');
                    $is_chk.focus();
                    return;
                }
            }

            if ($prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            {{-- 장바구니 저장 기본 파라미터 --}}
                params = [
                { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
                { 'name' : '_method', 'value' : 'POST' },
                { 'name' : 'cart_type', 'value' : cart_type },
                { 'name' : 'learn_pattern', 'value' : learn_pattern },
                { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
            ];

            {{-- 선택된 상품코드 파라미터 --}}
            $prod_code.each(function() {
                params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
            });

            {{-- 장바구니 저장 URL로 전송 --}}
            formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
        }

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->

@stop