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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .sky {position:fixed;top:250px;right:50px;z-index:1;width:120px;}
        .sky a {display:block; margin-bottom:5px}

        .evtTop {background:#D5BA6B url(https://static.willbes.net/public/images/promotion/2020/11/1911_top_bg.jpg) no-repeat center top}

        .evt01 {background:#B7A092}     

        .evt02 {background:#CABDB4}

        .evt03 {background:#E9D6CF}

        .evt04 {background:#fff}

        .evt05 {background:#F5F5F5;padding:100px 0;}
        .evtCurri {width:720px; margin:50px auto 0; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#414d4c; letter-spacing:-1px}
        .evtCurri li.cTitle {color:#414d4c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;} 
        .mt_15 {display:block;margin-top:15px;}

        .evt06 {background:#fff}

        .evt07 {background:#E1E1E1}           
        .evtFooter {width:720px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666;}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="sky" >
            <a href="#reserve"><img src="https://static.willbes.net/public/images/promotion/2020/11/1911_sky.png" alt=""></a>
        </div>                       

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_top.jpg" alt="" >             
        </div>  
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_01.jpg" alt="" >
        </div> 

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_02.jpg" alt="" usemap="#Map1911a" border="0" >
            <map name="Map1911a" id="reserve">
                <area shape="rect" coords="108,1197,613,1272" href="javascript:alert('Comimg Soon :)')" />
            </map>
        </div> 

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_03.jpg" alt="" >
        </div> 

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_04.jpg" alt="" >
        </div> 

        <div class="evtCtnsBox evt05">
            <div class="evtCurri">
                <ul>
                    <li class="cTitle">이번 저와 여러분의 만남에선<br><span class="mt_15">아래와 같은 것들을 엮어보려 합니다.</span></li>
                    <li class="cTitle">CH 1. 루루라탄의 라탄공예 입문</li>
                    <li>1. 안녕하세요, 루루라탄입니다.</li>
                    <li>2. 라탄(등공예)란 무엇인가?</li>
                    <li>3. 앞으로 1억뷰N잡에서 함께 할 라탄공예 입문 클래스</li>
                    <li class="cTitle">CH 2. 라탄공예, 그 위대한 첫 발</li>
                    <li>1. 라탄 재료에 대한 종류와 이해	</li>
                    <li>2. 공예를 시작할 때 필요한 준비물</li>
                    <li>3. 라탄 관련 용어 및 재료의 사용법</li>
                    <li>4. 환심 물에 담그는 방법</li>
                    <li>5. 환심 부러졌을 때, 사릿대를 이어 엮는 방법</li>
                    <li>6. 환심 보관하는 방법</li>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. 기본티코스터 3번까지 엮은 후<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. 덧날대 추가하여 엮기
                    </li>
                    <li class="cTitle">CH 5. 회오리 티코스터</li>
                    <li>1. 井(우물정)자짜기를 이용해 원형바닥짜기</li>
                    <li>2. 날대 수를 이용해 회오리기법을 이용해 엮기</li>
                    <li>3. 젖혀마무르기 변형으로 마무리하기</li>
                    <li class="cTitle">CH 6. 타원트레이</li>
                    <li>1. 자작나무 플레이트에 라탄 환심 끼우기</li>
                    <li>2. 사릿대 2줄로 따라엮기</li>
                    <li>3. 한번 젖혀 마무르기</li>
                    <li class="cTitle">CH 7. 타원바구니</li>
                    <li>1. 井자짜기 변형을 이용한 타원바닥짜기</li>
                    <li>2. 따라엮기를 이용한 바닥엮기</li>
                    <li>3. 덧날대 추가 후 몸통올리기</li>
                    <li>4. 따라엮기와 되돌아엮기로 측면올리기</li>
                    <li>5. 비단무늬 넣기</li>
                    <li>6. 감아마무르기</li>
                    <li class="cTitle">CH 8. 라탄 물병</li>
                    <li>1. 라탄 물병 혹은 화병에 라탄엮는 기법</li>
                    <li>2. 세줄꼬아엮기</li>
                    <li>3. 막엮기 혹은 따라엮기를 이용한 몸통올리기</li>
                    <li>4. 비단무늬 넣기</li>
                    <li>5. 2줄 깃털무늬</li>
                    <li>6. 엮어마무르기 변형으로 마무리하기</li>
                    <li class="cTitle">CH 9. 라탄공예에 대해</li>
                    <li>1. 배운 기법을 응용하여 만들 수 있는 작품</li>
                    <li>2. 라탄 재료 구입 방법</li>
                    <li class="cTitle">CH 10. 드디어 완강! 수고하셨습니다.</li>
                    <li>1. 여러분의 라탄 입문을 축하합니다!</li>
                </ul>
            </div>
        </div> 

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1911_06.jpg" alt="" >
        </div> 

        <div class="evtCtnsBox evt07">
            <div class="evtFooter">
                <h3 class="NSK-Black">이용 안내</h3>
                <p>사전예약 혜택</p>
                <ul>
                    <li>사전예약 혜택은 00월 00일까지 결제완료일자에 한해서만 적용합니다.</li>
                    <li>사전예약 혜택은 수강료 00% 할인입니다.</li>
                    <li>수강기간 추가 혜택은 강의 시작(00월 00일) 이후 일괄적으로 적용 예정입니다.</li>
                </ul>
                <h3 class="NSK-Black">문의안내 : 1544-5006</h3>
            </div>    
        </div> 

    </div>
    <!-- End Container -->

    <script type="text/javascript">   

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