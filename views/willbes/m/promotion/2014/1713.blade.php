@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}
    .evtTop01 {background:#bebcbd;}
    .evtTop > ul {padding:20px }
    .evtTop > ul li {list-style:disc; margin-left:15px; margin-bottom:5px; text-align:left;}
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
    .evt02 .price li:nth-child(3) dd span:last-child {font-size:1.2rem;}
    .evt02 .price li:nth-child(4) {font-size:1.6rem; }
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
        width:100%;
    }
    .evt06 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
    .evt06 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
    .evt06 .columns div strong {font-size:bold; color:#333}

    .evt07 {background:#3a99f0; padding:20px}
    /*.evt07 li {display:inline; float:left; width:50%}*/
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
        background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2);left:0; z-index:10;
        text-align:center;
    }

    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px}
    .btnbuy a {display:block; width:100%; max-width:720px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#0099ff;}

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
        .evt02 .price br,
        .evt05 h5 br {display:none}
        .evt05 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}        
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <div class="evtTop01"><img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_top.jpg" alt="이승기 PD" ></div>             
        <div class="evtTop02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_top_txt.jpg" alt="" >
        </div>
        <ul>
            <li class="strong">윌비스 N잡 대표강사</li>
            <li>(주)브이에스엠그룹 대표이사</li>
            <li>청강문화산업대학교 외래교수</li>
            <li>대한민국 SNS대상 심사위원</li>
            <li>SNS전문가 자격증 출제위원</li>
            <li>JTB교육그룹 엠노베이션 아카데미 학과장</li>
            <li>마케팅사단 온라인마케팅연구소 연구소장</li>
            <li>(사)한국뉴미디어협회 콘텐츠분과 위원장</li>
            <li>세종로국정포럼 바이럴마케팅 위원장</li>
            <li>환경부,국토교통부,새만금개발청,한국환경공단,수협중앙회</li>
            <li>한국교육방송공사,중앙선거관리위원회,정책기획위원회  
                시흥시청,서울시민청,중소기업유통센터,서울산업진흥원 등
                공공기관 자문위원 및 평가위원</li>
        </ul>
        <span><a href="#tab03"><img src="https://static.willbes.net/public/images/promotion/2020/03/1564_pup.png" alt="맛보기강의"></a></span>       
        <div class="evtMenu">
            <ul class="tabs">
                <li><a href="#tab01" data-tab="tab01" class="top-tab">수강신청</a></li>
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
        {{--시간설정--}}
        @if(time() < strtotime('202005311159'))
        <div class="evt02">
            <ul class="price NSK-Black">
                <li><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1625" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1625_title.jpg" alt="" ></a></li>
                <li></li>
                <li>   
                    <dl>
                        <dd>
                            신청마감까지<br>
                            <span id="ddayCountDayText"></span><br><span id="ddayCountText"></span> 남았습니다.
                        </dd>
                    </dl>
                </li>
                <li>195,000원</li>
                <li>월 <span>3만원</span>대</li>
                <li>
                    수강기간 : 5개월<br>
                    수강대상 : 온라인 쇼핑몰 창업 입문부터 가능
                </li>
            </ul>           

            <div class="evt02-txt">
                <div> *  이벤트 기간  :  5월1일(금)~5.31(일) 당첨자 발표 : 6.5(금) 공지사항 참조 </div>
                <ul>
                    <li>생생한 리뷰를 남겨주시면  추첨을 통해 맛~있는 간식을 드립니다!</li>
                    <li>특별기획전을 통해 전문MD의 경쟁력있는 위탁/사입 상품 소싱, 추천<br>
                        <a href="https://njob.willbes.net/m/support/notice/show/cate/?board_idx=268597" target="_blank">☞ 기획전 이용안내 </a>
                    </li>                    
                </ul>
            </div>
        </div>
        @else
        <div class="evt01 pt80">
            <a href="https://njob.willbes.net/m/support/notice/show/cate/?board_idx=268597" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/05/1564M_01_01.jpg" alt="창업 다마고치" ></a>
        </div>
        @endif
    </div>

    <div id="tab02">
        <div class="evtCtnsBox evt03">
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/tXL-6wWRTfI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="evt03Txt01">                
                안녕하세요! <br>
                1,500개 기업에서 마케팅 강의를 <br>
                진행하고 있는 8년차,<br>
                <span class="NSK-Black">마케팅 전문가 이기용</span>입니다.
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
                    <iframe src="https://www.youtube.com/embed/1zxi4wiYXk4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                <div>1,500개 정부 및 <br>공기업 전문 강사 </div>
                <div>이기용이 알려주는 <br>전문 커리큘럼</div>
            </h5>
            <div class="evt05Txt01 NSK-Thin">우리가 배울 수 있는 과정은?<br>
            수익 창출을 위한 네이버 블로그 마케팅 新전략</div>
            <div class="curriculum">
                <dl>
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
                                <li><a href="#none">1강 맛보기<br> 수강 준비중 ></a></li>
                                <li><a href="#none">2강 맛보기<br> 수강 준비중 ></a></li>
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
                    <dt>챕터 1</dt>
                    <dd>1. 프로 N잡러 되기, 블로그로 돈 벌어볼까?<br>
                    - 8년차 유명한 마케팅전문가, 처음엔 블로거였다?</dd>
                    <dd>2. 왜 유튜브가 아닌 네이버 블로그인가?<br>
                    유튜뷰가 대세인 이시대에 블로그로?</dd>
                    <dd>3. 블로그로 월 100만원정도는 더 벌어줘야지!<br>
                    - 블로그로 수익화하는 다양한 방법 알아보기</dd>
                    <dt>챕터 2</dt>
                    <dd>4. 우선 체험단으로 생활비 절약부터!<br>
                    - 블로그전문회사 CEO가 알려주는 체험단 선정되는법</dd>
                    <dd>5. 용돈벌이 시작해볼까? 블로그기자단 시작하기<br>
                    - 블로그전문회사 CEO가 알려주는 블로그 기자단 AtoZ</dd>
                    <dd>6. 네이버 애드포스트로 수익을 UP!!<br>
                    - 애드포스트를 통해 내 수익을 추가하기</dd>
                    <dd>7. 내 제품이나 서비스를 비용들이지 않고 홍보하기!<br>
                    - 나만의 블로그를 통해 매출을 올려보자!</dd>
                    <dd>8. 월 100만원? 일을 키워볼까?<br>
                    - 남의제품만 홍보하지말고, 내제품을 찾아볼까?</dd>
                    <dd>9. 블로그로 퍼스널브랜딩하기<br>
                    - 잘하는사람? 유명한사람? 나를 브랜딩해보기</dd>
                    <dt>챕터 3</dt>
                    <dd>10. 기본적으로 알아야할 블로그 셋팅하기<br>
                    - 블로그이름,프로필 구성하기</dd>
                    <dd>11. 내 블로그의 전문성을 보여주는 카테고리 셋팅하기<br>
                    - 블로그 카테고리 구성하기</dd>
                    <dd>12. 블로그의 첫인상 제대로 꾸미기<br>
                    - 프로필과 카테고리에 꼭 들어가야할 것들은?</dd>
                    <dd>13. 블로그 이웃 꼭 늘려야하나요?<br>
                    - 블로그 이웃이 요즘에도 필요할까?</dd>
                    <dd>14. 블로그 이웃 늘려보기!<br>
                    - 블로그 이웃을 신청하고 받아줘보자!</dd>                
                    <dt>챕터 4</dt>
                    <dd>15. 네이버 알고리즘? 상위노출?<br>
                    - 알고리즘이 뭐고 상위노출이 뭔가?</dd>
                    <dd>16. C-랭크 알고리즘이 뭐길래 말이 많지?<br>
                    - C-랭크 알고리즘 파헤치기</dd>
                    <dd>17. D.I.A는 또 뭐야? 한번 알아보기<br>
                    - D.I.A 파헤치기</dd>
                    <dd>18. 네이버 블로그 글쓰기 기능 한번 짚어볼까?<br>
                    - 이정도만 알아도 블로그 글쓰는정도야 뭐</dd>
                    <dd>19. 내글이 노출이 되기 위해서는?<br>
                    - 어떻게 써야 상위노출이 잘 될까?</dd>
                    <dd>20. 사람들이 반응 하는 콘텐츠 만들기1<br>
                    - 좋은 콘텐츠 만드는 방법은?</dd>
                    <dd>21. 사람들이 반응 하는 콘텐츠 만들기2<br>
                    - 사람들은 제목을 보고 클릭한다?</dd>
                    <dd>22. 사람들이 반응 하는 콘텐츠 만들기3<br>
                    - 빅데이터를 활용해서 반응하는 콘텐츠만들기</dd>
                    <dt>챕터 5</dt>
                    <dd>23. 키워드? 그게 뭐에요?<br>
                    - 키워드가 뭔지 제대로 이해하기</dd>
                    <dd>24. 키워드가 왜 중요한가!<br>
                    - 같은말이어도 검색하는 단어가 다르다?</dd>
                    <dd>25. 사람들이 찾는 키워드는?<br>
                    - 검색광고를 통해서 사람들이 찾는 키워드 확인하기</dd>
                    <dd>26. 실제로 매출이 나오는 키워드는?<br>
                    - 조회수만 높다고 좋은 키워드가 아니다?</dd>
                    <dd>27. 수업을 마치며</dd>
                </dl>
            </div>
        </div>
    </div>

    <div id="tab04">
        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_11.jpg" alt="BEST 수강후기" >
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
        </div>
        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1564M_12.png" >
            <ul>
                <li>
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
                        <span class="NSK-Black">지금, N잡강의</span>
                        신청하고 부수입 만들기 도전! →
                    </a>
                </li>
            </ul>
        </div>	
    </div>

    <div class="evtCtnsBox evtFooter" id="infoText">
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

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
        [온라인강의] 신청하기 >
        </a>
    </div>
    <div id="pass" class="infoCheck">
        <input type="checkbox" name="y_pkg" value="162748" style="display: none;" checked/>
        <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
        <a href="#infoText">이용안내 확인하기 ↓</a>
    </div>
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
                    $is_chk.focus();
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