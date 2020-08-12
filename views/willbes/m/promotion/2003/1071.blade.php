@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}

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
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1071m_01.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1071m_02.jpg" alt="" >
    </div> 
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1071m_03.jpg" alt="" usemap="#Map1071A" border="0" >
        <map name="Map1071A">
            <area shape="rect" coords="48,431,665,538" href="https://pass.willbes.net/m/periodPackage/show/cate/3028/pack/648001/prod-code/155797" target="_blank" alt="통신기술직">
            <area shape="rect" coords="46,561,665,666" href="https://pass.willbes.net/m/periodPackage/show/cate/3028/pack/648001/prod-code/155798" target="_blank" alt="전송기술직">
            <area shape="rect" coords="55,689,664,804" href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/155799" target="_blank" alt="전기직">
            <area shape="rect" coords="60,979,652,1097" href="https://pass.willbes.net/m/periodPackage/show/cate/3028/pack/648001/prod-code/158347" target="_blank" alt="국가직">
            <area shape="rect" coords="69,1152,651,1263" href="https://pass.willbes.net/m/periodPackage/show/cate/3028/pack/648001/prod-code/158349" target="_blank" alt="전기직">
            <area shape="rect" coords="37,1375,693,1493" href="https://pass.willbes.net/m/search/result/?=&cate=3028&searchfull_text=최우영" target="_blank" alt="단가 수강신청">
        </map>
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