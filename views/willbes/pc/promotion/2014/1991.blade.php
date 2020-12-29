@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .sky {position:fixed;top:250px;right:50px;z-index:1;width:120px;}
        .sky a {display:block; margin-bottom:5px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1991_top_bg.jpg) no-repeat center top}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1991_02_bg.jpg) no-repeat center top}

        .evt03 {background:#d0d3c9; padding-top:150px}

        .evt04 {background:#fff; padding-bottom:150px}

        .evt05 {background:#f7f3e7}     

        .evt06 {background:#eee5d3 url(https://static.willbes.net/public/images/promotion/2020/12/1991_06_bg.jpg) no-repeat center top}

        .evt07 {background:#fff;}  

        .evt08 {background:#f7f3e7}
        .evt09 {padding-bottom:150px}
        .evt09 a {display:block; width:600px; margin:0 auto; padding:15px; border-radius:40px; color:#fff; background:#2fa700; font-size:22px}
        .evt09 div {margin-top:20px; font-size:16px}

        .evt10 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1991_10_bg.jpg) no-repeat center top}

        .evt11 {background:#f5f5f5; padding:100px 0}

        .evtCurri {width:720px; margin:0 auto; text-align:left; line-height:1.4}
        .evtCurri h4 {font-size:34px; margin-bottom:50px}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#414d4c; letter-spacing:-1px}
        .evtCurri li.cTitle {color:#414d4c; font-size:24px; margin-bottom:10px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important; } 

        .evtFooter {width:720px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666;}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal;}

        .evtCtnsBox iframe {width:720px; height:406px; margin:0 auto} 

        .slide_con {max-width:720px; margin:0 auto}
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
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="sky" >
            <a href="#evt05"><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_sky.png" alt="입문 클래스"></a>
        </div>                       

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_top.gif" alt="우리집 요리사" >             
        </div>  
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_01.jpg" alt="집밥마스터 입문" usemap="#Map1991B" border="0" >
            <map name="Map1991B">
                <area shape="rect" coords="380,928,691,1223" href="#evt05" alt="사전예약">
            </map>
        </div> 

        <div class="evtCtnsBox evt02">           
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_02.jpg" alt="요리연구가 이나우" >
        </div> 

        <div class="evtCtnsBox evt03">
            <div>
                <iframe src="https://www.youtube.com/embed/eCPGzSosPSo?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_03.jpg" alt="요리연구가 이나우" >
        </div> 

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_04.jpg" alt="나누면 따뜻한 집바" >
            <div class="slide_con">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_04_01.jpg" alt="사전구매 상품"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_04_02.jpg" alt="사전구매 상품"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_04_03.jpg" alt="사전구매 상품"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_04_04.jpg" alt="사전구매 상품"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_04_05.jpg" alt="사전구매 상품"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_04_06.jpg" alt="사전구매 상품"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_04_07.jpg" alt="사전구매 상품"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_04_08.jpg" alt="사전구매 상품"/></li>
                </ul>
            </div>
        </div> 

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_top.jpg" alt="사전예약" >
            <div class="slide_con pb100">
                <ul id="slidesImg2">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_01.jpg" alt="육수 양념"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_02.jpg" alt="일품 한 그릇 요리"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_03.jpg" alt="국 찌개"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_04.jpg" alt="깍두기와 장아찌"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_05.jpg" alt="일품요리"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_06.jpg" alt="스피드 집밥"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_07.jpg" alt="스피드 집밥"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_08.jpg" alt="밑반찬"/></li>
                </ul>
            </div>
            <div id="evt05">
                <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/177450" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_btn01.jpg" alt="사전예약" ></a>
                <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/177452" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_btn02.jpg" alt="사전예약" ></a>
                <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/177453" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_btn03.jpg" alt="사전예약" ></a>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_05_bottom.jpg" alt="사전예약" >
        </div> 

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_06.gif" alt="사전예약 이벤트" >            
        </div> 

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_07.jpg" alt="수업" >            
        </div> 

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_08.jpg" alt="맛있고 건강한 요리" >            
        </div> 

        <div class="evtCtnsBox evt09">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_09.jpg" alt="오픈 이벤트" > 
            <a href="http://pf.kakao.com/_tUSRK/61873027" target="_blank" class="NSK-Black">쿠킹클래스 기대평 작성하기 ></a>    
            <div>이벤트 기간 : 12.30(수)~1.12(화) <span class="mr10 ml10">|</span> 당첨자발표 : 2021.1.15(금) 공지사항 참조</div>
        </div> 

        <div class="evtCtnsBox evt11">
            <div class="evtCurri">
                <h4 class="NSK-Black">나누면 따뜻한 집밥,<br>요리연구가 이난우의 집밥 마스터 입문</h4>
                <ul>
                    <li class="cTitle">함께 나누면 따뜻한 집밥, 요리연구가 이난우의 집밥 요리클래스 OPEN!</li>
                    <li>안녕하세요, 요리연구가 이난우입니다</li>
                    <li class="cTitle">1. 요리의 기본이 되는 육수&양념</li>
                    <li>- 멸치육수<br>
                        - 종합간장<br>
                        - 고추기름</li>
                    <li class="cTitle">2. 수험생을 위한 반찬이 필요 없는 한 그릇 요리</li>
                    <li>- 곤드레 나물밥<br>
                        - 해물된장비빔밥</li>
                    <li class="cTitle">3. 몸과 마음을 따뜻하게 만들어주는 국과 찌개</li>
                    <li>- 오이찌개<br>
                        - 명란두부찌개</li>
                    <li class="cTitle">4. 쉽고 간단하게 만드는 개운한 깍두기와 장아찌</li>
                    <li>- 영양부추장아찌<br>
                        - 콜라비 깍두기</li>    
                    <li class="cTitle">5. 사랑하는 사람과 나누면 더 맛있는 일품요리</li>
                    <li>- 누룽지 닭백숙<br>
                        - 돼지고기 떡갈비</li>
                    <li class="cTitle">6. 넉넉하게 만들어 두고 먹는 밑반찬</li>
                    <li>- 유자삼치조림<br>
                        - 크렌베리 견과류 멸치 볶음</li>
                    <li class="cTitle">7. 만능양념장으로 뚝딱 만드는 스피드 집밥</li>
                    <li>- 만능양념장<br>
                        - 매운 등갈비<br>
                        - 장떡<br>
                        - 주꾸미 볶음</li>
                    <li class="cTitle">수고하셨습니다!</li>
                    <li>- 완강을 축하합니다! 당신도 이제 집밥 마스터!</li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt10">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1991_10.jpg" alt="" >            
        </div> 

        <div class="evtCtnsBox">
            <div class="evtFooter">
                <h3 class="NSK-Black">이용 안내</h3>
                <p>#사전예약 혜택</p>
                <ul>
                    <li>사전예약 혜택은 1월 12일까지 결제완료자에 한해서만 적용됩니다.</li>
                    <li>사전예약 혜택은 강의료(키트 제외) 40% 할인입니다.</li>
                    <li>강의 시작일은 1월 12일 예정이오나, 일정에 따라 변경 될 수 있으니 참고 부탁 드립니다.</li>
                </ul>
                <p>#요리 클래스 키트 안내</p>
                <ul>
                    <li>* 키트구성 <br>
                    - 베이직 : 만능양념장, 네오플램 피카 18cm 편수냄비IH, 만능간장(맛간장), 계량스푼, 계량컵<br>
                    - 프리미엄 : 만능양념장, 네오플램 피카 18cm 편수냄비IH/26cm 웍 IH, 만능간장(맛간장), 계량스푼, 계량컵</li>

                    <li>* 키트 배송일정<br>
                    : 강사님이 직접 배송을 진행하고 있으며, 결제일로부터 5~7일 기간 소요 될 수 있으니 참고 부탁 드립니다.<br>
                    - 키트 발송은 사전예약자에 한하여 1월 12일 이후부터 순차발송 진행 됩니다.<br>
                    - 키트 상품 중 일부 깨지기 쉬운 물품은 대체 용기로 변경되어 배송되므로 실제 이미지와 다를 수 있습니다.</li>

                    <li>* 키트 환불 절차 및 금액<br>
                    : 키트에 대한 환불절차는 키트의 미배송 또는 반송이 확인된 이후 진행됩니다.<br>
                    - 배송 시작 전 : 결제대금 전액<br>
                    - 배송 시작 후 키트 수령일로부터 7일 경과 전 : 결제대금 전액<br>
                    (단, 키트 반송에 소요되는 운송비를 공제)<br>
                    - 키트 수령일로부터 7일 경과 후 : 환불 불가<br>
                    (단순변심에 의한 키트반품은 왕복 택배비 6,000원입니다.)</li>

                    <li>* 키트 환불 불가사유<br>
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
@stop