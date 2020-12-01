@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}
   
    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding:10px; z-index:999}
    .btnbuy a {display:block; width:100%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; 
    padding:15px 0; text-align:center; border-radius:40px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#2e266e;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
    }

</style>

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox evtTop">
        <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1698" target="_blank" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1950m_01.jpg" alt="룰렛 이벤트" >
        </a> 
    </div>  
   
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1950m_02.jpg" alt="참여 방법" usemap="#Map1950" border="0" >
        <map name="Map1950">
            <area shape="rect" coords="284,614,435,664" href="https://www.willbes.net/member/join/?ismobile=1&sitecode=2003" target="_blank">
        </map>
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1950m_03.jpg" alt="공무원 합격, 윌비스에서 시작하세요." usemap="#Map1951B" border="0" >
        <map name="Map1951B">
          <area shape="rect" coords="100,790,290,842" href="https://pass.willbes.net/m/home/index/cate/3019" target="_blank" alt="9급패스">
          <area shape="rect" coords="431,789,621,840" href="https://pass.willbes.net/m/home/index/cate/3103" target="_blank" alt="7급패스">
          <area shape="rect" coords="100,1211,289,1259" href="https://pass.willbes.net/m/home/index/cate/3035" target="_blank" alt="김동진법원팀">
          <area shape="rect" coords="432,1211,617,1258" href="https://pass.willbes.net/m/home/index/cate/3023" target="_blank" alt="소방패스">
          <area shape="rect" coords="102,1632,286,1678" href="https://pass.willbes.net/m/home/index/cate/3028" target="_blank" alt="기술직">
          <area shape="rect" coords="431,1632,621,1678" href="https://pass.willbes.net/m/home/index/cate/3024" target="_blank" alt="군무원">
        </map>
    </div>
</div>

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1950" target="_blank" >
        이벤트 참여하기 >
        </a>
    </div>
</div>
<!-- End Container -->

@stop