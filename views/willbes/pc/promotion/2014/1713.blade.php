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
            bottom:20px;
            right:10px;
            z-index:1;
            width:152px;
            text-align:left;
        }
        .skybanner a {display:block; margin-bottom:5px;}
        .skybanner a:last-child {text-align:center}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/07/1713_top_bg.jpg) no-repeat center top}
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

        .evt01 .dday span {color:#01c73c; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}
        .evt01 .btnbuy {width:720px; margin:50px auto 0}
        .evt01 .btnbuy a {border-radius:50px; display:block; font-size:40px; background:#000; color:#fff; padding:20px 0;}
        .evt01 .btnbuy a:hover {background:#01c73c;}

        .infoCheck {font-size:14px; max-width:720px; margin:30px auto 0}
        .infoCheck label {margin-right:30px; cursor: pointer;}
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#01c73c;}

        .evt02 {padding-top:100px}
        .evt02 .evt02Txt01 {font-size:26px; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#01c73c}
        .evt02 .evt02Txt01 span {font-size:38px; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1); color:#000}

        .evt03 {background:#01c73c;}
        
        .evt04 {}     

        .evt05 {background:#f6f6f6;}       

        .evt06 {background:#fff;}

        .evt07 {background:#f6f6f6;}          
        
        .evt08 {background:#fff;}
        .evt09 {background:#f6f6f6;}
        .evt10 {background:#e7e7e7;}

        .evt11 {background:#fff; text-align:left; padding-top:120px}
        .evt11 .copy {width:720px; margin:0 auto;}
        .evt11 h5 {color:#01c73c; font-size:50px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evt11 .evt07Txt01 {font-size:28px; margin:20px auto 80px}
        .evt11 .sample {width:720px; margin:0 auto}
        .evt11 .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#01c73c; color:#fff; font-size:20px; font-weight:600; text-align:center}
        .evt11 .sample li p {margin-bottom:15px;}
        .evt11 .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:4px}
        .evt11 .sample li a.btnst01 {border:1px solid #ccc; padding:0 10px}
        .evt11 .sample li a.btnst02 {border:1px solid #000; color:#fff; background:#333; padding:0 10px}
        .evt11 .sample li a.btnst03 {border:1px solid #ccc; color:#000; background:#ccc; padding:0 10px}
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
        .evt12 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px; color:#01c73c}
        .evt12 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evt12 .columns div strong {font-size:bold; color:#333}

        .evt13 {background:#f6f6f6;}

        .evt14 {background:#01c73c; padding-bottom:120px}
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
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#232323; letter-spacing:-1px}
        .evtCurri li.cTitle {color:#01c73c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

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
            <a href="#tab01"><img src="https://static.willbes.net/public/images/promotion/2020/07/1713_sky01.png" alt="신청하기"></a>
            <a href="https://njob.willbes.net/book/index/cate/3114?cate_code=3114&subject_idx=1952&prof_idx=51029" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/07/1713_sky03.png" alt="교재구매하기"></a>
            <a href="#evt11Sec"><img src="https://static.willbes.net/public/images/promotion/2020/07/1710_sky02.png" alt="맛보기"></a>
        </div>                  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_top.jpg" alt="이기용 대표" >             
        </div>

        <div class="evtCtnsBox evtTop_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_01.jpg" alt="" >             
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
                <div class="dday NSK-Thin"><img src="https://static.willbes.net/public/images/promotion/2020/07/1713_img01.png" alt="시계" >
                    <strong class="NSK-Black"><span id="ddayCountText"></span> 남았습니다.</strong>
                </div>
                --}}
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1713_02.jpg">
                <div class="btnbuy NSK-Black">
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">[온라인강의] 신청하기 ></a>
                </div>
                <div id="pass" class="infoCheck">
                    <input type="checkbox" name="y_pkg" value="168102" style="display: none;" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="#infoText">이용안내 확인하기 ↓</a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt02">
                <iframe src="https://www.youtube.com/embed/tXL-6wWRTfI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_03.jpg" alt="생활리뷰 싹PD" >
                </div>                
            </div>
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_04.jpg" alt="인플루언서" >             
            </div>  
            <div class="evtCtnsBox evt04">                
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_05.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_06.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_07.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt07">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_08.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt08">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_09.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt09">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_10.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt10">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_11.jpg" alt=" " >
            </div>
        </div>       


        <div id="tab03">
            <div class="evtCtnsBox evt11" id="evt11Sec">
                <div class="copy">
                    <h5 class="NSK-Black">
                        <div>1,500개 정부 및 공기업 전문 강사 </div>
                        <div>이기용이 알려주는 전문 커리큘럼</div>
                    </h5>
                    <div class="evt07Txt01 NSK-Thin">우리가 배울 수 있는 과정은?<br>
                    수익 창출을 위한 네이버 블로그 마케팅 新전략</div>
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
                        <li class="cTitle">챕터 1</li>
                        <li>1. 프로 N잡러 되기, 블로그로 돈 벌어볼까?<br>
                        - 8년차 유명한 마케팅전문가, 처음엔 블로거였다?</li>
                        <li>2. 왜 유튜브가 아닌 네이버 블로그인가?<br>
                        유튜뷰가 대세인 이시대에 블로그로?</li>
                        <li>3. 블로그로 월 100만원정도는 더 벌어줘야지!<br>
                        - 블로그로 수익화하는 다양한 방법 알아보기</li>
                        <li class="cTitle">챕터 2</li>
                        <li>4. 우선 체험단으로 생활비 절약부터!<br>
                        - 블로그전문회사 CEO가 알려주는 체험단 선정되는법</li>
                        <li>5. 용돈벌이 시작해볼까? 블로그기자단 시작하기<br>
                        - 블로그전문회사 CEO가 알려주는 블로그 기자단 AtoZ</li>
                        <li>6. 네이버 애드포스트로 수익을 UP!!<br>
                        - 애드포스트를 통해 내 수익을 추가하기</li>
                        <li>7. 내 제품이나 서비스를 비용들이지 않고 홍보하기!<br>
                        - 나만의 블로그를 통해 매출을 올려보자!</li>
                        <li>8. 월 100만원? 일을 키워볼까?<br>
                        - 남의제품만 홍보하지말고, 내제품을 찾아볼까?</li>
                        <li>9. 블로그로 퍼스널브랜딩하기<br>
                        - 잘하는사람? 유명한사람? 나를 브랜딩해보기</li>
                        <li class="cTitle">챕터 3</li>
                        <li>10. 기본적으로 알아야할 블로그 셋팅하기<br>
                        - 블로그이름,프로필 구성하기</li>
                        <li>11. 내 블로그의 전문성을 보여주는 카테고리 셋팅하기<br>
                        - 블로그 카테고리 구성하기</li>
                        <li>12. 블로그의 첫인상 제대로 꾸미기<br>
                        - 프로필과 카테고리에 꼭 들어가야할 것들은?</li>
                        <li>13. 블로그 이웃 꼭 늘려야하나요?<br>
                        - 블로그 이웃이 요즘에도 필요할까?</li>
                        <li>14. 블로그 이웃 늘려보기!<br>
                        - 블로그 이웃을 신청하고 받아줘보자!</li>                
                        <li class="cTitle">챕터 4</li>
                        <li>15. 네이버 알고리즘? 상위노출?<br>
                        - 알고리즘이 뭐고 상위노출이 뭔가?</li>
                        <li>16. C-랭크 알고리즘이 뭐길래 말이 많지?<br>
                        - C-랭크 알고리즘 파헤치기</li>
                        <li>17. D.I.A는 또 뭐야? 한번 알아보기<br>
                        - D.I.A 파헤치기</li>
                        <li>18. 네이버 블로그 글쓰기 기능 한번 짚어볼까?<br>
                        - 이정도만 알아도 블로그 글쓰는정도야 뭐</li>
                        <li>19. 내글이 노출이 되기 위해서는?<br>
                        - 어떻게 써야 상위노출이 잘 될까?</li>
                        <li>20. 사람들이 반응 하는 콘텐츠 만들기1<br>
                        - 좋은 콘텐츠 만드는 방법은?</li>
                        <li>21. 사람들이 반응 하는 콘텐츠 만들기2<br>
                        - 사람들은 제목을 보고 클릭한다?</li>
                        <li>22. 사람들이 반응 하는 콘텐츠 만들기3<br>
                        - 빅데이터를 활용해서 반응하는 콘텐츠만들기</li>
                        <li class="cTitle">챕터 5</li>
                        <li>23. 키워드? 그게 뭐에요?<br>
                        - 키워드가 뭔지 제대로 이해하기</li>
                        <li>24. 키워드가 왜 중요한가!<br>
                        - 같은말이어도 검색하는 단어가 다르다?</li>
                        <li>25. 사람들이 찾는 키워드는?<br>
                        - 검색광고를 통해서 사람들이 찾는 키워드 확인하기</li>
                        <li>26. 실제로 매출이 나오는 키워드는?<br>
                        - 조회수만 높다고 좋은 키워드가 아니다?</li>
                        <li>27. 수업을 마치며</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt12">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1710_09.png" alt="BEST 수강후기" >
                <div class="columns">
                <div>
                    <p>민트*</p>
                    마케팅 전문가인 이기용 대표님 강의에서만 공개되었던 노하우, 정보들이 모두 기록되어있는 책입니다. 
                    블로그를 첨으로 시작하려고 계획하는 분들, 활용하여 마케팅에 도전하고 싶은 분들 모두에게 추천드리고 싶은 책입니다! 
                    대표님의 경력 사항만 봐도 헉 소리가 나는 분이였어요… 다음에는 꼭 강의도 참여해보고 싶었습니다!
                </div>  
                <div>
                    <p>토마토*</p>
                    예전에 사둔 책으로 미뤄왔던 블로그 마케팅 책을 보고 있습니다. 바로 이기용 대표님의 블로그 마케팅…! 
                    이름 그대로 어려운 용어 없이 누구나 쉽게 읽을 수 있는 책이었어요! 이기용 대표님은 마케팅 강의를 무려 1,500회 이상 진행하신 전문가세요! 
                    심지어 책도 술술 읽혀서 잘 읽고 있다고나 할까… 
                    블로그 초보자부터 중상급자를 위한 내용까지 모두 녹아있습니다!
                </div> 
                <div>
                    <p>이유갓*</p>
                    제목부터 이미 누구나 쉽게 따라 할 수 있다고 써있는 블로그 책 ㅋㅋㅋ초보자도 진짜 쉽게 할 수 있어요! 
                    그리고 이 책은 특히나 블로그에 대한게 자세한 것도 있지만 카테고리가 여유 있게 잡혀있어서 날짜에 맞춰서 따라해보기도 좋은거 같더라구요~? 
                    저자는 이기용 대표님이시고 개인적으로 블로그 마케팅 전문가로 활동하시면서 여기저기 강의도 엄청 많이 다니신다고 하더라구요!
                    거기다가 방송출연도 많아서 유명하신 분! 교수도 하시고 위원장도 하시는거보니 진짜 경력이 대단하신 거 같아요!
                </div>  
                <div>
                    <p>포*</p>
                    최근에 자기개발(?)겸사 블로그를 좀 더 진지하게 공부해보고자 관련하는 마케팅책을 여러개 읽어보고 있어요. 
                    그 외에 SNS마케팅과 블로그 마케팅 책으로 공부하면서 블로그 글을 써보고자 하는데요~! 
                    최근에 읽고 있는 블로그 마케팅 책 중에서 '누구나 쉽게 따라하는 블로그 마케팅'이란 책이 제가 봐온 관련 책 중에서 제일 이해하기 쉽기도 하고 
                    블로그를 막 이제 시작하는 분들이나 블로그를 저처럼 어중간하게 알고 계신 분들에게 확실히 어떻다 하는 정보를 알 수 있는 책이어서 추천을 하려구요!
                </div> 
                <div>
                    <p>욜*</p>
                    마케팅의 고수가 되고 싶으신 분들 주목하세요!  
                    '누구나 쉽게 따라하는 블로그 마케팅'이라는 블로그 마케팅 책은 초보자도 쉽게 따라 할 수 있는 마케팅 8주 완성 프로젝트가  
                    정리되어 있는 책으로, 그동안 어디에서도 얻을 수 없었던 전문가의 마케팅 노하우를 배워볼 수 있는 책이랍니다 ㅎㅎ 
                    사실 그동안 쌓아온 자신만의 노하우를 남들에게 그대로 공개한다는 것이 절대 쉬운 게 아닌데, 책 한 권으로 강사님의 가지고 있으신 노하우와 정보들을 배워볼 수 있어서 감사하더라구요
                </div>
                <div>
                    <p>키*</p>
                    이 책을 추천하게 된 이유는 정말 간단해요 블로그 책들 중에서 정말 초보자의 입장으로 쓰여진 책이거든요! 앞으로의 포스팅을 보면 대강 느낌 오실거에요 ㅎㅎ 
                    PC와 모바일버전으로 나누어서도 굉장히 구체적으로 설명이 들어가있고 또 그 외에도 다양한 카테고리들이 심화적으로 책을 이루고 있습니다. 
                    8주안에 블로그 완벽하게 만들기!라면서 시작되는 이 책은 말그대로 8주차라는 카테고리가 나누어져 있습니다. 
                    그래서 저처럼 한번에 책을 정독하지 못하면 포기해버리는 사람들에게도 여유있게 읽기 좋아요! 괜히 강박관념이 없어지는 듯한 느낌 ㅎㅎ
                </div>
                <div>
                    <p>만복이**</p>
                    파트1은 8주만에 최적화 블로그 만들기! 이 챕터에서는 말 그대로 브로그를 만들어보는 것에 대해 나와있었어요! 
                    쉽게 따라하게 만든 마케팅책이라고 하더니 정말 하나, 하나, 담겨있더라구요! 이 정도면 저희 아빠도 블로그 만드실 수 있을듯요 ㅋㅋㅋ! 
                    그런데 마케팅을 잘 모르는 저도 이해도 가고, 이제부터 더 배우고자 하는 마음이 생기더라구요~ 이것도 배움의즐거움이겠죠!
                </div>
                <div>
                    <p>뚬바**</p>
                    이 책을 쓰신 이기용강사님의 엄청난 고스펙을 알 수 있어요..! 사실 저는 대단한 사람이 쓴 책일수록 더 어려운 책일까봐 두려워하는 경향이 있어요. 
                    그도 그럴게 너무나 전문적이다보니..ㅎㅎ 그런데 이 블로그책은 그 편견을 말끔하게 깨부셔버렸지요! 
                    목차에서 먼저 본 것으로는 굉장히 세부적으로 단원이 구성되어 있었고 단락을 펼칠때마다 그림 및 실사이미지 그리고 그에 맞는 설명 등이 적혀있는데 엄청 보기 쉬웠다고 감히 장담할 수 있습니다!
                </div>
                <div>
                    <p>포롱**</p>
                    이게 제가 슥- 훑어보니까 그냥 정보를 알려주는 책이 아니라 실질적으로 행동을 하게끔 만드는 책이더라구요 그래서 목차에 보면 큰 단원마다 weeks라고 써있어요! 
                    말 그대로 한 주에 한 단원 이라는 말이죠! 과제라고 써있어요! 진짜 학교에서 배우고 복습하는 과제를 던져주는 느낌이네요! 블로그를 하는 이유부터 하나하나 기본의 틀을 잡는다는 느낌이에요. 
                    저도 지금 이 1주차 과제를 하려고 이 책에 직접 적어보면서 구상중이거든요 ㅎㅎ 이런건 참 좋은 아이디어같아요! 책에 대한 거부감이 없어지는~?
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
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1713_12.jpg" alt="" >
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