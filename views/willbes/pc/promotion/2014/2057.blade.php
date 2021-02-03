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
        .sky {position:fixed;top:200px;right:50px;z-index:1;width:120px;}
        .sky a {display:block; margin-bottom:5px}
        .sky .sky1 {padding-left:5px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2057_top_bg.jpg) no-repeat center top}
        
        .evt01 {background:#fff}
        .evt01 .check{position:absolute;width: 800px;left:43%;top:1200px;margin-left:-250px;z-index:1;font-size:16px; text-align:center;line-height:1.5;
                     letter-spacing:-1px;font-weight:bold;}
        .evt01 .check label{color:#000}
        .evt01 .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
        .evt01 .check a {display: inline-block; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin-left:20px}

        .evt02 {background:#F7F3E7}

        .evt03 {background:#d0d3c9; padding-top:150px}

        .evt04 {background:#fff; padding-bottom:150px}

        .evt05 {background:#ECECEC}     

        .evt06 {background:#F7F3E7}

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
            <a href="#apply" class="sky1"><img src="https://static.willbes.net/public/images/promotion/2021/02/2057_sky.png" alt="입문 클래스"></a>
            <a href="#special"><img src="https://static.willbes.net/public/images/promotion/2021/02/2057_sky2.png" alt="스페셜 쿠킹 키트"></a>
        </div>                       

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_top.jpg" alt="요리 연구가 이난우" >             
        </div>  
        
        <div class="evtCtnsBox evt01" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_01.jpg" alt="수강 신청하기" usemap="#Map2057_apply" border="0" >
            <map name="Map2057_apply" id="Map2057_apply">
                <area shape="rect" coords="24,1071,252,1136"  href="javascript:go_PassLecture('177450');" />
                <area shape="rect" coords="270,1071,385,1135"  href="javascript:go_PassLecture('177452');" />
                <area shape="rect" coords="387,1071,498,1135"  href="javascript:go_PassLecture('177573');" />
                <area shape="rect" coords="516,1071,745,1136"  href="javascript:go_PassLecture('177453');" />
            </map>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#guide">이용안내확인하기 ↓</a>
            </div>   
        </div> 

        <div class="evtCtnsBox evt02" id="special">           
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_02.jpg" alt="스페셜 키드" >
        </div> 

        <div class="evtCtnsBox evt03">
            <div>
                <iframe src="https://www.youtube.com/embed/eCPGzSosPSo?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_03.jpg" alt="요리연구가" >
        </div> 

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_04.jpg" alt="나누면 따뜻한 집밥" >
            <div class="slide_con">
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
 
        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_05.jpg" alt="요리의 의미" >            
        </div> 

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2057_06.jpg" alt="맛있고 건강한 요리" >            
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
        /* 수강신청 동의 */ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/lecture/show/cate/3114/pattern/only/prod-code/') }}' + code;
            location.href = url;
        }

    </script>
@stop