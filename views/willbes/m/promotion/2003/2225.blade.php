@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evt_wrap {width:1120px; margin:0 auto; position: relative;}
      
</style>

<div id="Container" class="Container NSK c_both">    

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_mtop.jpg" alt="공무원 웰컴팩" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_m01.jpg" alt="아직도 고민만 하고 계세요?" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_m02.jpg" alt="모든 혜택이 0원" >
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_m03.jpg" alt="자세히보기">
        <a href="https://pass.willbes.net/m/home/index/cate/3019" target="_blank" title="9급" style="position: absolute;left: 18%;top: 35%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3020" target="_blank" title="7급" style="position: absolute;left: 65%;top: 35%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3023" target="_blank" title="소방" style="position: absolute;left: 18%;top: 59.5%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3024" target="_blank" title="군무원" style="position: absolute;left: 65%;top: 59.5%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3028" target="_blank" title="기술직" style="position: absolute;left: 18%;top: 84%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3035" target="_blank" title="법원팀" style="position: absolute;left: 65%;top: 84%;width: 17.27%;height: 3.8%;z-index: 2;"></a>
    </div>   
</div>
<!-- End Container -->

<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
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