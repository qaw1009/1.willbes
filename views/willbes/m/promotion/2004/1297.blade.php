@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}    

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
    }
</style>

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1297m_01.jpg" alt="새벽 실전 모의고사" >
    </div>  
   
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1297m_02.jpg" alt="한덕현 모의고사" usemap="#Map1297A" border="0" >
        <map name="Map1297A">
            <area shape="rect" coords="77,934,635,1004" href="https://pass.willbes.net/m/pass/professor/show/prof-idx/50500?cate_code=3043&subject_idx=1254" target="_blank">
        </map>
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1297m_03.jpg" alt="기미진 모의고사" usemap="#Map1297B" border="0" >
        <map name="Map1297B">
            <area shape="rect" coords="90,898,642,966" href="#none">
        </map>
    </div>

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1297m_04.jpg" alt="새벽 실전 모의고사" >
    </div>
</div>
<!-- End Container -->
@stop