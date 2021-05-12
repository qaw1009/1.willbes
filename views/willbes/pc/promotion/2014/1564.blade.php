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
            top:200px;
            right:10px;
            z-index:1;
            width:120px;
        }
        .skybanner a {display:block; margin-bottom:5px}

        .evtTop {background:#29304a}
        .evt01 {background:#e1e3ef}

        .evtMenu {background:#fff; height:80px; width:100%; border-bottom:1px solid #edeff0}
        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}

        .evt02 {background:#fff; padding:100px 0}
        .evt02 .btnbuy {width:720px; margin:50px auto 0}
        .evt02 .btnbuy a {border-radius:10px; display:block; font-size:38px; background:#000; color:#fff; padding:20px 0;}
        .evt02 .btnbuy a:hover {background:#3a99f0;}
        .infoCheck {margin-top:30px; font-size:14px}
        .infoCheck label {margin-right:30px; cursor: pointer;}
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#0099ff;}

        .evt03 {background:#fff; padding-bottom:150px}

        .evt04 {background:#f2f2f2;}

        .evt05 {background:#fff; padding-top:100px; text-align:left;}
        .evt05 .copy {width:720px; margin:0 auto;}
        .evt05 h5 {color:#383368; font-size:46px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evt05 .evt05Txt01 {font-size:28px; margin:20px auto 80px}
        .evt05 .sample {width:720px; margin:0 auto}
        .evt05 .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#acacac; color:#fff; font-size:20px; font-weight:600; text-align:center}
        .evt05 .sample li p {margin-bottom:15px;}
        .evt05 .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:8px; background:#000; color:#fff;}
        .evt05 .sample li a:hover {background:#fff; color:#000}
        .evt05 .sample li:last-child {margin:0}
        .evt05 .sample:after {content:""; display:block; clear:both}
        .evt05 .evt05Txt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}

        .evtCurri {width:720px; margin:50px auto 0; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#232323; letter-spacing:-1px}
        .evtCurri li.cTitle {color:#1087ef; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}   

        .evt06 {background:#f5f5f5; padding:150px 0 100px}
        .evt06 .columns {width:720px; margin:50px auto 0;
            column-count: 1;
            column-gap:20px;
        }
        .evt06 .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:20px; color:#888; background:#fff;
        }
        .evt06 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
        .evt06 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evt06 .columns div strong {font-size:bold; color:#333}        

        .evt07 {background:#3a99f0; padding-bottom:100px}
        .evt07 ul {width:720px; margin:0 auto;}
        .evt07 li {display:inline; float:left; width:50%}
        .evt07 li a {display:block; font-size:24px; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px}
        .evt07 li a:hover {background:#fff; color:#000;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .evt07 li span {display:block; font-size:28px}
        .evt07 li:last-child a{margin-left:10px}
        .evt07 ul:after {content:""; display:block; clear:both}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto; display:block}

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10;
        }

        .evtFooter {width:900px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666; background:#fff !important}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; }

        .evtReply {width:940px; margin:0 auto; position:relative}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2020/05/1564_sky_01.png" alt="김정환대표"></a> 
            <a href="https://domemedb.domeggook.com/index/item/itemDamagochi.php" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/05/1564_sky_03.png" alt="위탁.사입상품 추천받기"></a>
            <a href="https://njob.willbes.net/support/notice/show/cate/3114?board_idx=323129" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/05/1564_sky_04.png" alt="이용안내"></a>
        </div>                       

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1564_top.jpg" alt="창업 다마고치" >             
        </div>  
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1564_01.jpg" alt="창업 다마고치" >
        </div> 

        <div class="evtMenu">
            <ul class="tabs">
                <li><a href="#tab01" data-tab="tab01" class="top-tab">수강신청</a></li>
                <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                <li><a href="#tab03" data-tab="tab03" class="top-tab">커리큘럼 안내</a></li>
                <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
            </ul>
        </div>

        <div id="tab01">
            <div class="evtCtnsBox evt02" id="evt02">
                <a href="https://njob.willbes.net/support/notice/show/cate/3114?board_idx=323129" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/1564_02.jpg" alt="수강료" >
                </a>               
  
                <div class="btnbuy NSK-Black">
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">[온라인강의] 신청하기 ></a>
                </div>

                <div id="pass" class="infoCheck">
                    <input type="checkbox" name="y_pkg" value="162748" style="display: none;" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="#infoText">이용안내 확인하기 ↓</a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt03">
                <iframe src="https://www.youtube.com/embed/pgfPkHvbVJs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/07/1564_03_01.jpg" alt="e커머스 강좌소개" ></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/07/1564_03_02.jpg" alt="e커머스 강좌소개" ></div>
                <iframe src="https://www.youtube.com/embed/_yVIa13RFW8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1564_04.jpg" alt="e커머스 강좌소개" >
            </div>  
        </div>  

        <div id="tab03">
            <div class="evtCtnsBox evt05">
                <div class="copy">
                    <h5 class="NSK-Black">
                        <div>가장 현실적인 월 100만원 만들고</div>
                        <div>지금 바로 시작할 수 있는 커리큘럼</div>
                    </h5>
                    <div class="evt05Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
                </div>

                <ul class="sample">
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @php $i = 1; @endphp
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)                            
                            <li>
                                <p>{{$i}}강 맛보기 수강 ▼</p>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');">고해상도 ></a>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','SD');">저해상도 ></a>
                            </li>
                            @php $i += 1; @endphp
                        @endforeach
                    @else
                        <li><a href="#none">1강 맛보기 준비중 ></a></li>
                        <li><a href="#none">2강 맛보기 준비중 ></a></li>
                    @endif
                </ul> 

                <div class="evt05Txt02">
                    * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                </div>

                <div class="evtCurri">
                    <ul>
                        <li class="cTitle">INTRO</li>
                        <li>1강 월 수익 100만원, 스마트스토어가 가장 현실적인 이유?</li>
                        <li>2강 ‘지금 바로 시작하는 스마트스토어’ 강의를 제대로 활용하는 방법</li>
                        <li class="cTitle">Chapter 1.스마트스토어 개설하기</li>
                        <li>3강 나만의 쇼핑몰 만들자! 스마트스토어 개설하기</li>
                        <li>4강 스마트스토어를 운영을 위해 꼭 필요한 것들_사업자등록증</li>
                        <li>5강 스마트스토어를 운영을 위해 꼭 필요한 것들_통신판매업신고</li>
                        <li class="cTitle">Chapter 2. 위탁판매로 재고 없이 소자본 창업하기</li>
                        <li>6강 재고 부담이 없는 판매 방식! 위탁판매란 무엇일까?</li>
                        <li>7강 스마트스토어에 위탁판매 상품 등록하기</li>
                        <li>8강 스마트스토어에서 상품명이 중요한이유</li>
                        <li>9강 잘 팔리는 상품명 만드는 방법</li>
                        <li>10강 네이버 검색광고로 유입량 늘리는 방법</li>
                        <li>11강 구매전환율이 높은 상세페이지를 기획하는 방법</li>
                        <li>12강 위탁판매상품의 상세페이지를 개선하는 방법</li>
                        <li>13강 상품을 등록 할 때 주의 해야 할 사항</li>
                        <li>14강 감동의 첫 주문! 위탁상품 고객께 발송하기</li>
                        <li>15강 교환/반품 및 CS 처리 하기</li>
                        <li>16강 고객이 어떻게 찾아왔을까? 유입경로 분석하기</li>
                        <li>17강 나만의 위탁공급처를 만드는 방법</li>
                        <li class="cTitle">Chapter 3. 도매상품 사입 판매로 매출 만들기</li>
                        <li>18강 무엇을 팔아야할까? 사입판매 카테고리 정하기</li>
                        <li>19강 이 제품 사입해도 될까?</li>
                        <li>20강 카테고리 분석으로 사입아이템을 찾는 방법</li>
                        <li>21강 치열한 경쟁을 이겨내는 만능열쇠 나만의 브랜드 만들기</li>
                        <li>22강 설득의 심리학 상세페이지 만들기</li>
                        <li>23강 고객의 평가를 결정 하는 제품 포장과 발송</li>
                        <li>24강 좋은 구매평과 재구매를 만드는 방법</li>
                        <li class="cTitle">Chapter 4. 중국 소싱으로 마진 극대화</li>
                        <li>25강 1688에서 원하는 상품을 찾아 내는 방법</li>
                        <li>26강 생각보다 쉬운 개인 무역! 중국에서 직접 수입하기</li>
                        <li>27강 수입 통관절차 및 제품 받아보기</li>
                        <li class="cTitle">Chapter 5. 나도 글로벌 셀러, 해외구매대행 사업</li>
                        <li>28강 부업으로도 최고! 해외구매대행 사업</li>
                        <li>29강 타오바오 상품을 내 스마트스토어에서 판매하기</li>
                        <li>30강 배송대행지를 이용한 상품 발송</li>
                        <li class="cTitle">Chapter 6. 매출을 확대를 위한 오픈마켓 진출</li>
                        <li>31강 판매채널 확장하기! 오픈마켓 비교 분석</li>
                        <li>32강 1688 수입상품을 국내에서 판매할 때 주의 해야 할 점</li>
                        <li>33강 1688 수입상품을 도매사이트에서 판매 하는 방법</li>
                        <li class="cTitle">Chapter 7. 외부 유입으로 고객을 모아보자</li>
                        <li>34강 스마트스토어 매출을 폭발시키는 비결_외부 유입</li>
                        <li>35강 네이버 블로그로 외부 유입에 대한 감을 잡자</li>
                        <li>36강 스마트스토어 유입을 위한 블로그 상위 노출방법</li>
                        <li>37강 잠들어 있는 내 SNS 계정 마케팅 채널로 활용하기</li>
                        <li>38강 대세는 유튜브_유튜브 컨텐츠로 마케팅하기</li>
                        <li>39강 이제는 미디어 커머스_유튜브로 매출을 끌어올리는 비결</li>
                        <li class="cTitle">Chapter 8. 아웃소싱으로 사업규모 키우기</li>
                        <li>40강 3자 물류로 택배 포장에서 벗어 나자</li>
                        <li>41강 이제는 세금과의 싸움_초보창업자의 세금처리에 대해</li>
                        <li>42강 디지털노마드가 되어 볼까요</li>
                    </ul>
                </div>

                <div class="evtCtnsBox"><img src="https://static.willbes.net/public/images/promotion/2020/07/1564_05.jpg" alt="" ></div>
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1564_06.jpg" alt="BEST 수강후기" >
                <div class="columns">
                    <div>
                        <h4>지금 바로 시작하게 만드는 다마고치님의 강의! </h4>
                        <p>보라도리(shin****)</p>
                        <strong>가장 좋았던 것은 역시나 실행하는 모습이란 어떤 것인지 몸소 보여준 창업 다마고치님의 밀도 높은 강의 내용과
                        실제로 경험했기에 전달 가능한 알고 실행하면 엄청난 이익금이 창출되는 팁들의 대방출 이었습니다.</strong><br>
                        각종 영상자료로 이해하기 쉽게 알차게 강의를 구성한 점이 특히 좋았습니다. 강의자료 준비에 공을 들인 것이
                        확실히 느꼈습니다.<br>
                        이번 강의를 통해 ‘나도 해볼 수 있겠다’는 생각이 불끈불끈 들었습니다. 그렇게 때문에 훌륭한 강의 추천할만한 강의
                        였습니다. 엄지척 
                    </div>  
                    <div>
                        <h4>알차고 뜻깊은 4시간</h4>
                        <p>캣치사운드(catc****)</p>
                        먼저 결론부터 말씀드리자면 저는 강의 4시간동안 알차고 뜻깊은 시간있었습니다. 
                        거기에 반성과 후회 그리고 다짐의 시간이기도 했습니다.<br>
                        왜 이걸 몰랐지? 난 3년동안 스마트스토어를 운영하면서 무엇을 한거지?
                        대박을 꿈꾸면서 나 아무것도 하지도 하려고 하지않았구나?<br>
                        난 정말 바보처럼 스마트스토어를 모르면서 운영했었구나... 강의를 듣는 매순간 순간 반성과 다짐을 했습니다.
                        <strong>만약 창업다마고치님의 강의를 모르고 지나갔거나 20만원이 아까워 강의신청을 하지 않았더라면
                        전 아직까지 매출없는 스마트스토어를 운영하면서 전전긍긍했을겁니다. 아니 어쩌면 포기했을수도 있습니다.</strong>
                        창업 다마고치님의 강의를 통해 다시한번 더 천천히 다시 시작하는 마음으로 그동안 놓치고 지나간 일들을
                        찾아 포기하지 않고 창업 다마고치님의 말씀을 믿고 실천해 나가도록 하겠습니다. 
                    </div> 
                    <div>
                        <h4>닉네임 바꾸세요! 창업다마고치 X !! 창업다아라찌 O!</h4>
                        <p>라비앙로즈(euni****)</p>
                        강의 듣기 전에 다른분들 후기에 왜 강의에 대한 자세한 이야기가 없을까... 궁금하기도 했구요~
                        강의 듣고 나니 그 이유를 알 것 같네요~<br>
                        왜? 나만 알고 싶은 강의니까!<br>
                        죄송하지만 저도 강의 내용은 발설하지 못합니다. 약오르신 분들은 꼭 다음번 강의 신청하시길 바래요.
                        (이젠 더 바빠지셔서 다음 강의를 진행할 수 있을지는 확답할 수 없다고 하셨지만요 --;;;)<br>
                        <strong>확실한 건 다마고치님 강의 내용을 듣고 실행한다면 20만원 아닌 200만원 이상의 가치가 있을거라는거! </strong>
                    </div>  
                    <div>
                        <h4>다마고치님 강의 아쉬움을 느꼈던 이유</h4>
                        <p>해피U(sam5****)</p>
                        좀더 일찍 강의를 들었더라면 시간을 허비하지 않았을텐데 하는 아쉬움을 느꼈습니다.<br>
                        강의를 들으면서 내가 뭘 모르는지도 몰랐던 부분을 알게된 것과
                        수많은 다른 강의를 들으면서 그냥 머릿속에 떠다니기만해 답답해 하던 것들
                        ‘그렇게 하세요’, ‘그래서 어쩌라고’하며 속상해 울상지었던 것들에 대해
                        <strong>어느 강의에서도 들어보지 못알만큼 현실적이고 실천가능한 방법으로 알려주시는
                        강의 내용에 놀라면서도 감사했습니다.</strong><br>
                        감의비는 20만원 이었지만 이것을 100배 1,000배로 만들 수 있겠다는 생각이 들었습니다! 
                    </div> 
                    <div>
                        <h4>이 강의가 20만원이나해?</h4>
                        <p>SCV 출동 준비완료(suga****)</p>
                        요즘은 온라인 쇼핑몰 관련 강의도 많고 들어간 비용에 비해 내용이 부실한 경우가 많아
                        처음 강의를 듣기전에는 도대체 어떤 강의이기에 20만원씩이나해? 이런 생각을 했습니다.
                        <strong>강의를 다 듣고 나서는 이건 20만원에 해주셔서 감사해야 하는 강의라는 걸 깨달았습니다. ^^</strong><br>
                        그렇게 생각하게 된데에는 정말 많은 이유가 있지만 유튜브에서도 나오지 않았고 책에도 적지 못한
                        진짜배기 정보들이 알이 꽉 찬 무 처럼 단단하게 채워져 있었다는 겁니다. <br>
                        정말 있는 그대로 1년 동안의 경험담을 진지하면서도 유머러스하게 강의해주셔서 감동! 이었습니다.<br>
                        그외에도 좋았던 점들이 정말 많았어요.<br>
                        유튜브에서만 나온 내용으로만 해도 월수익 500 가능했던 시절은 끝이났다 라는 말씀에 전적으로 동의합니다.
                        누구나 쉽게 얻을 수 있는 정보가 되어 많은 사람들이 똑같이 하고 있기에 다른 무언가가 더 필요하다고
                        생각했습니다.<br>
                        솔직히 강의를 마친후에 많은 숙제를 떠안은 것처럼 마음이 무겁기도 하지만
                        일단 나아갈 방향을 알게 된 것에 대해 감사한 마음이 큽니다. 
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

            <div class="evtCtnsBox evt07">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1564_07.jpg" alt="BEST 수강후기" >
                <ul>
                    <li>
                        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
                        <span class="NSK-Black">지금, 수강신청하고 </span>
                        100만원 만들기 도전! → 
                        </a>
                    </li>
                    <li>
                        <a href="http://njob.domeggook.com/mh/njob_guide" target="_blank">
                        <span class="NSK-Black">이미 신청했다면,</span>
                        위탁/사입상품 추천 받기! → 
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
                <li>수강혜택으로 제공되는 기획전 수강인증코드는 수강기간이 종료되면 사용 불가합니다.</li>
                <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다. </li>
                <li>수강혜택 사은품으로 발급된 인증코드 및 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
                <li>김정환대표 강의 학습 Q&A에 질문하기는 자유롭게 등록 가능하오나 질문에 대한 답변은 
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
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
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