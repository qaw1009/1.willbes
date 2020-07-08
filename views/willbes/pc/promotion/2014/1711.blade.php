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
        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
            width:152px;
            text-align:center;
        }
        .skybanner a {display:block; margin-bottom:5px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/07/1711_top_bg.jpg) no-repeat center top}
        .evtTop_01 {background:#626a74}

        .evtMenu {background:#fff; height:80px; width:100%; border-bottom:1px solid #edeff0}
        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}

        .evt01 {padding:50px 0 100px;}
        .evt01 .dday {font-size:30px; width:720px; margin:0 auto 50px; text-align:center;}
        .evt01 .dday strong {font-size:40px}
        .evt01 .dday img {display:inline-block; margin:0 20px;
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

        .evt01 .dday span {color:#ee181d; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}
        .evt01 .btnbuy {width:720px; margin:50px auto 0}
        .evt01 .btnbuy a {border-radius:50px; display:block; font-size:40px; background:#000; color:#fff; padding:20px 0;}
        .evt01 .btnbuy a:hover {background:#ee181d;}

        .infoCheck {font-size:14px; max-width:720px; margin:30px auto 0}
        .infoCheck label {margin-right:30px; cursor: pointer;}
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#ee181d;}

        .evt02 {padding-top:100px}
        .evt02 .evt02Txt01 {font-size:26px; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#ee181d}
        .evt02 .evt02Txt01 span {font-size:38px; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1); color:#000}

        .evt03 {background:#f6f6f6; padding:0;}
        
        .evt04 {padding-top:120px}     

        .evt05 {background:#f6f6f6;}       

        .evt06 {background:#fff; padding-bottom:120px}

        .evt07 {background:#f6f6f6;}          
        
        .evt08 {background:#fff;}
        .evt09 {background:#f6f6f6;}
        .evt10 {background:#ee181d;}

        .evt11 {background:#fff; text-align:left; padding-top:120px}
        .evt11 .copy {width:720px; margin:0 auto;}
        .evt11 h5 {color:#ee181d; font-size:50px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evt11 .evt07Txt01 {font-size:28px; margin:20px auto 80px}
        .evt11 .sample {width:720px; margin:0 auto}
        .evt11 .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#ee181d; color:#fff; font-size:20px; font-weight:600; text-align:center}
        .evt11 .sample li p {margin-bottom:15px;}
        .evt11 .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:4px}
        .evt11 .sample li a.btnst01 {border:1px solid #ccc;}
        .evt11 .sample li a.btnst02 {border:1px solid #000; color:#fff; background:#333}
        .evt11 .sample li a.btnst03 {border:1px solid #ccc; color:#000; background:#ccc}
        .evt11 .sample li a:hover {background:#000; color:#fff}
        .evt11 .sample li:last-child {margin:0}
        .evt11 .sample:after {content:""; display:block; clear:both}
        .evt11 .evt07Txt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}
        
        .evt12 {background:#ececec; padding:120px 0}
        .evt12 .columns {width:720px; margin:50px auto 0;
            column-count: 2;
            column-gap:10px;
        }
        .evt12 .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:10px; color:#888; background:#fff;
            width:100%;
        }
        .evt12 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px; color:#ee181d}
        .evt12 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evt12 .columns div strong {font-size:bold; color:#333}

        .evt13 {background:#f6f6f6;}

        .evt14 {background:#f6f6f6;}

        .evt15 {background:#ee181d; padding-bottom:120px}
        .evt15 ul {width:720px; margin:0 auto;}
        .evt15 li a {display:block; font-size:24px; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px}
        .evt15 li a:hover {background:#fff; color:#000;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .evt15 li span {display:block; font-size:28px}
        .evt15 li:last-child a{margin-left:10px}
        .evt15 ul:after {content:""; display:block; clear:both}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto}

        .evtCurri {width:720px; margin:50px auto 100px; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#232323; letter-spacing:-1px}
        .evtCurri li.cTitle {color:#ee181d; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10;
        }

        .evtFooter {width:720px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666; background:#fff !important}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; }

        .evtReply { width:940px; margin:0 auto; position:relative}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#tab01"><img src="https://static.willbes.net/public/images/promotion/2020/07/1711_sky01.png" alt="신청하기"></a>
            <a href="#evt11Sec"><img src="https://static.willbes.net/public/images/promotion/2020/07/1710_sky02.png" alt="맛보기"></a>
        </div>                  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_top.jpg" alt="이승기 PD" >             
        </div>

        <div class="evtCtnsBox evtTop_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_01.jpg" alt="" >             
        </div>

        <div class="evtCtnsBox">
            <div class="evtMenu">
                <ul class="tabs">
                    <li><a href="#tab01" data-tab="tab01" class="top-tab">수강신청</a></li>
                    <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                    <li><a href="#tab03" data-tab="tab03" class="top-tab">커리큘럼 안내</a></li>
                    <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
                </ul>
            </div>  
        </div>  

        <div id="tab01">
            <div class="evtCtnsBox evt01">
                <div class="dday NSK-Thin"><img src="https://static.willbes.net/public/images/promotion/2020/07/1711_img01.png" alt="시계" >
                    <strong class="NSK-Black"><span id="ddayCountText"></span> 남았습니다.</strong>
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_02.jpg">
                <div class="btnbuy NSK-Black">
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">[온라인강의] 신청하기 ></a>
                </div>
                <div id="pass" class="infoCheck">
                    <input type="checkbox" name="y_pkg" value="168098" style="display: none;" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="#infoText">이용안내 확인하기 ↓</a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt02">
                <iframe src="https://www.youtube.com/embed/NZLPO-a3JxY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="mt80 mb100">
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_03.png" alt="생활리뷰 싹PD" >
                </div>                
            </div>
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_04.jpg" alt="인플루언서" >             
            </div>  
            <div class="evtCtnsBox evt04">
                <iframe src="https://www.youtube.com/embed/1zxi4wiYXk4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_05.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_06.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_07.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt07">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_08.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt08">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_09.png" alt=" " >
            </div>
            <div class="evtCtnsBox evt09">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_10.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt10">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_11.jpg" alt=" " >
            </div>
        </div>       


        <div id="tab03">
            <div class="evtCtnsBox evt11" id="evt11Sec">
                <div class="copy">
                    <h5 class="NSK-Black">
                        <div>지속가능한 유튜브 채널만들기 :</div>
                        <div>기획부터 실행까지 한 방에</div>
                    </h5>
                    <div class="evt07Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
                </div>

                <ul class="sample">
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @php $i = 1; @endphp
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)                            
                            <li>
                                <p>{{$i}}강 맛보기 수강 ▼</p>                                
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');" class="btnst02">HIGH ></a>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','SD');" class="btnst03">LOW ></a>
                            </li>
                            @php $i += 1; @endphp
                        @endforeach
                    @else
                        <li><a href="#none">1강 맛보기 준비중 ></a></li>
                        <li><a href="#none">2강 맛보기 준비중 ></a></li>
                    @endif
                </ul> 

                <div class="evt07Txt02">
                    * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                </div>

                <div class="evtCurri">
                    <ul>
                        <li class="cTitle">챕터1 </li>
                        <li>1강. 유튜브 저도 할 수 있을까요?</li>
                        <li>2강. 싹피디가 알려주는 유튜브 A to Z 어떤 과정으로 배우게 될까요?</li>
                        <li class="cTitle">챕터2. 유튜브 채널 내가 잘할 수 있는 것부터 시작하자!</li>
                        <li>3강. 어떤 채널을 만들어야 할까? 싹피디와 함께 하는 유튜브 채널 처음부터 만들기</li>
                        <li>4강. 채널을 대표하는 멋진 대문 만들기. 채널아트, 프로필 사진 제작하기</li>
                        <li>5강. 어떤 콘텐츠를 만들어 인기가 있을까? 콘텐츠 기획하기</li>
                        <li class="cTitle">챕터3. 콘텐츠의 성공은 영상촬영부터 시작한다.</li>
                        <li>6강. 종류가 너무 다양해서 고르지 못하겠어요! 카메라와 촬영 장비 선택하기</li>
                        <li>7강. 빨간거 누르면 녹화되는거 아닌가요? 유튜브에서 쉽게 사용할 수 있는 기본 촬영법</li>
                        <li>8강. 앵글만 바꿨는데 영상이 고급스러워진다고!? 다양한 앵글의 필요성</li>
                        <li>9강. 카메라빨보다는 조명빨! 배우들이 조명감독과 친한 이유는 따로 있다</li>
                        <li>10강. 집에 있는 스탠드와 스마트폰으로도 조명효과를 낼 수 있다</li>
                        <li>11강. 삼각대를 이용하여 카메라 감독처럼 멋진 카메라 무빙을 만들어보자</li>
                        <li>12강. 조그만 녀석이 성능은 괴물! 액션캠으로 생동감 넘치는 영상 만들기</li>
                        <li>13강. 카메라 앞에서 말이 잘 안 나오고 떨려요! 두려움 극복하기</li>
                        <li>14강. 녹화한 파일, 어떻게 정리하면 좋을까요?</li>
                        <li class="cTitle">챕터4. 생각보다 쉬운 영상 편집! 따라하다 보니 나도 마스터!?</li>
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
                        <li class="cTitle">챕터5. 썸네일만 잘만들어도 유튜브 90프로는 성공</li>
                        <li>28강. 유튜브에 나오는 사진, 썸네일의 중요성</li>
                        <li>29강. 대충 캡쳐해서 글자만 넣으면 썸네일이라고요?</li>
                        <li>30강. 파워포인트와 포토샵으로 만드는 효과만점 썸네일 제작</li>
                        <li class="cTitle">챕터6. </li>
                        <li>31강. 팬들의 귀를 호강시키는 내래이션 음성 녹음하기</li>
                        <li class="cTitle">챕터7. </li>
                        <li>32강. 영상을 한층 고급스럽게 만드는 인서트 기법 활용하기</li>
                        <li class="cTitle">챕터8. 영상제작만큼 신경써야 하는 유튜브 영상 올리기</li>
                        <li>33강. 자녀 이름 짓듯 신중해야 하는 제목과 썸네일</li>
                        <li>34강. 콘텐츠를 대표하는 단어로 태그작성하기</li>
                        <li>35강. 더보기(내용)란에는 어떤 말을 써야 하나</li>
                        <li>36강. 구독자 1000명과 시청시간 4000시간 이후의 수익창출 및 수익설정방법</li>
                        <li>37강. 시어머니도 모르는 유튜브 알고리즘과 키워드의 비밀</li>
                        <li class="cTitle">챕터9.  오랫동안 내 영상을 봐줘! 시청지속시간이란?</li>
                        <li>38강. 어떻게 해야 시청자가 내 영상을 더 오랫동안 볼까?</li>
                        <li>39강. 유튜브 영상, 초반 15초에 집중해라!</li>
                        <li class="cTitle">챕터10. 수능공부하듯 내 채널 분석하기</li>
                        <li>40강. 유튜브 성적표 확인! 유튜브 스튜디오 각종 지표 확인하는 방법</li>
                        <li>41강. 어떤 숫자에 집중해야 할까? 분석하는 자에게 구독과 좋아요가 따른다</li>
                        <li class="cTitle">챕터11. </li>
                        <li>42강. 만사가 귀찮고 의욕이 안생겨요. 중요한 멘탈관리 및 슬럼프 극복</li>
                        <li class="cTitle">챕터12. 유튜버로 N잡하기! </li>
                        <li>43강. 리뷰유튜버가 말하는 리뷰 유튜버로 돈버는 방법</li>
                        <li>44강. 유튜브 광고를 받았어요! 유튜브 광고, 어떤 식으로 진행하면 될까요?</li>
                        <li>45강. 블로그, 인스타그램과 연계해서 수익창출 파이프라인 늘리기</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt12">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_09.png" alt="BEST 수강후기" >
                <div class="columns">
                    <div>
                        <p>귀촌30년차산골전***</p>
                        싹피디님 늦은 나이 70에 유튜브를 시작하여 버벅거리기만 합니다. 
                        모처럼 귀에 쏙쏙 들어 옵니다만 따라하기에는 힘들겠지만 꾸준히 노력 밖에 없겠지요? 용기를 주세요
                    </div>  
                    <div>
                        <p>홍밍*</p>
                        싹피디님 설명부분에서 저도 구독 누릅니다
                    </div> 
                    <div>
                        <p>수다방**</p>
                        60대초보입니다. 막상 시작하니, 모든걸 해내야 하는거라서 벅차긴해요. 1번부터 30번까지. 
                        수능처럼 공부하셔서, (썸네일글자색.. 마이크정보. 편집에 도움되는 채널소개.저작권정보..) 등등.. 
                        모두 저에게 필요 한 것들만 쏙쏙.. 귀한 유튜브 공부 했어요...영상보다보니 선한 영향력에 힘이 나네요. 감사합니다!
                    </div>  
                    <div>
                        <p>시그*</p>
                        이제 시작한 초보 유튜버인데 이거보고 열심히 따라해볼게요!!!! 좋은정보 감사합니다ㅎㅎㅎ
                    </div> 
                    <div>
                        <p>따해**</p>
                        발음 정말 또박또박하시고 귀에 쏙쏙 박히는 설명..유튜브 스타강사삘.. 초보유튜버라 힘들지만ㅠㅠ 잘해보겠습니닷 영상 감사드려요. 🙌🏻
                    </div>
                    <div>
                        <p>귀촌30년차산골전**</p>
                        나이 70에 유튜브 하다 보니 자꾸 잊고 이해가 더딥니다 벌써 5번째 듣고 배우고 있습니다 많이 배울께요
                    </div>
                    <div>
                        <p>미산 명리 **</p>
                        유익한 말씀 진심으로 고맙습니다. 이제 막 시작한 저에게는 가뭄에 단비와 같습니다.
                    </div>
                    <div>
                        <p>한수**</p>
                        이렇게 긴 영상과 엄청난 시청자가 있었음에도 싫어요가 단 한개도 없음에 한번 크게 놀라고 이 긴 영상을 다 보게 하는 엄청난 힘의 콘텐츠임에 놀라고 갑니당. 
                        한마디로 짱입니다. 여기저기 링크 걸어 보내게되네요.
                    </div>
                    <div>
                        <p>MJ Y**</p>
                        말씀 한마디 한마디가 정말 많이 와닿네요!!! 너무 좋은 공부하고 갑니다!!! 구독 좋아요 누르고 갑니다..정말 꾸준히, 열심히 해보도록 다시 다짐하고 가네요.. 
                        진짜 소통하고 시청하고 감동받고.. 가르침 감사합니다. 자주 보러올께요!!! 감사합니다!!!
                    </div>
                    <div>
                        <p>김영*</p>
                        유튜브를 시작해본지가 얼마 안됩니다. 오늘 유튜버님의 강의를 잘보았습니다. 30가지 지표를 항상 익히고 반성하겠습니다. 감사합니다
                    </div>
                    <div>
                        <p>위드**</p>
                        얼마전에 시작하고 어떤주제로 하지!? 어떻게 해야하지 고민도 되고 생각도 많이 했는데 기술도 많이 없어서 좌절도 몇번 했던 1인이예요 ㅠㅠ 보고 열공해볼께요^^ 
                        이런 좋은 영상 너무 감사합니다~~^.^ 하면된다 홧팅>.<
                    </div>
                    <div>
                        <p>감성근**</p>
                        싹피디님 안녕하세요^^** 처음에 "50분 가까이 언제 보나...했는데... 정말 짧은 영상처럼 느꼈답니다^^ 저는 나이가 많아서 너무 늦었다고 생각 했는데... 
                        다시 한번 용기를 얻습니다^^** 나중에 제가 유튜버로 성공하면 아마도 싹피디님이 가장 기억이 날 듯 합니다...^^ 
                        처음으로 자세하게 그리고 용기까지 심어 주셨네요^^** 너무 감사를 드리고... 
                        열심히 활동 하렵니다^^** 싹피디님도 응원해 주세요^^** 저두 늘~~ 응원 하겠습니다^^** 감사합니다^*** 꾸벅 ^^ ^^@@^^
                    </div>
                    <div>
                        <p>이지캠**</p>
                        이제 시작해서 2편 올린 새싹 유튜버입니다. 구독자가 올라가질 않아서 계속 우울했거든요. 
                        싹피디님의 말씀을 듣고 자신감을 갖고 힘내어 시작하겠습니다~ 정말 감사감사해요~^^
                    </div>
                    <div>
                        <p>비갠후**</p>
                        와~ 진심과 지식이 대단하게 느껴집니다. 쉽게 잘 설명하시네요...제가 계속 영상을 끝까지 본것은 거의 없고 댓글도 안 다는데 고개 숙여 감사드립니다.  
                        대단하십니다.
                    </div>
                    <div>
                        <p>내튜**</p>
                        이제 막 관심을 갖고 보고 있는데 50분 짜리 영상을 다 보기는 처음인 것 같습니다. 아주 유익한 정보를 잘 정리하셨네요. 감사합니다.
                    </div>
                    <div>
                        <p>쌤어**</p>
                        이렇게 긴 영상도 꼭 봐야하는 영상 이니까 다 보게 되군요. 시청자가 관심 있고 그들에게 도움이되는 영상을 만드는게 중요하네요. 하나를 만들어도 제대로 만들어야겠습니다. 
                        다른 영상도 제대로 듣겠습니다. 좋은 영상 만들어 주셔서 감사합니다.
                    </div>
                    <div>
                        <p>용가리**</p>
                        싹피디님 30가지의 유튜버 되는법 너무 유익하게 잘 봤습니다. 용기도 많이 생겼고 많이 배웠습니다. 두 번 시청했습니다. 감사합니다.
                    </div>
                </div>  

                @if(empty($data['ProdCode']) === false)
                    <div class="evtReply">
                        <div class="willbes-Reply p_re c_both"><a id="Reply" name="Reply" class="sticky-top"></a></div>
                        @include('willbes.pc.site.lecture.iframe_reply_partial')
                        <div class="TopBtn">
                            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="evtCtnsBox evt14">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_12.jpg" alt="" >
            </div>

            <div class="evtCtnsBox evt15">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1711_13.jpg" alt="" >
                <ul>
                    <li>
                        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
                            <span class="NSK-Black">지금, N잡강의  신청하고</span>
                            부수입 만들기 도전! → 
                        </a>
                    </li>
                </ul>
            </div>	
        </div>

        <div class="evtFooter" id="infoText">
            <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

            <p># 수강안내</p>
            <ul>
                <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다. (내강의실 > '수강 중 강좌'에서 확인 가능)</li>
                <li>PC/휴대폰/태블릿에서 언제든 수강가능합니다.</li>
                <li>커리큘럼은 사정에 따라 일부 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.</li>
                <li>동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.</li>
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
                <li>수강상품 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                <li>결제 완료 시 강의는 즉시 수강 시작되오니, 이 점 참고 부탁 드립니다.</li>
                <li>강의 학습 Q&A에 질문하기는 자유롭게 등록 가능하오나 질문에 대한 답변은 
                    개별 답변이 아닌 질문유형별 FAQ 형식으로 제공될 예정이오니 이용시 양해 및 참조 부탁드립니다.
                </li>
            </ul>

            <div>※ 이용문의 : 고객만족센터 1544-5006</div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">  
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

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDownText('{{$arr_promotion_params['edate']}}');
        });
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