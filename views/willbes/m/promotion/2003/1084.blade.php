@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evt04 a {position: absolute; width:26.94%; height:2.88%; z-index: 2;}
    .evt04 a.a01 {left: 16.67%; top: 38.32%;}
    .evt04 a.a02 {left: 63.89%; top: 38.32%;}
    .evt04 a.a03 {left: 16.67%; top: 63.23%;}
    .evt04 a.a04 {left: 63.89%; top: 63.23%;}
    .evt04 a.a05 {left: 16.67%; top: 87.68%;}
    .evt04 a.a06 {left: 63.89%; top: 87.68%;}

    /* 폰 가로, 태블릿 세로*/
    @@media all and (min-width:320px) and (max-width:408px) {       

    }

    @@media all and (min-width:409px) and (max-width:588px) {       

    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {

    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">      
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1084m_01.gif" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1084m_02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1084m_03.jpg" alt="" >
    </div>
    
    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1084m_04.jpg" alt="" >
        <a href="https://pass.willbes.net/m/home/index/cate/3019" title="9급패스" target="_blank" class="a01"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3020" title="7급패스" target="_blank" class="a02"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3035" title="법원직패스" target="_blank" class="a03"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3023" title="소방직패스" target="_blank" class="a04"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3028" title="기술직" target="_blank" class="a05"></a>
        <a href="https://pass.willbes.net/m/home/index/cate/3024" title="군무원패스" target="_blank" class="a06"></a>
    </div>  
</div>
<!-- End Container -->

<!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
<script language='javascript'>
    var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
    var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
</script>
<noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
<!-- AceCounter Log Gathering Script End -->

@stop