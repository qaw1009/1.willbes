@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both;}
    .evtCtnsBox img {width:100%; max-width:720px; position:relative}

    .evtTop a {position: absolute; left: 19.25%; top: 86.7%; width: 62.76%; height: 7.02%; z-index: 2;}

    .evt_apply {background:#f5f5f5;padding:25px;}
    .evt_apply ul {margin-bottom:15px}
    .evt_apply li {display:inline;float:left; width:48%;}
    .evt_apply li a {box-shadow: 10px 10px 20px rgba(0,0,0,.1); display:inline-block}
    .evt_apply li img {max-width:280px; margin:0 auto}
    .evt_apply li:nth-child(odd) {padding-left:25px;}
    .evt_apply ul:after {content:''; display:block; clear:both}

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
        <img src="https://static.willbes.net/public/images/promotion/2021/01/1137m_top.gif" alt="" >   
        <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" title="웰컴팩" style=""></a>
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/1137m_00.jpg" alt="바로 신청하기" >
        <a href="https://pass.willbes.net/promotion/index/cate/3092/code/1312" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1137m_01.jpg" alt="바로 신청하기" >
        </a>
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/1137m_02.jpg" alt="쿠폰&포인트" >
    </div>

    <div class="evtCtnsBox evt03">
        <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1137m_03.jpg" alt="웰컴팩 받기" >
        </a>
    </div>

    <div class="evtCtnsBox evt_apply">
        <ul>
            <li>
                <a href="https://pass.willbes.net/m/home/index/cate/3019" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1137m_04.jpg" alt="9급" >
                </a>
            <li>
            <li>
                <a href="https://pass.willbes.net/m/home/index/cate/3020" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1137m_05.jpg" alt="7급" >
                </a>
            <li>
            <li style="margin:25px 0;">
                <a href="https://pass.willbes.net/m/home/index/cate/3035" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1137m_06.jpg" alt="법원직" >
                </a>
            <li>
            <li style="margin:25px 0;">
                <a href="https://pass.willbes.net/m/home/index/cate/3023" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1137m_07.jpg" alt="소방직" >
                </a>
            <li>
            <li>
                <a href="https://pass.willbes.net/m/home/index/cate/3028" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1137m_08.jpg" alt="기술직" >
                </a>
            <li>
            <li>
                <a href="https://pass.willbes.net/m/home/index/cate/3024" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1137m_09.jpg" alt="군무원" >
                </a>
            <li>
        </ul>
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