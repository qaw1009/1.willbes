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
    .evt02 .price li:nth-child(1) span {color:#3a99f0}
    .evt02 .price li:nth-child(2) {margin-bottom:30px;}
    .evt02 .price li:nth-child(2) div {border-radius:10px; background:#3a99f0; color:#fff}
    .evt02 .price li:nth-child(3) {margin-bottom:30px; text-align:center}
    .evt02 .price li:nth-child(3) dl {position:relative; line-height:1; margin:0 auto;}
    .evt02 .price li:nth-child(3) dd {font-size:1.2rem; margin-top:5px;}
    .evt02 .price li:nth-child(3) dd span {font-size:3rem; color:#3a99f0}
    .evt02 .price li:nth-child(3) dl:after {content:""; display:block; clear:both}
    .evt02 .price li:nth-child(4) {font-size:1.6rem; }
    .evt02 .price li:nth-child(4) i {color:#a3a3a3; text-decoration: line-through;}
    .evt02 .price li:nth-child(4) span {color:#fff; border-radius:5px; background:#ff0000; padding:0 5px}
    .evt02 .price li:nth-child(5) {color:#ff0000; font-size:2.4rem}
    .evt02 .price li:nth-child(5) span {font-size:3.4rem}
    .evt02 .price li:nth-child(6) {text-align:left; color:#414141; font-size:1.1rem}
    .evt02 .evt02-txt {background:#363636; color:#fff; border-radius:0 0 10px 10px; text-align:left; padding:20px; }
    .evt02 .evt02-txt div {font-size:1.5rem}
    .evt02 .evt02-txt li {list-style: decimal; margin-left:30px}

    .evt03 {background:#fff; padding-top:50px}
    .evt03 .evt03Txt01 {color:#3a99f0; font-size:1rem; margin-bottom:30px; padding:0 20px} 

    .evt04 .evt04Txt01 {margin-bottom:30px; padding:20px; text-align:left}

    .evt05 {text-align:left; padding:0 20px}
    .evt05 h5 {color:#383368; font-size:2.2rem; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
    .evt05 .evt05Txt01 { font-size:1.6rem;}
    .evt05 .curriculum {margin:30px 0}
    .evt05 dl {margin-top:30px;}
    .evt05 dl:first-child {margin:0}
    .evt05 dt {font-size:16px; font-weight:bold; color:#f80700; margin-top:30px}
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

    .evt07 {background:#3a99f0; padding:20px}
    .evt07 li {display:inline; float:left; width:50%}
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
    .btnbuy a:hover {background:#3a99f0;
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
        .evt05 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}
        .evt02 .price br {display:none}
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>
<div id="pass" style="display: none">
    <input type="checkbox" name="y_pkg" value="162748" checked/>
    <input type="checkbox" id="is_chk" name="is_chk" value="Y" checked/>
</div>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <div class="evtTop01"><img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_top.jpg" alt="창업 다마고치" ></div>             
        <div class="evtTop02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_top_txt.jpg" alt="창업 다마고치" >
        </div>
        <ul>
            <li>1억뷰  N잡  창업  대표 강사</li>
            <li>유튜브 창업 다마고치 영상 6개월 누적  조회수 100만뷰 기록 </li>
            <li>‘지금 바로 돈 버는 기술’ 저자</li>
            <li>홍익대학교 게임그래픽학과 졸업</li>
            <li>네이버  대표 카페 ‘킵고잉’  공동 운영</li>
            <li>온/오프라인 강의를 통해 많은  신규 창업자를 위한 강의 진행</li>
            <li>3개의 네이버 스마트스토어  및  오픈마켓 (지마켓, 옥션, 11번가) 운영  중</li>
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
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_01.jpg" alt="창업 다마고치" >
        </div>
        <div class="evt02">
            <ul class="price NSK-Black">
                <li>1억뷰 <span>N잡</span>강의 런칭기념</li>
                <li><div>4월 한달 전강좌 10% 할인</div></li>
                <li>   
                    <dl>
                        <dd>
                            신청마감까지<br>
                            <span id="ddayCountDayText">20일</span><span id="ddayCountText">12:15:02</span><br>남았습니다.
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
            <div class="evt02-txt">
                <div>* 런칭기념 혜택 안내</div>
                <ul>
                    <li>사전예약 10%할인, 월3만원대 수강료</li>
                    <li>특별기획전을 통해 전문MD의 경쟁력있는 위탁/사입 상품 소싱, 추천</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="tab02">
        <div class="evtCtnsBox evt03">
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/pgfPkHvbVJs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="evt03Txt01">
                안녕하세요, 네이버 스마트스토어를  운영하고 있고,<br>
                유튜브에 저의 창업 성장기를 많은 분들께<br>
                공유하고 있는 <span class="NSK-Black">창업다마고치 김정환</span>입니다. 
            </div>            
        </div> 

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_02.jpg" alt="인플루언서" >
            <div class="evt04Txt01">
                평범한 직장인이었던 제가 사업가 친구가 알려주는 코칭을
                그대로 따르기만 했는데도 다마고치가 자라듯이 빠르게 성장
                할 수 있었고 그 과정에서 저만의 방법을 찾기 위한 
                수많은 시도를 거듭했습니다.<br>
                <br>
                앞서 그 길을 간 누군가가 자신의 경험을 공유해주고 
                바른 방향을 제시한다면 그리고 거기에 자신의 열망과 
                노력이 더해진다면, 창업을 통해 소득이 급격히 늘어나는 일이 
                결코 허황된 일이 아니라는 것을 저는 체험했습니다.<br>
                <br>
                저는 그동안 유튜브 채널과 저의 책을 통해 매출 0원부터 
                9천만원에 이르기까지 저의 성장기를 가감없이 보여드렸고
                이제는 강의를 통해서 제가 갔던 길을 누구나 쉽게 따라
                오실 수 있도록 도와드리려 합니다.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_03.jpg" alt="인플루언서" >
            <div class="evt04Txt01">
                이 강의에서는 제가 앞서 경험한 사업적 기술을 토대로 
                그간 공개한 적 없던 여러 시행착오들과 
                어려움 극복 과정을 통해 과거 저처럼 돈을 벌고 싶은데 
                방법을 몰라 막막해할 누군가에게 새로운 기회를 제공하고 
                싶습니다. <br>
                <br>
                맨땅에 헤딩만 하기보다, 우여곡절만 겪기보다, 
                제대로 시작도 못하고 포기하기보다, 
                적어도 돈을 벌 수 있는 발판을 마련하는 데 
                보탬이 되기를 바라는 마음으로<br>
                <br>
                팔리는 상세 페이지 만드는 법부터 유튜브로 
                수익 창출하는 비법은 물론, 장사의 본질을 이해하는 것과 
                사업 기초를 다지는 기술까지 안내해 드리겠습니다!
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_04.jpg" alt="인플루언서" >
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/_yVIa13RFW8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_05.jpg" alt="e커머스 강좌소개" ><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_06.jpg" alt="e커머스 강좌소개" ><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_07.jpg" alt="e커머스 강좌소개" ><br>
            <div class="evt04Txt01">
                첫째, 상품발굴<br>
                경쟁력 있는 상품을 선별하여 제공해드립니다!<br>
                <br>
                어쩌면 제품을 ‘파는 것’ 보다  
                판매할 제품을 ‘사는 것’이 더 중요하다고 할 수 있습니다. 
                가격과 품질 경쟁력을 갖추면 판매는 어렵지 않습니다. 
                이것이 ‘상품 소싱’의 중요성입니다.<br>
                <br>
                판매할 제품을 직접 구매하여 판매하는 ‘사입‘ 방식, 
                그리고 재고없이 공급처에서 직접 발송까지 책임지는 
                ‘위탁판매’ 까지! 방법만 알려드리는 것이 아니라, 
                국내 1위 온라인 B2B 플랫폼과의 제휴를 통해
                강의 수강생들에게 좋은 품질에 가격 경쟁력도 갖춘 
                제품과 공급처를 제공해드립니다.<br>
                강의를 보면서 스마트스토어를 개설하고 강의와 함께
                상품도 제공하여 빠르게 매출도 발생시킬 수 있도록 
                지원하겠습니다.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_08.jpg" alt="e커머스 강좌소개" ><br>
            <div class="evt04Txt01">
                둘째, 외부유입<br>
                다른 강의에서 흔하게 알려주는 SEO가이드를 따르고 
                검색 최적화를 해서 노출을 늘리는 방법은 더 이상 통하지
                않습니다.<br>
                <br>
                예전에는 이를 등한시하는 판매자가 많았기 때문에 , 
                그것만으로도 경쟁력 있었지만 
                이제는 힘듭니다.  <br>
                <br>
                매뉴얼에 나와있는 내용은 누구나 알고 있는 방법이고 
                당연히 해야 하는 것이기 때문이죠.<br>
                그래서 외부 유입을 만드는 게 중요한데요. <br>
                특히 많은 사람들이 인터넷상에서 시간을 보내는 
                유튜브, SNS, 네이버 등에서 고객을 끌어와야 합니다. 
                강의에서 그 방법에 대해서도 자세히 알려드립니다.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_09.jpg" alt="e커머스 강좌소개" ><br>
            <div class="evt04Txt01">
                셋째, 설득력 높은 상세페이지<br>
                열심히 등록한 내 상품이 팔리지 않는 이유?<br>
                <br>
                사진만 고퀄리티로 찍는다고 상품이 잘 팔릴까요?<br>
                만약, 같은 상품이라도 사진 한 장만 등록 되어 있는 
                상세페이지와 실제 판매자가 사용하는 모습과 리뷰가 담긴
                영상이 있는 상세페이지가 있다면, 
                어떤 것을 선택하시겠어요?<br>
                <br>
                이를 해결하기 위해, <br>
                상품의 상세페이지 만드는 과정에 대한 정보도 자세하게
                알려드립니다.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_10.jpg" alt="e커머스 강좌소개" ><br>
        </div>
    </div>  

    <div id="tab03">
        <div class="evtCtnsBox evt05">
            <h5 class="NSK-Black">
                가장 현실적인<Br>
                월 100만원 만들고<Br>
                지금 바로 시작할 수 있는<Br>
                커리큘럼
            </h5>
            <div class="evt05Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
            <div class="curriculum">
            	<dl>
                    <dt>INTRO</dt> 
                    <dd>1강 월 수익 100만원,  스마트스토어가 가장 현실적인 이유?</dd>
                    <dd>2강 ‘지금 바로 시작하는 스마트스토어’ 강의를 제대로 활용하는 방법</dd>
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
                                <li><a href="#none">1강 맛보기 수강 준비중 ></a></li>
                                <li><a href="#none">2강 맛보기 수강 준비중 ></a></li>
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
                    <dt>Chapter 1.스마트스토어 개설하기</dt>
                    <dd>3강 나만의 쇼핑몰 만들자! 스마트스토어 개설하기</dd>
                    <dd>4강 스마트스토어를 운영을 위해 꼭 필요한 것들</dd>
                </dl>
                
                <dl>
                    <dt>Chapter 2. 위탁판매로 재고 없이 소자본 창업하기</dt>
                    <dd>5강 재고 부담이 없는 판매 방식! 위탁판매란 무엇일까?</dd>
                    <dd>6강 스마트스토어에 위탁판매 상품 등록하기</dd>
                    <dd>7강 잘 팔리는 상품명 만드는 방법</dd>
                    <dd>8강 상품을 업로드할 때 주의해야 할 것들</dd> 
                    <dd>9강 네이버 검색광고로 유입량 늘리는 방법</dd>
                    <dd>10강 감동의 첫 주문! 위탁상품 고객께 발송하기</dd>
                    <dd>11강 친절하고 냉정하게! 고객응대와 멘탈관리</dd>
                    <dd>12강 고객이 어떻게 찾아왔을까? 유입경로 분석하기</dd>
                </dl>
                
                <dl>
                    <dt>Chapter 3. 도매상품 사입 판매로 매출 만들기</dt>
                    <dd>13강 소싱 (사입)판매란 무엇인가? 위탁판매와 차이점</dd>
                    <dd>14강 무엇을 팔아야 할까? 사업아이템 정하기</dd>
                    <dd>15강 경쟁력 있는 상품을 찾는 방법</dd>
                    <dd>16강 이제는 실전이다! 도매로 상품 사입하기</dd>
                    <dd>17강 치열한 경쟁을 이겨내는 만능 열쇠? 나만의 브랜드 만들기!</dd>
                    <dd>18강 설득의 심리학! 상세페이지 만들기</dd>
                    <dd>19강 고객의 평가를 결정하는 제품포장과 발송</dd>
                    <dd>20강 단골 만들기! 구매평과 재구매를 만드는 방법</dd>
                </dl>
                
				<dl>
                    <dt>Chapter 4. 중국 소싱으로 마진 극대화</dt>
                    <dd>21강 1688에서 원하는 상품을 찾아 내는 방법</dd>
                    <dd>22강 생각보다 쉬운 개인 무역! 중국에서 직접 수입하기</dd>
                    <dd>23강 수입 통관절차 및 제품 받아보기</dd>
				</dl>
                
                <dl>
                    <dt>Chapter5. 나도 글로벌 셀러, 해외구매대행 사업</dt>
                    <dd>24강 부업으로도 최고! 해외구매대행 사업</dd>
                    <dd>25강 타오바오 상품을 내 스마트스토어에서 판매하기</dd>
                    <dd>26강 배송대행지를 이용한 상품 발송</dd>
                </dl>
                
                <dl>
                    <dt>Chapter 6. 매출을 확대를 위한 오픈마켓 진출</dt>
                    <dd>27강 판매채널 확장하기! 오픈마켓 비교 분석</dd>
                    <dd>28강 1688 수입상품, 도매 사이트에서 동시에 판매하는 방법 </dd>
                    <dd>29강  오픈마켓 상품 업로드, 솔루션으로 해결하기</dd>
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
                    <dt>Chapter 8. 아웃소싱으로 사업규모 키우기 </dt>
                    <dd>35강 3자물류(3PL)로 택배포장에서 벗어나자</dd>
                    <dd>36강 이제는 세금과의 싸움, 초보 창업자의 세금처리에 대해</dd>
                    <dd>37강 디지털 노마드가 되어 볼까요?</dd>
                </dl>
                 
                <dl>
                    <dt>OUTRO</dt>
                    <dd>38강 여러분의 경제적 자유를 응원합니다.</dd>
                </dl>
            </div>
        </div>
    </div>

    <div id="tab04">
        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_11.jpg" alt="BEST 수강후기" >
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
        </div>
        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_12.png" >
            <ul>
                <li>
                {{--<a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/162748" target="_blank">--}}
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'])}}');">
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
        </ul>

        <div>※ 이용문의 : 고객만족센터 1544-5006</div>
    </div>

    <div class="btnbuy NSK-Black">        
{{--        <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/162748" target="_blank"><span class="NSK">미리 신청하면 24%할인!</span><br>--}}
        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'])}}');">
        [온라인강의] 신청하기 ></a>
    </div>

    
</div>
<!-- End Container -->
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