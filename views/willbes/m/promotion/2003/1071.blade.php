@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox a:hover {box-shadow:0 5px 20px rgba(0,0,0,.5); border-radius:6px}

    .evtTop a {position: absolute; width: 31.11%; height: 17.47%; z-index: 2;}
    .evtTop a.a01 {left: 2.78%; top: 75.6%;}
    .evtTop a.a02 {left: 34.31%; top: 75.6%;}
    .evtTop a.a03 {left: 65.97%; top: 75.6%;}

    .evt03 a {position: absolute; left: 70.69%; width: 19.03%; height: 2.32%; z-index: 2;}
    .evt03 a.b01 {top: 21.96%;}
    .evt03 a.b02 {top: 25.96%;}
    .evt03 a.b03 {top: 29.88%;}

    .evt03 a.b11 {left: 71.94%; top: 42.56%;}
    .evt03 a.b12 {left: 71.94%; top: 46.56%;}

    .evt03 a.b09 {top: 58.84%;}
    .evt03 a.b10 {top: 63.24%;}
    .evt03 a.b04 {top: 69.48%;}
    .evt03 a.b05 {top: 73.84%;}
    .evt03 a.b06 {top: 80.48%;}
    .evt03 a.b07 {top: 84.76%;}

    .evt03 a.b08 {top: 93.36%;}

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
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1071m_graph.gif" alt="그래프" >
    </div> 

    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1071m_top.jpg" alt="통신/전기 최우영" >
        <a href="https://youtu.be/FYzC6MElEzw?rel=0" target="_blank" class="a01"></a>
        <a href="https://youtu.be/9dxrpJ6TOZg?rel=0" target="_blank" class="a02"></a>
        <a href="https://youtu.be/_RDnE7u4k8U?rel=0" target="_blank" class="a03"></a>
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1071m_02.jpg" alt="" >
    </div> 
    
    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2021/05/1071m_03.jpg" alt="">
        <a href="https://pass.willbes.net/m/periodPackage/show/cate/3028/pack/648001/prod-code/171526" title="통신기술직" target="_blank" class="b01"></a>
        <a href="https://pass.willbes.net/m/periodPackage/show/cate/3028/pack/648001/prod-code/171527" title="전송기술직" target="_blank" class="b02"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/171762" title="전기직" target="_blank" class="b03"></a>

        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/182687" title="통신진" target="_blank" class="b11"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/182688" title="전자직" target="_blank" class="b12"></a>

        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/180909" title="지방직 통신기술직" target="_blank" class="b09"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/180908" title="지방직 전기직" target="_blank" class="b10"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/179673" title="국가직" target="_blank" class="b04"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/179678" title="전기직" target="_blank" class="b05"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/177169" title="국가직" target="_blank" class="b06"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/176489" title="전기직" target="_blank" class="b07"></a>
        <a href="https://pass.willbes.net/m/search/result/?=&cate=&searchfull_text=%EC%B5%9C%EC%9A%B0%EC%98%81" target="_blank" title="단가 수강신청" class="b08"></a>
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