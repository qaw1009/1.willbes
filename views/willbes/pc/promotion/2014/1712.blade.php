@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
            width:120px;
        }
        .skybanner a {display:block; margin-bottom:5px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/03/1564_top_bg.jpg) repeat-x left top}
        .evtTop span { position:absolute; left:50%; margin-left:350px; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;}
        @@keyframes upDown{
             from{top:500px}
             50%{top:520px}
             to{top:500px}
         }
        @@-webkit-keyframes upDown{
             from{top:500px}
             50%{top:520px}
             to{top:500px}
         }

        .evtMenu {background:#fff; height:80px; width:100%; border-bottom:1px solid #edeff0}
        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}

        .evt01 {background:#fff; padding:100px 0}
        .evt01 .dday {font-size:30px; position:absolute; top:430px; left:50%; width:940px; margin-left:-470px; text-align:center;}
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
        .evt01 .btnbuy {width:940px; margin:50px auto 0}
        .evt01 .btnbuy a {border-radius:50px; display:block; font-size:40px; background:#000; color:#fff; padding:20px 0;}
        .evt01 .btnbuy a:hover {background:#3a99f0;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        @@-webkit-keyframes shadow-drop-2-center {
             0% {
                 -webkit-transform: translateZ(0);
                 transform: translateZ(0);
                 -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
                 box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
             }
             100% {
                 -webkit-transform: translateZ(50px);
                 transform: translateZ(50px);
                 -webkit-box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
                 box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
             }
         }
        @@keyframes shadow-drop-2-center {
             0% {
                 -webkit-transform: translateZ(0);
                 transform: translateZ(0);
                 -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
                 box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
             }
             100% {
                 -webkit-transform: translateZ(50px);
                 transform: translateZ(50px);
                 -webkit-box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
                 box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
             }
         }
        .infoCheck {margin-top:30px; font-size:14px}
        .infoCheck label {margin-right:30px; cursor: pointer;}
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#0099ff;}

        .evt02 {background:#f6f6f6; padding-top:100px}
        .evt02 .evt02Txt01 {font-size:26px; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#3a99f0}
        .evt02 .evt02Txt01 span {font-size:38px; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1); color:#000}

        .evt03 {background:#fff; padding-top:100px;}
        .evt03 .sample {width:900px; margin:0 auto}
        .evt03 .sample li {display:inline; float:left; width:48%; padding:20px; margin:0 1%; border-radius:10px; background:#353267; color:#fff}
        .evt03 .sample li p {font-size:20px; margin-bottom:15px; font-weight:600}
        .evt03 .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:4px}
        .evt03 .sample li a.btnst01 {border:1px solid #ccc;}
        .evt03 .sample li a.btnst02 {border:1px solid #000; color:#fff; background:#333}
        .evt03 .sample li a.btnst03 {border:1px solid #ccc; color:#000; background:#ccc}
        .evt03 .sample li a:hover {background:#000; color:#fff}
        .evt03 .sample:after {content:""; display:block; clear:both}
        .evt03 .evt03Txt01 {width:1120px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333; padding-left:140px;}        

        .evt04 {background:#ececec; padding:100px 0}
        .evt04 img {border-bottom:1px solid #e4e4e4;}
        .evt04 h4 {color:#3a99f0; font-size:18px}
        .evt04 .columns {width:940px; margin:50px auto 0;
            column-count: 2;
            column-gap:20px;
        }
        .evt04 .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:20px; color:#888; background:#fff;
            width:100%;
        }
        .evt04 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
        .evt04 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evt04 .columns div strong {font-size:bold; color:#333}        

        .evt05 {background:#3a99f0; padding-bottom:100px}
        .evt05 ul {width:940px; margin:0 auto;}
        .evt05 li {display:inline; float:left; width:50%}
        .evt05 li a {display:block; font-size:24px; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px}
        .evt05 li a:hover {background:#fff; color:#000;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .evt05 li span {display:block; font-size:28px}
        .evt05 li:last-child a{margin-left:10px}
        .evt05 ul:after {content:""; display:block; clear:both}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto}

        .evtCurri {width:900px; margin:50px auto 100px; text-align:left}
        .evtCurri li {font-size:26px; margin-bottom:15px; color:#262626; letter-spacing:-1px}
        .evtCurri li.cTitle {color:#ff0004; font-size:30px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10;
        }

        .evtFooter {width:900px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666; background:#fff !important}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; }

        .evtReply { width:940px; margin:0 auto; position:relative}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#"><img src="https://static.willbes.net/public/images/promotion/2020/05/1564_sky_01.png" alt="안혜진 대표"></a>
            {{--시간설정--}}
            @if(time() < strtotime('202005311159'))
            <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');"><img src="https://static.willbes.net/public/images/promotion/2020/05/1564_sky_02.png" alt="리뷰이벤트"></a>
            @endif 
            <a href="http://njob.domeggook.com/mh/njob_guide" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/05/1564_sky_03.png" alt="위탁.사입상품 추천받기"></a>
            <a href="https://njob.willbes.net/support/notice/show/cate/3114?board_idx=268597" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/05/1564_sky_04.png" alt="이용안내"></a>
        </div>                  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_top.jpg" alt="창업 다마고치" > 
            <span><a href="#tab03"><img src="https://static.willbes.net/public/images/promotion/2020/03/1564_pup.png" alt="맛보기강의" > </a></span>
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
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1564_01.jpg" usemap="#Map1710" border="0" >
                <map name="Map1710">
                    <area shape="rect" coords="230,663,573,710" href="#none" alt="기획전">
                </map>                

                <div class="btnbuy NSK-Black"><a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">[온라인강의] 신청하기 ></a></div>
                <div id="pass" class="infoCheck">
                    <input type="checkbox" name="y_pkg" value="162748" style="display: none;" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="#infoText">이용안내 확인하기 ↓</a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt02">
                <iframe src="https://www.youtube.com/embed/sO1Y3lGfMsM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="evt02Txt01">                    
                    안녕하세요.  어디서든 자유롭게 일하고<br>
                    하루에 수백, 수천의 매출을 올리는 홈비지니스의 모든것,<br>
                    여러분께 인스타마켓 강의의 A-Z를 전수하러 온  안혜빈입니다.<br>
                    <br>
                    사무실 없이 평범하게 5살, 3살 두 아이를 키우던 <br>
                    젊은 엄마는 어떻게 SNS마케팅과 홈비니지스를 통해 <br>
                    <span class="NSK-Black">억대 매출을 내는 CEO</span>가 되었을까 <br>
                    궁금하지 않으셔요?<br>               
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_02.jpg" alt="인플루언서" >
            </div>
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_01.jpg" alt="e커머스 강좌소개" ><br>
                <iframe src="https://www.youtube.com/embed/BsqW9fk1V6M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_02.jpg" alt="e커머스 강좌소개" ><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_03.jpg" alt="e커머스 강좌소개" ><br>
            </div>   
        </div>  

        <div id="tab03">
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_04_0327_01.jpg" alt="커리큘럼 강좌소개" >

                <ul class="sample">
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @php $i = 1; @endphp
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)
                            {{-- <li><a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');">{{$i}}강 맛보기 수강 ></a></li> --}}
                            <li>
                                <p>{{$i}}강 맛보기 수강 ▼</p>
                                {{--<a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');" class="btnst01">WIDE ></a>--}}
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

                <div class="evt03Txt01">
                    * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                </div>
                
                <div class="evtCurri">
                    <ul>
                        <li class="cTitle">1. 인스타그램 계정 키우기 10강</li>
                        <li>1강. 인스타마켓, 얼마나 벌 수 있어요?</li>
                        <li>2강. 인스타에 대한 거짓, 전부 리뷰해드립니다.</li>
                        <li>3강. 인스타 마켓, 진성고객 1000명이 필요한 이유</li>
                        <li>4강. 상품이 잘 팔리는 계정은 뭐가 다를까?</li>
                        <li>5강. 내 상품을 사줄 고객 데려오는 법</li>
                        <li>6강. 고객이 나에게 끌리는 가장 확실한 방법</li>
                        <li>7강. 고객이 내가 더 궁금해지는 인스타그램 프로필</li>
                        <li>8강. 좋아요 500개, 댓글 100개받는 일상글의 비밀</li>
                        <li>9강. 고객이 하루에도 3번 찾는 계정 만들기</li>
                        <li>10강. 고객을 사로잡는 감각적인 피드 구성법</li>
                        <li class="cTitle">2. 이미지마케팅  10강</li>
                        <li>1강. 인스타마켓, 정말 사진이 중요할까?</li>
                        <li>2강. 포토샵 없이 보정할 수 있는 어플 모음집</li>
                        <li>3강. 동영상으로 매력 어필하기</li>
                        <li>3강. 인스타마켓 - 셀카 잘 찍는 법</li>
                        <li>4강. 인스타마켓 - 인물사진 잘 찍는 법</li>
                        <li>5강. 인스타마켓 - 음식 사진 잘 찍는 법</li>
                        <li>6강. 인스타마켓 - 배경사진 잘 찍는 법</li>
                        <li>7강. 인스타마켓 이미지마케팅 추가 강의 1</li>
                        <li>8강. 인스타마켓 이미지마케팅 추가 강의 2</li>
                        <li>9강. 인스타마켓 이미지마케팅 추가 강의 3</li>
                        <li>10강. 인스타마켓 이미지마케팅 추가 강의 4</li>
                        <li class="cTitle">3. 툴 사용법 10강</li>
                        <li>1강. 인스타그램 스토리로 고객과 소통하기</li>
                        <li>2강. 인스타그램 하이라이트에 나만의 모음집 만들기</li>
                        <li>3강. 인스타그램 프로필 링크, 필요한 만큼 추가할 수 있는 비밀</li>
                        <li>4강. 개인사업자, 이렇게 판매링크 만들면 된다.</li>
                        <li>5강. 고객의 후기, 리포스트로 적극 활용하자.</li>
                        <li>6강. 인스타그램 언팔로우 사용하기</li>
                        <li>7강. 인스타마켓 툴 사용법 추가 강의 1</li>
                        <li>8강. 인스타마켓 툴 사용법 추가 강의 2</li>
                        <li>9강. 인스타마켓 툴 사용법 추가 강의 3</li>
                        <li>10강. 인스타마켓 툴 사용법 추가 강의 4</li>
                        <li class="cTitle">4. 성공사례 벤치마킹 10강</li>
                        <li>1강. 인스타마켓 성공사례 1</li>
                        <li>2강. 인스타마켓 성공사례 2</li>
                        <li>3강. 인스타마켓 성공사례 3</li>
                        <li>4강. 인스타마켓 성공사례 4</li>
                        <li>5강. 인스타마켓 성공사례 5</li>
                        <li>6강. 인스타마켓 성공사례 6</li>
                        <li>7강. 인스타마켓 성공사례 7</li>
                        <li>8강. 인스타마켓 성공사례 8</li>
                        <li>9강. 인스타마켓 성공사례 9</li>
                        <li>10강.인스타마켓 성공사례 10</li>                        
                        <li class="cTitle">5. 마켓의 이해와 글쓰기 10강</li>
                        <li>1강. 인스타마켓에서 잘 팔리는 아이템</li>
                        <li>2강. 인스타마켓, 판매 전 고객과 신뢰쌓기</li>
                        <li>3강. 인스타 마켓 예고글</li>
                        <li>4강. 인스타마켓 판매글</li>
                        <li>5강. 인스타마켓 이해/글쓰기 추가강의 1</li>
                        <li>6강. 인스타마켓 이해/글쓰기 추가강의 2</li>
                        <li>7강. 인스타마켓 이해/글쓰기 추가강의 3</li>
                        <li>8강. 인스타마켓 이해/글쓰기 추가강의 4</li>
                        <li>9강. 인스타마켓 이해/글쓰기 추가강의 5</li>
                        <li>10강. 인스타마켓 이해/글쓰기 추가강의 6</li>
                        <li class="cTitle">6. 매출 구매전환 및 단골관리를 위한 다른 마케팅 채널과 콜라보 10강</li>
                        <li>1강. 나는 왜 판매가 안되었을까 자가점검 해보기</li>
                        <li>2강. 팬덤 형성하는 방법 - 이벤트 진행</li>
                        <li>3강. 인스타 마켓은 첫째날이 가장 중요하다</li>
                        <li>4강. 객단가 높혀 매출 2배 올리기 (프로모션 진행 등)</li>
                        <li>5강. 클레임 고객을 단골로 만드는 커뮤니케이션 스킬</li>
                        <li>6강. 특별 아이템 제공 - 셀픽스</li>
                        <li>7강. 1+1 콜라보 마케팅:  인스타와 스마트스토어</li>
                        <li>8강. 1+1 콜라보 마케팅: 인스타와 블로그 , 인스타와 페이스북</li>
                        <li>9강. 1+1 콜라보 마케팅: 인스타와 틱톡, 인스타와 IGTV, 인스타와 유튜브</li>
                        <li>10강. 앞으로 구매전환을 높히기 위해 내가 해야할 일 체크리스트</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_04_01.png" alt="BEST 수강후기" >
                <div class="columns">
                    <div>
                        <p>장현*</p>
                        안혜빈 대표님의 컨설팅으로, 2019년 초 인스타 계정조차 없던 제가, 현재 인스타 팔로워 2,000명을 넘고, 
                        진심으로 소통했더니 좋아요 기본 250개 이상! 댓글 기본 100개 이상! 달리는 계정이 되었답니다. 
                        그렇게 키운 인스타로 공구 진행도 2번이나 해보고, 공구 역제안도 20건 정도 받게 되어서 제가 원하는 제품을 무료로 제공 받기도 했답니다!
                    </div>  
                    <div>
                        <p>정희*</p>
                        2월초 70만원 매출도 감동이였어요ㅠㅠ 큰금액은 아니지만 눈물이 났답니다. 제 이번달 목표액은 150만원인데 지금 현재 매출액이 무려 269만원! 
                        예전에는 걱정만 앞서서 자주 못했는데요, 
                        대표님과 코치님 모두 계속 용기를 주셔서 적극적으로 진행했더니 이런 성과가 났네요! 너무 감사합니다~!
                    </div> 
                    <div>
                        <p>이영*</p>
                        안혜빈 대표님과 1:1 컨설팅을 받았습니다. 대표님과의 면담에서 메모한 사업아이템들을 보여드렸어요. 다양한 의견과 구체적인 방법들을 제시해주셨습니다. 
                        정말 작은 성과이지만 지난 주말부터 업데이트 하지 않고 있던 쇼핑몰 계정에 하루에 3개씩 꾸준히 업데이트했습니다. 신기하게도 구매가 이루어졌습니다! 
                        하루종일 기분을 좋아지게 만들고 앞으로를 기대하게 만들고 열심히 해야겠구나 다짐을 하게 만들고 진짜로 어마어마한 힘을 가지고 있는 매출이였습니다.
                    </div>  
                    <div>
                        <p>주혜*</p>
                        제 계정은 현재 1천명 조금 넘은 상태이지만 6.7만개 게시글에서 인기게시물에 올라갈 수도 있더라구요~^^ 
                        인스타 마켓 강의 신청 마감 게시글이었는데 이 게시글 이전에 해시태그를 적절히 사용했었는데, 모두 홈비협에서 배운 덕분입니다^^
                    </div> 
                    <div>
                        <p>박송*</p>
                        35일만에 인스타 팔로워 1,000명 만들기 성공했어요! 홈비협을 만나 정말 다행입니다! 정말 든든하구요! 
                        알려주신대로 하니까 내 타겟이 찾아가지 않아도 알아서 찾아오는 효과도 볼 수 있었답니다^^! 
                        이렇게 좋은 교육 마련해주시고 늘 최선을 다해 알려주시는 안혜빈대표님과 교육 원장님, 모두 항상 감사합니다!
                    </div>
                    <div>
                        <p>방민*</p>
                        안대표님이 알려주신 나에게 맞는 상품과 상품 사용후기를 잘 찍어서 벌써 세번째 공구를 진행합니다! 이렇게 공구를 쉽게 다가갈 수 있게 해주신 혜빈대표님 사랑합니다
                    </div>
                    <div>
                        <p>김해*</p>
                        본업은 따로 있으나 생활비를 더 벌어볼까 싶은 마음에 작년부터 재택 부업을 시작했어요. 당장 생활비를 버는 것이 목표였지만 잘 되지 않았어요. 
                        저는 인스타로 소통도 안하고 짧게 한두문장, 해시태그도 대충 쓰던 사람입니다. 
                        혜빈대표님의 컨설팅 이후 많이 신경 썼어요. 갑자기 신경 쓰려니 시간도 오래 걸리고 어렵게 느껴졌지만 일단 알려준대로 시작했습니다. 
                        그랬더니 즉각 계정에서 도달,노출,반응이 많이 올랐고 피드마다 유입 비율도 높아졌네요. 더 열심히 해야겠다는 의지를 불태우게 합니다!
                    </div>
                    <div>
                        <p>이은*</p>
                        안녕하세요! 혜빈대표님과의 컨설팅 후 하루에 100명까지는 못해도 꾸준히 진심으로 소통하고 컨설팅 내용에 맞추어 열심히 노력했더니 키워드 인기 게시물에 올랐어요! 
                        그리고 제가 단 해시태그 모두 거의 인기게시물에 오르는 놀라운 경험을 하고 있습니다! 
                        이래서인지 계정 팔로워도 많이 늘고 노출수도 엄청 올랐더라구요ㅠㅠ 정말 단기간에 놀랍고 감사한 결과입니다. 이대로면 좀 더 목표를 빨리 달성할 수 있을 것 같아요!
                    </div>
                    <div>
                        <p>김나*</p>
                        대표님의 전화상담으로 자세한 설명에, 꼭 재택부업으로 성공하고 싶은데 자꾸 실패만 반복한다고 솔직하게 말씀드렸어요. 대표님이 목표와 의지만 있으시다면, 
                        내주는 미션을 받아 목표를 세워보라는 말에 목표를 세웠고, 실천력으로 열심히 소통하여 팔로워수가 천명을 훌쩍 넘었습니다. 
                        최근 첫 공구도 진행하게 되어서 너무 감사합니다.
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

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_04_02.jpg" alt="BEST 수강후기" >
                <ul>
                    <li>
                        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
                            <span class="NSK-Black">지금, N잡강의</span>
                            신청하고 부수입 만들기 도전! → 
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <span class="NSK-Black">인플루언서 커머스</span>
                            A to Z 기획전 바로가기! → 
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