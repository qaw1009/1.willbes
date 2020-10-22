@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evt00 {text-align:center;}
    .evt00 .dday {font-size:22px;padding:20px 0;}
    .evt00 .dday span {color:#435d96; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}

 
    .check {padding:20px 0px 20px 10px; letter-spacing:0; color:#000; z-index:5}
    .check label {cursor:pointer; font-size:14px;color:#000;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:block;padding:10px 20px; color:#fff; background:#000; margin-top:20px; border-radius:20px; font-size:14px;font-weight:bold;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}

    /* 폰 가로, 태블릿 세로*/
    @@media all and (min-width:320px) and (max-width:408px) {       

    }

    @@media all and (min-width:409px) and (max-width:588px) {       

    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt00 .dday {font-size:30px;}
        .evt00 .dday span {box-shadow:inset 0 -20px 0 rgba(0,0,0,0.1);}       
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style> 

<div id="Container" class="Container NSK c_both">     
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/3103m_top.jpg" alt="" >
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/3103m_01.jpg" alt="" >
    </div> 
    
    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/3103m_02.jpg" alt="" usemap="#Map1887a" border="0" >
        <map name="Map1887a" id="Map1887a">
            <area shape="rect" coords="40,246,678,342" href="javascript:go_PassLecture('173664');">
            <area shape="rect" coords="39,376,678,475" href="javascript:go_PassLecture('173904');">
        </map>
        <div class="check" id="chkInfo">   
            <label>
                <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 Perfect PSAT Program 온라인 PASS반 이용안내를 모두 확인하였고, 이에 동의합니다.
            </label>
            <a href="#notice" class="infotxt">이용안내확인하기 ↓</a>
        </div>          
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/3103m_03.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox evtFooter" id="notice">
        <h3 class="NSK-Black">윌비스 한림법학원 Perfect PSAT Program 온라인 PASS반 이용안내</h3>
        <p>● 이용안내 </p>
        <ul>
            <li>본 상품은 2021년 7급공무원 1차시험(PSAT)을 준비하시는 분을 위해 준비되었습니다.[과목별 교수님]<br>
                자료해석 : 석치수, 상황판단 : 박준범, 언어논리(택1) : 이나우/한승아
            </li>
            <li>수강기간 : 본 상품에 등록된 강의는 2021년 7급공무원 1차시험(PSAT)일까지 수강하실 수 있습니다.</li>
            <li>무제한수강 : 본 상품은 수강기간 동안 강의배수제한 없이 무제한 수강하실 수 있습니다.</li>
            <li>CORE 특강 무료제공 : 11월(과목별 4~5회) CORE특강이 무료 업로드 예정입니다.</li>
            <li>진행(업로드) 강좌 순차 업로드 : OPEN CLASS(기본, 21년 1~2월), ADVANCED CLASS(심화, 21년 3~4월)<br>
            MASTER CLASS(실전모강, 21년 5~6월)강의가 수강하실 수 있게 순차적으로 업로드 될 예정입니다.
            </li>
            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
        </ul>

        <p>● 교재</p>
        <ul>
            <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
        </ul>

        <p>● 환불</p>
        <ul>
            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, Perfect PSAT Program 온라인 PASS반 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.<br>
                (환불시 CORE 특강 수강료도 정가기준 수강부분만큼 차감 후 환불됩니다.)
            </li>
        </ul>

        <p>● PASS 수강</p>
        <ul>
            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
            <li>Perfect PSAT Program 온라인 PASS반은 일시 정지, 수강 연장, 재수강 불가합니다.</li>
            <li>Perfect PSAT Program 온라인 PASS반 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                - 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대
            </li>
            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능)</li>
            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될 수 있습니다.</li>
        </ul>
        
        <p>● 유의사항</p>
        <ul>
            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
            <li>Perfect PSAT Program 온라인 PASS반 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 Perfect PSAT Program 온라인 PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
        </ul>

    </div>  

</div>
<!-- End Container -->

<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
<script type="text/javascript">
   
    {{-- 수강신청 동의 --}}
    function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/m/periodPackage/show/cate/3103/pack/648001/prod-code/') }}' + code;
            location.href = url;
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