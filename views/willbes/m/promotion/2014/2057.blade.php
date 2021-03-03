@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:768px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:768px;}
    .evtTop {position:relative}

    .evt05 {background:#fff}

    .evt02 {text-align:center;}
    .evt02 .dday {font-size:22px;padding:20px 0; background:#fff}
    .evt02 .dday span {color:#a0774e; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}
    .video_area {background:#CABDB4;}

    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .evt09 {padding-bottom:150px}
    .evt09 a {display:block; margin:0 20px; padding:15px; border-radius:40px; color:#fff; background:#2fa700; font-size:22px}
    .evt09 div {margin-top:20px; font-size:16px}

    .evtFooter {padding:20px; text-align:left; color:#3a3a3a; background:#E1E1E1; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}

    .curriculum {text-align:left; padding:30px 20px; word-break: keep-all; background:#f5f5f5; margin:0}
    .curriculum .cTitle {list-style:none;color:#414d4c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;} 
    .curriculum dl {margin-top:30px;}
    .curriculum dl:first-child {margin:0}
    .curriculum dt {font-size:16px; font-weight:bold; color:#383368; margin:30px 0 10px}
    .curriculum dt:first-child {margin:0 0 10px}
    .curriculum dd {margin-bottom:10px; line-height:1.4}    

    .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
        background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2);left:0; z-index:10;
        text-align:center;
    }

    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px}
    .btnbuy a {display:block; width:100%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; 
    padding:15px; text-align:center; border-radius:10px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#593c14;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:768px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; font-weight:bold; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#593c14;}

    .slide_con {max-width:768px; margin:0 auto}
    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .slide_con .bx-wrapper .bx-pager {        
        width: auto;
        bottom: -30px;
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
        background: #d7d7d7;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        background:#000;
    }


   /* 폰 가로, 태블릿 세로*/
   @@media only screen and (max-width: 374px) {
      
    }

    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        
    }
    /* 태블릿 세로 */
    @@media only screen and (min-width: 690px) {
        .curriculum h5 br {display:none}
        .curriculum dl {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}              
    }
</style>

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_top.jpg" alt="요리연구가" >             
    </div>  

    <div class="evtCtnsBox evt05" >
        <img src="https://static.willbes.net/public/images/promotion/2021/03/2057_01m.jpg" alt="요리연구가" >   
        <a href="javascript:go_PassLecture('177450');">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2057_01_btn01.jpg" alt="강의 수강권 only" >   
        </a>   
        <img src="https://static.willbes.net/public/images/promotion/2021/03/2057_01_btn02.jpg" alt="강의+베이직" usemap="#Map2057m_apply" border="0" >
        <map name="Map2057m_apply" id="Map2057m_apply">
            <area shape="rect" coords="414,229,538,292" href="javascript:go_PassLecture('177452');" />
            <area shape="rect" coords="546,229,669,294" href="javascript:go_PassLecture('177573');" />
        </map>         
        <a href="javascript:go_PassLecture('177453');">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2057_01_btn03.jpg" alt="강의+프리미엄" >   
        </a>          
    </div> 

    <div class="evtCtnsBox evt02">           
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_02.jpg" alt="스페셜 키트" >
    </div> 

    <div class="evtCtnsBox evt03">
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/eCPGzSosPSo?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_03.jpg" alt="요리연구가 이난우" >
    </div> 

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_04.jpg" alt="나누면 따뜻한 집밥" >
        <div class="slide_con pb100">
            <ul id="slidesImg1">
                <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2057_04_01.jpg" alt="사전구매 상품"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2057_04_02.jpg" alt="사전구매 상품"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2057_04_03.jpg" alt="사전구매 상품"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2057_04_04.jpg" alt="사전구매 상품"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2057_04_05.jpg" alt="사전구매 상품"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2057_04_06.jpg" alt="사전구매 상품"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2057_04_07.jpg" alt="사전구매 상품"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2057_04_08.jpg" alt="사전구매 상품"/></li>
            </ul>
        </div>
    </div>  

    <div class="evtCtnsBox evt_05">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_05.jpg" alt="요리란 무슨 의미일까" >            
    </div> 

    <div class="evtCtnsBox evt08">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_06.jpg" alt="맛있고 건강한 요리" >            
    </div>     

    <div class="evtCtnsBox">
        <div class="curriculum">
            <div class="cTitle">나누면 따뜻한 집밥,<br><span class="mt_15">요리연구가 이난우의 집밥 마스터 입문 </span></div>
            <dl>                
                <dt>함께 나누면 따뜻한 집밥, 요리연구가 이난우의 집밥 요리클래스 OPEN!</dt>
                <dd>- 안녕하세요, 요리연구가 이난우입니다</dd>

                <dt>1. 요리의 기본이 되는 육수&양념</dt>
                <dd>- 멸치육수<br>
                - 종합간장<br>
                - 고추기름</dd>

                <dt>2. 수험생을 위한 반찬이 필요 없는 한 그릇 요리</dt>
                <dd>- 곤드레 나물밥<br>
                - 해물된장비빔밥</dd>

                <dt>3. 몸과 마음을 따뜻하게 만들어주는 국과 찌개</dt>
                <dd>- 오이찌개<br>
                - 명란두부찌개</dd>

                <dt>4. 쉽고 간단하게 만드는 개운한 깍두기와 장아찌</dt>
                <dd>- 영양부추장아찌<br>
                - 콜라비 깍두기</dd>

                <dt>5. 사랑하는 사람과 나누면 더 맛있는 일품요리</dt>
                <dd>- 누룽지 닭백숙<br>
                - 돼지고기 떡갈비</dd>

                <dt>6. 넉넉하게 만들어 두고 먹는 밑반찬</dt>
                <dd>- 유자삼치조림<br>
                - 크렌베리 견과류 멸치 볶음</dd>

                <dt>7. 만능양념장으로 뚝딱 만드는 스피드 집밥</dt>
                <dd>- 만능양념장<br>
                - 매운 등갈비<br>
                - 장떡<br>
                - 주꾸미 볶음</dd>

                <dt>수고하셨습니다!</dt>
                <dd>- 완강을 축하합니다! 당신도 이제 집밥 마스터!</dd>
            </dl>
        </div>
    </div>  

    <div class="evtCtnsBox" id="guide">
        <div class="evtFooter">
            <h3 class="NSK-Black">이용 안내</h3>

            <p># 환불안내</p>
            <ul>
                <li>이용안내 및 환불 특약으로 안내된 별도 환불 기준이 있는 경우 우선 적용합니다.</li>
                <li>강의재생시간에 관계없이 강의를 재생한 경우, 학습 자료 및 모바일 다운로드 이용한 경우 수강한 것으로 간주합니다.(맛보기 강의 제외)</li>
                <li>강좌비*에서 기수강 강의수에 대한 금액* 및 위약금*(강의 정상가의 10%)을 차감 후 부분 환불이 진행됩니다.<br>
                * 강좌비: 결제금액에서 서비스프로그램 등 추가 혜택에 해당하는 금액을 차감한 순수강좌비<br>
                * 기수강강의 금액: 결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수)<br>
                * 수강시작일로부터 7일 이내 위약금 없음<br>
                * 수강시작일로부터 7일 이후 위약금 적용 (정상가의 10% 공제)
                </li>
                <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.</li>
                <li>환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
                <li>총강의수 전체 기수강 시에는 전액환불이 불가합니다. </li>
            </ul>

            <p># 기타유의사항</p>
            <ul>
                <li>제공되는 사은혜택이 있는 경우 동영상 별도구매 불가합니다.</li>
                <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>            
                <li>수강혜택 사은품으로 발급된 인증코드 및 쿠폰이 있는 경우 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
            </ul>

            <p>#요리 클래스 키트 안내</p>
            <ul>
                <li>
                    키트구성 <br>
                    - 베이직 A : 만능양념장, 네오플램 피카 18cm 편수냄비 IH, 만능간장(맛간장), 계량스푼, 계량컵<br>
                    - 베이직 B : 만능양념장, 네오플램 피카 26cm 웍 IH, 만능간장(맛간장), 계량스푼, 계량컵<br>
                    - 프리미엄 : 만능양념장, 네오플램 피카 18cm 편수냄비IH, 26cm 웍 IH, 만능간장(맛간장), 계량스푼, 계량컵
                </li>

                <li>키트 배송일정<br>
                : 강사님이 직접 배송을 진행하고 있으며, 결제일로부터 5~7일 기간 소요 될 수 있으니 참고 부탁 드립니다.<br>                
                - 키트 상품 중 일부 깨지기 쉬운 물품은 대체 용기로 변경되어 배송되므로 실제 이미지와 다를 수 있습니다.</li>

                <li>키트 환불 절차 및 금액<br>
                : 키트에 대한 환불절차는 키트의 미배송 또는 반송이 확인된 이후 진행됩니다.<br>
                - 배송 시작 전 : 결제대금 전액<br>
                - 배송 시작 후 키트 수령일로부터 7일 경과 전 : 결제대금 전액<br>
                (단, 키트 반송에 소요되는 운송비를 공제)<br>
                - 키트 수령일로부터 7일 경과 후 : 환불 불가</li>

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

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="#evt05">
        [온라인강의] 신청하기 >
        </a>
    </div>
    <div class="infoCheck" id="chkInfo">   
        <label>
            <input name="ischk" type="checkbox" value="Y" />페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
        </label>
        <a href="#guide" class="infotxt">이용안내확인하기 ↓</a>
    </div>
</div>

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">
    {{-- 수강신청 동의 --}}
    function go_PassLecture(code){
        if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }

        var url = '{{ site_url('/m/lecture/show/cate/3114/pattern/only/prod-code/') }}' + code;
        location.href = url;
    };

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

        var slidesImg1 = $("#slidesImg2").bxSlider({
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