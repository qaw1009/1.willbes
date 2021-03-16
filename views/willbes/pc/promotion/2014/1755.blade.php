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
        .skybanner a {display:block; margin-bottom:5px; text-align:center}

        .evtTop {background:#1e262f}
        .evtTop_01 {background:url(https://static.willbes.net/public/images/promotion/2020/08/1755_01_bg.jpg) no-repeat center top}

        .evtMenu {background:#fff; height:80px; width:100%; border-bottom:1px solid #edeff0}

        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}

        .evt01 {background:#fff; padding:100px 0}
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
        .evt01 .btnbuy a:hover {background:#744416;}

        .infoCheck {font-size:14px; max-width:720px; margin:30px auto 0}
        .infoCheck label {margin-right:30px; cursor: pointer; font-weight:bold; }
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#744416;}

        .evt02 {padding-top:100px; background:#f4f4f4}

        .evt03 {background:#a0774e;}    

        .evt05 {background:#f4f4f4;}       

        .evt06 {background:#726151;}

        .evt07 {background:#29304a;}

        .evt08 {background:#29404a;}

        .evt09 {background:#f4f4f4;}

        .evt10 {background:#1f262f;}

        .evt11 {background:#a0774e;}

        .evt12 { padding:120px 0 0; text-align:left;}
        .evt12 .copy {width:720px; margin:0 auto;}
        .evt12 h5 {color:#744416; font-size:50px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evt12 .evt12Txt01 {font-size:28px; margin:20px auto 80px}
        .evt12 .sample {width:720px; margin:0 auto}
        .evt12 .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#acacac; color:#fff; font-size:20px; font-weight:600; text-align:center}
        .evt12 .sample li p {margin-bottom:15px;}
        .evt12 .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:8px; background:#000; color:#fff;}
        .evt12 .sample li a:hover {background:#fff; color:#000}
        .evt12 .sample li:last-child {margin:0}
        .evt12 .sample:after {content:""; display:block; clear:both}
        .evt12 .sample:after {content:""; display:block; clear:both}
        .evt12 .evt12Txt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}  
        
        .evt13 {background:#f5f5f5; padding-bottom:100px}
        .evt13 .columns {width:720px; margin:50px auto 0;
            column-count: 2;
            column-gap:10px;
        }
        .evt13 .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:10px; color:#888; background:#fff;
            width:100%;
        }
        .evt13 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px; color:#744416}
        .evt13 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evt13 .columns div strong {font-size:bold; color:#333}

        .evt14 {background:#744416; padding-bottom:120px}
        .evt14 ul {width:720px; margin:0 auto;}
        .evt14 li a {display:block; font-size:24px; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px}
        .evt14 li a:hover {background:#fff; color:#000;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .evt14 li span {display:block; font-size:28px}
        .evt14 li:last-child a{margin-left:10px}
        .evt14 ul:after {content:""; display:block; clear:both}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto}

        .evtCurri {width:720px; margin:50px auto 100px; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#232323; letter-spacing:-1px; line-height:1.2}
        .evtCurri li.cTitle {color:#744416; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

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
            <a href="#tab01"><img src="https://static.willbes.net/public/images/promotion/2020/08/1755_sky01.png" alt="신청하기"></a>
            <a href="https://njob.willbes.net/book/index/cate/3114?cate_code=3114&subject_idx=1971&prof_idx=51060" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/08/1755_sky02.png" alt="교재구매하기"></a>
            <a href="#evt12Sec"><img src="https://static.willbes.net/public/images/promotion/2020/08/1755_sky03.png" alt="맛보기"></a>                            
        </div>                  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_top.jpg" alt="양원근 대표" >             
        </div>

        <div class="evtCtnsBox evtTop_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_01.jpg" alt="양원근 대표" >             
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
                <div class="dday NSK-Thin"><img src="https://static.willbes.net/public/images/promotion/2020/08/1755_img01.png" alt="시계" >
                    <strong class="NSK-Black"><span id="ddayCountText"></span> 남았습니다.</strong>
                </div>
                --}}
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1755_02.jpg">
                <div class="btnbuy NSK-Black">
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">[온라인강의] 신청하기 ></a>
                </div>
                <div id="pass" class="infoCheck">
                    <input type="checkbox" name="y_pkg" value="169144" style="display: none;" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="#infoText">이용안내 확인하기 ↓</a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt02">
                <iframe src="https://www.youtube.com/embed/AhPAFng06cA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_03.jpg" alt="2시한의 읽은척 책방" >
                </div>                
            </div>
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_04.jpg" alt="인플루언서" >            
            </div>  
            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_05.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_06.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_07.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt07">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_08.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt08">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_09.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt09">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_10.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt10">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_11.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt11">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_12.jpg" alt=" " >
            </div>
        </div>       


        <div id="tab03">
            <div class="evtCtnsBox evt12" id="evt12Sec">
                <div class="copy">
                    <h5 class="NSK-Black">
                        <div>책쓰기가 이렇게 쉬울줄이야!</div>
                    </h5>
                    <div class="evt12Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
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

                <div class="evt12Txt02">
                    * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                </div>

                <div class="evtCurri">
                    <ul>
                        <li class="cTitle">CHAPTER 1</li>
                        <li>1강 책은 성공한 사람이 아닌, 성공을 꿈꾸는 사람이 쓰는 것이다<br>
                        - 왜 책을 쓰려고 하는가? 책은 어떤 사람이 쓰는가?</li>
                        <li>2강 나같이 평범한 사람도 책을 쓸 수 있을까? - 사례 1</li>
                        <li>3강 나같이 평범한 사람도 책을 쓸 수 있을까? - 사례 2</li>
                        <li>4강 나같이 평범한 사람도 책을 쓸 수 있을까? - 사례 3</li>

                        <li class="cTitle">CHAPTER 2</li>
                        <li>5강 이런 책들은 누가, 그리고 어떤 사람이 쓸까요? - 사례 1<br>
                        - 전문가가 아니어도 책은 쓸 수 있다</li>
                        <li>6강 이런 책들은 누가, 그리고 어떤 사람이 쓸까요? - 사례 2<br>
                        - 우리의 상식으로는 도저히 납득할 수 없는 상식을 뒤집는 책</li>
                        <li>7강 이런 책들은 누가, 그리고 어떤 사람이 쓸까요? - 사례 3<br>
                        - 유대인의 생각하는 힘<br>
                        - 스피치의 매력에 빠지다<br>
                        - 한권으로 정리하는 4차 산업혁명<br>
                        - 나는 스타벅스보다 작은 카페가 좋다<br>
                        - 톡!톡!톡! 생각을 디자인하라<br>
                        - 내 아이를 위한 칼 비테 교육법<br>
                        - 공부머리 독서법</li>

                        <li class="cTitle">CHAPTER 3</li>
                        <li>8강 나만의 콘셉트를 잡기 / "나"는 누구인가? 사례 1<br>
                        - 대기업 교육 담당 경험으로 커뮤니케이션 코칭<br>
                        - 독서를 통해 쌓은 지식을 토대로 속독법이나 독서법 코칭</li>
                        <li>9강 "나"는 누구인가? 사례 2<br>
                        - 꽃을 매개로 바쁘고 지친 사람들의 마음에 힐링을 주는 에세이<br>
                        - 누구나 쉽게 갈 수 있는 세계여행<br>
                        - 왜 실패했는지에 대한 경험을 토대로 비즈니스 성공학<br>
                        - 작은 회사 200% 매출 올리는 노하우 비법<br>
                        - 스마트스토어 마케팅<br>
                        - 미래4차 산업을 어떻게 대처할 것인가?<br>
                        - 학교를 떠나 성공한 자들의 비결</li>

                        <li class="cTitle">CHAPTER 4</li>
                        <li>10강 기획부터 출간까지, 책쓰기에 필요한 9가지<br>
                        - 책은 어떻게 쓰는가?<br>
                        - 책은 어떻게 만들어지는가?<br>
                        - 13가지 출판의 흐름 분석하기</li>

                        <li class="cTitle">CHAPTER 5</li>
                        <li>11강 베스트셀러는 어떻게 만들어지는가?<br>
                        - 베스트셀러가 되는 5가지 요소</li>

                        <li class="cTitle">CHAPTER 6</li>
                        <li>12강 책은 제목이 팔 할이다 - 좋은 제목 사례 1</li>
                        <li>13강 책은 제목이 팔 할이다 - 좋은 제목 사례 2</li>
                        <li>14강 책은 제목이 팔 할이다 - 제목 실패 사례</li>

                        <li class="cTitle">CHAPTER 7</li>
                        <li>15강 제목의 짝꿍인 카피, "나도 너만큼 중요해" - 카피의 중요성 1</li>
                        <li>16강 제목의 짝꿍인 카피, "나도 너만큼 중요해" - 카피의 중요성 2</li>

                        <li class="cTitle">CHAPTER 8</li>
                        <li>17강 제목을 200% 상승시켜주는 표지 정하기</li>
                        <li>18강 책 제목의 중요성<br>
                        - 제목 깎아 먹는 표지 사례<br>
                        - 내가 만약 표지를 선택한다면?<br>
                        - 제목을 200% 상승시켜주는 표지<br>
                        - 제목 깎아 먹는 제목<br>
                        - 표지를 200% 상승시켜주는 제목</li>

                        <li class="cTitle">CHAPTER 9</li>
                        <li>19강 제목은 모든 문장의 첫 번째 줄이다!</li>
                        <li>20강 가장 이상적인 제목의 글자 수는?</li>
                        <li>21강 출판사 계약을 성공시킨 작은 성공체험</li>

                        <li class="cTitle">CHAPTER 10</li>
                        <li>22강 독자의 시선을 사로잡는 제목 만들기<br>
                        - 제목은 모든 문장의 첫 번째 줄이다<br>
                        - 마음을 담은 제목 한 줄이 상대의 욕구를 자극한다<br>
                        - 출판사에 계약을 성사시킨 작은 성공체험</li>
                        <li>23강 제목 만들기 실전 연습 1</li>
                        <li>24강 제목 만들기 실전 연습 2</li>

                        <li class="cTitle">CHAPTER 11</li>
                        <li>25강 '대박' 제목 만들기 6가지 법칙 1<br>
                        - 무엇이 이익인지 확실하게 알려주어야 한다<br>
                        - 지금이 기회라는 강조와 중요한 일임을 인식시켜야한다<br>
                        - 내용이 궁금해서 참을 수 없게 만든다.<br>
                        - ‘왜?’라는 의문이 들게 해야 한다 </li>
                        <li>26강 '대박' 제목 만들기 6가지 법칙 2<br>
                        - ‘설마, 그게 가능해?’하는 흥미를 유발시켜야 한다. <br>
                        - ‘왜 읽어야 하는가?’ 읽어야할 이유를 확실하게 알려야 한다.<br>
                        - 독자의 마음을 위로하고 대변해주는 표현을 한다.</li>
                        <li>27강 제목을 지을때 꼭 알아야 할 금기 사항</li>

                        <li class="cTitle">CHAPTER 12</li>
                        <li>28강 목차 만들기 실전 연습 1</li>
                        <li>29강 목차 만들기 실전 연습 2</li>
                        <li>30강 목차 만들기 실전 연습 3</li>

                        <li class="cTitle">CHAPTER 13</li>
                        <li>31강 책을 쓰려면 어떤 것 부터 준비해야 하나요?<br>
                        - 나만의 콘셉 잡기<br>
                        - 나의 언어로 고쳐쓰기<br>
                        - 진짜 나의 이야기로 표현하는 전문적인 책쓰기<br>
                        <li>32강 책쓰기, 어떻게 해야 하나요? 실전 연습 1</li>
                        <li>33강 책쓰기, 어떻게 해야 하나요? 실전 연습 2</li>

                        <li class="cTitle">CHAPTER 14</li>
                        <li>34강 출판권 설정 계약은 어떻게 해야 하나요<br>
                        - 출판권 및 전송 이용권의 유효기간과 갱신 및 재고도서의 배포 <br>
                        - 비용의 부담<br>
                        - 출판에 따른 저작권 사용료  ‘인세’ 등</li>

                        <li class="cTitle">CHAPTER 15</li>
                        <li>35강 종강 : 당신의 삶이 책이 되는 양원근의 강의를 마치며</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt13">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1755_13.jpg" alt="BEST 수강후기" >
                <div class="columns">
                    <div>
                        <p>27기 수강생</p>
                        안개 속에서 헤매던 답답한 마음으로 수업에 참여 하였습니다.
                        한 주 한 주 시간이 지나면서 안개가 한 꺼풀 씩 벗겨지는 경험을 하게 되었습니다. 
                        수강생에게 성심 성의껏 가르쳐 주시고 피드백해주신 대표님께 감사를 드립니다. 
                    </div>  
                    <div>
                        <p>28기 수강생</p>
                        약점이라고 생각되는 부분을 객관적으로 잘 체크되었다고 생각합니다.
                        본인 스스로 넘어갔던 부분을 드러내어 보게 해주었던 수업 시간은 아프지만
                        끝나고 나니 그런 부분이 없었다면 아쉬웠을 듯 합니다.
                    </div>                     
                    <div>
                        <p>29기 수강생</p>
                        책쓰기 수업에 100% 만족합니다!
                        최고의 퀄리티는 말하지 않아도, 드러내지 않아도
                        누군가 깎아 내린다고 해도 절대로 깨지지 않는 다이아몬드 같은 단단함이
                        있음을 깨달은 시간 이였습니다. 선생님, 감사합니다!
                    </div> 
                    <div>
                        <p>24기 수강생</p>
                        책쓰기 강의를 통해 할 수 있다 라는 희망과 자신감을 얻게 되었고,
                        ‘나는 누구인가‘에 대한 고찰도 새롭게 할 수 있었으며,
                        그로 인해 나의 삶을 다시금 돌아볼 수 있는 시간도 가질 수 있었습니다.
                        대표라는 직함과 다르게 항상 정중하고 정답게 해주신 양대표님, 감사합니다.
                    </div>
                    <div>
                        <p>23기 수강생</p>
                        특별한 소재도 글솜씨도 없던 나. 쓰고는 싶은데, 정말 막연했다.
                        하지만 10주의 시간은 나의 꿈을 구체화 지켜주는 시간이었다.
                        무엇보다 주어지는 꼼꼼한 피드백과 수정을 통해, 그간 나도 몰랐던 내 글의 문제점을 알 수 있었다.
                    </div> 
                    <div>
                        <p>21기 수강생</p>
                        처음에는 친구의 권유로 시작하게 되었습니다.
                        책을 쓰겠다는 생각보다는 책쓰기를 배우고 싶다는 마음으로 시작했습니다. 책은 아무나 쓰나, 라고 생각했었거든요! 
                        책을 쓴다는 일이 그저 글을 쓰는 일이 아닌 나 자신을 한번 돌아보게 되는 아주 가치 있는 일인 것 같습니다.
                    </div> 
                    <div>
                        <p>18기 수강생</p>
                        가지고 있는 콘텐츠는 참 많이 있는데 쏟아내지 못하는 이유는
                        책이라는 매체로 써내려 가기엔 너무 많이 어설펐기 때문이었습니다.
                        이제는 책쓰기에 대해 전반적인 부분들을 잘 알게 되어 자신감이 생겼습니다.
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