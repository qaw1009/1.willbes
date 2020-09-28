@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both;}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evt_apply {background:#f5f5f5;padding:25px;}
    .evt_apply ul {margin-bottom:15px}
    .evt_apply li {display:inline;float:left; width:48%;}
    .evt_apply li:nth-child(odd) {padding-left:25px;}
    .evt_apply ul:after {content:''; display:block; clear:both}

    .check {position:absolute; bottom:0; left:50%; margin-left:-360px; width:720px; padding:20px 0px 20px 10px; letter-spacing:0; color:#fff; z-index:5;}
    .check label {cursor:pointer; font-size:14px;color:#FFF;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

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
        <a href="javascript:go_PassLecture('');">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1137m_top.jpg" alt="웰컴팩" > 
        </a>
        <div class="check">
            <label>
                <input name="ischk"  type="checkbox" value="Y" />
                페이지를 모두 확인하였고, 이에 동의합니다.
            </label>
        </div>        
    </div> 
    
    <div class="evtCtnsBox evt01">
        <a href="https://pass.willbes.net/promotion/index/cate/3092/code/1312" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1137m_01.jpg" alt="바로 신청하기" >
        </a>
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1137m_02.jpg" alt="쿠폰&포인트" >
    </div>

    <div class="evtCtnsBox evt03">
        <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1137m_03.jpg" alt="웰컴팩 받기" >
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
<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">   

{{-- 수강신청 동의 --}}
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/member/join/?ismobile=0&sitecode=2000') }}' + code;
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