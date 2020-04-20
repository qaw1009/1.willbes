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
    .evt02 .price li:nth-child(1) span {color:#6664ff}
    .evt02 .price li:nth-child(2) {margin-bottom:30px;}
    .evt02 .price li:nth-child(2) div {border-radius:10px; background:#6664ff; color:#fff}
    .evt02 .price li:nth-child(3) {margin-bottom:30px; text-align:center}
    .evt02 .price li:nth-child(3) dl {position:relative; line-height:1; margin:0 auto;}
    .evt02 .price li:nth-child(3) dd {font-size:1.2rem; margin-top:5px;}
    .evt02 .price li:nth-child(3) dd span {font-size:3rem; color:#6664ff}
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
    .evt03 .evt03Txt01 {color:#6664ff; font-size:1rem; margin-bottom:30px; padding:0 20px}  

    .evt04 .evt04Txt01 {margin-bottom:30px; padding:20px; text-align:left}
    .evt04 .evt04Txt01 strong {font-size:1.1rem}

    .evt05 {text-align:left; padding:0 20px}
    .evt05 h5 {color:#6664ff; font-size:2.2rem; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
    .evt05 .evt05Txt01 { font-size:1.6rem;}
    .evt05 .curriculum {margin:30px 0}
    .evt05 dl {margin-top:30px;}
    .evt05 dl:first-child {margin:0}
    .evt05 dt {font-size:16px; font-weight:bold; color:#6664ff; margin-top:30px}
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

    .evt07 {background:#6664ff; padding:20px}
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
    .btnbuy a:hover {background:#6664ff;
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
    <input type="checkbox" name="y_pkg" value="162746" checked/>
    <input type="checkbox" id="is_chk" name="is_chk" value="Y" checked/>
</div>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <div class="evtTop01"><img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_top.jpg" alt="창업 다마고치" ></div>             
        <div class="evtTop02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_top_txt.jpg" alt="창업 다마고치" >
        </div>
        <ul>
            <li>도매꾹 평생교육원 대표강사</li>
            <li>문구/사무용품 스마트스토어 BEST TOP 10</li>
            <li>무재고 배송대행 파워셀러</li>
            <li>온라인 쇼핑몰 통합 솔루션 샵플링 전문강의</li>
            <li>온라인 쇼핑몰 통합 솔루션 샵플링 마스터과정</li>
            <li>도매매 무재고 배송대행 전문셀러 스터디그룹</li>
            <li>도매매 무재고 배송대행 전문셀러 입문세미나</li>
            <li>1인 쇼핑몰 창업자 스마트워킹 노하우 강의</li>
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
                    <iframe src="https://www.youtube.com/embed/QZUkyd8EluI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="evt03Txt01">
                안녕하세요. 잘 나가는<br>
                <span class="NSK-Black">유통선배 정문진</span>입니다. 
            </div>
        </div>  
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_02.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                저는 2017년부터 <br>
                도매꾹/도매매와 온라인 창업에 대한 내용을 교육 중이며 <br>
                지금까지 약 2,500명의 온라인 창업 교육생을 배출했습니다.<br>
                <br>
                이 중 70%의 수강생들이 실제 온라인 창업을 했고<br>
                많은 분들이 매출을 내고 있습니다.
            </div>

            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_03.jpg" alt=" " >
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_04.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                월 초마다 진행하는 입문 세미나 강의 시간, <br>
                창업을 꿈꾸는 분들한테 제가 꼭 전하는 말이 있습니다.<br>
                <br>
                “처음으로 돌아가서 온라인쇼핑몰 어떻게 시작할래? <br>
                라고 묻는다면, 저는 주저 없이 <br>
                <br>
                <strong>"시작은 무재고 배송대행 창업으로 시작할래"</strong><br>
                라고 이야기할 것입니다
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_05.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                저의 첫 사업,<br>
                지인을 통해 문구류를 온라인에 판매한 게 그 시작이었습니다.<br>
                <br>
                올려놓은 250개의 상품 중 한 달 내 일어난 판매. <br>
                거의 ‘0’에 가까웠습니다.<br>
                <br>
                당시, 저에겐 모든 것이 난관이고 벽이었죠.<br>
                <br>
                상품 판매도 어렵지만,<br>
                등록, 상세페이지 디자인, 고객클레임 상담 등<br>
                사소한 문제들에 어려움을 겪고 많이 힘들었습니다.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_06.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                그리고 자본의 문제..<br>
                상품을 홍보하기 위해 광고비도 많이 사용했고,<br>
                투자에 대한 부담이 많았습니다.<br>
                자본 문제는 곧 생존과 연결되어 있었기 때문이죠.<br>
                <br>
                당시, 수 많은 창업 강의를 들었고 <br>
                많은 사람들을 만나 고민을 나누기도 했습니다.<br>
                <br>
                그리고 어렵게 찾게 된 돌파구,<br>
                <br>
                큰 자본을 투자하지 않고 ‘소자본’으로 <br>
                상품을 미리 사입하지 않고 큰 리스크 없이 시작할 수 있는<br>
                <strong>“무재고 배송대행” 사업이었습니다.</strong>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_07.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                기존에는 선구매 후 판매를 해서 리스크가 컸다면,<br>
                ‘무재고 배송대행’은 <br>
                선 판매 후 데이터에 근거해서 상품을 매입할 수 있습니다.<br>
                <br>
                저 역시, 무재고 배송대행 사업으로, <br>
                쇼핑몰 비수기까지 무사히 넘길 수 있었죠<br>
                <br>
                그리고 덕분에,<br>
                <strong>‘네이버 스마트스토어 문구/사무용품 top10’에도 들고,<br>
                월 2억 원의 매출을 올리기도 했습니다.</strong><br>
                <br>
                또한, 무재고 배송대행 사업을 통해 <br>
                상품 판매 데이터를 가지고<br>
                ‘상품보는 눈’을 기르고 시작한다면,<br>
                <br>
                나에게 맞는 상품들을 추가 판매해<br>
                훨씬 안정적으로 쇼핑몰을 키워나갈 수 있지 않을까<br>
                생각합니다.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_08.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                함께 하시는 분들이 기본을 충실히 다질 수 있도록 , <br>
                그리고 다양한 각도에서 확인 할 수 있도록 <br>
                강의를 통해 도와드리겠습니다.<br>
                <br>
                기본을 바탕으로, <br>
                당연히 매출을 올릴 수도 있겠죠.<br>
                <br>
                창업 교육 이후 <br>
                창업자의 70%가 사업자를 내고, 이 분들은 판매 데이터를<br>
                활용해, 본인에게 맞는 상품을 판매하고 있습니다.<br>
                <br>
                수강생분들은 20대에서 50대까지 연령대가 다양하며<br>
                <br>
                <strong>학생, 주부, 직장인, 은퇴자 등 각자의 위치에서 <br>
                투잡 혹은 N잡으로 온라인 창업을 통한 <br>
                매출을 내고 있습니다.</strong>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_09.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                노력하고 시간을 투입한 만큼 결과를 얻는 게 <br>
                배송대행 전문셀러입니다. <br>
                <br>
                초기에 포기하지 말고 <br>
                꾸준히 노력한다면 좋은 결과를 얻을 수 있습니다.<br>
                이 강의는 온라인 창업 입문자를 대상으로 <br>
                기초부터 배우는 강의로 <br>
                기초부터 탄탄하게 배우길 원하는 <br>
                모든 초보 창업 준비생들에게 추천합니다. 
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_10.jpg" alt=" " >
            <div class="evt04Txt01 mb100">
                또한, <br>
                데이터를 분석할 수 있는 기본도구는 물론, <br>
                상세한 DB 조사방법, 쇼핑마스터, <br>
                현재 가장 인기있는 셀러들의 핫 트랜드 키워드까지 <br>
                세밀한 정보까지 모두 제공해 드립니다!<br>
                <br>
                이 강의에서는 광고 개념을 이해하고 <br>
                로그 분석을 할 수 있는 방법과 <br>
                소비자가 찾고 이용하는 키워드도 분석해 봅니다.<br>
                <br>
                그러면 잘 팔리는 상품군이 무엇인지<br>
                보다 자세히 파악할 수 있죠.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_11.jpg" alt=" " >
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
                ‘10년차 쇼핑몰 업계<br>
                전문 강사 단아쌤이<br>
                알려주는 전문 커리큘럼
            </h5>
            <div class="evt05Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
            <div class="curriculum">
            	<dl>
                    <dt>Chapter1. 쇼핑몰 창업 준비 사항</dt> 
                    <dd>- 사업자신고 (온오프라인) 사업자등록증 발급방법</dd>
                    <dd>- 구매안전서비스 이용 확인증 발급방법</dd>
                    <dd>
                        <ul>
                            @if(empty($arr_base['promotion_otherinfo_data']) === false)
                                @php $i = 1; @endphp
                                @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                    {{-- <li><a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD", "{{config_item('starplayer_license')}}");'>{{$i}}강 맛보기 수강 ></a></li> --}}
                                    <li>
                                        <p>{{$i}}강 맛보기 수강 ▼</p>
                                        {{--<a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=WD", "{{config_item('starplayer_license')}}");' class="btnst01">WIDE ></a>--}}
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
                    <dd>- 통신판매업 신고 방법 </dd>
                    <dd>- 오픈마켓 입점 방법</dd>
                    <dd>- 샵플링 가입 및 안내</dd>
                </dl>
                
                <dl>
                    <dt>Chapter2. 쇼핑몰 운영을 위한 유용한 정보</dt>
                    <dd>- 필수 프로그램 이용방법<Br>
                        주문,클레임 알림 이용방법<Br>
                        캡처도구 이용방법</dd>
                    <dd>- 유용한 정보<Br>
                        무료팩스 이용방법<Br>
                        무료스캐너 이용방법<Br>
                        PC에서 문자 수발신 프로그램 이용방법<Br>
                        네이버 비즈넘버를 활용 한 가상 번호 받는 방법</dd>                        
                </dl>
                
                <dl>
                    <dt>Chapter3. 쇼핑몰 운영을 위한 통합 솔루션 기본 설정법</dt>
                    <dd>- 도매매 API 연동하기</dd>
                    <dd>- 쇼핑몰 연동 하기(오픈마켓)</dd>
                    <dd>- 쇼핑몰 기본 정보 설정 방법</dd>
                    <dd>- G마켓 (상품등록 1.0, 상품등록 2.0)</dd>
                    <dd>- 옥션 (상품등록 1.0, 상품등록 2.0)</dd>
                    <dd>- 11번가 (일반상품 / 단일상품)</dd>
                    <dd>- 인터파크</dd>
                    <dd>- 스마트 스토어</dd>
                </dl>
                
                <dl>
                    <dt>Chapter4. 좋은 상품 소싱하는 방법과 우수 공급사 찾기</dt>
                    <dd>- 시즌상품 키워드 선정방법 (ESM 시즌키워드)</dd>
                    <dd>- 상품판매 주기 확인방법 (네이버 데이터랩)</dd>
                    <dd>- 도매매 사이트 내 우수 상품 및 공급사 찾는 방법</dd>
                </dl>
                
				<dl>
                    <dt>Chapter5. 대량으로 쇼핑몰 상품 등록 및 발주하기</dt>
                    <dd>- 샵플링을 통한 배송비 설정하기</dd>
                    <dd>- 샵플링을 통한 상품 대량 등록 방법</dd>
                    <dd>- 도매매 현금성 e-money 충전방법</dd>
                    <dd>- 도매매 주문 발주 방법</dd>
				</dl>
                
                <dl>
                    <dt>Chapter6. 고객 클레임 처리하는 방법</dt>
                    <dd>- 가격변동 및 품절상태 대응 방법</dd>
                    <dd>- 주문관리 절차</dd>
                    <dd>- 고객 cs처리절차</dd>
                </dl>
                
                <dl>
                    <dt>Chapter7. 상품 노출을 위한 해시태그 사용법 및 기타 운영 팁</dt>
                    <dd>- 스마트스토어 찜&톡톡 방법</dd>
                    <dd>- 11번가 인증키 설정 방법</dd>
                    <dd>- 전체상품 공지사항</dd>
                    <dd>- ebay 이미지 호스팅</dd>
                </dl>
                
                <dl>
                    <dd>(*커리큘럼은 사정에 따라 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.)</dd>
                </dl>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_12.jpg" alt="" >
        </div>
    </div>

    <div id="tab04">
        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1567M_13.jpg" alt="BEST 수강후기" >
            <div class="columns">
                <div>
                    <h4>수강생 이*경님</h4>
                    <p></p>
                    2주차 부터는 본격적으로 스토어운영 관련 키워드 분석과 시즌 상품 키워드에 대해 실천 팁을
                    아낌없이 공개해주시는 강사님! 강사님 수업이 참 매력적이에요. 조용조용 할 얘기 다 하면서 웃자고 건넨 농담에 
                    그다지 웃기지 않는 반응에 대처하는 강사님이 귀여워요.
                </div>  
                <div>
                    <h4>수강생 김*용님</h4>
                    <p></p>
                    지난주 수업이 끝나고 이번 주는 혼자서 열심히 상품 등록하고 있어요.매일 꾸준히 상품에 대해 공부하면서
                    상품 등록을 반복해야 해요. 상품 등록은 익숙하게 잘 할 수 있어요. 샵플링을 통해 등록된 상품의 주문도 들어와서
                    발주 및 운송장 처리도 해봤어요. 아직은 주문이 많지 않아 서서히 하고 있어요.
                    앞으로 주문이 많아 질 날을 기대하면서, 좋은 상품을 찾아봅니다.
                    찾고 찾아 상품등록도 해보는 중입니다.
                </div> 
                <div>
                    <h4>수강생 신*한님</h4>
                    <p></p>
                    생각했던 것 보다 더, 기대했던 것보다 훨씬 더 내용이 알차고 좋았어요.
                    정문진 대표님이 실제 경험에서 우러난 강의여서 더욱더 좋았답니다.
                    다음기회에 한 번 더 들어보고 싶어요. 정문진 대표님의 동영상 강의도 찾아서 들어보려고 합니다.
                    수고해주신 강사님게 감사한 마음을 전합니다.
                </div>        
            </div>                
        </div>
        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1567_04_02.jpg" alt="BEST 수강후기" >
            <ul>
                <li>
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'?order=Y')}}');">
                    <span class="NSK-Black">지금, 수강신청하고 </span>
                    제2의 월급통장 만들기 도전! → 
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