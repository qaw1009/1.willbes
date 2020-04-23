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
    .evt02 .price li:nth-child(1) span {color:#ff0066}
    .evt02 .price li:nth-child(2) {margin-bottom:30px;}
    .evt02 .price li:nth-child(2) div {border-radius:10px; background:#ff0066; color:#fff}
    .evt02 .price li:nth-child(3) {margin-bottom:30px; text-align:center}
    .evt02 .price li:nth-child(3) dl {position:relative; line-height:1; margin:0 auto;}
    .evt02 .price li:nth-child(3) dd {font-size:1.2rem; margin-top:5px;}
    .evt02 .price li:nth-child(3) dd span {font-size:3rem; color:#ff0066}
    .evt02 .price li:nth-child(3) dd span:last-child {font-size:1.2rem;}
    .evt02 .price li:nth-child(4) {font-size:1.4rem; }
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
    .evt03 .evt03Txt01 {color:#ff0066; font-size:1rem; margin-bottom:30px; padding:0 20px}  

    .evt04 .evt04Txt01 {margin-bottom:30px; padding:20px; text-align:left}

    .evt05 {text-align:left; padding:0 20px}
    .evt05 h5 {color:#ff0066; font-size:2.2rem; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
    .evt05 .evt05Txt01 { font-size:1.6rem;}
    .evt05 .curriculum {margin:30px 0}
    .evt05 dl {margin-top:30px;}
    .evt05 dl:first-child {margin:0}
    .evt05 dt {font-size:16px; font-weight:bold; color:#ff0066; margin-top:30px}
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

    .evt07 {background:#ff0066; padding:20px}
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
    .btnbuy a:hover {background:#ff0066;
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
    <input type="checkbox" name="y_pkg" value="162747" checked/>
    <input type="checkbox" id="is_chk" name="is_chk" value="Y" checked/>
</div>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <div class="evtTop01"><img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_top.jpg" alt="창업 다마고치" ></div>             
        <div class="evtTop02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_top_txt.jpg" alt="창업 다마고치" >
        </div>
        <ul>
            <li>버킷리스터 (전자상거래업) 대표</li>
            <li>2019 도매꾹도매매 우수전문셀러</li>
            <li>2019 원스톱 생존코스 강사</li>
            <li>2019 빅데이터 기반 e커머스 실천 창업강사</li>
            <li>2017 스타트업 기업분석 프리젠테이션 콘테스트 대상</li>
            <li>2016 소셜크리에이터 리그 수상</li>
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
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_01.jpg" alt="" >
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
                <li><i>289,000원</i><br> <span>10%할인</span><br> 260,100원</li>
                <li>월 <span>4만원</span>대</li>
                <li>
                    수강기간 : 6개월<br>
                    수강대상 : 온라인 쇼핑몰 창업 입문부터 가능
                </li>
            </ul>
            <div class="evt02-txt">
                <div>* 런칭기념 혜택 안내</div>
                <ul>
                    <li>사전예약 10%할인, 월4만원대 수강료</li>
                    <li>쇼핑몰 통합관리 솔루션 '샵플링' 1개월 포함<br>
                        (스탠다드 버전 27만원 상당)<br>
                        <a href="https://njob.stage.willbes.net/m/support/notice/show/cate/?board_idx=268601" target="_blank">☞ 샵플링 이용안내 </a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="tab02">
        <div class="evtCtnsBox evt03">
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/v8vHoj2Cpt8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="evt03Txt01">
                안녕하세요. 올해 대학을 졸업했고,<br>
                대학 졸업 전 취업보다는 창업을 선택해,<br>
                무재고로 쇼핑몰 사업을 하고 있는  <br>
                <span class="NSK-Black">버킷리스터 대표 황채영</span>입니다. 
            </div>
        </div>
        
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_02.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                저는 대학교 졸업 전, 과일판매  창업, 취업, 정부 사업 등 <br>
                다양한 도전을 했습니다.<br>
                <br>
                이때 많은 실패들을 경험하고 <br>
                무언가를 다시 도전하기가 두려워지더라구요.<br>
                <br>
                그리고 제가 생각한 건, <br>
                무조건 이기는 사업만 해야겠다는 것입니다.<br>
                <br>
                저는 금수저도 아니었고 , <br>
                부모님의 도움도 전혀 받지 않았습니다. <br>
                관련 전문 자격이나 기술도 없었습니다.<br>
                <br>
                그렇다고, 절대 저에게 <br>
                대단한 무언가가 있는 것도 아니었어요
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_03.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                저는 단지, 평범한 대학생이였습니다.<br>
                엑셀은 프로그램 여는 것만 가능했고,<br>
                단지 노트북으로 인터넷 서칭하는 정도의 능력만 가지고
                시작했습니다.<br>
                제게 있는 건, 시간과 열정 뿐이었습니다!<br>
                여러분도 마음만 있다면 누구나 도전 가능합니다
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_04.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                제가 가능했던  사업은 바로 <br>
                ‘B2B 무재고 배송대행’ 사업입니다!<br>
                <br>
                운영을 위해 상품을 쌓아두지 않아도 된다는 점, <br>
                그러니까 재고도 없고 리스트도 없는 사업이죠<br>
                <br>
                이러한 점들은, <br>
                더욱 과감하게 부담 없이 도전해 볼 수 있는 계기였습니다.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_05.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                창업 후 초반에 전, <br>
                크고 작은 시행착오를 겪었습니다.<br>
                상품 소싱부터 상품등록, 주문처리 등 <br>
                혼자서 감당해야 할 일들이 많았습니다.<br>
                <br>
                학교를 다니는 학생으로서, <br>
                그리고 창업한 사업가로서 여러가지 걱정에,<br>
                잠을 개운하게 잔 날이 손에 꼽을 정도였습니다.<br>
                <br>
                당시의 제가<br>
                조금 더 집중해야 될 방향을 알았다면 참 좋았을 텐데 말이죠.<br>
                <br>
                그래서,<br>
                여러분에게 그 역할, 제가 해드리겠습니다.<br>
                <br>
                이미, 오프라인 강의를 통해 많은 분들에게 <br>
                온라인 창업 노하우를 전달하고 있는데요.<br>
                <br>
                지금 이 시간에도 많은 수강생분들이 <br>
                교육을 수강하고 난 후, <br>
                실제 매출을 경험하면서 계속해서 발전해 나가고 있습니다.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_06.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                제가 알려드리는 온라인 창업은,<br>
                단순히 촉이나 감에 의해 운영하는 그런 사업이 아닙니다.<br>
                <br>
                바로, <br>
                <br>
                스마트스토어를 비롯한 <br>
                8대 오픈마켓과 소셜커머스로<br>
                한 번에 상품등록을 하고 주문 처리하며<br>
                데이터를 분석하고 나에게 맞게 적용시키는 방법!<br>
                <br>
                이것이 핵심 노하우 입니다.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_07.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                이와 더불어, 무재고 쇼핑몰 셀러로서 ‘놓치지 않았으면’ <br>
                하는 부분들을 담았습니다.<br>
                <br>
                큰 목표가 아닌,<br>
                강의의 커리큘럼만을 여러분들의 목표로 생각해주시고 <br>
                함께 따라오신다면<br>
                무조건 이기는 사업, 여러분도 충분히 하실 수 있습니다.<br>
                <br>
                특히, 저와 같은 자본이 부족한 분들이라면, <br>
                안성맞춤 사업이 바로 무재고 배송대행 사업입니다.<br>
                <br>
                대학생이었던 제가 많지 않은 돈으로 창업을 하고<br>
                매출을 일으켰듯 말이죠.<br>
                <br>
                <br>
                잠깐! <br>
                무재고 배송대행 사업의 특징은,<br>
                상품의 대량 등록이 가능한 <br>
                온라인통합솔루션 “샵플링”을 사용한다는 점인데요.<br>
                <br>
                샵플링은 사업 운영 시 해야하는 ‘반복작업’을 줄여줍니다.<br>
                <br>
                익숙해지는데 다소 시간이 걸리지만, <br>
                익숙해지면 내 사업의 큰 무기가 될 수 있습니다. 
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_08.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                두 가지를 모두 잡기 위한 도구 ‘샵플링’을 활용하면!<br>
                보다 간편하게 대량의 상품을 <br>
                위탁상품 소싱부터 등록/주문 수집 / 발주 등의 상품 관리가<br>
                한 번에 가능합니다 
            </div>
        </div>
    </div>  

    <div id="tab03">
        <div class="evtCtnsBox evt05">
            <h5 class="NSK-Black">
                무재고 배송대행<Br>
                도매매 샵플링 <Br>
                반드시 이기는<Br>
                사업을 위한 커리큘럼
            </h5>
            <div class="evt05Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
            <div class="curriculum">
            	<dl>
                    <dt>1. 무재고 쇼핑몰 창업 시작 (창업준비 및 성공하는 창업 스케줄러)</dt> 
                    <dd>1) 무재고 쇼핑몰을 해야하는 이유</dd>
                    <dd>2) 도매매와 샵플링으로 만드는 무재고 쇼핑몰</dd>
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
                    <dd>3) 따라하면 성공하는 창업 스케쥴러 </dd>
                    <dd>4) 시간을 절약하는 업무 툴 추천</dd>
                    <dd>5) 사업자등록 및 쇼핑몰 입점</dd>
                </dl>
                
                <dl>
                    <dt>2. 상품등록 (샵플링 프로세스 이해하기)</dt>
                    <dd>1) 빠르고 쉽게 상품 소싱하는 방법</dd>
                    <dd>2) 계절 / 시즌 / 365일 상품 소싱 방법</dd>
                    <dd>3) 샵플링 프로세스</dd>
                    <dd>4) 상품명, 카테고리, 상세페이지 수정</dd>
                    <dd>5) 상품 개별 수정과 대량 수정</dd>
                    <dd>6) 묶음불가와 묶음배송의 차이</dd>
                    <dd>7) 묶음불가 기본정보 세팅 (오픈마켓, 소셜커머스)</dd>
                    <dd>8) 묶음불가 상품등록</dd>
                    <dd>9) 묶음배송 업체 선정 방법</dd>
                    <dd>10) 묶음배송 기본정보 세팅 (오픈마켓, 소셜커머스)</dd>
                    <dd>11) 묶음배송 상품등록</dd>
                    <dd>12) 묶음 상품 그룹 생성</dd>
                </dl>
                
                <dl>
                    <dt>3. 상품관리 (상품 동기화 및 샵플링 DB관리)</dt>
                    <dd>1) 동기화와 판매기간 연장</dd>
                    <dd>2) 판매된 상품 샵플링 속 관리 방법</dd>
                    <dd>3) 샵플링 DB 정리 방법</dd>
                    <dd>4) 샵플링 상품 DB 직접 등록</dd>                        
                </dl>
                
                <dl>
                    <dt>4. 주문처리 (쇼핑몰 주문 수집하기 및 반품/취소 처리)</dt>
                    <dd>1) 쇼핑몰 주문수집하기</dd>
                    <dd>2) 운송장 쇼핑몰 전송</dd>
                    <dd>3) 취소 처리 방법</dd>
                    <dd>4) 반품/교환 처리 방법</dd>
                    <dd>5) 못 받은 반품 비 받는 꿀팁</dd>
                </dl>
                
				<dl>
                    <dt>5. C/S 줄이기 (포토샵 없이 이미지 편집하기)</dt>
                    <dd>1) HTML을 활용한 배송공지 만들기</dd>
                    <dd>2) 포토샵 없이 이미지 편집하기</dd>
				</dl>
                
                <dl>
                    <dt>6. 회계관리 (쇼핑몰 정산 관리 및 회계 엑셀 만들기)</dt>
                    <dd>1) 온라인 쇼핑몰 정산 관리</dd>
                    <dd>2) 온라인 셀러를 위한 회계 엑셀 만들기</dd>
                    <dd>3) 돈을 모으는 통장 관리법</dd>
                </dl>
                
                <dl>
                    <dt>7. 사업확장 (판매채널 늘리기 및 확장기획)</dt>
                    <dd>1) 판매 채널 늘리기</dd>
                    <dd>2) 유통 사업 확장 기획</dd>
                    <dd>3) 쇼핑몰 광고 개념</dd>
                </dl>
                
                <dl>
                    <dt>Chapter 7. 외부 유입으로 고객을 모아보자</dt>
                    <dd>30강 네이버 블로그로 외부유입에 대한 감을 잡자</dd>
                    <dd>31강 스마트스토어 유입을 위한 블로그 상위노출 방법</dd>
                    <dd>32강 잠들어있는 내 SNS 계정, 마케팅 창구로 활용하기</dd>
                    <dd>33강 대세는 유튜브! 유튜브 컨텐츠로 마케팅하기</dd>
                    <dd>34강 이제는 미디어 커머스! 유튜브로 매출을 끌어올리는 비결</dd>
                </dl>
                
                <dl>
                    <dt>8. 정부지원 사업 활용 노하우</dt>
                    <dd>1) 무료로 사무실 구하기</dd>
                    <dd>2) 정책자금 알아보기</dd>                        
                </dl>
                 
                <dl>
                    <dd>(*커리큘럼은 사정에 따라 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.)</dd>
                </dl>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_09.jpg" alt="커리큘럼" >
        </div>            
        
    </div>

    <div id="tab04">
        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_10.jpg" alt="BEST 수강후기" >
            <div class="columns">
                <div>
                    <h4>신*화 대표님</h4>
                    <p></p>
                    스터디끝나고 고민하시는 분들에게 완전 강추합니다. 정문진 강사님과는 다르게 또 다른 스타일로 알차게 커리큘럼이 짜여있어서 좋았습니다. 
                </div>  
                <div>
                    <h4>김*훈 대표님</h4>
                    <p></p>
                    쇼핑몰을 처음 시작하면서 여러 실수도 많고 어려움도 많았습니다. 황채영 선생님을 만나 제가 몰랐던 부분들을
                    많이 채워갔습니다. 쇼핑몰 기본부터 판매전략, 상품관리, 운영관리, 그리고 문제해결까지.<br>
                    소핑몰 운영에 관련하 새로운 관점과 노하우를 많이 얻어가는 기회였습니다. 선생님께 다시한번 감사의 말씀을 전합니다.
                </div> 
                <div>
                    <h4>박*현 대표님</h4>
                    <p></p>
                    수업시간에 알기쉽게 설명해 주시고 질의에 대해서도 잘 답변해주셔서 감사했습니다. 그리고 수업시간 외에 개인적으로
                    질문했을 때에도 친절하게 답변해주셔서 감동이었답니다! 2020년 첫 수업 같이해서 좋았어요^^ <br>
                    서로 번창해서 다시 만나요 ^^!
                </div>  
                <div>
                    <h4>이*원 대표님</h4>
                    <p></p>
                    강사님의 친절한 강의에 모르는 부분을 많이 알 수 있는 교육이였습니다. 초보셀러인 저에게는 많은 도움이 되었습니다.<br>
                    감사합니다.
                </div> 
                <div>
                    <h4>조*희 대표님</h4>
                    <p></p>
                    샵플링을 처음 활용해봐서 시작할 때는 많이 힘들었는데 강사님께서 귀에 쏙쏙 들어오게 알려주셔서 잘 배웠습니다. 
                    강사님의 도움으로 많이 성장했습니다. 프로그램 활용하기에는 아직 미흡한 점이 많지만 알려주신 내용을 토대로
                    열심히 해보겠습니다 :)
                </div>
                <div>
                    <h4>김*아 대표님</h4>
                    <p></p>
                    정적으로 가르쳐 주셔서 한 달간 감사했습니다. 많이 배운 것 같은데 여전히 많이 어렵습니다 선생님^^ 
                    어린 나이에 그 자리에 왜 계신지 알 것 같은 시간이였습니다.
                </div>        
            </div>                
        </div>

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565M_11.png" alt="BEST 수강후기" >
            <ul>
                <li>
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
                    <span class="NSK-Black">지금, 사전예약 </span>
                    신청하고 1억 만들기 도전! → 
                    </a>
                </li>
            </ul>
        </div>	
    </div>

    <div class="evtCtnsBox evtFooter">
        <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

        <p># 런칭기념  이벤트 안내</p>
        <div>강좌는 내 강의실 > 수강 중 강좌에서 확인 가능합니다.</div>

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
            <li>강좌비*에서 기수강 강의수에 대한 금액* 및 위약금*(강의 정상가의 10%)을 차감 후 부분 환불이 진행됩니다.<br>
            * 강좌비: 결제금액에서 서비스프로그램 등 추가 혜택에 해당하는 금액을 차감한 순수강좌비<br>
            * 기수강강의 금액: 결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수)<br>
            * 수강시작일로부터 7일 이내 위약금 없음<br>
            * 수강시작일로부터 7일 이후 위약금 적용 (정상가의 10% 공제) </li>
            <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.<br>
            (샵플링 프로그램 1개월 정가 275,000원 기준 환불시 기사용분 차감)</li>
            <li>환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
            <li>총강의수 전체 기수강 시에는 전액환불이 불가합니다.</li>
        </ul>

        <p># 기타유의사항</p>
        <ul>
            <li>제공되는 사은혜택과 동영상은 구분하여 별도구매 불가합니다.</li>
            <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다. </li>
            <li>수강혜택 사은품으로 발급된 인증코드 및 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
            <li>지급된 샵플링 프로그램 이용을 위해서는 사업자등록번호가 필요합니다. (2020년 4월 9일 이전 별도 공지)</li>
            <li>수강상품 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
            <li>결제 완료 시 강의는 즉시 수강 시작되오니, 이 점 참고 부탁 드립니다.</li>
        </ul>

        <div>※ 이용문의 : 고객만족센터 1544-5006</div>
    </div>        
</div>
<!-- End Container -->
<div class="btnbuy NSK-Black">        
    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
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