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

        .evtTop {background:#167544}
        .evtMenu {background:#fff; height:80px; width:100%; border-bottom:1px solid #edeff0}
        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1566_01_bg.jpg) repeat-x left top;}

        .evt02 {background:#fff7f5; padding-top:100px}

        .evt03 {background:#fff; padding:100px 0}
        .evt03 .btnbuy {width:720px; margin:50px auto 0}
        .evt03 .btnbuy a {border-radius:10px; display:block; font-size:40px; background:#000; color:#fff; padding:20px 0;}
        .evt03 .btnbuy a:hover {background:#00c73c;}

        .infoCheck {margin-top:30px; font-size:14px}
        .infoCheck label {margin-right:30px; cursor: pointer;}
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#00c73c;}
      
        .evt02 .evt02Txt01 {font-size:26px; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#464646}
        .evt02 .evt02Txt01 span {font-size:38px; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1); color:#000}

        .evt04 {background:#f5f5f5; padding-top:100px}

        .evt05 {background:#fff; padding-top:100px; text-align:left;}
        .evt05 .copy {width:720px; margin:0 auto;}
        .evt05 h5 {color:#00c73c; font-size:46px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
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
        .evtCurri li.cTitle {color:#00c73c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

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

        .evt07 {background:#00c73c; padding-bottom:100px}
        .evt07 ul {width:720px; margin:0 auto;}
        .evt07 li {display:inline; float:left; width:100%}
        .evt07 li a {display:block; font-size:24px; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px}
        .evt07 li a:hover {background:#fff; color:#000;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .evt07 li span {display:block; font-size:28px}
        .evt07 li:last-child a{margin-left:10px}
        .evt07 ul:after {content:""; display:block; clear:both}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto}

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10
        }

        .evtFooter {width:900px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666; background:#fff !important}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; }

        .evtReply { width:940px; margin:0 auto; position:relative}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#evt03"><img src="https://static.willbes.net/public/images/promotion/2020/05/1566_sky_01.png" alt="김경은대표"></a>
        </div>                  

		<div class="evtCtnsBox evtTop">        
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1566_top.jpg" alt="네이버 파트너스퀘어 공식강사" >            
        </div>

        <div class="evtCtnsBox evt01">        
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1566_01.jpg" alt="네이버 파트너스퀘어 공식강사" >            
        </div> 
        
        <div class="evtCtnsBox evt02">        
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1566_02.jpg" alt="네이버 파트너스퀘어 공식강사" >            
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
            <div class="evtCtnsBox evt03" id="evt03">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1566_03.jpg">
                <div class="btnbuy NSK-Black"><a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">[온라인강의] 신청하기 ></a></div>
                <div id="pass" class="infoCheck">
                    <input type="checkbox" name="y_pkg" value="162745" style="display: none;" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="#infoText">이용안내 확인하기 ↓</a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt04">
                <iframe src="https://www.youtube.com/embed/SqJMAs2mic8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/07/1566_04_01.jpg" alt="" ></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/07/1566_04_02.jpg" alt="" ></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/07/1566_04_03.jpg" alt="" ></div>
            </div> 
        </div>  

        <div id="tab03">
            <div class="evtCtnsBox evt05">
                <div class="copy">
                    <h5 class="NSK-Black">
                        <div>10년차 쇼핑몰 업계 전문 강사</div>
                        <div>단아샘이 알려주는 전문 커리큘럼</div>
                    </h5>
                    <div class="evt05Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
                </div>

                <ul class="sample">
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @php $i = 1; @endphp
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)
                            <li>
                                <p>{{$i}}강 맛보기 수강 ▼</p>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');" class="btnst02">고해상도 ></a>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','SD');" class="btnst03">저해상도 ></a>
                            </li>
                            @php $i += 1; @endphp
                        @endforeach
                    @else
                        <li><a href="#none">1강 맛보기 수강 준비중 ></a></li>
                        <li><a href="#none">2강 맛보기 수강 준비중 ></a></li>
                    @endif
                </ul>

                <div class="evt05Txt02">
                    * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                </div>

                <div class="evtCurri">
                    <ul>
                        <li class="cTitle">1. 쇼핑몰 창업준비 (사업자 등록 및 세금 준비 등)</li> 
                        <li>A. 쇼핑몰 창업준비물(사업자등록증,구매안전확인증-통신판매업신고증,사업자계좌,인감증명서등)</li>
                        <li>B. 집에서 사업자등록증 발급하는 방법</li>
                        <li>C. 통신판매업신고증 받는 방법 (구매안전확인증이 필요해요!)</li>
                        <li>D. 세금준비를 위한 3개의 통장 활용방법</li>
                        <li>E. 선배 창업자의 창업전 알았더라면 좋았을 꿀팁</li>

                        <li class="cTitle">2. 상품소싱을 위한 도매쇼핑몰 가입하기</li>
                        <li>A. 위탁도매와 사입, 구매대행의 차이점 알아보기</li>
                        <li>B. 도매매, 도매꾹의 차이점 알아보기</li>
                        <li>C. 중국 구매대행 상품운영방법 알아보기</li>

                        <li class="cTitle">3. 상품등록을 위한 준비 (마켓별 수수료와 특징 알아보기)</li>
                        <li>A. 마켓별 수수료와 특징알아보기</li>
                        <li>B. 상품등록을 위한 준비파일 작성하기</li>
                        <li>C. 상품가격책정하기</li>
                        <li>D. 가산점 받는 상세페이지 준비하기</li>

                        <li class="cTitle">4. 스마트스토어에서 판매하기 (스마트스토어 특징과 입점 / 상품 등록 및 꿀팁)</li>
                        <li>A. 스마트스토어의 특징과 입점방법</li>
                        <li>B. 가장 효율적으로 관리하는 상품관리법</li>
                        <li>C. 상품 등록따라하기</li>
                        <li>D. 등록후에 꼭해야하는 비즈니스 툴</li>
                        <li>E. 선배 창업자의 창업전 알았더라면 좋았을 꿀팁</li>

                        <li class="cTitle">5. Ebay-G마켓, 옥션에서 판매하기(사이트별 특징과 입점 방법/상품등록 및 광고방법)</li>
                        <li>A. 한개의 사이트에서 운영하는 G마켓, 옥션, g9의 특징과 입점방법</li>
                        <li>B. 상품등록을 위한 준비파일 작성하기</li>
                        <li>C. 상세페이지 사용을 위한 이베이 이미지 호스팅 이용하기</li>
                        <li>D. 상품등록하기</li>
                        <li>E. 입찰, CPC광고방법알아보기</li>

                        <li class="cTitle">6.  11번가에서 판매하기(특징과 입점 방법 / 상품 등록 및 광고방법)</li>
                        <li>A. SKT할인과 해외에서 유명한 11번가의 특징과 입점방법</li>
                        <li>B. 상품등록을 위한 준비파일 작성하기</li>
                        <li>C. 상품등록하기</li>
                        <li>D. 입찰, CPC광고방법알아보기</li>
                        <li>E. 쇼킹딜 제안하기</li>

                        <li class="cTitle">7. 요즘대세 쿠팡에서 판매하기 (쿠팡 입점 및 상품 등록 등)</li>
                        <li>A. 남녀노소 가장 많이 쓰는 쇼핑앱 쿠팡에 입점하기</li>
                        <li>B. 상품등록을 위한 준비파일 작성하기</li>
                        <li>C. 상품등록하기</li>
                        <li>D. 쿠팡파트너스와 로켓배송, 쿠팡 스토어기능 알아보기</li>

                        <li class="cTitle">8. 카페24로 나만의 쇼핑몰 만들기 (가입 및 쇼핑몰 만들기 / 상품 등록 및 마켓통합관리)</li>
                        <li>A. 카페24 가입하고, 쇼핑몰만들기</li>
                        <li>B. 무료 디자인을 활용한 반응형 쇼핑몰 제작하기</li>
                        <li>C. 상품등록하기</li>
                        <li>D. PG(결제)연결과 네이버 페이, 지식쇼핑 입점하기</li>
                        <li>E. 마켓통합관리를 통한 여러 쇼핑몰에 상품 등록하기</li>

                        <li class="cTitle">9. 판매촉진을 위해 알아야하는 판매자상식 6가지(지적재산권 및 KC인증 등 판매자 상식 알기) </li>
                        <li>A. 브랜드-상표등록은 앞으로 쇼핑몰에서 가장중요한 핵심</li>
                        <li>B. 상세페이지 기획방법을 통한 잘 팔리는 상세페이지의 포인트</li>
                        <li>C. 배송, 고객관리, 진상고객 처리 꿀팁전수</li>
                        <li>D. 지적재산권이 뭔가요?</li>
                        <li>E. 전안법? KC인증이 뭔가요?</li>
                        <li>F. 세금관리! 잘 안하면 잘될때 망할 수 있어요</li>

                        <li>(*커리큘럼은 사정에 따라 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.)</li>
                    </ul>
                </div>
                <div class="evtCtnsBox"><img src="https://static.willbes.net/public/images/promotion/2020/07/1566_05.jpg" alt="" ></div>
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1566_06.jpg" alt="BEST 수강후기" >
                <div class="columns">
                    <div>
                        <h4>수강생 조*정 님</h4>
                        <p></p>
                        강사님 경험을 토대로 말씀해주셔서 와 닿아서 정말 좋았던 것 같아요. 또한 경쟁이 될 수 있을 수 있음에도 불구하고
                        현재 하시는 부분까지 공개 하시면서 알려 주시더라구요! 더불어 어제까지만 해도 막막해서 어떻게 해야 고민이 많았는데
                        덕분에 용기도 얻고 감사합니다!
                    </div>  
                    <div>
                        <h4>수강생 김*미 님</h4>
                        <p></p>
                        여태까지 들었던 강의 중 제일 좋았던 강의였습니다. 
                        스마트스토어가 무엇인지, 듣는 사람들이 뭘 원하는지, 정확히 알고 강의 하셨습니다. 더 많은 것들을 알려주시려 하다 보니 
                        시간이 좀 초과는 되었지만, 하나라도 더 알려주시려 하시다 얘기가 길어지다 보니 시간이 빨리 가는 느낌이었습니다. 
                        강의에 대한 열정과 위트까지 겸비한 최고의 강사였습니다. 이분 강의를 더 많이 듣고 싶네요.
                    </div> 
                    <div>
                        <h4>수강생 한*희 님</h4>
                        <p></p>
                        스마트스토어에 뛰어들 의지를 강하게 주는 강의여서 굉장히 유익하고 
                        도움이 많이 되었습니다.~! 나도 할 수 있겠다라는 생각이 드네요. 
                        (사입 과정 설명 부분 매우 유익했어요)
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
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1566_07.jpg" alt="BEST 수강후기" >
                <ul>
                    <li>
                        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
                        <span class="NSK-Black">지금, 수강신청하고 </span>
                        1인 온라인창업 도전! → 
                        </a>
                    </li>
                </ul>
            </div>	
        </div>

        <div class="evtFooter" id="infoText">
            <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

            <p># 수강안내</p>
            <ul>
                <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
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
                <li>강좌비*에서 기수강 강의수에 대한 금액* 및 위약금*(강의 정상가의 10%)을 차감 후 부분 환불이 진행됩니다.</li>
                * 강좌비: 결제금액에서 서비스프로그램 등 추가 혜택에 해당하는 금액을 차감한 순수강좌비<br>
                * 기수강강의 금액: 결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수)<br>
                * 수강시작일로부터 7일 이내 위약금 없음<br>
                * 수강시작일로부터 7일 이후 위약금 적용 (정상가의 10% 공제) </li>
                <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.</li>
                <li> 환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
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

        <div class="evtCtnsBox reply">
            {{--수강후기--}}
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