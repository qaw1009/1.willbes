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
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_01.jpg" alt="" >
    </div> 
   
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_02.jpg" alt="" usemap="#Map1779m_a" border="0">
        <map name="Map1779m_a" id="Map1779m_a">
            <area shape="rect" coords="66,903,656,996" href="#evt06"  alt="" >
        </map>
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_03.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_04.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox evt05">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_05.jpg" alt="" usemap="#Map1779m_b" border="0" >
        <map name="Map1779m_b" id="Map1779m_b">
            <area shape="rect" coords="59,1035,662,1126" href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3043&campus_ccd=605001" target="_blank" />
        </map>
    </div> 

    <div class="evtCtnsBox evt06" id="evt06">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_06.jpg" alt="" usemap="#Map1779m_c" border="0" >
        <map name="Map1779m_c" id="Map1779m_c">
            <area shape="rect" coords="59,344,659,432" href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3043&campus_ccd=605001&search_text=UHJvZE5hbWU665287J2067iM" target="_blank" />
        </map>
    </div> 
</div>
<!-- End Container -->

@stop