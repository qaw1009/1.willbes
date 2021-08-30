@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox.wrap a:hover {box-shadow:0 5px 20px rgba(0,0,0,.5); border-radius:6px}

    .evt00 {padding-top:15%; background:#273238}
    .video-container-box {padding:0 5%}
    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}  

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
        background: #e85b4a;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }

  

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

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/1068m_top.jpg" alt="장사원" > 
    </div> 
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/1068m_01.jpg" alt="합격 전략의 중심" > 
    </div> 

    <div class="evtCtnsBox evt00">
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/chEceiSyKOg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2021/08/1068m_00.jpg" alt="합격 전략의 중심" > 
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
        <img src="https://static.willbes.net/public/images/promotion/2021/08/1068m_02.jpg" alt="농업직 4관왕" > 
    </div>

    <div class="evtCtnsBox wrap">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/1068m_06.jpg" alt="농촌지도사 이론 패키지" >
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/185386" target="_blank" title="기본심화이론" style="position: absolute; left: 14.86%; top: 46.26%; width: 28.61%; height: 3.06%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/185387" target="_blank" title="농업직이론" style="position: absolute; left: 56.39%; top: 46.26%; width: 28.61%; height: 3.06%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/185390" target="_blank" title="농촌지도사이론" style="position: absolute; left: 14.86%; top: 79.32%; width: 28.61%; height: 3.06%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/185391" target="_blank" title="농촌지도사이론" style="position: absolute; left: 56.396%; top: 79.32%; width: 28.61%; height: 3.06%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/50429/?subject_idx=1171&subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99" title="단과" style="position: absolute; left: 64.86%; top: 88.98%; width: 20.69%; height: 4.32%; z-index: 2;"></a>
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