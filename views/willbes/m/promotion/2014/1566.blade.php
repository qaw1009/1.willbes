@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}
    .evtTop01 {background:#bebcbd;}
    .evtTop > ul {padding:20px 40px}
    .evtTop > ul li { list-style:disc; margin-left:15px; margin-bottom:5px; text-align:left;}
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

    .evt02 {border:1px solid #ccc; border-radius:10px; margin:20px;}
    .evt02 .price {padding:30px; letter-spacing:-1px}
    .evt02 .price li {margin-bottom:10px; font-size:1.5rem; }
    .evt02 .price li:nth-child(1) {font-size:1.9rem;}
    .evt02 .price li:nth-child(1) span {color:#00c73c}
    .evt02 .price li:nth-child(2) {margin-bottom:30px;}
    .evt02 .price li:nth-child(2) div {border-radius:10px; background:#00c73c; color:#fff}
    .evt02 .price li:nth-child(3) {margin-bottom:30px; text-align:center}
    .evt02 .price li:nth-child(3) dl {position:relative; line-height:1; margin:0 auto;}
    .evt02 .price li:nth-child(3) dd {font-size:1.2rem; margin-top:5px;}
    .evt02 .price li:nth-child(3) dd span {font-size:3rem; color:#00c73c}
    .evt02 .price li:nth-child(3) dd span:last-child {font-size:1.2rem;}
    .evt02 .price li:nth-child(4) {font-size:1.4rem;}
    .evt02 .price li:nth-child(4) i {color:#a3a3a3; text-decoration: line-through;}
    .evt02 .price li:nth-child(4) span {color:#fff; border-radius:5px; background:#ff0000; padding:0 5px}
    .evt02 .price li:nth-child(5) {color:#ff0000; font-size:2.4rem}
    .evt02 .price li:nth-child(5) span {font-size:3.4rem}
    .evt02 .price li:nth-child(6) {text-align:left; color:#414141; font-size:1.1rem}
    .evt02 .evt02-txt {background:#363636; color:#fff; border-radius:0 0 10px 10px; text-align:left; padding:20px; }
    .evt02 .evt02-txt div {font-size:1.5rem}
    .evt02 .evt02-txt li {list-style: decimal; margin-left:30px}
    .evt02 .evt02-txt a {color:#f7be10}

    .evt03 {background:#fff; padding-top:50px}
    .evt03 .evt03Txt01 {color:#00c73c; font-size:1rem; margin-bottom:30px; padding:0 20px}  

    .evt04 .evt04Txt01 {margin-bottom:30px; padding:20px; text-align:left}

    .evt05 {text-align:left; padding:0 20px}
    .evt05 h5 {color:#00c73c; font-size:2.2rem; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
    .evt05 .evt05Txt01 { font-size:1.6rem;}
    .evt05 .curriculum {margin:30px 0}
    .evt05 dl {margin-top:30px;}
    .evt05 dl:first-child {margin:0}
    .evt05 dt {font-size:16px; font-weight:bold; color:#1fca00; margin-top:30px}
    .evt05 dt:first-child {margin:0}
    .evt05 ul {margin:10px auto}
    .evt05 ul li {display:inline; float:left; padding:15px; border:1px solid #e4e4e4; }
    .evt05 ul li p {margin-bottom:10px;}
    .evt05 ul li a {display:inline-block; padding:0 8px; text-align:center;  margin:0 auto 5px; border-radius:4px;}
    .evt05 ul li a.btnst01 {border:1px solid #ccc;}
    .evt05 ul li a.btnst02 {border:1px solid #000; color:#fff; background:#333}
    .evt05 ul li a.btnst03 {border:1px solid #ccc; color:#000; background:#ccc}
    .evt05 ul li a:hover {background:#000; color:#fff}
    .evt05 ul:after {content:""; display:block; clear:both}
    .evt05 .evt03Txt01 {font-size:14px; line-height:1.4; letter-spacing:-1px; color:#333; width:80%; max-width:900px; margin:20px auto 0; text-align:left}
    
    .evt06 .columns {padding:20px;
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

    .evt07 {background:#1fca00; padding:20px}
    .evt07 li a {display:block; font-size:1rem; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px; margin:0 1.5%;}
    .evt07 li a:hover {background:#fff; color:#000;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .evt07 li span {display:block; font-size:1.25rem}
    .evt07 ul:after {content:""; display:block; clear:both}

    .video-container-box {padding:20px}
    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
        background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2);left:0; z-index:10
    }

    .btnbuy {width:100%; position:fixed; bottom:5px;}
    .btnbuy a {display:block; width:95%; max-width:940px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#00c73c;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

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
        .evt02 .price br {display:none}
        .evt05 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>
<div id="pass" style="display: none">
    <input type="checkbox" name="y_pkg" value="162745" checked/>
    <input type="checkbox" id="is_chk" name="is_chk" value="Y" checked/>
</div>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <div class="evtTop01"><img src="https://static.willbes.net/public/images/promotion/2020/04/1566M_top.jpg" alt="창업 다마고치" ></div>             
        <div class="evtTop02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1566M_top_txt.jpg" alt="창업 다마고치" >
        </div>
        <ul>
            <li>윌비스 N잡 대표강사</li>
            <li>네이버파트너스퀘어 공식강사</li>
            <li>언니의리뷰, 리뷰채널 운영</li>
            <li>디자인 에이전시 대표</li>
            <li>쇼핑몰 상세페이지 디자인 가이드북 저자<br>
                (2016,2018 베스트셀러)</li>
            <li>아이보스, 퇴사학교,인천디자인센터,여성발전센터 강사</li>
            <li>서울창조경제혁신센터 이커머스강사</li>
            <li>cafe24 쇼핑몰솔루션 강사</li>
            <li>eBay (g마켓, 옥션) 교육센터 전문강사</li>
            <li>서울시 청년창업프로젝트 강사</li>
            <li>카이스트 해외취업 웹디자인양성과정 전임강사</li>
            <li>카이스트 대학생 프리젠테이션 향상과정 전임강사</li>
            <li>정보화특강 위촉강사</li>
        </ul>
        <span><a href="#tab03"><img src="https://static.willbes.net/public/images/promotion/2020/03/1564_pup.png" alt="맛보기강의"></a></span>  
        <div class="evtMenu">
            <ul class="tabs">
                <li><a href="#tab01" data-tab="tab01" class="top-tab">신규런칭 이벤트</a></li>
                <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                <li><a href="#tab03" data-tab="tab03" class="top-tab">커리큘럼 안내</a></li>
                <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
            </ul>
        </div>  
    </div>       

    <div id="tab01" class="evtCtnsBox">
        <div class="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1566M_01.jpg" alt="창업 다마고치" >
        </div>
        <div class="evt02">
            <ul class="price NSK-Black">
                <li>1억뷰 <span>N잡</span>강의 런칭기념</li>
                <li><div>4월 한달 전강좌 10% 할인</div></li>
                <li>   
                    <dl>
                        <dd>
                            신청마감까지<br>
                            <span id="ddayCountDayText"></span><br><span id="ddayCountText"></span> 남았습니다.
                        </dd>
                    </dl>
                </li>
                <li><i>195,000원</i><br> <span>10%할인</span><br> 175,500원</li>
                <li>월 <span>3만원</span>대</li>
                <li>
                    수강기간 : 5개월<br>
                    수강대상 : 온라인 쇼핑몰 창업 입문부터 가능
                </li>
            </ul>
        </div>
    </div>

    <div id="tab02">
        <div class="evtCtnsBox evt03">
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/SqJMAs2mic8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="evt03Txt01">
                안녕하세요. 네이버 파트너스퀘어 공식 강사이자,<br>
                유튜브 채널 "단아쌤TV"를 운영중인<br>
                <span class="NSK-Black">단아쌤 김경은</span>입니다. 
            </div>
        </div>
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1566M_02.jpg" alt="인플루언서" >
            <div class="evt04Txt01">
                제가 쇼핑몰을 하면서 가장 중요하게 생각한
                두 가지가 있습니다.<Br>
                <Br>
                ‘매출을 1,000만원 이상 올려보겠다는 것’과<Br>
                ‘고객들의 전화를 받지 않는 쇼핑몰을 운영하겠다’는 것인데요.
                <Br>
                이를 해결하면 ‘누구나 쇼핑몰 운영을 할 수 있겠다’ 싶었죠.<Br>
                <Br>
                이번 강의를 통해 <Br>
                좋은 상품을 선정하는 법부터 나에게 맞는 채널 찾기, <Br>
                입점과 상품 촬영 및 배송 등 제가 직접 몸으로 부딪히며 익힌 <Br>
                ‘쇼핑몰 운영을 위한 모든 것’을 알려 드릴께요.
            </div>
        </div>            
    </div>  

    <div id="tab03">
        <div class="evtCtnsBox evt05">
            <h5 class="NSK-Black">
                ‘10년차 쇼핑몰 업계<br>
                전문 강사 단아쌤이<br>
                알려주는 전문 커리큘럼
            </h5>
            <div class="evt05Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
            <div class="curriculum">
            	<dl>
                    <dt>1. 쇼핑몰 창업준비 (사업자 등록 및 세금 준비 등)</dt> 
                    <dd>A. 쇼핑몰 창업준비물(사업자등록증,구매안전확인증-통신판매업신고증,사업자계좌,인감증명서등)</dd>
                    <dd>B. 집에서 사업자등록증 발급하는 방법</dd>
                    <dd>
                        <ul>
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
                                <li>1강 맛보기<br>수강 준비중 ></li>
                                <li>2강 맛보기<br>수강 준비중 ></li>
                            @endif
                        </ul>
                    </dd>
                    <dd>C. 통신판매업신고증 받는 방법 (구매안전확인증이 필요해요!)</dd>
                    <dd>D. 세금준비를 위한 3개의 통장 활용방법</dd>
                    <dd>E. 선배 창업자의 창업전 알았더라면 좋았을 꿀팁</dd>
                </dl>
                
                <dl>
                    <dt>2. 상품소싱을 위한 도매쇼핑몰 가입하기</dt>
                    <dd>A. 위탁도매와 사입, 구매대행의 차이점 알아보기</dd>
                    <dd>B. 도매매, 도매꾹의 차이점 알아보기</dd>
                    <dd>C. 중국 구매대행 상품운영방법 알아보기</dd>
                </dl>
                
                <dl>
                    <dt>3. 상품등록을 위한 준비 (마켓별 수수료와 특징 알아보기)</dt>
                    <dd>A. 마켓별 수수료와 특징알아보기</dd>
                    <dd>B. 상품등록을 위한 준비파일 작성하기</dd>
                    <dd>C. 상품가격책정하기</dd>
                    <dd>D. 가산점 받는 상세페이지 준비하기</dd>
                </dl>
                
                <dl>
                    <dt>4. 스마트스토어에서 판매하기 (스마트스토어 특징과 입점 / 상품 등록 및 꿀팁)</dt>
                    <dd>A. 스마트스토어의 특징과 입점방법</dd>
                    <dd>B. 가장 효율적으로 관리하는 상품관리법</dd>
                    <dd>C. 상품 등록따라하기</dd>
                    <dd>D. 등록후에 꼭해야하는 비즈니스 툴</dd>
                    <dd>E. 선배 창업자의 창업전 알았더라면 좋았을 꿀팁</dd>
                </dl>
                
				<dl>
                    <dt>5. Ebay-G마켓, 옥션에서 판매하기(사이트별 특징과 입점 방법/상품등록 및 광고방법)</dt>
                    <dd>A. 한개의 사이트에서 운영하는 G마켓, 옥션, g9의 특징과 입점방법</dd>
                    <dd>B. 상품등록을 위한 준비파일 작성하기</dd>
                    <dd>C. 상세페이지 사용을 위한 이베이 이미지 호스팅 이용하기</dd>
                    <dd>D. 상품등록하기</dd>
                    <dd>E. 입찰, CPC광고방법알아보기</dd>
				</dl>
                
                <dl>
                    <dt>6.  11번가에서 판매하기(특징과 입점 방법 / 상품 등록 및 광고방법)</dt>
                    <dd>A. SKT할인과 해외에서 유명한 11번가의 특징과 입점방법</dd>
                    <dd>B. 상품등록을 위한 준비파일 작성하기</dd>
                    <dd>C. 상품등록하기</dd>
                    <dd>D. 입찰, CPC광고방법알아보기</dd>
                    <dd>E. 쇼킹딜 제안하기</dd>
                </dl>
                
                <dl>
                    <dt>7. 요즘대세 쿠팡에서 판매하기 (쿠팡 입점 및 상품 등록 등)</dt>
                    <dd>A. 남녀노소 가장 많이 쓰는 쇼핑앱 쿠팡에 입점하기</dd>
                    <dd>B. 상품등록을 위한 준비파일 작성하기</dd>
                    <dd>C. 상품등록하기</dd>
                    <dd>D. 쿠팡파트너스와 로켓배송, 쿠팡 스토어기능 알아보기</dd>
                </dl>
                
                <dl>
                    <dt>8. 카페24로 나만의 쇼핑몰 만들기 (가입 및 쇼핑몰 만들기 / 상품 등록 및 마켓통합관리)</dt>
                    <dd>A. 카페24 가입하고, 쇼핑몰만들기</dd>
                    <dd>B. 무료 디자인을 활용한 반응형 쇼핑몰 제작하기</dd>
                    <dd>C. 상품등록하기</dd>
                    <dd>D. PG(결제)연결과 네이버 페이, 지식쇼핑 입점하기</dd>
                    <dd>E. 마켓통합관리를 통한 여러 쇼핑몰에 상품 등록하기</dd>
                </dl>
                
                <dl>
                    <dt>9. 판매촉진을 위해 알아야하는 판매자상식 6가지(지적재산권 및 KC인증 등 판매자 상식 알기) </dt>
                    <dd>A. 브랜드-상표등록은 앞으로 쇼핑몰에서 가장중요한 핵심</dd>
                    <dd>B. 상세페이지 기획방법을 통한 잘 팔리는 상세페이지의 포인트</dd>
                    <dd>C. 배송, 고객관리, 진상고객 처리 꿀팁전수</dd>
                    <dd>D. 지적재산권이 뭔가요?</dd>
                    <dd>E. 전안법? KC인증이 뭔가요?</dd>
                    <dd>F. 세금관리! 잘 안하면 잘될때 망할 수 있어요</dd>
                </dl>
                 
                <dl>
                    <dd>(*커리큘럼은 사정에 따라 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.)</dd>
                </dl>
            </div>
        </div>
    </div>

    <div id="tab04">
        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1566M_04.jpg" alt="BEST 수강후기" >
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
        </div>
        {{-- 상품바로결제 정보 --}}
        <div id="pass" style="display: none">
            <input type="checkbox" name="y_pkg" value="162745" checked/>
            <input type="checkbox" id="is_chk" name="is_chk" value="Y" checked/>
        </div>

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1566M_05.png" alt="BEST 수강후기" >
            <ul>
                <li>
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'?order=Y')}}');">
                    <span class="NSK-Black">지금, 수강신청하고 </span>
                    1인 온라인창업 도전! → 
                    </a>
                </li>
            </ul>
        </div>	
    </div>

    <div class="evtCtnsBox evtFooter">
        <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

        <p># 런칭기념  이벤트 안내</p>
        <div>강좌는 내강의실>수강대기 강좌에서 확인 가능합니다.( 4월 9일부터 수강 시작)</div>

        <p># 수강안내</p>
        <ul>
            <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
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
            <li>수강상품 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
        </ul>

        <div>※ 이용문의 : 고객만족센터 1544-5006</div>
    </div>    
</div>
<!-- End Container -->
<div class="btnbuy NSK-Black">        
    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'?order=Y')}}');">
        [온라인강의] 신청하기 >
    </a>
</div>


    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDownText('{{$arr_promotion_params['edate']}}');
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

        // 날짜차이 계산
        var dDayDateDiff = {
            inDays: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
            },
            inWeeks: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return parseInt((tt2-tt1)/(24*3600*1000*7));
            },
            inMonths: function(dd1, dd2) {
                var dd1Y = dd1.getFullYear();
                var dd2Y = dd2.getFullYear();
                var dd1M = dd1.getMonth();
                var dd2M = dd2.getMonth();

                return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
            },
            inYears: function(dd1, dd2) {
                return dd2.getFullYear()-dd1.getFullYear();
            }
        };

        {{--
         * 프로모션용 디데이카운터 텍스트
         * @@param end_date [마감일 (YYYY-MM-DD)]
        --}}
        function dDayCountDownText(end_date, ele_id) {
            if(!ele_id) ele_id = 'ddayCountText';
            var arr_end_date = end_date.split('-');
            var event_day = new Date(arr_end_date[0], parseInt(arr_end_date[1]) - 1, arr_end_date[2], 23, 59, 59);
            var now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));
            var date_left = String( dDayDateDiff.inDays(now, event_day) );
            var hour_left = String( timeGap.getHours() );
            var minute_left = String( timeGap.getMinutes() );
            var second_left = String(  timeGap.getSeconds() );

            if(date_left.length == 1) date_left = '0' + date_left;
            if(hour_left.length == 1) hour_left = '0' + hour_left;
            if(minute_left.length == 1) minute_left = '0' + minute_left;
            if(second_left.length == 1) second_left = '0' + second_left;

            if ((event_day.getTime() - now.getTime()) > 0) {
                $('#'+ele_id).html(hour_left + ':' + minute_left + ':' + second_left);
                $('#ddayCountDayText').html(date_left + '일 ');

                setTimeout(function() {
                    dDayCountDownText(end_date, ele_id);
                }, 1000);
            } else {
                $('#'+ele_id).hide();
            }
        }

    </script>

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->

@stop