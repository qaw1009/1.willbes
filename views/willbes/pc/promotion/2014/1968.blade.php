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
            top:250px;
            right:10px;
            z-index:1;
            width:150px;
            text-align:left;
        }
        .skybanner a {display:block; margin-bottom:5px; text-align:center}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/1968_top_bg.jpg) no-repeat center top}
        .evtMenu {background:#fff; height:80px; width:100%; border-bottom:1px solid #edeff0}

        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}

        .evt01 {background:#B7A092 url(https://static.willbes.net/public/images/promotion/2020/12/1968_01_bg.jpg) no-repeat center top}  

        .evt02 {background:#CABDB4; padding-bottom:150px}
        .btnbuy {width:720px; margin:50px auto 0}
        .btnbuy a {border-radius:10px; display:block; font-size:40px; background:#000; color:#fff; padding:20px 0;}
        .btnbuy a:hover {background:#a14f5b;}

        .infoCheck {font-size:14px; max-width:720px; margin:30px auto 0}
        .infoCheck label {margin-right:30px; cursor: pointer; font-weight:bold; }
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#a14f5b;}

        .evt03 {background:#E9D6CF;}

        .evt04 {background:#fff;}     

        .evt05 {background:#862331;}       

        .evt06 {background:#f8eddb;}

        .evt07 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1849_07_bg.jpg) no-repeat center top}

        .evt08 {background:#917c53;}

        .evtCurriBox {padding:100px 0; text-align:left; background:#F5F5F5}
        .evtCurriBox .copy {width:720px; margin:0 auto;}
        .evtCurriBox h5 {color:#6c4936; font-size:50px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evtCurriBox .evtCurriBoxTxt01 {font-size:28px; margin:20px auto 80px}
        .evtCurriBox .sample {width:720px; margin:0 auto}
        .evtCurriBox .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#acacac; color:#fff; font-size:20px; font-weight:600; text-align:center; margin-bottom:10px}
        .evtCurriBox .sample li p {margin-bottom:15px;}
        .evtCurriBox .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:8px; background:#000; color:#fff;}
        .evtCurriBox .sample li a:hover {background:#fff; color:#000}
        .evtCurriBox .sample li:last-child {margin:0}
        .evtCurriBox .sample:after {content:""; display:block; clear:both}
        .evtCurriBox .sample:after {content:""; display:block; clear:both}
        .evtCurriBox .evtCurriBoxTxt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}  
        .evtCurri {width:720px; margin:50px auto 0; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#6c4936; letter-spacing:-1px; line-height:1.2}
        .evtCurri li strong {margin-right:10px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important; }
        .evtCurri li.cTitle {color:#744416; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

        .evtReplyBox {background:#f5f5f5; padding:50px 0 100px}
        .evtReplyBox .columns {width:720px; margin:50px auto 0;
            column-count: 2;
            column-gap:10px;
        }
        .evtReplyBox .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:10px; color:#888; background:#fff;
            width:100%;
        }
        .evtReplyBox .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px; color:#744416}
        .evtReplyBox .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evtReplyBox .columns div strong {font-size:bold; color:#333}

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

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10;
        }

        .evtFooter {width:720px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666; background:#fff !important}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; margin-bottom:10px }

        .evtReply { width:940px; margin:0 auto; position:relative}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >            
            <a href="#lecBuy"><img src="https://static.willbes.net/public/images/promotion/2021/03/1968_sky.png" alt=""></a>                         
        </div>                  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1968_top.jpg" alt="라탄공예" usemap="#Map1968B" border="0" >
            <map name="Map1968B">
                <area shape="rect" coords="92,625,630,759" href="#lecBuy" alt="수강신청">
            </map>              
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1968_01.jpg" alt="루루라탄" >           
        </div>
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1968_02.jpg" alt="수강신청" >
            <div>
                <iframe src="https://www.youtube.com/embed/WC-VzT66KnY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1968_02_01.jpg" alt="" >
            <div id="lecBuy">
                <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/175175" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/03/1968_02_02.jpg" alt="강의+키트 사전예약"></a>
                <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/175310" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/03/1968_02_03.jpg" alt="강의 사전예약"></a>
            </div>
        </div>
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1968_03.jpg" alt="자연을 엮다" >                
        </div>
        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1968_06.jpg" alt="" >
        </div>
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1968_04.jpg" alt="" >
        </div>

        <div class="evtCtnsBox evtCurriBox" id="evtCurriBoxSec">
            <div class="copy">
                <h5 class="NSK-Black">
                    <div>내 손으로 만드는 여유,</div>
                </h5>
                <div class="evtCurriBoxTxt01 NSK-Thin">만들어 쓰는 즐거움 루루라탄의 라탄공예 입문</div>
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
                    <li><a href="#none">3강 맛보기 준비중 ></a></li>
                    <li><a href="#none">4강 맛보기 준비중 ></a></li>
                    <li><a href="#none">5강 맛보기 준비중 ></a></li>
                @endif
            </ul>           

            <div class="evtCurriBoxTxt02">
                * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
            </div>

            <div class="evtCurri">
                <ul>
                    <li class="cTitle">CH 1. 루루라탄의 라탄공예 입문</li>
                    <li>1. 안녕하세요, 루루라탄입니다.</li>
                    <li>2. 라탄(등공예)란 무엇인가?</li>
                    <li>3. 취미로 시작한 라탄, 새로운 기회가 될 수 있을까요?</li>
                    <li class="cTitle">CH 2. 라탄공예, 그 위대한 첫 발</li>
                    <li>1. 라탄 재료에 대한 종류와 이해	</li>
                    <li>2. 공예를 시작할 때 필요한 준비물</li>
                    <li>3. 라탄 관련 용어 및 재료의 사용법</li>
                    <li>4. 환심 물에 담그는 방법</li>
                    <li>5. 환심 보관하는 방법</li>
                    <li>6. 환심 부러졌을 때, 사릿대 이어서 엮는 방법</li>
                    <li class="cTitle">CH 3. 다용도 원형 바구니</li>
                    <li>1. 자작나무 플레이트에 라탄 환심 끼우기</li>
                    <li>2. 사릿대 1줄로 막엮기</li>
                    <li>3. 상•하 기본 엮어 마무르기</li>
                    <li class="cTitle">CH 4. 기본 티코스터, 응용 티코스터</li>
                    <li>1. 원형의 기본 +자짜기를 이용한 시작</li>
                    <li>2. 날대를 균일하게 나눠주는 방법</li>
                    <li>3. 막엮기를 이용한 엮음</li>
                    <li>4. 2줄꼬아엮기</li>
                    <li>5. 엮어마무르기<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - BONUS, 티코스터 업그레이드 하기<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 기본티코스터 3번까지 엮은 후 덧날대 추가하여 엮기
                    </li>
                    <li class="cTitle">CH 5. 회오리 티코스터</li>
                    <li>1. 井(우물정)자짜기를 이용해 원형 바닥 짜기</li>
                    <li>2. 날대 수를 이용한 회오리기법</li>
                    <li>3. 젖혀마무르기 변형으로 마무리하기</li>
                    <li class="cTitle">CH 6. 타원트레이</li>
                    <li>1. 자작나무 플레이트에 라탄 환심 끼우기</li>
                    <li>2. 사릿대 2줄로 따라 엮기</li>
                    <li>3. 3줄 꼬아 엮기 2단하기</li>
                    <li>4. 두 번 젖혀 마무르기<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - tip. 한 번 젖혀 마무르기
                    </li>    
                    <li class="cTitle">CH 7. 타원바구니</li>
                    <li>1. 井자짜기 변형을 이용한 타원 바닥 짜기</li>
                    <li>2. 매끼돌리기와 따라 엮기를 이용한 바닥 엮기</li>
                    <li>3. 덧날대 추가 후 3줄 꼬아 엮기</li>
                    <li>4. 3줄 꼬아 엮기 3단 하기</li>
                    <li>5. 따라 엮기와 되돌아엮기로 측면 올리기</li>
                    <li>6. 비단무늬 1/2 넣기</li>
                    <li>7. 2줄 꼬아 엮기 정방향과 역방향 엮어 주기</li>
                    <li>8. 감아 마무르기</li>
                    <li class="cTitle">CH 8. 라탄 물병</li>
                    <li>1. 물병 혹은 화병에 라탄 엮는 기법</li>
                    <li>2. 2줄 꼬아엮기로 고정하기</li>
                    <li>3. 막엮기 혹은 따라엮기를 3.5cm 엮기</li>
                    <li>4. 비단무늬 1/2 넣기</li>
                    <li>5. 막엮기 혹은 따라엮기를 3.5cm 엮기</li>
                    <li>6. 2줄 꼬아 엮기 1단 하기</li>
                    <li>7. 엮어마무르기 변형으로 위, 아래 마무리</li>
                    <li class="cTitle">CH 9. 라탄 공예 재료 구입 방법 및 응용</li>
                    <li>1. 라탄 재료 구입 방법과 좋은 재료 구별법 tip</li>
                    <li>2. 배운 기법을 응용하여 만들 수 있는 작품들 tip</li>
                    <li class="cTitle">CH 10. 드디어 완강! 수고하셨습니다.</li>
                    <li>1. 여러분의 라탄 입문을 축하합니다!</li>
                </ul>
            </div>
        </div>
        
        <div class="evtFooter" id="infoText">
            <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

            <p># 수강안내</p>
            <ul>
                <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다. (내강의실 > '수강 중 강좌'에서 확인 가능)</li>
                <li>PC/휴대폰/태블릿에서 언제든 수강 가능합니다.</li>
                <li>커리큘럼은 사정에 따라 일부 변동될 수 있습니다.</li>
                <li>동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                스타플레이어 미설치 경우 맛보기 수강버튼 클릭 시 설치 메시지가 팝업으로 뜹니다.<br>
                팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.</li>   
                <li>결제 완료 시 강의는 즉시 수강 가능하며, 수강기간을 설정하실수도 있으니, 이 점 참고 부탁 드립니다.</li>  
            </ul>

            <p># 환불안내</p>
            <ul>
                <li>이용안내 및 환불 특약으로 안내된 별도 환불 기준이 있는 경우 우선 적용합니다.</li>
                <li>강의재생시간에 관계없이 강의를 재생한 경우, 학습 자료 및 모바일 다운로드 이용한 경우 수강한 것으로 간주합니다.(맛보기 강의 제외)</li>
                <li>강좌비*에서 기수강 강의수에 대한 금액* 및 위약금*(강의 정상가의 10%)을 차감 후 부분 환불이 진행됩니다.<br>
                * 강좌비: 결제금액에서 서비스프로그램 등 추가 혜택에 해당하는 금액을 차감한 순수강좌비<br>
                * 기수강강의 금액: 결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수)<br>
                * 수강시작일로부터 7일 이내 위약금 없음<br>
                * 수강시작일로부터 7일 이후 위약금 적용 (잔여이용기간의 10% 공제)</li>
                <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.</li>
                <li>환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
                <li>총 강의수 전체 기 수강 시에는 전액환불이 불가합니다.</li>
            </ul>

            <p># 기타유의사항</p>
            <ul>
                <li>제공되는 사은혜택이 있는 경우 동영상 별도구매 불가합니다.
                <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다. </li>
                <li>수강혜택 사은품으로 발급된 인증코드 및 쿠폰이 있는 경우 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
                <li>수강시 궁금한 사항은 학습 Q&A에 질문 남겨주시거나, 루루라탄 인스타그램 DM으로 문의 해주시면 됩니다.  <br>
                질문 남긴후 바로 답변이달리지 않아도 조금만 참아주세요^^ 꼭 답변은 드리도록할께요~ </li>
            </ul>

            <p># 라탄 공예 키트 안내</p>
            <ul>
                <li>키트구성<br>
                : 라탄환심, 유리병, 타원판, 원판, 줄자, 등가위, 송곳, 분무기</li>
                <li>키트 배송일정<br>
                : 강사님이 직접 배송을 진행하고 있으므로, 결제일로부터 5~7일 기간 소요 될 수 있으니, 참고 부탁 드립니다.</li>
                <li>키트 환불 절차 및 금액<br>
                : 키트에 대한 환불절차는 키트의 미배송 또는 반송이 확인된 이후 진행됩니다.<br>
                - 배송 시작 전 : 결제대금 전액<br>
                - 배송 시작 후 키트 수령일로부터 7일 경과 전 : 결제대금 전액 (단, 키트 반송에 소요되는 운송비를 공제)<br>
                - 키트 수령일로부터 7일 경과 후 : 환불 불가
                (단순변심에 의한 키트반품은 왕복 택배비 6,000원입니다.)</li>
                <li>키트 환불 불가사유<br>
                - 회원의 책임 있는 사유에 따라 키트가 멸실 또는 훼손 등으로 재판매가 불가한 경우<br>
                - 회원의 사용 또는 시간경과, 일부 소비로 키트의 가치가 현저히 감소한 경우<br>
                - 시간이 지나 재판매가 곤란할 정도로 키트의 가치가 현저히 감소한 경우<br>
                - 복제가 가능한 키트의 포장을 훼손한 경우<br>
                - 회사가 키트의 청약철회 등의 제한에 관해 사전에 고지한 경우<br>
                - 그 밖에 거래의 안전 등 법령에 정하여진 사유가 있는 경우</li>
            </ul>

            <div>※ 이용문의 : 고객만족센터 1544-5006</div>
        </div>
    </div>
    <!-- End Container -->

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->
@stop