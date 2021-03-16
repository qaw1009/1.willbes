@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skybanner {
            position:fixed;
            top:100px;
            right:10px;
            z-index:1;
            width:152px;
            text-align:left;
        }
        .skybanner a {display:block; margin-bottom:5px;}
        .skybanner a:last-child {text-align:center}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/07/1710_top_bg.jpg) no-repeat center top}
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

        .evt01 .dday span {color:#3a99f0; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}
        .evt01 .btnbuy {width:720px; margin:50px auto 0}
        .evt01 .btnbuy a {border-radius:50px; display:block; font-size:40px; background:#000; color:#fff; padding:20px 0;}
        .evt01 .btnbuy a:hover {background:#3a99f0;}

        .infoCheck {font-size:14px; max-width:720px; margin:30px auto 0}
        .infoCheck label {margin-right:30px; cursor: pointer;}
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#0099ff;}

        .evt02 {padding-top:100px}
        .evt02 .evt02Txt01 {font-size:26px; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#3a99f0}
        .evt02 .evt02Txt01 span {font-size:38px; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1); color:#000}

        .evt03 {background:#f6f6f6; padding:0;}    

        .evt05 {background:#ececec;}       

        .evt06 {background:#f6f6f6; padding-bottom:120px}
        .evt06 div {color:#2a92ed; font-size:30px; font-weight:600; margin-top:20px}

        .evt07 { padding:120px 0 0; text-align:left;}
        .evt07 .copy {width:720px; margin:0 auto;}
        .evt07 h5 {color:#2a92ed; font-size:50px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evt07 .evt07Txt01 {font-size:28px; margin:20px auto 80px}
        .evt07 .sample {width:720px; margin:0 auto}
        .evt07 .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#2a92ed; color:#fff; font-size:20px; font-weight:600; text-align:center}
        .evt07 .sample li p {margin-bottom:15px;}
        .evt07 .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:4px}
        .evt07 .sample li a.btnst01 {border:1px solid #ccc;}
        .evt07 .sample li a.btnst02 {border:1px solid #000; color:#fff; background:#333}
        .evt07 .sample li a.btnst03 {border:1px solid #ccc; color:#000; background:#ccc}
        .evt07 .sample li a:hover {background:#000; color:#fff}
        .evt07 .sample li:last-child {margin:0}
        .evt07 .sample:after {content:""; display:block; clear:both}
        .evt07 .evt07Txt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}  
        
        .evt08 {background:#ececec; padding:120px 0}
        .evt08 .columns {width:720px; margin:50px auto 0;
            column-count: 2;
            column-gap:10px;
        }
        .evt08 .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:10px; color:#888; background:#fff;
            width:100%;
        }
        .evt08 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px; color:#2a92ed}
        .evt08 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evt08 .columns div strong {font-size:bold; color:#333}

        .evt09 {background:#2a92ed; padding-bottom:120px}
        .evt09 ul {width:720px; margin:0 auto;}
        .evt09 li a {display:block; font-size:24px; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px}
        .evt09 li a:hover {background:#fff; color:#000;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .evt09 li span {display:block; font-size:28px}
        .evt09 li:last-child a{margin-left:10px}
        .evt09 ul:after {content:""; display:block; clear:both}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto}

        .evtCurri {width:720px; margin:50px auto 100px; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#232323; letter-spacing:-1px}
        .evtCurri li.cTitle {color:#2a92ed; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

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

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >            
            <a href="#tab01"><img src="https://static.willbes.net/public/images/promotion/2020/07/1710_sky01.png" alt="신청하기"></a>
            <a href="https://njob.willbes.net/book/index/cate/3114?cate_code=3114&subject_idx=1952&prof_idx=51032" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/07/1710_sky03.png" alt="교재구매하기"></a>
            <a href="#evt07Sec"><img src="https://static.willbes.net/public/images/promotion/2020/07/1710_sky02.png" alt="맛보기"></a>                            
        </div>                  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_top.jpg" alt="이시한 교수" >             
        </div>

        <div class="evtCtnsBox evtTop_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_01.jpg" alt="이시한 교수" >             
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
                {{--
                <div class="dday NSK-Thin"><img src="https://static.willbes.net/public/images/promotion/2020/07/1710_img01.png" alt="시계" >
                    <strong class="NSK-Black"><span id="ddayCountText"></span> 남았습니다.</strong>
                </div>
                --}}
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1710_02.jpg">
                <div class="btnbuy NSK-Black">
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">[온라인강의] 신청하기 ></a>
                </div>
                <div id="pass" class="infoCheck">
                    <input type="checkbox" name="y_pkg" value="168088" style="display: none;" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="#infoText">이용안내 확인하기 ↓</a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt02">
                <iframe src="https://www.youtube.com/embed/OzRyEe5Vops?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="mt80 mb100">
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_03.png" alt="2시한의 읽은척 책방" >
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_04.jpg" alt="인플루언서" >
            </div>
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_05.jpg" alt=" " >              
            </div>  
            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_06.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_07.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_08.jpg" alt=" " ><br>
                <iframe src="https://www.youtube.com/embed/zF21fLMGoJY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="NSK-Black">#유튜브, 지금 시작하시나요?</div>
            </div>
        </div>       


        <div id="tab03">
            <div class="evtCtnsBox evt07" id="evt07Sec">
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
                        <li class="cTitle">1부 : 유튜브 목적</li>
                        <li>1강 : 유튜브 지금 시작하시나요?</li>
                        <li>2강 : 도대체 당신이 유튜브를 하려는 이유는?</li>
                        <li>3강 : 유튜브를 하려는 8가지 목적과 각각의 핵심 포인트 Part 1</li>
                        <li>4강 : 유튜브를 하려는 8가지 목적과 각각의 핵심 포인트 Part 2</li>
                        <li>5강 : 유튜브 목적이 채널 운영에 미치는 영향</li>
                        <li class="cTitle">2부 : 유튜브 최신 트렌드 </li>
                        <li>6강 : 유튜브 2세대가 시작된 해는 과연 언제일까?</li>
                        <li>7강 : 1세대 유튜버와 2세대 유튜버의 세대 차이 </li>
                        <li>8강 : 요즘 잘 나가는 채널 분석 </li>
                        <li>9강 : 유튜브 7가지 최신 트렌드</li>
                        <li>10강 : 2세대 유튜버의 2가지 핵심은</li>
                        <li class="cTitle">3부 : 유튜브 기획</li>
                        <li>11강 : 채널 기획 전 반드시 체크해야 할 스스로에 대한 5대 점검사항</li>
                        <li>12강 : 지속가능하기 위한 콘텐츠의 5가지 조건</li> 
                        <li>13강 : 콘텐츠의 뼈대가 되는 두 가지 기둥</li>
                        <li>14강 : 콘텐츠에 매력을 더하는 두 가지 양념</li>
                        <li>15강 : 구독자가 느끼는 매력은 어디서 나오는가?</li>
                        <li>16강 : 차마 대놓고 물어보지 못하는 질문들</li>
                        <li>17강 : 채널의 내용결정</li>
                        <li>18강 : 채널의 형식결정 </li>
                        <li>19강 : 채널의 등장인물 결정 </li>
                        <li>20강 : 사소한 것 같지만 결코 사소하지 않은 것들 결정하기</li>
                        <li class="cTitle">4부 : 유튜브 운영</li>
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
                        <li class="cTitle">5부 : 유튜브 실행</li>
                        <li>31강 : 콘텐츠 업로드 하기</li>
                        <li>32강 : 유튜브 분석툴 활용하기 </li>
                        <li>33강 : 구독자를 늘리는 방법</li>
                        <li>34강 : 악플 대응 방법 </li>
                        <li>35강 : 콜라보와 콘텐츠 벤치마킹</li>
                        <li>36강 : 유튜브 홍보를 보완해주는 도구들</li> 
                        <li>37강 : 저작권 문제는 어떻게 되나?</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt08">
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

            <div class="evtCtnsBox evt09">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_10.jpg" alt="" >
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