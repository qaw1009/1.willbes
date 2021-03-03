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

    .evt05 a {position: absolute; top: 85.08%; width: 29.58%; height: 9.08%; z-index: 2;}
    .evt05 a.a01 {left: 15.14%;}
    .evt05 a.a02 {left: 54.44%;}

    .evt06 a {position: absolute; top: 85.08%; width: 29.58%; height: 9.08%; z-index: 2;}
    .evt06 a.b01 {left: 15.14%;}
    .evt06 a.b02 {left: 54.44%;}

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
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1068m_top.jpg" alt="장사원" > 
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

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2021/03/1068m_04.jpg" alt="패키지 수강신청" >
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/179668" title="패키지 수강신청" target="_blank" style="position: absolute; left: 10.28%; top: 66.43%; width: 79.31%; height: 27.74%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox evt05">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1068m_05.jpg" alt="농업직 이론 패키지">
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/171517" title="농업직 기본심화이론" target="_blank" class="a01"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/171522" title="7급 농업직" target="_blank" class="a02"></a>
    </div> 

    <div class="evtCtnsBox evt06">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1068m_06.jpg" alt="농촌지도사 이론 패키지" >
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/171775" title="농촌지도사 경기인천외" class="b01"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/171777" title="농촌지도사 경기인천" class="b02"></a>
    </div> 

    <div class="evtCtnsBox evt07">
        <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/50429/?subject_idx=1171&subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1068m_07.jpg" alt="수강신청 바로가기">
        </a>
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