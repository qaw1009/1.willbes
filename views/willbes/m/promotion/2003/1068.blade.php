@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evt01 {}
    .evt01s .slide_con {}
    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .slide_con .bx-wrapper .bx-pager {        
        width: auto;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover, 
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #2F6C64;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }

    .evtFooter {margin:0 auto;text-align:left; color:#000; line-height:1.7;background:#fff }
    .evtFooter h3 {font-size:20px;color:#f3f3f3; background:#161616; text-align:center; padding:10px 0}
    .evtFooter .infoBox {padding:20px;}
    .evtFooter p {margin-bottom:10px; color:#252525; font-size:19px;}
    .evtFooter p span {display:inline-block; font-size:10px; padding-bottom:5px; vertical-align:middle}
    .evtFooter div,
    .evtFooter ul {margin-bottom:20px; padding:0 10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal; color:#636363;font-size:14px;}
    .evtFooter li span {color:#252525;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
     
    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
       
    }
</style>

<div id="Container" class="Container NSK c_both"> 

    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_top.jpg" alt="장사원" > 
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_01.jpg" alt="합격 전략의 중심" > 
    </div> 

    <div class="evtCtnsBox evt01s">
        <div class="slide_con">
            <ul id="slidesImg1">
                <li><img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_01_01.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_01_02.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_01_03.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_01_04.png" alt=""/></li>
            </ul>
        </div> 
    </div> 
    
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_02.jpg" alt="농업직 4관왕" > 
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_03.jpg" alt="커리큘러" > 
    </div> 

     <div class="evtCtnsBox evtFooter">
        <h3 class="NSK-Black">이용안내 및 유의사항</h3>
        <div class="infoBox">
            <p class="NSK-Black"><span>●</span>상품구성</p>
            <ul>
                <li>최우영 T-PASS 제공 과정<br>
                    - 통신직 : 2020년도 대비 이론 + 2021년도 9급 국가직·지방직/군무원 대비 신규 개강 전 과정<br>
                    - 전자직 : 2020년도 대비 이론 및 문제풀이 + 2021년도 군무원 전자직 대비 신규 개강 전 과정
                </li>
                <li>본 T-PASS 내 제공되는 과정 중 신규 개강이 진행되지 않는 경우, 전년도 진행 과정으로 대체 제공될 수 있습니다.</li>
                <li>본 T-PASS를 통한 강의 수강 시, 각 과정당 3배수 제한이 적용됩니다.</li>
            </ul>
            <p class="NSK-Black"><span>●</span>기기제한</p>
            <ul>
                <li>본 PASS 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                    - PC+모바일 수강 시 : PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)                 
                </li>
                <li>계정당 최초 1회에 한해 직접 기기정보 초기화 진행 가능하며, 별도 기기정보 초기화가 추가로 필요하신 경우 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다. (윌비스 고객만족센터 1544-5006)</li>
            </ul>
            <p class="NSK-Black"><span>●</span>수강안내</p>
            <ul>
                <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                <li>본 PASS 이용 중에는 일시정지/재수강/연장 기능을 사용할 수 없습니다.</li>
            </ul>
            <p class="NSK-Black"><span>●</span>결제/환불</p>
            <ul>
                <li>결제일로부터 7일 이내 전액 환불 가능합니다. 단, 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다. 강의 자료 및 모바일 강의 다운로드 서비스 이용 시 수강한 것으로 간주됩니다.</li>
                <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감 후 환불됩니다.</li>
                <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하오니 유의 바랍니다.</li>
            </ul>            
        </div>
    </div>   

</div>

<!-- End Container -->
<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">   

    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg1").bxSlider({
            auto: true, 
            speed: 500, 
            pause: 4000, 
            mode:'fade', 
            autoControls: false, 
            controls:false,
            pager:true,
        });        
    });

</script>

<!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
<script language='javascript'>
    var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
    var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
</script>
<noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
<!-- AceCounter Log Gathering Script End -->

@stop