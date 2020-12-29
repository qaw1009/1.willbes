@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evt01 {}

    .evt02 {text-align:center; }
    .evt02 .dday {font-size:22px;padding:20px 0; background:#fff}
    .evt02 .dday span {color:#a0774e; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}
    .video_area {background:#CABDB4;}

    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .evt03 {}   

    .evt04 div {font-size:16px; font-weight:600; margin-top:20px}

    .evt05 {text-align:left; padding:0 20px;word-break: keep-all;}
    .evt05 .curriculum {margin:30px 0}
    .curriculum li.cTitle {list-style:none;color:#414d4c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;} 
    .evt05 dl {margin-top:30px;}
    .evt05 dl:first-child {margin:0}
    .evt05 dt {font-size:16px; font-weight:bold; color:#383368; margin:30px 0 10px}
    .evt05 dt:first-child {margin:0 0 10px}
    .evt05 dd {margin-bottom:10px; line-height:1.4}    

    .evtFooter {margin:80px auto 0; padding:30px 20px; text-align:left; color:#3a3a3a; background:#E1E1E1; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}


   /* 폰 가로, 태블릿 세로*/
   @@media only screen and (max-width: 374px) {
      
    }

    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        
    }
    /* 태블릿 세로 */
    @@media only screen and (min-width: 690px) {
        .evt05 h5 br {display:none}
        .evt05 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}              
    }

</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_top.jpg" alt="" >        
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_01.jpg" alt="" >
    </div> 
    
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_02.jpg" alt="" >
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/WC-VzT66KnY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_02_1.jpg" alt="" usemap="#Map1911M_A" border="0" id="Map1911M_A" >
            <map name="Map1911M_A">
                <area shape="rect" coords="78,752,311,846" href="https://njob.willbes.net/m/lecture/show/cate/3114/pattern/only/prod-code/175175" target="_blank" alt="강의+키트 사전예약">
                <area shape="rect" coords="410,754,639,846" href="https://njob.willbes.net/m/lecture/show/cate/3114/pattern/only/prod-code/175310" target="_blank" alt="강의 사전예약">
            </map>
        </div>    
    </div> 
    

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_03.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox evt06">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_06.jpg" alt="" >
    </div>

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_04.jpg" alt="" >
    </div>     

    <div class="evtCtnsBox evt05">
        <div class="curriculum">
            <dl>
                <li class="cTitle">내 손으로 만드는 여유,<br><span class="mt_15">만들어 쓰는 즐거움 루루라탄의 라탄공예 입문</span></li>
                <dt>CH 1. 루루라탄의 라탄공예 입문</dt> 
                <dd>1. 안녕하세요, 루루라탄입니다.</dd>
                <dd>2. 라탄(등공예)란 무엇인가?</dd>
                <dd>3. 앞으로 1억뷰N잡에서 함께 할 라탄공예 입문 클래스</dd>

                <dt>CH 2. 라탄공예, 그 위대한 첫 발</dt>
                <dd>1. 라탄 재료에 대한 종류와 이해</dd>
                <dd>2. 공예를 시작할 때 필요한 준비물</dd>
                <dd>3. 라탄 관련 용어 및 재료의 사용법</dd>
                <dd>4. 환심 물에 담그는 방법</dd>
                <dd>5. 환심 보관하는 방법</dd>
                <dd>6. 환심 부러졌을 때, 사릿대 이어서 엮는 방법</dd>

                <dt>CH 3. 다용도 원형 바구니</dt>
                <dd>1. 자작나무 플레이트에 라탄 환심 끼우기</dd>
                <dd>2. 사릿대 1줄로 막엮기<dd>
                <dd>3. 상•하 기본 엮어 마무르기<dd>

                <dt>CH 4. 기본 티코스터, 응용 티코스터</dt>
                <dd>1. 원형의 기본 +자짜기를 이용한 시작</dd>
                <dd>2. 날대를 균일하게 나눠주는 방법</dd>
                <dd>3. 막엮기를 이용한 엮음</dd>
                <dd>4. 2줄꼬아엮기</dd>
                <dd>5. 엮어마무르기<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - BONUS, 티코스터 업그레이드 하기<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 기본티코스터 3번까지 엮은 후 덧날대 추가하여 엮기
                </dd>

                <dt>CH 5. 회오리 티코스터</dt>
                <dd>1. 井(우물정)자짜기를 이용해 원형 바닥 짜기</dd>
                <dd>2. 날대 수를 이용한 회오리기법</dd>
                <dd>3. 젖혀마무르기 변형으로 마무리하기</dd>

                <dt>CH 6. 타원트레이</dt>
                <dd>1. 자작나무 플레이트에 라탄 환심 끼우기</dd>
                <dd>2. 사릿대 2줄로 따라 엮기</dd>
                <dd>3. 3줄 꼬아 엮기 2단하기</dd>
                <dd>4. 두 번 젖혀 마무르기<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - tip. 한 번 젖혀 마무르기
                </dd>

                <dt>CH 7. 타원바구니</dt>
                <dd>1. 井자짜기 변형을 이용한 타원 바닥 짜기</dd>
                <dd>2. 매끼돌리기와 따라 엮기를 이용한 바닥 엮기</dd>
                <dd>3. 덧날대 추가 후 3줄 꼬아 엮기</dd>
                <dd>4. 3줄 꼬아 엮기 3단 하기</dd>
                <dd>5. 따라 엮기와 되돌아엮기로 측면 올리기</dd>
                <dd>6. 비단무늬 1/2 넣기</dd>
                <dd>7. 2줄 꼬아 엮기 정방향과 역방향 엮어 주기</dd>
                <dd>8. 감아 마무르기</dd>

                <dt>CH 8. 라탄 물병</dt>
                <dd>1. 물병 혹은 화병에 라탄 엮는 기법</dd>
                <dd>2. 2줄 꼬아엮기로 고정하기</dd>
                <dd>3. 막엮기 혹은 따라엮기를 3.5cm 엮기</dd>
                <dd>4. 비단무늬 1/2 넣기</dd>
                <dd>5. 막엮기 혹은 따라엮기를 3.5cm 엮기</dd>
                <dd>6. 2줄 꼬아 엮기 1단 하기</dd>
                <dd>7. 엮어마무르기 변형으로 위, 아래 마무리</dd>

                <dt>CH 9. 라탄 공예 재료 구입 방법 및 응용</dt>
                <dd>1. 라탄 재료 구입 방법과 좋은 재료 구별법 tip</dd>
                <dd>2. 배운 기법을 응용하여 만들 수 있는 작품들 tip</dd>

                <dt>CH 10. 드디어 완강! 수고하셨습니다.</dt>
                <dd>1. 여러분의 라탄 입문을 축하합니다!</dd>
            </dl>
        </div>
    </div>    

    <div class="evtCtnsBox evt07">
        <div class="evtFooter">
            <h3 class="NSK-Black">이용 안내</h3>
            <p>#사전예약 혜택</p>
            <ul>
                <li>사전예약 혜택은 12월 14일까지 결제완료자에 한해서만 적용됩니다.</li>
                <li>전예약 혜택은 강의료(키트 제외) 40% 할인입니다.</li>
                <li>강의 시작일은 12월 14일 예정이오나, 일정에 따라 변경 될 수 있으니 참고 부탁 드립니다.</li>
            </ul>
            <p>#라탄 공예 키트 안내</p>
            <ul>
                <li>키트구성 <br>
                : 라탄환심, 유리병, 타원판, 원판, 줄자, 등가위, 송곳, 분무기</li>
                <li>키트 배송일정<br>
                : 강사님이 직접 배송을 진행하고 있으므로, 결제일로부터 5~7일 기간 소요 될 수 있으니, 참고 부탁 드립니다.</li>
                <li>키트 환불 절차 및 금액<br>
                : 키트에 대한 환불절차는 키트의 미배송 또는 반송이 확인된 이후 진행됩니다.<br>
                - 배송 시작 전 : 결제대금 전액<br>
                - 배송 시작 후 키트 수령일로부터 7일 경과 전 : 결제대금 전액<br>
                (단, 키트 반송에 소요되는 운송비를 공제)<br>
                - 키트 수령일로부터 7일 경과 후 : 환불 불가<br>
                (단순변심에 의한 키트반품은 왕복 택배비 6,000원입니다.) </li>
                <li>키트 환불 불가사유<br>
                - 회원의 책임 있는 사유에 따라 키트가 멸실 또는 훼손 등으로 재판매가 불가한 경우<br>
                - 회원의 사용 또는 시간경과, 일부 소비로 키트의 가치가 현저히 감소한 경우<br>
                - 시간이 지나 재판매가 곤란할 정도로 키트의 가치가 현저히 감소한 경우<br>
                - 복제가 가능한 키트의 포장을 훼손한 경우<br>
                - 회사가 키트의 청약철회 등의 제한에 관해 사전에 고지한 경우<br>
                - 그 밖에 거래의 안전 등 법령에 정하여진 사유가 있는 경우</li>
            </ul>
            <h3 class="NSK-Black">문의안내 : 1544-5006</h3>
        </div>    
    </div> 

</div>
<!-- End Container -->

    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>


    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->

@stop