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

    .evt02 {padding-bottom:120px; background:#f6f6f6}
    .evt02 a {display:block; margin:0 auto; width:60%; font-size:20px; background:#293342; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}

    .evt03 {position:relative;}
  
    .evt03 p img {position:absolute;left:50%;top:70%;margin-left:-40%;width:80%; max-width:576px}    
    .evt03 .apply ul li a:first-child {position: absolute;width:100%;left:50%;top:78%;margin-left:-28%;}
    .evt03 .apply img{width:33%;}
    .check {position:absolute; bottom:6%; left:50%; margin-left:-360px; width:720px; padding:20px 0px 20px 10px; letter-spacing:0; color:#fff; z-index:5}
    .check label {cursor:pointer; font-size:14px;color:#000;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff;margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;
              position:absolute;left:50%;top:90%;margin-left:-23%;}
    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px}
    .btnbuy {max-width:720px; margin:0 auto}
    .btnbuy a {display:block; width:99%; max-width:700px; margin:0 auto 5px; font-size:14px; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
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
    @@media all and (min-width:320px) and (max-width:408px) {       
    .check label {font-size:10px;}
    .check {bottom:4%;}
    .check a {top:50%;}
    .check input {width:15px;height:15px;}
    .check img {width:65%;}
    }

    @@media all and (min-width:409px) and (max-width:588px) {       
    .check label {font-size:13px;}
    .check input {width:20px;height:20px;}
    .check img {width:75%;}
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
    <div class="evtCtnsBox evt00 ddayArea">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black">지방직 7급 패스 마감까지 <br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div>     
    </div>   

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1750m_top.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1750m_01.jpg" alt="" >
    </div> 
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1750m_02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1750m_03.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1750m_04.jpg" alt="" >
        <div class="apply"> 
            <ul>
                <li>
                    <a href="javascript:go_PassLecture('170032');">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1750m_04_apply.png" alt="" >
                    </a>    
                </li>
            </ul>          
        </div>
        <div class="check">
            <label>
                <input name="ischk"  type="checkbox" value="Y" />
                페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
            </label>
            <a href="#guide">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1751m_03_guide.png" alt="" >
            </a>
        </div>        
    </div> 

    <div class="evtCtnsBox evtFooter" id="guide">
        <h3 class="NSK-Black">윌비스 지방직 7급 실전마스터PASS 이용안내</h3>
        <p>● 상품구성 </p>
        <ul>
            <li>본 PASS는 윌비스 7급 교수진의 지정 과정을 배수 제한 없이 무제한으로 수강 가능한 상품입니다.</li>
            <li>수강 가능 과목 및 교수진<br>
                - 국어 : 기미진 (아침특강 제외)<br>
                - 영어 : 한덕현(기출리뷰,스나이퍼32, 9급 국가/지방직 모의고사, 7급 지방직대비 문제풀이과정, 아작내기특강만 제공), 성기건(2019 새벽모의고사 6개월분만 제공)<br>
                - 한국사 : 조민주, 행정학 : 김덕관, 행정법 : 황남기/한세훈, 헌법 : 황남기/유시완, 경제학 : 황정빈
            </li>
            <li>본 PASS는 2020년도 대비에 맞추어 개강된 강의를 제공해드리는 상품입니다.<br>
                - 제공 과정 : 기출문제풀이, 단원별 문제풀이, 실전동형모의고사            
            </li>
            <li>교수진 사정으로 강의가 부득이하게 진행되지 않을 시, 대체 강의를 제공해드립니다.</li>
        </ul>

        <p>● 수강관련</p>
        <ul>
            <li>[내강의실]-[무한PASS존]-[강좌추가]버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
            <li>본 PASS는 일시정지/연장/재수강 기능을 제공하지 않습니다.</li>
            <li>본 PASS 수강 시 이용가능한 기기는 PC/모바일 총 2대입니다.</li>
            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>
        </ul>

        <p>● 환불정책</p>
        <ul>
            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
            <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 정가 기준으로 계산하여 사용 일수만큼 차감하고 환불됩니다.</li>
        </ul>
        <div>※ 이용문의 : 1544-5006</div>
    </div>  
</div>
<!-- End Container -->

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>


<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
<script type="text/javascript">
    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}','txt');
    });

      /*수강신청 동의*/ 
      function go_PassLecture(code){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }

                var url = '{{ site_url('/m/periodPackage/show/cate/3020/pack/648001/prod-code/') }}' + code;
                location.href = url;
        }     

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